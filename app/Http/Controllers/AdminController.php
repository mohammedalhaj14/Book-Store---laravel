<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Category;
use App\Models\User;
use App\Models\Order;
use App\Models\Message; 
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Mail; 
use Illuminate\Support\Facades\Storage;

class AdminController extends Controller
{
    /**
     * Admin Dashboard - Statistics and Book List
     */
    public function index()
    {
        $booksCount = Book::count();
        $categoriesCount = Category::count();
        $books = Book::with('category')->latest()->paginate(10); 
        return view('admin.dashboard', compact('booksCount', 'categoriesCount', 'books'));
    }

    /* --- Inventory CRUD Functions --- */

    public function createBook()
    {
        $categories = Category::all();
        return view('admin.books.form', compact('categories'));
    }

    public function storeBook(Request $request)
    {
        $data = $request->validate([
            'title' => 'required|string|max:255',
            'author' => 'required|string|max:255',
            'isbn' => 'required|string|unique:books,isbn',
            'genre' => 'required|string|max:255',
            'price' => 'required|numeric|min:0',
            'stock_quantity' => 'required|integer|min:0',
            'category_id' => 'nullable|exists:categories,id', 
            'description' => 'nullable|string',
            'cover_image' => 'nullable|image|mimes:jpeg,png,jpg|max:2048'
        ]);

        if ($request->hasFile('cover_image')) {
            $data['cover_image'] = $request->file('cover_image')->store('book_covers', 'public');
        }

        $data['slug'] = Str::slug($request->title);
        Book::create($data);

        return redirect()->route('admin.dashboard')->with('success', 'Book created successfully!');
    }

    public function editBook(Book $book)
    {
        $categories = Category::all();
        return view('admin.books.form', compact('book', 'categories'));
    }

    public function updateBook(Request $request, Book $book)
    {
        $data = $request->validate([
            'title' => 'required|string|max:255',
            'author' => 'required|string|max:255',
            'isbn' => 'required|string|unique:books,isbn,' . $book->id, 
            'genre' => 'required|string|max:255',
            'price' => 'required|numeric|min:0',
            'stock_quantity' => 'required|integer|min:0',
            'category_id' => 'nullable|exists:categories,id',
            'description' => 'nullable|string',
            'cover_image' => 'nullable|image|mimes:jpeg,png,jpg|max:2048'
        ]);

        if ($request->hasFile('cover_image')) {
            if ($book->cover_image) {
                Storage::disk('public')->delete($book->cover_image);
            }
            $data['cover_image'] = $request->file('cover_image')->store('book_covers', 'public');
        }

        $data['slug'] = Str::slug($request->title);
        $book->update($data);

        return redirect()->route('admin.dashboard')->with('success', 'Book updated successfully!');
    }

    /**
     * Updated: Using Soft Deletes to avoid Integrity Constraint Violations with Orders
     */
    public function destroyBook(Book $book)
    {
        // We do NOT delete the image here because Soft Deletes 
        // allow us to restore the book later if needed.
        
        $book->delete(); // This will now set the deleted_at column instead of a hard delete
        
        return back()->with('success', 'Book archived successfully! Existing orders remain safe.');
    }

    /* --- Category Management --- */

    public function categories()
    {
        $categories = Category::withCount('books')->latest()->get();
        return view('admin.categories', compact('categories'));
    }

    public function storeCategory(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|string|max:255|unique:categories,name',
        ]);

        Category::create([
            'name' => $data['name'],
            'slug' => Str::slug($data['name'])
        ]);

        return back()->with('success', 'Category created successfully!');
    }

    public function destroyCategory(Category $category)
    {
        if ($category->books()->count() > 0) {
            return back()->with('error', 'Cannot delete category that contains books!');
        }

        $category->delete();
        return back()->with('success', 'Category deleted successfully!');
    }

    /* --- Customer Management --- */

    public function customers()
    {
        $customers = User::where('role', 0)->latest()->paginate(10);
        return view('admin.customers.index', compact('customers'));
    }

    public function showCustomer($id)
    {
        $customer = User::find($id);

        if (!$customer) {
            return redirect()->route('admin.customers')->with('error', 'Customer not found.');
        }

        $customer->load('orders');
        return view('admin.customers.show', compact('customer'));
    }

    public function destroyCustomer($id)
    {
        $customer = User::find($id);

        if (!$customer) {
            return redirect()->route('admin.customers')->with('error', 'Customer account not found.');
        }

        if ($customer->role != 0) {
            return back()->with('error', 'You cannot delete admin accounts!');
        }

        $customer->delete();
        return redirect()->route('admin.customers')->with('success', 'Customer account deleted successfully!');
    }

    /* --- Order Management --- */

    public function orders()
    {
        $orders = Order::with('user')->latest()->paginate(10);
        return view('admin.orders', compact('orders'));
    }

    public function updateStatus(Request $request, Order $order)
    {
        $request->validate(['status' => 'required|in:pending,shipped,completed,cancelled']);
        $order->update(['status' => $request->status]);
        return back()->with('success', 'Order status updated!');
    }

    /* --- Message Management --- */

    public function messages()
    {
        $messages = Message::latest()->get() ?? collect();
        return view('admin.messages.index', compact('messages'));
    }

    public function showMessage($id)
    {
        $message = Message::findOrFail($id);
        return view('admin.messages.show', compact('message'));
    }

    public function destroyMessage($id)
    {
        $message = Message::findOrFail($id);
        $message->delete();

        return redirect()->route('admin.messages')->with('success', 'Message deleted successfully.');
    }

    public function replyMessage(Request $request, $id)
    {
        $message = Message::findOrFail($id);

        $request->validate([
            'reply_body' => 'required|string',
        ]);

        Mail::raw($request->reply_body, function ($mail) use ($message) {
            $mail->to($message->email)
                 ->subject('Reply to your inquiry: ' . ($message->subject ?? 'Bookstore Support'));
        });

        return redirect()->route('admin.messages')->with('success', 'Reply sent successfully to ' . $message->email);
    }
}
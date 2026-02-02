<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Order;
use App\Models\OrderItem;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    public function index()
    {
        $cart = session()->get('cart', []);
        return view('cart.index', compact('cart'));
    }

    public function add(Book $book)
    {
        $cart = session()->get('cart', []);

        if(isset($cart[$book->id])) {
            $cart[$book->id]['quantity']++;
        } else {
            // UPDATED: Forced (float) on price to ensure numeric storage
            $cart[$book->id] = [
                "title" => $book->title,
                "quantity" => 1,
                "price" => (float) $book->price,
            ];
        }

        session()->put('cart', $cart);
        return redirect()->back()->with('success', 'Product added to cart!');
    }

    public function update(Request $request)
    {
        if($request->id && $request->quantity){
            $cart = session()->get('cart');
            $cart[$request->id]["quantity"] = (int) $request->quantity; // Cast to integer
            session()->put('cart', $cart);
            session()->flash('success', 'Cart updated successfully');
        }
        return redirect()->back();
    }

    public function remove(Request $request)
    {
        if($request->id) {
            $cart = session()->get('cart');
            if(isset($cart[$request->id])) {
                unset($cart[$request->id]);
                session()->put('cart', $cart);
            }
            session()->flash('success', 'Product removed successfully');
        }
        return redirect()->back();
    }

    public function checkoutView()
    {
        $cart = session()->get('cart', []);
        
        if (empty($cart)) {
            return redirect()->route('cart.index')->with('error', 'Your cart is empty!');
        }

        return view('cart.checkout', compact('cart'));
    }

    public function processCheckout(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email',
            'address' => 'required|string',
        ]);

        $cart = session()->get('cart');

        try {
            DB::beginTransaction();

            // --- REINFORCED TOTAL CALCULATION ---
            // Using (float) and (int) to force math on values
            $totalAmount = 0;
            foreach ($cart as $item) {
                $itemPrice = (float) ($item['price'] ?? 0);
                $itemQty = (int) ($item['quantity'] ?? 0);
                $totalAmount += ($itemPrice * $itemQty);
            }

            // Create the Order record
            $order = Order::create([
                'user_id' => Auth::id(), 
                'customer_name' => $request->name,
                'email' => $request->email,
                'address' => $request->address,
                'total_amount' => $totalAmount, 
                'status' => 'completed'
            ]);

            foreach ($cart as $id => $details) {
                $book = Book::findOrFail($id);

                if ($book->stock_quantity < $details['quantity']) {
                    throw new \Exception("Sorry, " . $book->title . " is out of stock.");
                }

                $book->decrement('stock_quantity', $details['quantity']);

                OrderItem::create([
                    'order_id' => $order->id,
                    'book_id' => $id,
                    'quantity' => (int) $details['quantity'],
                    'price' => (float) $details['price'],
                ]);
            }

            DB::commit();
            session()->forget('cart');

            return redirect()->route('books.index')->with('success', 'Order placed successfully! Total: $' . number_format($totalAmount, 2));

        } catch (\Exception $e) {
            DB::rollback();
            return redirect()->back()->with('error', 'Error: ' . $e->getMessage());
        }
    }
}
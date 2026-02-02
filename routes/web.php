<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\BookController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\PagesController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ChatBotController; // <-- Added ChatBotController
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Public Bookstore Routes
|--------------------------------------------------------------------------
| Routes accessible by everyone (Guests and Authenticated Users)
*/
Route::get('/', [BookController::class, 'index'])->name('books.index');
Route::get('/books/{book}', [BookController::class, 'show'])->name('books.show');
Route::get('/about', [PagesController::class, 'about'])->name('pages.about');
Route::get('/contact', [PagesController::class, 'contact'])->name('pages.contact');
Route::post('/contact', [PagesController::class, 'storeContact'])->name('pages.contact.store');

/*
|--------------------------------------------------------------------------
| Authenticated User Routes
|--------------------------------------------------------------------------
| Restricted to logged-in users only.
*/
Route::middleware('auth')->group(function () {
    
    // Shopping Cart Management (PROTECTED)
    Route::get('/cart', [CartController::class, 'index'])->name('cart.index');
    Route::post('/cart/add/{book}', [CartController::class, 'add'])->name('cart.add');
    Route::patch('/update-cart', [CartController::class, 'update'])->name('update.cart'); 
    Route::delete('/remove-from-cart', [CartController::class, 'remove'])->name('remove.from.cart');

    // AI Chatbot Route (NEW)
    Route::post('/chat/ask', [ChatBotController::class, 'ask'])->name('chat.ask');

    // Profile Management
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // Checkout Process
    Route::get('/checkout', [CartController::class, 'checkoutView'])->name('checkout.index');
    Route::post('/checkout', [CartController::class, 'processCheckout'])->name('checkout.process');

    // Receipt Download
    Route::get('/orders/{order}/download', [OrderController::class, 'downloadReceipt'])->name('orders.download');
});

/*
|--------------------------------------------------------------------------
| Admin Routes (Prefix: admin / Name: admin.*)
|--------------------------------------------------------------------------
*/
Route::middleware(['auth', 'admin'])->prefix('admin')->name('admin.')->group(function () {
    
    // Dashboard / Stocks
    Route::get('/dashboard', [AdminController::class, 'index'])->name('dashboard');
    
    // Orders Management
    Route::get('/orders', [AdminController::class, 'orders'])->name('orders');
    Route::patch('/orders/{order}/status', [AdminController::class, 'updateStatus'])->name('orders.updateStatus');

    /* --- Customer Management --- */
    Route::get('/customers', [AdminController::class, 'customers'])->name('customers');
    Route::get('/customers/{customer}', [AdminController::class, 'showCustomer'])->name('customers.show');
    Route::delete('/customers/{customer}', [AdminController::class, 'destroyCustomer'])->name('customers.destroy');

    /* --- Message Management --- */
    // (Existing message routes kept here)
    Route::get('/messages', [AdminController::class, 'messages'])->name('messages');
    Route::get('/messages/{id}', [AdminController::class, 'showMessage'])->name('messages.show');
    Route::delete('/messages/{id}', [AdminController::class, 'destroyMessage'])->name('messages.destroy');
    Route::post('/messages/{id}/reply', [AdminController::class, 'replyMessage'])->name('messages.reply');

    /* --- Inventory CRUD --- */
    Route::get('/books/create', [AdminController::class, 'createBook'])->name('books.create');
    Route::post('/books/store', [AdminController::class, 'storeBook'])->name('books.store');
    
    Route::get('/books/{book}/edit', [AdminController::class, 'editBook'])->name('books.edit');
    Route::put('/books/{book}', [AdminController::class, 'updateBook'])->name('books.update');
    
    Route::delete('/books/{book}', [AdminController::class, 'destroyBook'])->name('books.destroy');

    /* --- Category Management --- */
    Route::get('/categories', [AdminController::class, 'categories'])->name('categories');
    Route::post('/categories/store', [AdminController::class, 'storeCategory'])->name('categories.store');
    Route::delete('/categories/{category}', [AdminController::class, 'destroyCategory'])->name('categories.destroy');
});

require __DIR__.'/auth.php';
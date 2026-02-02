<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <style>
        /* PDF-Friendly versions of your app.blade.php styles */
        body { 
            font-family: 'DejaVu Sans', sans-serif; 
            background-color: #ffffff; 
            margin: 0; 
            padding: 0;
            color: #333;
        }
        .container { padding: 30px; }
        
        /* Your Branding Colors */
        .navbar-brand { 
            font-weight: bold; 
            font-size: 24px;
            color: #0d6efd; 
            text-decoration: none;
            display: block;
            margin-bottom: 20px;
            border-bottom: 1px solid #e3e6f0;
            padding-bottom: 10px;
        }
        
        .table { width: 100%; border-collapse: collapse; margin-top: 20px; }
        .table th { background-color: #f8f9fa; color: #4e73df; padding: 12px; border: 1px solid #dee2e6; text-align: left; }
        .table td { padding: 12px; border: 1px solid #dee2e6; }
        
        .text-primary { color: #0d6efd; }
        .text-muted { color: #6c757d; }
        
        footer { 
            margin-top: 50px; 
            border-top: 1px solid #dee2e6; 
            padding-top: 20px; 
            font-size: 12px; 
            text-align: center;
            color: #6c757d;
        }
    </style>
</head>
<body>

    <div class="container">
        <div class="navbar-brand">
            BOOKSTORE
        </div>

        <main>
            <div style="margin-bottom: 20px;">
                <h2 class="text-primary">Order Receipt</h2>
                <p><strong>Order ID:</strong> #ORD-{{ $order->id }}</p>
                <p><strong>Customer:</strong> {{ $order->customer_name }}</p>
                <p><strong>Date:</strong> {{ $order->created_at->format('M d, Y') }}</p>
            </div>

            <table class="table">
                <thead>
                    <tr>
                        <th>Item</th>
                        <th>Price</th>
                        <th>Qty</th>
                        <th>Subtotal</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($order->items as $item)
                    <tr>
                        <td>{{ $item->book->title }}</td>
                        <td>${{ number_format($item->price, 2) }}</td>
                        <td>{{ $item->quantity }}</td>
                        <td>${{ number_format($item->price * $item->quantity, 2) }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>

            <div style="text-align: right; margin-top: 20px;">
                <h3 class="text-primary">Total: ${{ number_format($order->total_amount, 2) }}</h3>
            </div>
        </main>

        <footer>
            <p>&copy; {{ date('Y') }} Bookstore App. Built with Laravel.</p>
        </footer>
    </div>

</body>
</html>
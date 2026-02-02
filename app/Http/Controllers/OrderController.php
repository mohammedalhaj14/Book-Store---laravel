<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
    /**
     * Generate and download a PDF receipt for a specific order.
     */
    public function downloadReceipt(Order $order)
    {
        // 1. Security Check
        // Ensure the logged-in user is the one who placed the order
        if ($order->user_id !== Auth::id()) {
            abort(403, 'Unauthorized access to this receipt.');
        }

        // 2. Eager Load Relationships
        // This ensures the PDF has access to the books inside the order 
        // without running a separate query for every single row.
        $order->load('items.book');

        // 3. Prepare PDF
        // We point to the simple blade view created for the PDF layout
        $pdf = Pdf::loadView('pdf.receipt', compact('order'))
                  ->setPaper('a4', 'portrait');

        // 4. Download
        return $pdf->download('Receipt-Order-' . $order->id . '.pdf');
    }
}
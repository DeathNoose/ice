<?php
// app/Http/Controllers/PaymentController.php
namespace App\Http\Controllers;

use App\Models\Booking;
use App\Models\Ticket;
use Illuminate\Http\Request;

class PaymentController extends Controller
{
    /**
     * Процесс оплаты
     */
    public function process(Request $request)
    {
        if ($request->has('ticket')) {
            $item = Ticket::findOrFail($request->ticket);
            $type = 'ticket';
        } elseif ($request->has('booking')) {
            $item = Booking::with('skate')->findOrFail($request->booking);
            $type = 'booking';
        } else {
            return redirect()->route('home')->with('error', 'Не указан элемент для оплаты');
        }

        return view('payment.process', compact('item', 'type'));
    }

    /**
     * Успешная оплата
     */
    public function success(Request $request)
    {
        $paymentId = $request->get('paymentId', 'DEMO_' . uniqid());
        
        // Здесь будет логика обработки успешной оплаты
        // Например, обновление статуса заказа
        
        return view('payment.success', compact('paymentId'));
    }

    /**
     * Неуспешная оплата
     */
    public function fail(Request $request)
    {
        return view('payment.fail');
    }
}
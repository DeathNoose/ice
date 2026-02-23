<?php
// app/Http/Controllers/BookingController.php
namespace App\Http\Controllers;

use App\Models\Booking;
use App\Models\Skate;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BookingController extends Controller
{
    public function skates()
    {
        $skates = Skate::where('is_available', true)
            ->where('quantity', '>', 0)
            ->get();
        
        return view('booking.skates', compact('skates'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'full_name' => 'required|string|max:255',
            'phone' => 'required|string|max:20',
            'hours' => 'required|in:1,2,3,4',
            'need_skates' => 'nullable|boolean',
            'skate_id' => 'required_if:need_skates,true|exists:skates,id',
            'skate_size' => 'required_if:need_skates,true|string|max:10',
        ]);

        // Расчет стоимости
        $ticketPrice = 300;
        $skatesPrice = 0;
        
        if ($request->has('need_skates') && $request->need_skates) {
            $skate = Skate::find($request->skate_id);
            $skatesPrice = $skate->price_per_hour * $request->hours;
        }
        
        $totalPrice = $ticketPrice + $skatesPrice;

        $booking = Booking::create([
            'user_id' => Auth::id(), // Добавляем user_id
            'full_name' => $validated['full_name'],
            'phone' => $validated['phone'],
            'hours' => $validated['hours'],
            'skate_id' => $request->skate_id ?? null,
            'skate_size' => $request->skate_size ?? null,
            'total_price' => $totalPrice,
            'status' => 'pending',
        ]);

        return redirect()->route('payment.process', ['booking' => $booking->id])
            ->with('success', 'Бронирование создано. Перейдите к оплате.');
    }

    public function show(Booking $booking)
    {
        // Проверяем доступ
        if (Auth::id() !== $booking->user_id && !Auth::user()?->isAdmin()) {
            abort(403);
        }
        
        $booking->load('skate');
        return view('booking.show', compact('booking'));
    }
}
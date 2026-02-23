<?php
// app/Http/Controllers/Admin/BookingController.php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Booking;
use Illuminate\Http\Request;

class BookingController extends Controller
{
    public function index(Request $request)
    {
        $query = Booking::with(['user', 'skate']); // Загружаем связи

        // Фильтрация по статусу
        if ($request->has('status') && $request->status != '') {
            $query->where('status', $request->status);
        }

        // Поиск
        if ($request->has('search') && $request->search != '') {
            $search = $request->search;
            $query->where(function($q) use ($search) {
                $q->where('full_name', 'like', "%{$search}%")
                  ->orWhere('phone', 'like', "%{$search}%")
                  ->orWhere('payment_id', 'like', "%{$search}%");
            });
        }

        $bookings = $query->latest()->paginate(15);

        return view('admin.bookings.index', compact('bookings'));
    }

    public function show(Booking $booking)
    {
        $booking->load(['user', 'skate']); // Загружаем связи
        return view('admin.bookings.show', compact('booking'));
    }

    public function updateStatus(Request $request, Booking $booking)
    {
        $request->validate([
            'status' => 'required|in:pending,paid,cancelled'
        ]);

        $booking->update(['status' => $request->status]);

        return redirect()->back()->with('success', 'Статус бронирования успешно обновлен');
    }

    public function destroy(Booking $booking)
    {
        $booking->delete();

        return redirect()->route('admin.bookings.index')
            ->with('success', 'Бронирование успешно удалено');
    }
}
<?php
// app/Http/Controllers/Admin/DashboardController.php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Booking;
use App\Models\Ticket;
use App\Models\Skate;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $stats = [
            'total_skates' => Skate::count(),
            'available_skates' => Skate::where('is_available', true)->sum('quantity'),
            'total_bookings' => Booking::count(),
            'pending_bookings' => Booking::where('status', 'pending')->count(),
            'paid_bookings' => Booking::where('status', 'paid')->count(),
            'total_tickets' => Ticket::count(),
            'paid_tickets' => Ticket::where('status', 'paid')->count(),
            'today_bookings' => Booking::whereDate('created_at', today())->count(),
            'today_tickets' => Ticket::whereDate('created_at', today())->count(),
        ];

        $recent_bookings = Booking::with('skate')
            ->latest()
            ->limit(5)
            ->get();

        $recent_tickets = Ticket::latest()
            ->limit(5)
            ->get();

        return view('admin.dashboard', compact('stats', 'recent_bookings', 'recent_tickets'));
    }
}
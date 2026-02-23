<?php
// app/Http/Controllers/TicketController.php
namespace App\Http\Controllers;

use App\Models\Ticket;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TicketController extends Controller
{
    /**
     * Показать форму покупки билета
     */
    public function create()
    {
        return view('ticket.create');
    }

    /**
     * Сохранить билет
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'full_name' => 'required|string|max:255',
            'email' => 'nullable|email|max:255',
            'phone' => 'required|string|max:20',
        ]);

        $ticket = Ticket::create([
            'full_name' => $validated['full_name'],
            'email' => $validated['email'] ?? null,
            'phone' => $validated['phone'],
            'price' => 300,
            'status' => 'pending',
            'user_id' => Auth::id(),
        ]);

        // Здесь будет редирект на оплату
        return redirect()->route('payment.process', ['ticket' => $ticket->id])
            ->with('success', 'Билет создан. Перейдите к оплате.');
    }

    /**
     * Показать информацию о билете
     */
    public function show(Ticket $ticket)
    {
        return view('ticket.show', compact('ticket'));
    }
}
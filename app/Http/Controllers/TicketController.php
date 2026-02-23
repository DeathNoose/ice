<?php
// app/Http/Controllers/TicketController.php
namespace App\Http\Controllers;

use App\Models\Ticket;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TicketController extends Controller
{
    public function create()
    {
        return view('ticket.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'full_name' => 'required|string|max:255',
            'email' => 'nullable|email|max:255',
            'phone' => 'required|string|max:20',
        ]);

        $ticket = Ticket::create([
            'user_id' => Auth::id(), // Добавляем user_id
            'full_name' => $validated['full_name'],
            'email' => $validated['email'] ?? null,
            'phone' => $validated['phone'],
            'price' => 300,
            'status' => 'pending',
        ]);

        return redirect()->route('payment.process', ['ticket' => $ticket->id])
            ->with('success', 'Билет создан. Перейдите к оплате.');
    }

    public function show(Ticket $ticket)
    {
        // Проверяем доступ
        if (Auth::id() !== $ticket->user_id && !Auth::user()?->isAdmin()) {
            abort(403);
        }
        
        return view('ticket.show', compact('ticket'));
    }
}
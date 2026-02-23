<?php
// app/Http/Controllers/Admin/TicketController.php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Ticket;
use Illuminate\Http\Request;

class TicketController extends Controller
{
    /**
     * Display a listing of the tickets.
     */
    public function index(Request $request)
    {
        $query = Ticket::with('user');

        // Filter by status
        if ($request->has('status') && $request->status != '') {
            $query->where('status', $request->status);
        }

        // Search
        if ($request->has('search') && $request->search != '') {
            $search = $request->search;
            $query->where(function($q) use ($search) {
                $q->where('full_name', 'like', "%{$search}%")
                  ->orWhere('phone', 'like', "%{$search}%")
                  ->orWhere('email', 'like', "%{$search}%")
                  ->orWhere('payment_id', 'like', "%{$search}%");
            });
        }

        $tickets = $query->latest()->paginate(15);

        return view('admin.tickets.index', compact('tickets'));
    }

    /**
     * Display the specified ticket.
     */
    public function show(Ticket $ticket)
    {
        $ticket->load('user');
        return view('admin.tickets.show', compact('ticket'));
    }

    /**
     * Update the specified ticket's status.
     */
    public function updateStatus(Request $request, Ticket $ticket)
    {
        $request->validate([
            'status' => 'required|in:pending,paid,used'
        ]);

        $data = ['status' => $request->status];
        
        if ($request->status === 'used' && $ticket->status !== 'used') {
            $data['used_at'] = now();
        }

        $ticket->update($data);

        return redirect()->back()->with('success', 'Статус билета успешно обновлен');
    }

    /**
     * Remove the specified ticket.
     */
    public function destroy(Ticket $ticket)
    {
        $ticket->delete();

        return redirect()->route('admin.tickets.index')
            ->with('success', 'Билет успешно удален');
    }
}
<?php

namespace App\Http\Controllers;

use App\Models\Ticket;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class ticketController extends Controller
{

    public function showTicket($ticket_id)
    {
        $ticket = Ticket::find($ticket_id);
        return response()->view('panel.show-ticket', compact('ticket'));
    }

    public function listTickets()
    {
        $user = Auth::user();
        $tickets = $user->tickets;

        return response()->view('panel.list-ticket', compact('tickets'));
    }

    public function create(Request $request)
    {
        $this->validate($request, [
            'subject' => 'required|string|max:255',
            'description' => 'required|string|min:12',
        ]);
        try {
            Ticket::create([
                'user_id' => Auth::id(),
                'subject' => $request->subject,
                'description' => $request->description,
            ]);
            return redirect()->back()->with('status', 'success');
        } catch (\Exception $e) {
            Log::error($e);
            return redirect()->back()->with('status', 'error');
        }
    }

    public function newTicket()
    {
        return response()->view('panel.new-ticket');
    }
}

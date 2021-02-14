<?php

namespace App\Http\Controllers;

use App\Models\Message;
use App\Models\Ticket;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class ticketController extends Controller
{

    public function sendTicket(Request $request)
    {

        try {

            $auth_id = Auth::id();
            $ticketId = $request->input('ticket-id');
            if ($request->hasFile('file-ticket')) {
                $date = Carbon::now()->format("y_m_d");
                $path = $request->file('file-ticket')->getClientOriginalExtension();
                $fileName = $date . '.' . $path;
                $request->file('file-ticket')->storeAs("users/$auth_id/tickets/$ticketId/", $fileName);
            } else {
                $fileName = null;
            }
            Message::create([
                'ticket_id' => $ticketId,
                'message' => $request->message,
                'file' => $fileName,
                'user_type' => false
            ]);
            return redirect()->back()->with('status', 'success');
        } catch (\Exception $e) {
            Log::error($e);
            return redirect()->back()->with('status', 'error');
        }
    }

    public function showTicket($ticket_id)
    {
        $ticket = Ticket::find($ticket_id);
        $messages = $ticket->message;
        return response()->view('panel.show-ticket',
            compact('ticket', 'messages'));
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

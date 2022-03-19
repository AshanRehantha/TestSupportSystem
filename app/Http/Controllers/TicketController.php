<?php

namespace App\Http\Controllers;

use App\Mail\AdminReplyMail;
use App\Mail\TicketSubmitMail;
use App\Repositories\TicketRepositories;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class TicketController extends Controller
{
    private $ticketRepositories;

    public function __construct(TicketRepositories $ticketRepositories){
        $this->ticketRepositories = $ticketRepositories;
    }
    public function store(Request $request){
        $request->validate([
            'customer_name' => 'required',
            'customer_problem_discripction' => 'required',
            'email' => 'required',
            'phone_number' => 'required',
        ]);
        $code = $this->ticketRepositories->storeUserTicket($request);
        Mail::to($request->email)->send(new TicketSubmitMail($request, $code));
        toastr()->success(__('backend.equipment_deleted'),'');
        return back();
    }
    public function show($id){
       $data = $this->ticketRepositories->getUserTicketById($id);
       $reply = $this->ticketRepositories->getReplyTicketDetailsByID($id);
       return view('Ticket.show', compact('data', 'reply'));
    }
    public function getAdminTicketById($id){
        $data = $this->ticketRepositories->getAdminTicketById($id);
        return view('Admin.Ticket.index', compact('data'));
    }
    public function getAdminTicketReply(Request $request){
        $request->validate([
            'description' => 'required',
        ]);
        $this->ticketRepositories->replyAdminTicket($request);
        Mail::to($request->user_email)->send(new AdminReplyMail($request));
        return back();
    }
}

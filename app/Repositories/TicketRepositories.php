<?php

namespace App\Repositories;

use App\Ticket;
use App\TicketReply;
use Exception;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class TicketRepositories {

    public function storeUserTicket($request){
        try{
            $code = $this->generateUniqueCode();
            Ticket::create([
                'ticket_id' => $code,
                'name' => $request->customer_name,
                'email' => $request->email,
                'contact_number' => $request->phone_number,
                'pro_discription' => $request->customer_problem_discripction,
                'status' => 1
            ]);
            return $code;
        }catch(Exception $e){
            dd($e);
        }
    }

    public function getUserTicketById($id){
        try{
            return Ticket::where('ticket_id', $id)->first();
        }catch(Exception $e){
            dd($e);
        }
    }

    public function generateUniqueCode()
    {
        do {

         $code = Str::random(50);
        } while (Ticket::where("ticket_id", "=", $code)->first());

        return $code;
    }

    public function getAdminTicket(){
        try{
            return Ticket::get();
        }catch(Exception $e){

        }
    }
    public function getAdminTicketById($id){
        try{
            return Ticket::where('ticket_id', $id)->first();
        }catch(Exception $e){

        }
    }

    public function replyAdminTicket($request){
        try{
            TicketReply::create([
                'reply_data' => $request->description,
                'ticket_id' => $request->ticket_id,
                'reply_by' => Auth::user()->name,
            ]);
            Ticket::where('ticket_id', $request->ticket_id)->update([
                'status' => 2
                ]);
        }catch(Exception $e){
            dd($e);
        }
    }

    public function getReplyTicketDetailsByID($id){
        return TicketReply::where('ticket_id', $id)->get();
    }
}

?>

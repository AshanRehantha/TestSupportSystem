<?php

namespace App\Http\Controllers;

use App\Repositories\TicketRepositories;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    private $ticketRepositories;
    public function __construct(TicketRepositories $ticketRepositories)
    {
        $this->middleware('auth');
        $this->ticketRepositories = $ticketRepositories;
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $data = $this->ticketRepositories->getAdminTicket();
        return view('home', compact('data'));
    }
}

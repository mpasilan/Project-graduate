<?php

namespace App\Http\Controllers;

use App\Priority;
use App\User;
use Auth;
use App\Ticket;
use Illuminate\Http\Request;


class UserController extends Controller
{

	public function __construct()
    {
        $this->middleware('auth');
    }
	
    public function index()
    {
        $priority = Priority::all();
    	return view('user',compact('priority'));
    }
    public function create()
    {
    	
    }

   public function viewTicket()
   {
        $id = Auth::user()->id;
        $data = Ticket::Where('user_id',$id)->get();
        
        $priority = Priority::all();
        
       
        
       return view('user.view-ticket',compact('data','priority'));
   }

   public function createTicket()
   {

       return view('user');
   }
}

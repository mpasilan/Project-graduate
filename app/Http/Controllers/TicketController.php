<?php

namespace App\Http\Controllers;
use App\User;
use Illuminate\Http\Request;
use App\Ticket;
use Auth;
class TicketController extends Controller
{
    public function index(Request $request)
    {
        $user_id = Auth::user()->id;

        Ticket::create([
            'subject'=>$request['subject'],
            'description'=>$request['description'],
            'priority_id'=>$request['priority_id'],
            'user_id'=>$user_id,
            'status_id'=>'1',
            'assign_to'=>'0',
        ]);
        
        return redirect(url('user/view-ticket'));
    }
} 

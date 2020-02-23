<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\User;
use App\Bookings;
use Auth;

class EmployeeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $book['bookings'] = Bookings::all();

    	return view('employee',)->with($book);
    }

    public function statusSubmit(Request $request)
    {
        
        Ticket::where('ticket_id',$request['id'])
                ->update(['status_id'=>$request['status']]);
                return redirect(url("employee"));
    }
}

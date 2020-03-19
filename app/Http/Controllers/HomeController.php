<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Guest;
use App\Bookings;
use App\Rooms;
use App\Room_category;

use Auth;
use DB;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $book['bookings'] = Bookings::orderBy('created_at', 'desc')->paginate(10);

          
            

        return view('admin')->with($book);      
    }


    public function search(Request $request)
    {

        $search = $request->get('search');
        // $book['bookings'] = Bookings::where('id','=', $search)->paginate(10);
        if ($search == "") {
            $book['bookings'] = Bookings::orderBy('created_at', 'desc')->paginate(10);
        }else{
            $book['bookings'] = Bookings::wherehas('guest',function($q) use ($search){
            $q->where('bookings.id', '=', $search)
              ->orWhere('bookings.confirmed_by', '=', $search)
              ->orWhere('guests.email', '=', $search);
        })->orderBy('created_at', 'desc')->paginate(10);
        }
        
        return view('admin')->with($book);
    }

    public function showpaid(Request $request)
    {
        $paid = $request->get('p');
        $book['bookings'] = Bookings::wherehas('payment',function($q) use ($paid){
            $q->where('payment.status_id', '=', $paid);
        })->orderBy('created_at', 'desc')->paginate(10);
        return view('admin')->with($book);
    }


    public function book_recylebin(Request $request)
    {
        $id = $request['booking_id'];
        $booking = Bookings::findOrFail($id);
        $booking->delete();

        return redirect()->action('HomeController@index');
    }

    public function store()
    {
      
    }

   
}

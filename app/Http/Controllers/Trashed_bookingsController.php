<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Guest;
use App\Bookings;
use App\Rooms;
use App\Room_category;
use Carbon\Carbon;

use Auth;

class Trashed_bookingsController extends Controller
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
        $book['bookings'] = Bookings::onlyTrashed()->orderBy('deleted_at','desc')->paginate(10);

          
            

        return view('admin/trashed_bookings')->with($book);      
    }


    public function search(Request $request)
    {

        $search = $request->get('search');
        // $book['bookings'] = Bookings::where('id','=', $search)->paginate(10);

        if($search == "")
        {
        	$book['bookings'] = Bookings::onlyTrashed()->paginate(10);
        }
        	else {
        		$book['bookings'] = Bookings::wherehas('guest',function($q) use ($search){
            $q->where('bookings.id', '=', $search)
              ->orWhere('bookings.confirmed_by', '=', $search)
              ->orWhere('guests.email', '=', $search);
        })->orderBy('created_at', 'desc')->onlyTrashed()->paginate(10);
        	}
        
         return view('admin/trashed_bookings')->with($book);
    }


    public function booking_recylebin(Request $request)
    {
        $id = $request['booking'];
        $booking = Bookings::onlyTrashed()->findOrFail($id);
        if($booking->created_at < Carbon::parse('-24 hours')){
            $booking->confirmed_by = 'pending';
            $booking->created_at = $booking->updated_at;
            $booking->save();
        }
        $booking->restore();

        return redirect()->action('Trashed_bookingsController@index')->with('Success','Booking restored sucessfully!');
    }

}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Bookings;
use App\Rooms;
use App\Room_category;

class CustomAuthController extends Controller
{
	public function guestRegistrationFrom(Request $request)
	{	
		$cat_id = $request->category_id;
        $in = $request->from;
        $out = $request->to;

        $room = Rooms::whereDoesntHave('booking', function ($query) use ($in,$out){
            $query->where('bookings.check_in_date', '<', $out)->where('bookings.check_out_date', '>', $in);}
        )->where('category_id', '=', $cat_id)->with('room_category')->take(1)->get();


        return view('hotel.addbooking')->with('cat_id',$cat_id)->with('in',$in)->with('out',$out)->with('room',$room);
	}

	public function register(Request $request)
	{	
		$this->validation();
		return $request->all();
	}

	public function validation($request)
	{
		return $this->validate($request, [
			'fname' => 'required|min:2',
			'lname' => 'required|min:2',
			'address' => 'required|max:255';
			'birthdate' => 'required|max:255',
			'contactNo' => 'required|max:255',
			'email' => 'required|email|max:255',

		]);
	}
}

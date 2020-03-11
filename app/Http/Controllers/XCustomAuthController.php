<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Validator;
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

        // $room = Rooms::whereDoesntHave('booking', function ($query) use ($in,$out){
        //     $query->where('bookings.check_in_date', '<', $out)->where('bookings.check_out_date', '>', $in);}
        // )->where('category_id', '=', $cat_id)->with('room_category')->take(1)->get();


        // return view('hotel.addbooking')->with('cat_id',$cat_id)->with('in',$in)->with('out',$out)->with('room',$room);
        return view('hotel.addbooking')->with('cat_id',$cat_id)->with('in',$in)->with('out',$out);
	}


        /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
	public function register(Request $request)
	{	
        
		    $v = Validator::make($request->all(), [
                    'fname' => 'required|min:8',
                ]);

                if ($v->fails())
                {
                    return redirect('hotel/request')->withErrors($v->errors());
                }
	}

	
}

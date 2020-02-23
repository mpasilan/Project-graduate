<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Bookings;
use App\Rooms;
use App\Room_category;
use DB;

class HotelController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
         return view('hotel');  
    }

    public function getdates(Request $request)
    {
        $in = $request->in;
        $out = $request->out;
        $junior = 1;
        $standard = 2;
        $superior = 3;
        $family = 4;
        //room categories------
        $category['room_category'] = Room_category::all();

        //room count -----------------------------
        $juniorroomcount = Rooms::whereDoesntHave('booking', function ($query) use ($in,$out){
            $query->where('bookings.check_in_date', '<', $out)->where('bookings.check_out_date', '>', $in);}
        )->where('category_id', '=', $junior)->with('room_category')->count();

        $standardroomcount = Rooms::whereDoesntHave('booking', function ($query) use ($in,$out){
            $query->where('bookings.check_in_date', '<', $out)->where('bookings.check_out_date', '>', $in);}
        )->where('category_id', '=', $standard)->with('room_category')->count();
            
        $superiorroomcount = Rooms::whereDoesntHave('booking', function ($query) use ($in,$out){
            $query->where('bookings.check_in_date', '<', $out)->where('bookings.check_out_date', '>', $in);}
        )->where('category_id', '=', $superior)->with('room_category')->count();

        $familyroomcount = Rooms::whereDoesntHave('booking', function ($query) use ($in,$out){
            $query->where('bookings.check_in_date', '<', $out)->where('bookings.check_out_date', '>', $in);}
        )->where('category_id', '=', $family)->with('room_category')->count();


        if($juniorroomcount == 0){
            $juniorroomcount = 'Sorry there are no';
        }elseif ($standardroomcount == 0) {
            $standardroomcount = 'Sorry there are no';
        }elseif ($superiorroomcount == 0) {
            $superiorroomcount = 'Sorry there are no';
        }elseif ($familyroomcount == 0) {
            $familyroomcount = 'Sorry there are no';
        }
        return view('hotel.request_booking')->with('in',$in)->with($category)->with('out',$out)->with('juniorroomcount',$juniorroomcount)->with('standardroomcount',$standardroomcount)->with('superiorroomcount',$superiorroomcount)->with('familyroomcount',$familyroomcount);

    }

        public function booking(Request $request)
    {
        $cat_id = $request->category_id;
        $in = $request->from;
        $out = $request->to;

        $room = Rooms::whereDoesntHave('booking', function ($query) use ($in,$out){
            $query->where('bookings.check_in_date', '<', $out)->where('bookings.check_out_date', '>', $in);}
        )->where('category_id', '=', $cat_id)->with('room_category')->take(1)->get();


        return view('hotel.addbooking')->with('cat_id',$cat_id)->with('in',$in)->with('out',$out)->with('room',$room);
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        return view('hotel');    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}

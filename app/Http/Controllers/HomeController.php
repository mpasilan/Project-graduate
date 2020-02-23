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
        $in = '2020-02-20';
        $out = '2020-02-21';
        $book['bookings'] = Bookings::all();
          
            

        return view('admin')->with($book);      
    }
    public function store()
    {
      
    }

   
}

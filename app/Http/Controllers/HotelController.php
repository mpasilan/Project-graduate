<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Validator;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Bookings;
use App\Rooms;
use App\Room_category;
use App\Guest;
use App\Payment;
use DB;
use DateTime;

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
        $this->validate($request, [
            'in' => ['required', 'date_format:Y-m-d','after:today'],
            'out' => ['required', 'date_format:Y-m-d', 'after:in'],
            
        ]);

            $request->session()->put('dates',$request->input());
            $date = $request->session()->get('dates');
        $in = $date['in'];
        $out = $date['out'];
        $from = $date['from'];
        $to = $date['to'];
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


        // if($juniorroomcount == 0){
        //     $juniorroomcount = 'Sorry there are no';
        // }elseif ($standardroomcount == 0) {
        //     $standardroomcount = 'Sorry there are no';
        // }elseif ($superiorroomcount == 0) {
        //     $superiorroomcount = 'Sorry there are no';
        // }elseif ($familyroomcount == 0) {
        //     $familyroomcount = 'Sorry there are no';
        // }
        return view('hotel.request_booking')->with('in',$from)->with($category)->with('out',$to)->with('juniorroomcount',$juniorroomcount)->with('standardroomcount',$standardroomcount)->with('superiorroomcount',$superiorroomcount)->with('familyroomcount',$familyroomcount);

    }



    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {   
        $date = $request->session()->get('dates');
        $in = $date['in'];
        $out = $date['out'];
            $request->session()->put('category_id',$request->input());
            $category_id = $request->session()->get('category_id');
        // $category_id = $request['category_id'];
        // $room = Rooms::whereDoesntHave('booking', function ($query) use ($in,$out){
        //     $query->where('bookings.check_in_date', '<', $out)->where('bookings.check_out_date', '>', $in);}
        // )->where('category_id', '=', $category_id)->with('room_category')->take(1)->get();
           
        return view('hotel/addbooking');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    public function store(Request $request)
    {
        
        //validate guest details
         $this->validate($request, [
            'fname' => ['required', 'string', 'min:4', 'max:255'],
            'lname' => ['required', 'string', 'min:4', 'max:255'],
            'email' => ['required', 'email', 'max:255'],
            'birthdate' => ['required', 'date', 'before:18 years ago'],
            'address' => ['required', 'string', 'max:255'],
            'contact' => ['required', 'string', 'min:4', 'max:255'],
            
        ]);

         $request->session()->put('guest',$request->input());
         $guest = $request->session()->get('guest');
         $category_id = $request->session()->get('category_id');
         $c_id = $category_id['category_id'];
         $date = $request->session()->get('dates');
            $in = $date['in'];
            $out = $date['out'];
            $from = $date['from'];
            $to = $date['to'];

         $email = $request['email'];  
         //get guest ID  
         $guest = Guest::where('email', '=', $request->input('email'))->first();
            if ($guest === null) {
               Guest::create([
                'firstname' => $request['fname'],
                'lastname' => $request['lname'],
                'birthdate' => $request['birthdate'],
                'email' => $request['email'],
                'address' => $request['address'],
                'contact' => $request['contact'],
                ]);
               $guest = Guest::where('email', '=', $request->input('email'))->first();
               $g_id = $guest->id;
            } else {
                $g_id = $guest->id;
            }
            //get Payment ID
            $payments = Payment::doesntHave('booking')->count();
           if ($payments == 0) {
               Payment::create();
               $payment = Payment::doesntHave('booking')->take(1)->get();
                foreach ($payment as $p) {
                    $payment_id = $p->id;
                }
           }else{
                $payment = Payment::doesntHave('booking')->take(1)->get();
                foreach ($payment as $p) {
                    $payment_id = $p->id;
                }
           } 
                //get available rooms
                    $room = Rooms::whereDoesntHave('booking', function ($query) use ($in,$out){
                        $query->where('bookings.check_in_date', '<', $out)->where('bookings.check_out_date', '>', $in);}
                    )->where('category_id', '=', $c_id)->with('room_category')->take(1)->get();
                        foreach ($room as $r) {
                            $room_id = $r->id;
                        }

                    $date1 = new DateTime($in);
                    $date2 = new DateTime($out);
                    $interval = $date1->diff($date2);
                    $nights = $interval->format('%a'); 
                    $date = date('Ymd');
                    $time = date('His');
                    $roomcategories = Room_category::Where('id', '=', $c_id)->first();
                    $category = $roomcategories['category'];
                    $rprice = $roomcategories['price'];
                    $total = $rprice*$nights;
                    $b_Fee = ($total/100)*20;
                    $remaining = $total - $b_Fee;


                //add booking
                $booking = Bookings::where('guest_id', '=', $g_id )->where('check_in_date', '=', $in)->count();
                
                 if($booking == 0) {
                Bookings::Create([
                    'guest_id' => $g_id,
                    'adult' => $request['Adults'],
                    'children' => $request['Child'],
                    'check_in_date' => $in,
                    'check_out_date' => $out,
                    'payment_id' => $payment_id,
                    'rooms_id' => $room_id,
                    'Total' => $total,
                ]);
                    $bookings = Bookings::where('guest_id', '=', $g_id )->where('check_in_date', '=', $in)->take(1)->get();
                        foreach ($bookings as $b) {
                            $booking_id = $b->id;
                         }
                    }
                    else{
                    $bookings = Bookings::where('guest_id', '=', $g_id )->where('check_in_date', '=', $in)->take(1)->get();
                       foreach ($bookings as $b) {
                            $booking_id = $b->id;
                         } 
                        
                    }
            
            
            dd($in,$out,$rprice,$nights,$total,$b_Fee,$remaining,$category,$from,$to);
            $request->session()->put('guest',$g_id);
            $g = $request->session()->get('guest');


            return view('hotel/payment')->with('guest_id',$g_id)->with('price', $rprice)->with('bookingFee', $b_Fee)->with('balance',$remaining)->with('first', $date)->with('second', $time)->with('third',$booking_id)->with('nights',$nights)->with('category',$category);
          
             }



        public function paymentdetails(Request $request)
        { 

        $payments = Payment::doesntHave('booking')->count();
           if ($payments == 0) {
               Payment::create();
               $payment = Payment::doesntHave('booking')->take(1)->get();
                foreach ($payment as $p) {
                    $payment_id = $p->id;
                }
           }else{
                $payment = Payment::doesntHave('booking')->take(1)->get();
                foreach ($payment as $p) {
                    $payment_id = $p->id;
                }
           } 
                dd($payment_id,$in,$out);
                // Bookings::create([
                //     'time_from' => 
                // ]);

        }

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

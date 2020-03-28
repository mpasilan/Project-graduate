<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Guest;
use App\Bookings;
use App\Rooms;
use App\Room_category;
use App\Payment;

use Auth;
use DB;
use Carbon\Carbon;

use App\Mail\ConfirmationMail;
use Illuminate\Support\Facades\Mail;

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
      
      Bookings::where('created_at', '<',Carbon::parse('-24 hours'))->where('confirmed_by', '=', 'pending')->update(['confirmed_by' => 'Cancelled']); Bookings::where('confirmed_by', '=', 'Cancelled')->delete();

      
        $date_now = date("Y-m-d");
        $book['bookings'] = Bookings::where('check_in_date', '>=', $date_now)->orderBy('created_at', 'desc')->paginate(10);
            

        return view('admin')->with($book);      
    }


    public function search(Request $request)
    {

        $search = $request->get('search');
        // $book['bookings'] = Bookings::where('id','=', $search)->paginate(10);
        if ($search == "") {
            return redirect()->action('HomeController@index');
        }else{
            $book['bookings'] = Bookings::wherehas('guest',function($q) use ($search){
            $q->where('bookings.id', '=', $search)
              ->orWhere('bookings.confirmed_by', '=', $search)
              ->orWhere('guests.email', '=', $search);
        })->orderBy('created_at', 'desc')->paginate(50);
        }
        
        return view('admin')->with($book);
    }

    public function showpaid(Request $request)
    {
        $date_now = date("Y-m-d");
        $paid = $request->get('p');
        $book['bookings'] = Bookings::wherehas('payment',function($q) use ($paid){
            $q->where('payment.status_id', '=', $paid);
        })->where('check_in_date', '>=', $date_now)->orderBy('created_at', 'desc')->paginate(50);
        return view('admin')->with($book);
    }


    public function book_recylebin(Request $request)
    {
        $id = $request['booking_id'];
        $booking = Bookings::findOrFail($id);
        $booking->delete();

        return redirect()->action('HomeController@index')->with('Success','Booking removed sucessfully!');
    }

    public function confirm(Request $request)
    {   
        $email=$request['email'];
        $confirmed_by = Auth::user()->name;
        $b_id = $request['booking'];
        $Booking = Bookings::findOrFail($b_id);
            $c = $Booking->confirmed_by;
            if($c == 'pending'){
                $Booking->confirmed_by = $confirmed_by ;

                    $Booking->save();

                    $data = array(
                        'bookingID' => $request['bID'],
                        'guestname' => $request['guestName'],
                        'room' => $request['room'],
                        'night' => $request['night'],
                        'adult' => $request['adult'],
                        'children' => $request['children'],
                        'balance' => $request['balance'],
                        'from' => $request['from'],
                        'to' => $request['to']

                    );

                 Mail::to($email)->send(new ConfirmationMail($data));

              return redirect()->action('HomeController@index')->with('Success','Booking confirmed sucessfully!');
            }
            else{
                 $Booking->confirmed_by = 'pending' ;

                    $Booking->save();
                return redirect()->action('HomeController@index')->with('Success','Booking un-confirmed!');
            }
        
    }

    public function confirm_payment(Request $request)
    {
      $p_id = $request['cp_id'];
      $payment = Payment::findOrFail($p_id);
      if ($payment->status_id == 2) {
          $payment->status_id = 1;
          $payment->save();
        return redirect()->action('HomeController@index')->with('Success','Payment confirmed!');  
      }else{
        $payment->status_id = 2;
        $payment->save();
        return redirect()->action('HomeController@index')->with('Success','Payment un-confirmed!');
      }
    }

   
}

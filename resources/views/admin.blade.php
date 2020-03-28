@extends('layouts.admin_layout')

@section('content')
<!-- Page Heading -->
          <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Manage bookings</h1>

          </div>

          @if($message = Session::get('Success'))
            <div class="alert alert-success alert-block">
              <button type="button" class="close" data-dismiss="alert">x</button>
                  <strong>{{ $message }}</strong>
            </div>
          @endif

          <!-- Content Row -->
            <div class="row">
              <div class="col-md-2 offset-md-1">
                <a href="{{ route('trashed') }}"><i class="fa fa-trash-alt"></i></a>
              </div>
              
              <div class="col-md-2">
                <form action="{{ route('showpaid') }}" method="get">
                  <input type="hidden" name="p" value="1" class="form-control">
                  <span class="input-group-prepend">
                      <button type="submit" class="btn btn-success btn-sm">Show paid bookings</button>
                    </span>
                </form>
              </div>
              <div class="col-md-3">
                <form action="{{ route('showpaid') }}" method="get">
                  <input type="hidden" name="p" value="2" class="form-control">
                  <span class="input-group-prepend">
                      <button type="submit" class="btn btn-warning btn-sm">Show Unpaid bookings</button>
                    </span>
                </form>
              </div>
              <div class="col-md-3">
                <form action="{{ route('search') }}" method="get" autocomplete="off">
                  <div class="input-group">
                    <input type="text" name="search" class="form-control">
                    <span class="input-group-prepend">
                      <button type="submit" class="btn btn-dark btn-sm">Search</button>
                    </span>
                  </div>
                </form>
              </div>
            </div>
            <br>
            <div class="container-fluid">
            <table class="table table-striped">
              <thead class="thead-dark">
              <tr>
                <th>ID</th>
                <th>Booking ID</th>
                <th>Email</th>
                <th>Nights</th>
                <th>Time from</th>
                <th>Time to</th>
                <th>Status</th>
                <th>Payment status</th>
                <th>Actions</th>
              </tr>
            </thead>
                    <?php $count = 1; ?>
                    @foreach ($bookings as $booking)
                <tr>
                    
                    <td>{{$bookings ->perPage()*($bookings->currentPage()-1)+$count}} </td>
                    <td>H{{ $booking->created_at->format('YmdHs') }}Z{{$booking->id}}</td>
                    <td>{{$booking->guest->email}}</td>
                    @php
                      $in = $booking->check_in_date;
                      $out = $booking->check_out_date;
                      $date1 = new \DateTime($in);
                      $date2 = new \DateTime($out);
                      $interval = $date1->diff($date2);
                      $nights = $interval->format('%a');
                      $dob = $booking->guest->birthdate;
                      $age = Carbon\Carbon::parse($dob)->age;
                      $room_category;
                      $price;
                      if ($booking->rooms->category_id == 1){
                          $room_category = 'Junior room';
                          $price = 1600;
                      }elseif($booking->rooms->category_id == 2){
                          $room_category = "Standard room";
                          $price = 2500;
                      }elseif($booking->rooms->category_id == 3){
                          $room_category = "Superior room";
                          $price = 3000;
                      }elseif($booking->rooms->category_id == 4){
                          $room_category = "Family room";
                          $price = 4500;
                      }

                      $total = $price*$nights;
                      $bfee = ($total/100)*20;
                      $balance = $total - $bfee;
                          $booking_status =  $booking->confirmed_by;


                          if($booking_status != 'pending'){
                            $p_status = 'Partially Paid';
                                if($booking->payment->payment_status->status == 'Paid'){
                                  $p_status = 'Paid';
                                }
                            }
                            elseif($booking->payment->payment_status->status == 'Paid'){
                              $p_status = 'Paid';
                            }
                            else{
                              $p_status = 'Unpaid';
                            }
                      
                    @endphp
                    <td>{{ $nights }}</td>
                    <td>{{ $booking->check_in_date->format('M d, yy') }}</td>
                    <td>{{ $booking->check_out_date->format('M d, yy') }}</td>
                    <td>@if($booking_status != 'pending')
                          Confirmed
                          @else
                          {{$booking_status}}
                          @endif
                    </td>
                    <td>{{$p_status}}</td>
                    <td><button class="btn btn-info btn-sm" 
                      data-booking="H{{ $booking->created_at->format('YmdHs') }}Z{{$booking->id}}"
                      data-guest="{{$booking->guest->firstname}} {{$booking->guest->lastname}}" 
                      data-age="{{$age}}" 
                      data-email="{{ $booking->guest->email }}" 
                      data-address="{{$booking->guest->address}}" 
                      data-contact="{{ $booking->guest->contact }}" 
                      data-rcategory="{{$room_category}}" 
                      data-roomid="{{$booking->rooms->id}}"
                      data-in="{{ $booking->check_in_date->format('M d, yy') }}"
                      data-out="{{ $booking->check_out_date->format('M d, yy') }}"
                      data-night="{{ $nights }}"
                      data-bstatus="{{ $booking->confirmed_by }}"
                      data-pstatus="{{ $booking->payment->payment_status->status}}"
                      data-price="{{$price}}"
                      data-total="{{$total}}"
                      data-bfee="{{$bfee}}"
                      data-balance="{{$balance}}"
                      data-adult="{{$booking->adult}}"
                      data-children="{{$booking->children}}"
                      data-payment_id="{{$booking->payment->id}}"
                      data-booking_id="{{$booking->id}}"


                      data-toggle="modal" data-target="#ViewModal">View</button>
                      <button class="btn btn-danger btn-sm" data-booking="H{{ $booking->created_at->format('YmdHs') }}Z{{$booking->id}}?"  data-bid="{{$booking->id}}"  data-toggle="modal" data-target="#DeleteBooking">Delete</button>
                    </td>
                </tr>
                  <?php $count++; ?>
                      
            
                      
                      
                      

                    
                     

                    @endforeach
            </table>
             
               
             
           
             <div>
               {{ $bookings->render() }}
             </div>
              
                      

            </div>

    <div class="modal fade" id="DeleteBooking" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-header bg-gradient-danger text-white">
          <h5 id="modal-title" class="modal-title" id="exampleModalLabel">Delete confirmation</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
           <form method="post" action="{{ route('soft.destroy') }}">
            @method('POST')
            @csrf
            
        <div class="modal-body ">
          <p class="text-center">Are you sure you want to "remove" booking</p>
          <input class=" col-md-12 text-center" type="text" id="booking" value="" name="user_name" disabled>
          
          <input type="hidden" name="booking_id" id="booking_id" value="">
        </div>
        <div class="modal-footer">
                      
            <button class="btn btn-secondary" type="button" data-dismiss="modal">No</button>
            <button class="btn btn-danger" type="submit">Yes!</button>
            
                      
        </div>
          </form>
      </div>
    </div>
  </div>
        {{-- view --}}
        <div class="modal fade" id="ViewModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
      <div class="modal-content">
        <form method="POST" action="{{ route('conf.bo') }}">
              @method('POST')
                @csrf
        <div class="modal-header bg-gradient-secondary text-white">
          <h5 id="modal-title" class="modal-title" id="exampleModalLabel">View Booking</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
            
        <div class="modal-body ">
          <table class="table table-borderless">
            <tr>
              <th style="color: black;">Booking ID: <input class="view" type="text" name="" id="booking_id" value="" disabled>
                <input type="hidden" id="booking_id" value="" name="bID"></th>
                <th class="text-right">From: <input class="view" type="text" name="" id="from" value="" disabled>
                  <input type="hidden" id="from" value="" name="from"></th>
                <th>To: <input class="view" type="text" name="" id="to" value="" disabled>
                  <input type="hidden" id="to" value="" name="to"></th>
            </tr>
            <tr>
              <th>Guest name: <input class="view" type="text" name="" id="gguest" value="" disabled>
                  <input type="hidden" id="gguest" value="" name="guestName"></th>
              <th>Room category: <input class="view" type="text" name="" id="room_category" value="" disabled>
                  <input type="hidden" id="room_category" value="" name="room"></th>
              <th>Payment status: <input class="view" type="text" name="" id="pstatus" value="" disabled></th>
            </tr>

            <tr>
              <td>age: <input class="view" type="text" name="" id="gage" value="" disabled></td>
              <td>Room ID: <input class="view" type="text" name="" id="room_id" value="" disabled></td>
              <th>Confirmed by: <input class="view" type="text" name="" id="bstatus" value="" disabled></th>
            </tr>

            <tr>             
              <td>contact: <input class="view" type="text" name="" id="gcontact" value="" disabled></td>
              <td>Adlut: <input class="view" type="text" name="" id="aa" value="" disabled>
                  <input type="hidden" id="aa" value="" name="adult"></td>
              <th>room price: <input class="view" type="text" name="" id="rprice" value="" disabled></th>
            </tr>

            <tr>
              <td>Email: <input class="view" type="text" name="" id="gemail" value="" disabled>
                <input type="hidden" id="gemail" name="email"></td>
              <td>Children: <input class="view" type="text" name="" id="cc" value="" disabled=""> 
                  <input type="hidden" id="cc" calu  name="children"></td>
              <th>Upfront: <input class="view" type="text" name="" id="balance" value="" disabled>
                  <input type="hidden" id="balance" name="balance"></th>
            </tr>

            <tr>
              <td>address: <input class="view" type="text" name="" id="gaddress" value="" disabled></td>
              <td>No. of night: <input class="view" type="text" name="" id="nnight" value="" disabled>
                  <input type="hidden" id="nnight" name="night"></td>
              <th>booking fee: <input class="view" type="text" name="" id="b_fee" value="" disabled></th>
            </tr>

            <tr>
              <td></td>
              <td></td>
              <th style="font-size: 20px">Total: <input class="view" type="text" name="" id="total" value="" disabled></th>
            </tr>
          </table>
          
        </div>
        <div class="modal-footer">
                      
            
             <input type="hidden" name="booking" id="booking_id" value="">
            <input type="submit" class="btn btn-info" id="continue" value="Confirm Booking">
         </form>  

         <form method="POST" action="{{ route('conf.pa') }}">
           @method('POST')
                @csrf

                <input type="hidden" id="payment_id" name="cp_id">
                <input type="submit" class="btn btn-success" id="ok" value="Confirm Payment">
         </form>
                      
        </div>
      
      </div>
    </div>
  </div>    
    
@endsection

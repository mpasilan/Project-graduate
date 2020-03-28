@extends('layouts.hotel_layout')

@section('content')
	<!-- Hero Slider Begin -->
    <section class="room-availability spad">
        <div class="container" style="margin-top:20px">
            <div class="room-check">
                    <div class="row">
                        
                            <div class="col-6">
                                 <div class="check-form" style="background: white; height: 45em;">
                                    <h2>Payment details</h2>
                                            <table class="table table-borderless">
                                                <tr>
                                                    <th>Guest Name:</th>
                                                    <td>{{ $fname }} {{$lname}}</td>
                                                </tr>
                                                <tr>
                                                    <th>Booking ID:</th>
                                                    <td>H{{$created}}Z{{$id}}</td>
                                                </tr>
                                                <tr>
                                                    <th>No. of nights</th>
                                                    <td>{{$nights}}
                                                        @if ($nights > 1)
                                                            Nights <br>
                                                            @else
                                                                Night <br>
                                                        @endif</td>
                                                </tr>
                                                <tr>
                                                    <th> Room:</th>
                                                    <td>{{$category}} room</td>
                                                </tr>
                                                <tr>
                                                    <th> From:</th>
                                                    <td>{{$from}}</td>
                                                </tr>
                                                <tr>
                                                    <th>To:</th>
                                                    <td>{{$to}}</td>
                                                </tr>
                                                <tr>
                                                    <th>Total:</th>
                                                    <td>{{$total}}</td>
                                                </t>
                                                <tr>
                                                    <th>Booking Fee:</th>
                                                    <td>{{$bookingFee}}</td>
                                                </tr>
                                                <tr>
                                                    <th>remaining balance to<br> be paid at the hotel:</th>
                                                    <td>{{$balance}}</td>
                                                </tr>
                                            </table>
                                             

                                            <hr>
                                        <div class="card-body">
                                                
                                               <div class="form-group row"> 
                                                    
                                                <div class="form-group row mb-0">
                                                    <div class="col-md-11 ">
                                                        <button data-book="{{$id}}" data-toggle="modal" data-target="#Terms">Continue<i class="lnr lnr-arrow-right"></i></button>
                                                    </div>
                                                </div>
                                            </div>

                                            

                                        </div>
                                </div>
                            </div>
                            <div class="col-6">
                                 <div class="check-form" style="background: #b0afae;">
                                    <h2 style="font-style: italic;:">Payment to remittance example,</h2>
                                            <table class="table table-borderless">
                                                <tr>
                                                    <th>Sender's name :</th>
                                                    <td style="font-style: italic;">("your name")</td>
                                                </tr>
                                                <tr>
                                                    <th>Receiver's name/account name/Payment to:</th>
                                                    <td >Gamorot Cottages Resort-Camiguin</td>
                                                </tr>
                                                <tr>
                                                    
                                                    <th>Control no./Account no./Reference no :</th>
                                                    <td style="font-style: italic;">("Booking ID")</td>
                                                </tr>
                                                <tr>
                                                    <th>Amount :</th>
                                                    <td style="font-style: italic;">("booking fee")</td>
                                                </tr>
                                                
                                            </table>
                                            
                                        <div class="card-body">

                                            <hr>
                                                <p>Settle your booking fee through the remittances shown below</p><br>
                                                <div class="room-pic-slider room-pic-item owl-carousel">
                                                    <div class="room-pic">
                                                        <img src="{{ asset('site/img/modeofpayment.png')}}" alt="">
                                                    </div>
                                                </div>
                                </div>
                            </div>
                           
                    </div>
                </div>
            </div>
        </section>

    <div class="modal fade" id="Terms" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-header bg-gradient-default text-black">
          <h5 id="modal-title" class="modal-title" id="exampleModalLabel">TERMS AND CONDITIONS</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body ">
        <p >
            To ensure that this resort provides a safe and comfortable stay to guests, the following rules need to be followed. Not abiding by these rules may lead to cancellation of stay and/or refusal to use the resort's facilities.<br><br>


            1. A guest who intends to enter into an Accomodation Contract with the resort shall notify the Resort of the following particulars: <br>
            (a) Name, Address, Birthdate, Email Address, Contact no. of the guest. <br>
            (b) Date of accomodation.<br>
            (c) Accomodation charges. <br> <br>

            2. Valid ID or passport must be presented at Front Desk upon check-in.
             <br> <br>

            3. Guest should settle reservation fee first. If guest failed to settle reservation fee within 24 hours, booking reservation will automatically be cancelled. <br>
            (a) Payment for reservation fee can be settle through Remittances only. <br>
            (b) Full payment will be settled via cash at Front Desk. <br> <br>

            4. Standard check-out time is 2NN; Check-in time is 2PM. Early check-in and late check-out may be requested at the Front Desk. If available, charges may apply. <br> <br>

            5. Do not bring the following inside the resort premises:<br>
            (a) Animals, birds, etc. <br>
            (b) Gun, swords, etc.   <br>
            (c) Explosives, or articles containing volatile oils that may ignite or catch fire. <br>
            (d) Any other articles that may pose a threat to the safety of other guests staying in the Resort. <br><br>

            6. Smoking is strictly prohibited inside the resort premises. <br><br>

            7. Resort's standard room can accomodate 2 guests up to 3 guests only. (2 adults and 1 child 3yo below) <br>
        </p>
                  <p style="color: red">Notice: If failed to settle Booking fee (20% of total booking amount) within 24 hours,
                    booking reservation will automatically be cancelled. <br>
                    "there will be no refund on booking fee after booking cancellation" <br>
                    *Please arrive at the hotel 2hrs before the check in time or call the hotel if you can't make it on time. <br>
                    *Failed to arrive at the hotel 2hrs before check in time without notice will be mark as forfeit/cancelled. <br>
                    --Present the following upon check in:<br>
                    1. Valid id. <br>
                    2. Hard copy/picture of the reservation. <br>
                    3. Hard copy/picture of the booking fee receipt from the remittance.
                 </p>

                <p> Check <input style="width: 15px;height: 15px;" type="checkbox" name="prog"> to state you have read and agree to our Terms and Condition.</p>

        </div>
        <div class="modal-footer">
            <form method="POST" action="{{ route('hotel.payment') }}" target="_blank">
                @csrf
             <input type="hidden" name="booking" id="booking_id" value="">
            <button class="btn btn-info" type="submit" id="continue">Continue</button>
            </form>
                      
        </div>
      </div>
    </div>
  </div>
@endsection
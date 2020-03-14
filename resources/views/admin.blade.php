@extends('layouts.admin_layout')

@section('content')
<!-- Page Heading -->
          <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Manage bookings</h1>

          </div>

          <!-- Content Row -->
            <div class="row">
              <div class="col-md-2 offset-md-1">
                <a href="{{ route('trashed') }}">Trashed</a>
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
              <div class="col-md-4">
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
              <tr>
                <th>ID</th>
                <th>Booking ID</th>
                <th>Guest</th>
                <th>Nights</th>
                <th>Time from</th>
                <th>Time to</th>
                <th>Status</th>
                <th>Payment status</th>
                <th>Actions</th>
              </tr>
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
                    @endphp
                    <td>{{ $nights }}</td>
                    <td>{{ $booking->check_in_date->format('M d, yy') }}</td>
                    <td>{{ $booking->check_out_date->format('M d, yy') }}</td>
                    <td>{{ $booking->confirmed_by }}</td>
                    <td>{{ $booking->payment->payment_status->status }}</td>
                    <td><button class="btn btn-info btn-sm" data-fname=""  data-uid=""  data-toggle="modal" data-target="#ViewModal">View</button>
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
           <form method="POST" action="{{ route('soft.destroy') }}">
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
            
    
@endsection

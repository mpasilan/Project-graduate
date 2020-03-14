@extends('layouts.admin_layout')

@section('content')
<!-- Page Heading -->
          <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Trashed bookings</h1>

          </div>

          <!-- Content Row -->
            <div class="row">
              
              <div class="col-md-4 offset-md-7">
                <form action="{{ route('search.trashed') }}" method="get" autocomplete="off">
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
                      <button class="btn btn-danger btn-sm" data-uname=""  data-uid=""  data-toggle="modal" data-target="#DeleteBookingModal">Delete</button>
                    </td>
                </tr>
                  <?php $count++; ?>
                    @endforeach
            </table>
             
               
             
           
             <div>
               {{ $bookings->render() }}
             </div>
              
                      

            </div>

          
            
    
@endsection

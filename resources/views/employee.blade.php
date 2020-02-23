@extends('layouts.employee_layout')

@section('content')
	

          <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Manage bookings</h1>

          </div>

          <!-- Content Row -->

           <div class="container-fluid">
              
              <table class="table table-bordered table-striped table_row_id">
                <tr>
                  <th>Booking id</th>
                  <th>Guest name</th>
                  <th>adult/s</th>
                  <th>children</th>
                  <th>booking date<br> (dd/mm/yyyy)</th>
                  <th>check-in<br> (dd/mm/yyyy)</th>
                  <th>check-out<br> (dd/mm/yyyy)</th>
                  <th>total</th>
                  <th>payment type</th>
                  <th>payment status</th>
                  <th>confirmed by</th>
                </tr>
                 @foreach($bookings as $booking) 
                    <tr>
                      
                      <td>{{ $booking->id }} </td>
                      <td>{{ $booking->guest->firstname }}</td>
                      <td>{{ $booking->adult }}</td>
                      <td>{{ $booking->children }}</td>
                      <td>{{ $booking->created_at->format('d.m.Y') }}</td>
                      <td>{{ $booking->check_in_date->format('d.m.Y') }}</td>
                      <td>{{ $booking->check_out_date->format('d.m.Y') }}</td>
                      <td>Php00.00</td>
                      <td>{{ $booking->payment->type_of_payment->TypeOfPayment }}</td>
                      <td>{{ $booking->payment->payment_status->status }}</td>
                      <td>{{ $booking->confirmed_by }}</td>
                    </tr>
                       
                       <tr>
                            <td>{{ $booking->rooms->description }}</td>
                            <td>{{ $booking->rooms->floor }}</td>
                            <td>{{ $booking->rooms->category_id }}</td>
                            <td>{{ $booking->rooms->room_category->category }}</td>
                            <td>{{ $booking->rooms->room_category->price }}</td>
                        </tr>
                  @endforeach
                  
              </table>
              
                      

            </div>

@endsection
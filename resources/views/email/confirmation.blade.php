@component('mail::message')
#Your booking with booking ID {{$data['bookingID']}} has been confirmed!
{{$data['night']}} Night/s, from {{$data['from']}} to {{$data['to']}}<br>
Guest name: {{$data['guestname']}} <br>
x1 {{$data['room']}} {{$data['night']}} night/s <br>
{{$data['adult']}} adult <br>
{{$data['children']}} children <br>
							<br><br>
			notice:<br><br>
					"there will be no refund on booking fee after booking cancellation"<br>
                    *Please arrive at the hotel 2hrs before the check in time or call the hotel if you can't make it on time. <br>
                    *Failed to arrive at the hotel 2hrs before check in time without notice will be mark as forfeit/cancelled. 	<br>
                    --Present the following upon check in:
                    1. Valid id.
                    2. Hard copy/picture of the reservation./booking confirmation.
                    3. Hard copy/picture of the booking fee receipt from the remittance.



Cheers!,<br>
{{ config('app.name') }}
@endcomponent

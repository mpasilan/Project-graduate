<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link rel="stylesheet" href="{{ asset('site/css/bootstrap.min.css') }}" type="text/css">
</head>
<body>
	<div class="p-3 mb-2 bg-dark text-white "><p class="text-sm-right">gamorotcottages.webronins.com</p></div>
	<table class="table table-borderless">
		@foreach ($show as $s)
	<tr>
		<th>Booking ID:</th>
		<td>H{{$s->created_at->format('YmdHs')}}Z{{$s->id}}</td>
		<td></td>
	</tr>
	<tr>
		<th>Guest:</th>
		<td>{{ $s->guest->firstname }} {{ $s->guest->lastname }}</td>	
	</tr>
	<tr>
		<th>Adult:</th>
		<td>X {{ $s->adult }}</td>	
	</tr>
	<tr>
		<th>Children :<p style="font-size:10px;">(below 3yrs old)</p></th>
		<td>X {{ $s->children}}</td>	
	</tr>
	<tr>
		<th>Room:</th>
		<td>{{$c}}</td>
		<td>Php {{$rprice}}.00/Night</td>	
	</tr>
	<tr>
		<td>From {{$in->format('M d, yy')}}</td>
		<td>To {{ $out->format('M d, yy') }}</td>
		<td> x {{$nights}} @if($nights > 1)
								Nights
							@else
								Night
							@endif
		</td>
	</tr>
	<tr>
		<td></td>
		<td></td>
		<th><u>Total: Php {{$total}}.00</u></th>
	</tr>
	<tr>
		<td></td>
		<td class="text-right">Booking fee(20% of the total)</td>
		<th> - Php {{$b_Fee}}.00</th>
	</tr>
	<tr>
		<td></td>
		<td class="text-right">remaining balance to be paid at the hotel </td>
		<th>Php {{$remaining}}.00</th>
	</tr>
	
	@endforeach
</table>
	<div class="p-1 mb-0 bg-dark text-white "></div>
	<p style="font-style: italic;">Remittance payment dtails</p><br><br>
	<p style="font-weight: bold;font-style: italic;">Receiver/Account name/Payment to:<u> Gamorot Cottages Resort-Camiguin</u></p>
	<p style="font-weight: bold;font-style: italic;">Control no./Account no./Reference no :<u>(Booking ID)</u></p> <br>
	<p style="color: red;font-style: bold;">Notice:</p>
	<p style="color: red;font-style: italic; font-size: 12px;"> If failed to settle Booking fee (20% of total booking amount) within 24 hours,
                    booking reservation will automatically be cancelled. <br>
                    "there will be no refund on booking fee after booking cancellation" <br>
                    *Please arrive at the hotel 2hrs before the check in time or call the hotel if you can't make it on time. <br>
                    *Failed to arrive at the hotel 2hrs before check in time without notice will be mark as forfeit/cancelled. <br>
                    --Present the following upon check in:<br>
                    1. Valid id. <br>
                    2. Hard copy/picture of the reservation. <br>
                    3. Hard copy/picture of the booking fee receipt from the remittance.
                 </p>
</body>
</html>


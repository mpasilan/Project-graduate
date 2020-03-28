@component('mail::message')
# From: {{$data['name']}}


{{$data['message']}}<br>


email: {{ $data['email'] }}<br>
contact no. : {{$data['contact']}}
@endcomponent

@extends('layouts.hotel_layout')

@section('content')
	<!-- Hero Slider Begin -->
    <div class="hero-slider">
        <div class="slider-item">
            <div class="single-slider-item set-bg" data-setbg="{{ asset('site/img/slider-1.jpg') }}">
                <div class="container">
                   
                            <h6>From: {{ $in }} to {{ $out }}</h6>
                    
                    <div class="row">
                        
                            <div class="col-6">
                                 <div class="check-form" style="background: white; height: 45rem;">
                                    <h2>Guest details</h2>
                                <h2></h2>
                                <h4></h4>

                                

                                    {{-- @foreach($room as $r)
                                                                                                                {{ $r->id }}
                                                                                                            @endforeach --}}

                                        <div class="card-body">
                                            <form method="POST" action="{{ route('new.guest') }}">
                                                @csrf
                                                <input type="hidden" name="start" value="{{ $in }}">
                                                <input type="hidden" name="end" value="{{ $out }}">

                                                <div class="form-group row">
                                                    <div class="col-md-5 ">
                                                        <input id="fname" placeholder="{{ __('First Name') }}" type="text" class="form-control @error('fname') is-invalid @enderror" name="fname" value="{{ old('fname') }}" required autocomplete="fname" autofocus>

                                                        @error('fname')
                                                            <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                        @enderror
                                                    </div>

                                                    <div class="col-md-6">
                                                        <input placeholder="{{ __(' Last name') }}" type="text" class="form-control @error('lname') is-invalid @enderror" name="lname" value="{{ old('lname') }}" required autocomplete="lname" autofocus>

                                                        @error('lname')
                                                            <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                        @enderror
                                                    </div>
                                                
                                                </div>

                                                <div class="form-group row">
                                                    <div class="col-md-11 ">
                                                        <input placeholder="{{ __(' Address ') }}" type="text" class="form-control @error('address') is-invalid @enderror" name="address" value="{{ old('address') }}" required autocomplete="address" autofocus>

                                                        @error('address')
                                                            <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                        @enderror
                                                    </div>
                                                </div>

                                        <div class="form-group-row">
                                          <div class="col-md-11 ">
                                            <div class="datepicker">
                                                <div class="date-select">
                                                    <p>Birthdate</p>
                                                    <input type="text" class="datepicker-1" name="birthdate" id="birthdate" value="yyyy-mm-dd">
                                                    <img src="img/calendar.png" alt="">
                                                 </div>
                                             </div>
                                          </div>
                                        </div>

                                                 <div class="form-group row">
                                                    <div class="col-md-11 ">
                                                        <input id="contactNo" placeholder="{{ __('Contact Number') }}" type="text" class="form-control @error('contactNo') is-invalid @enderror" name="contactNo" value="{{ old('contactNo') }}" required autocomplete="contactNo">

                                                        @error('contactNo')
                                                            <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                        @enderror
                                                    </div>
                                                </div>


                                                

                                                <div class="form-group row">
                                                    <div class="col-md-11 ">
                                                        <input id="email" placeholder="{{ __('E-Mail Address') }}" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                                                        @error('email')
                                                            <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                        @enderror
                                                    </div>
                                                </div>

                                                <div class="form-group row">

                                                    <div class="col-md-11 ">
                                                        <input id="email-confirm" placeholder="{{ __('Confirm Email') }}" type="email" class="form-control" name="email_confirmation" required autocomplete="new-email">
                                                    </div>
                                                </div>

                                                <div class="form-group row mb-0">
                                                    <div class="col-md-11 ">
                                                        <button type="submit" class="btn btn-primary btn-user btn-block">
                                                            {{ __('Register') }}
                                                        </button>
                                                    </div>
                                                </div>
                                            </form>
                                            <hr>

                                        </div>
                                </div>
                            </div>
                           
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Hero Slider End --> 
@endsection
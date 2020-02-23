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
                                 <div class="check-form" style="background: white; height: 30rem;">
                                <h2></h2>
                                <h4></h4>

                                

                                    {{-- @foreach($room as $r)
                                                                                                                {{ $r->id }}
                                                                                                            @endforeach --}}

                                        <div class="card-body">
                                            <form method="POST" action="{{ route('register') }}">
                                                @csrf

                                                <div class="form-group row">
                                                   

                                                    <div class="col-md-11 offset-md-1">
                                                        <input id="name" placeholder="{{ __('Name') }}" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                                        @error('name')
                                                            <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                        @enderror
                                                    </div>
                                                </div>

                                                <div class="form-group row">

                                                    <div class="col-md-11 offset-md-1">
                                                        <input id="email" placeholder="{{ __('E-Mail Address') }}" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                                                        @error('email')
                                                            <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                        @enderror
                                                    </div>
                                                </div>

                                                <div class="form-group row">

                                                    <div class="col-md-11 offset-md-1">
                                                        <input id="password" placeholder="{{ __('Password') }}" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                                        @error('password')
                                                            <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                        @enderror
                                                    </div>
                                                </div>

                                                <div class="form-group row">

                                                    <div class="col-md-11 offset-md-1">
                                                        <input id="password-confirm" placeholder="{{ __('Confirm Password') }}" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                                                    </div>
                                                </div>

                                                <div class="form-group row mb-0">
                                                    <div class="col-md-11 offset-md-1">
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
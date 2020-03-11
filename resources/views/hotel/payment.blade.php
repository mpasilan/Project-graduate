@extends('layouts.hotel_layout')

@section('content')
	<!-- Hero Slider Begin -->
    <div class="hero-slider">
        <div class="slider-item">
            <div class="single-slider-item set-bg" data-setbg="{{ asset('site/img/slider-1.jpg') }}">
                <div class="container">
                   
                    
                    <div class="row">
                        
                            <div class="col-6">
                                 <div class="check-form" style="background: white; height: 45rem;">
                                    <h2>Payment details</h2>
                                            
                                            

                                          
                                            {{-- {{ $price }}
                                            {{ $bookingFee }}
                                            {{ $balance }} --}}
                                            Booking ID: HGC{{ $first,$second }}{{$third}}

                                            
                                        <div class="card-body">
                                        <form method="POST" action="{{-- {{ route('hotel.payment') }} --}}">
                                                @csrf
                                                <div class="form-group row">
                                                    
                                                <div class="form-group row mb-0">
                                                    <div class="col-md-11 ">
                                                        <button type="submit">Continue<i class="lnr lnr-arrow-right"></i></button>
                                                    </div>
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
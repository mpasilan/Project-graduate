@extends('layouts.hotel_layout')

@section('content')
	<!-- Hero Slider Begin -->
    
                   
                            


    <section class="room-availability spad">
        <div class="container" style="margin-top:20px">
            <div class="room-check">
                <div class="row">
                     <div class="col-lg-6">
                        <div class="room-item">
                            <div class="room-pic-slider room-pic-item owl-carousel">
                                <div class="room-pic">
                                    <img src="{{ asset('site/img/room/rooms-1.jpg')}}" alt="">
                                </div>
                                <div class="room-pic">
                                    <img src="{{ asset('site/img/room-slider/room-2.jpg')}}" alt="">
                                </div>
                                <div class="room-pic">
                                    <img src="{{ asset('site/img/room-slider/room-3.jpg')}}" alt="">
                                </div>
                            </div>
                            <div class="room-text" style="background: #c9b385" style="background: #c9b385">
                                <div class="room-title">
                                    <h2>Junior Room</h2>
                                    <div class="room-price">
                                        <span>From</span>
                                        <h2>₱1,600</h2>
                                    </div>
                                </div>
                                <div class="room-features">
                                    <div class="room-info">
                                        <i class="flaticon-019-television"></i>
                                        <span>Smart TV</span>
                                    </div>
                                    <div class="room-info">
                                        <i class="flaticon-029-wifi"></i>
                                        <span>High Speed Wi-Fi</span>
                                    </div>
                                    <div class="room-info">
                                        <i class="flaticon-003-air-conditioner"></i>
                                        <span>AC</span>
                                    </div>
                                    max occupancy: 2 adults.
                                    
                                </div>
                                <div class="check-form text-center">
                                    <form action="{{ route('hotel.create') }}" method="GET">
                                         @csrf
                                         <input type="hidden" name="category_id" value="1">
                                            @if($juniorroomcount>0)
                                             <label style="color:green; font-weight:bold; font-size: 20px;">( {{ $juniorroomcount }} @if($juniorroomcount>1)
                                                                                                            rooms available )
                                                                                                        @else
                                                                                                            room left, hurry!)
                                                                                                        @endif</label><br>
                                             <button type="submit">Book Now! <i class="lnr lnr-arrow-right"></i></button>
                                            @else
                                                <label style="color: firebrick; font-weight: bold;"> (  No room/s available! )</label><br>
                                         <button type="button"><a href="{{ route('hotel.index') }}#book" style="color:inherit;">Pick another dates<i class="lnr lnr-arrow-left"></i></a></button>
                                         @endif

                                      </form>  
                                </div>
                            </div>
                        </div>
                    </div>
                            <div class="col-lg-6">
                                <h4 style="float: right;">From: {{ $in }} to {{ $out }}</h4>
                            </div>
                    </div>

               <div class="row">
                     <div class="col-lg-6">
                        <div class="room-item">
                            <div class="room-pic-slider room-pic-item owl-carousel">
                                <div class="room-pic">
                                    <img src="{{ asset('site/img/room-slider/room-1.jpg')}}" alt="">
                                </div>
                                <div class="room-pic">
                                    <img src="{{ asset('site/img/room-slider/room-3.jpg')}}" alt="">
                                </div>
                                <div class="room-pic">
                                    <img src="{{ asset('site/img/room-slider/room-2.jpg')}}" alt="">
                                </div>
                            </div>
                            <div class="room-text" style="background: #c9b385">
                                <div class="room-title">
                                    <h2>Standard Room</h2>
                                    <div class="room-price">
                                        <span>From</span>
                                        <h2>₱2,500</h2>
                                    </div>
                                </div>
                                <div class="room-features">
                                    <div class="room-info">
                                        <i class="flaticon-019-television"></i>
                                        <span>Smart TV</span>
                                    </div>
                                    <div class="room-info">
                                        <i class="flaticon-029-wifi"></i>
                                        <span>High Speed Wi-Fi</span>
                                    </div>
                                    <div class="room-info">
                                        <i class="flaticon-003-air-conditioner"></i>
                                        <span>AC</span>
                                    </div>
                                    max occupancy: 2 adults + 1 kid(3yrs below).
                                    
                                </div>
                                <div class="check-form text-center">
                                    <form action="{{ route('hotel.create') }}" method="GET">
                                         @csrf
                                         <input type="hidden" name="category_id" value="2">
                                            @if($standardroomcount>0)
                                             <label style="color:green; font-weight:bold; font-size: 20px;">( {{ $standardroomcount }} @if($standardroomcount>1)
                                                                                                            rooms available )
                                                                                                        @else
                                                                                                            room left, hurry!)
                                                                                                        @endif</label><br>
                                             <button type="submit">Book Now! <i class="lnr lnr-arrow-right"></i></button>
                                            @else
                                                <label style="color: firebrick; font-weight: bold;"> (  No room/s available! )</label><br>
                                         <button type="button"><a href="{{ route('hotel.index') }}#book" style="color:inherit;">Pick another dates<i class="lnr lnr-arrow-left"></i></a></button>
                                         @endif
                                     </form>
                                        
                                </div>
                            </div>
                        </div>
                    </div>
                </div> 

               <div class="row">
                     <div class="col-lg-6">
                        <div class="room-item">
                            <div class="room-pic-slider room-pic-item owl-carousel">
                                <div class="room-pic">
                                    <img src="{{ asset('site/img/room/rooms-3.jpg')}}" alt="">
                                </div>
                                <div class="room-pic">
                                    <img src="{{ asset('site/img/room-slider/room-3.jpg')}}" alt="">
                                </div>
                                <div class="room-pic">
                                    <img src="{{ asset('site/img/room-slider/room-2.jpg')}}" alt="">
                                </div>
                            </div>
                            <div class="room-text" style="background: #c9b385">
                                <div class="room-title">
                                    <h2>Superior Room</h2>
                                    <div class="room-price">
                                        <span>From</span>
                                        <h2>₱3,000</h2>
                                    </div>
                                </div>
                                <div class="room-features">
                                    <div class="room-info">
                                        <i class="flaticon-019-television"></i>
                                        <span>Smart TV</span>
                                    </div>
                                    <div class="room-info">
                                        <i class="flaticon-029-wifi"></i>
                                        <span>High Speed Wi-Fi</span>
                                    </div>
                                    <div class="room-info">
                                        <i class="flaticon-003-air-conditioner"></i>
                                        <span>AC</span>
                                    </div>
                                    max occupancy: 2 adults + 2 kids(3yrs below).
                                    
                                </div>
                                <div class="check-form text-center">
                                    <form action="{{ route('hotel.create') }}" method="GET">
                                         @csrf
                                         <input type="hidden" name="category_id" value="3">
                                            @if($superiorroomcount>0)
                                             <label style="color:green; font-weight:bold; font-size: 20px;">( {{ $superiorroomcount }} @if($superiorroomcount>1)
                                                                                                            rooms available )
                                                                                                        @else
                                                                                                            room left, hurry!)
                                                                                                        @endif</label><br>
                                             <button type="submit">Book Now! <i class="lnr lnr-arrow-right"></i></button>
                                            @else
                                                <label style="color: firebrick; font-weight: bold;"> (  No room/s available! )</label><br>
                                         <button type="button"><a href="{{ route('hotel.index') }}#book" style="color:inherit;">Pick another dates<i class="lnr lnr-arrow-left"></i></a></button>
                                         @endif
                                     </form>
                                        
                                </div>
                            </div>
                        </div>
                    </div>
                </div> 

                <div class="row">
                     <div class="col-lg-6">
                        <div class="room-item">
                            <div class="room-pic-slider room-pic-item owl-carousel">
                                <div class="room-pic">
                                    <img src="{{ asset('site/img/room/rooms-5.jpg')}}" alt="">
                                </div>
                                <div class="room-pic">
                                    <img src="{{ asset('site/img/room-slider/room-2.jpg')}}" alt="">
                                </div>
                                <div class="room-pic">
                                    <img src="{{ asset('site/img/room-slider/room-3.jpg')}}" alt="">
                                </div>
                            </div>
                            <div class="room-text" style="background: #c9b385"  >
                                <div class="room-title">
                                    <h2>Family Room</h2>
                                    <div class="room-price">
                                        <span>From</span>
                                        <h2>₱4,500</h2>
                                    </div>
                                </div>
                                <div class="room-features">
                                    <div class="room-info">
                                        <i class="flaticon-019-television"></i>
                                        <span>Smart TV</span>
                                    </div>
                                    <div class="room-info">
                                        <i class="flaticon-029-wifi"></i>
                                        <span>High Speed Wi-Fi</span>
                                    </div>
                                    <div class="room-info">
                                        <i class="flaticon-003-air-conditioner"></i>
                                        <span>AC</span>
                                    </div>
                                    max occupancy: 4 adults + 4 kids(3yrs below).
                                </div>
                                <div class="check-form text-center">
                                    <form action="{{ route('hotel.create') }}" method="GET">
                                         @csrf
                                         <input type="hidden" name="category_id" value="4">
                                            @if($familyroomcount>0)
                                             <label style="color:green; font-weight:bold; font-size: 20px;">( {{ $familyroomcount }} @if($familyroomcount>1)
                                                                                                            rooms available )
                                                                                                        @else
                                                                                                            room left, hurry!)
                                                                                                        @endif</label><br>
                                             <button type="submit">Book Now! <i class="lnr lnr-arrow-right"></i></button>
                                            @else
                                                <label style="color: firebrick; font-weight: bold;"> (  No room/s available! )</label><br>
                                         <button type="button"><a href="{{ route('hotel.index') }}#book" style="color:inherit;">Pick another dates<i class="lnr lnr-arrow-left"></i></a></button>
                                         @endif

                                      </form>  
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
                       {{--  <table>
                    <div class="row">
                        
                        <tr>
                            @foreach($room_category as $category)

                            <td>
                        
                    <div class="col-13">
                         <div class="check-form" style="background: white;">
                        <h2>{{ $category->category }} room</h2>
                        <h4>₱{{ $category->price }}</h4>

                        <form action="{{ route('hotel.create') }}" method="GET">
                                @csrf
                            <input type="hidden" name="category_id" value="{{ $category->id }}">
                            @if($category->id == 1 && $juniorroomcount > 0 )
                                <label style="color:green; font-weight:bold;">( {{ $juniorroomcount }} @if($juniorroomcount>1)
                                                                                                            rooms available )
                                                                                                        @else
                                                                                                            room left!)
                                                                                                        @endif</label><br>
                                    <button type="submit">Book Now! <i class="lnr lnr-arrow-right"></i></button>
                                    @elseif($category->id == 2 && $standardroomcount > 0)
                                         <label style="color:green; font-weight:bold;">( {{ $standardroomcount }} room/s available )</label><br>
                                         <button type="submit">Book Now! <i class="lnr lnr-arrow-right"></i></button>
                                    @elseif($category->id == 3 && $superiorroomcount > 0)
                                         <label style="color:green; font-weight:bold;">( {{ $superiorroomcount }} room/s available )</label><br>
                                         <button type="submit">Book Now! <i class="lnr lnr-arrow-right"></i></button>
                                    @elseif($category->id == 4 && $familyroomcount > 0)
                                         <label style="color:green; font-weight:bold;">( {{ $familyroomcount }} @if($familyroomcount>1)
                                                                                                                    rooms available )
                                                                                                                @else
                                                                                                                    room left, Hurry! )
                                                                                                                @endif</label><br>
                                         <button type="submit">Book Now! <i class="lnr lnr-arrow-right"></i></button>
                                         @else
                                            <label style="color: firebrick; font-weight: bold;"> (  No room/s available! )</label><br>
                                         <button type="button"><a href="{{ route('hotel.index') }}" style="color:inherit;">back<i class="lnr lnr-arrow-left"></i></a></button>

                            @endif
                            
                       </form>
                        </div>
                    </div>
                            </td>
                             @endforeach
                        </tr>
                           
                   
                    </div>
                </table> --}}
                </div>
            </div>
        </div>
    </div>
    <!-- Hero Slider End --> 
@endsection
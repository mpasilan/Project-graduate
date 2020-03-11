@extends('layouts.hotel_layout')

@section('content')
	<!-- Hero Slider Begin -->
    <div class="hero-slider">
        <div class="slider-item">
            <div class="single-slider-item set-bg" data-setbg="{{ asset('site/img/slider-1.jpg') }}">
                <div class="container">
                   
                            <h6>From: {{ $in }} to {{ $out }}</h6>
                        
                        <br>
                        <table>
                    <div class="row">
                        
                        <tr>
                            @foreach($room_category as $category)

                            <td>
                        
                    <div class="col-13">
                         <div class="check-form" style="background: white;">
                        <h2>{{ $category->category }} rooms</h2>
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
                </table>
                </div>
            </div>
        </div>
    </div>
    <!-- Hero Slider End --> 
@endsection
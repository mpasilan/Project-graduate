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

                        <form action="{{ route('hotel.book') }}" method="post">
                                @csrf
                            <input type="hidden" name="from" value="{{ $in }}">
                            <input type="hidden" name="to" value="{{ $out }}">
                            <input type="hidden" name="category_id" id="start" class="start" value="{{ $category->id }}">
                            @if($category->id == 1)
                                <label>( {{ $juniorroomcount }} room/s available )</label><br>
                                    @elseif($category->id == 2)
                                         <label>( {{ $standardroomcount }} room/s available )</label><br>
                                    @elseif($category->id == 3)
                                         <label>( {{ $superiorroomcount }} room/s available )</label><br>
                                    @elseif($category->id == 4)
                                         <label>( {{ $familyroomcount }} room/s available )</label><br>

                            @endif
                            <button type="submit">Book Now! <i class="lnr lnr-arrow-right"></i></button>
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
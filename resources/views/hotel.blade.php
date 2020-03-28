@extends('layouts.hotel_layout')

@section('content')
	<!-- Hero Slider Begin -->
    <div class="hero-slider">
        <div class="slider-item">
            <div class="single-slider-item set-bg" data-setbg="{{ asset('site/img/slider-1.jpg') }}">
                <div class="container">
                    <div class="row">
                         <div class="col-lg-12">
                            <h1>We hope you’ll enjoy <br />your stay with us.</h1>
                        </div>
                         
                    </div>
       
                </div>
            </div>
        </div>
    </div>
    <!-- Hero Slider End -->

    <!-- Room Availability Section Begin -->
    <section class="room-availability spad">
        <div class="container">
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
                            <div class="room-text">
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
                                    <div class="room-info">
                                        <i class="flaticon-036-parking"></i>
                                        <span>Parking</span>
                                    </div>
                                    
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="check-form" id="book" style="background: white;">
                            <h2>Book now!</h2>
                            <form method="post" action="{{ route('hotel.get') }}" autocomplete="off">
                                @csrf
                                <div class="datepicker">
                                    <div class="date-select">
                                        <p><img src="{{asset('site/img/calendar.png')}}" alt=""> From</p>
                                        <input type="text" name="from" id="from" placeholder="yyyy-mm-dd" value="{{ old('from') }}" required >
                                        <input type="hidden" id="f" name="in" value="{{ old('in') }}" >
                                        
                                     </div>
                                    <div class="date-select to">
                                        <p><img src="{{asset('site/img/calendar.png')}}" alt=""> To</p>
                                        <input type="text"  name="to" id="to" placeholder="yyyy-mm-dd" value="{{ old('to') }}" required >
                                        <input type="hidden" id="t" name="out" value="{{ old('out') }}">
                                        
                                    </div>
                                </div>
                                
                                <button type="submit">CHECK Availability <i class="lnr lnr-arrow-right"></i></button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <div class="about-room">
                <div class="row">
                    <div class="col-lg-10 offset-lg-1">
                        <h2>“Customers may forget what you said  but they will never forget how you made themfeel”.</h2>
                    </div>
                </div>
                <div class="about-para">
                    <div class="row">
                        <div class="col-lg-6">
                            <p></p>
                        </div>
                        <div class="col-lg-6">
                            <p></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Room Availability Section End -->

   

    <div class="testimonial-section spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-title">
                        <h1>Guestbook</h1>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="testimonial-item">
                        <div class="tab-content">
                            <div class="tab-pane fade-in active" id="testimonial-1" role="tabpanel">
                                <div class="single-testimonial-item">
                                    <span class="test-date">02/02/2019</span>
                                    <div class="test-rating">
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                    </div>
                                    <h4>Loved It</h4>
                                    <p></p>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="testimonial-2" role="tabpanel">
                                <div class="single-testimonial-item">
                                    <span class="test-date">02/02/2019</span>
                                    <div class="test-rating">
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                    </div>
                                    <h4>Loved It2</h4>
                                    <p></p>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="testimonial-3" role="tabpanel">
                                <div class="single-testimonial-item">
                                    <span class="test-date">02/02/2019</span>
                                    <div class="test-rating">
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                    </div>
                                    <h4>Loved It3</h4>
                                    <p></p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="testimonial-author-item">
                        <ul class="nav" role="tablist">
                            <li>
                                <a data-toggle="tab" href="#testimonial-1" role="tab" class="show active">
                                    <div class="author-pic">
                                        <img src="img/testimonial/author-1.jpg" alt="">
                                    </div>
                                    <div class="author-text">
                                        <h5>John Doe <span>Berlin</span></h5>
                                    </div>
                                </a>
                            </li>
                            <li>
                                <a data-toggle="tab" href="#testimonial-2" role="tab">
                                    <div class="author-pic">
                                        <img src="img/testimonial/author-2.jpg" alt="">
                                    </div>
                                    <div class="author-text">
                                        <h5>John Doe <span>Berlin</span></h5>
                                    </div>
                                </a>
                            </li>
                            <li>
                                <a data-toggle="tab" href="#testimonial-3" role="tab">
                                    <div class="author-pic">
                                        <img src="img/testimonial/author-3.jpg" alt="">
                                    </div>
                                    <div class="author-text">
                                        <h5>John Doe <span>Berlin</span></h5>
                                    </div>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
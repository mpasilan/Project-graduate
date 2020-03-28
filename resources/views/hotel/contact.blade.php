@extends('layouts.hotel_layout')

@section('content')

    <!-- Hero Section Begin -->

    <!-- Hero Section End -->

    <!-- Contact Section Begin -->
    <section class="contact-section spad">
        <div class="container">
                @if($message = Session::get('Success'))
            <div class="alert alert-success alert-block">
              <button type="button" class="close" data-dismiss="alert">x</button>
                  <strong>{{ $message }}</strong>
            </div>
          @endif
            <div class="row">
                <div class="col-lg-6">
                    <div class="contact-left">
                        <div class="contact-information">
                            <h2>Contact Information</h2>
                            <ul>
                                <li><img src="{{ asset('site/img/placeholder-copy.png') }}" alt=""> <span>Camiguin Island, Philippines</span></li>
                                <li><img src="{{ asset('site/img/phone-copy.png') }}" alt=""> <span>+63 (9)179342526</span></li>
                                <li><img src="{{ asset('site/img/envelop.png') }}" alt=""> <span>gamorotcottages@email.com</span></li>
                                <li><img src="{{ asset('site/img/clock-copy.png') }}" alt=""> <span>Everyday: 06:00 -22:00</span></li>
                            </ul>
                        </div>
                        <div class="social-links">
                            <h2>Follow us on:</h2>
                            <a href="#"><i class="fa fa-facebook"></i></a>
                            <a href="#"><i class="fa fa-instagram"></i></a>
                            <a href="#"><i class="fa fa-linkedin"></i></a>
                            <a href="#"><i class="fa fa-pinterest"></i></a>
                            <a href="#"><i class="fa fa-twitter"></i></a>
                            <a href="#"><i class="fa fa-youtube-play"></i></a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="contact-form">
                        <h5>Write us ...</h5>
                        @if(count($errors)>0)
                            <div class="alert alert-danger">
                                <button type="button" class="close" data-dismiss="alert">x</button>
                                <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{$error}}</li>
                                @endforeach
                                </ul>
                            </div>
                        @endif
                        <form action="{{ route('send') }}" method="post" autocomplete="off">
                            @method('POST')
                            @csrf
                            <div class="row">
                                <div class="col-lg-12">
                                    <p>From</p>
                                    <div class="input-group">
                                        <input name="name" type="text" placeholder="Full Name">
                                        <img src="img/edit.png" alt="">
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="input-group">
                                        <input name="email" type="email" placeholder="Email">
                                        <img src="img/envelop-copy.png" alt="">
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="input-group phone-num">
                                        <input name="contact" type="text" placeholder="Phone">
                                        <img src="img/phone-copy.png" alt="">
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <div class="message">
                                        <p>Message</p>
                                        <div class="textarea">
                                            <textarea name="message" placeholder="Hi ..."></textarea>
                                            <img src="img/speech-copy.png" alt="">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <button type="submit">Send <i class="lnr lnr-arrow-right"></i></button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Contact Section End -->

    <!-- Map Section Begin -->
    <div class="map" id="map">
        <iframe
             src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d126043.05521166639!2d124.64988996853643!3d9.16840866576044!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x33006e51e5910223%3A0x44092d466e4378b0!2sCamiguin%20Island!5e0!3m2!1sen!2sph!4v1580016442149!5m2!1sen!2sph"

            height="560" style="border:0;" allowfullscreen=""></iframe>
    </div>
    <!-- Map Section End -->
@endsection
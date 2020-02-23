@extends('layouts.hotel_layout')

@section('content')

    <!-- Hero Section Begin -->
    <section class="hero-section set-bg" data-setbg="{{ asset('site/img/contact-bg.jpg') }}">
        <div class="hero-text">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <h1>Contact</h1>
                    </div>
                </div>
                <div class="page-nav">
                    <a href="./news.html" class="left-nav"><i class="lnr lnr-arrow-left"></i> News</a>
                </div>
            </div>
        </div>
    </section>
    <!-- Hero Section End -->

    <!-- Contact Section Begin -->
    <section class="contact-section spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    <div class="contact-left">
                        <div class="contact-information">
                            <h2>Contact Information</h2>
                            <ul>
                                <li><img src="{{ asset('site/img/placeholder-copy.png') }}" alt=""> <span>Camiguin Island, Philippines</span></li>
                                <li><img src="{{ asset('site/img/phone-copy.png') }}" alt=""> <span>+63 (9)179342526</span></li>
                                <li><img src="{{ asset('site/img/envelop.png') }}" alt=""> <span>hotel@email.com</span></li>
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
                        <form action="#">
                            <div class="row">
                                <div class="col-lg-12">
                                    <p>From</p>
                                    <div class="input-group">
                                        <input type="text" placeholder="Full Name">
                                        <img src="img/edit.png" alt="">
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="input-group">
                                        <input type="email" placeholder="Email">
                                        <img src="img/envelop-copy.png" alt="">
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="input-group phone-num">
                                        <input type="text" placeholder="Phone">
                                        <img src="img/phone-copy.png" alt="">
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <div class="message">
                                        <p>Message</p>
                                        <div class="textarea">
                                            <textarea placeholder="Hi ..."></textarea>
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
@extends('layout.index')

@section('content')
    <div class="container mt-5">
        <h1 style="font-weight: bold; color: gray;">Our Story</h1>

        <!-- Widget activities -->
        <section class="relative tf-widget-activities pd-main overflow-hidden mt-3x`">
            <div class="container">
                <div class="row z-index3 relative">
                    <div class="col-lg-3 col-md-12 col-sm-12 col-xs-12">
                        <img src="{{ asset('assets/item/Group124.png') }}" alt="image" class="mask-top" width="10%" style="opacity: 0.3;">
                    </div>
                    <div class="col-lg-9 col-md-12 col-sm-12 col-xs-12 z-index3">
                        <div class="tf-widget-activities-content">
                            {!! $aboutAs->description !!}
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- YouTube Video -->
        <section class="widget-counter relative mt-5" id="selection-2">
            <div class="container">
                <div class="row mb--20em relative z-index3">
                    <div class="col-12 wow fadeInUp animated" data-wow-delay="0.1s">
                        <div class="tf-counter center tf-countto" id="myVideo">
                            @if(!empty($aboutAs->video))
                                {!! $aboutAs->video !!}
                            @else
                                <iframe width="560" height="315" src="https://www.youtube.com/embed/defaultVideoID" frameborder="0" allowfullscreen></iframe>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Destination Section -->
        <section class="widget-destination1 pd-main relative mt-5">
            <div class="tf-container text-center">
                <div class="destination-grid z-index3 relative d-flex justify-content-center flex-wrap">
                    @foreach($count as $co)
                        <div class="destination-tour center wow fadeInUp animated m-3" data-wow-delay="0.1s">
                            <div class="destination-tour-list">
                                <div class="tour1">
                                    <h1 class="title-heading wow fadeInUp animated gold">{{ $co['count'] }}</h1>
                                </div>
                            </div>
                            <div class="title-tour">{{ $co['type_paket'] }}</div>
                        </div>
                    @endforeach 
                    <div class="destination-tour center wow fadeInUp animated m-3" data-wow-delay="0.1s">
                        <div class="destination-tour-list">
                            <div class="tour1">
                                <h1 class="title-heading wow fadeInUp animated gold">{{ $aboutAs->destinasi_tour }}</h1>
                            </div>
                        </div>
                        <div class="title-tour">Destinasi Tour</div>
                    </div>
                    <div class="destination-tour center wow fadeInUp animated m-3" data-wow-delay="0.1s">
                        <div class="destination-tour-list">
                            <div class="tour1">
                                <h1 class="title-heading wow fadeInUp animated gold">{{ $aboutAs->customer }}</h1>
                            </div>
                        </div>
                        <div class="title-tour">Customer</div>
                    </div>
                    <div class="destination-tour center wow fadeInUp animated m-3" data-wow-delay="0.1s">
                        <div class="destination-tour-list">
                            <div class="tour1">
                                <h1 class="title-heading wow fadeInUp animated gold">{{ $aboutAs->personal_team }}</h1>
                            </div>
                        </div>
                        <div class="title-tour">Professional Team</div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Instagram CTA Section -->
        <section class="relative span1 mt-5 mb-5">
            <div class="container d-flex justify-content-center">
                <div class="card card-span1">
                    <div class="card-body m-3">
                        <div class="row">
                            <div class="col-md-6">
                                <h3 class="card-title">Hi <span style="color: #DF2595;">travelers</span>, Yuk gabung bersama dengan lainnya di Instagram!</h3>
                                <p>Bagikan momen jalan-jalan ke tempat favoritmu bersama Daffana Nusantara dengan hashtag <span style="color: #DF2595;">#daffananusantara</span></p>
                            </div>
                            <div class="col-md-6 position-relative">
                                <img src="{{ asset('assets/item/Rectangle.png') }}" alt="" class="position-absolute card-span1-img start-50 translate-middle-x">
                            </div>
                            <div class="col-md-6 position-relative d-flex justify-content-end">
                                <a href="#" class="btn btn-lg rounded-pill card-span1-btn">Follow dn_tour_travel</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection

@section('css')
    <style>
        .swiper-button-next {
            background-image: url('{{ asset('assets/icons/chevron-right.svg') }}');
            background-size: 30px 30px;
            background-repeat: no-repeat;
            background-position: center;
        }

        .swiper-button-next::after,
        .swiper-button-prev::after {
            display: none;
        }

        .swiper-button-prev {
            background-image: url('{{ asset('assets/icons/chevron-left.svg') }}');
            background-size: 30px 30px;
            background-repeat: no-repeat;
            background-position: center;
        }

        .bg-awan {
            background-color: transparent;
            background-size: cover;
            background-position: center;
            margin-top: -240px;
        }

        .span1 {
            background-color: transparent;
            margin-top: -220px;
        }

        .card-span1 {
            width: 80%;
            height: 50px;
            border-radius: 15px;
            background-color: #FFD859;
        }

        .card-span1-img {
            z-index: 1;
            top: -200px;
        }

        .card-span1-btn {
            background-color: #DF2595;
            color: white;
            top: 80px;
            left: 140px;
            z-index: 3;
            position: relative;
        }

        @media (max-width: 576px) {
            .bg-awan { margin-top: -50px; }
            .span1 { margin-top: -30px; }
            .card-span1 { min-height: 1000px; }
            .card-span1-img { top: 0; }
            .card-span1-btn { top: 430px; left: 0px; }
        }

        @media (min-width: 577px) and (max-width: 768px) {
            .bg-awan { margin-top: -90px; }
            .span1 { margin-top: -150px; }
            .card-span1 { min-height: 700px; }
            .card-span1-img { top: 0; }
            .card-span1-btn { top: 80px; left: 140px; }
        }

        @media (min-width: 769px) and (max-width: 992px) {
            .bg-awan { margin-top: -130px; }
            .span1 { margin-top: -90px; }
            .card-span1 { min-height: 450px; }
            .card-span1-img { top: 0; }
            .card-span1-btn { top: 80px; left: 140px; }
        }

        @media (min-width: 993px) {
            .bg-awan { margin-top: -195px; }
            .span1 { margin-top: -20px; }
            .card-span1 { min-height: 480px; }
            .card-span1-img { top: -230px; }
            .card-span1-btn { top: 80px; left: 140px; }
        }

        .gold {
            color: #f39c12;
            font-size: 30px;
            font-weight: bold;
        }

        h1, h2 {
            color: #2c3e50;
        }

        p, ul {
            font-size: 16px;
            line-height: 1.6;
        }

        #selection-2 {
            border-radius: 25px;
        }

        #myVideo {
            position: relative;
            padding-bottom: 56.25%;
            height: 0;
            overflow: hidden;
            max-width: 100%;
        }

        #myVideo iframe {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
        }

        @media (max-width: 576px) {
            #selection-2 { margin: 2em auto; top: -60px; left: 25px; width: 85%; }
            #myVideo { top: -155px; left: -50px; }
        }

        @media (min-width: 577px) and (max-width: 768px) {
            #selection-2 { margin: 2em auto; top: 40px; left: 25px; width: 85%; }
            #myVideo { top: -200px; left: -50px; }
        }

        @media (min-width: 769px) and (max-width: 992px) {
            #selection-2 { margin: 2em auto; top: 26px; left: 25px; width: 85%; }
            #myVideo { top: -210px; left: -50px; }
        }

        @media (min-width: 993px) {
            #selection-2 { margin: 2em auto; top: 100px; left: 25px; width: 85%; }
            #myVideo { top: -250px; left: -50px; }
        }
    </style>
@endsection

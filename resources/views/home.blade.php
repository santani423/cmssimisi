@extends('layout.index')

@section('content')
    <!-- Widget Offer Package -->
    <!-- Widget Slider -->
    {{-- <section class="slider relative">
        <div class="swiper mySwiper">
            <div class="swiper-wrapper">
                @foreach ($banner as $item)
                    <div class="slider-home1 relative overflow-hidden swiper-slide"
                        style="background-color: #eaeaea;">
                        <img src="{{ asset($item->image_path) }}"
                            alt="{{ $item->title }}"
                            style="position: absolute; inset: 0; width: 100%; height: 100%; object-fit: cover; z-index: 0; pointer-events: none; user-select: none;"
                            loading="lazy"
                            fetchpriority="high"
                            decoding="async"
                            onload="this.style.opacity=1"
                            onerror="this.style.display='none';"
                        >
                        <div class="slider-content" style="position: relative; z-index: 1;">
                            <div class="tf-container">
                                <div class="row">
                                    <div class="col-lg-8">
                                        <h1 class="title-slide text-white mb-32 fadeInDown wow">
                                            {{ $item->title }}
                                        </h1>
                                        <p class="des text-white mb-45 fadeInDown wow">
                                            {{ $item->description }}
                                        </p>
                                        <div class="btn-group">
                                            <a href="{{ $item->discover_more }}" class="btn btn-danger btn-lg rounded-pill">
                                                <p class="btn-main-text">Discover More</p>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                                <div class="row justify-content-end">
                                    <div class="col-lg-8">
                                        <div class="tab-content" id="myTabContent">
                                            <div class="tab-pane fade show active" id="new-york-tab-pane" role="tabpanel"
                                                aria-labelledby="new-york-tab" tabindex="0">
                                                <div class="row">
                                                    @foreach ($item->SubBannersImage as $image)
                                                        <div class="col-6 col-sm-6 col-lg-3 mt-4">
                                                            <img src="{{ asset($image->path_img) }}" alt=""
                                                                width="100%" height="100%" loading="lazy" decoding="async">
                                                        </div>
                                                    @endforeach
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach

            </div>
            <div class="btn-nex-prev">
                <div class="swiper-button-next  next-home1"></div>
                <div class="swiper-button-prev  prev-home1"></div>
            </div>
        </div>
    </section> --}}
    <!-- Widget Slider -->

    <section class="slider position-relative w-100" style="height: auto;">
        <div class="swiper mySwiper w-100">
            <div class="swiper-wrapper">
                @foreach ($banner as $item)
                    <div class="slider-home1 position-relative overflow-hidden swiper-slide w-100"
                        style="background-color: #eaeaea;">

                        <img src="{{ asset($item->image_path) }}" alt="{{ $item->title }}" class="d-block w-100"
                            style="height: auto; object-fit: cover; pointer-events: none; user-select: none; transition: opacity .3s;"
                            loading="lazy" fetchpriority="high" decoding="async" onload="this.style.opacity=1"
                            onerror="this.style.display='none';">

                        <div
                            class="slider-content position-absolute top-0 start-0 w-100 h-100 d-flex align-items-center z-1">
                            <div class="container">
                                <div class="row">
                                    <div class="col-lg-8">
                                        {{-- Konten di sini --}}
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>




    <section class="team-member-page pd-main">
        <div class="tf-container">
            <div class="row mb-40">
                <div class="col-lg-12">
                    <div class="center m0-auto w-text-heading">

                        <h3 class="title-heading ">{{ $package->desc }} </h3>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6 mx-auto mb-3">
                    <div class="position-relative">
                        <img src="{{ asset($package->img_1) }}" alt="" class="rounded"
                            style="border-radius: 15px; width: 100%;">
                        <div class="position-absolute bottom-0 start-0 text-white p-2">
                            <h5 class="text-white">{{ $package->title_img_1 }}</h5>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 mx-auto">
                    <div class="row">

                        <div class="col-md-6 mb-2">
                            <div class="position-relative">
                                <img src="{{ asset($package->img_2) }}" alt="" class="rounded"
                                    style="border-radius: 15px; width: 100%;">
                                <div class="position-absolute bottom-0 start-0 text-white p-2">
                                    <h5 class="text-white">{{ $package->title_img_2 }}</h5>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 mb-2">
                            <div class="position-relative">
                                <img src="{{ asset($package->img_3) }}" alt="" class="rounded"
                                    style="border-radius: 15px; width: 100%;">
                                <div class="position-absolute bottom-0 start-0 text-white p-2">
                                    <h5 class="text-white">{{ $package->title_img_3 }}</h5>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 mb-2">
                            <div class="position-relative">
                                <img src="{{ asset($package->img_4) }}" alt="" class="rounded"
                                    style="border-radius: 15px; width: 100%;">
                                <div class="position-absolute bottom-0 start-0 text-white p-2">
                                    <h5 class="text-white">{{ $package->title_img_4 }}</h5>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 mb-2">
                            <div class="position-relative">
                                <img src="{{ asset($package->img_5) }}" alt="" class="rounded"
                                    style="border-radius: 15px; width: 100%;">
                                <div class="position-absolute bottom-0 start-0 text-white p-2">
                                    <h5 class="text-white">{{ $package->title_img_5 }}</h5>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="mt-4 text-center">
                    <a href="{{ route('paket.index') }}" class="btn btn-success btn-lg rounded-pill">Explore Now</a>
                </div>
            </div>

        </div>
    </section>
    <!-- Widget Counter -->
    <section class="relative" style="background-color: #00B0EF; border-radius: 50% 50% 0 0; margin-bottom: 0px;">
        <div class="tf-container">
            <div class="row mt-5">
                <div class="col-lg-12">
                    <div class="center m0-auto w-text-heading mb-40">
                        <p class="text-white mt-5">ABOUT DAFFANA NUSANTARA</p>
                        <p class="text-white"><strong class="fw-bold">{{ $aboutAs->description }}</strong></p>
                        <div class="mt-4 text-center">
                            <a href="#" class="btn btn-lg rounded-pill"
                                style="border: 2px solid white; background-color: transparent; color: white;">Explore
                                Now</a>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </section>
    <section style="background-color: #00B0EF; margin-top: -60px;">
        <div class="tf-container">
            <div class="row mt-5">
                <div class="col-lg-12">
                    <div class="center m0-auto w-text-heading mb-40">

                        <img src="{{ asset('assets/item/group126.png') }}" alt="">
                    </div>
                </div>
            </div>

        </div>
    </section>
    <section style="background-color: #00B0EF; margin-top: -60px;">
        <div class="tf-container">
            <div class="row mt-5">
                <div class="col-lg-12">
                    <div class="center m0-auto w-text-heading mb-40">
                        <p class="text-white mt-5">TOURS PACKAGE</p>
                        <h3 class="text-white">Telusuri beragam pilihan destinasi liburan</h3>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12 relative">
                    <div class="swiper serviceSwiper relative overflow-hidden pb-60">
                        <div class="swiper-wrapper">
                            @foreach ($paket as $item)
                                <div class="swiper-slide">
                                    <div class="tour-listing box-sd">
                                        <a href="{{ route('paket.show', $item->code) }}" class="tour-listing-image">

                                            <img src="{{ asset($item->thumbnail_img) }}" alt="Image Listing">

                                        </a>
                                        <div class="tour-listing-content">
                                            <span class="map"> <svg xmlns="http://www.w3.org/2000/svg" width="16"
                                                    height="16" fill="currentColor" class="bi bi-geo-alt me-2"
                                                    viewBox="0 0 16 16">
                                                    <path
                                                        d="M12.166 8.94c-.26.35-.578.77-.927 1.23-.774.99-1.675 2.06-2.239 2.727a.58.58 0 0 1-.86 0c-.564-.667-1.465-1.737-2.239-2.727a31.634 31.634 0 0 1-.927-1.23C4.478 7.98 4 6.92 4 6a4 4 0 1 1 8 0c0 .92-.478 1.98-1.834 2.94zM8 8a2 2 0 1 0 0-4 2 2 0 0 0 0 4z" />
                                                </svg>
                                                {{ $item->wilayah->name }}</span>
                                            <h3 class="title-tour-list">
                                                <p
                                                    style="white-space: nowrap; overflow: hidden; text-overflow: ellipsis; display: block; color: #000; font-weight: bold;">
                                                    {{ $item->name }}
                                                </p>
                                            </h3>


                                            <div class="row">
                                                <div class="col-8">
                                                    <p style="color: gray;">Start From</p>
                                                    <h5 style="color: orange;">
                                                        {{ 'Rp ' . number_format($item->price, 0, ',', '.') }}</h5>
                                                    <h6 style="color: orange;">/Orang</h6>
                                                </div>
                                                <div class="col-4 d-flex justify-content-end align-items-center"
                                                    style="text-align: right;">
                                                    <a href="{{ route('paket.show', $item->code) }}"
                                                        class="tour-listing-image"> <img
                                                            src="{{ asset('assets/item/Group74.svg') }}" alt=""
                                                            style="width: 50px; height: 50px;"> </a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                        <div class="swiper-pagination"></div>
                    </div>
                </div>
            </div>
        </div>
        <img src="{{ asset('assets/item/blek.png') }}" alt="" style="width: 100%; max-width: 100%;">
    </section>

    <section class="relative bg-awan">

        <img src="{{ asset('assets/item/awan-full2.png') }}" alt="" style="width: 100%; max-width: 100%;">

    </section>
    <section class="relative span1">
        <div class="container d-flex justify-content-center">
            <div class="card card-span1">
                <div class="card-body m-3">
                    <div class="row">
                        <div class="col-md-6">

                            <h3 class="card-title">Hi <span style="color: #DF2595;">travelers</span>, Yuk
                                gabung bersama dengan lainnya di
                                Instagram!</h3>
                            <p>Bagikan momen jalan-jalan ke tempat favoritmu bersama Daffana Nusantara
                                dengan hashtag <span style="color: #DF2595;">#daffananusantara</span> </p>
                        </div>
                        <div class="col-md-6 position-relative">
                            <img src="{{ asset('assets/item/Rectangle.png') }}" alt=""
                                class="position-absolute  card-span1-img start-50 translate-middle-x">
                        </div>
                        <div class="col-md-6 position-relative d-flex justify-content-end">
                            <a href="#" class="btn btn-lg rounded-pill card-span1-btn">Follow
                                dn_tour_travel</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>


    <!-- Widget Top this Week -->
    <section class="top-this-week pd-main">
        <div class="tf-container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="mb-37 center">
                        <p class="text-black mt-5">TOURS PACKAGE</p>
                        <h3 class="text-black">Telusuri beragam pilihan destinasi liburan</h3>
                    </div>
                </div>
                <div class="col-lg-12 relative top-this-week-slide">
                    <div class="swiper populer-activities overflow-hidden">
                        <div class="swiper-wrapper">
                            @foreach ($ruangMedia as $item)
                                <a href="{{ route('ruang-media.show', $item->code) }}">
                                    <div class="swiper-slide">
                                        <div class="tour-listing box-sd">
                                            <p class="tour-listing-image">

                                                <img src="{{ asset($item->thumbnail_img) }}" alt="Image Listing">

                                            </p>
                                            <div class="tour-listing-content">

                                                <h3 class="title-tour-list "><a class="text-black"
                                                        style="text-decoration: none;"
                                                        href="{{ route('ruang-media.show', $item->code) }}">{{ $item->title }}</a>
                                                </h3>
                                                <p>{{ $item->created_at->format('M d, Y') }}</p>
                                            </div>
                                        </div>
                                    </div>
                                </a>
                            @endforeach
                        </div>
                    </div>
                    <div class="swiper-button-next"></div>
                    <div class="swiper-button-prev">

                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Widget Top this Week -->
    <!-- Widget destination -->
    <section class="widget-destination1 pd-main relative">
        <div class="tf-container">
            <div class="row mb-50 z-index3 relative">

                <div class="col-lg-12">
                    <div class="mb-37 center">

                        <h3 class="text-black">Our Client</h3>
                    </div>
                </div>
            </div>
            <div class="destination-grid z-index3 relative">
                @foreach ($ourClean as $item)
                    <div class="destination-tour center wow fadeInUp animated " id="out_clean" data-wow-delay="0.1s">

                        <img src="{{ asset($item->img) }}" alt="" width="10%" height="10%">

                        <div class="title-tour">
                            {{ $item->name }}
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
    <!-- Widget destination -->
@endsection


@section('css')
    <style>
        .swiper-button-next {
            background-image: url('{{ asset('assets/icons/chevron-right.svg') }}');
            /* ganti dengan icon kamu */
            background-size: 30px 30px;
            /* Atur ukuran background */
            background-repeat: no-repeat;
            background-position: center;
        }

        .swiper-button-next::after {
            display: none;
        }

        .swiper-button-prev {
            background-image: url('{{ asset('assets/icons/chevron-left.svg') }}');
            /* ganti dengan icon kamu */
            background-size: 30px 30px;
            /* Atur ukuran background */
            background-repeat: no-repeat;
            background-position: center;
        }

        .swiper-button-prev::after {
            display: none;
            /* sembunyikan pseudo-element default dari Swiper */
        }

        .swiper-button-prev::after {
            display: none;
            /* sembunyikan pseudo-element default dari Swiper */
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
            .bg-awan {
                margin-top: -50px;
            }

            .span1 {
                margin-top: -30px;
            }

            .card-span1 {

                min-height: 1000px;
            }

            .card-span1-img {
                top: 0;
            }

            .card-span1-btn {

                top: 430px;
                left: 0px;
            }
        }

        @media (min-width: 577px) and (max-width: 768px) {
            .bg-awan {
                margin-top: -90px;
            }

            .span1 {
                margin-top: -150px;
            }

            .card-span1 {

                min-height: 700px;
            }

            .card-span1-img {
                top: 0;
            }

            .card-span1-btn {

                top: 80px;
                left: 140px;
            }
        }

        @media (min-width: 769px) and (max-width: 992px) {
            .bg-awan {
                margin-top: -130px;
            }

            .span1 {
                margin-top: -90px;
            }

            .card-span1 {

                min-height: 630px;
            }

            .card-span1-img {
                top: 0;
            }

            .card-span1-btn {

                top: 80px;
                left: 140px;
            }
        }

        @media (min-width: 993px) {
            .bg-awan {
                margin-top: -195px;
            }

            .span1 {
                margin-top: -20px;
            }

            .card-span1 {
                min-height: 480px;
            }

            .card-span1-img {
                top: -230px;
            }

            .card-span1-btn {

                top: 80px;
                left: 140px;
            }
        }
    </style>
@endsection
@section('script')
    {{-- <script>
        document.querySelector('.swiper-button-prev').textContent = `<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-left" viewBox="0 0 16 16">
                                        <path fill-rule="evenodd" d="M15 8a.5.5 0 0 1-.5.5H2.707l4.147 4.146a.5.5 0 0 1-.708.708l-5-5a.5.5 0 0 1 0-.708l5-5a.5.5 0 1 1 .708.708L2.707 7.5H14.5A.5.5 0 0 1 15 8z"/>
                                    </svg>`;
    </script> --}}
@endsection

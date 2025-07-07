<!DOCTYPE html>
<html lang="en-US">
<head>
    <meta charset="utf-8">
    <title id="title">Daffana Nusantara</title>
    <meta name="author" content="themesflat.com">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <link rel="icon" type="image/x-icon" id="favico" href="{{ asset('assets/logo/logo1.png') }}">
    <link rel="stylesheet" href="{{ asset('vitour/app/css/app.css') }}">
    <link rel="stylesheet" href="{{ asset('vitour/app/css/magnific-popup.css') }}">
    <link rel="stylesheet" href="{{ asset('vitour/app/css/jquery.fancybox.min.css') }}">
    <link rel="stylesheet" href="{{ asset('vitour/app/css/textanimation.css') }}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.4/dist/css/bootstrap.min.css" rel="stylesheet" crossorigin="anonymous">
    @yield('css')
</head>
<body class="body header-fixed counter-scroll">
    <div id="wrapper">
        <div id="pagee" class="clearfix">
            <!-- Main Header -->
            <header class="main-header flex">
                <div id="header">
                    <nav class="navbar navbar-expand-lg navbar-light bg-white container">
                        <div class="d-flex align-items-center w-100">
                            <div class="logo-box" style="margin-right: auto; text-align: left;">
                                <a href="{{ route('home') }}">
                                    <img src="{{ asset('assets/logo/logo.svg') }}" alt="Logo" style="height: 40px;">
                                </a>
                            </div>
                            <button class="navbar-toggler mr-5" type="button" data-bs-toggle="collapse"
                                data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false"
                                aria-label="Toggle navigation" style="margin: 16px;">
                                <span class="navbar-toggler-icon"></span>
                            </button>
                            <div class="collapse navbar-collapse justify-content-end" id="navbarNav" style="margin-left: 16px;">
                                <ul class="navbar-nav mb-2 mb-lg-0 ml-2" id="main-navbar">
                                    <li><a href="{{ route('home') }}" class="nav-link active" aria-current="page">Beranda</a></li>
                                    <li class="nav-item dropdown" id="paketDropdownWrapper">
                                        <a class="nav-link dropdown-toggle active" href="#" id="paketDropdown"
                                            role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                            Paket Tur-
                                        </a>
                                        <ul class="dropdown-menu" aria-labelledby="paketDropdown">
                                            <li><a class="dropdown-item" href="#">Paket Domestik</a></li>
                                        </ul>
                                    </li>
                                    <li><a href="{{ route('ruang-media.index') }}" class="nav-link active" aria-current="page">Ruang Media</a></li>
                                    <li><a href="{{ route('sewa.transportasi') }}" class="nav-link active" aria-current="page">Sewa Transportasi</a></li>
                                    <li><a href="{{ route('tes.timoni') }}" class="nav-link active" aria-current="page">Testimoni</a></li>
                                    <li><a href="{{ route('about.as') }}" class="nav-link active" aria-current="page">Tentang Kami</a></li>
                                </ul>
                            </div>
                        </div>
                    </nav>
                </div>
                <!-- Mobile Menu (kosong, bisa diisi sesuai kebutuhan) -->
            </header>
            <!-- End Main Header -->

            <main id="main">
                @yield('content')
            </main>

            <footer class="footer footer-style1">
                <div class="tf-container">
                    <div class="footer-main">
                        <div class="row">
                            <div class="col-md-2">
                                <div class="logo-footer" id="logo-footer"></div>
                            </div>
                            <div class="col-md-4">
                                <h5 class="title">Alamat </h5>
                                <p class="des-footer text-white" id="addres"></p>
                                <ul class="footer-info">
                                    <li class="flex-three">
                                        <i class="icon-noun-mail-5780740-1"></i>
                                        <p>Info@webmail.com</p>
                                    </li>
                                    <li class="flex-three">
                                        <i class="icon-Group-9"></i>
                                        <p>684 555-0102 490</p>
                                    </li>
                                    <li class="flex-three">
                                        <i class="icon-Layer-19"></i>
                                        <p>6391 Elgin St. Celina, NYC 10299</p>
                                    </li>
                                </ul>
                            </div>
                            <div class="col-md-2">
                                <h5 class="title">Navigation</h5>
                                <ul class="footer-menu text-white">
                                    <li><a href="/" class="text-white" style="text-decoration: none;">Home</a></li>
                                    <li><a href="{{ route('paket.index') }}" class="text-white" style="text-decoration: none;">Paket Tur</a></li>
                                    <li><a href="{{ route('ruang-media.index') }}" class="text-white" style="text-decoration: none;">Ruang Media</a></li>
                                    <li><a href="{{ route('sewa.transportasi') }}" class="text-white" style="text-decoration: none;">Sewa Transportasi</a></li>
                                    <li><a href="{{ route('tes.timoni') }}" class="text-white" style="text-decoration: none;">Testimoni</a></li>
                                    <li><a href="{{ route('about.as') }}" class="text-white" style="text-decoration: none;">Tentang Kami</a></li>
                                </ul>
                            </div>
                            <div class="col-md-2">
                                <h5 class="title">Get in touch</h5>
                                <h3 class="text-white" id="phone">021 345 678 910</h3>
                                <div id="email" class="text-white"></div>
                                <ul class="social-ft flex-three mt-4" style="gap: 15px; display: flex;">
                                    <li id="instagram"></li>
                                    <li id="tiktok"></li>
                                    <li id="youtube"></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="row footer-bottom">
                        <div class="col-md-12 text-center">
                            <p class="copy-right">Copyright © 2025 Daffana Nusantara - Powered by <a href="https://toffeltechasia.com" class="text-main">Toffel Tech Asia</a></p>
                        </div>
                    </div>
                </div>
            </footer>
        </div>
    </div>

    <div id="whatsapp"></div>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.4/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
    <script src="{{ asset('vitour/app/js/jquery.min.js') }}"></script>
    <script src="{{ asset('vitour/app/js/jquery.nice-select.min.js') }}"></script>
    <script src="{{ asset('vitour/app/js/swiper-bundle.min.js') }}"></script>
    <script src="{{ asset('vitour/app/js/swiper.js') }}"></script>
    <script src="{{ asset('vitour/app/js/plugin.js') }}"></script>
    <script src="{{ asset('vitour/app/js/count-down.js') }}"></script>
    <script src="{{ asset('vitour/app/js/countto.js') }}"></script>
    <script src="{{ asset('vitour/app/js/jquery.fancybox.js') }}"></script>
    <script src="{{ asset('vitour/app/js/jquery.magnific-popup.min.js') }}"></script>
    <script src="{{ asset('vitour/app/js/price-ranger.js') }}"></script>
    <script src="{{ asset('vitour/app/js/textanimation.js') }}"></script>
    <script src="{{ asset('vitour/app/js/wow.min.js') }}"></script>
    <script src="{{ asset('vitour/app/js/shortcodes.js') }}"></script>
    <script src="{{ asset('vitour/app/js/main.js') }}"></script>

    <script>
        $(document).ready(function() {
            function show() {
                $.ajax({
                    url: '{{ route('api.setting.index') }}',
                    method: 'GET',
                }).done(function(response) {
                    let settings = response.data || {};
                    $('#addres').html(settings.address || '-');
                    $('#phone').html(settings.phone || '-');
                    $('#email').html(
                        settings.email
                        ? `<a href="mailto:${settings.email}" class="flex-three text-white" style="text-decoration: none;">
                                <img src="{{ asset('assets/item/email.png') }}" style="width: 30px;" class="ml-2" alt="">
                                ${settings.email}
                            </a>`
                        : '-'
                    );
                    $('#instagram').html(
                        settings.instagram
                        ? `<a href="${settings.instagram}" target="_blank" class="flex-three text-white" style="text-decoration: none;">
                                <img src="{{ asset('assets/item/instagram.png') }}" style="width: 30px;" class="ml-2" alt="">
                            </a>`
                        : ''
                    );
                    $('#tiktok').html(
                        settings.tiktok
                        ? `<a href="${settings.tiktok}" target="_blank" class="flex-three text-white" style="text-decoration: none;">
                                <img src="{{ asset('assets/item/tiktok.png') }}" style="width: 30px;" class="ml-2" alt="">
                            </a>`
                        : ''
                    );
                    $('#youtube').html(
                        settings.youtube
                        ? `<a href="${settings.youtube}" target="_blank" class="flex-three text-white" style="text-decoration: none;">
                                <img src="{{ asset('assets/item/youtube.png') }}" style="width: 40px;" class="ml-2" alt="">
                            </a>`
                        : ''
                    );
                    if (settings.whatsapp) {
                        let whatsappNumber = settings.whatsapp.startsWith('0') ? '62' + settings.whatsapp.substring(1) : settings.whatsapp;
                        $('#whatsapp').html(
                            `<a href="https://wa.me/${whatsappNumber}" target="_blank">
                                <img src="{{ asset('assets/item/logos_whatsapp-icon.png') }}" alt="WhatsApp" style="position: fixed; bottom: 20px; right: 20px; z-index: 1000; width: 60px; height: 60px;">
                            </a>`
                        );
                    }
                    if (settings.logo) {
                        $('#logo-footer').html(`<img src="{{ asset('') }}${settings.logo}" alt="Logo Footer">`);
                    }
                    if (settings.favicon) {
                        $('#favico').attr('href', `{{ asset('') }}${settings.favicon}`);
                    }
                }).fail(function(xhr, status, error) {
                    console.error('Error:', error);
                });
            }

            function paket() {
                $.ajax({
                    url: '{{ route('paket.jenis-paket') }}',
                    method: 'GET',
                }).done(function(response) {
                    let jenisPaket = (response.data && response.data) ? response.data : [];
                    let typePaket = (response.data && response.typePakets) ? response.typePakets : [];
                    console.log('typePaket',jenisPaket);
                    
                    let html = '';
                    jenisPaket.forEach(function(type) {
                        html += `<li class="nav-item dropdown">
                                    <a class="nav-link dropdown-toggle active" href="#" id="paketDropdown${type.id}"
                                        role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                        ${type.name}
                                    </a>
                                    <ul class="dropdown-menu" aria-labelledby="paketDropdown${type.id}">`;
                        (typePaket || []).forEach(function(paket) {
                            html += `<li><a class="dropdown-item" href="/paket_jenis?type_paket=${paket.code}&jenis_paket=${type.code}">${paket.name}</a></li>`;
                        });
                        html += `</ul></li>`;
                    });
                    if (html) {
                        $('#paketDropdownWrapper').replaceWith(html);
                    }
                }).fail(function(xhr, status, error) {
                    console.error('Error:', error);
                });
            }

            paket();
            show();
        });
    </script>
    @yield('script')
</body>
</html>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta name="description" content="" />
    <meta name="author" content="ThemeMakker" />
    <link rel="icon" href="{{ asset('favicon.ico') }}" type="image/x-icon" />
    <title>Daffana Nusantara</title>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" />

    <style>
        body {
            font-family: Arial, sans-serif;
        }

        .offcanvas {
            width: 250px;
        }

        .navbar-brand {
            font-weight: bold;
            color: #0d6efd !important;
        }

        .navbar-toggler {
            border: none;
        }

        .navbar-nav {
            background-color: #dc3545;
            border-radius: 8px;
            padding: 0.5rem 1rem;
        }

        .navbar-nav .nav-link {
            color: #fff !important;
            font-weight: 500;
            margin: 0 0.5rem;
        }

        .navbar-nav .nav-link:hover {
            color: #ffdede !important;
        }

        #main-menu li {
            list-style: none;
            margin: 8px 0;
        }

        #main-menu li a {
            display: block;
            padding: 8px 10px;
            border-radius: 6px;
            color: #212529;
            text-decoration: none;
        }

        #main-menu li a:hover {
            background-color: #f1f1f1;
        }

        #main-menu .g_heading {
            font-size: 14px;
            font-weight: bold;
            color: #6c757d;
            margin-top: 10px;
            margin-bottom: 5px;
        }

        .bg-light {
            --bs-bg-opacity: 1;
            background-color: #6574cd !important;
        }

        #logo-img img {
            width: 50%;
            height: auto;
        }
    </style>
</head>

<body>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-light bg-light shadow-sm sticky-top">
        <div class="container-fluid">
            <!-- Sidebar toggle -->
            <button class="btn btn-outline-primary me-2" type="button" data-bs-toggle="offcanvas"
                data-bs-target="#sidebarMenu" aria-controls="sidebarMenu" style="background-color: #f1f1f1">
                ☰
            </button>

            <!-- Navbar toggler -->
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <!-- Navbar links -->
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav ms-auto mb-2 mb-lg-0">

                    <li class="nav-item">
                        <form action="{{ route('profile') }}" method="GET" class="d-inline">
                            <button type="submit" class="nav-link btn btn-link">Profile</button>
                        </form>
                    </li>

                   

                    <li class="nav-item">
                        <form action="{{ route('logout') }}" method="POST" class="d-inline">
                            @csrf
                            <button type="submit" class="nav-link btn btn-link">Log Out</button>
                        </form>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Sidebar Offcanvas -->
    <div class="offcanvas offcanvas-start" tabindex="-1" id="sidebarMenu" aria-labelledby="sidebarMenuLabel">
        <div class="offcanvas-header">
            <h5 class="offcanvas-title" id="sidebarMenuLabel">Menu Utama</h5>
            <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas"
                aria-label="Close"></button>
        </div>
        <div class="offcanvas-body">
            <div class="user-info text-center mb-3">
                <div id="logo-img">
                    <img src="{{ asset('admin/assets/images/user.png') }}" alt="User">
                </div>
            </div>
            <ul id="main-menu" class="list-unstyled">
                <li class="g_heading">Main</li>
                <li><a href="{{ route('cms') }}"><i class="ti-dashboard"></i> Dashboard</a></li>

                <!-- Dropdown Paket -->
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="paketDropdown" role="button"
                        data-bs-toggle="dropdown" aria-expanded="false">
                        <i class="ti-package"></i> Paket
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="paketDropdown" id="nav-paket-list">
                        <!-- list jenis paket dimuat via JS -->
                    </ul>
                </li>

                <li><a href="{{ route('cms.sewa_transportasi.index') }}"><i class="ti-gallery"></i> Sewa Kendaraan</a></li>
                <li><a href="{{ route('cms.ruang.media') }}"><i class="ti-gallery"></i> Ruang Media</a></li>

                <!-- Dropdown Website -->
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="websiteDropdown" role="button"
                        data-bs-toggle="dropdown" aria-expanded="false">
                        <i class="ti-layout"></i> Website
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="websiteDropdown">
                        <li><a class="dropdown-item" href="{{ route('cms.banner') }}"><i class="ti-image"></i> Banner</a></li>
                        <li><a class="dropdown-item" href="{{ route('cms.tes_timoni') }}"><i class="ti-image"></i> Testimoni</a></li>
                        <li><a class="dropdown-item" href="{{ route('cms.our_clean.index') }}"><i class="ti-image"></i> Our Client</a></li>
                        <li><a class="dropdown-item" href="{{ route('cms.about_us.index') }}"><i class="ti-settings"></i> About Us</a></li>
                        <li><a class="dropdown-item" href="{{ route('cms.setting') }}"><i class="ti-settings"></i> Setting</a></li>
                    </ul>
                </li>
            </ul>
        </div>
    </div>

    <!-- Content -->
    <main class="container mt-4">@yield('content')</main>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

    @yield('script')

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            // Load Paket into Sidebar Dropdown
            fetch('/api/jenis-paket')
                .then(response => response.json())
                .then(data => {
                    const container = document.getElementById('nav-paket-list');
                    if (data?.data) {
                        let html = '';
                        data.data.forEach(item => {
                            html += `<li><a class="dropdown-item" href="/cms/paket/jenis-paket/${item.code}">${item.name}</a></li>`;
                        });
                        container.innerHTML = html;
                    }
                })
                .catch(error => console.error('Error fetching type-paket:', error));

            // Set logo + title
            fetch('{{ route('api.setting.index') }}')
                .then(res => res.json())
                .then(response => {
                    const logoImg = document.getElementById('logo-img').querySelector("img");

                    if (response?.data?.logo) {
                        logoImg.src = `/${response.data.logo}`;
                    }

                    if (response?.data?.title) {
                        document.title = response.data.title;
                    }
                })
                .catch(err => console.error('Error fetching settings:', err));
        });
    </script>
</body>

</html>

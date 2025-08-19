<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="ThemeMakker">
    <link rel="icon" href="favicon.ico" type="image/x-icon">
    <title id="titelWeb">Daffana Nusantara</title>

    <link rel="stylesheet" href="{{ asset('admin/assets/vendor/themify-icons/themify-icons.css') }}">
    <link rel="stylesheet" href="{{ asset('admin/assets/vendor/fontawesome/css/font-awesome.min.css') }}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.4/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-DQvkBjpPgn7RC31MCQoOeC9TI2kdqa4+BSgNMNj8v77fdC77Kj5zpWFTJaaAoMbC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.4/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YUe2LzesAfftltw+PEaao2tjU/QATaW/rOitAq67e0CT0Zi2VVRL0oC4+gAaeBKu" crossorigin="anonymous">
    </script>
    @yield('css')
    <link rel="stylesheet" href="{{ asset('admin/assets/css/main.css') }}" type="text/css">
</head>

<body class="theme-indigo">
    <!-- Page Loader -->
    <div class="page-loader-wrapper">
        <div class="loader">
            <div class="m-t-30"><img src="{{ asset('assets\logo\logo.svg') }}" width="48" height="48"
                    alt="ArrOw"></div>
            <p>Please wait...</p>
        </div>
    </div>

    <nav class="navbar custom-navbar navbar-expand-lg py-2">
        <div class="container-fluid px-0">
           
            <div id="navbar_main">
                
                <ul class="navbar-nav ml-auto"> 
                    <li class="nav-item dropdown">
                        <a class="nav-link nav-link-icon" href="javascript:void(0);" id="navbar_1_dropdown_3"
                            role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i
                                class="fa fa-list"></i></a>
                        <div class="dropdown-menu dropdown-menu-right">
                            <h6 class="dropdown-header">User menu</h6>
                            <a class="dropdown-item" href="{{ route('profile') }}"><i
                                    class="fa fa-user text-primary"></i>Profile</a> 
                            <div class="dropdown-divider" role="presentation"></div>
                            <a class="dropdown-item" href="{{ route('logout') }}"
                                onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                <i class="fa fa-sign-out text-primary"></i>Sign out
                            </a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="main_content" id="main-content">

        <div class="left_sidebar">
            <nav class="sidebar">
                <div class="user-info">
                    <div class="image" id="logo-img"><a href="javascript:void(0);"><img
                                src="{{ asset('admin/assets/images/user.png') }}" alt="User"></a></div>
                </div>
                <ul id="main-menu" class="metismenu">
                    <li class="g_heading">Main</li>
                    <li><a href="{{ route('cms') }}"><i class="ti-dashboard"></i><span>Dashboard</span></a></li>
                    <li>
                        <a href="javascript:void(0)" class="has-arrow"><i class="ti-package"></i><span>Paket</span></a>
                        <ul id="nav-paket-list">
                        </ul>
                    </li>
                    <li><a href="{{ route('cms.sewa_transportasi.index') }}"><i class="ti-gallery"></i><span>Sewa Kendaraan</span></a>
                    </li>
                    <li><a href="{{ route('cms.ruang.media') }}"><i class="ti-gallery"></i><span>Ruang Media</span></a>
                    </li>
                    <li>
                        <a href="javascript:void(0)" class="has-arrow"><i class="ti-layout"></i><span>Website</span></a>
                        <ul>
                            <li><a href="{{ route('cms.banner') }}"><i class="ti-image"></i>Banner</a></li>
                            <li><a href="{{ route('cms.tes_timoni') }}"><i class="ti-image"></i>Testimoni</a></li>
                            <li><a href="{{ route('cms.our_clean.index') }}"><i class="ti-image"></i>Our Client</a></li> 
                            <li><a href="{{ route('cms.about_us.index') }}"><i class="ti-settings"></i>About Us</a></li>
                            <li><a href="{{ route('cms.setting') }}"><i class="ti-settings"></i>Setting</a></li>
                        </ul>
                    </li>
                </ul>
            </nav>
        </div>

       

        <div class="page">
            @yield('content')
        </div>
    </div>

    <!-- Javascript -->
    <script src="{{ asset('admin/assets/bundles/libscripts.bundle.js') }}"></script>
    <script src="{{ asset('admin/assets/bundles/vendorscripts.bundle.js') }}"></script>

    <script src="{{ asset('admin/assets/js/theme.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
        integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.4/dist/js/bootstrap.min.js"
        integrity="sha384-Re460s1NeyAhufAM5JwfIGWosokaQ7CH15ti6W5Y4wC/m4eJ5opJ2ivohxVM05Wd" crossorigin="anonymous">
    </script>
    @yield('script')

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            fetch('/api/jenis-paket')
                .then(response => response.json())
                .then(data => {
                    const container = $('#nav-paket-list');

                    if (data?.data) {
                        let html = '';
                        data.data.forEach(item => {
                            console.log('Processing item:', item);
                            html +=
                                `<li><a href="${route('cms/paket/jenis-paket', { code: item.code })}">${item.name}</a></li>`;
                        });
                        container.append(html);
                    } else {
                        console.error('Invalid data structure:', data);
                    }
                })
                .catch(error => console.error('Error fetching type-paket:', error));
        });

        function route(name, params) {
            let url = `/${name}/${params?.code}`; // Adjust this line based on your routing structure
            if (params && typeof params === 'object') {
                Object.keys(params).forEach(key => {
                    url = url.replace(`:${key}`, params[key]);
                });
            }
            return url;
        }

        function setlogo(page = 1, wilayah_id = null) {
            $.ajax({
                url: '{{ route('api.setting.index') }}',
                method: 'GET',
            }).done(function(response) {

                const logo = document.getElementById('logo-img');
              
               
                console.log('Logo response:', response?.data?.title);
                if (response?.data?.logo) {
                    const html = `<img src="/${response.data.logo}" alt="Logo" style="width: 30%; height: 30%;">`;
                    logo.innerHTML =   html;

                }
                if (response?.data?.title) {
                    document.getElementById("titelWeb").innerText = response.data.title;
                }



            }).fail(function(xhr, status, error) {
                console.error('Error:', error);
            });
        }

        setlogo();
    </script>
</body>

</html>

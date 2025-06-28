<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="ThemeMakker">
    <link rel="icon" href="favicon.ico" type="image/x-icon">
    <title>Daffana Nusantara</title>

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
            {{-- <a href="javascript:void(0);" class="menu_toggle"><i class="fa fa-align-left"></i></a> --}}
            {{-- <a href="index.html" class="navbar-brand"><img src="{{ asset('admin/assets/images/brand/icon.svg') }}"
                    alt="BigBucket" /> --}}
            {{-- <strong>Big</strong> Bucket</a> --}}
            <div id="navbar_main">
                {{-- <ul class="navbar-nav mr-auto hidden-xs">
                    <li class="nav-item page-header">
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="index.html"><i class="fa fa-home"></i></a></li>
                            <li class="breadcrumb-item active">Stater Page</li>
                        </ul>
                    </li>
                </ul> --}}
                <ul class="navbar-nav ml-auto">
                    {{-- <li class="nav-item hidden-xs">
                        <form class="form-inline main_search">
                            <input class="form-control form-control-sm mr-sm-2" type="search" placeholder="Search..."
                                aria-label="Search">
                        </form>
                    </li> --}}
                    {{-- <li class="nav-item"><a class="nav-link nav-link-icon" href="javascript:void(0);"><i
                                class="fa fa-cogs"></i></a></li> --}}
                    {{-- <li class="nav-item dropdown">
                        <a class="nav-link nav-link-icon" href="javascript:void(0);" id="navbar_1_dropdown_2"
                            role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i
                                class="fa fa-bell"></i></a>
                        <div class="dropdown-menu dropdown-menu-right dropdown-menu-xl py-0">
                            <div class="py-3 px-3">
                                <h5 class="heading h6 mb-0">Notifications <span
                                        class="badge badge-pill badge-primary text-uppercase float-right">3</span></h5>
                            </div>
                            <div class="list-group">
                                <a href="javascript:void(0);" class="list-group-item list-group-item-action d-flex">
                                    <div class="list-group-img"><span class="avatar bg-purple">JD</span></div>
                                    <div class="list-group-content">
                                        <div class="list-group-heading">Johnyy Depp <small>10:05 PM</small></div>
                                        <p class="text-sm">Lorem ipsum dolor consectetur adipiscing eiusmod tempor</p>
                                    </div>
                                </a>
                                <a href="javascript:void(0);" class="list-group-item list-group-item-action d-flex">
                                    <div class="list-group-img"><span class="avatar bg-pink">TC</span></div>
                                    <div class="list-group-content">
                                        <div class="list-group-heading">Tom Cruise <small>10:05 PM</small></div>
                                        <p class="text-sm">Lorem ipsum dolor sit amet consectetur eiusmod tempor</p>
                                    </div>
                                </a>
                                <a href="javascript:void(0);" class="list-group-item list-group-item-action d-flex">
                                    <div class="list-group-img"><span class="avatar bg-blue">WS</span></div>
                                    <div class="list-group-content">
                                        <div class="list-group-heading">Will Smith <small>10:05 PM</small></div>
                                        <p class="text-sm">Lorem sit amet consectetur adipiscing eiusmod tempor</p>
                                    </div>
                                </a>
                            </div>
                            <div class="py-3 text-center">
                                <a href="javascript:void(0);" class="link link-sm link--style-3">View all
                                    notifications</a>
                            </div>
                        </div>
                    </li> --}}
                    <li class="nav-item dropdown">
                        <a class="nav-link nav-link-icon" href="javascript:void(0);" id="navbar_1_dropdown_3"
                            role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i
                                class="fa fa-list"></i></a>
                        <div class="dropdown-menu dropdown-menu-right">
                            <h6 class="dropdown-header">User menu</h6>
                            <a class="dropdown-item" href="{{ route('profile') }}"><i
                                    class="fa fa-user text-primary"></i>Profile</a>
                            {{-- <a class="dropdown-item" href="javascript:void(0);"><span
                                    class="float-right badge badge-success">$50K</span><i
                                    class="fa fa-briefcase text-primary"></i>My Balance</a>
                            <a class="dropdown-item" href="javascript:void(0);"><span
                                    class="float-right badge badge-warning">4</span><i
                                    class="fa fa-envelope text-primary"></i>Inbox</a>
                            <a class="dropdown-item" href="javascript:void(0);"><i
                                    class="fa fa-cog text-primary"></i>Settings</a> --}}
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

        <div class="right_sidebar">
            <div class="setting_div">
                <a href="javascript:void(0);" class="rightbar_btn"><i class="fa fa-cog fa-spin"></i></a>
            </div>
            <ul class="nav nav-pills nav-fill flex-column flex-sm-row mx-3 my-3" id="myTab" role="tablist">
                <li class="nav-item"><a class="nav-link active" id="Settings-tab" data-toggle="tab" href="#Settings"
                        role="tab" aria-controls="Settings" aria-selected="true">Settings</a>
                </li>
                <li class="nav-item"><a class="nav-link" id="Contact-tab" data-toggle="tab" href="#Contact"
                        role="tab" aria-controls="Contact" aria-selected="false">Contact</a></li>
            </ul>
            <hr>
            <div class="tab-content" id="myTabContent">
                <div class="tab-pane show active" id="Settings" role="tabpanel" aria-labelledby="Settings-tab">
                    <div class="sidebar-scroll">
                        <div class="sidebar-widget px-3">
                            <h5>Theme Setting</h5>
                            <ul class="choose-skin list-unstyled">
                                <li data-theme="black">
                                    <div class="black"></div>
                                </li>
                                <li data-theme="azure">
                                    <div class="azure"></div>
                                </li>
                                <li data-theme="indigo" class="active">
                                    <div class="indigo"></div>
                                </li>
                                <li data-theme="purple">
                                    <div class="purple"></div>
                                </li>
                                <li data-theme="orange">
                                    <div class="orange"></div>
                                </li>
                                <li data-theme="green">
                                    <div class="green"></div>
                                </li>
                                <li data-theme="cyan">
                                    <div class="cyan"></div>
                                </li>
                                <li data-theme="blush">
                                    <div class="blush"></div>
                                </li>
                            </ul>
                            <ul class="setting-list list-unstyled mt-3">
                                <li>
                                    <label class="custom-switch">
                                        <span class="custom-switch-description">Dark Sidebar</span>
                                        <label class="toggle-switch switch-sm mb-0">
                                            <input type="checkbox" class="switch-dark">
                                            <span class="toggle-switch-slider"></span>
                                        </label>
                                    </label>
                                </li>
                                <li>
                                    <label class="custom-switch">
                                        <span class="custom-switch-description">Mini Sidebar</span>
                                        <label class="toggle-switch switch-sm mb-0">
                                            <input type="checkbox" class="switch-sidebar">
                                            <span class="toggle-switch-slider"></span>
                                        </label>
                                    </label>
                                </li>
                            </ul>
                            <hr>
                        </div>
                        <div class="sidebar-widget px-3">
                            <h5>Language Setting</h5>
                            <select class="selectpicker" title="Select language">
                                <option>English</option>
                                <option>Spanish</option>
                                <option>Chinese</option>
                                <option>Hindi</option>
                                <option>Arabic</option>
                            </select>
                            <hr>
                        </div>
                        <div class="sidebar-widget px-3">
                            <h5>General Setting</h5>
                            <ul class="setting-list list-unstyled mt-3">
                                <li>
                                    <label class="custom-switch">
                                        <span class="custom-switch-description">Report Panel Usage</span>
                                        <label class="toggle-switch switch-sm mb-0">
                                            <input type="checkbox" checked>
                                            <span class="toggle-switch-slider"></span>
                                        </label>
                                    </label>
                                </li>
                                <li>
                                    <label class="custom-switch">
                                        <span class="custom-switch-description">Email Redirect</span>
                                        <label class="toggle-switch switch-sm mb-0">
                                            <input type="checkbox" checked>
                                            <span class="toggle-switch-slider"></span>
                                        </label>
                                    </label>
                                </li>
                                <li>
                                    <label class="custom-switch">
                                        <span class="custom-switch-description">Notifications</span>
                                        <label class="toggle-switch switch-sm mb-0">
                                            <input type="checkbox">
                                            <span class="toggle-switch-slider"></span>
                                        </label>
                                    </label>
                                </li>
                                <li>
                                    <label class="custom-switch">
                                        <span class="custom-switch-description">Location Permission</span>
                                        <label class="toggle-switch switch-sm mb-0">
                                            <input type="checkbox" checked>
                                            <span class="toggle-switch-slider"></span>
                                        </label>
                                    </label>
                                </li>
                            </ul>
                            <hr>
                        </div>
                        <div class="sidebar-widget px-3">
                            <div class="progress-wrapper">
                                <h4 class="progress-label text-uppercase">New Project</h4>
                                <h4 class="progress-percentage text-uppercase">$950</h4>
                                <div class="progress" style="height: 5px;">
                                    <div class="progress-bar bg-purple" role="progressbar" aria-valuenow="40"
                                        aria-valuemin="0" aria-valuemax="100" style="width: 40%;"></div>
                                </div>
                            </div>
                            <div class="progress-wrapper">
                                <h4 class="progress-label text-uppercase"> Admin</h4>
                                <h4 class="progress-percentage text-uppercase">$10k</h4>
                                <div class="progress" style="height: 5px;">
                                    <div class="progress-bar bg-orange" role="progressbar" aria-valuenow="78"
                                        aria-valuemin="0" aria-valuemax="100" style="width: 78%;"></div>
                                </div>
                            </div>
                            <div class="progress-wrapper">
                                <h4 class="progress-label text-uppercase">Balance</h4>
                                <h4 class="progress-percentage text-uppercase">$50k</h4>
                                <div class="progress" style="height: 5px;">
                                    <div class="progress-bar bg-green" role="progressbar" aria-valuenow="55"
                                        aria-valuemin="0" aria-valuemax="100" style="width: 55%;"></div>
                                </div>
                            </div>
                            <hr>
                            <div class="progress-wrapper">
                                <h4 class="progress-label text-uppercase">Storage</h4>
                                <h4 class="progress-percentage text-uppercase">35GB</h4>
                                <div class="progress" style="height: 5px;">
                                    <div class="progress-bar bg-red" role="progressbar" aria-valuenow="89"
                                        aria-valuemin="0" aria-valuemax="100" style="width: 89%;"></div>
                                </div>
                            </div>
                            <button type="button" class="btn btn-primary btn-block btn-animated btn-animated-x">
                                <span class="btn-inner--visible">Upgrade Now</span>
                                <span class="btn-inner--hidden"><i class="fas fa-arrow-right"></i></span>
                            </button>
                        </div>
                    </div>
                </div>
                <div class="tab-pane" id="Contact" role="tabpanel" aria-labelledby="Contact-tab">
                    <div class="sidebar-widget px-3">
                        <ul class="list-unstyled contact-list">
                            <li class="d-flex align-items-center">
                                <span class="contact-img">
                                    <img src="{{ asset('admin/assets/images/xs/avatar1.jpg') }}" class="rounded"
                                        alt="">
                                </span>
                                <h4 class="contact-name">Vincent Porter <span class="d-block">London UK</span></h4>
                                <div class="action">
                                    <a href="javascript:void(0);" class="btn btn-sm btn-outline-primary"><i
                                            class="fab fa-skype"></i></a>
                                    <a href="javascript:void(0);" class="btn btn-sm btn-outline-primary"><i
                                            class="fa fa-envelope"></i></a>
                                </div>
                            </li>
                            <li class="d-flex align-items-center">
                                <span class="contact-img" id="logo-img">
                                    <img src="{{ asset('admin/assets/images/xs/avatar2.jpg') }}" class="rounded"
                                        alt="">
                                </span>
                                <h4 class="contact-name">Mike Thomas <span class="d-block">London UK</span></h4>
                                <div class="action">
                                    <a href="javascript:void(0);" class="btn btn-sm btn-outline-primary"><i
                                            class="fab fa-skype"></i></a>
                                    <a href="javascript:void(0);" class="btn btn-sm btn-outline-primary"><i
                                            class="fa fa-envelope"></i></a>
                                </div>
                            </li>
                            <li class="d-flex align-items-center">
                                <span class="contact-img">
                                    <img src="{{ asset('admin/assets/images/xs/avatar3.jpg') }}" class="rounded"
                                        alt="">
                                </span>
                                <h4 class="contact-name">Aiden Chavaz</h4>
                                <div class="action">
                                    <a href="javascript:void(0);" class="btn btn-sm btn-outline-primary"><i
                                            class="fab fa-skype"></i></a>
                                    <a href="javascript:void(0);" class="btn btn-sm btn-outline-primary"><i
                                            class="fa fa-envelope"></i></a>
                                </div>
                            </li>
                            <li class="d-flex align-items-center">
                                <span class="contact-img">
                                    <img src="{{ asset('admin/assets/images/xs/avatar4.jpg') }}" class="rounded"
                                        alt="">
                                </span>
                                <h4 class="contact-name">Vincent Porter <span class="d-block">Miami USA</span></h4>
                                <div class="action">
                                    <a href="javascript:void(0);" class="btn btn-sm btn-outline-primary"><i
                                            class="fab fa-skype"></i></a>
                                    <a href="javascript:void(0);" class="btn btn-sm btn-outline-primary"><i
                                            class="fa fa-envelope"></i></a>
                                </div>
                            </li>
                            <li class="d-flex align-items-center">
                                <span class="contact-img">
                                    <img src="{{ asset('admin/assets/images/xs/avatar5.jpg') }}" class="rounded"
                                        alt="">
                                </span>
                                <h4 class="contact-name">Mike Thomas <span class="d-block">Neyyork USA</span></h4>
                                <div class="action">
                                    <a href="javascript:void(0);" class="btn btn-sm btn-outline-primary"><i
                                            class="fab fa-skype"></i></a>
                                    <a href="javascript:void(0);" class="btn btn-sm btn-outline-primary"><i
                                            class="fa fa-envelope"></i></a>
                                </div>
                            </li>
                            <li class="d-flex align-items-center">
                                <span class="contact-img">
                                    <img src="{{ asset('admin/assets/images/xs/avatar6.jpg') }}" class="rounded"
                                        alt="">
                                </span>
                                <h4 class="contact-name">Aiden Chavaz</h4>
                                <div class="action">
                                    <a href="javascript:void(0);" class="btn btn-sm btn-outline-primary"><i
                                            class="fab fa-skype"></i></a>
                                    <a href="javascript:void(0);" class="btn btn-sm btn-outline-primary"><i
                                            class="fa fa-envelope"></i></a>
                                </div>
                            </li>
                            <li class="d-flex align-items-center">
                                <span class="contact-img">
                                    <img src="{{ asset('admin/assets/images/xs/avatar7.jpg') }}" class="rounded"
                                        alt="">
                                </span>
                                <h4 class="contact-name">Mike Thomas <span class="d-block">New Delhi IND</span></h4>
                                <div class="action">
                                    <a href="javascript:void(0);" class="btn btn-sm btn-outline-primary"><i
                                            class="fab fa-skype"></i></a>
                                    <a href="javascript:void(0);" class="btn btn-sm btn-outline-primary"><i
                                            class="fa fa-envelope"></i></a>
                                </div>
                            </li>
                            <li class="d-flex align-items-center">
                                <span class="contact-img">
                                    <img src="{{ asset('admin/assets/images/xs/avatar8.jpg') }}" class="rounded"
                                        alt="">
                                </span>
                                <h4 class="contact-name">Aiden Chavaz</h4>
                                <div class="action">
                                    <a href="javascript:void(0);" class="btn btn-sm btn-outline-primary"><i
                                            class="fab fa-skype"></i></a>
                                    <a href="javascript:void(0);" class="btn btn-sm btn-outline-primary"><i
                                            class="fa fa-envelope"></i></a>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
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
            fetch('/api/type-paket')
                .then(response => response.json())
                .then(data => {
                    const container = $('#nav-paket-list');

                    if (data?.data?.data) {
                        let html = '';
                        data.data.data.forEach(item => {
                            console.log('Processing item:', item);
                            html +=
                                `<li><a href="${route('cms/paket/wilayah', { code: item.code })}">${item.name}</a></li>`;
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
              

                console.log('Logo response:', response?.data?.logo);
                if (response?.data?.logo) {
                    const html = `<img src="/${response.data.logo}" alt="Logo" style="width: 30%; height: 30%;">`;
                    logo.innerHTML =   html;

                }



            }).fail(function(xhr, status, error) {
                console.error('Error:', error);
            });
        }

        setlogo();
    </script>
</body>

</html>

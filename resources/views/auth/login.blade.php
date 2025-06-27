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
    <link rel="shortcut icon" id="favico" href="{{ asset('assets/logo/logo1.png') }}" type="image/x-icon">
    <link rel="stylesheet" href="{{ asset('admin/assets/css/main.css') }}" type="text/css">
</head>

<body class="theme-indigo">
    <!-- WRAPPER -->
    <div id="wrapper">
        <div class="vertical-align-wrap">
            <div class="vertical-align-middle auth-main">
                <div class="auth-box">
                    <div class="top">
                        <img src="{{ asset('assets/logo/logo1.png') }}" alt="Lucid" style="width: 30%; height: 30%;">
                    </div>
                    <div class="card">
                        <div class="header">
                            <p class="lead">Login</p>
                        </div>
                        <div class="body">
                            <!-- Display Validation Errors -->
                            @if ($errors->any())
                                <div class="alert alert-danger">
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif

                            <!-- Login Form -->
                            <form class="form-auth-small" action="{{ route('login') }}" method="POST">
                                @csrf
                                <div class="form-group">
                                    <label for="signin-email" class="control-label sr-only">Email</label>
                                    <input type="email" name="email" class="form-control" id="signin-email" value="{{ old('email') }}" placeholder="Email" required>
                                </div>
                                <div class="form-group">
                                    <label for="signin-password" class="control-label sr-only">Password</label>
                                    <input type="password" name="password" class="form-control" id="signin-password" placeholder="Password" required>
                                </div>
                                <button type="submit" class="btn btn-primary btn-lg btn-block">LOGIN</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Core -->
    <script src="{{ asset('admin/assets/bundles/libscripts.bundle.js') }}"></script>
    <script src="{{ asset('admin/assets/bundles/vendorscripts.bundle.js') }}"></script>
    <script src="{{ asset('admin/assets/js/theme.js') }}"></script>
</body>
</html>

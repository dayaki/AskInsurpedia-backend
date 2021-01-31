<!DOCTYPE html>
<html dir="ltr">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="../assets/images/favicon.png">
    <title> AskInsurpedia Admin Dashboard </title>
    <!-- Custom CSS -->
    <link href="{{ asset('base/css/style.css') }}" rel="stylesheet">
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
<![endif]-->
    <style>
        .auth-wrapper .auth-box.on-sidebar {
            padding-top: 8rem;
        }

        .auth-wrapper .auth-box .logo {
            margin-bottom: 4rem;
        }

        .text-muted {
            color: red;
            font-style: italic;
        }
    </style>
</head>

<body>
    <div class="main-wrapper">
        <!-- ============================================================== -->
        <!-- Preloader - style you can find in spinners.css -->
        <!-- ============================================================== -->
        <div class="preloader">
            <div class="lds-ripple">
                <div class="lds-pos"></div>
                <div class="lds-pos"></div>
            </div>
        </div>
        <!-- ============================================================== -->
        <!-- Preloader - style you can find in spinners.css -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- Login box.scss -->
        <!-- ============================================================== -->
        <div class="auth-wrapper d-flex no-block justify-content-center align-items-center"
            style="background:url({{ asset('base/images/bg.jpg') }}) no-repeat center center;background-size: 70%;">
            <div class="auth-box on-sidebar">
                <div>
                    <div class="logo">
                        <span class="db"><img src="{{ asset('img/logo-black.png') }}" alt="logo" style="width: 80%;margin-bottom: 3rem;" /></span>
                        <h5 class="font-medium m-b-20">Administrative Dashboard</h5>
                    </div>
                    <!-- Form -->
                    <div class="row">
                        <div class="col-12">
                            @if(session()->has('invalid'))
                            <p class="text-muted">{{ session()->get('invalid') }}</p>
                            @endif

                            <form method="POST" action="{{ route('login_post') }}" class="form-horizontal m-t-20">
                                @csrf
                                <div class="form-group row">
                                    <div class="col-12 ">
                                        <input class="form-control form-control-lg" name="email" type="text" required
                                            placeholder="Email" value="{{ old('email') }}">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-12 ">
                                        <input class="form-control form-control-lg" name="password" type="password"
                                            required placeholder="Password">
                                    </div>
                                </div>
                                <div class="form-group text-center ">
                                    <div class="col-xs-12 p-b-20 ">
                                        <button href="dashboard-classic.html" class="btn btn-block btn-lg btn-dark "
                                            type="submit ">SIGN IN</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- ============================================================== -->
        <!-- Login box.scss -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- Page wrapper scss in scafholding.scss -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- Page wrapper scss in scafholding.scss -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- Right Sidebar -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- Right Sidebar -->
        <!-- ============================================================== -->
    </div>
    <!-- ============================================================== -->
    <!-- All Required js -->
    <!-- ============================================================== -->
    <script src="{{ asset('base/libs/jquery/dist/jquery.min.js') }}"></script>
    <!-- Bootstrap tether Core JavaScript -->
    <script src="{{ asset('base/libs/popper.js/dist/umd/popper.min.js') }}"></script>
    <script src="{{ asset('base/libs/bootstrap/dist/js/bootstrap.min.js') }}"></script>
    <!-- ============================================================== -->
    <!-- This page plugin js -->
    <!-- ============================================================== -->
    <script>
        $('[data-toggle="tooltip "]').tooltip();
        $(".preloader ").fadeOut();
    </script>
</body>

</html>
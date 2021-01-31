<!DOCTYPE html>
<html dir="ltr" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('base/images/favicon.png') }}">
    <title>AskInsurpedia Admin Dashboard - @yield('title') </title>
    <!-- Custom CSS -->
    <link href="{{ asset('base/libs/chartist/dist/chartist.min.css') }}" rel="stylesheet">
    <link href="{{ asset('base/extra-libs/c3/c3.min.css') }}" rel="stylesheet">
    <!-- Custom CSS -->
    <link href="{{ asset('base/css/style.css') }}" rel="stylesheet">
    <style>
        .logo-icon img {
            width: 80%;
        }
    </style>
    @yield('style')
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
<![endif]-->
</head>

<body>
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
    <!-- Main wrapper  -->
    <!-- ============================================================== -->
    <div id="main-wrapper">
        <!-- ============================================================== -->

        <!-- ============================================================== -->
        <header class="topbar">
            <nav class="navbar top-navbar navbar-expand-md navbar-dark">
                <div class="navbar-header">
                    <!-- This is for the sidebar toggle which is visible on mobile only -->
                    <a class="nav-toggler waves-effect waves-light d-block d-md-none" href="javascript:void(0)"><i
                            class="ti-menu ti-close"></i></a>
                    <!-- ============================================================== -->
                    <!-- Logo -->
                    <!-- ============================================================== -->
                    <a class="navbar-brand" href="{{ route('dashboard') }}">
                        <!-- Logo icon -->
                        <b class="logo-icon">
                            <!--You can put here icon as well // <i class="wi wi-sunset"></i> //-->
                            <!-- Dark Logo icon -->
                            <img src="{{ asset('img/logo-white.png') }}" alt="homepage" class="dark-logo" />
                            <!-- Light Logo icon -->
                            <img src="{{ asset('img/logo-white.png') }}" alt="homepage" class="light-logo" />
                        </b>
                        <!--End Logo icon -->
                        <!-- Logo text -->
                        {{-- <span class="logo-text">
                            <!-- dark Logo text -->
                            <img src="{{ asset('base/images/logo-text.png') }}" alt="homepage" class="dark-logo" />
                            <!-- Light Logo text -->
                            <img src="{{ asset('base/images/logo-light-text.png') }}" class="light-logo"
                                alt="homepage" />
                        </span> --}}
                    </a>
                    <!-- ============================================================== -->
                    <!-- End Logo -->
                    <!-- ============================================================== -->
                    <!-- ============================================================== -->
                    <!-- Toggle which is visible on mobile only -->
                    <!-- ============================================================== -->
                    <a class="topbartoggler d-block d-md-none waves-effect waves-light" href="javascript:void(0)"
                        data-toggle="collapse" data-target="#navbarSupportedContent"
                        aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><i
                            class="ti-more"></i></a>
                </div>
                <!-- ============================================================== -->
                <!-- End Logo -->
                <!-- ============================================================== -->
                <div class="navbar-collapse collapse" id="navbarSupportedContent">
                    <!-- ============================================================== -->
                    <!-- toggle and nav items -->
                    <!-- ============================================================== -->
                    <ul class="navbar-nav float-left mr-auto"></ul>
                    <!-- ============================================================== -->
                    <!-- Right side toggle and nav items -->
                    <!-- ============================================================== -->
                    <ul class="navbar-nav float-right">
                        <!-- ============================================================== -->
                        <!-- User profile and search -->
                        <!-- ============================================================== -->
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle text-muted waves-effect waves-dark pro-pic" href=""
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><img
                                    src="{{ asset('base/images/users/1.jpg') }}" alt="user" class="rounded-circle"
                                    width="31"></a>
                            {{-- <div class="dropdown-menu dropdown-menu-right user-dd animated flipInY">
                                <span class="with-arrow"><span class="bg-primary"></span></span>
                                <div class="d-flex no-block align-items-center p-15 bg-primary text-white m-b-10">
                                    <div class=""><img src="../assets/images/users/1.jpg" alt="user" class="img-circle"
                                            width="60"></div>
                                    <div class="m-l-10">
                                        <h4 class="m-b-0">Sa Done</h4>
                                        <p class=" m-b-0">name@email.com</p>
                                    </div>
                                </div>
                                <a class="dropdown-item" href="javascript:void(0)"><i class="ti-user m-r-5 m-l-5"></i>
                                    My Profile</a>
                                <a class="dropdown-item" href="javascript:void(0)"><i class="ti-wallet m-r-5 m-l-5"></i>
                                    My Balance</a>
                                <a class="dropdown-item" href="javascript:void(0)"><i class="ti-email m-r-5 m-l-5"></i>
                                    Inbox</a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="javascript:void(0)"><i
                                        class="ti-settings m-r-5 m-l-5"></i> Account Setting</a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="javascript:void(0)"><i
                                        class="fa fa-power-off m-r-5 m-l-5"></i> Logout</a>
                                <div class="dropdown-divider"></div>
                                <div class="p-l-30 p-10"><a href="javascript:void(0)"
                                        class="btn btn-sm btn-success btn-rounded">View Profile</a></div>
                            </div> --}}
                        </li>
                        <!-- ============================================================== -->
                        <!-- User profile and search -->
                        <!-- ============================================================== -->
                    </ul>
                </div>
            </nav>
        </header>
        <!-- ============================================================== -->
        <!-- End Topbar header -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->

        <!-- ============================================================== -->
        <aside class="left-sidebar">
            <!-- Sidebar scroll-->
            <div class="scroll-sidebar">
                <!-- Sidebar navigation-->
                <nav class="sidebar-nav">
                    <ul id="sidebarnav">
                        <li class="sidebar-item" style="margin-bottom: 1rem;">
                            <a class="sidebar-link has-arrow waves-effect waves-dark" href="javascript:void(0)"
                                aria-expanded="false">
                                <i class=" mdi mdi-apps"></i>
                                <span class="hide-menu">Questions </span>
                            </a>
                            <ul aria-expanded="false" class="collapse  first-level">
                                <li class="sidebar-item">
                                    <a href="{{ route('admin.questions') }}" class="sidebar-link">
                                        <i class="mdi mdi-minus"></i>
                                        <span class="hide-menu">All Questions </span>
                                    </a>
                                </li>
                                <li class="sidebar-item">
                                    <a href="{{ route('admin.questions.answered') }}" class="sidebar-link">
                                        <i class="mdi mdi-minus"></i>
                                        <span class="hide-menu">Answered Questions </span>
                                    </a>
                                </li>
                                <li class="sidebar-item">
                                    <a href="{{ route('admin.questions.unanswered') }}" class="sidebar-link">
                                        <i class="mdi mdi-minus"></i>
                                        <span class="hide-menu">Unanswered Questions</span>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li class="sidebar-item" style="margin-bottom: 1rem;">
                            <a class="sidebar-link has-arrow waves-effect waves-dark" href="javascript:void(0)"
                                aria-expanded="false">
                                <i class="mdi mdi-folder-multiple-outline"></i>
                                <span class="hide-menu">Articles </span>
                            </a>
                            <ul aria-expanded="false" class="collapse  first-level">
                                <li class="sidebar-item">
                                    <a href="{{ route('admin.articles') }}" class="sidebar-link">
                                        <i class="mdi mdi-minus"></i>
                                        <span class="hide-menu">All Articles </span>
                                    </a>
                                </li>
                                <li class="sidebar-item">
                                    <a href="{{ route('admin.article.new') }}" class="sidebar-link">
                                        <i class="mdi mdi-minus"></i>
                                        <span class="hide-menu">Post New Article </span>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        
                        <li class="sidebar-item" style="margin-bottom: 1rem;">
                            <a class="sidebar-link has-arrow waves-effect waves-dark" href="javascript:void(0)"
                                aria-expanded="false">
                                <i class="mdi mdi-account-outline"></i>
                                <span class="hide-menu">Experts </span>
                            </a>
                            <ul aria-expanded="false" class="collapse  first-level">
                                <li class="sidebar-item">
                                    <a href="{{ route('admin.experts') }}" class="sidebar-link">
                                        <i class="mdi mdi-minus"></i>
                                        <span class="hide-menu">Approved Expert </span>
                                    </a>
                                </li>
                                <li class="sidebar-item">
                                    <a href="{{ route('admin.expert.pending') }}" class="sidebar-link">
                                        <i class="mdi mdi-minus"></i>
                                        <span class="hide-menu">Pending Expert</span>
                                    </a>
                                </li>
                                <li class="sidebar-item">
                                    <a href="{{ route('admin.expert.new') }}" class="sidebar-link">
                                        <i class="mdi mdi-minus"></i>
                                        <span class="hide-menu">Add New Expert</span>
                                    </a>
                                </li>
                            </ul>
                        </li>

                        <li class="sidebar-item" style="margin-bottom: 1rem;">
                            <a class="sidebar-link waves-effect waves-dark" href="{{ route('admin.users') }}">
                                <i class="mdi mdi-account-multiple-outline"></i>
                                <span class="hide-menu">Users </span>
                            </a>
                        </li>

                        <li class="sidebar-item" style="margin-bottom: 1rem;">
                            <a class="sidebar-link waves-effect waves-dark" href="{{ route('logout') }}">
                                <i class="mdi mdi-lock-outline"></i>
                                <span class="hide-menu">Log Out </span>
                            </a>
                        </li>

                    </ul>
                </nav>
                <!-- End Sidebar navigation -->
            </div>
            <!-- End Sidebar scroll-->
        </aside>
        <!-- ============================================================== -->
        <!-- End Left Sidebar - style you can find in sidebar.scss  -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->

        <!-- ============================================================== -->
        <div class="page-wrapper">
            @yield('content')

            <footer class="footer text-center">
                &copy; AskInsurpedia.com - {{ date("Y") }}
            </footer>
        </div>
    </div>

    <script src="{{ asset('base/libs/jquery/dist/jquery.min.js') }}"></script>
    <script src="{{ asset('base/libs/popper.js/dist/umd/popper.min.js') }}"></script>
    <script src="{{ asset('base/libs/bootstrap/dist/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('base/js/app.min.js') }}"></script>
    <script src="{{ asset('base/js/app.init.vertical.js') }}"></script>
    <script src="{{ asset('base/js/app-style-switcher.js') }}"></script>
    <script src="{{ asset('base/libs/perfect-scrollbar/dist/perfect-scrollbar.jquery.min.js') }}"></script>
    <script src="{{ asset('base/extra-libs/sparkline/sparkline.js') }}"></script>
    <script src="{{ asset('base/js/waves.js') }}"></script>
    <script src="{{ asset('base/js/sidebarmenu.js') }}"></script>
    <script src="{{ asset('base/js/custom.min.js') }}"></script>
    <script src="{{ asset('base/libs/chartist/dist/chartist.min.js') }}"></script>
    <script src="{{ asset('base/libs/chartist-plugin-tooltips/dist/chartist-plugin-tooltip.min.js') }}"></script>
    <script src="{{ asset('base/extra-libs/c3/d3.min.js') }}"></script>
    <script src="{{ asset('base/extra-libs/c3/c3.min.js') }}"></script>
    <script src="{{ asset('base/libs/chart.js/dist/Chart.min.js') }}"></script>
    <script src="{{ asset('base/js/pages/dashboards/dashboard-clasic.js') }}"></script>
    @yield('script')
</body>

</html>
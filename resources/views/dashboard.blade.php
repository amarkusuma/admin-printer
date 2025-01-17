<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="assets/images/favicon.png">
    <title>MT Print</title>
    <!-- Bootstrap Core CSS -->
    <link href="assets/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <!-- Custom CSS -->
    <link href="css/style.css" rel="stylesheet">
    <!-- You can change the theme colors from here -->
    <link href="css/colors/blue.css" id="theme" rel="stylesheet">
   


</head>

<body class="fix-header fix-sidebar card-no-border">
    
    {{-- <div class="preload">
        <img src="http://i.stack.imgur.com/MnyxU.gif">
    </div> --}}

 <div id="app">
    <!-- ============================================================== -->
    <!-- Preloader - style you can find in spinners.css -->
    <!-- ============================================================== -->
    <div class="preloader">
        <svg class="circular" viewBox="25 25 50 50">
            <circle class="path" cx="50" cy="50" r="20" fill="none" stroke-width="2" stroke-miterlimit="10" /> </svg>
    </div>
    <!-- ============================================================== -->
    <!-- Main wrapper - style you can find in pages.scss -->
    <!-- ============================================================== -->
    <div id="main-wrapper">
        <!-- ============================================================== -->
        <!-- Topbar header - style you can find in pages.scss -->
        <!-- ============================================================== -->
        
        <header class="topbar">
            <nav class="navbar top-navbar navbar-toggleable-sm navbar-light">
                <!-- ============================================================== -->
                <!-- Logo -->
                <!-- ============================================================== -->
                <div class="navbar-header">
                    <a class="navbar-brand" href="index.html">
                        <!-- Logo icon -->
                        <b>
                            <!--You can put here icon as well // <i class="wi wi-sunset"></i> //-->
                            <!-- Dark Logo icon -->
                            <img src="assets/images/logo-icon.png" alt="homepage" class="dark-logo" />
                            
                        </b>
                        <!--End Logo icon -->
                        <!-- Logo text -->
                        <span>
                            <!-- dark Logo text -->
                            {{-- <img src="assets/images/logo-text.png" alt="homepage" class="dark-logo" /> --}}
                           <b style="color: #111; font-family: 'Open Sans Condensed', sans-serif; font-size: 20px; font-weight: 700; text-transform: uppercase;"> MT Print</b>
                        </span>
                    </a>
                </div>
                <!-- ============================================================== -->
                <!-- End Logo -->
                <!-- ============================================================== -->
                <div class="navbar-collapse">
                    <!-- ============================================================== -->
                    <!-- toggle and nav items -->
                    <!-- ============================================================== -->
                    <ul class="navbar-nav mr-auto mt-md-0 ">
                        <!-- This is  -->
                        <li class="nav-item"> <a class="nav-link nav-toggler hidden-md-up text-muted waves-effect waves-dark" href="javascript:void(0)" onclick="return false;"><i class="ti-menu"></i></a> </li>
                        {{-- <li class="nav-item hidden-sm-down">
                            <form class="app-search p-l-20">
                                <input type="text" class="form-control" placeholder="Search for..."> <a class="srh-btn"><i class="ti-search"></i></a>
                            </form>
                        </li> --}}
                    </ul>
                    <!-- ============================================================== -->
                    <!-- User profile and search -->
                    <!-- ============================================================== -->
                    <ul class="navbar-nav my-lg-0">
                        {{-- <li class="nav-item dropdown">
                            <a data-toggle="dropdown" role="button" aria-expanded="false" class="nav-link dropdown-toggle text-muted waves-effect waves-dark dropdown-toggle" href="" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <img src="assets/images/users/1.jpg" alt="user" class="profile-pic m-r-5" /> {{ Auth::user()->name }}
                                <i class="fa fa-angle-down edu-icon edu-down-arrow"></i>
                            </a>
                           
                        </li> --}}
        
                        <div class="user-profile nav-item">
                            <li class="nav-item dropdown">
                                <a data-toggle="dropdown" role="button" aria-expanded="false" class="nav-link dropdown-toggle text-muted waves-effect waves-dark dropdown-toggle" href="" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <img src="assets/images/profile/{{ Auth::user()->image }}" alt="user" 
                                    class="profile-pic m-r-5" 
                                    style="width:42px ; height: 42px;
                                    border-radius: 50%;
                                    border: 0.2em solid #5ed3bf;
                                    box-shadow: 0 1px 1px #5ed3bf, inset 0 1px 1px #5ed3bf" /> 
                                    {{ Auth::user()->name }}
                                    <i class="fa fa-angle-down edu-icon edu-down-arrow"></i>
                                </a>
                                <div class="dropdown-menu">
                                    <a class="dropdown-item" href="{{route('profile-user')}}">Profile</a>
                                    <a class="dropdown-item" href="#">Settings</a>
                                <a class="dropdown-item" href="{{ route('logout') }}">Log Out </a>
                                </div>
                            </li>
                        </div>
                    </ul>
                    
                </div>
            </nav>
        </header>

        <aside class="left-sidebar">
            <!-- Sidebar scroll-->
            <div class="scroll-sidebar">
                <!-- Sidebar navigation-->
                <nav class="sidebar-nav">
                    <ul id="sidebarnav">
                        <li>
                        <a href="{{route('home')}}" class="waves-effect"><i class="fa fa-list-alt m-r-10" aria-hidden="true"></i>Dashboard</a>
                        </li>
                     
                        <li>
                          <a href="{{route('order')}}" class="waves-effect"><i class="fa fa-shopping-cart m-r-10" aria-hidden="true"></i>Pemesanan</a>
                        </li>
                        <li>
                        <a href="{{ route('product') }}" class="waves-effect"><i class="fa fa-print m-r-10" aria-hidden="true"></i>Product</a>
                        </li>

                        <li>
                        <a href="{{route('chatting')}}" class="waves-effect"><i class="fa fa-wechat  m-r-10" aria-hidden="true"></i>Chatting</a>
                        </li>
                        {{-- <li>
                            <router-link to="/xample" class="waves-effect">
                                xample
                            </router-link>
                        </li> --}}

                        <li>
                        <a href="{{route('role-user')}}" class="waves-effect"><i class="fa fa-expeditedssl m-r-10" aria-hidden="true"></i>Role User</a>
                        </li>
                        
                        <li>
                            <a href="{{route('user')}}" class="waves-effect"><i class="fa fa-users m-r-10" aria-hidden="true"></i>Users</a>
                        </li>
                        <li>
                        <a href="{{route('profile-user')}}" class="waves-effect"><i class="fa fa-user m-r-10" aria-hidden="true"></i>Profile</a>
                        </li>
                    </ul>
                   
                </nav>
                <!-- End Sidebar navigation -->
            </div>
            <!-- End Sidebar scroll-->
        </aside>

        <div class="page-wrapper">

            <div class="container-fluid">

                <div class="row page-titles">
                    <div class="col-md-6 col-8 align-self-center">
                        {{-- <h3 class="text-themecolor m-b-0 m-t-0">{{Route::currentRouteName()}}</h3> --}}
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item "><a href="javascript:void(0)"><b style="color: #0e739b; font-family: 'Open Sans Condensed', sans-serif; font-size: 16px; font-weight: 700;">Home</b></a></li>
                            <li class="breadcrumb-item active">{{Route::currentRouteName()}}</li>
                        </ol>
                    </div>
                   
                </div>
                
                <div class="row">
                    
                    @yield('content')
                    {{-- <router-view></router-view> --}}
                    
                </div>
                <!-- Row -->
                <!-- ============================================================== -->
                <!-- End PAge Content -->
                <!-- ============================================================== -->
            </div>
          
            <!-- ============================================================== -->

            <?php if(Route::currentRouteName() !== 'home'){
                echo '<footer class="footer text-center">
                © 2017 MT Print by wrappixel.com
            </footer> ';
            } ?>
            
          
        </div>
        <!-- ============================================================== -->
        <!-- End Page wrapper  -->
        <!-- ============================================================== -->
    </div>
 </div>
    <!-- ============================================================== -->
    <!-- End Wrapper -->
    <!-- ============================================================== -->
    <!-- ============================================================== -->
    <!-- All Jquery -->
    <!-- ============================================================== -->
    <script src="assets/plugins/jquery/jquery.min.js"></script>
    <!-- Bootstrap tether Core JavaScript -->
    <script src="assets/plugins/bootstrap/js/tether.min.js"></script>
    <script src="assets/plugins/bootstrap/js/bootstrap.min.js"></script>
    <!-- slimscrollbar scrollbar JavaScript -->
    <script src="js/jquery.slimscroll.js"></script>
    <!--Wave Effects -->
    <script src="js/waves.js"></script>
    <!--Menu sidebar -->
    <script src="js/sidebarmenu.js"></script>
    <!--stickey kit -->
    <script src="assets/plugins/sticky-kit-master/dist/sticky-kit.min.js"></script>
    <!--Custom JavaScript -->
    <script src="js/custom.min.js"></script>
    <!-- ============================================================== -->
    <!-- This page plugins -->
    <!-- ============================================================== -->
    <!-- Flot Charts JavaScript -->
    <script src="assets/plugins/flot/jquery.flot.js"></script>
    <script src="assets/plugins/flot.tooltip/js/jquery.flot.tooltip.min.js"></script>
    {{-- <script src="js/flot-data.js"></script> --}}
    <!-- ============================================================== -->
    <!-- Style switcher -->
    <!-- ============================================================== -->
    <script src="assets/plugins/styleswitcher/jQuery.style.switcher.js"></script>

    <script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
    
</body>

</html>

<style>
    /* #main-wrapper {
    display: none;
} */

.preload {
    width: 100px;
    height: 100px;
    position: fixed;
    top: 50%;
    left: 50%;
}

* {
    box-sizing: border-box;
    -webkit-box-sizing: border-box;
    -moz-box-sizing: border-box;
}
</style>

<script>
        $(function() {
    $(".preloader").fadeOut(2000, function() {
        $("#main-wrapper").fadeIn(1000);        
    });
});
</script>
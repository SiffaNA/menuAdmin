<!DOCTYPE html>
<html lang="en">

<!-- Mirrored from demo.dashboardpack.com/admindek-html/ by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 04 Jul 2023 09:42:24 GMT -->
<head>
<title>Admindek | Admin Template</title>


<!--[if lt IE 10]>
		<script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
		<script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
		<![endif]-->

<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
<meta http-equiv="X-UA-Compatible" content="IE=edge" />
<meta name="description" content="Admindek Bootstrap admin template made using Bootstrap 4 and it has huge amount of ready made feature, UI components, pages which completely fulfills any dashboard needs." />
<meta name="keywords" content="flat ui, admin Admin , Responsive, Landing, Bootstrap, App, Template, Mobile, iOS, Android, apple, creative app">
<meta name="author" content="colorlib" />

<link rel="icon" href="{{asset('files/assets/images/favicon.ico')}}" type="image/x-icon">

<link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700,800" rel="stylesheet">
<link href="https://fonts.googleapis.com/css?family=Quicksand:500,700" rel="stylesheet">

<link rel="stylesheet" type="text/css" href="{{asset('files/bower_components/bootstrap/css/bootstrap.min.css')}}">

<link rel="stylesheet" href="{{asset('files/assets/pages/waves/css/waves.min.css')}}" type="text/css" media="all">

<link rel="stylesheet" type="text/css" href="{{asset('files/assets/icon/feather/css/feather.css')}}">

<link rel="stylesheet" type="text/css" href="{{asset('files/assets/css/font-awesome-n.min.css')}}">

<link rel="stylesheet" href="{{asset('files/bower_components/chartist/css/chartist.css')}}" type="text/css" media="all">

<link rel="stylesheet" type="text/css" href="{{asset('files/assets/css/style.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('files/assets/css/widget.css')}}">
<style>
    .pcoded-content {
            overflow-y: auto;
            max-height: calc(100vh - 90px); /* Ubah tinggi sesuai kebutuhan */
            /* 100vh adalah tinggi layar, 400px adalah total tinggi elemen-elemen sebelumnya (navbar, heading, dll.) */
        }
    </style>
</head>
<body id="page-top">
    <!-- Page Wrapper -->
    <div id="wrapper">
        <!-- Sidebar -->
        @include('layouts.sidebar')
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">
            <!-- Main Content -->
            <div id="content">
                <!-- Topbar -->
                @include("layouts.navbar")
                <!-- End of Topbar -->
<div class="pcoded-main-container">
<div class="pcoded-wrapper">
</nav>

<div class="pcoded-content">

    <div class="container-fluid">
        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">@yield('title')</h1>
        </div>

        <!-- Main content will be placed here -->
        <div class="row">
            <div class="col-md-12">
                @yield('content')
            </div>
        </div>
    </div>
    <!-- /.container-fluid -->
</div>
<!-- End of Main Content -->

<!-- Footer -->
@include('layouts.footer')
<!-- End of Footer -->
</div>
<!-- End of Content Wrapper -->
</div>
<!-- End of Page Wrapper -->

<a class="scroll-to-top rounded" href="#page-top">
<i class="fas fa-angle-up"></i>
</a>


<script data-cfasync="false" src="../cdn-cgi/scripts/5c5dd728/cloudflare-static/email-decode.min.js"></script><script type="text/javascript" src="{{asset('files/bower_components/jquery/js/jquery.min.js')}}"></script>
<script type="text/javascript" src="{{asset('files/bower_components/jquery-ui/js/jquery-ui.min.js')}}"></script>
<script type="text/javascript" src="{{asset('files/bower_components/popper.js/js/popper.min.js')}}"></script>
<script type="text/javascript" src="{{asset('files/bower_components/bootstrap/js/bootstrap.min.js')}}"></script>

<script src="{{asset('files/assets/pages/waves/js/waves.min.js')}}"></script>

<script type="text/javascript" src="{{asset('files/bower_components/jquery-slimscroll/js/jquery.slimscroll.js')}}"></script>

<script src="{{asset('files/assets/pages/chart/float/jquery.flot.js')}}"></script>
<script src="{{asset('files/assets/pages/chart/float/jquery.flot.categories.js')}}"></script>
<script src="{{asset('files/assets/pages/chart/float/curvedLines.js')}}"></script>
<script src="{{asset('files/assets/pages/chart/float/jquery.flot.tooltip.min.js')}}"></script>

<script src="{{asset('files/bower_components/chartist/js/chartist.js')}}"></script>

<script src="{{asset('files/assets/pages/widget/amchart/amcharts.js')}}"></script>
<script src="{{asset('files/assets/pages/widget/amchart/serial.js')}}"></script>
<script src="{{asset('files/assets/pages/widget/amchart/light.js')}}"></script>

<script src="{{asset('files/assets/js/pcoded.min.js')}}"></script>
<script src="{{asset('files/assets/js/vertical/vertical-layout.min.js')}}"></script>
<script type="text/javascript" src="{{asset('files/assets/pages/dashboard/custom-dashboard.min.js')}}"></script>
<script type="text/javascript" src="{{asset('files/assets/js/script.min.js')}}"></script>
@yield('scripts')
</body>

<!-- Mirrored from demo.dashboardpack.com/admindek-html/ by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 04 Jul 2023 09:43:12 GMT -->
</html>

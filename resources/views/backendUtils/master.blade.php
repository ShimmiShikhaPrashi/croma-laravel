<!DOCTYPE html>
<html dir="ltr" lang="en">
  <head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta
      name="keywords"
      content="wrappixel, admin dashboard, html css dashboard, web dashboard, bootstrap 5 admin, bootstrap 5, css3 dashboard, bootstrap 5 dashboard, Matrix lite admin bootstrap 5 dashboard, frontend, responsive bootstrap 5 admin template, Matrix admin lite design, Matrix admin lite dashboard bootstrap 5 dashboard template"
    />
    <meta
      name="description"
      content="Matrix Admin Lite Free Version is powerful and clean admin dashboard template, inpired from Bootstrap Framework"
    />
    <meta name="robots" content="noindex,nofollow" />
    <title>Matrix Admin Lite Free Versions Template by WrapPixel</title>
    <!-- Favicon icon -->
     
    <link
      rel="icon"
      type="image/png"
      sizes="16x16"
      href="{{ url('/') }}/backend/assets/images/favicon.png"
    />
    <!-- Custom CSS -->
    <link href="{{ url('/') }}/backend/assets/libs/flot/css/float-chart.css" rel="stylesheet" />
    <!-- Custom CSS -->
    <link href="{{ url('/') }}/backend/dist/css/style.min.css" rel="stylesheet" />
    
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  </head>

  <body>
    @include('backendUtils.header')
    @include('backendUtils.sidebar')
    @yield('content')
    @include('backendUtils.footer')
    <!-- ============================================================== -->
    <!-- Preloader - style you can find in spinners.css -->
    <!-- ============================================================== -->
    <div class="preloader">
      <div class="lds-ripple">
        <div class="lds-pos"></div>
        <div class="lds-pos"></div>
      </div>
    </div>

    <script src="{{ url('/') }}/backend/assets/libs/jquery/dist/jquery.min.js"></script>
    <!-- Bootstrap tether Core JavaScript -->
    <script src="{{ url('/') }}/backend/assets/libs/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
    <script src="{{ url('/') }}/backend/assets/libs/perfect-scrollbar/dist/perfect-scrollbar.jquery.min.js"></script>
    <script src="{{ url('/') }}/backend/assets/extra-libs/sparkline/sparkline.js"></script>
    <!--Wave Effects -->
    <script src="{{ url('/') }}/backend/dist/js/waves.js"></script>
    <!--Menu sidebar -->
    <script src="{{ url('/') }}/backend/dist/js/sidebarmenu.js"></script>
    <!--Custom JavaScript -->
    <script src="{{ url('/') }}/backend/dist/js/custom.min.js"></script>
    <!--This page JavaScript -->
    <!-- <script src="{{ url('/') }}/backend/dist/js/pages/dashboards/dashboard1.js"></script> -->
    <!-- Charts js Files -->
    <script src="{{ url('/') }}/backend/assets/libs/flot/excanvas.js"></script>
    <script src="{{ url('/') }}/backend/assets/libs/flot/jquery.flot.js"></script>
    <script src="{{ url('/') }}/backend/assets/libs/flot/jquery.flot.pie.js"></script>
    <script src="{{ url('/') }}/backend/assets/libs/flot/jquery.flot.time.js"></script>
    <script src="{{ url('/') }}/backend/assets/libs/flot/jquery.flot.stack.js"></script>
    <script src="{{ url('/') }}/backend/assets/libs/flot/jquery.flot.crosshair.js"></script>
    <script src="{{ url('/') }}/backend/assets/libs/flot.tooltip/js/jquery.flot.tooltip.min.js"></script>
    <script src="{{ url('/') }}/backend/dist/js/pages/chart/chart-page-init.js"></script>
  </body>
</html>
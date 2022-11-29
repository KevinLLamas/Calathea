<!-- Vendor JS Files -->
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>CALATHEA</title>
  <meta content="" name="description">
  <meta content="" name="keywords">
  <!-- Favicons -->
  <link href="{{asset('assets/img/calathea/Trazado 27181.png')}}" rel="icon">
  <link href="{{asset('assets/img/calathea/Trazado 27181.png')}}" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Jost:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="{{asset('assets/vendor/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet">
  <link href="{{asset('assets/vendor/icofont/icofont.min.css')}}" rel="stylesheet">
  <link href="{{asset('assets/vendor/boxicons/css/boxicons.min.css')}}" rel="stylesheet">
  <link href="{{asset('assets/vendor/remixicon/remixicon.css')}}" rel="stylesheet">
  <link href="{{asset('assets/vendor/venobox/venobox.css')}}" rel="stylesheet">
  <link href="{{asset('assets/vendor/owl.carousel/assets/owl.carousel.min.css')}}" rel="stylesheet">
  <link href="{{asset('assets/vendor/aos/aos.css')}}" rel="stylesheet">
  <link rel="stylesheet" href="{{asset('assets/css/main.css')}}">
  <!--link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.9.0/fullcalendar.css" /-->

  <!-- Template Main CSS File -->
  <link href="{{asset('assets/css/style.css')}}" rel="stylesheet">

</head>
<body>
    <script src="{{ asset('assets/js/axios.js')}}"></script>
    <div id="wrapper">
        @include('navbarpanel') {{-- Menu superior --}}
        @yield('content') {{-- Cotenido de la pagina --}}
    </div>
    
    <script src="https://cdn.jsdelivr.net/npm/fullcalendar@5.11.3/main.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/fullcalendar@5.11.3/locales-all.js"></script>
    <script src="{{asset('assets/js/vue.js')}}"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
    <script src="{{asset('assets/vendor/jquery/jquery.min.js')}}"></script>
    <script src="{{asset('assets/vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
    <script src="{{asset('assets/vendor/jquery.easing/jquery.easing.min.js')}}"></script>
    <script src="{{asset('assets/vendor/php-email-form/validate.js')}}"></script>
    <script src="{{asset('assets/vendor/waypoints/jquery.waypoints.min.js')}}"></script>
    <script src="{{asset('assets/vendor/isotope-layout/isotope.pkgd.min.js')}}"></script>
    <script src="{{asset('assets/vendor/venobox/venobox.min.js')}}"></script>
    <script src="{{asset('assets/vendor/owl.carousel/owl.carousel.min.js')}}"></script>
    <script src="{{asset('assets/vendor/aos/aos.js')}}"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.24.0/moment.min.js"></script>
    <!--script src="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.9.0/fullcalendar.js"></script-->
    
    <!-- Template Main JS File -->
    <script src="{{asset('assets/js/main.js')}}"></script>

</body>
</html>
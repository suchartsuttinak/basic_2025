<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Lonyo - IT Solution & Technology Template</title>

  <!-- Favicon -->
  <link rel="shortcut icon" href="{{ asset('frontend/assets/images/favicon.ico') }}" type="image/x-icon">


      <!--- icon --->
      <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css">

      <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@mdi/font@7.4.47/css/materialdesignicons.min.css">


    <!-- Kanit Fonts --> 
    <link href="https://fonts.googleapis.com/css2?family=Kanit&display=swap" rel="stylesheet">

 <!-- App css -->
       
<!-- Frontend CSS -->
 ...
  <link rel="stylesheet" href="bootstrap.css">
  @stack('styles') <!-- โหลด custom CSS หลังสุด -->


<link rel="stylesheet" href="{{ asset('frontend/assets/css/bootstrap.min.css') }}">
<link rel="stylesheet" href="{{ asset('frontend/assets/css/style.css') }}">
<link rel="stylesheet" href="{{ asset('frontend/assets/css/slick.css') }}">
<link rel="stylesheet" href="{{ asset('frontend/assets/css/fontawesome.css') }}">
<link rel="stylesheet" href="{{ asset('frontend/assets/css/remixicon.css') }}">
<link rel="stylesheet" href="{{ asset('frontend/assets/css/aos.css') }}">
<link rel="stylesheet" href="{{ asset('frontend/assets/css/niceselect.css') }}">
<link rel="stylesheet" href="{{ asset('frontend/assets/css/animate.min.css') }}">
<link rel="stylesheet" href="{{ asset('frontend/assets/css/main.css') }}">
<link rel="stylesheet" href="{{ asset('frontend/assets/css/app.min.css') }}">

<!-- Backend CSS -->
<link href="{{ asset('backend/assets/libs/datatables.net-bs5/css/dataTables.bootstrap5.min.css') }}" rel="stylesheet">
<link href="{{ asset('backend/assets/libs/datatables.net-buttons-bs5/css/buttons.bootstrap5.min.css') }}" rel="stylesheet">
<link href="{{ asset('backend/assets/libs/datatables.net-keytable-bs5/css/keyTable.bootstrap5.min.css') }}" rel="stylesheet">
<link href="{{ asset('backend/assets/libs/datatables.net-responsive-bs5/css/responsive.bootstrap5.min.css') }}" rel="stylesheet">
<link href="{{ asset('backend/assets/libs/datatables.net-select-bs5/css/select.bootstrap5.min.css') }}" rel="stylesheet">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">

<!-- ✅ Custom CSS ต้องอยู่ท้ายสุดเพื่อ override ได้ -->
<link rel="stylesheet" href="{{ asset('frontend/assets/css/custom.css') }}"> <!-- ✅ ต้องอยู่ท้ายสุด -->



 <!-- ✅ ปรับขนาดตัวอักษรและปุ่ม -->
 <style>
  body {
    font-family: 'Kanit', sans-serif;
    font-size: 13px; /* เพิ่มจาก 14px → 15px */
  }

  button.btn-sm {
    font-size: 13px !important; /* เพิ่มจาก 12px → 13px */
    padding: 3px 10px !important; /* เพิ่ม padding เล็กน้อย */
  }

  .form-control {
    font-size: 0.85rem; /* เพิ่มจาก 0.8rem → 0.85rem */
    padding: 0.35rem 0.6rem;
  }

  .btn-xs {
    font-size: 0.75rem !important; /* เพิ่มจาก 0.7rem → 0.75rem */
    padding: 0.25rem 0.5rem !important;
    line-height: 1.2 !important;
    border-radius: 0.2rem !important;
  }

  .table td, .table th {
    font-size: 0.85rem; /* เพิ่มจาก 0.8rem → 0.85rem */
    padding: 0.5rem 0.6rem;
  }
</style>
</head>

<body data-menu-color="light" data-layout="light">
 
  <!-- Kanit Fonts --> 
  {{-- <style>body {font-family: 'Kanit', sans-serif;}</style --}}

  
  <!-- Begin page -->
  <div id="app-layout">
    @include('frontend.component.header')
  </div>

  <div class="container-fluid">
    <div class="content-page bg-white mt-5 pt-4">
      @yield('content')
    </div>
  </div>



<!-- Frontend Core -->
<script src="{{ asset('frontend/assets/js/jquery-3.7.1.min.js') }}"></script>
<script src="{{ asset('frontend/assets/js/bootstrap.bundle.min.js') }}"></script>

<!-- Frontend Plugins -->
<script src="{{ asset('frontend/assets/js/menu/menu.js') }}"></script>
<script src="{{ asset('frontend/assets/js/jquery.magnific-popup.min.js') }}"></script>
<script src="{{ asset('frontend/assets/js/slick.js') }}"></script>
<script src="{{ asset('frontend/assets/js/pricing.min.js') }}"></script>
<script src="{{ asset('frontend/assets/js/countdown.js') }}"></script>
<script src="{{ asset('frontend/assets/js/skillbar.js') }}"></script>
<script src="{{ asset('frontend/assets/js/slick-animation.min.js') }}"></script>
<script src="{{ asset('frontend/assets/js/faq.js') }}"></script>
<script src="{{ asset('frontend/assets/js/isotope.pkgd.min.js') }}"></script>
<script src="{{ asset('frontend/assets/js/tabs-slider.js') }}"></script>
<script src="{{ asset('frontend/assets/js/product-increment.js') }}"></script>
<script src="{{ asset('frontend/assets/js/aos.js') }}"></script>
<script src="{{ asset('frontend/assets/js/niceselect.js') }}"></script>
<script src="{{ asset('frontend/assets/js/wow.min.js') }}"></script>
<script src="https://maps.googleapis.com/maps/api/js?v=3&key=AIzaSyArZVfNvjnLNwJZlLJKuOiWHZ6vtQzzb1Y"></script>
<script src="{{ asset('frontend/assets/js/app.js') }}"></script>

<!-- Backend Plugins (เฉพาะที่จำเป็น) -->
<script src="{{ asset('backend/assets/libs/simplebar/simplebar.min.js') }}"></script>
<script src="{{ asset('backend/assets/libs/node-waves/waves.min.js') }}"></script>
<script src="{{ asset('backend/assets/libs/waypoints/lib/jquery.waypoints.min.js') }}"></script>
<script src="{{ asset('backend/assets/libs/jquery.counterup/jquery.counterup.min.js') }}"></script>
<script src="{{ asset('backend/assets/libs/feather-icons/feather.min.js') }}"></script>

<!-- Apexcharts -->
<script src="{{ asset('backend/assets/libs/apexcharts/apexcharts.min.js') }}"></script>
<script src="https://apexcharts.com/samples/assets/stock-prices.js"></script>
<script src="{{ asset('backend/assets/js/pages/analytics-dashboard.init.js') }}"></script>

<!-- Backend JS -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
<script src="{{ asset('backend/assets/js/code.js') }}"></script>
<script src="{{ asset('backend/assets/js/validate.min.js') }}"></script>
<script src="{{ asset('backend/assets/libs/datatables.net/js/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('backend/assets/libs/datatables.net-bs5/js/dataTables.bootstrap5.min.js') }}"></script>
<script src="{{ asset('backend/assets/libs/datatables.net-buttons/js/dataTables.buttons.min.js') }}"></script>
<script src="{{ asset('backend/assets/js/pages/datatable.init.js') }}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>

  <!-- Toastr Notification -->
  <script>
    document.addEventListener("DOMContentLoaded", function () {
      @if(Session::has('message'))
        var type = "{{ Session::get('alert-type','info') }}";
        toastr[type]("{{ Session::get('message') }}");
      @endif
    });
  </script>
</body>
</html>
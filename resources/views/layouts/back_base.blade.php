<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8" />
  <title>Allo Jobs Admin | @yield('title')</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <meta content="Plateforme administrateur de Allo Jobs" name="description" />
  <meta content="Coderthemes" name="author" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <!-- App favicon -->
  <link rel="shortcut icon" href="{{ asset('assets/images/favicon.ico')}}">

  <!-- Plugins css -->
  <link href="{{ asset('assets/libs/flatpickr/flatpickr.min.css')}}" rel="stylesheet" type="text/css" />
  <link href="{{ asset('assets/libs/selectize/css/selectize.bootstrap3.css')}}" rel="stylesheet" type="text/css" />

  <!-- App css -->
  <link href="{{ asset('assets/css/config/default/bootstrap_.min.css')}}" rel="stylesheet" type="text/css" id="bs-default-stylesheet" />
  <link href="{{ asset('assets/css/config/default/app_.min.css')}}" rel="stylesheet" type="text/css" id="app-default-stylesheet" />

  <link href="{{ asset('assets/css/config/default/bootstrap-dark.min.css')}}" rel="stylesheet" type="text/css" id="bs-dark-stylesheet" />
  <link href="{{ asset('assets/css/config/default/app-dark.min.css')}}" rel="stylesheet" type="text/css" id="app-dark-stylesheet" />

  <!-- icons -->
  <link href="{{ asset('assets/css/icons.min.css')}}" rel="stylesheet" type="text/css" />


  <!-- third party css -->
  <link href="{{ asset('assets/libs/datatables.net-bs4/css/dataTables.bootstrap4.min.css')}}" rel="stylesheet" type="text/css" />
  <link href="{{ asset('assets/libs/datatables.net-responsive-bs4/css/responsive.bootstrap4.min.css')}}" rel="stylesheet" type="text/css" />
  <link href="{{ asset('assets/libs/datatables.net-buttons-bs4/css/buttons.bootstrap4.min.css')}}" rel="stylesheet" type="text/css" />
  <link href="{{ asset('assets/libs/datatables.net-select-bs4/css/select.bootstrap4.min.css')}}" rel="stylesheet" type="text/css" />
  <!-- third party css end -->

</head>

<!-- body start -->
<body class="loading" data-layout='{"mode": "light", "width": "fluid", "menuPosition": "fixed", "sidebar": { "color": "light", "size": "default", "showuser": false}, "topbar": {"color": "dark"}, "showRightSidebarOnPageLoad": true}'>
  @if (Session::has('flash_message_error'))
  <script type="text/javascript" src="{{ asset('assets/js/sweetalert.min.js')}}"></script>
  <script type="text/javascript">;
  swal("{{ session('flash_message_error') }}", "Merci", "error");
</script>
@endif
@if (Session::has('flash_message_success'))
<script type="text/javascript" src="{{ asset('assets/js/sweetalert.min.js')}}"></script>
<script type="text/javascript">;
swal("{{ session('flash_message_success') }}", "Merci", "success");
</script>
@endif
@if (Session::has('flash_message_warning'))
<script type="text/javascript" src="{{ asset('assets/js/sweetalert.min.js')}}"></script>
<script type="text/javascript">;
swal("{{ session('flash_message_warning') }}", "Merci", "warning");
</script>
@endif
<!-- Begin page -->
<div id="wrapper">

  <!-- Topbar Start -->
  @include('partials.header')

  <!-- ========== Left Sidebar Start ========== -->

  <!-- Left Sidebar End -->
  @include('partials.sidebar')
  <!-- ============================================================== -->
  <!-- Start Page Content here -->
  <!-- ============================================================== -->

  <div class="content-page">
    <div class="content">

      <!-- Start Content-->
      @yield('content') 

    </div> <!-- content -->

    <!-- Footer Start -->
    <footer class="footer">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-6">
            <script>document.write(new Date().getFullYear())</script> &copy; Allo Jobs powered by <b >Wiicom-Consulting</b> 
          </div>
        </div>
      </div>
    </footer>
    <!-- end Footer -->

  </div>

  <!-- ============================================================== -->
  <!-- End Page content -->
  <!-- ============================================================== -->


</div>
<!-- END wrapper -->


<!-- Vendor js -->
<script src="{{ asset('assets/js/vendor.min.js')}}"></script>

<!-- Plugins js-->
<script src="{{ asset('assets/libs/flatpickr/flatpickr.min.js')}}"></script>
<script src="{{ asset('assets/libs/apexcharts/apexcharts.min.js')}}"></script>

<script src="{{ asset('assets/libs/selectize/js/standalone/selectize.min.js')}}"></script>

<!-- Dashboar 1 init js-->
<script src="{{ asset('assets/js/pages/dashboard-1.init.js')}}"></script>
<!-- Chart JS -->
<script src="{{ asset('assets/libs/chart.js/Chart.bundle.min.js')}}"></script>

<!-- Init js -->
<!--<script src="{{ asset('assets/js/pages/chartjs.init.js')}}"></script>-->


<!-- third party js -->
<script src="{{ asset('assets/libs/datatables.net/js/jquery.dataTables.min.js')}}"></script>
<script src="{{ asset('assets/libs/datatables.net-bs4/js/dataTables.bootstrap4.min.js')}}"></script>
<script src="{{ asset('assets/libs/datatables.net-responsive/js/dataTables.responsive.min.js')}}"></script>
<script src="{{ asset('assets/libs/datatables.net-responsive-bs4/js/responsive.bootstrap4.min.js')}}"></script>
<script src="{{ asset('assets/libs/datatables.net-buttons/js/dataTables.buttons.min.js')}}"></script>
<script src="{{ asset('assets/libs/datatables.net-buttons-bs4/js/buttons.bootstrap4.min.js')}}"></script>
<script src="{{ asset('assets/libs/datatables.net-buttons/js/buttons.html5.min.js')}}"></script>
<script src="{{ asset('assets/libs/datatables.net-buttons/js/buttons.flash.min.js')}}"></script>
<script src="{{ asset('assets/libs/datatables.net-buttons/js/buttons.print.min.js')}}"></script>
<script src="{{ asset('assets/libs/datatables.net-keytable/js/dataTables.keyTable.min.js')}}"></script>
<script src="{{ asset('assets/libs/datatables.net-select/js/dataTables.select.min.js')}}"></script>
<script src="{{ asset('assets/libs/pdfmake/build/pdfmake.min.js')}}"></script>
<script src="{{ asset('assets/libs/pdfmake/build/vfs_fonts.js')}}"></script>

 <!-- Datatables init -->
        <script src="{{ asset('assets/js/pages/datatables.init.js')}}"></script>

<!-- App js-->
<script src="{{ asset('assets/js/app.min.js')}}"></script>
@yield('script') 
</body>
</html>
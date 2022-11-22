<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8" />
  <title>AllôJobs Admin | @yield('title')</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta content="Plateforme administrateur de AllôJobs" name="description" />
  <meta content="Coderthemes" name="author" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <!-- App favicon -->
  <link rel="shortcut icon" href="assets/images/favicon.ico">

  <!-- App css -->
  <link href="assets/css/config/default/bootstrap_.min.css" rel="stylesheet" type="text/css" id="bs-default-stylesheet" />
  <link href="assets/css/config/default/app_.min.css" rel="stylesheet" type="text/css" id="app-default-stylesheet" />

  <link href="assets/css/config/default/bootstrap-dark.min.css" rel="stylesheet" type="text/css" id="bs-dark-stylesheet" />
  <link href="assets/css/config/default/app-dark.min.css" rel="stylesheet" type="text/css" id="app-dark-stylesheet" />

  <!-- icons -->
  <link href="assets/css/icons.min.css" rel="stylesheet" type="text/css" />

</head>

<body class="loading authentication-bg authentication-bg-pattern">

 @if (Session::has('flash_message_error'))
 <script type="text/javascript" src="assets/js/sweetalert.min.js"></script>
 <script type="text/javascript">;
 swal("{{ session('flash_message_error') }}", "Merci", "error");
</script>
@endif
@if (Session::has('flash_message_success'))
<script type="text/javascript" src="assets/js/sweetalert.min.js"></script>
<script type="text/javascript">;
swal("{{ session('flash_message_success') }}", "Merci", "success");
</script>
@endif
@if (Session::has('flash_message_warning'))
<script type="text/javascript" src="assets/js/sweetalert.min.js"></script>
<script type="text/javascript">;
swal("{{ session('flash_message_warning') }}", "Merci", "warning");
</script>
@endif
<div class="account-pages mt-5 mb-5">
  <div class="container">
    <div class="row justify-content-center">
     @yield('content') 
   </div>
   <!-- end row -->
 </div>
 <!-- end container -->
</div>
<!-- end page -->

<footer class="footer footer-alt" style="color:white">
  2022 - <script>document.write(new Date().getFullYear())</script> &copy; AllôJobs Powered by <b style="color:white;font-weight: bold;"  class="text-white-50">Wiicom-Consulting</b> 
</footer>

<!-- Vendor js -->
<script src="assets/js/vendor.min.js"></script>

<!-- App js -->
<script src="assets/js/app.min.js"></script>

</body>
</html>
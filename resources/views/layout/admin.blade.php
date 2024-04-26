<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Purple Admin</title>
    <!-- plugins:css -->
    <link rel="stylesheet" href="admin/assets/vendors/mdi/css/materialdesignicons.min.css">
    <link rel="stylesheet" href="admin/assets/vendors/css/vendor.bundle.base.css">
    <!-- endinject -->
    <!-- Plugin css for this page -->
    <!-- End plugin css for this page -->
    <!-- inject:css -->
    <!-- endinject -->
    <!-- Layout styles -->
    <link rel="stylesheet" href="admin/assets/css/style.css">
    <!-- End layout styles -->
    <link rel="shortcut icon" href="admin/assets/images/favicon.ico" />
  </head>
  @yield('header')
  <body>
    <div class="container-scroller">


        <nav class="navbar default-layout-navbar col-lg-12 col-12 p-0 fixed-top d-flex flex-row">
            @section('navbar')
                @include('include.admin.navbar')
            @show
        </nav>

      <!-- partial -->
      <div class="container-fluid page-body-wrapper">
        <nav class="sidebar sidebar-offcanvas" id="sidebar">
            <x-admin.sidebar/>
        </nav>

        <div class="main-panel">
            <div class="content-wrapper">
                <x-admin.page-header/>
                @yield('main')
            </div>
            <x-admin.footer/>
        </div>
      </div>
      <!-- page-body-wrapper ends -->
    </div>
    <!-- container-scroller -->
    <!-- plugins:js -->
@stack('scripts')
    <!-- End custom js for this page -->
  </body>
</html>

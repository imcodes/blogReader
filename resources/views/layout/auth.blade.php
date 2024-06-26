@props(['pageTitle'=>'Authentication'])
<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>{{env('APP_NAME')}} | {{$pageTitle}} </title>
    <!-- plugins:css -->
    <link rel="stylesheet" href="{{asset('admin/assets/vendors/mdi/css/materialdesignicons.min.css')}}">
    <link rel="stylesheet" href="{{asset('admin/assets/vendors/css/vendor.bundle.base.css')}}">
    <!-- endinject -->
    <!-- Plugin css for this page -->
    <!-- End plugin css for this page -->
    <!-- inject:css -->
    <!-- endinject -->
    <!-- Layout styles -->
    <link rel="stylesheet" href="{{asset("admin/assets/css/style.css")}}">
    <!-- End layout styles -->
    <link rel="shortcut icon" href="{{asset('admin/assets/images/favicon.ico')}}" />
  </head>
  <body>
    <header class="navigation fixed-top">
        <div class="container">
          @include('include.navbarlogo')
        </div>
      </header>
    <div class="container-scroller my-5">
        <div class="row">
            <div class="col-md-8 mx-md-5 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h1 class="card-title ml-30">
                        @stack('auth-title')
                    </h1>

                    @yield('form')

             </div>
            </div>
            </div>
        </div>
    </div>
    </body>

</html>

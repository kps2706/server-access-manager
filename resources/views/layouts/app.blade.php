<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
       <title>@yield('title', 'Server Access Control Pro')</title>
        <link href="https://cdn.jsdelivr.net/npm/litepicker/dist/css/litepicker.css" rel="stylesheet" />
        <link href="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/style.min.css" rel="stylesheet" />
        <link href="{{asset('backend/css/styles.css')}}" rel="stylesheet" />
        <link rel="icon" type="image/x-icon" href="{{asset('backend/assets/img/favicon.png')}}" />
        <script data-search-pseudo-elements defer src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/js/all.min.js" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/feather-icons/4.29.0/feather.min.js" crossorigin="anonymous"></script>
    </head>
    <body class="nav-fixed">
        @include('layouts.navbar')
        <div id="layoutSidenav">
            @include('layouts.sidenav')
            <div id="layoutSidenav_content">
                @yield('admin_content')
            </div>
        </div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="{{asset('backend/js/scripts.js')}} "></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.min.js" crossorigin="anonymous"></script>
        <script src="{{asset('backend/assets/demo/chart-area-demo.js')}} "></script>
        <script src="{{asset('backend/assets/demo/chart-bar-demo.js')}} "></script>
        <script src="{{asset('backend/assets/demo/chart-pie-demo.js')}} "></script>
        <script src="https://cdn.jsdelivr.net/npm/litepicker/dist/bundle.js" crossorigin="anonymous"></script>
        <script src="{{asset('backend/js/litepicker.js')}} "></script>
        <script src="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/umd/simple-datatables.min.js" crossorigin="anonymous"></script>
        <script src="{{asset('backend/js/datatables/datatables-simple-demo.js')}}"></script>
    </body>
</html>

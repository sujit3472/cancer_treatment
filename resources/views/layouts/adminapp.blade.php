<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{Route::currentRouteName()}}</title>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome Icons -->
    <link rel="stylesheet" href="{{ asset('plugins/fontawesome-free/css/all.min.css')}}">
    <!-- IonIcons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{ asset('dist/css/adminlte.min.css')}}">
    <!-- All Pages Comm css link here -->
    @yield('header')
</head>
<!--
`body` tag options:

  Apply one or more of the following classes to to the body tag
  to get the desired effect

  * sidebar-collapse
  * sidebar-mini
-->
<body class="hold-transition sidebar-mini">
    <div class="wrapper">
        <!-- Navbar -->
        <nav class="main-header navbar navbar-expand navbar-white navbar-light">
            <!-- Left navbar links -->
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
                </li>
            </ul>
            <ul class="navbar-nav ml-auto">
                <li class="nav-item dropdown">
                    <a href="javascript:void(0)" class="dropdown-item" title="logout" data-toggle="modal" data-target="#logout">Logout</a>
                </li>
            </ul>
        </nav>
        <!-- /.navbar -->

        <!-- Main Sidebar Container -->
        <aside class="main-sidebar sidebar-dark-primary elevation-4">
            <!-- Brand Logo -->
            <a href="{{ url('/')}}" class="brand-link">
              <!-- <img src="dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8"> -->
              <span class="brand-text font-weight-light">Online Cancer Treatment</span>
            </a>
            <!-- Sidebar -->
            @include('admin.nav')
            <!-- /.sidebar -->
        </aside>

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            @yield('content')
        </div>
        <!-- /.content-wrapper -->

        <!-- Control Sidebar -->
        <aside class="control-sidebar control-sidebar-dark">
        <!-- Control sidebar content goes here -->
        </aside>
        <!-- /.control-sidebar -->

        <!-- Main Footer -->
        <footer class="main-footer">
            <strong>Copyright © {{ now()->year }} Cancer Treatment. All rights reserved.
            <div class="float-right d-none d-sm-inline-block">
                
            </div>
        </footer>
    </div>
    <!-- ./wrapper -->
    <!--logout Modal start here-->
    <div class="modal fade comm_popups" id="logout" role="dialog">
        <div class="modal-dialog">
        <!-- Modal content-->
            <div class="modal-content">
                <div class="cuccess_popups">
                    
                </div>
                <div class="modal-body">
                    <div class="succes_popups">
                        <span></span>
                        <p>Are you sure you want to logout?</p>
                    </div>
                </div>
                <div class="modal-footer popups_btn">
                    <a href="{{ route('logout') }}" class="btn btn-info btn-sm" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Yes</a>

                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                        <input type="hidden" name="user-login-role" value="{{ Auth::user()->role_id }}">
                    </form>
                    <button type="button" class="btn btn-warning btn-sm" data-dismiss="modal">No</button>
                </div>
            </div>
        </div>
    </div>
    <!--logout Modal end here-->

    <!-- REQUIRED SCRIPTS -->

    <!-- jQuery -->
    <script src="{{ asset('plugins/jquery/jquery.min.js')}}"></script>
    <!-- Bootstrap -->
    <script src="{{ asset('plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
    <!-- AdminLTE -->
    <script src="{{ asset('dist/js/adminlte.js')}}"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="{{ asset('dist/js/demo.js')}}"></script>
    
    <script  type="text/javascript">
        $(document).ready(function () {
            setTimeout(function() {
                $('.alert-success').hide('slow');
            }, 5500);
        });
    </script>
    @yield('footer')
</body>
</html>

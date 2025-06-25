<!DOCTYPE html>

<html lang="fr">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{$title}}</title>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet"
          href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome Icons -->
    <link rel="stylesheet" href="{{asset("administration/plugins/fontawesome-free/css/all.min.css")}}">
    <link rel="stylesheet" href="{{asset("administration/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css")}}">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{asset("administration/dist/css/adminlte.min.css")}}">
  </head>
<body class="hold-transition sidebar-mini">
<div class="wrapper">

    <!-- Navbar -->
    <nav class="main-header navbar navbar-expand navbar-white navbar-light">
        <!-- Left navbar links -->
        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
            </li>
            <li class="nav-item d-none d-sm-inline-block">
                <a href="{{route("home")}}" class="nav-link btn btn-block btn-outline-primary">Front</a>
            </li>
        </ul>


        <ul class="navbar-nav ml-auto">
            <!-- Navbar Search -->

            <li class="nav-item">
                <a class="nav-link" data-widget="fullscreen" href="#" role="button">
                    <i class="fas fa-expand-arrows-alt"></i>
                </a>
            </li>

        </ul>
    </nav>
    <!-- navbar -->

    <!-- Main Sidebar Container -->
    <aside class="main-sidebar sidebar-dark-primary elevation-4">
        <!-- Brand Logo -->
        <a href="index3.html" class="brand-link">
            <img src="{{asset("administration/dist/img/AdminLTELogo.png")}}" alt="AdminLTE Logo"
                 class="brand-image img-circle elevation-3" style="opacity: .8">
            <span class="brand-text font-weight-light">Events Admin</span>
        </a>

        <!-- Sidebar -->
        <div class="sidebar">
            <!-- Sidebar user panel (optional) -->
            <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                <div class="image">
                    <img src="{{asset("administration/dist/img/".$user->photo)}}" class="img-circle elevation-2"
                         alt="{{ $user->name}} Image">
                </div>
                <div class="info">
                    <a href="#" class="d-block">{{ $user->name}}</a>
                </div>
            </div>


            <!-- Sidebar Menu -->
            <nav class="mt-2">
                <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                    data-accordion="false">
                    <!-- Add icons to the links using the .nav-icon class
                         with font-awesome or any other icon font library -->
                    <!-- Menu-->
                    <li class="nav-item">
                        <a href="{{route("admin.events.index")}}"
                           class="nav-link {{$currentRoute->getName()=="admin.events.index"?"active":"" }} ">
                            <i class="nav-icon fas fa-th"></i>
                            Events
                        </a>
                        <a href="{{route("admin.categories.index")}}"
                           class="nav-link {{$currentRoute->getName()=="admin.categories.index"?"active":"" }} ">
                            <i class="nav-icon fas fa-th"></i>
                            Categories
                        </a>
                        <a href="{{route("admin.locations.index")}}"
                           class="nav-link {{$currentRoute->getName()=="admin.locations.index"?"active":"" }} ">
                            <i class="nav-icon fas fa-th"></i>
                            Locations
                        </a>
                        <a href="{{route("admin.speakers.index")}}"
                           class="nav-link {{$currentRoute->getName()=="admin.speakers.index"?"active":"" }} ">
                            <i class="nav-icon fas fa-th"></i>
                            Speakers
                        </a>
                        <a href="{{route("admin.organizers.index")}}"
                           class="nav-link {{$currentRoute->getName()=="admin.organizers.index"?"active":"" }} ">
                            <i class="nav-icon fas fa-th"></i>
                         Organizers
                        </a>
                        <a href="{{route("admin.users.index")}}"
                           class="nav-link {{$currentRoute->getName()=="admin.users.index"?"active":"" }} ">
                            <i class="nav-icon fas fa-th"></i>
                            Utilisateurs
                        </a>
                    </li>
                </ul>
            </nav>
            <!-- /.sidebar-menu -->
        </div>
        <!-- /.sidebar -->
    </aside>

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">{{$title}}</h1>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->

        <!-- Main content -->
        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    @yield("content")
                </div>
                <!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->

    <!-- Main Footer -->
    <footer class="main-footer">
        <!-- To the right -->
        <div class="float-right d-none d-sm-inline">
            Anything you want
        </div>
        <!-- Default to the left -->
        <strong>Copyright &copy; 2014-2021 <a href="https://adminlte.io">AdminLTE.io</a>.</strong> All rights reserved.
    </footer>
</div>
<!-- ./wrapper -->

<!-- REQUIRED SCRIPTS -->

<!-- jQuery -->
<script src="{{asset("administration/plugins/jquery/jquery.min.js")}}"></script>
<!-- Bootstrap 4 -->
<script src="{{asset("administration/plugins/bootstrap/js/bootstrap.bundle.min.js")}}"></script>
<!-- AdminLTE App -->

<script src="{{asset("administration/plugins/datatables/jquery.dataTables.js")}}"></script>
<script src="{{asset("administration/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js")}}"></script>


<script src="{{asset("administration/dist/js/adminlte.min.js")}}"></script>
@include('sweetalert::alert')
@yield("js")
</body>
</html>

<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta http-equiv="x-ua-compatible" content="ie=edge">
  <!-- CSRF Token -->
  <meta name="csrf-token" content="{{ csrf_token() }}">


  <title>{{ config('app.name', 'Laravel') }}</title>

  <!-- Scripts -->
  <script src="{{ asset('js/app.js') }}" defer></script>

  <!-- Fonts -->
  <link rel="dns-prefetch" href="//fonts.gstatic.com">
  <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

  <!-- Styles -->
  <link href="{{ asset('css/app.css') }}" rel="stylesheet">

  <!-- Font Awesome Icons -->
  <link rel="stylesheet" href="{{asset("/bower_components/admin-lte/plugins/fontawesome-free/css/all.min.css")}}">
  <link rel="stylesheet" href="{{asset("/bower_components/admin-lte/plugins/select2/css/select2.css")}}">
  <!-- IonIcons -->
  <link rel="stylesheet" href="http://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">

  <!-- DataTables -->
  <link rel="stylesheet" href="{{asset("/bower_components/admin-lte/plugins/datatables-bs4/css/dataTables.bootstrap4.css")}}">

  <!-- Theme style -->
  <link rel="stylesheet" href="{{asset("/bower_components/admin-lte/dist/css/adminlte.min.css")}}">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">

  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.min.css" />
  <link href="https://cdn.datatables.net/1.10.20/css/jquery.dataTables.min.css" rel="stylesheet">
  <link href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap4.min.css" rel="stylesheet">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.js"></script>
  <script src="https://code.jquery.com/jquery-3.3.1.js"></script>
  <script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
  <script src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js"></script>

</head>
<!--
BODY TAG OPTIONS:
=================
Apply one or more of the following classes to to the body tag
to get the desired effect
|---------------------------------------------------------|
|LAYOUT OPTIONS | sidebar-collapse                        |
|               | sidebar-mini                            |
|---------------------------------------------------------|
-->

<body class="hold-transition sidebar-mini">

  <div class="wrapper">
    <!-- Navbar -->
    <nav class="main-header navbar navbar-expand navbar-white navbar-light">
      <!-- Left navbar links -->
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link" data-widget="pushmenu" href="#"><i class="fas fa-bars"></i></a>
        </li>
        <li class="nav-item d-none d-sm-inline-block">
          <a href="{{route("admin")}}" class="nav-link">Home</a>
        </li>
        <li class="nav-item d-none d-sm-inline-block">
          <a href="#" class="nav-link">Contact</a>
        </li>
      </ul>

      <!-- SEARCH FORM -->
      <form class="form-inline ml-3">
        <div class="input-group input-group-sm">
          <input class="form-control form-control-navbar" type="search" placeholder="Search" aria-label="Search">
          <div class="input-group-append">
            <button class="btn btn-navbar" type="submit">
              <i class="fas fa-search"></i>
            </button>
          </div>
        </div>
      </form>

      <!-- Right navbar links -->
      <ul class="navbar-nav ml-auto">
        <!-- Messages Dropdown Menu -->
        <li class="nav-item dropdown">
          <a class="nav-link" data-toggle="dropdown" href="#">
            <i class="far fa-comments"></i>
            <span class="badge badge-danger navbar-badge">3</span>
          </a>
          <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
            <a href="#" class="dropdown-item">
              <!-- Message Start -->
              <div class="media">
                <img src="{{ asset("/bower_components/admin-lte/dist/img/user1.jpg")}}" alt="User Avatar" class="img-size-50 mr-3 img-circle">
                <div class="media-body">
                  <h3 class="dropdown-item-title">
                    Brad Diesel
                    <span class="float-right text-sm text-danger"><i class="fas fa-star"></i></span>
                  </h3>
                  <p class="text-sm">Call me whenever you can...</p>
                  <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> 4 Hours Ago</p>
                </div>
              </div>
              <!-- Message End -->
            </a>
            <div class="dropdown-divider"></div>
            <a href="#" class="dropdown-item">
              <!-- Message Start -->
              <div class="media">
                <img src="{{ asset("/bower_components/admin-lte/dist/img/user8.jpg")}}" alt="User Avatar" class="img-size-50 img-circle mr-3">
                <div class="media-body">
                  <h3 class="dropdown-item-title">
                    John Pierce
                    <span class="float-right text-sm text-muted"><i class="fas fa-star"></i></span>
                  </h3>
                  <p class="text-sm">I got your message bro</p>
                  <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> 4 Hours Ago</p>
                </div>
              </div>
              <!-- Message End -->
            </a>
            <div class="dropdown-divider"></div>
            <a href="#" class="dropdown-item">
              <!-- Message Start -->
              <div class="media">
                <img src="{{ asset("/bower_components/admin-lte/dist/img/user3.jpg")}}" alt="User Avatar" class="img-size-50 img-circle mr-3">
                <div class="media-body">
                  <h3 class="dropdown-item-title">
                    Nora Silvester
                    <span class="float-right text-sm text-warning"><i class="fas fa-star"></i></span>
                  </h3>
                  <p class="text-sm">The subject goes here</p>
                  <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> 4 Hours Ago</p>
                </div>
              </div>
              <!-- Message End -->
            </a>
            <div class="dropdown-divider"></div>
            <a href="#" class="dropdown-item dropdown-footer">See All Messages</a>
          </div>
        </li>
        <!-- Notifications Dropdown Menu -->
        <li class="nav-item dropdown">
          <a class="nav-link" data-toggle="dropdown" href="#">
            <i class="far fa-bell"></i>
            <span class="badge badge-warning navbar-badge">15</span>
          </a>
          <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
            <span class="dropdown-item dropdown-header">15 Notifications</span>
            <div class="dropdown-divider"></div>
            <a href="#" class="dropdown-item">
              <i class="fas fa-envelope mr-2"></i> 4 new messages
              <span class="float-right text-muted text-sm">3 mins</span>
            </a>
            <div class="dropdown-divider"></div>
            <a href="#" class="dropdown-item">
              <i class="fas fa-users mr-2"></i> 8 friend requests
              <span class="float-right text-muted text-sm">12 hours</span>
            </a>
            <div class="dropdown-divider"></div>
            <a href="#" class="dropdown-item">
              <i class="fas fa-file mr-2"></i> 3 new reports
              <span class="float-right text-muted text-sm">2 days</span>
            </a>
            <div class="dropdown-divider"></div>
            <a href="#" class="dropdown-item dropdown-footer">See All Notifications</a>
          </div>
        </li>
        <li class="nav-item">
          <a class="nav-link" data-widget="control-sidebar" data-slide="true" href="#"><i class="fas fa-th-large"></i></a>
        </li>
      </ul>
    </nav>
    <!-- /.navbar -->

    <!-- Main Sidebar Container -->
    <aside class="main-sidebar sidebar-dark-primary elevation-4">
      <!-- Brand Logo -->
      <a href="{{route("admin")}}" class="brand-link">
        <img src="{{ asset("/bower_components/admin-lte/dist/img/AdminLTELogo.png")}}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
        <span class="brand-text font-weight-light">AdminLTE 3</span>
      </a>

      <!-- Sidebar -->
      <div class="sidebar">
        @guest
        @else
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
          <div class="image">
            <img src="{{ asset("/bower_components/admin-lte/dist/img/user2.jpg")}}" class="img-circle elevation-2" alt="User Image">
          </div>
          <div class="info">
            @role('pharmacy')
            <a href="{{route('pharmacies.edit', Auth::user()->typeable->id)}}" class="d-block"><strong>{{ Auth::user()->name }}</strong></a>
            @else
            @role('doctor')
            <a href="{{route('doctors.edit', Auth::user()->typeable->id)}}" class="d-block"><strong>{{ Auth::user()->name }}</strong></a>
            @else
            <a href="#" class="d-block"><strong>{{ Auth::user()->name }}</strong></a>
            @endrole
            @endrole
          </div>
        </div>
        @endguest

        <!-- Sidebar Menu -->
        <nav class="mt-2">
          <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
            <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->


            <li class="nav-item">
              <a href="{{route("admin")}}" class="nav-link active">
                <i class="far fa-circle nav-icon"></i>
                <p>Home</p>
              </a>
            </li>
            <li class="nav-item has-treeview">
              <a href="#" class="nav-link">
                <i class="nav-icon far fa-plus-square"></i>
                <p>
                  Items
                  <i class="fas fa-angle-left right"></i>
                </p>
              </a>
              <ul class="nav nav-treeview">
                @role('super-admin')
                <li class="nav-item">
                  <a href="{{route('pharmacies.index')}}" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Pharmacies</p>
                  </a>
                </li>
                @else
                @endhasanyrole

                @hasanyrole('pharmacy|super-admin')
                <li class="nav-item">
                  <a href="{{route('doctors.index')}}" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Doctors</p>
                  </a>
                </li>
                @else
                @endhasanyrole

                @hasanyrole('pharmacy|super-admin|doctor')
                <li class="nav-item">
                  <a href="{{route('medicines.index')}}" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Medicine</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="{{route('orders.index')}}" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Orders</p>
                  </a>
                </li>
                @else
                @endhasanyrole

                @role('super-admin')
                <li class="nav-item">
                  <a href="{{route('areas.index')}}" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Area</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="{{route('useraddresses.index')}}" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>User Addresses</p>
                  </a>
                </li>
                @else
                @endhasanyrole

                @role('pharmacy')
                <li class="nav-item">
                  <a href="{{route('revenueForPharmacy.index')}}" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Revenue</p>
                  </a>
                </li>
                @else
                @endhasanyrole
                @role('super-admin')
                <li class="nav-item">
                  <a href="{{route('clients.index')}}" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Clients</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="{{route('revenue.index')}}" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Revenue</p>
                  </a>
                </li>
                @else
                @endhasanyrole

              </ul>
            </li>
            <!--li class="nav-item">
              <a href="{{ asset("/bower_components/admin-lte/pages/forms/general.html")}}" class="nav-link">
                <i class="nav-icon fas fa-edit"></i>
                <p>
                  Forms
                </p>
              </a>
            </li-->
            <!--li class="nav-item">
              <a href="{{ asset("/bower_components/admin-lte/pages/tables/data.html")}}" class="nav-link">
                <i class="nav-icon fas fa-table"></i>
                <p>
                  Tables
                </p>
              </a>
            </li-->
            <li class="nav-header">EXAMPLES</li>
            <li class="nav-item">
              <a href="{{ asset("/bower_components/admin-lte/pages/examples/contacts.html")}}" class="nav-link">
                <a href="{{ route('password.request') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Reset Password</p>
                </a>
            </li>

            @guest
            <li class="nav-item">
              <a class="nav-link" href="{{ route('login') }}">
                <i class="far fa-circle nav-icon"></i>{{ __('Login') }}
              </a>
            </li>
            @if (Route::has('register'))
            <li class="nav-item">
              <a class="nav-link" href="{{ route('register') }}">
                <i class="far fa-circle nav-icon"></i>{{ __('Register') }}
              </a>
            </li>
            @endif

            @else
            <li class="nav-item">
              <a class="nav-link" href="{{ route('logout') }}" onclick="event.preventDefault();
                                   document.getElementById('logout-form').submit();">

                <i class="far fa-circle nav-icon"></i>{{ __('Logout') }}
              </a>

              <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                @csrf
              </form>
            </li>
            @endguest


            </li>
        </nav>
        <!-- /.sidebar-menu -->
      </div>
      <!-- /.sidebar -->
    </aside>
    <div class="content-wrapper">
      <!-- Content Header (Page header) -->
      <div class="content-header">
        @yield('content')
      </div>

      <!-- Control Sidebar -->
      <aside class="control-sidebar control-sidebar-dark">
        <!-- Control sidebar content goes here -->
      </aside>
      <!-- /.control-sidebar -->

      <!-- Main Footer -->
      <footer class="main-footer">
        <strong>Copyright &copy; 2014-2019 <a href="http://adminlte.io">AdminLTE.io</a>.</strong>
        All rights reserved.
        <div class="float-right d-none d-sm-inline-block">
          <b>Version</b> 3.0.2
        </div>
      </footer>
    </div>
    <!-- ./wrapper -->

    <!-- REQUIRED SCRIPTS -->

    <!-- jQuery -->
    <script src="{{ asset("/bower_components/admin-lte/plugins/jquery/jquery.min.js")}}"></script>
    <script src="{{ asset("/bower_components/admin-lte/plugins/select2/js/select2.js")}}"></script>
    <!-- Bootstrap -->
    <script src="{{ asset("/bower_components/admin-lte/plugins/bootstrap/js/bootstrap.bundle.min.js")}}"></script>
    <!-- DataTables -->
    <script src="{{ asset("/bower_components/admin-lte/plugins/datatables/jquery.dataTables.js")}}"></script>
    <script src="{{ asset("/bower_components/admin-lte/plugins/datatables-bs4/js/dataTables.bootstrap4.js")}}"></script>
    <!-- AdminLTE -->
    <script src="{{ asset("/bower_components/admin-lte/dist/js/adminlte.js")}}"></script>

    <script>
      // $(function () {
      //   // $("#example1").DataTable();
      //   $('#example2').DataTable({
      //     "paging": true,
      //     "lengthChange": false,
      //     "searching": false,
      //     "ordering": true,
      //     "info": true,
      //     "autoWidth": false,
      //   });
      // });
    </script>

</body>

</html>

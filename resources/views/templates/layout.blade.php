<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>PosZie</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{ asset('adminlte3') }}/plugins/fontawesome-free/css/all.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{ asset('adminlte3') }}/dist/css/adminlte.min.css">
  <link rel="stylesheet" href="{{ asset('adminlte3') }}/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
  <link rel="stylesheet" href="{{ asset('adminlte3') }}/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
  <link rel="stylesheet" href="{{ asset('adminlte3') }}/plugins/datatables-buttons/css/buttons.bootstrap4.min.css">
  <link rel="stylesheet" href="{{ asset('adminlte3') }}/plugins/datatables-buttons/css/buttons.bootstrap4.min.css">
  @stack('style')
</head>
<body class="hold-transition sidebar-mini">
<!-- Site wrapper -->
<div class="wrapper">
  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="{{ url('/') }}" role="button"><i class="fas fa-bars"></i></a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="{{ url('/') }}" class="nav-link">Home</a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="{{ url('contact') }}" class="nav-link">Contact</a>
      </li>
    </ul>

  </nav>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="{{ url('/') }}" class="brand-link">
      <img src="{{ asset('adminlte3') }}///dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light">PosZie</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="{{ asset('adminlte3') }}///dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="{{ url('/') }}" class="d-block">Admin</a>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
      <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item">
            <a href="{{ url('/') }}" class="nav-link">
              <i class="fas fa-warehouse"></i>
              <p>
                Dashboard
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{ url('profile') }}" class="nav-link">
              <i class="fas fa-user"></i>
              <p>
                Profile
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{ url('contact') }}" class="nav-link">
              <i class="fas fa-address-book"></i>
              <p>
                Contact
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{ url('produk') }}" class="nav-link">
              <i class="fas fa-shopping-bag"></i>
              <p>
                Produk
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{ url('pelanggan') }}" class="nav-link">
              <i class="fas fa-users"></i>
              <p>
                Pelanggan
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{ url('faq') }}" class="nav-link">
              <i class="far fa-question-circle"></i>
              <p>
                FAQ
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{ url('pemasok') }}" class="nav-link">
              <i class="fas fa-users"></i>
              <p>
                Pemasok
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{ url('pembelian') }}" class="nav-link">
            <i class="nav-icon fas fa-store"></i>
              <p>
                Pembelian
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{ url('barang') }}" class="nav-link">
            <i class="fa-solid fa-box"></i>
              <p>
                Barang
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{ route('logout') }}" class="nav-link">
            <i class="nav-icon fas fa-power-off"></i>
              <p>
                Logout
              </p>
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
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{ url('/') }}">Dashboard</a></li>
              <li class="breadcrumb-item active">Home</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
@yield('content')
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

 @include('templates.footer')
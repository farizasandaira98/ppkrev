<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Data Pengumuman PKK</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{asset('assests/plugins/fontawesome-free/css/all.min.css')  }}">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Tempusdominus Bootstrap 4 -->
  <link rel="stylesheet" href="{{asset('assests/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css')}}">
  <!-- iCheck -->
  <link rel="stylesheet" href="{{asset('assests/plugins/icheck-bootstrap/icheck-bootstrap.min.css')}}">
  <!-- JQVMap -->
  <link rel="stylesheet" href="{{ asset('assests/plugins/jqvmap/jqvmap.min.css') }}">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{ asset('assests/dist/css/adminlte.min.css') }} ">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="{{ asset('assests/plugins/overlayScrollbars/css/OverlayScrollbars.min.css') }}">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="{{ asset('assests/plugins/daterangepicker/daterangepicker.css') }}">
  <!-- summernote -->
  <link rel="stylesheet" href="{{ asset('assests/plugins/summernote/summernote-bs4.min.css') }}">

</head>
<body class="hold-transition sidebar-mini layout-fixed">
  <div class="wrapper">

    <!-- Navbar -->
    <nav class="main-header navbar navbar-expand navbar-white navbar-light">
      <!-- Left navbar links -->
      <!-- SEARCH FORM -->
      <form class="form-inline ml-3" method="get" action="/pengumuman/cari" enctype="multipart/form-data">
        <div class="input-group input-group-sm">
          <input class="form-control form-control-navbar" type="search" placeholder="Search" aria-label="Search" name="search">
          <input type placeholder="Masukkan Tanggal Akhir" class="textbox-n" type="text" onfocus="(this.type='date')" id="date" name="datepeng" class="form-control datepicker">
          <div class="input-group-append">
            <input type placeholder="Masukkan Tanggal Akhir" class="textbox-n" type="text" onfocus="(this.type='date')" id="date" name="datepeng2" class="form-control datepicker">
            <button class="btn btn-navbar" type="submit">
              <i class="fas fa-search"></i>
            </button>
          </div>
        </div>
      </form>

      <!-- Right navbar links -->
      <ul class="navbar-nav ml-auto">
        <a href="{{ route('logout') }}">Logout</a>  
      </ul>
    </nav>
    <!-- /.navbar -->

    <!-- Main Sidebar Container -->
    <aside class="main-sidebar sidebar-dark-primary elevation-4">
      <!-- Sidebar -->
      <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">

          <div class="info">
            <p style="color: white">Selamat Datang <br/>Di Halaman Admin <br/>Sistem Monitorng & Reporting<br/>PKK Kecamatan Berbah</p>

          </div>
        </div>
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
          <div class="image">
            <img src="{{ asset('assests/dist/img/profile.png') }}" class="img-circle elevation-2" alt="User Image">
          </div>
          <div class="info">
            <a href="#" class="d-block">{{ Auth::user()->name }}</a>

          </div>
        </div>
        <!-- SidebarSearch Form -->
        <div class="form-inline">
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
          <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
            <li class="nav-item">
              <a href="/admin" class="nav-link">
                <p>
                  Home
                  <span class="badge badge-info right"></span>
                </p>
              </a>
            </li>
            <li class="nav-item">
            <a href="/anggota" class="nav-link">
              <p>
                Data Anggota
                <span class="badge badge-info right"></span>
              </p>
            </a>
          </li>
            <li class="nav-item">
            <a href="/infokeg" class="nav-link">
              <p>
                Data Kegiatan
                <span class="badge badge-info right"></span>
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="/pengumuman" class="nav-link active">
              <p>
                Data Pengumuman 
                <span class="badge badge-info right"></span>
              </p>
            </a>
          </li>
          <li class="nav-item">
              <a href="/dataadmin" class="nav-link">
                <p>
                  Tambah Admin
                  <span class="badge badge-info right"></span>
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
      <div class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
              <h1 class="m-0">Data Pengumuman</h1>
            </div><!-- /.col -->
          </div><!-- /.row -->
        </div><!-- /.container-fluid -->
      </div>
      <!-- /.content-header -->
      <div class="container">
        <div class="card mt-5">
          <div class="card-body">
            <a href="/pengumuman/tambah" class="btn btn-primary">Input Pengumuman Baru</a>
            <br/>
            <br/>
            <table class="table table-bordered table-hover table-striped">
              <thead>
                <tr>
                  <th>#</th>
                  <th>Judul Pengumuman</th>
                  <th>Konten Pengumuman</th>
                  <th>Tanggal Pengumuman</th>
                  <th>Tambahan</th>
                  <th>OPSI</th>
                </tr>
              </thead>
              <tbody>
                @foreach($pengumuman as $ang)
                <tr>
                  <td>{{ $loop->iteration }}</td>
                  <td>{{ $ang->judul_pengumuman }}</td>
                  <td>{{ $ang->konten_pengumuman }}</td>
                  <td>{{ $ang->tanggal_pengumuman }}</td>
                  <td><?php foreach (json_decode($ang->tambahan)as $gambar){ ?>
                    <img src="{{asset('/data_file/'.$gambar) }}" style='width:80px; height:120px;'/>
                    <?php } ?>
                  </td>
                  <td>
                    <a href="/pengumuman/edit/{{ $ang->id }}" class="btn btn-warning">Edit</a>
                    <a href="/pengumuman/hapus/{{ $ang->id }}" class="btn btn-danger">Hapus</a>
                  </td>
                </tr>
                @endforeach
              </tbody>
            </table>
          </div>
        </div>
      </div>

      <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
    <footer class="main-footer">
      <strong>Copyright &copy; 2014-2020 <a href="https://adminlte.io">AdminLTE.io</a>.</strong>
      All rights reserved.
      <div class="float-right d-none d-sm-inline-block">
        <b>Version</b> 3.1.0-rc
      </div>
    </footer>

    <!-- Control Sidebar -->
    <aside class="control-sidebar control-sidebar-dark">
      <!-- Control sidebar content goes here -->
    </aside>
    <!-- /.control-sidebar -->
  </div>
  <!-- ./wrapper -->

 <!-- jQuery -->
  <script src="{{ asset('assests/plugins/jquery/jquery.min.js') }}"></script>
  <!-- jQuery UI 1.11.4 -->
  <script src="{{ asset('assests/plugins/jquery-ui/jquery-ui.min.js') }}"></script>
  <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
  <script>
    $.widget.bridge('uibutton', $.ui.button)
  </script>
  <!-- Bootstrap 4 -->
  <script src="{{ asset('assests/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
  <!-- ChartJS -->
  <script src="{{ asset('assests/plugins/chart.js/Chart.min.js') }}"></script>
  <!-- Sparkline -->
  <script src="{{ asset('assests/plugins/sparklines/sparkline.js') }}"></script>
  <!-- JQVMap -->
  <script src="{{ asset('assests/plugins/jqvmap/jquery.vmap.min.js') }}"></script>
  <script src="{{ asset('assests/plugins/jqvmap/maps/jquery.vmap.usa.js') }}"></script>
  <!-- jQuery Knob Chart -->
  <script src="{{ asset('assests/plugins/jquery-knob/jquery.knob.min.js') }}"></script>
  <!-- daterangepicker -->
  <script src="{{ asset('assests/plugins/moment/moment.min.js') }}"></script>
  <script src="{{ asset('assests/plugins/daterangepicker/daterangepicker.js') }}"></script>
  <!-- Tempusdominus Bootstrap 4 -->
  <script src="{{ asset('assests/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js') }}"></script>
  <!-- Summernote -->
  <script src="{{ asset('assests/plugins/summernote/summernote-bs4.min.js') }}"></script>
  <!-- overlayScrollbars -->
  <script src="{{ asset('assests/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js') }}"></script>
  <!-- AdminLTE App -->
  <script src="{{ asset('dist/js/adminlte.js') }}"></script>
  <!-- AdminLTE for demo purposes -->
  <script src="{{ asset('assests/dist/js/demo.js') }}"></script>
  <!-- AdminLTE dashboard demo (This is only for demo purposes) -->
  <script src="{{ asset('assests/dist/js/pages/dashboard.js') }}"></script>
</body>
</html>

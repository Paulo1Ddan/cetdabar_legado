<?php if(!class_exists('Rain\Tpl')){exit;}?><!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html lang="pt-br">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Admin - Dabar</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet"
    href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome Icons -->
  <link rel="stylesheet" href="/cetdabar/res/admin/plugins/fontawesome-free/css/all.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="/cetdabar/res/admin/dist/css/adminlte.css">

  <style>
    .side-menu span{
      width: 20px !important;
    }
    .side-menu i{
      width: 20px !important;
    }
  </style>
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
          <a href="/cetdabar/" class="nav-link">Inicio</a>
        </li>
      </ul>
    </nav>
    <!-- /.navbar -->

    <!-- Main Sidebar Container -->
    <aside class="main-sidebar sidebar-dark-primary elevation-4">
      <!-- Brand Logo -->
      <a href="index3.html" class="brand-link">
        <img src="/cetdabar/res/admin/dist/img/AdminLTELogo.png" alt="AdminLTE Logo"
          class="brand-image img-circle elevation-3" style="opacity: .8">
        <span class="brand-text font-weight-light">AdminLTE 3</span>
      </a>

      <!-- Sidebar -->
      <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
          <div class="image">
            <img src="/cetdabar/res/site/assets/user/<?php echo htmlspecialchars( $user["imguser"], ENT_COMPAT, 'UTF-8', FALSE ); ?>" class="img-circle elevation-2" alt="User Image">
          </div>
          <div class="info">
            <a href="#" class="d-block"><?php echo htmlspecialchars( $user["nomeuser"], ENT_COMPAT, 'UTF-8', FALSE ); ?></a>
          </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
          <ul class="nav nav-pills nav-sidebar flex-column side-menu" data-widget="treeview" role="menu" data-accordion="false">
            <!-- Início -->
            <li class="nav-item">
              <a href="/cetdabar/admin" class="nav-link">
                <span><i class="fa-solid fa-home"></i></span>
                <p style="margin-left: 2px;">Início</p>
              </a>
            </li>
            <!-- Users -->
            <li class="nav-item">
              <a href="/cetdabar/admin/users" class="nav-link">
                <span><i class="fa-solid fa-user"></i></span>
                <p style="margin-left: 2px;">Usuarios</p>
              </a>
            </li>
            <!-- Cursos -->
            <li class="nav-item">
              <a href="/cetdabar/admin/cursos" class="nav-link">
                <span><i class="fa-solid fa-pencil"></i></span>
                <p style="margin-left: 2px;">Cursos</p>
              </a>
            </li>
            <!-- Atigos -->
            <li class="nav-item">
              <a href="/cetdabar/admin/blog" class="nav-link">
                <span><i class="fa-solid fa-table-cells-large"></i></span>
                <p style="margin-left: 2px;">Artigos</p>
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
              <h1 class="m-0">Início</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                <li class="breadcrumb-item active">Início</li>
              </ol>
            </div><!-- /.col -->
          </div><!-- /.row -->
        </div><!-- /.container-fluid -->
      </div>
      <!-- /.content-header -->

      <!-- Main content -->
      <div class="content">
        <div class="container-fluid">
          <div class="row">
            <!-- /.col-md-6 -->
            <!-- Users -->
            <div class="col-md-3 col-sm-6 col-12">
              <div class="info-box shadow-sm">
                <span class="info-box-icon bg-success"><i class="fa-solid fa-user-plus"></i></span>

                <div class="info-box-content">
                  <span class="info-box-text">Usuarios cadastrados</span>
                  <span class="info-box-number"><?php echo htmlspecialchars( $qtdUsers, ENT_COMPAT, 'UTF-8', FALSE ); ?></span>
                </div>
                <!-- /.info-box-content -->
              </div>
              <!-- /.info-box -->
            </div>
            <!-- Cursos -->
            <div class="col-md-3 col-sm-6 col-12">
              <div class="info-box shadow-sm">
                <span class="info-box-icon bg-success"><i class="fa-solid fa-pencil"></i></span>

                <div class="info-box-content">
                  <span class="info-box-text">Cursos cadastrados</span>
                  <span class="info-box-number"><?php echo htmlspecialchars( $qtdCursos, ENT_COMPAT, 'UTF-8', FALSE ); ?></span>
                </div>
                <!-- /.info-box-content -->
              </div>
              <!-- /.info-box -->
            </div>
            <!-- Artigos -->
            <div class="col-md-3 col-sm-6 col-12">
              <div class="info-box shadow-sm">
                <span class="info-box-icon bg-success"><i class="fa-solid fa-table-cells-large"></i></span>

                <div class="info-box-content">
                  <span class="info-box-text">Artigos cadastrados</span>
                  <span class="info-box-number"><?php echo htmlspecialchars( $qtdArtigos, ENT_COMPAT, 'UTF-8', FALSE ); ?></span>
                </div>
                <!-- /.info-box-content -->
              </div>
              <!-- /.info-box -->
            </div>
            <!-- Turmas -->
            <div class="col-md-3 col-sm-6 col-12">
              <div class="info-box shadow-sm">
                <span class="info-box-icon bg-success"><i class="fa-solid fa-school"></i></span>

                <div class="info-box-content">
                  <span class="info-box-text">Turmas cadastradas</span>
                  <span class="info-box-number"><?php echo htmlspecialchars( $qtdTurmas, ENT_COMPAT, 'UTF-8', FALSE ); ?></span>
                </div>
                <!-- /.info-box-content -->
              </div>
              <!-- /.info-box -->
            </div>
            <!-- Contatos -->
            <div class="col-md-3 col-sm-6 col-12">
              <div class="info-box shadow-sm">
                <span class="info-box-icon bg-success"><i class="fa-solid fa-envelope"></i></span>

                <div class="info-box-content">
                  <span class="info-box-text">Contatos realizados</span>
                  <span class="info-box-number"><?php echo htmlspecialchars( $qtdTurmas, ENT_COMPAT, 'UTF-8', FALSE ); ?></span>
                </div>
                <!-- /.info-box-content -->
              </div>
              <!-- /.info-box -->
            </div>
            <!-- Matriculas -->
            <div class="col-md-3 col-sm-6 col-12">
              <div class="info-box shadow-sm">
                <span class="info-box-icon bg-success"><i class="fa-solid fa-clipboard-list"></i></span>

                <div class="info-box-content">
                  <span class="info-box-text">Matriculas realizadas</span>
                  <span class="info-box-number"><?php echo htmlspecialchars( $qtdMatricula, ENT_COMPAT, 'UTF-8', FALSE ); ?></span>
                </div>
                <!-- /.info-box-content -->
              </div>
              <!-- /.info-box -->
            </div>
            <!-- /.col-md-6 -->
          </div>
          <!-- /.row -->
        </div><!-- /.container-fluid -->
      </div>

      <div class="content">
        <div class="container-fluid">
          <div class="row">
            <!-- /.col-md-6 -->
            <!-- Usuarios -->
            <div class="col-lg-12 cardUser">
              <div class="card card-primary card-outline">
                <div class="card-header">
                  <h5 class="m-0">Usuarios</h5>
                </div>
                <div class="card-body">

                  <p class="card-text">Cadastre, altere e delete registro de usuarios</p>
                  <a href="/cetdabar/admin/users" class="btn btn-primary">Usuarios</a>
                </div>
              </div>
            </div>
            <!-- Cursos -->
            <div class="col-lg-12 cardCurso">
              <div class="card card-primary card-outline">
                <div class="card-header">
                  <h5 class="m-0">Cursos</h5>
                </div>
                <div class="card-body">

                  <p class="card-text">Cadastre, altere e delete registro de Cursos</p>
                  <a href="/cetdabar/admin/cursos" class="btn btn-primary">Cursos</a>
                </div>
              </div>
            </div>
            <!-- Artigos -->
            <div class="col-lg-12 cardCurso">
              <div class="card card-primary card-outline">
                <div class="card-header">
                  <h5 class="m-0">Artigos</h5>
                </div>
                <div class="card-body">

                  <p class="card-text">Cadastre, altere e delete registro de Artigos</p>
                  <a href="/cetdabar/admin/blog" class="btn btn-primary">Artigos</a>
                </div>
              </div>
            </div>
            <!-- Turmas -->
            <div class="col-lg-12 cardCurso">
              <div class="card card-primary card-outline">
                <div class="card-header">
                  <h5 class="m-0">Turmas</h5>
                </div>
                <div class="card-body">

                  <p class="card-text">Cadastre, altere e delete registro de Turmas</p>
                  <a href="/cetdabar/admin/class" class="btn btn-primary">Turmas</a>
                </div>
              </div>
            </div>
            <!-- Matricula -->
            <div class="col-lg-12 cardCurso">
              <div class="card card-primary card-outline">
                <div class="card-header">
                  <h5 class="m-0">Matrícula</h5>
                </div>
                <div class="card-body">

                  <p class="card-text">Cadastre, altere e delete registro de matrícula</p>
                  <a href="/cetdabar/admin/matricula" class="btn btn-primary">Matricula</a>
                </div>
              </div>
            </div>
            <!-- /.col-md-6 -->
          </div>
          <!-- /.row -->
        </div><!-- /.container-fluid -->
      </div>
      <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->

    <!-- Control Sidebar -->
    <aside class="control-sidebar control-sidebar-dark">
      <!-- Control sidebar content goes here -->
      <div class="p-3">
        <h5>Title</h5>
        <p>Sidebar content</p>
      </div>
    </aside>
    <!-- /.control-sidebar -->

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
  <script src="/cetdabar/res/admin/plugins/jquery/jquery.min.js"></script>
  <!-- Bootstrap 4 -->
  <script src="/cetdabar/res/admin/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
  <!-- AdminLTE App -->
  <script src="/cetdabar/res/admin/dist/js/adminlte.min.js"></script>
</body>

</html>
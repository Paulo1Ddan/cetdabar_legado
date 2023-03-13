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
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome Icons -->
    <link rel="stylesheet" href="/cetdabar/res/admin/plugins/fontawesome-free/css/all.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="/cetdabar/res/admin/dist/css/adminlte.css">
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
                        <img src="/cetdabar/res/site/assets/user/<?php echo htmlspecialchars( $user["imguser"], ENT_COMPAT, 'UTF-8', FALSE ); ?>" class="img-circle elevation-2"
                            alt="User Image">
                    </div>
                    <div class="info">
                        <a href="#" class="d-block"><?php echo htmlspecialchars( $user["nomeuser"], ENT_COMPAT, 'UTF-8', FALSE ); ?></a>
                    </div>
                </div>

                <!-- sidebar-menu -->
                <nav class="mt-2">
                    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                        data-accordion="false">
                        <!-- Início -->
                        <li class="nav-item">
                            <a href="/cetdabar/admin" class="nav-link">
                                <i class="fa-solid fa-home"></i>
                                <p>Início</p>
                            </a>
                        </li>
                        <!-- Users -->
                        <li class="nav-item">
                            <a href="/cetdabar/admin/users" class="nav-link">
                                <i class="fa-solid fa-user"></i>
                                <p>Usuarios</p>
                            </a>
                        </li>
                        <!-- Cursos -->
                        <li class="nav-item">
                            <a href="/cetdabar/admin/cursos" class="nav-link">
                                <i class="fa-solid fa-pencil"></i>
                                <p>Cursos</p>
                            </a>
                        </li>
                        <!-- Atigos -->
                        <li class="nav-item">
                            <a href="/cetdabar/admin/blog" class="nav-link">
                                <i class="fa-solid fa-table-cells-large"></i>
                                <p>Artigos</p>
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
                            <h1 class="m-0">Turmas</h1>
                        </div><!-- /.col -->
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="/cetdabar/">Home</a></li>
                                <li class="breadcrumb-item active"><a href="/cetdabar/admin">Painel</a></li>
                                <li class="breadcrumb-item active">Turmas</li>
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
                        <div class="col-12">
                            <div class="card">
                                <div class="card-header">
                                    <h3 class="card-title">Turmas cadastradas</h3>

                                    <div class="card-tools">
                                        <div class="input-group input-group-sm" style="width: 150px;">
                                            <a href="/cetdabar/admin/class/class-add" class="btn btn-primary">Cadastrar Turma</a>
                                        </div>
                                    </div>
                                </div>
                                <!-- /.card-header -->
                                <div class="card-body table-responsive p-0">
                                    <table class="table table-hover text-nowrap">
                                        <thead>
                                            <tr>
                                                <th>ID</th>
                                                <th>Nome</th>
                                                <th>Status</th>
                                                <th>Data Cad.</th>
                                                <th style="width: 200px;">Opções</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php $counter1=-1;  if( isset($turmas) && ( is_array($turmas) || $turmas instanceof Traversable ) && sizeof($turmas) ) foreach( $turmas as $key1 => $value1 ){ $counter1++; ?>
                                                <?php if( $value1["statusturma"] == 0 ){ ?>
                                                    <?php $value1["statusturma"] = "Inativa"; ?>
                                                <?php } ?>
                                                <?php if( $value1["statusturma"] == 1 ){ ?>
                                                    <?php $value1["statusturma"] = "Ativa"; ?>
                                                <?php } ?>
                                                <?php if( $value1["statusturma"] == 2 ){ ?>
                                                    <?php $value1["statusturma"] = "Pendente"; ?>
                                                <?php } ?>   
                                                <?php if( $value1["statusturma"] == 3 ){ ?>
                                                    <?php $value1["statusturma"] = "Completa"; ?>
                                                <?php } ?>
                                                <tr>
                                                    <td><?php echo htmlspecialchars( $value1["idturma"], ENT_COMPAT, 'UTF-8', FALSE ); ?></td>
                                                    <td><?php echo htmlspecialchars( $value1["nometurma"], ENT_COMPAT, 'UTF-8', FALSE ); ?></td>
                                                    <td><?php echo htmlspecialchars( $value1["statusturma"], ENT_COMPAT, 'UTF-8', FALSE ); ?></td>
                                                    <td><?php echo htmlspecialchars( $value1["datacadturma"], ENT_COMPAT, 'UTF-8', FALSE ); ?></td>
                                                    <td>                    
                                                        <a href="/cetdabar/admin/class/<?php echo htmlspecialchars( $value1["idturma"], ENT_COMPAT, 'UTF-8', FALSE ); ?>" class="btn btn-primary btn-xs"><i class="fa fa-edit"></i> Editar</a>
                                                        <a href="/cetdabar/admin/class/<?php echo htmlspecialchars( $value1["idturma"], ENT_COMPAT, 'UTF-8', FALSE ); ?>/delete"onclick="return confirm('Deseja realmente excluir este registro?')"class="btn btn-danger btn-xs"><i class="fa fa-trash"></i> Excluir</a>
                                                    </td>
                                                </tr>
                                            <?php } ?>
                                        </tbody>
                                    </table>
                                </div>
                                <!-- /.card-body -->
                            </div>
                            <!-- /.card -->
                        </div>
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
            <strong>Copyright &copy; 2014-2021 <a href="https://adminlte.io">AdminLTE.io</a>.</strong> All rights
            reserved.
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
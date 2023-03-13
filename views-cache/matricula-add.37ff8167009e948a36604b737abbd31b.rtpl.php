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
    <!-- Select2 -->
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">
    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome Icons -->
    <script src="https://kit.fontawesome.com/a9f506c8dd.js" crossorigin="anonymous"></script>
    <!-- Theme style -->
    <link rel="stylesheet" href="/cetdabar/res/admin/dist/css/adminlte.css">
    <!-- summernote -->
    <link rel="stylesheet" href="/cetdabar/res/admin/plugins/summernote/summernote-bs4.min.css">

    <link rel="stylesheet" href="/cetdabar/res/admin/css/curso-admin.css">
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
                            <h1 class="m-0">Turma</h1>
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
                            <div class="card card-primary">
                                <div class="card-header">
                                    <h3 class="card-title">Criar curso</h3>
                                </div>
                                <!-- /.card-header -->
                                <!-- form start -->
                                <form method="POST" action="/cetdabar/admin/matricula/matricula-add">
                                    <div class="card-body">
                                        <!-- Nome Usuario -->
                                        <label>Nome do Usuário</label>
                                        <div class="input-group mb-3" style="flex-wrap: nowrap;">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><i class="fa-solid fa-user"></i></span>
                                            </div>
                                            <select class="form-control js-example-basic-single" name="nameuser">
                                                <?php $counter1=-1;  if( isset($datausers) && ( is_array($datausers) || $datausers instanceof Traversable ) && sizeof($datausers) ) foreach( $datausers as $key1 => $value1 ){ $counter1++; ?>
                                                <option value="<?php echo htmlspecialchars( $value1["iduser"], ENT_COMPAT, 'UTF-8', FALSE ); ?>"><?php echo htmlspecialchars( $value1["nomeuser"], ENT_COMPAT, 'UTF-8', FALSE ); ?></option>
                                                <?php } ?>
                                            </select>
                                        </div>

                                        <!-- Curso -->
                                        <label>Curso</label>
                                        <div class="input-group mb-3" style="flex-wrap: nowrap;">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><i class="fa-solid fa-book"></i></span>
                                            </div>
                                            <select class="form-control js-example-basic-single" name="namecurso">
                                                <?php $counter1=-1;  if( isset($datacursos) && ( is_array($datacursos) || $datacursos instanceof Traversable ) && sizeof($datacursos) ) foreach( $datacursos as $key1 => $value1 ){ $counter1++; ?>
                                                <option value="<?php echo htmlspecialchars( $value1["idcurso"], ENT_COMPAT, 'UTF-8', FALSE ); ?>"><?php echo htmlspecialchars( $value1["nomecurso"], ENT_COMPAT, 'UTF-8', FALSE ); ?></option>
                                                <?php } ?>
                                            </select>
                                        </div>

                                        <!-- Turmas -->
                                        <label>Turma</label>
                                        <div class="input-group mb-3" style="flex-wrap: nowrap;">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><i class="fa-solid fa-book"></i></span>
                                            </div>
                                            <select class="form-control js-example-basic-single" name="nameturma">
                                                <?php $counter1=-1;  if( isset($dataturmas) && ( is_array($dataturmas) || $dataturmas instanceof Traversable ) && sizeof($dataturmas) ) foreach( $dataturmas as $key1 => $value1 ){ $counter1++; ?>
                                                <option value="<?php echo htmlspecialchars( $value1["idturma"], ENT_COMPAT, 'UTF-8', FALSE ); ?>"><?php echo htmlspecialchars( $value1["nometurma"], ENT_COMPAT, 'UTF-8', FALSE ); ?></option>
                                                <?php } ?>
                                            </select>
                                        </div>

                                        <!-- Vencimento Boleto -->
                                        <label for="vencimentoboleto" class="form-label">Dia de vencimento do
                                            boleto</label>
                                        <div class="input-group mb-3">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><i class="fa-solid fa-calendar"></i></span>
                                            </div>
                                            <select class="form-control" name="vencimentoboleto" id="vencimentoboleto">
                                                <option value="1">Dia 5 de cada mês</option>
                                                <option value="2">Dia 10 de cada mês</option>
                                                <option value="3">Dia 15 de cada mês</option>
                                                <option value="4">Dia 20 de cada mês</option>
                                                <option value="5">Dia 25 de cada mês</option>
                                            </select>
                                        </div>

                                        <!-- Data Cadastro -->
                                        <label for="datamatricula" class="form-label">Data de Cadastro</label>
                                        <div class="input-group mb-3">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><i
                                                        class="fa-solid fa-calendar"></i></span>
                                            </div>
                                            <input type="date" id="datamatricula" class="form-control" disabled value="<?php echo htmlspecialchars( $todaydate, ENT_COMPAT, 'UTF-8', FALSE ); ?>">
                                        </div>

                                        <!-- Status -->
                                        <label>Status</label>
                                        <div class="input-group mb-3">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><i class="fa-solid fa-globe"></i></span>
                                            </div>
                                            <select class="form-control" name="statusmatricula" id="statusturma">
                                                <option value="0">Inativa/Cancelada</option>
                                                <option value="1">Aprovada</option>
                                                <option value="2">Pendente</option>
                                                <option value="3">Finalizada</option>
                                            </select>
                                        </div>

                                    </div>
                                    <!-- /.card-body -->

                                    <div class="card-footer">
                                        <button type="submit" class="btn btn-primary">Cadastrar</button>
                                    </div>
                                </form>
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
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <!-- Bootstrap 4 -->
    <script src="/cetdabar/res/admin/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- AdminLTE App -->
    <script src="/cetdabar/res/admin/dist/js/adminlte.min.js"></script>
    <!-- Select2 -->
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <script>
        $(document).ready(function () {
            $('.js-example-basic-single').select2();
        });
    </script>
</body>

</html>
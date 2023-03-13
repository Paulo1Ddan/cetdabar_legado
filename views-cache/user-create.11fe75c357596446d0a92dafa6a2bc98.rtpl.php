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

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome Icons -->
    <script src="https://kit.fontawesome.com/a9f506c8dd.js" crossorigin="anonymous"></script>
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
                            <h1 class="m-0">Usuarios</h1>
                        </div><!-- /.col -->
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="/cetdabar/">Home</a></li>
                                <li class="breadcrumb-item active"><a href="/cetdabar/admin">Painel</a></li>
                                <li class="breadcrumb-item active">Usuarios</li>
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
                                    <h3 class="card-title">Criar Usuario</h3>
                                </div>
                                <!-- /.card-header -->
                                <!-- form start -->
                                <form method="POST" action="/cetdabar/admin/users/user-add">
                                    <div class="card-body">

                                        <!-- Nome -->
                                        <label for="nomeuser" class="form-label">Nome</label>
                                        <div class="input-group mb-3">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><i class="fa-solid fa-user"></i></span>
                                            </div>
                                            <input type="text" required name="nomeuser" id="nomeuser"
                                                class="form-control" placeholder="Nome">
                                        </div>

                                        <!-- Email -->
                                        <label for="emauluser" class="form-label">Email</label>
                                        <div class="input-group mb-3">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><i
                                                        class="fa-solid fa-envelope"></i></span>
                                            </div>
                                            <input type="email" required id="emailuser" name="emailuser"
                                                class="form-control" placeholder="Email">
                                        </div>

                                        <!-- Senha -->
                                        <label for="passuser" class="form-label">Senha</label>
                                        <div class="input-group mb-3">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><i class="fa-solid fa-lock"></i></span>
                                            </div>
                                            <input type="password" required id="passuser" name="passuser"
                                                class="form-control" placeholder="Senha">
                                        </div>

                                        <!-- Tel. -->
                                        <label class="form-label">Telefone</label>
                                        <div class="row">
                                            <div class="input-group col-lg-6 col-md-12 mb-3">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text"><i
                                                            class="bi bi-telephone-fill"></i></span>
                                                </div>
                                                <input type="tel" name="telfixo" class="form-control"
                                                    placeholder="Tel. Fixo" id="telfixo">
                                            </div>
                                            <div class="input-group col-lg-6 col-md-12 mb-3">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text"><i
                                                            class="bi bi-phone-fill"></i></i></span>
                                                </div>
                                                <input type="tel" name="celuser" class="form-control"
                                                    placeholder="Celular" required id="celuser">
                                            </div>
                                        </div>

                                        <!-- Data Nasc. -->
                                        <label for="datanasc" class="form-label">Data Nasc.</label>
                                        <div class="input-group mb-3">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><i
                                                        class="fa-solid fa-calendar-days"></i></span>
                                            </div>
                                            <input type="date" id="datanasc" name="datanasc" class="form-control"
                                                placeholder="Data Nasc.">
                                        </div>

                                        <!-- Documentos -->
                                        <label>Documentos</label>
                                        <div class="row">
                                            <div class="input-group col-lg-6 col-md-12 mb-3">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text"><i
                                                            class="bi bi-person-badge-fill"></i></span>
                                                </div>
                                                <input type="text" value="" name="documento" class="form-control"
                                                    placeholder="Documento" id="documento" required>
                                            </div>
                                            <div class="input-group col-lg-6 col-md-12 mb-3">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text"><i
                                                            class="fa-solid fa-id-card"></i></span>
                                                </div>
                                                <input type="text" value="" name="cpf" class="form-control"
                                                    placeholder="CPF" id="cpf" required>
                                            </div>
                                        </div>

                                        <!-- Sexo -->
                                        <label for="sexouser" class="form-label">Sexo</label>
                                        <div class="input-group mb-3">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><i
                                                        class="fa-solid fa-person-half-dress"></i></span>
                                            </div>
                                            <select class="form-control" name="sexouser" id="sexouser">
                                                <option value="1">Masculino</option>
                                                <option value="2">Feminino</option>
                                            </select>
                                        </div>

                                        <!-- Estado Civil -->
                                        <label for="maritalstates" class="form-label">Estado civíl</label>
                                        <div class="input-group mb-3">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><i class="fa-solid fa-ring"></i></span>
                                            </div>
                                            <input type="text" required id="maritalstates" name="estadocivil"
                                                class="form-control" placeholder="Estado Civil">
                                        </div>

                                        <!-- Categoria -->
                                        <label for="catuser" class="form-label">Categoria</label>
                                        <div class="input-group mb-3">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><i
                                                        class="fa-solid fa-user-graduate"></i></span>
                                            </div>
                                            <select class="form-control" name="catuser" id="catuser">
                                                <option value="1">Aluno</option>
                                                <option value="2">Professor</option>
                                            </select>
                                        </div>

                                        <!-- CEP -->
                                        <label for="cepuser" class="form-label">CEP</label>
                                        <div class="input-group mb-3">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><i class="fa-solid fa-user"></i></span>
                                            </div>
                                            <input type="text" required name="cepuser" id="cepuser" class="form-control" placeholder="CEP">
                                        </div>

                                        <!-- Endereço -->
                                        <label for="addressuser" class="form-label">Endereço</label>
                                        <div class="input-group mb-3">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><i class="fa-solid fa-envelope"></i></span>
                                            </div>
                                            <input type="text" required id="addressuser" name="addressuser" class="form-control" placeholder="Endereço">
                                        </div>

                                        <!-- Bairro -->
                                        <label for="bairrouser" class="form-label">Bairro</label>
                                        <div class="input-group mb-3">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><i class="fa-solid fa-envelope"></i></span>
                                            </div>
                                            <input type="text" required id="bairrouser" name="bairrouser" class="form-control" placeholder="Bairro">
                                        </div>

                                        <!-- Bairro -->
                                        <label for="cidadeuser" class="form-label">Bairro</label>
                                        <div class="input-group mb-3">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><i class="fa-solid fa-envelope"></i></span>
                                            </div>
                                            <input type="text" required id="cidadeuser" name="cidadeuser" class="form-control" placeholder="Cidade">
                                        </div>

                                        <!-- Numero -->
                                        <label for="numerouser" class="form-label">Numero</label>
                                        <div class="input-group mb-3">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><i class="fa-solid fa-envelope"></i></span>
                                            </div>
                                            <input type="text" required id="numerouser" name="numerouser" class="form-control" placeholder="Numero">
                                        </div>

                                        <!-- Complemento -->
                                        <label for="complementouser" class="form-label">Complemento</label>
                                        <div class="input-group mb-3">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><i class="fa-solid fa-envelope"></i></span>
                                            </div>
                                            <input type="text" required id="complementouser" name="complementouser" class="form-control"  placeholder="Complemento">
                                        </div>

                                        <!-- Admin -->
                                        <div class="form-check">
                                            <input type="checkbox" name="admin" class="form-check-input" value="1"
                                                id="useradmin">
                                            <label class="form-check-label" for="useradmin">Admin</label>
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
    <script src="/cetdabar/lib/Inputmask/dist/jquery.inputmask.min.js"></script>
    <script>
        $(document).ready(function () {
            $('#telfixo').inputmask("(99) 9999-9999")
            $('#celuser').inputmask("(99) 99999-9999")
            $('#cpf').inputmask("999.999.999-99")
            $('#documento').inputmask("99.999.999-9")
            $('#cepuser').inputmask("99999-999")
        })
    </script>
</body>

</html>
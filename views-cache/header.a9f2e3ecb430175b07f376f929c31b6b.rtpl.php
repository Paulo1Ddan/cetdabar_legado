<?php if(!class_exists('Rain\Tpl')){exit;}?><head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Blog - Dabar</title>
    <script src="https://kit.fontawesome.com/a9f506c8dd.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="res/site/css/global/reset.css">
    <link rel="stylesheet" href="res/site/css/global/global.css">
    <link rel="stylesheet" href="res/site/css/header/header.css">
    <link rel="stylesheet" href="res/site/css/footer/footer.css">
    <link rel="stylesheet" href="lib/bootstrap/css/bootstrap.css">
    <link rel="stylesheet" href="res/site/css/blog/blog.css">
</head>
<html lang="pt-br">
<body>
    <!-- Cabecalho -->
    <header bg-color="primary">
        <div class="logo">
            <img src="res/site/assets/logo/logo-dabar-verde.svg" alt="">
        </div>
        <div class="menu">
            <ul>
                <li><a href="/cetdabar/">Início</a></li>
                <li><a href="/cetdabar/sobre">Sobre</a></li>
                <li><a href="/cetdabar/cursos">Cursos</a></li>
                <li><a href="/cetdabar/blog">Blog</a></li>
                <li><a href="/cetdabar/contato">Contato</a></li>
            </ul>
        </div>
        <?php if( $login == 'online' ){ ?>
            <div class="perfil">
                <div class="imgPerfil dropdown-toggle" id="dropdownMenu" data-bs-toggle="dropdown" aria-expanded="false">
                    <img src="/res/site/assets/user/<?php echo htmlspecialchars( $datauser["imguser"], ENT_COMPAT, 'UTF-8', FALSE ); ?>" class="img"  alt=""> Paulo Daniel
                </div>
                <ul class="dropdown-menu" aria-labelledby="dropdownMenu">
                    <li><a class="dropdown-item" href="/user-perfil">Perfil</a></li>
                    <li><a class="dropdown-item" href="/user-cursos">Meus cursos</a></li>
                    <li><a class="dropdown-item" href="/cetdabar/logout">Sair</a></li>
                </ul>
            </div>
        <?php }else{ ?>
            <div class="login">
                <a href="/cetdabar/login">
                    <button class="btnLogin">Login</button>
                </a>
            </div>
        <?php } ?>
        <div class="iconMobile">
            <button class="openMenu"><img src="res/site/assets/icons/bars-solid.svg" alt=""></button>
        </div>
        <div class="menuMobile" bg-color="primary">
            <div class="iconCloseMobile">
                <button class="closeMenu"><img src="res/site/assets/icons/xmark-solid.svg" alt=""></button>
            </div>
            <?php if( $login == 'online' ){ ?>
                <div class="perfilMobile">
                    <div class="imgPerfil dropdown-toggle" id="dropdownMenu" data-bs-toggle="dropdown" aria-expanded="false">
                        <img src="tsuyu.jpg" class="img"  alt=""> Paulo Daniel
                    </div>
                    <ul class="dropdown-menu" aria-labelledby="dropdownMenu">
                        <li><a class="dropdown-item" href="/user-perfil">Perfil</a></li>
                        <li><a class="dropdown-item" href="/user-cursos">Meus cursos</a></li>
                        <li><a class="dropdown-item" href="/cetdabar/logout">Sair</a></li>
                    </ul>
                </div>
            <?php }else{ ?>
                <div class="loginMobile">
                    <a href="/cetdabar/login">
                        <button class="btnLogin">Login</button>
                    </a>
                </div>
            <?php } ?>
            <div class="navMobile">
                <ul>
                    <li><a href="/cetdabar/">Início</a></li>
                    <li><a href="/cetdabar/sobre">Sobre</a></li>
                    <li><a href="/cetdabar/cursos">Cursos</a></li>
                    <li><a href="/cetdabar/blog">Blog</a></li>
                    <li><a href="/cetdabar/contato">Contato</a></li>
                </ul>
            </div>
        </div>
    </header>
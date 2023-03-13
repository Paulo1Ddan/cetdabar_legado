<?php

use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use Class\Page;
use Class\Model\Cursos\Cursos;
use Class\Model\Sobre\Sobre;

    //Home
    $app->get('/cetdabar/', function (Request $request, Response $response) {

        if (isset($_SESSION['logado']) && $_SESSION['logado'] === true) {
            $login = "online";
            $page = new Page(array("header" => true, "footer" => true, "data" => array(
                "login" => $login,
                "datauser" => $_SESSION['user']
            )), "views/site/home");
        } else {
            $login = "offline";
            $page = new Page(array("header" => true, "footer" => true, "data" => array(
                "login" => $login
            )), "views/site/home");
        }

        if (isset($_SESSION['alert'])) {
            echo $_SESSION['alert'];
            unset($_SESSION['alert']);
        }


        $cursos = Cursos::listAll();

        for ($i = 0; $i < count($cursos); $i++) {
            $cursos[$i]['desccurso'] = mb_strimwidth($cursos[$i]['desccurso'], 0, 250, '...');
        }

        $sobre = Sobre::listAll();

        for ($i = 0; $i < count($sobre); $i++) {
            $sobre[$i]['sobre'] = mb_strimwidth($sobre[$i]['sobre'], 0, 500, '...');
        }

        $page->setTpl('index', array(
            "cursos" => $cursos,
            "sobre" => $sobre

        ));
        return $response;
    });

?>
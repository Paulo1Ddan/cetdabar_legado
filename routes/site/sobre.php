<?php

    use Psr\Http\Message\ResponseInterface as Response;
    use Psr\Http\Message\ServerRequestInterface as Request;
    use Class\Page;
    use Class\Model\Sobre\Sobre;

    //Sobre
    $app->get('/cetdabar/sobre', function (Request $request, Response $response) {

        if (isset($_SESSION['logado']) && $_SESSION['logado'] === true) {
            $login = "online";
            $page = new Page(array("header" => true, "footer" => true, "data" => array(
                "login" => $login,
                "datauser" => $_SESSION['user']
            )), "views/site/sobre");
        } else {
            $login = "offline";
            $page = new Page(array("header" => true, "footer" => true, "data" => array(
                "login" => $login
            )), "views/site/sobre");
        }

        $sobre = Sobre::listAll();

        $page->setTpl('sobre', array(
            "sobre" => $sobre
        ));
        return $response;
    });

?>
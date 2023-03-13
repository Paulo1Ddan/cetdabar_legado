<?php

    use Psr\Http\Message\ResponseInterface as Response;
    use Psr\Http\Message\ServerRequestInterface as Request;
    use Class\Page;
    use Class\Model\User\User;
    //Login
    $app->get("/cetdabar/login", function (Request $request, Response $response) {


        if (isset($_SESSION['alert'])) {
            echo $_SESSION['alert'];
            unset($_SESSION['alert']);
        }

        if (isset($_SESSION['logado']) && $_SESSION['logado'] === true) {
            header("Location: /cetdabar/");
            exit();
        }

        $page = new Page(array("header" => true, "footer" => true), "views/site/login");

        $page->setTpl("login");
        return $response;
    });

    $app->post("/cetdabar/login", function (Request $request, Response $response) {

        $user = User::login($_POST['login'], $_POST['pass']);

        if (!$user) {
            header("Location: /cetdabar/login");
            exit();
        } else {
            if ($_SESSION['user']['admin'] == 1) {
                header("Location: /cetdabar/admin");
                exit;
            } else {
                header("Location: /cetdabar/");
                exit();
            }
        }
        return $response;
    });

    $app->get("/cetdabar/logout", function (Request $request, Response $response) {

        $user = User::logout();
        if (!$user) {
            header("Location: /cetdabar/login");
            exit();
        } else {
            header("Location: /cetdabar/");
            exit();
        }
        return $response;
    });

?>
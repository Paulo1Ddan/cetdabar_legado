<?php

use Class\Model\Matricula\Matricula;
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use Class\Model\User\User;
use Class\PageAdmin;

//Admin users
$app->get("/cetdabar/admin/users", function (Request $request, Response $response) {
    if (isset($_SESSION['alert'])) {
        echo $_SESSION['alert'];
        unset($_SESSION['alert']);
    }

    if ($_SESSION['user']['admin'] != 1) {
        $_SESSION['alert'] = "<script>alert('Acesso negado');</script>";
        header("location: /cetdabar/");
        exit();
    }

    $users = new User();

    $data = $users->getUsers();

    if (count($data) > 0) {
        for ($i = 0; $i < count($data); $i++) {
            if ($data[$i]['status'] == 1) {
                $data[$i]['status'] = "Ativo";
            } else {
                $data[$i]['status'] = "Inativo";
            }

            if ($data[$i]['admin'] == 1) {
                $data[$i]['admin'] = "Sim";
            } else {
                $data[$i]['admin'] = "Não";
            }
        }
    }

    $page = new PageAdmin(array(
        "header" => false,
        "footer" => false,
        "data" => array(
            "user" => $_SESSION['user'],
            "users" => $data
        )
    ), "views/admin/users-admin");

    $page->setTpl("users");

    return $response;
});

//Create
$app->get("/cetdabar/admin/users/user-add", function (Request $request, Response $response) {
    if (isset($_SESSION['alert'])) {
        echo $_SESSION['alert'];
        unset($_SESSION['alert']);
    }

    if ($_SESSION['user']['admin'] != 1) {
        $_SESSION['alert'] = "<script>alert('Acesso negado');</script>";
        header("location: /cetdabar/");
        exit();
    }

    $page = new PageAdmin(array(
        "header" => false,
        "footer" => false,
        "data" => array(
            "user" => $_SESSION['user']
        )
    ), "views/admin/users-admin");

    $page->setTpl("user-create");

    return $response;
});
$app->post("/cetdabar/admin/users/user-add", function (Request $request, Response $response) {

    $user = new User();



    if ($user->validateDataCreateUserAdmin($_POST)) {
        if ($user->createUserAdmin($_POST)) {
            header("Location: /cetdabar/admin/users");
            exit();
        } else {
            header("Location: /cetdabar/admin/users/user-add");
            exit();
        }
    } else {
        header("Location: /cetdabar/admin/users/user-add");
        exit();
    }

    return $response;
});

//Update
$app->get("/cetdabar/admin/users/{iduser}", function (Request $request, Response $response, $args) {
    $iduser = $args['iduser'];

    if (isset($_SESSION['alert'])) {
        echo $_SESSION['alert'];
        unset($_SESSION['alert']);
    }

    if ($_SESSION['user']['admin'] != 1) {
        $_SESSION['alert'] = "<script>alert('Acesso negado');</script>";
        header("location: /cetdabar/");
        exit();
    }

    $user = new User();

    $data = $user->get($iduser);

    if ($data == 0) {
        header("Location: /cetdabar/admin/users");
        exit();
    }

    $dataaddress = $user->getAddrUser($iduser);

    $_SESSION['iduseraddress'] = $dataaddress['iduser'];

    $page = new PageAdmin(array(
        "header" => false,
        "footer" => false,
        "data" => [
            "user" => $_SESSION['user'],
            "userdata" => $data,
            "address" => $dataaddress
        ]
    ), "views/admin/users-admin");

    $page->setTpl("user-update");

    return $response;
});
$app->post("/cetdabar/admin/users/{iduser}", function (Request $request, Response $response, $args) {
    $iduser = $args['iduser'];

    $user = new User();

    $_POST['iduser'] = $iduser;
    $_POST['admin'] = (isset($_POST['admin']) ? $_POST['admin'] : 0);

    if ($user->validateUpdateUserAdmin($_POST)) {
        $user->setData($_POST);
        if ($user->updateUserAdmin()) {
            header("Location: /cetdabar/admin/users");
            exit();
        } else {
            header("Location: /cetdabar/admin/users/$iduser");
            exit();
        }
    } else {
        header("Location: /cetdabar/admin/users/$iduser");
        exit();
    }

    return $response;
});
$app->post("/cetdabar/admin/users/address-user/{iduser}", function (Request $request, Response $response, $args) {

    $iduser = $args['iduser'];

    $user = new User();
    $user->setData($_POST);
    $user->updateAddress($_SESSION['iduseraddress']);
    header("Location: /cetdabar/admin/users/$_SESSION[iduseraddress]");
    exit();

    return $response;
});
$app->post("/cetdabar/admin/users/{iduser}/update-img", function (Request $request, Response $response, $args) {

    $iduser = $args['iduser'];

    $user = new User();

    $nameimguser = $user->validateImgUser($_FILES['imguser']);

    if($nameimguser){
        $_POST['imguser'] = $nameimguser;
        $user->setData($_POST);
        $user->updateImg($iduser, $_POST['oldimguser']);
        header("Location: /cetdabar/admin/users/$_SESSION[iduseraddress]");
        exit();
    }else{
        header("Location: /cetdabar/admin/users/$_SESSION[iduseraddress]");
        exit();
    }

    return $response;
});
$app->post("/cetdabar/admin/users/{iduser}/matricula", function (Request $request, Response $response, $args) {

    $iduser = $args['iduser'];

    $users = new User();
    $users->setData($_POST);
    $users->updateDadosMatricula($iduser);
    return $response;
});

//Delete
$app->get("/cetdabar/admin/users/{iduser}/delete", function (Request $request, Response $response, $args) {
    if ($_SESSION['user']['admin'] != 1) {
        $_SESSION['alert'] = "<script>alert('Acesso negado');</script>";
        header("location: /cetdabar/");
        exit();
    }

    $iduser = $args['iduser'];

    $user = new User();

    $user->setData($user->get($iduser));

    if ($user->delete()) {
        header("Location: /cetdabar/admin/users");
        exit();
    } else {
        header("Location: /cetdabar/admin/users");
        exit();
    }

    return $response;
});

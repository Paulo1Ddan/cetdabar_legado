<?php 

    use Psr\Http\Message\ResponseInterface as Response;
    use Psr\Http\Message\ServerRequestInterface as Request;
    use Class\Page;
    use Class\Model\User\User;

    $app->get("/cetdabar/login/forgot", function (Request $request, Response $response){
        if(isset($_SESSION['alert'])){
            echo $_SESSION['alert'];
            unset($_SESSION['alert']);
        }

        if(isset($_SESSION['logado']) && $_SESSION['logado'] === true){
            header("Location: /cetdabar/");
            exit();
        }

        $page = new Page(array("header" => true, "footer" => true), "views/site/forgot");

        $page->setTpl('forgot');
        return $response;
    });

    $app->post("/cetdabar/login/forgot", function (Request $request, Response $response){
        
        $user = new User();

        $email = $_POST['email'];

        if($user->getForgot($email)){
            header("Location: /cetdabar/login");
            exit();
        }else{
            header("Location: /cetdabar/login/forgot");
            exit();
        }

        return $response;
    });

    $app->get("/cetdabar/login/reset", function (Request $request, Response $response){
        
        $user = new User();

        if($user->validForgotDecrypt($_GET['code'])){
            $page = new Page(array("header" => true, "footer" => true), "views/site/reset");

            if(isset($_SESSION['alert'])){
                echo $_SESSION['alert'];
                unset($_SESSION['alert']);
            }

            if(isset($_SESSION['logado']) && $_SESSION['logado'] === true){
                header("Location: /cetdabar/");
                exit();
            }

            $page->setTpl("reset", array("code" => $_GET['code']));
        }else{
            header("Location: /cetdabar/login");
            exit();
        }


        return $response;
    });

    $app->post("/cetdabar/login/reset", function (Request $request, Response $response){
        
        if(empty($_POST['pass']) || empty($_POST['cpass'])){
            $_SESSION['alert'] = "<script>alert('Preencha todos os campos')</script>";
            header("Location: /cetdabar/login/reset?code=$_POST[code]");
            exit();
        }else if($_POST['pass'] !== $_POST['cpass']){
            $_SESSION['alert'] = "<script>alert('Senhas diferentes')</script>";
            header("Location: /cetdabar/login/reset?code=$_POST[code]");
            exit();
        }else if(!preg_match('/^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])[a-zA-Z\d].\S{8,}$/', $_POST['pass'])){
            $_SESSION['alert'] = "<script>alert('Insira uma senha com no mínimo 8 caracteres, uma leitra maiúscula, uma letra minúscula e um número')</script>";
            header("Location: /cetdabar/login/reset?code=$_POST[code]");
            exit();
        }else{
            $user = new User();

            $forgot = $user->validForgotDecrypt($_POST['code']);
            $iduser = $forgot['iduser'];

            $pass = password_hash($_POST['pass'], PASSWORD_DEFAULT, ['cost' => 12]);

            if($user->setPassword($pass, $iduser)){
                $user->setForgot($forgot['idrecovery']);
                header("Location: /cetdabar/login");
                exit();    
            }else{
                header("Location: /cetdabar/login/reset?code=$_POST[code]");
                exit();
            }
        }

        return $response;
    });

?>
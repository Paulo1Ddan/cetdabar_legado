<?php 
    use Psr\Http\Message\ResponseInterface as Response;
    use Psr\Http\Message\ServerRequestInterface as Request;
    use Class\Model\Turmas\Turmas;
    use Class\PageAdmin;

    //Get Turmas
    $app->get("/cetdabar/admin/class", function(Request $request, Response $response){
        if (isset($_SESSION['alert'])) {
            echo $_SESSION['alert'];
            unset($_SESSION['alert']);
        }
    
        if ($_SESSION['user']['admin'] != 1) {
            $_SESSION['alert'] = "<script>alert('Acesso negado');</script>";
            header("location: /cetdabar/");
            exit();
        }

        $class = Turmas::listAll();

        for($i = 0; $i < count($class); $i++) {
            $class[$i]['datacadturma'] = date("d/m/Y",strtotime($class[$i]['datacadturma']));
        }

        $page = new PageAdmin(array(
            "header" => false,
            "footer" => false,
            "data" => array(
                "user" => $_SESSION['user'],
                "turmas"  => $class
            )
        ), "views/admin/turmas-admin");

        $page->setTpl("turmas");
        
        return $response;
    });

    //Add Turma
    $app->get("/cetdabar/admin/class/class-add", function(Request $request, Response $response){
        if (isset($_SESSION['alert'])) {
            echo $_SESSION['alert'];
            unset($_SESSION['alert']);
        }
    
        if ($_SESSION['user']['admin'] != 1) {
            $_SESSION['alert'] = "<script>alert('Acesso negado');</script>";
            header("location: /cetdabar/");
            exit();
        }

        $class = new Turmas();
        $page = new PageAdmin(array(
            "header" => false,
            "footer" => false,
            "data" => array(
                "user" => $_SESSION['user'],
                "todaydate" => date("Y-m-d")
            )
        ), "views/admin/turmas-admin");

        $page->setTpl("turmas-add");

        return $response;
    });
    $app->post("/cetdabar/admin/class/class-add", function(Request $request, Response $response){

        $class = new Turmas();

        $_POST['datacadturma'] = date("Y-m-d");
        
        if(Turmas::validateClass($_POST)){
            $class->setData($_POST);
            if($class->insertClass()){
                header("Location: /cetdabar/admin/class");
                exit(); 
            }else{
                header("Location: /cetdabar/admin/class/class-add");
                exit(); 
            }
        }else{
            header("Location: /cetdabar/admin/class/class-add");
            exit();   
        }

        return $response;
    });

    //Update Turma
    $app->get("/cetdabar/admin/class/{idclass}", function(Request $request, Response $response, $args){
       
        if (isset($_SESSION['alert'])) {
            echo $_SESSION['alert'];
            unset($_SESSION['alert']);
        }
    
        if ($_SESSION['user']['admin'] != 1) {
            $_SESSION['alert'] = "<script>alert('Acesso negado');</script>";
            header("location: /cetdabar/");
            exit();
        }

        $idclass = $args['idclass'];

        $class = new Turmas();

        $data = Turmas::getClass($idclass); 

        $statusturma = array(
            array(
                "value" => 0,
                "name" => "Inativo"
            ),
            array(
                "value" => 1,
                "name" => "Ativo"
            ),
            array(
                "value" => 2,
                "name" => "Pendente"
            ),
            array(
                "value" => 3,
                "name" => "Completa"
            ),
        );

        $page = new PageAdmin(array(
            "header" => false,
            "footer" => false,
            "data" => array(
                "user" => $_SESSION['user'],
                "classdata" => $data,
                "statusturma" => $statusturma
            )
        ), "views/admin/turmas-admin");

        $page->setTpl("turmas-update");

        return $response;
    });
    $app->post("/cetdabar/admin/class/{idclass}", function(Request $request, Response $response, $args){
        $idclass = $args['idclass'];

        $_POST['datacadturma'] = date("Y-m-d");
        $class = new Turmas();

        if(Turmas::validateClass($_POST)){
            $class->setData($_POST);
            if($class->updateClass($_POST, $idclass)){
                header("Location: /cetdabar/admin/class");
                exit();
            }else{
                header("Location: /cetdabar/admin/class/$idclass");
                exit();
            }
        }else{
            header("Location: /cetdabar/admin/class");
            exit();
        }

        return $response;
    });

    //Delete Turma
    $app->get("/cetdabar/admin/class/{idclass}/delete", function(Request $request, Response $response, $args){
        $idclass = $args['idclass'];

        $class = new Turmas();

        if($class->delete($idclass)){
            header("Location: /cetdabar/admin/class");
            exit();
        }else{
            header("Location: /cetdabar/admin/class");
            exit();
        }

        return $response;
    });
?>
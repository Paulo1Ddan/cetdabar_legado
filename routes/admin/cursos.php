<?php 

    use Psr\Http\Message\ResponseInterface as Response;
    use Psr\Http\Message\ServerRequestInterface as Request;
    use Class\Model\Cursos\Cursos;
    use Class\PageAdmin;
    use Class\Model\Files\Files;

    //Get Cursos
    $app->get("/cetdabar/admin/cursos", function(Request $request, Response $response){
        if (isset($_SESSION['alert'])) {
            echo $_SESSION['alert'];
            unset($_SESSION['alert']);
        }
    
        if ($_SESSION['user']['admin'] != 1) {
            $_SESSION['alert'] = "<script>alert('Acesso negado');</script>";
            header("location: /cetdabar/");
            exit();
        }

        $cursos = Cursos::listCursosAdmin();

        $page = new PageAdmin(array(
            "header" => false,
            "footer" => false,
            "data" => array(
                "user" => $_SESSION['user'],
                "cursos" => $cursos
            )
        ), "views/admin/curso-admin");

        $page->setTpl("cursos");

        return $response;
    });

    //Create curso
    $app->get("/cetdabar/admin/cursos/curso-add", function(Request $request, Response $response){
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
        ), "views/admin/curso-admin");

        $page->setTpl("curso-create");

        return $response;
    });
    $app->post("/cetdabar/admin/cursos/curso-add", function (Request $request, Response $response){

        $curso = new Cursos();

        $nameimg = $curso->validateImgCurso($_FILES['imgcurso']);
        if(Cursos::validateCurso($_POST)){
            if($nameimg){
                $_POST['imgcurso'] = "assets/cursos/$nameimg";

                if($curso->createCurso($_POST)){
                    header("location: /cetdabar/admin/cursos");
                    exit(); 
                }else{
                    header("location: /cetdabar/admin/cursos/curso-add");
                    exit(); 
                }
            }else{
                header("location: /cetdabar/admin/cursos/curso-add");
                exit(); 
            }
        }else{
            header("location: /cetdabar/admin/cursos/curso-add");
            exit();
        }

        return $response;
    });

    //Update curso
    $app->get('/cetdabar/admin/cursos/{idcurso}', function(Request $request, Response $response, $args){
        if (isset($_SESSION['alert'])) {
            echo $_SESSION['alert'];
            unset($_SESSION['alert']);
        }
    
        if ($_SESSION['user']['admin'] != 1) {
            $_SESSION['alert'] = "<script>alert('Acesso negado');</script>";
            header("location: /cetdabar/");
            exit();
        }

        $idcurso = $args['idcurso'];

        $curso = new Cursos();

        $data = $curso->getCurso($idcurso);

        $url = preg_replace(array("/(á|à|ã|â|ä)/","/(Á|À|Ã|Â|Ä)/","/(é|è|ê|ë)/","/(É|È|Ê|Ë)/","/(í|ì|î|ï)/","/(Í|Ì|Î|Ï)/","/(ó|ò|õ|ô|ö)/","/(Ó|Ò|Õ|Ô|Ö)/","/(ú|ù|û|ü)/","/(Ú|Ù|Û|Ü)/","/(ñ)/","/(Ñ)/"),explode(" ","a A e E i I o O u U n N"),$data['nomecurso']);

        $url = strtolower($url);
        $url = str_replace(' ', '-', $url);
        $data['url'] = $url;

        $files = Files::liisFiles($idcurso);

        $_SESSION['curso'] = $data['idcurso'];

        $page = new PageAdmin(array(
            "header" => false,
            "footer" => false,
            "data" => array(
                "user" => $_SESSION['user'],
                "cursodata" => $data,
                "files" => $files
            )
        ), "views/admin/curso-admin");

        $page->setTpl("curso-update");

        return $response;
    });
    $app->post('/cetdabar/admin/cursos/{idcurso}', function(Request $request, Response $response, $args){
        $idcurso = $args['idcurso'];

        $curso = new Cursos();

        if($curso->validateCursoUpdate($_POST)){
            $_POST['idcurso'] = $idcurso;
            $curso->setData($_POST);

            if($curso->updateCurso()){
                header("Location: /cetdabar/admin/cursos");
                exit();
            }else{
                header("Location: /cetdabar/admin/cursos/$idcurso");
                exit();
            }
        }else{
            header("Location: /cetdabar/admin/cursos/$idcurso");
            exit();
        }

        return $response;
    });
    $app->post('/cetdabar/admin/cursos/{idcurso}/update-img', function(Request $request, Response $response, $args){

        $idcurso = $args['idcurso'];

        $curso = new Cursos();

        $nameimg = $curso->validateImgCurso($_FILES['imgcurso']);
        if($nameimg){
            $_POST['imgcurso'] = "assets/cursos/$nameimg";
            $_POST['idcurso'] = $idcurso;
            $curso->setData($_POST);
            if($curso->updateImgCurso()){
                header("Location: /cetdabar/admin/cursos");
                exit();
            }else{
                header("Location: /cetdabar/admin/cursos/$idcurso");
                exit();
            }
        }else{
            header("Location: /cetdabar/admin/cursos/$idcurso");
            exit();
        }
    });

    //Add Files
    $app->get('/cetdabar/admin/cursos/{nomecurso}/file-add', function(Request $request, Response $response, $args){
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
                "user" => $_SESSION['user'],
                "curso" => $args['nomecurso']
            )
        ), "views/admin/file-admin");

        $page->setTpl("add-file");


        return $response;
    });
    $app->post('/cetdabar/admin/cursos/{nomecurso}/file-add', function(Request $request, Response $response, $args){
        if (isset($_SESSION['alert'])) {
            echo $_SESSION['alert'];
            unset($_SESSION['alert']);
        }
    
        if ($_SESSION['user']['admin'] != 1) {
            $_SESSION['alert'] = "<script>alert('Acesso negado');</script>";
            header("location: /cetdabar/");
            exit();
        }

        $files = new Files();

        $validfile = Files::validateFile($_FILES['filecurso'], "CADASTRO");

        if($validfile){
            $namefile = Files::uploadFile($_FILES['filecurso'], $args['nomecurso']);
            
            $filedata = array(
                "file" => $namefile,
                "curso" => $_SESSION['curso']
            );

            $files->setData($filedata);

            if($files->insertFile()){
                header("Location: /cetdabar/admin/cursos/$_SESSION[curso]");
                exit();
            }else{
                echo "Error";  
            }
        }

        return $response;
    });

    //Update File
    $app->get("/cetdabar/admin/cursos/{nomecurso}/file/{idfile}", function(Request $request, Response $response, $args){

        $curso = $args['nomecurso'];
        $idfile = $args['idfile'];

        $files = FILES::selectFile($idfile);

        $page = new PageAdmin(array(
            "header" => false,
            "footer" => false,
            "data" => array(
                "user" => $_SESSION['user'],
                "curso" => $args['nomecurso'],
                "dataarquivo" => $files
            )
        ), "views/admin/file-admin");

        $page->setTpl("update-file");

        return $response;
    });
    
    //Delete
    $app->get("/cetdabar/admin/cursos/{idcurso}/delete", function(Request $request, Response $response, $args){
        if ($_SESSION['user']['admin'] != 1) {
            $_SESSION['alert'] = "<script>alert('Acesso negado');</script>";
            header("location: /cetdabar/");
            exit();
        }

        $idcurso = $args['idcurso'];

        $curso = new Cursos();

        $curso->setData($curso->getCurso($idcurso));

        if($curso->delete()){
            header("location: /cetdabar/admin/cursos");
            exit();
        }else{
            header("location: /cetdabar/admin/cursos");
            exit();
        }
        return $response;
    });
?>
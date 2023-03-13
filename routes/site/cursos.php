<?php

    use Psr\Http\Message\ResponseInterface as Response;
    use Psr\Http\Message\ServerRequestInterface as Request;
    use Class\Page;
    use Class\Model\Cursos\Cursos;

    //Cursos
    $app->get('/cetdabar/cursos', function (Request $request, Response $response) {

        if (isset($_SESSION['logado']) && $_SESSION['logado'] === true) {
            $login = "online";
            $page = new Page(array("header" => true, "footer" => true, "data" => array(
                "login" => $login,
                "datauser" => $_SESSION['user']
            )), "views/site/cursos");
        } else {
            $login = "offline";
            $page = new Page(array("header" => true, "footer" => true, "data" => array(
                "login" => $login
            )), "views/site/cursos");
        }

        $cursos = Cursos::listAll();

        for ($i = 0; $i < count($cursos); $i++) {
            $cursos[$i]['desccurso'] = mb_strimwidth($cursos[$i]['desccurso'], 0, 500, '...');
        }

        $page->setTpl('cursos', array(
            "cursos" => $cursos
        ));
        return $response;
    });
    $app->get('/cetdabar/cursos/{idCurso}', function (Request $request, Response $response, $args){
        if(isset($_SESSION['logado']) && $_SESSION['logado'] === true){
            $login = "online";
            $page = new Page(array("header" => true, "footer" => true, "data" => array(
                "login" => $login,
                "datauser" => $_SESSION['user']
            )), "views/site/cursos/curso-list");
        }else{
            $login = "offline";
            $page = new Page(array("header" => true, "footer" => true, "data" => array(
                "login" => $login
            )), "views/site/cursos/curso-list");
        }

        $idCurso = $args['idCurso'];

        $curso = new Cursos();

        $data = $curso->getCurso($idCurso);

        if($data){
            $page->setTpl('curso-list', array('curso' => $data));
        }else{
            echo "Erro 404: Pagina não encontrada";
        }
        return $response; 
    });

?>
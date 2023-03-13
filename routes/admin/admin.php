<?php 

    use Psr\Http\Message\ResponseInterface as Response;
    use Psr\Http\Message\ServerRequestInterface as Request;
    use Class\Model\Cursos\Cursos;
    use Class\Model\User\User;
    use Class\Model\Blog\Blog;
    use Class\Model\Turmas\Turmas;
    use Class\Model\Matricula\Matricula;
    use Class\PageAdmin;

    $app->get('/cetdabar/admin', function (Request $request, Response $response){
        if(isset($_SESSION['alert'])){
            echo $_SESSION['alert'];
            unset($_SESSION['alert']);
        }

        if($_SESSION['user']['admin'] != 1){
            $_SESSION['alert'] = "<script>alert('Acesso negado');</script>";
            header("location: /cetdabar/");
            exit();
        }

        $users = new User();
        $cursos = new Cursos();

        $qtdUsers = count($users->getUsers());

        $qtdCursos = count($cursos->listCursosAdmin());

        $qtdArtigos = count(Blog::listAllAdmin());

        $qtdTurmas = count(Turmas::listAll());
        
        $qtdMatriculas = count(Matricula::listAll());

        $page = new PageAdmin(array(
            "header" => false,
            "footer" => false,
            "data" => array(
                "user" => $_SESSION['user']
            )
        ), "views/admin/home-admin");

        $page->setTpl("index", array(
            "qtdUsers" => $qtdUsers,
            "qtdCursos" => $qtdCursos,
            "qtdArtigos" => $qtdArtigos,
            "qtdTurmas" => $qtdTurmas,
            "qtdMatricula" => $qtdMatriculas
        ));

        return $response;
    });

?>
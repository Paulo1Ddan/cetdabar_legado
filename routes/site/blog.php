<?php 

    use Psr\Http\Message\ResponseInterface as Response;
    use Psr\Http\Message\ServerRequestInterface as Request;
    use Class\Page;
    use Class\Model\Blog\Blog;
    //Blog
    $app->get('/cetdabar/blog', function (Request $request, Response $response){
        if(isset($_SESSION['logado']) && $_SESSION['logado'] === true){
            $login = "online";
            $page = new Page(array("header" => true, "footer" => true, "data" => array(
                "login" => $login,
                "datauser" => $_SESSION['user']
            )), "views/site/blog");
        }else{
            $login = "offline";
            $page = new Page(array("header" => true, "footer" => true, "data" => array(
                "login" => $login
            )), "views/site/blog");
        }

        $blog = Blog::listAll();
        
        for($i = 0; $i < count($blog); $i++){
            $blog[$i]['artigo'] = mb_strimwidth($blog[$i]['artigo'], 0, 500, '...');
        }

        $page->setTpl('blog', array(
            "blog" => $blog
        ));

        return $response;
    });
    $app->get("/cetdabar/blog/{idArtigo}", function (Request $request, Response $response, $args){
        if(isset($_SESSION['logado']) && $_SESSION['logado'] === true){
            $login = "online";
            $page = new Page(array("header" => true, "footer" => true, "data" => array(
                "login" => $login,
                "datauser" => $_SESSION['user']
            )), "views/site/blog/blog-list");
        }else{
            $login = "offline";
            $page = new Page(array("header" => true, "footer" => true, "data" => array(
                "login" => $login
            )), "views/site/blog/blog-list");
        }

        $idArtigo = $args['idArtigo'];

        $artigo = new Blog();

        $data = $artigo->getBlog($idArtigo);

        $page->setTpl("blog-list", array(
            "artigo" => $data
        ));
        return $response;
    });

?>
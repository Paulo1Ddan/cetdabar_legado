<?php 

    use Psr\Http\Message\ResponseInterface as Response;
    use Psr\Http\Message\ServerRequestInterface as Request;
    use Class\Model\Blog\Blog;
    use Class\PageAdmin;

    $app->get("/cetdabar/admin/blog", function(Request $request, Response $response){

        if(isset($_SESSION['alert'])){
            echo $_SESSION['alert'];
            unset($_SESSION['alert']);
        }

        if($_SESSION['user']['admin'] != 1){
            $_SESSION['alert'] = "<script>alert('Acesso negado');</script>";
            header("location: /cetdabar/");
            exit();
        }

        $data = Blog::listAllAdmin();

        for ($i = 0; $i < count($data); $i++){
            $dataArtigo = explode("-",$data[$i]['dataartigo']);
            $data[$i]['dataartigo'] = "$dataArtigo[2]/$dataArtigo[1]/$dataArtigo[0]";
        }

        $page = new PageAdmin(array(
            "header" => false,
            "footer" => false,
            "data" => array(
                "blog" => $data, 
                "user" => $_SESSION['user']
            )
        ), "views/admin/blog-admin");

        $page->setTpl("artigos");

        return $response;
    });

    //blog-add
    $app->get("/cetdabar/admin/blog/blog-add", function(Request $request, Response $response){

        if(isset($_SESSION['alert'])){
            echo $_SESSION['alert'];
            unset($_SESSION['alert']);
        }
        if($_SESSION['user']['admin'] != 1){
            $_SESSION['alert'] = "<script>alert('Acesso negado');</script>";
            header("location: /cetdabar/");
            exit();
        }

        $dataautor = $_SESSION['user'];

        $page = new PageAdmin(array(
            "header" => false,
            "footer" => false,
            "data" => array(
                "user" => $_SESSION['user'],
                "nameuserblog" => $dataautor['nomeuser']
            )
        ),"views/admin/blog-admin");

        $page->setTpl("artigo-create");

        return $response;

    });
    $app->post("/cetdabar/admin/blog/blog-add", function(Request $request, Response $response){
        
        $verifyBlog = Blog::validateBlog($_POST);
        
        $blog = new Blog();

        if($verifyBlog){
            
            $imgartigo = $blog->verifyImgs($_FILES);

            if(!$imgartigo){
                header("Location: /cetdabar/admin/blog/blog-add");
                exit();
            }else{
                if(!$blog->uploadimage($imgartigo['capa'], $imgartigo['banner'])){
                    header("Location: /cetdabar/admin/blog/blog-add");
                    exit();
                }else{
                    $_POST['imgcapa'] = $imgartigo['capa']['namecapa'];
                    $_POST['imgbanner'] = $imgartigo['banner']['namebanner'];
                    if($blog->saveartigo($_POST, $iduser = $_SESSION['user']['iduser'])){
                        header("Location: /cetdabar/admin/blog");
                        exit();
                    }else{
                        header("Location: /cetdabar/admin/blog/blog-add");
                        exit();
                    }
                }
            }
        }else{            
            header("Location: /cetdabar/admin/blog/blog-add");
            exit();
        }

        return $response;
    });

    //Blog Update
    $app->get("/cetdabar/admin/blog/{idblog}", function(Request $request, Response $response, $args){
        if (isset($_SESSION['alert'])) {
            echo $_SESSION['alert'];
            unset($_SESSION['alert']);
        }
    
        if ($_SESSION['user']['admin'] != 1) {
            $_SESSION['alert'] = "<script>alert('Acesso negado');</script>";
            header("location: /cetdabar/");
            exit();
        }

        $idblog = $args['idblog'];

        $blog = new Blog();

        $data = $blog->getBlog($idblog);

        $page = new PageAdmin(array(
            "header" => false,
            "footer" => false,
            "data" => array(
                "user" => $_SESSION['user'],
                "blogdata" => $data,
                "nameuserblog" => $_SESSION["user"]["nomeuser"]
            )
        ), "views/admin/blog-admin");

        $page->setTpl("artigo-update");

        return $response;
    });
    $app->post("/cetdabar/admin/blog/{idblog}", function(Request $request, Response $response, $args){
        $idblog = $args['idblog'];

        $blog = new Blog();

        if($blog->validateBlogUpdate($_POST)){
            if($blog->updateBlog($_POST, $idblog)){
                header("Location: /cetdabar/admin/blog");
                exit();
            }else{
                header("Location: /cetdabar/admin/blog/$idblog");
                exit();
            }
        }else{
            header("Location: /cetdabar/admin/blog/$idblog");
            exit();
        }

        return $response;
    });
    $app->post("/cetdabar/admin/blog/{idblog}/update-capa", function(Request $request, Response $response, $args){
        $idblog = $args['idblog'];

        $blog = new Blog();

        $namecapa = $blog->verifyUpdateCapa($_FILES['imgcapa']);

        if(!$namecapa){
            header("Location: /cetdabar/admin/blog/$idblog");
            exit();
        }else{
            $_POST['imgcapa'] = $namecapa['img']['name'];
            $oldCapa = $_POST['oldImgCapa'];
            if(!$blog->uploadImageUptade($namecapa['img'])){
                header("Location: /cetdabar/admin/blog/$idblog");
                exit();   
            }else{
                if($blog->updateImageCapa($_POST, $idblog, $oldCapa)){
                    header("Location: /cetdabar/admin/blog/$idblog");
                    exit();
                }else{
                    header("Location: /cetdabar/admin/blog/$idblog");
                    exit();
                }
            }
        }

        return $response;
    });
    $app->post("/cetdabar/admin/blog/{idblog}/update-banner", function(Request $request, Response $response, $args){
        $idblog = $args['idblog'];

        $blog = new Blog();

        $namebanner = $blog->verifyUpdateBanner($_FILES['imgbanner']);

        if(!$namebanner){
            header("Location: /cetdabar/admin/blog/$idblog");
            exit();
        }else{
            $_POST['imgbanner'] = $namebanner['img']['name'];
            $oldBanner = $_POST['oldImgBanner'];
            if(!$blog->uploadImageUptade($namebanner['img'])){
                header("Location: /cetdabar/admin/blog/$idblog");
                exit();   
            }else{
                if($blog->updateImageBanner($_POST, $idblog, $oldBanner)){
                    header("Location: /cetdabar/admin/blog/$idblog");
                    exit();
                }else{
                    header("Location: /cetdabar/admin/blog/$idblog");
                    exit();
                }
            }
        }

        return $response;
    });

    //Blog delete
    $app->get("/cetdabar/admin/blog/{idblog}/delete", function(Request $request, Response $response, $args){
        if ($_SESSION['user']['admin'] != 1) {
            $_SESSION['alert'] = "<script>alert('Acesso negado');</script>";
            header("location: /cetdabar/");
            exit();
        }

        $idblog = $args['idblog'];

        $blog = new Blog();

        $blog->setData($blog->getBlog($idblog));

        if($blog->delete()){
            header("location: /cetdabar/admin/cursos");
            exit();
        }else{
            header("location: /cetdabar/admin/cursos");
            exit();
        }
        return $response;
    });
?>
<?php 

    session_start();

    require_once "vendor/autoload.php";

    use Slim\Factory\AppFactory;
    use Rain\Tpl;

    $app = AppFactory::create();

/*     try{ */
        //Site
        //Home
        require_once "routes/site/home.php";
        
        //Sobre
        require_once "routes/site/sobre.php";
    
        //Cursos
        require_once "routes/site/cursos.php";
    
        //Blog
        require_once "routes/site/blog.php";

        //Contato


        //Login
        require_once "routes/site/login.php";

        //Forgot Password
        require_once "routes/site/forgot.php";

        //Admin
        require_once "routes/admin/admin.php";

        //Users admin
        require_once "routes/admin/users.php";

        //Cursos admin
        require_once "routes/admin/cursos.php";

        //Blog admin
        require_once "routes/admin/blog.php";
        
        //Turmas admin
        require_once "routes/admin/class.php";
        
        //matricula admin
        require_once "routes/admin/matricula.php";
        
        $app->run();
/*     }catch(\Throwable $th){
        //Not found

        if(isset($_SESSION['userlogin']) && $_SESSION['userlogin'] === true){
            $login = "online";
        }else{
            $login = "offline";
        }
    
        $conf = array(
            "tpl_dir" => "views/site/not-found",
            'cache_dir' => 'views-cache/',
            'debug' => false
        );
    
        Tpl::configure($conf);
    
        $tpl = new Tpl();
    
        $tpl->assign("login", $login);
    
        $tpl->draw("header");
    
        $tpl->draw("not-found");
    
        $tpl->draw("footer");
    } */
?>
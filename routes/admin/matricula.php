<?php

    use Psr\Http\Message\ResponseInterface as Response;
    use Psr\Http\Message\ServerRequestInterface as Request;
    use Class\Model\Matricula\Matricula;
    use Class\Model\User\User;
    use Class\Model\Cursos\Cursos;
    use Class\Model\Turmas\Turmas;
    use Class\PageAdmin;

    //Get Matricula
    $app->get("/cetdabar/admin/matricula", function(Request $request, Response $response){
        if (isset($_SESSION['alert'])) {
            echo $_SESSION['alert'];
            unset($_SESSION['alert']);
        }
    
        if ($_SESSION['user']['admin'] != 1) {
            $_SESSION['alert'] = "<script>alert('Acesso negado');</script>";
            header("location: /cetdabar/");
            exit();
        }
        
        $data = Matricula::listAll();

        if(count($data) > 0){

            foreach($data as $key => &$value) {
                $date = new DateTime($value['datamatricula']);
                $value['datamatricula'] = $date->format('d/m/Y H:i:s');
                //$value['datamatricula'] = date("d/m/Y H:i:s", strtotime($value['datamatricula'])); 
                if($value['vencimentoboleto'] == 1){
                    $value['vencimentoboleto'] = "Dia 5 de cada mês";
                }else if($value['vencimentoboleto'] == 2){
                    $value['vencimentoboleto'] = "Dia 10 de cada mês";
                }else if($value['vencimentoboleto'] == 3){
                    $value['vencimentoboleto'] = "Dia 15 de cada mês";
                }else if($value['vencimentoboleto'] == 4){
                    $value['vencimentoboleto'] = "Dia 20 de cada mês";
                }else if($value['vencimentoboleto'] == 5){
                    $value['vencimentoboleto'] = "Dia 25 de cada mês";
                }
            }
        }
        
        $page = new PageAdmin(array(
            "header" => false,
            "footer" => false,
            "data" => array(
                "user" => $_SESSION['user'],
                "matricula" => $data
            )
        ), "views/admin/matricula-admin");

        $page->setTpl("matricula");

        return $response;
    });

    //Matricula add
    $app->get("/cetdabar/admin/matricula/matricula-add", function(Request $request, Response $response){
        if(isset($_SESSION['alert'])) {
            echo $_SESSION['alert'];
            unset($_SESSION['alert']);
        }

        if ($_SESSION['user']['admin'] != 1) {
            $_SESSION['alert'] = "<script>alert('Acesso negado');</script>";
            header("location: /cetdabar/");
            exit();
        }

        $userdata = Matricula::listUsersMatricula();
        $cursodata = Matricula::listCursoMatricula();
        $turmadata = Matricula::listTurmasMatricula();
        date_default_timezone_set("America/Sao_Paulo");
        $datetime = new DateTime();
        $todaydate = $datetime->format('Y-m-d');

        $page = new PageAdmin(array(
            "header" => false,
            "footer" => false,
            "data" => array(
                "user" => $_SESSION['user'],
                "datausers" => $userdata,
                "datacursos" => $cursodata,
                "dataturmas" => $turmadata,
                "todaydate" => $todaydate
            )
        ), "views/admin/matricula-admin");

        $page->setTpl("matricula-add");

        return $response;
    });
    $app->post("/cetdabar/admin/matricula/matricula-add", function (Request $request, Response $response){

        $matricula = new Matricula();
        date_default_timezone_set("America/Sao_Paulo");
        $datetime = new DateTime();
        $todaydate = $datetime->format('Y-m-d H:i:s');
        $_POST['datamatricula'] = $todaydate;
        $matricula->setData($_POST);
        
        $function = "Cadastro";

        //Matricula::verifyMatricula($_POST, $function);


        if(!Matricula::verifyMatricula($_POST, $function)){
            header("Location: /cetdabar/admin/matricula/matricula-add");
            exit();
        }else{
            if($matricula->insertMatricula()){
                header("Location: /cetdabar/admin/matricula");
                exit();
            }else{
                header("Location: /cetdabar/admin/matricula/matricula-add");
                exit();
            }
        }

        return $response;
    });

    //Matricula update
    $app->get('/cetdabar/admin/matricula/matricula-update/{idmatricula}', function (Request $request, Response $response, $args){
        $idmatricula = $args['idmatricula'];
        
        if (isset($_SESSION['alert'])) {
            echo $_SESSION['alert'];
            unset($_SESSION['alert']);
        }
    
        if ($_SESSION['user']['admin'] != 1) {
            $_SESSION['alert'] = "<script>alert('Acesso negado');</script>";
            header("location: /cetdabar/");
            exit();
        }

        $datamatricula = Matricula::getMatricula($idmatricula);

        $userdata = Matricula::listUsersMatricula();
        $cursodata = Matricula::listCursoMatricula();
        $turmadata = Matricula::listTurmasMatricula();

        $date = new DateTime($datamatricula['datamatricula']);
        $datamatricula['datamatricula'] = $date->format('Y-m-d');

        $vencimentoboleto = array(
            array(
                "value" => 1,
                "name" => "Dia 5 de cada mês"
            ),
            array(
                "value" => 2,
                "name" => "Dia 10 de cada mês"
            ),
            array(
                "value" => 3,
                "name" => "Dia 15 de cada mês"
            ),
            array(
                "value" => 4,
                "name" => "Dia 20 de cada mês"
            ),
            array(
                "value" => 5,
                "name" => "Dia 25 de cada mês"
            ),
        );

        $statusmatricula = array(
            array(
                "value" => 0,
                "name" => "Inativa/Cancelada"
            ),
            array(
                "value" => 1,
                "name" => "Ativa"
            ),
            array(
                "value" => 2,
                "name" => "Pendente"
            ),
            array(
                "value" => 3,
                "name" => "Finalizada"
            ),
        );

        $page = new PageAdmin(array(
            "header" => false,
            "footer" => false,
            "data" => array(
                "user" => $_SESSION['user'],
                "datamatricula" => $datamatricula,
                "datausers" => $userdata,
                "datacursos" => $cursodata,
                "dataturmas" => $turmadata, 
                "vencimentoboleto" => $vencimentoboleto,
                "statusmatricula" => $statusmatricula,
            )
        ), "views/admin/matricula-admin");

        $page->setTpl("matricula-update");

        return $response;
    });
    $app->post("/cetdabar/admin/matricula/matricula-update/{idmatricula}", function(Request $request, Response $response, $args){

        $idmatricula = $args['idmatricula'];

        $matricula = new Matricula();
        $matricula->setData($_POST);
        $matricula->updateMatricula($idmatricula);

        if($matricula->updateMatricula($idmatricula)){
            header("Location: /cetdabar/admin/matricula");
            exit();
        }else{
            header("Location: /cetdabar/admin/matricula/matricula-update/$idmatricula");
            exit();
        }
        
        return $response;
    });

    //Registro Matricula
    $app->get("/cetdabar/admin/matricula/{idmatricula}", function(Request $request, Response $response, $args){
        $idmatricula = $args['idmatricula'];

        $matricula = new Matricula();
        $datamatricula = Matricula::listAllMatricula($idmatricula);

        if($datamatricula['nomepai'] == NULL){
            $datamatricula['nomepai'] = "Não registrado";
        }
        if($datamatricula['telfixouser'] == NULL){
            $datamatricula['telfixouser'] = "Não registrado";
        }
        if($datamatricula['naturalidade'] == NULL){
            $datamatricula['naturalidade'] = "Não registrado";
        }
        if($datamatricula['nomemae'] == NULL){
            $datamatricula['nomemae'] = "Não registrado";
        }
        if($datamatricula['escolaridade'] == NULL){
            $datamatricula['escolaridade'] = "Não registrado";
        }
        if($datamatricula['profissao'] == NULL){
            $datamatricula['profissao'] = "Não registrado";
        }
        if($datamatricula['igreja'] == NULL){
            $datamatricula['igreja'] = "Não registrado";
        }
        if($datamatricula['funcao'] == NULL){
            $datamatricula['funcao'] = "Não registrado";
        }
        if($datamatricula['conversao'] == NULL){
            $datamatricula['conversao'] = "Não registrado";
        }
        if($datamatricula['pastor'] == NULL){
            $datamatricula['pastor'] = "Não registrado";
        }
        if($datamatricula['status'] == 1){
            $datamatricula['status'] = "Ativo(a)";
        }else{
            $datamatricula['status'] = "Inativo(a)";
        }
        if($datamatricula['sexouser'] == 1){
            $datamatricula['sexouser'] = "Masculino";
        }else{
            $datamatricula['sexouser'] = "Feminino";
        }
        if($datamatricula['statuscurso'] == 1){
            $datamatricula['statuscurso'] = "Ativo";
        }else{
            $datamatricula['statuscurso'] = "Inativo";
        }

        switch ($datamatricula["statusturma"]) {
            case 0:
                $datamatricula["statusturma"] = "Inativa";
                break;
            case 1:
                $datamatricula["statusturma"] = "Ativa/Em Andamento";
                break;
            case 2:
                $datamatricula["statusturma"] = "Pendente";
                break;
            case 3:
                $datamatricula["statusturma"] = "Completa";
                break;
        }

        switch($datamatricula["statusmatricula"]) {
            case 0:
                $datamatricula["statusmatricula"] = "Inativa/Cancelada";
                break;
            case 1:
                $datamatricula["statusmatricula"] = "Ativa/Em Andamento";
                break;
            case 2:
                $datamatricula["statusmatricula"] = "Pendente";
                break;
            case 3:
                $datamatricula["statusmatricula"] = "Finalizada";
                break;
        }

        switch ($datamatricula['vencimentoboleto']) {
            case 1:
                $datamatricula["vencimentoboleto"] = "Dia 5 de cada mês";
                break;
            case 2:
                $datamatricula["vencimentoboleto"] = "Dia 10 de cada mês";
                break;
            case 3:
                $datamatricula["vencimentoboleto"] = "Dia 15 de cada mês";
                break;
            case 4:
                $datamatricula["vencimentoboleto"] = "Dia 20 de cada mês";
                break;
            case 5:
                $datamatricula["vencimentoboleto"] = "Dia 25 de cada mês";
                break;

        }

        if($datamatricula['complementouser'] == NULL){
            $datamatricula["complementouser"] = "Não registrado";
        }

        //var_dump($datamatricula);
        
        date_default_timezone_set("America/Sao_Paulo");
        $datetime = new DateTime();
        $todaydate = $datetime->format('Y');
        $datetime = new DateTime($datamatricula['datamatricula']);
        $datamatricula['datamatricula'] = $datetime->format('d/m/Y H:i:s');

        $page = new PageAdmin(array(
            "header" => false,
            "footer" => false,
            "data" => array(
                "datamatricula" => $datamatricula,
                "todaydate" => $todaydate
            )
        ), "views/admin/matricula-admin");
        
        $page->setTpl("registro-matricula");

        return $response;

    });

?>
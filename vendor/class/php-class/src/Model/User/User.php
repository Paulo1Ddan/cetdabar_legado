<?php

namespace Class\Model\User;

use Class\Model;
use Class\DB\Sql;
use Class\Mailer;

class User extends Model
{
    const KEY = "";
    public static function login($login, $pass)
    {
        $sql = new Sql();
        $result = $sql->select("SELECT * FROM user WHERE emailuser = :login", array(
            ":login" => $login
        ));

        if (count($result) === 0) {
            $_SESSION['alert'] = "<script>alert('Usuario ou senha inválida'), history.back()</script>";
            return false;
        } else {
            $data = $result[0];
            if (password_verify($pass, $data['passuser'])) {
                $user = new User();
                $user->setData($data);
                $_SESSION['user'] = $user->getData();
                $_SESSION['logado'] = true;
                $_SESSION['alert'] = "<script>alert('Seja bem vindo " . $data['nomeuser'] . "')</script>";
                return true;
            } else {
                $_SESSION['alert'] = "<script>alert('Usuario ou senha inválida'), history.back()</script>";
                return false;
            }
        }
    }

    public static function logout()
    {
        session_destroy();
        return true;
    }

    public function getForgot($email)
    {
        $sql = new Sql();

        $results = $sql->select("SELECT * FROM user WHERE emailuser = :email", array(
            ":email" => $email
        ));

        if (count($results) > 0) {
            $data = $results[0];

            $sql->insert("INSERT INTO userrecoverypass (iduser, userip) VALUES (:iduser, :userip)", array(
                ":iduser" => $data['iduser'],
                ":userip" => $_SERVER['REMOTE_ADDR']
            ));
            $resultrecovery = $sql->select("SELECT * FROM userrecoverypass WHERE idrecovery = LAST_INSERT_ID()");

            if ($resultrecovery > 0) {
                $dataRecovery = $resultrecovery[0];

                $iv = openssl_random_pseudo_bytes(openssl_cipher_iv_length("aes-256-cbc"));
                $code = openssl_encrypt($dataRecovery['idrecovery'], "aes-256-cbc", User::KEY, 0, $iv);
                $result = base64_encode($iv . $code);

                $link = "http://localhost/cetdabar/login/reset?code=$result";

                $message = "Olá, $data[nomeuser]. \n\n <br><br> Para alterar sua senha, acesse o link a seguir dentro de uma hora: $link";

                $mailer = new Mailer($data['emailuser'], $data['nomeuser'], "Redefinição de senha", $message);

                $mailer->send();

                $_SESSION['alert'] = "<script>alert('Verifique sua caixa de email com as informações de alteração de senha');</script>";
                return true;
            } else {
                $_SESSION['alert'] = "<script>alert('Não foi possível recuperar a senha');</script>";
                return false;
            }

            return true;
        } else {
            $_SESSION['alert'] = "<script>alert('Não foi possível recuperar a senha');</script>";
            return false;
        }
    }

    public function validForgotDecrypt($result)
    {
        $result = base64_decode($result);

        $code = mb_substr($result, openssl_cipher_iv_length("aes-256-cbc"), null, '8bit');
        $iv = mb_substr($result, 0, openssl_cipher_iv_length("aes-256-cbc"), '8bit');

        $idrecovery = openssl_decrypt($code, "aes-256-cbc", User::KEY, 0, $iv);

        $sql = new Sql();

        $resultdecrypt = $sql->select("SELECT * FROM userrecoverypass a INNER JOIN user b USING(iduser) WHERE a.idrecovery = :code AND a.dtrecovery IS NULL AND DATE_ADD(a.dtregister, INTERVAL 1 HOUR) >= NOW();", array(
            ":code" => $idrecovery
        ));

        if (count($resultdecrypt) > 0) {
            return $resultdecrypt[0];
        } else {
            $_SESSION['alert'] = "<script>alert('Não foi possível recuperar a senha');</script>";
            return false;
        }
    }

    public function setForgot($idrecovery)
    {
        $sql = new Sql();

        $sql->query("UPDATE userrecoverypass SET dtrecovery = NOW() WHERE idrecovery = :id", array(
            ":id" => $idrecovery
        ));
    }

    public function setPassword($pass, $iduser)
    {
        $sql = new SQL();

        $result = $sql->query("UPDATE user SET passuser = :pass WHERE iduser = :iduser", array(
            ":pass" => $pass,
            ":iduser" => $iduser
        ));

        if ($result) {
            $_SESSION['alert'] = "<script>alert('Senha atualizada com sucesso');</script>";
            return true;
        } else {
            $_SESSION['alert'] = "<script>alert('Não foi possível atualizar a senha');</script>";
            return false;
        }
    }

    public function getUsers()
    {
        $sql = new Sql();

        $result = $sql->select("SELECT * FROM user");

        return $result;
    }

    public function get($iduser)
    {
        $sql = new Sql();

        $result = $sql->select("SELECT * FROM user WHERE iduser = :iduser", array(
            ":iduser" => $iduser
        ));

        return $result[0];
    }

    public function getAddrUser($iduser){
        $sql = new Sql();

        $result = $sql->select("SELECT * FROM `addressuser` WHERE iduser = :id", array(
            ":id" => $iduser
        ));
        return $result[0];      
    }

    public function getLastUser(){
        $sql = new Sql();

        $result = $sql->select("SELECT iduser, nomeuser FROM user WHERE iduser = LAST_INSERT_ID()");
        return $result[0];      
    }

    public function upatePass()
    {
    }

    public function validateUpdatePass()
    {
    }

    public function createAddress()
    {
    }

    public function delete()
    {
        $sql = new SQL();

        $result = $sql->query("DELETE FROM user WHERE iduser = :iduser", array(
            ":iduser" => $this->getiduser()
        ));

        if ($result) {
            $_SESSION['alert'] = "<script>alert('Usuario deletado com sucesso');</script>";
            return true;
        } else {
            $_SESSION['alert'] = "<script>alert('Não foi possível deletar usuario');</script>";
            return false;
        }
    }

    //Create User Admin
    public function validateDataCreateUserAdmin($data = array())
    {
        //Validate Nome
        if (empty($data['nomeuser'])) {

            $_SESSION['alert'] = "<script>alert('Preencha o campo nome'); history.back()</script>";
            return false;

        //Validate Email
        } else if (empty($data['emailuser'])) {

            $_SESSION['alert'] = "<script>alert('Preencha o campo E-mail'); history.back()</script>";
            return false;
        } else if (!filter_var($data["emailuser"], FILTER_VALIDATE_EMAIL)) {

            $_SESSION['alert'] = "<script>alert('Insira um formato de email válido'); history.back()</script>";
            return false;

        //Validate Senha
        } else if (empty($data["passuser"])) {

            $_SESSION['alert'] = "<script>alert('Insira um formato de email válido'); history.back()</script>";
            return false;

        } else if (!preg_match('/^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])[a-zA-Z\d].\S{8,36}$/', $data['passuser'])) {

            $_SESSION['alert'] = "<script>alert('Insira uma senha válida'); history.back()</script>";
            return false;

        //Validade Cel
        } else if (empty($data["celuser"])) {

            $_SESSION['alert'] = "<script>alert('Preencha o campo celular'); history.back()</script>";
            return false;

        } else if (!preg_match('^\(+[0-9]{2,3}\) [0-9]{5}-[0-9]{4}$^', $data['celuser'])) {

            $_SESSION['alert'] = "<script>alert('Celular inválido'); history.back()</script>";
            return false;

        //Validade Tel
        } else if (!empty($data['telfixo']) && !preg_match('^\(+[0-9]{2,3}\) [0-9]{4}-[0-9]{4}$^', $data['telfixo'])) {

            $_SESSION['alert'] = "<script>alert('Tel. Fixo inválido'); history.back()</script>";
            return false;

        //Validate Data Nasc
        } else if (empty($data['datanasc'])) {

            $_SESSION['alert'] = "<script>alert('Preencha o campo Data Nasc'); history.back()</script>";
            return false;
            
        } else if (!preg_match('/^\d{4}\-\d{1,2}\-\d{1,2}$/', $data['datanasc'])) {

            $_SESSION['alert'] = "<script>alert('Insira um formato de data valido'); history.back()</script>";
            return false;

        //Validate Document
        } else if (empty($data['documento'])){

            $_SESSION['alert'] = "<script>alert('Preencha o campo Documento'); history.back()</script>";
            return false;

        } else if (empty($data['cpf'])){

            $_SESSION['alert'] = "<script>alert('Preencha o campo CPF'); history.back()</script>";
            return false;

        } else if (!$this->validateDocument($data['cpf'])){

            $_SESSION['alert'] = "<script>alert('CPF inválido'); history.back()</script>";
            return false;

        //Validate Sexo
        } else if ($data['sexouser'] <1 || $data['sexouser'] > 2){

            $_SESSION['alert'] = "<script>alert('Sexo inválido'); history.back()</script>";
            return false;

        //Validate CatUser
        } else if ($data['catuser'] > 2 || $data['catuser'] < 1) {

            $_SESSION['alert'] = "<script>alert('Categoria de usuario inválido'); history.back()</script>";
            return false;

        //Validate Admin
        } else if (!empty($data['admin']) && $data['admin'] != 1) {

            $_SESSION['alert'] = "<script>alert('Valor de administrador inválido'); history.back()</script>";
            return false;
        } else {
            return true;
        }
    }

    public function createUserAdmin($data)
    {
        $sql = new Sql();

        if (!isset($data['admin'])) {
            $data['admin'] = 0;
        }

        $data['passuser'] = password_hash($data['passuser'], PASSWORD_DEFAULT, ['cost' => 12]);

        if(empty($data['complementouser'])){
            $data['complementouser'] = NULL;
        }

        if (!empty($data['telfixo'])) {
            $result = $sql->query("INSERT INTO user (nomeuser, emailuser, passuser, imguser, telfixouser, celuser, datanasc, sexouser, estadocivil, documento, cpf, admin, catuser, status) VALUES (:nomeuser, :emailuser, :passuser, :imguser, :telfixo, :celuser, :datanasc, :sexouser, :estadocivil, :documento, :cpf, :admin, :catuser, :status)", array(
                ":nomeuser" => $data['nomeuser'],
                ":emailuser" => $data['emailuser'],
                ":passuser" => $data['passuser'],
                ":imguser" => "default.svg",
                ":telfixo" => $data['telfixo'],
                ":celuser" => $data['celuser'],
                ":datanasc" => $data['datanasc'],
                ":sexouser" => $data['sexouser'],
                ":estadocivil" => $data['estadocivil'],
                ":documento" => $data['documento'],
                ":cpf" => $data['cpf'],
                ":admin" => $data['admin'],
                ":catuser" => $data['catuser'],
                ":status" => 1
            ));
            $lastuser = $sql->select("SELECT iduser, nomeuser FROM user WHERE iduser = LAST_INSERT_ID()");
            $iduser = $lastuser[0];
            $result = $sql->query("INSERT INTO `addressuser`(`cepuser`, `addressuser`, `bairrouser`, `cidadeuser`, `numerouser`, `complementouser`, `iduser`) VALUES (:cep,:address,:bairro,:cidade,:numero,:complemento,:id)", array(
                ":cep" => $data['cepuser'],
                ":address" => $data['addressuser'],
                ":bairro" => $data['bairrouser'],
                ":cidade" => $data['cidadeuser'],
                ":numero" => $data['numerouser'],
                ":complemento" => $data['complementouser'],
                ":id" => $iduser['iduser'],
            ));
        } else {
            $result = $sql->query("INSERT INTO user (nomeuser, emailuser, passuser, imguser, celuser, datanasc, sexouser, estadocivil, documento, cpf, admin, catuser, status) VALUES (:nomeuser, :emailuser, :passuser, :imguser, :datanasc, :sexouser, :estadocivil, :documento, :cpf, :admin, :catuser, :status)", array(
                ":nomeuser" => $data['nomeuser'],
                ":emailuser" => $data['emailuser'],
                ":passuser" => $data['passuser'],
                ":imguser" => "default.svg",
                ":celuser" => $data['celuser'],
                ":datanasc" => $data['datanasc'],
                ":sexouser" => $data['sexouser'],
                ":estadocivil" => $data['estadocivil'],
                ":documento" => $data['documento'],
                ":cpf" => $data['cpf'],
                ":admin" => $data['admin'],
                ":catuser" => $data['catuser'],
                ":status" => 1
            ));
            $lastuser = $sql->select("SELECT iduser, nomeuser FROM user WHERE iduser = LAST_INSERT_ID()");
            $iduser = $lastuser[0]; 
            $result = $sql->query("INSERT INTO `addressuser`(`cepuser`, `addressuser`, `bairrouser`, `cidadeuser`, `numerouser`, `complementouser`, `iduser`) VALUES (:cep,:address,:bairro,:cidade,:numero,:complemento,:id)", array(
                ":cep" => $data['cepuser'],
                ":address" => $data['addressuser'],
                ":bairro" => $data['bairrouser'],
                ":cidade" => $data['cidadeuser'],
                ":numero" => $data['numerouser'],
                ":complemento" => $data['complementouser'],
                ":id" => $iduser['iduser'],
            ));

        }


        if ($result) {
            $_SESSION['alert'] = "<script>alert('Usuario criado com sucesso');</script>";
            return true;
        } else {
            $_SESSION['alert'] = "<script>alert('Não foi possível criar o usuario');</script>";
            return true;
        }
    }

    //Update UserAdmin
    public function updateUserAdmin()
    {
        $sql = new Sql();

        if ($this->gettelfixo() != NULL) {
            $result = $sql->query("UPDATE user SET nomeuser = :nomeuser, emailuser = :emailuser, telfixouser = :telfixo, celuser = :celuser, datanasc = :datanasc, sexouser = :sexouser, estadocivil = :estadocivil, documento = :documento, cpf = :cpf, admin = :admin, catuser = :catuser, status = :status WHERE iduser = :iduser", array(
                ":iduser" => $this->getiduser(),
                ":nomeuser" => $this->getnomeuser(),
                ":emailuser" => $this->getemailuser(),
                ":telfixo" => $this->gettelfixo(),
                ":celuser" => $this->getceluser(),
                ":datanasc" => $this->getdatanasc(),
                ":sexouser" => $this->getsexouser(),
                ":estadocivil" => $this->getestadocivil(),
                ":documento" => $this->getdocumento(),
                ":cpf" => $this->getcpf(),
                ":admin" => $this->getadmin(),
                ":catuser" => $this->getcatuser(),
                ":status" => $this->getstatus()
            ));
        } else {
            $result = $sql->query("UPDATE user SET nomeuser = :nomeuser, emailuser = :emailuser, celuser = :celuser, datanasc = :datanasc, sexouser = :sexouser, estadocivil = :estadocivil, documento = :documento, cpf = :cpf, admin = :admin, catuser = :catuser, status = :status WHERE iduser = :iduser", array(
                ":iduser" => $this->getiduser(),
                ":nomeuser" => $this->getnomeuser(),
                ":emailuser" => $this->getemailuser(),
                ":celuser" => $this->getceluser(),
                ":datanasc" => $this->getdatanasc(),
                ":sexouser" => $this->getsexouser(),
                ":estadocivil" => $this->getestadocivil(),
                ":documento" => $this->getdocumento(),
                ":cpf" => $this->getcpf(),
                ":admin" => $this->getadmin(),
                ":catuser" => $this->getcatuser(),
                ":status" => $this->getstatus()
            ));
        }

        if ($result) {
            $_SESSION['alert'] = "<script>alert('Usuario atualizado com sucesso');</script>";
            return true;
        } else {
            $_SESSION['alert'] = "<script>alert('Não foi possível atualizar o usuario');</script>";
            return true;
        }
    }

    // Validar Img
    public function validateImgUser($file = array())
    {
        if(!empty($file)){
            //Verify Set Image
            if($file['error'] == 4){

                $_SESSION['alert'] = "<script>alert('Nenhuma imagem selecionada'); history.back()</script>";
                return false;

            //Verify Img Format
            }else if(!preg_match("/(.)+(jpg|JPG|jpeg|JPEG|png|PNG)/", $file['name'])){
            
                $_SESSION['alert'] = "<script>alert('Formato de imagem inválido'); history.back()</script>";
                return false;

            }else if($file['size'] > 2097152){
              
                $_SESSION['alert'] = "<script>alert('Insira uma imagem com no máximo 2MB'); history.back()</script>";
                return false;

            }else{
                $extuser = explode('.', $file['name']);
                $extuserfinal = end($extuser);

                $nameimg = md5(uniqid(time())).".$extuserfinal";

                $originimg = $file['tmp_name'];

                $destinyimg = $_SERVER['DOCUMENT_ROOT'].DIRECTORY_SEPARATOR."cetdabar".DIRECTORY_SEPARATOR."res".DIRECTORY_SEPARATOR."site".DIRECTORY_SEPARATOR."assets".DIRECTORY_SEPARATOR."user".DIRECTORY_SEPARATOR.$nameimg;

                if(move_uploaded_file($originimg, $destinyimg)){
                    return $nameimg;
                }else{
                    $_SESSION['alert'] = "<script>alert('Erro ao lançar imagem'); history.back()</script>";
                    return false;
                }
            }
        }else{

            $_SESSION['alert'] = "<script>alert('Nenhuma imagem selecionada')</script>";
            return false;

        }

    }

    public function updateImg($id, $oldimg)
    {

        $sql = new SQL();

        
        $result = $sql->query("UPDATE user SET imguser = :img WHERE iduser = :id", array(
            ":id" => $id,
            ":img" => $this->getimguser()
        ));
        
        if($result){
            if($oldimg != "default.svg"){
                unlink($_SERVER['DOCUMENT_ROOT'].DIRECTORY_SEPARATOR."cetdabar".DIRECTORY_SEPARATOR."res".DIRECTORY_SEPARATOR."site".DIRECTORY_SEPARATOR."assets".DIRECTORY_SEPARATOR."user".DIRECTORY_SEPARATOR.$oldimg);
            }
            
            $_SESSION['alert'] = "<script>alert('Imagem atualizado com sucesso')</script>";
            return true;
        }else{
            $_SESSION['alert'] = "<script>alert('Não foi possível atualizar a imagem')</script>";
            return false;
        }

    }
    
    public function updateAddress($iduser)
    {
        $sql = new Sql();
        $result = $sql->query("UPDATE `addressuser` SET `cepuser`= :cep,`addressuser`= :address,`bairrouser`= :bairro,`cidadeuser`= :cidade,`numerouser`= :numero,`complementouser`= :complemento WHERE `iduser`= :id", array(
            ":cep" => $this->getcepuser(),
            ":address" => $this->getaddressuser(),
            ":bairro" => $this->getbairrouser(),
            ":cidade" => $this->getcidadeuser(),
            ":numero" => $this->getnumerouser(),
            ":complemento" => $this->getcomplementouser(),
            ":id" => $iduser
        ));
        if($result){
            /* $_SESSION['alert'] = "<script>alert('Endereço atualizado com sucesso!')</script>"; */
            return true;
        }else{
            /* $_SESSION['alert'] = "<script>alert('Não foi possível atualziar o endereço!')</script>"; */
            return false;
        }
    }

    public function updateDadosMatricula($iduser)
    {
        $sql = new SQL();

        $nomepai = $this->getnomepai();
        $nomemae = $this->getnomemae();
        if(empty($nomepai)) $nomepai = null;
        if(empty($nomemae)) $nomemae = null;
        
        $result = $sql->query("UPDATE user SET naturalidade = :naturalidade, nomepai = :nomepai, nomemae = :nomemae, escolaridade = :escolaridade, profissao = :profissao, igreja = :igreja, pastor = :pastor, funcao = :funcao, conversao = :conversao WHERE iduser = :id", array(
            ":naturalidade" => $this->getnaturalidade(),
            ":nomepai" => $nomepai,
            ":nomemae" => $nomemae,
            ":escolaridade" => $this->getescolaridade(),
            ":profissao" => $this->getprofissao(),
            ":igreja" => $this->getigreja(),
            ":pastor" => $this->getpastor(),
            ":funcao" => $this->getfuncao(),
            ":conversao" => $this->getconversao(),
            ":id" => $iduser
        ));
        
        echo $result;

    /*     if($result){
            $_SESSION['alert'] = "<script>alert('Imagem atualizado com sucesso')</script>";
            return true;
        }else{
            $_SESSION['alert'] = "<script>alert('Não foi possível atualizar a imagem')</script>";
            return false;
        } */
    }

    public function validateUpdateUserAdmin($data = array())
    {
        //Validate Nome
        if (empty($data['nomeuser'])) {

            $_SESSION['alert'] = "<script>alert('Preencha o campo nome'); history.back()</script>";
            return false;

        //Validate Email
        } else if (empty($data['emailuser'])) {

            $_SESSION['alert'] = "<script>alert('Preencha o campo E-mail'); history.back()</script>";
            return false;

        } else if (!filter_var($data["emailuser"], FILTER_VALIDATE_EMAIL)) {

            $_SESSION['alert'] = "<script>alert('Insira um formato de email válido'); history.back()</script>";
            return false;

        //Validade Cel
        } else if (empty($data["celuser"])) {

            $_SESSION['alert'] = "<script>alert('Preencha o campo celular'); history.back()</script>";
            return false;

        } else if (!preg_match('^\(+[0-9]{2,3}\) [0-9]{5}-[0-9]{4}$^', $data['celuser'])) {

            $_SESSION['alert'] = "<script>alert('Celular inválido'); history.back()</script>";
            return false;

        //Validade Tel
        } else if (!empty($data['telfixo']) && !preg_match('^\(+[0-9]{2,3}\) [0-9]{4}-[0-9]{4}$^', $data['telfixo'])) {

            $_SESSION['alert'] = "<script>alert('Tel. Fixo inválido'); history.back()</script>";
            return false;

        //Validate Data Nasc
        } else if (empty($data['datanasc'])) {

            $_SESSION['alert'] = "<script>alert('Preencha o campo Data Nasc'); history.back()</script>";
            return false;
            
        } else if (!preg_match('/^\d{4}\-\d{1,2}\-\d{1,2}$/', $data['datanasc'])) {

            $_SESSION['alert'] = "<script>alert('Insira um formato de data valido'); history.back()</script>";
            return false;

        //Validate Document
        } else if (empty($data['documento'])){

            $_SESSION['alert'] = "<script>alert('Preencha o campo Documento'); history.back()</script>";
            return false;

        } else if (empty($data['cpf'])){

            $_SESSION['alert'] = "<script>alert('Preencha o campo CPF'); history.back()</script>";
            return false;

        } else if (!$this->validateDocument($data['cpf'])){

            $_SESSION['alert'] = "<script>alert('CPF inválido'); history.back()</script>";
            return false;

        //Validate Sexo
        } else if ($data['sexouser'] <1 || $data['sexouser'] > 2){

            $_SESSION['alert'] = "<script>alert('Sexo inválido'); history.back()</script>";
            return false;

        //Validate CatUser
        } else if ($data['catuser'] > 2 || $data['catuser'] < 1) {

            $_SESSION['alert'] = "<script>alert('Categoria de usuario inválido'); history.back()</script>";
            return false;

        //Validate Status
        } else if ($data['status'] > 1 || $data['status'] < 0){

            $_SESSION['alert'] = "<script>alert('Status inválido'); history.back()</script>";
            return false;

        //Validate Admin
        } else if (!empty($data['admin']) && $data['admin'] != 1) {

            $_SESSION['alert'] = "<script>alert('Valor de administrador inválido'); history.back()</script>";
            return false;
        } else {
            return true;
        }
    }

    //Validate CPF
    public function validateDocument($cpf)
    {
        // Extrai somente os números
        $cpf = preg_replace( '/[^0-9]/is', '', $cpf );
        
        // Verifica se foi informado todos os digitos corretamente
        if (strlen($cpf) != 11) {
            return false;
        }

        // Verifica se foi informada uma sequência de digitos repetidos. Ex: 111.111.111-11
        if (preg_match('/(\d)\1{10}/', $cpf)) {
            return false;
        }

        // Faz o calculo para validar o CPF
        for ($t = 9; $t < 11; $t++) {
            for ($d = 0, $c = 0; $c < $t; $c++) {
                $d += $cpf[$c] * (($t + 1) - $c);
            }
            $d = ((10 * $d) % 11) % 10;
            if ($cpf[$c] != $d) {
                return false;
            }
        }
        return true;
    }

    //Validate Address
    public function validateAddress()
    {
    }
}

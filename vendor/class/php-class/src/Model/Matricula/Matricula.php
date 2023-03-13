<?php 

    namespace Class\Model\Matricula;

    use Class\DB\Sql;
    use Class\Model;
    use Class\Model\User\User;
    use Class\Model\Cursos\Cursos;
    use Class\Model\Turmas\Turmas;

    class Matricula extends Model{

        public static function listAll()
        {
            $sql = new Sql();
            $result = $sql->select("SELECT idmatricula, iduser, idcurso, idturma, vencimentoboleto, datamatricula, statusmatricula, nomeuser, nometurma, nomecurso FROM matricula a INNER JOIN user USING (iduser) INNER JOIN curso USING (idcurso) INNER JOIN turma USING (idturma) ORDER BY idmatricula");

            return $result;
        }

        //Users
        public static function listUsersMatricula()
        {
            $sql = new Sql();
    
            return $sql->select("SELECT * FROM user WHERE status = 1");
        }

        //Cursos
        public static function listCursoMatricula(){
            $sql = new Sql;
            return $sql->select('SELECT * FROM curso WHERE statuscurso = 1 ORDER BY nomecurso');
        }

        //Turmas
        public static function listTurmasMatricula()
        {
            $sql = new Sql();
            return $sql->select("SELECT * FROM turma WHERE statusturma > 0 AND statusturma < 3");
        }

        public static function listAllMatricula($idmatricula){
            $sql = new Sql();
            $result = $sql->select("SELECT nomeuser, emailuser, imguser, telfixouser, celuser, sexouser, estadocivil, naturalidade, nomepai, nomemae, documento, cpf, escolaridade, profissao, igreja, pastor, funcao, conversao, status, nomecurso, statuscurso, duracao, nometurma, statusturma, vencimentoboleto, datamatricula, statusmatricula, cepuser, addressuser, bairrouser, cidadeuser, numerouser, complementouser FROM matricula INNER JOIN user USING(iduser) INNER JOIN curso USING (idcurso) INNER JOIN turma USING(idturma) INNER JOIN addressuser USING(iduser) WHERE idmatricula =:id", array(
                ":id" => $idmatricula
            ));

            return $result[0];
        }


        public static function verifyMatricula($data, $function){
            //echo $data['vencimentoboleto'];
            if($data['vencimentoboleto'] > 5 || $data['vencimentoboleto'] < 1 ){
                echo "<script>alert('Selecione uma matricula válida'); history.back()</script>";
                return false;
            }else{
                $sql = new Sql();
                $status1 = 1;
                $status2 = 2;
                $result = $sql->select("SELECT * FROM matricula WHERE (iduser = :nameuser AND idcurso = :namecurso AND idturma = :nameturma) AND (statusmatricula = :status1 OR statusmatricula = :status2)", array(
                    ":nameuser" => $data['nameuser'],
                    ":namecurso" => $data['namecurso'],
                    ":nameturma" => $data['nameturma'],
                    ":status1" => $status1,
                    ":status2" => $status2
                ));

                if(count($result) > 0){
                    $_SESSION['alert'] = "<script>alert('Esse usuario já está matriculado em um curso')</script>";
                    return false;
                }else{
                    return true;
                }
            }

        }

        public static function getMatricula($idmatricula){
            $sql = new Sql();
            $result = $sql->select("SELECT `idmatricula`, `iduser`, `idcurso`, `idturma`, `vencimentoboleto`, `datamatricula`, `statusmatricula`, nomeuser, nometurma, nomecurso FROM matricula INNER JOIN user USING(iduser) INNER JOIN curso USING(idcurso) INNER JOIN turma USING(idturma) WHERE idmatricula = :id", array(
                ":id" => $idmatricula
            ));

            return $result[0];
        }

        /* DB Methods */
        public function insertMatricula(){
            $sql = new Sql();
            $result = $sql->query("INSERT INTO `matricula`(`iduser`, `idcurso`, `idturma`, `vencimentoboleto`, `datamatricula`, `statusmatricula`) VALUES (:iduser,:idcurso,:idturma,:vencimentoboleto,:datamatricula,:statusmatricula)", array(
                ":iduser" => $this->getnameuser(),
                ":idcurso" => $this->getnamecurso(),
                ":idturma" => $this->getnameturma(),
                ":vencimentoboleto" => $this->getvencimentoboleto(),
                ":datamatricula" => $this->getdatamatricula(),
                ":statusmatricula" => $this->getstatusmatricula()
            ));
            if($result){
                $_SESSION['alert'] = "<script>alert('Matricula realizada com sucesso!')</script>";
                return true;
            }else{
                $_SESSION['alert'] = "<script>alert('Não foi possível realizar a matricula'); history.back()</script>";
                return false;
            }
        }

        public function updateMatricula($idmatricula){
            $sql = new Sql(); 
            $result = $sql->query("UPDATE `matricula` SET `idturma` = :idturma, `vencimentoboleto` = :vencimentoboleto, `statusmatricula` = :statusmatricula WHERE idmatricula = :idmatricula", array(
                ":idturma" => $this->getnameturma(),
                ":vencimentoboleto" => $this->getvencimentoboleto(),
                ":statusmatricula" => $this->getstatusmatricula(),
                ":idmatricula" => $idmatricula
            ));
            if($result){
                $_SESSION['alert'] = "<script>alert('Matricula atualizada com sucesso!')</script>";
                return true;
            }else{
                $_SESSION['alert'] = "<script>alert('Não foi possível atualizar a matricula'); history.back()</script>";
                return false;
            }
        }
        
    }

?>
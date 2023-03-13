<?php 
    namespace Class\Model\Turmas;

    Use Class\Model;
    Use Class\DB\Sql;

    class Turmas extends Model {
        public static function listAll()
        {
            $sql = new Sql();
            return $sql->select("SELECT *FROM turma");
        }

        public static function getClass($idclass){
            $sql = new Sql();
            $result = $sql->select("SELECT * from turma WHERE idturma = :id", array(
                ":id" => $idclass
            ));

            return $result[0];
        }

        public static function validateClass($data = array())
        {   
            if(empty($data['nometurma'])){
                $_SESSION['alert'] = "<script>alert('Preencha o campo Nome da Turma'); history.back()</script>";
                return false;
            }else if($data['statusturma'] > 1 || $data['statusturma'] < 0) {
                $_SESSION['alert'] = "<script>alert('Selecione um status válido'); history.back()</script>";
                return false;
            }else{
                return true;
            }
        }

        //DB Methods
        //Insert
        public function insertClass()
        {
            $sql = new Sql();

            $result = $sql->select("SELECT * FROM turma WHERE nometurma = :name", array(
                ":name" => $this->getnometurma(),
            ));

            if(count($result) > 0){
                $_SESSION['alert'] = "<script>alert('Turma ja cadastrada'); history.back()</script>";
                return false;
            }else{

                $result = $sql->query("INSERT INTO turma(nometurma, statusturma, datacadturma) VALUES(:name, :status, :date)", array(
                    ":name" => $this->getnometurma(),
                    ":status" => $this->getstatusturma(),
                    ":date" => $this->getdatacadturma()
                ));
                if($result){
                    $_SESSION['alert'] = "<script>alert('Turma cadastrada com sucesso!')</script>";
                    return true;
                }else{
                    $_SESSION['alert'] = "<script>alert('Erro ao cadastrar turma'); history.back()</script>";
                    return false;
                }
            }

        }
        //Update
        public function updateClass($data, $idclass)
        {
            $sql = new Sql();

            $result = $sql->query("UPDATE turma SET nometurma = :name, statusturma = :status WHERE idturma = :id", array(
                ":name" => $this->getnometurma(),
                ":status" => $this->getstatusturma(),
                ":id" => $idclass
            ));
            if($result){
                $_SESSION['alert'] = "<script>alert('Turma atualizada com sucesso')</script>";
                return true;
            }else{
                $_SESSION['alert'] = "<script>alert('Erro ao atualizar turma'); history.back()</script>";
                return false;
            }
        }
        //Delete
        public function delete($idclass){
            $sql = new Sql();

            $result = $sql->query("DELETE FROM turma WHERE idturma = :id", array(
                ":id" => $idclass
            )); 

            if($result){
                $_SESSION['alert'] = "<script>alert('Turma deleta com sucesso')</script>";
            }else{
                $_SESSION['alert'] = "<script>alert('Erro ao deletar turma'); history.back()</script>";
            }
        }
    }
?>
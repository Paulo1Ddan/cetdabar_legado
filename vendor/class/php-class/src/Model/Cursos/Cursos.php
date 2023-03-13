<?php 

    namespace Class\Model\Cursos;

    use Class\Model;
    use Class\DB\Sql;

    class Cursos extends Model{
        public static function listAll()
        {
            $sql = new Sql;
            return $sql->select('SELECT * FROM curso WHERE statuscurso = 1 ORDER BY nomecurso LIMIT 5');
        }
        public static function listCursosAdmin()
        {
            $sql = new Sql();
            return $sql->select('SELECT * FROM curso');        
        }

        public function getCurso($idCurso)
        {
            $sql = new Sql();

            $result = $sql->select('SELECT * FROM curso WHERE idcurso = :ID', array(':ID' => $idCurso));

            return $result[0];
        }

        //Create curso
        public function createCurso($data = array())
        {
            $sql = new Sql();

            $result = $sql->query("INSERT INTO curso (nomecurso, desccurso, duracao, instrutor, imgcurso, msgcurso, statuscurso) VALUES (:nomecurso, :desccurso, :duracaocurso, :instrutor, :imgcurso, :msgcurso, :statuscurso)", array(
                ":nomecurso" => $data['nomecurso'],
                ":desccurso" => $data['descricao'],
                ":duracaocurso" => $data['duracaocurso'],
                ":instrutor" => $data["instrutorcurso"],
                ":imgcurso" => $data['imgcurso'],
                ":msgcurso" => $data['mensagemcurso'],
                ":statuscurso" => 1
            ));
            if($result){
                $dir = $_SERVER['DOCUMENT_ROOT'].DIRECTORY_SEPARATOR."cetdabar".DIRECTORY_SEPARATOR."res".DIRECTORY_SEPARATOR."files".DIRECTORY_SEPARATOR.$data['nomecurso'];
                if(!is_dir($dir)) mkdir($dir);
                $_SESSION['alert'] = "<script>alert('Curso cadastrado com sucesso')</script>";
                return true;
            }else{
                $_SESSION['alert'] = "<script>alert('Não foi possível cadastrar o curso'); history.back()</script>";
                return false;
            }
        }

        //Update curso
        public function updateCurso()
        {
            $sql = new SQL();

            $result = $sql->query("UPDATE curso SET nomecurso = :nomecurso, desccurso = :desccurso, duracao = :duracao, instrutor = :instrutorcurso, msgcurso = :msgcurso, statuscurso = :statuscurso WHERE idcurso = :idcurso", array(
                ":idcurso" => $this->getidcurso(),
                ":nomecurso" => $this->getnomecurso(),
                ":desccurso" => $this->getdescricao(),
                ":duracao" => $this->getduracaocurso(),
                ":instrutorcurso" => $this->getinstrutorcurso(),
                ":msgcurso" => $this->getmensagemcurso(),
                ":statuscurso" => $this->getstatuscurso()
            ));

            if($result){
                $dir = $_SERVER['DOCUMENT_ROOT'].DIRECTORY_SEPARATOR."cetdabar".DIRECTORY_SEPARATOR."res".DIRECTORY_SEPARATOR."files".DIRECTORY_SEPARATOR.$this->getnomecurso();
                $olddir = $_SERVER['DOCUMENT_ROOT'].DIRECTORY_SEPARATOR."cetdabar".DIRECTORY_SEPARATOR."res".DIRECTORY_SEPARATOR."files".DIRECTORY_SEPARATOR.$this->getoldname();
                if($dir != $olddir) rename($olddir, $dir);
                
                $_SESSION['alert'] = "<script>alert('Curso atualizado com sucesso')</script>";
                return true;
            }else{
                $_SESSION['alert'] = "<script>alert('Não foi possível atualizar o curso')</script>";
                return false;
            }
        }

        public function updateImgCurso()
        {

            $sql = new SQL();

            
            $result = $sql->query("UPDATE curso SET imgcurso = :imgcurso WHERE idcurso = :idcurso", array(
                ":idcurso" => $this->getidcurso(),
                ":imgcurso" => $this->getimgcurso()
            ));
            
            if($result){
                unlink($_SERVER['DOCUMENT_ROOT'].DIRECTORY_SEPARATOR."cetdabar".DIRECTORY_SEPARATOR."res".DIRECTORY_SEPARATOR."site".DIRECTORY_SEPARATOR."assets".DIRECTORY_SEPARATOR."cursos".DIRECTORY_SEPARATOR.$this->getoldimgcurso());
                $_SESSION['alert'] = "<script>alert('Imagem atualizado com sucesso')</script>";
                return true;
            }else{
                $_SESSION['alert'] = "<script>alert('Não foi possível atualizar a imagem')</script>";
                return false;
            }

        }
        
        //Delete curso
        public function delete(){
            $sql = new Sql();

            $result = $sql->query("DELETE FROM curso WHERE idcurso = :idcurso", array(
                ":idcurso" => $this->getidcurso()
            ));
            
            $dataimg = explode("/", $this->getimgcurso());

            unlink($_SERVER['DOCUMENT_ROOT'].DIRECTORY_SEPARATOR."cetdabar".DIRECTORY_SEPARATOR."res".DIRECTORY_SEPARATOR."site".DIRECTORY_SEPARATOR."$dataimg[0]".DIRECTORY_SEPARATOR."$dataimg[1]".DIRECTORY_SEPARATOR.$dataimg[2]);
            if($result){
                $_SESSION["alert"] = "<script>alert('Curso deletado com sucesso')</script>";
                return true;
            }else{
                $_SESSION["alert"] = "<script>alert('Erro ao deletar o curso')</script>";
                return false;
            }
        }

        //Validate Curso
        public static function validateCurso($data = array())
        {
            //Validate Name Curso
            if(empty($data['nomecurso'])){
                
                $_SESSION['alert'] = "<script>alert('Preencha o campo Nome'); history.back()</script>";
                return false;

            //Validate Duração Curso
            }else if(empty($data['duracaocurso'])){

                $_SESSION['alert'] = "<script>alert('Preencha o campo Duração'); history.back()</script>";
                return false;

            //Validate Instrutor
            }else if(empty($data['instrutorcurso'])){

                $_SESSION['alert'] = "<script>alert('Preencha o campo Instrutor'); history.back()</script>";
                return false;

            //Validate Descrição
            }else if(empty($data['descricao'])){

                $_SESSION['alert'] = "<script>alert('Preencha o campo Descrição'); history.back()</script>";
                return false;       

            //Validate Mensagem
            }else if(empty($data['mensagemcurso'])){

                $_SESSION['alert'] = "<script>alert('Preencha o campo Descrição'); history.back()</script>";
                return false;  

            }else{
                return true;
            }
        }
        public static function validateCursoUpdate($data = array())
        {
            //Validate Name Curso
            if(empty($data['nomecurso'])){
                
                $_SESSION['alert'] = "<script>alert('Preencha o campo Nome'); history.back()</script>";
                return false;

            //Validate Duração Curso
            }else if(empty($data['duracaocurso'])){

                $_SESSION['alert'] = "<script>alert('Preencha o campo Duração'); history.back()</script>";
                return false;

            //Validate Instrutor
            }else if(empty($data['instrutorcurso'])){

                $_SESSION['alert'] = "<script>alert('Preencha o campo Instrutor'); history.back()</script>";
                return false;

            //Validate Descrição
            }else if(empty($data['descricao'])){

                $_SESSION['alert'] = "<script>alert('Preencha o campo Descrição'); history.back()</script>";
                return false;       

            //Validate Mensagem
            }else if(empty($data['mensagemcurso'])){

                $_SESSION['alert'] = "<script>alert('Preencha o campo Mensagem'); history.back()</script>";
                return false;  

            //Validate Status
            }else if($data['statuscurso'] > 1 || $data['statuscurso'] < 0){
                
                $_SESSION['alert'] = "<script>alert('Status do curso inválido'); history.back()</script>";
                return false;  

            }else{
                return true;
            }
        }

        //Validate Img Curso
        public function validateImgCurso($file = array())
        {
            if(!empty($file)){
                //Verify Set Image
                if($file['error'] == 4){

                    $_SESSION['alert'] = "<script>alert('Nenhuma imagem selecionada'); history.back()</script>";
                    return false;

                //Verify Img Format
                }else if(!preg_match("/(.)+(jpg|JPG|jpeg|JPEG|png|PNG|gif|GIF|bmp|BMP)/", $file['name'])){
                
                    $_SESSION['alert'] = "<script>alert('Formato de imagem inválido'); history.back()</script>";
                    return false;

                }else if($file['size'] > 2097152){
                  
                    $_SESSION['alert'] = "<script>alert('Insira uma imagem com no máximo 2MB'); history.back()</script>";
                    return false;

                }else{
                    $extcurso = explode('.', $file['name']);
                    $extcursofinal = $extcurso[1];

                    $nameimg = md5(uniqid(time())).".$extcursofinal";

                    $originimg = $file['tmp_name'];

                    $destinyimg = $_SERVER['DOCUMENT_ROOT'].DIRECTORY_SEPARATOR."cetdabar".DIRECTORY_SEPARATOR."res".DIRECTORY_SEPARATOR."site".DIRECTORY_SEPARATOR."assets".DIRECTORY_SEPARATOR."cursos".DIRECTORY_SEPARATOR.$nameimg;

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
    }

?>
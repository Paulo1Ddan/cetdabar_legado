<?php 
    namespace Class\Model\Files;

    use Class\DB\Sql;
    use Class\Model;

    Class Files extends Model{
        public static function liisFiles($idcurso){
            $sql = new Sql();
            return $sql->select('SELECT * FROM arquivo WHERE idcurso = :id', array(
                ":id" => $idcurso
            )); 
        }

        public static function validateFile($file = array(), $function)
        {
            if(!empty($file)){
                if($file['error'] == 4){
                    $_SESSION['alert'] = "<script>alert('Nenhum arquivo selecionado'); history.back()</script>";
                    return false;
                }else{
                    return $namefile = $file['name'];
                }
            }
        }

        public static function uploadFile($file, $curso)
        {
            $dir = $_SERVER['DOCUMENT_ROOT'].DIRECTORY_SEPARATOR."cetdabar".DIRECTORY_SEPARATOR."res".DIRECTORY_SEPARATOR."files".DIRECTORY_SEPARATOR.$curso;
            if(is_dir($dir)){
                if (file_exists($dir . DIRECTORY_SEPARATOR . $file['name'])) {
                    $arquivodiv = explode(".", $file['name']);
                    $i = 1;
                    $arquivofinal = "";
                    while(file_exists($dir . DIRECTORY_SEPARATOR . $file['name'])){
                        $arquivofinal = "$arquivodiv[0](" . $i . ").$arquivodiv[1]";
                        if(!file_exists($dir . DIRECTORY_SEPARATOR . $arquivofinal)){
                            move_uploaded_file($file['tmp_name'], $dir . DIRECTORY_SEPARATOR . $arquivofinal);
                            break;
                        }else{
                            $i++;
                        }
                    }
                    return $arquivofinal;
                }else{
                    move_uploaded_file($file['tmp_name'], $dir . DIRECTORY_SEPARATOR . $file['name']);
                    return $file['name'];
                }
            }
        }

        public function insertFile()
        {
            $sql = new Sql();
            $result = $sql->query("INSERT INTO arquivo (arquivo, idcurso) VALUES (:file, :id)", array(
                ":file" => $this->getfile(),
                ":id" => $this->getcurso()
            ));

            return $result;
        }

        public static function selectFile($idfile)
        {
            $sql = new Sql();
            $result = $sql->select('SELECT * FROM arquivo WHERE idarquivo = :id', array(
                ":id" => $idfile
            ));
            
            return $result[0];
        }
    }
?>
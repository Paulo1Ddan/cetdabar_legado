<?php 
    namespace Class\Model\Blog;

    use Class\DB\Sql;
    use Class\Model;

    class Blog extends Model{
        public static function listAll()
        {
            $sql = new Sql();
            return $sql->select("SELECT * FROM artigo ORDER BY dataartigo DESC");
        }

        public static function listAllAdmin()
        {
            $sql = new Sql();

            return $sql->select("SELECT * FROM artigo");
        }

        public function getBlog($idArtigo)
        {
            $sql = new Sql();

            $result = $sql->select("SELECT * FROM artigo WHERE idartigo = :ID", array(":ID" => $idArtigo));

            return $result[0];
        }

        public static function getName($iduser){
            $sql = new Sql();
            
            $result = $sql->select("SELECT nomeuser FROM artigo INNER JOIN user USING(iduser) WHERE iduser = :ID", array(":ID" => $iduser));

            return $result[0];
        }

        public static function validateBlog($data){
            if(empty($data['tituloartigo'])){
                $_SESSION['alert'] = "<script>alert('Preencha o campo Título do Artigo'); history.back()</script>";
                return false;
            }else{
                return true;
            }
        }
        public static function validateBlogUpdate($data){
            if(empty($data['tituloartigo'])){
                $_SESSION['alert'] = "<script>alert('Preencha o campo Título do Artigo'); history.back()</script>";
                return false;
            }else if($data['statusblog'] < 0 || $data['statusblog'] > 1){
                $_SESSION['alert'] = "<script>alert('Selecione um status válido'); history.back()</script>";
                return false;
            }else{
                return true;
            }
        }

        public static function verifyImgs($files){
            if(!empty($files['imgcapa'] || !empty($files['imgbanner']))){
                $imgcapa = $files['imgcapa'];
                $imgbanner = $files['imgbanner'];
                if($imgcapa['error'] == 4 || $imgbanner['error'] == 4){
                    $_SESSION['alert'] = "<script>alert('Selecione uma imagem para Capa e uma para Banner');history.back()</script>";
                    return false;
                }else if(!preg_match("/(.)+(jpg|JPG|jpeg|JPEG|png|PNG|gif|GIF|bmp|BMP)/", $imgcapa['name']) || !preg_match("/(.)+(jpg|JPG|jpeg|JPEG|png|PNG|gif|GIF|bmp|BMP)/", $imgbanner['name'])){
                    $_SESSION['alert'] = "<script>alert('Selecione um formato de imagem válido para Capa e Banner');history.back()</script>";
                    return false;
                }else if($imgcapa['size'] > 2097152 || $imgbanner['size'] > 2097152){
                    $_SESSION['alert'] = "<script>alert('Selecione uma imagem com no máximo 2MB para Capa e Banner');history.back()</script>";
                    return false;
                }else{
                    $extimgcapa = explode('.', $imgcapa['name']);
                    $extimgbanner = explode('.', $imgbanner['name']);
                    $extimgcapa = end($extimgcapa);
                    $extimgbanner = end($extimgbanner);

                    $namecapa = md5(uniqid(time())).".".$extimgcapa;
                    $namebanner = md5(uniqid(time())).".".$extimgbanner;

                    $origincapa = $imgcapa['tmp_name'];
                    $originbanner = $imgbanner['tmp_name'];

                    $destcapa = $_SERVER['DOCUMENT_ROOT'].DIRECTORY_SEPARATOR."cetdabar".DIRECTORY_SEPARATOR."res".DIRECTORY_SEPARATOR."site".DIRECTORY_SEPARATOR."assets".DIRECTORY_SEPARATOR."blog".DIRECTORY_SEPARATOR."capa".DIRECTORY_SEPARATOR.$namecapa;
                    $destbanner = $_SERVER['DOCUMENT_ROOT'].DIRECTORY_SEPARATOR."cetdabar".DIRECTORY_SEPARATOR."res".DIRECTORY_SEPARATOR."site".DIRECTORY_SEPARATOR."assets".DIRECTORY_SEPARATOR."blog".DIRECTORY_SEPARATOR."banner".DIRECTORY_SEPARATOR.$namebanner;

                    return array(
                        "capa" => [
                            "namecapa" => $namecapa,
                            "origincapa" => $origincapa,
                            "destcapa" => $destcapa,
                        ],
                        "banner" => [
                            "namebanner" => $namebanner,
                            "originbanner" => $originbanner,
                            "destbanner" => $destbanner
                        ]
                    );
                }
            }
        }
        public static function verifyUpdateCapa($capa = array()){

            if(!empty($capa)){
                $imgcapa = $capa;
                if($imgcapa['error'] == 4){
                    $_SESSION['alert'] = "<script>alert('Selecione uma imagem para Capa');history.back()</script>";
                    return false;
                }else if(!preg_match("/(.)+(jpg|JPG|jpeg|JPEG|png|PNG|gif|GIF|bmp|BMP)/", $imgcapa['name'])){
                    $_SESSION['alert'] = "<script>alert('Selecione um formato de imagem válido para Capa');history.back()</script>";
                    return false;
                }else if($imgcapa['size'] > 2097152){
                    $_SESSION['alert'] = "<script>alert('Selecione uma imagem com no máximo 2MB para Capa');history.back()</script>";
                    return false;
                }else{
                    $extimgcapa = explode('.', $imgcapa['name']);
                    $extimgcapa = end($extimgcapa);

                    $namecapa = md5(uniqid(time())).".".$extimgcapa;

                    $origincapa = $imgcapa['tmp_name'];

                    $destcapa = $_SERVER['DOCUMENT_ROOT'].DIRECTORY_SEPARATOR."cetdabar".DIRECTORY_SEPARATOR."res".DIRECTORY_SEPARATOR."site".DIRECTORY_SEPARATOR."assets".DIRECTORY_SEPARATOR."blog".DIRECTORY_SEPARATOR."capa".DIRECTORY_SEPARATOR.$namecapa;

                    return array(
                        "img" => [
                            "name" => $namecapa,
                            "origin" => $origincapa,
                            "dest" => $destcapa,
                        ]
                    );
                }
            }   
        }
        public static function verifyUpdateBanner($banner){
            if(!empty($banner)){
                $imgbanner = $banner;
                if($imgbanner['error'] == 4){
                    $_SESSION['alert'] = "<script>alert('Selecione uma imagem para Banner');history.back()</script>";
                    return false;
                }else if(!preg_match("/(.)+(jpg|JPG|jpeg|JPEG|png|PNG|gif|GIF|bmp|BMP)/", $imgbanner['name'])){
                    $_SESSION['alert'] = "<script>alert('Selecione um formato de imagem válido para Banner');history.back()</script>";
                    return false;
                }else if($imgbanner['size'] > 2097152){
                    $_SESSION['alert'] = "<script>alert('Selecione uma imagem com no máximo 2MB para Banner');history.back()</script>";
                    return false;
                }else{
                    $extimgbanner = explode('.', $imgbanner['name']);
                    $extimgbanner = end($extimgbanner);

                    $namebanner = md5(uniqid(time())).".".$extimgbanner;

                    $originbanner = $imgbanner['tmp_name'];

                    $destbanner = $_SERVER['DOCUMENT_ROOT'].DIRECTORY_SEPARATOR."cetdabar".DIRECTORY_SEPARATOR."res".DIRECTORY_SEPARATOR."site".DIRECTORY_SEPARATOR."assets".DIRECTORY_SEPARATOR."blog".DIRECTORY_SEPARATOR."banner".DIRECTORY_SEPARATOR.$namebanner;

                    return array(
                        "img" => [
                            "name" => $namebanner,
                            "origin" => $originbanner,
                            "dest" => $destbanner,
                        ]
                    );
                }
            }   
        }

        public function uploadimage($capa, $banner){

            if(move_uploaded_file($capa['origincapa'], $capa['destcapa']) && move_uploaded_file($banner['originbanner'], $banner['destbanner'])){
                return true;
            }else{
                $_SESSION['alert'] = "<script>alert('Não foi possível enviar todas as imagens'); history.back()</script>";
                return false;
            }

        }
        public function uploadImageUptade($img){
            if(move_uploaded_file($img['origin'], $img['dest'])){
                return true;
            }else{
                $_SESSION['alert'] = "<script>alert('Erro ao mover as imagens para o servidor'); history.back()</script>";
                return false;
            }
        }

        //DB Methods
        //Save
        public function saveartigo($data, $iduser){
            $sql = new SQL();

            $result = $sql->query("INSERT INTO artigo(tituloartigo, artigo, imgcapa, imgbanner, dataartigo, statusblog, iduser) VALUES(:titulo, :artigo, :imgcapa, :imgbanner, :dataartigo, :statusblog, :iduser)", array(
                ":titulo" => $data['tituloartigo'],
                ":artigo" => $data['artigo'],
                ":imgcapa" => $data['imgcapa'],
                ":imgbanner" => $data['imgbanner'],
                ":dataartigo" => date('Y-m-d'),
                ":statusblog" => 1,
                ":iduser" => $iduser,
            ));

            if($result){
                $_SESSION['alert'] = "<script>alert('Artigo cadastrado com sucesso')</script>";
                return true;
            }else{
                $_SESSION['alert'] = "<script>alert('Não foi possível cadastrar o artigo')</script>";
                return false;
            }
        }
        //Update
        public function updateBlog($data, $idblog){
            try{
                $sql = new SQL();

                $result = $sql->query("UPDATE artigo SET tituloartigo = :titulo, artigo =:artigo, statusblog = :statusblog WHERE idartigo = :id", array(
                    ":titulo" => $data['tituloartigo'],
                    ":artigo" => $data['artigo'],
                    ":statusblog" => $data['statusblog'],
                    ":id" => $idblog,
                ));
                $_SESSION['alert'] = "<script>alert('Artigo atualizado com sucesso')</script>";
                return true;
            }catch(\Exception $e){
                $_SESSION['alert'] = "<script>alert('".$e."')</script>";
                return false;
            }

        }
        public function updateImageCapa($data, $idblog, $oldcapa){
            try{
                $sql = new SQL();

                $result = $sql->query("UPDATE artigo SET imgcapa = :img WHERE idartigo = :id", array(
                    ":img" => $data['imgcapa'],
                    ":id" => $idblog,
                ));
                unlink($_SERVER['DOCUMENT_ROOT'].DIRECTORY_SEPARATOR."cetdabar".DIRECTORY_SEPARATOR."res".DIRECTORY_SEPARATOR."site".DIRECTORY_SEPARATOR."assets".DIRECTORY_SEPARATOR."blog".DIRECTORY_SEPARATOR."capa".DIRECTORY_SEPARATOR.$oldcapa);
                $_SESSION['alert'] = "<script>alert('Capa atualizada com sucesso'); history.back()</script>";
                return true;
            }catch(\Exception $e){
                $_SESSION['alert'] = "<script>alert('".$e."')</script>";
                return false;
            }
        }
        public function updateImageBanner($data, $idblog, $oldbanner){
            try{
                $sql = new SQL();

                $result = $sql->query("UPDATE artigo SET imgbanner = :img WHERE idartigo = :id", array(
                    ":img" => $data['imgbanner'],
                    ":id" => $idblog,
                ));
                unlink($_SERVER['DOCUMENT_ROOT'].DIRECTORY_SEPARATOR."cetdabar".DIRECTORY_SEPARATOR."res".DIRECTORY_SEPARATOR."site".DIRECTORY_SEPARATOR."assets".DIRECTORY_SEPARATOR."blog".DIRECTORY_SEPARATOR."banner".DIRECTORY_SEPARATOR.$oldbanner);
                $_SESSION['alert'] = "<script>alert('Banner atualizado com sucesso');history.back()</script>";
                return true;
            }catch(\Exception $e){
                $_SESSION['alert'] = "<script>alert('".$e."')</script>";
                return false;
            }
        }
        //Delete
        public function delete(){
            $sql = new SQL();
            $result = $sql->query("DELETE FROM artigo WHERE idartigo = :id", array(
                ":id" => $this->getidartigo(),
            ));
            unlink($_SERVER['DOCUMENT_ROOT'].DIRECTORY_SEPARATOR."cetdabar".DIRECTORY_SEPARATOR."res".DIRECTORY_SEPARATOR."site".DIRECTORY_SEPARATOR."assets".DIRECTORY_SEPARATOR."blog".DIRECTORY_SEPARATOR."banner".DIRECTORY_SEPARATOR.$this->getimgbanner());
            unlink($_SERVER['DOCUMENT_ROOT'].DIRECTORY_SEPARATOR."cetdabar".DIRECTORY_SEPARATOR."res".DIRECTORY_SEPARATOR."site".DIRECTORY_SEPARATOR."assets".DIRECTORY_SEPARATOR."blog".DIRECTORY_SEPARATOR."capa".DIRECTORY_SEPARATOR.$this->getimgcapa());
            if($result){

                $_SESSION['alert'] = "<script>alert('Artigo deletado com sucesso');history.back();</script>";
            }
        }
    }
?>
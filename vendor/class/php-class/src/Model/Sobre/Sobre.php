<?php 
    namespace Class\Model\Sobre;

    use Class\Model;
    use Class\DB\Sql;

    class Sobre extends Model{
        public static function listAll()
        {
            $sql = new Sql();

            return $sql->select("SELECT * FROM dabar");
        }
    }
?>
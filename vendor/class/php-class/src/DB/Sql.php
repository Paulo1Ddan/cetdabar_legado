<?php 
    namespace Class\DB;

    class Sql{
        const HOSTNAME = 'localhost';
        const USER = 'root';
        const PASSWORD = '';
        const DBNAME = 'cetdabar';

        private $conn;

        public function __construct()
        {
            try{
                $this->conn = new \PDO("mysql:host=".Sql::HOSTNAME.";dbname=".Sql::DBNAME, Sql::USER, Sql::PASSWORD);
            }catch(\PDOException $pdoe){
                echo $pdoe->getMessage();
            }
        }

        private function setParams($statement, $params = array())
        {
            foreach ($params as $key => $value) {
                $this->bindParam($statement, $key, $value);
            }
        }

        private function bindParam($statement, $key, $value)
        {
            $statement->bindValue($key, $value);
        }

        public function query($sql, $params = array())
        {
            try{
                $stmt = $this->conn->prepare($sql);
                $this->setParams($stmt, $params);
    
                $stmt->execute();
                return true;
            }catch(\PDOException $e){
                return $e;
            }
        }

        public function select($sql, $params = array())
        {
            try{
                $stmt = $this->conn->prepare($sql);
                $this->setParams($stmt, $params);
                $stmt->execute();
    
                return $stmt->fetchAll(\PDO::FETCH_ASSOC);
            }catch(\PDOException $e){
                return $e;
            }
        }

        public function insert($sql, $params = array())
        {
            $stmt = $this->conn->prepare($sql);
            $this->setParams($stmt, $params);
            $stmt->execute();
        }

    }
?>
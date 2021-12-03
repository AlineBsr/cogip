<?php
    abstract class Model{
        private $host = "localhost";
        private $dbName = "cogip_app";
        protected $user = 'root';
        protected $password = '';

        protected $connectionString;

        public $table;

        public function getConnection(){
            $this->connectionString = null;
            try{
                $this->connectionString = new PDO('mysql:host='.$this->host.'; dbname='.$this->dbName,$this->user,$this->password);
            }
            catch(PDOException $exeption){
                $exeption->getMessage();
            }
        }

        public function getAll(){
            $sql = "SELECT * FROM " .$this->table;
            $query = $this->connectionString->prepare($sql);
            $query->execute();
            return $query->fetchall();
        }

        public function getOne(int $id){
            $sql = "SELECT * FROM " .$this->table. " WHERE id=" .$id;
            $query = $this->connectionString->prepare($sql);
            $query->execute();
            return $query->fetch();
        }

        public function add(array $listColumn, array $listValue){
            $columnToStr = implode(',', $listColumn);
            $InterrogationMark = array();
            foreach($listValue as $value){
                array_push($InterrogationMark,'?');
            }
            $InterrogationMarkToStr = implode(',',$InterrogationMark);
            $sql = "INSERT INTO " .$this->table. "(".$columnToStr.") VALUES (".$InterrogationMarkToStr.")";
            $query = $this->connectionString->prepare($sql);
            $query->execute($listValue);
            return $query;
        }

        public function delete(int $id){
            $sql = "DELETE FROM " .$this->table. " WHERE id=" .$id;
            $query = $this->connectionString->prepare($sql);
            $query->execute();
        }
        
        public function update(array $listColumn, array $listValue, int $id){
            $columnToStr = implode(',', $listColumn);
            $sql = "UPDATE " .$this->table. " SET ". $columnToStr. " WHERE id=" .$id;
            $query = $this->connectionString->prepare($sql);
            $query->execute($listValue);
        }

    }
<?php
    abstract class Model{
        private $host = "localhost";
        private $dbName = "cogip_app";
        protected $user = 'root';
        protected $password = '';

        protected $connectionString;

        public $table;
        public $id;
        public $column;
        public $updateValue;
        public $insertValue;

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

        public function getOne(){
            $sql = "SELECT * FROM " .$this->table. " WHERE id=" .$this->id;
            $query = $this->connectionString->prepare($sql);
            $query->execute();
            return $query->fetch();
        }

        public function add(){
            $sql = "INSERT INTO " .$this->table. "VALUES (".$this->insertValue.")";
            $query = $this->connectionString->prepare($sql);
            $query->execute();
            return $query->fetch();
        }

        public function delete(){
            $sql = "DELETE FROM " .$this->table. " WHERE id=" .$this->id;
            $query = $this->connectionString->prepare($sql);
            $query->execute();
            return "l'élément dont l'id était ".$this->id. " a bien été supprimé.";
        }
        
        public function update(){
            $sql = "UPDATE " .$this->table. " SET ". $this->column. " =".$this->updateValue. " WHERE id=" .$this->id;
            $query = $this->connectionString->prepare($sql);
            $query->execute();
            return "l'élément dont l'id était ".$this->id. " a bien été modifié.";
        }

    }
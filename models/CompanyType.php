<?php
    require_once(ROOT.'/global/Model.php');

    class CompanyType extends Model{
        public function __construct()
        {
            $this->table = "company_type";
            $this->getConnection();
        }

        public function getAllClient(string $table2, string $condition){
            $sql = "SELECT * FROM " .$this->table." LEFT JOIN ".$table2. " ON ". $this->table.".".$condition." = ". $table2.".".$condition. " WHERE " .$this->table. ".type = 'Client'";
            $query = $this->connectionString->prepare($sql);
            $query->execute();
            return $query->fetchall();
        }

        public function getAllProvider(string $table2, string $condition){
            $sql = "SELECT * FROM " .$this->table." LEFT JOIN ".$table2. " ON ". $this->table.".".$condition." = ". $table2.".".$condition. " WHERE " .$this->table. ".type = 'Provider'";
            $query = $this->connectionString->prepare($sql);
            $query->execute();
            return $query->fetchall();
        }
    }
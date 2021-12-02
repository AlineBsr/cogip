<?php
    require_once(ROOT.'/global/Model.php');

    class Company extends Model{
        public function __construct()
        {
            $this->table = "company";
            $this->id = 2;
            $this->getConnection();
        }
    }
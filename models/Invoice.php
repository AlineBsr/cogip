<?php
    require_once(ROOT.'/global/Model.php');

    class Invoice extends Model{
        public function __construct()
        {
            $this->table = "invoice";
            $this->getConnection();
            $this -> add();
        }
    }
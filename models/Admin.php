<?php
    require_once(ROOT.'/global/Model.php');

    class Admin extends Model{
        public function __construct()
        {
            $this->table = "administration";
            $this->getConnection();
        }
    }
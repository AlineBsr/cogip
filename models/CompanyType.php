<?php
    require_once(ROOT.'/global/Model.php');

    class CompanyType extends Model{
        public function __construct()
        {
            $this->table = "company_type";
            $this->getConnection();
        }
    }
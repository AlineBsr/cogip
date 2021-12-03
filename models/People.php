<?php 
    require_once(ROOT.'/global/Model.php');

    class People extends Model{
        public function __construct()
        {
            // $this->id = 1;
            $this->table = 'people';
            $this->getConnection();
        }
    }
<?php
    require_once(ROOT.'/global/Controller.php');

    class CompanyController extends Controller {
        
        public function doesItWork() {
            $this -> findModel('Company');
            $companies = $this -> Company -> getAll();
            var_dump($companies);
            echo 'It works!';
        }

    }
<?php
    require_once(ROOT.'/global/Controller.php');

    class CompanyTypeController extends Controller{

        
        public function listAllClient(){
            $this->findModel('CompanyType');
            $companies = $this->CompanyType->getAllClient('company','name');
            $this->render('listAllClient', ['companies' => $companies ]);
        }
        public function listAllProvider(){
            $this->findModel('CompanyType');
            $companies = $this->CompanyType->getAllProvider('company','name');
            $this->render('listAllProvider', ['companies' => $companies ]);
        }
    }
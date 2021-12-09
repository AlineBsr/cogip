<?php
    require_once(ROOT.'/global/Controller.php');

    class CompanyController extends Controller{

        
        public function listAll(){
            $this->findModel('Company');
            $companies = $this->Company->getAllFromTwo('company_type','name');
            $this->render('listAll.php', ['companies' => $companies ]);
        }

        public function detail(int $id){
            $this->findModel('Company');
            $companie = $this->Company->getOneFromTwo($id,'company_type','name');
            $this->render('detail.php', ['companie' => $companie]);
        }

        public function add(){
            $this->findModel('Company');
            $newCompany = array();
            $newCompanyType = array();
            $listeColumn = ['name','address','country','vat','phone'];
            $listeColumn2 = ['name', 'type'];
            $this->render('add.php', ['newCompany' => $newCompany]);
            if(isset($_POST["name"])){
                $newCompany = [$_POST["name"],$_POST["address"],$_POST["country"],$_POST["vat"],intval($_POST["phone"])];
                $this->Company->add($listeColumn,$newCompany);
                $this->findModel('CompanyType');
                $newCompanyType = [$_POST["name"],$_POST["type"]];
                $this->CompanyType->add($listeColumn2,$newCompanyType);
            }
        }

        public function update(int $id){
            $this->findModel('Company');
            $companie = $this->Company->getOneFromTwo($id,'company_type','name');
            $this->render('update', ['companie' => $companie]);
            $updateCompany = array();
            $updateCompanyType = array();
            $listeColumn = ['name = ?','address = ?','country = ?','vat = ?','phone = ?'];
            $listeColumn2 = ['name = ?','type = ?'];
            if(isset($_POST["name"])){
                $updateCompany = [$_POST["name"],$_POST["address"],$_POST["country"],$_POST["vat"],intval($_POST["phone"])];
                $this->Company->update($listeColumn,$updateCompany,$id);
                $this->findModel('CompanyType');
                $updateCompanyType = [$_POST['name'],$_POST['type']];
                $this->CompanyType->update($listeColumn2,$updateCompanyType,$id);
            }
        }

        public function delete(int $id){
            $this->findModel('Company');
            $companie = $this->Company->getOne($id);
            $this->Company->delete($id);
            $this->findModel('CompanyType');
            $this->CompanyType->delete($id);
            echo "La companie ". $companie['name'] ." a bien été suprimé.";
        }

        public function search(){
            $this->findModel('Company');
            $result = array();
            $this->render('search.php',['result' => $result]);
            if(isset($_POST['name'])){
                $name = $_POST['name'];
                $result = $this->Company->search('name', $name);
                header('location: detail/'.$result['id']);
            }
        }

    }
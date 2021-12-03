<?php
    require_once(ROOT.'/global/Controller.php');

    class CompanyController extends Controller{

        
        public function listAll(){
            $this->findModel('Company');
            $companies = $this->Company->getAll();
            $this->render('listAll', ['companies' => $companies ]);
        }

        public function detail(int $id){
            $this->findModel('Company');
            $companie = $this->Company->getOne($id);
            $this->render('detail', ['companie' => $companie]);
        }

        public function add(){
            $this->findModel('Company');
            $newCompany = array();
            $listeColumn = ['name','address','country','vat','phone'];
            $this->render('add', ['newCompany' => $newCompany]);
            if(isset($_POST["name"])){
                $newCompany = [$_POST["name"],$_POST["address"],$_POST["country"],$_POST["vat"],intval($_POST["phone"])];
                var_dump($newCompany);
                $this->Company->add($listeColumn,$newCompany);
            }
        }

        public function update(int $id){
            $this->findModel('Company');
            $companie = $this->Company->getOne($id);
            $this->render('update', ['companie' => $companie]);
            $updateCompany = array();
            $listeColumn = ['name = ?','address = ?','country = ?','vat = ?','phone = ?'];
            if(isset($_POST["name"])){
                $updateCompany = [$_POST["name"],$_POST["address"],$_POST["country"],$_POST["vat"],intval($_POST["phone"])];
                $this->Company->update($listeColumn,$updateCompany,$id);
            }
        }

        public function delete(int $id){
            $this->findModel(('Company'));
            $companie = $this->Company->getOne($id);
            $this->Company->delete($id);
            echo "La companie ". $companie['name'] ." a bien été suprimé.";
        }

    }
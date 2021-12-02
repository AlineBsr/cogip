<?php
    require_once(ROOT.'/global/Controller.php');

    class InvoiceController extends Controller {
        
        public function doesItWork() {
            $this -> findModel('Invoice');
            $invoices = $this -> Invoice -> getAll();
            var_dump($invoices);
            echo 'It works!';
        }

        public function getOne() {
            $this -> findModel("Invoice");
            $invoices = $this -> Invoice -> getOne();
            echo "Not today!";
            var_dump($invoices);
        }

        public function create() {
            $this -> findModel("Invoice");
            $invoices = $this -> Invoice -> add();
            var_dump($this);
            echo "Salut, Mount Kuma.";
            var_dump($invoices);
        }

        public function delete() {
            $this -> findModel("Invoice");
            $invoices = $this -> Invoice -> delete();
            echo "Hello, Romain Berthaux.";
            var_dump($invoices);
        }

    }
<?php
    require_once(ROOT.'/global/Controller.php');

    class InvoiceController extends Controller {

        // To create an additional invoice
        public function newInvoice() {
            $this -> findModel("Invoice");
            $newInvoice = [];
            $items = ["invoice_number", "invoice_date", "company_name", "company_type"];

            $companies = $this -> Invoice -> getNames();
            $this -> render("newInvoice", ["companies" => $companies]);
            var_dump($companies);

            $this -> render("newInvoice", ["newInvoice" => $newInvoice]);            

            if (isset($_POST["addInvoice"])) {
                $newInvoice = [$_POST["number"], $_POST["date"], $_POST["company"], $_POST["type"]];
                $this -> Invoice -> add($items, $newInvoice);
                var_dump($newInvoice);
                var_dump($items);
                echo "<p style='text-align:center; font-weight:bold;'>Ajout de la facture " . $newInvoice[0] . ". Bon boulot, J-C !</p>";
            }

            else echo "<p style='text-align:center;'>Veuillez remplir les champs et la magie opérera, cher Jean-Christian.</p>";
        }

        // To read and thus display all existing invoices
        public function allInvoices() {
            $this -> findModel("Invoice");
            $invoices = $this -> Invoice -> getAllOrdered();
            var_dump($invoices);

            $this -> render("allInvoices", ["invoices" => $invoices]);
        }

        // To read and thus display a given invoice
        public function pickInvoice(int $id) {
            $this -> findModel("Invoice");
            $invoice = $this -> Invoice -> getFromThree($id, "company", "people", "company_name", "name");
            var_dump($invoice);

            $this -> render("pickInvoice", ["invoice" => $invoice]);
        }

        // To update an existing invoice
        public function amendInvoice(int $id) {
            $this -> findModel("Invoice");
            $invoice = $this -> Invoice -> getOne($id);
            var_dump($invoice);

            $companies = $this -> Invoice -> getNames();
            var_dump($companies);

            $this -> render("amendInvoice", ["invoice" => $invoice, "companies" => $companies]);

            $amend = [];
            $items = ["invoice_number = ?", "invoice_date = ?", "company_name = ?", "company_type = ?"];

            if (isset($_POST["editInvoice"])) {
                $amend = [$_POST["number"], $_POST["date"], $_POST["company"], $_POST["type"]];
                $this -> Invoice -> update($items, $amend, $id);
                echo "<p style='text-align:center; font-weight:bold;'>Modifications appliquées. Bien reçu, J-C !</p>";
            }

        }

        // To delete a given invoice
        public function deleteInvoice(int $id) {
            $this -> findModel("Invoice");
            $invoice = $this -> Invoice -> getOne($id);
            $this -> Invoice -> delete($id);
            var_dump($invoice);
            echo "Suppression de la facture " . $invoice['invoice_number'] . ".</p>";
        }

    }

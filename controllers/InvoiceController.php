<?php
    require_once(ROOT.'/global/Controller.php');

    class InvoiceController extends Controller {

        // To create an additional invoice
        public function newInvoice() {
            $this -> findModel("Invoice");
            $newInvoice = [];
            $items = ["invoice_number", "invoice_date", "about"];

            $this -> render("newInvoice", ["newInvoice" => $newInvoice]);

            if (isset($_POST["addInvoice"])) {
                $newInvoice = [$_POST["number"], $_POST["date"], $_POST["about"]];
                $this -> Invoice -> add($items, $newInvoice);
                var_dump($newInvoice);
                echo "<p style='text-align:center; font-weight:bold;'>Ajout de la facture " . $newInvoice[0] . ". Bon boulot, J-C !</p>";
            }

            else echo "<p style='text-align:center;'>Veuillez remplir les champs et la magie opérera, cher Jean-Christian.</p>";
        }

        // To read and thus display all existing invoices
        public function allInvoices() {
            $this -> findModel("Invoice");
            $invoices = $this -> Invoice -> getAll();
            var_dump($invoices);

            $this -> render("allInvoices", ["invoices" => $invoices]);
        }

        // To read and thus display a given invoice
        public function pickInvoice(int $id) {
            $this -> findModel("Invoice");
            $invoice = $this -> Invoice -> getOne($id);
            var_dump($invoice);

            $this -> render("pickInvoice", ["invoice" => $invoice]);
        }

        // To update an existing invoice
        public function amendInvoice(int $id) {
            $this -> findModel("Invoice");
            $invoice = $this -> Invoice -> getOne($id);
            var_dump($invoice);

            $this -> render("amendInvoice", ["invoice" => $invoice]);

            $amend = [];
            $items = ["invoice_number = ?", "invoice_date = ?", "about = ?"];

            if (isset($_POST["editInvoice"])) {
                $amend = [$_POST["number"], $_POST["date"], $_POST["about"]];
                $this -> Invoice -> update($items, $amend, $id);
                echo "<p style='text-align:center; font-weight:bold;'>Modifications appliquées à la facture " . $invoice["invoice_number"] . ". Bien reçu, J-C !</p>";
            }

        }

        // To delete a given invoice
        public function deleteInvoice(int $id) {
            $this -> findModel("Invoice");
            $invoice = $this -> Invoice -> getOne($id);
            $this -> Invoice -> delete($id);
            var_dump($invoice);
            echo "<p style='text-align:center; font-weight:bold;'>Suppression de la facture " . $invoice['invoice_number'] . ".</p>";
        }

    }
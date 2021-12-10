<?php
    require_once(ROOT.'/global/Controller.php');

    class InvoiceController extends Controller {

        // To create an additional invoice
        public function newInvoice() {
        $this->checkIfLogged();
        $check = $this->checkPrivilege();
        if($check != "Admin") {
            echo "Désolé vous n'avez pas les privilèges pour réaliser cette action";
        }
        else{
            $this -> findModel("Invoice");
            $newInvoice = [];
            $items = ["invoice_number", "invoice_date", "company_name", "company_type"];

            $companies = $this -> Invoice -> getNames();
            $this -> render("newinvoice.php", ["companies" => $companies]);

            $this -> render("newinvoice.php", ["newInvoice" => $newInvoice]);            

                if (isset($_POST["addInvoice"])) {
                    $newInvoice = [$_POST["number"], $_POST["date"], $_POST["company"], $_POST["type"]];
                    $this -> Invoice -> add($items, $this -> formSanitization($newInvoice));
                    echo "<p style='text-align:center; font-weight:bold;'>Ajout de la facture " . $newInvoice[0] . ". Bon boulot, J-C !</p>";
                }
            }
        }

        // To read and thus display all existing invoices
        public function allInvoices() {
            $this->checkIfLogged();
            $this -> findModel("Invoice");
            $invoices = $this -> Invoice -> getAllOrdered();

            $this -> render("allinvoices.php", ["invoices" => $invoices]);
        }

        // To read and thus display a given invoice
        public function pickInvoice(int $id) {
            $this->checkIfLogged();
            $this -> findModel("Invoice");
            $invoice = $this -> Invoice -> getFromThree($id, "company", "people", "company_name", "name");

            $this -> render("pickinvoice.php", ["invoice" => $invoice]);
        }

        // To update an existing invoice
        public function amendInvoice(int $id) {
            $this->checkIfLogged();
            $check = $this->checkPrivilege();
            if($check != "Admin" || $check != "Mod" ) {
                echo "Désolé vous n'avez pas les privilèges pour réaliser cette action";
            }
            else{
                $this -> findModel("Invoice");
                $invoice = $this -> Invoice -> getOne($id);
                $companies = $this -> Invoice -> getNames();

                $this -> render("amendinvoice.php", ["invoice" => $invoice, "companies" => $companies]);

                $amend = [];
                $items = ["invoice_number = ?", "invoice_date = ?", "company_name = ?", "company_type = ?"];

                if (isset($_POST["editInvoice"])) {
                    $amend = [$_POST["number"], $_POST["date"], $_POST["company"], $_POST["type"]];
                    $this -> Invoice -> update($items, $this -> formSanitization($amend), $id);
                    echo "<p style='text-align:center; font-weight:bold;'>Modifications appliquées. Bien reçu, J-C !</p>";
                }
            }
        }

        // To delete a given invoice
        public function deleteInvoice(int $id) {
            $this->checkIfLogged();
            $check = $this->checkPrivilege();
            if($check != "Admin") {
                echo "Désolé vous n'avez pas les privilèges pour réaliser cette action";
            }
            else{
                $this -> findModel("Invoice");
                $invoice = $this -> Invoice -> getOne($id);
                $this -> Invoice -> delete($id);
                echo "<p style='text-align:center; font-weight:bold;'>Suppression de la facture " . $invoice['invoice_number'] . ".</p>";
        
            }
        }
        // All due credit to Aline for this OOAK gem, barely had to adapt it 
        private function formSanitization(array $invoice) {
            $invoice_pattern = "/^F\d{8}-\d{3}/";
            $text_pattern = "/^(?:[a-zA-Z])[\w\s.-]{2,}$/";
    
            if ($_SERVER["REQUEST_METHOD"] == "POST") {
                $sanitizedNumber = $sanitizedDate = $sanitizedCompany = $sanitizedType = "";
                $sanitizedNumber = htmlspecialchars(ucfirst($_POST["number"]));
                $sanitizedDate = preg_replace("([^0-9/-])", "", $_POST["date"]);
                $sanitizedCompany = htmlspecialchars(ucwords($_POST["company"]));
                $sanitizedType = htmlspecialchars(ucfirst($_POST["type"]));
    
                $sanitizedNumber = filter_var($sanitizedNumber, FILTER_SANITIZE_STRING);
                $sanitizedCompany = filter_var($sanitizedCompany, FILTER_SANITIZE_STRING);
                $sanitizedDate = filter_var($sanitizedDate, FILTER_SANITIZE_STRING);
                // VALIDATION
                if (!preg_match($invoice_pattern, $sanitizedNumber) or !preg_match($text_pattern, $sanitizedCompany) or !preg_match($text_pattern, $sanitizedType)) {
                    echo "Veuillez vérifier la saisie pour le numéro de facture, le nom de la société et son type.";
                } else {
                    $invoice = [$sanitizedNumber, $sanitizedDate, $sanitizedCompany, $sanitizedType]; 
                    return $invoice;
                }
            }
        }

    }

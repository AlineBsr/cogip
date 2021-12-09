<?php
    require_once(ROOT.'/global/Model.php');

    class Invoice extends Model {
        public function __construct()
        {
            $this -> table = "invoice";
            $this -> getConnection();
        }

        public function getFromThree (int $id, string $table2, string $table3, string $column, string $column2) {
            $sql = "SELECT * FROM " . $this -> table . " LEFT JOIN " . $table2 . " ON " . $this -> table . "." . $column . " = " . $table2."." . $column2 . " LEFT JOIN " . $table3 . " ON " . $this -> table . "." . $column . " = " . $table3 . "." . $column . " WHERE ". $this -> table . ".id = " . $id;
            $query = $this -> connectionString -> prepare($sql);
            $query -> execute();
            return $query -> fetch();
        }

        public function getNames() {
            $request = "SELECT name FROM company";
            $query = $this -> connectionString -> prepare($request);
            $query -> execute();
            return $query -> fetchAll(); 
        }

        public function getNamesFromInvoice() {
            $request = "SELECT DISTINCT company_name FROM " . $this -> table;
            $query = $this -> connectionString -> prepare($request);
            $query -> execute();
            return $query -> fetchAll(); 
        }
    }
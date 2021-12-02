<?php

declare(strict_types=1);

declare(encoding='utf8');
// $sql = 'INSERT INTO clients (id, lastName, firstName, birthDate, card, cardNumber) VALUES (NULL, :name, :lastName, :firstName, :card, :cardNumber)';

// $createCustom = $bdd -> prepare($sql);
### Traitement POST
// INSERT INTO `clients` (`id`, `lastName`, `firstName`, `birthDate`, `card`, `cardNumber`) VALUES (NULL, 'Atest', 'ATEST', '2021-11-01', '0', NULL);

if (isset($_POST['Valider'])) {
    $createCustom->execute([
        'firstName' => $_POST['firstName'],
        'lastName' =>  $_POST['lastName'],
        'card' =>  $_POST['card'],
        'cardNumber' =>  $_POST['cardNumber'],
    ]);
}

class Form
{
    public function create($str): string {
        $this->action = $str;
        return '<form action="' . $this->action . '" method="POST">';
    }

    public function input($type, $propName, $propVal, $propLabel): string {
        $this->type = $type;
        $this->propName = $propName;
        $this->propVal = $propVal;
        $this->propLabel = $propLabel;
        return '<label for="' . $this->propName . '">'. ucfirst($this->propLabel) . ' : </label><input type="' . $this->type . '" name="' . $this->propName . '" placeholder="' . $this->propVal . '"/>';
    }

    public function select(string $str, array $arr) {
        $this->propName = $str;
        $this->propVal = $arr;
        echo '<select>';
        foreach ($this->propVal as $this->selectOption) {
            echo '<option value="' . $this->selectOption . '" name="' . $this->propName . '">' . $this->selectOption . '</option>';
        };
        echo '</select>';
    }

    public function checkBox(string $str, array $arr) {
        $this->propName = $str;
        $this->propVals = $arr;
        foreach ($this->propVals as $this->propVal) {
            echo '<input type="checkbox" value="' . $this->propVal . '" name="' . $this->propName . '">' . $this->propVal;
        };
    }

    public function radio(string $str, array $arr) {
        $this->propName = $str;
        $this->propVals = $arr;
        foreach ($this->propVals as $this->propVal) {
            echo '<input type="radio" value="' . $this->propVal . '" name="' . $this->propName . '">' . $this->propVal;
        };
    }

    public function textarea(string $str, int $c, int $r)
    {
        $this->propName = $str;
        $this->cols = $c;
        $this->rows = $r;
        return '<textarea name="' . $this->propName . '" cols="' . $this->cols . '" rows="' . $this->rows . '"></textarea>';
    }

    public function submit($str): string
    {
        $this->submitName = $str;
        return '<input type="submit" name="' . $this->submitName . '" value="' . $this->submitName . '"/>';
    }

    public function end()
    {
        return '</form>';
    }
}



$form = new Form();

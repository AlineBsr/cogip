<?php
declare(strict_types=1);
declare(encoding='utf8');
// if (isset($_POST['Valider'])) {
    // $createCustom->execute([
    //   
    // ]);
// }

class Form
{
    public function create(string $str, string $method): string {
        $this->action = $str;
        $this->method = $method;
        return '<form action="' . $this->action . '" method="'.$this->method . '">';
    }

    public function input($type, $propName, $propVal, $propLabel): string {
        $this->type = $type;
        $this->propName = $propName;
        $this->propVal = $propVal;
        $this->propLabel = $propLabel;
        return '<label for="' . $this->propName . '">'. ucfirst($this->propLabel) . ' </label><input type="' . $this->type . '" name="' . $this->propName . '" value="' . $this->propVal . '" placeholder="' . str_replace( ':', '', $this->propLabel ) . '" required />';
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

    public function submit($name, $value): string
    {
        $this->submitName = $name;
        $this->submitValue = $value;
        return '<input type="submit" name="' . $this->submitName . '" value="' . $this->submitValue . '"/>';
    }

    public function end()
    {
        return '</form>';
    }
}



$form = new Form();
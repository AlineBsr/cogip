<?php
    require('Form.php');
?>
<br><button  onclick="window.location.href='./getPeople'">Retour à la liste des contacts</button>
<h1>Ajouter un contact</h1>

<?php
    $form = new Form();

    echo $form->create('addPerson', 'post'). '<br>'; 
    echo $form->input('text', 'firstname', '', 'Prénom : ', 'Prénom'). '<br>'; 
    echo $form->input('text', 'lastname', '', 'Nom : ', 'Nom'). '<br>'; 
    echo $form->input('number', 'phone', '', 'N° Téléphone : ', 'Tel'). '<br>';
    echo $form->input('email', 'email', '', 'Email : ', 'Email'). '<br>';
    echo $form->input('text', 'company', '', 'Entreprise : ', 'Entreprise'). '<br>';
    echo $form->submit('submitContact', 'Ajouter le contact'); 
    echo $form->end(); 

if($_SERVER["REQUEST_METHOD"] == "POST"){
	//Set empty variables
	$name="";
	//Collect input values into variables 
	$name = $_POST["firstname"];
	//First check that the mandatory fields are not empty
	if(empty($_POST["firstname"])){
		$errors["firstname"] = "Name can't be empty";
	}
	//Since variables are not empty, 
	//remove any illegal characters by sanitizing inputs
	$firstname = filter_var($firstname, FILTER_SANITIZE_STRING);
    echo $firstname;
}
?>
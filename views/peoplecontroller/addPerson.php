<?php
    require('Form.php');
?>
<br><button  onclick="window.location.href='getPeople'">Retour à la liste des contacts</button>
<h1>Ajouter un contact</h1>

<?php
    $form = new Form();
    // foreach($companies as $companie){
        // array_push($companies_name, $companie['name']);
    // }
    // var_dump($companies_name);
    echo $form->create('addPerson', 'post');
    echo $form->input('text', 'firstname', '', 'Prénom : ', 'Prénom'). '<br> ';
    echo $form->input('text', 'lastname', '', 'Nom : ', 'Nom'). '<br>'; 
    echo $form->input('number', 'phone', '', 'N° Téléphone : ', 'Tel'). '<br>';
    echo $form->input('email', 'email', '', 'Email : ', 'Email'). '<br>';
    // echo $form->input('text', 'company', '', 'Société : ', 'Société'). '<br>';
    $form->select('company', $companies_name, 'Société :') . '<br>';
    echo $form->submit('submitContact', 'Ajouter le contact'); 
    echo $form->end(); 
?>
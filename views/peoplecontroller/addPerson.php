<?php
    require_once('Form.php');
?>
<br><button  onclick="window.location.href='./getAll'">Retour à la liste des contacts</button>
<h1>Ajouter un contact</h1>

<?php
    $form = new Form();

    echo $form->create('addPerson', 'post'). '<br>'; 
    echo $form->input('text', 'firstname', 'Prénom', 'Prénom : '). '<br>'; 
    echo $form->input('text', 'lastname', 'Nom', 'Nom : '). '<br>'; 
    echo $form->input('tel', 'phone', 'Tel', 'N° Téléphone : '). '<br>';
    echo $form->input('email', 'email', 'Courriel', 'Courriel : '). '<br>';
    echo $form->input('text', 'company', 'Entreprise', 'Entreprise : '). '<br>';
    echo $form->submit('submitContact', 'Ajouter le contact'); 
    echo $form->end(); 
?>
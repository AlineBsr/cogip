<?php
    require('Form.php');
?>
<h1> Modifier le contact :  <?php echo $person['firstname'] .' '. $person['lastname']; ?> </h1> 
<br><button  onclick="window.location.href='.../getPeople'">Retour à la liste des contacts</button>

<?php
    $form = new Form();

    echo $form->create('', 'post'). '<br>'; 
    echo $form->input('text', 'firstname',  $person['firstname'] ,'Prénom : ' ). '<br>'; 
    echo $form->input('text', 'lastname',  $person['lastname']   ,  'Nom : ' ). '<br>'; 
    echo $form->input('number', 'phone', $person['phone'] , 'N° Téléphone : ' ). '<br>';
    echo $form->input('email', 'email',  $person['email'] , 'Courriel : ' ). '<br>';
    echo $form->input('text', 'company',  $person['company_name'], 'Entreprise : ' ). '<br>';
    echo $form->submit('submitUpdateP', 'Modifier le contact'); 
    echo $form->end(); 
?>
<?php
    require('Form.php');
?>
<br><button  onclick="window.location.href='../getPeople'">Retour à la liste des contacts</button>
<h1> Modifier le contact :  <?php echo $person['firstname'] .' '. $person['lastname']; ?> </h1> 

<?php
    $form = new Form();

    echo $form->create('', 'post'). '<br>'; 
    echo $form->input('text', 'firstname',  $person['firstname'] ,'Prénom : ', 'Prénom'). '<br>'; 
    echo $form->input('text', 'lastname',  $person['lastname']   ,  'Nom : ', 'Nom' ). '<br>'; 
    echo $form->input('number', 'phone', $person['phone'] , 'N° Téléphone : ', 'N° Téléphone' ). '<br>';
    echo $form->input('email', 'email',  $person['email'] , 'Email : ' ,'Email'). '<br>';
    echo $form->input('text', 'company',  $person['company_name'], 'Société : ','Société' ). '<br>';
    echo $form->submit('submitUpdateP', 'Modifier le contact'); 
    echo $form->end(); 
?>
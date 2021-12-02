<?php
    require_once('Form.php');
?>

<h1>Ajouter un contact</h1>

<?php
    $form = new Form();

    echo $form->create($action). '<br>'; 
    echo $form->radio('Type', ['Client','Fournisseur']) . '<br>';
    echo $form->input('text', 'firstname', 'Prénom', 'Prénom :'). '<br>'; 
    echo $form->input('text', 'lastname', 'Nom', 'Nom :'). '<br>'; 
    echo $form->input('number', 'phone', 'tel', 'N° Téléphone'). '<br>';
    echo $form->input('email', 'email', 'courriel', 'Courriel'). '<br>';
    echo $form->input('text', 'company', 'Entreprise', 'Entreprise'). '<br>';
    echo $form->submit('Ajouter le contact'); 
    echo $form->end(); 

    // echo $form->input('password', 'psw', 'Entrez votre mot de passe'). '<br>'; 
    // echo $form->select('Type', ['A','B','C']) . '<br>';
    // echo $form->checkBox('Num', [1,2,3]) . '<br>';
    // echo $form->textarea('story', 5,5) . '<br>';;

?>
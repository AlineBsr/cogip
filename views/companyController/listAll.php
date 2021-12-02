<h1>Liste des companies</h1>
<?php foreach($companies as $companie){
    ?>
    <p><a href="detail/<?php echo $companie['id']?>"><h3>Nom: <?php echo $companie['name'] ?></h3></a></p>
    <p>Adresse: <?php echo $companie['address'] ?></p>
    <p>Pays: <?php echo $companie['country'] ?></p>
    <p>TVA: <?php echo $companie['vat'] ?></p>
    <p>Tel: <?php echo $companie['phone'] ?></p>
    <?php
} ?>
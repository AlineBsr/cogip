<h1>companie</h1>
<p><h3>Nom: <?php

echo $companie['name'] ?></h3></p>
<p>Adresse: <?php echo $companie['address'] ?></p>
<p>Pays: <?php echo $companie['country'] ?></p>
<p>TVA: <?php echo $companie['vat'] ?></p>
<p>Tel: <?php echo "0".$companie['phone'] ?></p>
<p>Type: <?= $companie['type'] ?></p>
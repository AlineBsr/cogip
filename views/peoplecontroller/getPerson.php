<h1> Contact : <?php  echo $person['firstname'] .' '. mb_strtoupper( $person['lastname']); ?> </h1> 

<table>
    <tr><th>Contact :</th>  <td> <?= $person['firstname'] . ' '.$person['lastname']  ?></td></tr>
    <tr><th>Société :</th>  <td> <?=  $person['company_name'] ?></td> </tr>
    <tr><th>Email :  </th>  <td> <?= '<a  href="mailto:'. $person['email'] . '">' . $person['email']; ?> </td></tr>
    <tr><th>Téléphone :</th> <td> <?= '0'.$person['phone'] ?></td></tr>
</table>
<h2> Contact référent pour ces factures :</h2>
<?php
// echo '<pre>';
// print_r($invoices);
// echo '</pre>';
foreach($invoices as $invoice){
    ($invoice['company_name'] == $person['company_name']) ? $text = 'N° ' . $invoice['invoice_number'] .' du '. $invoice['invoice_date'] . '<br>' : $text = '';
    echo $text;
}
?>
<br>
<button  onclick="window.location.href='../getPeople'">Retour à la liste des contacts</button>

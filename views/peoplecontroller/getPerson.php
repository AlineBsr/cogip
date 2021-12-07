<h1> Contact : <?php echo $person['firstname'] .' '. $person['lastname']; ?> </h1> 
<table>
    <tr><th>Contact :   </th>   <td> <?php echo $person['firstname'] . ' '.$person['lastname']  ?></td></tr>
    <tr><th>Société :</th>   <td> <?php echo $person['company_name'] ?></td> </tr>
    <tr><th>Email :  </th>      <td> <?php echo '<a  href="mailto:'. $person['email'] . '">' . $person['email']; ?> </td></tr>
    <tr><th>Téléphone : </th>   <td> <?php echo $person['phone'] ?></td></tr>
</table>
<h2> Contact référent pour ces factures :</h2>
<?php
echo "bla<br>";
?>
<button  onclick="window.location.href='../getPeople'">Retour à la liste des contacts</button>

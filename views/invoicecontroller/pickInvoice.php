<h1 style="text-align:center;">Facture : <?php echo $invoice["invoice_number"]; ?></h1>

<!-- Same as earlier, will have to address relations prior to further revamping the following code !-->

<h3>Société rattachée à la facture</h3>
<table>
    <tr>
        <th>Nom</th>
        <th>Numéro de TVA</th>
        <th>Type de société</th>
    </tr>
    <tr>
        <td><?php echo $invoice["company_name"]; ?></td>
        <td><?php echo $company["vat"]; ?></td>
        <td><?php echo $company_type["type"]; ?></td>
    </tr>
</table>

<h3>Personne de contact</h3>
<table>
    <tr>
        <th>Nom</th>
        <th>Courriel</th>
        <th>Numéro de téléphone</th>
    </tr>
    <tr>
        <td><?= "{$person['firstname']} {$person['lastname']}" ?></td>
        <td><?= $person["email"]; ?></td>
        <td><?= "{$person["phone"]}" ?></td>
    </tr>
</table>
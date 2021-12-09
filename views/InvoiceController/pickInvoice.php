<h1 style="text-align:center;">Facture : <?php echo $invoice["invoice_number"]; ?></h1>

<h3>Société rattachée à la facture</h3>

<table>
    <tr>
        <th>Nom</th>
        <th>Numéro de TVA</th>
        <th>Type de société</th>
    </tr>
    <tr>
        <td><?php echo $invoice["name"]; ?></td>
        <td><?php echo $invoice["vat"]; ?></td>
        <td><?php echo $invoice["company_type"]; ?></td>
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
        <td><?= "{$invoice['firstname']} {$invoice['lastname']}" ?></td>
        <td><?= $invoice["email"]; ?></td>
        <td><?php echo substr($invoice["phone"], 0, 1) == "6" && strlen($invoice["phone"]) > 7 ? "0" . $invoice["phone"] : $invoice["phone"]; ?></td>
    </tr>
</table>
<h1 style="text-align:center;">Corpus des factures</h1>

<h4>Générer une <a href="./newinvoice" style="text-decoration:none;">nouvelle facture</a></h4>

<table>
    <tr>
        <th>Numéro de facture</th>
        <th>Date</th>
        <th>Société</th>
        <th>Type</th>
    </tr>

    <?php foreach ($invoices as $invoice) {
        echo "<tr>
        <td><a href='pickInvoice/" . $invoice["id"] . "'>" . ucfirst($invoice["invoice_number"]) . "</a></td>
        <td>" . date_format(new DateTime($invoice["invoice_date"]), "d/m/Y") . "</td>
        <td>" . ucwords($invoice["company_name"]) . "</td>
        <td>" . ucfirst($invoice["company_type"]) . "</td>
        <td><a style='text-decoration:none;' href='amendInvoice/" . $invoice["id"] . "'>✎</a></td>
        <td><a style='text-decoration:none;' href='deleteInvoice/" . $invoice["id"] . "'>🗑</a></td>
        </tr>";
    }
    ?>
</table>
<h1 style="text-align:center;">Corpus des factures</h1>

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
        <td></td>
        <td></td>
        <td><a style='text-decoration:none;' href='deleteInvoice/" . $invoice["id"] . "'>🗑</a></td>
        </tr>";
        /* <td>" . ucwords($company["name"]) . "</td> => To be inserted in lines 15 & 16, ofc
        <td>" . ucfirst($company_type["type"]) . "</td> ==> Those parts will be addressed later on */
    }
    ?>
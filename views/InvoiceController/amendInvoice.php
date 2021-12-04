<h1>Réviser une facture</h1>
<form method="POST" action="">
    <label for="number">Numéro de facture : </label>
    <input type="text" name="number" aria-label="N° de facture" value="<?php echo $invoice['invoice_number'] ?>" required/><br/>

    <label for="date">Date de création de la facture : </label>
    <input type="date" name="date" aria-label="Date de facturation" value="<?php echo $invoice['invoice_date'] ?>" required/><br/>

    <label for="about">Informations essentielles : </label>
    <input type="text" name="about" aria-label="Infos essentielles" value="<?php echo $invoice['about'] ?>" /><br/>

    <button type="submit" name="editInvoice" title="Validation">Appliquer les modifications</button>
</form>
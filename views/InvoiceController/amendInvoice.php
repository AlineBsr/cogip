<h1>Réviser une facture</h1>
<form method="POST" action="">
    <label for="number">Numéro de facture : </label>
    <input type="text" name="number" aria-label="N° de facture" value="<?php echo $invoice['invoice_number'] ?>" required/><br/>

    <label for="date">Date de facturation : </label>
    <input type="date" name="date" aria-label="Date de facturation" value="<?php echo $invoice['invoice_date'] ?>" required/><br/>

    <label for="company">Nom de la société : </label>
    <select type="text" name="company" aria-label="Société" disabled>
        <option value="<?= $invoice['id'] ?>" selected><?= $invoice["company_name"] ?></option>        
        <?php foreach($companies as $key => $value) : ?>
        <option value="<?= $key ?>"><?php if ($value['name'] != $invoice['company_name']) echo $value['name']; ?></option>
        <?php endforeach; ?>
    </select><br/>

    <label for="type">Type de société : </label>
    <select name="type" name="type" aria-label="Type de société" required>
        <option value="<?php echo $invoice['company_type'] === 'Fournisseur' ? 'Fournisseur' : 'Client' ?>"><?php echo $invoice['company_type'] === 'Fournisseur' ? "Fournisseur" : "Client" ?></option>
        <option value="<?php echo $invoice['company_type'] === 'Fournisseur' ? 'Client' : 'Fournisseur' ?>"><?php echo $invoice['company_type'] === 'Fournisseur' ? 'Client' : 'Fournisseur' ?></option>
    </select><br/>

    <button type="submit" name="editInvoice" title="Validation">Appliquer les modifications</button>
</form>
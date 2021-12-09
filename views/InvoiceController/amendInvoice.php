<h1>Réviser une facture</h1>

<h4>Retour au <a href="../allinvoices" style="text-decoration:none;">corpus des factures</a></h4>

<form method="POST" action="">
    <div>
        <label for="number">Numéro de facture : </label>
        <input type="text" name="number" aria-label="N° de facture" value="<?php echo ucfirst($invoice['invoice_number']) ?>" required/>
    </div>
    
    <div>
        <label for="date">Date de facturation : </label>
        <input type="date" name="date" aria-label="Date de facturation" value="<?php echo $invoice['invoice_date'] ?>" required/>
    </div>

    <div>
        <label for="company">Nom de la société : </label>
        <select type="text" name="company" aria-label="Société">        
            <?php foreach($companies as $key => $value) : ?>
            <option value="<?= $key + 1 ?>"<?php echo ($value['name'] == $invoice['company_name']) ? "selected" : "" ?>><?= ucwords($value["name"]) ?></option>
            <?php endforeach; ?>
        </select>
    </div>

    <div>
    <label for="type">Type de société : </label>
    <select name="type" name="type" aria-label="Type de société" required>
        <option value="<?php echo $invoice['company_type'] === 'Fournisseur' ? 'Fournisseur' : 'Client' ?>"><?php echo $invoice['company_type'] === 'Fournisseur' ? "Fournisseur" : "Client" ?></option>
        <option value="<?php echo $invoice['company_type'] === 'Fournisseur' ? 'Client' : 'Fournisseur' ?>"><?php echo $invoice['company_type'] === 'Fournisseur' ? 'Client' : 'Fournisseur' ?></option>
    </select>
    </div>

    <div>
        <button type="submit" name="editInvoice" title="Validation">Appliquer les modifications</button>
        <p title="Suppression" style="color:red; cursor:pointer; font-size:small;" onclick="window.location.href='../deleteInvoice/<?=$invoice['id']?>'">Supprimer la facture</p>
    </div>
</form>
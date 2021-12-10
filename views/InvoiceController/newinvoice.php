<h1>Générer une nouvelle facture</h1>

<h4>Retour au <a href="./allinvoices" style="text-decoration:none;">corpus des factures</a></h4>

<form method="POST" action="">
    <div>
        <label for="number">Numéro de facture : </label>
        <input type="text" name="number" aria-label="N° de facture" required/>
    </div>

    <div>
        <label for="date">Date de facturation : </label>
        <input type="date" name="date" aria-label="Date de facturation" required/>
    </div>

    <div>
        <label for="company">Nom de la société : </label>
        <select type="text" name="company" aria-label="Société" required>        
            <?php foreach($companies as $key => $value) : ?>
            <option value="<?= ucwords($value['name']) ?>"><?= ucwords($value['name']) ?></option>
            <?php endforeach; ?>
        </select>
    </div>

    <div>
        <label for="type">Type de société : </label>
        <select name="type" name="type" aria-label="Type de société" required>
            <option value="Fournisseur" selected>Fournisseur</option>
            <option value="Client">Client</option>  
        </select>
    </div>

    <!-- So much power for a sole man. !-->

    <button type="submit" name="addInvoice" title="Validation">Enregistrer la facture</button>
    <button type="reset" value="Réinitialiser">Réinitialiser</button>
</form>
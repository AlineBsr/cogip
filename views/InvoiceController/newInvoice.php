<h1>Générer une nouvelle facture</h1>
<form method="POST" action="">
    <label for="number">Numéro de facture : </label>
    <input type="text" name="number" aria-label="N° de facture" required/><br/>

    <label for="date">Date de facturation : </label>
    <input type="date" name="date" aria-label="Date de facturation" required/><br/>

    <label for="company">Nom de la société : </label>
    <select type="text" name="company" aria-label="Société" required>        
        <?php foreach($companies as $key => $value) : ?>
        <option value="<?= $key + 1 ?>"><?= $value['name'] ?></option>
        <?php endforeach; ?>
    </select><br/>

    <label for="type">Type de société : </label>
    <select name="type" name="type" aria-label="Type de société" required>
        <option value="Fournisseur" selected>Fournisseur</option>
        <option value="Client">Client</option>  
    </select><br/>

    <button type="submit" name="addInvoice" title="Validation">Enregistrer la facture</button>
    <button type="reset" value="Réinitialiser">Réinitialiser</button>
</form>
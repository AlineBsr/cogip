<h1>Générer une nouvelle facture</h1>
<form method="POST" action="">
    <label for="number">Numéro de facture : </label>
    <input type="text" name="number" aria-label="N° de facture" required/><br/>

    <label for="date">Date de création de la facture : </label>
    <input type="date" name="date" aria-label="Date de facturation" required/><br/>

    <label for="company_name">Nom de la société : </label>
    <input type="text" name="company_name" aria-label="Société" /><br/>

    <button type="submit" name="addInvoice" title="Validation">Enregistrer la facture</button>
    <button type="reset" value="Réinitialiser">Réinitialiser</button>
</form>
<h1>Modifier une companie</h1>
<form method="POST">
    <p>
        <label for="name">Nom de la companie: </label>
        <input type="text" name="name" value="<?= $companie['name'] ?>">
    </p>
    <p>
        <label for="address">Adresse de la companie: </label>
        <input type="text" name="address" value="<?= $companie['address'] ?>">
    </p>
    <p>
    <label for="country">Pays dans lequel se trouve la companie: </label>
    <input type="text" name="country" value="<?= $companie['country'] ?>">
    </p>
    <p>
        <label for="vat">Numero de TVA de la companie: </label>
        <input type="text" name="vat" value="<?= $companie['vat'] ?>">
    </p>
    <p>
        <label for="phone">Numero de telephone de la companie: </label>
        <input type="text" name="phone" value="<?= $companie['phone'] ?>">
    </p>
    <input type="submit">
</form>
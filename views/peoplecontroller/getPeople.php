<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Liste des contacts</title>
</head>
<body>
<h1>Liste des contacts  </h1>
</div>
<table>
    <tr>
        <th scope="col"></th>
        <th scope="col">Prénom</th>
        <th scope="col">Nom</th>
        <th scope="col">Téléphone</th>
        <th scope="col">Courriel</th>
        <th scope="col">Société</th>
    </tr>

    <?php
    foreach ($people as $person) {
        echo '<tr> <td><a href="getPerson/'. intval($person['id']) . '"/> ' . '📄' . '</td>'  . '<td>' . $person['firstname'] . '</td><td>' . mb_strtoupper($person['lastname']) . '</td><td>' . $person['phone'] . '</td><td>'.'<a  href="mailto:'. $person['email'] . '">' . $person['email'] . '</td><td>' . mb_strtoupper($person['company_name']) . '</td><td><a href="updatePerson/'. intval($person['id']) . '"/> ✎ </td><td>' . '<a href="delete/' . $person['id'] .  '" /> 🗑' . '</td></tr>';
    }
    ?>

</table>
<br>
<button  onclick="window.location.href='./addPerson'">Ajouter un contact</button>
</body>
</html>

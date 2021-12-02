<h1>Liste des contacts</h1>
<table>
    <tr>
        <th scope="col">ID</th>
        <th scope="col">Prénom</th>
        <th scope="col">Nom</th>
        <th scope="col">Téléphone</th>
        <th scope="col">Courriel</th>
        <th scope="col">Entreprise</th>
    </tr>

    <?php
    foreach ($people as $person) {
        echo '<tr> <td><a href="./getOne/'. intval($person['id']) . '"/> ' . $person['id'] . '</td>' . '<td>' . $person['firstname'] . '</td><td>' . $person['lastname'] . '</td><td>' . $person['phone'] . '</td><td>' . $person['email'] . '</td><td>' . $person['company_name'] . '</td></tr>';
    }
    ?>

</table>
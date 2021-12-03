<h1>Liste des contacts</h1>
<button  onclick="window.location.href='./addPerson'">Ajouter un contact</button>
<br/>    
<table>
    <tr>
        <th scope="col"></th>
        <th scope="col">Prénom</th>
        <th scope="col">Nom</th>
        <th scope="col">Téléphone</th>
        <th scope="col">Courriel</th>
        <th scope="col">Entreprise</th>
    </tr>

    <?php
    foreach ($people as $person) {
        echo '<tr> <td><a href="getPerson/'. intval($person['id']) . '"/> ' . 'Détails' . '</td>'  . '<td>' . $person['firstname'] . '</td><td>' . strtoupper($person['lastname']) . '</td><td>' . $person['phone'] . '</td><td>'.'<a  href="mailto:'. $person['email'] . '">' . $person['email'] . '</td><td>' . strtoupper($person['company_name']) . '</td><td><a href="updatePerson/'. intval($person['id']) . '"/> Modifier </td><td>' . '<a href="delete/' . $person['id'] .  '" /> Suppr ' . '</td></tr>';
    }
    ?>

</table>
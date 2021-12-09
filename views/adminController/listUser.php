<?php
foreach($users as $user){
    echo "<p>";
    echo "Nom : ".$user['login']. " <br>";
    if($user["isAdmin"] == 1) {
        echo "statut : Administrateur";
    }
    elseif($user["isMod"] == 1){
        echo "statut : Modderateur";
    }
    else{
        echo "statut : utilisateur";
    } 
    ?>
    <a href="privilegeUpdate/<?=$user["id"]?>">gerer les privilèges</a>
    </p>
    <?php
}
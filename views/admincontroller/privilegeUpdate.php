<h2>Changer les privilèges de <?php 
echo $user["login"];
?></h2>
<form method="POST">
<input type="radio" id="isAdmin" name="privilege" value="isAdmin">
<label for="isAdmin">Administrateur</label>
<input type="radio" id="isMod" name="privilege" value="isMod">
<label for="isMod">Moderateur</label>
<input type="radio" id="isLambda" name="privilege" value="isLambda">
<label for="isLambda">utilisateur</label>
<input type="submit" value="confirmer">
<form>
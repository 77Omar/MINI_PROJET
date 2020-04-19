<?php
//partie ki verifie la validation formulaire
require_once("fonctions.php");
if(isset($_POST['btn'])){
    validform($_POST['login']);
   
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Créer admin</title>
</head>
<body>
   <div class="gauche"> 
<div id="error"></div>
<label for=""><h1>S'INSCRIRE</h1></label>
<label for=""><p>Pour proposer des quizz</p></label>
<form action="" method="post"  enctype="multipart/form-data" id="form-connexion">
<div id=lign>
 <input type="text" id="lign" name="lign">
</div>

<div class="input-form">
<label for="prenom" id="text">Prénom</label>
<input type="text" id="prenom" name="prenom" error="error-1">
<div class="error-form" id="error-1"></div>
</div>
<div class="input-form">
<label for="nom" id="text">Nom</label>
<input type="text" id="nom" name="nom" error="error-2">
<div class="error-form" id="error-2"></div>
</div> 

<div class="input-form">
<label for="login" id="text">login</label>
<input type="text" id="login" error="error-3" name="login">
<div class="error-form" id="error-3"></div>
</div> 

<div class="input-form">
<label for="password" id="text">Password</label>
<input type="password" id="password" name="password" error="error-4">
<div class="error-form" id="error-4"></div>
</div> 
<div class="input-form">
<label for="password" id="text">Confirmer Password</label>
<input type="password" id="confirm_password" name="password" error="error-5">
<div class="error-form" id="error-5"></div>
</div> 

<div class="true">
<label for="avatar" class="avatare">Avatar</label>
<!--<p><input type="submit" value="Choisir un fichier" placeholder="Choisir un fichier" class="connexion" name="btn"></p>-->
<p><input type="submit" value="Créer compte" placeholder="Créer compte" class="connection" name="btn"></p><br>
<input type="file" name="avatare" id="avatare" accept=".jpg, .JPG, .jpeg, .png, .PNG"
onchange="document.getElementById('img').src=window.URL.createObjectURL(this.files[0])">
</br> 
</div>

</form>
</div>
<div class="right_slide">
<div class="avatare_joueur">
   <img id="img">
</div>

</div>
 
</body>
</html>

<script src="function.js">
 
</script>

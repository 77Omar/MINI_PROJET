<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Créer admin</title>
</head>
<body>
    
<div id="error"></div>

<label for=""><h1>S'INSCRIRE</h1></label>
<label for=""><p>Pour proposer des quizz</p></label>

<form action="" method="post"  enctype="multipart/form-data" id="creationcompteuser">
<div id=lign>
 <input type="text" id="lign" name="lign">
</div>

<div class="c100">
<br><label for="prenom" id="text">Prénom</label>
<input type="text" id="prenom" name="prenom">
</div>
<div class="c10">
<br><br><br><br><br><label for="nom" id="text1">Nom</label>
<input type="text" id="nom" name="nom">
</div> 
<br><br><br>
<div class="c1">
<br><br><label for="login" id="text1">login</label>
<input type="text" id="login" name="login">
</div> 
<br><br><br>
<div class="c1">
<br><br><label for="password" id="text1">Password</label>
<input type="text" id="password" name="password">
</div> 
<br><br><br>
<div class="c1">
<br><br><label for="password" id="text1">Confirmer Password</label>
<input type="text" id="confirm_password" name="password">
</div> 
<br><br><br><br><br>
<div class="true">
<label for="avatar" class="avatar">Avatar</label>
<!--<p><input type="submit" value="Choisir un fichier" placeholder="Choisir un fichier" class="connexion" name="btn"></p>-->
<p><input type="submit" value="Créer compte" placeholder="Créer compte" class="connection" name="btn"></p><br>
<input type="file" name="avatare" id="avatar" accept=".jpg, .JPG, .jpeg, .png, .PNG"
onchange="document.getElementById('img').src=window.URL.createObjectURL(this.files[0])">
</br> 
</div>
<div class="right_slide">
<div class="avatar_joueur">
   <img id="img">
</div>

</div>
</form>

</body>
</html>


<?php

if(isset($_FILES['avatare'])){
    $name_file=$_FILES['avatare']['name'];
    $tmp_name=$_FILES['avatare']['tmp_name'];
    $local_image= "picture/";
    move_uploaded_file( $tmp_name,$local_image.$name_file);
}
?>

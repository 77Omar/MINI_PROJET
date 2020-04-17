<?php
session_start();
if(!isset($_SESSION['prenom'])){
    echo "Vous n'etes pas connectés!";
    header("Location:pageconnexion.php");
    exit;
    
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet"  type="text/css" href="creationpageadmin.css">
    <title>Creation page admin</title>
</head>
<body>
<div class="general">
<div id="error"></div>
    <div class="one">
        <div id="logo">
         <img src="images/logo-QuizzSA.png" alt="">
        </div>
        <h2>Le plaisir de jouer</h2>
      </div>

<div class="forme">
   <div class="bloc">
       <div class="two">
       <a href="Deconnexion.php"><input type="submit" value="Déconnexion" name="btn1" class="btn1"></a>
       <h2>CREER ET PARAMETRER VOS QUIZZ</h2>
       </div>

   <div class="menu">     
   <form action="" method="post" id="creationpageadmin">
       
         
<div class="borderone">
  <div class="avatar">
    <img src="<?=$_SESSION['avatar']?>" alt="">
  </div>
        <?=$_SESSION['prenom']?><br>
        <?=$_SESSION['nom']?>
</div> 

<div class="global">
    <a href="#" id="lister">
        <h3>Liste Questions</h3>
        <img src="images/ic-liste.png" alt="" class="liste">
    </a>
    <br><a href="#" id="admin">
        <h3>Créer Admin</h3>
        <img src="images/ic-ajout-active.png" alt="" class="liste">
    </a>
    <br><a href="#" id="joueur">
        <h3>Liste Joueur</h3>
        <img src="images/ic-liste.png" alt="" class="listetwo">
    </a>
    <br><a href="#"  id="question">
        <h3>Créér Questions</h3>
        <img src="images/ic-ajout.png" alt="" class="liste">
    </a>

</div>
   </form>
</div>
<!--PageBlanc-->
<div class="leftmenu" id="response">



 </div>
<!--Fin-->

</div>
 </div>
</div>
<script src="Ajaxhr.js">
</script>
</body>
</html>

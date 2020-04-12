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
    <link rel="stylesheet"  type="text/css" href="pagejoueur.css">
    <title>Page Joueur</title>
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
       
       <h2>BIENVENUE SUR LA PLATEFORME DE JEU DE QUIZZ <br>
       JOUER ET TESTER VOTRE NIVEAU DE CULTURE GENERALE
       </h2>
    
       <div class="avatar"> 
           <img src="<?=$_SESSION['avatar']?>" alt="" >
        </div>
        <!-- <--?=$_SESSION['prenom']?>-->
       </div>

   <div class="menu">     
   <form action="" method="post" id="">
 
    
   </form>
     
   </div>
  </div>
 </div>
</div>
</body>
</html>

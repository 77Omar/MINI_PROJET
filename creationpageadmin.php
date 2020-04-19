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
   <form action="" method="post" enctype="multipart/form-data" id="creationpageadmin">
       
         
<div class="borderone">
  <div class="avatar">
    <img src="<?=$_SESSION['avatar']?>" alt="">
    
  </div>
  <p><?=$_SESSION['prenom']?><br>
        <?=$_SESSION['nom']?></p>
       
</div> 

<div class="global">
    <a href="creationpageadmin.php?page=Listequestion"> <!--?page(parametre)-->
        <h3>Liste Questions</h3>
        <img src="images/ic-liste.png" alt="" class="liste">
    </a>
    <br><a href="creationpageadmin.php?page=Admin">
        <h3>Créer Admin</h3>
        <img src="images/ic-ajout-active.png" alt="" class="liste">
    </a>
    <br><a href="creationpageadmin.php?page=Listejoueur">
        <h3>Liste Joueur</h3>
        <img src="images/ic-liste.png" alt="" class="listetwo">
    </a>
    <br><a href="creationpageadmin.php?page=creerquestion">
        <h3>Créér Questions</h3>
        <img src="images/ic-ajout.png" alt="" class="liste">
    </a>

</div>
   </form>
</div>

<!--PageBlanc-->
<div class="leftmenu" id="response">
<!---->

<?php
if(isset($_GET["page"])){
   if($_GET['page']=="Listequestion"){
     require_once('Listequestion.php');
   }
   elseif($_GET['page']=="Listejoueur"){
    require_once('Listejoueur.php');
   }
   elseif($_GET['page']=="Admin"){
    require_once('Creeradmin.php');
   }
   elseif($_GET['page']=="creerquestion"){
   require_once('creerquestion.php');
   }
}
?>

<!---->
</div>
<!--Fin-->

</div>
 </div>
</div>
<!--<script src="Ajaxhr.js"></script>-->
</body>
</html>

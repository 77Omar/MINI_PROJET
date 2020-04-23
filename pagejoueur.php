<?php
session_start();
if(!isset($_SESSION['prenom'])){
    echo "Vous n'etes pas connectés!";
    header("Location:pageconnexion.php");
    exit;
}

$tab_json = json_decode(file_get_contents("fichierJSON.json"),true);
    foreach ($tab_json as $value){
     if($value['role']=="player"){
      $tab[]= array(
        "prenom"=> $value["prenom"],
        "nom"=> $value["nom"],
        "score"=> $value["score"]
      );
     }
   }
//Tri la colonne score par ordre décroissant 
$columns = array_column($tab,"score");
array_multisort($columns, SORT_DESC,$tab);
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
           <p><?=$_SESSION['prenom']?><br>
        <?=$_SESSION['nom']?></p>
        </div>
        
       </div>

   <div class="menu">     
   <form action="" method="post" id="">
   <div class="interface">
       <button><p>Top scores</p></button>
       <button class="scor">Mon meilleur score</button>
       
   <?php
  echo"<table>";
  echo"<tr>";
  
  echo"</tr>";

for($i=0; $i<5; $i++){
 if(array_key_exists($i,$tab)){
   echo"<tr>";
   echo "<td>".$tab[$i]['prenom'].' '.$tab[$i]['nom']."</td>";
   echo "<td>".$tab[$i]['score']."</td>";
   echo"</tr>";
  }
 
}
echo"</table>";
?>
   </div>
   <div class="right">
     <div class="textera">

     </div>
   </div>

   </form>
     
   </div>
  </div>
 </div>
</div>
</body>
</html>

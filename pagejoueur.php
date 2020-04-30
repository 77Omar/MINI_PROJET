
<?php
session_start();
if(!isset($_SESSION['prenom'])){
    echo "Vous n'etes pas connectés!";
    header("Location:pageconnexion.php");
    exit;
}
$tab=[];
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
foreach($tab as $value){
  if($_SESSION['prenom']==$value['prenom']){
    $meilleure_score=$value['score'];
  }
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
           <p><?=$_SESSION['prenom']?><br>
        <?=$_SESSION['nom']?></p>
        </div>
        
       </div>

   <div class="menu">     

   <div class="interface">
     <a href="#" id="topscr1"><p>Top scores</p></a>
     <a href="#" class="scor" id="topscr2">Mon meilleur score</a>
     <div id="top_score">
   <?php
   
  echo"<table>";
  echo"<tr>";
  
  echo"</tr>";

for($i=0; $i<5; $i++){
 if(array_key_exists($i,$tab)){
   echo"<tr>";
   echo "<td>".$tab[$i]['prenom'].' '.$tab[$i]['nom']."</td>";
   echo "<td>".$tab[$i]['score']."pts"."</td>";
   echo"</tr>";
  }
 
}
echo"</table>";

?>
 </div>
 <div id="meilleure">
   <?php
   echo 'meilleure score: '.$meilleure_score.'';
   ?>
</div>
</div>
       <div class="right">
           <div class="textera">

           </div>
       </div>
   </div>



     
   </div>
  </div>
 </div>
</div>
</body>
</html>
<script>
  let topscr1=document.getElementById("topscr1");
  let top_score=document.getElementById("top_score");
  let meilleure=document.getElementById("meilleure");
  let topscr= document.getElementById('topscr2');
  topscr1.addEventListener("click", function(){
    top_score.style.display="block";
    top_score.style.backgroundColor="cadetblue";
    topscr1.style.backgroundColor="cadetblue";
    if(meilleure.style.display=="block"){
      meilleure.style.display="none";
      topscr.style.backgroundColor="";
    }
    
  });

  let topscr2=document.getElementById("topscr2");
  let meilleur=document.getElementById("meilleure");
  let top_scor=document.getElementById("top_score");
  let topsc=document.getElementById('topscr1');
  topscr2.addEventListener("click", function(){
    meilleur.style.display="block";
    meilleur.style.backgroundColor="beige";
    topscr2.style.backgroundColor="beige";
    if(top_scor.style.display=="block"){
      top_scor.style.display="none";
      topsc.style.backgroundColor="";
    }
    
  });
 
  
</script>

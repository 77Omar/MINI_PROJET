<?php
 $tab_json = json_decode(file_get_contents("fichierJSON.json"),true);
if(isset($_GET['page'])){
  if($_GET['page']=="Listejoueur"){
    foreach ($tab_json as $value){
     if($value['role']=="player"){
      $tab[]= array(
        "prenom"=> $value["prenom"],
        "nom"=> $value["nom"],
        "score"=> $value["score"]
      );
     }
   }
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
    <link rel="stylesheet" href="creationpageadmin.css">
    <title>Liste joueur par score</title>
</head>
<body>
    
<!--<div class="leftmenu">-->
<div class="border">
  <label for="" id="nbreto">LISTE DES JOUEURS PAR SCORE</label>
</div>
<div class="right">

<?php
 
  $nbr_elements=count($tab);
  $nbr_par_page=2; 
  $nbr_de_page=ceil($nbr_elements/$nbr_par_page);
  

if(isset($_GET['pages'])){
   $numberpage=$_GET['pages'];
}else{
   $numberpage=1;
}
  echo "<p>le nombre de page est:".$nbr_de_page.'</p>';
  $IndiceDebut=($numberpage-1) * $nbr_par_page;
  $IndiceFin=$IndiceDebut+$nbr_par_page-1;


  echo"<table>";
  echo"<tr>";
  echo"<th>Prenom</th>";
  echo"<th>nom</th>";
  echo"<th>Score</th>";
  echo"</tr>";

for($j=$IndiceDebut; $j<=$IndiceFin; $j++){
 if(array_key_exists($j,$tab)){
   echo"<tr>";
   echo "<td>".$tab[$j]['prenom']."</td>";
   echo "<td>".$tab[$j]['nom']."</td>";
   echo "<td>".$tab[$j]['score']."</td>";
   echo"</tr>";
  }
}
echo"</table>";
if($numberpage > 1){
  $precedent = $numberpage-1;
  echo '</br><a class="precedent" href="creationpageadmin.php?page=Listejoueur&pages='.$precedent.' ">Precedent</a> &nbsp;';
}
if($numberpage < $nbr_de_page){
  $suivant= $numberpage+1;
  echo '<a class="suivant" href="creationpageadmin.php?page=Listejoueur&pages='.$suivant.' ">Suivant</a> &nbsp;';
}

?>


  </div>
 <!--</div>-->
</body>
</html>
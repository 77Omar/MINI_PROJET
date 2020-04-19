<?php
 $tab_json = json_decode(file_get_contents("fichierJSON.json"),true);
 $tabjouer=[];
if(isset($_GET['page'])){
  if($_GET['page']=="Listejoueur"){
    foreach ($tab_json as $value){
     if($value['role']=="player"){
      
     }
  }
}
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Liste joueur par score</title>
</head>
<body>
    
<!--<div class="leftmenu">-->
    <div class="border">
        <label for="" id="nbreto">LISTE DES JOUEURS PAR SCORE</label>
    </div>
<div class="right">

<table>
<tr>
<th>Prenom</th>
<th>nom</th>
<th>Score</th>
</tr>
<tr>
  <td>Omar</td>
  <td>Omar</td>
  <td>100points</td>
</tr>
<tr>
  <td>faye</td>
  <td>faye</td>
  <td>200points</td>
</tr>
</table>

  </div>
 <!--</div>-->
</body>
</html>
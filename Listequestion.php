<?php
$Tab_Json=json_decode(file_get_contents("question.json"),true);
 $Tab=[];
 foreach($Tab_Json as $question){
   $Tab[]=$question;
 }

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
<form action="" method="post">
<!--<div class="leftmenu">-->
    <div class="border">
        <label for="" id="nbre">Nbre de question/jeu</label>
        <input type="number" class="number" name="nbre_question"> 
        <button type="submit" class="ok" name="btn" id="">OK</button>
    </div>
  <div class="right">
  <?php
  if(isset($_POST['btn'])){
    $Nbre_de_question=$_POST['nbre_question'];
    if(empty($Nbre_de_question)){
        echo "Veuillez entre un nombre svp!";
    }elseif($Nbre_de_question<=0){
      echo "veuillez entrez un nombre positif svp!";
    }
     else{
         $_SESSION['Nbre']=$Nbre_de_question;
         }
    }
    if(!empty($_SESSION['Nbre'])){
      $nbr_elements=count($Tab);
      $nbr_par_page=$_SESSION['Nbre']; 
      $nbr_de_page=ceil($nbr_elements/$nbr_par_page);
       
     if(isset($_GET['pages'])){
       $numberpage=$_GET['pages'];
     }else{
       $numberpage=1;
     }
      echo "<p>le nombre de page est:".$nbr_de_page.'</p>';
      $IndiceDebut=($numberpage-1) * $nbr_par_page;
      $IndiceFin=$IndiceDebut+$nbr_par_page-1;
     
      for($i=$IndiceDebut; $i<=$IndiceFin; $i++){
         if(array_key_exists($i,$Tab)){
             echo ($i+1).".".$Tab[$i]["questions"]."<br/></br>";
             foreach($Tab[$i]['reponse'] as $value){
                 if($Tab[$i]['type_reponse']=="Texte"){
                     echo "<input type='text' value='".$value."' name='' disabled>";
                     echo"<br/>";
                 }
                 elseif($Tab[$i]['type_reponse']=="choix_multiple"){
                   if(in_array($value,$Tab[$i]['reponses_valides'])){
                    echo "<input type='checkbox' disabled name='' checked>".$value;
                    echo"<br/>";
                   }else{
                    echo "<input type='checkbox' disabled name=''>".$value;
                    echo"<br/>";
                  }
                  }else{
                   if(in_array($value,$Tab[$i]['reponses_valides'])){
                    echo "<input type='radio' disabled name='' checked>".$value;
                    echo"<br/>";
                   }else{
                    echo "<input type='radio' disabled name=''>".$value;
                    echo"<br/>";
                  }
                   
                 }  
                 
              }
              echo "<hr>";
            }
         }
     
       if($numberpage > 1){
         $precedent = $numberpage-1;
         echo '</br><a class="precedent" href="creationpageadmin.php?page=Listequestion&pages='.$precedent.' ">Precedent</a> &nbsp;';
       }
       if($numberpage < $nbr_de_page){
         $suivant= $numberpage+1;
         echo '<a class="suivant" href="creationpageadmin.php?page=Listequestion&pages='.$suivant.' ">Suivant</a> &nbsp;';
       }

    }
        

  ?>

  </div>
  
 <!--</div>-->
 </form>
</body>
</html>
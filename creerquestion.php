<?php
require_once('fonctionquestions.php');

if(isset($_POST['envoie'])){
    $area="";
    $point="";
    $typ_rep="";
    $reponse="";
    $message="";
    $repvalid=[];
}
$numb_input=0;
if(isset($_POST['questions']) && isset($_POST['points']) && isset($_POST['type_reponse'])){
    $numb_input=$_POST['numb_input'];
    $area=$_POST['questions'];
    $point=$_POST['points'];
    $typ_rep=$_POST['type_reponse'];

   if($typ_rep=="Texte"){
       $reponse[]=$_POST['reponse'];
       $repvalid[]=$_POST['reponse'];
   }else{
       for($i=1; $i<=$numb_input;$i++){
         if(isset($_POST['reponse'.$i])){
            $reponse[]= $_POST['reponse'.$i];
         }
         if(isset($_POST['checkbox'.$i])){
             $repvalid[]= $_POST['reponse'.$i];
         }
        elseif(isset($_POST['radio'])){
            if($_POST['radio']=="reponse".$i){
             $repvalid[]= $_POST['reponse'.$i];
            }
        }
        
    }
   }

 //parametre doit etre par ordre
    validquestion($area,$point,$typ_rep,$reponse,$repvalid);
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Créer Questions</title>
</head>
<body>
    <!--<div class="leftmenu">-->
<div class="border">
    <label for="" id="nbretree">PARAMETRER VOTRE QUESTION</label>
</div>
<form action="#" method="post" id="creequestion">
  <div class="right" id="inputs">
   <div id="row_0">
    <div class="type"> 
    <h2>Questions</h2>
    <textarea name="questions" id="typrea" cols="" rows="" errore="errore-1" class="form"></textarea>
    <div class="errore-form1" id="errore-1"></div>
    </div>
    <div class="types"> 
    <h2>Nbre de points</h2>
    <input type="number" id="num" errore="errore-2" class="form" name="points">
    <div class="errore-form2" id="errore-2"></div>
    </div>
    <div class="selec"> 
    <h2>Type de réponse</h2>
    <select name="type_reponse" id="select" errore="errore-3" class="form" onchange="texte()">
    <option value="">Donnez le type de réponse</option>
    <option value="Texte">Texte</option>
    <option value="choix_simple">Choix simple</option>
    <option value="choix_multiple">Choix multiple</option>
    </select>
    <button type="button" class="ajout" onclick="onAddInput()"><img src="images/ic-ajout-re_ponse.png" name="reponse" href="" alt=""></button>
    <div class="errore-form3" id="errore-3"></div>
    
    </div>
    <input type="hidden" name="numb_input" id="valeur">

 </div>
    <input type="submit" value="Enregistrer" class="button" name="envoie">
</div>

</form>
<!--</div>-->
</body>
</html>

<script src="creationquestion.js">

</script>
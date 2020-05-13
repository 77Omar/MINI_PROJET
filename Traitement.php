<?php
session_start();
$index=$_SESSION['num_page'];
$nbr_page=$_SESSION['nbr_page'];
$i=$index-1;
if (isset($_POST['suivant'])){
if ($_POST['choice']== 'text'){
    $_SESSION['recup_reponse'][$i]=$_POST['Texte'];
}
    if ($_POST['choice']== 'multiple'){
        if (isset($_POST['check']))
        $_SESSION['recup_reponse'][$i]=$_POST['check'];
    }
   else{
       if (isset($_POST['radio']))
           $_SESSION['recup_reponse'][$i]=$_POST['radio'];
   }

if ($index<$nbr_page){
    $next=($index+1);
    header("Location:pagejoueur.php?pages=".$next);
}
var_dump($_SESSION['recup_reponse']);
}
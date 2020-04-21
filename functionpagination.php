<?php
$_SESSION['player']=$tab;

if(isset($_GET['page'])){
   $numberpage=$_GET['page'];
   $nbr_elements=count($tab);
   $nbr_par_page=3; 
   $nbr_de_page=ceil($nbr_elements/$nbr_par_page);
     echo "le nombre de page est:".$nbr_de_page.'<br/>';
for($i=$numberpage; $i<$nbr_de_page; $i++){
    
}
    echo '<br>';



    $IndiceDebut=($numberpage-1)*$nbr_par_page;
    $IndiceFin=$IndiceDebut+$nbr_par_page-1;
for($i=$IndiceDebut; $i<=$IndiceFin; $i++){
    echo $tab[$i].' ';

}
}


?>
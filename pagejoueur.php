<?php
session_start();
if (empty($_SESSION['start'])){
    $_SESSION["start"]=1;
}
$numberpage="";
$nbr_de_page="";
$score=0;
$Tab_Json=json_decode(file_get_contents("question.json"),true);
$Tab=[];
foreach($Tab_Json as $question){
    $Tab[]=$question;
}

//decode listequestion
$jsonquestion=json_decode(file_get_contents("parametre.json"),true);
$nbr= $jsonquestion['nbq'];

//
require_once ('function.php');
// si $_SESSION['start']==1 pour la premiere fois on melange le tableau et on passe la variable session à 2
if ($_SESSION['start']==1){
    $_SESSION['shuffle']= Random($nbr, $Tab);
    $_SESSION['start']=2;
}

?>
<?php
if(!isset($_SESSION['prenom'])){
    echo "Vous n'etes pas connectés!";
    header("Location:index.php");
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

$nbr_elements=count($_SESSION['shuffle']);
$nbr_par_page=1;
$nbr_de_page=ceil($nbr_elements/$nbr_par_page);
if(isset($_GET['pages'])){
    $numberpage=$_GET['pages'];
}else{
    $numberpage=1;
}
$_SESSION['num_page']= $numberpage;
$_SESSION['nbr_page']= $nbr_de_page;
$IndiceDebut=($numberpage-1) * $nbr_par_page;
$IndiceFin=$IndiceDebut+$nbr_par_page-1;

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
                <form action="Traitement.php" method="post">
                <div class="right">

                    <div class="textera">
                        <?php
                        echo 'Question:'.$numberpage.'/'.$nbr_de_page.'<br>';
                        for($i=$IndiceDebut; $i<=$IndiceFin; $i++) {
                            echo $_SESSION['shuffle'][$i]["questions"] . "<br/></br>";
                            $score=$_SESSION['shuffle'][$i]["points"];
                        }

                        ?>
                    </div>
                    <br>
                    <div class="Reponses">
                        <div class="score">
                            <input type="text" value="<?=$score?>pts" name="point" class="point"  disabled>
                        </div>

                        <?php
                        echo"<div class='answer'>" ;
                        for($i=$IndiceDebut; $i<=$IndiceFin; $i++){
                            if(array_key_exists($i,$_SESSION['shuffle'])){
                                foreach($_SESSION['shuffle'][$i]['reponse'] as $value){
                                    if($_SESSION['shuffle'][$i]['type_reponse']=="Texte"){
                                        echo"<br/>";
                                        if (isset($_SESSION['recup_reponse'][$i])){
                                            echo "<input type='text' value='".$_SESSION['recup_reponse'][$i]."' name='Texte'>";
                                            echo"<br/>";
                                        }else{
                                            echo "<input type='text' value='' name='Texte'>";
                                            echo"<br/>";
                                        }

                                    }
                                    elseif($_SESSION['shuffle'][$i]['type_reponse']=="choix_multiple"){
                                        if (isset($_SESSION['recup_reponse'][$i])){
                                            if (in_array($value,$_SESSION['recup_reponse'][$i])){
                                                echo "<input type='checkbox' value='".$value."' class='check' name='check[]' checked>".$value;
                                                echo"<br/>";
                                            }else{
                                                echo "<input type='checkbox' value='".$value."' class='check' name='check[]'>".$value;
                                                echo"<br/>";
                                            }
                                        }
                                        else{
                                            echo "<input type='checkbox' value='".$value."' class='check' name='check[]'>".$value;
                                            echo"<br/>";
                                        }

                                    }else{
                                        if (isset($_SESSION['recup_reponse'][$i])){
                                            if ($_SESSION['recup_reponse'][$i]==$value){
                                                echo "<input type='radio' value='".$value."' checked class='check' name='radio'>".$value;
                                                echo"<br/>";
                                            }else{
                                                echo "<input type='radio' value='".$value."'  class='check' name='radio'>".$value;
                                                echo"<br/>";
                                            }
                                    }else{
                                            echo "<input type='radio' value='".$value."'  class='check' name='radio'>".$value;
                                            echo"<br/>";
                                        }


                                    }

                                }
                                //verification o nivo du traitement
                                if ($_SESSION['shuffle'][$i]['type_reponse']=="Texte"){
                                    echo '<input type="hidden" name="choice" value="text">';
                                }
                                elseif ($_SESSION['shuffle'][$i]['type_reponse']=="choix_multiple"){
                                    echo '<input type="hidden" name="choice" value="multiple">';
                                }
                                else{

                                    echo '<input type="hidden" name="choice" value="radio">';
                                }

                            }
                        }
                        echo "</div>";
                        if($numberpage > 1){
                            $precedent = $numberpage-1;
                            echo '</br><a class="precedent" href="pagejoueur.php?page=pagejoueur&pages='.$precedent.' ">Precedent</a> &nbsp;';
                        }
                        if($numberpage < $nbr_de_page){
                            $suivant= $numberpage+1;
                            echo '<button name="suivant" type="submit" class="suivant">Suivant</button> &nbsp;';
                        }elseif ($numberpage == $nbr_de_page){
                            echo '<button name="suivant" type="submit" class="suivant">Terminer</button> &nbsp;';
                        }

                        ?>
                    </div>
                </div>
                </form>
            </div>

        </div>
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
        top_score.style.backgroundColor="rgb(135, 203, 235)";
        topscr1.style.backgroundColor="rgb(135, 203, 235)";
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
        meilleur.style.backgroundColor="rgb(43, 160, 150)";
        topscr2.style.backgroundColor="rgb(43, 160, 150)";
        if(top_scor.style.display=="block"){
            top_scor.style.display="none";
            topsc.style.backgroundColor="";
        }

    });


</script>

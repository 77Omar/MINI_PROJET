<?php
session_start();
if(isset($_SESSION['prenom'])){
    header("Location:creationpageadmin.php");//permet de redriger
    exit;
}


$message=""; //affichage les messages d'erreurs!
 if(isset($_POST['btn'])){
    $tab_json = json_decode(file_get_contents("fichierJSON.json"),true);

    foreach ($tab_json["users"] as $value){
        //var_dump($value['password']);
        if($value['login']==$_POST['login'] && $value['password']==$_POST['password']){
           $_SESSION['prenom']=$value['prenom'];
           $_SESSION['nom']=$value['nom'];
           $_SESSION['login']=$value['login'];
           $_SESSION['password']=$value['password'];
           $_SESSION['avatar']=$value['avatar'];
            if($value['role']=='admin'){
              header("Location:creationpageadmin.php");//permet de rediriger
                exit;
            }else{
                header("Location:pagejoueur.php");
            }

        }
    
    }
    if($value['login']!=$_POST['login'] && $value['password']==$_POST['password']){
            $message.='<b style="color:red ">login incorrect</b>';
        }elseif($value['login']==$_POST['login'] && $value['password']!=$_POST['password']){
            $message.='<b style="color:red ">mot de pass incorrect</b>';
        }else{
            $message.='<b style="color:red ">login et mot de pass incorrect</b>';
        }

//le cas vide
        if(empty($_POST['login']) && empty($_POST['password'])){
            $message.= '<b style="color: red">Veuillez entrer votre login et mot de pass</b>';
        }elseif(empty($_POST['login'])){
            $message.= '<b style="color: red"> Veuillez entrer votre login</b>';
        }elseif(empty($_POST['password'])){
            $message.= '<b style="color: red"> Veuillez entrer votre mot de pass</b>';
        }

   
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet"  type="text/css" href="pageconnexion.css">
    <title>Page de connexion</title>
</head>
<body>
<div class="general">
    <div class="one">
        <div id="logo">
         <img src="images/logo-QuizzSA.png" alt="">
        </div>
       <h2>Le plaisir de jouer</h2>
    </div>

<div class="forme">
<div class="bloc">

    <div class="two">
     <h3>Login Form</h3>
    
    </div>
   <form action="" method="post">
   <p><?=$message?></p>
   <p><input type="text" name="login" placeholder="    login" class="login"></p>
   <p><input type="password" name="password" placeholder="    password" class="password"></p>
   <p><input type="submit" value="connexion" placeholder="     |  connexion" class="connexion" name="btn"></p>
   </form>
   
   <p><a href="#" class="href"><h5>S'inscrire pour jouer?</h5></a></p>

   
  </div>
 </div>
</div>
</body>
</html>
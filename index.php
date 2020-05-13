<?php
session_start();
if(isset($_SESSION['role'])){
    header("Location:creationpageadmin.php");//permet de redriger
    exit;
}
$message=""; //affichage les messages d'erreurs!
 if(isset($_POST['btn'])){
    $tab_json = json_decode(file_get_contents("fichierJSON.json"),true);

    foreach ($tab_json as $value){
        //var_dump($value['password']);
        if($value['login']==$_POST['login'] && $value['password']==$_POST['password']){
           $_SESSION['prenom']=$value['prenom'];
           $_SESSION['nom']=$value['nom'];
           $_SESSION['login']=$value['login'];
           $_SESSION['password']=$value['password'];
           $_SESSION['score']=$value['score'];
           $_SESSION['avatar']=$value['avatar'];
            if($value['role']=='admin'){
              $_SESSION['role']=$value['role'];
              header("Location:creationpageadmin.php");//permet de rediriger
                exit;
            }else{
                $_SESSION['role']=$value['role'];

                header("Location:pagejoueur.php");
                exit;
            }

        }
        else{
            $message='<b style="color:red ">login ou mot de pass incorrect</b>';
        }
    
    }
   // if($value['login']!=$_POST['login'] && $value['password']==$_POST['password']){
            //$message.='<b style="color:red ">login incorrect</b>';
        //}elseif($value['login']==$_POST['login'] && $value['password']!=$_POST['password']){
            //$message.='<b style="color:red ">mot de pass incorrect</b>';
        //}

//le cas vide
        //if(empty($_POST['login']) && empty($_POST['password'])){
            //$message.= '<b style="color: red">Veuillez entrer votre login et mot de pass</b>';
        //}elseif(empty($_POST['login'])){
            //$message.= '<b style="color: red"> Veuillez entrer votre login</b>';
        //}elseif(empty($_POST['password'])){
            //$message.= '<b style="color: red"> Veuillez entrer votre mot de pass</b>';
        //}

   
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

   <form action="" method="post" id="form-connexion">
       <div class="sms" id="messager"><p><?=$message?></p></div>
    
 
    <div class="input-form">
      <div class="icon-form icon-form-login"></div>
      <input type="text" class="form-control" error="error-1" name="login" id="" placeholder="Login">
      <div class="error-form" id="error-1"></div>
    </div>
    <div class="input-form">
      <div class="icon-form icon-form-pwd"></div>
      <input type="password" class="form-control" error="error-2" name="password" id="" placeholder="Password">
      <div class="error-form" id="error-2"></div>
    </div>
    <div class="input-form">
      <button type="submit" class="btn-form" name="btn" id="">Connexion</button>
      <a href="creationcompteuser.php?page=Users" class="link-form">S'inscrire pour jouer</a>
    </div>

  </form>
   
   <!--<p><a href="#" class="href"><h5>S'inscrire pour jouer?</h5></a></p>-->

   
  </div>
 </div>
</div>
</body>
</html>

<script src="function.js">

</script>
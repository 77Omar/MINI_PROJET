<?php
 require_once("fonctionavatar.php");

function validform($login){
    $tab_json = json_decode(file_get_contents("fichierJSON.json"),true); //Appelation json
    
    if($_GET['page']=="Admin"){
        $role="admin";
    }else{
        $role="player";
    }
    foreach($tab_json as $value){
        if($login == $value['login']){
            echo '<span style="color:red" id="messager">le login existe deja</span>';
        }
        else{
            if($_POST['password'] != $_POST['confirmpassword']){
                 echo'<b style="color:red" id="messager">le mot de pass doit être identique</b>';
                 break;
            }
             else{
                $tab= array(
                    "prenom"=> $_POST["prenom"],
                    "nom"=> $_POST["nom"],
                    "login"=> $_POST["login"],
                    "password"=> $_POST["password"],
                    "role"=>$role,
                    "avatar"=>Avatar()
                );
             }
        }
    }
    if(!empty($tab)){
        $tab_json[]=$tab;
        $tab_json= json_encode($tab_json);
        file_put_contents("fichierJSON.json",$tab_json);
    }
         
    
}


?>
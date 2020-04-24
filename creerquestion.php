<?php
$Tab_json = json_decode(file_get_contents("question.json"),true);
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
<form action="" method="post" id="form-connexion">
<div class="right">
    <div class="type"> 
    <h2>Questions</h2>
    <textarea name="" class="typrea" cols="" rows="" error="error-1" id="input"></textarea>
    <div class="error-form" id="error-1"></div>
    </div>
    <div class="types"> 
    <h2>Nbre de points</h2>
    <input type="number" class="num" error="error-2" id="input">
    <div class="error-form" id="error-2"></div>
    </div>
    <div class="selec"> 
    <h2>Type de réponse</h2>
    <select name="click" class="select" error="error-3" id="input">
    <option value="">Donnez le type de réponse</option>
    <option value="">Texte</option>
    <option value="">Choix simple</option>
    <option value="">Choix multiple</option>
    <div class="error-form" id="error-3"></div>
    </select>
    <img src="images/ic-ajout-re_ponse.png" alt="" class="ajout">
    </div>
    <input type="submit" value="Enregistrer" class="button">
</div>
</form>
<!--</div>-->
</body>
</html>

<script src="function.js"></script>
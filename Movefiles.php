
<?php
if(isset($_FILES['file'])){
    $name_file=$_FILES['file']['name'];
    $tmp_name=$_FILES['file']['tmp_name'];
    $local_image= "picture/";
    move_uploaded_file( $tmp_name,$local_image.$name_file);
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
<!--l'attribut enctype sa permet 
-->
    <form action="" method="post" enctype="multipart/form-data">
    <input type="file" name="file"><br>
    <input type="submit" name="submit" value="upload">
    </form>
</body>
</html>
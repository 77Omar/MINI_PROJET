<?php 
function Avatar(){
    if(isset($_FILES['avatare'])){
        $name_file=$_FILES['avatare']['name'];
        $tmp_name=$_FILES['avatare']['tmp_name'];
        $local_image= "images/";
        move_uploaded_file( $tmp_name,$local_image.$name_file);
        
    }
    return $local_image.$name_file;
}


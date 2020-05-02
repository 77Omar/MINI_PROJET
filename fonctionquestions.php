<?php
function validquestion($area, $point, $typ_rep, $reponse=[], $repvalid=[]){
$Tab_Json=json_decode(file_get_contents("question.json"),true);
    
        $rep_tab=[];
        $rep_valid_tab=[];
        $Tab= array(
            "questions"=> $area,
            "points"=> $point,
            "type_reponse"=> $typ_rep,
            "reponse"=>$rep_tab[]=$reponse,
            "reponses_valides"=> $rep_valid_tab[]=$repvalid,
          ); 
    $Tab_Json[]=$Tab;
    $Tab_Json= json_encode($Tab_Json);
    file_put_contents("question.json",$Tab_Json);
    echo '<span id="message" style="color:red">Demandes effectuées</span>';
}

?>
<script>
setTimeout(() => {
    document.getElementById("message").innerHTML='';
                     
  }, 2000);
  
</script>

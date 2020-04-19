setTimeout(() => {
    document.getElementById("messager").innerHTML='';
                     
  }, 1000);
  

const inputs=document.getElementsByTagName("input");
for(input of inputs){ 
  input.addEventListener("keyup",function(e){
   if(e.target.hasAttribute("error")){
      var idDivError=e.target.getAttribute("error");
      document.getElementById(idDivError).innerText=""
   }
  })

}

   document.getElementById("form-connexion").addEventListener("submit",function(e){
    //pour ne pas recharger la page on va utiliser le return et le preventDefault()
    const inputs=document.getElementsByTagName("input"); //c'est pour recuperer une inpute
    //le boucle for(--of--) permet de parcourir
    var error=false; //pas d'erreur
    for(input of inputs){
     
      //if() permet de verifier si l'input ne contient op une attribut erreur
       if(input.hasAttribute("error")){
           //recupere idDivError stocké o nivo du if() avec GEt o lieu de has
           var idDivError=input.getAttribute("error")
           if(!input.value){ 
           document.getElementById(idDivError).innerText="Ce champs est obligatoire"
           error=true //g trouvé une erreur
          }
         //alert("ok")
         
       }
    }
    if(error){
      e.preventDefault(); //garde le comportement par defaut
    }
    return false; //lui dit de ne po recharger la page
  })

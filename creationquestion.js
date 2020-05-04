//js creerquestions
const creer=document.getElementsByClassName("form");
for(form of creer){ 
  form.addEventListener("keyup",function(e){
   if(e.target.hasAttribute("errore")){
      var idDivErrore=e.target.getAttribute("errore");
      document.getElementById(idDivErrore).innerText=""
   }
  })

}

   document.getElementById("creequestion").addEventListener("submit",function(e){
    //pour ne pas recharger la page on va utiliser le return et le preventDefault()
    const creer=document.getElementsByClassName("form"); //c'est pour recuperer une inpute
    //le boucle for(--of--) permet de parcourir
    var errore=false; //pas d'erreur
    for(form of creer){
     //if() permet de verifier si l'input ne contient op une attribut erreur
       if(form.hasAttribute("errore")){
           //recupere idDivError stocké o nivo du if() avec GEt o lieu de has
           var idDivErrore=form.getAttribute("errore")
           if(!form.value){ 
           document.getElementById(idDivErrore).innerText="Ce champs est obligatoire"
           errore=true //g trouvé une erreur
          }
         //alert("ok")
         
       }
    }
    if(errore){
      e.preventDefault(); //garde le comportement par defaut
    }
    return false; //lui dit de ne po recharger la page
  })


  //Fonction Nbre de reponse
    let nbrRow=0;
  function onAddInput(){
    nbrRow++;
    let id_rep=document.getElementById('select');
    let divInput = document.getElementById('inputs');
    let newInput = document.createElement('div');
    newInput.setAttribute('class','form');
    newInput.setAttribute('id','row_'+nbrRow);
   if(id_rep.options[id_rep.selectedIndex].value==="choix_multiple"){
       newInput.innerHTML=`<div><label id='reponses'> Reponse</label>
    <input class='id_reponse' type='text' name='reponse${nbrRow}'/>
    <input class='checkbox' type='checkbox' name='checkbox${nbrRow}'/></div>
    <button type='button' class='delete'  onclick='onDeleteInput(${nbrRow})'><img src='images/ic-supprimer.png'></img></button>`;
  }
   
   else if(id_rep.options[id_rep.selectedIndex].value==="choix_simple"){
    newInput.innerHTML=`<div><label id='reponses'> Reponse</label>
    <input class='id_reponse' type='text' name='reponse${nbrRow}'/>
    <input class='checkbox' type='radio' name='radio' value="reponse${nbrRow}"/></div>
    <button type='button' class='delete'  onclick='onDeleteInput(${nbrRow})'><img src='images/ic-supprimer.png'></img></button>`;
   }
    divInput.appendChild(newInput);

   let val=document.getElementById('valeur');
       val.setAttribute("value",""+nbrRow+"");

}

function texte(){
  nbrRow++;
  let id_rep=document.getElementById('select');
  let divInput = document.getElementById('inputs');
  let newInput = document.createElement('div');
  newInput.setAttribute('class','form');
  newInput.setAttribute('id','row_'+nbrRow);
   if(id_rep.options[id_rep.selectedIndex].value==="Texte"){
    newInput.innerHTML=`<div><label id='reponses'> Reponse</label>
    <input class='id_reponsetext' type='text' name='reponse'/>
    <button type='button' class='deletes'  onclick='onDeleteInput(${nbrRow})'><img src='images/ic-supprimer.png'></img></button>`;
    
   }
   divInput.appendChild(newInput);

}

function onDeleteInput(n){
   let target = document.getElementById('row_'+n);
   setTimeout(function() {
    target.remove();
   },2000)
   fadeOut('row_'+n);
}
function fadeOut(idTarget){
  let target = document.getElementById(idTarget);
  let effect = setInterval(function() {
    if (!target.style.opacity) {
         target.style.opacity = 1;
    }
    if (target.style.opacity>0) {
      target.style.opacity-=0.1;
    }else{
      clearInterval(effect);
    }
  },200)
}

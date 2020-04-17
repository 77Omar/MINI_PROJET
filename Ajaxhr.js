function createXmlHttpRequestObject(process){
    let xmlHttp = new XMLHttpRequest();
    //La préparation de la requête se fait par le biais de la méthode open(),
    xmlHttp.open('GET',process)
    xmlHttp.addEventListener('readystatechange',function(){
      if(xmlHttp.readyState===XMLHttpRequest.DONE && xmlHttp.status===200){
          document.getElementById('response').innerHTML=xmlHttp.responseText;
      }
    });
    xmlHttp.send(null); //permet de lancer la requete
}

(function handleResponse(){
    if(document.getElementById('question')){
        document.getElementById('question').addEventListener('click',function(){
            createXmlHttpRequestObject("creerquestion.php");
        });
    }
    if(document.getElementById('joueur')){
        document.getElementById('joueur').addEventListener('click',function(){
            createXmlHttpRequestObject("Listejoueur.php");
        });
    }
    if(document.getElementById('admin')){
        document.getElementById('admin').addEventListener('click',function(){
            createXmlHttpRequestObject("Creeradmin.php");
        });
    }
    if(document.getElementById('lister')){
        document.getElementById('lister').addEventListener('click',function(){
            createXmlHttpRequestObject("Listequestion.php");
        });
    }
})();


//--- gestione fetch NEWS

function OnJson(json){
    let articoli=document.querySelector('#news');


    for (let i = 0; i < 10; i++)
    {
        
        let titolo = document.createElement('h1');
        let link= document.createElement('a');

        titolo.textContent = json[i].title;
        link.textContent = 'Visita il sito\n';
        link.addEventListener('click',function(){location.href=json[i].url});


        const articolo = document.createElement('div');
        articolo.classList.add('articolo');
        articolo.id=i;

        articoli.appendChild(articolo);
        articolo.appendChild(titolo);
        articolo.appendChild(link);
        
    }

}

function OnResponse(response){

    return response.json();
}


fetch("http://localhost/esame-app/public/Home/News").then(OnResponse).then(OnJson); 

//---------GESTIONE Menu MOBILE

function chiudiMenu(event){
    m=document.getElementById("listaMenu");
    m.classList.add('hidden');
  }

function mostraMenu(event){
    const l=document.getElementById("listaMenu");
    l.classList.remove('hidden');
    //l.addEventListener("click",chiudiMenu());
}

const Menu=document.getElementById("menu");
Menu.addEventListener("click",mostraMenu);
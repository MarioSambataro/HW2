const stella="./IMG/star.svg";
const chiudi='./IMG/x.svg';
const iconaC='./IMG/iconaCarrello.svg';
const meno="./IMG/meno.png";
const iconaRimuoviC='./IMG/rimuoviCarrello.svg';
const piu='./IMG/piu.svg';
const listaDescr=[];
const listaTitoli=[];
const listaBoxPref=[];
const listaCarrello=[];
const listaPref=document.querySelector('#preferiti');
const listaProdPreferiti=document.querySelector('#lista_prodottiPref');


//------------- caricamento dinamico giochi
function onJson1(json){ 

    let negozi=document.querySelector('#lista_prodotti'); 
    for (let i = 0; i < json.length; i++)
    {
        listaDescr[i]=json[i].descrizione; // riempio questo array che mi serve per la modale 
        const box=document.createElement("div");
        box.id=json[i].id;

        const tit=document.createElement("h1");
        tit.textContent=json[i].nome+" "+json[i].console;

        const pref_b=document.createElement("img");
        pref_b.id='pref_button';
        pref_b.src=stella;
        pref_b.addEventListener('click',aggPref);

        const aggC=document.createElement("img");
        aggC.id='Cbutton';
        aggC.src=iconaC;
        aggC.addEventListener('click',aggCarr);


        const img=document.createElement("img");
        img.id='immagine';
        img.src=json[i].immagine;

        const p=document.createElement("p");
        p.textContent=json[i].costo+"€";

    const dett=document.createElement("h2");
    dett.textContent="clicca qui per maggiori dettagli";
    dett.addEventListener('click',vediDett);
    
    document.getElementById("lista_prodotti").appendChild(box);
    document.getElementById(json[i].id).appendChild(tit);
    document.getElementById(json[i].id).appendChild(pref_b);
    document.getElementById(json[i].id).appendChild(aggC);
    document.getElementById(json[i].id).appendChild(img);
    document.getElementById(json[i].id).appendChild(p);
    document.getElementById(json[i].id).appendChild(dett);   
    listaTitoli[i]=tit; // riempio questo array che mi serve per la ricerca 
    }
}

function onResponse1(response){
    return response.json()
}

//---------------caricamento dinamico acquisti

function onJson2(json){ 
    let acquisti=document.querySelector('#lista_acquisti');
    for (let i = 0; i < json.length; i++)
    {
        
        const box=document.createElement("div");
        box.id="a"+i;

        const tit=document.createElement("h1");
        tit.textContent=json[i].nome+" "+json[i].console;

        const img=document.createElement("img");
        img.id='immagine';
        img.src=json[i].immagine;

    
    
    document.querySelector('#lista_acquisti').appendChild(box);
    document.getElementById("a"+i).appendChild(tit);
    document.getElementById("a"+i).appendChild(img);
   
    }
   
}



function creaPreferito2(boxDaCopiare){
  
    const box=document.createElement("div");
        box.id="k"+boxDaCopiare.id;

        const tit=document.createElement("h1");
        tit.textContent=boxDaCopiare.querySelector("h1").textContent;

        const pref_b=document.createElement("img");
        pref_b.id='unpref_button';
        pref_b.src=meno;
        pref_b.addEventListener('click',rimPref);

        const img=document.createElement("img");
        img.id='immagine';
        img.src=boxDaCopiare.querySelector('#immagine').src;

    
    
    document.getElementById("lista_prodottiPref").appendChild(box);
    document.getElementById("k"+boxDaCopiare.id).appendChild(tit);
    document.getElementById("k"+boxDaCopiare.id).appendChild(pref_b);
    document.getElementById("k"+boxDaCopiare.id).appendChild(img);
      
    
  return box;
  }

  //------------- caricamento dinamico dei preferiti

  function creaPreferito(j,json){
  
    const box=document.createElement("div");
        box.id="k"+json[j].id;

        const tit=document.createElement("h1");
        tit.textContent=json[j].nome+" "+json[j].console;

        const pref_b=document.createElement("img");
        pref_b.id='unpref_button';
        pref_b.src=meno;
        pref_b.addEventListener('click',rimPref);

        const img=document.createElement("img");
        img.id='immagine';
        img.src=json[j].immagine;

    
    
    document.getElementById("lista_prodottiPref").appendChild(box);
    document.getElementById("k"+json[j].id).appendChild(tit);
    document.getElementById("k"+json[j].id).appendChild(pref_b);
    document.getElementById("k"+json[j].id).appendChild(img);
      
    
  return box;
  }



function onJson3(json){ 
    
    
    for (let i = 0; i < json.length; i++) {  
    const boxCopiato = creaPreferito(i,json);
    
    
    if(listaBoxPref.length==0)
      listaPref.classList.remove('hidden');
    
    listaBoxPref.push(boxCopiato);
    listaProdPreferiti.appendChild(boxCopiato);

    }

  }
    


fetch("http://localhost/esame-app/public/AreaClienti/caricaGiochi").then(onResponse1).then(onJson1);

fetch("http://localhost/esame-app/public/AreaClienti/caricaAcquisti").then(onResponse1).then(onJson2);


fetch("http://localhost/esame-app/public/AreaClienti/caricaPref").then(onResponse1).then(onJson3);



function aggPref(event){
    
    const button = event.currentTarget;

    for(let i=0;i<listaBoxPref.length;i++)          //controllo il prod. che non sia già presente nei preferiti
      if(listaBoxPref[i].id =="k"+button.parentElement.id)
      return;
      
      fetch("http://localhost/esame-app/public/AreaClienti/aggPref/"+button.parentElement.id).then(onResponse1).then(report);
      
    const boxDaCopiare=button.parentElement;
    const boxCopiato = creaPreferito2(boxDaCopiare);
    
      if(listaBoxPref.length==0)   //
      listaPref.classList.remove('hidden');
    
    listaBoxPref.push(boxCopiato);    //inserisco il box in questa lista che ci servirà per fare i controlli
    listaProdPreferiti.appendChild(boxCopiato);
    
  
  }


function rimuoviBoxPreferito(id){
    for(let i=0;i<listaBoxPref.length;i++)
      if(listaBoxPref[i].id == id){
      listaBoxPref.splice(i,1);
      break;}
}


  function rimPref(event){
    let id="";
    const button=event.currentTarget;

    for(let i=1;i<button.parentElement.id.length;i++){
      let nume=button.parentElement.id.charAt(i); //faccio questo ciclo per estrarre l'id del prodotto
      id= id+nume;
    }
    
    fetch("http://localhost/esame-app/public/AreaClienti/rimPref/"+id).then(onResponse1).then(report);;
    
    const idBoxDaRimuovere = button.parentElement.id; 
    
    rimuoviBoxPreferito(idBoxDaRimuovere);   //rimuovo il prod. della lista dei preferiti
    button.parentElement.remove();
    
    if(listaBoxPref.length==0)      //se non ci sono più pref. nascondo la sezione
      listaPref.classList.add('hidden');
    
    
  }

  //-------- gestione click CARRELLO

  function chiudiCarr(){
    const c=document.getElementById("carrello");
    c.classList.add('hidden');
  }

  function mostraCarr(event){
   const c=document.getElementById("carrello");
   c.classList.remove('hidden');
   if(!document.getElementById('chiudiCarrello')){
   const x=document.createElement("img");
        x.id='chiudiCarrello';
        x.src=chiudi;
        x.addEventListener('click',chiudiCarr);
        c.appendChild(x);
   }
 }



  const carrello=document.getElementById('carr');
  carrello.addEventListener('click',mostraCarr);



//-----------------GESTIONE CARRELLO




 // carico gli elementi già presenti nel carrello del cliente loggato
function onJson4(json){ 
  let negozi=document.querySelector('#lista_carrello');
  for (let i = 0; i < json.length; i++)
  {
       // creo 3 contenitori: quello con identificatore c conterrà quelli di tipo b e d
      const box=document.createElement("div");
      box.id="c"+json[i].id;

      const testo=document.createElement("div");
      testo.id="b"+json[i].id;

      const quantita=document.createElement("div");
      quantita.id="d"+json[i].id;


      const tit=document.createElement("h1");
      tit.textContent=json[i].titolo+" "+json[i].console;

      
      const aggC=document.createElement("img");
      aggC.id='Cbutton';
      aggC.src=iconaRimuoviC;
      aggC.addEventListener('click',eliC);

      const aggQ=document.createElement("img");
      aggQ.id='+button';
      aggQ.src=piu;
      aggQ.addEventListener('click',aggQu);

      const rimQ=document.createElement("img");
      rimQ.id='-button';
      rimQ.src=meno;
      rimQ.addEventListener('click',rimQu);

      const img=document.createElement("img");
      img.id='immagine';
      img.src=json[i].immagine;

      const pre=document.createElement("p");
      pre.id="p"+json[i].id;
      pre.textContent="prezzo:"+json[i].costo;
      const q=document.createElement("p");
      q.id="q"+json[i].id;
      q.textContent=json[i].quantita;

      listaCarrello.push(box);


  
  document.getElementById("lista_carrello").appendChild(box);
  document.getElementById("c"+json[i].id).appendChild(testo); //inserisco il box b contenenti informazioni testuali
  document.getElementById("c"+json[i].id).appendChild(img); 
  document.getElementById("c"+json[i].id).appendChild(quantita); //inserisco il box d contenenti informazioni sulla quantità
  document.getElementById("b"+json[i].id).appendChild(tit);
  document.getElementById("b"+json[i].id).appendChild(aggC);      // riempio i vari box
  document.getElementById("d"+json[i].id).appendChild(aggQ);
  document.getElementById("d"+json[i].id).appendChild(q);
  document.getElementById("d"+json[i].id).appendChild(rimQ);
  document.getElementById("b"+json[i].id).appendChild(pre);
  }
}



function eliC(event){
  const button = event.currentTarget;
  let z="";
  
  for(let i=1;i<button.parentElement.id.length;i++){      //estraggo l'id del prodotto e lo conservo in z
      let nume=button.parentElement.id.charAt(i);
      z= z+nume;
    }

  eliminaCarr(button.parentElement)
  fetch("http://localhost/esame-app/public/AreaClienti/rimCarrello/"+z).then(onResponse1).then(report);;
       
        for(let i=0;i<listaCarrello.length;i++)
        if(listaCarrello[i].id == ("c"+z)){
        listaCarrello.splice(i,1);
        break;}
        return;

}


function eliminaCarr(box1){
  let box=box1.parentElement;
  let carr= box.parentElement;
  carr.removeChild(box);      // rimuovo il nodo associato a quel prodotto dal carrello
}


//----- aggiornamento valore della quantità(hai premuto il tasto -)

function rimQu(event){
  const button = event.currentTarget;
  let z="";
  for(let i=1;i<button.parentElement.id.length;i++){      //estraggo l'id del prodotto e lo conservo in z
    let nume=button.parentElement.id.charAt(i);
    z= z+nume;
  }
  let d="d"+z;
  let qv="q"+z; // qv=quantità vecchia
    
      let box=document.getElementById(d);     // seleziono il box con le info sulla quantità
      let q= document.getElementById(qv);      // seleziono il testo della quantità
      let x=q.textContent;
      box.removeChild(q);
      let y=parseInt(x)-1;                    // aggiorno il valore di q

      if(y==0){
        eliminaCarr(button.parentElement);
        fetch("http://localhost/esame-app/public/AreaClienti/rimCarrello/"+z).then(onResponse1).then(report);;
       
        for(let i=0;i<listaCarrello.length;i++)
        if(listaCarrello[i].id == ("c"+z)){
        listaCarrello.splice(i,1);
        break;}
        return;
      }


      const qa=document.createElement("p"); // qa=quantità attuale
      qa.id="q"+z;
      qa.textContent=y;
      document.getElementById("d"+z).appendChild(qa);

      fetch("http://localhost/esame-app/public/AreaClienti/aggiornaCarrello/"+y+"/"+z).then(onResponse1).then(report); // aggiorno il DB e passo qa e l'id del prod.
      return;
    }


//----- aggiornamento valore della quantità(hai premuto il tasto +)

function aggQu(event){
  const button = event.currentTarget;
  let z="";
  for(let i=1;i<button.parentElement.id.length;i++){      //estraggo l'id del prodotto e lo conservo in z
    let nume=button.parentElement.id.charAt(i);
    z= z+nume;
  }
  let d="d"+z;
    
      let box=document.getElementById(d);   //seleziono il box che contiene le info sulla quantità
      let q= document.getElementById("q"+z);
      let x=q.textContent;
      box.removeChild(q);
      let y=parseInt(x)+1;                  // aggiorno il nuovo valore di quantità
      

      const qa=document.createElement("p");
      qa.id="q"+z;
      qa.textContent=y;
      document.getElementById("d"+z).appendChild(qa);

      fetch("http://localhost/esame-app/public/AreaClienti/aggiornaCarrello/"+y+"/"+z).then(onResponse1).then(report); // aggiorno il BD con il nuovo valore di quantità passando anche l'id
      return;
    }
  


fetch("http://localhost/esame-app/public/AreaClienti/caricaCarrello").then(onResponse1).then(onJson4);




//---- aggiunta elemento al carrello non ancora presente(hai premuto il tasto carrello sul prodotto)
function creaCarr(box){
  const box1=document.createElement("div");
      box1.id="c"+box.id;

      const testo=document.createElement("div");
      testo.id="b"+box.id;

      const quantita=document.createElement("div");
      quantita.id="d"+box.id;



      const tit=document.createElement("h1");
      tit.textContent=box.querySelector("h1").textContent;

      
      const aggC=document.createElement("img");
      aggC.id='Cbutton';
      aggC.src=iconaRimuoviC;
      aggC.addEventListener('click',eliC);

      const aggQ=document.createElement("img");
      aggQ.id='+button';
      aggQ.src=piu;
      aggQ.addEventListener('click',aggQu);

      const rimQ=document.createElement("img");
      rimQ.id='-button';
      rimQ.src=meno;
      rimQ.addEventListener('click',rimQu);


      const img=document.createElement("img");
      img.id='immagine';
      img.src=box.querySelector("#immagine").src;

      const pre=document.createElement("p");
      let pr="p"+box.id;
      pre.id=pr;
      pre.textContent=box.querySelector("p").textContent;
      const q=document.createElement("p");
      q.textContent="1";
      q.id="q"+box.id;

  document.getElementById("lista_carrello").appendChild(box1);
  document.getElementById("c"+box.id).appendChild(testo);
  document.getElementById("b"+box.id).appendChild(tit);
  document.getElementById("c"+box.id).appendChild(img); 
  document.getElementById("c"+box.id).appendChild(quantita);
  document.getElementById("b"+box.id).appendChild(aggC);
  document.getElementById("d"+box.id).appendChild(aggQ);
  document.getElementById("d"+box.id).appendChild(q);
  document.getElementById("d"+box.id).appendChild(rimQ);
  document.getElementById("b"+box.id).appendChild(pre);

  return box1;
}

//---- aggiunta elemento al carrello  presente e aumenta la quantità(hai premuto il tasto carrello sul prodotto)

function aggCarr(event){
  const button = event.currentTarget;

    for(let i=0;i<listaCarrello.length;i++){
      if(listaCarrello[i].id =="c"+button.parentElement.id){
        
      let box=document.getElementById("d"+button.parentElement.id); // seleziono il box contenente
      let q= document.getElementById("q"+button.parentElement.id);
      let x=q.textContent;
      box.removeChild(q);      
      let y=parseInt(x)+1;  //aggiorno il valore di q
      

      const qa=document.createElement("p");
      qa.id="q"+button.parentElement.id;
      qa.textContent=y;
      document.getElementById("d"+button.parentElement.id).appendChild(qa);

      fetch("http://localhost/esame-app/public/AreaClienti/aggiornaCarrello/"+y+"/"+button.parentElement.id).then(onResponse1).then(report);;
      return;
      }
    }

      // il prod non è presente nel carrello quindi lo creiamo all'interno di esso
      
    fetch("http://localhost/esame-app/public/AreaClienti/aggCarrello/"+button.parentElement.id).then(onResponse1).then(report);
      
    const boxDaCopiare=button.parentElement;
    const boxCopiato = creaCarr(boxDaCopiare);
    
    
    listaCarrello.push(boxCopiato);
    

}



//-------------------------MODALE


function vediDett(event){
  const button=event.currentTarget.parentElement;
  let i=parseInt(button.id)-1;

  // creo 2 contnitori m conterrà t e l'immagine 
  const box= document.createElement("div");
  box.id="m";

  const testi= document.createElement("div");
  testi.id="t"

  const image =document.createElement("img");
  image.src=button.querySelector('#immagine').src;

  const tit=document.createElement("h1");
  tit.textContent=button.querySelector("h1").textContent;
  
  const de=document.createElement("p");
  de.textContent=listaDescr[i];
  
  document.body.classList.add('no_scroll');
  modalView.style.top = window.pageYOffset + 'px';

  modalView.appendChild(box);
  modalView.appendChild(testi);
  document.getElementById("m").appendChild(image);
  
  document.getElementById("t").appendChild(tit);
  document.getElementById("t").appendChild(de);

  modalView.classList.remove('hidden');  // mostro la modale
}

//---- gestione chiusura modale
function onModalClick() {
  document.body.classList.remove('no_scroll');
  modalView.classList.add('hidden');
  modalView.innerHTML = '';
}

const modalView = document.querySelector('#modal-view');
modalView.addEventListener('click', onModalClick);


// barra di ricerca
const barraDiRicerca=document.querySelector('input[type="text"]');
barraDiRicerca.addEventListener("keyup",ricerca);



function ricerca(event){
  const barra=event.currentTarget;
  console.log(barra.value);
  let x;

  for(let i=0;i<listaTitoli.length;i++){
    if(listaTitoli[i].textContent.search(barra.value)!==-1){
      console.log(listaTitoli[i].textContent);
        x=listaTitoli[i].parentElement;
        x.classList.remove("hidden");
    }

      else{
          x=listaTitoli[i].parentElement;
          x.classList.add("hidden");
      }
  }

}


//----- stampo nella console un report sul risultato di alcune fetch

function report(json){
  console.log(json);
}



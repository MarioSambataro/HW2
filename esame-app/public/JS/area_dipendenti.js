function onJson(json){ 

    const magazzino=document.getElementById('magazzino');
    for (let i = 0; i < json.length; i++){
        const r=document.createElement("tr"); //creo la riga
        r.id="r"+i;
        //creo gli elementi da inserire nelle colonne
        const nome=document.createElement("th");
        nome.textContent=json[i].nome;
        const console=document.createElement("th");
        console.textContent=json[i].console;
        const id=document.createElement("th");
        id.textContent=json[i].id;
        const codice=document.createElement("th");
        codice.textContent=json[i].codice;

        document.getElementById("magazzino").appendChild(r);
        document.getElementById("r"+i).appendChild(nome);
        document.getElementById("r"+i).appendChild(console);
        document.getElementById("r"+i).appendChild(id);
        document.getElementById("r"+i).appendChild(codice);
    }
   
    }


function onResponse(response){
    return response.json()
}

fetch("http://localhost/esame-app/public/AreaDipendenti/magazzino").then(onResponse).then(onJson);


function cerca() {
   
    var input, filter, table, tr, td, i, txtValue;
    input = document.getElementById("ricerca");
    filter = input.value;
    table = document.getElementById("magazzino");
    tr = table.getElementsByTagName("tr"); //seleziono tutte le righe
    
  
    for (i = 0; i < tr.length; i++) {
      th = tr[i].getElementsByTagName("th")[0]; //seleziono i dati della prima corrispondente a quella riga
      if (th) {
        txtValue = th.textContent;
        if (txtValue.indexOf(filter) > -1) { // se trova una corrispondenza allora lo mostriamo
          tr[i].style.display = "";
        } else {
          tr[i].style.display = "none";
        }
      }
    }
  }


  //  MENU DIPENDENTI

  function chiudiMenu(){
    const m=document.getElementById("MENU");
    m.classList.add('hidden');
  }

  function mostraMenu(event){
      const Menu=document.getElementById("MENU");
      Menu.classList.remove('hidden');
      Menu.addEventListener('click',chiudiMenu);
  }


  const menu=document.getElementById('menu1');
  menu.addEventListener('click',mostraMenu);


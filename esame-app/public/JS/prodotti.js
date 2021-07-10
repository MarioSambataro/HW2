function onJson(json){ 

    const lista=document.getElementById('prodCost');
    for (let i = 0; i < json.length; i++){
        const c=document.createElement("p");
        c.textContent=json[i].ncopia;
        
        lista.appendChild(c);
    }
   
    }

function onResponse(response){
    return response.json()
}

fetch("http://localhost/esame-app/public/prodotti/prodCostosi").then(onResponse).then(onJson);
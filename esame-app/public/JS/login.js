function check(event){
    const formData=new FormData(document.getElementById('iscrizione'));
    const username= formData.get('username');
    const pass=formData.get('password')

    if(username.length==0|| pass.length==0){
        console.log('riempi tutti i campi');
        event.preventDefault();
    }
}


const form = document.getElementById('login');
form.addEventListener("submit",check);
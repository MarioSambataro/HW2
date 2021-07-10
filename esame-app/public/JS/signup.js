
function check(event){
    const formData=new FormData(document.getElementById('iscrizione'));
    const username= formData.get('username');
    const cf=formData.get('cf');
    const pass=formData.get('password')
    const confirm=formData.get('confirm_password');

    if(username.length==0|| cf.length==0|| pass.length==0|| confirm.length==0){
        console.log('riempi tutti i campi');
        event.preventDefault();
    }
}


const form = document.getElementById('iscrizione');
form.addEventListener("submit",check);
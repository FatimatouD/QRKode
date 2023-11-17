

//document.addEventListener('DOMContentLoaded', function(){

document.getElementById('myForm').addEventListener('submit', function(event){
    event.preventDefault();
});

function submitform(){
    console.log('test');
    // Data to be sent in the POST request
    const data = {
    email: document.getElementById('email').value,
    password: document.getElementById('password').value,
};
fetch('api_php/login.php',{
    method: 'POST',
    headers: {
        'content-Type': 'application/json'
    },
    body: JSON.stringify(data)
})
.then(Response => Response.json())
.then(result =>{
    console.log("result",result)
    // var message = result.message;
    // document.getElementById('response').innerText = 'Connecter avec success';
if(result.data){
    window.location.href ="./index.html";
}
})
.catch(error => console.error('error',error));
}


// Add an event listener to the form for the submit event
document.getElementById('myForm').addEventListener('submit', function(event) {
    event.preventDefault(); // Prevent the default form submission behavior
    
    //postForm(); // Call the postForm function to handle form submission
});

function postForm() {
    // Data to be sent in the POST request
    console.log('hey postform');
    const data = {
        nom: document.getElementById('firstname').value,
        prenom: document.getElementById('lastname').value,
        username: document.getElementById('username').value,
        password: document.getElementById('password').value,
        email: document.getElementById('email').value,
        phone: document.getElementById('phonenumber').value,
        emergencyphone1: document.getElementById('emergencynumber1').value,
        emergencyphone2: document.getElementById('emergencynumber2').value,
        birth: document.getElementById('birth').value,
        gender: document.getElementById('gender').value

    };

    fetch('api_php/signUp.php', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json',
        },
        body: JSON.stringify(data),
    })
        .then(response => response.json())
        .then(result => {
            // Access individual element
            var message = result.message;
            document.getElementById('response').innerText = `Message: ${message}`;
            // window.location.href = './index.html';
        })
        .catch(error => console.error('Error:', error));
}


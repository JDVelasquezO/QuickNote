var btnRegister = document.getElementById('register')

btnRegister.addEventListener('click', () => {
    
    var email = document.getElementById('email').value
    var password = document.getElementById('password').value

    firebase.auth().createUserWithEmailAndPassword(email, password)
    .then(()=>console.log('bien hecho'))
    .catch(function(error) {
        // Handle Errors here.
        var errorCode = error.code;
        var errorMessage = error.message;
        console.log(`Error ${errorCode}: ${errorMessage}`);
        
        // ...
      });
    
})

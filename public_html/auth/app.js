var btnRegister = document.getElementById('register')

btnRegister.addEventListener('click', () => {
    
    var email = document.getElementById('email').value
    var password = document.getElementById('password').value
    var info = document.getElementById('info')

    firebase.auth().createUserWithEmailAndPassword(email, password)
    .then(() => {

        info.innerHTML = `<br><br>Registrado exitosamente, comienza a chatear`
    })
    .catch(function(error) {
        // Handle Errors here.
        var errorCode = error.code;
        var errorMessage = error.message;
        console.log(`Error ${errorCode}: ${errorMessage}`);
        
        // ...
      });
    
})

var btnLogin = document.getElementById('login')
btnLogin.addEventListener('click', () => {

    var email2 = document.getElementById('email').value
    var password2 = document.getElementById('password').value

    firebase.auth().signInWithEmailAndPassword(email2, password2)
    .then(() => {
        console.log('lindo');
        
    })
    .catch(function(error) {
        // Handle Errors here.
        var errorCode = error.code;
        var errorMessage = error.message;
        // ...
      });
})

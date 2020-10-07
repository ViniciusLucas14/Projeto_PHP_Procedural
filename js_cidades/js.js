//VERIFICAÇÃO DE EMAIL 
function validarEmail(){
    var email = document.querySelector('#email');
    var error = document.querySelector('#error-email');
    
    if(!email.checkValidity()){
      error.innerHTML = "Email invalido";  
    }
     
  }
  
  function redefinirMsg(){
    var error = document.querySelector('#error-email');
    if (error.innerHTML == "Email invalido"){
      error.innerHTML = "";
    }
  }
//AMBOS OS EMAIL TEM QUE SER CORRESPONDENTE
  function confereEmail (input){ 
    if (input.value != document.getElementById('email').value) {
    input.setCustomValidity('Email não correspondente');
  } else {
    input.setCustomValidity('');
  }
} 

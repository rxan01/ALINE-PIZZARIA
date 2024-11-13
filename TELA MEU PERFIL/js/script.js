document.addEventListener("DOMContentLoaded", function () {
    const email = localStorage.getItem('email')
      $.post('./../TELA EDITAR/php/consultarUsuario.php', {
        email: email
    }, function(resp){
        console.log(resp);
        if(resp[0].status != 'error') {
          document.getElementById("username").innerText = resp[0].nome
          document.getElementById("email").innerText = resp[0].email
          document.getElementById("telefone").innerText = resp[0].telefone
        }else{
            alert("email ou senha invalid")
        }
    })
  });
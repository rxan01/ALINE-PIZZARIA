var btnEntrar = document.querySelector("#butLogar")
    btnEntrar.addEventListener("click", function login(event){
        event.preventDefault();
        var email = document.querySelector("#email").value;
        var senha = document.querySelector("#senha").value;

        $.post('./php/loginUsuario.php', {
            email: email,
            senha: senha
        }, function(resp){
            console.log(resp);
            if(resp[0].status != 'error') {
                localStorage.setItem('email', resp[0].email)
                localStorage.setItem('id', resp[0].id)
                if(resp[0].estatus == 'U'){
                    window.location.href = './../TELA PRINCIPAL/telaP.html'
                }else{
                    window.location.href = './../cart2/cart/painel/admin.php'
                }
            }
            else{
                alert("email ou senha invalido")
            }
        })
    })
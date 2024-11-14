var btnCadastrar = document.querySelector("#btnCadastrar")
btnCadastrar.addEventListener("click", function cadastrar(event){
        var nome = document.querySelector("#nome").value;
        var user = document.querySelector("#user").value;
        var password = document.querySelector("#password").value;
        var telefone = document.querySelector("#telefone").value;
            $.post('./php/cadastroUsuario.php', {
                nome: nome,
                user: user,
                password: password,
                telefone: telefone
            },
            function(resp){
                console.log(resp);
                if(resp[0].status != 'error') {
                    alert('opaaa')
                    window.Location.href='./telaLC.html'
                }
            })
    })
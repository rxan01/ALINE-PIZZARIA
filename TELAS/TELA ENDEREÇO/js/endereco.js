var btnEntrar = document.querySelector("#enviar")
    btnEntrar.addEventListener("click", function login(event){
        event.preventDefault();
        const rua = document.querySelector('#rua').value
        const numero = document.querySelector('#numero').value
        const complemento = document.querySelector('#complemento').value
        const bairro = document.querySelector('#bairro').value
        const cep = document.querySelector('#cep').value

        $.post('./php/endereco.php', {
            rua: rua,
            numero: numero,
            complemento: complemento,
            bairro: bairro,
            cep: cep
        }, function(resp){
            console.log(resp);
            if(resp[0].status != 'error') {
                localStorage.setItem('id', resp[0].id)
                window.location.href = './../TELA PAGAMENTO/telaPA.html'
            }else{
                alert("email ou senha invalido")
            }
        })
    })
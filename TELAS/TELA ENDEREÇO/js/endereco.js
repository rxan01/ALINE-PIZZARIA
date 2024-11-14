var btnEntrar = document.querySelector("#enviar")
    btnEntrar.addEventListener("click", function login(event){
        event.preventDefault();
        const rua = document.querySelector('#rua').value
        const numero = document.querySelector('#numero').value
        const complemento = document.querySelector('#complemento').value
        const bairro = document.querySelector('#bairro').value
        const cep = document.querySelector('#cep').value
        const id = localStorage.getItem('id')
        console.log(id)
        $.post('./php/endereco.php', {
            rua: rua,
            numero: numero,
            complemento: complemento,
            bairro: bairro,
            cep: cep,
            id: id
        }, function(resp){
            console.log(resp);
            if(resp[0].status != 'error') {
                localStorage.setItem('id', resp[0].id)
                localStorage.setItem('rua', resp[0].rua)
                localStorage.setItem('numero', resp[0].numero)
                localStorage.setItem('complemento', resp[0].complemento)
                localStorage.setItem('bairro', resp[0].bairro)
                localStorage.setItem('cep', resp[0].cep)
                window.location.href = './../TELA PAGAMENTO/telaPA.html'
            }else{
                alert("email ou senha invalido")
            }
        })
    })
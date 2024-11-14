const tabela = document.querySelector(".linha-produtos");

// Variáveis para armazenar o carrinho e o total
let carrinho = [];
let totalPreco = 0;

// Função para adicionar itens ao carrinho
function adicionarAoCarrinho(id, nome, preco, imagem) {
    const produto = { id, nome, preco, imagem };
    carrinho.push(produto);
    totalPreco += preco;
    atualizarCarrinho();
}

// Função para atualizar a visualização do carrinho
function atualizarCarrinho() {
    const cartCount = document.getElementById('cart-count');
    const cartItems = document.getElementById('carrinho-itens');
    const totalPrecoElement = document.getElementById('total-preco');
    const carrinhoVazio = document.getElementById('carrinho-vazio');
    const finalizarCompraBtn = document.getElementById('finalizar-compra');

    // Limpar itens
    cartItems.innerHTML = '';

    if (carrinho.length === 0) {
        carrinhoVazio.style.display = 'block';
        finalizarCompraBtn.style.display = 'none'; // Esconder o botão de finalizar compra se o carrinho estiver vazio
    } else {
        carrinhoVazio.style.display = 'none';
        finalizarCompraBtn.style.display = 'block'; // Mostrar o botão de finalizar compra

        carrinho.forEach(item => {
            const itemElement = document.createElement('div');
            itemElement.classList.add('item-carrinho');
            itemElement.innerHTML = `
                <img src="${item.imagem}" alt="${item.nome}" class="produtoMiniatura" />
                <p>${item.nome}</p>
                <h2>R$ ${item.preco}</h2>
                <button onclick="removerDoCarrinho(${item.id})">Remover</button>
            `;
            cartItems.appendChild(itemElement);
        });
    }

    cartCount.textContent = carrinho.length;
    totalPrecoElement.textContent = `R$ ${totalPreco.toFixed(2)}`;
}

// Função para remover item do carrinho
function removerDoCarrinho(id) {
    const index = carrinho.findIndex(item => item.id === id);
    if (index !== -1) {
        totalPreco -= carrinho[index].preco;
        carrinho.splice(index, 1);
        atualizarCarrinho();
    }
}

// Função para finalizar a compra
function finalizarCompra() {
    const id = localStorage.getItem('id')
    $.post('../cart/php/finalizarCompra.php', {
        produtos: carrinho,
        id: id,
        total: totalPreco
    }, function(resp){
        console.log(resp);
        if(resp.status != 'error') {
            localStorage.setItem('total', resp.total)
            localStorage.setItem('pedido_id', resp.pedido_id)
            window.location.href = './../../TELAS/TELA ENDEREÇO/telaE.html'
        }
    });
    
    
}

// Função para puxar os dados do produto e adicionar ao carrinho
function puxarDados() {
    const estatus = 'A';  // Pode ser qualquer condição que você deseje usar

    $.post('../cart/painel/php/puxarDados.php', { estatus: estatus }, function (resp) {
        console.log(resp);


        if (resp[0].status !== 'error') {
            tabela.innerHTML = "";

            resp.forEach(item => {
                const row = document.createElement('div'); 
                row.classList.add('corpoProduto'); 
                
                row.innerHTML = `
                    <div class="imgProduto">
                        <img src="uploads/${item.capa}" alt="${item.nome}" class="produtoMiniatura" />
                    </div>
                    <div class="titulo">
                        <p>${item.nome}</p>
                        <h2>R$ ${item.valor}</h2>
                        <button type="button" class="button" onclick="adicionarAoCarrinho(${item.id}, '${item.nome}', ${item.valor}, 'uploads/${item.capa}')">Adicionar ao Carrinho</button>
                    </div>
                `;

                tabela.appendChild(row);
            });
        } else {
            console.error('Erro ao carregar os dados: ', resp[0].message); 
        }
    });
}

puxarDados();

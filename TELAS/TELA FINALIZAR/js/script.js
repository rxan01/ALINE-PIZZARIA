const pedido_id = localStorage.getItem('pedido_id');
const tabela = document.querySelector('#addressForm');

if (!pedido_id) {
    alert('ID do pedido não encontrado!');
} else {
    function pedido() {
        $.post('./php/final.php', { pedido_id: pedido_id }, function(resp) {
            console.log(resp); // Exibe a resposta para depuração

            // Verifica se a resposta contém o status de sucesso
            if (resp[0] && resp[0].status !== 'erro') {
                // Limpa a tabela antes de adicionar os novos dados
                tabela.innerHTML = "";

                // Acessa os dados diretamente do primeiro item do array de resposta
                const pedido = resp[0];

                // Atualiza o HTML com os dados do pedido
                tabela.innerHTML = `
                    <div class="form-group">
                        <label for="text">Pedido nº</label>
                        <p class="pedido-id">${pedido.id}</p>
                    </div>
                    <div class="form-group">
                        <label for="status">Status</label>
                        <p class="pedido-status">${pedido.estatus}</p>
                    </div>
                    <div class="form-group">
                        <label for="total">Total</label>
                        <p class="pedido-total">R$ ${pedido.total}</p>
                    </div>
                    
                `;
            } else {
                // Caso haja erro
                alert('Erro ao buscar o pedido. Tente novamente mais tarde');
            }
        }).fail(function() {
            alert('Erro de comunicação com o servidor');
        });
    }

    pedido();
}

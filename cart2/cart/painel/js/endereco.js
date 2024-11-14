$(document).ready(function() {
    // Função para carregar os pedidos e preencher a tabela
    function carregarPedidos() {
        $.ajax({
            url: './php/puxarendereco.php',
            method: 'GET',
            dataType: 'json',
            success: function(pedidos) {
                const tabela = $('.tabela');
                tabela.empty();

                pedidos.forEach(pedido => {
                    tabela.append(`
                        <tr>
                            <td>${pedido.pedido_id}</td>
                            <td>${new Date(pedido.data_pedido).toLocaleDateString()}</td>
                            <td>${pedido.usuario_nome}</td>
                            <td>${pedido.usuario_telefone}</td>
                            <td>
                                <button class="btn btn-icon btn-primary ver-mais" 
                                        data-endereco="Rua: ${pedido.rua}, ${pedido.numero} - ${pedido.bairro}, CEP: ${pedido.cep}, ${pedido.complemento}">
                                    ver mais
                                </button>
                            </td>
                            <td><button type="button" class="btn btn-secondary">Enviar Pedido</button></td>
                            <td><button type="button" class="btn btn-icon btn-danger"><i class="fas fa-trash-alt"></i></button></td>
                        </tr>
                    `);
                });

                // Adiciona novamente o evento de clique após o preenchimento
                $('.ver-mais').on('click', function() {
                    const endereco = $(this).data('endereco');
                    $('#enderecoDetalhes').text(endereco);
                    $('#modalEndereco').fadeIn();
                });
            },
            error: function(error) {
                console.error("Erro ao carregar os pedidos:", error);
            }
        });
    }

    // Carregar pedidos ao carregar a página
    carregarPedidos();
});

// Função para fechar o modal
function fecharModal() {
    $('#modalEndereco').fadeOut();
}

<?php
include '../configuracao/conexao.php';
header('Content-Type: application/json');
session_start();

$response = ['status' => 'error']; // Inicializa a resposta padrão como erro

// Dados do pedido
$produtos = $_POST['produtos'];
$total = $_POST['total'];
$usuario_id = $_POST['id'];  
$status_pedido = 'Pendente';

try {
    // Inserção do pedido na tabela "pedidos"
    $stmt = $conn->prepare("INSERT INTO pedidos (usuario_id, total, estatus) VALUES (:usuario, :total, :estatus)");
    $stmt->bindValue(':usuario', $usuario_id);
    $stmt->bindValue(':total', $total);
    $stmt->bindValue(':estatus', $status_pedido);

    if ($stmt->execute()) {
        $pedido_id = $conn->lastInsertId();

        $stmt_item = $conn->prepare("INSERT INTO pedidos_itens (pedido_id, produto_id, quantidade, valor) VALUES (:pedido_id, :produto_id, '1', :valor)");

        foreach ($produtos as $item) {
            $stmt_item->bindValue(':pedido_id', $pedido_id);
            $stmt_item->bindValue(':produto_id', $item['id']);
            $stmt_item->bindValue(':valor', $total);
            $stmt_item->execute();
        }

        // Limpa o carrinho após a compra
        unset($_SESSION['carrinho']);

        // Resposta de sucesso
        $response['status'] = 'success';
        $response['total'] = $total;
        $response['pedido_id'] = $pedido_id;
    } else {
        $response['message'] = 'Falha ao inserir o pedido.';
    }
} catch (Exception $e) {
    // Captura exceções e retorna uma mensagem de erro
    $response['status'] = 'error';
    $response['message'] = 'Erro ao processar o pedido: ' . $e->getMessage();
}

// Envia a resposta JSON
echo json_encode($response);
exit;
?>

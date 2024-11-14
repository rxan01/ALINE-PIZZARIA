<?php
include '../../../configuracao/conexao.php';
header('Content-Type: application/json');
session_start();

// Verifique se 'pedido_id' foi enviado via POST
if (isset($_POST['pedido_id'])) {
    $pedido_id = $_POST['pedido_id'];

    // Busca os dados do pedido com base no ID
    $stmt = $conn->prepare("SELECT * FROM pedidos WHERE id = :pedido_id");
    $stmt->bindValue(':pedido_id', $pedido_id);
    $stmt->execute();

    if ($stmt->rowCount() > 0) {
        $pedido = $stmt->fetch(PDO::FETCH_ASSOC);
        $total = number_format($pedido['total'], 2, ',', '.'); // Formatar o valor para R$
        $status = $pedido['estatus']; // Status do pedido
        $pedido_id = $pedido['id']; // ID do pedido
        $json[] = array('status' => 'success',
                'id' => $pedido_id,
                'estatus' => $status,
                'total' => $total);
        echo json_encode($json, JSON_PRETTY_PRINT);
    } else {
        // Caso não encontre o pedido
        echo json_encode([
            [
                'status' => 'erro',
                'message' => 'Pedido não encontrado'
            ]
        ]);
    }
} else {
    // Caso o ID do pedido não tenha sido enviado
    echo json_encode([
        [
            'status' => 'erro',
            'message' => 'Pedido não especificado'
        ]
    ]);
}
?>

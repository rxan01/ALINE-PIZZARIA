<?php
include'../../configuracao/conexao.php';
header('Content-Type: application/json');


$sql = "
    SELECT 
        pedidos.id AS pedido_id,
        pedidos.data_pedido,
        pedidos.total,
        pedidos.estatus,
        usuarios.nome AS usuario_nome,
        usuarios.telefone AS usuario_telefone,
        endereco.rua,
        endereco.numero,
        endereco.complemento,
        endereco.bairro,
        endereco.cep
    FROM pedidos
    LEFT JOIN usuarios ON pedidos.usuario_id = usuarios.id
    LEFT JOIN endereco ON usuarios.id = endereco.id
";

$stmt = $conn->prepare($sql);
$stmt->execute();
$pedidos = $stmt->fetchAll(PDO::FETCH_ASSOC);

// Retornando os pedidos em formato JSON
echo json_encode($pedidos, JSON_PRETTY_PRINT);
?>

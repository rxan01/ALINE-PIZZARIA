<?php
include '../../configuracao/conexao.php';
header('Content-Type: application/json');

$id = $_POST['idDelete'];


$sql = $conn->prepare('DELETE FROM pedidos_itens WHERE produto_id = :id');
$sql->bindParam(':id', $id);
$sql->execute();

$sql = $conn->prepare('DELETE FROM produtos WHERE id = :id');
$sql->bindParam(':id', $id);
$sql->execute();

if ($sql->execute()) {
    echo json_encode(['status' => 'success']);
} else {
    echo json_encode(['status' => 'error', 'message' => 'Erro ao deletar o item.']);
}
?>

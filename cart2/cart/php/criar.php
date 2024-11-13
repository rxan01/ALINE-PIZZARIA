<?php
include '../configuracao/conexao.php';
header('Content-Type: application/json');


$target_dir = "../uploads/";

$mediaName = basename($_FILES["media"]["name"]);
$target_file = $target_dir . $mediaName;

if (move_uploaded_file($_FILES["media"]["tmp_name"], $target_file)) {
    $valor = $_POST['valor'];
    $nome = $_POST['nome'];
    $estatus = 'A';
    $sql = $conn->prepare('INSERT INTO produtos (valor, capa, nome, estatus) VALUES (:valor, :capa, :nome, :estatus)');
    $sql->bindValue(':valor', $valor);
    $sql->bindValue(':capa', $mediaName);
    $sql->bindValue(':nome', $nome);
    $sql->bindValue(':estatus', $estatus);
    
    
    if ($sql->execute()) {
        echo json_encode(['status' => 'success']);
    } else {
        echo json_encode(['status' => 'error', 'message' => 'Erro ao inserir o problema no banco de dados.']);
    }
} else {
    echo json_encode(['status' => 'error', 'message' => 'Erro ao enviar o arquivo.']);
}
exit; 
?>

<?php

include '../../../configuracao/conexao.php';
header('Content-Type: application/json');

$rua = $_POST['rua'];
$numero = $_POST['numero'];
$complemento = $_POST['complemento'];
$bairro = $_POST['bairro'];
$cep = $_POST['cep'];
$id = $_POST['id'];

try {
    $sql = $conn->prepare('INSERT INTO endereco (usuario_id, rua, numero, complemento, bairro, cep) VALUES (:usuario_id, :rua, :numero, :complemento, :bairro, :cep)');
    $sql->bindValue(':rua', $rua);
    $sql->bindValue(':numero', $numero);
    $sql->bindValue(':complemento', $complemento);
    $sql->bindValue(':bairro', $bairro);
    $sql->bindValue(':cep', $cep);
    $sql->bindValue(':usuario_id', $id);
    $sql->execute();

    if ($sql->rowCount() > 0) {
        $json = [
            [
                'rua' => $rua,
                'numero' => $numero,
                'complemento' => $complemento,
                'bairro' => $bairro,
                'cep' => $cep,
                'id' => $conn->lastInsertId()
            ]
        ];
        echo json_encode($json, JSON_PRETTY_PRINT);
    } else {
        echo json_encode([['status' => 'erro']], JSON_PRETTY_PRINT);
    }
} catch (PDOException $e) {
    echo json_encode([['status' => 'erro', 'mensagem' => $e->getMessage()]], JSON_PRETTY_PRINT);
}

?>

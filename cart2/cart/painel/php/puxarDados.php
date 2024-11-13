<?php 

include'../../configuracao/conexao.php';
header('Content-Type: application/json');

$estatus = $_POST['estatus'];

$sql = $conn->prepare('SELECT * FROM produtos WHERE estatus = :estatus');
$sql->bindvalue(':estatus', $estatus);
$sql->execute();

if($sql->rowCount() > 0){
    while($dado = $sql->fetch()){
        $estatus = $dado['estatus'];
        $data = $dado['data_criacao'];
        $nome = $dado['nome'];
        $valor = $dado['valor'];
        $capa = $dado['capa'];
        $id = $dado['id'];
        $json[] = array('estatus'=> $estatus,'data_criacao'=> $data,'nome'=> $nome, 'valor'=> $valor,'capa'=> $capa, 'id'=> $id);
    }
    echo json_encode($json, JSON_PRETTY_PRINT);
}else{
    echo '[{"status": "error"}]';
}
<?php
include'../../configuracao/conexao.php';
header('Content-Type: application/json');

$nome = $_POST['nome'];
$email = $_POST['user'];
$senha = $_POST['password'];
$telefone = $_POST['telefone'];
$estatus = 'U';
$insert = $conn->prepare('INSERT INTO usuarios (nome, email, senha, telefone, estatus) VALUE (:nome, :email, :senha, :telefone, :estatus)');
$insert->bindvalue(':nome', $nome);
$insert->bindvalue(':email', $email);
$insert->bindvalue(':estatus', $estatus);
$insert->bindvalue(':senha', $senha);
$insert->bindvalue(':telefone', $telefone);
$insert->execute();

if($insert){
    $get = $conn->prepare('Select * from usuarios WHERE email = :email');
    $get->bindvalue(':email', $email);
    $get->execute();
    if($get->rowCount() > 0){
        while($dado = $get->fetch()){
            $nome = $dado['nome'];
            $estatus = $dado['estatus'];
            $email = $dado['email'];
            $senha = $dado['senha'];
            $telefone = $dado['telefone'];
            $json[]= array('nome'=> $nome, 'email'=> $email, 'senha'=> $senha, 'telefone'=> $telefone, 'estatus'=> $estatus);
        }
        echo json_encode ($json, JSON_PRETTY_PRINT);
    }else{
        echo '[{"status": "error"}]';
    }
}else{
    echo '[{"status": "error"}]';
}
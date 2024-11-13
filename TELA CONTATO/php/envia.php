<?php

$nome = addslashes($_POST['nome']);
$email = addcslashes($_POST['email']);
$text = addcslashes($_POST['text']);

$para = "";
$assunto = "Coleta de dados - alines pizzaria";

$corpo = "Nome: ".$nome."\n"."E-mail: ".$email."\n"."Motivo: ".$text;

$cabeca = "From: "."\n"."Reply-to: ".$email."\n"."X=Mailer:PHP/".phpversion();

if(mail($para,$assunto,$corpo,$cabeca)){
    echo("E-mail enviado com suceeso");
}else{
    echo("Houve um erro ao enviar o email!");
}

?>
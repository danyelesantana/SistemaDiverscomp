<?php
require_once("../config/conecta.php");
require_once("../config/validacoes.php");

$msg_atualizacao;

if(empty($_POST['nome'])){
    $msg_atualizacao = "Preencha o campo nome";
}else if(empty($_POST['datanasc'])){
    $msg_atualizacao = "Preencha a data de nascimento";
}else if(empty($_POST['email'])){
    $msg_atualizacao = "Preencha o email";

}else if(verificaEmail($_POST['email'], $_POST['idpessoa'])){
    $msg_atualizacao = "O e-mail informado já está vinculado a outro usuário. Informe um email diferente";
}else{

    conecta();

    $nome = $_POST['nome'];
    $datanascimento = $_POST['datanasc'];
    $email = $_POST['email'];
    $idpessoa = $_POST['idpessoa'];
    
    $sql = "UPDATE pessoa SET nome = ?,
    datanasc = ?, email = ? WHERE
    idpessoa = ?";

    $stmt = $mysqli->prepare($sql);

    if(!$stmt){
        die("Não foi possível atualizar");
    }

    $stmt->bind_param("sssi",$nome, $datanascimento,$email,$idpessoa);
    $stmt->execute();

    if($stmt->affected_rows == 1){
        $msg_atualizacao = "Dados atualizados com sucesso!";
    }else{
        $msg_atualizacao = "Nenhuma atualização realizada";
    }

    $mysqli->close();

}

header("location: ../pages/exibirPessoas.php?msg_atualizacao=$msg_atualizacao");





?>


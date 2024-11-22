<?php

require_once("../config/conecta.php");

$msgExclusao;

$idPessoa = $_GET['idpessoa'];

if(!is_numeric($idPessoa)){
    die("Não é um número!");
}

conecta();

$sql = "DELETE FROM pessoa WHERE idpessoa = ?;";

$stmt = $mysqli->prepare($sql);

if(!$stmt){
    die("Erro ao excluir");
}

$stmt->bind_param("i",$idPessoa);

$stmt->execute();

if($stmt->affected_rows > 0){
    $msgExclusao = "Pessoa excluída com sucesso!";
}else{
    $msgExclusao = "Não foi possível excluir!";
}

header("location: ../pages/exibirPessoas.php?msgExclusao={$msgExclusao}");

?>
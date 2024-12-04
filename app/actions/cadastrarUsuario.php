<?php
require_once("../config/conecta.php");
require_once("../config/validacoes.php");

define("ADMIN",1);
define("PROFESSOR", 2);
define("ESTUDANTE",3);

$msg = "";

if(empty($_POST['nome'])){
    $msg = "Preencha o campo nome";
}elseif(empty($_POST['email'])){
    $msg = "Preencha a email";
}elseif(empty($_POST['senha'])){
    $msg = "Preencha o senha";
}elseif(verificaEmail($_POST['email'], NULL)){
    $msg = "Email já cadastrado. Por favor, informe um email diferente";

}else{

    $nome = $_POST['nome'];
    $email = $_POST['email'];
    $tipo_usuario = $_POST['tipo_usuario'];

    if(!$tipo_usuario){
        $tipo_usuario = 3;
    }
    
    $senhaCrip = password_hash($_POST['senha'],PASSWORD_DEFAULT);

    conecta();

    $sql = "INSERT INTO usuario(nome,email,senha,tipo_usuario)VALUES(?,?,?,?);";

    $stmt = $mysqli->prepare($sql);

    if(!$stmt){
        die("Erro ao inserir");
    }

    $stmt->bind_param("sssi",$nome,$email,$senhaCrip, $tipo_usuario);

    $stmt->execute();

    if($stmt->affected_rows > 0){
        $msg = "Cadastro Realizado com Sucesso.";
    }else{
        $msg = "Não foi possível cadastrar.";
    }

    desconecta();
}

header("Location: ../pages/home.php?msgRegister={$msg}");

?>
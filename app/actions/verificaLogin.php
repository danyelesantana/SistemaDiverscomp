<?php
include_once("../config/conecta.php");

if(empty($_POST['email']) || empty($_POST['senha'])){
    header("location: ../pages/home.php?msgLogin=Preencha todos os campos!");
}else{
    $login = $_POST['email'];
    $senha = $_POST['senha'];

    conecta(); //Abrindo a conexão com o bd

    $sql = "SELECT * FROM usuario WHERE email = ?";
    $stmt = $mysqli->prepare($sql);
    $stmt->bind_param("s", $login);
    $stmt->execute();

    $result = $stmt->get_result();

    if($result->num_rows == 1){

        $usuario = $result->fetch_object();

        if(password_verify($senha, $usuario->senha)){
         
            session_start();

            $_SESSION['tipo_usuario'] = $usuario->tipo_usuario;
            $_SESSION['nome_usuario'] = $usuario->nome;
            $_SESSION['logado'] = true;
            $_SESSION['idusuario'] = $usuario->id;

            if($usuario->tipo_usuario == 2){
            header("location: ../pages/painel_professor.php");}
            else if($usuario->tipo_usuario == 1){ 
                header("location: ../pages/adm/painel_adm.php");
            }  
            
        }else{
            header("location: ../pages/home.php?msgLogin=Usuário ou senha incorretos!");
        }

    }else{
        header("location: ../pages/home.php?msgLogin=Usuário ou senha incorretos!");
    }



}







?>
<?php

require_once("conecta.php");

function verificaEmail($email, $idusuario){

    conecta();

    global $mysqli;

    $sql = "SELECT id FROM usuario WHERE email = ?;";

    $stmt = $mysqli->prepare($sql);
    
    $stmt->bind_param("s",$email);
    $stmt->execute();
    $retorno = $stmt->get_result();
    $usuario = $retorno->fetch_object();
    
    desconecta();

    if($retorno->num_rows == 1){
        if($usuario == null){
            return true;
        }
        elseif($usuario->id != $idusuario){
            return true;
        }else{
            return false;
        }

    }else{
        return false;
    }

}


?>
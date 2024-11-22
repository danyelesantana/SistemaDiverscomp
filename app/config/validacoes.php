<?php

require_once("conecta.php");

function verificaEmail($email, $idprofessor){

    conecta();

    global $mysqli;

    $sql = "SELECT id FROM usuario WHERE email = ?;";

    $stmt = $mysqli->prepare($sql);
    
    $stmt->bind_param("s",$email);
    $stmt->execute();
    $retorno = $stmt->get_result();
    $professor = $retorno->fetch_object();
    
    desconecta();

    if($retorno->num_rows == 1){
        if($idprofessor == null){
            return true;
        }
        elseif($professor->id != $idprofessor){
            return true;
        }else{
            return false;
        }

    }else{
        return false;
    }

}


?>
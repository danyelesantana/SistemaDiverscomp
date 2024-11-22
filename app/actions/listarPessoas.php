<?php

require_once("../config/conecta.php");

conecta();


$sql = "SELECT idpessoa, nome, email FROM pessoa;";

$result = $mysqli->query($sql);

if($result->num_rows > 0){

   $listaPessoas = $result->fetch_all(MYSQLI_ASSOC);
}

desconecta();

?>
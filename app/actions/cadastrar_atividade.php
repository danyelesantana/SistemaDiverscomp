<?php
session_start();
require_once("../config/conecta.php");

$professor = $_SESSION['idprofessor'];

$msg = "";

$titulo = $_POST['titulo'];
$objetivo = $_POST['objetivo'];
$publico_alvo = $_POST['publico_alvo'];
$metodologia = $_POST['metodologia'];
$recursos = $_POST['recursos'];
$procedimentos = $_POST['procedimentos'];
$disciplina = $_POST['disciplina'];
$cat_diversidade = $_POST['categoria_diversidade'];

if (isset($_FILES['anexo']) && $_FILES['anexo']['error'] === UPLOAD_ERR_OK) {
    $anexo = $_FILES['anexo']['name'];
    $upload_dir = '../uploads/'; 
    move_uploaded_file($_FILES['anexo']['tmp_name'], $upload_dir . $anexo);
} else {
    $anexo = null; 
}

conecta();

$sql = "INSERT INTO plano_atividade(titulo, objetivo, publico_alvo, metodologia, recursos, procedimentos, anexo, disciplina, categoria_diversidade, professor)VALUES(?,?,?,?,?,?,?,?,?,?);";

    $stmt = $mysqli->prepare($sql);

    if(!$stmt){
        die("Erro ao inserir.Problema no acesso ao banco de dados");
    }

    $stmt->bind_param("sssssssiii",$titulo,$objetivo,$publico_alvo, $metodologia, $recursos, $procedimentos, $anexo, $disciplina, $cat_diversidade, $professor);

    $stmt->execute();

    if($stmt->affected_rows > 0){
        $msg = "Cadastro Realizado com Sucesso.";
    }else{
        $msg = "Não foi possível cadastrar.";
    }

desconecta();

header("Location: ../pages/cadastrar_plano_atividade_form.php?msg={$msg}");












?>
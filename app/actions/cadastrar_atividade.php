<?php
session_start();
require_once("../config/conecta.php");

$professor = $_SESSION['idusuario'];

$msg = "";

$titulo = htmlspecialchars($_POST['titulo'], ENT_QUOTES, 'UTF-8');
$objetivo = htmlspecialchars($_POST['objetivo'], ENT_QUOTES, 'UTF-8');
$publico_alvo = htmlspecialchars($_POST['publico_alvo'], ENT_QUOTES, 'UTF-8');
$metodologia = htmlspecialchars($_POST['metodologia'], ENT_QUOTES, 'UTF-8');
$recursos = htmlspecialchars($_POST['recursos'], ENT_QUOTES, 'UTF-8');
$procedimentos = htmlspecialchars($_POST['procedimentos'], ENT_QUOTES, 'UTF-8');
$disciplina = $_POST['disciplina'];
$cat_diversidade = $_POST['categoria_diversidade'];
$status = 0;

if (isset($_FILES['anexo']) && $_FILES['anexo']['error'] === UPLOAD_ERR_OK) {
    $anexo = $_FILES['anexo']['name'];
    $upload_dir = '../uploads/'; 
    move_uploaded_file($_FILES['anexo']['tmp_name'], $upload_dir . $anexo);
} else {
    $anexo = null; 
}

conecta();

$sql = "INSERT INTO plano_atividade(titulo, objetivo, publico_alvo, metodologia, recursos, procedimentos, anexo, disciplina, categoria_diversidade, professor, status)VALUES(?,?,?,?,?,?,?,?,?,?,?);";

    $stmt = $mysqli->prepare($sql);

    if(!$stmt){
        die("Erro ao inserir.Problema no acesso ao banco de dados");
    }

    $stmt->bind_param("sssssssiiii",$titulo,$objetivo,$publico_alvo, $metodologia, $recursos, $procedimentos, $anexo, $disciplina, $cat_diversidade, $professor, $status);

    $stmt->execute();

    if($stmt->affected_rows > 0){
        $msg = "Cadastro Realizado com Sucesso.";
    }else{
        $msg = "Não foi possível cadastrar.";
    }

desconecta();

header("Location: ../pages/cadastrar_plano_atividade_form.php?msg={$msg}");












?>
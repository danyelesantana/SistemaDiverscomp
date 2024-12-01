<?php
session_start();
require_once("../config/conecta.php");

if (!isset($_SESSION['idusuario'])) {
    header("Location: ../pages/login.php");
    exit();
}

$professor = $_SESSION['idusuario'];
$msg = "";


$titulo = htmlspecialchars($_POST['titulo'], ENT_QUOTES, 'UTF-8');
$objetivo = htmlspecialchars($_POST['objetivo'], ENT_QUOTES, 'UTF-8');
$publico_alvo = htmlspecialchars($_POST['publico_alvo'], ENT_QUOTES, 'UTF-8');
$metodologia =htmlspecialchars($_POST['metodologia'], ENT_QUOTES, 'UTF-8'); 
$recursos = htmlspecialchars($_POST['recursos'], ENT_QUOTES, 'UTF-8');
$procedimentos = $_POST['procedimentos'];
$disciplina = intval($_POST['disciplina']);
$categoria_diversidade = intval($_POST['categoria_diversidade']);
$status = 0;


if (isset($_FILES['anexo']) && $_FILES['anexo']['error'] === UPLOAD_ERR_OK) {
    $anexo = $_FILES['anexo']['name'];
    $upload_dir = '../uploads/'; 
    move_uploaded_file($_FILES['anexo']['tmp_name'], $upload_dir . $anexo);
} else {
    $anexo = null;
}


conecta();


$sql = "INSERT INTO plano_atividade (titulo, objetivo, publico_alvo, metodologia, recursos, procedimentos, anexo, disciplina, categoria_diversidade, professor, status) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";

$stmt = $mysqli->prepare($sql);

if (!$stmt) {
    die("Erro ao preparar a consulta: " . $mysqli->error);
}

$stmt->bind_param("sssssssiiii",
    $titulo,
    $objetivo,
    $publico_alvo,
    $metodologia, 
    $recursos,
    $procedimentos,
    $anexo,
    $disciplina,
    $categoria_diversidade,
    $professor,
    $status
);


$stmt->execute();

if ($stmt->affected_rows > 0) {
    $msg = "Atividade cadastrada com sucesso.";
} else {
    $msg = "Não foi possível cadastrar a atividade.";
}

desconecta();


header("Location: ../pages/cadastrarPlano.php?msg=" . urlencode($msg));
exit();
?>

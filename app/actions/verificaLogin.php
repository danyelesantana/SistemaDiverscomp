<?php
include_once("../config/conecta.php");

$login = trim($_POST['email']); 
$senha = $_POST['senha'];

if (empty($login) || empty($senha)) {
    header("Location: ../pages/home.php?msgLogin=Preencha todos os campos!");
    exit;
}

conecta(); 

$sql = "SELECT * FROM usuario WHERE email = ?";
$stmt = $mysqli->prepare($sql);

if (!$stmt) {
    die("Não foi possível processar a solicitação. Tente novamente em instantes.: " . $mysqli->error);
}

$stmt->bind_param("s", $login);
$stmt->execute();

$result = $stmt->get_result();

if ($result->num_rows == 1) {
    $usuario = $result->fetch_object();

    if (password_verify($senha, $usuario->senha)) {
        session_start();

        // Gera um novo ID de sessão para evitar hijacking
        session_regenerate_id(true);

        $_SESSION['tipo_usuario'] = $usuario->tipo_usuario;
        $_SESSION['nome_usuario'] = $usuario->nome;
        $_SESSION['logado'] = true;
        $_SESSION['idusuario'] = $usuario->id;

        if ($usuario->tipo_usuario == 2) {
            $redir = "../pages/painel_professor.php";
        } elseif ($usuario->tipo_usuario == 1) {
            $redir = "../pages/adm/painel_adm.php";
        } else {
            $redir = "../pages/home.php?msgLogin=Tipo de usuário inválido.";
        }

        header("Location: $redir");
        exit;

    } else {
      
        header("Location: ../pages/home.php?msgLogin=Usuário ou senha incorretos!");
        exit;
    }

} else {
    // Usuário não encontrado
    header("Location: ../pages/home.php?msgLogin=Usuário ou senha incorretos!");
    exit;
}
?>

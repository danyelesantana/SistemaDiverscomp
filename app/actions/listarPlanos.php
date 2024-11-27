<?php
require_once("../config/conecta.php");

conecta();

$disciplina = isset($_GET['disciplina']) ? $_GET['disciplina'] : null;

$categoria = isset($_GET['categoria_diversidade']) ? $_GET['categoria_diversidade'] : null;

$sql = "SELECT 
            p.id as idplano, 
            p.titulo as titulo_plano, 
            d.nome as nome_disciplina,
            c.nome as cat_diversidade, 
            p.publico_alvo as publico 
        FROM plano_atividade as p 
        INNER JOIN disciplina as d ON p.disciplina = d.id 
        INNER JOIN categoria_diversidade as c ON c.id = p.categoria_diversidade";

$condicoes = [];
$parametros = [];
$tipos = "";

if (!empty($disciplina)) {
    $condicoes[] = "d.id = ?";
    $parametros[] = $disciplina;
    $tipos .= "i";
}

if (!empty($categoria)) {
    $condicoes[] = "c.id = ?";
    $parametros[] = $categoria;
    $tipos .= "i";
}

if (count($condicoes) > 0) {
    $sql .= " WHERE " . implode(" AND ", $condicoes);
}

$stmt = $mysqli->prepare($sql);

if (!empty($parametros)) {
    $stmt->bind_param($tipos, ...$parametros);
}

$stmt->execute();

$result = $stmt->get_result();
$lista_planos = $result->fetch_all(MYSQLI_ASSOC);

desconecta();


?>
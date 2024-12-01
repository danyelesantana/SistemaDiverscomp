<?php
require_once("../config/conecta.php");

conecta();

$idPlano = $_GET['idplano'];

$sql = "SELECT p.id, 
            p.titulo as titulo_plano, 
            d.nome as nome_disciplina,
            c.nome as cat_diversidade, 
            p.publico_alvo as publico, 
            p.objetivo as objetivo,
            p.metodologia as metodologia,
            p.recursos as recursos,
            p.procedimentos as procedimentos,
            p.anexo as anexos
        from plano_atividade as p 
        inner join disciplina as d on p.disciplina = d.id 
        inner join categoria_diversidade as c on c.id = p.categoria_diversidade 
        where p.id = ?";

$stmt = $mysqli->prepare($sql);
$stmt->bind_param('i', $idPlano);
$stmt->execute();

$result = $stmt->get_result();
$planoAtividade = $result->fetch_assoc();

desconecta();

?>
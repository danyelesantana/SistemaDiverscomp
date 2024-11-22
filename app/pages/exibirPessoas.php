<?php
if(isset($_GET['msgExclusao'])){
    echo $_GET['msgExclusao'];
}

if(isset($_GET['msg_atualizacao'])){
    echo $_GET['msg_atualizacao'];
}
require_once("cabecalho.php");
require_once("../actions/listarPessoas.php");
?>
<main>

<section id="section-2">

<h1>Lista de pessoas</h1>

<?php
   if(!isset($listaPessoas)){
        echo "Nenhum registro encontrado.";
    }else{

?>

<table border="1px">
    <th>ID</th>
    <th>Nome</th>
    <th>Email</th>
    <th>Editar</th>
    <th>Excluir</th>

    <?php

        foreach($listaPessoas as $pessoa){

            echo "<tr>";
            echo "<td>{$pessoa['idpessoa']}</td>";
            echo "<td>{$pessoa['nome']}</td>";
            echo "<td>{$pessoa['email']}</td>";
            echo "<td><a href='editarPessoaForm.php?idpessoa={$pessoa['idpessoa']}'>Editar</a></td>";
            echo "<td><a href='../actions/excluirPessoa.php?idpessoa={$pessoa['idpessoa']}'>Excluir</a></td>";

        }

    }
    ?>
</table>

</section>
</main>
</body>
</html>
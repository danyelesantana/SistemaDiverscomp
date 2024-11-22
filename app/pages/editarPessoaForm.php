<?php
session_start();

if(!isset($_SESSION['logado'])){
    header("location: login.php");
}

require_once("cabecalho.php");

//criar rotina de busca da pessoa no banco de dados
//para preenchimento do formulário

include("../config/conecta.php");

conecta();

$idpessoa = $_GET['idpessoa'];

$sql = "SELECT idpessoa, nome, datanasc, email FROM pessoa WHERE idpessoa = ?";

$stmt = $mysqli->prepare($sql);
$stmt->bind_param("i", $idpessoa);
$stmt->execute();

$result = $stmt->get_result();

if($result->num_rows == 1){
    
    $pessoa = $result->fetch_object();
}else{
    header("location: exibirPessoas.php?msg_atualizacao=Não foi possível atualizar");
}

//criar rotina de busca da pessoa no banco de dados para preenchimento do formulário
?>

<main>
<section id="section-2">

<fieldset>

<legend>Editar dados</legend>

    <form action="../actions/atualizarPessoa.php" method="post">

    <div class="input-item">
        <label for="nome">Nome</label> <br>
        <input type="text" name="nome" id="nome" value ="<?php echo $pessoa->nome;?>"
        >
    </div>
    <div class="input-item">
        <label for="datanasc">Data de nascimento</label> <br>
        <input type="date" name="datanasc" id="datanasc" value = "<?php echo $pessoa->datanasc;?>">
    </div>

    <div class="input-item">
        <label for="email">Email</label> <br>
        <input type="email" name="email" id="email" value = "<?php echo $pessoa->email; ?>">
    </div>
    <input type="hidden" name ="idpessoa" value = "<?php echo $pessoa->idpessoa;?>">

    <div class="input-item">
        <button type="submit">Salvar</button>
        <button type="reset">Limpar</button>
    </div>

</form>

</fieldset>

</section>
</main>

<footer></footer>
</body>
</html>
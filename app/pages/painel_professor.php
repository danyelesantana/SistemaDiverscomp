<?php session_start();
$nome_usuario = $_SESSION['nome_usuario'];
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Diversomp</title>
    <link rel="stylesheet" href="../../public/css/style.css">
</head>
<body>

<div class="container">
    <header>
        <div class="items-header">
            <div></div>
            <h1>DIVERSC<img class="img-logo" src="../../public/img/logo.png" alt="">MP</h1>
            <p>Repositório de Atividades de Educação em Computação</p>
        </div>

        <nav>
            <ul>
                <li><a href="home.php">Início</a></li>
                <li><a href="#">Meu Painel</a></li>
                <li><a href="../actions/logout.php">Sair</a></li>
            </ul>
        </nav>
    </header>
    <div class="divisor"></div>
   

    <main>
        <section class="title-section">
            <h2>Area de <?php echo $nome_usuario?></h2>
        </section>

        <section id="products" class="products-card">
            <div class="products-item">
                <div class="products-img"></div>
                <div class="products-description"><a href="painel_atividades_prof.php">Minhas atividades</a></div>
                
            </div>
            <div class="products-item">
                <div class="products-img"></div>
                <div class="products-description"> <a href="cadastrar_plano_atividade_form.php">Cadastrar atividade</a></div>
            </div>
            
        </section>

       
    </main>

    <footer>
    </footer>
</div>
</div>

</body>
</html>


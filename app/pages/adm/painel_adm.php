<?php session_start();
$nome_usuario = $_SESSION['nome_usuario'];
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Diversomp</title>
    <link rel="stylesheet" href="../../../public/css/style.css">

    <style>
        .section-manager{
            width: 70%;
            height: auto;
            border: 1px solid grey;
            box-shadow: 2px 2px 2px grey;
            margin-top: 20px;
            margin-bottom: 20px;
        }

        summary{
            padding: 5px;
            width: 98%;
            border-bottom: 1px solid grey;
        }

        .section-manager > #manager-details > ul {
            display: flex;
            flex-direction: column;
            margin-left: 30px;
            margin-bottom: 5px;
        }

       
    </style> 
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
                <li><a href="../home.php">Início</a></li>
                <li><a href="#">Meu Painel</a></li>
                <li><a href="../../actions/logout.php">Sair</a></li>
            </ul>
        </nav>
    </header>
    <div class="divisor"></div>
   

    <main>
        <section class="title-section">
            <h2>Area do(a) administrador. <br> Olá, <?php echo $nome_usuario?></h2>
        </section>

        <section class="section-manager">
            <details id="manager-details">
                <summary>Gerenciar Disciplinas</summary>

                <ul>
                    <li>Cadastrar Disciplina</li>
                    <li>Editar/Excluir</li>
                </ul>
            </details>


        </section>

        <section class="section-manager">
        <details>
                <summary>Gerenciar Publicações</summary>
            </details>
            
        </section>

        <section class="section-manager">

        <details>
                <summary>Avaliar planos de atividade</summary>
            </details>
            
        </section>

       
       
    </main>

    <footer>
    </footer>
</div>
</div>

</body>
</html>


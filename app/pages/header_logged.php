

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DiversComp</title>
    <link rel="stylesheet" href="../../public/css/style.css">
</head>
<body>

<div class="container">
    <header>
        <div class="items-header">
            <div></div>
            <h1><img class="img-logo" src="../../public/img/logo.png" alt="">DIVERSCOMP</h1>
           
        </div>

        <nav>
            <ul>
                <?php    
                    if ($_SESSION['tipo_usuario'] === 2 ) { ?>
                         <li><a href="painel_professor.php">Meu Painel</a></li>
   
                        <?php }else if ($_SESSION['tipo_usuario'] === 1 ) { ?>
                        <li><a href="adm/painel_adm.php">Meu Painel</a></li>

                       <?php }else{ ?>
                        <li><a href="painel_estudante.php">Meu Painel</a></li>
                       <?php } ?>
               
                <li><a href="pesquisarAtividades.php">Pesquisar Plano</a></li>
                <li><a href="../actions/logout.php">Sair</a></li>
            </ul>
        </nav>
</header>
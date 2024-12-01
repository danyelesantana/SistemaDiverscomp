<?php
include_once("../actions/buscarPlano.php");
?>
<!DOCTYPE html> 
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Diversomp</title>
    <link rel="stylesheet" href="../../public/css/style.css">
    <link rel="stylesheet" href="../../public/css/style_search.css">
</head>
<body>

<div class="container">
    <header>
        <div class="items-header">
            <div></div>
            <h1><img class="img-logo" src="../../public/img/logo.png" alt="">DIVERSCOMP</h1>
            <p>Repositório de Atividades de Educação em Computação</p>
        </div>

        <nav>
            <ul>
                 <li><a href="home.php">Início</a></li>
              
            </ul>
        </nav>
    </header>

<div class="divisor"></div>
   
   <main>
       <section class="title-section">
           <h2>Plano de Atividade</h2>
     </section>

    <section class="show-plain">
        <section class="show-plain-items">
            <p class="show-plain-title">Título</p>
           
            <p><?php echo $planoAtividade['titulo_plano'] ?></p>
        </section>

       <section class="show-plain-items">
        <p class="show-plain-title">Público Alvo</p>
      
        <p><?php echo $planoAtividade['publico'] ;?></p>
       </section>

       <section class="show-plain-items">
        <p class="show-plain-title">Disciplina</p>
      
        <p><?php echo $planoAtividade['nome_disciplina'] ;?></p>
       </section>
        
       <section class="show-plain-items">
        <p class="show-plain-title">Dimensão da Diversidade</p>
       
        <p><?php echo $planoAtividade['cat_diversidade'] ;?></p>
       </section>

       <section class="show-plain-items">
        <p class="show-plain-title">Objetivos</p>
       
        <p><?php echo $planoAtividade['objetivo'] ;?></p>
       </section>

       <section class="show-plain-items">
        <p class="show-plain-title">Metodologia</p>
      
        <p><?php echo $planoAtividade['metodologia'] ;?></p>
       </section>

       <section class="show-plain-items">
        <p class="show-plain-title">Procedimentos</p>
      
        <p><?php echo $planoAtividade['procedimentos'] ;?></p>
       </section>

       <section class="show-plain-items">
        <p class="show-plain-title">Recursos</p>
       
        <p><?php echo $planoAtividade['recursos'] ;?></p>
       </section>

       <section class="show-plain-items">
        <p class="show-plain-title">Anexos</p>
       
        <a href="<?php echo $planoAtividade['anexos'] ;?>">Download de Anexos</a>
       </section>
    </section>
       

   </main>

   <footer>
       <p>&copy; 2024 Diversomp. Todos os direitos reservados.</p>
   </footer>
</div>

</body>
</html>

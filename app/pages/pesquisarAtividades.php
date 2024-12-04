<?php
include_once('../actions/listarPlanos.php')?>
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
           
            <h1>
                <img class="img-logo" src="../../public/img/logo.png" alt="">DIVERSCOMP
            </h1>
           
          
        </div>

        <nav>
            <ul>
                
              
            </ul>
        </nav>
    </header>
    <div class="divisor"></div>
   
    <main id="container-search">
       
     <div>
        <form id="searchForm" action ="pesquisarAtividades.php"class="search-form" >
            <h2>Filtros</h2>
            
            <div class="form-group">
            <label for="searchDiscipline">Disciplina:</label>
            <select id="searchDiscipline" name="disciplina" >
                <option value="" disabled selected>Selecione uma disciplina</option>
                <option value="3">Banco de Dados</option>
                <option value="1">Engenharia de Software</option>
                <option value="4">Desenvolvimento WEB</option>
                <option value="6">Inteligência Artificial</option>
            
                </select>
                
            </div>
            <div class="form-group">

                <label for="categoria_diversidade">Categoria de Diversidade:</label>
                <select id="categoria_diversidade" name="categoria_diversidade">
                <option value="" disabled selected>Selecione uma categoria</option>
                <option value="1">Gênero</option>
                <option value="2">Raça</option>
                <option value="3">Deficiência</option>

                </select>
                
            </div>
            <button type="submit" id="searchButton" class="btn search-btn">Buscar</button>
        </form>
    </div>

<div id="results" class="results">
<?php
if (isset($lista_planos)) {
    foreach($lista_planos as $plano){
        
        echo "<div class='teaching-plan'>";
        echo "<h3 class='plan-title'>{$plano['titulo_plano']}</h3>";
        echo "<div class='plan-public'><strong>Público Alvo:</strong> 
        {$plano['publico']}</div><br>";
        echo "<div class='plan-info'>";
        echo "<div><strong>Disciplina:</strong>{$plano['nome_disciplina']}</div>";
        echo "<div><strong>Categoria:</strong> {$plano['cat_diversidade']}</div>";
        echo "</div>";
        echo "<div class='plan-actions'>";
        echo "<a href='' class='btn download-btn'>Download</a>";
        echo "<a href='exibir_detalhes_plano.php?idplano={$plano['idplano']}' class='btn details-btn'>Ver Detalhes</a>";
        echo "</div>";
        echo "</div>";
        }
    } else {
        echo "<p>Nenhum plano encontrado.</p>";
    }
?>
</div>
    </main>
    <footer>
    <p>&copy; 2024 Diverscomp. Todos os direitos reservados.</p>
    </footer>
</div>
</body>
</html>



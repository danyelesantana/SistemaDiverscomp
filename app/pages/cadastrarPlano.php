<?php
session_start();

if (!isset($_SESSION['idusuario']) || $_SESSION['tipo_usuario'] != 2 ) {
    header("Location: home.php");
    exit();
}
?>

<!DOCTYPE html> 
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Diversomp</title>
    <link rel="stylesheet" href="../../public/css/style.css">
    <link href="https://cdn.quilljs.com/1.3.7/quill.snow.css" rel="stylesheet">

<style>
main {
    padding: 20px 0;
}

.title-section {
    text-align: center;
    margin-bottom: 20px;
}

.title-section h2 {
    font-size: 1.3rem;
    color: #333;
}

.form-section {
    display: flex;
    justify-content: center;
    width: 50%;
}

.activity-form {
    width: 100%; 
    max-width: 1000px; 
    display: flex;
    flex-direction: column;
    gap: 20px; 
}

.activity-form label {
    font-size: 1rem;
    font-weight: bold;
    color: #333;
}

.activity-form input[type="text"],
.activity-form textarea,
.activity-form select {
    width: 100%; 
    padding: 8px; 
    font-size: 1.1rem; 
    border: 1px solid #ccc;
    border-radius: 5px;
    box-sizing: border-box;
}

.activity-form textarea{
    height: 80px;
}

.activity-form textarea {
    resize: vertical;
    
}

.activity-form input[type="file"] {
    font-size: 1rem;
    padding: 5px;
}

.activity-form button {
    padding: 12px 20px; 
    font-size: 1rem;
    font-weight: bold;
    color: #fff;
    background-color: #007BFF;
    border: none;
    border-radius: 5px;
    cursor: pointer;
    align-self: flex-start;
}

.activity-form button:hover {
    background-color: #0056b3;
}
.quill-editor {
        border: 1px solid #ccc;
        border-radius: 5px;
        background-color: #fff;
        height: 250px;
        padding: 10px;
    }

</style>
</head>
<body>

<div class="container">
    <header>
        <div class="items-header">
            <div></div>
            <h1><img class="img-logo" src="../../public/img/logo.png"DIVERSCOMP alt="">DIVERSCOMP</h1>
           
        </div>

        <nav>
            <ul>
                 
                <li><a href="painel_professor.php">Meu Painel</a></li>
                <li><a href="../actions/logout.php">Sair</a></li>
            </ul>
        </nav>
    </header>
    <div class="divisor"></div>
   
    <main>
        <section class="title-section">
            <h2>Cadastro de Atividade</h2>
        </section>

        <section class="form-section">
            <form action="../actions/cadastrar_atividade.php" method="POST" enctype="multipart/form-data" class="activity-form">
                <label for="titulo">Título:</label>
                <input type="text" id="titulo" name="titulo" required>

                <label for="objetivo">Objetivo:</label>
                <textarea id="objetivo" name="objetivo" rows="10" required></textarea>

                <label for="publico_alvo">Público Alvo:</label>
                <input type="text" id="publico_alvo" name="publico_alvo" required>

                <label for="metodologia">Metodologia:</label>
                <textarea id="metodologia" name="metodologia" rows="10" required></textarea>
                
                <label for="recursos">Recursos:</label>
                <textarea id="recursos" name="recursos" rows="10" required></textarea>

                <label for="procedimentos">Procedimentos:</label>
                <!-- Quill Editor -->
                <div id="procedimentos-editor" class="quill-editor"></div>
                <input type="hidden" id="procedimentos" name="procedimentos">


                <label for="disciplina">Disciplina:</label>
                <select id="disciplina" name="disciplina" required>
                    <option value="" disabled selected>Selecione uma disciplina</option>
                    <option value="3">Banco de Dados</option>
                    <option value="1">Engenharia de Software</option>
                    <option value="4">Desenvolvimento WEB</option>
                    <option value="6">Inteligência Artificial </option>
    
                </select>

                <label for="categoria_diversidade">Categoria de Diversidade:</label>
                <select id="categoria_diversidade" name="categoria_diversidade" required>
                    <option value="" disabled selected>Selecione uma categoria</option>
                    <option value="1">Gênero</option>
                    <option value="2">Raça</option>
                    <option value="3">Deficiência</option>

                </select>

                <label for="anexo">Anexo:</label>
                <input type="file" id="anexo" name="anexo" accept=".pdf,.doc,.docx,.ppt,.pptx">

                <button type="submit">Cadastrar Atividade</button>
            </form>
        </section>
    </main>

    <footer>
    <p>&copy; 2024 Diverscomp. Todos os direitos reservados.</p>
    </footer>
</div>

<script src="https://cdn.quilljs.com/1.3.7/quill.min.js"></script>
<script src="../../public/js/script.js"></script>
</body>
</html>



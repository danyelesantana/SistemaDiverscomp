<!DOCTYPE html> 
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Diversomp</title>
    <link rel="stylesheet" href="../../public/css/style.css">
    <style>


main {
    padding: 20px 0;
}

.title-section {
    text-align: center;
    margin-bottom: 20px;
}

.title-section h2 {
    font-size: 1.8rem;
    color: #333;
}

.form-section {
    display: flex;
    justify-content: center;
    width: 60%;
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
    padding: 12px; 
    font-size: 1.1rem; 
    border: 1px solid #ccc;
    border-radius: 5px;
    box-sizing: border-box;
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

    </style>
</head>
<body>

<div class="container">
    <header>
        <div class="items-header">
            <div></div>
            <h1>DIVERSC<img class="img-logo" src="public/img/logo.png" alt="">MP</h1>
            <p>Repositório de Atividades de Educação em Computação</p>
        </div>

        <nav>
            <ul>
                 <li><a href="home.php">Início</a></li>
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
                <textarea id="objetivo" name="objetivo" rows="4" required></textarea>

                <label for="publico_alvo">Público Alvo:</label>
                <input type="text" id="publico_alvo" name="publico_alvo" required>

                <label for="metodologia">Metodologia:</label>
                <textarea id="metodologia" name="metodologia" rows="4" required></textarea>

                <label for="recursos">Recursos:</label>
                <textarea id="recursos" name="recursos" rows="4" required></textarea>

                <label for="procedimentos">Procedimentos:</label>
                <textarea id="procedimentos" name="procedimentos" rows="4" required></textarea>

                <label for="disciplina">Disciplina:</label>
                <select id="disciplina" name="disciplina" required>
                    <option value="" disabled selected>Selecione uma disciplina</option>
                    <option value="3">Banco de Dados</option>
                    <option value="2">Engenharia de Software</option>
                    <option value="4">Desenvolvimento WEB</option>
    
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
        <p>&copy; 2024 Diversomp. Todos os direitos reservados.</p>
    </footer>
</div>

</body>
</html>



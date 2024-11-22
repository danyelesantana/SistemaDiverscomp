<!DOCTYPE html> 
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Diversomp</title>
    <link rel="stylesheet" href="../../public/css/style.css">
<style>
     
.search-form {
    background: #ffffff;
    padding: 20px;
    display: flex;
    flex-direction: column;
    gap: 15px;
    width: 80%;
}

.search-form h2 {
    font-size: 1.5em;
    color: gray;
    margin-bottom: 10px;
}

.form-group {
    display: flex;
    flex-direction: column;
}

.form-group label {
    font-size: 1em;
    margin-bottom: 5px;
}

.form-group input {
    padding: 8px 12px;
    border: 1px solid #ccc;
    border-radius: 5px;
    font-size: 1em;
}

.search-btn {
    background-color: #007bff;
    color: #ffffff;
    padding: 10px 15px;
    border: none;
    border-radius: 5px;
    cursor: pointer;
    align-self: flex-start;
}

.search-btn:hover {
    background-color: #0056b3;
}

/* Resultados */
.results {
    display: flex;
    flex-direction: column;
    gap: 20px;
    width: 80%;
}

.teaching-plan {
    background: #ffffff;
    border: 1px solid #ddd;
    border-radius: 8px;
    padding: 20px;
    box-shadow: 0px 4px 6px rgba(0, 0, 0, 0.1);
}

.plan-title {
    font-size: 1.5em;
    margin-bottom: 15px;
    color: #007bff;
}

.plan-info {
    display: flex;
    justify-content: space-between;
    margin-bottom: 15px;
    flex-wrap: wrap;
}

.plan-info div {
    flex: 1 1 30%;
    margin-right: 10px;
    font-size: 0.95em;
}

.plan-actions {
    margin-top: 10px;
    display: flex;
    gap: 10px;
}

.btn {
    padding: 10px 15px;
    border: none;
    border-radius: 5px;
    cursor: pointer;
    font-size: 1em;
    text-decoration: none; /* Remove o sublinhado */
    display: inline-block; /* Mantém a aparência de botão */
    text-align: center;
}

.download-btn {
    background-color: #28a745;
    color: #ffffff;
}

.download-btn:hover {
    background-color: #218838;
}

.details-btn {
    background-color: #007bff;
    color: #ffffff;
}

.details-btn:hover {
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
                <li><a href="#">Pesquisar plano</a></li>
                
            </ul>
        </nav>
    </header>
    <div class="divisor"></div>
   
    <main>
       

<form id="searchForm" class="search-form">
    <h2>Pesquisar Planos de Ensino</h2>
    <div class="form-group">
        <label for="searchDiscipline">Disciplina</label>
        <input type="text" id="searchDiscipline" name="discipline" placeholder="Digite a disciplina">
    </div>
    <div class="form-group">
        <label for="searchCategory">Categoria</label>
        <input type="text" id="searchCategory" name="category" placeholder="Digite a categoria">
    </div>
    <div class="form-group">
        <label for="searchAudience">Público Alvo</label>
        <input type="text" id="searchAudience" name="audience" placeholder="Digite o público-alvo">
    </div>
    <button type="button" id="searchButton" class="btn search-btn">Pesquisar</button>
</form>

<!-- Resultados da Pesquisa -->
<div id="results" class="results">

</div>



    
    </main>

    <footer>
        <p>&copy; 2024 Diversomp. Todos os direitos reservados.</p>
    </footer>
</div>

<script>

    const teachingPlans = [
        {
            title: "Título do Plano de Ensino",
            audience: "Ensino Médio",
            discipline: "Computação",
            category: "Diversidade e Inclusão",
            downloadLink: "#",
            detailsLink: "#"
        },
        {
            title: "Outro Plano de Ensino",
            audience: "Ensino Fundamental",
            discipline: "Matemática",
            category: "Tecnologia e Educação",
            downloadLink: "#",
            detailsLink: "#"
        },
        {
            title: "Plano Avançado de Ensino",
            audience: "Ensino Médio",
            discipline: "Ciências",
            category: "Sustentabilidade",
            downloadLink: "#",
            detailsLink: "#"
        }
    ];

    const searchButton = document.getElementById('searchButton');
    const resultsContainer = document.getElementById('results');

    searchButton.addEventListener('click', () => {
        const discipline = document.getElementById('searchDiscipline').value.toLowerCase();
        const category = document.getElementById('searchCategory').value.toLowerCase();
        const audience = document.getElementById('searchAudience').value.toLowerCase();

        // Filtrando os resultados
        const filteredPlans = teachingPlans.filter(plan => {
            return (
                (discipline === "" || plan.discipline.toLowerCase().includes(discipline)) &&
                (category === "" || plan.category.toLowerCase().includes(category)) &&
                (audience === "" || plan.audience.toLowerCase().includes(audience))
            );
        });

        // Limpando os resultados anteriores
        resultsContainer.innerHTML = "";

        // Adicionando os resultados filtrados
        if (filteredPlans.length > 0) {
            filteredPlans.forEach(plan => {
                const planElement = `
                <div class="teaching-plan">
                    <h3 class="plan-title">${plan.title}</h3>
                    <div class="plan-info">
                        <div><strong>Público Alvo:</strong> ${plan.audience}</div>
                        <div><strong>Disciplina:</strong> ${plan.discipline}</div>
                        <div><strong>Categoria:</strong> ${plan.category}</div>
                    </div>
                    <div class="plan-actions">
                        <a href="${plan.downloadLink}" class="btn download-btn">Download</a>
                        <a href="${plan.detailsLink}" class="btn details-btn">Ver Detalhes</a>
                    </div>
                </div>`;
                resultsContainer.innerHTML += planElement;
            });
        } else {
            resultsContainer.innerHTML = "<p>Nenhum plano encontrado.</p>";
        }
    });
</script>

</body>
</html>



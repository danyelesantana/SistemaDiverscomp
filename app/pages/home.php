<?php
session_start();
if(!isset($_SESSION['logado'])){
    include_once("header.php");
}else{
    include_once("header_logged.php");
   
}
?>
    <div class="divisor"></div>
    <div class="banner">
      
    </div>

    <main>
        <section class="title-section">
            <h2>Publicações Recentes</h2>
        </section>

        <section id="products" class="products-card">
            <div class="products-item">
                <div id="post-img-inclusao"></div>
                <div class="products-description">Lei Brasileira de Inclusão</div>
            </div>
            <div class="products-item">
                <div id="post-img-genero"></div>
                <div class="products-description">Equidade gênero</div>
            </div>
            <div class="products-item">
                <div id="post-img-raca"></div>
                <div class="products-description">Viés de raça em IA</div>
            </div>
        </section>
        <section id="rep" class="rev-card">
            <div class="rev-text"> 
                <p>É docente e desenvolve atividades sobre diversidade e computação? Cadastre-se e compartilhe com a gente!</p>
                <p>Conheça as atividades compartilhadas por outros colegas!</p>
            </div>
            <div class="rev-button" ><a href="pesquisarAtividades.php" >Acesse planos de atividade</a></div>
            </section>
            <section class="diverscomp">
        <div class="coluna">
            <h2>O que é o DiversComp?</h2>
            <ul>
                <li>Uma plataforma digital feita para compartilhar e acessar planos de aula que promovem diversidade, equidade e inclusão (DEI) na educação em computação.</li>
                <li>Ajuda professores a trazer temas como gênero, raça, etnia e acessibilidade para as aulas de computação.</li>
                <li>Cria um espaço colaborativo para troca de ideias e práticas inclusivas.</li>
            </ul>
        </div>
        <div class="coluna">
            <h2>O que você pode fazer aqui?</h2>
            <ul>
                <li>Cadastrar-se como professor ou estudante para acessar e compartilhar conteúdos.</li>
                <li>Publicar planos de aula incríveis que conectam computação com temas de diversidade.</li>
                <li>Pesquisar atividades com filtros super úteis, como disciplina e categorias de diversidade.</li>
                <li>Baixar materiais e se inspirar com ideias de outros educadores.</li>
            </ul>
        </div>
        <div class="coluna">
            <h2>Por que usar o DiversComp?</h2>
            <ul>
                <li>Porque queremos que todos tenham espaço na área de tecnologia.</li>
                <li>Porque um ensino inclusivo forma profissionais mais criativos e preparados para o futuro.</li>
                <li>Porque aqui você encontra recursos práticos e ideias para fazer a diferença na sala de aula.</li>
            </ul>
        </div>
    </section>
        

    
    </main>

    <footer>
    </footer>
</div>

<div class="overlay" id="overlay"></div>
<div class="modal" id="loginModal">
    <form action="../actions/verificaLogin.php" method="post">
        <div class="modal-header">Login</div>
        <div class="modal-body">
            <label for="email">Email</label>
            <input type="email" id="email" name="email" placeholder="Digite seu email" required>
            
            <label for="senha">Senha</label>
            <input type="password" id="senha" name="senha" placeholder="Digite sua senha" required>
            <?php if (isset($_GET['msgLogin'])) {
                     echo "<p class='msg'>".htmlspecialchars($_GET['msgLogin']);"</p>";
                    
                } ?>
        </div>
        <div class="modal-footer">
            <button type="submit">Entrar</button>
            <a href="#">Esqueceu a senha?</a><br>
        </div>
    </form>
</div>

<div class="modal" id="registerModal">
    <form action="../actions/cadastrarUsuario.php" method="post">
        <div class="modal-header">Cadastro</div>
        <div class="modal-body">
            <label for="nome">Nome</label>
            <input type="text" id="nome" name="nome" placeholder="Digite seu nome" required>
            
            <label for="emailCadastro">Email</label>
            <input type="email" id="emailCadastro" name="email" placeholder="Digite seu email" required>
            
            <label for="senhaCadastro">Senha</label>
            <input type="password" id="senhaCadastro" name="senha" placeholder="Digite sua senha" required minlength="6">

           
            <div class="section_type_user">

            <div class = "section_tp_user_item"><label for="#">Professor(a)</label></label><input type="radio" name="tipo_usuario" value="2"></div>
 
           <div class="section_tp_user_item"><label for="#">Estudante</label> <input type="radio" name="tipo_usuario" value="3"></div>  
        </div>
        <?php if (isset($_GET['msgCadastro'])) {
                    echo "<p class='msg'>".htmlspecialchars($_GET['msgCadastro']);"</p>";
                } ?>
        </div>
        <div class="modal-footer">
            <button type="submit">Cadastrar</button>

          
        </div>
    </form>
</div>
<footer>
<p>&copy; 2024 Diverscomp. Todos os direitos reservados.</p>
</footer>
<script>
    const overlay = document.getElementById('overlay');
    const loginModal = document.getElementById('loginModal');
    const registerModal = document.getElementById('registerModal');
    const openLoginModal = document.getElementById('openLoginModal');
    const openRegisterModal = document.getElementById('openRegisterModal');
   

    openLoginModal.addEventListener('click', () => {
        loginModal.style.display = 'block';
        overlay.style.display = 'block';
    });

   
    openRegisterModal.addEventListener('click', () => {
        registerModal.style.display = 'block';
        overlay.style.display = 'block';
    });

  
    const urlParams = new URLSearchParams(window.location.search);
    if (urlParams.has('msgLogin')) {
        loginModal.style.display = 'block';
        overlay.style.display = 'block';
    }
    if (urlParams.has('msgCadastro')) {
        registerModal.style.display = 'block';
        overlay.style.display = 'block';
    }

    overlay.addEventListener('click', () => {
        if (loginModal.style.display === 'block') {
            loginModal.style.display = 'none';
        }
        if (registerModal.style.display === 'block') {
            registerModal.style.display = 'none';
        }

        overlay.style.display = 'none';

       
        if (urlParams.has('msgLogin')) {
            window.location.href = window.location.pathname; 
        }

        if (urlParams.has('msgCadastro')) {
            window.location.href = window.location.pathname; 
        }
    });
</script>



</body>
</html>

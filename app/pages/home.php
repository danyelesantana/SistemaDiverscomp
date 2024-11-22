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
                <div class="products-img"></div>
                <div class="products-description">Lei Brasileira de Inclusão</div>
            </div>
            <div class="products-item">
                <div class="products-img"></div>
                <div class="products-description">Estereótipos de gênero</div>
            </div>
            <div class="products-item">
                <div class="products-img"></div>
                <div class="products-description">Viés de raça em IA</div>
            </div>
        </section>
        <section id="rep" class="rev-card">
            <div class="rev-text"> 
                Está em buscas de atividades sobre Computação e Diversidade?<br>
            </div>
            <div class="rev-button"><a href="" >Acesse planos de atividade</a></div>
            <div class="rev-img"></div>
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
                    echo htmlspecialchars($_GET['msgLogin']);
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
            <input type="password" id="senhaCadastro" name="senha" placeholder="Digite sua senha" required>

            <label for="tipo_usuario">Tipo de Usuário</label>
            <div class="section_type_user">

            <div class = "section_tp_user_item"><label for="#">Professor(a)</label></label><input type="checkbox" name="tipo_usuario" value="2"></div>
 
           <div class="section_tp_user_item"><label for="#">Estudante</label> <input type="checkbox" name="tipo_usuario" value="3"></div>  
        </div>
        </div>
        <div class="modal-footer">
            <button type="submit">Cadastrar</button>
        </div>
    </form>
</div>
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
    if (urlParams.has('registerError')) {
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
    });
</script>



</body>
</html>

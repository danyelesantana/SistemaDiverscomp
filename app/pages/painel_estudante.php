<?php
session_start();
$nome_usuario = $_SESSION['nome_usuario'];

if (!isset($_SESSION['idusuario']) || $_SESSION['tipo_usuario'] != 3 ) {
    header("Location: home.php");
    exit();
}

include_once("header_logged.php");

?>
    <div class="divisor"></div>
   

    <main>
        <section class="title-section">
            <h2>Painel do(a) Usuário(a) <br><?php echo $nome_usuario?></h2>
        </section>

        <section id="products" class="products-card">
            <div class="products-item">
                <div class="products-img"></div>
                <div class="products-description"><a href="pesquisarAtividades.php">Pesquisar planos</a></div>
                
            </div>
            
        </section>

       
    </main>

    <footer>
    </footer>
</div>
</div>

</body>
</html>


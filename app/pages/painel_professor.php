<?php
session_start();
$nome_usuario = $_SESSION['nome_usuario'];

if (!isset($_SESSION['idusuario']) || $_SESSION['tipo_usuario'] != 2 ) {
    header("Location: home.php");
    exit();
}

include_once("header_logged.php");

?>
    <div class="divisor"></div>
   

    <main>
        <section class="title-section">
            <h2>Painel do(a) Professor(a) <br><?php echo $nome_usuario?></h2>
        </section>

        <section id="products" class="products-card">
            <div class="products-item">
                <div class="list-plain-img"></div>
                <div class="products-description"><a href="painel_atividades_prof.php">Meus Planos</a></div>
                
            </div>
            <div class="products-item">
                <div class="new-plain-img"></div>
                <div class="products-description"> <a href="cadastrarPlano.php">Novo Plano</a></div>
            </div>
            
        </section>

       
    </main>

    <footer>
     <p>&copy; 2024 Diversomp. Todos os direitos reservados.</p>
    </footer>
</div>
</div>

</body>
</html>


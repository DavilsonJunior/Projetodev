<?php 
session_start();
if(empty($_SESSION['login'])) {
    header("Location: login.php");
}
require 'pages/header.php'; 
include '../c0nf1g-43394390493.php';
if(isset($_GET['page'])){
    $page = $_GET['page'];
} else {
    $page = '';
}


?>

<div class="container">
    <div class="description"> 
        <h1 class="my-4">Adicionar 
            <?php 
            switch($page) {
                case 'venda':
                    echo 'Venda';
                    break;         
            }
            
            ?>
        </h1>                           
                
        <form class="mb-4" action="add-venda.php" method="POST" id="adicionarVenda">

            <div class="form-group">
                <label for="nome">Nome</label>
                <input type="text" class="form-control" name="nome" id="nome" placeholder="Nome" autofocus>
            </div>
            <div class="form-group">
                <label for="email">E-mail</label>
                <input type="email" class="form-control" name="email" id="email" aria-describedby="emailHelp" placeholder="exemple@gmail.com">
            </div>
            <div class="form-group">
                <label for="senha">Celular</label>
                <input type="text" class="form-control" name="celular" id="celular" placeholder="(16) 99999-9999)">
            </div>
            <div class="form-group form-check">
                <input type="radio" checked disabled class="form-check-input" id="Venda">
                <label class="form-check-label" for="check">Venda</label>            
            </div>
            <button type="submit" class="btn btn-primary">Adicionar</button>
            <div class="msgAdd"></div>
                                                             
        </form>
 
    </div>
</div>

<?php
require 'pages/footer.php';


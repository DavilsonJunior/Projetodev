<?php 
session_start();
if(empty($_SESSION['login'])) {
    header("Location: login.php");
} 
?>

<?php require 'pages/header.php'; ?>
    <style>
        
    </style>

    <div class="container">
        <div class="description">

            <h1 class="my-4">Importar Máquinas</h1>
            <div class="row justify-content-center align-text-center">
                <form action="" method="POST">

                    <div class="form-row justify-content-center">
                        <div class="form-group w-100 col-lg-12 col-md-12 col-sm-12 col-10">
                            <textarea class="w-100" name="texto" id="texto" cols="100" rows="15"></textarea>
                        </div>  
                        <div class="form-group">
                            <button class="btn btn-primary p-2" type="submit">Limpar</button>
                            <button class="btn btn-primary p-2" type="submit">Adicionar no Sistema</button>
                        </div>
                    </div>                
                    

                </form>
            </div>
        </div>
    </div>

<?php
require 'pages/footer.php';
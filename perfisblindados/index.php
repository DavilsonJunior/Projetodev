<?php 
session_start();
if(empty($_SESSION['login'])) {
    header("Location: login.php");
} 
?>

<?php require 'pages/header.php'; ?>


    <div class="container">

        <h1 class="my-4">Dashboard</h1>
        <div class="row justify-content-center align-text-center">
            <div class="col-lg-6 col-md-6 col-sm-12 mb-4">
                <div class="left p-2">
                    <h5>Perfis Disponiveis</h5>
                    <h2>194</h2>
                </div>    
            </div>
            <div class="col-lg-6 col-md-6 col-sm-12 mb-4">
                <div class="right p-2">
                    <h5>Perfis Entregues</h5>
                    <h2>4312</h2>
                </div>
            </div>
        </div>
        
    </div>

<?php
require 'pages/footer.php';


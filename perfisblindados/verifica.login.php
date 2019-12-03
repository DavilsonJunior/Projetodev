<?php
session_start();
include '../c0nf1g-43394390493.php';
require 'classes/usuario.class.php';

if(isset($_POST['email']) && !empty($_POST['email'])) {

    $email = addslashes($_POST['email']);
    $senha = md5($_POST['senha']);
    
    $usuario = new Usuario($pdo);
    
    if($usuario->login($email, $senha)) {
        echo 'sucesso';
    } else {
        echo '<div class="alert alert-danger" role="alert">Usuario e/ou senhas incorretos!</div>';
    }
    
} else {
    echo '<div class="alert alert-warning" role="alert">Por favor! Preencha todos os campos!</div>';
    
}
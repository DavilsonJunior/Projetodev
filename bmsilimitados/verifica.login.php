<?php
session_start();
include '../c0nf1g-43394390493.php';

if(isset($_POST['email']) && !empty($_POST['email'])) {

    $email = addslashes($_POST['email']);
    $senha = md5($_POST['senha']);
    
    $sql = "SELECT * FROM usuarios WHERE email = :email AND pass = :senha";
    $sql = $pdo->prepare($sql);
    $sql->bindParam(":email", $email);
    $sql->bindParam(":senha", $senha);
    
    $sql->execute();
        

    if($sql->rowCount() > 0) {
        $dado = $sql->fetch();
        $_SESSION['login'] = $dado['id'];
        header("Location: index.php");
    } else {
        echo '<div class="alert alert-danger" role="alert">Usuario e/ou senhas errados!</div>';
        echo '<a class="btn btn-primary" href="login.php">Voltar</a>';
    }
    
}
<?php
session_start();
class Usuario {
    
    public function login($email, $senha) {

        $sql = "SELECT * FROM usuarios WHERE email = :email AND pass = :senha";
        $sql = $pdo->prepare($sql);
        $sql->bindParam(":email", $email);
        $sql->bindParam(":senha", $senha);
    
        $sql->execute();

        if($sql->rowCount() > 0) {
            $dado = $sql->fetch();
            $_SESSION['login'] = $dado['id'];
            return true;
        } 
    }
}
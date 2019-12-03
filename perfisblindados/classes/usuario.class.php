<?php
class Usuario {
    
    private $pdo;

    public function __construct($pdo) {
        $this->pdo = $pdo;
    }

    public function login($email, $senha) {

        $sql = "SELECT * FROM usuarios WHERE email = :email AND pass = :senha";
        $sql = $this->pdo->prepare($sql);
        $sql->bindParam(":email", $email);
        $sql->bindParam(":senha", $senha);
    
        $sql->execute();

        if($sql->rowCount() > 0) {
            $dado = $sql->fetch();
            $_SESSION['login'] = $dado['id'];
            return true;
        } 
    }

    public function getUsuario($p, $por_pagina, $filtro) {
       
        $sql = "SELECT * FROM usuarios ORDER BY name ASC LIMIT $p, $por_pagina";
        $sql = $this->pdo->query($sql);

        if($sql->rowCount() > 0) {
            $usuario = $sql->fetchAll();
            return $usuario;
        }
    }

    
}
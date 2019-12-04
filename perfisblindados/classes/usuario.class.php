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

    public function getTotalUsuarios($busca) {
        $busca = "%{$busca}%";
        $sql = "SELECT COUNT(*) as c FROM usuarios";
        if($busca !== '') {
            $sql .= " WHERE (name OR email LIKE :busca)"; 
        }
        
        $sql = $this->pdo->prepare($sql);

        if($busca !== '') {            
            $sql->bindParam(":busca", $busca);           
        } 

        $sql->execute();    
        
        if($sql->rowCount() > 0) {
            $dado = $sql->fetch();            
            return $dado['c'];
        } 
    }


    public function getUsuario($p, $por_pagina, $busca) {
        $busca = "%{$busca}%";
        $sql = "SELECT * FROM usuarios"; 
        if($busca !== '') {
            $sql .= " WHERE (name OR email LIKE :busca)"; 
        }
        $sql .= " ORDER BY name ASC LIMIT $p, $por_pagina";
                
        if($busca !== '') {
            $sql = $this->pdo->prepare($sql);
            $sql->bindParam(":busca", $busca);            
            $sql->execute();
        } else {
            $sql = $this->pdo->query($sql);
        }     
        

        if($sql->rowCount() > 0) {
            $usuario = $sql->fetchAll();
            return $usuario;
        } else {
            
        }
    }

    
}
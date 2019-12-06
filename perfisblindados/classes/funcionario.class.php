<?php
class Funcionario {
    
    private $pdo;

    public function __construct($pdo) {
        $this->pdo = $pdo;
    }    

    public function addFuncionario($pessoa, $nome, $email, $senha) {
        $sql = "INSERT INTO ".$pessoa." SET name = :nome, email = :email, pass = :senha";
        $sql = $this->pdo->prepare($sql);
        $sql->bindParam(":nome", $nome);
        $sql->bindParam(":email", $email);
        $sql->bindParam(":senha", $senha);
        $sql->execute();

        if($sql === true) {
            return true;
        } 
    }

    public function getTotalFuncionarios($busca) {
        $busca = "%{$busca}%";
        $sql = "SELECT COUNT(*) as c FROM funcio";
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

    public function getFuncionarios($p, $por_pagina, $busca) {
        $p = ($p - 1) * $por_pagina;
        $busca = "%{$busca}%";
        $sql = "SELECT * FROM funcio"; 
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
            $funcionario = $sql->fetchAll();
            return $funcionario;
        } else {
            
        }
    }

    
}
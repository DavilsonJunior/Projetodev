<?php
class Venda {
    
    private $pdo;

    public function __construct($pdo) {
        $this->pdo = $pdo;
    }    

    public function addVenda($pessoa, $nome, $email, $celular) {
        $sql = "INSERT INTO ".$pessoa." SET name = :nome, email = :email, cellphone = :celular";
        $sql = $this->pdo->prepare($sql);
        $sql->bindParam(":nome", $nome);
        $sql->bindParam(":email", $email);
        $sql->bindParam(":celular", $celular);
        $sql->execute();

        if($sql === true) {
            return true;
        } 
    }

    public function getTotalVendas($busca) {
        $busca = "%{$busca}%";
        $sql = "SELECT COUNT(*) as c FROM vendas";
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

    public function getVendas($p, $por_pagina, $busca) {
        $busca = "%{$busca}%";
        $sql = "SELECT * FROM vendas"; 
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
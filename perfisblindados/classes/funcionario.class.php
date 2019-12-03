<?php
class Funcionario {
    
    private $pdo;

    public function __construct($pdo) {
        $this->pdo = $pdo;
    }    

    public function getFuncionario($p, $por_pagina, $busca) {
        $busca = "%{$busca}%";
        $sql = "SELECT * FROM funcio"; 
        if($busca !== '') {
            $sql .= " WHERE (name OR email LIKE :busca)"; 
        }
        $sql .= " ORDER BY name ASC LIMIT $p, $por_pagina";
        //$sql = "SELECT * FROM usuarios WHERE name LIKE :busca ORDER BY name ASC LIMIT $p, $por_pagina";
        //$sql = "SELECT * FROM usuarios ORDER BY name ASC LIMIT $p, $por_pagina";
        //$sql = $this->pdo->query($sql);
        
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
<?php
session_start();
include '../c0nf1g-43394390493.php';
require 'classes/usuario.class.php';

if(isset($_POST['busca']) && !empty($_POST['busca'])) {

    $busca = addslashes($_POST['busca']);
    echo $busca[0];
    //$usuario = new Usuario();
    
    //$usuario->getUsuario($email, $senha);
    
    
} 
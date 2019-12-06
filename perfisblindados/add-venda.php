<?php
session_start();
include '../c0nf1g-43394390493.php';
/*spl_autoload_register( function($class) {
    require 'classes/'.$class.'.class.php';
});*/
require 'classes/venda.class.php';

$vendas = new Venda($pdo);

if(isset($_POST['pessoa']) && !empty($_POST['pessoa'])) {

    if( empty($_POST['nome']) || empty($_POST['email']) ) {
        echo '<div class="alert alert-warning" role="alert">Por favor! Preencha todos os campos!</div>';
    } else {
        $pessoa = addslashes($_POST['pessoa']);
        $nome = mb_strtoupper( addslashes($_POST['nome']) );
        $email = addslashes($_POST['email']);
        $celular = addslashes($_POST['celular']);
        if( empty($celular) ) {
            $celular = ' - ';
        }        

        switch($pessoa) {
            case "vendas":
                $vendas->addVenda($pessoa, $nome, $email, $celular);
                echo '<div class="alert alert-success" role="alert">Venda adicionada com Sucesso!</div>';
                break;  
            default:
                echo '<div class="alert alert-warning mt-3" role="alert"><a href="javascript:void(0)" onclick="history.go(-1); return false;">Ops, Ocorreu um erro! Clique aqui!</a></div>';
        }
    }



} else {
    echo '<div class="alert alert-warning mt-3" role="alert">Ops, Ocorreu um erro! <a  class="alert-link" href="javascript:void(0)" onclick="history.go(-1); return false;">Clique aqui!</a></div>';
}

<?php
require 'environment.php';
$config = array();
if(ENVIRONMENT == 'development') {
    //define("BASE_URL", "http://localhost/classificados_mvc/");
    $config['dbname'] = 'c0nt4s1l1m1t4d4s';
    $config['host'] = '127.0.0.1';
    $config['dbuser'] = 'root';
    $config['dbpass'] = '';
} else {
    //define("BASE_URL", "http://meusite.com.br/");
    $config['dbname'] = 'c0nt4s1l1m1t4d4s';
    $config['host'] = 'localhost';
    $config['dbuser'] = 'biliondev';
    $config['dbpass'] = '7Fj72eknbEZsqG22Zcv9uyayXx2abt';
}

try{

    /*$pdo = new PDO("mysql:dbname=c0nt4s1l1m1t4d4s;host=localhost", "biliondev", "7Fj72eknbEZsqG22Zcv9uyayXx2abt",array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));
	array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8");*/

    $pdo = new PDO("mysql:dbname=".$config['dbname'].";host=".$config['host'], $config['dbuser'], $config['dbpass']);

} catch(PDOException $e) {
    echo "Erro: ".$e->getMessage();
    exit;
}
<?php
try {
		$pdo = new PDO("mysql:dbname=c0nt4s1l1m1t4d4s;host=localhost", "biliondev", "7Fj72eknbEZsqG22Zcv9uyayXx2abt",array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));
	array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8");
		} catch(PDOException $e) {
			echo "FALHA: ".$e->getMessage();
		}

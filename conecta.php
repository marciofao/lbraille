<?php
require 'env.php';

if (ENV === 'prod') { //verifica se o ambiente "enviroment" está em produção
	$host = 'mysql01.gotuzzoeferreira.hospedagemdesites.ws';
	$user = 'gotuzzoeferreira';
	$db_senha = 'marciofao1';
	$db = 'gotuzzoeferreira';
} else {
	$host = "localhost";
	$user = 'root';
	$db_senha = '';
	$db = 'lbraille';
}
//die($user);

	$link=mysql_connect($host, $user, $db_senha);


if (!$link) { die('Não foi possível conectar: ' . mysql_error()); }
mysql_select_db($db, $link);
mysql_set_charset('utf8');

if (ENV === 'prod') { 
	$dsn = "mysql:host=$host;dbname=$db;charset=utf-8";
}else{
	$dsn = "mysql:host=$host;dbname=$db;charset=utf-8";	
}

$opt = array(
    PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
);
$pdo = new PDO($dsn, $user, $db_senha, $opt);

unset($user, $db_senha, $db, $dsn, $opt);

<?php
$link=mysql_connect('localhost', 'louisbra_lbraille', '-braille9');
if (!$link) { die('Não foi possível conectar: ' . mysql_error()); }
mysql_select_db("louisbra_lbraille", $link);

$dsn = "mysql:host=localhost;dbname=louisbra_lbraille;charset=latin1";
$opt = array(
    PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
);
$pdo = new PDO($dsn,'louisbra_lbraille','-braille9', $opt);
?>

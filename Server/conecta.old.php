<?php
$link=mysql_connect('localhost', 'louisbra_braille', 'f8zs6MJ4e3');
if (!$link) { die('Não foi possível conectar: ' . mysql_error()); }
mysql_select_db("louisbra_lbraille", $link);
?>

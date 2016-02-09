<html><head></head><meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Louis Braille</title>
</head><body>
<?php
  include "sql.php";
  include "conecta.php";
    $R=selectMySQL('usuario', '', '', 'nome');
    print_r($R);
    echo "<br><br>";

    $tabela='usuario';
    $cols='login,senha';
    $dados="'joao','123'";  
    insertMySQL ($tabela, $cols, $dados);

    $R=selectMySQL('usuario', '', '', 'nome');
    print_r($R);
    echo "<br><br>";


    $query="SELECT * FROM usuario";
    $result=mysql_query($query);
  $num=mysql_numrows($result);
  mysql_close();?>
<font face="Arial, Helvetica, sans-serif">
<table border="1" cellspacing="2" cellpadding="2">
<tr>
<td>
Value1
</td>
<td>
Value2
</td>
<td>
Value3
</td>
<td>
Value4
</td>
<td>
Value5
</td>
<td>

</td>
<td>

</td>
</tr>
<?php
$i=0;while ($i < $num) {$f1=mysql_result($result,$i,"nome");
$f2=mysql_result($result,$i,"sobrenome");$f3=mysql_result($result,$i,"login");
$f4=mysql_result($result,$i,"senha");$f5=mysql_result($result,$i,"data_nasc");
$f6=mysql_result($result,$i,"cod");?>
<tr>
<td>
<?php echo $f1; ?>
</td>
<td>
<?php echo $f2; ?>
</td>
<td>
<?php echo $f3; ?>
</td>
<td>
<?php echo $f4; ?>
</td>
<td>
<?php echo $f5; ?>
</td>
<td>
  <a href="excluir.php?c=<?php echo $f6; ?>" style="color:red;">excluir</a>
</td>
<td>
  <a href="editar.php?c=<?php echo $f6; ?>">editar</a>
</td>
</tr>
<?php
$i++;}?>

?>
</table>
</font>
</body>
</html>
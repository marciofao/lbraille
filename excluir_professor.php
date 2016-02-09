<?php
if (!$_GET) header("location:index.php");//reencaminha se nada for enviado
	
  $cod=$_GET['c'];

  include "sql.php";
  include "conecta.php";
  
  $query="SELECT * FROM usuario LEFT JOIN (aluno) ON (aluno.cod_usuario=usuario.cod) WHERE usuario.cod=$cod";
  $result=mysql_query($query);
  //print_r($result);
  //die;
  $R=mysql_fetch_assoc($result);
  
  include "desconecta.php";
?>
<!doctype html>
<html lang="pt-br">
<head>
	<meta charset="UTF-8">
	<title>Excluir Aluno</title>
</head>
<body>
	<?php
		
		$f1=$R["nome"];
		$f2=$R["sobrenome"];
		$f3=$R["matricula"];
		$f4=$R["data_ingresso"];
		$f5=$R["data_nasc"];
		$f6=$cod;
		$f7=$R["endereco"];
		$f8=$R["numero"];
		$f9=$R["cidade"];
		$f10=$R["estado"];
		$f11=$R["cep"];
		$f12=$R["matricula"];
	?>
	<h3>Voce tem certeza que deseja excluir este aluno?</h3>
	<font face="Arial, Helvetica, sans-serif">
		<b>Nome:</b> <?php echo $f1." ".$f2; ?> <br>
		<b>Data de Nascimento:</b> <?php echo $f5; ?> <br>
		<b>Endereço:</b> <?php echo $f7.", ".$f8; ?> <br>
		<b>Cidade:</b> <?php echo $f9; ?> <br>
		<b>Estado:</b> <?php echo $f10; ?> <br>
		<b>CEP:</b> <?php echo $f11; ?> <br>
		<b>Matricula:</b> <?php echo $f12; ?> <br>	
	</font>
		<a href="exclui_usuario.php?c=<? echo $f6; ?>"><h3>Confirmar Exclusão</h3></a>
	</form>
</body>
</html>
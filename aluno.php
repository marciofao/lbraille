<?php

if (!$_GET) header("location:home.php");//reencaminha se nada for enviado
	
  $cod=$_GET['c'];

  require "conecta.php";
  
  $query="SELECT * FROM v_usuario_aluno WHERE cod_usuario=$cod";
  $result=mysql_query($query);
  //print_r($result);
  //die;
  $R=mysql_fetch_assoc($result);
  
  require "desconecta.php";

		
		$nome=$R["nome"];
		$sobrenome=$R["sobrenome"];
		$matricula=$R["matricula"];
		$data_ingresso=$R["data_ingresso"];
		$data_nasc=$R["data_nasc"];
		$endereco=$R["endereco"];
		$numero=$R["numero"];
		$cidade=$R["cidade"];
		$uf=$R["uf"];
		$cep=$R["cep"];
		$matricula=$R["matricula"];
?>

<!doctype html>
<html lang="pt-br">
<head>
	<meta charset="UTF-8">
	<title>Detalhes do Aluno<?php echo $nome; ?></title>
</head>
<body>
	<?php 
		require "topo.php";
	 ?>
		<table>
		<tr>
			<td align="center" colspan="2">
				<a href="editar_aluno.php?c=<?php echo $cod; ?>">Editar Aluno</a>
			</td>
		</tr>
		<tr>
			<td align="right">Nome:</td>
			<td align="left"><b><?php echo $nome; ?></b></td>
		</tr>
		<tr>
			<td align="right">Sobrenome:</td>
			<td align="left"><b><?php echo $sobrenome; ?></b></td>
		</tr>
		<tr>
			<td align="right">Data de nascimento:</td>
			<td align="left"><b><?php echo $data_nasc; ?></b></td>
		</tr>
		<tr>
			<td align="right">Endereço:</td>
			<td align="left"><b><?php echo $endereco; ?></b></td>
		</tr>
		<tr>
			<td align="right">Numero: </td>
			<td align="left"><b><?php echo $numero; ?></b></td>
		</tr>
		<tr>
			<td align="right">Cidade:</td>
			<td align="left"><b><?php echo $cidade; ?></b></td>
		</tr>
		<tr>
			<td align="right">Estado: </td>
			<td align="left"><b><?php echo $uf; ?></b></td>
		</tr>
		<tr>
			<td align="right">CEP:</td>
			<td align="left"><b><?php echo $cep; ?></b></td>
		</tr>
		<tr>
			<td align="right">Matrícula:</td>
			<td align="left"><b><?php echo $matricula; ?></b></td>
		</tr>
		<tr>
			<td align="right">Data de Ingresso:</td>
			<td align="left"><b><?php echo $data_ingresso; ?></b></td>
		</tr>
	</table>

<?php 
require "rodape.php"
 ?>

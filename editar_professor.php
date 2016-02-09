<?php

if ($_POST) {//se esta mesma página enviou dados
	$cod=$_POST['cod'];
	require "conecta.php";

	$nome=$_POST["nome"];
	$sobrenome=$_POST["sobrenome"];
	$matricula=$_POST["matricula"];
	$ingresso=$_POST["data_ingresso"];
	$data_nasc=$_POST["data_nasc"];
	$endereco=$_POST["endereco"];
	$numero=$_POST["numero"];
	$cidade=$_POST["cidade"];
	$uf=$_POST["uf"];
	$cep=$_POST["cep"];
	$matricula=$_POST["matricula"];
	$cod=$_POST['cod'];
	$oficio=$_POST["oficio"];
	$categoria=$P_OST["categoria"];



	$sql="UPDATE  `usuarios` SET  
	`nome` =  '".$nome."',
	`sobrenome` =  '".$sobrenome."',
	`data_nasc` =  '".$data_nasc."',
	`endereco` =  '".$endereco."',
	`numero` =  $numero, 
	`cidade` =  '".$cidade."',
	`uf` =  '".$uf."',
	`cep` =  '".$cep."'  
	WHERE  `usuarios`.`cod` =$cod;" ;
	
	 $query = mysql_query($sql) or die(mysql_error());
	 $i=0;
	 if ($query){ $i++;}

	 $sql="UPDATE  `professores` SET  
	`matricula` =  '".$matricula."',
	`ingresso` =  '".$ingresso."',
	`oficio` =  '".$oficio."',
	`categoria` =  '".$categoria."'
	WHERE  `professores`.`cod_usuario` =$cod;" ;
	
	 $query = mysql_query($sql) or die(mysql_error());
	
	 if ($query){ $i++;}
	 
	 if ($i==2){ echo "<h3>Dados Atualizados!</h3>";}
	 	else{ echo "<h3>Ocorreu um erro!</h3>";
	 		  echo  mysql_error();
	 		}

	require "desconecta.php";

	header("location:lista_professores.php");
}else{


if (!$_GET) header("location:index.php");//reencaminha se nada for enviado
	
  $cod=$_GET['c'];

  require "conecta.php";
  
  

  $query="SELECT * FROM professores LEFT JOIN (usuarios) ON (professores.cod_usuario=usuarios.cod) where usuarios.cod=$cod ORDER BY nome";
  $result=mysql_query($query);
  mysql_close();

  //print_r($result); die;

  $R=mysql_fetch_assoc($result);
  #die($R);

  
  require "desconecta.php";

		
		$nome=$R["nome"];
		$sobrenome=$R["sobrenome"];
		$matricula=$R["matricula"]; 
		$ingresso=$R["ingresso"];
		$data_nasc=$R["data_nasc"];
		$endereco=$R["endereco"];
		$numero=$R["numero"];
		$cidade=$R["cidade"];
		$uf=$R["uf"];
		$cep=$R["cep"];
		$oficio=$R["oficio"];
		$categoria=$R["categoria"];

	$title="Edita ".$nome;

	require "topo.php"; 

 ?>
	<style type="text/css">
		body{
			font-family: verdana, arial;
		}
		fieldset{
			text-align: right;
			width: 400px;
		}
		select{
			width: 150px;
		}
		legend{
			text-align: left;
		}
	
	</style>
	
	<form  method="post">
		<fieldset>
			<legend><h3>Editar Professor</h3></legend>
			Nome: 				<input value="<?php echo $nome; ?>" type="text" name="nome" required/><br>
			Sobrenome: 			<input value="<?php echo $sobrenome; ?>" type="text" name="sobrenome" required/><br>
			Data de nascimento: <input value="<?php echo $data_nasc; ?>" type="date" name="data_nasc" required/><br>
			Endereço: 			<input value="<?php echo $endereco; ?>" type="text" name="endereco" required/><br>
			Numero: 			<input value="<?php echo $numero; ?>" type="number" name="numero" required/><br>
			cidade: 			<input value="<?php echo $cidade; ?>" type="text" name="cidade" required/><br>
			uf: 			    <?php selectEstados("uf", $uf); //name="uf"?><br>
			CEP: 				<input value="<?php echo $cep; ?>" type="text" name="cep" required/><br>
			Matrícula: 			<input value="<?php echo $matricula; ?>" type="text" name="matricula" required/><br>
			Data de Ingresso: 	<input value="<?php echo $ingresso; ?>" type="date" name="data_ingresso" required /><br>
			Ofício: 			<input value="<?php echo $oficio; ?>" type="number" name="oficio" required/><br>

			
			Categoria: 			<?php selectCategorias("categoria",$categoria);	//name="categoria"?>

			<input value="<?php echo $cod; ?>" type="text" name="cod" required  style="display:none;"/>
			<br>			
			<input type="submit" value="Salvar alterações" />
		</form>
	<? require "rodape.php"; 
}

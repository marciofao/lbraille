<?php
if ($_POST) {//se esta mesma página enviou dados
	
	require "conecta.php";

	$nome=$_POST["nome"];
	$sobrenome=$_POST["sobrenome"];
	$matricula=$_POST["matricula"];
	$data_ingresso=$_POST["data_ingresso"];
	$data_nasc=$_POST["data_nasc"];
	$endereco=$_POST["endereco"];
	$numero=$_POST["numero"];
	$cidade=$_POST["cidade"];
	$uf=$_POST["uf"];
	$cep=$_POST["cep"];
	$obs=$_POST["obs"];
	$cod=$_POST["cod"];



/*$stm  = $pdo->prepare("UPDATE TABLE usuarios set nome=:nome WHERE cod=$cod ");
$stm->execute(array(':nome' => $nome));
$data = $stm->fetchAll();

//die(mysql_error());*/

	/*$sql="BEGIN
			  UPDATE  usuarios SET  
				nome =  `".$nome."`,
				sobrenome =  `".$sobrenome."`,
				data_nasc =  `".$data_nasc."`,
				endereco =  `".$endereco."`,
				numero =  $numero, 
				cidade =  `".$cidade."`,
				uf =  `".$uf."`,
				cep =  `".$cep."`   
		  WHERE usuarios.cod=$cod;";  */
	/*$query = "BEGIN";
	mysql_query($query) or die (mysql_error());*/

	$sql="UPDATE  usuarios SET  
			nome =  '".$nome."',
			sobrenome =  '".$sobrenome."',
			data_nasc =  '".$data_nasc."',
			endereco =  '".$endereco."',
			numero =  $numero, 
			cidade =  '".$cidade."',
			uf =  '".$uf."',
			cep =  '".$cep."' 
		  WHERE  `usuarios`.`cod` =$cod" ;
	
	 $query = mysql_query($sql) or die(mysql_error());

/*	 if ($query){ echo "<h3>Dados Atualizados!</h3>";}
	 	else{ echo "<h3>Ocorreu um erro!</h3>";
	 		  die(mysql_error());
	 		}
*/



	 //executa e verifica se foi executada
	if ($query){ //echo "<h3>Dados Atualizados!</h3>";

		 $sql="UPDATE  alunos SET  
			matricula =  '".$matricula."',
			data_ingresso =  '".$data_ingresso."',
			obs =  '".$obs."'
		  	WHERE  `alunos`.`cod_usuario` =$cod  LIMIT 1 ";

		$query = mysql_query($sql) or die(mysql_error());
		if ($query) {
			/*$query = "COMMIT";
			mysql_query($query) or die (mysql_error());*/
			header("location:lista_alunos.php?m=1");
		}
		else{ echo "<h3>Ocorreu um erro!</h3>";
 			 echo  mysql_error();
 			 /*mysql_query("ROLLBACK;")*/
		}

	}
	 	

	require "desconecta.php";
	
	

	
}else{


if (!$_GET) header("location:index.php");//reencaminha se nada for enviado
	
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
		$obs=$R["obs"];
//die($cep);		
//die($uf);

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
		legend{
			text-align: left;
		}
	
	</style>
	
	<form  method="post">
		<fieldset>
			<legend><h3>Dados do Aluno</h3></legend>
			<input value="<?php echo $cod; ?>" type="text" name="cod" required  style="display:none;"/>
			Nome: 				<input value="<?php echo $nome; ?>" type="text" name="nome" required/><br>
			Sobrenome: 			<input value="<?php echo $sobrenome; ?>" type="text" name="sobrenome" required/><br>
			Data de nascimento: <input value="<?php echo $data_nasc; ?>" type="date" name="data_nasc" required/><br>
			Endereço: 			<input value="<?php echo $endereco; ?>" type="text" name="endereco" required/><br>
			Numero: 			<input value="<?php echo $numero; ?>" type="number" name="numero" required/><br>
			Cidade: 			<input value="<?php echo $cidade; ?>" type="text" name="cidade" required/><br>
			Estado: 			<?php selectEstados("uf", $uf); ?> <!--  name="uf" --> <br>
			CEP: 				<input value="<?php echo $cep; ?>" type="text" name="cep" required/><br>
			
			Matrícula: 			<input value="<?php echo $matricula; ?>" type="text" name="matricula" required/><br>
			Data de Ingresso: 	<input value="<?php echo $data_ingresso; ?>" type="date" name="data_ingresso" required /><br>
			Observações: 	<input type="text" style="visibility:hidden"><br>
			<textarea name="obs" rows="4" cols="30" style="resize:none;"><?php echo $obs; ?></textarea><br>
			
			
			<input type="submit" value="Salvar alterações" />
		</fieldset>
		<br>
		
		<br>
		
	</form>
<? 
require "rodape.php"; 
}

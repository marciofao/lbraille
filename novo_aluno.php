<?php
	if ($_POST) {
		$matricula=$_POST['matricula'];
		$data_ingresso=$_POST['data_ingresso'];
		$obs=$_POST['obs'];
		$cod_usuario=$_POST['c'];
		/*echo "stop <br>";
		die($cod);*/
	    //echo $matricula."<br>";
	    //echo $data_ingresso."<br>";
	    //die;
		
		require "conecta.php";
	 	//require "sql.php";
	  	

	    /*$tabela='aluno';
	    $cols='cod_usuario,matricula,data_ingresso';
	    $dados="".$cod.",".$matricula.",'".$data_ingresso."'";  
	    //echo $dados;
	    insertMySQL ($tabela, $cols, $dados);
	    //print_r(mysql_insert_id());
	    *///$c=mysql_insert_id();

	    //GERADO PELO PHPMYADMIN:
	    /*
	    INSERT INTO  `lbraille`.`usuarios` (
		`cod` ,
		`nome` ,
		`sobrenome` ,
		`data_nasc` ,
		`login` ,
		`senha` ,
		`endereco` ,
		`numero` ,
		`cidade` ,
		`uf` ,
		`cep` ,
	    */
	    /*$stm  = $pdo->prepare("INSERT INTO  `usuarios` 
	    						(
									`cod_usuario` ,
									
									`matricula` ,
									`data_ingresso` ,
									`obs`
								)
								VALUES 
								(
									':cod_usuario' ,
									':alunos',  
									':matricula',  
									':data_ingresso',  
									':obs',  
								);"
	    					);
		$stm->execute(array(
								':cod_usuario' => $cod_usuario
								
								':matricula' => $matricula
								':data_ingresso' => $data_ingresso
								':obs' => $obs
							)
					);


		$data = $stm->fetchAll();*/

		//modo clássico:
		// gerado pelo phpyadmin
		//"INSERT INTO `lbraille`.`alunos` (`cod_usuario`, `alunos`, `matricula`, `data_ingresso`, `obs`) VALUES (\'3\', \'1\', \'234567\', \'\', \'qwqtrjhgnfbdsda\');"
		$sql="INSERT INTO  `alunos` 
	    						(
									`cod_usuario`,
									
									`matricula`,
									`data_ingresso`,
									`obs`
								)
								VALUES 
								(
									$cod_usuario ,
									
									'".$matricula."',  
									'".$data_ingresso."',
									'".$obs."'
								);
				";
		//die($sql);
			
		$query = mysql_query($sql);

		//FINALIZA A TRANSAÇÃO INICADA EM NOVO USUARIO:
		//mysql_query("COMMIT");
		//die($query);

		require "desconecta.php";
		if ($query) {
			header("location:lista_alunos.php");
		}else{
			echo "Erro:<br>	";
			die(mysql_error());
		}
	    
			

	}

?>

<!doctype html>
<html lang="pt-br">
<head>
	<meta charset="UTF-8">
	<title>Novo aluno</title>
</head>
<body>
	<form action="" method="post">     
		Matrícula: <input type="text" name="matricula" required/><br>
		Data de Ingresso: <input type="date" name="data_ingresso" required /><br>
		Observações:<br>
		<textarea name="obs" cols="30" rows="10"></textarea><br>
		<input type="text" name="c" value='<? echo $_GET["c"] ?>' style="display:none;" />
		
		<input type="Submit" value="Finalizar cadastro" />
	</form>
</body>
</html>
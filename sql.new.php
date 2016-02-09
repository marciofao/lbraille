<?php
//SELECT
function selectMySQL($tabela, $whereCol, $condition, $colOrderDesc){
//obrigatorio $colOrderDesc
	if($whereCol!=''){
		//echo $tabela.'<br>'.$whereCol.'<br>'.$condition.'<br>'.$colOrderDesc.'<br>';

		$sql="SELECT * FROM `".$tabela."` WHERE 1 `".$whereCol."` LIKE `".$condition."` ORDER BY `".$colOrderDesc."` DESC;";
		//echo $sql.'<br>';
		$query=mysql_query($sql);
		}
	else{
		$sql='SELECT * FROM `'.$tabela.'` ORDER BY `'.$colOrderDesc.'` DESC';
		//echo $sql;
		$query=mysql_query($sql) or die(mysql_error());
		}	
	$resultado=mysql_fetch_assoc($query);
	return $resultado;
		
}

//INSERT
function insertMySQL ($tabela, $cols, $dados){
//os valores devem estar entre aspas simples ''	e integer sem aspas.
//exemplo: $dados="'".$varchar."','".$text."',".$integer."";   
$sql = "INSERT INTO $tabela ($cols) VALUES ($dados);";
//echo $tabela.'<br>' ;
	$query = mysql_query($sql);
		if ($query){
			echo '<br /><h2>'.$tabela.' cadastrado com sucesso!</h2>';
			$result={true}
			return $result;
		}
		else{
			echo "<br /><h2>Não foi possível cadastrar ".$tabela."</h2><br>";
			$result={false, mysql_error();}	   
		}
	return $result
}
//UPDATE
function updateMySQL ($tabela, $col, $dado, $codn, $cod){
	 $sql="UPDATE $tabela SET $col=$dado WHERE $codn=$cod" ;
	
	 $query = mysql_query($sql);
	 
	 if ($query)
	 { echo '<br>A acoluna '.$col.' da tabela '.$tabela.' foi atualizada com sucesso!';}
	 else
	 { echo '<h1>Ocorreu algum erro, a Atualização em '.$tabela.' não pode ser efetuada!</h1><br>';  echo mysql_error(); return false;}
}
//DELETE
function deleteVariosPgSQL ($tabela, $colname, $wherecondition){
	for ($i=0;$i<count($wherecondition);$i++)
	{	
		$code=$wherecondition[$i];	
		$sql = "DELETE FROM $tabela WHERE $colname=$code";
		$query = mysql_query($sql);
		if ($query) {echo '<h3><br />Item de valor '.$colname.'='.$code.' excluido com sucesso!</h3>';}
		else {echo "<h1><br />Ocorreu um problema!</h1>";}
	}
	
		echo '<h3>'.count($wherecondition).' Item(s) removidos<br></h3>';
			
}
?>
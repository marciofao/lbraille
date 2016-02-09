<?php
//este php não exclui definitivamente os usuários do banco de dados, apenas os marca como inativos
if (!$_GET) header("location:index.php");//reencaminha se nada for enviado
	
  //pega o codigo do usuario enviado	
  $cod=$_GET['c'];

  include "conecta.php";
  
  $query="UPDATE `usuarios` SET `ativo`=0 WHERE `usuarios`.`cod` = $cod;";
  $result=mysql_query($query);
  
 
  //die($result);

  if (!$result) {//se nao funcionar a query
  	echo "erro:<br>";
  	die(mysql_error());//morrediabo
  }
   mysql_close();

  //verifica para onde enviar
  //die($l);
  switch ($_GET['l']) {
  	case 'alunos':
  		header("location:lista_alunos.php?m=2");
  		break;
  	case 'professores':
  		header("location:lista_professores.php?m=2");
  		break;
  	case 'usuarios':
  		header("location:lista_usuarios.php?m=55");
  		break;
  	default:
  		header("location:home.php?m=2");
  		break;
  }
?>

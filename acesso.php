<?php
@session_start();
	$login=$_POST['login'];
	$senha=$_POST['senha'];
	$lembra=$_POST['lembra'];

			/*echo'
				dados recebidos<br>
				email: '.$email.'<br>
				senha: '.$senha.'<br>
				lembra: '.$lembra.'<br>
			    ';*/

	require "conecta.php";

	$sql= "SELECT * FROM  `usuarios` WHERE  `login` LIKE  '".$login."' AND  `senha` LIKE  '".$senha."' LIMIT 0 , 30";
    $query = mysql_query($sql) or die ("problema ao verificar usuário");
	$resultado=mysql_num_rows($query);
	  if($resultado>0)
		{	
			$r=mysql_fetch_assoc($query);
			@session_start();
			
			if($lembra==1){
				setcookie('login', $login);
				setcookie('senha', $senha);
				setcookie('cod', $r['cod']);
				setcookie('nome', $r['nome']);
			   }
			$_SESSION["login"]=$login;
			$_SESSION["senha"]=$senha;
			$_SESSION["cod"]=$r['cod'];
			$_SESSION["nome"]=$r['nome'];
			/*echo'
				sessao iniciada<br>
				email: '.$_SESSION["email"].'<br>
				senha: '.$_SESSION["senha"].'<br>
			    ';*/
			//return false;	
			echo "<script>window.location='index.php'</script>
				  Se estiver lendo isto, clique <a href='index.php'>Aqui</a>";
			return false;
		}
		
	
	
	       echo '<div align="center"><font face="arial">
			        <h1>Usuário ou senha Incorretos!</h1></ br>
					<h2>Volte e tente novamente</h2></ font>
				  </ div>';
	
?>

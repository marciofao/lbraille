<?php $r = rand(1,1000); 
//forçar exibição de erros mesmo que o Servidor esteja configurado diferente:
//error_reporting(E_ALL);
//ini_set('display_errors', true);

require "conecta.php";
header("Content-Type: text/html; charset=utf-8",true) ;
	$data="";
	@session_start(); // Inicializa a sessão
	if ($_POST) {
		$login=$_POST['login'];
		$senha=$_POST['senha'];
		
		
		//$sql="SELECT * FROM usuarios WHERE usuarios.login=$login AND usuarios.senha=$senha";
	  	$sql= "SELECT * FROM  `usuarios` WHERE  `login` LIKE  '".$login."' AND  `senha` LIKE  '".md5($senha)."' LIMIT 0 , 30";
	    $query = mysql_query($sql)  or die (mysql_error());
		$row_count=mysql_num_rows($query);
	    $r=mysql_fetch_assoc($query);

	    //var_dump($r);
	    //die("finalizou query");

	    if($row_count){	//se foi encontrados registros
			

			if ($r['ativo']) {
				@session_start();
			
				/*if($lembra==1){//se foi marcado para lembrar do login e senha
					setcookie('login', $login);
					setcookie('senha', $senha);
					setcookie('cod', $r['cod']);
					setcookie('nome', $r['nome']);
				   }
				*/
				$_SESSION["login"]=$login;
				//$_SESSION["senha"]=$senha;
				$_SESSION["cod"]=$r['cod'];
				$_SESSION["nome"]=$r['nome'];
				$_SESSION["categoria"]=$r['categoria'];
				
			}else{
					$data="Usuário ou senha incorretos!";
			}
		}// encontrado registros
		else{ //se não encontrar registros
			$data="Usuário ou senha incorretos!";
		}
	}//POST
	
	//if (isset($_SESSION["login"],$_SESSION["senha"])) {
	if (isset($_SESSION["login"])) {
		$title="Louis Braille";
		$m="";
		require "topo.php";
		require "home_content.php";
		//O rodapé é fechado no fim do laço IF
	}
	else{#exibe tela de login

		?>
		<!doctype html>
		<html lang="pt-br">
		<head>
			<meta charset="UTF-8">
			<title>Home</title>
			<link rel="shortcut icon" type="image/x-icon" href="/favicon.ico">
			<link rel="stylesheet" href="css/home.css?=<?php echo $r; ?>">
		</head>
		<body>
		<?
		if ($_POST) {
			if($_GET['c']){#exibe mensagem caso tenha sido redirecionado para cá
				?>
					<div id="msg">
						Você precisa se identificar para acessar a área administrativa!
					</div>
				<?
			}
		}
	 	?>
			<div id="login">
				<img src="img/logo_braille.jpg" alt=""  width="200px"> 
				<div align="left"></div>
					<?php 
						if($data){//se data tiver conteúdo
							?>
							<div class="data">
								<?php  echo $data; ?>
							</div>
							<?php
						}
					 ?>
				<form method="post">
					Login: <br>
					<input type="text" name="login"> <br>
					Senha: <br>
					<input type="password" name="senha"> <br>
					<input type="submit" value="entrar"> <br>
					<a href="recupera_senha.php">Esqueci a senha</a>	 <br>
					<a href="novo_login.php">Quero me cadastrar</a>
				</form>
				
			</div>
		<?php
	}
	
require "rodape.php";
?>
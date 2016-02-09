<?php 
//forçar exibição de erros mesmo que o Servidor esteja configurado diferente:
//error_reporting(E_ALL);
//ini_set('display_errors', true);
	require "snippets.php";
	require "verifica.php";

	if (!$title) {
		$title="Louis Braille";
	}

$r = rand(1,1000);

?>
<!doctype html>
<html lang="Pt-br">
<head>
	<meta http-equiv="Content-Type" content="text/html" charset="UTF-8"/>
	<link rel="shortcut icon" type="image/x-icon" href="img/favicon.ico">
	<title><?php echo $title ?></title>
	<!-- Para funcionar a tabela ordenável (sorttable)-->
	<link rel="stylesheet" href="js/sorttable.css">
	<script src="js/sorttable.js"></script>
	<!---->
	<script src="js/getIdade.js"></script>
	<script src="js/getCategoriaProfessor.js"></script>
	<script src="js/ativaReativa.js"></script>
	
	<link rel="stylesheet" href="css/cabecalho.css">
	<link rel="stylesheet" href="css/normalize.css?=<?php echo $r; ?>">
	<link rel="stylesheet" href="css/style.css?=<?php echo $r; ?>">
	<link rel="stylesheet" href="css/tablet.css?=<?php echo $r; ?>" media="only screen and (max-width: 980px)">
	<link rel="stylesheet" href="css/mobile.css?=<?php echo $r; ?>" media="only screen and (max-width: 700px)">
</head>
<body>

<div id="cabecalho">
			
	<a href="index.php">
		<img src="img/logo_braille_tiny.png" alt="Louis Braille Escola para deficientes Visuais" align="center" height="50px" alt="Logo escola Louis Braille" >
	</a>
	<?php 
	$categ=botoesUsuario($_SESSION['categoria']);
	 ?>
	
</div>
<div id="usuario">
	Conectado como: 
	<a href="perfil.php?c=<?php echo $_SESSION["cod"]; ?>">
		<?php echo $_SESSION["nome"];  ?>
		[
		<?php 
		#die($categ);
			echo $categ;
		?>
		]
	</a>	-
	<a href="sair.php">
		Sair
	</a>
	<?php 
	//var_dump($_SESSION);
	 ?>
</div>
<!--
<div class="pagewidth">	
-->
<div align="center">	</div>

	<?php 	
		require "mensagem.php";
	 ?>
<br>





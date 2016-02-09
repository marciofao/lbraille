<?php
@session_start(); // Inicializa a sessão

if (! isset($_SESSION["login"]))
{
	//header("location: home.php?c=1");
?> 
   <html>
   		<head><script>window.location='home.php?c=1'</script>
   			<title>Redirecionando</title>
   		</head>
   <body>
   	<h1>
	   	Você não deveria estar aqui sem se identificar<br />
	   	Se não for redirecionado, <a href="home.php?c=1">clique aqui</a>
	   </h1>
   </body>
   </html>
<?php 
die;
}


?>
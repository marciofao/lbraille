<?php
@session_start(); // Inicializa a sessão
if (! isset($_SESSION["login"],$_SESSION["senha"]))
{
	header("location:home.php?c=1");
?> 
   <html>
   		<head><script>window.location='index.php'</script>
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
/////////aspjhdñaklshdñHAPSIDHAPSIDHPAISHDPAIHDS
die;
}


?>
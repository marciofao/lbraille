<?php
include "conecta.php";
@session_start();

if ($_POST){
	$email=$_POST['email'];
	$texto=$_POST['texto'];
	$cod=$_GET['cod'];
	if (isset($_SESSION["login"],$_SESSION["senha"])){
	$codusuario=$_SESSION['cod'];} else {$codusuario='NULL';}
	$data=date("dd/mm/aa");
	$email=$_POST['email'];
	if($email!==''){$anonimo=1; $codusuario='NULL';}else{$anonimo=0;}
	

$cols='`cod` ,`codpost` ,`codusuario` ,`texto` ,`enabled` ,`data` ,`anonimo` ,`emailanonimo`';
$dados="NULL,'".$cod."','".$codusuario."','".$texto."','1','".$data."','".$anonimo."','".$email."'";
$sql="INSERT INTO  `blog`.`comentarios` (".$cols.") VALUES (".$dados.")";
$query=mysql_query($sql) or die(mysql_error());
}
    if ($_GET){
	$cod=$_GET['cod'];
	
	//$nomeblog=selectMySQL("usuario", "cod", $cod, "data");
	$sql='SELECT * FROM  `posts` WHERE  `cod` ='.$cod.' LIMIT 0 , 30';
	$query=mysql_query($sql) or die(mysql_error());
	$r=mysql_fetch_assoc($query);
?> 
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title><?php echo $r['titulo']; ?></title>
</head>

<body>
<? 

	if (isset($_SESSION["login"],$_SESSION["senha"]))
	{$cookieativo=true;
	?> Conectado como: <b><?php echo $_SESSION["nome"] ?></b> - <a href="sair.php">sair</a>
		<br />
		<a href="index.php">Inicio</a> -  <a href="blog.php?cod=<?php echo $_SESSION["cod"] ?>">Meu blog</a>
	<?
	}else{$cookieativo=false;} ?>

<div>
<?php
    $sql='SELECT * FROM  `usuarios` WHERE  `cod` ='.$cod.' LIMIT 0 , 30';
	$query=mysql_query($sql) or die(mysql_error());
	$r2=mysql_fetch_assoc($query);

 ?>
<table border="1px">
     <?
	 if($cookieativo){
		 if($_SESSION['cod']==$r['codusuario']){
			 ?><tr><td><a href="excluir.php?codpost=<?php echo $r['cod']; ?>">Excluir postagem</a></td></tr><?
		 }
	 }
	 ?>
	<tr><td><img src="img/<?php echo $r2['foto']; ?>" height="50px" width="50px"></td></tr>
	<tr><td>Autor: <?php echo $r2['nome']; ?></td></tr>
	<tr><td><?php echo $r['data']; ?></td></tr>
	<tr><td><?php echo $r['texto']; ?></td></tr>
</table>
</div>
<br />


Comentários:<br />
<?php  

    //while($r=selectMySQL("comentarios", "codpost", $post, "data")){
	//if($r['enabled']){ 
	//$nome=selectMySQL("usuarios", "cod", $r['cod'], "nome") 
    
	$sql='SELECT * FROM  `comentarios` WHERE  `codpost` ='.$cod.' LIMIT 0 , 30';
	$query=mysql_query($sql) or die(mysql_error());
	$r3=mysql_fetch_assoc($query);
	
	$sql='SELECT `nome` FROM  `usuarios` WHERE  `cod` ='.$r3['codusuario'].' LIMIT 0 , 30';
	$query=mysql_query($sql) or die(mysql_error());
	$r4=mysql_fetch_assoc($query);
	
	if($r4!=NULL){
	?>
	<table id="comentarios" border="1px">
    <tr><td><img src="img/<?php echo $r4['foto']; ?>" height="50px" width="50px"></td></tr>
	<tr><td><?php echo $r4['nome']; ?></td></tr>
	<tr><td><?php echo $r3['texto']; ?></td></tr>
    <tr><td><?php echo $r3['data']; ?></td></tr>
<?    	 if($cookieativo){
		    if($_SESSION['cod']==$r3['codusuario']){
			 ?><tr><td><a href="excluir.php?codcoment=<?php echo $r3['cod']; ?>">Excluir comentario</a></td></tr><?
	}else { ?> Nenhum comentário ainda... <? }
			 }
		 } ?>

	</table>
    <br />
    <br />
    Deixe seu comentário:<br>
    <form action="post.php?cod=<? echo $_GET['cod']; ?>" method="post">
    	<textarea name="texto" required></textarea><br>
        Email: <input type="text" name="email"> (somente para postagens anonimas) <br>
        <input type="submit" value="Comentar">
    </form>
    
    
<?php
	//}



?>
</body>
</html>	<?php 

}else{
	?>
    <html>
   <head><script>window.location='index.php'</script>
   	<title>Redirecionando</title></head>
   <body>
   <h1>Nada foienviado...<br />
   		Se não for redirecionado, <a href="index.php">clique aqui</a>
   </h1>
   </body>
   </html>
    <?php
 } 
 
 ?>

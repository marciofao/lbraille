<?php 
$cod=$_GET['c'];

if ($_POST) {
	$matricula=$_POST['matricula'];
	$ingresso=$_POST['ingresso'];
	$oficio=$_POST['oficio'];
	$categoria=$_POST['categoria'];

 	require "conecta.php";

 	$tabela='professor';
    $cols='cod_usuario,matricula,ingresso,oficio,categoria';
    $dados="'".$cod."',".$matricula.",'".$ingresso."','".$oficio."',".$categoria."";  
    insertMySQL ($tabela, $cols, $dados);
    //print_r(mysql_insert_id());
    #die;
   	

    header("location:lista_professores.php");
}else{
?>

<!doctype html>
<html lang="pt-br">
<head>
	<meta charset="UTF-8">
	<title>Novo usuário</title>
</head>
<body>
	<form action="novo_professor.php?c=<?php echo $cod; ?>" method="post">     
		Matrícula: <input type="number" name="matricula" required /><br>
		Ingresso: <input type="date" name="ingresso" required /><br>
		Ofício: <input type="number" name="oficio" required /><br>
		Categoria: <?php selectCategorias("categoria",$categoria=="");	//name="categoria"?>
		<input type="Submit" value="Concluir" />
	</form>
</body>
</html>
<?php 
}
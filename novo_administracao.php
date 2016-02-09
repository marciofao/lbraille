<!doctype html>
<html lang="pt-br">
<head>
	<meta charset="UTF-8">
	<title>Novo usuário</title>
</head>
<body>

	<form action="insert.php" method="post">     
		Nome: <input type="text" name="nome" /><br>
		Sobrenome: <input type="text" name="sobrenome" /><br>
		Endereço: <input type="text" name="endereco" /><br>
		Numero: <input type="text" name="numero" /><br>
		cidade: <input type="text" name="cidade" /><br>
		estado: <input type="text" name="estado" /><br>
		cep: <input type="text" name="cep" /><br>
		<select name="tipo" id="">
			<option value="">...</option>
			<option value="1">Aluno</option>
			<option value="2">Professor</option>
			<option value="3">Administração</option>
		</select>
		<input type="Submit" value="Proximo" />
	</form>
	<?php 
	include "rodape.php";
	 ?>
</body>
</html>
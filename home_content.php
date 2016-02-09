<?php 
	//pega a quantidade de registros de cada tabela
  	$usativ=mysql_numrows(mysql_query("SELECT * FROM usuarios WHERE ativo=1"));
  	$alunos=mysql_numrows(mysql_query("SELECT * FROM v_usuario_aluno WHERE ativo=1"));
  	$professores=mysql_numrows(mysql_query("SELECT * FROM professores"));
  	$admin=mysql_numrows(mysql_query("SELECT * FROM usuarios WHERE ativo=1 and categoria=1"));
  	$coord=mysql_numrows(mysql_query("SELECT * FROM usuarios WHERE ativo=1 and categoria=2"));
  	mysql_close();
 ?>

<style>
	td{
		text-align: left;
	}
</style>
<h2>
	Estatísticas do Sistema:

	<h3>
		Usuários ativos: <?php echo $usativ ?>
	</h3>

	<table>
		<tr>
			<td>Administradores:</td>
			<td> <?php echo $admin ?></td>
		</tr>
		<tr>
			<td>Coordenação:</td>
			<td><?php echo $coord ?></td>
		</tr>
		<tr>
			<td>Professores: </td>
			<td><?php echo $professores ?></td>
		</tr>
		<tr>
			<td>Alunos:</td>
			<td><?php echo $alunos ?></td>
		</tr>
		
	</table>
	
	 

</h2>

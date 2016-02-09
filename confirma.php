<?php
if (!$_GET) header("location:index.php");//reencaminha se nada for enviado

$cod=$_GET['c'];



  //require "sql.php";
require "conecta.php";

$query="SELECT * FROM usuarios LEFT JOIN (alunos) ON (alunos.cod_usuario=usuarios.cod) WHERE usuarios.cod=$cod";
$result=mysql_query($query);
  //print_r($result);
  //die;
$R=mysql_fetch_assoc($result);

require "desconecta.php";
  // require "inlcudes_comuns.php"; 

$nome=$R["nome"];
$snome=$R["sobrenome"];
$data_nasc=$R["data_nasc"];
$endereco=$R["endereco"];
$numero=$R["numero"];
$cidade=$R["cidade"];
$estado=$R["estado"];
$cep=$R["cep"];
$matricula=$R["matricula"];

$cat=$R["categoria"];

		//decide qual pagina encaminhar depois de excluir
		if($cat==1 || $cat==4){ // admin e coordenação escola
			$l = "usuarios";
		}
		if($cat==2){ // Aluno
			$l = "alunos";
		}
		if($cat==3){ // Professor
			$l = "professores";
		}


		$title="Excluir ".$nome;



		require "topo.php";



		?>
		<h3>Voce tem certeza que deseja excluir este aluno?</h3>
		<font face="Arial, Helvetica, sans-serif">
			<b>Nome:</b> <?php echo $nome." ".$snome; ?> <br>
			<b>Data de Nascimento:</b> <?php echo $data_nasc; ?> <br>
			<b>Endereço:</b> <?php echo $endereco.", ".$numero; ?> <br>
			<b>Cidade:</b> <?php echo $cidade; ?> <br>
			<b>Estado:</b> <?php echo $estado; ?> <br>
			<b>CEP:</b> <?php echo $cep; ?> <br>
			<b>Matricula:</b> <?php echo $matricula; ?> <br>	
		</font>
		<a href="exclui_usuario.php?c=<? echo $cod ?>&amp;l=<? echo $l ?>" ><h3>Confirmar Exclusão</h3></a>
	</form>

</body>
</html>
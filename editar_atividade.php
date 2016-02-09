
<?php 
	require "conecta.php";
	$title="Edita Atividade";
	require "topo.php";
	$cod=$_GET['c'];
	$cod_prof=$_GET['cd'];

if ($_POST) {
	//ETA GAMBIARRA MEDONHA -- converte Array para CSV
	$dias="";
	foreach($_POST['dia'] as $check) {
            $dias=$dias.$check.","; 
    }
    $dias=rtrim($dias, ",");

    $nome=$_POST['nome'];

   //die($dias);
   //die($cod);
   $sql="UPDATE atividades SET  
	nome='".$nome."',
	dias='".$dias."'
	WHERE  cod=$cod";

	//die($sql);
	
	$query = mysql_query($sql) or die(mysql_error());



	 $sql="UPDATE  atividade_professor SET  
		cod_professor=$cod_prof
		WHERE  cod_atividade=$cod";

	$query = mysql_query($sql) or die(mysql_error());
	 
	include "desconecta.php";
    header("location:lista_atividades.php?m=1");

}else{


if (!$_GET) header("location:home.php");//reencaminha se nada for enviado
	
  

 
  
  //$query="SELECT * FROM usuarios LEFT JOIN (usuario) ON (alunos.cod_usuario=usuarios.cod) WHERE aluno.cod_usuario=$cod";
  $query="SELECT * FROM atividades WHERE cod=$cod;";
  $result=mysql_query($query);
  //print_r($result);
  //die;
  $R=mysql_fetch_assoc($result);
  
 
		
		$nome=$R["nome"];

		$diass=$R["dias"];
			
		#die($dias);
	//GAMBIARRA MEDONHA -- converte verifica CSV e imprime check se o dia está contido
	function check($nome_do_dia, $dias){
			if (substr($dias, strpos($dias, $nome_do_dia), 3)==$nome_do_dia) 
				echo "checked ";
		}
		//$r_dias=
		
?>
	<form action="" method="post">     
		Nome: <input type="text" name="nome" value="<?php echo $nome ?>" required /><br>
		Dias da semana: <br>
		<input type="checkbox" name="dia[]" value="seg" <?php check('seg', $diass) ?>/>Segunda-Feira<br>
		<input type="checkbox" name="dia[]" value="ter" <?php check('ter', $diass) ?>/>Terça-Feira<br>
		<input type="checkbox" name="dia[]" value="qua" <?php check('qua', $diass) ?>/>Quarta-Feira<br>
		<input type="checkbox" name="dia[]" value="qui" <?php check('qui', $diass) ?>/>Quinta-Feira<br>
		<input type="checkbox" name="dia[]" value="sex" <?php check('sex', $diass) ?>/>Sexta-Feira<br>
		Professor: <?php selectProfessores("professor",$cod_prof) ?><br>
		<input type="Submit" value="Salvar" />
	</form>

<?php 
}
require "rodape.php"
?>


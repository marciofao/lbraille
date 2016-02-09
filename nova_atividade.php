<?php 
if ($_POST) {
    //ETA GAMBIARRA MEDONHA -- converte Array para CSV
	$dias="";
	foreach($_POST['dia'] as $check) {
            $dias=$dias.$check.","; 
    }
    $dias=rtrim($dias, ",");

    $nome=$_POST['nome'];
    $professor=$_POST['professor'];
    //die($dias);
    include "sql.php";
  	include "conecta.php";

    $tabela='atividades';
    $cols='nome,dias';
    $dados="'".$nome."','".$dias."'";  
    //echo $dados;
    insertMySQL ($tabela, $cols, $dados);
    //print_r(mysql_insert_id());
    $c=mysql_insert_id();
    /*echo mysql_error();
    echo "\n";
    die($c);*/

    $tabela='atividade_professor';
    $cols='cod_professor,cod_atividade';
    $dados="".$professor.",".$c."";  
    //echo $dados;
    insertMySQL ($tabela, $cols, $dados);
    
    include "desconecta.php";
    header("location:lista_atividades.php?m=1");

}

 include "conecta.php";
$title="Nova Atividade";
 require "topo.php";
?>
	<form action="" method="post">     
		Nome: <input type="text" name="nome" required /><br>
		Dias da semana: <br>
		<input type="checkbox" name="dia[]" value="seg"/>Segunda-Feira<br>
		<input type="checkbox" name="dia[]" value="ter"/>Terça-Feira<br>
		<input type="checkbox" name="dia[]" value="qua"/>Quarta-Feira<br>
		<input type="checkbox" name="dia[]" value="qui"/>Quinta-Feira<br>
		<input type="checkbox" name="dia[]" value="sex"/>Sexta-Feira<br>
		Professor: <?php selectProfessores("professor","") ?><br>
		<input type="Submit" value="Salvar" />
	</form>

<?php 

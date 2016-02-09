<?php
if ($_POST) {
	$matricula=$_POST['matricula'];
	$data_ingresso=$_POST['data_ingresso'];
	$cod=$_POST['c'];
    
    //echo $matricula."<br>";
    //echo $data_ingresso."<br>";
    //die;
	
 	include "sql.php";
  	include "conecta.php";

    $tabela='aluno';
    $cols='cod_usuario,matricula,data_ingresso';
    $dados="".$cod.",".$matricula.",'".$data_ingresso."'";  
    //echo $dados;
    insertMySQL ($tabela, $cols, $dados);
    //print_r(mysql_insert_id());
    //$c=mysql_insert_id();
    include "desconecta.php";
    header("location:lista_alunos.php");

}

?>
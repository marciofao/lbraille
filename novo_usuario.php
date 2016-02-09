<?php
if ($_POST) {
	$nome=$_POST['nome'];
	$sobrenome=$_POST['sobrenome'];
	$data_nasc=$_POST['data_nasc'];
	$endereco=$_POST['endereco'];
	$numero=$_POST['numero'];
	$cidade=$_POST['cidade'];
	$uf=$_POST['uf'];
	$cep=$_POST['cep'];
	$tipo=$_POST['tipo'];
	$ativo=1;
	//die($nome);
 	require "sql.php";
  	require "conecta.php";

  	//INICIA A TRANSAÇÃO
  	//mysql_query("BEGIN");

    $tabela='usuarios';
    $cols='nome,sobrenome,data_nasc,endereco,numero,cidade,uf,cep,ativo';
    $dados="'".$nome."','".$sobrenome."','".$data_nasc."','".$endereco."',".$numero.",'".$cidade."','".$uf."',".$cep.",".$ativo."";  
    insertMySQL ($tabela, $cols, $dados);
    //print_r(mysql_insert_id());
    $c=mysql_insert_id();
    require "desconecta.php";

    switch ($tipo) {
    	case '1':
    		$t="novo_aluno.php";
    		break;    	
    	case '2':
    		$t="novo_professor.php";
    		break;
    	case '3':
    		$t="lista_usuarios.php";
    		break;
    }
    header("location:".$t."?c=".$c."");

}


  $title="Novo Usuario";
  
  require "topo.php"; 

?>
	<style>
		fieldset{
			text-align: right;
			width: 400px;
		}
		legend{
			text-align: left;
		}
		input, select{
			width: 150px;
		}
	</style>
	<h3><?php echo $title ?></h3>
	<form method="post">    
		<fieldset>
			<legend><h3>Seus dados</h3></legend> 
			Nome: <input type="text" name="nome" required/><br>
			Sobrenome: <input type="text" name="sobrenome" required/><br>
			Data de nascimento: <input type="date" name="data_nasc" required/><br>
			Endereço: <input type="text" name="endereco" required/><br>
			Numero: <input type="number" name="numero" required/><br>
			Cidade: <input type="text" name="cidade" required/><br>
			Estado: <select name="uf" required>
						<option >...</option>
					    <option value="AC">Acre</option>
					    <option value="AL">Alagoas</option>
					    <option value="AM">Amazonas</option>
					    <option value="AP">Amapá</option>
					    <option value="BA">Bahia</option>
					    <option value="CE">Ceará</option>
					    <option value="DF">Distrito Federal</option>
					    <option value="ES">Espirito Santo</option>
					    <option value="GO">Goiás</option>
					    <option value="MA">Maranhão</option>
					    <option value="MG">Minas Gerais</option>
					    <option value="MS">Mato Grosso do Sul</option>
					    <option value="MT">Mato Grosso</option>
					    <option value="PA">Pará</option>
					    <option value="PB">Paraíba</option>
					    <option value="PE">Pernambuco</option>
					    <option value="PI">Piauí</option>
					    <option value="PR">Paraná</option>
					    <option value="RJ">Rio de Janeiro</option>
					    <option value="RN">Rio Grande do Norte</option>
					    <option value="RS">Rio Grande do Sul</option>
					    <option value="RO">Rondônia</option>
					    <option value="RR">Roraima</option>
					    <option value="SC">Santa Catarina</option>
					    <option value="SE">Sergipe</option>
					    <option value="SP">São Paulo</option>
					    <option value="TO">Tocantins</option>
					</select>
			<br>
			CEP: <input name="cep" max="99999999"required/><br>
			Tipo:<select name="tipo"  required>
			        <option value="">Selecione</option>
					<option value="1">Aluno</option>
					<option value="2">Professor</option>
					<option value="3">Administração</option>
				</select> <br>
			<input type="Submit" value="Proximo" />
		</fieldset>
	</form>
<?php 
	require "rodape.php";
?>
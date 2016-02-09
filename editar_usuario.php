
<?php 
@session_start();
require "conecta.php";
$title="Edita ".$_SESSION['nome'];
require "topo.php";
?>

<?php
if ($_POST) {//se esta mesma página enviou dados
	
	$cod=$_POST['cod'];
	//$senha=$_POST['senha'];
	$nome=$_POST["nome"];
	$sobrenome=$_POST["sobrenome"];
	$matricula=$_POST["matricula"];
	$data_ingresso=$_POST["data_ingresso"];
	$data_nasc=$_POST["data_nasc"];
	$endereco=$_POST["endereco"];
	$numero=$_POST["numero"];
	$cidade=$_POST["cidade"];
	$uf=$_POST["uf"];
	$cep=$_POST["cep"];
	$matricula=$_POST["matricula"];
	//$senhanova=$_POST['senhanova'];
	//$confirmacao=$_POST['confirmacao'];

	// die(mb_check_encoding($senhanova, 'UTF-8') ? 'okay' : 'nope');

	

	$query="SELECT senha FROM usuarios WHERE cod=$cod;";
	$result=mysql_query($query);
	$R=mysql_fetch_assoc($result);
	
	$updatesenha="";
	
	/*//validação de senhas
	if ($R['senha']!=md5($senha)) {//para alterar dados necessita senha
		echo "<h3>Senha incorreta!</h3>";
		die;
	}

	

	if ($senhanova) {  //se foi inserido uma nova senha
		if ($senhanova!=$confirmacao) {
		echo "<h3>Senhas não conferem!</h3>";
		die;
		}
		$senhanova=md5($senhanova);
		$updatesenha=", `senha` =  '".$senhanova."' ";
	}*/

	
	$sql="UPDATE  usuarios SET  
	nome =  '".$nome."',
	sobrenome =  '".$sobrenome."',
	data_nasc =  '".$data_nasc."',
	endereco =  '".$endereco."',
	numero =  $numero, 
	cidade =  '".$cidade."',
	uf =  '".$uf."',
	cep =  '".$cep."'  
	".$updatesenha."
	WHERE  `usuarios`.`cod` =$cod;" ;
	
	$query = mysql_query($sql) or die(mysql_error());
	if ($query){ echo "<h3>Dados Atualizados!</h3>";}
	else{ echo "<h3>Ocorreu um erro!</h3>";
	echo  mysql_error();
}

require "desconecta.php";

	//header("location:lista_alunos.php");
}else{


if (!$_GET) header("location:home.php");//reencaminha se nada for enviado

$cod=$_GET['c'];

require "conecta.php";

  //$query="SELECT * FROM usuarios LEFT JOIN (usuario) ON (alunos.cod_usuario=usuarios.cod) WHERE aluno.cod_usuario=$cod";
$query="SELECT * FROM usuarios WHERE cod=$cod;";
$result=mysql_query($query);
  //print_r($result);
  //die;
$R=mysql_fetch_assoc($result);

require "desconecta.php";


$nome=$R["nome"];
$sobrenome=$R["sobrenome"];
$data_nasc=$R["data_nasc"];
$login=$R["login"];
$endereco=$R["endereco"];
$numero=$R["numero"];
$cidade=$R["cidade"];
$uf=$R["uf"];
$cep=$R["cep"];
$senha=$R["senha"];

		//nao necessario para usuario admin, somente para aluno

$matricula=$R["matricula"];
$data_ingresso=$R["data_ingresso"];
$matricula=$R["matricula"];

?>
<script type="text/javascript">
	function esconde(){
		document.getElementById("muda").style.visibility="visible";
		document.getElementById("altera").style.display="none";
		//esvazia campos ocultos para evitar envio
		document.getElementById("1").value="";
		document.getElementById("2").value="";

	}
	function exibe(){
		document.getElementById("muda").style.visibility="hidden";
		document.getElementById("altera").style.display="block";
		

	}
</script>
<style type="text/css">
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

<form  method="post">
	<fieldset>
		
		<?php 
		
		$titulo = "Dados do usuário";
		$mesmo = 0;
		if ($_SESSION["cod"]==$cod) { //veriica se o usuário da sessao atual é o mesmo das inormações no formulario
			$titulo = "Seus dados";
			$mesmo = 1;
		}
		?>

		<legend>
			<h3>
				<?php 	echo $titulo; ?>	

			</h3>
		</legend>
		<input value="<?php echo $cod; ?>" type="text" name="cod" required  style="display:none;"/>
		Nome: 				<input value="<?php echo $nome; ?>" type="text" name="nome" required/><br>
		Sobrenome: 			<input value="<?php echo $sobrenome; ?>" type="text" name="sobrenome" required/><br>
		Login:				<input value="<?php echo $login; ?>" type="text" name="login" required/><br>
		Data de nascimento: <input value="<?php echo $data_nasc; ?>" type="date" name="data_nasc" required/><br>
		Endereço: 			<input value="<?php echo $endereco; ?>" type="text" name="endereco" required/><br>
		Numero: 			<input value="<?php echo $numero; ?>" type="number" name="numero" required/><br>
		Cidade: 			<input value="<?php echo $cidade; ?>" type="text" name="cidade" required/><br>
		Estado: 			<select name="uf" required >
		<?
		$estados = array(
			"AC"=>"Acre",
			"AL"=>"Alagoas",
			"AM"=>"Amazonas",
			"AP"=>"Amapá",
			"BA"=>"Bahia",
			"CE"=>"Ceará",
			"DF"=>"Distrito Federal",
			"ES"=>"Espirito Santo",
			"GO"=>"Goiás",
			"MA"=>"Maranhão",
			"MG"=>"Minas Gerais",
			"MS"=>"Mato Grosso do Sul",
			"MT"=>"Mato Grosso",
			"PA"=>"Pará",
			"PB"=>"Paraíba",
			"PE"=>"Pernambuco",
			"PI"=>"Piauí",
			"PR"=>"Paraná",
			"RJ"=>"Rio de Janeiro",
			"RN"=>"Rio Grande do Norte",
			"RS"=>"Rio Grande do Sul",
			"RO"=>"Rondônia",
			"RR"=>"Roraima",
			"SC"=>"Santa Catarina",
			"SE"=>"Sergipe",
			"SP"=>"São Paulo",
			"TO"=>"Tocantins"
			);
		foreach ($estados as $key => $value) {
			?>
			<option value="<?echo $key; ?>" <? if ($key==$uf) echo "selected"; ?>>
				<?echo $value; ?></option>
				<?
			} //
			?>
		</select><br>
		CEP: 				<input value="<?php echo $cep; ?>" type="text" name="cep" required/><br>
		<?php 
			/*
			Matrícula: 			<input value="<?php echo $matricula; ?>" type="text" name="matricula" required/><br>
			Data de Ingresso: 	<input value="<?php echo $data_ingresso; ?>" type="date" name="data_ingresso" required /><br>
			*/
			$required = ''; //por padrão o campo de senha não é requerido
			if ($mesmo) { //se usuario editando é o mesmo do formulario, oculta a senha e exige senha para editar
				$senha = '';
				$required = 'required';
			}
				?>

				Senha Atual: 		<input type="password" name="senha" value="<?php 	echo $senha; ?>" <?php 	echo $required; ?> /><!-- é validado via php, espertinho! --><br>
			<?php if ($mesmo) { //se for mesmo usuario oferece opção "mudar senha"   ?>

				<a id="muda" href="javascript:exibe()">mudar senha</a>
				<div id="altera" style="display:none;">
					<a href="javascript:esconde()">cancelar mudança de senha</a><br>
					Nova Senha: 		<input id="1" type="password" name="senhanova"/><br>
					Confirma Senha: 	<input id="2" type="password" name="confirmacao"/><br>
				</div>

				<input name="mesmo" style="display:none;" value="<?php 	echo $mesmo; ?>"> <!-- campo oculto para informar se é o mesmo usuario -->

			<?php
			}




			?>

			<br>
			<br>
			<input type="submit" value="Salvar alterações" />
		</fieldset>
		<br>
		
		<br>
		
	</form>

	<?php 
}
require "rodape.php"
?>


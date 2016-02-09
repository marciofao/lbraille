<?php 

function selectCategorias($name, $categ){ 
	?>
	<select name="<? echo $name; ?>" id="">
		<option <? 	if($categ==1) echo " selected " ;?> value="1">Ofício</option>';
		<option <? 	if($categ==2) echo " selected " ;?> value="2">Efetivo</option>';
		<option <? 	if($categ==3) echo " selected " ;?> value="3">Cedido</option>';
	</select>
	<?
	exit();
}

function selectEstados($name, $uf){
	?>
	<select name="<?php echo $name ?>" required >
		<?
		$ufs = array(
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
		foreach ($ufs as $key => $value) {
			?>
			<option name="<?php echo $name; ?>" value="<?echo $key; ?>" <? if ($key==$uf) echo "selected"; ?>>
				<?echo $value; ?></option>
				<?
			}
			?>
		</select>
		<?
		exit();
	}
	

	$categorias=array( //Manter fora da função botoesUsuario pois é utilizada em editar_usuario.php
			1 =>'Administrador',
			2 =>'Aluno',
			3 =>'Professor',
			4 =>'Coordenação Escola'
		);
	function botoesUsuario($cat){
		//die("entrou em botoesUsuario");
		//categorias de usuários:
			
			?>
			<navegacao>
				<botao><a href="home.php">Home</a></botao>
				<?php  
		if($cat==1 || $cat==4){ // admin e coordenação escola
			?>
			<botao><a href="lista_alunos.php">Alunos</a></botao>
			<botao><a href="lista_professores.php">Professores</a></botao>
			<botao><a href="lista_atividades.php">Atividades</a></botao></botao>
			<?php  
		}
		if($cat==1){ // admin apenas
			?>
			<botao><a href="lista_usuarios.php">Usuários</a></botao>
			<botao><a href="lista_locais.php">Locais</a></botao>
			<?php  
		}
		if($cat==2){ // Aluno
		
		}
		if($cat==3){ // Professor
		
		}
		

		?>	
	</navegacao>
	
	<?
	return $categorias[$cat];
	unset($cat);
	exit();
}

function selectProfessores($name, $coddef){
	?>
	<select name="<? echo $name; ?>" >
		<?

		$query="SELECT * FROM professores 
		LEFT JOIN (usuarios) 
		ON (professores.cod_usuario=usuarios.cod) 
		where usuarios.ativo=1 
		ORDER BY nome";

		$result=mysql_query($query);
		$num=mysql_numrows($result);
		mysql_close();
		?>

		<?php
		$i=0;
		while ($i < $num) {

			$f1=mysql_result($result,$i,"nome");
			$f6=mysql_result($result,$i,"cod_usuario");

			?>
			<option <? 	if($coddef==$f6) echo " selected " ;?> value="<?php echo $f6; ?>">
				<?php echo $f1 ?>
			</option>';
			<?

			$i++;
		}
		?>
	</select>
	<?
	exit();
}

//redireciona para outras páginas
function redireciona($pagina, $c, $m){
		$location = $pagina."?c=".$c.";&m=".$m;
	?>
		<!--
		PHP REDIRECT?
		!-->
		<html>
		<META http-equiv="refresh" content="1;URL=<?php 	$location; ?>">
    	<script type="text/javascript">
            window.location.href = "<?php 	$location; ?>"
        </script>
        <body>
		Para continuar 
		<a href="<?php 	$location; ?>">
			clique aqui
		</a>
		</body></html>
	<?php
	exit();
}
<?php
header("Content-Type: text/html; charset=utf-8",true) ;
  require "conecta.php";
  
  //$query="SELECT * FROM alunos LEFT JOIN (usuarios) ON (alunos.cod_usuario=usuarios.cod) where usuarios.ativo=1 ORDER BY nome";
  $query="SELECT * FROM v_usuario_aluno where ativo=1 ORDER BY nome ";

  $result=mysql_query($query);
  $num=mysql_numrows($result);
  mysql_close();

  $title="Alunos";
  
  require "topo.php"; 

?>

<h3><?php echo $title ?></h3>
<a href="lista_alunos_excluidos.php">Consultar Registros removidos</a>

<font face="Arial, Helvetica, sans-serif">

<table class="sortable" border="1" cellspacing="2" cellpadding="2">
<tr>
  <th>Nome</th>
  <th>Matrícula</th>
  <th>Data de Ingresso</th>
  <th>Idade</th>  
</tr>

<?php
$i=0;while ($i < $num) {
  $nome=mysql_result($result,$i,"nome");
  $sobrenome=mysql_result($result,$i,"sobrenome");
  $matricula=mysql_result($result,$i,"matricula");
  $data_ingresso=mysql_result($result,$i,"data_ingresso");
  $data_nasc=mysql_result($result,$i,"data_nasc");
  $cod=mysql_result($result,$i,"cod_usuario");?>
  <tr>
  <td>
    <a href="aluno.php?c=<?php echo $cod; ?>  ">
      <?php echo $nome." ".$sobrenome; ?>    
    </a>

  </td>
  <td>
  <?php echo $matricula; ?>
  </td>
  <td>
  <?php echo $data_ingresso; ?>
  </td>
  <td tooltip="<?php echo $data_nasc; ?>">
    <script>
    //é incluido este script em topo.php
    getIdade('<?php echo $data_nasc; ?>');
    </script>

  </td>
  <td>
    <a href="confirma.php?c=<?php echo $cod; ?>" style="color:red;">excluir</a>
  </td>
  <td>
    <a href="editar_aluno.php?c=<?php echo $cod; ?>">editar</a>
  </td>
  </tr>
  <?php
  $i++;
}?>


</table>
</font>
<?php 
  require "rodape.php";
   ?>
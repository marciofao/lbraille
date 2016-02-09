<?php
  $title="Professores";
  
  require "topo.php"; 
  require "conecta.php";
 
  
  $query="SELECT * FROM professores LEFT JOIN (usuarios) ON (professores.cod_usuario=usuarios.cod) where usuarios.ativo=1 ORDER BY nome";
  $result=mysql_query($query);
  $num=mysql_numrows($result);
  mysql_close();
?>

<h3><?php echo $title ?></h3>
<a href="novo_professor.php">Cadastrar Novo</a><br>
<a href="lista_professores_excluidos.php">Consultar Registros removidos</a>

<table class="sortable" border="1" cellspacing="2" cellpadding="2" class="sortable">
  <tr>
    <th>Nome</th>
    <th>Matrícula</th>
    <th>Data de Ingresso</th>
    <th>Idade</th>
    <th>Ofício</th>
    <th>Categoria</th>
  </tr>

  <?php
    $i=0;
    while ($i < $num) {

      $f1=mysql_result($result,$i,"nome");
      $f2=mysql_result($result,$i,"sobrenome");
      $f3=mysql_result($result,$i,"matricula");
      $f4=mysql_result($result,$i,"ingresso");
      $f5=mysql_result($result,$i,"data_nasc");
      $f6=mysql_result($result,$i,"cod_usuario");
      $f7=mysql_result($result,$i,"oficio");
      $f8=mysql_result($result,$i,"categoria");?>

      <tr>
        <td>
        <?php echo $f1." ".$f2; ?>
        </td>
        <td>
        <?php echo $f3; ?>
        </td>
        <td>
        <?php echo $f4; ?>
        </td>
        <td tooltip="<?php echo $f5; ?>">
          <script>
          getIdade('<?php echo $f5; ?>');
          </script>
        </td>
        <td>
        <?php echo $f7; ?>
        </td>
        <td>
          <script>
          getCategoria(<?php echo $f8; ?>);
          </script>
        </td>
        <td>
          <a href="excluir_professor.php?c=<?php echo $f6; ?>" style="color:red;">excluir</a>
        </td>
        <td>
          <a href="editar_professor.php?c=<?php echo $f6; ?>">editar</a>
        </td>
      </tr>
    <?php
      $i++;
    }
  ?>

</table>

<?php 
  require "rodape.php";
?>

<?php
include "verifica.php";
include "conecta.php";

$query="SELECT * FROM usuarios ORDER BY nome";
$result=mysql_query($query);
$num=mysql_numrows($result);
mysql_close();

$title="Usuários";

include "topo.php"; 

  //die("dafuq");
?>

<style>
  #ativa{
    text-align: center;
  }
</style>

<h3><?php   echo $title; ?> - <a href="novo_usuario.php">Novo</a></h3>
<a href="lista_usuarios_inativos.php">Consultar Registros removidos</a>
<font face="Arial, Helvetica, sans-serif">
  <?php 
    //die("dafuq");
  ?>
  <table class="sortable" border="1" cellspacing="2" cellpadding="2">
    <tr>
      <th>Nome</th>
      <th>login</th>
      <th>Endereço</th>
      <th>Idade</th>
      <th>Cidade</th>
      <th></th>
      <th></th>
    </tr>

    <?php
    $i=0;
    while ($i < $num) {
      $nome=mysql_result($result,$i,"nome");
      $sobrenome=mysql_result($result,$i,"sobrenome");
      $login=mysql_result($result,$i,"login");
      $endereco=mysql_result($result,$i,"endereco");
      $data_nasc=mysql_result($result,$i,"data_nasc");
      $cidade=mysql_result($result,$i,"cidade");
      $ativo=mysql_result($result,$i,"ativo");
      $cod=mysql_result($result,$i,"cod");

      if ($ativo) {

        ?>
        <tr>
          <td>
            <?php echo $nome." ".$sobrenome; ?>
          </td>
          <td>
            <?php echo $login; ?>
          </td>
          <td>
            <?php echo $endereco; ?>
          </td>
          <td tooltip="<?php echo $data_nasc; ?>">
            <script>
             getIdade('<?php echo $data_nasc; ?>');
            </script>
          </td>
          <td>
            <?php echo $cidade; ?>
          </td>

          <td>
            <a href="confirma.php?c=<?php echo $cod; ?>" 
             style="color:red;">
             excluir
            </a>
          </td>
          <td>
            <a href="editar_usuario.php?c=<?php echo $cod; ?>&n=<?php  echo $nome; ?>">
              editar
            </a>
          </td>
        </tr>
        <?php
      }
      $i++;
    }
  ?>


</table>
</font>
<?php 
include "rodape.php";
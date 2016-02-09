<?php
  
  include "conecta.php";
  include "verifica.php";

  $query="SELECT * FROM atividades ORDER BY nome";
  #$query="SELECT * FROM atividades ORDER BY nome";
  $result=mysql_query($query);
  $num=mysql_numrows($result);
  

  $title="Atividades";
  
  include "topo.php"; 

?>

<h3><?php echo $title ?></h3>
<a href="nova_atividade.php">Nova Atividade</a>



<table class="sortable" border="1" cellspacing="2" cellpadding="2">
<tr>
  <th>Nome</th>
  <th>Professor</th>
  <th>Dias</th>
</tr>

<?php
$i=0;while ($i < $num) {
  $nome=mysql_result($result,$i,"nome");
  $cod=mysql_result($result,$i,"cod");
  $dias=mysql_result($result,$i,"dias");?>
  <tr>
  <td>
    <?php 
      echo $nome;
    ?>    
  </td>
  <td>
    <?php 
      //DESCULPA  A BAGUNÇA NO CÓDIGO :( UM JOIN NISSO TUDO IA DAR MUITO TRABALHO...
      $query="SELECT cod_professor FROM atividade_professor WHERE cod_atividade=$cod";
      $r=mysql_query($query);
      #die($r);
      $rr=mysql_fetch_assoc($r);
      $cd=$rr['cod_professor'];
      #die($rr);
      
      $query="SELECT nome FROM usuarios WHERE cod=$cd";
      $rs=mysql_query($query);
      $rt=mysql_fetch_assoc($rs);
      $nm=$rt['nome'];

      echo $nm;
     ?>

  </td>
  <td>
    <?php 
      echo $dias; 
    ?>
  </td>
  <td>
    <a href="excluir_atividade.php?c=<?php echo $cod; ?>" style="color:red;">excluir</a>
  </td>
  <td>
    <a href="editar_atividade.php?c=<?php echo $cod; ?>&amp;cd=<?php echo $cd; ?>">editar</a>
  </td>
  </tr>
  <?php
  $i++;
}?>


</table>
<?php 
  include "rodape.php";
   ?>
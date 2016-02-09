<?php

/*
	recebe codigos por get que representam mensagens a serem exibidas no topo da página.	
*/

	if ($_GET) {
		$m=$_GET['m'];
			if ($m) {//envio de mensagens entre paginas
				switch ($m) {//opções de mensagens
					case '1':
						$m="salvo";
						break;

					case '2':
						$m="excluído";
						break;
					
					default:
						$m="efetuado";
						break;
				}
				?> <script>
					function escondemsg(){
						document.getElementById('msg').style.display="none";
					}
				   </script>
					<div id="msg" >
						Registro <?php echo $m ?> com sucesso! <a href="javascript:escondemsg()" ><img tooltip="ocultar" height="15px" src="img/fechar_icone.png" alt="ocultar mensagem"></a>
					</div>
				<?
			}
	}
	 ?>

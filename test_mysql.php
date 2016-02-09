<?php

##########################################################################
#                                                                        #
################# TESTANDO SERVIDOR MySQL E BASE DE DADOS ################
#                                                                        #
# Este script desenvolvido em PHP (www.php.net) tem o objetivo, função e #
# meta de checar e exibir no navegador web o status do servidor MySQL e  #
# da base de dados selecionada.                                          #
#                                                                        #
########################### LICENÇA: GPL #################################
#                                                                        #
################### ULTIMA ATUALIZAÇÃO : 14/09/2003 ######################
#                                                                        #
####################### DADOS SOBRE O AUTOR  #############################
#                                                                        #
# Eder S. G. - E-M@il: edersg@esg-computacao.eti.br                      #
# ESG Computação - Serviços gerais em Informática & Tecnologia           #
# WebSite: http://www.esg-computacao.eti.br                              #
# Usuário Linux Registrado: 179086 - Telefone: 0(xx)(32)-9112-7504       #
# Técnico em Processamento de Dados - Estudante/graduação em Informática #
# Paz, Justiça, Honra, Lealdade, Ética, Responsabilidade, Honestidade    #
#                                                                        #
##########################################################################

print "<HTML>";
print "<HEAD>";
print "<TITLE>Testando servidor MySQL e base de dados</TITLE>";
print "</HEAD>";
print "<BODY BGCOLOR=#D8D8D8>";

# Digite o nome da máquina onde está localizado o servidor MySQL
$host = "mysql01.gotuzzoeferreira.hospedagemdesites.ws";

# Digite o nome do usuário do servidor MySQL
$usuario = "gotuzzoeferreira";

# Digite a senha do usuário do servidor MySQL
$senha = "marciofao1";

# Digite o nome do banco de dados que você deseja utilizar
$nomedobancodedados = "gotuzzoeferreira";

# Titulo da página
echo "<CENTER><FONT SIZE=6 COLOR=red><B>Status do servidor MySQL bem como da base de dados</B></FONT></CENTER><P>";

# Se conectando ao SGBD MySQL...
@$conexao = mysql_pconnect("$host","$usuario","$senha");

if ($conexao)  // SE a conexao ao banco de dados foi efetuada com sucesso ENTAO...
  {
    echo "<CENTER><B>ESG Computação informa:<BR><FONT COLOR=blue>Consegui me conectar ao MySQL com o usuário ". $usuario .". Parabéns!</B></FONT></CENTER><P>";  // exibe esta mensagem no navegador web
  }
else // SENAO...
  {
    echo "<CENTER><B>ESG Computação informa:<BR><FONT COLOR=red>Erro! Não pude me conectar ao servidor MySQL.<BR>Por favor, cheque se o mesmo está rodando no servidor.</FONT></B></CENTER><P>";  // exibe esta mensagem no navegador web
  }

# Selecionando o banco de dados...
@$selecao = mysql_select_db("$nomedobancodedados");

if ($selecao)  // SE a selecao ao banco de dados foi efetuada com sucesso ENTAO...
  {
    echo "<CENTER><B>ESG Computação informa:<BR><FONT COLOR=blue>Consegui selecionar o banco de dados chamado ". $nomedobancodedados ." com sucesso. Parabéns!</B></FONT></CENTER>";  // exibe esta mensagem no navegador web
  }
else // SENAO...
  {
    echo "<CENTER><B>ESG Computação informa:<BR><FONT COLOR=red>Erro! Não pude selecionar o banco de dados chamado ". $nomedobancodedados .".<BR>Por favor, cheque se este banco de dados existe no servidor MySQL.</FONT></B></CENTER>";  // exibe esta mensagem no navegador web
  }

echo "<P>";
echo "<HR SIZE=4 WIDTH=85%>";
echo "<CENTER><FONT SIZE=3 COLOR=black><B>Desenvolvido por Eder S. G. - E-Mail: <A HREF=mailto:edersg@esg-computacao.eti.br>edersg@esg-computacao.eti.br</A></B></FONT></CENTER><P>";

print "</BODY>";
print "</HTML>";

?>
-- phpMyAdmin SQL Dump
-- version 3.3.9
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tempo de Geração: Fev 08, 2016 as 06:59 PM
-- Versão do Servidor: 5.5.8
-- Versão do PHP: 5.3.5

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Banco de Dados: `lbraille`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `alunos`
--

CREATE TABLE IF NOT EXISTS `alunos` (
  `cod_usuario` int(11) NOT NULL,
  `alunos` int(11) NOT NULL,
  `matricula` varchar(100) NOT NULL,
  `data_ingresso` date NOT NULL,
  `obs` mediumtext NOT NULL,
  KEY `cod_usuario` (`cod_usuario`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `alunos`
--

INSERT INTO `alunos` (`cod_usuario`, `alunos`, `matricula`, `data_ingresso`, `obs`) VALUES
(1, 1, '1234e', '2014-04-21', 'teste admins'),
(2, 2, '23456', '2014-04-20', 'teste'),
(3, 1, '23456345', '2014-05-07', 'Lorem Impsum'),
(12, 0, '23456', '2014-05-08', 'teste agamenor');

-- --------------------------------------------------------

--
-- Estrutura da tabela `atividades`
--

CREATE TABLE IF NOT EXISTS `atividades` (
  `cod` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `nome` varchar(100) NOT NULL,
  `horario_inicio` time NOT NULL,
  `horario_fim` time NOT NULL,
  `dias` varchar(100) NOT NULL,
  PRIMARY KEY (`cod`),
  UNIQUE KEY `cod` (`cod`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=6 ;

--
-- Extraindo dados da tabela `atividades`
--

INSERT INTO `atividades` (`cod`, `nome`, `horario_inicio`, `horario_fim`, `dias`) VALUES
(4, 'musica', '00:00:00', '00:00:00', 'seg,qua,sex'),
(5, 'teste', '00:00:00', '00:00:00', 'seg,ter,qui');

-- --------------------------------------------------------

--
-- Estrutura da tabela `atividade_aluno`
--

CREATE TABLE IF NOT EXISTS `atividade_aluno` (
  `cod` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `cod_aluno` int(100) NOT NULL,
  `cod_atividade` int(100) NOT NULL,
  PRIMARY KEY (`cod`),
  UNIQUE KEY `cod` (`cod`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

--
-- Extraindo dados da tabela `atividade_aluno`
--


-- --------------------------------------------------------

--
-- Estrutura da tabela `atividade_professor`
--

CREATE TABLE IF NOT EXISTS `atividade_professor` (
  `cod` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `cod_professor` int(100) NOT NULL,
  `cod_atividade` int(100) NOT NULL,
  PRIMARY KEY (`cod`),
  UNIQUE KEY `cod` (`cod`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=6 ;

--
-- Extraindo dados da tabela `atividade_professor`
--

INSERT INTO `atividade_professor` (`cod`, `cod_professor`, `cod_atividade`) VALUES
(4, 3, 4),
(5, 4, 5);

-- --------------------------------------------------------

--
-- Estrutura da tabela `contatos`
--

CREATE TABLE IF NOT EXISTS `contatos` (
  `cod` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `descicao` mediumtext NOT NULL,
  UNIQUE KEY `cod` (`cod`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

--
-- Extraindo dados da tabela `contatos`
--


-- --------------------------------------------------------

--
-- Estrutura da tabela `contatos_usuario`
--

CREATE TABLE IF NOT EXISTS `contatos_usuario` (
  `cod` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `cod_usuario` int(100) NOT NULL,
  `valor` varchar(1000) NOT NULL,
  PRIMARY KEY (`cod`),
  UNIQUE KEY `cod` (`cod`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

--
-- Extraindo dados da tabela `contatos_usuario`
--


-- --------------------------------------------------------

--
-- Estrutura da tabela `contato_local`
--

CREATE TABLE IF NOT EXISTS `contato_local` (
  `cod` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `cod_contato` int(100) NOT NULL,
  `cod_local` int(100) NOT NULL,
  PRIMARY KEY (`cod`,`cod_contato`),
  UNIQUE KEY `cod` (`cod`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

--
-- Extraindo dados da tabela `contato_local`
--


-- --------------------------------------------------------

--
-- Estrutura da tabela `edit_log`
--

CREATE TABLE IF NOT EXISTS `edit_log` (
  `cod` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `cod_usuario` int(11) NOT NULL,
  `nome_usuario` text NOT NULL,
  `tabela` varchar(30) NOT NULL,
  `cod_tabela` int(11) NOT NULL,
  `hora_data` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`cod`),
  UNIQUE KEY `cod` (`cod`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

--
-- Extraindo dados da tabela `edit_log`
--


-- --------------------------------------------------------

--
-- Estrutura da tabela `locais`
--

CREATE TABLE IF NOT EXISTS `locais` (
  `cod` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `nome` mediumtext NOT NULL,
  `endereco` mediumtext NOT NULL,
  `numero` int(11) NOT NULL,
  UNIQUE KEY `cod` (`cod`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

--
-- Extraindo dados da tabela `locais`
--


-- --------------------------------------------------------

--
-- Estrutura da tabela `local_aluno`
--

CREATE TABLE IF NOT EXISTS `local_aluno` (
  `cod` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `cod_aluno` int(100) NOT NULL,
  `cod_local` int(100) NOT NULL,
  PRIMARY KEY (`cod`),
  UNIQUE KEY `cod` (`cod`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

--
-- Extraindo dados da tabela `local_aluno`
--


-- --------------------------------------------------------

--
-- Estrutura da tabela `professores`
--

CREATE TABLE IF NOT EXISTS `professores` (
  `cod_usuario` int(11) NOT NULL,
  `matricula` mediumtext NOT NULL,
  `ingresso` date NOT NULL,
  `oficio` int(11) NOT NULL,
  `categoria` int(11) NOT NULL,
  PRIMARY KEY (`cod_usuario`),
  KEY `cod_usuario` (`cod_usuario`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `professores`
--

INSERT INTO `professores` (`cod_usuario`, `matricula`, `ingresso`, `oficio`, `categoria`) VALUES
(3, '234567', '2014-04-15', 345678, 3),
(4, '1234567', '2014-04-16', 43567, 2),
(5, '234567sd', '2014-04-15', 1234567, 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `turma`
--

CREATE TABLE IF NOT EXISTS `turma` (
  `cod` bigint(20) unsigned NOT NULL AUTO_INCREMENT COMMENT 'primary key',
  `nome_turma` text NOT NULL,
  `cod_professor` int(11) NOT NULL,
  `ativo` tinyint(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`cod`),
  UNIQUE KEY `cod` (`cod`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

--
-- Extraindo dados da tabela `turma`
--


-- --------------------------------------------------------

--
-- Estrutura da tabela `turma_aluno`
--

CREATE TABLE IF NOT EXISTS `turma_aluno` (
  `cod` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `cod_aluno` int(11) NOT NULL,
  `ativo` tinyint(1) NOT NULL,
  PRIMARY KEY (`cod`),
  UNIQUE KEY `cod` (`cod`),
  KEY `cod_aluno` (`cod_aluno`),
  KEY `cod_aluno_2` (`cod_aluno`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='relacao entre turma e aluno' AUTO_INCREMENT=1 ;

--
-- Extraindo dados da tabela `turma_aluno`
--


-- --------------------------------------------------------

--
-- Estrutura da tabela `usuarios`
--

CREATE TABLE IF NOT EXISTS `usuarios` (
  `cod` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `nome` varchar(100) NOT NULL,
  `sobrenome` varchar(100) NOT NULL,
  `data_nasc` date NOT NULL,
  `login` varchar(100) NOT NULL,
  `senha` varchar(32) NOT NULL,
  `endereco` varchar(100) NOT NULL,
  `numero` varchar(100) NOT NULL,
  `cidade` mediumtext NOT NULL,
  `uf` varchar(2) NOT NULL,
  `cep` varchar(9) NOT NULL,
  `ativo` tinyint(1) NOT NULL,
  `categoria` int(11) NOT NULL,
  UNIQUE KEY `cod` (`cod`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=14 ;

--
-- Extraindo dados da tabela `usuarios`
--

INSERT INTO `usuarios` (`cod`, `nome`, `sobrenome`, `data_nasc`, `login`, `senha`, `endereco`, `numero`, `cidade`, `uf`, `cep`, `ativo`, `categoria`) VALUES
(1, 'Administrador', 'Sistema', '1992-09-09', 'admin', '202cb962ac59075b964b07152d234b70', 'rua', '123', 'Cidade', 'RS', '96015-145', 1, 1),
(2, 'Márcio', 'Fão', '1992-01-31', 'marcio', '202cb962ac59075b964b07152d234b70', 'Av. Bento', '99999', 'Pelotas', 'AC', '96015-145', 0, 1),
(3, 'Fernanda', 'Impsum', '1993-09-09', 'fer', '202cb962ac59075b964b07152d234b70', 'Av. Bento Gonçalves', '55', 'Pelotas', 'RJ', '95870888', 1, 2),
(7, 'Carlos', 'Impsum', '2001-05-22', 'carlos', '202cb962ac59075b964b07152d234b70', 'Av. Bento', '333', 'Pelotas', 'AC', '131231231', 0, 5),
(9, 'Felipe', 'impsum', '1995-05-09', 'lipe', '202cb962ac59075b964b07152d234b70', 'Andrade neves', '23', 'Pelotas', 'RS', '95870', 0, 6),
(12, 'João', 'Impsum', '1994-05-14', '', '', 'Av. Bento Gonçalves', '23', 'Pelotas', 'PA', '95870', 0, 0),
(13, 'Teste', 'testando', '1996-04-02', '', '', 'Av. Bento Gonçalves', '444', 'Pelotas', 'RS', '95870', 1, 0);

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuario_categoria`
--

CREATE TABLE IF NOT EXISTS `usuario_categoria` (
  `cod` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `codusuario` int(100) NOT NULL,
  `tipo` int(3) NOT NULL,
  PRIMARY KEY (`cod`),
  UNIQUE KEY `cod` (`cod`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

--
-- Extraindo dados da tabela `usuario_categoria`
--


-- --------------------------------------------------------

--
-- Estrutura stand-in para visualizar `v_usuario_aluno`
--
CREATE TABLE IF NOT EXISTS `v_usuario_aluno` (
`cod_usuario` int(11)
,`alunos` int(11)
,`matricula` varchar(100)
,`data_ingresso` date
,`obs` mediumtext
,`cod` bigint(20) unsigned
,`nome` varchar(100)
,`sobrenome` varchar(100)
,`data_nasc` date
,`login` varchar(100)
,`senha` varchar(32)
,`endereco` varchar(100)
,`numero` varchar(100)
,`cidade` mediumtext
,`uf` varchar(2)
,`cep` varchar(9)
,`ativo` tinyint(1)
,`categoria` int(11)
);
-- --------------------------------------------------------

--
-- Estrutura para visualizar `v_usuario_aluno`
--
DROP TABLE IF EXISTS `v_usuario_aluno`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `v_usuario_aluno` AS select `alunos`.`cod_usuario` AS `cod_usuario`,`alunos`.`alunos` AS `alunos`,`alunos`.`matricula` AS `matricula`,`alunos`.`data_ingresso` AS `data_ingresso`,`alunos`.`obs` AS `obs`,`usuarios`.`cod` AS `cod`,`usuarios`.`nome` AS `nome`,`usuarios`.`sobrenome` AS `sobrenome`,`usuarios`.`data_nasc` AS `data_nasc`,`usuarios`.`login` AS `login`,`usuarios`.`senha` AS `senha`,`usuarios`.`endereco` AS `endereco`,`usuarios`.`numero` AS `numero`,`usuarios`.`cidade` AS `cidade`,`usuarios`.`uf` AS `uf`,`usuarios`.`cep` AS `cep`,`usuarios`.`ativo` AS `ativo`,`usuarios`.`categoria` AS `categoria` from (`alunos` left join `usuarios` on((`alunos`.`cod_usuario` = `usuarios`.`cod`)));

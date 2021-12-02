-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: 23-Out-2019 às 12:48
-- Versão do servidor: 5.7.16
-- PHP Version: 5.6.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db-min`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `estilos`
--

CREATE TABLE `estilos` (
  `id` int(11) NOT NULL,
  `estilo` varchar(80) NOT NULL,
  `cadastrado` datetime NOT NULL,
  `modificado` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `estilos`
--

INSERT INTO `estilos` (`id`, `estilo`, `cadastrado`, `modificado`) VALUES
(1, 'gz-red-tag', '2019-10-23 00:00:00', '2019-10-23 00:00:00'),
(2, 'gz-green-tag', '2019-10-23 00:00:00', '2019-10-23 00:00:00'),
(3, 'gz-blue-tag', '2019-10-23 00:00:00', '2019-10-23 00:00:00'),
(4, 'gz-yellow-tag', '2019-10-23 00:00:00', '2019-10-23 00:00:00'),
(5, 'gz-gray-tag', '2019-10-23 00:00:00', '2019-10-23 00:00:00');

-- --------------------------------------------------------

--
-- Estrutura da tabela `menus`
--

CREATE TABLE `menus` (
  `id` int(11) NOT NULL,
  `menu` varchar(80) NOT NULL,
  `cadastrado` datetime NOT NULL,
  `modificado` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `menus`
--

INSERT INTO `menus` (`id`, `menu`, `cadastrado`, `modificado`) VALUES
(1, 'Barra de menu', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(2, 'Cadastros', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(3, 'Configurações', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(4, 'Subpasta', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(5, 'Não aplicável', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(6, 'Relatórios', '2019-06-07 00:00:00', '2019-06-07 00:00:00');

-- --------------------------------------------------------

--
-- Estrutura da tabela `perfil_tela`
--

CREATE TABLE `perfil_tela` (
  `id` int(11) NOT NULL,
  `cadastrado` datetime NOT NULL,
  `modificado` datetime NOT NULL,
  `perfil` int(11) NOT NULL,
  `tela` int(11) NOT NULL,
  `permissao` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `perfil_tela`
--

INSERT INTO `perfil_tela` (`id`, `cadastrado`, `modificado`, `perfil`, `tela`, `permissao`) VALUES
(1, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 1, 1, 4),
(2, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 1, 2, 4),
(3, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 1, 3, 4),
(4, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 1, 4, 4),
(5, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 1, 5, 4);

-- --------------------------------------------------------

--
-- Estrutura da tabela `perfis`
--

CREATE TABLE `perfis` (
  `id` int(11) NOT NULL,
  `perfil` varchar(80) NOT NULL,
  `cadastrado` datetime NOT NULL,
  `modificado` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `perfis`
--

INSERT INTO `perfis` (`id`, `perfil`, `cadastrado`, `modificado`) VALUES
(1, 'Developer', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(2, 'User', '0000-00-00 00:00:00', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Estrutura da tabela `permissoes`
--

CREATE TABLE `permissoes` (
  `id` int(11) NOT NULL,
  `permissao` varchar(80) NOT NULL,
  `cadastrado` datetime NOT NULL,
  `modificado` datetime NOT NULL,
  `estilo` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `permissoes`
--

INSERT INTO `permissoes` (`id`, `permissao`, `cadastrado`, `modificado`, `estilo`) VALUES
(1, 'Somente leitura', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 5),
(2, 'Leitura e escrita', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 3),
(3, 'Leitura, escrita e edição', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 4),
(4, 'Controle total', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `situacoes_registros`
--

CREATE TABLE `situacoes_registros` (
  `id` int(11) NOT NULL,
  `situacao_registro` varchar(80) NOT NULL,
  `cadastrado` datetime NOT NULL,
  `modificado` datetime NOT NULL,
  `estilo` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `situacoes_registros`
--

INSERT INTO `situacoes_registros` (`id`, `situacao_registro`, `cadastrado`, `modificado`, `estilo`) VALUES
(1, 'Ativo', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 2),
(2, 'Desativado', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `telas`
--

CREATE TABLE `telas` (
  `id` int(11) NOT NULL,
  `tela` varchar(80) NOT NULL,
  `identificador` varchar(80) NOT NULL,
  `cadastrado` datetime NOT NULL,
  `modificado` datetime NOT NULL,
  `menu` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `telas`
--

INSERT INTO `telas` (`id`, `tela`, `identificador`, `cadastrado`, `modificado`, `menu`) VALUES
(1, 'Menus', 'menus', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 5),
(2, 'Telas', 'telas', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 3),
(3, 'Perfis', 'perfis', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 3),
(4, 'Telas do perfil', 'perfil_tela', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 4),
(5, 'Usuários', 'usuarios', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 3),
(6, 'Situações de registros', 'situacoes_registros', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 5),
(7, 'Permissões', 'permissoes', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 5),
(8, 'Dashboard', 'dashboard', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 1),
(9, 'Minha conta', 'minha_conta', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 1),
(10, 'Mudar foto', 'mudar_foto', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 1),
(11, 'Estilos', 'estilos', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 5);

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL,
  `usuario` varchar(120) NOT NULL,
  `email` varchar(120) NOT NULL,
  `senha` varchar(80) NOT NULL,
  `foto` varchar(255) NOT NULL,
  `access_token` varchar(80) NOT NULL,
  `access_token_expiration` datetime NOT NULL,
  `password_token` varchar(80) NOT NULL,
  `password_token_expiration` datetime NOT NULL,
  `activation_token` varchar(80) NOT NULL,
  `activation_token_expiration` datetime NOT NULL,  
  `cadastrado` datetime NOT NULL,
  `modificado` datetime NOT NULL,
  `perfil` int(11) NOT NULL,
  `situacao_registro` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `usuarios`
--

INSERT INTO `usuarios` (`id`, `usuario`, `email`, `senha`, `foto`, `access_token`, `access_token_expiration`, `password_token`, `password_token_expiration`, `activation_token`, `activation_token_expiration`, `cadastrado`, `modificado`, `perfil`, `situacao_registro`) VALUES
(1, 'Root', 'root@wtag.com.br', '21232f297a57a5a743894a0e4a801fc3', '', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 1, 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `estilos`
--
ALTER TABLE `estilos`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `menus`
--
ALTER TABLE `menus`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `perfil_tela`
--
ALTER TABLE `perfil_tela`
  ADD PRIMARY KEY (`id`),
  ADD KEY `perfil` (`perfil`),
  ADD KEY `tela` (`tela`),
  ADD KEY `permissao` (`permissao`);

--
-- Indexes for table `perfis`
--
ALTER TABLE `perfis`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `permissoes`
--
ALTER TABLE `permissoes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `estilo` (`estilo`);

--
-- Indexes for table `situacoes_registros`
--
ALTER TABLE `situacoes_registros`
  ADD PRIMARY KEY (`id`),
  ADD KEY `estilo` (`estilo`);

--
-- Indexes for table `telas`
--
ALTER TABLE `telas`
  ADD PRIMARY KEY (`id`),
  ADD KEY `menu` (`menu`);

--
-- Indexes for table `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`),
  ADD KEY `situacao_registro` (`situacao_registro`),
  ADD KEY `perfil` (`perfil`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `estilos`
--
ALTER TABLE `estilos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `menus`
--
ALTER TABLE `menus`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `perfil_tela`
--
ALTER TABLE `perfil_tela`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `perfis`
--
ALTER TABLE `perfis`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `permissoes`
--
ALTER TABLE `permissoes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `situacoes_registros`
--
ALTER TABLE `situacoes_registros`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `telas`
--
ALTER TABLE `telas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- Constraints for dumped tables
--

--
-- Limitadores para a tabela `perfil_tela`
--
ALTER TABLE `perfil_tela`
  ADD CONSTRAINT `perfil_tela_ibfk_1` FOREIGN KEY (`perfil`) REFERENCES `perfis` (`id`),
  ADD CONSTRAINT `perfil_tela_ibfk_2` FOREIGN KEY (`permissao`) REFERENCES `permissoes` (`id`),
  ADD CONSTRAINT `perfil_tela_ibfk_3` FOREIGN KEY (`tela`) REFERENCES `telas` (`id`);
  
--
-- Limitadores para a tabela `permissoes`
--
ALTER TABLE `permissoes`
  ADD CONSTRAINT `permissoes_ibfk_1` FOREIGN KEY (`estilo`) REFERENCES `estilos` (`id`); 

--
-- Limitadores para a tabela `situacoes_registros`
--
ALTER TABLE `situacoes_registros`
  ADD CONSTRAINT `situacoes_registros_ibfk_1` FOREIGN KEY (`estilo`) REFERENCES `estilos` (`id`);

--
-- Limitadores para a tabela `telas`
--
ALTER TABLE `telas`
  ADD CONSTRAINT `telas_ibfk_1` FOREIGN KEY (`menu`) REFERENCES `menus` (`id`);

--
-- Limitadores para a tabela `usuarios`
--
ALTER TABLE `usuarios`
  ADD CONSTRAINT `usuarios_ibfk_3` FOREIGN KEY (`situacao_registro`) REFERENCES `situacoes_registros` (`id`),
  ADD CONSTRAINT `usuarios_ibfk_6` FOREIGN KEY (`perfil`) REFERENCES `perfis` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

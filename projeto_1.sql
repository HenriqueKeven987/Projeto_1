-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 23-Dez-2020 às 14:34
-- Versão do servidor: 10.4.14-MariaDB
-- versão do PHP: 7.4.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `projeto_1`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb-admin.online`
--

CREATE TABLE `tb-admin.online` (
  `id` int(11) NOT NULL,
  `ip` varchar(255) NOT NULL,
  `ultima_acao` datetime NOT NULL,
  `token` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb-admin.usuarios`
--

CREATE TABLE `tb-admin.usuarios` (
  `id` int(11) NOT NULL,
  `usuario` varchar(255) NOT NULL,
  `senha` varchar(255) NOT NULL,
  `img` varchar(255) NOT NULL,
  `nome` varchar(255) NOT NULL,
  `cargo` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `tb-admin.usuarios`
--

INSERT INTO `tb-admin.usuarios` (`id`, `usuario`, `senha`, `img`, `nome`, `cargo`) VALUES
(1, 'admin', 'admin', '5fe0a79da3a51.jpg', 'Henrique', 2);

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb-admin.visitas`
--

CREATE TABLE `tb-admin.visitas` (
  `id` int(11) NOT NULL,
  `ip` varchar(255) NOT NULL,
  `dia` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `tb-admin.visitas`
--

INSERT INTO `tb-admin.visitas` (`id`, `ip`, `dia`) VALUES
(1, '::1', '2020-11-26'),
(2, '172.31.2.35', '2020-11-26'),
(3, '172.31.2.35', '2020-11-26'),
(4, '::1', '2020-11-26'),
(5, '::1', '2020-12-03'),
(6, '::1', '2020-12-03'),
(7, '::1', '2020-12-03'),
(8, '::1', '2020-12-08'),
(9, '::1', '2020-12-08'),
(10, '::1', '2020-12-16'),
(11, '172.31.2.34', '2020-12-21'),
(12, '::1', '2020-12-23'),
(13, '::1', '2020-12-23');

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb-site.depoimentos`
--

CREATE TABLE `tb-site.depoimentos` (
  `id` int(11) NOT NULL,
  `nome` varchar(255) NOT NULL,
  `depoimentos` text NOT NULL,
  `data` varchar(255) NOT NULL,
  `order_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `tb-site.depoimentos`
--

INSERT INTO `tb-site.depoimentos` (`id`, `nome`, `depoimentos`, `data`, `order_id`) VALUES
(22, 'cobra kai', '  ei Chefe vou me atrassar pq entrei numa rua sem saida ', '14/12/2020', 3),
(23, 'Henrique Keven', '   sobe nao', '16/12/2020', 1),
(24, 'Jhonys', 'Isso E uma Incocistencia Generalizada no Servidor', '15/12/2020', 2),
(25, 'Jefferson', '   Loro Quer Biscoito', '16/12/2020', 4);

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb-site.painel`
--

CREATE TABLE `tb-site.painel` (
  `titulo` varchar(255) NOT NULL,
  `nome_author` varchar(255) NOT NULL,
  `descricao` text NOT NULL,
  `icone1` varchar(255) NOT NULL,
  `descricao1` text NOT NULL,
  `icone2` varchar(255) NOT NULL,
  `descricao2` text NOT NULL,
  `icone3` varchar(255) NOT NULL,
  `descricao3` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `tb-site.painel`
--

INSERT INTO `tb-site.painel` (`titulo`, `nome_author`, `descricao`, `icone1`, `descricao1`, `icone2`, `descricao2`, `icone3`, `descricao3`) VALUES
('Site Dinamic', 'Henrique Keven', '     Um cara muito loco que desistiu da programação uma vez mais agora E official ele ta de volta e dessa vez pra completar 3 de seus sonhos ', 'fab fa-css3', '     CSS 3 A pintura do Site', 'fab fa-html5', '      HTML 5 O Esqueleto do site', 'fab fa-js', '    JavaScript Um Deus nos Desenvolvimento de Site');

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb-site.servicos`
--

CREATE TABLE `tb-site.servicos` (
  `id` int(11) NOT NULL,
  `servicos` text NOT NULL,
  `order_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `tb-site.servicos`
--

INSERT INTO `tb-site.servicos` (`id`, `servicos`, `order_id`) VALUES
(3, 'Seu HD lento sem problema Formatamos ele ate os seus Dados', 4),
(5, 'Verificamos inconsistencias causadas pelo servidor', 5),
(6, 'Esta com problemas para perder seu carro nao se preocupe O Tecnico esta aqui para perde-lo e colocalo numa Rua Sem saida', 6);

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb-site.slide`
--

CREATE TABLE `tb-site.slide` (
  `id` int(11) NOT NULL,
  `nome` varchar(255) NOT NULL,
  `slide` varchar(255) NOT NULL,
  `order_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `tb-site.slide`
--

INSERT INTO `tb-site.slide` (`id`, `nome`, `slide`, `order_id`) VALUES
(14, 'slide 1', '5fe33e4f58079.jpg', 15),
(15, 'slide 2', '5fe33e58d25f8.jpg', 14),
(16, 'slide 3', '5fe33e6204b0c.jpg', 16);

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `tb-admin.online`
--
ALTER TABLE `tb-admin.online`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `tb-admin.usuarios`
--
ALTER TABLE `tb-admin.usuarios`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `tb-admin.visitas`
--
ALTER TABLE `tb-admin.visitas`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `tb-site.depoimentos`
--
ALTER TABLE `tb-site.depoimentos`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `tb-site.servicos`
--
ALTER TABLE `tb-site.servicos`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `tb-site.slide`
--
ALTER TABLE `tb-site.slide`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `tb-admin.online`
--
ALTER TABLE `tb-admin.online`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=85;

--
-- AUTO_INCREMENT de tabela `tb-admin.usuarios`
--
ALTER TABLE `tb-admin.usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT de tabela `tb-admin.visitas`
--
ALTER TABLE `tb-admin.visitas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT de tabela `tb-site.depoimentos`
--
ALTER TABLE `tb-site.depoimentos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT de tabela `tb-site.servicos`
--
ALTER TABLE `tb-site.servicos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de tabela `tb-site.slide`
--
ALTER TABLE `tb-site.slide`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

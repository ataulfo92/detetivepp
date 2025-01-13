-- phpMyAdmin SQL Dump
-- version 5.1.1deb5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Tempo de geração: 08-Maio-2022 às 17:27
-- Versão do servidor: 10.5.12-MariaDB-1
-- versão do PHP: 7.4.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `Banco_producao`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `Comprador`
--

CREATE TABLE `Comprador` (
  `ID` int(2) NOT NULL,
  `NOME` varchar(40) NOT NULL,
  `TELEFONE` varchar(20) NOT NULL,
  `EMAIL` varchar(30) NOT NULL,
  `STATUS` varchar(7) NOT NULL,
  `SITUACAO` varchar(35) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--

-- --------------------------------------------------------

--
-- Estrutura da tabela `conta`
--

CREATE TABLE `conta` (
  `ID` int(11) NOT NULL,
  `NOME` varchar(25) NOT NULL,
  `EMAIL` varchar(25) NOT NULL,
  `SENHA` varchar(32) NOT NULL,
  `TIPO` varchar(8) NOT NULL,
  `STATUS` varchar(7) NOT NULL,
  `FOTO` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `conta`
--

INSERT INTO `conta` (`ID`, `NOME`, `EMAIL`, `SENHA`, `TIPO`, `STATUS`, `FOTO`) VALUES
(1, 'Admin', 'admin@admin.com', 'e10adc3949ba59abbe56e057f20f883e', 'Admin', 'Ativo', 'perfil/detective-xxl.png'),
(35, 'Eletric', 'eletric@gmail.com', 'c8837b23ff8aaa8a2dde915473ce0991', 'Usuario', 'Ativo', 'imagens/utilizador.png'),
(36, 'Cosmo', 'cosmo@gmail.com', 'c8837b23ff8aaa8a2dde915473ce0991', 'Usuario', 'Ativo', 'perfil/5284734(1).jpg'),
(37, 'Teste', 'teste@gmail.com', 'c8837b23ff8aaa8a2dde915473ce0991', 'Usuario', 'Ativo', 'imagens/utilizador.png');

-- --------------------------------------------------------

--
-- Estrutura da tabela `Fornecedor_lista`
--

CREATE TABLE `Fornecedor_lista` (
  `ID` int(4) NOT NULL,
  `NOME_FORNECEDOR` text NOT NULL,
  `RECOLHIMENTO` text NOT NULL,
  `TROCA_COND` varchar(20) NOT NULL,
  `TELA` text NOT NULL,
  `COMPRADOR` text NOT NULL,
  `QUEM_RECEBE` char(3) NOT NULL,
  `ESTADO` int(11) NOT NULL,
  `STATUS_GERAL` varchar(7) DEFAULT NULL,
  `OPERACAO` varchar(18) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `Fornecedor_lista`
--


--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `Comprador`
--
ALTER TABLE `Comprador`
  ADD PRIMARY KEY (`ID`);

--
-- Índices para tabela `conta`
--
ALTER TABLE `conta`
  ADD PRIMARY KEY (`ID`);

--
-- Índices para tabela `Fornecedor_lista`
--
ALTER TABLE `Fornecedor_lista`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `id_busca` (`NOME_FORNECEDOR`(768));

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `Comprador`
--
ALTER TABLE `Comprador`
  MODIFY `ID` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de tabela `conta`
--
ALTER TABLE `conta`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT de tabela `Fornecedor_lista`
--
ALTER TABLE `Fornecedor_lista`
  MODIFY `ID` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=66;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
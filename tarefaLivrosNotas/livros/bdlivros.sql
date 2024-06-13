-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 31/05/2024 às 05:31
-- Versão do servidor: 10.4.32-MariaDB
-- Versão do PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `bdlivros`
--

-- --------------------------------------------------------

--
-- Estrutura para tabela `tbautor`
--

CREATE TABLE `tbautor` (
  `codAutor` int(11) NOT NULL,
  `nomeAutor` varchar(150) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `tbautor`
--

INSERT INTO `tbautor` (`codAutor`, `nomeAutor`) VALUES
(1, 'Susan Stoker'),
(2, 'Julia Quinn'),
(3, 'Maya Banks'),
(4, 'Michael Crichton'),
(5, 'Tessa Dare');

-- --------------------------------------------------------

--
-- Estrutura para tabela `tbeditora`
--

CREATE TABLE `tbeditora` (
  `codEditora` int(11) NOT NULL,
  `nomeEditora` varchar(150) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `tbeditora`
--

INSERT INTO `tbeditora` (`codEditora`, `nomeEditora`) VALUES
(1, 'Arqueiro'),
(2, 'Intrínseca'),
(3, 'Dark Side'),
(4, 'Moderna'),
(5, 'Rocco'),
(6, 'Gutemberg');

-- --------------------------------------------------------

--
-- Estrutura para tabela `tbgenero`
--

CREATE TABLE `tbgenero` (
  `codGenero` int(11) NOT NULL,
  `genero` varchar(150) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `tbgenero`
--

INSERT INTO `tbgenero` (`codGenero`, `genero`) VALUES
(1, 'Romance de Época'),
(2, 'Terror'),
(3, 'Literatura Fantástica'),
(4, 'Romance'),
(5, 'Suspense');

-- --------------------------------------------------------

--
-- Estrutura para tabela `tblivro`
--

CREATE TABLE `tblivro` (
  `codLivro` int(11) NOT NULL,
  `nomeLivro` varchar(150) DEFAULT NULL,
  `edicao` varchar(50) DEFAULT NULL,
  `codGenero` int(11) DEFAULT NULL,
  `codAutor` int(11) DEFAULT NULL,
  `codEditora` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `tblivro`
--

INSERT INTO `tblivro` (`codLivro`, `nomeLivro`, `edicao`, `codGenero`, `codAutor`, `codEditora`) VALUES
(1, 'Justice for Mackenzie', '1º Edição', 4, 1, 6),
(2, 'Seduzida por um guerreiro escocês', '3º Edição', 1, 3, 2),
(3, 'Uma Noiva Relutante', '1º Edição', 1, 2, 1),
(4, 'Jurassic Park', '2º Edição', 5, 4, 3),
(5, 'Uma Semana Para Se Perder', '1º Edição', 1, 5, 6);

--
-- Índices para tabelas despejadas
--

--
-- Índices de tabela `tbautor`
--
ALTER TABLE `tbautor`
  ADD PRIMARY KEY (`codAutor`);

--
-- Índices de tabela `tbeditora`
--
ALTER TABLE `tbeditora`
  ADD PRIMARY KEY (`codEditora`);

--
-- Índices de tabela `tbgenero`
--
ALTER TABLE `tbgenero`
  ADD PRIMARY KEY (`codGenero`);

--
-- Índices de tabela `tblivro`
--
ALTER TABLE `tblivro`
  ADD PRIMARY KEY (`codLivro`),
  ADD KEY `codGenero` (`codGenero`),
  ADD KEY `codAutor` (`codAutor`),
  ADD KEY `codEditora` (`codEditora`);

--
-- AUTO_INCREMENT para tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `tbautor`
--
ALTER TABLE `tbautor`
  MODIFY `codAutor` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de tabela `tbeditora`
--
ALTER TABLE `tbeditora`
  MODIFY `codEditora` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de tabela `tbgenero`
--
ALTER TABLE `tbgenero`
  MODIFY `codGenero` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de tabela `tblivro`
--
ALTER TABLE `tblivro`
  MODIFY `codLivro` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Restrições para tabelas despejadas
--

--
-- Restrições para tabelas `tblivro`
--
ALTER TABLE `tblivro`
  ADD CONSTRAINT `tblivro_ibfk_1` FOREIGN KEY (`codGenero`) REFERENCES `tbgenero` (`codGenero`),
  ADD CONSTRAINT `tblivro_ibfk_2` FOREIGN KEY (`codAutor`) REFERENCES `tbautor` (`codAutor`),
  ADD CONSTRAINT `tblivro_ibfk_3` FOREIGN KEY (`codEditora`) REFERENCES `tbeditora` (`codEditora`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

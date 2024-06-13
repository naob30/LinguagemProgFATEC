-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 31/05/2024 às 05:30
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
-- Banco de dados: `bdnotas`
--

-- --------------------------------------------------------

--
-- Estrutura para tabela `tbaluno`
--

CREATE TABLE `tbaluno` (
  `RAAluno` int(11) NOT NULL,
  `nomeAluno` varchar(150) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `tbaluno`
--

INSERT INTO `tbaluno` (`RAAluno`, `nomeAluno`) VALUES
(1, 'Nayara de Oliveira Brabo'),
(2, 'Giovanni Santos Martins'),
(3, 'Evelize Garcia dos Santos '),
(4, 'Gabriel Tiggi Leite Lima'),
(5, 'Mateus Simão'),
(6, 'José Camilo de Oliveira'),
(7, 'Guilherme Matheus Pereira da Silva'),
(8, 'Alex de Oliveira');

-- --------------------------------------------------------

--
-- Estrutura para tabela `tbdisciplina`
--

CREATE TABLE `tbdisciplina` (
  `codDisciplina` int(11) NOT NULL,
  `disciplina` varchar(150) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `tbdisciplina`
--

INSERT INTO `tbdisciplina` (`codDisciplina`, `disciplina`) VALUES
(1, 'Matemática para Gestores'),
(2, 'Gestão da Tecnologia da Informação '),
(3, 'Linguagem de Programação '),
(4, 'Gestão de Sistemas Operacionais ');

-- --------------------------------------------------------

--
-- Estrutura para tabela `tbnota`
--

CREATE TABLE `tbnota` (
  `codNota` int(11) NOT NULL,
  `RAAluno` int(11) DEFAULT NULL,
  `codProfessor` int(11) DEFAULT NULL,
  `codDisciplina` int(11) DEFAULT NULL,
  `nota` float DEFAULT NULL,
  `faltas` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `tbnota`
--

INSERT INTO `tbnota` (`codNota`, `RAAluno`, `codProfessor`, `codDisciplina`, `nota`, `faltas`) VALUES
(1, 1, 1, 3, 8.25, 12),
(2, 2, 2, 1, 9.6, 8),
(3, 4, 3, 2, 9.4, 4),
(4, 5, 4, 4, 8, 15);

-- --------------------------------------------------------

--
-- Estrutura para tabela `tbprofessor`
--

CREATE TABLE `tbprofessor` (
  `codProfessor` int(11) NOT NULL,
  `nomeProfessor` varchar(150) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `tbprofessor`
--

INSERT INTO `tbprofessor` (`codProfessor`, `nomeProfessor`) VALUES
(1, 'Rovilson'),
(2, 'Raphael'),
(3, 'James'),
(4, 'Silvia');

--
-- Índices para tabelas despejadas
--

--
-- Índices de tabela `tbaluno`
--
ALTER TABLE `tbaluno`
  ADD PRIMARY KEY (`RAAluno`);

--
-- Índices de tabela `tbdisciplina`
--
ALTER TABLE `tbdisciplina`
  ADD PRIMARY KEY (`codDisciplina`);

--
-- Índices de tabela `tbnota`
--
ALTER TABLE `tbnota`
  ADD PRIMARY KEY (`codNota`),
  ADD KEY `RAAluno` (`RAAluno`),
  ADD KEY `codProfessor` (`codProfessor`),
  ADD KEY `codDisciplina` (`codDisciplina`);

--
-- Índices de tabela `tbprofessor`
--
ALTER TABLE `tbprofessor`
  ADD PRIMARY KEY (`codProfessor`);

--
-- AUTO_INCREMENT para tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `tbaluno`
--
ALTER TABLE `tbaluno`
  MODIFY `RAAluno` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de tabela `tbdisciplina`
--
ALTER TABLE `tbdisciplina`
  MODIFY `codDisciplina` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de tabela `tbnota`
--
ALTER TABLE `tbnota`
  MODIFY `codNota` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de tabela `tbprofessor`
--
ALTER TABLE `tbprofessor`
  MODIFY `codProfessor` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Restrições para tabelas despejadas
--

--
-- Restrições para tabelas `tbnota`
--
ALTER TABLE `tbnota`
  ADD CONSTRAINT `tbnota_ibfk_1` FOREIGN KEY (`RAAluno`) REFERENCES `tbaluno` (`RAAluno`),
  ADD CONSTRAINT `tbnota_ibfk_2` FOREIGN KEY (`codProfessor`) REFERENCES `tbprofessor` (`codProfessor`),
  ADD CONSTRAINT `tbnota_ibfk_3` FOREIGN KEY (`codDisciplina`) REFERENCES `tbdisciplina` (`codDisciplina`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

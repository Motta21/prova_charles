-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 26/09/2025 às 14:18
-- Versão do servidor: 10.4.32-MariaDB
-- Versão do PHP: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `loja_virtual`
--

-- --------------------------------------------------------

--
-- Estrutura para tabela `produtos`
--

CREATE TABLE `produtos` (
  `ID_PROD` int(11) NOT NULL,
  `NOME` varchar(250) NOT NULL,
  `VALOR` float NOT NULL,
  `ESTOQUE` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `produtos`
--

INSERT INTO `produtos` (`ID_PROD`, `NOME`, `VALOR`, `ESTOQUE`) VALUES
(1, 'Multímetro', 25, 9262025),
(2, 'Resistor', 0.8, 9262025),
(3, 'Osciloscópio', 4000, 9262025),
(4, 'Fonte de Alimentação', 350, 9262025),
(5, 'Placa Mãe', 500, 9262025),
(6, 'Memória RAM 8GB', 150, 9262025),
(7, 'Processador Intel i5', 1200, 9262025),
(8, 'Cooler para Processador', 100, 9262025),
(9, 'HD 1TB', 300, 9262025),
(10, 'Teclado Mecânico', 200, 9262025),
(11, 'Mouse Gamer', 120, 9262025),
(12, 'Fonte ATX 500W', 250, 9262025),
(13, 'Placa de Vídeo NVIDIA GTX 1660', 1500, 9262025);

-- --------------------------------------------------------

--
-- Estrutura para tabela `vendas`
--

CREATE TABLE `vendas` (
  `ID_VENDAS` int(11) NOT NULL,
  `QUANTIDADE` int(11) NOT NULL,
  `VALOR_TOTAL` float NOT NULL,
  `DATA_VENDA` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Índices para tabelas despejadas
--

--
-- Índices de tabela `produtos`
--
ALTER TABLE `produtos`
  ADD PRIMARY KEY (`ID_PROD`);

--
-- Índices de tabela `vendas`
--
ALTER TABLE `vendas`
  ADD PRIMARY KEY (`ID_VENDAS`);

--
-- AUTO_INCREMENT para tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `produtos`
--
ALTER TABLE `produtos`
  MODIFY `ID_PROD` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT de tabela `vendas`
--
ALTER TABLE `vendas`
  MODIFY `ID_VENDAS` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

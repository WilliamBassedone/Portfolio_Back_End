-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 08-Abr-2022 às 02:49
-- Versão do servidor: 10.4.16-MariaDB
-- versão do PHP: 7.4.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `projeto_rating`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `filmes`
--

CREATE TABLE `filmes` (
  `id` int(11) NOT NULL,
  `titulo` varchar(100) NOT NULL,
  `media` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `filmes`
--

INSERT INTO `filmes` (`id`, `titulo`, `media`) VALUES
(4, 'Vingadores', 3.89362),
(5, 'Homem Aranha', 3.68),
(6, 'Doutor Estranho', 3.88889);

-- --------------------------------------------------------

--
-- Estrutura da tabela `votos`
--

CREATE TABLE `votos` (
  `id` int(11) NOT NULL,
  `id_filme` int(11) NOT NULL,
  `nota` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `votos`
--

INSERT INTO `votos` (`id`, `id_filme`, `nota`) VALUES
(41, 4, 4),
(42, 4, 2),
(43, 4, 3),
(44, 4, 5),
(45, 4, 3),
(46, 4, 5),
(47, 4, 1),
(48, 4, 1),
(49, 4, 2),
(50, 4, 3),
(51, 4, 3),
(52, 4, 5),
(53, 4, 5),
(54, 4, 5),
(55, 4, 2),
(56, 4, 2),
(57, 4, 3),
(58, 4, 4),
(59, 4, 4),
(60, 4, 2),
(61, 4, 5),
(62, 4, 4),
(63, 4, 5),
(64, 4, 5),
(65, 4, 5),
(66, 4, 5),
(67, 4, 5),
(68, 4, 5),
(69, 4, 5),
(70, 4, 5),
(71, 4, 5),
(72, 4, 4),
(73, 4, 5),
(74, 4, 5),
(75, 4, 4),
(76, 4, 3),
(77, 5, 5),
(78, 5, 4),
(79, 5, 5),
(80, 5, 4),
(81, 5, 5),
(82, 5, 1),
(83, 5, 2),
(84, 5, 3),
(85, 5, 5),
(86, 5, 5),
(87, 5, 5),
(88, 5, 3),
(89, 5, 3),
(90, 4, 4),
(91, 5, 4),
(92, 5, 4),
(93, 5, 4),
(94, 4, 3),
(95, 4, 3),
(96, 4, 3),
(97, 5, 4),
(98, 4, 5),
(99, 5, 5),
(100, 6, 5),
(101, 6, 5),
(102, 6, 4),
(103, 4, 5),
(104, 4, 3),
(105, 4, 5),
(106, 5, 5),
(107, 6, 5),
(108, 6, 4),
(109, 6, 2),
(110, 4, 4),
(111, 4, 4),
(112, 4, 5),
(113, 5, 5),
(114, 6, 5),
(115, 6, 2),
(116, 5, 2),
(117, 5, 2),
(118, 5, 2),
(119, 5, 2),
(120, 6, 3),
(121, 5, 3);

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `filmes`
--
ALTER TABLE `filmes`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `votos`
--
ALTER TABLE `votos`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `filmes`
--
ALTER TABLE `filmes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de tabela `votos`
--
ALTER TABLE `votos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=122;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

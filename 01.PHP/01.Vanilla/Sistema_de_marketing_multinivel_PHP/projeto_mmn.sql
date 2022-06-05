-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 03-Out-2021 às 03:00
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
-- Banco de dados: `projeto_mmn`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `patentes`
--

CREATE TABLE `patentes` (
  `id` int(11) NOT NULL,
  `nome` varchar(50) NOT NULL,
  `min` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `patentes`
--

INSERT INTO `patentes` (`id`, `nome`, `min`) VALUES
(1, 'Iniciante', 0),
(2, 'Júnior', 1),
(3, 'Diretor', 3),
(4, 'Diretor Sênior', 5),
(5, 'Executivo', 10);

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL,
  `id_pai` int(11) NOT NULL,
  `patente` int(11) NOT NULL DEFAULT 1,
  `nome` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `senha` varchar(32) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `usuarios`
--

INSERT INTO `usuarios` (`id`, `id_pai`, `patente`, `nome`, `email`, `senha`) VALUES
(1, 0, 4, 'Sistema', 'sistema@hotmail.com', '202cb962ac59075b964b07152d234b70'),
(2, 1, 1, 'Fulano', 'fulano@gmail.com', 'fbad19c19e9c4baff8b963e8fc6f794b'),
(3, 1, 4, 'Cicrano', 'cicrano@gmail.com', 'b7f267b6c483a81d77427378c470ca82'),
(4, 3, 3, 'Paulo', 'paulo@gmail.com', '6ee236e4d0ab7380bb1bee87b8f0dce5'),
(5, 3, 1, 'Pedro', 'pedro@gmail.com', 'c3b7f393410fe6185ba5d966a213a38f'),
(6, 4, 2, 'João', 'joao@gmail.com', 'e52d270281261b738fcd413c72d8ad4c'),
(7, 6, 2, 'Pedrinho', 'pedrinho@gmail.com', 'a9d0cf0bd640913b43b0b2d3b917765f'),
(8, 7, 1, 'Roberto', 'roberto@gmail.com', '5f177272b67a69c573dc1de61c853157');

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `patentes`
--
ALTER TABLE `patentes`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `patentes`
--
ALTER TABLE `patentes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de tabela `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

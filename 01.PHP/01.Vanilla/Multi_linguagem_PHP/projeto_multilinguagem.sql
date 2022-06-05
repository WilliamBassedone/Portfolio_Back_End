-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 23-Set-2021 às 03:18
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
-- Banco de dados: `projeto_multilinguagem`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `categorias`
--

CREATE TABLE `categorias` (
  `id` int(11) UNSIGNED NOT NULL,
  `lang_item` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `categorias`
--

INSERT INTO `categorias` (`id`, `lang_item`) VALUES
(1, 'CATEGORIA_PHOTO'),
(3, 'CATEGORIA_CLOTHES');

-- --------------------------------------------------------

--
-- Estrutura da tabela `lang`
--

CREATE TABLE `lang` (
  `id` int(11) UNSIGNED NOT NULL,
  `lang` varchar(10) DEFAULT NULL,
  `nome` varchar(50) DEFAULT NULL,
  `valor` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `lang`
--

INSERT INTO `lang` (`id`, `lang`, `nome`, `valor`) VALUES
(1, 'en', 'CATEGORIA_PHOTO', 'Photos'),
(2, 'pt-br', 'CATEGORIA_PHOTO', 'Fotos'),
(3, 'es', 'CATEGORIA_PHOTO', 'Fotolos'),
(4, 'en', 'CATEGORIA_CLOTHES', 'Clothes'),
(5, 'pt-br', 'CATEGORIA_CLOTHES', 'Roupas'),
(6, 'es', 'CATEGORIA_CLOTHES', 'Roupalas');

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `categorias`
--
ALTER TABLE `categorias`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `lang`
--
ALTER TABLE `lang`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `categorias`
--
ALTER TABLE `categorias`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de tabela `lang`
--
ALTER TABLE `lang`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

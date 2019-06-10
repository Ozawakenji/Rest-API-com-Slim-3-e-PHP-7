-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 11-Jun-2019 às 01:46
-- Versão do servidor: 10.1.38-MariaDB
-- versão do PHP: 7.3.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `gestaovendas`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `carrinho`
--

CREATE TABLE `carrinho` (
  `id` int(10) UNSIGNED NOT NULL,
  `idusuario` int(11) NOT NULL,
  `idproduto` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `produtos`
--

CREATE TABLE `produtos` (
  `id` int(10) UNSIGNED NOT NULL,
  `nome` varchar(255) NOT NULL,
  `quantidade` int(11) NOT NULL,
  `imagem` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `produtos`
--

INSERT INTO `produtos` (`id`, `nome`, `quantidade`, `imagem`) VALUES
(1, 'Colar 1978', 313, 'colar_1978.jpg'),
(2, 'Colar ASA', 548, 'colar_asa.jpg'),
(3, 'Pulseira X', 111, 'pulseira_x.jpg');

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuario`
--

CREATE TABLE `usuario` (
  `id` int(10) UNSIGNED NOT NULL,
  `nome` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `senha` varchar(255) NOT NULL,
  `endereco` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `usuario`
--

INSERT INTO `usuario` (`id`, `nome`, `email`, `senha`, `endereco`) VALUES
(1, 'Kenji Ozawa Guimarães', 'kozawa@gmail.com', '123456', 'Rua João José Rescala, 333, Condominio Araguaia'),
(2, 'Felipe Cotrim', 'felipec@gmail.com', '123456', 'Rua Martim dos Santos, 122, Condominio Palmeiras');

-- --------------------------------------------------------

--
-- Estrutura da tabela `vendas`
--

CREATE TABLE `vendas` (
  `id` int(10) UNSIGNED NOT NULL,
  `idprodutos` int(10) UNSIGNED NOT NULL,
  `idusuario` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `vendas`
--

INSERT INTO `vendas` (`id`, `idprodutos`, `idusuario`) VALUES
(1, 1, 1),
(2, 3, 1),
(3, 2, 1),
(4, 2, 1),
(5, 1, 1),
(6, 3, 1),
(7, 2, 1),
(8, 1, 1),
(9, 3, 1),
(10, 2, 1),
(11, 1, 1),
(12, 3, 1),
(13, 1, 1),
(14, 3, 1),
(15, 2, 1),
(16, 1, 1),
(17, 2, 1),
(18, 3, 1),
(19, 1, 1),
(20, 2, 1),
(21, 3, 1),
(22, 3, 1),
(23, 3, 1),
(24, 2, 1),
(25, 2, 1),
(26, 1, 1),
(27, 1, 1),
(28, 3, 1),
(29, 2, 1),
(30, 3, 1),
(31, 2, 1),
(32, 1, 1),
(33, 1, 1),
(34, 1, 1),
(35, 2, 1),
(36, 2, 1),
(37, 3, 1),
(38, 1, 1),
(39, 3, 1),
(40, 2, 1),
(41, 1, 1),
(42, 2, 1),
(43, 1, 1),
(44, 1, 1),
(45, 2, 1),
(46, 3, 1),
(47, 2, 1),
(48, 1, 1),
(49, 1, 1),
(50, 1, 1),
(51, 2, 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `carrinho`
--
ALTER TABLE `carrinho`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `produtos`
--
ALTER TABLE `produtos`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `vendas`
--
ALTER TABLE `vendas`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `carrinho`
--
ALTER TABLE `carrinho`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `produtos`
--
ALTER TABLE `produtos`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `usuario`
--
ALTER TABLE `usuario`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `vendas`
--
ALTER TABLE `vendas`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=52;

--
-- Constraints for dumped tables
--

--
-- Limitadores para a tabela `vendas`
--
ALTER TABLE `vendas`
  ADD CONSTRAINT `fk_vendas_idprodutos_produtos_id` FOREIGN KEY (`idprodutos`) REFERENCES `produtos` (`id`),
  ADD CONSTRAINT `fk_vendas_idusuario_usuario_id` FOREIGN KEY (`idusuario`) REFERENCES `usuario` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

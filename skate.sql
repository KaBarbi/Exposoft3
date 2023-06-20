-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 18/06/2023 às 22:06
-- Versão do servidor: 10.4.28-MariaDB
-- Versão do PHP: 8.0.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `skate`
--

-- --------------------------------------------------------

--
-- Estrutura para tabela `adm`
--

CREATE TABLE `adm` (
  `idadm` int(11) NOT NULL,
  `nome` varchar(40) NOT NULL,
  `user` varchar(30) NOT NULL,
  `cel` varchar(15) NOT NULL,
  `email` varchar(50) NOT NULL,
  `cpf` varchar(14) NOT NULL,
  `senha` varchar(16) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Despejando dados para a tabela `adm`
--

INSERT INTO `adm` (`idadm`, `nome`, `user`, `cel`, `email`, `cpf`, `senha`) VALUES
(1, 'Felipe Moya Figueiredo', 'felp_mf', '(11)97896-1047', 'felipemoya.figueiredo@scseduca.com.br', '111.111.111-11', '1209g'),
(2, 'Kaue Barbi', 'BS7', '(11)95238-7184', 'kaue.barbi@scseduca.com.br', '222.222.222.22', '1234567'),
(3, 'Miguel Arcanjo Buglio', 'Ozzy', '(11)93763-2723', 'miguel.buglio@scseduca.com.br', '333.333.333-33', 'Ozzy1234'),
(4, 'admin', 'admin', '0000', 'adm@gmail.com', '0000', 'papaicris7');

-- --------------------------------------------------------

--
-- Estrutura para tabela `cadcli`
--

CREATE TABLE `cadcli` (
  `idcli` int(11) NOT NULL,
  `nome` varchar(40) NOT NULL,
  `user` varchar(10) NOT NULL,
  `cel` varchar(13) NOT NULL,
  `email` varchar(50) NOT NULL,
  `cpf` varchar(11) NOT NULL,
  `senha` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Despejando dados para a tabela `cadcli`
--

INSERT INTO `cadcli` (`idcli`, `nome`, `user`, `cel`, `email`, `cpf`, `senha`) VALUES
(1, 'Felipe Moya Figueiredo', 'felpo', '(11)978961047', 'felipeayom2.f@gmail.com', '53972263864', '12345'),
(2, 'Kaue Barbi', 'Barbi', '(11)95238-718', 'kalindo@gmail.com', '93239221020', '12345'),
(3, 'Miguel Buglio', 'Miguel', '(11)937632726', 'bugliomiguelarcanjo1@gmail.com', '57606237883', '12345678'),
(15, 'alessandro', 'alezito53', '11993081810', 'alessandro.ciosami@uscsonline.com.br', '50913775819', 'jefferson'),
(19, 'Maria Jooana', 'MJ', '11952387788', 'mj@gmail.com', '48385320407', '1234');

-- --------------------------------------------------------

--
-- Estrutura para tabela `cadprod`
--

CREATE TABLE `cadprod` (
  `idprod` int(11) NOT NULL,
  `img` varchar(50) NOT NULL,
  `prodnome` varchar(50) NOT NULL,
  `tipo` varchar(25) NOT NULL,
  `preco` decimal(10,2) NOT NULL,
  `descricao` varchar(150) NOT NULL,
  `visivel` int(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Despejando dados para a tabela `cadprod`
--

INSERT INTO `cadprod` (`idprod`, `img`, `prodnome`, `tipo`, `preco`, `descricao`, `visivel`) VALUES
(1, 'img/skatemon1.png', 'Skate Completo<br>Santa Cruz', 'skatecompleto', 769.99, 'Shape: santa cruz lixa: grizzly', 1),
(2, 'img/skatemontado2.png', 'Skate Completo <br> Santa Cruz Black', 'skatecompleto', 799.99, 'Shape: Santa Cruz Black, Chave T: Black Sheep, Rolamento: Everlong, Truck: Intruder, Roda: Black Sheep.', 1),
(3, 'img/skatemontado3.png', 'Skate Completo <br> Black Sheep White', 'skatecompleto', 269.99, 'Shape: Black Sheep, Truck: Stick, Rolamento: Black Sheep, Roda: Black Sheep.', 1),
(4, 'img/skatemontado4.png', 'Skate Completo <br> Element', 'skatecompleto', 1229.99, 'Shape: Element, Truck: Intruder, Chave T: Black Sheep, Roda: Hondar, Rolamento: Black Sheep Gold.', 1),
(5, 'img/skatemontado5.png', 'Skate Completo <br> Baker Blue', 'skatecompleto', 1299.99, 'Shape: Baker, Roda: Splitfire, Rolamento: Splitfire, Truck: Independent.', 1),
(6, 'img/skatemontado6.png', 'Skate Completo <br> Black Sheep Brown', 'skatecompleto', 293.99, 'Shape: Black Sheep Brown, Roda: Black Sheep, Truck: Stick, Rolamento: Black Sheep.', 1),
(8, 'img/shapebakermapple.png', 'Shape Baker <br> Mapple', 'shape', 389.99, 'Shape da Baker feito de Maple Canadense - Tamanho: 8.0', 1),
(9, 'img/shapebsmapple.png', 'Shape Black <br> Sheep Mapple', 'shape', 139.99, 'Shape da Black Sheep feito de Maple Canadense - Tamanho: 8.0', 1),
(10, 'img/shapesantamapple.png', 'Shape Santa <br> Cruz Mapple', 'shape', 889.99, 'Shape da Santa Cruz feito de Maple Canadense - Tamanho: 8.0', 1),
(11, 'img/shapesantapower.png', 'Shape Santa <br> Cruz Powerlite ', 'shape', 239.99, 'Shape da Santa Cruz feito de Marfim e Fiberglass - Tamanho: 7.5', 1),
(12, 'img/shapethisway.png', 'Shape This <br> Way FiberGlass', 'shape', 179.99, 'Shape da This Way feito de Marfim e Fiberglass - Tamanho: 7.5', 1),
(13, 'img/roda2.png', 'Roda Splitfire <br> 53mm', 'roda', 429.99, 'Roda Splitfire de Alta Performance - Tamanho: 53mm', 1),
(14, 'img/roda6.png', 'Roda Hondar <br> 52mm', 'roda', 179.99, 'Roda Hondar de Otima Performance - Tamanho: 52mm', 1),
(15, 'img/roda7.png', 'Roda Mentex <br> 53mm', 'roda', 59.99, 'Roda Mentex de Baixa Performance - Tamanho: 53mm', 1),
(16, 'img/roda4.png', 'Roda Bones <br> 53mm', 'roda', 469.99, 'Roda Bones de Alta Performance - Tamanho: 53mm', 1),
(17, 'img/roda3.png', 'Roda Bones Gold <br> 53mm', 'roda', 399.99, 'Roda Bones de Alta Performance - Tamanho: 53mm', 1),
(18, 'img/redbones.png', 'Rolamento Skate <br> Red Bones', 'rolamento', 199.99, 'Rolamento de Skate Red Bones de Alta Performance', 1),
(19, 'img/redbonesceramic.png', 'Rolamento Skate <br> Red Bones Ceramica', 'rolamento', 859.99, 'Rolamento de Skate Red Bones Ceramic de Altissíma Performance', 1),
(20, 'img/rolamentominilogo.png', 'Rolamento Skate <br> Mini-Logo', 'rolamento', 149.99, 'Rolamento de Skate Mini-Logo de Alta Performance', 1),
(21, 'img/rolamentobsred.png', 'Rolamento Skate <br> Black Sheep', 'rolamento', 59.99, 'Rolamento de Skate Black Sheep de Média Performance', 1),
(22, 'img/rolamentobs.png', 'Rolamento Skate <br> Black Sheep Gold', 'rolamento', 69.99, 'Rolamento de Skate Black Sheep de Ótima Performance', 1),
(23, 'img/truck2.png', 'Truck Stick <br> 1,39mm', 'truck', 108.99, 'Truck Stick Iniciante de Boa Performance', 1),
(24, 'img/truck1.png', 'Truck Stick <br> 1,29mm', 'truck', 108.99, 'Truck Stick Iniciante de Boa Performance', 1),
(25, 'img/truck7.png', 'Truck Independent <br> 1,39mm', 'truck', 697.99, 'Truck Independent de Altissíma Performance', 1),
(26, 'img/truck4.png', 'Truck Intruder <br> 1,29mm', 'truck', 218.99, 'Truck Intruder de Alta Performance', 1),
(27, 'img/truck3.png', 'Truck Intruder <br> 1,39mm', 'truck', 218.99, 'Truck Intruder de Alta Performance', 1),
(28, 'img/chavet.png', 'Chave T <br> Black Sheep', 'ferramenta', 39.99, 'Chave em T Black Sheep', 1),
(29, 'img/chavet2.png', 'Chave T <br> Hondar', 'ferramenta', 69.99, 'Chave em T Hondar', 1),
(30, 'img/parafusoti.png', 'Parafusos Base <br> Trasher & Independent', 'ferramenta', 34.99, 'Parafusos de Base da Trasher & Independent', 1),
(31, 'img/parafusos2.png', 'Parafusos Base <br> Black Sheep', 'ferramenta', 15.99, 'Parafusos de Base Black Sheep', 1),
(32, 'img/velasplit.png', 'Vela Skate <br> Spitfire', 'ferramenta', 22.99, 'Vela de Skate Spitfire', 1),
(33, 'img/vela2.png', 'Vela Skate <br> Toy Machine', 'ferramenta', 22.99, 'Vela de Skate Toy Machine', 1),
(34, 'img/nacional.png', 'Lixa para Skate <br> Lixa Nacional', 'lixa', 13.00, 'lixa nacional preta ', 1),
(35, 'img/bslixa.png', 'Lixa para Skate <br>  Black Sheep', 'lixa', 59.00, 'lixa Black Sheep', 1),
(36, 'img/Lixadd.png', ' Lixa para Skate <br> Drop Dead', 'lixa', 56.00, 'lixa Drop Dead', 1),
(37, 'img/lixathrasher.png', 'Lixa para Skate <br> Trasher', 'lixa', 132.00, 'lixa trasher', 1),
(38, 'img/Lixagrizzly.png', 'Lixa para Skate <br> Grizzly', 'lixa', 99.00, 'lixaGrizzly', 1);

-- --------------------------------------------------------

--
-- Estrutura para tabela `endercli`
--

CREATE TABLE `endercli` (
  `idender` int(11) NOT NULL,
  `idcli` int(11) NOT NULL,
  `cep` varchar(9) NOT NULL,
  `estado` varchar(25) NOT NULL,
  `cidade` varchar(35) NOT NULL,
  `bairro` varchar(35) NOT NULL,
  `rua` varchar(35) NOT NULL,
  `numero` varchar(10) NOT NULL,
  `complemento` varchar(30) NOT NULL,
  `visivel` tinyint(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Despejando dados para a tabela `endercli`
--

INSERT INTO `endercli` (`idender`, `idcli`, `cep`, `estado`, `cidade`, `bairro`, `rua`, `numero`, `complemento`, `visivel`) VALUES
(1, 19, '58410193', 'PB', 'Campina Grande', 'Catolé', 'Rua José Adnoste Roberto', '148', '', 1),
(2, 19, '59012120', 'RN', 'Natal', 'Ribeira', 'Rua Coronel Felinto Elízio', '10', '', 1),
(3, 19, '44071436', 'BA', 'Feira de Santana', 'Santo Antônio dos Prazeres', 'Rua Itaguatiara', '83', '', 1),
(4, 1, '71996050', 'DF', 'Brasília', 'Setor Habitacional Arniqueira (Água', 'Conjunto SHA Conjunto 6 Chácara 6', '33', '', 1),
(5, 1, '79823503', 'MS', 'Dourados', 'Altos do Indaiá', 'Rua Thealmo João Ioris', '56', '', 1),
(6, 3, '52120165', 'PE', 'Recife', 'Água Fria', 'Rua Angelim', '21', '', 1),
(7, 3, '64212215', 'PI', 'Parnaíba', 'Rodoviária', 'Rua Ceará', '8', '', 1),
(8, 2, '09530530', 'SP', 'Sao Caetano', 'ceramica', 'Noruga', '69', '', 1);

-- --------------------------------------------------------

--
-- Estrutura para tabela `pedidos`
--

CREATE TABLE `pedidos` (
  `idpedido` int(40) NOT NULL,
  `idprod` int(11) NOT NULL,
  `idcli` int(11) NOT NULL,
  `idender` int(11) NOT NULL,
  `qtd` varchar(15) NOT NULL,
  `totalped` varchar(15) NOT NULL,
  `data_pedido` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Despejando dados para a tabela `pedidos`
--

INSERT INTO `pedidos` (`idpedido`, `idprod`, `idcli`, `idender`, `qtd`, `totalped`, `data_pedido`) VALUES
(1, 32, 2, 8, '1', '22.99', '2023-06-18'),
(2, 27, 1, 5, '1', '338.97', '2023-06-18'),
(3, 15, 1, 5, '2', '338.97', '2023-06-18'),
(4, 10, 3, 6, '2', '1779.98', '2023-06-18');

--
-- Índices para tabelas despejadas
--

--
-- Índices de tabela `adm`
--
ALTER TABLE `adm`
  ADD PRIMARY KEY (`idadm`);

--
-- Índices de tabela `cadcli`
--
ALTER TABLE `cadcli`
  ADD PRIMARY KEY (`idcli`);

--
-- Índices de tabela `cadprod`
--
ALTER TABLE `cadprod`
  ADD PRIMARY KEY (`idprod`);

--
-- Índices de tabela `endercli`
--
ALTER TABLE `endercli`
  ADD PRIMARY KEY (`idender`);

--
-- Índices de tabela `pedidos`
--
ALTER TABLE `pedidos`
  ADD PRIMARY KEY (`idpedido`);

--
-- AUTO_INCREMENT para tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `adm`
--
ALTER TABLE `adm`
  MODIFY `idadm` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de tabela `cadcli`
--
ALTER TABLE `cadcli`
  MODIFY `idcli` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT de tabela `cadprod`
--
ALTER TABLE `cadprod`
  MODIFY `idprod` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT de tabela `endercli`
--
ALTER TABLE `endercli`
  MODIFY `idender` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de tabela `pedidos`
--
ALTER TABLE `pedidos`
  MODIFY `idpedido` int(40) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

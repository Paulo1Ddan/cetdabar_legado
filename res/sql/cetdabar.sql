-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 14-Out-2022 às 13:12
-- Versão do servidor: 10.4.24-MariaDB
-- versão do PHP: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `cetdabar`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `addressuser`
--

CREATE TABLE `addressuser` (
  `idaddress` int(11) NOT NULL,
  `cepuser` char(9) NOT NULL,
  `addressuser` varchar(100) NOT NULL,
  `bairrouser` varchar(50) NOT NULL,
  `cidadeuser` varchar(40) NOT NULL,
  `numerouser` varchar(10) NOT NULL,
  `complementouser` varchar(30) DEFAULT NULL,
  `iduser` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `addressuser`
--

INSERT INTO `addressuser` (`idaddress`, `cepuser`, `addressuser`, `bairrouser`, `cidadeuser`, `numerouser`, `complementouser`, `iduser`) VALUES
(2, '08575-650', 'Rua Amarela', 'JD Azul', 'Itaquaquecetuba', '123', '', 1),
(6, '08575-650', 'Rua Azul', 'JD Azul', 'São Paulo', '134', 'Apt 2', 39);

-- --------------------------------------------------------

--
-- Estrutura da tabela `addrnucleo`
--

CREATE TABLE `addrnucleo` (
  `idaddrdabar` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estrutura da tabela `arquivo`
--

CREATE TABLE `arquivo` (
  `idarquivo` int(11) NOT NULL,
  `arquivo` varchar(100) NOT NULL,
  `idcurso` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `arquivo`
--

INSERT INTO `arquivo` (`idarquivo`, `arquivo`, `idcurso`) VALUES
(1, 'Arquivo.txt', 1),
(2, 'Paulo Daniel Nascimento da Palma.pdf', 2);

-- --------------------------------------------------------

--
-- Estrutura da tabela `artigo`
--

CREATE TABLE `artigo` (
  `idartigo` int(11) NOT NULL,
  `tituloartigo` varchar(256) NOT NULL,
  `artigo` text NOT NULL,
  `imgcapa` varchar(100) NOT NULL,
  `imgbanner` varchar(100) NOT NULL,
  `dataartigo` date NOT NULL,
  `statusblog` int(11) NOT NULL,
  `iduser` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `artigo`
--

INSERT INTO `artigo` (`idartigo`, `tituloartigo`, `artigo`, `imgcapa`, `imgbanner`, `dataartigo`, `statusblog`, `iduser`) VALUES
(1, 'Jesus Ressucitou', '                                                <p style=\"margin-right: 0px; margin-bottom: 15px; margin-left: 0px; padding: 0px; text-align: justify; color: rgb(0, 0, 0); font-family: \"Open Sans\", Arial, sans-serif; font-size: 14px;\">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Fusce eu semper velit, sed molestie leo. Fusce sodales, est et scelerisque consequat, velit metus luctus arcu, vel venenatis justo arcu eget ante. Maecenas mollis imperdiet efficitur. Aenean porta suscipit luctus. Maecenas facilisis lorem sem, ut varius metus tristique a. Nullam euismod efficitur placerat. Ut molestie ligula id diam lobortis consequat. Donec accumsan felis odio, ut molestie lacus cursus a. Aliquam erat volutpat. Fusce sollicitudin metus eget venenatis euismod. Nam finibus ligula bibendum libero bibendum convallis.</p><p style=\"margin-right: 0px; margin-bottom: 15px; margin-left: 0px; padding: 0px; text-align: justify; color: rgb(0, 0, 0); font-family: \"Open Sans\", Arial, sans-serif; font-size: 14px;\"><br></p><p style=\"margin-right: 0px; margin-bottom: 15px; margin-left: 0px; padding: 0px; text-align: justify; color: rgb(0, 0, 0); font-family: \"Open Sans\", Arial, sans-serif; font-size: 14px;\">Fusce vitae tortor vitae lorem congue pretium. Curabitur quam massa, vehicula ut facilisis sagittis, porta sit amet urna. Suspendisse potenti. Sed tortor mi, convallis fringilla nunc non, viverra aliquam nunc. In ex ipsum, feugiat in turpis id, convallis laoreet velit. Donec efficitur nibh nec dui mollis, ut hendrerit dui consequat. Nullam nec nisl nulla. In posuere, risus sed venenatis euismod, ipsum augue pharetra nisl, a rhoncus turpis mi sit amet elit.</p><p style=\"margin-right: 0px; margin-bottom: 15px; margin-left: 0px; padding: 0px; text-align: justify; color: rgb(0, 0, 0); font-family: \"Open Sans\", Arial, sans-serif; font-size: 14px;\"><br></p><p style=\"margin-right: 0px; margin-bottom: 15px; margin-left: 0px; padding: 0px; text-align: justify; color: rgb(0, 0, 0); font-family: \"Open Sans\", Arial, sans-serif; font-size: 14px;\">Nam vitae massa pretium, sodales risus nec, eleifend nisi. Vivamus blandit laoreet purus vitae pharetra. Integer commodo egestas augue ac condimentum. In id ipsum nulla. Fusce suscipit faucibus justo quis luctus. Suspendisse feugiat nisi sed ipsum varius, egestas suscipit arcu ultricies. Sed leo libero, tempus ut quam quis, elementum dictum nibh. Fusce imperdiet mi in odio faucibus interdum. Mauris nec porttitor mi. Curabitur porttitor leo dolor, gravida eleifend mauris maximus eget.</p><p style=\"margin-right: 0px; margin-bottom: 15px; margin-left: 0px; padding: 0px; text-align: justify; color: rgb(0, 0, 0); font-family: \"Open Sans\", Arial, sans-serif; font-size: 14px;\"><br></p><p style=\"margin-right: 0px; margin-bottom: 15px; margin-left: 0px; padding: 0px; text-align: justify; color: rgb(0, 0, 0); font-family: \"Open Sans\", Arial, sans-serif; font-size: 14px;\">Cras at mollis lorem. Sed eu imperdiet turpis. Vestibulum faucibus ut nulla id vulputate. Mauris laoreet scelerisque libero ut vestibulum. Quisque auctor ipsum sit amet lacus faucibus, a pretium erat aliquet. In molestie nisl sit amet turpis pellentesque interdum. Quisque scelerisque, est auctor molestie tincidunt, leo orci tristique risus, vitae venenatis nunc felis et tellus. Curabitur facilisis venenatis vulputate. Morbi consequat sem sit amet condimentum bibendum. Nam porttitor bibendum sem vel pretium. Nam mauris odio, ornare at malesuada eu, hendrerit non metus. Pellentesque ut nunc orci.</p><p style=\"margin-right: 0px; margin-bottom: 15px; margin-left: 0px; padding: 0px; text-align: justify; color: rgb(0, 0, 0); font-family: \"Open Sans\", Arial, sans-serif; font-size: 14px;\"><br></p><p style=\"margin-right: 0px; margin-bottom: 15px; margin-left: 0px; padding: 0px; text-align: justify; color: rgb(0, 0, 0); font-family: \"Open Sans\", Arial, sans-serif; font-size: 14px;\">Nam imperdiet mi dui, sed bibendum nulla tempor ac. Nullam eu nibh id erat consequat lobortis at vitae nisl. Maecenas in lacus ut tellus semper congue. Orci varius natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Mauris id eros non ex pretium pulvinar. Sed placerat arcu nec est varius, at auctor mi interdum. Aliquam erat volutpat. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Integer gravida velit vitae purus vestibulum pharetra. Nulla pretium cursus turpis eu commodo.</p>                                            ', 'eaec806f9886f611a8c968df2d2b0272.jpg', 'c81e728d9d4c2f636f067f89cc14862c.jpg', '2022-07-19', 1, 1),
(2, 'O que é Escatologia?', '<p style=\"margin-right: 0px; margin-bottom: 15px; margin-left: 0px; padding: 0px; text-align: justify; color: rgb(0, 0, 0); font-family: &quot;Open Sans&quot;, Arial, sans-serif; font-size: 14px;\"><span style=\"font-family: Arial;\">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Fusce eu semper velit, sed molestie leo. Fusce sodales, est et scelerisque consequat, velit metus luctus arcu, vel venenatis justo arcu eget ante. Maecenas mollis imperdiet efficitur. Aenean porta suscipit luctus. Maecenas facilisis lorem sem, ut varius metus tristique a. Nullam euismod efficitur placerat. Ut molestie ligula id diam lobortis consequat. Donec accumsan felis odio, ut molestie lacus cursus a. Aliquam erat volutpat. Fusce sollicitudin metus eget venenatis euismod. Nam finibus ligula bibendum libero bibendum convallis.</span></p><p style=\"margin-right: 0px; margin-bottom: 15px; margin-left: 0px; padding: 0px; text-align: justify; color: rgb(0, 0, 0); font-family: &quot;Open Sans&quot;, Arial, sans-serif; font-size: 14px;\"><span style=\"font-family: Arial;\">Fusce vitae tortor vitae lorem congue pretium. Curabitur quam massa, vehicula ut facilisis sagittis, porta sit amet urna. Suspendisse potenti. Sed tortor mi, convallis fringilla nunc non, viverra aliquam nunc. In ex ipsum, feugiat in turpis id, convallis laoreet velit. Donec efficitur nibh nec dui mollis, ut hendrerit dui consequat. Nullam nec nisl nulla. In posuere, risus sed venenatis euismod, ipsum augue pharetra nisl, a rhoncus turpis mi sit amet elit.</span></p><p style=\"margin-right: 0px; margin-bottom: 15px; margin-left: 0px; padding: 0px; text-align: justify; color: rgb(0, 0, 0); font-family: &quot;Open Sans&quot;, Arial, sans-serif; font-size: 14px;\"><span style=\"font-family: Arial;\">Nam vitae massa pretium, sodales risus nec, eleifend nisi. Vivamus blandit laoreet purus vitae pharetra. Integer commodo egestas augue ac condimentum. In id ipsum nulla. Fusce suscipit faucibus justo quis luctus. Suspendisse feugiat nisi sed ipsum varius, egestas suscipit arcu ultricies. Sed leo libero, tempus ut quam quis, elementum dictum nibh. Fusce imperdiet mi in odio faucibus interdum. Mauris nec porttitor mi. Curabitur porttitor leo dolor, gravida eleifend mauris maximus eget.</span></p><p style=\"margin-right: 0px; margin-bottom: 15px; margin-left: 0px; padding: 0px; text-align: justify; color: rgb(0, 0, 0); font-family: &quot;Open Sans&quot;, Arial, sans-serif; font-size: 14px;\"><span style=\"font-family: Arial;\">Cras at mollis lorem. Sed eu imperdiet turpis. Vestibulum faucibus ut nulla id vulputate. Mauris laoreet scelerisque libero ut vestibulum. Quisque auctor ipsum sit amet lacus faucibus, a pretium erat aliquet. In molestie nisl sit amet turpis pellentesque interdum. Quisque scelerisque, est auctor molestie tincidunt, leo orci tristique risus, vitae venenatis nunc felis et tellus. Curabitur facilisis venenatis vulputate. Morbi consequat sem sit amet condimentum bibendum. Nam porttitor bibendum sem vel pretium. Nam mauris odio, ornare at malesuada eu, hendrerit non metus. Pellentesque ut nunc orci.</span></p><p style=\"margin-right: 0px; margin-bottom: 15px; margin-left: 0px; padding: 0px; text-align: justify; color: rgb(0, 0, 0); font-family: &quot;Open Sans&quot;, Arial, sans-serif; font-size: 14px;\"><span style=\"font-family: Arial;\">Nam imperdiet mi dui, sed bibendum nulla tempor ac. Nullam eu nibh id erat consequat lobortis at vitae nisl. Maecenas in lacus ut tellus semper congue. Orci varius natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Mauris id eros non ex pretium pulvinar. Sed placerat arcu nec est varius, at auctor mi interdum. Aliquam erat volutpat. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Integer gravida velit vitae purus vestibulum pharetra. Nulla pretium cursus turpis eu commodo.</span></p>', '3a0ce0be30b4aea1f738c0ade611fdf7.jpg', 'c8f228cb7b2e6ca3f292c613c89f5173.jpg', '2022-07-19', 1, 1),
(6, 'Sobre Cristologia', '<p style=\"margin-right: 0px; margin-bottom: 15px; margin-left: 0px; padding: 0px; text-align: justify; color: rgb(0, 0, 0); font-family: &quot;Open Sans&quot;, Arial, sans-serif; font-size: 14px;\">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam elementum quam diam, et blandit erat feugiat nec. Nunc at nibh pellentesque, suscipit lacus ac, tempus nisl. Integer lobortis elementum nisl. Morbi efficitur nunc non tortor maximus fringilla. Ut lobortis diam vel justo pulvinar, ac cursus leo commodo. Pellentesque et nibh elit. Mauris placerat fringilla suscipit. Nam posuere vulputate magna id vestibulum. Praesent tristique sit amet massa sit amet porttitor. Curabitur pretium ut ex non tempus. Aenean scelerisque urna libero, in rutrum quam mattis sit amet.</p><p style=\"margin-right: 0px; margin-bottom: 15px; margin-left: 0px; padding: 0px; text-align: justify; color: rgb(0, 0, 0); font-family: &quot;Open Sans&quot;, Arial, sans-serif; font-size: 14px;\">Sed luctus vehicula sapien eget ornare. Curabitur cursus enim eu libero faucibus, sollicitudin mattis nulla sagittis. In luctus mi a ultricies vehicula. Nulla pellentesque velit eu nulla rhoncus, cursus malesuada leo placerat. Sed a urna fermentum, pulvinar mi sed, maximus massa. Curabitur pulvinar aliquam ultrices. Praesent nisl dui, tempus ac leo pretium, efficitur sodales mi. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Integer accumsan erat id gravida ullamcorper. Praesent sagittis sem turpis, vel sagittis urna auctor eget. Nulla facilisi.</p><p style=\"margin-right: 0px; margin-bottom: 15px; margin-left: 0px; padding: 0px; text-align: justify; color: rgb(0, 0, 0); font-family: &quot;Open Sans&quot;, Arial, sans-serif; font-size: 14px;\">In hac habitasse platea dictumst. Vestibulum at dui eu sapien suscipit blandit sollicitudin a metus. Nam vestibulum, augue sed condimentum pulvinar, ex eros venenatis risus, quis cursus velit nisi eget odio. Ut semper est tortor. Duis a risus aliquet, sagittis lorem laoreet, malesuada metus. Nunc pellentesque, quam ut tristique mattis, odio lacus iaculis felis, in tincidunt mi arcu nec tortor. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Mauris vitae maximus sem. Cras euismod turpis ac tellus varius vulputate. Phasellus ac placerat tellus. Suspendisse vitae maximus eros, sed varius lacus. Duis vitae felis vitae nisi mollis rhoncus. Cras imperdiet est vel molestie condimentum.</p><p style=\"margin-right: 0px; margin-bottom: 15px; margin-left: 0px; padding: 0px; text-align: justify; color: rgb(0, 0, 0); font-family: &quot;Open Sans&quot;, Arial, sans-serif; font-size: 14px;\">Nullam consectetur suscipit neque, sed rhoncus augue suscipit vel. Integer lacinia justo eu ligula porta aliquam. Quisque leo purus, finibus sit amet nibh vitae, convallis venenatis lacus. Etiam id elit nec mauris bibendum gravida. Vivamus ac pulvinar turpis. Praesent accumsan, odio ac posuere egestas, lacus erat tempor est, eu consectetur magna purus nec augue. Morbi nec nisl elit. Fusce in ex eu justo gravida placerat ut non odio. Sed cursus efficitur fermentum. Phasellus at volutpat orci.</p><p style=\"margin-right: 0px; margin-bottom: 15px; margin-left: 0px; padding: 0px; text-align: justify; color: rgb(0, 0, 0); font-family: &quot;Open Sans&quot;, Arial, sans-serif; font-size: 14px;\">Cras vehicula mi vel augue molestie faucibus. Proin congue risus nec mi ultrices, nec vulputate nunc pharetra. In non accumsan magna, quis aliquet lorem. Proin venenatis enim dui, a sagittis leo dapibus ut. Suspendisse tincidunt ligula id ligula dictum iaculis ut vitae nisl. Interdum et malesuada fames ac ante ipsum primis in faucibus. Sed porta tellus et ligula aliquam congue. Orci varius natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Sed placerat eleifend sagittis. Fusce et tellus eu neque blandit eleifend at nec nunc. Proin scelerisque ultricies dictum. Sed eu volutpat leo. Donec ac risus orci.</p>', '6d678fff63d951bcca4f449136bfaefd.jpg', '46b91b84e294465cd8df38d0956afbd4.jpg', '2022-08-24', 1, 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `contato`
--

CREATE TABLE `contato` (
  `idcontato` int(11) NOT NULL,
  `nomecontato` varchar(100) NOT NULL,
  `emailcontato` varchar(100) NOT NULL,
  `teluser` char(15) DEFAULT NULL,
  `msgcontato` text NOT NULL,
  `datacontato` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estrutura da tabela `curso`
--

CREATE TABLE `curso` (
  `idcurso` int(11) NOT NULL,
  `nomecurso` varchar(60) NOT NULL,
  `desccurso` text NOT NULL,
  `valorcurso` varchar(10) NOT NULL,
  `duracao` varchar(30) NOT NULL,
  `instrutor` varchar(100) NOT NULL,
  `imgcurso` varchar(100) NOT NULL,
  `msgcurso` text NOT NULL,
  `statuscurso` char(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `curso`
--

INSERT INTO `curso` (`idcurso`, `nomecurso`, `desccurso`, `valorcurso`, `duracao`, `instrutor`, `imgcurso`, `msgcurso`, `statuscurso`) VALUES
(1, 'Curso Básico de Teologia', '                                                                                                                                                                                                                                                                                                <p><span style=\"color: rgb(0, 0, 0);\">O Curso Básico de teologia é composto por 20 matérias curriculares, sendo elas bases fundamentais para o desenvolvimento do aluno ao decorrer do curso e para o exercício de sua vocação.</span></p>\r\n<p><span style=\"color: rgb(0, 0, 0);\">O curso contém as seguintes matérias:</span></p>\r\n<ul>\r\n<li><span style=\"color: rgb(0, 0, 0);\">Escatologia I;</span></li>\r\n<li><span style=\"color: rgb(0, 0, 0);\">Heresiologia I;</span></li>\r\n<li><span style=\"color: rgb(0, 0, 0);\">Hermenêutica;</span></li>\r\n<li><span style=\"color: rgb(0, 0, 0);\">Geografia bíblica I;</span></li>\r\n<li><span style=\"color: rgb(0, 0, 0);\">História de Israel;</span></li>\r\n<li><span style=\"color: rgb(0, 0, 0);\">Historia dos avivamentos;</span></li>\r\n<li><span style=\"color: rgb(0, 0, 0);\">Elemento de música na Bíblia;</span></li>\r\n<li><span style=\"color: rgb(0, 0, 0);\">Evangelismo e integração;</span></li>\r\n<li><span style=\"color: rgb(0, 0, 0);\">Eclesiologia;</span></li>\r\n<li><span style=\"color: rgb(0, 0, 0);\">Soteriologia;</span></li>\r\n<li><span style=\"color: rgb(0, 0, 0);\">Cristologia;</span></li>\r\n<li><span style=\"color: rgb(0, 0, 0);\">Bibliologia;</span></li>\r\n<li><span style=\"color: rgb(0, 0, 0);\">Angeologia;</span></li>\r\n<li><span style=\"color: rgb(0, 0, 0);\">Teologia;</span></li>\r\n<li><span style=\"color: rgb(0, 0, 0);\">Pneumatologia;</span></li>\r\n<li><span style=\"color: rgb(0, 0, 0);\">Antropologia;</span></li>\r\n<li><span style=\"color: rgb(0, 0, 0);\">Hamartiologia;</span></li>\r\n<li><span style=\"color: rgb(0, 0, 0);\">Missiologia;</span></li>\r\n<li><span style=\"color: rgb(0, 0, 0);\">Pentateuco;</span></li>\r\n<li><span style=\"color: rgb(0, 0, 0);\">Liderança cristã</span></li>\r\n</ul>                                                                                                                                                                                                                                                                                                                    ', '', '2 anos', 'Fabio Santos', 'assets/cursos/curso1.jpg', 'Olá, gostaria de saber mais sobre o Curso Básico de Teologia', '1'),
(2, 'Curso Médio de Teologia', '                                                                                                <p><span style=\"font-family: Arial;\">﻿</span><span style=\"color: rgb(0, 0, 0);\">O Curso Médio em Teologia tem como base as 20 matérias do Curso Básico de Teologia, adicionando mais 10 matérias complementares, que somadas, são ao todo, 30 matérias.&nbsp;<strong>Se você já é aluno do <a href=\"curso.php?idCurso=1\" aria-invalid=\"true\">Curso Básico de Teologia</a>, poderá continuar com o médio adicionando as 10 matérias complementares.</strong></span></p>\r\n<p><span style=\"color: rgb(0, 0, 0);\">O curso contém as seguintes matérias:&nbsp;</span></p>\r\n<ul>\r\n<li><span style=\"color: rgb(0, 0, 0);\">Escatologia I;</span></li>\r\n<li><span style=\"color: rgb(0, 0, 0);\">Heresiologia I;</span></li>\r\n<li><span style=\"color: rgb(0, 0, 0);\">Hermenêutica;</span></li>\r\n<li><span style=\"color: rgb(0, 0, 0);\">Geografia bíblica I;</span></li>\r\n<li><span style=\"color: rgb(0, 0, 0);\">História de Israel;</span></li>\r\n<li><span style=\"color: rgb(0, 0, 0);\">Historia dos avivamentos;</span></li>\r\n<li><span style=\"color: rgb(0, 0, 0);\">Elemento de música na Bíblia;</span></li>\r\n<li><span style=\"color: rgb(0, 0, 0);\">Evangelismo e integração;</span></li>\r\n<li><span style=\"color: rgb(0, 0, 0);\">Eclesiologia;</span></li>\r\n<li><span style=\"color: rgb(0, 0, 0);\">Soteriologia;</span></li>\r\n<li><span style=\"color: rgb(0, 0, 0);\">Cristologia;</span></li>\r\n<li><span style=\"color: rgb(0, 0, 0);\">Bibliologia;</span></li>\r\n<li><span style=\"color: rgb(0, 0, 0);\">Angeologia;</span></li>\r\n<li><span style=\"color: rgb(0, 0, 0);\">Teologia;</span></li>\r\n<li><span style=\"color: rgb(0, 0, 0);\">Pneumatologia;</span></li>\r\n<li><span style=\"color: rgb(0, 0, 0);\">Antropologia;</span></li>\r\n<li><span style=\"color: rgb(0, 0, 0);\">Hamartiologia;</span></li>\r\n<li><span style=\"color: rgb(0, 0, 0);\">Missiologia;</span></li>\r\n<li><span style=\"color: rgb(0, 0, 0);\">Pentateuco;</span></li>\r\n<li><span style=\"color: rgb(0, 0, 0);\">Liderança cristã;</span></li>\r\n<li><span style=\"color: rgb(0, 0, 0);\">Homilética;</span></li>\r\n<li><span style=\"color: rgb(0, 0, 0);\">Adm. eclesiástica ;</span></li>\r\n<li><span style=\"color: rgb(0, 0, 0);\">Teologia pastoral;</span></li>\r\n<li><span style=\"color: rgb(0, 0, 0);\">Ed. Religiosa;</span></li>\r\n<li><span style=\"color: rgb(0, 0, 0);\">Geografia bíblica II;</span></li>\r\n<li><span style=\"color: rgb(0, 0, 0);\">Heresiologia II;</span></li>\r\n<li><span style=\"color: rgb(0, 0, 0);\">Ética cristã;</span></li>\r\n<li><span style=\"color: rgb(0, 0, 0);\">Historia eclesiástica I;</span></li>\r\n<li><span style=\"color: rgb(0, 0, 0);\">Historia eclesiástica II;</span></li>\r\n<li><span style=\"color: rgb(0, 0, 0);\">Escatologia II;</span></li>\r\n</ul>                                                                                                                                                                                                                            ', '', '3 Anos', 'Fabio Santos', 'assets/cursos/curso2.jpg', 'Olá, gostaria de saber mais sobre o Curso Médio de Teologia', '1'),
(9, 'Teste', '                                                                                                Teste                                                                                        ', '', '2 meses', 'Fabio Santos', 'assets/cursos/8192e92d9f9a647ac7492271567be65c.jpg', 'teste', '1');

-- --------------------------------------------------------

--
-- Estrutura da tabela `dabar`
--

CREATE TABLE `dabar` (
  `id` int(11) NOT NULL,
  `sobre` text NOT NULL,
  `identidade` text NOT NULL,
  `requisitos` text NOT NULL,
  `sobreInstrutor` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `dabar`
--

INSERT INTO `dabar` (`id`, `sobre`, `identidade`, `requisitos`, `sobreInstrutor`) VALUES
(1, '<p>A escola teológica Dabar é sediada na Av. Deputado Castro de Carvalho, 1695, Vila Áurea, Poá – SP. Fone: 11 2891-8736/99318-2269.A mesma foi organizada em Janeiro de 2007, e as aulas tiveram inicio em 05/02/07. Sendo a primeira aula apenas inaugural, ou seja, uma apresentação formal da escola. Nesta apresentação foi notificada a sua identidade e as instituições de apoio que são: A Confradesb e a Universidade Corporativa Livre Átrios. Bem como o sistema de funcionamento da escola quanto ao corpo docente e discente.</p><p><br></p><p>A escola teológica Dabar hodiernamente é uma pessoa jurídica e usufrui de plena autonomia, ou seja, ela já não tem mais vinculo com as instituições acima referenciada.</p><p><br></p><p>A escola apesar de estar sediada em Poá, ela oferece o curso online, e o curso completo gravado em vídeos aulas com seus respectivos materiais. </p><p><br></p><p>O corpo docente da escola, hoje é formado apenas por um único professor que, é, a mesma pessoa que organizou e que preside a escola. Que é, o Fábio José dos Santos, o mesmo é responsável pelas ministrações das aulas tanto online quanto gravadas. </p><p><br></p><p>A escola oferece apenas os cursos básicos e médios de teologia. O curso básico é formado por 20 matérias, tendo uma aula por semana e duas horas de aulas. E o curso médio é formado por 30 matérias. Vale ressaltar que, o curso médio tem como base as 20 matérias do curso básico. As aulas online ocorrem nas segundas feiras das 20hs às 22hs.</p><p><br></p><p>O Centro Educacional de Teologia DABAR é de cunho Inter denominacional, que tem como meta, preparar pessoas para manusear bem a Palavra de Deus, no serviço do Reino de Deus e no exercício da sua vocação.</p>', '<ol>\n<li>O nome da escola &eacute;: ETD &ndash; Escola Teol&oacute;gica Dabar. Dabar &eacute; um termo que vem do hebraico e significa Palavra. Entretanto traz a ideia de Palavra vinda de Deus, indica palavra firmada ou a&ccedil;&atilde;o de Deus (Jr.2:1).</li>\n<li>A escola n&atilde;o tem reconhecimento do MEC. E n&atilde;o tem por algumas raz&otilde;es, veja- mos:<br>- 90% das escolas teol&oacute;gicas n&atilde;o tem reconhecimento;<br>- A finalidade da escola n&atilde;o &eacute; formar profissionais, e sim obreiros para a seara do Senhor. A forma&ccedil;&atilde;o oferecida &eacute; teol&oacute;gica, religiosa e eclesi&aacute;stica. E esses cursos n&atilde;o necessitam da autoriza&ccedil;&atilde;o ou reconhecimento do MEC. N&atilde;o s&atilde;o cursos t&eacute;cnicos ou de educa&ccedil;&atilde;o superior acad&ecirc;mica, para o aluno se tornar um profissional.</li>\n<li>A escola oferece apenas o curso b&aacute;sico e m&eacute;dio de teologia, ou seja, n&atilde;o oferece a gradua&ccedil;&atilde;o que &eacute; o bacharel.</li>\n<li>A escola teol&oacute;gica Dabar tem com meta dar uma s&oacute;lida forma&ccedil;&atilde;o teol&oacute;gica aos seus alunos, embora a princ&iacute;pio a n&iacute;vel b&aacute;sico e m&eacute;dio, conforme a natureza do curso. Sem olvidar que, a mesma n&atilde;o se deixar&aacute; ser influenciada pelo modernismo, liberalismo e relativismo quanto ao ensino e pr&aacute;tica da Palavra de Deus. A escola preservar&aacute; o ensino ortodoxo da Palavra de Deus.</li>\n</ol>', '<ol> <li><strong>Requisitos para admiss&atilde;o de alunos</strong><br>- As matriculas podem ser feitas no inicio de cada nova mat&eacute;ria, ou na corrente, desde que, a mesma n&atilde;o tenha ultrapassado 50% das aulas;<br>- Preencher a ficha de matricula com letra leg&iacute;vel;<br>- O aluno precisa pelo menos ter o prim&aacute;rio completo. Caso n&atilde;o tenha haver&aacute; uma entrevista com o presidente da escola, para uma poss&iacute;vel avalia&ccedil;&atilde;o do aluno;<br>- Uma foto 3x4;<br>- Pagar a matricula;<br>- Na transi&ccedil;&atilde;o de um aluno de uma escola para a escola teol&oacute;gica Dabar, as suas disciplinas ser&atilde;o aceitas mediante o hist&oacute;rico, desde que, as mesmas tenham correspond&ecirc;ncias e as cargas hor&aacute;rias ser&atilde;o avaliadas;<br>- Pagar mensalidade;</li> <li>Requisitos quanto ao corpo discente:<br>- 75% de frequ&ecirc;ncias nas aulas;<br>- A frequ&ecirc;ncia &eacute; adicionada como nota da prova;<br>- Cada aula perdida representar&aacute; 0,5 pontos;<br>- Faltas n&atilde;o justificadas n&atilde;o ser&atilde;o abonadas;<br>- A leitura do livro &eacute; adicionada com a nota da prova;<br>- As provas ser&atilde;o dadas ap&oacute;s a &uacute;ltima aula de cada mat&eacute;ria;<br>- Cada mat&eacute;ria ter&aacute; uma carga hor&aacute;ria de 10 horas, ou seja, ser&atilde;o cinco aulas para cada mat&eacute;ria, com duas horas de aulas e uma aula por semana;<br>- O material did&aacute;tico ser&aacute; indicado pela escola;<br>- No t&eacute;rmino do curso o aluno dever&aacute; fazer um prov&atilde;o resumindo todo o curso;<br>- O aluno no final do curso dever&aacute; comprovar que leu toda a B&iacute;blia como pr&eacute;-requisito para finalizar o curso.</li> </ol>', '<p><span style=\"color: rgb(0, 0, 0);\">Fabio Jos&eacute; dos Santos &eacute; Bacharel em Teologia pelo Semin&aacute;rio Teol&oacute;gico Batista Nacional, atualmente pastoreia a Primeira Igreja Batista em Jardim Paineira em Itaquaquecetuba &ndash; SP.</span></p>\n<p><span style=\"color: rgb(0, 0, 0);\"><strong>Forma&ccedil;&atilde;o</strong></span></p>\n<p><span style=\"color: rgb(0, 0, 0);\">- Bacharel em Teologia &ndash; STBNET (Semin&aacute;rio Teol&oacute;gico Batista Nacional En&eacute;as Tognini).</span></p>\n<p><span style=\"color: rgb(0, 0, 0);\">- Fez o mestrado em Teologia B&iacute;blica do Novo Testamento &ndash; STBNET (Semin&aacute;rio Teol&oacute;gico Batista Nacional En&eacute;as Tognini).</span></p>\n<p><span style=\"color: rgb(0, 0, 0);\">- Licenciatura em Filosofia &ndash; Ph&ecirc;nix- Guarulhos &ndash; SP.</span></p>\n<p><span style=\"color: rgb(0, 0, 0);\">- P&oacute;s-Gradua&ccedil;&atilde;o em Filosofia &ndash; UFSCAR &ndash; SP.</span></p>\n<p><span style=\"color: rgb(0, 0, 0);\">- Licenciado em hist&oacute;ria. - Faculdade S&atilde;o Jos&eacute;&nbsp;</span></p>\n<p><span style=\"color: rgb(0, 0, 0);\">- Licenciado em pedagogia &ndash; Educa Mais Brasil</span></p>\n<p><span style=\"color: rgb(0, 0, 0);\">- P&oacute;s-gradua&ccedil;&atilde;o em educa&ccedil;&atilde;o especial &ndash; Faculdade S&atilde;o Lu&iacute;s</span></p>\n<p><span style=\"color: rgb(0, 0, 0);\">- Cursando p&oacute;s-gradua&ccedil;&atilde;o em tutoria de educa&ccedil;&atilde;o a dist&acirc;ncia &ndash; Educa Mais Brasil&nbsp;&nbsp;</span></p>\n<p><span style=\"color: rgb(0, 0, 0);\">Leciona as mat&eacute;rias do Curso B&aacute;sico e M&eacute;dio de Teologia oferecidos pelo Centro Educacional de Teologia DABAR.</span></p>\n<p><span style=\"color: rgb(0, 0, 0);\">Leciona as mat&eacute;rias de Filosofia, Sociologia, Hist&oacute;ria e &Eacute;tica e Cidadania organizacional na rede p&uacute;blica de educa&ccedil;&atilde;o.</span></p>\n<p>&nbsp;</p>');

-- --------------------------------------------------------

--
-- Estrutura da tabela `matricula`
--

CREATE TABLE `matricula` (
  `idmatricula` int(11) NOT NULL,
  `iduser` int(11) NOT NULL,
  `idcurso` int(11) NOT NULL,
  `idturma` int(11) NOT NULL,
  `vencimentoboleto` int(11) NOT NULL,
  `datamatricula` timestamp NOT NULL DEFAULT current_timestamp(),
  `statusmatricula` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `matricula`
--

INSERT INTO `matricula` (`idmatricula`, `iduser`, `idcurso`, `idturma`, `vencimentoboleto`, `datamatricula`, `statusmatricula`) VALUES
(17, 1, 1, 1, 1, '2022-09-28 21:54:23', 1),
(18, 39, 2, 2, 2, '2022-09-29 22:57:23', 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `turma`
--

CREATE TABLE `turma` (
  `idturma` int(11) NOT NULL,
  `nometurma` varchar(30) NOT NULL,
  `statusturma` char(1) NOT NULL,
  `datacadturma` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `turma`
--

INSERT INTO `turma` (`idturma`, `nometurma`, `statusturma`, `datacadturma`) VALUES
(1, 'TB 1', '1', '2022-08-26'),
(2, 'TM 1', '1', '2022-08-02'),
(3, 'TB 2', '1', '2022-08-26'),
(4, 'TM 2', '1', '2022-08-26'),
(7, 'TM 3', '0', '2022-08-26');

-- --------------------------------------------------------

--
-- Estrutura da tabela `user`
--

CREATE TABLE `user` (
  `iduser` int(11) NOT NULL,
  `nomeuser` varchar(100) NOT NULL,
  `emailuser` varchar(100) NOT NULL,
  `passuser` varchar(256) NOT NULL,
  `imguser` varchar(100) NOT NULL,
  `telfixouser` varchar(15) DEFAULT NULL,
  `celuser` varchar(15) DEFAULT NULL,
  `datanasc` date DEFAULT NULL,
  `sexouser` char(1) DEFAULT NULL,
  `estadocivil` varchar(20) DEFAULT NULL,
  `naturalidade` varchar(100) DEFAULT NULL,
  `nomepai` varchar(100) DEFAULT NULL,
  `nomemae` varchar(100) DEFAULT NULL,
  `documento` varchar(30) DEFAULT NULL,
  `cpf` char(14) DEFAULT NULL,
  `escolaridade` varchar(35) DEFAULT NULL,
  `profissao` varchar(50) DEFAULT NULL,
  `igreja` varchar(60) DEFAULT NULL,
  `pastor` varchar(100) DEFAULT NULL,
  `funcao` varchar(30) DEFAULT NULL,
  `nucleo` varchar(40) DEFAULT NULL,
  `conversao` varchar(50) DEFAULT NULL,
  `admin` char(1) NOT NULL,
  `catuser` char(1) NOT NULL,
  `status` int(11) NOT NULL,
  `datacad` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `user`
--

INSERT INTO `user` (`iduser`, `nomeuser`, `emailuser`, `passuser`, `imguser`, `telfixouser`, `celuser`, `datanasc`, `sexouser`, `estadocivil`, `naturalidade`, `nomepai`, `nomemae`, `documento`, `cpf`, `escolaridade`, `profissao`, `igreja`, `pastor`, `funcao`, `nucleo`, `conversao`, `admin`, `catuser`, `status`, `datacad`) VALUES
(1, 'Paulo Daniel Nascimento da Palma', 'paulodaniel1360@gmail.com', '$2y$12$Jkaek3yS0Ta.yqguJ31C6eeB2ZQq7iMgzdywR1k/L/2TcknP8xNLq', '2382c29a6d348df637234866629ca337.jpg', '(11) 1111-1111', '(11) 93054-6947', '2002-05-10', '1', 'Solteiro', 'Brasileiro', NULL, 'Elaine Nascimento da Palma', '11.111.111-1', '343.499.350-96', 'Técnico em Informatica', 'Freelancer', 'CNV', 'Ricardo', 'Tecladista', NULL, '20 anos', '1', '2', 1, '2022-07-28 22:05:11'),
(39, 'Shinobu Kocho', 'shinobu_ko.cho@gmail.com', '$2y$12$D2eLTZtKJhAQSF4CzZIahutzuLhrnEsYDUt/o8e9c.DIESwws7B/.', '7fbb8806ff4acf47a29692bcf4e8bf84.jpg', '(11) 1111-1111', '(11) 11111-1111', '2000-11-11', '2', 'Casada', 'Japonesa', NULL, NULL, '11.111.111-1', '808.616.850-67', 'Bacharelado em Farmacologia', 'Farmaceutica', 'Teste', 'Teste', 'Teste', NULL, '10 anos', '1', '1', 1, '2022-09-24 00:41:44');

-- --------------------------------------------------------

--
-- Estrutura da tabela `userrecoverypass`
--

CREATE TABLE `userrecoverypass` (
  `idrecovery` int(11) NOT NULL,
  `iduser` int(11) NOT NULL,
  `userip` varchar(45) NOT NULL,
  `dtrecovery` datetime DEFAULT NULL,
  `dtregister` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `userrecoverypass`
--

INSERT INTO `userrecoverypass` (`idrecovery`, `iduser`, `userip`, `dtrecovery`, `dtregister`) VALUES
(1, 1, '::1', NULL, '2022-07-21 18:11:37'),
(2, 1, '::1', NULL, '2022-07-21 23:04:38'),
(3, 1, '::1', '2022-07-21 20:43:20', '2022-07-21 23:32:07'),
(4, 1, '::1', NULL, '2022-07-23 18:46:19');

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `addressuser`
--
ALTER TABLE `addressuser`
  ADD PRIMARY KEY (`idaddress`),
  ADD KEY `iduser` (`iduser`);

--
-- Índices para tabela `addrnucleo`
--
ALTER TABLE `addrnucleo`
  ADD PRIMARY KEY (`idaddrdabar`);

--
-- Índices para tabela `arquivo`
--
ALTER TABLE `arquivo`
  ADD PRIMARY KEY (`idarquivo`),
  ADD KEY `idcurso` (`idcurso`);

--
-- Índices para tabela `artigo`
--
ALTER TABLE `artigo`
  ADD PRIMARY KEY (`idartigo`),
  ADD KEY `iduser` (`iduser`);

--
-- Índices para tabela `contato`
--
ALTER TABLE `contato`
  ADD PRIMARY KEY (`idcontato`);

--
-- Índices para tabela `curso`
--
ALTER TABLE `curso`
  ADD PRIMARY KEY (`idcurso`);

--
-- Índices para tabela `dabar`
--
ALTER TABLE `dabar`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `matricula`
--
ALTER TABLE `matricula`
  ADD PRIMARY KEY (`idmatricula`),
  ADD KEY `iduser` (`iduser`),
  ADD KEY `idcurso` (`idcurso`),
  ADD KEY `idturma` (`idturma`);

--
-- Índices para tabela `turma`
--
ALTER TABLE `turma`
  ADD PRIMARY KEY (`idturma`);

--
-- Índices para tabela `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`iduser`);

--
-- Índices para tabela `userrecoverypass`
--
ALTER TABLE `userrecoverypass`
  ADD PRIMARY KEY (`idrecovery`),
  ADD KEY `iduser` (`iduser`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `addressuser`
--
ALTER TABLE `addressuser`
  MODIFY `idaddress` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de tabela `addrnucleo`
--
ALTER TABLE `addrnucleo`
  MODIFY `idaddrdabar` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `arquivo`
--
ALTER TABLE `arquivo`
  MODIFY `idarquivo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de tabela `artigo`
--
ALTER TABLE `artigo`
  MODIFY `idartigo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de tabela `contato`
--
ALTER TABLE `contato`
  MODIFY `idcontato` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `curso`
--
ALTER TABLE `curso`
  MODIFY `idcurso` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT de tabela `dabar`
--
ALTER TABLE `dabar`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de tabela `matricula`
--
ALTER TABLE `matricula`
  MODIFY `idmatricula` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT de tabela `turma`
--
ALTER TABLE `turma`
  MODIFY `idturma` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de tabela `user`
--
ALTER TABLE `user`
  MODIFY `iduser` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT de tabela `userrecoverypass`
--
ALTER TABLE `userrecoverypass`
  MODIFY `idrecovery` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Restrições para despejos de tabelas
--

--
-- Limitadores para a tabela `addressuser`
--
ALTER TABLE `addressuser`
  ADD CONSTRAINT `addressuser_ibfk_1` FOREIGN KEY (`iduser`) REFERENCES `user` (`iduser`);

--
-- Limitadores para a tabela `arquivo`
--
ALTER TABLE `arquivo`
  ADD CONSTRAINT `arquivo_ibfk_1` FOREIGN KEY (`idcurso`) REFERENCES `curso` (`idcurso`);

--
-- Limitadores para a tabela `artigo`
--
ALTER TABLE `artigo`
  ADD CONSTRAINT `artigo_ibfk_1` FOREIGN KEY (`iduser`) REFERENCES `user` (`iduser`);

--
-- Limitadores para a tabela `matricula`
--
ALTER TABLE `matricula`
  ADD CONSTRAINT `matricula_ibfk_1` FOREIGN KEY (`iduser`) REFERENCES `user` (`iduser`),
  ADD CONSTRAINT `matricula_ibfk_2` FOREIGN KEY (`idcurso`) REFERENCES `curso` (`idcurso`),
  ADD CONSTRAINT `matricula_ibfk_3` FOREIGN KEY (`idturma`) REFERENCES `turma` (`idturma`);

--
-- Limitadores para a tabela `userrecoverypass`
--
ALTER TABLE `userrecoverypass`
  ADD CONSTRAINT `userrecoverypass_ibfk_1` FOREIGN KEY (`iduser`) REFERENCES `user` (`iduser`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Creato il: Gen 01, 2021 alle 20:58
-- Versione del server: 10.4.11-MariaDB
-- Versione PHP: 7.4.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `tunglr`
--

-- --------------------------------------------------------

--
-- Struttura della tabella `argomenti`
--

CREATE TABLE `argomenti` (
  `argomento` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dump dei dati per la tabella `argomenti`
--

INSERT INTO `argomenti` (`argomento`) VALUES
(''),
('Cucina'),
('fumetti'),
('Letteraura'),
('lonely'),
('Moda'),
('Musica'),
('nuovaroba'),
('nuovo'),
('Politica'),
('riletto'),
('spionaggio'),
('Sport'),
('terzo'),
('varie ed eventuali'),
('Videogiochi');

-- --------------------------------------------------------

--
-- Struttura della tabella `blog`
--

CREATE TABLE `blog` (
  `nome` varchar(200) NOT NULL,
  `IDBlog` int(11) NOT NULL,
  `Fondatore` varchar(30) NOT NULL,
  `Descrizione` text DEFAULT NULL,
  `icon` varchar(550) DEFAULT NULL,
  `header` varchar(550) DEFAULT NULL,
  `contatore` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dump dei dati per la tabella `blog`
--

INSERT INTO `blog` (`nome`, `IDBlog`, `Fondatore`, `Descrizione`, `icon`, `header`, `contatore`) VALUES
('vecchio titolo definitivo', 31, 'Betty1', 'descizione prova prova prova prova prova prova prova prova provs prova prova prova prova prova prova prova prova prova prova prova prova prova prova prova prova prova prova prova prova prova prova prova porvaprova prova porva', 'Adel2.png', 'header 1B.jpg', 847),
('nuovo blog definitivo e oltre', 123, 'Betty1', 'questo è un blog di prova', 'avatar1.jpg', NULL, NULL),
('lonely astronaut', 128, 'Betty1', '', '', NULL, NULL),
('creazione 2', 146, 'Betty1', 'it\'s a prova', NULL, NULL, NULL),
('Girl from the other side', 183, 'Christian', '', 'avatar anilist1.jpg', 'hdtzh.PNG', NULL),
('witch hat atelier', 184, 'Christian', 'the secret of magic', 'Qifrey9.jpg', 'Qifrey1.jpg', NULL),
('Stor Gendibal Oratore', 185, 'Stor Gendibal', 'wanna be primo oratore', 'avatar1.jpg', 'downloadaaa.jpg', NULL);

-- --------------------------------------------------------

--
-- Struttura della tabella `coautore`
--

CREATE TABLE `coautore` (
  `IDBlog` int(11) NOT NULL,
  `NomeCoAutore` varchar(30) NOT NULL,
  `IDCoautore` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dump dei dati per la tabella `coautore`
--

INSERT INTO `coautore` (`IDBlog`, `NomeCoAutore`, `IDCoautore`) VALUES
(183, 'Betty1', 210);

-- --------------------------------------------------------

--
-- Struttura della tabella `commenti`
--

CREATE TABLE `commenti` (
  `testo` text DEFAULT NULL,
  `IDComm` int(11) NOT NULL,
  `OraC` timestamp NOT NULL DEFAULT current_timestamp(),
  `DataC` date NOT NULL DEFAULT current_timestamp(),
  `IDPost` int(11) NOT NULL,
  `Nomeutente` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dump dei dati per la tabella `commenti`
--

INSERT INTO `commenti` (`testo`, `IDComm`, `OraC`, `DataC`, `IDPost`, `Nomeutente`) VALUES
('loool', 87, '2020-10-07 21:02:51', '2020-10-07', 408, 'Betty1'),
('prova per 408', 89, '2020-10-07 21:11:04', '2020-10-07', 408, 'Betty1'),
('prova per 429', 90, '2020-10-07 21:11:27', '2020-10-07', 429, 'Betty1'),
('			nuova versione', 92, '2020-10-07 21:23:04', '2020-10-07', 408, 'Betty1'),
('commento con prima 2', 93, '2020-10-08 15:54:09', '2020-10-08', 432, 'Betty1'),
('commento prima 2 con 1', 94, '2020-10-08 15:58:48', '2020-10-08', 431, 'Betty1'),
('commento prima v2 ccon 4', 95, '2020-10-08 15:59:12', '2020-10-08', 433, 'Betty1'),
('inserisco prova', 101, '2020-10-12 16:29:55', '2020-10-12', 433, 'Betty1'),
('prova commento', 106, '2020-12-14 18:45:11', '2020-12-14', 502, 'Betty1'),
('questo è un commento di prova per l\'utente loggato', 107, '2020-12-15 00:24:36', '2020-12-15', 502, 'Christian');

-- --------------------------------------------------------

--
-- Struttura della tabella `haimg`
--

CREATE TABLE `haimg` (
  `ID` int(11) NOT NULL,
  `IDimg` int(11) NOT NULL,
  `relationID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dump dei dati per la tabella `haimg`
--

INSERT INTO `haimg` (`ID`, `IDimg`, `relationID`) VALUES
(496, 19, 18),
(502, 22, 21),
(502, 23, 22),
(513, 30, 29);

-- --------------------------------------------------------

--
-- Struttura della tabella `immagini`
--

CREATE TABLE `immagini` (
  `CodeIMG` varchar(535) NOT NULL,
  `IDimg` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dump dei dati per la tabella `immagini`
--

INSERT INTO `immagini` (`CodeIMG`, `IDimg`) VALUES
('Annius1 no.png', 19),
('xforumB.jpg', 22),
('header1.jpg', 23),
('4b16bb6075b6186d07defc93aae508f0.jpg', 30);

-- --------------------------------------------------------

--
-- Struttura della tabella `iscritti`
--

CREATE TABLE `iscritti` (
  `numerotelefono` int(11) DEFAULT NULL,
  `documento` varchar(9) DEFAULT NULL,
  `password` varchar(60) NOT NULL,
  `mail` varchar(100) NOT NULL,
  `nomeutente` varchar(30) NOT NULL,
  `Pagamento` varchar(255) DEFAULT NULL,
  `Avatar` varchar(255) NOT NULL,
  `IDUtente` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dump dei dati per la tabella `iscritti`
--

INSERT INTO `iscritti` (`numerotelefono`, `documento`, `password`, `mail`, `nomeutente`, `Pagamento`, `Avatar`, `IDUtente`) VALUES
(NULL, NULL, '$2y$10$62fmv3Bt3RHasQWdEv6j8ee9a2rAtrVQgQ8IUCEOy.uDsQjsBDExq', 'lol@gmail.com', 'Betty1', '1', 'usata.jpg', 32),
(NULL, NULL, '$2y$10$CAKt4of.SQvj9a0HoRzuo.I4AXm/w0E1cP5S9NVZhEV0/Gc5gc8ie', 'prova@gmail.com', 'prova', '0', '', 36),
(393, 'asdfg45hj', '$2y$10$RaynvCffC0.3Jq.sz.ota.Eptlr3uxjL4fCWoVGzlRgKYoQ9wZ7Gq', 'utentesecondo@gmail.com', 'Christian', '0', '', 45),
(393, 'aijal12jf', '$2y$10$FSIqnwwxO7wkbLmR.W4g0O.0b9LNDrNVXVnVeS65n.ZsjMvL3d.jm', 'oratore@gmail.com', 'Stor Gendibal', '0', 'avatar1.jpg', 46);

-- --------------------------------------------------------

--
-- Struttura della tabella `post`
--

CREATE TABLE `post` (
  `ora` timestamp NOT NULL DEFAULT current_timestamp(),
  `ID` int(11) NOT NULL,
  `IDBlog` int(11) NOT NULL,
  `Scrittore` varchar(30) NOT NULL,
  `testo` longtext NOT NULL,
  `titolo` varchar(535) DEFAULT NULL,
  `colore` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dump dei dati per la tabella `post`
--

INSERT INTO `post` (`ora`, `ID`, `IDBlog`, `Scrittore`, `testo`, `titolo`, `colore`) VALUES
('2020-09-27 16:08:57', 408, 123, 'Betty1', ' questo è un post di prova che sto provando in un blog di prova ', ' Post Prova', NULL),
('2020-10-07 20:45:07', 429, 31, 'Betty1', ' aaijakdhjksdffafdfewf', ' titolo2333eqwewe', NULL),
('2020-10-07 21:48:40', 431, 31, 'Betty1', ' 1', ' carla', NULL),
('2020-10-07 21:48:45', 432, 31, 'Betty1', ' 2', ' carla2', NULL),
('2020-10-07 21:48:50', 433, 31, 'Betty1', ' 4', ' carla4', NULL),
('2020-10-07 21:48:54', 434, 31, 'Betty1', ' 3', ' carla3', NULL),
('2020-10-16 17:11:13', 453, 31, 'Betty1', ' prova testo', ' prova titolo', '#000000'),
('2020-10-16 21:46:30', 496, 31, 'Betty1', ' questpo è+ un messaggio di prova per un testo di prova e devo ricordarmi di controllare perchè non prende il \' nel titolo, forse trim funzionerebbe ', ' creazione', '#000000'),
('2020-10-17 11:40:44', 501, 31, 'Betty1', ' it\'s a post', ' it\'s a title', '#000000'),
('2020-10-17 11:40:55', 502, 31, 'Betty1', ' it\'s a post', ' it\'s a title', '#000000'),
('2020-12-14 21:17:03', 513, 185, 'Stor Gendibal', 'We need to keep the second foundation a secret, at all costs!', 'For the Foundation', '#000000');

-- --------------------------------------------------------

--
-- Struttura della tabella `temi`
--

CREATE TABLE `temi` (
  `sfondo` varchar(535) NOT NULL,
  `cornice` tinyint(1) DEFAULT NULL,
  `IDTema` int(11) NOT NULL,
  `colorDescrizione` varchar(20) NOT NULL,
  `IDBlog` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dump dei dati per la tabella `temi`
--

INSERT INTO `temi` (`sfondo`, `cornice`, `IDTema`, `colorDescrizione`, `IDBlog`) VALUES
('who made me a princess N2.jpg', 0, 123, '#158e39', 31),
('', 0, 145, '', 123),
('', 1, 146, '', 183),
('', 0, 147, '', 184),
('', 1, 155, '', 185),
('', 0, 157, '', 128);

-- --------------------------------------------------------

--
-- Struttura della tabella `trattadi`
--

CREATE TABLE `trattadi` (
  `IDBlog` int(11) NOT NULL,
  `argomento` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dump dei dati per la tabella `trattadi`
--

INSERT INTO `trattadi` (`IDBlog`, `argomento`) VALUES
(31, 'cucina'),
(31, 'nuovaroba'),
(31, 'riletto'),
(31, 'spionaggio'),
(123, 'Musica'),
(123, 'varie ed eventuali'),
(146, 'Sport'),
(183, 'fumetti'),
(184, 'fumetti'),
(185, ''),
(185, 'Politica');

--
-- Indici per le tabelle scaricate
--

--
-- Indici per le tabelle `argomenti`
--
ALTER TABLE `argomenti`
  ADD PRIMARY KEY (`argomento`);

--
-- Indici per le tabelle `blog`
--
ALTER TABLE `blog`
  ADD PRIMARY KEY (`IDBlog`),
  ADD UNIQUE KEY `nome` (`nome`),
  ADD KEY `Fondatore` (`Fondatore`);

--
-- Indici per le tabelle `coautore`
--
ALTER TABLE `coautore`
  ADD PRIMARY KEY (`IDCoautore`),
  ADD KEY `IDBlog` (`IDBlog`),
  ADD KEY `NomeCoAutore` (`NomeCoAutore`);

--
-- Indici per le tabelle `commenti`
--
ALTER TABLE `commenti`
  ADD PRIMARY KEY (`IDComm`),
  ADD KEY `IDPost` (`IDPost`),
  ADD KEY `Nome utente` (`Nomeutente`);

--
-- Indici per le tabelle `haimg`
--
ALTER TABLE `haimg`
  ADD PRIMARY KEY (`relationID`),
  ADD KEY `ID` (`ID`),
  ADD KEY `IDimg` (`IDimg`);

--
-- Indici per le tabelle `immagini`
--
ALTER TABLE `immagini`
  ADD PRIMARY KEY (`IDimg`);

--
-- Indici per le tabelle `iscritti`
--
ALTER TABLE `iscritti`
  ADD PRIMARY KEY (`IDUtente`),
  ADD UNIQUE KEY `mail` (`mail`),
  ADD UNIQUE KEY `nomeutente` (`nomeutente`);

--
-- Indici per le tabelle `post`
--
ALTER TABLE `post`
  ADD PRIMARY KEY (`ID`) USING BTREE,
  ADD KEY `IDBlog` (`IDBlog`),
  ADD KEY `Scrittore` (`Scrittore`);

--
-- Indici per le tabelle `temi`
--
ALTER TABLE `temi`
  ADD PRIMARY KEY (`IDTema`),
  ADD KEY `temi_ibfk_2` (`IDBlog`);

--
-- Indici per le tabelle `trattadi`
--
ALTER TABLE `trattadi`
  ADD PRIMARY KEY (`IDBlog`,`argomento`),
  ADD KEY `IDA` (`argomento`),
  ADD KEY `IDBlog` (`IDBlog`);

--
-- AUTO_INCREMENT per le tabelle scaricate
--

--
-- AUTO_INCREMENT per la tabella `blog`
--
ALTER TABLE `blog`
  MODIFY `IDBlog` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=201;

--
-- AUTO_INCREMENT per la tabella `coautore`
--
ALTER TABLE `coautore`
  MODIFY `IDCoautore` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=211;

--
-- AUTO_INCREMENT per la tabella `commenti`
--
ALTER TABLE `commenti`
  MODIFY `IDComm` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=108;

--
-- AUTO_INCREMENT per la tabella `haimg`
--
ALTER TABLE `haimg`
  MODIFY `relationID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT per la tabella `immagini`
--
ALTER TABLE `immagini`
  MODIFY `IDimg` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT per la tabella `iscritti`
--
ALTER TABLE `iscritti`
  MODIFY `IDUtente` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;

--
-- AUTO_INCREMENT per la tabella `post`
--
ALTER TABLE `post`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=514;

--
-- AUTO_INCREMENT per la tabella `temi`
--
ALTER TABLE `temi`
  MODIFY `IDTema` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=158;

--
-- Limiti per le tabelle scaricate
--

--
-- Limiti per la tabella `blog`
--
ALTER TABLE `blog`
  ADD CONSTRAINT `blog_ibfk_2` FOREIGN KEY (`Fondatore`) REFERENCES `iscritti` (`nomeutente`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Limiti per la tabella `coautore`
--
ALTER TABLE `coautore`
  ADD CONSTRAINT `coautore_ibfk_1` FOREIGN KEY (`IDBlog`) REFERENCES `blog` (`IDBlog`),
  ADD CONSTRAINT `coautore_ibfk_2` FOREIGN KEY (`NomeCoAutore`) REFERENCES `iscritti` (`nomeutente`) ON UPDATE CASCADE;

--
-- Limiti per la tabella `commenti`
--
ALTER TABLE `commenti`
  ADD CONSTRAINT `commenti_ibfk_1` FOREIGN KEY (`IDPost`) REFERENCES `post` (`ID`),
  ADD CONSTRAINT `commenti_ibfk_2` FOREIGN KEY (`Nomeutente`) REFERENCES `iscritti` (`nomeutente`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Limiti per la tabella `haimg`
--
ALTER TABLE `haimg`
  ADD CONSTRAINT `haimg_ibfk_3` FOREIGN KEY (`ID`) REFERENCES `post` (`ID`),
  ADD CONSTRAINT `haimg_ibfk_4` FOREIGN KEY (`IDimg`) REFERENCES `immagini` (`IDimg`);

--
-- Limiti per la tabella `post`
--
ALTER TABLE `post`
  ADD CONSTRAINT `post_ibfk_1` FOREIGN KEY (`IDBlog`) REFERENCES `blog` (`IDBlog`),
  ADD CONSTRAINT `post_ibfk_3` FOREIGN KEY (`Scrittore`) REFERENCES `iscritti` (`nomeutente`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Limiti per la tabella `temi`
--
ALTER TABLE `temi`
  ADD CONSTRAINT `temi_ibfk_2` FOREIGN KEY (`IDBlog`) REFERENCES `blog` (`IDBlog`) ON DELETE CASCADE;

--
-- Limiti per la tabella `trattadi`
--
ALTER TABLE `trattadi`
  ADD CONSTRAINT `trattadi_ibfk_1` FOREIGN KEY (`IDBlog`) REFERENCES `blog` (`IDBlog`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `trattadi_ibfk_2` FOREIGN KEY (`argomento`) REFERENCES `argomenti` (`argomento`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

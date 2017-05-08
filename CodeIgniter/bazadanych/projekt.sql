-- phpMyAdmin SQL Dump
-- version 4.2.12deb2+deb8u2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Czas generowania: 08 Maj 2017, 20:13
-- Wersja serwera: 5.5.52-0+deb8u1
-- Wersja PHP: 5.6.27-0+deb8u1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Baza danych: `projekt`
--

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `Odpowiedzialny`
--

CREATE TABLE IF NOT EXISTS `Odpowiedzialny` (
  `Id_odpowiedzlnosci` char(4) NOT NULL,
  `data` date NOT NULL,
  `aktualne` char(1) NOT NULL,
  `Zadania_id_zadania` char(4) NOT NULL,
  `Uczestnicy_id_uczestnicy` char(4) NOT NULL,
  `Uczestnicy_Projekty_id_projektu` char(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Zrzut danych tabeli `Odpowiedzialny`
--

INSERT INTO `Odpowiedzialny` (`Id_odpowiedzlnosci`, `data`, `aktualne`, `Zadania_id_zadania`, `Uczestnicy_id_uczestnicy`, `Uczestnicy_Projekty_id_projektu`) VALUES
('od11', '2017-05-01', '1', 'ab23', 'aa12', 'pzum'),
('od12', '2017-05-03', '1', 'axdf', 'aa12', 'pzum');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `Projekty`
--

CREATE TABLE IF NOT EXISTS `Projekty` (
  `id_projektu` char(4) NOT NULL,
  `nazwa_projektu` varchar(33) NOT NULL,
  `data_startu` date NOT NULL,
  `data_zakonczenia` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Zrzut danych tabeli `Projekty`
--

INSERT INTO `Projekty` (`id_projektu`, `nazwa_projektu`, `data_startu`, `data_zakonczenia`) VALUES
('pzum', 'Projekt z ustawionymi maskami', '2017-10-10', '2017-03-21'),
('qwe1', 'Projekt testowy qwe1', '2011-11-12', '2012-12-12');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `Role`
--

CREATE TABLE IF NOT EXISTS `Role` (
  `id_roli` char(3) NOT NULL,
  `wartosc` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Zrzut danych tabeli `Role`
--

INSERT INTO `Role` (`id_roli`, `wartosc`) VALUES
('gr1', 'Grafik'),
('pr1', 'Programista');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `Sprinty`
--

CREATE TABLE IF NOT EXISTS `Sprinty` (
  `id_sprintu` char(4) NOT NULL,
  `poczatek` date NOT NULL,
  `koniec` date DEFAULT NULL,
  `Projekty_id_projektu` char(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Zrzut danych tabeli `Sprinty`
--

INSERT INTO `Sprinty` (`id_sprintu`, `poczatek`, `koniec`, `Projekty_id_projektu`) VALUES
('aa12', '2017-04-01', '2017-04-25', 'pzum'),
('ab12', '2017-04-06', '2017-04-10', 'qwe1'),
('ac11', '2017-01-05', '2017-03-12', 'qwe1'),
('sp02', '2017-03-20', '2017-04-18', 'pzum');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `Sprinty_Zadania`
--

CREATE TABLE IF NOT EXISTS `Sprinty_Zadania` (
`id` int(11) NOT NULL,
  `Sprinty_ID` char(4) NOT NULL,
  `Zadania_ID` char(4) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=latin1;

--
-- Zrzut danych tabeli `Sprinty_Zadania`
--

INSERT INTO `Sprinty_Zadania` (`id`, `Sprinty_ID`, `Zadania_ID`) VALUES
(3, 'aa12', 'zx12'),
(6, 'aa12', 'axdf'),
(10, 'aa12', 'ab23'),
(11, 'sp02', 'c123'),
(12, 'ac11', 'ab23'),
(13, 'ab12', 'axdf'),
(14, 'aa12', 'as13');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `Stany`
--

CREATE TABLE IF NOT EXISTS `Stany` (
  `id_stanu` char(4) NOT NULL,
  `wartosc` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Zrzut danych tabeli `Stany`
--

INSERT INTO `Stany` (`id_stanu`, `wartosc`) VALUES
('1', 'W trakcie'),
('2', 'Gotowy');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `Uczestnicy`
--

CREATE TABLE IF NOT EXISTS `Uczestnicy` (
  `id_uczestnicy` char(4) NOT NULL,
  `Projekty_id_projektu` char(4) NOT NULL,
  `Uzytkownicy_identyfikator` char(4) NOT NULL,
  `Role_id_roli` char(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Zrzut danych tabeli `Uczestnicy`
--

INSERT INTO `Uczestnicy` (`id_uczestnicy`, `Projekty_id_projektu`, `Uzytkownicy_identyfikator`, `Role_id_roli`) VALUES
('aa12', 'pzum', '1111', 'gr1'),
('ab11', 'qwe1', '2222', 'pr1');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `Uzytkownicy`
--

CREATE TABLE IF NOT EXISTS `Uzytkownicy` (
  `identyfikator` char(4) NOT NULL,
  `haslo` char(4) NOT NULL,
  `imie` varchar(15) NOT NULL,
  `nazwisko` varchar(25) NOT NULL,
  `ranga` enum('U','A') NOT NULL DEFAULT 'U'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Zrzut danych tabeli `Uzytkownicy`
--

INSERT INTO `Uzytkownicy` (`identyfikator`, `haslo`, `imie`, `nazwisko`, `ranga`) VALUES
('1111', '1111', 'Admin', 'Admin', 'A'),
('2222', '2222', 'User', 'User', 'U');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `Zadania`
--

CREATE TABLE IF NOT EXISTS `Zadania` (
  `id_zadania` char(4) NOT NULL,
  `opis` text CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `procent_wykoanania` int(11) NOT NULL,
  `czas_trwania` date NOT NULL,
  `kupka` char(1) NOT NULL,
  `uwagi` text CHARACTER SET utf8 COLLATE utf8_bin,
  `Stany_id_stanu` char(4) NOT NULL,
  `Projekty_id_projektu` char(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Zrzut danych tabeli `Zadania`
--

INSERT INTO `Zadania` (`id_zadania`, `opis`, `procent_wykoanania`, `czas_trwania`, `kupka`, `uwagi`, `Stany_id_stanu`, `Projekty_id_projektu`) VALUES
('ab23', 'Zadanie polegające ab23', 20, '2017-03-23', '0', 'Uwagi do ab23', '2', 'qwe1'),
('as13', 'Zadanie polegające as13', 90, '2017-01-22', '1', 'Uwagi do as13', '1', 'qwe1'),
('axdf', 'instlacja bazy ', 44, '2017-03-01', '0', 'uwagi do zadania testowego', '1', 'qwe1'),
('c123', 'Zadanie polegające c123', 71, '2017-02-01', '0', 'Uwagi do c123', '1', 'pzum'),
('zx12', 'Zadanie polegające zx12', 50, '2017-02-15', '1', 'Uwagi do zx12', '1', 'pzum');

--
-- Indeksy dla zrzutów tabel
--

--
-- Indexes for table `Odpowiedzialny`
--
ALTER TABLE `Odpowiedzialny`
 ADD PRIMARY KEY (`Id_odpowiedzlnosci`);

--
-- Indexes for table `Projekty`
--
ALTER TABLE `Projekty`
 ADD PRIMARY KEY (`id_projektu`);

--
-- Indexes for table `Role`
--
ALTER TABLE `Role`
 ADD PRIMARY KEY (`id_roli`);

--
-- Indexes for table `Sprinty`
--
ALTER TABLE `Sprinty`
 ADD PRIMARY KEY (`id_sprintu`), ADD KEY `Sprinty_Projekty_FK` (`Projekty_id_projektu`);

--
-- Indexes for table `Sprinty_Zadania`
--
ALTER TABLE `Sprinty_Zadania`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `Stany`
--
ALTER TABLE `Stany`
 ADD PRIMARY KEY (`id_stanu`);

--
-- Indexes for table `Uczestnicy`
--
ALTER TABLE `Uczestnicy`
 ADD PRIMARY KEY (`id_uczestnicy`);

--
-- Indexes for table `Uzytkownicy`
--
ALTER TABLE `Uzytkownicy`
 ADD PRIMARY KEY (`identyfikator`);

--
-- Indexes for table `Zadania`
--
ALTER TABLE `Zadania`
 ADD PRIMARY KEY (`id_zadania`), ADD KEY `Zadania_Projekty_FK` (`Projekty_id_projektu`), ADD KEY `Zadania_Stany_FK` (`Stany_id_stanu`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT dla tabeli `Sprinty_Zadania`
--
ALTER TABLE `Sprinty_Zadania`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=15;
--
-- Ograniczenia dla zrzutów tabel
--

--
-- Ograniczenia dla tabeli `Sprinty`
--
ALTER TABLE `Sprinty`
ADD CONSTRAINT `Sprinty_Projekty_FK` FOREIGN KEY (`Projekty_id_projektu`) REFERENCES `Projekty` (`id_projektu`);

--
-- Ograniczenia dla tabeli `Zadania`
--
ALTER TABLE `Zadania`
ADD CONSTRAINT `Zadania_Projekty_FK` FOREIGN KEY (`Projekty_id_projektu`) REFERENCES `Projekty` (`id_projektu`),
ADD CONSTRAINT `Zadania_Stany_FK` FOREIGN KEY (`Stany_id_stanu`) REFERENCES `Stany` (`id_stanu`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

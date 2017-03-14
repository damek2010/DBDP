-- phpMyAdmin SQL Dump
-- version 4.2.12deb2+deb8u2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Czas generowania: 14 Mar 2017, 12:55
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
-- Struktura tabeli dla tabeli `odpowiedzialny`
--

CREATE TABLE IF NOT EXISTS `odpowiedzialny` (
  `Id_odpowiedzlnosci` char(4) NOT NULL,
  `data` date NOT NULL,
  `aktualne` char(1) DEFAULT NULL,
  `Zadania_id_zadania` char(4) DEFAULT NULL,
  `Uczestnicy_id_uczestnicy` char(4) NOT NULL,
  `Uczestnicy_Projekty_id_projektu` char(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `Role`
--

CREATE TABLE IF NOT EXISTS `Role` (
  `id_roli` char(3) NOT NULL,
  `wartosc` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `Stany`
--

CREATE TABLE IF NOT EXISTS `Stany` (
  `id_stanu` char(4) NOT NULL,
  `wartosc` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `Uzytkownicy`
--

CREATE TABLE IF NOT EXISTS `Uzytkownicy` (
  `identyfikator` char(4) NOT NULL,
  `haslo` char(4) NOT NULL,
  `imie` varchar(15) NOT NULL,
  `nazwisko` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `Zadania`
--

CREATE TABLE IF NOT EXISTS `Zadania` (
  `id_zadania` char(4) NOT NULL,
  `procent_wykoanania` int(11) NOT NULL,
  `czas_trwania` date NOT NULL,
  `kupka` char(1) NOT NULL,
  `Stany_id_stanu` char(4) NOT NULL,
  `Projekty_id_projektu` char(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indeksy dla zrzutów tabel
--

--
-- Indexes for table `odpowiedzialny`
--
ALTER TABLE `odpowiedzialny`
 ADD PRIMARY KEY (`Id_odpowiedzlnosci`), ADD KEY `odpowiedzialny_Uczestnicy_FK` (`Uczestnicy_id_uczestnicy`,`Uczestnicy_Projekty_id_projektu`), ADD KEY `odpowiedzialny_Zadania_FK` (`Zadania_id_zadania`);

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
-- Indexes for table `Stany`
--
ALTER TABLE `Stany`
 ADD PRIMARY KEY (`id_stanu`);

--
-- Indexes for table `Uczestnicy`
--
ALTER TABLE `Uczestnicy`
 ADD PRIMARY KEY (`id_uczestnicy`,`Projekty_id_projektu`), ADD KEY `Uczestnicy_Projekty_FK` (`Projekty_id_projektu`), ADD KEY `Uczestnicy_Role_FK` (`Role_id_roli`), ADD KEY `Uczestnicy_Uzytkownicy_FK` (`Uzytkownicy_identyfikator`);

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
-- Ograniczenia dla zrzutów tabel
--

--
-- Ograniczenia dla tabeli `odpowiedzialny`
--
ALTER TABLE `odpowiedzialny`
ADD CONSTRAINT `odpowiedzialny_Zadania_FK` FOREIGN KEY (`Zadania_id_zadania`) REFERENCES `Zadania` (`id_zadania`),
ADD CONSTRAINT `odpowiedzialny_Uczestnicy_FK` FOREIGN KEY (`Uczestnicy_id_uczestnicy`, `Uczestnicy_Projekty_id_projektu`) REFERENCES `Uczestnicy` (`id_uczestnicy`, `Projekty_id_projektu`);

--
-- Ograniczenia dla tabeli `Sprinty`
--
ALTER TABLE `Sprinty`
ADD CONSTRAINT `Sprinty_Projekty_FK` FOREIGN KEY (`Projekty_id_projektu`) REFERENCES `Projekty` (`id_projektu`);

--
-- Ograniczenia dla tabeli `Uczestnicy`
--
ALTER TABLE `Uczestnicy`
ADD CONSTRAINT `Uczestnicy_Uzytkownicy_FK` FOREIGN KEY (`Uzytkownicy_identyfikator`) REFERENCES `Uzytkownicy` (`identyfikator`),
ADD CONSTRAINT `Uczestnicy_Projekty_FK` FOREIGN KEY (`Projekty_id_projektu`) REFERENCES `Projekty` (`id_projektu`),
ADD CONSTRAINT `Uczestnicy_Role_FK` FOREIGN KEY (`Role_id_roli`) REFERENCES `Role` (`id_roli`);

--
-- Ograniczenia dla tabeli `Zadania`
--
ALTER TABLE `Zadania`
ADD CONSTRAINT `Zadania_Stany_FK` FOREIGN KEY (`Stany_id_stanu`) REFERENCES `Stany` (`id_stanu`),
ADD CONSTRAINT `Zadania_Projekty_FK` FOREIGN KEY (`Projekty_id_projektu`) REFERENCES `Projekty` (`id_projektu`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

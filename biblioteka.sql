-- phpMyAdmin SQL Dump
-- version 4.2.7.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Czas generowania: 04 Paź 2017, 20:08
-- Wersja serwera: 5.5.39
-- Wersja PHP: 5.4.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Baza danych: `biblioteka`
--

-- --------------------------------------------------------
CREATE DATABASE biblioteka;
USE biblioteka;

--
-- Struktura tabeli dla tabeli `admin`
--

CREATE TABLE IF NOT EXISTS `admin` (
`id_admin` int(11) NOT NULL COMMENT 'Klucz główny przydzielony automatycznie',
  `login` varchar(50) CHARACTER SET utf8 COLLATE utf8_polish_ci NOT NULL COMMENT 'Nazwa administratora potrzebna przy logowaniu',
  `haslo` varchar(50) CHARACTER SET utf8 COLLATE utf8_polish_ci NOT NULL COMMENT 'Hasło niezaszyfrowane'
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 COMMENT='Posiada informacje o administratorach zarejestrowanych w programie.' AUTO_INCREMENT=2 ;

--
-- Zrzut danych tabeli `admin`
--

INSERT INTO `admin` (`id_admin`, `login`, `haslo`) VALUES
(1, 'admin', 'admin');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `bibliotekarz`
--

CREATE TABLE IF NOT EXISTS `bibliotekarz` (
`id_bibliotekarz` int(11) NOT NULL COMMENT 'Klucz główny przydzielony automatycznie',
  `login` varchar(50) CHARACTER SET utf8 COLLATE utf8_polish_ci NOT NULL COMMENT 'Nazwa bibliotekarza potrzebna przy logowaniu',
  `haslo` varchar(50) CHARACTER SET utf8 COLLATE utf8_polish_ci NOT NULL COMMENT 'Hasło niezaszyfrowane'
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 COMMENT='Posiada informacje o bibliotekarzach zarejestrowanych w programie.' AUTO_INCREMENT=2 ;

--
-- Zrzut danych tabeli `bibliotekarz`
--

INSERT INTO `bibliotekarz` (`id_bibliotekarz`, `login`, `haslo`) VALUES
(1, 'bibliotekarz', 'bibliotekarz');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `czytelnik`
--

CREATE TABLE IF NOT EXISTS `czytelnik` (
`id_czytelnik` int(11) NOT NULL COMMENT 'Klucz główny przydzielony automatycznie',
  `login` varchar(50) CHARACTER SET utf8 COLLATE utf8_polish_ci NOT NULL COMMENT 'Nazwa czytelnika potrzeba przy logowaniu.',
  `haslo` varchar(45) CHARACTER SET utf8 COLLATE utf8_polish_ci NOT NULL COMMENT 'Hasło niezaszyfrowane',
  `imie` varchar(100) CHARACTER SET utf8 COLLATE utf8_polish_ci NOT NULL COMMENT 'Imię ',
  `nazwisko` varchar(100) CHARACTER SET utf8 COLLATE utf8_polish_ci NOT NULL COMMENT 'Nazwisko',
  `adres` varchar(200) CHARACTER SET utf8 COLLATE utf8_polish_ci NOT NULL COMMENT 'Adres zamieszkania np.: ul. Przykład 3/12',
  `miasto` varchar(45) CHARACTER SET utf8 COLLATE utf8_polish_ci NOT NULL COMMENT 'Miasto',
  `wojewodztwo` varchar(100) CHARACTER SET utf8 COLLATE utf8_polish_ci NOT NULL COMMENT 'Nazwa województwa',
  `telefon` varchar(50) CHARACTER SET utf8 COLLATE utf8_polish_ci DEFAULT NULL COMMENT 'Telefony',
  `kod_pocztowy` varchar(45) CHARACTER SET utf8 COLLATE utf8_polish_ci NOT NULL COMMENT 'Kod pocztowy',
  `email` varchar(100) CHARACTER SET utf8 COLLATE utf8_polish_ci NOT NULL COMMENT 'Adres e-mail'
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 COMMENT='Posiada informacje o czytelnikach zarejestrowanych w programie.' AUTO_INCREMENT=5 ;

--
-- Zrzut danych tabeli `czytelnik`
--

INSERT INTO `czytelnik` (`id_czytelnik`, `login`, `haslo`, `imie`, `nazwisko`, `adres`, `miasto`, `wojewodztwo`, `telefon`, `kod_pocztowy`, `email`) VALUES
(1, 'czytelnik_1', 'hasło_czytelnika', 'Piotr', 'Klimek', 'ul. Przykład 4/ 12', 'Lublin', 'Lubelskie', NULL, '20-998', 'przyklad_1@wiedzanaplus.pl'),
(2, 'czytelnik_2', 'hasło_czytelnika', 'Patryk', 'Klimek', 'ul. Przykład 10/300', 'Lublin', 'Lubelskie', NULL, '20-999', 'przyklad_2@wiedzanaplus.pl'),
(3, 'czytelnik_3', 'hasło_czytelnika', 'Jan', 'Kowalski', 'Górnośląska', 'Żary', 'Lubuskie', '534778903', '68-200', 'op@wp.pl'),
(4, 'czytelnik_4', 'hasło_czytelnika', 'Jan', 'Mak', 'Górnośląska', 'Żary', 'Lubuskie', '341564234', '68-200', 'jm@onet.pl');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `kategoria`
--

CREATE TABLE IF NOT EXISTS `kategoria` (
`id_kategoria` int(11) NOT NULL COMMENT 'Klucz główny przydzielony automatycznie',
  `nazwa` varchar(200) CHARACTER SET utf8 COLLATE utf8_polish_ci NOT NULL COMMENT 'Nazwa kategorii'
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 COMMENT='Tabela zawierająca wszystkie kategorie książek w systemie.' AUTO_INCREMENT=7 ;

--
-- Zrzut danych tabeli `kategoria`
--

INSERT INTO `kategoria` (`id_kategoria`, `nazwa`) VALUES
(1, 'Biznes'),
(2, 'Poradniki'),
(3, 'Programowanie'),
(4, 'Programowanie mobilne'),
(5, 'Webmasterstwo'),
(6, 'Systemy operacyjne');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `ksiazka`
--

CREATE TABLE IF NOT EXISTS `ksiazka` (
`id_ksiazka` int(11) NOT NULL COMMENT 'Klucz główny przydzielony automatycznie',
  `id_kategoria` int(11) NOT NULL COMMENT 'Klucz obcy z tabeli kategoria',
  `isbn` varchar(13) CHARACTER SET utf8 COLLATE utf8_polish_ci NOT NULL COMMENT 'Niepowtarzalny 13-cyfrowy identyfikator książki',
  `tytul` varchar(200) CHARACTER SET utf8 COLLATE utf8_polish_ci NOT NULL COMMENT 'Tytuł książki',
  `autor` varchar(70) CHARACTER SET utf8 COLLATE utf8_polish_ci NOT NULL COMMENT 'Imię i Nazwisko autora książki',
  `stron` int(4) NOT NULL COMMENT 'Liczba stron książki',
  `wydawnictwo` varchar(50) CHARACTER SET utf8 COLLATE utf8_polish_ci NOT NULL COMMENT 'Nazwa wydawnictwa, w którym wydano książkę',
  `rok_wydania` int(4) NOT NULL COMMENT 'Rok wydania książki',
  `opis` text CHARACTER SET utf8 COLLATE utf8_polish_ci COMMENT 'Opis książki'
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 COMMENT='Wszystkie książki dodane do bazy danych.' AUTO_INCREMENT=11 ;

--
-- Zrzut danych tabeli `ksiazka`
--

INSERT INTO `ksiazka` (`id_ksiazka`, `id_kategoria`, `isbn`, `tytul`, `autor`, `stron`, `wydawnictwo`, `rok_wydania`, `opis`) VALUES
(1, 3, '9788324631773', 'PHP i MySQL. Tworzenie stron WWW. Vademecum profesjonalisty. Wydanie czwarte', 'Luke Welling, Laura Thomson', 856, 'Helion', 2009, 'Czwarte wydanie bestsellerowego podręcznika dla webmasterów wykorzystujących w swojej pracy funkcjonalność języka PHP i bazy danych MySQL.'),
(2, 3, '9788324685301', 'Język C++. Kompendium wiedzy', 'Bjarne Stroustrup', 1296, 'Helion', 2014, NULL),
(3, 3, '9788324675340', 'Mistrz czystego kodu. Kodeks postępowania profesjonalnych programistów', 'Robert C. Martin', 216, 'Helion', 2013, NULL),
(4, 6, '9788324690138', 'Kali Linux. Testy penetracyjne', 'Joseph Muniz, Aamir Lakhani', 336, 'Helion', 2014, NULL),
(5, 3, '9788324621880', 'Czysty kod. Podręcznik dobrego programisty', 'Robert C. Martin', 424, 'Helion', 2010, NULL),
(6, 3, '9788324632374', 'Pragmatyczny programista. Od czeladnika do mistrza', 'Andrew Hunt, David Thomas', 332, 'Helion', 2011, NULL),
(7, 3, '9788324683178', 'Praca z zastanym kodem. Najlepsze techniki', 'Michael Feathers', 440, 'Helion', 2014, NULL),
(8, 5, '9788324685042', 'Tajemnice JavaScriptu. Podręcznik ninja', 'John Resig, Bear Bibeault', 432, 'Helion', 2014, NULL),
(9, 3, '9788324689361', 'Java EE 6. Tworzenie aplikacji w NetBeans 7', 'David R. Heffelfinger', 352, 'Helion', 2014, NULL),
(10, 5, '9788324666676', 'Projektowanie stron internetowych. Przewodnik dla początkujących webmasterów po HTML5, CSS3 i grafice. Wydanie IV', 'Jennifer Niederst Robbins', 600, 'Helion', 2014, NULL);

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `zamowienie`
--

CREATE TABLE IF NOT EXISTS `zamowienie` (
`id_zamowienie` int(11) NOT NULL COMMENT 'Klucz główny przydzielony automatycznie',
  `id_czytelnik` int(11) NOT NULL COMMENT 'Klucz obcy z tabeli czytelnik',
  `id_ksiazka` int(11) NOT NULL COMMENT 'Klucz obcy z tabeli ksiazka',
  `data_zamowienia` datetime NOT NULL COMMENT 'Data złożenia zamówienia w bibliotece',
  `data_odbioru` datetime DEFAULT NULL COMMENT 'Data odbioru książki z biblioteki ',
  `data_zwrotu` datetime DEFAULT NULL COMMENT 'Data zwrotu książki do biblioteki'
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 COMMENT='Posiada informacje o zamówionych, wypożyczonych czy oddanych książkach w bibliotece.' AUTO_INCREMENT=8 ;

--
-- Zrzut danych tabeli `zamowienie`
--

INSERT INTO `zamowienie` (`id_zamowienie`, `id_czytelnik`, `id_ksiazka`, `data_zamowienia`, `data_odbioru`, `data_zwrotu`) VALUES
(1, 1, 1, '2014-08-01 10:12:02', NULL, NULL),
(2, 1, 2, '2014-08-01 10:12:02', '2014-08-03 12:10:10', NULL),
(3, 1, 5, '2014-08-01 10:13:02', '2014-08-03 12:11:10', '2014-08-15 12:00:00'),
(4, 2, 3, '2014-08-02 12:00:02', NULL, NULL),
(5, 2, 4, '2014-08-03 09:12:02', '2014-08-05 15:20:00', NULL),
(6, 3, 2, '2014-08-01 10:12:02', '2014-08-05 15:20:00', NULL),
(7, 4, 2, '2014-08-01 10:12:02', '2014-08-05 15:20:00', NULL);

--
-- Indeksy dla zrzutów tabel
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
 ADD PRIMARY KEY (`id_admin`);

--
-- Indexes for table `bibliotekarz`
--
ALTER TABLE `bibliotekarz`
 ADD PRIMARY KEY (`id_bibliotekarz`);

--
-- Indexes for table `czytelnik`
--
ALTER TABLE `czytelnik`
 ADD PRIMARY KEY (`id_czytelnik`);

--
-- Indexes for table `kategoria`
--
ALTER TABLE `kategoria`
 ADD PRIMARY KEY (`id_kategoria`);

--
-- Indexes for table `ksiazka`
--
ALTER TABLE `ksiazka`
 ADD PRIMARY KEY (`id_ksiazka`), ADD KEY `fk_ksiazka_kategoria1_idx` (`id_kategoria`);

--
-- Indexes for table `zamowienie`
--
ALTER TABLE `zamowienie`
 ADD PRIMARY KEY (`id_zamowienie`), ADD KEY `fk_zamowienie_czytelnik1_idx` (`id_czytelnik`), ADD KEY `fk_zamowienie_ksiazka1_idx` (`id_ksiazka`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT dla tabeli `admin`
--
ALTER TABLE `admin`
MODIFY `id_admin` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Klucz główny przydzielony automatycznie',AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT dla tabeli `bibliotekarz`
--
ALTER TABLE `bibliotekarz`
MODIFY `id_bibliotekarz` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Klucz główny przydzielony automatycznie',AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT dla tabeli `czytelnik`
--
ALTER TABLE `czytelnik`
MODIFY `id_czytelnik` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Klucz główny przydzielony automatycznie',AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT dla tabeli `kategoria`
--
ALTER TABLE `kategoria`
MODIFY `id_kategoria` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Klucz główny przydzielony automatycznie',AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT dla tabeli `ksiazka`
--
ALTER TABLE `ksiazka`
MODIFY `id_ksiazka` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Klucz główny przydzielony automatycznie',AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT dla tabeli `zamowienie`
--
ALTER TABLE `zamowienie`
MODIFY `id_zamowienie` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Klucz główny przydzielony automatycznie',AUTO_INCREMENT=8;
--
-- Ograniczenia dla zrzutów tabel
--

--
-- Ograniczenia dla tabeli `ksiazka`
--
ALTER TABLE `ksiazka`
ADD CONSTRAINT `fk_ksiazka_kategoria1` FOREIGN KEY (`id_kategoria`) REFERENCES `kategoria` (`id_kategoria`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Ograniczenia dla tabeli `zamowienie`
--
ALTER TABLE `zamowienie`
ADD CONSTRAINT `fk_zamowienie_czytelnik1` FOREIGN KEY (`id_czytelnik`) REFERENCES `czytelnik` (`id_czytelnik`) ON DELETE NO ACTION ON UPDATE NO ACTION,
ADD CONSTRAINT `fk_zamowienie_ksiazka1` FOREIGN KEY (`id_ksiazka`) REFERENCES `ksiazka` (`id_ksiazka`) ON DELETE NO ACTION ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

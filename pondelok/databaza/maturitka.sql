-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Hostiteľ: 127.0.0.1
-- Čas generovania: Sun 15.Máj 2022, 16:12
-- Verzia serveru: 10.4.22-MariaDB
-- Verzia PHP: 8.1.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Databáza: `maturitka`
--

-- --------------------------------------------------------

--
-- Štruktúra tabuľky pre tabuľku `clanky`
--

CREATE TABLE `clanky` (
  `id_article` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `content` text NOT NULL,
  `url_article` varchar(255) NOT NULL,
  `subscribe` varchar(255) NOT NULL,
  `id_user` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Sťahujem dáta pre tabuľku `clanky`
--

INSERT INTO `clanky` (`id_article`, `title`, `content`, `url_article`, `subscribe`, `id_user`) VALUES
(11, '11', '1', '1-1648632852', '1', 15);

-- --------------------------------------------------------

--
-- Štruktúra tabuľky pre tabuľku `uzivatelia`
--

CREATE TABLE `uzivatelia` (
  `id_user` int(11) NOT NULL,
  `name_user` varchar(255) NOT NULL,
  `email_user` varchar(255) NOT NULL,
  `user_password` varchar(255) NOT NULL,
  `admin` int(11) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Sťahujem dáta pre tabuľku `uzivatelia`
--

INSERT INTO `uzivatelia` (`id_user`, `name_user`, `email_user`, `user_password`, `admin`) VALUES
(15, 'Nicolas', 'nicolas@gmail.com', '$2y$10$x4Br3XMRNDWoMC6IHormYeyCLgRu26T1jM.PxVcqhIDMQpLzBzUyu', 0);

--
-- Kľúče pre exportované tabuľky
--

--
-- Indexy pre tabuľku `clanky`
--
ALTER TABLE `clanky`
  ADD PRIMARY KEY (`id_article`),
  ADD KEY `id_user` (`id_user`);

--
-- Indexy pre tabuľku `uzivatelia`
--
ALTER TABLE `uzivatelia`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT pre exportované tabuľky
--

--
-- AUTO_INCREMENT pre tabuľku `clanky`
--
ALTER TABLE `clanky`
  MODIFY `id_article` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT pre tabuľku `uzivatelia`
--
ALTER TABLE `uzivatelia`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- Obmedzenie pre exportované tabuľky
--

--
-- Obmedzenie pre tabuľku `clanky`
--
ALTER TABLE `clanky`
  ADD CONSTRAINT `clanky_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `uzivatelia` (`id_user`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

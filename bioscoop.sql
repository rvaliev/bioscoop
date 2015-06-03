-- phpMyAdmin SQL Dump
-- version 4.4.7
-- http://www.phpmyadmin.net
--
-- Host: localhost:8889
-- Generation Time: Jun 03, 2015 at 02:03 PM
-- Server version: 5.5.38
-- PHP Version: 5.5.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `bioscoop`
--

-- --------------------------------------------------------

--
-- Table structure for table `films`
--

CREATE TABLE `films` (
  `film_id` int(11) NOT NULL,
  `film_naam` varchar(100) NOT NULL,
  `film_omschrijving` text NOT NULL,
  `film_image` varchar(100) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `films`
--

INSERT INTO `films` (`film_id`, `film_naam`, `film_omschrijving`, `film_image`) VALUES
(1, 'THE IMITATION GAME', 'The Imitation Game is een indrukwekkend drama over het leven en werk van Alan Turing (Benedict Cumberbatch), de briljante maar emotioneel gecompliceerde Britse wetenschapper die met zijn werk de Tweede Wereldoorlog hielp te verkorten en daarmee de levens van tienduizenden mensen heeft gered.', 'imitation_game.jpg'),
(2, 'AVENGERS 2 : AGE OF ULTRON', 'Marvel Studios presenteert Avengers: Age of Ultron, het epische vervolg op de grootste superheldenfilm aller tijden.', 'avengers.jpg'),
(3, 'CITIZENFOUR', 'Citizenfour is het Oscarwinnende, derde deel van Laura Poitras'' trilogie over het Amerika van na 11 september. Poitras was al een paar jaar met de film bezig toen ze in januari 2013 gecodeerde e-mails ontving van een anonieme bron, citizen four, de man die later bekend werd als Edward Snowden. Een beklemmende documentaire thriller van ooggetuigen over één van de meest spraakmakende schandalen van het afgelopen decennium: een schandaal waarvan de volle omvang tot op heden nog altijd niet duidelijk is', 'citizenfour.jpg'),
(4, 'FAST AND FURIOUS 7', 'Fast & Furious gaat volle gas vooruit! Vin Diesel, Paul Walker en Dwayne Johnson nemen opnieuw de hoofdrollen voor hun rekening in Fast & Furious 7. In het zevende deel van de succesvolle franchise geregisseerd door James Wan keren ook Michelle Rodriguez, Jordana Brewster, Tyrese Gibson, Chris "Ludacris" Bridges, Elsa Pataky en Lucas Black terug. Ze worden vergezeld door een nieuwe internationale sterrencast waaronder Jason Statham, Djimon Hounsou, Tony Jaa, Ronda Rousey en Kurt Russell. Neal H. Moritz, Vin Diesel en Michael Fottrell produceren de film gebaseerd op een origineel idee van Chris Morgan.', 'ff_7.jpg'),
(5, 'FOCUS', '"Het gaat om afleiden. Het gaat om focus. De hersenen zijn te langzaam om te multitasken. Maak daar gebruik van." Nicky is een meester op het gebied van misleiding, die een relatie krijgt met de oplichtster Jess. Terwijl hij haar de fijne kneepjes van het vak leert, ziet hij in haar een risico en verbreekt de relatie. Drie jaar later duikt zijn voormalige vlam, nu een volleerde femme fatale, op in Buenos Aires, tijdens een lucratieve autorace. Nicky speelt een levensgevaarlijk spel, maar Jess gooit al zijn plannen in de war waardoor de doortrapte oplichter volledig van de wijs raakt.', 'focus.jpg'),
(6, 'LABYRINTH OF LIES', 'Duitsland 1958 : de jonge procureur Johann Radmann ontdekt essentieel bewijsmateriaal dat een groots proces in gang kan zetten tegen voormalige Duitse SS''ers. Radmanns onderzoek loopt echter niet van een leien dakje en heeft te kampen met nogal wat hostiliteit in dit naoorlogse Duitsland die de recente gebeurtenissen liever in de doofpot stoppen. Toch zal Radmann er alles aan doen opdat de schuldigen niet aan hun lot zouden ontkomen.', 'labyrinth.jpg'),
(7, 'MAD MAX: FURY ROAD', 'Achtervolgd door zijn turbulente verleden, is Mad Max ervan overtuigd dat hij alleen kan overleven als hij in zijn eentje opereert. Toch komt hij in contact met een groep die in een oorlogsvoertuig, bestuurd door Furiosa (Charlize Theron), door de woestenij trekt. De groep is op de vlucht voor de tiran Immortan Joe, van wie iets onvervangbaars is gestolen. De woedende krijgsheer stuurt al zijn bendes achter de rebellen aan, wat uitmondt in een meedogenloze, bloedstollende ‘Road War’.', 'mad_max.jpg'),
(8, 'SAN ANDREAS', 'Nadat Californië getroffen wordt door een zware aardbeving zetten SAR-helikopterpiloot Ray (Dwayne Johnson) en diens ex-vrouw Emma (Carla Gugino) alles op alles om vanuit Los Angeles San Francisco te bereiken om aldaar hun dochter Blake (Alexandra Daddario) te zoeken en te redden.', 'san_andreas.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `programmatie`
--

CREATE TABLE `programmatie` (
  `programmatie_id` int(50) NOT NULL,
  `zaal_id` int(50) NOT NULL,
  `film_id` int(50) NOT NULL,
  `programmatietijd` time NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `programmatie`
--

INSERT INTO `programmatie` (`programmatie_id`, `zaal_id`, `film_id`, `programmatietijd`) VALUES
(1, 1, 1, '10:00:00'),
(2, 1, 2, '23:30:00'),
(3, 1, 3, '20:00:00'),
(4, 2, 4, '11:00:00'),
(5, 2, 5, '15:00:00'),
(6, 2, 6, '19:00:00'),
(7, 3, 7, '10:20:00'),
(8, 3, 8, '13:00:00'),
(9, 3, 1, '19:00:00'),
(10, 4, 2, '10:00:00'),
(11, 4, 3, '14:00:00'),
(12, 4, 4, '18:00:00'),
(13, 5, 6, '11:30:00'),
(14, 5, 8, '16:00:00'),
(15, 5, 6, '19:30:00'),
(16, 5, 7, '23:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `reservaties`
--

CREATE TABLE `reservaties` (
  `reservatie_id` int(50) NOT NULL,
  `user_id` int(50) NOT NULL,
  `rij` int(50) NOT NULL,
  `kolom` int(50) NOT NULL,
  `reservatie_datum` date NOT NULL,
  `programmatie_id` int(50) NOT NULL,
  `reservatie_code` varchar(50) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=45 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `reservaties`
--

INSERT INTO `reservaties` (`reservatie_id`, `user_id`, `rij`, `kolom`, `reservatie_datum`, `programmatie_id`, `reservatie_code`) VALUES
(43, 89, 3, 4, '2015-06-03', 9, 'W1ycadNtnmVLn1fVTqjf'),
(44, 1, 4, 5, '2015-06-04', 1, 'qlmncgCiPtxans9BgfGI');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(50) NOT NULL,
  `user_voornaam` varchar(100) NOT NULL,
  `user_familienaam` varchar(100) NOT NULL,
  `user_email` varchar(100) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=91 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `user_voornaam`, `user_familienaam`, `user_email`) VALUES
(1, 'Ruslan', 'Valiev', 'rvaliev22@gmail.com'),
(2, 'Leo', 'Tolstoy', 'tolstoy@gmail.com'),
(89, 'Mark', 'Twain', 'twain@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `zalen`
--

CREATE TABLE `zalen` (
  `zaal_id` int(50) NOT NULL,
  `zaal_rijen` int(50) NOT NULL,
  `zaal_kolommen` int(50) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `zalen`
--

INSERT INTO `zalen` (`zaal_id`, `zaal_rijen`, `zaal_kolommen`) VALUES
(1, 10, 10),
(2, 12, 10),
(3, 10, 8),
(4, 8, 10),
(5, 11, 8);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `films`
--
ALTER TABLE `films`
  ADD PRIMARY KEY (`film_id`);

--
-- Indexes for table `programmatie`
--
ALTER TABLE `programmatie`
  ADD PRIMARY KEY (`programmatie_id`),
  ADD KEY `zaal_id` (`zaal_id`),
  ADD KEY `film_id` (`film_id`);

--
-- Indexes for table `reservaties`
--
ALTER TABLE `reservaties`
  ADD PRIMARY KEY (`reservatie_id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `programmatie_id` (`programmatie_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`),
  ADD UNIQUE KEY `user_email` (`user_email`);

--
-- Indexes for table `zalen`
--
ALTER TABLE `zalen`
  ADD PRIMARY KEY (`zaal_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `films`
--
ALTER TABLE `films`
  MODIFY `film_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `programmatie`
--
ALTER TABLE `programmatie`
  MODIFY `programmatie_id` int(50) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=17;
--
-- AUTO_INCREMENT for table `reservaties`
--
ALTER TABLE `reservaties`
  MODIFY `reservatie_id` int(50) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=45;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(50) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=91;
--
-- AUTO_INCREMENT for table `zalen`
--
ALTER TABLE `zalen`
  MODIFY `zaal_id` int(50) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `programmatie`
--
ALTER TABLE `programmatie`
  ADD CONSTRAINT `programmatie_ibfk_1` FOREIGN KEY (`film_id`) REFERENCES `films` (`film_id`),
  ADD CONSTRAINT `programmatie_ibfk_2` FOREIGN KEY (`zaal_id`) REFERENCES `zalen` (`zaal_id`);

--
-- Constraints for table `reservaties`
--
ALTER TABLE `reservaties`
  ADD CONSTRAINT `reservaties_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`),
  ADD CONSTRAINT `reservaties_ibfk_2` FOREIGN KEY (`programmatie_id`) REFERENCES `programmatie` (`programmatie_id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

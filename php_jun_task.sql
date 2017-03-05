-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 05, 2017 at 08:19 PM
-- Server version: 5.7.14
-- PHP Version: 7.0.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `php_jun_task`
--

-- --------------------------------------------------------

--
-- Table structure for table `books`
--

CREATE TABLE `books` (
  `id` int(11) NOT NULL,
  `title` text COLLATE utf8_unicode_ci NOT NULL,
  `author` text COLLATE utf8_unicode_ci NOT NULL,
  `publish_date` date DEFAULT NULL,
  `format` text COLLATE utf8_unicode_ci NOT NULL,
  `page_count` int(11) DEFAULT NULL,
  `isbn` text COLLATE utf8_unicode_ci,
  `resume` text COLLATE utf8_unicode_ci NOT NULL,
  `creation_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `file_name` text COLLATE utf8_unicode_ci
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `books`
--

INSERT INTO `books` (`id`, `title`, `author`, `publish_date`, `format`, `page_count`, `isbn`, `resume`, `creation_date`, `file_name`) VALUES
(1, 'Sherlock Holmes', 'Artur Conan Doyle', '1893-10-14', 'A4', 307, '1111111', 'All of the stories within The Adventures of Sherlock Holmes are told in a first-person narrative from the point of view of Dr. Watson, as is the case for all but four of the Sherlock Holmes stories.[6] The Oxford Dictionary of National Biography entry for Doyle suggests that the short stories contained in The Adventures of Sherlock Holmes tend to point out social injustices, such as "a king\'s betrayal of an opera singer, a stepfather\'s deception of his ward as a fictitious lover, an aristocratic crook\'s exploitation of a failing pawnbroker, a beggar\'s extensive estate in Kent."', '2017-03-02 15:55:31', ''),
(2, 'Alice\'s Adventures in Wonderland', 'Lewis Carroll', '1865-11-26', 'A4', 200, '395352932', ' Alice is feeling bored and drowsy while sitting on the riverbank with her older sister, who is reading a book with no pictures or conversations. She then notices a White Rabbit wearing a waistcoat and pocket watch, talking to itself as it runs past. She follows it down a rabbit hole, but suddenly falls a long way to a curious hall with many locked doors of all sizes.', '2017-03-02 16:05:53', ''),
(16, 'Blood of Elves', 'Andrzej Sapkowski', '2008-10-23', 'A4', 320, '9780575084841', 'Blood of Elves (Polish: Krew elfÃ³w) is the first novel in the Witcher Saga written by Polish fantasy writer Andrzej Sapkowski, first published in Poland in 1994 (English translation was published in late 2008). It is a sequel to the Witcher short stories collected in the books The Last Wish (Ostatnie Å¼yczenie) and Sword of Destiny (Miecz przeznaczenia) and is followed by Time of Contempt (Czas pogardy).', '2017-03-04 16:27:46', ''),
(12, 'Puss in Boots', 'Charles Perrault', '1697-01-16', 'A4', 40, '789204223', 'For generations, children have been enchanted by the tale of the clever cat in fancy boots who outsmarts a king and a sorcerer to win a castle and a bride for his penniless master.', '2017-03-04 16:01:36', '12.jpg'),
(15, 'Metro 2033', 'Dmitry Glukhovsky', '2010-02-17', 'A3', 458, '9785170596782', 'Metro 2033 (Russian: ÐœÐµÑ‚Ñ€Ð¾ 2033) is a post-apocalyptic science fiction novel by Russian author Dmitry Glukhovsky. It is set in the Moscow Metro, where the last survivors hide after a global nuclear holocaust. It was published in 2005 in Russia and on March 28, 2010 in the United States.', '2017-03-04 16:22:34', ''),
(14, 'Snow White', 'Brothers Grimm', '1854-06-21', 'A3', 44, '736421866', 'Snow White is a nineteenth-century German fairy tale which is today known widely across the Western world. The Brothers Grimm published it in 1812 in the first edition of their collection Grimms Fairy Tales. It was titled in German: Sneewittchen (in modern orthography Schneewittchen) and numbered as Tale 53.', '2017-03-04 16:07:12', '14.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` text COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `isAdmin` int(11) NOT NULL DEFAULT '0'
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `isAdmin`) VALUES
(1, 'admin', '827ccb0eea8a706c4c34a16891f84e7b', 1),
(2, 'librarian1', '827ccb0eea8a706c4c34a16891f84e7b', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `books`
--
ALTER TABLE `books`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `books`
--
ALTER TABLE `books`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=64;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

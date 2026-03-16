-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:8889
-- Generation Time: Jan 26, 2023 at 03:34 PM
-- Server version: 5.7.34
-- PHP Version: 7.4.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `taus_data`
--

DELIMITER $$
--
-- Procedures
--
CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_delete_class` (IN `p_id` INT)  DELETE FROM tbl_class where id = p_id$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_delete_student` (IN `p_id` INT)  DELETE FROM tbl_student WHERE id = p_id$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_delete_student_class` (IN `p_id` INT)  DELETE from tbl_student_class WHERE id = p_id$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_get_class` (IN `p_id` INT)  SELECT class_name, start_dt, end_dt, class_number
FROM tbl_class
WHERE id = p_id$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_get_classes` (IN `p_class_number` INT, IN `p_class_name` VARCHAR(10))  SELECT c.id, c.class_name, c.start_dt, c.end_dt, c.class_number
FROM tbl_class c 
WHERE (
	(c.class_number = p_class_number 
       AND 
       p_class_name ='')
	OR
    (upper(c.class_name) LIKE concat(upper(p_class_name),'%')
     AND
     p_class_number = 0)
    )$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_get_class_roster` (IN `p_class_id` INT)  SELECT DISTINCT s.id, s.first_name, s.mi, s.last_name, s.photo_id_number
FROM tbl_student s JOIN tbl_student_class sc 
	ON s.id = sc.student_id 
WHERE sc.class_id = p_class_id$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_get_student` (IN `p_id` INT)  SELECT first_name, mi, last_name, photo_id_number
FROM tbl_student 
where id = p_id$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_get_students` (IN `p_photo_id_number` INT, IN `p_last_name` VARCHAR(10))  SELECT s.id, s.first_name, s.mi, s.last_name, s.photo_id_number
FROM tbl_student s
WHERE (s.photo_id_number = p_photo_id_number 
       	AND p_last_name = '')
	OR 
    (UPPER(s.last_name) LIKE CONCAT(UPPER(p_last_name),'%') 
     	AND p_photo_id_number = 0)$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_get_student_class` (IN `p_id` INT)  SELECT student_id, class_id 
FROM tbl_student_class
where id = p_id$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_get_student_classes` (IN `p_student_id` INT)  SELECT DISTINCT c.class_name, c.start_dt, c.end_dt, c.class_number
FROM tbl_class c JOIN tbl_student_class sc 
	ON c.id = sc.class_id 
WHERE sc.student_id = p_student_id$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_insert_class` (IN `p_class_name` VARCHAR(100), IN `p_start_dt` DATE, IN `p_end_dt` DATE, IN `p_class_number` INT)  INSERT INTO tbl_class (
    class_name,
    start_dt,
    end_dt,
    class_number)
VALUES (
    p_class_name,
    p_start_dt,
    p_end_dt,
    p_class_number)$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_insert_student` (IN `p_first_name` VARCHAR(100), IN `p_mi` VARCHAR(1), IN `p_last_name` VARCHAR(100), IN `p_photo_id_number` INT)  INSERT INTO tbl_student (
    first_name, mi, last_name, photo_id_number
    )
VALUES (
    p_first_name, p_mi, p_last_name, p_photo_id_number
    )$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_insert_student_class` (IN `p_student_id` INT, IN `p_class_id` INT)  INSERT INTO tbl_student_class (student_id, class_id)
VALUES (p_student_id, p_class_id)$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_update_class` (IN `p_id` INT, IN `p_class_name` VARCHAR(100), IN `p_start_dt` DATE, IN `p_end_dt` DATE, IN `p_class_number` INT)  UPDATE tbl_class 
SET class_name = p_class_name,
	start_dt = p_start_dt,
    end_dt = p_end_dt,
    class_number = p_class_number
WHERE id = p_id$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_update_student` (IN `p_id` INT, IN `p_first_name` VARCHAR(100), IN `p_mi` VARCHAR(1), IN `p_last_name` VARCHAR(100), IN `p_photo_id_number` INT)  UPDATE tbl_student
SET first_name = p_first_name,
	mi = p_mi,
    last_name = p_last_name,
    photo_id_number = p_photo_id_number
WHERE id = p_id$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_update_student_class` (IN `p_id` INT, IN `p_student_id` INT, IN `p_class_id` INT)  UPDATE tbl_student_class 
SET student_id = p_student_id,
	class_id = p_class_id
WHERE id = p_id$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_class`
--

CREATE TABLE `tbl_class` (
  `id` int(11) NOT NULL,
  `class_name` varchar(100) NOT NULL,
  `start_dt` date NOT NULL,
  `end_dt` date NOT NULL,
  `class_number` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_class`
--

INSERT INTO `tbl_class` (`id`, `class_name`, `start_dt`, `end_dt`, `class_number`) VALUES
(1, 'Thermodynamics', '2023-09-04', '2023-12-22', 549),
(2, 'Intro to Western Existentialism ', '2023-09-05', '2023-12-21', 438),
(3, 'Pickleball', '2023-09-04', '2023-12-20', 119),
(4, 'Underwater Basketweaving', '2023-09-04', '2023-12-22', 101);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_student`
--

CREATE TABLE `tbl_student` (
  `id` int(11) NOT NULL,
  `first_name` varchar(100) NOT NULL,
  `mi` varchar(1) NOT NULL,
  `last_name` varchar(100) NOT NULL,
  `photo_id_number` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_student`
--

INSERT INTO `tbl_student` (`id`, `first_name`, `mi`, `last_name`, `photo_id_number`) VALUES
(1, 'Ramona', 'D', 'Malindi', 999000124),
(2, 'Tram', 'K', 'Iwuchukwu', 999000125),
(3, 'Keeley ', 'T', 'Naidoo', 999000123),
(4, 'Florentino', 'A', 'Chiweshe', 999000126),
(5, 'Max', 'Q', 'Coller', 999000555),


-- --------------------------------------------------------

--
-- Table structure for table `tbl_student_class`
--

CREATE TABLE `tbl_student_class` (
  `id` int(11) NOT NULL,
  `student_id` int(11) NOT NULL,
  `class_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_student_class`
--

INSERT INTO `tbl_student_class` (`id`, `student_id`, `class_id`) VALUES
(1, 1, 1),
(2, 1, 2),
(3, 2, 1),
(4, 2, 2),
(14, 2, 3),
(17, 3, 1),
(18, 3, 2),
(15, 3, 3),


-- --------------------------------------------------------

--
-- Stand-in structure for view `v_all_student_class_data`
-- (See below for the actual view)
--
CREATE TABLE `v_all_student_class_data` (
`c_id` int(11)
,`class_name` varchar(100)
,`start_dt` date
,`end_dt` date
,`class_number` int(11)
,`s_c_id` int(11)
,`s_id` int(11)
,`first_name` varchar(100)
,`mi` varchar(1)
,`last_name` varchar(100)
,`photo_id_number` int(11)
);

-- --------------------------------------------------------

--
-- Structure for view `v_all_student_class_data`
--
DROP TABLE IF EXISTS `v_all_student_class_data`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `v_all_student_class_data`  AS SELECT DISTINCT `c`.`id` AS `c_id`, `c`.`class_name` AS `class_name`, `c`.`start_dt` AS `start_dt`, `c`.`end_dt` AS `end_dt`, `c`.`class_number` AS `class_number`, `sc`.`id` AS `s_c_id`, `s`.`id` AS `s_id`, `s`.`first_name` AS `first_name`, `s`.`mi` AS `mi`, `s`.`last_name` AS `last_name`, `s`.`photo_id_number` AS `photo_id_number` FROM ((`tbl_class` `c` join `tbl_student_class` `sc` on((`c`.`id` = `sc`.`class_id`))) join `tbl_student` `s` on((`sc`.`student_id` = `s`.`id`))) ORDER BY `c`.`class_name` ASC, `s`.`last_name` ASC ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_class`
--
ALTER TABLE `tbl_class`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_student`
--
ALTER TABLE `tbl_student`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_student_class`
--
ALTER TABLE `tbl_student_class`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `unique_index` (`student_id`,`class_id`),
  ADD KEY `fk_class` (`class_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_class`
--
ALTER TABLE `tbl_class`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tbl_student`
--
ALTER TABLE `tbl_student`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `tbl_student_class`
--
ALTER TABLE `tbl_student_class`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tbl_student_class`
--
ALTER TABLE `tbl_student_class`
  ADD CONSTRAINT `fk_class` FOREIGN KEY (`class_id`) REFERENCES `tbl_class` (`id`),
  ADD CONSTRAINT `fk_student` FOREIGN KEY (`student_id`) REFERENCES `tbl_student` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

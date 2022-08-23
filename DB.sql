-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: May 16, 2022 at 04:32 AM
-- Server version: 5.7.31
-- PHP Version: 7.4.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `transcript`
--

-- --------------------------------------------------------

--
-- Table structure for table `event_log`
--

DROP TABLE IF EXISTS `event_log`;
CREATE TABLE IF NOT EXISTS `event_log` (
  `id` int(3) NOT NULL AUTO_INCREMENT COMMENT 'row ID',
  `name` varchar(25) NOT NULL,
  `username` varchar(15) NOT NULL,
  `remote_ip` varchar(15) NOT NULL COMMENT 'Remote IP',
  `local_ip` varchar(15) NOT NULL COMMENT 'Local IP',
  `datetime` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP COMMENT 'Server Time for Data Entry',
  `role` varchar(15) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=13 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `event_log`
--

INSERT INTO `event_log` (`id`, `name`, `username`, `remote_ip`, `local_ip`, `datetime`, `role`) VALUES
(1, 'Matur Innocent Joshua', 'admin', '127.0.0.1', '192.168.112.1', '2022-05-13 10:47:53', 'super_admin'),
(2, 'Matur Innocent Joshua', 'admin', '127.0.0.1', '192.168.112.1', '2022-05-13 10:48:41', 'super_admin'),
(3, 'Matur Innocent Joshua', 'admin', '127.0.0.1', '192.168.112.1', '2022-05-16 00:37:51', 'super_admin'),
(4, 'Matur Innocent Joshua', 'admin', '127.0.0.1', '192.168.112.1', '2022-05-16 00:40:05', 'super_admin'),
(5, 'Matur Innocent Joshua', 'admin', '127.0.0.1', '192.168.112.1', '2022-05-16 00:41:05', 'super_admin'),
(6, 'Matur Innocent Joshua', 'admin', '127.0.0.1', '192.168.112.1', '2022-05-16 00:41:47', 'super_admin'),
(7, 'Matur Innocent Joshua', 'admin', '127.0.0.1', '192.168.112.1', '2022-05-16 00:43:41', 'super_admin'),
(8, 'Mutiullah ', 'mutiu', '127.0.0.1', '192.168.112.1', '2022-05-16 00:48:29', 'pg_admin'),
(9, 'Victor Akin', 'victor', '127.0.0.1', '192.168.112.1', '2022-05-16 00:57:41', 'ug_admin'),
(10, 'Mutiullah ', 'mutiu', '127.0.0.1', '192.168.112.1', '2022-05-16 00:58:43', 'pg_admin'),
(11, 'Matur Innocent Joshua', 'admin', '127.0.0.1', '192.168.112.1', '2022-05-16 01:06:20', 'super_admin'),
(12, 'Victor Akin', 'victor', '127.0.0.1', '192.168.112.1', '2022-05-16 04:21:56', 'ug_admin');

-- --------------------------------------------------------

--
-- Table structure for table `postgraduate`
--

DROP TABLE IF EXISTS `postgraduate`;
CREATE TABLE IF NOT EXISTS `postgraduate` (
  `id` int(5) NOT NULL AUTO_INCREMENT,
  `title` varchar(6) NOT NULL DEFAULT 'Mr.',
  `firstname` varchar(25) NOT NULL,
  `middlename` varchar(25) NOT NULL,
  `lastname` varchar(25) NOT NULL,
  `sex` varchar(10) NOT NULL,
  `matric_no` varchar(15) NOT NULL,
  `phone` varchar(15) NOT NULL,
  `email` varchar(40) NOT NULL,
  `programme` varchar(50) NOT NULL,
  `date_of_graduation` varchar(12) NOT NULL,
  `applied_before` varchar(4) NOT NULL DEFAULT 'No',
  `recipient` varchar(70) NOT NULL,
  `recipient_name` varchar(70) NOT NULL,
  `address` varchar(255) NOT NULL,
  `city_town` varchar(15) NOT NULL,
  `postal_code` varchar(10) NOT NULL,
  `country` varchar(15) NOT NULL,
  `transcript_label` varchar(25) NOT NULL,
  `rrr` varchar(14) NOT NULL,
  `file1` varchar(100) NOT NULL,
  `file2` varchar(100) NOT NULL,
  `file3` varchar(100) NOT NULL,
  `status` varchar(60) NOT NULL DEFAULT 'Awaiting Processing',
  `datetime` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP COMMENT 'Date/Time of Entry',
  `dob` varchar(10) NOT NULL COMMENT 'Date of Birth',
  `typed_by` varchar(30) NOT NULL,
  `date_of_verification` varchar(15) NOT NULL,
  `comment` varchar(225) NOT NULL,
  `date_sent` varchar(15) NOT NULL,
  `tracking_code` varchar(20) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=27 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `postgraduate`
--

INSERT INTO `postgraduate` (`id`, `title`, `firstname`, `middlename`, `lastname`, `sex`, `matric_no`, `phone`, `email`, `programme`, `date_of_graduation`, `applied_before`, `recipient`, `recipient_name`, `address`, `city_town`, `postal_code`, `country`, `transcript_label`, `rrr`, `file1`, `file2`, `file3`, `status`, `datetime`, `dob`, `typed_by`, `date_of_verification`, `comment`, `date_sent`, `tracking_code`) VALUES
(1, 'Mrs.', 'Innocntkaj', 'Midmsd', 'jjkdckj', '', 'jnads56ajh', '3535353', 'maturinnocent@gmail.com', 'PGD. in Legislative Drafting', '2022-05-11', 'Yes', 'Recipeindnjsk', 'xmjhbSDChj', 'SDFGD F', 'dfbsdfbdsf', 'tfhngf', 'Azerbaijan', 'sdfbdfb', '123231231231', 'ND Statement of Result_11zon.jpg', 'NYSC CERTIFICATE_11zon.jpg', 'OUSTANDING_11zon.jpg', 'Pending', '2022-05-13 07:11:12', '', '', '', '', '', ''),
(2, 'Mrs.', 'Innocntka', 'Midmsd', 'jjkdckj', '', 'jnads56ajh', '3535353', 'maturinnocent@gmail.com', 'PGD. in Legislative Drafting', '2022-05-11', 'Yes', 'Recipeindnjsk', 'xmjhbSDChj', 'SDFGD F', 'dfbsdfbdsf', 'tfhngf', 'Azerbaijan', 'sdfbdfb', '123231231231', 'ND Statement of Result_11zon.jpg', 'NYSC CERTIFICATE_11zon.jpg', 'OUSTANDING_11zon.jpg', 'Pending', '2022-05-13 07:11:12', '', '', '', '', '', ''),
(3, 'Mrs.', 'Innocntka', 'Midmsd', 'jjkdckj', '', 'jnads56ajh', '3535353', 'maturinnocent@gmail.com', 'PGD. in Legislative Drafting', '2022-05-11', 'Yes', 'Recipeindnjsk', 'xmjhbSDChj', 'SDFGD F', 'dfbsdfbdsf', 'tfhngf', 'Azerbaijan', 'sdfbdfb', '123231231231', 'ND Statement of Result_11zon.jpg', 'NYSC CERTIFICATE_11zon.jpg', 'OUSTANDING_11zon.jpg', 'Pending', '2022-05-13 07:11:12', '', '', '', '', '', ''),
(6, 'Mrs.', 'Innocntka', 'Midmsd', 'jjkdckj', '', 'jnads56ajh', '3535353', 'maturinnocent@gmail.com', 'PGD. in Legislative Drafting', '2022-05-11', 'Yes', 'Recipeindnjsk', 'xmjhbSDChj', 'SDFGD F', 'dfbsdfbdsf', 'tfhngf', 'Azerbaijan', 'sdfbdfb', '123231231231', 'ND Statement of Result_11zon.jpg', 'NYSC CERTIFICATE_11zon.jpg', 'OUSTANDING_11zon.jpg', 'Pending', '2022-05-13 07:11:12', '', '', '', '', '', ''),
(7, 'Mrs.', 'Innocntka', 'Midmsd', 'jjkdckj', '', 'jnads56ajh', '3535353', 'maturinnocent@gmail.com', 'PGD. in Legislative Drafting', '2022-05-11', 'Yes', 'Recipeindnjsk', 'xmjhbSDChj', 'SDFGD F', 'dfbsdfbdsf', 'tfhngf', 'Azerbaijan', 'sdfbdfb', '123231231231', 'ND Statement of Result_11zon.jpg', 'NYSC CERTIFICATE_11zon.jpg', 'OUSTANDING_11zon.jpg', 'Pending', '2022-05-13 07:11:12', '', '', '', '', '', ''),
(8, 'Mrs.', 'Innocntka', 'Midmsd', 'jjkdckj', '', 'jnads56ajh', '3535353', 'maturinnocent@gmail.com', 'PGD. in Legislative Drafting', '2022-05-11', 'Yes', 'Recipeindnjsk', 'xmjhbSDChj', 'SDFGD F', 'dfbsdfbdsf', 'tfhngf', 'Azerbaijan', 'sdfbdfb', '123231231231', 'ND Statement of Result_11zon.jpg', 'NYSC CERTIFICATE_11zon.jpg', 'OUSTANDING_11zon.jpg', 'Pending', '2022-05-13 07:11:12', '', '', '', '', '', ''),
(9, 'Mrs.', 'Innocntka', 'Midmsd', 'jjkdckj', '', 'jnads56ajh', '3535353', 'maturinnocent@gmail.com', 'PGD. in Legislative Drafting', '2022-05-11', 'Yes', 'Recipeindnjsk', 'xmjhbSDChj', 'SDFGD F', 'dfbsdfbdsf', 'tfhngf', 'Azerbaijan', 'sdfbdfb', '123231231231', 'ND Statement of Result_11zon.jpg', 'NYSC CERTIFICATE_11zon.jpg', 'OUSTANDING_11zon.jpg', 'Pending', '2022-05-13 07:11:12', '', '', '', '', '', ''),
(10, 'Mrs.', 'Innocntka', 'Midmsd', 'jjkdckj', '', 'jnads56ajh', '3535353', 'maturinnocent@gmail.com', 'PGD. in Legislative Drafting', '2022-05-11', 'Yes', 'Recipeindnjsk', 'xmjhbSDChj', 'SDFGD F', 'dfbsdfbdsf', 'tfhngf', 'Azerbaijan', 'sdfbdfb', '123231231231', 'ND Statement of Result_11zon.jpg', 'NYSC CERTIFICATE_11zon.jpg', 'OUSTANDING_11zon.jpg', 'Pending', '2022-05-13 07:11:12', '', '', '', '', '', ''),
(11, 'Mrs.', 'Innocntka', 'Midmsd', 'jjkdckj', '', 'jnads56ajh', '3535353', 'maturinnocent@gmail.com', 'PGD. in Legislative Drafting', '2022-05-11', 'Yes', 'Recipeindnjsk', 'xmjhbSDChj', 'SDFGD F', 'dfbsdfbdsf', 'tfhngf', 'Azerbaijan', 'sdfbdfb', '123231231231', 'ND Statement of Result_11zon.jpg', 'NYSC CERTIFICATE_11zon.jpg', 'OUSTANDING_11zon.jpg', 'Pending', '2022-05-13 07:11:12', '', '', '', '', '', ''),
(12, 'Mrs.', 'Innocntka', 'Midmsd', 'jjkdckj', '', 'jnads56ajh', '3535353', 'maturinnocent@gmail.com', 'PGD. in Legislative Drafting', '2022-05-11', 'Yes', 'Recipeindnjsk', 'xmjhbSDChj', 'SDFGD F', 'dfbsdfbdsf', 'tfhngf', 'Azerbaijan', 'sdfbdfb', '123231231231', 'ND Statement of Result_11zon.jpg', 'NYSC CERTIFICATE_11zon.jpg', 'OUSTANDING_11zon.jpg', 'Pending', '2022-05-13 07:11:12', '', '', '', '', '', ''),
(13, 'Prof.', 'gdcbf', 'sdgf', 'sdf', '', 'fdhr5', '565', 'affafyusuf43@gmail.com', 'PGD. Criminology and Security Studies', '2022-05-04', 'No', 'Recipeindnjsk', 'fzbrreaz', 'ewrgrewg', 'wertwert', 'wertwret', 'Bahrain', 'wqrt', '355551', 'OUSTANDING_11zon.jpg', 'NIN_11zon.jpg', 'RA Passport_11zon.jpg', 'Pending', '2022-05-13 07:11:12', '', '', '', '', '', ''),
(14, 'Prof.', 'gdcbf', 'sdgf', 'sdf', '', 'fdhr5', '565', 'affafyusuf43@gmail.com', 'PGD. Criminology and Security Studies', '2022-05-04', 'No', 'Recipeindnjsk', 'fzbrreaz', 'ewrgrewg', 'wertwert', 'wertwret', 'Bahrain', 'wqrt', '355551', 'OUSTANDING_11zon.jpg', 'NIN_11zon.jpg', 'RA Passport_11zon.jpg', 'Pending', '2022-05-13 07:11:12', '', '', '', '', '', ''),
(15, 'Prof.', 'gdcbf', 'sdgf', 'sdf', '', 'fdhr5', '565', 'affafyusuf43@gmail.com', 'PGD. Criminology and Security Studies', '2022-05-04', 'No', 'Recipeindnjsk', 'fzbrreaz', 'ewrgrewg', 'wertwert', 'wertwret', 'Bahrain', 'wqrt', '355551', 'OUSTANDING_11zon.jpg', 'NIN_11zon.jpg', 'RA Passport_11zon.jpg', 'Pending', '2022-05-13 07:16:53', '', '', '', '', '', ''),
(16, 'Prof.', 'gdcbf', 'sdgf', 'sdf', '', 'fdhr5', '565', 'affafyusuf43@gmail.com', 'PGD. Criminology and Security Studies', '2022-05-04', 'No', 'Recipeindnjsk', 'fzbrreaz', 'ewrgrewg', 'wertwert', 'wertwret', 'Bahrain', 'wqrt', '355551', 'OUSTANDING_11zon.jpg', 'NIN_11zon.jpg', 'RA Passport_11zon.jpg', 'Pending', '2022-05-13 07:17:53', '', '', '', '', '', ''),
(17, 'Prof.', 'gdcbf', 'sdgf', 'sdf', '', 'fdhr5', '565', 'affafyusuf43@gmail.com', 'PGD. Criminology and Security Studies', '2022-05-04', 'No', 'Recipeindnjsk', 'fzbrreaz', 'ewrgrewg', 'wertwert', 'wertwret', 'Bahrain', 'wqrt', '355551', 'OUSTANDING_11zon.jpg', 'NIN_11zon.jpg', 'RA Passport_11zon.jpg', 'Pending', '2022-05-13 07:18:09', '', '', '', '', '', ''),
(18, 'Prof.', 'gdcbf', 'sdgf', 'sdf', '', 'fdhr5', '565', 'affafyusuf43@gmail.com', 'PGD. Criminology and Security Studies', '2022-05-04', 'No', 'Recipeindnjsk', 'fzbrreaz', 'ewrgrewg', 'wertwert', 'wertwret', 'Bahrain', 'wqrt', '355551', 'OUSTANDING_11zon.jpg', 'NIN_11zon.jpg', 'RA Passport_11zon.jpg', 'Pending', '2022-05-13 07:18:24', '', '', '', '', '', ''),
(19, 'Prof.', 'gdcbf', 'sdgf', 'sdf', '', 'fdhr5', '565', 'affafyusuf43@gmail.com', 'PGD. Criminology and Security Studies', '2022-05-04', 'No', 'Recipeindnjsk', 'fzbrreaz', 'ewrgrewg', 'wertwert', 'wertwret', 'Bahrain', 'wqrt', '355551', 'OUSTANDING_11zon.jpg', 'NIN_11zon.jpg', 'RA Passport_11zon.jpg', 'Pending', '2022-05-13 07:32:52', '', '', '', '', '', ''),
(20, 'Mr', 'dsg', 'dsg', 'dfbg', 'Male', 'rthdbtr', 'sdf', 'maturinnocent@gmail.com', 'PGD. Christian Religious Studies', 'gfbngf', 'Yes', 'dbg', 'fbg', 'fb', 'fdb', 'df', 'Algeria', 'dfb', 'df', 'NYSC CERTIFICATE_11zon.jpg', 'LEADERSHIP_11zon.jpg', 'OUSTANDING_11zon.jpg', 'Pending', '2022-05-13 13:27:47', '2022-06-02', '', '', '', '', ''),
(21, 'Mr', 'dsg', 'dsg', 'dfbg', 'Male', 'rthdbtr', 'sdf', 'maturinnocent@gmail.com', 'PGD. Christian Religious Studies', 'gfbngf', 'Yes', 'dbg', 'fbg', 'fb', 'fdb', 'df', 'Algeria', 'dfb', 'df', 'NYSC CERTIFICATE_11zon.jpg', 'LEADERSHIP_11zon.jpg', 'OUSTANDING_11zon.jpg', 'Pending', '2022-05-13 13:28:38', '2022-06-02', '', '', '', '', ''),
(22, 'Mr', 'dsg', 'dsg', 'dfbg', 'Male', 'rthdbtr', 'sdf', 'maturinnocent@gmail.com', 'PGD. Christian Religious Studies', 'gfbngf', 'Yes', 'dbg', 'fbg', 'fb', 'fdb', 'df', 'Algeria', 'dfb', 'df', 'NYSC CERTIFICATE_11zon.jpg', 'LEADERSHIP_11zon.jpg', 'OUSTANDING_11zon.jpg', 'Pending', '2022-05-13 13:29:00', '2022-06-02', '', '', '', '', ''),
(23, 'Mr', 'sdfv', 'dfbv', 'sdb', 'Male', 'dfsbv', 'sdfbf', 'incentmat@gmail.com', 'PGD. HIV/AIDS Education and Management', 'dsb', 'No', 'sdfbd', 'dsb', 'dsb', 'dsfb', 'dsb', 'Armenia', 'dfsbf', 'dsfb', 'NIN_11zon.jpg', 'Mayfair Birth cert_11zon.jpg', 'LEADERSHIP_11zon.jpg', 'Pending', '2022-05-13 13:46:31', '2022-05-10', '', '', '', '', ''),
(24, 'Mr', 'sdfv', 'dfbv', 'sdb', 'Male', 'dfsbv', 'sdfbf', 'incentmat@gmail.com', 'PGD. HIV/AIDS Education and Management', 'dsb', 'No', 'sdfbd', 'dsb', 'dsb', 'dsfb', 'dsb', 'Armenia', 'dfsbf', 'dsfb', 'NIN_11zon.jpg', 'Mayfair Birth cert_11zon.jpg', 'LEADERSHIP_11zon.jpg', 'Pending', '2022-05-13 13:47:29', '2022-05-10', '', '', '', '', ''),
(25, 'Mr', 'sgfsdv', 'dsfvsdfv', 'dsfbsdfb', 'Male', 'sdfbsdfb', 'dsfb', 'affafyusuf43@gmail.com', 'PGD. Financial Management', 'sdbfdb', 'Yes', 'sdbfd', 'dfsbdf', 'sdbfdb', 'dsbfb', 'dsbdsfb', 'Armenia', 'sdbffd', 'sdfb', 'NIN_11zon.jpg', 'NIN_11zon.jpg', 'RA Passport_11zon.jpg', 'Pending', '2022-05-13 13:49:03', '2022-05-14', '', '', '', '', ''),
(26, 'Mr.', 'Innocent', 'Joshua', 'Matur', 'Male', 'nou160235412', '08144529253', 'maturinnocent@gmail.com', 'M.Sc. Information Technology', '2018-05', 'Yes', 'Carevian University', 'Carevian University, Leceister City', 'No. 21, Binghams Street, Carevian Drive, United Kingdom', 'Leceister', '110010', 'Nigeria', 'T431', '213213341111', '2Black & White Minimalist Modern Resume CV Template.png', 'Black & White Minimalist Modern Resume CV Template.png', 'Real Page 1Black & White Minimalist Modern Resume CV Template.png', 'Pending', '2022-05-13 18:48:13', '1996-05-15', 'Matur Innocure', '2022-05-15', 'Na me de here', '2022-05-16', '419');

-- --------------------------------------------------------

--
-- Table structure for table `undergraduate`
--

DROP TABLE IF EXISTS `undergraduate`;
CREATE TABLE IF NOT EXISTS `undergraduate` (
  `id` int(5) NOT NULL AUTO_INCREMENT,
  `title` varchar(6) NOT NULL DEFAULT 'Mr.',
  `firstname` varchar(25) NOT NULL,
  `middlename` varchar(25) NOT NULL,
  `lastname` varchar(25) NOT NULL,
  `sex` varchar(10) NOT NULL,
  `matric_no` varchar(15) NOT NULL,
  `phone` varchar(15) NOT NULL,
  `email` varchar(40) NOT NULL,
  `programme` varchar(50) NOT NULL,
  `date_of_graduation` varchar(12) NOT NULL,
  `applied_before` varchar(4) NOT NULL DEFAULT 'No',
  `recipient` varchar(70) NOT NULL,
  `recipient_name` varchar(70) NOT NULL,
  `address` varchar(255) NOT NULL,
  `city_town` varchar(15) NOT NULL,
  `postal_code` varchar(10) NOT NULL,
  `country` varchar(15) NOT NULL,
  `transcript_label` varchar(25) NOT NULL,
  `rrr` varchar(14) NOT NULL,
  `file1` varchar(100) NOT NULL,
  `file2` varchar(100) NOT NULL,
  `file3` varchar(100) NOT NULL,
  `status` varchar(20) NOT NULL,
  `datetime` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP COMMENT 'Date/Time of Entry',
  `dob` varchar(10) NOT NULL COMMENT 'Date of Birth',
  `typed_by` varchar(30) NOT NULL,
  `date_of_verification` varchar(15) NOT NULL,
  `comment` varchar(225) NOT NULL,
  `date_sent` varchar(15) NOT NULL,
  `tracking_code` varchar(20) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `undergraduate`
--

INSERT INTO `undergraduate` (`id`, `title`, `firstname`, `middlename`, `lastname`, `sex`, `matric_no`, `phone`, `email`, `programme`, `date_of_graduation`, `applied_before`, `recipient`, `recipient_name`, `address`, `city_town`, `postal_code`, `country`, `transcript_label`, `rrr`, `file1`, `file2`, `file3`, `status`, `datetime`, `dob`, `typed_by`, `date_of_verification`, `comment`, `date_sent`, `tracking_code`) VALUES
(6, 'Mrs.', 'gdcbf', 'fgn', 'fgmfhg', 'Male', 'gfnhgmf', 'fdngf', 'incentmat@gmail.com', 'B.Sc. Public Administration', 'gfmfh', 'Yes', 'fgnhmg', 'fghmfg', 'fgmhgm', 'fgmhg', 'fghmhm', 'Armenia', 'fmgmh', '32535532', '2nd NYSC CERTIFICATE_11zon.jpg', '2nd NYSC CERTIFICATE_11zon.jpg', 'Diploma biz software cert-min_11zon.jpg', 'Awaiting Processing', '2022-05-15 00:43:31', '2022-05-19', 'Matur Innocure', '2022-05-06', 'dxfbdf', '2022-05-03', 'ertet5656');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(2) NOT NULL AUTO_INCREMENT,
  `name` varchar(30) NOT NULL,
  `email` varchar(60) NOT NULL,
  `username` varchar(15) NOT NULL,
  `password` varchar(20) NOT NULL,
  `role` varchar(15) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `username`, `password`, `role`) VALUES
(1, 'Matur Innocent Joshua', 'maturinnocent@gmail.com', 'admin', 'admin', 'super_admin'),
(2, 'Mutiullah ', 'mutiu@gmail.com', 'mutiu', 'mutiu', 'pg_admin'),
(3, 'Victor Akin', 'victor@gmail.com', 'victor', 'victor', 'ug_admin');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

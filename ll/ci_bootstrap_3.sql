-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jan 24, 2017 at 04:54 AM
-- Server version: 10.1.19-MariaDB
-- PHP Version: 5.6.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ci_bootstrap_3`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin_groups`
--

CREATE TABLE `admin_groups` (
  `id` mediumint(8) UNSIGNED NOT NULL,
  `name` varchar(20) NOT NULL,
  `description` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `admin_groups`
--

INSERT INTO `admin_groups` (`id`, `name`, `description`) VALUES
(1, 'webmaster', 'Webmaster'),
(2, 'admin', 'Administrator'),
(3, 'manager', 'Manager'),
(4, 'staff', 'Staff');

-- --------------------------------------------------------

--
-- Table structure for table `admin_login_attempts`
--

CREATE TABLE `admin_login_attempts` (
  `id` int(11) UNSIGNED NOT NULL,
  `ip_address` varchar(15) NOT NULL,
  `login` varchar(100) NOT NULL,
  `time` int(11) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `admin_users`
--

CREATE TABLE `admin_users` (
  `id` int(11) UNSIGNED NOT NULL,
  `ip_address` varchar(15) NOT NULL,
  `username` varchar(100) DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `salt` varchar(255) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `activation_code` varchar(40) DEFAULT NULL,
  `forgotten_password_code` varchar(40) DEFAULT NULL,
  `forgotten_password_time` int(11) UNSIGNED DEFAULT NULL,
  `remember_code` varchar(40) DEFAULT NULL,
  `created_on` int(11) UNSIGNED NOT NULL,
  `last_login` int(11) UNSIGNED DEFAULT NULL,
  `active` tinyint(1) UNSIGNED DEFAULT NULL,
  `first_name` varchar(50) DEFAULT NULL,
  `last_name` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `admin_users`
--

INSERT INTO `admin_users` (`id`, `ip_address`, `username`, `password`, `salt`, `email`, `activation_code`, `forgotten_password_code`, `forgotten_password_time`, `remember_code`, `created_on`, `last_login`, `active`, `first_name`, `last_name`) VALUES
(1, '127.0.0.1', 'webmaster', '$2y$08$/X5gzWjesYi78GqeAv5tA.dVGBVP7C1e1PzqnYCVe5s1qhlDIPPES', NULL, NULL, NULL, NULL, NULL, NULL, 1451900190, 1485230005, 1, 'Webmaster', ''),
(2, '127.0.0.1', 'admin', '$2y$08$7Bkco6JXtC3Hu6g9ngLZDuHsFLvT7cyAxiz1FzxlX5vwccvRT7nKW', NULL, NULL, NULL, NULL, NULL, NULL, 1451900228, 1451903990, 1, 'Admin', ''),
(3, '127.0.0.1', 'manager', '$2y$08$snzIJdFXvg/rSHe0SndIAuvZyjktkjUxBXkrrGdkPy1K6r5r/dMLa', NULL, NULL, NULL, NULL, NULL, NULL, 1451900430, NULL, 1, 'Manager', ''),
(4, '127.0.0.1', 'staff', '$2y$08$NigAXjN23CRKllqe3KmjYuWXD5iSRPY812SijlhGeKfkrMKde9da6', NULL, NULL, NULL, NULL, NULL, NULL, 1451900439, NULL, 1, 'Staff', ''),
(5, '::1', 'mans1800', '$2y$08$sYJQBACqMLH983PqyiAPXe0I2pKANNP8n5z5AQCGFLdxWSiB06zE2', NULL, NULL, NULL, NULL, NULL, NULL, 1483603801, 1484020980, 1, 'Apirat', 'Pakakaew'),
(6, '::1', 'mans1900', '$2y$08$3bzbmRVk1jcVzFl8GXvAw.GxtYU4YJtn5nEHdrItkhMrom53JXoKC', NULL, NULL, NULL, NULL, NULL, NULL, 1483603891, 1483603917, 1, 'Apirat', 'Pakakaew'),
(7, '::1', 'mans1700', '$2y$08$YuSc2EaRrmMNlGx2drwZ7ubRBDnHxZuBLay0i3PW97pS0VegNONiK', NULL, NULL, NULL, NULL, NULL, NULL, 1483603909, 1483674195, 1, 'Apirat', 'Pakakaew');

-- --------------------------------------------------------

--
-- Table structure for table `admin_users_groups`
--

CREATE TABLE `admin_users_groups` (
  `id` int(11) UNSIGNED NOT NULL,
  `user_id` int(11) UNSIGNED NOT NULL,
  `group_id` mediumint(8) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `admin_users_groups`
--

INSERT INTO `admin_users_groups` (`id`, `user_id`, `group_id`) VALUES
(1, 1, 1),
(2, 2, 2),
(3, 3, 3),
(4, 4, 4),
(5, 5, 2),
(6, 6, 3),
(7, 7, 4);

-- --------------------------------------------------------

--
-- Table structure for table `api_access`
--

CREATE TABLE `api_access` (
  `id` int(11) UNSIGNED NOT NULL,
  `key` varchar(40) NOT NULL DEFAULT '',
  `controller` varchar(50) NOT NULL DEFAULT '',
  `date_created` datetime DEFAULT NULL,
  `date_modified` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `api_keys`
--

CREATE TABLE `api_keys` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `key` varchar(40) NOT NULL,
  `level` int(2) NOT NULL,
  `ignore_limits` tinyint(1) NOT NULL DEFAULT '0',
  `is_private_key` tinyint(1) NOT NULL DEFAULT '0',
  `ip_addresses` text,
  `date_created` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `api_limits`
--

CREATE TABLE `api_limits` (
  `id` int(11) NOT NULL,
  `uri` varchar(255) NOT NULL,
  `count` int(10) NOT NULL,
  `hour_started` int(11) NOT NULL,
  `api_key` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `api_logs`
--

CREATE TABLE `api_logs` (
  `id` int(11) NOT NULL,
  `uri` varchar(255) NOT NULL,
  `method` varchar(6) NOT NULL,
  `params` text,
  `api_key` varchar(40) NOT NULL,
  `ip_address` varchar(45) NOT NULL,
  `time` int(11) NOT NULL,
  `rtime` float DEFAULT NULL,
  `authorized` varchar(1) NOT NULL,
  `response_code` smallint(3) DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `ci_sessions`
--

CREATE TABLE `ci_sessions` (
  `id` varchar(128) NOT NULL,
  `ip_address` varchar(45) NOT NULL,
  `timestamp` int(10) UNSIGNED NOT NULL DEFAULT '0',
  `data` blob NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `ci_sessions`
--

INSERT INTO `ci_sessions` (`id`, `ip_address`, `timestamp`, `data`) VALUES
('kofqm4il9cjdklkjnb86q3iqhou02pbq', '::1', 1485159994, 0x5f5f63695f6c6173745f726567656e65726174657c693a313438353135393739343b6964656e746974797c733a393a227765626d6173746572223b757365726e616d657c733a393a227765626d6173746572223b656d61696c7c4e3b757365725f69647c733a313a2231223b6f6c645f6c6173745f6c6f67696e7c733a31303a2231343835313333373635223b),
('hn81sloi3vamukbun91fl7t7psmrqqgr', '::1', 1485159951, 0x5f5f63695f6c6173745f726567656e65726174657c693a313438353135393935313b),
('6jsak3ve7ac5kqph7ropubts6arauods', '::1', 1485159951, 0x5f5f63695f6c6173745f726567656e65726174657c693a313438353135393935313b),
('ob2hhra0p09juj7fret88vudfne49kb6', '::1', 1485160129, 0x5f5f63695f6c6173745f726567656e65726174657c693a313438353135393935313b),
('d1j5fglj4p011d92q03gn3rctqsh4jn2', '::1', 1485159951, 0x5f5f63695f6c6173745f726567656e65726174657c693a313438353135393935313b),
('1thphbj25ud3f0l2d9n2pu4bdgv1gup6', '::1', 1485159951, 0x5f5f63695f6c6173745f726567656e65726174657c693a313438353135393935313b),
('0sdjfoq45v03oj89heni0v6piv7jnd85', '::1', 1485159951, 0x5f5f63695f6c6173745f726567656e65726174657c693a313438353135393935313b),
('dsd59d7rhthbmahe65d9tbvmsa6s7h38', '::1', 1485160129, 0x5f5f63695f6c6173745f726567656e65726174657c693a313438353136303131313b6964656e746974797c733a393a227765626d6173746572223b757365726e616d657c733a393a227765626d6173746572223b656d61696c7c4e3b757365725f69647c733a313a2231223b6f6c645f6c6173745f6c6f67696e7c733a31303a2231343835313333373635223b),
('iqv3or6mi8nqsaalrt3gvuhabck5kdd3', '::1', 1485160443, 0x5f5f63695f6c6173745f726567656e65726174657c693a313438353136303434323b6964656e746974797c733a393a227765626d6173746572223b757365726e616d657c733a393a227765626d6173746572223b656d61696c7c4e3b757365725f69647c733a313a2231223b6f6c645f6c6173745f6c6f67696e7c733a31303a2231343835313333373635223b),
('1avfc8e3joqlqpp1kegu1ctndo5g4m29', '::1', 1485221349, 0x5f5f63695f6c6173745f726567656e65726174657c693a313438353232313038323b6964656e746974797c733a393a227765626d6173746572223b757365726e616d657c733a393a227765626d6173746572223b656d61696c7c4e3b757365725f69647c733a313a2231223b6f6c645f6c6173745f6c6f67696e7c733a31303a2231343835313539383034223b),
('1dnifnp9g6qku4hahn5avai9orjva84q', '::1', 1485221165, 0x5f5f63695f6c6173745f726567656e65726174657c693a313438353232313136353b),
('jesfmkn38b3l8gp6a3sm0dkcpuh778b4', '::1', 1485221447, 0x5f5f63695f6c6173745f726567656e65726174657c693a313438353232313136353b),
('ge5guhrq3h57kemr20bf0j96hndv69if', '::1', 1485221701, 0x5f5f63695f6c6173745f726567656e65726174657c693a313438353232313430373b6964656e746974797c733a393a227765626d6173746572223b757365726e616d657c733a393a227765626d6173746572223b656d61696c7c4e3b757365725f69647c733a313a2231223b6f6c645f6c6173745f6c6f67696e7c733a31303a2231343835313539383034223b),
('qfg9j5t4a39jtotjuugiqhnn56vlul2j', '::1', 1485221478, 0x5f5f63695f6c6173745f726567656e65726174657c693a313438353232313437383b),
('ucg600maf30s3gcq7pfr5s6sgrmic7h2', '::1', 1485221701, 0x5f5f63695f6c6173745f726567656e65726174657c693a313438353232313437383b),
('tjj9h79pf8h06kq3kv9mo9nlln083iep', '::1', 1485221914, 0x5f5f63695f6c6173745f726567656e65726174657c693a313438353232313830343b6964656e746974797c733a393a227765626d6173746572223b757365726e616d657c733a393a227765626d6173746572223b656d61696c7c4e3b757365725f69647c733a313a2231223b6f6c645f6c6173745f6c6f67696e7c733a31303a2231343835313539383034223b),
('2gmca4mqg7edth1vbqa04a4jbv22tl3u', '::1', 1485221804, 0x5f5f63695f6c6173745f726567656e65726174657c693a313438353232313830343b),
('j7kkflfv3bn8n3uohvu27s6lsr2um78p', '::1', 1485221909, 0x5f5f63695f6c6173745f726567656e65726174657c693a313438353232313830343b),
('8pkpmeu3a98ousl8sv55u85gqpqcvrub', '::1', 1485222488, 0x5f5f63695f6c6173745f726567656e65726174657c693a313438353232323233333b6964656e746974797c733a393a227765626d6173746572223b757365726e616d657c733a393a227765626d6173746572223b656d61696c7c4e3b757365725f69647c733a313a2231223b6f6c645f6c6173745f6c6f67696e7c733a31303a2231343835313539383034223b),
('rrr29kedpv2t1vcu8ssa7hi4vl77nqi0', '::1', 1485222233, 0x5f5f63695f6c6173745f726567656e65726174657c693a313438353232323233333b),
('a3r33ij5bu5admstpptg0lsomlrpckt8', '::1', 1485222239, 0x5f5f63695f6c6173745f726567656e65726174657c693a313438353232323233333b),
('hfhqm4jti3arfpi36bsqdqf4fqhodfki', '::1', 1485222783, 0x5f5f63695f6c6173745f726567656e65726174657c693a313438353232323533363b6964656e746974797c733a393a227765626d6173746572223b757365726e616d657c733a393a227765626d6173746572223b656d61696c7c4e3b757365725f69647c733a313a2231223b6f6c645f6c6173745f6c6f67696e7c733a31303a2231343835313539383034223b),
('gvrpbqj4iob1a2a4u4lk40qeddvf365l', '::1', 1485222997, 0x5f5f63695f6c6173745f726567656e65726174657c693a313438353232323838383b6964656e746974797c733a393a227765626d6173746572223b757365726e616d657c733a393a227765626d6173746572223b656d61696c7c4e3b757365725f69647c733a313a2231223b6f6c645f6c6173745f6c6f67696e7c733a31303a2231343835313539383034223b),
('4vddhs3glgekrkrhtjj2tv7bk7qaievk', '::1', 1485222893, 0x5f5f63695f6c6173745f726567656e65726174657c693a313438353232323839333b),
('t2metunumh99acdro6sgonlenrrk5m8m', '::1', 1485222998, 0x5f5f63695f6c6173745f726567656e65726174657c693a313438353232323839333b),
('si12eoo59qn7tijnr0f44dutjmo1k176', '::1', 1485223604, 0x5f5f63695f6c6173745f726567656e65726174657c693a313438353232333331313b6964656e746974797c733a393a227765626d6173746572223b757365726e616d657c733a393a227765626d6173746572223b656d61696c7c4e3b757365725f69647c733a313a2231223b6f6c645f6c6173745f6c6f67696e7c733a31303a2231343835313539383034223b),
('ac1fmmmv2vgot6u4sfgsvtjitto4hfi1', '::1', 1485223311, 0x5f5f63695f6c6173745f726567656e65726174657c693a313438353232333331313b),
('ckdtd3m3rve0q1p2vn4lceck1vcjujhk', '::1', 1485223604, 0x5f5f63695f6c6173745f726567656e65726174657c693a313438353232333331313b),
('6f3a3eouunnp14b2c4d5gcen1uber7dc', '::1', 1485223768, 0x5f5f63695f6c6173745f726567656e65726174657c693a313438353232333732343b6964656e746974797c733a393a227765626d6173746572223b757365726e616d657c733a393a227765626d6173746572223b656d61696c7c4e3b757365725f69647c733a313a2231223b6f6c645f6c6173745f6c6f67696e7c733a31303a2231343835313539383034223b),
('bkbmgdgdl6kbt895eepqh2mds9h6mlv3', '::1', 1485223724, 0x5f5f63695f6c6173745f726567656e65726174657c693a313438353232333732343b),
('475vth258nic2napebhqiij3vsrmvb4b', '::1', 1485223768, 0x5f5f63695f6c6173745f726567656e65726174657c693a313438353232333732343b),
('02m3alo92orfad9rcf3b929vqjcig873', '::1', 1485224178, 0x5f5f63695f6c6173745f726567656e65726174657c693a313438353232343136363b6964656e746974797c733a393a227765626d6173746572223b757365726e616d657c733a393a227765626d6173746572223b656d61696c7c4e3b757365725f69647c733a313a2231223b6f6c645f6c6173745f6c6f67696e7c733a31303a2231343835313539383034223b),
('ated3s6g7i57rtpks9rppq0s15cio71e', '::1', 1485224166, 0x5f5f63695f6c6173745f726567656e65726174657c693a313438353232343136363b),
('57te5j7j8bt97lmb41dv1bstqrfijj7o', '::1', 1485224178, 0x5f5f63695f6c6173745f726567656e65726174657c693a313438353232343136363b),
('63uc5kcjt1obaeraukkbn0pjpomsb54i', '::1', 1485225029, 0x5f5f63695f6c6173745f726567656e65726174657c693a313438353232353032393b6964656e746974797c733a393a227765626d6173746572223b757365726e616d657c733a393a227765626d6173746572223b656d61696c7c4e3b757365725f69647c733a313a2231223b6f6c645f6c6173745f6c6f67696e7c733a31303a2231343835313539383034223b),
('hn4flkdkenked77tpgs1rvkv18sjuk65', '::1', 1485225029, 0x5f5f63695f6c6173745f726567656e65726174657c693a313438353232353032393b),
('tmktpe1s8g1qfs5v9d6bgdc3lvkj1rcq', '::1', 1485225029, 0x5f5f63695f6c6173745f726567656e65726174657c693a313438353232353032393b),
('p9q8ougu4sm08jn1qle09pmn7vqunj0b', '::1', 1485225192, 0x5f5f63695f6c6173745f726567656e65726174657c693a313438353232353033383b),
('0cndqikcriabkdlbduidemj0vsbncb5b', '::1', 1485225964, 0x5f5f63695f6c6173745f726567656e65726174657c693a313438353232353732383b),
('qjh1fuj9f63e55aurq5diagob4ia1icr', '::1', 1485226392, 0x5f5f63695f6c6173745f726567656e65726174657c693a313438353232363339323b),
('vvkjfgp6q49tcifjprbju06tifmd8nao', '::1', 1485227016, 0x5f5f63695f6c6173745f726567656e65726174657c693a313438353232363938383b),
('l32fn3pt9sn8q2jfn8urokil8inq5rn3', '::1', 1485227850, 0x5f5f63695f6c6173745f726567656e65726174657c693a313438353232373636343b),
('4anp1s3ir99p8jgd34std4lmgcg9hc56', '::1', 1485228613, 0x5f5f63695f6c6173745f726567656e65726174657c693a313438353232383333303b),
('vu6hpibokerfa07c347vui5uu2cl54ha', '::1', 1485228798, 0x5f5f63695f6c6173745f726567656e65726174657c693a313438353232383635323b),
('f17k441132a5fqll21ihn00i8ko2mn52', '::1', 1485229147, 0x5f5f63695f6c6173745f726567656e65726174657c693a313438353232393132313b),
('tqdlefo12qen75pteuaevvqp060dd99j', '::1', 1485229414, 0x5f5f63695f6c6173745f726567656e65726174657c693a313438353232393135343b6964656e746974797c733a393a227765626d6173746572223b757365726e616d657c733a393a227765626d6173746572223b656d61696c7c4e3b757365725f69647c733a313a2231223b6f6c645f6c6173745f6c6f67696e7c733a31303a2231343835313539383034223b),
('i6kntndqu9sucp0h0lvqgvkm9na2t6s7', '::1', 1485229158, 0x5f5f63695f6c6173745f726567656e65726174657c693a313438353232393135383b),
('8092uvd73295vc7uqne1eaprpir5vlp0', '::1', 1485229414, 0x5f5f63695f6c6173745f726567656e65726174657c693a313438353232393135383b),
('s75f6861r6jvmrqd81c9fk39jp8buvh3', '::1', 1485229616, 0x5f5f63695f6c6173745f726567656e65726174657c693a313438353232393437313b),
('mtogm0cgfb8bk18dahchj10sao41hggr', '::1', 1485229629, 0x5f5f63695f6c6173745f726567656e65726174657c693a313438353232393438303b6964656e746974797c733a393a227765626d6173746572223b757365726e616d657c733a393a227765626d6173746572223b656d61696c7c4e3b757365725f69647c733a313a2231223b6f6c645f6c6173745f6c6f67696e7c733a31303a2231343835313539383034223b),
('ab8hkbk3vmoeoqfdm99s2f91667bkdb0', '::1', 1485229480, 0x5f5f63695f6c6173745f726567656e65726174657c693a313438353232393438303b),
('4nrmlg9p7a1nbqho1u6rldfqlh8dvvm6', '::1', 1485229629, 0x5f5f63695f6c6173745f726567656e65726174657c693a313438353232393438303b),
('1059u83930o4nt2eg7ff3at4kjh8eedp', '::1', 1485229914, 0x5f5f63695f6c6173745f726567656e65726174657c693a313438353232393931343b),
('61apea37dl5l9tjsedk18tfgrpbb2q0i', '::1', 1485229921, 0x5f5f63695f6c6173745f726567656e65726174657c693a313438353232393932313b),
('0fs1imturbq934oe81f46551vgntcbo1', '::1', 1485230003, 0x5f5f63695f6c6173745f726567656e65726174657c693a313438353232393932313b),
('vvbtha7mundf7pa4bejsodu7dm2nhbkg', '::1', 1485230006, 0x5f5f63695f6c6173745f726567656e65726174657c693a313438353233303030343b6964656e746974797c733a393a227765626d6173746572223b757365726e616d657c733a393a227765626d6173746572223b656d61696c7c4e3b757365725f69647c733a313a2231223b6f6c645f6c6173745f6c6f67696e7c733a31303a2231343835323231303833223b73797374656d5f6d657373616765737c613a323a7b733a373a2273756363657373223b613a313a7b693a303b733a32393a223c703e4c6f6767656420496e205375636365737366756c6c793c2f703e223b7d733a353a226572726f72223b613a303a7b7d7d5f5f63695f766172737c613a313a7b733a31353a2273797374656d5f6d65737361676573223b733a333a226f6c64223b7d);

-- --------------------------------------------------------

--
-- Table structure for table `demo_blog_categories`
--

CREATE TABLE `demo_blog_categories` (
  `id` int(11) NOT NULL,
  `pos` int(11) NOT NULL DEFAULT '0',
  `title` varchar(100) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `demo_blog_categories`
--

INSERT INTO `demo_blog_categories` (`id`, `pos`, `title`) VALUES
(1, 1, 'Category 1'),
(2, 2, 'Category 2'),
(3, 3, 'Category 3'),
(4, 0, 'test title'),
(6, 4, 'test update'),
(7, 0, 'test title'),
(9, 0, 'test title'),
(10, 4, 'test title'),
(11, 6666, '77776');

-- --------------------------------------------------------

--
-- Table structure for table `demo_blog_posts`
--

CREATE TABLE `demo_blog_posts` (
  `id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL DEFAULT '1',
  `author_id` int(11) NOT NULL,
  `title` varchar(300) COLLATE utf8_unicode_ci NOT NULL,
  `image_url` varchar(300) COLLATE utf8_unicode_ci NOT NULL,
  `content_brief` text COLLATE utf8_unicode_ci NOT NULL,
  `content` text COLLATE utf8_unicode_ci NOT NULL,
  `publish_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `status` enum('draft','active','hidden') COLLATE utf8_unicode_ci NOT NULL DEFAULT 'draft'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `demo_blog_posts`
--

INSERT INTO `demo_blog_posts` (`id`, `category_id`, `author_id`, `title`, `image_url`, `content_brief`, `content`, `publish_time`, `status`) VALUES
(1, 1, 2, 'Blog Post 1', '', '<p>\r\n	Blog Post 1 Content Brief</p>\r\n', '<p>\r\n	Blog Post 1 Content</p>\r\n', '2015-09-25 16:00:00', 'active');

-- --------------------------------------------------------

--
-- Table structure for table `demo_blog_posts_tags`
--

CREATE TABLE `demo_blog_posts_tags` (
  `id` int(11) NOT NULL,
  `post_id` int(11) NOT NULL,
  `tag_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `demo_blog_posts_tags`
--

INSERT INTO `demo_blog_posts_tags` (`id`, `post_id`, `tag_id`) VALUES
(1, 1, 2),
(2, 1, 1),
(3, 1, 3);

-- --------------------------------------------------------

--
-- Table structure for table `demo_blog_tags`
--

CREATE TABLE `demo_blog_tags` (
  `id` int(11) NOT NULL,
  `title` varchar(100) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `demo_blog_tags`
--

INSERT INTO `demo_blog_tags` (`id`, `title`) VALUES
(1, 'Tag 1'),
(2, 'Tag 2'),
(3, 'Tag 3');

-- --------------------------------------------------------

--
-- Table structure for table `demo_cover_photos`
--

CREATE TABLE `demo_cover_photos` (
  `id` int(11) NOT NULL,
  `pos` int(11) NOT NULL DEFAULT '0',
  `image_url` varchar(300) COLLATE utf8_unicode_ci NOT NULL,
  `status` enum('active','hidden') COLLATE utf8_unicode_ci NOT NULL DEFAULT 'active'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `demo_cover_photos`
--

INSERT INTO `demo_cover_photos` (`id`, `pos`, `image_url`, `status`) VALUES
(1, 2, '45296-2.jpg', 'active'),
(2, 1, '2934f-1.jpg', 'active'),
(3, 3, '3717d-3.jpg', 'active');

-- --------------------------------------------------------

--
-- Table structure for table `groups`
--

CREATE TABLE `groups` (
  `id` mediumint(8) UNSIGNED NOT NULL,
  `name` varchar(20) NOT NULL,
  `description` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `groups`
--

INSERT INTO `groups` (`id`, `name`, `description`) VALUES
(1, 'members', 'General User');

-- --------------------------------------------------------

--
-- Table structure for table `login_attempts`
--

CREATE TABLE `login_attempts` (
  `id` int(11) UNSIGNED NOT NULL,
  `ip_address` varchar(15) NOT NULL,
  `login` varchar(100) NOT NULL,
  `time` int(11) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) UNSIGNED NOT NULL,
  `ip_address` varchar(15) NOT NULL,
  `username` varchar(100) DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `salt` varchar(255) DEFAULT NULL,
  `email` varchar(100) NOT NULL,
  `activation_code` varchar(40) DEFAULT NULL,
  `forgotten_password_code` varchar(40) DEFAULT NULL,
  `forgotten_password_time` int(11) UNSIGNED DEFAULT NULL,
  `remember_code` varchar(40) DEFAULT NULL,
  `created_on` int(11) UNSIGNED NOT NULL,
  `last_login` int(11) UNSIGNED DEFAULT NULL,
  `active` tinyint(1) UNSIGNED DEFAULT NULL,
  `first_name` varchar(50) DEFAULT NULL,
  `last_name` varchar(50) DEFAULT NULL,
  `company` varchar(100) DEFAULT NULL,
  `phone` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `ip_address`, `username`, `password`, `salt`, `email`, `activation_code`, `forgotten_password_code`, `forgotten_password_time`, `remember_code`, `created_on`, `last_login`, `active`, `first_name`, `last_name`, `company`, `phone`) VALUES
(1, '127.0.0.1', 'member', '$2y$08$kkqUE2hrqAJtg.pPnAhvL.1iE7LIujK5LZ61arONLpaBBWh/ek61G', NULL, 'member@member.com', NULL, NULL, NULL, NULL, 1451903855, 1451905011, 1, 'Member', 'One', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users_groups`
--

CREATE TABLE `users_groups` (
  `id` int(11) UNSIGNED NOT NULL,
  `user_id` int(11) UNSIGNED NOT NULL,
  `group_id` mediumint(8) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users_groups`
--

INSERT INTO `users_groups` (`id`, `user_id`, `group_id`) VALUES
(1, 1, 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin_groups`
--
ALTER TABLE `admin_groups`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `admin_login_attempts`
--
ALTER TABLE `admin_login_attempts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `admin_users`
--
ALTER TABLE `admin_users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `admin_users_groups`
--
ALTER TABLE `admin_users_groups`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `api_access`
--
ALTER TABLE `api_access`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `api_keys`
--
ALTER TABLE `api_keys`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `api_limits`
--
ALTER TABLE `api_limits`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `api_logs`
--
ALTER TABLE `api_logs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ci_sessions`
--
ALTER TABLE `ci_sessions`
  ADD KEY `ci_sessions_timestamp` (`timestamp`);

--
-- Indexes for table `demo_blog_categories`
--
ALTER TABLE `demo_blog_categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `demo_blog_posts`
--
ALTER TABLE `demo_blog_posts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `demo_blog_posts_tags`
--
ALTER TABLE `demo_blog_posts_tags`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `demo_blog_tags`
--
ALTER TABLE `demo_blog_tags`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `demo_cover_photos`
--
ALTER TABLE `demo_cover_photos`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `groups`
--
ALTER TABLE `groups`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `login_attempts`
--
ALTER TABLE `login_attempts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users_groups`
--
ALTER TABLE `users_groups`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin_groups`
--
ALTER TABLE `admin_groups`
  MODIFY `id` mediumint(8) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `admin_login_attempts`
--
ALTER TABLE `admin_login_attempts`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `admin_users`
--
ALTER TABLE `admin_users`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `admin_users_groups`
--
ALTER TABLE `admin_users_groups`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `api_access`
--
ALTER TABLE `api_access`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `api_keys`
--
ALTER TABLE `api_keys`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `api_limits`
--
ALTER TABLE `api_limits`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `api_logs`
--
ALTER TABLE `api_logs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `demo_blog_categories`
--
ALTER TABLE `demo_blog_categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT for table `demo_blog_posts`
--
ALTER TABLE `demo_blog_posts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `demo_blog_posts_tags`
--
ALTER TABLE `demo_blog_posts_tags`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `demo_blog_tags`
--
ALTER TABLE `demo_blog_tags`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `demo_cover_photos`
--
ALTER TABLE `demo_cover_photos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `groups`
--
ALTER TABLE `groups`
  MODIFY `id` mediumint(8) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `login_attempts`
--
ALTER TABLE `login_attempts`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `users_groups`
--
ALTER TABLE `users_groups`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

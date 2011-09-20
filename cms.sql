-- phpMyAdmin SQL Dump
-- version 3.3.9.2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Erstellungszeit: 21. September 2011 um 00:04
-- Server Version: 5.5.9
-- PHP-Version: 5.2.17

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";

--
-- Datenbank: `cms`
--
CREATE DATABASE `cms` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `cms`;

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `logs`
--

CREATE TABLE `logs` (
  `log_id` int(50) NOT NULL AUTO_INCREMENT,
  `log_type` varchar(30) NOT NULL,
  `log_content` varchar(500) DEFAULT NULL,
  `log_user` int(11) DEFAULT NULL,
  `log_ts` datetime NOT NULL,
  `log_port` varchar(20) DEFAULT NULL,
  `log_request_url` varchar(50) DEFAULT NULL,
  `log_host` varchar(50) DEFAULT NULL,
  `log_ip` varchar(32) DEFAULT '',
  PRIMARY KEY (`log_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=134 ;

--
-- Daten für Tabelle `logs`
--

INSERT INTO `logs` VALUES(36, 'login', 'Session: af20806d4aab62e8941b875577b79866', 1, '2011-09-11 20:40:44', '63188', '/cms/login.php', '', '127.0.0.1');
INSERT INTO `logs` VALUES(37, 'message-success', 'Sie wurden erfolgreich eingeloggt.', 0, '2011-09-11 20:40:44', '63188', '/cms/login.php', '', '127.0.0.1');
INSERT INTO `logs` VALUES(38, 'message-error', 'Diese Seite konnte leider nicht gefunden werden.', 0, '2011-09-11 20:40:53', '63188', '/cms/index.php?p=3', '', '127.0.0.1');
INSERT INTO `logs` VALUES(39, 'logout', 'Session: af20806d4aab62e8941b875577b79866', 1, '2011-09-11 20:40:56', '63188', '/cms/index.php?action=logout', '', '127.0.0.1');
INSERT INTO `logs` VALUES(40, 'message-success', 'Sie wurden erfolgreich ausgeloggt.', 0, '2011-09-11 20:40:56', '63188', '/cms/index.php?action=logout', '', '127.0.0.1');
INSERT INTO `logs` VALUES(41, 'login', 'Session: af20806d4aab62e8941b875577b79866', 1, '2011-09-12 00:23:49', '55207', '/cms/login.php', '', '127.0.0.1');
INSERT INTO `logs` VALUES(42, 'message-success', 'Sie wurden erfolgreich eingeloggt.', 0, '2011-09-12 00:23:49', '55207', '/cms/login.php', '', '127.0.0.1');
INSERT INTO `logs` VALUES(43, 'logout', 'Session: af20806d4aab62e8941b875577b79866', 1, '2011-09-12 00:23:53', '55207', '/cms/index.php?action=logout', '', '127.0.0.1');
INSERT INTO `logs` VALUES(44, 'message-success', 'Sie wurden erfolgreich ausgeloggt.', 0, '2011-09-12 00:23:53', '55207', '/cms/index.php?action=logout', '', '127.0.0.1');
INSERT INTO `logs` VALUES(45, 'login', 'Session: af20806d4aab62e8941b875577b79866', 1, '2011-09-12 00:24:46', '55208', '/cms/login.php', '', '127.0.0.1');
INSERT INTO `logs` VALUES(46, 'message-success', 'Sie wurden erfolgreich eingeloggt.', 0, '2011-09-12 00:24:46', '55208', '/cms/login.php', '', '127.0.0.1');
INSERT INTO `logs` VALUES(47, 'logout', 'Session: af20806d4aab62e8941b875577b79866', 1, '2011-09-12 00:24:50', '55208', '/cms/index.php?action=logout', '', '127.0.0.1');
INSERT INTO `logs` VALUES(48, 'message-success', 'Sie wurden erfolgreich ausgeloggt.', 0, '2011-09-12 00:24:50', '55208', '/cms/index.php?action=logout', '', '127.0.0.1');
INSERT INTO `logs` VALUES(49, 'login', 'Session: af20806d4aab62e8941b875577b79866', 1, '2011-09-12 00:26:53', '55218', '/cms/login.php', '', '127.0.0.1');
INSERT INTO `logs` VALUES(50, 'message-success', 'Sie wurden erfolgreich eingeloggt.', 0, '2011-09-12 00:26:53', '55218', '/cms/login.php', '', '127.0.0.1');
INSERT INTO `logs` VALUES(51, 'logout', 'Session: af20806d4aab62e8941b875577b79866', 1, '2011-09-12 00:26:57', '55218', '/cms/index.php?action=logout', '', '127.0.0.1');
INSERT INTO `logs` VALUES(52, 'message-success', 'Sie wurden erfolgreich ausgeloggt.', 0, '2011-09-12 00:26:57', '55218', '/cms/index.php?action=logout', '', '127.0.0.1');
INSERT INTO `logs` VALUES(53, 'message-error', 'Bitte geben Sie ein Passwort ein.', 0, '2011-09-12 00:26:59', '55218', '/cms/login.php', '', '127.0.0.1');
INSERT INTO `logs` VALUES(54, 'message-error', 'Bitte geben Sie ein Passwort ein.', 0, '2011-09-12 00:27:16', '55219', '/cms/login.php', '', '127.0.0.1');
INSERT INTO `logs` VALUES(55, 'login', 'Session: af20806d4aab62e8941b875577b79866', 1, '2011-09-12 00:27:23', '55220', '/cms/login.php', '', '127.0.0.1');
INSERT INTO `logs` VALUES(56, 'message-success', 'Sie wurden erfolgreich eingeloggt.', 0, '2011-09-12 00:27:23', '55220', '/cms/login.php', '', '127.0.0.1');
INSERT INTO `logs` VALUES(57, 'logout', 'Session: af20806d4aab62e8941b875577b79866', 1, '2011-09-12 00:27:27', '55220', '/cms/index.php?action=logout', '', '127.0.0.1');
INSERT INTO `logs` VALUES(58, 'message-success', 'Sie wurden erfolgreich ausgeloggt.', 0, '2011-09-12 00:27:27', '55220', '/cms/index.php?action=logout', '', '127.0.0.1');
INSERT INTO `logs` VALUES(59, 'login', 'Session: af20806d4aab62e8941b875577b79866', 1, '2011-09-12 00:28:13', '55222', '/cms/login.php', '', '127.0.0.1');
INSERT INTO `logs` VALUES(60, 'message-success', 'Sie wurden erfolgreich eingeloggt.', 0, '2011-09-12 00:28:13', '55222', '/cms/login.php', '', '127.0.0.1');
INSERT INTO `logs` VALUES(61, 'logout', 'Session: af20806d4aab62e8941b875577b79866', 1, '2011-09-12 00:28:16', '55222', '/cms/index.php?action=logout', '', '127.0.0.1');
INSERT INTO `logs` VALUES(62, 'message-success', 'Sie wurden erfolgreich ausgeloggt.', 0, '2011-09-12 00:28:16', '55222', '/cms/index.php?action=logout', '', '127.0.0.1');
INSERT INTO `logs` VALUES(63, 'message-error', 'Es konnte kein Log angelegt werden. Bitte benachrichtigen Sie den Systemadministrator', 0, '2011-09-12 00:28:16', '55222', '/cms/index.php?action=logout', '', '127.0.0.1');
INSERT INTO `logs` VALUES(64, 'login', 'Session: af20806d4aab62e8941b875577b79866', 1, '2011-09-12 00:28:38', '55223', '/cms/login.php', '', '127.0.0.1');
INSERT INTO `logs` VALUES(65, 'logout', 'Session: af20806d4aab62e8941b875577b79866', 1, '2011-09-12 00:28:41', '55223', '/cms/index.php?action=logout', '', '127.0.0.1');
INSERT INTO `logs` VALUES(66, 'login', 'Session: af20806d4aab62e8941b875577b79866', 1, '2011-09-12 00:29:18', '55225', '/cms/login.php', '', '127.0.0.1');
INSERT INTO `logs` VALUES(67, 'logout', 'Session: af20806d4aab62e8941b875577b79866', 1, '2011-09-12 00:29:22', '55225', '/cms/index.php?action=logout', '', '127.0.0.1');
INSERT INTO `logs` VALUES(68, 'login', 'Session: af20806d4aab62e8941b875577b79866', 1, '2011-09-12 00:36:07', '55255', '/cms/login.php', '', '127.0.0.1');
INSERT INTO `logs` VALUES(69, 'logout', 'Session: af20806d4aab62e8941b875577b79866', 1, '2011-09-12 00:36:10', '55255', '/cms/index.php?action=logout', '', '127.0.0.1');
INSERT INTO `logs` VALUES(70, 'login', 'Session: af20806d4aab62e8941b875577b79866', 1, '2011-09-12 00:37:12', '55257', '/cms/login.php', '', '127.0.0.1');
INSERT INTO `logs` VALUES(71, 'logout', 'Session: af20806d4aab62e8941b875577b79866', 1, '2011-09-12 00:37:15', '55257', '/cms/index.php?action=logout', '', '127.0.0.1');
INSERT INTO `logs` VALUES(72, 'login', 'Session: af20806d4aab62e8941b875577b79866', 1, '2011-09-12 00:38:36', '55261', '/cms/login.php', '', '127.0.0.1');
INSERT INTO `logs` VALUES(73, 'logout', 'Session: af20806d4aab62e8941b875577b79866', 1, '2011-09-12 00:38:40', '55261', '/cms/index.php?action=logout', '', '127.0.0.1');
INSERT INTO `logs` VALUES(74, 'login', 'Session: af20806d4aab62e8941b875577b79866', 1, '2011-09-12 00:39:59', '55267', '/cms/login.php', '', '127.0.0.1');
INSERT INTO `logs` VALUES(75, 'logout', 'Session: af20806d4aab62e8941b875577b79866', 1, '2011-09-12 00:40:03', '55267', '/cms/index.php?action=logout', '', '127.0.0.1');
INSERT INTO `logs` VALUES(76, 'login', 'Session: af20806d4aab62e8941b875577b79866', 1, '2011-09-12 00:40:26', '55268', '/cms/login.php', '', '127.0.0.1');
INSERT INTO `logs` VALUES(77, 'logout', 'Session: af20806d4aab62e8941b875577b79866', 1, '2011-09-12 00:40:30', '55268', '/cms/index.php?action=logout', '', '127.0.0.1');
INSERT INTO `logs` VALUES(78, 'login', 'Session: af20806d4aab62e8941b875577b79866', 1, '2011-09-12 00:43:57', '55276', '/cms/login.php', '', '127.0.0.1');
INSERT INTO `logs` VALUES(79, 'logout', 'Session: af20806d4aab62e8941b875577b79866', 1, '2011-09-12 00:44:02', '55276', '/cms/index.php?action=logout', '', '127.0.0.1');
INSERT INTO `logs` VALUES(80, 'login', 'Session: af20806d4aab62e8941b875577b79866', 1, '2011-09-12 00:44:37', '55277', '/cms/login.php', '', '127.0.0.1');
INSERT INTO `logs` VALUES(81, 'logout', 'Session: af20806d4aab62e8941b875577b79866', 1, '2011-09-12 00:44:41', '55277', '/cms/index.php?action=logout', '', '127.0.0.1');
INSERT INTO `logs` VALUES(82, 'login', 'Session: af20806d4aab62e8941b875577b79866', 1, '2011-09-12 00:46:04', '55308', '/cms/login.php', '', '127.0.0.1');
INSERT INTO `logs` VALUES(83, 'message-success', 'Sie wurden erfolgreich eingeloggt.', 0, '2011-09-12 00:46:04', '55308', '/cms/login.php', '', '127.0.0.1');
INSERT INTO `logs` VALUES(84, 'logout', 'Session: af20806d4aab62e8941b875577b79866', 1, '2011-09-12 00:46:09', '55308', '/cms/index.php?action=logout', '', '127.0.0.1');
INSERT INTO `logs` VALUES(85, 'message-success', 'Sie wurden erfolgreich ausgeloggt.', 0, '2011-09-12 00:46:09', '55308', '/cms/index.php?action=logout', '', '127.0.0.1');
INSERT INTO `logs` VALUES(86, 'message-error', 'Um diese Seite betrachten zu kÃ¶nnen mÃ¼ssen Sie eingeloggt sein.', 0, '2011-09-12 00:46:15', '55309', '/cms/index.php?p=2', '', '127.0.0.1');
INSERT INTO `logs` VALUES(87, 'message-error', 'Bitte geben Sie ein Passwort ein.', 0, '2011-09-12 00:52:53', '55369', '/cms/login.php', '', '127.0.0.1');
INSERT INTO `logs` VALUES(88, 'message-error', 'Bitte geben Sie ein Passwort ein.', 0, '2011-09-12 00:53:23', '55372', '/cms/login.php', '', '127.0.0.1');
INSERT INTO `logs` VALUES(89, 'message-error', 'Bitte geben Sie ein Passwort ein.', 0, '2011-09-12 00:57:09', '55384', '/cms/login.php', '', '127.0.0.1');
INSERT INTO `logs` VALUES(90, 'message-error', 'Bitte geben Sie ein Passwort ein.', 0, '2011-09-12 00:57:13', '55384', '/cms/login.php', '', '127.0.0.1');
INSERT INTO `logs` VALUES(91, 'message-error', 'Bitte geben Sie ein Passwort ein.', 0, '2011-09-12 00:57:28', '55385', '/cms/login.php', '', '127.0.0.1');
INSERT INTO `logs` VALUES(92, 'login', 'Session: af20806d4aab62e8941b875577b79866', 1, '2011-09-12 00:57:33', '55386', '/cms/login.php', '', '127.0.0.1');
INSERT INTO `logs` VALUES(93, 'message-success', 'Sie wurden erfolgreich eingeloggt.', 0, '2011-09-12 00:57:33', '55386', '/cms/login.php', '', '127.0.0.1');
INSERT INTO `logs` VALUES(94, 'logout', 'Session: af20806d4aab62e8941b875577b79866', 1, '2011-09-12 01:00:47', '55402', '/cms/index.php?action=logout', '', '127.0.0.1');
INSERT INTO `logs` VALUES(95, 'message-success', 'Sie wurden erfolgreich ausgeloggt.', 0, '2011-09-12 01:00:47', '55402', '/cms/index.php?action=logout', '', '127.0.0.1');
INSERT INTO `logs` VALUES(96, 'login', 'Session: af20806d4aab62e8941b875577b79866', 1, '2011-09-12 01:00:49', '55402', '/cms/login.php', '', '127.0.0.1');
INSERT INTO `logs` VALUES(97, 'message-success', 'Sie wurden erfolgreich eingeloggt.', 0, '2011-09-12 01:00:49', '55402', '/cms/login.php', '', '127.0.0.1');
INSERT INTO `logs` VALUES(98, 'logout', 'Session: af20806d4aab62e8941b875577b79866', 1, '2011-09-12 01:00:53', '55402', '/cms/index.php?action=logout', '', '127.0.0.1');
INSERT INTO `logs` VALUES(99, 'message-success', 'Sie wurden erfolgreich ausgeloggt.', 0, '2011-09-12 01:00:53', '55402', '/cms/index.php?action=logout', '', '127.0.0.1');
INSERT INTO `logs` VALUES(100, 'login', 'Session: af20806d4aab62e8941b875577b79866', 1, '2011-09-12 01:02:17', '55414', '/cms/login.php', '', '127.0.0.1');
INSERT INTO `logs` VALUES(101, 'message-success', 'Sie wurden erfolgreich eingeloggt.', 0, '2011-09-12 01:02:17', '55414', '/cms/login.php', '', '127.0.0.1');
INSERT INTO `logs` VALUES(102, 'logout', 'Session: af20806d4aab62e8941b875577b79866', 1, '2011-09-12 01:02:20', '55414', '/cms/index.php?action=logout', '', '127.0.0.1');
INSERT INTO `logs` VALUES(103, 'message-success', 'Sie wurden erfolgreich ausgeloggt.', 0, '2011-09-12 01:02:20', '55414', '/cms/index.php?action=logout', '', '127.0.0.1');
INSERT INTO `logs` VALUES(104, 'login', 'Session: af20806d4aab62e8941b875577b79866', 1, '2011-09-12 01:02:56', '55420', '/cms/login.php', '', '127.0.0.1');
INSERT INTO `logs` VALUES(105, 'message-success', 'Sie wurden erfolgreich eingeloggt.', 0, '2011-09-12 01:02:56', '55420', '/cms/login.php', '', '127.0.0.1');
INSERT INTO `logs` VALUES(106, 'logout', 'Session: af20806d4aab62e8941b875577b79866', 1, '2011-09-12 01:03:02', '55420', '/cms/index.php?action=logout', '', '127.0.0.1');
INSERT INTO `logs` VALUES(107, 'message-success', 'Sie wurden erfolgreich ausgeloggt.', 0, '2011-09-12 01:03:02', '55420', '/cms/index.php?action=logout', '', '127.0.0.1');
INSERT INTO `logs` VALUES(108, 'message-error', 'Um diese Seite betrachten zu kÃ¶nnen mÃ¼ssen Sie eingeloggt sein.', 0, '2011-09-12 01:03:08', '55420', '/cms/index.php?p=2', '', '127.0.0.1');
INSERT INTO `logs` VALUES(109, 'login', 'Session: af20806d4aab62e8941b875577b79866', 1, '2011-09-12 01:03:11', '55420', '/cms/login.php', '', '127.0.0.1');
INSERT INTO `logs` VALUES(110, 'message-success', 'Sie wurden erfolgreich eingeloggt.', 0, '2011-09-12 01:03:11', '55420', '/cms/login.php', '', '127.0.0.1');
INSERT INTO `logs` VALUES(111, 'logout', 'Session: af20806d4aab62e8941b875577b79866', 1, '2011-09-12 01:03:17', '55420', '/cms/index.php?action=logout', '', '127.0.0.1');
INSERT INTO `logs` VALUES(112, 'message-success', 'Sie wurden erfolgreich ausgeloggt.', 0, '2011-09-12 01:03:17', '55420', '/cms/index.php?action=logout', '', '127.0.0.1');
INSERT INTO `logs` VALUES(113, 'login', 'Session: af20806d4aab62e8941b875577b79866', 1, '2011-09-12 01:03:49', '55421', '/cms/login.php', '', '127.0.0.1');
INSERT INTO `logs` VALUES(114, 'message-success', 'Sie wurden erfolgreich eingeloggt.', 0, '2011-09-12 01:03:49', '55421', '/cms/login.php', '', '127.0.0.1');
INSERT INTO `logs` VALUES(115, 'logout', 'Session: af20806d4aab62e8941b875577b79866', 1, '2011-09-12 01:03:59', '55421', '/cms/index.php?action=logout&p=2', '', '127.0.0.1');
INSERT INTO `logs` VALUES(116, 'message-success', 'Sie wurden erfolgreich ausgeloggt.', 0, '2011-09-12 01:03:59', '55421', '/cms/index.php?action=logout&p=2', '', '127.0.0.1');
INSERT INTO `logs` VALUES(117, 'message-error', 'Um diese Seite betrachten zu kÃ¶nnen mÃ¼ssen Sie eingeloggt sein.', 0, '2011-09-12 01:03:59', '55421', '/cms/index.php?action=logout&p=2', '', '127.0.0.1');
INSERT INTO `logs` VALUES(118, 'message-error', 'Um diese Seite betrachten zu kÃ¶nnen mÃ¼ssen Sie eingeloggt sein.', 0, '2011-09-12 01:04:01', '55421', '/cms/index.php?p=2', '', '127.0.0.1');
INSERT INTO `logs` VALUES(119, 'message-error', 'Um diese Seite betrachten zu kÃ¶nnen mÃ¼ssen Sie eingeloggt sein.', 0, '2011-09-12 19:07:37', '56375', '/cms/index.php?p=2', '', '127.0.0.1');
INSERT INTO `logs` VALUES(120, 'login', 'Session: af20806d4aab62e8941b875577b79866', 1, '2011-09-12 22:01:13', '58434', '/cms/login.php', '', '127.0.0.1');
INSERT INTO `logs` VALUES(121, 'message-success', 'Sie wurden erfolgreich eingeloggt.', 0, '2011-09-12 22:01:13', '58434', '/cms/login.php', '', '127.0.0.1');
INSERT INTO `logs` VALUES(122, 'message-error', 'Fehler beim Laden des Plugins (news)', 0, '2011-09-12 22:35:18', '58664', '/cms/index.php?p=1', '', '127.0.0.1');
INSERT INTO `logs` VALUES(123, 'logout', 'Session: af20806d4aab62e8941b875577b79866', 1, '2011-09-12 22:35:18', '58664', '/cms/index.php?p=1', '', '127.0.0.1');
INSERT INTO `logs` VALUES(124, 'message-error', 'Fehler beim Laden des Plugins (news, ''/include/plugin.news.inc.php'')', 0, '2011-09-12 22:46:07', '58739', '/cms/index.php?p=1', '', '127.0.0.1');
INSERT INTO `logs` VALUES(125, 'message-error', 'Fehler beim Laden des Plugins (news, ''/include/plugin.news.inc.php'')', 0, '2011-09-12 22:52:30', '58761', '/cms/index.php?p=1', '', '127.0.0.1');
INSERT INTO `logs` VALUES(126, 'message-error', 'Fehler beim Laden des Plugins (news, ''/include/plugin.news.inc.php'')', 0, '2011-09-12 22:53:53', '58773', '/cms/index.php?p=1', '', '127.0.0.1');
INSERT INTO `logs` VALUES(127, 'message-error', 'Fehler beim Laden des Plugins (news, ''/include/plugin.news.inc.php'')', 0, '2011-09-12 22:54:16', '58780', '/cms/index.php?p=1', '', '127.0.0.1');
INSERT INTO `logs` VALUES(128, 'message-error', 'Fehler beim Laden des Plugins (news, ''/include/plugin.news.inc.php'')', 0, '2011-09-12 22:55:26', '58785', '/cms/index.php?p=1', '', '127.0.0.1');
INSERT INTO `logs` VALUES(129, 'message-error', 'Fehler beim Laden des Plugins (news, ''/include/plugin.news.inc.php'')', 0, '2011-09-12 22:56:39', '58786', '/cms/index.php?p=1', '', '127.0.0.1');
INSERT INTO `logs` VALUES(130, 'message-error', 'Fehler beim Laden des Plugins (news, ''/include/plugin.news.inc.php'')', 0, '2011-09-12 22:56:43', '58786', '/cms/index.php?p=1', '', '127.0.0.1');
INSERT INTO `logs` VALUES(131, 'message-error', 'Fehler beim Laden des Plugins (news, ''/include/plugin.news.inc.php'')', 0, '2011-09-12 22:56:52', '58787', '/cms/index.php?p=1', '', '127.0.0.1');
INSERT INTO `logs` VALUES(132, 'message-error', 'Um diese Seite betrachten zu kÃ¶nnen mÃ¼ssen Sie eingeloggt sein.', 0, '2011-09-12 23:32:43', '58965', '/cms/index.php?p=2', '', '127.0.0.1');
INSERT INTO `logs` VALUES(133, 'message-error', 'Um diese Seite betrachten zu kÃ¶nnen mÃ¼ssen Sie eingeloggt sein.', 0, '2011-09-12 23:32:48', '58965', '/cms/index.php?p=2', '', '127.0.0.1');

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `menu_items`
--

CREATE TABLE `menu_items` (
  `menu_item_id` int(11) NOT NULL AUTO_INCREMENT,
  `menu_id` int(11) NOT NULL,
  `menu_item_target` int(5) NOT NULL,
  `menu_item_title` varchar(32) DEFAULT NULL,
  `menu_item_link` varchar(120) DEFAULT NULL,
  `menu_item_page` int(11) NOT NULL,
  `menu_item_order_id` int(20) NOT NULL,
  `menu_item_visible` int(2) NOT NULL,
  `menu_item_ts_create` datetime NOT NULL,
  `menu_item_ts_update` datetime DEFAULT NULL,
  `menu_item_ts_delete` datetime DEFAULT NULL,
  `menu_item_id_create` int(11) NOT NULL,
  `menu_item_id_update` int(11) DEFAULT NULL,
  `menu_item_id_delete` int(11) DEFAULT NULL,
  PRIMARY KEY (`menu_item_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Daten für Tabelle `menu_items`
--

INSERT INTO `menu_items` VALUES(1, 1, 0, 'Home', NULL, 1, 1, 1, '2011-09-11 20:50:47', NULL, NULL, 1, NULL, NULL);
INSERT INTO `menu_items` VALUES(2, 1, 0, 'Nologin', NULL, 2, 2, 1, '2011-09-11 20:51:36', NULL, NULL, 1, NULL, NULL);
INSERT INTO `menu_items` VALUES(3, 2, 0, 'Home', NULL, 1, 1, 1, '2011-09-11 22:02:36', NULL, NULL, 0, NULL, NULL);
INSERT INTO `menu_items` VALUES(4, 2, 0, 'Forum', '/board', 0, 2, 1, '2011-09-11 22:03:09', NULL, NULL, 0, NULL, NULL);

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `pages`
--

CREATE TABLE `pages` (
  `page_id` int(11) NOT NULL AUTO_INCREMENT,
  `page_title` varchar(64) NOT NULL,
  `page_content` varchar(50000) NOT NULL,
  `page_loginrequired` int(2) NOT NULL DEFAULT '0',
  `page_author` int(11) NOT NULL,
  `page_ts_create` datetime NOT NULL,
  `page_ts_update` datetime DEFAULT NULL,
  `page_ts_delete` datetime DEFAULT NULL,
  `page_id_update` int(11) DEFAULT NULL,
  `page_id_delete` int(11) DEFAULT NULL,
  `page_comments` int(2) NOT NULL DEFAULT '1',
  `page_function` varchar(25) DEFAULT NULL,
  PRIMARY KEY (`page_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Daten für Tabelle `pages`
--

INSERT INTO `pages` VALUES(1, 'Home', 'Wilkommen auf der Hauptseite! <br>Test von br von <b>Bold</b> und <i>italic-font</i>', 0, 1, '2011-09-10 21:38:59', NULL, NULL, NULL, NULL, 1, 'news');
INSERT INTO `pages` VALUES(2, 'Nologin?', 'Testseite, kein zutritt für nicht eingeloggte', 1, 1, '2011-09-10 23:48:32', NULL, NULL, NULL, NULL, 1, NULL);

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `plugin_news`
--

CREATE TABLE `plugin_news` (
  `plugin_news_id` int(11) NOT NULL AUTO_INCREMENT,
  `plugin_news_title` varchar(50) NOT NULL,
  `plugin_news_content` varchar(20000) NOT NULL,
  `plugin_news_create_id` int(11) NOT NULL,
  `plugin_news_create_ts` datetime NOT NULL,
  `plugin_news_update_id` int(11) DEFAULT NULL,
  `plugin_news_update_ts` datetime DEFAULT NULL,
  `plugin_news_delete_id` int(11) DEFAULT NULL,
  `plugin_news_delete_ts` datetime DEFAULT NULL,
  PRIMARY KEY (`plugin_news_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Daten für Tabelle `plugin_news`
--

INSERT INTO `plugin_news` VALUES(1, 'Testnews', 'Dies ist eine Testnews. <br> Mit ganz viel <b>Inhalt</b> und <i>testerei</i><br>Ja, hier ist schon sehr viel los, man mag es kaum glauben!', 1, '2011-09-12 23:08:19', NULL, NULL, NULL, NULL);
INSERT INTO `plugin_news` VALUES(2, 'Testnews2', 'Dies ist eine Testnews. <br> Mit ganz viel <b>Inhalt</b> und <i>testerei</i><br>Ja, hier ist schon sehr viel los, man mag es kaum glauben!', 1, '2011-09-12 23:08:19', NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `plugins`
--

CREATE TABLE `plugins` (
  `plugin_id` int(11) NOT NULL AUTO_INCREMENT,
  `plugin_name` varchar(50) NOT NULL,
  `plugin_identify` varchar(80) NOT NULL,
  `plugin_folder` varchar(50) DEFAULT '',
  `plugin_table` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`plugin_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Daten für Tabelle `plugins`
--

INSERT INTO `plugins` VALUES(1, 'news', 'news', '', NULL);

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_name` varchar(30) NOT NULL DEFAULT '',
  `user_pass` varchar(32) NOT NULL DEFAULT '',
  `user_firstname` varchar(32) DEFAULT NULL,
  `user_lastname` varchar(32) DEFAULT NULL,
  `user_session` varchar(32) DEFAULT NULL,
  `user_mail` varchar(150) NOT NULL DEFAULT '',
  `user_active` int(2) NOT NULL DEFAULT '0',
  PRIMARY KEY (`user_id`),
  UNIQUE KEY `NickName` (`user_name`),
  UNIQUE KEY `UserMail` (`user_mail`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Daten für Tabelle `users`
--

INSERT INTO `users` VALUES(1, 'admin', 'b9153eb8b2f406895c95dc7f0d3b8a48', 'System', 'Admin', 'af20806d4aab62e8941b875577b79866', 'admin@yoururl.com', 0);

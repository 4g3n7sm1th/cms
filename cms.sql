/*
 Navicat Premium Data Transfer

 Source Server         : LocalHorst
 Source Server Type    : MySQL
 Source Server Version : 50509
 Source Host           : localhost
 Source Database       : cms

 Target Server Type    : MySQL
 Target Server Version : 50509
 File Encoding         : utf-8

 Date: 10/09/2011 14:58:39 PM
*/

SET NAMES utf8;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
--  Table structure for `admin_menu_items`
-- ----------------------------
DROP TABLE IF EXISTS `admin_menu_items`;
CREATE TABLE `admin_menu_items` (
  `menu_item_id` int(11) NOT NULL AUTO_INCREMENT,
  `menu_id` int(11) NOT NULL,
  `menu_page` varchar(50) DEFAULT NULL,
  `menu_item_right` varchar(50) DEFAULT NULL,
  `menu_item_target` int(5) NOT NULL,
  `menu_item_title` varchar(32) DEFAULT NULL,
  `menu_item_link` varchar(120) DEFAULT '0',
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
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;

-- ----------------------------
--  Records of `admin_menu_items`
-- ----------------------------
BEGIN;
INSERT INTO `admin_menu_items` VALUES ('1', '1', '', null, '0', 'Dashboard', 'index.php', '1', '1', '1', '2011-09-11 20:50:47', null, null, '1', null, null), ('2', '1', null, null, '0', 'Logout', 'login.php?action=logout', '2', '4', '1', '2011-09-11 20:51:36', null, null, '1', null, null), ('3', '2', 'home', null, '0', 'Dashboard', 'index.php', '1', '1', '1', '2011-09-11 22:02:36', null, null, '0', null, null), ('4', '1', null, null, '0', 'Seiten', 'index.php?action=pages', '0', '2', '1', '2011-09-11 22:03:09', null, null, '0', null, null), ('5', '2', null, 'admin.panel', '1', 'Admin', 'admin/', '0', '3', '1', '2011-10-04 13:30:05', null, null, '1', null, null), ('6', '2', 'pages', null, '0', 'Übersicht', 'index.php?action=pages', '0', '1', '1', '2011-10-05 16:20:47', null, null, '0', null, null), ('7', '2', 'pages', null, '0', 'Neue Seite', 'index.php?action=pages&new=1', '0', '2', '1', '2011-10-05 16:20:34', null, null, '0', null, null), ('8', '1', null, null, '0', 'Benutzer', 'index.php?action=users', '0', '3', '1', '2011-10-06 14:39:41', null, null, '0', null, null), ('9', '2', 'users', null, '0', 'Übersicht', 'index.php?action=users', '0', '1', '1', '2011-10-06 14:41:14', null, null, '0', null, null);
COMMIT;

-- ----------------------------
--  Table structure for `logs`
-- ----------------------------
DROP TABLE IF EXISTS `logs`;
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
) ENGINE=InnoDB AUTO_INCREMENT=238 DEFAULT CHARSET=latin1;

-- ----------------------------
--  Records of `logs`
-- ----------------------------
BEGIN;
INSERT INTO `logs` VALUES ('36', 'login', 'Session: af20806d4aab62e8941b875577b79866', '1', '2011-09-11 20:40:44', '63188', '/cms/login.php', '', '127.0.0.1'), ('37', 'message-success', 'Sie wurden erfolgreich eingeloggt.', '0', '2011-09-11 20:40:44', '63188', '/cms/login.php', '', '127.0.0.1'), ('38', 'message-error', 'Diese Seite konnte leider nicht gefunden werden.', '0', '2011-09-11 20:40:53', '63188', '/cms/index.php?p=3', '', '127.0.0.1'), ('39', 'logout', 'Session: af20806d4aab62e8941b875577b79866', '1', '2011-09-11 20:40:56', '63188', '/cms/index.php?action=logout', '', '127.0.0.1'), ('40', 'message-success', 'Sie wurden erfolgreich ausgeloggt.', '0', '2011-09-11 20:40:56', '63188', '/cms/index.php?action=logout', '', '127.0.0.1'), ('41', 'login', 'Session: af20806d4aab62e8941b875577b79866', '1', '2011-09-12 00:23:49', '55207', '/cms/login.php', '', '127.0.0.1'), ('42', 'message-success', 'Sie wurden erfolgreich eingeloggt.', '0', '2011-09-12 00:23:49', '55207', '/cms/login.php', '', '127.0.0.1'), ('43', 'logout', 'Session: af20806d4aab62e8941b875577b79866', '1', '2011-09-12 00:23:53', '55207', '/cms/index.php?action=logout', '', '127.0.0.1'), ('44', 'message-success', 'Sie wurden erfolgreich ausgeloggt.', '0', '2011-09-12 00:23:53', '55207', '/cms/index.php?action=logout', '', '127.0.0.1'), ('45', 'login', 'Session: af20806d4aab62e8941b875577b79866', '1', '2011-09-12 00:24:46', '55208', '/cms/login.php', '', '127.0.0.1'), ('46', 'message-success', 'Sie wurden erfolgreich eingeloggt.', '0', '2011-09-12 00:24:46', '55208', '/cms/login.php', '', '127.0.0.1'), ('47', 'logout', 'Session: af20806d4aab62e8941b875577b79866', '1', '2011-09-12 00:24:50', '55208', '/cms/index.php?action=logout', '', '127.0.0.1'), ('48', 'message-success', 'Sie wurden erfolgreich ausgeloggt.', '0', '2011-09-12 00:24:50', '55208', '/cms/index.php?action=logout', '', '127.0.0.1'), ('49', 'login', 'Session: af20806d4aab62e8941b875577b79866', '1', '2011-09-12 00:26:53', '55218', '/cms/login.php', '', '127.0.0.1'), ('50', 'message-success', 'Sie wurden erfolgreich eingeloggt.', '0', '2011-09-12 00:26:53', '55218', '/cms/login.php', '', '127.0.0.1'), ('51', 'logout', 'Session: af20806d4aab62e8941b875577b79866', '1', '2011-09-12 00:26:57', '55218', '/cms/index.php?action=logout', '', '127.0.0.1'), ('52', 'message-success', 'Sie wurden erfolgreich ausgeloggt.', '0', '2011-09-12 00:26:57', '55218', '/cms/index.php?action=logout', '', '127.0.0.1'), ('53', 'message-error', 'Bitte geben Sie ein Passwort ein.', '0', '2011-09-12 00:26:59', '55218', '/cms/login.php', '', '127.0.0.1'), ('54', 'message-error', 'Bitte geben Sie ein Passwort ein.', '0', '2011-09-12 00:27:16', '55219', '/cms/login.php', '', '127.0.0.1'), ('55', 'login', 'Session: af20806d4aab62e8941b875577b79866', '1', '2011-09-12 00:27:23', '55220', '/cms/login.php', '', '127.0.0.1'), ('56', 'message-success', 'Sie wurden erfolgreich eingeloggt.', '0', '2011-09-12 00:27:23', '55220', '/cms/login.php', '', '127.0.0.1'), ('57', 'logout', 'Session: af20806d4aab62e8941b875577b79866', '1', '2011-09-12 00:27:27', '55220', '/cms/index.php?action=logout', '', '127.0.0.1'), ('58', 'message-success', 'Sie wurden erfolgreich ausgeloggt.', '0', '2011-09-12 00:27:27', '55220', '/cms/index.php?action=logout', '', '127.0.0.1'), ('59', 'login', 'Session: af20806d4aab62e8941b875577b79866', '1', '2011-09-12 00:28:13', '55222', '/cms/login.php', '', '127.0.0.1'), ('60', 'message-success', 'Sie wurden erfolgreich eingeloggt.', '0', '2011-09-12 00:28:13', '55222', '/cms/login.php', '', '127.0.0.1'), ('61', 'logout', 'Session: af20806d4aab62e8941b875577b79866', '1', '2011-09-12 00:28:16', '55222', '/cms/index.php?action=logout', '', '127.0.0.1'), ('62', 'message-success', 'Sie wurden erfolgreich ausgeloggt.', '0', '2011-09-12 00:28:16', '55222', '/cms/index.php?action=logout', '', '127.0.0.1'), ('63', 'message-error', 'Es konnte kein Log angelegt werden. Bitte benachrichtigen Sie den Systemadministrator', '0', '2011-09-12 00:28:16', '55222', '/cms/index.php?action=logout', '', '127.0.0.1'), ('64', 'login', 'Session: af20806d4aab62e8941b875577b79866', '1', '2011-09-12 00:28:38', '55223', '/cms/login.php', '', '127.0.0.1'), ('65', 'logout', 'Session: af20806d4aab62e8941b875577b79866', '1', '2011-09-12 00:28:41', '55223', '/cms/index.php?action=logout', '', '127.0.0.1'), ('66', 'login', 'Session: af20806d4aab62e8941b875577b79866', '1', '2011-09-12 00:29:18', '55225', '/cms/login.php', '', '127.0.0.1'), ('67', 'logout', 'Session: af20806d4aab62e8941b875577b79866', '1', '2011-09-12 00:29:22', '55225', '/cms/index.php?action=logout', '', '127.0.0.1'), ('68', 'login', 'Session: af20806d4aab62e8941b875577b79866', '1', '2011-09-12 00:36:07', '55255', '/cms/login.php', '', '127.0.0.1'), ('69', 'logout', 'Session: af20806d4aab62e8941b875577b79866', '1', '2011-09-12 00:36:10', '55255', '/cms/index.php?action=logout', '', '127.0.0.1'), ('70', 'login', 'Session: af20806d4aab62e8941b875577b79866', '1', '2011-09-12 00:37:12', '55257', '/cms/login.php', '', '127.0.0.1'), ('71', 'logout', 'Session: af20806d4aab62e8941b875577b79866', '1', '2011-09-12 00:37:15', '55257', '/cms/index.php?action=logout', '', '127.0.0.1'), ('72', 'login', 'Session: af20806d4aab62e8941b875577b79866', '1', '2011-09-12 00:38:36', '55261', '/cms/login.php', '', '127.0.0.1'), ('73', 'logout', 'Session: af20806d4aab62e8941b875577b79866', '1', '2011-09-12 00:38:40', '55261', '/cms/index.php?action=logout', '', '127.0.0.1'), ('74', 'login', 'Session: af20806d4aab62e8941b875577b79866', '1', '2011-09-12 00:39:59', '55267', '/cms/login.php', '', '127.0.0.1'), ('75', 'logout', 'Session: af20806d4aab62e8941b875577b79866', '1', '2011-09-12 00:40:03', '55267', '/cms/index.php?action=logout', '', '127.0.0.1'), ('76', 'login', 'Session: af20806d4aab62e8941b875577b79866', '1', '2011-09-12 00:40:26', '55268', '/cms/login.php', '', '127.0.0.1'), ('77', 'logout', 'Session: af20806d4aab62e8941b875577b79866', '1', '2011-09-12 00:40:30', '55268', '/cms/index.php?action=logout', '', '127.0.0.1'), ('78', 'login', 'Session: af20806d4aab62e8941b875577b79866', '1', '2011-09-12 00:43:57', '55276', '/cms/login.php', '', '127.0.0.1'), ('79', 'logout', 'Session: af20806d4aab62e8941b875577b79866', '1', '2011-09-12 00:44:02', '55276', '/cms/index.php?action=logout', '', '127.0.0.1'), ('80', 'login', 'Session: af20806d4aab62e8941b875577b79866', '1', '2011-09-12 00:44:37', '55277', '/cms/login.php', '', '127.0.0.1'), ('81', 'logout', 'Session: af20806d4aab62e8941b875577b79866', '1', '2011-09-12 00:44:41', '55277', '/cms/index.php?action=logout', '', '127.0.0.1'), ('82', 'login', 'Session: af20806d4aab62e8941b875577b79866', '1', '2011-09-12 00:46:04', '55308', '/cms/login.php', '', '127.0.0.1'), ('83', 'message-success', 'Sie wurden erfolgreich eingeloggt.', '0', '2011-09-12 00:46:04', '55308', '/cms/login.php', '', '127.0.0.1'), ('84', 'logout', 'Session: af20806d4aab62e8941b875577b79866', '1', '2011-09-12 00:46:09', '55308', '/cms/index.php?action=logout', '', '127.0.0.1'), ('85', 'message-success', 'Sie wurden erfolgreich ausgeloggt.', '0', '2011-09-12 00:46:09', '55308', '/cms/index.php?action=logout', '', '127.0.0.1'), ('86', 'message-error', 'Um diese Seite betrachten zu kÃ¶nnen mÃ¼ssen Sie eingeloggt sein.', '0', '2011-09-12 00:46:15', '55309', '/cms/index.php?p=2', '', '127.0.0.1'), ('87', 'message-error', 'Bitte geben Sie ein Passwort ein.', '0', '2011-09-12 00:52:53', '55369', '/cms/login.php', '', '127.0.0.1'), ('88', 'message-error', 'Bitte geben Sie ein Passwort ein.', '0', '2011-09-12 00:53:23', '55372', '/cms/login.php', '', '127.0.0.1'), ('89', 'message-error', 'Bitte geben Sie ein Passwort ein.', '0', '2011-09-12 00:57:09', '55384', '/cms/login.php', '', '127.0.0.1'), ('90', 'message-error', 'Bitte geben Sie ein Passwort ein.', '0', '2011-09-12 00:57:13', '55384', '/cms/login.php', '', '127.0.0.1'), ('91', 'message-error', 'Bitte geben Sie ein Passwort ein.', '0', '2011-09-12 00:57:28', '55385', '/cms/login.php', '', '127.0.0.1'), ('92', 'login', 'Session: af20806d4aab62e8941b875577b79866', '1', '2011-09-12 00:57:33', '55386', '/cms/login.php', '', '127.0.0.1'), ('93', 'message-success', 'Sie wurden erfolgreich eingeloggt.', '0', '2011-09-12 00:57:33', '55386', '/cms/login.php', '', '127.0.0.1'), ('94', 'logout', 'Session: af20806d4aab62e8941b875577b79866', '1', '2011-09-12 01:00:47', '55402', '/cms/index.php?action=logout', '', '127.0.0.1'), ('95', 'message-success', 'Sie wurden erfolgreich ausgeloggt.', '0', '2011-09-12 01:00:47', '55402', '/cms/index.php?action=logout', '', '127.0.0.1'), ('96', 'login', 'Session: af20806d4aab62e8941b875577b79866', '1', '2011-09-12 01:00:49', '55402', '/cms/login.php', '', '127.0.0.1'), ('97', 'message-success', 'Sie wurden erfolgreich eingeloggt.', '0', '2011-09-12 01:00:49', '55402', '/cms/login.php', '', '127.0.0.1'), ('98', 'logout', 'Session: af20806d4aab62e8941b875577b79866', '1', '2011-09-12 01:00:53', '55402', '/cms/index.php?action=logout', '', '127.0.0.1'), ('99', 'message-success', 'Sie wurden erfolgreich ausgeloggt.', '0', '2011-09-12 01:00:53', '55402', '/cms/index.php?action=logout', '', '127.0.0.1'), ('100', 'login', 'Session: af20806d4aab62e8941b875577b79866', '1', '2011-09-12 01:02:17', '55414', '/cms/login.php', '', '127.0.0.1'), ('101', 'message-success', 'Sie wurden erfolgreich eingeloggt.', '0', '2011-09-12 01:02:17', '55414', '/cms/login.php', '', '127.0.0.1'), ('102', 'logout', 'Session: af20806d4aab62e8941b875577b79866', '1', '2011-09-12 01:02:20', '55414', '/cms/index.php?action=logout', '', '127.0.0.1'), ('103', 'message-success', 'Sie wurden erfolgreich ausgeloggt.', '0', '2011-09-12 01:02:20', '55414', '/cms/index.php?action=logout', '', '127.0.0.1'), ('104', 'login', 'Session: af20806d4aab62e8941b875577b79866', '1', '2011-09-12 01:02:56', '55420', '/cms/login.php', '', '127.0.0.1'), ('105', 'message-success', 'Sie wurden erfolgreich eingeloggt.', '0', '2011-09-12 01:02:56', '55420', '/cms/login.php', '', '127.0.0.1'), ('106', 'logout', 'Session: af20806d4aab62e8941b875577b79866', '1', '2011-09-12 01:03:02', '55420', '/cms/index.php?action=logout', '', '127.0.0.1'), ('107', 'message-success', 'Sie wurden erfolgreich ausgeloggt.', '0', '2011-09-12 01:03:02', '55420', '/cms/index.php?action=logout', '', '127.0.0.1'), ('108', 'message-error', 'Um diese Seite betrachten zu kÃ¶nnen mÃ¼ssen Sie eingeloggt sein.', '0', '2011-09-12 01:03:08', '55420', '/cms/index.php?p=2', '', '127.0.0.1'), ('109', 'login', 'Session: af20806d4aab62e8941b875577b79866', '1', '2011-09-12 01:03:11', '55420', '/cms/login.php', '', '127.0.0.1'), ('110', 'message-success', 'Sie wurden erfolgreich eingeloggt.', '0', '2011-09-12 01:03:11', '55420', '/cms/login.php', '', '127.0.0.1'), ('111', 'logout', 'Session: af20806d4aab62e8941b875577b79866', '1', '2011-09-12 01:03:17', '55420', '/cms/index.php?action=logout', '', '127.0.0.1'), ('112', 'message-success', 'Sie wurden erfolgreich ausgeloggt.', '0', '2011-09-12 01:03:17', '55420', '/cms/index.php?action=logout', '', '127.0.0.1'), ('113', 'login', 'Session: af20806d4aab62e8941b875577b79866', '1', '2011-09-12 01:03:49', '55421', '/cms/login.php', '', '127.0.0.1'), ('114', 'message-success', 'Sie wurden erfolgreich eingeloggt.', '0', '2011-09-12 01:03:49', '55421', '/cms/login.php', '', '127.0.0.1'), ('115', 'logout', 'Session: af20806d4aab62e8941b875577b79866', '1', '2011-09-12 01:03:59', '55421', '/cms/index.php?action=logout&p=2', '', '127.0.0.1'), ('116', 'message-success', 'Sie wurden erfolgreich ausgeloggt.', '0', '2011-09-12 01:03:59', '55421', '/cms/index.php?action=logout&p=2', '', '127.0.0.1'), ('117', 'message-error', 'Um diese Seite betrachten zu kÃ¶nnen mÃ¼ssen Sie eingeloggt sein.', '0', '2011-09-12 01:03:59', '55421', '/cms/index.php?action=logout&p=2', '', '127.0.0.1'), ('118', 'message-error', 'Um diese Seite betrachten zu kÃ¶nnen mÃ¼ssen Sie eingeloggt sein.', '0', '2011-09-12 01:04:01', '55421', '/cms/index.php?p=2', '', '127.0.0.1'), ('119', 'message-error', 'Um diese Seite betrachten zu kÃ¶nnen mÃ¼ssen Sie eingeloggt sein.', '0', '2011-09-12 19:07:37', '56375', '/cms/index.php?p=2', '', '127.0.0.1'), ('120', 'login', 'Session: af20806d4aab62e8941b875577b79866', '1', '2011-09-12 22:01:13', '58434', '/cms/login.php', '', '127.0.0.1'), ('121', 'message-success', 'Sie wurden erfolgreich eingeloggt.', '0', '2011-09-12 22:01:13', '58434', '/cms/login.php', '', '127.0.0.1'), ('122', 'message-error', 'Fehler beim Laden des Plugins (news)', '0', '2011-09-12 22:35:18', '58664', '/cms/index.php?p=1', '', '127.0.0.1'), ('123', 'logout', 'Session: af20806d4aab62e8941b875577b79866', '1', '2011-09-12 22:35:18', '58664', '/cms/index.php?p=1', '', '127.0.0.1'), ('124', 'message-error', 'Fehler beim Laden des Plugins (news, \'/include/plugin.news.inc.php\')', '0', '2011-09-12 22:46:07', '58739', '/cms/index.php?p=1', '', '127.0.0.1'), ('125', 'message-error', 'Fehler beim Laden des Plugins (news, \'/include/plugin.news.inc.php\')', '0', '2011-09-12 22:52:30', '58761', '/cms/index.php?p=1', '', '127.0.0.1'), ('126', 'message-error', 'Fehler beim Laden des Plugins (news, \'/include/plugin.news.inc.php\')', '0', '2011-09-12 22:53:53', '58773', '/cms/index.php?p=1', '', '127.0.0.1'), ('127', 'message-error', 'Fehler beim Laden des Plugins (news, \'/include/plugin.news.inc.php\')', '0', '2011-09-12 22:54:16', '58780', '/cms/index.php?p=1', '', '127.0.0.1'), ('128', 'message-error', 'Fehler beim Laden des Plugins (news, \'/include/plugin.news.inc.php\')', '0', '2011-09-12 22:55:26', '58785', '/cms/index.php?p=1', '', '127.0.0.1'), ('129', 'message-error', 'Fehler beim Laden des Plugins (news, \'/include/plugin.news.inc.php\')', '0', '2011-09-12 22:56:39', '58786', '/cms/index.php?p=1', '', '127.0.0.1'), ('130', 'message-error', 'Fehler beim Laden des Plugins (news, \'/include/plugin.news.inc.php\')', '0', '2011-09-12 22:56:43', '58786', '/cms/index.php?p=1', '', '127.0.0.1'), ('131', 'message-error', 'Fehler beim Laden des Plugins (news, \'/include/plugin.news.inc.php\')', '0', '2011-09-12 22:56:52', '58787', '/cms/index.php?p=1', '', '127.0.0.1'), ('132', 'message-error', 'Um diese Seite betrachten zu kÃ¶nnen mÃ¼ssen Sie eingeloggt sein.', '0', '2011-09-12 23:32:43', '58965', '/cms/index.php?p=2', '', '127.0.0.1'), ('133', 'message-error', 'Um diese Seite betrachten zu kÃ¶nnen mÃ¼ssen Sie eingeloggt sein.', '0', '2011-09-12 23:32:48', '58965', '/cms/index.php?p=2', '', '127.0.0.1'), ('134', 'message-error', 'Um diese Seite betrachten zu kÃ¶nnen mÃ¼ssen Sie eingeloggt sein.', '0', '2011-09-27 16:26:59', '49466', '/cms/?p=2', '', '::1'), ('135', 'login', 'Session: 420359b6a6c304f1f1fe35f6d7a613e9', '1', '2011-10-04 13:36:26', '50301', '/cms/login.php', '', '::1'), ('136', 'message-success', 'Sie wurden erfolgreich eingeloggt.', '0', '2011-10-04 13:36:26', '50301', '/cms/login.php', '', '::1'), ('137', 'login', 'Session: 84a9a8948191f94ef560e21005f3e118', '1', '2011-10-04 15:00:06', '51910', '/cms/login.php', '', '::1'), ('138', 'message-success', 'Sie wurden erfolgreich eingeloggt.', '0', '2011-10-04 15:00:06', '51910', '/cms/login.php', '', '::1'), ('139', 'login', 'Session: 279d9ae08d253671b2bd116337513ffa', '1', '2011-10-04 16:13:14', '49905', '/cms/login.php', '', '::1'), ('140', 'message-success', 'Sie wurden erfolgreich eingeloggt.', '0', '2011-10-04 16:13:14', '49905', '/cms/login.php', '', '::1'), ('141', 'login', 'Session: da32ca1429c71610666433f29a12b971', '1', '2011-10-04 22:22:57', '55997', '/cms/admin/login.php', '', '::1'), ('142', 'message-success', 'Sie wurden erfolgreich eingeloggt.', '0', '2011-10-04 22:22:57', '55997', '/cms/admin/login.php', '', '::1'), ('143', 'message-error', 'MenÃ¼ nicht verfÃ¼gbar.', '0', '2011-10-04 22:28:17', '56096', '/cms/admin/index.php', '', '::1'), ('144', 'logout', 'Session: da32ca1429c71610666433f29a12b971', '1', '2011-10-04 22:40:25', '56318', '/cms/?action=logout&p=', '', '::1'), ('145', 'message-success', 'Sie wurden erfolgreich ausgeloggt.', '0', '2011-10-04 22:40:25', '56318', '/cms/?action=logout&p=', '', '::1'), ('146', 'login', 'Session: da32ca1429c71610666433f29a12b971', '1', '2011-10-04 22:43:25', '56342', '/cms/login.php', '', '::1'), ('147', 'message-success', 'Sie wurden erfolgreich eingeloggt.', '0', '2011-10-04 22:43:25', '56342', '/cms/login.php', '', '::1'), ('148', 'message-error', 'MenÃ¼ nicht verfÃ¼gbar.', '0', '2011-10-04 22:52:25', '56434', '/cms/admin/', '', '::1'), ('149', 'message-error', 'MenÃ¼ nicht verfÃ¼gbar.', '0', '2011-10-04 22:53:29', '56440', '/cms/admin/', '', '::1'), ('150', 'message-error', 'MenÃ¼ nicht verfÃ¼gbar.', '0', '2011-10-04 22:53:57', '56441', '/cms/admin/', '', '::1'), ('151', 'message-error', 'MenÃ¼ nicht verfÃ¼gbar.', '0', '2011-10-04 22:55:01', '56454', '/cms/admin/', '', '::1'), ('152', 'message-error', 'MenÃ¼ nicht verfÃ¼gbar.', '0', '2011-10-04 22:55:02', '56454', '/cms/admin/', '', '::1'), ('153', 'message-error', 'MenÃ¼ nicht verfÃ¼gbar.', '0', '2011-10-04 22:55:28', '56457', '/cms/admin/', '', '::1'), ('154', 'message-error', 'MenÃ¼ nicht verfÃ¼gbar.', '0', '2011-10-04 22:55:28', '56457', '/cms/admin/', '', '::1'), ('155', 'logout', 'Session: da32ca1429c71610666433f29a12b971', '1', '2011-10-04 22:55:40', '56458', '/cms/index.php?action=logout&p=', '', '::1'), ('156', 'message-success', 'Sie wurden erfolgreich ausgeloggt.', '0', '2011-10-04 22:55:40', '56458', '/cms/index.php?action=logout&p=', '', '::1'), ('157', 'login', 'Session: da32ca1429c71610666433f29a12b971', '1', '2011-10-04 22:56:29', '56465', '/cms/login.php', '', '::1'), ('158', 'message-success', 'Sie wurden erfolgreich eingeloggt.', '0', '2011-10-04 22:56:29', '56465', '/cms/login.php', '', '::1'), ('159', 'logout', 'Session: da32ca1429c71610666433f29a12b971', '1', '2011-10-04 22:56:44', '56466', '/cms/index.php?action=logout&p=2', '', '::1'), ('160', 'message-success', 'Sie wurden erfolgreich ausgeloggt.', '0', '2011-10-04 22:56:44', '56466', '/cms/index.php?action=logout&p=2', '', '::1'), ('161', 'message-error', 'Um diese Seite betrachten zu kÃ¶nnen mÃ¼ssen Sie eingeloggt sein.', '0', '2011-10-04 22:56:44', '56466', '/cms/index.php?action=logout&p=2', '', '::1'), ('162', 'message-error', 'Um diese Seite betrachten zu kÃ¶nnen mÃ¼ssen Sie eingeloggt sein.', '0', '2011-10-04 22:56:46', '56466', '/cms/index.php?p=2', '', '::1'), ('163', 'login', 'Session: da32ca1429c71610666433f29a12b971', '1', '2011-10-04 22:56:51', '56466', '/cms/login.php', '', '::1'), ('164', 'message-success', 'Sie wurden erfolgreich eingeloggt.', '0', '2011-10-04 22:56:51', '56466', '/cms/login.php', '', '::1'), ('165', 'message-error', 'MenÃ¼ nicht verfÃ¼gbar.', '0', '2011-10-04 22:56:58', '56467', '/cms/admin/', '', '::1'), ('166', 'message-error', 'MenÃ¼ nicht verfÃ¼gbar.', '0', '2011-10-04 22:56:58', '56467', '/cms/admin/', '', '::1'), ('167', 'logout', 'Session: da32ca1429c71610666433f29a12b971', '1', '2011-10-05 11:43:51', '61156', '/cms/index.php?p=1', '', '::1'), ('168', 'login', 'Session: da32ca1429c71610666433f29a12b971', '1', '2011-10-05 11:44:05', '61157', '/cms/login.php', '', '::1'), ('169', 'message-success', 'Sie wurden erfolgreich eingeloggt.', '0', '2011-10-05 11:44:05', '61157', '/cms/login.php', '', '::1'), ('170', 'message-error', 'MenÃ¼ nicht verfÃ¼gbar.', '0', '2011-10-05 11:44:09', '61157', '/cms/admin/', '', '::1'), ('171', 'message-error', 'MenÃ¼ nicht verfÃ¼gbar.', '0', '2011-10-05 11:44:09', '61157', '/cms/admin/', '', '::1'), ('172', 'message-error', 'MenÃ¼ nicht verfÃ¼gbar.', '0', '2011-10-05 11:49:28', '61202', '/cms/admin/', '', '::1'), ('173', 'message-error', 'MenÃ¼ nicht verfÃ¼gbar.', '0', '2011-10-05 11:51:00', '61213', '/cms/admin/', '', '::1'), ('174', 'message-error', 'MenÃ¼ nicht verfÃ¼gbar.', '0', '2011-10-05 11:51:36', '61217', '/cms/admin/', '', '::1'), ('175', 'message-error', 'MenÃ¼ nicht verfÃ¼gbar.', '0', '2011-10-05 11:51:57', '61218', '/cms/admin/', '', '::1'), ('176', 'message-error', 'MenÃ¼ nicht verfÃ¼gbar.', '0', '2011-10-05 11:51:57', '61218', '/cms/admin/', '', '::1'), ('177', 'message-error', 'MenÃ¼ nicht verfÃ¼gbar.', '0', '2011-10-05 11:52:13', '61219', '/cms/admin/', '', '::1'), ('178', 'message-error', 'MenÃ¼ nicht verfÃ¼gbar.', '0', '2011-10-05 11:57:53', '61280', '/cms/admin/', '', '::1'), ('179', 'logout', 'Session: da32ca1429c71610666433f29a12b971', '1', '2011-10-05 14:13:59', '62568', '/cms/admin/', '', '::1'), ('180', 'login', 'Session: da32ca1429c71610666433f29a12b971', '1', '2011-10-05 14:14:05', '62568', '/cms/admin/login.php', '', '::1'), ('181', 'message-success', 'Sie wurden erfolgreich eingeloggt.', '0', '2011-10-05 14:14:05', '62568', '/cms/admin/login.php', '', '::1'), ('182', 'message-error', 'Die Datei /include/pages.php konnte nicht gefunden werden', '0', '2011-10-05 14:19:13', '62638', '/cms/admin/index.php?action=pages', '', '::1'), ('183', 'message-error', 'Die Datei /include/pages.php konnte nicht gefunden werden', '0', '2011-10-05 14:22:39', '62663', '/cms/admin/index.php?action=pages', '', '::1'), ('184', 'logout', 'Session: da32ca1429c71610666433f29a12b971', '1', '2011-10-05 15:27:57', '63353', '/cms/admin/index.php?action=pages', '', '::1'), ('185', 'login', 'Session: da32ca1429c71610666433f29a12b971', '1', '2011-10-05 15:28:03', '63353', '/cms/admin/login.php', '', '::1'), ('186', 'message-success', 'Sie wurden erfolgreich eingeloggt.', '0', '2011-10-05 15:28:03', '63353', '/cms/admin/login.php', '', '::1'), ('187', 'message-error', 'MenÃ¼ nicht verfÃ¼gbar.', '0', '2011-10-05 16:16:23', '64638', '/cms/admin/index.php?action=pages', '', '::1'), ('188', 'logout', 'Session: da32ca1429c71610666433f29a12b971', '1', '2011-10-05 16:49:57', '65013', '/cms/admin/login.php?action=logout', '', '::1'), ('189', 'message-success', 'Sie wurden erfolgreich ausgeloggt.', '0', '2011-10-05 16:49:57', '65013', '/cms/admin/login.php?action=logout', '', '::1'), ('190', 'login', 'Session: da32ca1429c71610666433f29a12b971', '1', '2011-10-05 16:50:03', '65013', '/cms/admin/login.php', '', '::1'), ('191', 'message-success', 'Sie wurden erfolgreich eingeloggt.', '0', '2011-10-05 16:50:03', '65013', '/cms/admin/login.php', '', '::1'), ('192', 'message-error', 'Die Datei include/dashboard.php konnte nicht gefunden werden', '0', '2011-10-05 16:52:50', '65031', '/cms/admin/index.php', '', '::1'), ('193', 'login', 'Session: 2f1e84631225d64c55c1439510974bae', '1', '2011-10-05 19:39:47', '50922', '/cms/admin/login.php', '', '::1'), ('194', 'message-success', 'Sie wurden erfolgreich eingeloggt.', '0', '2011-10-05 19:39:47', '50922', '/cms/admin/login.php', '', '::1'), ('195', 'logout', 'Session: 2f1e84631225d64c55c1439510974bae', '1', '2011-10-05 20:33:10', '51292', '/cms/admin/index.php?action=pages&new=1', '', '::1'), ('196', 'login', 'Session: 2f1e84631225d64c55c1439510974bae', '1', '2011-10-05 20:33:13', '51292', '/cms/admin/login.php', '', '::1'), ('197', 'message-success', 'Sie wurden erfolgreich eingeloggt.', '0', '2011-10-05 20:33:13', '51292', '/cms/admin/login.php', '', '::1'), ('198', 'login', 'Session: 0270e5ebc89eb95cb374d5142a4382df', '1', '2011-10-05 21:37:20', '52187', '/cms/admin/login.php', '', '::1'), ('199', 'message-success', 'Sie wurden erfolgreich eingeloggt.', '0', '2011-10-05 21:37:20', '52187', '/cms/admin/login.php', '', '::1'), ('200', 'login', 'Session: c963b72d04d05c1d48328639ba722416', '1', '2011-10-05 21:39:16', '52270', '/cms/admin/login.php', '', '::1'), ('201', 'message-success', 'Sie wurden erfolgreich eingeloggt.', '0', '2011-10-05 21:39:16', '52270', '/cms/admin/login.php', '', '::1'), ('202', 'logout', 'Session: c963b72d04d05c1d48328639ba722416', '1', '2011-10-05 22:27:58', '52691', '/cms/admin/index.php?action=pages&new=1', '', '::1'), ('203', 'login', 'Session: c963b72d04d05c1d48328639ba722416', '1', '2011-10-05 22:28:00', '52691', '/cms/admin/login.php', '', '::1'), ('204', 'message-success', 'Sie wurden erfolgreich eingeloggt.', '0', '2011-10-05 22:28:00', '52691', '/cms/admin/login.php', '', '::1'), ('205', 'message-success', 'Die Seite wurde erfolgreich gespeichert', '0', '2011-10-05 22:36:58', '52796', '/cms/admin/index.php?action=pages&new=1', '', '::1'), ('206', 'message-success', 'Die Seite wurde erfolgreich gespeichert', '0', '2011-10-05 22:38:21', '52800', '/cms/admin/index.php?action=pages&new=1', '', '::1'), ('207', 'message-success', 'Die Seite wurde erfolgreich gespeichert', '0', '2011-10-05 22:41:59', '52825', '/cms/admin/index.php?action=pages&new=1', '', '::1'), ('208', 'message-success', 'Die Seite wurde erfolgreich gespeichert', '0', '2011-10-05 22:42:25', '52827', '/cms/admin/index.php?action=pages&new=1', '', '::1'), ('209', 'message-error', 'Bitte geben sie einen Titel und Inhalt an', '0', '2011-10-05 22:42:29', '52827', '/cms/admin/index.php?action=pages&new=1', '', '::1'), ('210', 'message-success', 'Die Seite wurde erfolgreich gespeichert', '0', '2011-10-05 22:42:55', '52829', '/cms/admin/index.php?action=pages&new=1', '', '::1'), ('211', 'message-error', 'Bitte geben sie einen Titel und Inhalt an', '0', '2011-10-05 22:43:25', '52832', '/cms/admin/index.php?action=pages&new=1', '', '::1'), ('212', 'message-error', 'Die Seite konnte nicht gespeichert werden', '0', '2011-10-05 22:50:39', '52887', '/cms/admin/index.php?action=pages&new=1', '', '::1'), ('213', 'message-error', 'Die Seite konnte nicht gespeichert werden', '0', '2011-10-05 22:52:22', '52898', '/cms/admin/index.php?action=pages&new=1', '', '::1'), ('214', 'message-success', 'Die Seite wurde erfolgreich gespeichert', '0', '2011-10-05 22:52:52', '52900', '/cms/admin/index.php?action=pages&new=1', '', '::1'), ('215', 'message-success', 'Die Seite wurde erfolgreich gespeichert', '0', '2011-10-05 22:54:47', '52912', '/cms/admin/index.php?action=pages&new=1', '', '::1'), ('216', 'message-error', 'Die Seite konnte nicht gespeichert werden', '0', '2011-10-05 23:08:15', '53035', '/cms/admin/index.php?action=pages&new=1', '', '::1'), ('217', 'message-success', 'Die Seite wurde erfolgreich gespeichert', '0', '2011-10-05 23:10:01', '53052', '/cms/admin/index.php?action=pages&new=1', '', '::1'), ('218', 'message-success', 'Die Seite wurde erfolgreich gespeichert', '0', '2011-10-05 23:15:37', '53096', '/cms/admin/index.php?action=pages&new=1', '', '::1'), ('219', 'logout', 'Session: c963b72d04d05c1d48328639ba722416', '1', '2011-10-06 10:27:20', '54727', '/cms/admin/index.php?action=pages&edit=3', '', '::1'), ('220', 'login', 'Session: c963b72d04d05c1d48328639ba722416', '1', '2011-10-06 10:27:23', '54727', '/cms/admin/login.php', '', '::1'), ('221', 'message-success', 'Sie wurden erfolgreich eingeloggt.', '0', '2011-10-06 10:27:23', '54727', '/cms/admin/login.php', '', '::1'), ('222', 'message-success', 'Die Seite wurde erfolgreich gespeichert', '0', '2011-10-06 10:43:08', '54896', '/cms/admin/index.php?action=pages&new=1', '', '::1'), ('223', 'message-error', 'Die Seite konnte nicht gespeichert werden', '0', '2011-10-06 10:43:57', '54905', '/cms/admin/index.php?action=pages&edit=6', '', '::1'), ('224', 'message-success', 'Die Seite wurde erfolgreich gespeichert', '0', '2011-10-06 10:44:19', '54907', '/cms/admin/index.php?action=pages&edit=6', '', '::1'), ('225', 'login', 'Session: d26c7ace3c5573367c8e12feea25b6cd', '1', '2011-10-06 11:07:17', '55102', '/cms/login.php', '', '::1'), ('226', 'message-success', 'Sie wurden erfolgreich eingeloggt.', '0', '2011-10-06 11:07:17', '55102', '/cms/login.php', '', '::1'), ('227', 'message-success', 'Die Seite wurde erfolgreich gespeichert', '0', '2011-10-06 11:12:05', '55166', '/cms/admin/index.php?action=pages&edit=3', '', '::1'), ('228', 'logout', 'Session: c963b72d04d05c1d48328639ba722416', '1', '2011-10-06 14:12:51', '57163', '/cms/admin/index.php?action=pages', '', '::1'), ('229', 'login', 'Session: c963b72d04d05c1d48328639ba722416', '1', '2011-10-06 14:12:57', '57163', '/cms/admin/login.php', '', '::1'), ('230', 'message-success', 'Sie wurden erfolgreich eingeloggt.', '0', '2011-10-06 14:12:57', '57163', '/cms/admin/login.php', '', '::1'), ('231', 'message-error', 'Die Datei include/users.php konnte nicht gefunden werden', '0', '2011-10-06 14:40:00', '57709', '/cms/admin/index.php?action=users', '', '::1'), ('232', 'message-error', 'MenÃ¼ nicht verfÃ¼gbar.', '0', '2011-10-06 14:40:00', '57709', '/cms/admin/index.php?action=users', '', '::1'), ('233', 'message-error', 'Die Datei include/users.php konnte nicht gefunden werden', '0', '2011-10-06 14:41:30', '57721', '/cms/admin/index.php?action=users', '', '::1'), ('234', 'login', 'Session: 94c9536fa827ffe1593c31f5ab40b7af', '1', '2011-10-06 20:23:10', '59635', '/cms/admin/login.php', '', '::1'), ('235', 'message-success', 'Sie wurden erfolgreich eingeloggt.', '0', '2011-10-06 20:23:10', '59635', '/cms/admin/login.php', '', '::1'), ('236', 'logout', 'Session: 94c9536fa827ffe1593c31f5ab40b7af', '1', '2011-10-06 20:29:11', '59714', '/cms/admin/login.php?action=logout', '', '::1'), ('237', 'message-success', 'Sie wurden erfolgreich ausgeloggt.', '0', '2011-10-06 20:29:11', '59714', '/cms/admin/login.php?action=logout', '', '::1');
COMMIT;

-- ----------------------------
--  Table structure for `menu_items`
-- ----------------------------
DROP TABLE IF EXISTS `menu_items`;
CREATE TABLE `menu_items` (
  `menu_item_id` int(11) NOT NULL AUTO_INCREMENT,
  `menu_id` int(11) NOT NULL,
  `menu_item_right` varchar(50) DEFAULT NULL,
  `menu_item_target` int(5) NOT NULL,
  `menu_item_title` varchar(32) DEFAULT NULL,
  `menu_item_link` varchar(120) DEFAULT '0',
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
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

-- ----------------------------
--  Records of `menu_items`
-- ----------------------------
BEGIN;
INSERT INTO `menu_items` VALUES ('1', '1', null, '0', 'Home', '0', '1', '1', '1', '2011-09-11 20:50:47', null, null, '1', null, null), ('2', '1', null, '0', 'Nologin', '0', '2', '2', '1', '2011-09-11 20:51:36', null, null, '1', null, null), ('3', '2', null, '0', 'Home', '0', '1', '1', '1', '2011-09-11 22:02:36', null, null, '0', null, null), ('4', '2', null, '0', 'Forum', 'board/', '0', '2', '1', '2011-09-11 22:03:09', null, null, '0', null, null), ('5', '2', 'admin.panel', '1', 'Admin', 'admin/', '0', '3', '1', '2011-10-04 13:30:05', null, null, '1', null, null);
COMMIT;

-- ----------------------------
--  Table structure for `options`
-- ----------------------------
DROP TABLE IF EXISTS `options`;
CREATE TABLE `options` (
  `options_id` int(22) NOT NULL AUTO_INCREMENT,
  `options_name` varchar(50) NOT NULL,
  `options_value` varchar(50) NOT NULL,
  PRIMARY KEY (`options_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
--  Table structure for `pages`
-- ----------------------------
DROP TABLE IF EXISTS `pages`;
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
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

-- ----------------------------
--  Records of `pages`
-- ----------------------------
BEGIN;
INSERT INTO `pages` VALUES ('1', 'Home', 'Wilkommen auf der Hauptseite! <br>Test von br von <b>Bold</b> und <i>italic-font</i>', '0', '1', '2011-09-10 21:38:59', null, null, null, null, '1', 'news'), ('2', 'Nologin?', 'Testseite, kein zutritt für nicht eingeloggte', '1', '1', '2011-09-10 23:48:32', null, null, null, null, '1', null), ('3', 'About', '<p>Diese Seite soll einen <strong>About-Text</strong> darstellen. Hier teste <em>ich</em> einige <span style=\\\"text-decoration: underline;\\\">HTML</span>-<span style=\\\"text-decoration: line-through;\\\">Codes</span> oder eher Scripts.</p>\r\n<p style=\\\"text-align: center;\\\">Mal schauen was das so gibt.</p>\r\n<p style=\\\"text-align: right;\\\">K&ouml;nnte spannend werden...</p>\r\n<p style=\\\"text-align: justify;\\\">nein wirklich!</p>\r\n<p style=\\\"text-align: justify;\\\"><span style=\\\"font-family: impact,chicago;\\\">Oder mal einen anderen Font?</span></p>\r\n<ul>\r\n<li style=\\\"text-align: justify;\\\">Eine kleine Liste</li>\r\n<li style=\\\"text-align: justify;\\\">noch ein Punkt</li>\r\n<li style=\\\"text-align: justify;\\\">noch einer?</li>\r\n</ul>\r\n<p style=\\\"text-align: justify;\\\">alles m&ouml;glich</p>\r\n<blockquote>\r\n<p style=\\\"text-align: justify;\\\">blockquote</p>\r\n<p style=\\\"text-align: justify;\\\">viel drin und so</p>\r\n</blockquote>\r\n<p style=\\\"text-align: justify;\\\"><span style=\\\"color: #888888;\\\">Fontfarben</span></p>\r\n<table border=\\\"0\\\">\r\n<tbody>\r\n<tr>Tabellen\r\n<td>und jede menge andere Sachen</td>\r\n</tr>\r\n<tr>\r\n<td>und so</td>\r\n<td>&nbsp;und hier</td>\r\n</tr>\r\n</tbody>\r\n</table>\r\n<p style=\\\"text-align: justify;\\\">&nbsp;</p>\r\n<p style=\\\"text-align: justify;\\\">Text<sub>tief</sub> und nat&uuml;rlich auch <sup>hoch</sup></p>', '0', '1', '0000-00-00 00:00:00', '2011-10-06 11:12:05', null, '1', null, '1', null), ('4', 'Testseite2', '<p>Testen?</p>', '0', '1', '2011-10-05 22:54:47', null, null, null, null, '1', null), ('5', 'Test', '<p>Login?</p>', '1', '1', '2011-10-05 23:10:01', null, null, null, null, '1', null), ('6', 'Testseite2', '<p>ohne Kommentare? ohne Login!</p>', '0', '1', '2011-10-05 23:15:37', '2011-10-06 10:44:19', '2011-10-06 20:26:38', '1', null, '0', null), ('7', 'Test', '<p>Login? TEST</p>', '0', '1', '2011-10-06 10:43:08', null, '2011-10-06 11:07:57', null, null, '1', null);
COMMIT;

-- ----------------------------
--  Table structure for `plugin_news`
-- ----------------------------
DROP TABLE IF EXISTS `plugin_news`;
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
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

-- ----------------------------
--  Records of `plugin_news`
-- ----------------------------
BEGIN;
INSERT INTO `plugin_news` VALUES ('1', 'Testnews', 'Dies ist eine Testnews. <br> Mit ganz viel <b>Inhalt</b> und <i>testerei</i><br>Ja, hier ist schon sehr viel los, man mag es kaum glauben!', '1', '2011-09-12 23:08:19', null, null, null, null), ('2', 'Testnews2', 'Dies ist eine Testnews. <br> Mit ganz viel <b>Inhalt</b> und <i>testerei</i><br>Ja, hier ist schon sehr viel los, man mag es kaum glauben!', '1', '2011-09-12 23:08:19', null, null, null, null), ('3', 'Noch eine News', 'Testen, testen, immer nur Testen. <br> denn das ist wirklich <b>WICHTIG</b>. alter.', '1', '2011-09-27 10:52:47', null, null, null, null);
COMMIT;

-- ----------------------------
--  Table structure for `plugins`
-- ----------------------------
DROP TABLE IF EXISTS `plugins`;
CREATE TABLE `plugins` (
  `plugin_id` int(11) NOT NULL AUTO_INCREMENT,
  `plugin_name` varchar(50) NOT NULL,
  `plugin_identify` varchar(80) NOT NULL,
  `plugin_folder` varchar(50) DEFAULT '',
  `plugin_table` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`plugin_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

-- ----------------------------
--  Records of `plugins`
-- ----------------------------
BEGIN;
INSERT INTO `plugins` VALUES ('1', 'news', 'news', '', null);
COMMIT;

-- ----------------------------
--  Table structure for `user_rights`
-- ----------------------------
DROP TABLE IF EXISTS `user_rights`;
CREATE TABLE `user_rights` (
  `user_right_id` int(22) NOT NULL AUTO_INCREMENT,
  `user_level` int(11) NOT NULL,
  `user_right_name` varchar(50) NOT NULL,
  `user_right_value` int(2) NOT NULL,
  PRIMARY KEY (`user_right_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

-- ----------------------------
--  Records of `user_rights`
-- ----------------------------
BEGIN;
INSERT INTO `user_rights` VALUES ('1', '10', 'admin.panel', '1');
COMMIT;

-- ----------------------------
--  Table structure for `users`
-- ----------------------------
DROP TABLE IF EXISTS `users`;
CREATE TABLE `users` (
  `user_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_name` varchar(30) NOT NULL DEFAULT '',
  `user_pass` varchar(32) NOT NULL DEFAULT '',
  `user_firstname` varchar(32) DEFAULT NULL,
  `user_lastname` varchar(32) DEFAULT NULL,
  `user_session` varchar(32) DEFAULT NULL,
  `user_mail` varchar(150) NOT NULL DEFAULT '',
  `user_active` int(2) NOT NULL DEFAULT '0',
  `user_level` int(11) NOT NULL DEFAULT '1',
  `user_ts_delete` datetime DEFAULT NULL,
  `user_id_delete` int(11) DEFAULT NULL,
  `user_ts_create` datetime NOT NULL,
  `user_id_create` int(11) NOT NULL,
  `user_ts_update` datetime DEFAULT NULL,
  `user_id_update` int(11) DEFAULT NULL,
  PRIMARY KEY (`user_id`),
  UNIQUE KEY `NickName` (`user_name`),
  UNIQUE KEY `UserMail` (`user_mail`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

-- ----------------------------
--  Records of `users`
-- ----------------------------
BEGIN;
INSERT INTO `users` VALUES ('1', 'admin', 'b9153eb8b2f406895c95dc7f0d3b8a48', 'System', 'Admin', '94c9536fa827ffe1593c31f5ab40b7af', 'admin@yoururl.com', '1', '10', null, null, '2011-10-06 14:49:12', '1', null, null);
COMMIT;

SET FOREIGN_KEY_CHECKS = 1;

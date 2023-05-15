-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: May 15, 2023 at 08:59 AM
-- Server version: 8.0.31
-- PHP Version: 7.4.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_app-dcms`
--

-- --------------------------------------------------------

--
-- Table structure for table `auth_assignment`
--

DROP TABLE IF EXISTS `auth_assignment`;
CREATE TABLE IF NOT EXISTS `auth_assignment` (
  `item_name` varchar(64) COLLATE utf8mb3_unicode_ci NOT NULL,
  `user_id` varchar(64) COLLATE utf8mb3_unicode_ci NOT NULL,
  `created_at` int DEFAULT NULL,
  PRIMARY KEY (`item_name`,`user_id`),
  KEY `idx-auth_assignment-user_id` (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;

--
-- Dumping data for table `auth_assignment`
--

INSERT INTO `auth_assignment` (`item_name`, `user_id`, `created_at`) VALUES
('Actor', '19', 1683793747),
('Actor', '21', 1683793762),
('Actor', '22', 1683793771),
('Actor', '3', 1683767479),
('Admin', '5', 1683767503),
('QMR', '4', 1683767493),
('Super Admin', '1', 1683540071),
('User', '10', 1683793739),
('User', '11', 1683793861),
('User', '12', 1683793852),
('User', '13', 1683793856),
('User', '14', 1683793846),
('User', '15', 1683793840),
('User', '16', 1683793833),
('User', '17', 1683793828),
('User', '18', 1683793821),
('User', '2', 1683767460),
('User', '20', 1683793815),
('User', '23', 1683793810),
('User', '24', 1683793803),
('User', '25', 1683793796),
('User', '26', 1683793785),
('User', '27', 1683793779),
('User', '6', 1683793708),
('User', '7', 1683793715),
('User', '8', 1683793727),
('User', '9', 1683793733);

-- --------------------------------------------------------

--
-- Table structure for table `auth_item`
--

DROP TABLE IF EXISTS `auth_item`;
CREATE TABLE IF NOT EXISTS `auth_item` (
  `name` varchar(64) COLLATE utf8mb3_unicode_ci NOT NULL,
  `type` smallint NOT NULL,
  `description` text COLLATE utf8mb3_unicode_ci,
  `rule_name` varchar(64) COLLATE utf8mb3_unicode_ci DEFAULT NULL,
  `data` blob,
  `created_at` int DEFAULT NULL,
  `updated_at` int DEFAULT NULL,
  PRIMARY KEY (`name`),
  KEY `rule_name` (`rule_name`),
  KEY `idx-auth_item-type` (`type`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;

--
-- Dumping data for table `auth_item`
--

INSERT INTO `auth_item` (`name`, `type`, `description`, `rule_name`, `data`, `created_at`, `updated_at`) VALUES
('/*', 2, NULL, NULL, NULL, 1683540052, 1683540052),
('/admin/*', 2, NULL, NULL, NULL, 1683767079, 1683767079),
('/admin/assignment/*', 2, NULL, NULL, NULL, 1683767079, 1683767079),
('/admin/assignment/assign', 2, NULL, NULL, NULL, 1683767079, 1683767079),
('/admin/assignment/index', 2, NULL, NULL, NULL, 1683767079, 1683767079),
('/admin/assignment/revoke', 2, NULL, NULL, NULL, 1683767079, 1683767079),
('/admin/assignment/view', 2, NULL, NULL, NULL, 1683767079, 1683767079),
('/admin/default/*', 2, NULL, NULL, NULL, 1683767079, 1683767079),
('/admin/default/index', 2, NULL, NULL, NULL, 1683767079, 1683767079),
('/admin/menu/*', 2, NULL, NULL, NULL, 1683767079, 1683767079),
('/admin/menu/create', 2, NULL, NULL, NULL, 1683767079, 1683767079),
('/admin/menu/delete', 2, NULL, NULL, NULL, 1683767079, 1683767079),
('/admin/menu/index', 2, NULL, NULL, NULL, 1683767079, 1683767079),
('/admin/menu/update', 2, NULL, NULL, NULL, 1683767079, 1683767079),
('/admin/menu/view', 2, NULL, NULL, NULL, 1683767079, 1683767079),
('/admin/permission/*', 2, NULL, NULL, NULL, 1683767079, 1683767079),
('/admin/permission/assign', 2, NULL, NULL, NULL, 1683767079, 1683767079),
('/admin/permission/create', 2, NULL, NULL, NULL, 1683767079, 1683767079),
('/admin/permission/delete', 2, NULL, NULL, NULL, 1683767079, 1683767079),
('/admin/permission/get-users', 2, NULL, NULL, NULL, 1683767079, 1683767079),
('/admin/permission/index', 2, NULL, NULL, NULL, 1683767079, 1683767079),
('/admin/permission/remove', 2, NULL, NULL, NULL, 1683767079, 1683767079),
('/admin/permission/update', 2, NULL, NULL, NULL, 1683767079, 1683767079),
('/admin/permission/view', 2, NULL, NULL, NULL, 1683767079, 1683767079),
('/admin/role/*', 2, NULL, NULL, NULL, 1683767079, 1683767079),
('/admin/role/assign', 2, NULL, NULL, NULL, 1683767079, 1683767079),
('/admin/role/create', 2, NULL, NULL, NULL, 1683767079, 1683767079),
('/admin/role/delete', 2, NULL, NULL, NULL, 1683767079, 1683767079),
('/admin/role/get-users', 2, NULL, NULL, NULL, 1683767079, 1683767079),
('/admin/role/index', 2, NULL, NULL, NULL, 1683767079, 1683767079),
('/admin/role/remove', 2, NULL, NULL, NULL, 1683767079, 1683767079),
('/admin/role/update', 2, NULL, NULL, NULL, 1683767079, 1683767079),
('/admin/role/view', 2, NULL, NULL, NULL, 1683767079, 1683767079),
('/admin/route/*', 2, NULL, NULL, NULL, 1683767079, 1683767079),
('/admin/route/assign', 2, NULL, NULL, NULL, 1683767079, 1683767079),
('/admin/route/create', 2, NULL, NULL, NULL, 1683767079, 1683767079),
('/admin/route/index', 2, NULL, NULL, NULL, 1683767079, 1683767079),
('/admin/route/refresh', 2, NULL, NULL, NULL, 1683767079, 1683767079),
('/admin/route/remove', 2, NULL, NULL, NULL, 1683767079, 1683767079),
('/admin/rule/*', 2, NULL, NULL, NULL, 1683767079, 1683767079),
('/admin/rule/create', 2, NULL, NULL, NULL, 1683767079, 1683767079),
('/admin/rule/delete', 2, NULL, NULL, NULL, 1683767079, 1683767079),
('/admin/rule/index', 2, NULL, NULL, NULL, 1683767079, 1683767079),
('/admin/rule/update', 2, NULL, NULL, NULL, 1683767079, 1683767079),
('/admin/rule/view', 2, NULL, NULL, NULL, 1683767079, 1683767079),
('/admin/user/*', 2, NULL, NULL, NULL, 1683767079, 1683767079),
('/admin/user/activate', 2, NULL, NULL, NULL, 1683767079, 1683767079),
('/admin/user/change-password', 2, NULL, NULL, NULL, 1683767079, 1683767079),
('/admin/user/delete', 2, NULL, NULL, NULL, 1683767079, 1683767079),
('/admin/user/index', 2, NULL, NULL, NULL, 1683767079, 1683767079),
('/admin/user/login', 2, NULL, NULL, NULL, 1683767079, 1683767079),
('/admin/user/logout', 2, NULL, NULL, NULL, 1683767079, 1683767079),
('/admin/user/request-password-reset', 2, NULL, NULL, NULL, 1683767079, 1683767079),
('/admin/user/reset-password', 2, NULL, NULL, NULL, 1683767079, 1683767079),
('/admin/user/signup', 2, NULL, NULL, NULL, 1683767079, 1683767079),
('/admin/user/view', 2, NULL, NULL, NULL, 1683767079, 1683767079),
('/debug/*', 2, NULL, NULL, NULL, 1683767079, 1683767079),
('/debug/default/*', 2, NULL, NULL, NULL, 1683767079, 1683767079),
('/debug/default/db-explain', 2, NULL, NULL, NULL, 1683767079, 1683767079),
('/debug/default/download-mail', 2, NULL, NULL, NULL, 1683767079, 1683767079),
('/debug/default/index', 2, NULL, NULL, NULL, 1683767079, 1683767079),
('/debug/default/toolbar', 2, NULL, NULL, NULL, 1683767079, 1683767079),
('/debug/default/view', 2, NULL, NULL, NULL, 1683767079, 1683767079),
('/debug/user/*', 2, NULL, NULL, NULL, 1683767079, 1683767079),
('/debug/user/reset-identity', 2, NULL, NULL, NULL, 1683767079, 1683767079),
('/debug/user/set-identity', 2, NULL, NULL, NULL, 1683767079, 1683767079),
('/gii/*', 2, NULL, NULL, NULL, 1683767079, 1683767079),
('/gii/default/*', 2, NULL, NULL, NULL, 1683767079, 1683767079),
('/gii/default/action', 2, NULL, NULL, NULL, 1683767079, 1683767079),
('/gii/default/diff', 2, NULL, NULL, NULL, 1683767079, 1683767079),
('/gii/default/index', 2, NULL, NULL, NULL, 1683767079, 1683767079),
('/gii/default/preview', 2, NULL, NULL, NULL, 1683767079, 1683767079),
('/gii/default/view', 2, NULL, NULL, NULL, 1683767079, 1683767079),
('/gridview/*', 2, NULL, NULL, NULL, 1683767079, 1683767079),
('/gridview/export/*', 2, NULL, NULL, NULL, 1683767079, 1683767079),
('/gridview/export/download', 2, NULL, NULL, NULL, 1683767079, 1683767079),
('/gridview/grid-edited-row/*', 2, NULL, NULL, NULL, 1683767079, 1683767079),
('/gridview/grid-edited-row/back', 2, NULL, NULL, NULL, 1683767079, 1683767079),
('/operator/*', 2, NULL, NULL, NULL, 1683767079, 1683767079),
('/operator/approver/*', 2, NULL, NULL, NULL, 1683767079, 1683767079),
('/operator/approver/create', 2, NULL, NULL, NULL, 1683767079, 1683767079),
('/operator/approver/delete', 2, NULL, NULL, NULL, 1683767079, 1683767079),
('/operator/approver/index', 2, NULL, NULL, NULL, 1683767079, 1683767079),
('/operator/approver/update', 2, NULL, NULL, NULL, 1683767079, 1683767079),
('/operator/approver/view', 2, NULL, NULL, NULL, 1683767079, 1683767079),
('/operator/categories/*', 2, NULL, NULL, NULL, 1683767079, 1683767079),
('/operator/categories/create', 2, NULL, NULL, NULL, 1683767079, 1683767079),
('/operator/categories/delete', 2, NULL, NULL, NULL, 1683767079, 1683767079),
('/operator/categories/index', 2, NULL, NULL, NULL, 1683767079, 1683767079),
('/operator/categories/update', 2, NULL, NULL, NULL, 1683767079, 1683767079),
('/operator/categories/view', 2, NULL, NULL, NULL, 1683767079, 1683767079),
('/operator/default/*', 2, NULL, NULL, NULL, 1683767079, 1683767079),
('/operator/default/index', 2, NULL, NULL, NULL, 1683767079, 1683767079),
('/operator/departments/*', 2, NULL, NULL, NULL, 1683767079, 1683767079),
('/operator/departments/create', 2, NULL, NULL, NULL, 1683767079, 1683767079),
('/operator/departments/delete', 2, NULL, NULL, NULL, 1683767079, 1683767079),
('/operator/departments/index', 2, NULL, NULL, NULL, 1683767079, 1683767079),
('/operator/departments/update', 2, NULL, NULL, NULL, 1683767079, 1683767079),
('/operator/departments/view', 2, NULL, NULL, NULL, 1683767079, 1683767079),
('/operator/points/*', 2, NULL, NULL, NULL, 1683767079, 1683767079),
('/operator/points/create', 2, NULL, NULL, NULL, 1683767079, 1683767079),
('/operator/points/delete', 2, NULL, NULL, NULL, 1683767079, 1683767079),
('/operator/points/index', 2, NULL, NULL, NULL, 1683767079, 1683767079),
('/operator/points/update', 2, NULL, NULL, NULL, 1683767079, 1683767079),
('/operator/points/view', 2, NULL, NULL, NULL, 1683767079, 1683767079),
('/operator/private-requester/*', 2, NULL, NULL, NULL, 1683794041, 1683794041),
('/operator/private-requester/create', 2, NULL, NULL, NULL, 1683794041, 1683794041),
('/operator/private-requester/delete', 2, NULL, NULL, NULL, 1683794041, 1683794041),
('/operator/private-requester/deletefile', 2, NULL, NULL, NULL, 1683794041, 1683794041),
('/operator/private-requester/download', 2, NULL, NULL, NULL, 1683794041, 1683794041),
('/operator/private-requester/index', 2, NULL, NULL, NULL, 1683794041, 1683794041),
('/operator/private-requester/update', 2, NULL, NULL, NULL, 1683794041, 1683794041),
('/operator/private-requester/view', 2, NULL, NULL, NULL, 1683794041, 1683794041),
('/operator/profile/*', 2, NULL, NULL, NULL, 1683767079, 1683767079),
('/operator/profile/create', 2, NULL, NULL, NULL, 1683767079, 1683767079),
('/operator/profile/delete', 2, NULL, NULL, NULL, 1683767079, 1683767079),
('/operator/profile/index', 2, NULL, NULL, NULL, 1683767079, 1683767079),
('/operator/profile/update', 2, NULL, NULL, NULL, 1683767079, 1683767079),
('/operator/profile/view', 2, NULL, NULL, NULL, 1683767079, 1683767079),
('/operator/report/*', 2, NULL, NULL, NULL, 1683767079, 1683767079),
('/operator/report/index', 2, NULL, NULL, NULL, 1683767079, 1683767079),
('/operator/report/report1', 2, NULL, NULL, NULL, 1683767079, 1683767079),
('/operator/report/report2', 2, NULL, NULL, NULL, 1683767079, 1683767079),
('/operator/report/report3', 2, NULL, NULL, NULL, 1683767079, 1683767079),
('/operator/report/report4', 2, NULL, NULL, NULL, 1683767079, 1683767079),
('/operator/requester/*', 2, NULL, NULL, NULL, 1683539995, 1683539995),
('/operator/requester/create', 2, NULL, NULL, NULL, 1683767079, 1683767079),
('/operator/requester/delete', 2, NULL, NULL, NULL, 1683767079, 1683767079),
('/operator/requester/deletefile', 2, NULL, NULL, NULL, 1683767079, 1683767079),
('/operator/requester/download', 2, NULL, NULL, NULL, 1683767079, 1683767079),
('/operator/requester/index', 2, NULL, NULL, NULL, 1683767079, 1683767079),
('/operator/requester/update', 2, NULL, NULL, NULL, 1683767079, 1683767079),
('/operator/requester/view', 2, NULL, NULL, NULL, 1683767079, 1683767079),
('/operator/reviewer/*', 2, NULL, NULL, NULL, 1683767079, 1683767079),
('/operator/reviewer/create', 2, NULL, NULL, NULL, 1683767079, 1683767079),
('/operator/reviewer/delete', 2, NULL, NULL, NULL, 1683767079, 1683767079),
('/operator/reviewer/index', 2, NULL, NULL, NULL, 1683767079, 1683767079),
('/operator/reviewer/update', 2, NULL, NULL, NULL, 1683767079, 1683767079),
('/operator/reviewer/view', 2, NULL, NULL, NULL, 1683767079, 1683767079),
('/operator/stamps/*', 2, NULL, NULL, NULL, 1683767079, 1683767079),
('/operator/stamps/create', 2, NULL, NULL, NULL, 1683767079, 1683767079),
('/operator/stamps/delete', 2, NULL, NULL, NULL, 1683767079, 1683767079),
('/operator/stamps/index', 2, NULL, NULL, NULL, 1683767079, 1683767079),
('/operator/stamps/update', 2, NULL, NULL, NULL, 1683767079, 1683767079),
('/operator/stamps/upload', 2, NULL, NULL, NULL, 1683767079, 1683767079),
('/operator/stamps/view', 2, NULL, NULL, NULL, 1683767079, 1683767079),
('/operator/status/*', 2, NULL, NULL, NULL, 1683767079, 1683767079),
('/operator/status/create', 2, NULL, NULL, NULL, 1683767079, 1683767079),
('/operator/status/delete', 2, NULL, NULL, NULL, 1683767079, 1683767079),
('/operator/status/index', 2, NULL, NULL, NULL, 1683767079, 1683767079),
('/operator/status/update', 2, NULL, NULL, NULL, 1683767079, 1683767079),
('/operator/status/view', 2, NULL, NULL, NULL, 1683767079, 1683767079),
('/operator/types/*', 2, NULL, NULL, NULL, 1683767079, 1683767079),
('/operator/types/create', 2, NULL, NULL, NULL, 1683767079, 1683767079),
('/operator/types/delete', 2, NULL, NULL, NULL, 1683767079, 1683767079),
('/operator/types/index', 2, NULL, NULL, NULL, 1683767079, 1683767079),
('/operator/types/update', 2, NULL, NULL, NULL, 1683767079, 1683767079),
('/operator/types/view', 2, NULL, NULL, NULL, 1683767079, 1683767079),
('/operator/user/*', 2, NULL, NULL, NULL, 1683767079, 1683767079),
('/operator/user/create', 2, NULL, NULL, NULL, 1683767079, 1683767079),
('/operator/user/delete', 2, NULL, NULL, NULL, 1683767079, 1683767079),
('/operator/user/index', 2, NULL, NULL, NULL, 1683767079, 1683767079),
('/operator/user/update', 2, NULL, NULL, NULL, 1683767079, 1683767079),
('/operator/user/view', 2, NULL, NULL, NULL, 1683767079, 1683767079),
('/rbac/*', 2, NULL, NULL, NULL, 1683767079, 1683767079),
('/rbac/assignment/*', 2, NULL, NULL, NULL, 1683767079, 1683767079),
('/rbac/assignment/assign', 2, NULL, NULL, NULL, 1683767079, 1683767079),
('/rbac/permission/*', 2, NULL, NULL, NULL, 1683767079, 1683767079),
('/rbac/permission/create', 2, NULL, NULL, NULL, 1683767079, 1683767079),
('/rbac/permission/delete', 2, NULL, NULL, NULL, 1683767079, 1683767079),
('/rbac/permission/index', 2, NULL, NULL, NULL, 1683767079, 1683767079),
('/rbac/permission/update', 2, NULL, NULL, NULL, 1683767079, 1683767079),
('/rbac/role/*', 2, NULL, NULL, NULL, 1683767079, 1683767079),
('/rbac/role/create', 2, NULL, NULL, NULL, 1683767079, 1683767079),
('/rbac/role/delete', 2, NULL, NULL, NULL, 1683767079, 1683767079),
('/rbac/role/index', 2, NULL, NULL, NULL, 1683767079, 1683767079),
('/rbac/role/update', 2, NULL, NULL, NULL, 1683767079, 1683767079),
('/rbac/rule/*', 2, NULL, NULL, NULL, 1683767079, 1683767079),
('/rbac/rule/create', 2, NULL, NULL, NULL, 1683767079, 1683767079),
('/rbac/rule/delete', 2, NULL, NULL, NULL, 1683767079, 1683767079),
('/rbac/rule/index', 2, NULL, NULL, NULL, 1683767079, 1683767079),
('/rbac/rule/search', 2, NULL, NULL, NULL, 1683767079, 1683767079),
('/rbac/rule/update', 2, NULL, NULL, NULL, 1683767079, 1683767079),
('/site/*', 2, NULL, NULL, NULL, 1683767079, 1683767079),
('/site/about', 2, NULL, NULL, NULL, 1683767079, 1683767079),
('/site/captcha', 2, NULL, NULL, NULL, 1683767079, 1683767079),
('/site/contact', 2, NULL, NULL, NULL, 1683767079, 1683767079),
('/site/error', 2, NULL, NULL, NULL, 1683767079, 1683767079),
('/site/index', 2, NULL, NULL, NULL, 1683767079, 1683767079),
('/site/login', 2, NULL, NULL, NULL, 1683767079, 1683767079),
('/site/logout', 2, NULL, NULL, NULL, 1683767079, 1683767079),
('/user/*', 2, NULL, NULL, NULL, 1683767079, 1683767079),
('/user/admin/*', 2, NULL, NULL, NULL, 1683767079, 1683767079),
('/user/admin/assignments', 2, NULL, NULL, NULL, 1683767079, 1683767079),
('/user/admin/block', 2, NULL, NULL, NULL, 1683767079, 1683767079),
('/user/admin/confirm', 2, NULL, NULL, NULL, 1683767079, 1683767079),
('/user/admin/create', 2, NULL, NULL, NULL, 1683767079, 1683767079),
('/user/admin/delete', 2, NULL, NULL, NULL, 1683767079, 1683767079),
('/user/admin/index', 2, NULL, NULL, NULL, 1683767079, 1683767079),
('/user/admin/info', 2, NULL, NULL, NULL, 1683767079, 1683767079),
('/user/admin/resend-password', 2, NULL, NULL, NULL, 1683767079, 1683767079),
('/user/admin/switch', 2, NULL, NULL, NULL, 1683767079, 1683767079),
('/user/admin/update', 2, NULL, NULL, NULL, 1683767079, 1683767079),
('/user/admin/update-profile', 2, NULL, NULL, NULL, 1683767079, 1683767079),
('/user/profile/*', 2, NULL, NULL, NULL, 1683767079, 1683767079),
('/user/profile/index', 2, NULL, NULL, NULL, 1683767079, 1683767079),
('/user/profile/show', 2, NULL, NULL, NULL, 1683767079, 1683767079),
('/user/recovery/*', 2, NULL, NULL, NULL, 1683767079, 1683767079),
('/user/recovery/request', 2, NULL, NULL, NULL, 1683767079, 1683767079),
('/user/recovery/reset', 2, NULL, NULL, NULL, 1683767079, 1683767079),
('/user/registration/*', 2, NULL, NULL, NULL, 1683767079, 1683767079),
('/user/registration/confirm', 2, NULL, NULL, NULL, 1683767079, 1683767079),
('/user/registration/connect', 2, NULL, NULL, NULL, 1683767079, 1683767079),
('/user/registration/register', 2, NULL, NULL, NULL, 1683767079, 1683767079),
('/user/registration/resend', 2, NULL, NULL, NULL, 1683767079, 1683767079),
('/user/security/*', 2, NULL, NULL, NULL, 1683767079, 1683767079),
('/user/security/auth', 2, NULL, NULL, NULL, 1683767079, 1683767079),
('/user/security/login', 2, NULL, NULL, NULL, 1683767079, 1683767079),
('/user/security/logout', 2, NULL, NULL, NULL, 1683767079, 1683767079),
('/user/settings/*', 2, NULL, NULL, NULL, 1683767079, 1683767079),
('/user/settings/account', 2, NULL, NULL, NULL, 1683767079, 1683767079),
('/user/settings/confirm', 2, NULL, NULL, NULL, 1683767079, 1683767079),
('/user/settings/delete', 2, NULL, NULL, NULL, 1683767079, 1683767079),
('/user/settings/disconnect', 2, NULL, NULL, NULL, 1683767079, 1683767079),
('/user/settings/networks', 2, NULL, NULL, NULL, 1683767079, 1683767079),
('/user/settings/profile', 2, NULL, NULL, NULL, 1683767079, 1683767079),
('Actor', 1, NULL, NULL, NULL, 1683766966, 1683766966),
('Admin', 1, NULL, NULL, NULL, 1683766940, 1683766940),
('QMR', 1, NULL, NULL, NULL, 1683766910, 1683766910),
('Super Admin', 1, NULL, NULL, NULL, 1683540013, 1683540013),
('User', 1, NULL, NULL, NULL, 1683540028, 1683540028);

-- --------------------------------------------------------

--
-- Table structure for table `auth_item_child`
--

DROP TABLE IF EXISTS `auth_item_child`;
CREATE TABLE IF NOT EXISTS `auth_item_child` (
  `parent` varchar(64) COLLATE utf8mb3_unicode_ci NOT NULL,
  `child` varchar(64) COLLATE utf8mb3_unicode_ci NOT NULL,
  PRIMARY KEY (`parent`,`child`),
  KEY `child` (`child`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;

--
-- Dumping data for table `auth_item_child`
--

INSERT INTO `auth_item_child` (`parent`, `child`) VALUES
('Super Admin', '/*'),
('Admin', '/admin/*'),
('Admin', '/operator/*'),
('QMR', '/operator/*'),
('User', '/operator/private-requester/*'),
('User', '/operator/private-requester/create'),
('User', '/operator/private-requester/deletefile'),
('User', '/operator/private-requester/download'),
('User', '/operator/private-requester/index'),
('User', '/operator/private-requester/update'),
('User', '/operator/private-requester/view'),
('Actor', '/operator/report/*'),
('Actor', '/operator/requester/*'),
('User', '/operator/requester/create'),
('User', '/operator/requester/download'),
('User', '/operator/requester/index'),
('User', '/operator/requester/view'),
('Actor', '/operator/reviewer/*'),
('Admin', '/rbac/*'),
('Admin', '/site/*'),
('Admin', '/user/*');

-- --------------------------------------------------------

--
-- Table structure for table `auth_rule`
--

DROP TABLE IF EXISTS `auth_rule`;
CREATE TABLE IF NOT EXISTS `auth_rule` (
  `name` varchar(64) COLLATE utf8mb3_unicode_ci NOT NULL,
  `data` blob,
  `created_at` int DEFAULT NULL,
  `updated_at` int DEFAULT NULL,
  PRIMARY KEY (`name`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `auto_number`
--

DROP TABLE IF EXISTS `auto_number`;
CREATE TABLE IF NOT EXISTS `auto_number` (
  `group` varchar(32) NOT NULL,
  `number` int DEFAULT NULL,
  `optimistic_lock` int DEFAULT NULL,
  `update_time` int DEFAULT NULL,
  PRIMARY KEY (`group`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Dumping data for table `auto_number`
--

INSERT INTO `auto_number` (`group`, `number`, `optimistic_lock`, `update_time`) VALUES
('05fa85d63c9532697e952d5c1359207a', 10, 1, 1683883745),
('EM-MK-???', 1, 1, 1684117252),
('EM-RD-???', 1, 1, 1683882086),
('FM-IT-???', 2, 1, 1683865265),
('FM-PC-???', 2, 1, 1683884207),
('FM-WH-???', 1, 1, 1683883958),
('MM-AG-???', 1, 1, 1683882730),
('MM-PC-???', 2, 1, 1684123815),
('PM-EN-???', 1, 1, 1684117280),
('PM-QC-???', 1, 1, 1684117299),
('PM-RD-???', 3, 1, 1683882077),
('PM-WH-???', 1, 1, 1684117140),
('QM-WH-???', 1, 1, 1684117212),
('SHE-EN-???', 2, 1, 1683972022),
('SHE-MM-???', 1, 1, 1684123737),
('SP-PC-???', 1, 1, 1683883745),
('SP-QC-???', 1, 1, 1683945833),
('SP-RD-???', 1, 1, 1683946262),
('SP-WH-???', 3, 1, 1683964137),
('ST-WH-???', 1, 1, 1684117162),
('WI-EN-???', 1, 1, 1683941629),
('WI-MK-???', 1, 1, 1683942957),
('WI-RD-???', 1, 1, 1684117229);

-- --------------------------------------------------------

--
-- Table structure for table `migration`
--

DROP TABLE IF EXISTS `migration`;
CREATE TABLE IF NOT EXISTS `migration` (
  `version` varchar(180) NOT NULL,
  `apply_time` int DEFAULT NULL,
  PRIMARY KEY (`version`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb3;

--
-- Dumping data for table `migration`
--

INSERT INTO `migration` (`version`, `apply_time`) VALUES
('m000000_000000_base', 1682472922),
('m140209_132017_init', 1682473632),
('m140403_174025_create_account_table', 1682473632),
('m140504_113157_update_tables', 1682473632),
('m140504_130429_create_token_table', 1682473632),
('m140830_171933_fix_ip_field', 1682473633),
('m140830_172703_change_account_table_name', 1682473633),
('m141222_110026_update_ip_field', 1682473633),
('m141222_135246_alter_username_length', 1682473633),
('m150614_103145_update_social_account_table', 1682473633),
('m150623_212711_fix_username_notnull', 1682473633),
('m151218_234654_add_timezone_to_profile', 1682473633),
('m160929_103127_add_last_login_at_to_user_table', 1682473633),
('m140506_102106_rbac_init', 1682473660),
('m170907_052038_rbac_add_index_on_auth_assignment_user_id', 1682473660),
('m180523_151638_rbac_updates_indexes_without_prefix', 1682473661),
('m200409_110543_rbac_update_mssql_trigger', 1682473661),
('m140527_084418_auto_number', 1683857558);

-- --------------------------------------------------------

--
-- Table structure for table `profile`
--

DROP TABLE IF EXISTS `profile`;
CREATE TABLE IF NOT EXISTS `profile` (
  `user_id` int NOT NULL,
  `name` varchar(255) COLLATE utf8mb3_unicode_ci DEFAULT NULL,
  `public_email` varchar(255) COLLATE utf8mb3_unicode_ci DEFAULT NULL,
  `gravatar_email` varchar(255) COLLATE utf8mb3_unicode_ci DEFAULT NULL,
  `gravatar_id` varchar(32) COLLATE utf8mb3_unicode_ci DEFAULT NULL,
  `location` varchar(255) COLLATE utf8mb3_unicode_ci DEFAULT NULL,
  `website` varchar(255) COLLATE utf8mb3_unicode_ci DEFAULT NULL,
  `bio` text COLLATE utf8mb3_unicode_ci,
  `timezone` varchar(40) COLLATE utf8mb3_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;

--
-- Dumping data for table `profile`
--

INSERT INTO `profile` (`user_id`, `name`, `public_email`, `gravatar_email`, `gravatar_id`, `location`, `website`, `bio`, `timezone`) VALUES
(1, 'แอดมิน', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(2, 'ธีรพงศ์ ขันตา', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(3, 'อรอนงค์ ชุมภู', '', '', 'd41d8cd98f00b204e9800998ecf8427e', '', '', '', NULL),
(4, 'สุพรรณา พันธ์ภู่', '', '', 'd41d8cd98f00b204e9800998ecf8427e', '', '', '', NULL),
(5, 'พีรนัย โสทรทวีพงศ์', '', '', 'd41d8cd98f00b204e9800998ecf8427e', '', '', '', NULL),
(6, 'สาวิกา พินิจ', '', '', 'd41d8cd98f00b204e9800998ecf8427e', '', '', '', NULL),
(7, 'อารยา เทพโพธา', '', '', 'd41d8cd98f00b204e9800998ecf8427e', '', '', '', NULL),
(8, 'กรรณิกา คำภีระ', '', '', 'd41d8cd98f00b204e9800998ecf8427e', '', '', '', NULL),
(9, 'วรรษรา หลวงเป็ง', '', '', 'd41d8cd98f00b204e9800998ecf8427e', '', '', '', NULL),
(10, 'ยศพร พยัคฆญาติ', '', '', 'd41d8cd98f00b204e9800998ecf8427e', '', '', '', NULL),
(11, 'ทวีเกียรติ คำเทพ', '', '', 'd41d8cd98f00b204e9800998ecf8427e', '', '', '', NULL),
(12, 'กุลนิษฐ์นรี เจริญจิตรวี', '', '', 'd41d8cd98f00b204e9800998ecf8427e', '', '', '', NULL),
(13, 'จิราภรณ์ กาบแก้ว', '', '', 'd41d8cd98f00b204e9800998ecf8427e', '', '', '', NULL),
(14, 'ลภีพร กาบแก้ว', '', '', 'd41d8cd98f00b204e9800998ecf8427e', '', '', '', NULL),
(15, 'รัศมี ศศิยศพงศ์', '', '', 'd41d8cd98f00b204e9800998ecf8427e', '', '', '', NULL),
(16, 'ทักษิณ อินทรศิลา', '', '', 'd41d8cd98f00b204e9800998ecf8427e', '', '', '', NULL),
(17, 'ชฎาภรณ์ แก้วคำ', '', '', 'd41d8cd98f00b204e9800998ecf8427e', '', '', '', NULL),
(18, 'ปราณี แดงโคตร', '', '', 'd41d8cd98f00b204e9800998ecf8427e', '', '', '', NULL),
(19, 'เปรมมิกา พินิจ', '', '', 'd41d8cd98f00b204e9800998ecf8427e', '', '', '', NULL),
(20, 'ธัญญารัตน์ นิ่มวงษ์', '', '', 'd41d8cd98f00b204e9800998ecf8427e', '', '', '', NULL),
(21, 'ชาริณี จันต๊ะนาเขต', '', '', 'd41d8cd98f00b204e9800998ecf8427e', '', '', '', NULL),
(22, 'ประกายวรรณ เทพมณี', '', '', 'd41d8cd98f00b204e9800998ecf8427e', '', '', '', NULL),
(23, 'สุริยา สมเพชร', '', '', 'd41d8cd98f00b204e9800998ecf8427e', '', '', '', NULL),
(24, 'สุพจน์ ช่างฆ้อง', '', '', 'd41d8cd98f00b204e9800998ecf8427e', '', '', '', NULL),
(25, 'ณัฐพล ขันเขียว', '', '', 'd41d8cd98f00b204e9800998ecf8427e', '', '', '', NULL),
(26, 'สราวุฒิ โฆษิตเกียรติคุณ', '', '', 'd41d8cd98f00b204e9800998ecf8427e', '', '', '', NULL),
(27, 'ยศพนธ์ โพธิ', '', '', 'd41d8cd98f00b204e9800998ecf8427e', '', '', '', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `social_account`
--

DROP TABLE IF EXISTS `social_account`;
CREATE TABLE IF NOT EXISTS `social_account` (
  `id` int NOT NULL AUTO_INCREMENT,
  `user_id` int DEFAULT NULL,
  `provider` varchar(255) COLLATE utf8mb3_unicode_ci NOT NULL,
  `client_id` varchar(255) COLLATE utf8mb3_unicode_ci NOT NULL,
  `data` text CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci,
  `code` varchar(32) COLLATE utf8mb3_unicode_ci DEFAULT NULL,
  `created_at` int DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb3_unicode_ci DEFAULT NULL,
  `username` varchar(255) COLLATE utf8mb3_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `account_unique` (`provider`,`client_id`),
  UNIQUE KEY `account_unique_code` (`code`),
  KEY `fk_user_account` (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `token`
--

DROP TABLE IF EXISTS `token`;
CREATE TABLE IF NOT EXISTS `token` (
  `user_id` int NOT NULL,
  `code` varchar(32) COLLATE utf8mb3_unicode_ci NOT NULL,
  `created_at` int NOT NULL,
  `type` smallint NOT NULL,
  UNIQUE KEY `token_unique` (`user_id`,`code`,`type`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;

--
-- Dumping data for table `token`
--

INSERT INTO `token` (`user_id`, `code`, `created_at`, `type`) VALUES
(2, 'EMY0QLqlg68STQlkmHWoJQ-cGlEs2PaK', 1682481093, 0),
(3, 'NI3AaFysiV3kGhxMxHIEFVSLduv33jK3', 1682481101, 0),
(4, 'L27XIjdY_W1lssdap2ZxlaPUX5uVTdSo', 1682481110, 0),
(5, 'Ze1ly0J96EN-1Ldql4O3c1_lcKIi6_ZN', 1682481121, 0);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

DROP TABLE IF EXISTS `user`;
CREATE TABLE IF NOT EXISTS `user` (
  `id` int NOT NULL AUTO_INCREMENT,
  `username` varchar(255) COLLATE utf8mb3_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb3_unicode_ci NOT NULL,
  `password_hash` varchar(60) COLLATE utf8mb3_unicode_ci NOT NULL,
  `auth_key` varchar(32) COLLATE utf8mb3_unicode_ci NOT NULL,
  `confirmed_at` int DEFAULT NULL,
  `unconfirmed_email` varchar(255) COLLATE utf8mb3_unicode_ci DEFAULT NULL,
  `blocked_at` int DEFAULT NULL,
  `registration_ip` varchar(45) COLLATE utf8mb3_unicode_ci DEFAULT NULL,
  `created_at` int NOT NULL,
  `updated_at` int NOT NULL,
  `flags` int NOT NULL DEFAULT '0',
  `last_login_at` int DEFAULT NULL,
  `status` int DEFAULT '10',
  `role` int DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `user_unique_username` (`username`),
  UNIQUE KEY `user_unique_email` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=28 DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `username`, `email`, `password_hash`, `auth_key`, `confirmed_at`, `unconfirmed_email`, `blocked_at`, `registration_ip`, `created_at`, `updated_at`, `flags`, `last_login_at`, `status`, `role`) VALUES
(1, 'admin', 'admin@admin.com', '$2y$12$M0hFXxztKZxCnaOnGJjrpOmQtnEPHqRbvE7spj4xkCVnT11VBcOaO', 'VPaMQzLRVu6gsDMqaZL9rwHiVdWwVFe3', 1682481192, NULL, NULL, '::1', 1682481077, 1682481077, 0, 1683939721, 10, NULL),
(2, 'theerapong', 'theerapong.khan@gmail.com', '$2y$12$wgw0evelJYnHo.OYJ6Oy7uSXkJuj/hc.KyN5Ua69k9EVzMZSPWH8S', 'l8eCAXjpfUIMnx1YKbKqw3xcBEA0D1T-', 1682481206, NULL, NULL, '::1', 1682481093, 1682481093, 0, 1683860121, 10, NULL),
(3, 'onanong', 'onanong@gmail.com', '$2y$12$hZYzUyddqbQgj.ZhVpYnk.HLsxue7JE6X10xAisAm97RV9O4Baque', 'GtUzBcGWelbaJ9MVBMz8I6o1XVUVhsMM', 1682481209, NULL, NULL, '::1', 1682481101, 1682481101, 0, 1683795258, 10, NULL),
(4, 'supanna', 'supanna@email.com', '$2y$12$JrgSpLqoe07bm0bVnPKR7O3/uZ1ubwIKHy5QOLxHMqThm24kf/ZLK', 'H4Gv7l_-KVl-TfLQo39JXcJJKHvz0o7c', 1682481210, NULL, NULL, '::1', 1682481110, 1682481110, 0, 1683604691, 10, NULL),
(5, 'peeranai', 'peeranai@gmail.com', '$2y$12$pkdao7ym04wlz08kyxj.l.5undNMHcst/0EzM1mzHebUMoqxVt436', 'kbcu9EyXHp2BeliynrSsZ5Skq1ASeLe8', 1682481212, NULL, NULL, '::1', 1682481121, 1682481121, 0, NULL, 10, NULL),
(6, 'sawika', 'sawika@email.com', '$2y$12$O3tNFBcq9cpEtcHqCTolDucXMtIb5knWKjHOL2OSL5N7UKkXdtoui', 's4v4f4FElf3N2uPdx6GZYLMy5mS8rNCd', 1683792969, NULL, NULL, '::1', 1683792969, 1683793430, 0, 1683794565, 10, NULL),
(7, 'araya', 'acc.nfcfa@gmail.com', '$2y$12$NrzWMCnFlYaX6ThguT8d9.PNE.euAzbH8Qse4.Y4qoj3fh33lqLSe', 'JLEI5sdHVlrhamckF6VXpy3heJfk6nQ9', 1683792990, NULL, NULL, '::1', 1683792990, 1683792990, 0, NULL, 10, NULL),
(8, 'kannika', 'kannika@nfc.com', '$2y$12$xffTyxflca52nU71YNdrpOrCfkwZaLWa/XtdCdYxmPvTRYcCov1eG', 'L57bjEoDoyL4EakO9ft3WombnlQsQ1Bc', 1683793010, NULL, NULL, '::1', 1683793010, 1683793010, 0, NULL, 10, NULL),
(9, 'watasara', 'lee_lew@hotmail.com', '$2y$12$2AZYznE2urQ9mo.nm9c0duZ7ANIIage.cC0nBYWsDCXjIEVLgJGc2', 'e3Wz-hxQL4ftWXyNYuiDoiecAegiHGq8', 1683793026, NULL, NULL, '::1', 1683793026, 1683793026, 0, NULL, 10, NULL),
(10, 'yosaporn', 'ypayakayat@yahoo.com', '$2y$12$z/5HU4gOYMv2rbIIf03PiuRM0Ohb8J7wjlA1X0dwvnRUxwYs9Dgvq', 'jQZ4ahmM-ow9KnGYwcn302ay3bX3wON6', 1683793047, NULL, NULL, '::1', 1683793047, 1683793047, 0, NULL, 10, NULL),
(11, 'taweekiat', 'd.taweekiat@gmail.com', '$2y$12$.MQq.u7Wb7UZkzTsL1VvmO.rzraFIdaghwb.bMGl/BujX9ab.MrRq', '8wWbkMZ4wN95vSxELWypKe3EHIBaTqPO', 1683793061, NULL, NULL, '::1', 1683793061, 1683793061, 0, NULL, 10, NULL),
(12, 'kullanitnaree', 'kullanitnaree@nfc.com', '$2y$12$OpKiXAEkMBkkX7jLo6XrhORV587pEAB7RaEYGrgz1MRKXWdYNw/2i', 'gXFVNvr0CSpX3AuLh7fMaSLkJJpeJg31', 1683793076, NULL, NULL, '::1', 1683793076, 1683793076, 0, NULL, 10, NULL),
(13, 'jiraporn', 'jiraporn@nfc.com', '$2y$12$O3duTGbmOGQCdabVNtGOIO7tFxKyEZffPJWvAuu7ynDJOgJNdVliO', 'SCe8MGcoRhYeKi7vavwMufJeUUUdrdUd', 1683793090, NULL, NULL, '::1', 1683793090, 1683793090, 0, NULL, 10, NULL),
(14, 'lapaeporn', 'lapaeporn@nfc.com', '$2y$12$1MnkoqAQ3bFvH39fr4afj.EA6WKGWPPNyP500pN/AqxERayxPg056', 'BHUBCxcZpztXEl_y26ZPMtV_KnwoYeHU', 1683793107, NULL, NULL, '::1', 1683793107, 1683793107, 0, NULL, 10, NULL),
(15, 'ratsamee', 'ratsamee@nfc.com', '$2y$12$FYc7l3HRZz9Su.pLPiop0u.dclzn7M9zUeSlurwtINYkqwGoFEbCu', 'iD4Vuipm5XWq5ryszxzwPFDkOOi5oc29', 1683793119, NULL, NULL, '::1', 1683793119, 1683793119, 0, NULL, 10, NULL),
(16, 'thaksin', 'notethaksin@hotmail.com', '$2y$12$3q7fpwnOleGTfPDsZxR1fek.tFT.7a.NRZTfnqJzeOFYhjI9UlEXK', 'ltM24mSBdAYkooq7t-AVUjtrBrsK2_G8', 1683793130, NULL, NULL, '::1', 1683793130, 1683793130, 0, NULL, 10, NULL),
(17, 'chadaporn', 'kaewkhamchadaporn@gmail.com', '$2y$12$LujF5jw2pZmCtpNE.CI/Lu8Y1mWER6Obn3NMvSN3SLPcH..ntVCEe', 'R5sYXX_Cp7k-hDa0v8Im-p3E1WHhgyx2', 1683793141, NULL, NULL, '::1', 1683793141, 1683793141, 0, NULL, 10, NULL),
(18, 'pranee', 'pranee@nfc.com', '$2y$12$RFa71D2fkjU5TGqbDEyFaOgzNBOq2l2PonqDNt9.a9Pi/ltz8lOw2', 'AgrQBEnC4usd05AdIzGvYP63tACwB1dG', 1683793166, NULL, NULL, '::1', 1683793166, 1683793166, 0, NULL, 10, NULL),
(19, 'premmika', 'premmika2910@gmail.com', '$2y$12$aV3Dus0NhZcn2w3wBVn/U.9bbswMETIF4XjlZE3UMBlAD.7tFM/T.', 'EjMUtCt6y_Hkt1uRFsF5EOQlBEGTsUAN', 1683793180, NULL, NULL, '::1', 1683793180, 1683793180, 0, NULL, 10, NULL),
(20, 'tanyarat', 'Nimwong2539@gmail.com', '$2y$12$WmDURu17WodhrGE.orah0.AZwZAcScOQwuGQalWwKhkJcqyid48J6', 'RcPfw0huWobtF5xILVloNxg0CtxF7WuJ', 1683793191, NULL, NULL, '::1', 1683793191, 1683793191, 0, NULL, 10, NULL),
(21, 'charinee', 'charinee@nfc.com', '$2y$12$DhVkil5ut9Cs04ezhdfp1ulkgoyDSD9nw8j9OMzYVptJnYid6LarG', '1oImVHdvLcJfCDpM2HvrOSu7cmqGBh-Y', 1683793203, NULL, NULL, '::1', 1683793203, 1683793203, 0, NULL, 10, NULL),
(22, 'prakaiwan', 'prakaiwan4213@gmail.com', '$2y$12$RB52vDO.vrWheFBqg4Zeo.RuWqkwvOn1rZPS85KFCZ3dRv6CQ9yGa', 'UQQF5MDyCqFDzForMDbe6vZJpv95X8Al', 1683793214, NULL, NULL, '::1', 1683793214, 1683793214, 0, NULL, 10, NULL),
(23, 'suriya', 'suriyasompatch@gmail.com', '$2y$12$C4xc4c3Lg.l7DVsyg4BQYe1cKnQOAmzYjro4K4ucGcT0Jy4JqbIFK', '7yTvVQ07qAL3hyoze5O46NbNhvs5QH9i', 1683793225, NULL, NULL, '::1', 1683793225, 1683793225, 0, NULL, 10, NULL),
(24, 'suphot', 'changkhong.8777@gmail.com', '$2y$12$qtUlDIw66IXTDrfoABmq/.eRz.9wMw/KF31AwZgCab3EEDCrYw5fm', 'eYevE-riqu1KNIfQHmgR_59NCbDVgvxH', 1683793236, NULL, NULL, '::1', 1683793236, 1683793236, 0, NULL, 10, NULL),
(25, 'natthaphon', 'natthaphon@nfc.com', '$2y$12$a9mtTJ0gxfhUcsq8j.fp5O41G5wzWbE9b/zvOFcavISZJ4Bep46V.', '45a51OLBtvaN5JfVVAYp5omrDcaD5tKs', 1683793247, NULL, NULL, '::1', 1683793247, 1683793247, 0, NULL, 10, NULL),
(26, 'sarawut', 'en.nfc2016@gmail.com', '$2y$12$YmNAxic6cTsLgvI1ed9O5efepj684pVoEDle.ClzThUJV6/SUzS82', 'XVG744_T2RsUjT1SZ_D_ANro3khRALsB', 1683793260, NULL, NULL, '::1', 1683793260, 1683793260, 0, NULL, 10, NULL),
(27, 'yosapon', 'yosapon@nfc.com', '$2y$12$PnOyJpgIVrlFq05kgKG0ru0nCkxvr381oh9j9POnYkstmuFYe8io.', '_zCG57x3OZ-SSXYr3m7aNLyR9ddbKY7N', 1683793273, NULL, NULL, '::1', 1683793273, 1683793273, 0, 1683793890, 10, NULL);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `auth_assignment`
--
ALTER TABLE `auth_assignment`
  ADD CONSTRAINT `auth_assignment_ibfk_1` FOREIGN KEY (`item_name`) REFERENCES `auth_item` (`name`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `auth_item`
--
ALTER TABLE `auth_item`
  ADD CONSTRAINT `auth_item_ibfk_1` FOREIGN KEY (`rule_name`) REFERENCES `auth_rule` (`name`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- Constraints for table `auth_item_child`
--
ALTER TABLE `auth_item_child`
  ADD CONSTRAINT `auth_item_child_ibfk_1` FOREIGN KEY (`parent`) REFERENCES `auth_item` (`name`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `auth_item_child_ibfk_2` FOREIGN KEY (`child`) REFERENCES `auth_item` (`name`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `profile`
--
ALTER TABLE `profile`
  ADD CONSTRAINT `fk_user_profile` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE RESTRICT;

--
-- Constraints for table `social_account`
--
ALTER TABLE `social_account`
  ADD CONSTRAINT `fk_user_account` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE RESTRICT;

--
-- Constraints for table `token`
--
ALTER TABLE `token`
  ADD CONSTRAINT `fk_user_token` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE RESTRICT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

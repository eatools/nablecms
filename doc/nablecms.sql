-- phpMyAdmin SQL Dump
-- version 3.3.2
-- http://www.phpmyadmin.net
--
-- 主机: localhost
-- 生成日期: 2010 年 09 月 16 日 02:31
-- 服务器版本: 5.1.49
-- PHP 版本: 5.2.14

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- 数据库: `nablecms`
--

-- --------------------------------------------------------

--
-- 表的结构 `ea_admin_account`
--

CREATE TABLE IF NOT EXISTS `ea_admin_account` (
  `account_id` int(11) NOT NULL AUTO_INCREMENT COMMENT '管理员id',
  `username` varchar(15) NOT NULL COMMENT '名称',
  `passwd` char(32) NOT NULL COMMENT '密码',
  `nickname` varchar(15) NOT NULL COMMENT '昵称',
  `mail` varchar(100) NOT NULL COMMENT '邮箱',
  `is_super` tinyint(1) NOT NULL DEFAULT '0' COMMENT '是否为超级管理员',
  `regist_ip` int(10) DEFAULT NULL COMMENT '用户注册IP Int 格式',
  `regist_time` int(11) NOT NULL COMMENT '用户注册时间',
  `login_ip` int(10) NOT NULL COMMENT '最后登录IP',
  `login_time` int(11) NOT NULL COMMENT '最后登录时间',
  `is_del` tinyint(1) NOT NULL DEFAULT '0' COMMENT '是否删除，1为删除.default 0',
  `logincount` int(11) NOT NULL COMMENT '登录次数',
  `role` varchar(1000) NOT NULL COMMENT '角色列表,都号分割',
  PRIMARY KEY (`account_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COMMENT='系统用户表' AUTO_INCREMENT=2 ;

--
-- 转存表中的数据 `ea_admin_account`
--

INSERT INTO `ea_admin_account` (`account_id`, `username`, `passwd`, `nickname`, `mail`, `is_super`, `regist_ip`, `regist_time`, `login_ip`, `login_time`, `is_del`, `logincount`, `role`) VALUES
(1, 'admin', '21232f297a57a5a743894a0e4a801fc3', '系统管理员2', 'ablegao@gmail.com', 1, NULL, 0, 2130706433, 1284574704, 0, 117, '2');

-- --------------------------------------------------------

--
-- 表的结构 `ea_admin_menu`
--

CREATE TABLE IF NOT EXISTS `ea_admin_menu` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT '菜单编号',
  `pid` int(11) NOT NULL DEFAULT '0' COMMENT '上级id',
  `title` varchar(125) NOT NULL,
  `url` varchar(255) DEFAULT NULL COMMENT '项目路径',
  `is_param` tinyint(1) NOT NULL DEFAULT '0' COMMENT '是否为参数,1为是,即不是菜单',
  `is_del` tinyint(1) NOT NULL COMMENT '是否删除',
  `order` int(11) NOT NULL COMMENT '排序',
  `create_time` int(11) NOT NULL DEFAULT '0' COMMENT '修改时间',
  `edit_time` int(11) NOT NULL DEFAULT '0' COMMENT '创建时间',
  `account_id` int(11) NOT NULL COMMENT '操作员',
  PRIMARY KEY (`id`),
  KEY `pid` (`pid`),
  KEY `is_del` (`is_del`),
  KEY `order` (`order`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COMMENT='系统菜单表' AUTO_INCREMENT=73 ;

--
-- 转存表中的数据 `ea_admin_menu`
--

INSERT INTO `ea_admin_menu` (`id`, `pid`, `title`, `url`, `is_param`, `is_del`, `order`, `create_time`, `edit_time`, `account_id`) VALUES
(1, 19, '系统菜单', '', 0, 0, 0, 0, 1272637246, 1),
(2, 1, '菜单列表', 'menu/index', 0, 0, 100, 0, 0, 0),
(3, 1, '菜单添加', 'menu/add', 0, 0, 60, 0, 0, 0),
(4, 1, '菜单修改', 'menu/edit', 1, 0, 0, 0, 0, 0),
(5, 1, '菜单删除', 'menu/delete', 1, 0, 1, 0, 1272642792, 1),
(6, 49, '站点页面', '', 0, 0, 111, 0, 1272901074, 1),
(39, 6, '内容列表', 'sitepage/work', 0, 0, 99, 1272807846, 1272907940, 1),
(40, 6, '分类列表', 'sitepage/index', 0, 0, 98, 1272814770, 1272814770, 1),
(10, 19, '角色管理', '', 0, 0, 2, 0, 1272551517, 1),
(11, 10, '角色列表', 'role/index', 0, 0, 99, 0, 1272485393, 1),
(12, 10, '角色添加', 'role/add', 0, 0, 0, 0, 0, 0),
(13, 10, '角色修改', 'role/edit', 1, 0, 0, 0, 0, 0),
(14, 10, '角色删除', 'role/delete', 1, 0, 0, 0, 0, 0),
(15, 6, '新闻删除', 'news/delete', 1, 0, 0, 0, 1272482984, 1),
(16, 11, '分配权限', 'role/jur', 1, 0, 0, 0, 0, 0),
(17, 19, '系统用户管理', '', 0, 0, 4, 1272485128, 1272551567, 1),
(18, 17, '用户列表', 'account/index', 0, 0, 99, 1272485256, 1272485364, 1),
(19, 0, '系统管理', '', 0, 0, 0, 1272551448, 1272551448, 1),
(44, 0, '新闻管理', '', 1, 0, 0, 1272900329, 1272900329, 1),
(21, 17, '用户添加', 'account/add', 0, 0, 60, 1272554752, 1272554752, 1),
(22, 0, '站点布局', '', 0, 0, 9, 1272643315, 1272643315, 1),
(23, 22, '布局应用', '', 0, 1, 90, 1272643399, 1278426514, 1),
(26, 24, '模块添加', 'sitemodule/add', 0, 0, 8, 1272644096, 1272644096, 1),
(27, 24, '模块修改', 'sitemodule/edit', 1, 0, 7, 1272644109, 1272644109, 1),
(28, 24, '模块删除', 'sitemodule/delete', 1, 0, 0, 1272644206, 1272644206, 1),
(29, 10, '权限分配', 'role/checkjur', 1, 0, 0, 1272699916, 1272699945, 1),
(30, 23, '模版列表', 'sitelayout/index', 0, 0, 90, 1272702305, 1272804994, 1),
(31, 23, '模版添加', 'sitelayout/add', 0, 0, 80, 1272702316, 1272805008, 1),
(32, 23, '模版修改', 'sitelayout/edit', 1, 0, 70, 1272702328, 1272805018, 1),
(33, 23, '删除模版', 'sitelayout/delete', 1, 0, 60, 1272702339, 1272805029, 1),
(34, 22, '功能模块', '', 0, 0, 0, 1272790779, 1272790779, 1),
(35, 34, '模块列表', 'sitemodule/index', 0, 0, 99, 1272790871, 1272790871, 1),
(36, 34, '模块添加', 'sitemodule/add', 0, 0, 90, 1272790888, 1272790888, 1),
(37, 34, '模块修改', 'sitemodule/edit', 1, 0, 0, 1272790902, 1272790902, 1),
(38, 34, '模块删除', 'sitemodule/delete', 1, 0, 0, 1272790914, 1272790914, 1),
(41, 6, '添加页面分类', 'sitepage/add', 0, 0, 0, 1272815996, 1272815996, 1),
(42, 6, '修改页面', 'sitepage/edit', 1, 0, 0, 1272816009, 1272816009, 1),
(43, 6, '删除页面', 'sitepage/delete', 1, 0, 0, 1272816020, 1272816020, 1),
(45, 44, '新闻列表', 'news/list', 0, 0, 99, 1272900360, 1272900427, 1),
(46, 44, '新闻添加', 'news/add', 0, 0, 80, 1272900374, 1272900440, 1),
(47, 44, '新闻修改', 'news/edit', 1, 0, 80, 1272900386, 1272900448, 1),
(48, 44, '新闻删除', 'news/delete', 1, 0, 80, 1272900400, 1272900464, 1),
(49, 0, '基本信息', '', 0, 0, 111, 1272901051, 1272901051, 1),
(50, 49, '友情链接', '', 0, 0, 0, 1272970653, 1272970653, 1),
(51, 50, '链接列表', 'links/index', 0, 0, 90, 1272970699, 1272970699, 1),
(52, 50, '链接添加', 'links/add', 0, 0, 70, 1272970707, 1272970811, 1),
(53, 50, '链接修改', 'links/edit', 1, 0, 90, 1272970723, 1272970723, 1),
(54, 50, '链接删除', 'links/delete', 1, 0, 90, 1272970736, 1272970736, 1),
(55, 17, '个人信息管理', 'account/editmy', 0, 0, 0, 1272979648, 1272979648, 1),
(56, 50, '分类列表', 'linkscate/index', 0, 0, 0, 1273066968, 1273066968, 1),
(57, 50, '分类添加', 'linkscate/add', 0, 0, 0, 1273066978, 1273066978, 1),
(58, 50, '分类修改', 'linkscate/edit', 1, 0, 0, 1273066987, 1273066987, 1),
(59, 50, '链接分类删除', 'linkscate/delete', 1, 0, 0, 1273066999, 1273066999, 1),
(60, 49, '广告管理', '', 0, 0, 79, 1273288269, 1273308322, 1),
(61, 60, '广告列表', 'ads/index', 0, 0, 99, 1273288308, 1273288308, 1),
(62, 60, '广告添加', 'ads/add', 0, 0, 80, 1273288322, 1273288322, 1),
(63, 60, '广告修改', 'ads/edit', 1, 0, 0, 1273288336, 1273288336, 1),
(64, 60, '广告修改', 'ads/delete', 1, 0, 0, 1273288342, 1273288342, 1),
(65, 49, '文件管理', '', 0, 0, 70, 1273307761, 1273308145, 1),
(66, 65, '文件列表', 'files/index', 0, 0, 99, 1273307791, 1273308115, 1),
(67, 65, '文件添加', 'files/add', 0, 0, 0, 1273307805, 1273307805, 1),
(68, 65, '文件删除', 'files/delete', 1, 0, 0, 1273307822, 1273307822, 1),
(69, 65, '文件plugindd', 'files/pluginadd', 1, 0, 0, 1273307849, 1273307849, 1),
(70, 22, '模版应用', '', 0, 0, 99, 1278426554, 1278426554, 1),
(71, 70, '模版列表', 'sitetheme', 0, 0, 0, 1278426622, 1278426622, 1),
(72, 70, '更换模版', 'sitetheme/edit', 1, 0, 0, 1278429291, 1278429291, 1);

-- --------------------------------------------------------

--
-- 表的结构 `ea_admin_role`
--

CREATE TABLE IF NOT EXISTS `ea_admin_role` (
  `role_id` int(11) NOT NULL AUTO_INCREMENT COMMENT '角色id',
  `title` varchar(30) NOT NULL COMMENT '标题',
  `remark` varchar(100) NOT NULL COMMENT '说明',
  `jur` text NOT NULL COMMENT '权限列表',
  `create_time` int(11) NOT NULL DEFAULT '0' COMMENT '创建时间',
  `edit_time` int(11) NOT NULL DEFAULT '0' COMMENT '修改时间',
  `is_del` tinyint(1) NOT NULL DEFAULT '0' COMMENT '状态',
  `account_id` int(11) NOT NULL COMMENT '操作人',
  PRIMARY KEY (`role_id`),
  KEY `is_del` (`is_del`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COMMENT='系统角色表' AUTO_INCREMENT=3 ;

--
-- 转存表中的数据 `ea_admin_role`
--

INSERT INTO `ea_admin_role` (`role_id`, `title`, `remark`, `jur`, `create_time`, `edit_time`, `is_del`, `account_id`) VALUES
(2, '系统管理员', 'sss', 'a:23:{i:0;s:2:"20";i:1;s:1:"6";i:2;s:1:"7";i:3;s:1:"8";i:4;s:1:"9";i:5;s:2:"15";i:6;s:2:"22";i:7;s:2:"23";i:8;s:2:"24";i:9;s:2:"25";i:10;s:2:"26";i:11;s:2:"27";i:12;s:2:"28";i:13;s:2:"19";i:14;s:2:"17";i:15;s:2:"18";i:16;s:2:"21";i:17;s:2:"10";i:18;s:2:"11";i:19;s:2:"29";i:20;s:2:"14";i:21;s:2:"13";i:22;s:2:"12";}', 1272695917, 1278512058, 0, 1);

-- --------------------------------------------------------

--
-- 表的结构 `ea_ads`
--

CREATE TABLE IF NOT EXISTS `ea_ads` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT '编号',
  `page_id` int(11) NOT NULL COMMENT '所在页面id',
  `title` varchar(30) NOT NULL COMMENT '标题',
  `commint` varchar(300) NOT NULL COMMENT '备注',
  `files` varchar(100) NOT NULL COMMENT '文件',
  `links` varchar(200) NOT NULL COMMENT '链接',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COMMENT='站点广告表' AUTO_INCREMENT=7 ;

--
-- 转存表中的数据 `ea_ads`
--

INSERT INTO `ea_ads` (`id`, `page_id`, `title`, `commint`, `files`, `links`) VALUES
(5, 1, 'banner', '备注', 'checkcode2.gif', ''),
(6, 8, 'banner', 'banner图片', '', '');

-- --------------------------------------------------------

--
-- 表的结构 `ea_files`
--

CREATE TABLE IF NOT EXISTS `ea_files` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT '编号',
  `type` varchar(10) NOT NULL COMMENT '类别 ',
  `title` varchar(40) NOT NULL COMMENT '名称',
  `ext` varchar(100) NOT NULL COMMENT '文件名',
  `create_time` int(11) NOT NULL COMMENT '创建时间',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COMMENT='文件上传表' AUTO_INCREMENT=57 ;

--
-- 转存表中的数据 `ea_files`
--

INSERT INTO `ea_files` (`id`, `type`, `title`, `ext`, `create_time`) VALUES
(39, '', 'easyaserverui_nginx.jpg', '.jpg', 1274724623),
(38, '', 'easyaserverui1.jpg', '.jpg', 1274724568),
(36, '', 'pic.jpg', '.jpg', 1273718439),
(37, '', 'qun.qq_.com__23_000_.jpg', '.jpg', 1274460632),
(40, '', 'editor1.jpg', '.jpg', 1275549403),
(41, '', 'editor2.jpg', '.jpg', 1275549417),
(42, '', '1.jpg', '.jpg', 1275579302),
(45, '', 'Desert.jpg', '.jpg', 1279291499),
(44, '', 'Chrysanthemum.jpg', '.jpg', 1279291316),
(46, '', '662bd041ce749d29d51876c6c4d57626.jpg', '.jpg', 1279291516),
(47, '', 'teecher.gif', '.gif', 1284564591),
(48, '', 'teecher1.gif', '.gif', 1284565154),
(49, '', '未命名.jpg', '.jpg', 1284565161),
(50, '', 'test.gif', '.gif', 1284565218),
(51, '', 'test1.gif', '.gif', 1284565272),
(52, '', '未命名1.jpg', '.jpg', 1284565281),
(53, '', 'test2.gif', '.gif', 1284565348),
(54, '', 'test3.gif', '.gif', 1284565358),
(55, '', 'http_imgload.cgi_.jpg', '.jpg', 1284565365),
(56, '', '3936d7b545bf642d33aa94b910f9d8d5.jpg', '.jpg', 1284565400);

-- --------------------------------------------------------

--
-- 表的结构 `ea_links`
--

CREATE TABLE IF NOT EXISTS `ea_links` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `cate_id` int(11) NOT NULL DEFAULT '0' COMMENT '分类id',
  `title` varchar(40) NOT NULL COMMENT '标题',
  `url` varchar(200) NOT NULL COMMENT '路径 ',
  `target` varchar(20) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COMMENT='友情链接列表' AUTO_INCREMENT=10 ;

--
-- 转存表中的数据 `ea_links`
--

INSERT INTO `ea_links` (`id`, `cate_id`, `title`, `url`, `target`) VALUES
(1, 1, 'webgame开发基地', 'http://www.webgamei.com/', '_blank'),
(2, 1, '第五动力工作室', 'http://www.d5power.com/', '_blank'),
(3, 1, 'CEMASTER 绿色程序', 'http://www.ce168.cn/', '_blank'),
(4, 2, '蒂朵衣橱', 'http://shop60816230.taobao.com/', '_blank'),
(5, 2, '-懒美人正品', 'http://shop35595658.taobao.com/', '_blank'),
(6, 1, '广升元茶庄', 'http://shop58166436.taobao.com', '_blank'),
(7, 1, '芝麻西西', 'http://www.zhima.cc', '_blank'),
(8, 1, '侠客软件', 'http://www.xiake.org', '_blank'),
(9, 1, '文博通', 'http://www.wenbotong.com', '_blank');

-- --------------------------------------------------------

--
-- 表的结构 `ea_links_cate`
--

CREATE TABLE IF NOT EXISTS `ea_links_cate` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT '编号 ',
  `title` varchar(20) NOT NULL COMMENT '分类名',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COMMENT='链接分类' AUTO_INCREMENT=3 ;

--
-- 转存表中的数据 `ea_links_cate`
--

INSERT INTO `ea_links_cate` (`id`, `title`) VALUES
(1, '标准链接'),
(2, 'Taobao商户');

-- --------------------------------------------------------

--
-- 表的结构 `ea_news`
--

CREATE TABLE IF NOT EXISTS `ea_news` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT '编号',
  `page_id` int(11) NOT NULL COMMENT '页面id',
  `title` varchar(150) NOT NULL,
  `fontsize` varchar(3) NOT NULL COMMENT '大小',
  `fontcolor` char(7) NOT NULL COMMENT '颜色',
  `tag` varchar(100) DEFAULT NULL COMMENT '标签',
  `author` varchar(15) NOT NULL COMMENT '作者',
  `address` varchar(1000) DEFAULT NULL COMMENT '文章来源',
  `content` text NOT NULL COMMENT '正文',
  `create_time` int(11) NOT NULL,
  `is_del` tinyint(1) NOT NULL COMMENT '是否删除',
  PRIMARY KEY (`id`),
  KEY `create_time` (`create_time`),
  KEY `page_id` (`page_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COMMENT='新闻表' AUTO_INCREMENT=73 ;

--
-- 转存表中的数据 `ea_news`
--

INSERT INTO `ea_news` (`id`, `page_id`, `title`, `fontsize`, `fontcolor`, `tag`, `author`, `address`, `content`, `create_time`, `is_del`) VALUES
(68, 1, '关于EATools!', '14', '000000', '', '', '', '&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; EATools 是一家服务于商务领域，以技术研发为导向，集策划、运营于一身的高素质团队。<br />\n&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 团队项目以开源项目为主，涉及的行业有纺织品、化妆品、食品、教育、娱乐，内容包括在线交易、成本管理、知识管理、CRM、ERP、OA等等。<br />\n&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 在项目的管理及风险规避方面，通过多年项目开发及运作的积累，形成了自己的项目管理和服务体系，得到广大客户的推崇。<br />\n<br />\n', 1278798680, 0),
(69, 49, '如何安装？', '14', '000000', '', 'able', 'eatools.cn', '<br />\n当你看到这个页面的时候，你应该已经完成安装操作了 （-_-）<br />\n导入doc文件夹中的sql文件， 到数据库。<br />\n修改doc/app_config.php 相关内容，并移动到与index.php文件相同目录下。（可根据index.php中的文件引用修改）<br />\n<br />\n默认后台登录地址：<br />\nhttp://[你的url]/index.php/admin<br />\n<br />\n<br />\n', 1284572870, 0),
(72, 47, '2010.09.16更新内容', '14', '000000', '', '', '', '<strong>2010.09.16更新内容</strong><br />\n整合前后台模块为同一个app<br />\n去掉controller控制器的强制后缀！<br />\n完善在线模板编辑器性能！<br />\n修改少量用户反馈BUG.<br />\n<br />\n<br />\n', 1284572797, 0);

-- --------------------------------------------------------

--
-- 表的结构 `ea_news_message`
--

CREATE TABLE IF NOT EXISTS `ea_news_message` (
  `seq` int(11) NOT NULL AUTO_INCREMENT COMMENT '编号',
  `author` char(20) NOT NULL COMMENT '作者',
  `news_id` int(11) NOT NULL COMMENT '新闻id',
  `title` varchar(100) NOT NULL COMMENT '标题',
  `create_time` int(10) NOT NULL COMMENT '提交时间',
  `message` text NOT NULL COMMENT '正文',
  `ip` int(11) NOT NULL COMMENT '用户ip',
  `is_del` tinyint(1) NOT NULL DEFAULT '1' COMMENT '是否删除',
  PRIMARY KEY (`seq`),
  KEY `news_id` (`news_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='页面留言表' AUTO_INCREMENT=1 ;

--
-- 转存表中的数据 `ea_news_message`
--


-- --------------------------------------------------------

--
-- 表的结构 `ea_photos`
--

CREATE TABLE IF NOT EXISTS `ea_photos` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT '号编',
  `title` varchar(100) NOT NULL COMMENT '题标',
  `files` text COMMENT '件文列表',
  `remark` text COMMENT '注备信息',
  `create_time` int(10) DEFAULT NULL COMMENT '创建时间',
  `is_del` tinyint(1) DEFAULT NULL COMMENT '否是删除',
  PRIMARY KEY (`id`),
  KEY `create_time` (`create_time`),
  KEY `is_del` (`is_del`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

--
-- 转存表中的数据 `ea_photos`
--


-- --------------------------------------------------------

--
-- 表的结构 `ea_server_ftp`
--

CREATE TABLE IF NOT EXISTS `ea_server_ftp` (
  `User` varchar(16) NOT NULL DEFAULT '',
  `status` enum('0','1') NOT NULL DEFAULT '0',
  `Password` varchar(64) NOT NULL DEFAULT '',
  `Uid` varchar(11) NOT NULL DEFAULT '65534',
  `Gid` varchar(11) NOT NULL DEFAULT '65534',
  `Dir` varchar(128) NOT NULL DEFAULT '',
  `ULBandwidth` smallint(5) NOT NULL DEFAULT '0',
  `DLBandwidth` smallint(5) NOT NULL DEFAULT '0',
  `comment` tinytext NOT NULL,
  `ipaccess` varchar(15) NOT NULL DEFAULT '*',
  `QuotaSize` smallint(5) NOT NULL DEFAULT '0',
  `QuotaFiles` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`User`),
  UNIQUE KEY `User` (`User`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `ea_server_ftp`
--

INSERT INTO `ea_server_ftp` (`User`, `status`, `Password`, `Uid`, `Gid`, `Dir`, `ULBandwidth`, `DLBandwidth`, `comment`, `ipaccess`, `QuotaSize`, `QuotaFiles`) VALUES
('pengbo', '1', '03f667c266990743dd11c4353556cc6f', '65534', '65534', '/home/htdocs/wenbotong.com', 0, 0, '', '*', 0, 0),
('able', '1', '1c1f8e08d96cbbbff99ebfbe4fe4a8ae', '65534', '65534', '/home/htdocs', 0, 0, '', '*', 0, 0);

-- --------------------------------------------------------

--
-- 表的结构 `ea_site_layout`
--

CREATE TABLE IF NOT EXISTS `ea_site_layout` (
  `layout_id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'id',
  `title` varchar(255) DEFAULT NULL COMMENT 'title标签名称',
  `tpl` varchar(100) DEFAULT NULL COMMENT '模版文件名',
  `admin_module` varchar(100) DEFAULT '' COMMENT '后台管理模块',
  `module` text NOT NULL COMMENT '模块信息',
  `is_del` tinyint(1) NOT NULL DEFAULT '0' COMMENT '是否有效',
  `edit_time` int(11) NOT NULL DEFAULT '0' COMMENT '最后修改时间',
  `account_id` int(11) NOT NULL COMMENT '修改人',
  PRIMARY KEY (`layout_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COMMENT='网站页面表' AUTO_INCREMENT=7 ;

--
-- 转存表中的数据 `ea_site_layout`
--

INSERT INTO `ea_site_layout` (`layout_id`, `title`, `tpl`, `admin_module`, `module`, `is_del`, `edit_time`, `account_id`) VALUES
(3, '首页布局', 'header;index;footer', 'news', 'page_model.getTop\nlinks_model.getList|''title,url,target''\nnews_model.get_page_list|$pageInfo->id,"id,title,content,create_time"|news_list', 0, 1274460059, 1),
(5, '新闻含內容列表', 'header;news;footer', 'news', 'page_model.getTop\nlinks_model.getList|''title,url,target''\nnews_model.get_page_list|$pageInfo->id,"id,title,content,create_time"|news_list', 0, 1274373536, 1),
(6, 'sitemap', 'sitemap', '', 'page_model.get_list|null|list', 0, 1273686953, 1);

-- --------------------------------------------------------

--
-- 表的结构 `ea_site_module`
--

CREATE TABLE IF NOT EXISTS `ea_site_module` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT '编号',
  `title` varchar(50) NOT NULL COMMENT '模块标题',
  `module_name` varchar(50) NOT NULL COMMENT '模块名称',
  `menu_id` int(11) DEFAULT NULL COMMENT '模块菜单id',
  `remark` varchar(100) NOT NULL COMMENT '备注',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COMMENT='站点模块表' AUTO_INCREMENT=4 ;

--
-- 转存表中的数据 `ea_site_module`
--

INSERT INTO `ea_site_module` (`id`, `title`, `module_name`, `menu_id`, `remark`) VALUES
(1, '新闻', 'news', 44, '新闻管理模块'),
(2, '友情链接', 'links', 0, '友情链接'),
(3, '图片模块', 'photos', 0, '图片类显示模块');

-- --------------------------------------------------------

--
-- 表的结构 `ea_site_page`
--

CREATE TABLE IF NOT EXISTS `ea_site_page` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'id',
  `pid` int(11) NOT NULL COMMENT '上级',
  `title` varchar(30) NOT NULL COMMENT '页面名称',
  `uri` varchar(100) DEFAULT NULL COMMENT '显示路径',
  `controller` varchar(50) NOT NULL COMMENT '使用控制器',
  `tpl` varchar(100) DEFAULT NULL COMMENT '使用的模版',
  `cache_time` int(11) NOT NULL DEFAULT '0' COMMENT '页面缓存时间',
  `orderby` int(9) NOT NULL DEFAULT '0' COMMENT '排序',
  `edit_time` int(11) NOT NULL DEFAULT '0' COMMENT '最后修改时间',
  `account_id` int(11) NOT NULL DEFAULT '0' COMMENT '操作人',
  `is_del` tinyint(1) NOT NULL DEFAULT '1' COMMENT '是否删除',
  PRIMARY KEY (`id`),
  KEY `pid` (`pid`),
  KEY `order` (`orderby`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COMMENT='网站页面表' AUTO_INCREMENT=51 ;

--
-- 转存表中的数据 `ea_site_page`
--

INSERT INTO `ea_site_page` (`id`, `pid`, `title`, `uri`, `controller`, `tpl`, `cache_time`, `orderby`, `edit_time`, `account_id`, `is_del`) VALUES
(1, 0, '首页', 'index', 'news', 'index.php', 0, 100, 1284570971, 1, 0),
(50, 49, 'show', 'news/help/content', '', 'news_content.php', 0, 100, 1284575326, 1, 1),
(49, 45, '安装使用说明', 'news/help', 'news', 'news_list.php', 0, 100, 1284575174, 1, 0),
(48, 47, 'show', 'news/update/content', '', 'news_content.php', 0, 100, 1284575333, 1, 1),
(47, 45, '更新日志', 'news/update', 'news', 'news_list.php', 0, 100, 1284575210, 1, 0),
(43, 0, 'sitemap', 'sitemap', '', 'sitemap.php', 0, 100, 1278836789, 1, 1),
(45, 0, '帮助文档', 'news', '', 'news_sublevel_list.php', 0, 100, 1284575112, 1, 0);

-- --------------------------------------------------------

--
-- 表的结构 `ea_site_theme`
--

CREATE TABLE IF NOT EXISTS `ea_site_theme` (
  `seq` int(11) NOT NULL AUTO_INCREMENT COMMENT '编号',
  `theme` varchar(300) NOT NULL COMMENT '模版目录名称',
  PRIMARY KEY (`seq`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COMMENT='模版应用设置' AUTO_INCREMENT=2 ;

--
-- 转存表中的数据 `ea_site_theme`
--

INSERT INTO `ea_site_theme` (`seq`, `theme`) VALUES
(1, 'simple_eatools');

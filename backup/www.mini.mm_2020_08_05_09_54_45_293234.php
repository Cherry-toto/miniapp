<?php die();?>/*
MySQL Database Backup Tools
Server:127.0.0.1:3306
Database:www.mini.mm
Data:2020-08-05 09:54:45
*/
SET FOREIGN_KEY_CHECKS=0;
-- ----------------------------
-- Table structure for jz_article
-- ----------------------------
DROP TABLE IF EXISTS `jz_article`;
CREATE TABLE `jz_article` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) DEFAULT NULL,
  `tid` int(11) NOT NULL DEFAULT '0',
  `molds` varchar(50) DEFAULT NULL,
  `htmlurl` varchar(50) DEFAULT NULL,
  `keywords` varchar(255) DEFAULT NULL,
  `description` varchar(500) DEFAULT NULL,
  `seo_title` varchar(255) DEFAULT NULL,
  `userid` int(11) NOT NULL DEFAULT '0',
  `litpic` varchar(255) DEFAULT NULL,
  `body` text,
  `addtime` int(11) NOT NULL DEFAULT '0',
  `orders` int(4) NOT NULL DEFAULT '0',
  `hits` int(11) NOT NULL DEFAULT '0',
  `isshow` tinyint(1) NOT NULL DEFAULT '1',
  `comment_num` int(11) NOT NULL DEFAULT '0' COMMENT '评论数',
  `istop` varchar(2) NOT NULL DEFAULT '0' COMMENT '是否置顶',
  `ishot` varchar(2) NOT NULL DEFAULT '0' COMMENT '是否头条',
  `istuijian` varchar(2) NOT NULL DEFAULT '0' COMMENT '是否推荐',
  `tags` varchar(255) DEFAULT NULL,
  `member_id` int(11) NOT NULL DEFAULT '0',
  `target` varchar(255) DEFAULT NULL,
  `ownurl` varchar(255) DEFAULT NULL,
  `video` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=24 DEFAULT CHARSET=utf8;
-- ----------------------------
-- Table structure for jz_buylog
-- ----------------------------
DROP TABLE IF EXISTS `jz_buylog`;
CREATE TABLE `jz_buylog` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `aid` int(11) DEFAULT '0',
  `userid` int(11) DEFAULT '0',
  `orderno` varchar(255) DEFAULT NULL,
  `type` tinyint(1) DEFAULT '1',
  `buytype` varchar(20) DEFAULT NULL,
  `msg` varchar(255) DEFAULT NULL,
  `molds` varchar(255) DEFAULT NULL,
  `amount` decimal(10,2) NOT NULL DEFAULT '0.00',
  `money` decimal(10,2) NOT NULL DEFAULT '0.00',
  `addtime` int(11) DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;
-- ----------------------------
-- Table structure for jz_classtype
-- ----------------------------
DROP TABLE IF EXISTS `jz_classtype`;
CREATE TABLE `jz_classtype` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `classname` varchar(50) DEFAULT NULL,
  `seo_classname` varchar(50) DEFAULT NULL,
  `molds` varchar(50) DEFAULT NULL,
  `litpic` varchar(255) DEFAULT NULL,
  `description` varchar(255) DEFAULT NULL,
  `keywords` varchar(255) DEFAULT NULL,
  `body` text,
  `orders` int(4) NOT NULL DEFAULT '0',
  `orderstype` int(4) NOT NULL DEFAULT '0',
  `isshow` tinyint(1) NOT NULL DEFAULT '1',
  `iscover` tinyint(1) NOT NULL DEFAULT '0',
  `pid` int(11) NOT NULL DEFAULT '0',
  `gid` int(11) NOT NULL DEFAULT '0' COMMENT '访问分组设定，默认0不设定',
  `htmlurl` varchar(50) DEFAULT NULL COMMENT '栏目url命名',
  `lists_html` varchar(50) DEFAULT NULL COMMENT '栏目页HTML',
  `details_html` varchar(50) DEFAULT NULL COMMENT '详情页HTML',
  `lists_num` int(4) DEFAULT '0',
  `comment_num` int(11) NOT NULL DEFAULT '0',
  `gourl` varchar(255) DEFAULT NULL COMMENT '栏目外链',
  `ishome` tinyint(1) NOT NULL DEFAULT '1' COMMENT '是否会员发布显示',
  `isclose` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=12 DEFAULT CHARSET=utf8;
-- ----------------------------
-- Table structure for jz_collect
-- ----------------------------
DROP TABLE IF EXISTS `jz_collect`;
CREATE TABLE `jz_collect` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(50) DEFAULT NULL,
  `description` varchar(200) DEFAULT NULL,
  `tid` int(11) DEFAULT NULL,
  `litpic` varchar(255) DEFAULT NULL,
  `w` varchar(10) NOT NULL DEFAULT '0',
  `h` varchar(10) NOT NULL DEFAULT '0',
  `orders` int(11) NOT NULL DEFAULT '0',
  `addtime` int(11) NOT NULL DEFAULT '0',
  `isshow` tinyint(1) NOT NULL DEFAULT '1',
  `url` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;
-- ----------------------------
-- Table structure for jz_collect_type
-- ----------------------------
DROP TABLE IF EXISTS `jz_collect_type`;
CREATE TABLE `jz_collect_type` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) DEFAULT NULL,
  `addtime` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;
-- ----------------------------
-- Table structure for jz_comment
-- ----------------------------
DROP TABLE IF EXISTS `jz_comment`;
CREATE TABLE `jz_comment` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `tid` int(4) NOT NULL DEFAULT '0' COMMENT '栏目tid',
  `aid` int(11) NOT NULL DEFAULT '0' COMMENT '文章id',
  `pid` int(11) NOT NULL DEFAULT '0' COMMENT '回复帖子id',
  `zid` int(11) NOT NULL DEFAULT '0' COMMENT '主回复帖子，同一层楼内回复，规定主回复id',
  `body` text,
  `reply` text,
  `addtime` int(11) NOT NULL DEFAULT '0',
  `userid` int(11) NOT NULL DEFAULT '0' COMMENT '用户id，0表示游客',
  `likes` decimal(10,1) NOT NULL DEFAULT '0.0' COMMENT '喜欢，点赞',
  `isshow` tinyint(1) NOT NULL DEFAULT '1' COMMENT '是否删除，1未删除，0删除',
  `isread` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `tid` (`tid`),
  KEY `aid` (`aid`),
  KEY `pid` (`pid`),
  KEY `zid` (`zid`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;
-- ----------------------------
-- Table structure for jz_customurl
-- ----------------------------
DROP TABLE IF EXISTS `jz_customurl`;
CREATE TABLE `jz_customurl` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `molds` varchar(50) DEFAULT NULL,
  `url` varchar(255) DEFAULT NULL,
  `tid` int(11) NOT NULL DEFAULT '0',
  `aid` int(11) NOT NULL DEFAULT '0',
  `addtime` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
-- ----------------------------
-- Table structure for jz_fields
-- ----------------------------
DROP TABLE IF EXISTS `jz_fields`;
CREATE TABLE `jz_fields` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `field` varchar(50) DEFAULT NULL,
  `molds` varchar(50) DEFAULT NULL,
  `fieldname` varchar(100) DEFAULT NULL,
  `tips` varchar(100) DEFAULT NULL,
  `fieldtype` tinyint(2) NOT NULL DEFAULT '1',
  `tids` text COMMENT '栏目tid',
  `fieldlong` varchar(50) DEFAULT NULL,
  `body` text,
  `orders` int(11) NOT NULL DEFAULT '1',
  `ismust` tinyint(1) NOT NULL DEFAULT '1' COMMENT '1必须填写0不必',
  `isshow` tinyint(1) NOT NULL DEFAULT '1' COMMENT '1前台显示0不显示',
  `isadmin` tinyint(1) NOT NULL DEFAULT '1' COMMENT '1后台显示0不显示',
  `issearch` tinyint(1) NOT NULL DEFAULT '0' COMMENT '1显示搜索，0不显示搜索',
  `islist` tinyint(1) NOT NULL DEFAULT '0' COMMENT '是否列表中显示',
  `format` varchar(50) DEFAULT NULL COMMENT '显示格式化',
  `vdata` varchar(50) DEFAULT NULL COMMENT '字段默认值',
  `isajax` tinyint(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=19 DEFAULT CHARSET=utf8;
-- ----------------------------
-- Table structure for jz_hook
-- ----------------------------
DROP TABLE IF EXISTS `jz_hook`;
CREATE TABLE `jz_hook` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `module` varchar(50) DEFAULT NULL COMMENT '模块，Home/A',
  `namespace` varchar(100) DEFAULT NULL COMMENT '控制器命名空间',
  `controller` varchar(50) DEFAULT NULL COMMENT '控制器',
  `action` varchar(255) DEFAULT NULL COMMENT '方法,可同时注册多个方法，逗号拼接',
  `hook_namespace` varchar(100) DEFAULT NULL COMMENT '钩子控制器所在的命名空间',
  `hook_controller` varchar(50) DEFAULT NULL COMMENT '钩子控制器',
  `hook_action` varchar(50) DEFAULT NULL COMMENT '钩子执行方法',
  `all_action` tinyint(1) NOT NULL DEFAULT '0' COMMENT '是否全局控制器',
  `orders` int(4) NOT NULL DEFAULT '0' COMMENT '排序，越大越靠前执行',
  `isopen` tinyint(1) NOT NULL DEFAULT '0' COMMENT '插件是否关闭，默认0关闭',
  `plugins_name` varchar(50) DEFAULT NULL COMMENT '关联插件名',
  `addtime` int(11) NOT NULL DEFAULT '0' COMMENT '添加时间',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COMMENT='插件钩子';
-- ----------------------------
-- Table structure for jz_layout
-- ----------------------------
DROP TABLE IF EXISTS `jz_layout`;
CREATE TABLE `jz_layout` (
  `id` int(4) NOT NULL AUTO_INCREMENT,
  `name` varchar(200) DEFAULT NULL,
  `top_layout` text,
  `left_layout` text,
  `gid` int(11) DEFAULT NULL,
  `ext` varchar(255) DEFAULT NULL,
  `sys` tinyint(1) NOT NULL DEFAULT '0',
  `isdefault` tinyint(1) NOT NULL DEFAULT '0' COMMENT '1系统默认布局',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;
-- ----------------------------
-- Table structure for jz_level
-- ----------------------------
DROP TABLE IF EXISTS `jz_level`;
CREATE TABLE `jz_level` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(20) DEFAULT NULL,
  `pass` varchar(100) DEFAULT NULL,
  `tel` varchar(20) DEFAULT NULL,
  `gid` int(4) NOT NULL DEFAULT '2',
  `email` varchar(50) DEFAULT NULL,
  `regtime` int(11) NOT NULL DEFAULT '0',
  `logintime` int(11) NOT NULL DEFAULT '0',
  `status` tinyint(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`),
  UNIQUE KEY `logintime` (`logintime`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;
-- ----------------------------
-- Table structure for jz_level_group
-- ----------------------------
DROP TABLE IF EXISTS `jz_level_group`;
CREATE TABLE `jz_level_group` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) DEFAULT NULL,
  `isadmin` tinyint(1) NOT NULL DEFAULT '0' COMMENT '是否管理员，最高权限，无视控制器限制',
  `classcontrol` tinyint(1) NOT NULL DEFAULT '0',
  `paction` text COMMENT '动作参数，控制器/方法，如Admin/index',
  `tids` text,
  `isagree` tinyint(1) NOT NULL DEFAULT '1' COMMENT '1允许登录0不允许',
  `description` varchar(500) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;
-- ----------------------------
-- Table structure for jz_link_type
-- ----------------------------
DROP TABLE IF EXISTS `jz_link_type`;
CREATE TABLE `jz_link_type` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) DEFAULT NULL,
  `addtime` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;
-- ----------------------------
-- Table structure for jz_links
-- ----------------------------
DROP TABLE IF EXISTS `jz_links`;
CREATE TABLE `jz_links` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(255) DEFAULT NULL,
  `molds` varchar(50) DEFAULT 'links',
  `url` varchar(255) DEFAULT NULL,
  `isshow` tinyint(1) DEFAULT '1',
  `tid` int(11) NOT NULL DEFAULT '0',
  `userid` int(11) NOT NULL DEFAULT '0',
  `htmlurl` varchar(50) DEFAULT NULL,
  `orders` int(11) NOT NULL DEFAULT '0',
  `member_id` int(11) NOT NULL DEFAULT '0',
  `target` varchar(255) DEFAULT NULL,
  `ownurl` varchar(255) DEFAULT NULL,
  `addtime` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;
-- ----------------------------
-- Table structure for jz_member
-- ----------------------------
DROP TABLE IF EXISTS `jz_member`;
CREATE TABLE `jz_member` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(50) DEFAULT NULL,
  `openid` varchar(255) DEFAULT NULL,
  `pass` varchar(255) DEFAULT NULL,
  `token` varchar(255) DEFAULT NULL COMMENT '记住密码或者忘记密码使用',
  `sex` tinyint(1) NOT NULL DEFAULT '0' COMMENT '1男2女0未知',
  `gid` int(11) NOT NULL DEFAULT '1' COMMENT '分组ID',
  `litpic` varchar(255) DEFAULT NULL,
  `tel` varchar(50) DEFAULT NULL,
  `jifen` decimal(10,2) NOT NULL DEFAULT '0.00',
  `likes` text COMMENT '喜欢/点赞的文章id,||tid-id||tid-id||',
  `collection` text COMMENT '收藏存储，||tid-id||tid-id||',
  `money` decimal(10,2) NOT NULL DEFAULT '0.00',
  `email` varchar(255) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `province` varchar(50) DEFAULT NULL,
  `city` varchar(50) DEFAULT NULL,
  `regtime` int(11) NOT NULL DEFAULT '0',
  `logintime` int(11) NOT NULL DEFAULT '0',
  `isshow` tinyint(1) NOT NULL DEFAULT '1',
  `signature` varchar(255) DEFAULT NULL COMMENT '个性签名',
  `birthday` varchar(25) DEFAULT NULL COMMENT '生日：2020-01-01',
  `follow` text COMMENT '关注列表',
  `fans` int(11) NOT NULL DEFAULT '0' COMMENT '粉丝数',
  `ismsg` tinyint(1) NOT NULL DEFAULT '1' COMMENT '是否开启接收消息提醒',
  `iscomment` tinyint(1) NOT NULL DEFAULT '1' COMMENT '是否开启接收评论消息提醒',
  `iscollect` tinyint(1) NOT NULL DEFAULT '1' COMMENT '是否开启接收收藏消息提醒',
  `islikes` tinyint(1) NOT NULL DEFAULT '1' COMMENT '是否开启接收点赞消息提醒',
  `isat` tinyint(1) NOT NULL DEFAULT '1' COMMENT '是否开启接收@消息提醒',
  `isrechange` tinyint(1) NOT NULL DEFAULT '1' COMMENT '是否开启接收交易消息提醒',
  `pid` int(11) NOT NULL DEFAULT '0' COMMENT '推荐用户ID',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;
-- ----------------------------
-- Table structure for jz_member_group
-- ----------------------------
DROP TABLE IF EXISTS `jz_member_group`;
CREATE TABLE `jz_member_group` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) DEFAULT NULL COMMENT '分组名',
  `description` varchar(255) DEFAULT NULL COMMENT '分组简介',
  `paction` text COMMENT '权限',
  `pid` int(11) NOT NULL DEFAULT '0' COMMENT '分组上级',
  `isagree` tinyint(1) NOT NULL DEFAULT '1' COMMENT '是否允许登录',
  `iscomment` tinyint(1) NOT NULL DEFAULT '1' COMMENT '是否允许评论',
  `ischeckmsg` tinyint(1) NOT NULL DEFAULT '1' COMMENT '是否需要审核评论',
  `addtime` int(11) NOT NULL DEFAULT '0' COMMENT '添加时间',
  `orders` int(11) NOT NULL DEFAULT '0',
  `discount` decimal(10,2) NOT NULL DEFAULT '0.00' COMMENT '折扣价，现金折扣或者百分比折扣',
  `discount_type` tinyint(1) NOT NULL DEFAULT '0' COMMENT '0无折扣,1现金折扣,1百分比折扣',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COMMENT='会员分组';
-- ----------------------------
-- Table structure for jz_message
-- ----------------------------
DROP TABLE IF EXISTS `jz_message`;
CREATE TABLE `jz_message` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) DEFAULT NULL,
  `userid` int(11) NOT NULL DEFAULT '0',
  `tid` int(4) NOT NULL DEFAULT '0',
  `aid` int(11) NOT NULL DEFAULT '0',
  `user` varchar(255) DEFAULT NULL,
  `ip` varchar(255) DEFAULT NULL,
  `body` text,
  `tel` varchar(50) DEFAULT NULL,
  `addtime` int(11) NOT NULL DEFAULT '0',
  `orders` int(4) NOT NULL DEFAULT '0',
  `email` varchar(255) DEFAULT NULL,
  `isshow` tinyint(1) NOT NULL DEFAULT '0',
  `istop` tinyint(1) NOT NULL DEFAULT '0',
  `hits` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
-- ----------------------------
-- Table structure for jz_molds
-- ----------------------------
DROP TABLE IF EXISTS `jz_molds`;
CREATE TABLE `jz_molds` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) DEFAULT NULL,
  `biaoshi` varchar(50) DEFAULT NULL,
  `sys` tinyint(1) NOT NULL DEFAULT '0',
  `isopen` tinyint(1) NOT NULL DEFAULT '1',
  `iscontrol` tinyint(1) NOT NULL DEFAULT '0',
  `ismust` tinyint(1) NOT NULL DEFAULT '0',
  `isclasstype` tinyint(1) NOT NULL DEFAULT '1',
  `isshowclass` tinyint(1) DEFAULT '1',
  `list_html` varchar(50) DEFAULT 'list.html',
  `details_html` varchar(50) DEFAULT 'details.html',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=14 DEFAULT CHARSET=utf8;
-- ----------------------------
-- Table structure for jz_orders
-- ----------------------------
DROP TABLE IF EXISTS `jz_orders`;
CREATE TABLE `jz_orders` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `orderno` varchar(255) DEFAULT NULL,
  `userid` int(11) NOT NULL DEFAULT '0',
  `paytype` varchar(20) DEFAULT NULL COMMENT '支付方式',
  `ptype` tinyint(1) DEFAULT '1' COMMENT '1商品购买2充值金额3充值积分',
  `tel` varchar(50) DEFAULT NULL,
  `username` varchar(50) DEFAULT NULL,
  `tid` int(11) NOT NULL DEFAULT '0',
  `price` varchar(200) DEFAULT NULL,
  `jifen` decimal(10,2) NOT NULL DEFAULT '0.00',
  `qianbao` decimal(10,2) NOT NULL DEFAULT '0.00',
  `body` text,
  `receive_username` varchar(50) DEFAULT NULL,
  `receive_tel` varchar(20) DEFAULT NULL,
  `receive_email` varchar(50) DEFAULT NULL,
  `receive_address` varchar(255) DEFAULT NULL,
  `ispay` tinyint(1) NOT NULL DEFAULT '0',
  `paytime` int(11) NOT NULL DEFAULT '0',
  `addtime` int(11) NOT NULL DEFAULT '0',
  `send_time` int(11) NOT NULL DEFAULT '0' COMMENT '发货时间',
  `isshow` tinyint(1) NOT NULL DEFAULT '1' COMMENT '1提交订单,2已支付,3超时,4已提交订单,5已发货,6已废弃失效,0删除订单',
  `discount` decimal(10,2) NOT NULL DEFAULT '0.00',
  `yunfei` decimal(10,2) NOT NULL DEFAULT '0.00',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
-- ----------------------------
-- Table structure for jz_page
-- ----------------------------
DROP TABLE IF EXISTS `jz_page`;
CREATE TABLE `jz_page` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `tid` int(11) NOT NULL DEFAULT '0',
  `htmlurl` varchar(50) DEFAULT NULL,
  `orders` int(11) NOT NULL DEFAULT '0',
  `member_id` int(11) NOT NULL DEFAULT '0',
  `isshow` tinyint(1) DEFAULT '1',
  `istop` tinyint(1) NOT NULL DEFAULT '0',
  `hits` int(11) NOT NULL DEFAULT '0',
  `addtime` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
-- ----------------------------
-- Table structure for jz_pictures
-- ----------------------------
DROP TABLE IF EXISTS `jz_pictures`;
CREATE TABLE `jz_pictures` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `tid` int(11) NOT NULL DEFAULT '0',
  `aid` int(11) NOT NULL DEFAULT '0',
  `molds` varchar(50) DEFAULT NULL,
  `path` varchar(20) DEFAULT 'Admin',
  `filetype` varchar(20) DEFAULT NULL,
  `size` varchar(50) DEFAULT NULL,
  `litpic` varchar(255) DEFAULT NULL,
  `addtime` int(11) NOT NULL DEFAULT '0',
  `userid` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=35 DEFAULT CHARSET=utf8 COMMENT='图片集';
-- ----------------------------
-- Table structure for jz_plugins
-- ----------------------------
DROP TABLE IF EXISTS `jz_plugins`;
CREATE TABLE `jz_plugins` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) DEFAULT NULL,
  `filepath` varchar(50) DEFAULT NULL COMMENT '插件文件名',
  `description` varchar(255) DEFAULT NULL,
  `version` decimal(2,1) NOT NULL DEFAULT '0.0',
  `author` varchar(50) DEFAULT NULL,
  `update_time` int(11) NOT NULL DEFAULT '0',
  `module` varchar(20) NOT NULL DEFAULT 'Home',
  `isopen` tinyint(1) NOT NULL DEFAULT '0',
  `addtime` int(11) NOT NULL DEFAULT '0',
  `config` text COMMENT '配置',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;
-- ----------------------------
-- Table structure for jz_power
-- ----------------------------
DROP TABLE IF EXISTS `jz_power`;
CREATE TABLE `jz_power` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `action` varchar(50) DEFAULT NULL,
  `name` varchar(50) DEFAULT NULL,
  `pid` int(11) NOT NULL DEFAULT '0',
  `isagree` tinyint(1) NOT NULL DEFAULT '1' COMMENT '是否开放',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=77 DEFAULT CHARSET=utf8 COMMENT='用户权限表';
-- ----------------------------
-- Table structure for jz_product
-- ----------------------------
DROP TABLE IF EXISTS `jz_product`;
CREATE TABLE `jz_product` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `molds` varchar(50) DEFAULT 'product',
  `title` varchar(255) DEFAULT NULL,
  `seo_title` varchar(255) DEFAULT NULL,
  `tid` int(11) NOT NULL DEFAULT '0',
  `hits` int(11) NOT NULL DEFAULT '0',
  `htmlurl` varchar(50) DEFAULT NULL,
  `keywords` varchar(255) DEFAULT NULL,
  `description` varchar(255) DEFAULT NULL,
  `litpic` varchar(255) DEFAULT NULL COMMENT '首图',
  `stock_num` int(11) NOT NULL DEFAULT '0' COMMENT '库存',
  `price` decimal(10,2) NOT NULL DEFAULT '0.00',
  `pictures` text COMMENT '图集',
  `isshow` tinyint(1) NOT NULL DEFAULT '1' COMMENT '1显示,0不显示',
  `comment_num` int(11) NOT NULL DEFAULT '0',
  `body` text COMMENT '内容',
  `userid` int(11) NOT NULL DEFAULT '0' COMMENT '录入管理员',
  `orders` int(11) NOT NULL DEFAULT '0',
  `addtime` int(11) NOT NULL DEFAULT '0' COMMENT '更新时间',
  `istop` varchar(2) NOT NULL DEFAULT '0' COMMENT '是否置顶',
  `ishot` varchar(2) NOT NULL DEFAULT '0' COMMENT '是否头条',
  `istuijian` varchar(2) NOT NULL DEFAULT '0' COMMENT '是否推荐',
  `tags` varchar(255) DEFAULT NULL,
  `member_id` int(11) NOT NULL DEFAULT '0',
  `target` varchar(255) DEFAULT NULL,
  `ownurl` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='商品表';
-- ----------------------------
-- Table structure for jz_ruler
-- ----------------------------
DROP TABLE IF EXISTS `jz_ruler`;
CREATE TABLE `jz_ruler` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) DEFAULT NULL,
  `fc` varchar(50) DEFAULT NULL,
  `pid` int(11) NOT NULL DEFAULT '0',
  `isdesktop` tinyint(1) NOT NULL DEFAULT '0',
  `sys` tinyint(1) NOT NULL DEFAULT '0' COMMENT '1系统自带0不是系统自带',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=190 DEFAULT CHARSET=utf8;
-- ----------------------------
-- Table structure for jz_sysconfig
-- ----------------------------
DROP TABLE IF EXISTS `jz_sysconfig`;
CREATE TABLE `jz_sysconfig` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `field` varchar(50) DEFAULT NULL COMMENT '配置字段',
  `title` varchar(255) DEFAULT NULL COMMENT '配置名称',
  `tip` varchar(255) DEFAULT NULL COMMENT '字段填写提示',
  `type` tinyint(1) NOT NULL DEFAULT '0' COMMENT '配置类型,0系统配置,1图片类型,2输入框,3简短文字',
  `data` text COMMENT '配置内容',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=116 DEFAULT CHARSET=utf8;
-- ----------------------------
-- Table structure for jz_tags
-- ----------------------------
DROP TABLE IF EXISTS `jz_tags`;
CREATE TABLE `jz_tags` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `tid` int(11) DEFAULT '0',
  `orders` int(11) DEFAULT '0',
  `comment_num` int(11) DEFAULT '0',
  `molds` varchar(50) DEFAULT 'tags',
  `htmlurl` varchar(100) DEFAULT NULL,
  `keywords` varchar(50) DEFAULT NULL,
  `newname` varchar(50) DEFAULT NULL,
  `url` varchar(255) DEFAULT NULL,
  `num` int(4) DEFAULT '-1',
  `isshow` tinyint(1) DEFAULT '1',
  `target` varchar(50) DEFAULT '_blank',
  `number` int(11) DEFAULT '0',
  `member_id` int(11) DEFAULT '0',
  `ownurl` varchar(255) DEFAULT NULL,
  `addtime` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;
-- ----------------------------
-- Table structure for jz_task
-- ----------------------------
DROP TABLE IF EXISTS `jz_task`;
CREATE TABLE `jz_task` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `tid` int(11) DEFAULT '0',
  `aid` int(11) DEFAULT '0',
  `userid` int(11) DEFAULT '0',
  `puserid` int(11) DEFAULT '0',
  `molds` varchar(50) DEFAULT NULL,
  `type` varchar(50) DEFAULT NULL,
  `body` varchar(255) DEFAULT NULL,
  `url` varchar(255) DEFAULT NULL,
  `isread` tinyint(1) DEFAULT '0',
  `isshow` tinyint(1) DEFAULT '1',
  `readtime` int(11) DEFAULT '0',
  `addtime` int(11) DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;
-- ----------------------------
-- Records of jz_article
-- ----------------------------
INSERT INTO `jz_article` (`id`,`title`,`tid`,`molds`,`htmlurl`,`keywords`,`description`,`seo_title`,`userid`,`litpic`,`body`,`addtime`,`orders`,`hits`,`isshow`,`comment_num`,`istop`,`ishot`,`istuijian`,`tags`,`member_id`,`target`,`ownurl`,`video`) VALUES ('1','极致CMS官方默认通用响应式模板','8','article','responsive','jizhicms,极致CMS','开源免费，无商业授权，仅需记住几个简单的模板标签，小白也能搭建一个简单的网站，让你简单快乐的工作。','极致CMS官方默认通用响应式模板','1','/static/upload/202008039248.png','<p>开源免费，无商业授权，仅需记住几个简单的模板标签，小白也能搭建一个简单的网站，让你简单快乐的工作。商业授权，仅需记住几个简单的模板标签，小白也能搭建一个简单的网站，让你简单快乐的工作。</p>','1596435217','0','10','1','0','0','0','1',',响应式,','0', NULL, NULL, NULL);
INSERT INTO `jz_article` (`id`,`title`,`tid`,`molds`,`htmlurl`,`keywords`,`description`,`seo_title`,`userid`,`litpic`,`body`,`addtime`,`orders`,`hits`,`isshow`,`comment_num`,`istop`,`ishot`,`istuijian`,`tags`,`member_id`,`target`,`ownurl`,`video`) VALUES ('2','办公用品响应式模板','8','article','responsive','jizhicms,响应式','简单产品类模板，简洁好用，精品大方！','办公用品响应式模板','1','/static/upload/202008037900.png','<p>简单产品类模板，简洁好用，精品大方！简单产品类模板，简洁好用，精品大方！简单产品类模板，简洁好用，精品大方！简单产品类模板，简洁好用，精品大方！简单产品类模板，简洁好用，精品大方！</p>','1596435392','0','2','1','0','0','0','0',',响应式,','0', NULL, NULL, NULL);
INSERT INTO `jz_article` (`id`,`title`,`tid`,`molds`,`htmlurl`,`keywords`,`description`,`seo_title`,`userid`,`litpic`,`body`,`addtime`,`orders`,`hits`,`isshow`,`comment_num`,`istop`,`ishot`,`istuijian`,`tags`,`member_id`,`target`,`ownurl`,`video`) VALUES ('3','新闻资讯类响应式模板','8','article','responsive','响应式,资讯新闻','新闻资讯类响应式模板新闻资讯类响应式模板新闻资讯类响应式模板','新闻资讯类响应式模板','1','/static/upload/202008037072.png','<p>新闻资讯类响应式模板新闻资讯类响应式模板新闻资讯类响应式模板新闻资讯类响应式模板新闻资讯类响应式模板新闻资讯类响应式模板新闻资讯类响应式模板新闻资讯类响应式模板新闻资讯类响应式模板新闻资讯类响应式模板新闻资讯类响应式模板新闻资讯类响应式模板新闻资讯类响应式模板新闻资讯类响应式模板新闻资讯类响应式模板新闻资讯类响应式模板新闻资讯类响应式模板新闻资讯类响应式模板</p>','1596435633','0','1','1','0','0','0','0',',响应式,','0', NULL, NULL, NULL);
INSERT INTO `jz_article` (`id`,`title`,`tid`,`molds`,`htmlurl`,`keywords`,`description`,`seo_title`,`userid`,`litpic`,`body`,`addtime`,`orders`,`hits`,`isshow`,`comment_num`,`istop`,`ishot`,`istuijian`,`tags`,`member_id`,`target`,`ownurl`,`video`) VALUES ('4','个人博客综合门户响应式模板','8','article','responsive','个人博客,门户,响应式','通用型个人博客，门户类型模板，精美大方！','个人博客综合门户响应式模板','1','/static/upload/202008036989.png','<p>通用型个人博客，门户类型模板，精美大方！通用型个人博客，门户类型模板，精美大方！通用型个人博客，门户类型模板，精美大方！通用型个人博客，门户类型模板，精美大方！通用型个人博客，门户类型模板，精美大方！通用型个人博客，门户类型模板，精美大方！通用型个人博客，门户类型模板，精美大方！通用型个人博客，门户类型模板，精美大方！通用型个人博客，门户类型模板，精美大方！通用型个人博客，门户类型模板，精美大方！</p>','1596435694','0','3','1','0','0','0','0',',响应式,博客,','0', NULL, NULL, NULL);
INSERT INTO `jz_article` (`id`,`title`,`tid`,`molds`,`htmlurl`,`keywords`,`description`,`seo_title`,`userid`,`litpic`,`body`,`addtime`,`orders`,`hits`,`isshow`,`comment_num`,`istop`,`ishot`,`istuijian`,`tags`,`member_id`,`target`,`ownurl`,`video`) VALUES ('5','黑色系精美夜读响应式模板','8','article','responsive','黑色系,响应式','黑色高端大气上档次模板！响应式完美兼容手机端！','黑色系精美夜读响应式模板','1','/static/upload/202008039444.png','<p>黑色高端大气上档次模板！响应式完美兼容手机端！黑色高端大气上档次模板！响应式完美兼容手机端！黑色高端大气上档次模板！响应式完美兼容手机端！黑色高端大气上档次模板！响应式完美兼容手机端！黑色高端大气上档次模板！响应式完美兼容手机端！黑色高端大气上档次模板！响应式完美兼容手机端！黑色高端大气上档次模板！响应式完美兼容手机端！黑色高端大气上档次模板！响应式完美兼容手机端！</p>','1596435792','0','5','1','0','0','0','0',',响应式,','0', NULL, NULL, NULL);
INSERT INTO `jz_article` (`id`,`title`,`tid`,`molds`,`htmlurl`,`keywords`,`description`,`seo_title`,`userid`,`litpic`,`body`,`addtime`,`orders`,`hits`,`isshow`,`comment_num`,`istop`,`ishot`,`istuijian`,`tags`,`member_id`,`target`,`ownurl`,`video`) VALUES ('6','导航系列响应式模板','8','article','responsive','导航,响应式','通用导航类模板，自带响应式，各种行业都可以使用！','导航系列响应式模板','1','/static/upload/202008034532.png','<p>通用导航类模板，自带响应式，各种行业都可以使用！通用导航类模板，自带响应式，各种行业都可以使用！通用导航类模板，自带响应式，各种行业都可以使用！通用导航类模板，自带响应式，各种行业都可以使用！通用导航类模板，自带响应式，各种行业都可以使用！通用导航类模板，自带响应式，各种行业都可以使用！通用导航类模板，自带响应式，各种行业都可以使用！通用导航类模板，自带响应式，各种行业都可以使用！</p>','1596436096','0','7','1','0','0','0','0',',响应式,','0', NULL, NULL, NULL);
INSERT INTO `jz_article` (`id`,`title`,`tid`,`molds`,`htmlurl`,`keywords`,`description`,`seo_title`,`userid`,`litpic`,`body`,`addtime`,`orders`,`hits`,`isshow`,`comment_num`,`istop`,`ishot`,`istuijian`,`tags`,`member_id`,`target`,`ownurl`,`video`) VALUES ('7','精仿小刀娱乐资源网模板','8','article','responsive','小刀,响应式','精仿小刀模板，搭建资源网站必备！','精仿小刀娱乐资源网模板','1','/static/upload/202008037661.png','<p>精仿小刀模板，搭建资源网站必备！精仿小刀模板，搭建资源网站必备！精仿小刀模板，搭建资源网站必备！精仿小刀模板，搭建资源网站必备！精仿小刀模板，搭建资源网站必备！精仿小刀模板，搭建资源网站必备！精仿小刀模板，搭建资源网站必备！精仿小刀模板，搭建资源网站必备！精仿小刀模板，搭建资源网站必备！精仿小刀模板，搭建资源网站必备！精仿小刀模板，搭建资源网站必备！</p>','1596436181','0','36','1','2','0','0','0',',响应式,','0', NULL, NULL, NULL);
INSERT INTO `jz_article` (`id`,`title`,`tid`,`molds`,`htmlurl`,`keywords`,`description`,`seo_title`,`userid`,`litpic`,`body`,`addtime`,`orders`,`hits`,`isshow`,`comment_num`,`istop`,`ishot`,`istuijian`,`tags`,`member_id`,`target`,`ownurl`,`video`) VALUES ('8','极致小程序','10','article','wechatmini','小程序','精美站长小程序，可以作为个人站长，门户，或者资讯类网站使用','极致小程序','1','/static/upload/202008038887.png','<p>精美站长小程序，可以作为个人站长，门户，或者资讯类网站使用精美站长小程序，可以作为个人站长，门户，或者资讯类网站使用精美站长小程序，可以作为个人站长，门户，或者资讯类网站使用精美站长小程序，可以作为个人站长，门户，或者资讯类网站使用精美站长小程序，可以作为个人站长，门户，或者资讯类网站使用精美站长小程序，可以作为个人站长，门户，或者资讯类网站使用精美站长小程序，可以作为个人站长，门户，或者资讯类网站使用</p>','1596436297','0','7','1','0','0','0','1',',小程序,','0', NULL, NULL, NULL);
INSERT INTO `jz_article` (`id`,`title`,`tid`,`molds`,`htmlurl`,`keywords`,`description`,`seo_title`,`userid`,`litpic`,`body`,`addtime`,`orders`,`hits`,`isshow`,`comment_num`,`istop`,`ishot`,`istuijian`,`tags`,`member_id`,`target`,`ownurl`,`video`) VALUES ('9','每日摸鱼吧小程序','10','article','wechatmini','小程序','娱乐搞笑文案类型小程序，自带收藏复制文案，下载图片功能！','每日摸鱼吧小程序','1','/static/upload/202008031709.png','<p>娱乐搞笑文案类型小程序，自带收藏复制文案，下载图片功能！娱乐搞笑文案类型小程序，自带收藏复制文案，下载图片功能！娱乐搞笑文案类型小程序，自带收藏复制文案，下载图片功能！娱乐搞笑文案类型小程序，自带收藏复制文案，下载图片功能！娱乐搞笑文案类型小程序，自带收藏复制文案，下载图片功能！娱乐搞笑文案类型小程序，自带收藏复制文案，下载图片功能！</p>','1596437558','0','6','1','0','0','0','0',',小程序,','0', NULL, NULL, NULL);
INSERT INTO `jz_article` (`id`,`title`,`tid`,`molds`,`htmlurl`,`keywords`,`description`,`seo_title`,`userid`,`litpic`,`body`,`addtime`,`orders`,`hits`,`isshow`,`comment_num`,`istop`,`ishot`,`istuijian`,`tags`,`member_id`,`target`,`ownurl`,`video`) VALUES ('10','网站做了seo优化为什么还是没有排名?','6','article','seo','seo优化','本站SEO是非黑帽排名，也没什么点击软件之类的出售，请勿在询问。截止2020年7月，PC排名稳定上词(上词率在90%+，这个是真实上词率，可测试)，上线时间一般在3-7天，个别词周...','网站做了seo优化为什么还是没有排名?','1','/static/upload/202008036887.jpg','<p>本站SEO是非黑帽排名，也没什么点击软件之类的出售，请勿在询问。截止2020年7月，PC排名稳定上词(上词率在90%+，这个是真实上词率，可测试)，上线时间一般在3-7天，个别词周期可能会长些15天左右。价格我们不能保证全网最低，但是同样效果的情况下，本站价格不会比其他家高。同个效果比价格，同个价格比效果。建议新客户多咨询几家多做对比做到心里有数。</p><p>2020年最新快速排名技术，纯一手资源，市场80%以上快速排名、神马快速排名等代理均来至我们这。无论你在电脑端或手机端，电脑端或手机端还是其他其搜索引擎搜索与快速排名相关关键词，我们均常年排名稳定，实力见证一切。我们不是一个月按保证25天在首页就算一个月的，更不是计费从你提交关键词时就开始算的。我们是关键词排名上首页后才开始计费的，不在首页不计费，在首页一天计费一天。也就是给你的关键词快速排名报价是保证你排名在首页或前三30天的费用。真正的按效果付费！关键词上首页后稳定也性毋容置疑，不管是电脑端关键词快照排名还是手机移动端关键词快照排名上首页后基本稳定在前3。全新的关键词排名优化系统，关键词添加、删除、更新、每天排名及扣费情况、财务等信息应有尽有。让你可以自主管理自己的关键词，你更可以给你的客户开设后台，让你的客户像你一样自行管理关键词。！</p><p><br/></p>','1596437684','0','2','1','0','0','0','0',',seo,','0', NULL, NULL, NULL);
INSERT INTO `jz_article` (`id`,`title`,`tid`,`molds`,`htmlurl`,`keywords`,`description`,`seo_title`,`userid`,`litpic`,`body`,`addtime`,`orders`,`hits`,`isshow`,`comment_num`,`istop`,`ishot`,`istuijian`,`tags`,`member_id`,`target`,`ownurl`,`video`) VALUES ('11','企业和个人进行SEO培训的学习目录大纲','6','article','seo','seo培训','一、为什么要进行SEO培训SEO培训将使公司网站推广和SEO团队在最短时间内掌握正确、系统、高效、安全的SEO实战方法及技术。seo培训二、SEO培训适用对象：1.公司网络营...','企业和个人进行SEO培训的学习目录大纲','1','/static/upload/202008031872.jpg','<p>&nbsp; 一、为什么要进行SEO培训</p><p>&nbsp; &nbsp; SEO培训将使公司网站推广和SEO团队在最短时间内掌握正确、系统、高效、安全的SEO实战方法及技术。</p><p>&nbsp;</p><p>seo培训</p><p>&nbsp; &nbsp; 二、SEO培训适用对象：</p><p>&nbsp; &nbsp; 1.公司网络营销及SEO团队</p><p>&nbsp; &nbsp; 2.公司网站技术及开发团队</p><p>&nbsp; &nbsp; 3.与网站运营有关的各部门负责人</p><p>&nbsp; &nbsp; 4.网站内容创作、编辑团队</p><p>&nbsp;</p><p>seo优化</p><p>&nbsp; &nbsp; 三、SEO培训内容：</p><p>&nbsp; &nbsp; 培训内容视客户情况和要求调整，如参加人员岗位、SEO经验、建站基础、网站情况及其他客户提出的特定要求。</p><p>&nbsp; &nbsp; 1.搜索引擎工作原理</p><p>&nbsp; &nbsp; 2.市场及关键词研究</p><p>&nbsp; &nbsp; 3.网站架构优化技巧</p><p>&nbsp; &nbsp; 4.页面优化基础</p><p>&nbsp; &nbsp; 5.外部链接建设常用方法</p><p>&nbsp; &nbsp; 6.移动搜索优化</p><p>&nbsp; &nbsp; 7.流量分析及策略修改</p><p>&nbsp; &nbsp; 8.怎样避免作弊和惩罚</p><p>&nbsp; &nbsp; 9.案例分析或客户网站简单诊断</p><p>&nbsp;</p><p>seo工具</p><p>&nbsp; &nbsp; 四、SEO专业培训心得</p><p>&nbsp; &nbsp; 1.SEO不仅仅是为了排名，SEO的本质是提升有效流量，促进转化和品牌建设!</p><p>&nbsp; &nbsp; 2.SEO网络营销要注重整体网站权重的提升，不要太看重某个词的排名!</p><p>&nbsp; &nbsp; 3.先做好转化率再进行SEO或其他网络营销手段推广才不会白白的损失流量!</p><p>&nbsp; &nbsp; 4.原创是SEO的根本，内链是降低网站跳出率的法宝，外链是快速提升排名的利器!</p><p>&nbsp; &nbsp; 5.一切不以营销或转化为目的的SEO都是耍流氓，SEO的重心应该放在营销上!</p><p>&nbsp; &nbsp; 6.外链核心三要素–相关性、稳定性和收录率。相关性是外链核心中的核心!</p><p>&nbsp; &nbsp; 7.运用SEO技术和思维在提升排名、流量和转化的同时一定要注意品牌建设!</p><p>&nbsp; &nbsp; 8.品牌是口碑SEO的首选，成功打造了品牌后推广不再费力，更不怕百度算法的波动!做SEO要淡定，有频率的更新内容和外链建设，讲究优质内容，宁缺毋滥!</p><p>&nbsp; &nbsp; 9.SEO赚钱韩哥为您分解：SEO赚钱速度提升10倍以上!</p><p>&nbsp;</p><p>教学</p><p>&nbsp; &nbsp; 五、SEO培训课程章节：（具体根据学员情况来定）</p><p>&nbsp; &nbsp; 第1章：SEO概述</p><p>&nbsp; &nbsp; 1.SEO简介：</p><p>&nbsp; &nbsp; 2.SEO是什么?</p><p>&nbsp; &nbsp; 3.为啥要学习SEO?</p><p>&nbsp; &nbsp; 4.SEO人员的基本素养是什么?</p><p>&nbsp; &nbsp; 5.正确理解SEO：</p><p>&nbsp; &nbsp; SEO不能等同于作弊</p><p>&nbsp; &nbsp; SEO内容为王</p><p>&nbsp; &nbsp; SEO和SEM的关系</p><p>&nbsp; &nbsp; SEO和付费排名的关系</p><p>网站优化</p><p>&nbsp; &nbsp; 第2章：影响SEO的因素</p><p>&nbsp; &nbsp; 1.怎么选择搜索引擎喜欢的域名：</p><p>&nbsp; &nbsp; 2.什么域名后缀权重高?</p><p>&nbsp; &nbsp; 3.域名长短对SEO的影响</p><p>&nbsp; &nbsp; 4.中文域名对SEO是否有影响?</p><p>&nbsp; &nbsp; 5.域名存在时间对SEO的影响</p><p>&nbsp; &nbsp; 6.怎么选择一个合适的域名</p><p>&nbsp; &nbsp; 7.域名取名有哪些技巧</p><p>&nbsp; &nbsp; 8.搜索引擎喜欢的空间/服务器：</p><p>&nbsp; &nbsp; 9.如何选择合适的空间?</p><p>&nbsp; &nbsp; 10.空间速度对SEO的影响</p><p>&nbsp; &nbsp; 11.怎么确保空间稳定</p><p>&nbsp; &nbsp; 12.选用空间还是服务器</p><p>&nbsp; &nbsp; 13.支持在线人数是多少</p><p>&nbsp; &nbsp; 14.空间十分支持404自定义页面</p><p>&nbsp; &nbsp; 15.什么样的网站架构是搜索引擎喜欢的：</p><p>&nbsp; &nbsp; 16.W3C标准对SEO的影响</p><p>&nbsp; &nbsp; 17.div+css对seo的影响</p><p>&nbsp; &nbsp; 18.静态页面/URL对SEO的影响</p><p>&nbsp; &nbsp; 19.目录级别对SEO的影响</p><p>&nbsp; &nbsp; 20.目录文件名对SEO的影响</p><p>&nbsp; &nbsp; 21.网页大小对SEO的影响?</p><p>&nbsp; &nbsp; 22.robots.txt的使用方法</p><p>&nbsp; &nbsp; 23.怎么制定搜索引擎喜好的网站标签：</p><p>&nbsp; &nbsp; 24.标题Title的设计规则</p><p>&nbsp; &nbsp; 25.描述description的设计规则</p><p>&nbsp; &nbsp; 26.关键词keywords的设计规则</p><p>&nbsp; &nbsp; 27.其他meta标签的用法</p><p>&nbsp; &nbsp; 28.语义化标签H标签的使用</p><p>&nbsp;</p><p>关键词排名</p><p>&nbsp; &nbsp; 第3章：关键词与SEO之间的关系</p><p>&nbsp; &nbsp; 1.关键词密度剖析：什么是关键词密度；什么是适当的关键词密度；关键词部署在哪里好；关键词密度的基本原则；怎么增加关键词密度</p><p>&nbsp; &nbsp; 2.关键词的“四处一词”</p><p>&nbsp; &nbsp; 3.关键词排名突然消失怎么办</p><p>&nbsp; &nbsp; 4.判断关键词优化难易度</p><p>&nbsp; &nbsp; 5.什么是长尾关键词：</p><p>&nbsp; &nbsp; 6.怎么选择长尾关键词?</p><p>&nbsp; &nbsp; 7.网站栏目怎么制作?</p><p>&nbsp; &nbsp; 8.网站专题怎么制作?</p><p>&nbsp;</p><p>关键词优化</p><p>&nbsp; &nbsp; 第4章：内容为王</p><p>&nbsp; &nbsp; 1.内容的价值：怎么让内容更受用户欢迎；怎么让内容转载更多；内容怎么与主题相协调；内容更新的频率</p><p>&nbsp; &nbsp; 2.内容的制作：怎么制作原创内容；怎么使内容更多转载</p><p>&nbsp; &nbsp; 3.如何利用别人网站帮助自己</p><p>&nbsp; &nbsp; 4.怎么让用户创造内容</p><p>&nbsp; &nbsp; 5.怎么进行内容的编辑与处理</p><p>原创文章</p><p>&nbsp;</p><p>&nbsp; &nbsp; 第5章：链接的重要性</p><p>&nbsp; &nbsp; 1.链接-重要性-普遍性：</p><p>&nbsp; &nbsp; 2.链接对SEO的关系</p><p>&nbsp; &nbsp; 3.链接的普遍性</p><p>&nbsp; &nbsp; 4.链接对pr值的影响</p><p>&nbsp; &nbsp; 5.检查死链接的工具使用</p><p>&nbsp; &nbsp; 6.内链接/内链：</p><p>&nbsp; &nbsp; 7.怎么看待站内链接</p><p>&nbsp; &nbsp; 8.如何网站导航优化</p><p>&nbsp; &nbsp; 9.网站地图优化策略</p><p>&nbsp; &nbsp; 10.链接文字的重要性</p><p>&nbsp; &nbsp; 11.相关性链接优化</p><p>&nbsp; &nbsp; 12.如何部署内文链接</p><p>&nbsp; &nbsp; 13.面包屑导航优化策略</p><p>&nbsp; &nbsp; 14.什么是跳转链接</p><p>&nbsp; &nbsp; 15.什么是隐藏链接</p><p>&nbsp; &nbsp; 16.站外链接/外部链接：</p><p>&nbsp; &nbsp; 17.如何去做站外链接</p><p>&nbsp; &nbsp; 18.交换链接策略</p><p>&nbsp; &nbsp; 19.网站地图优化策略</p><p>&nbsp; &nbsp; 20.登陆分类目录策略</p><p>&nbsp; &nbsp; 21.登陆网址导航策略</p><p>&nbsp; &nbsp; 22.站群策略</p><p>&nbsp; &nbsp; 23.购买链接策略</p><p>&nbsp; &nbsp; 24.链接诱饵策略</p><p>&nbsp;</p><p>网站外链</p><p>&nbsp; &nbsp; 第6章：SEO培训高级思维</p><p>&nbsp; &nbsp; 1.白帽和黑帽：什么是“白帽”手法；什么是“黑帽”手法</p><p>&nbsp; &nbsp; 2.黑帽可取吗?</p><p>&nbsp; &nbsp; 3.黑帽之桥页、跳页</p><p>&nbsp; &nbsp; 4.黑帽之关键词篇</p><p>&nbsp; &nbsp; 5.黑帽之隐藏文字、透明文字</p><p>&nbsp; &nbsp; 6.黑帽之细微文字</p><p>&nbsp; &nbsp; 7.黑帽之障眼法</p><p>&nbsp; &nbsp; 8.黑帽之网页劫持</p><p>&nbsp; &nbsp; 9.站降权：网站被百度降权怎么办？网站被谷歌降权怎么办？网站被360降权怎么办</p><p>&nbsp; &nbsp; 10常用的10个SEO黄金操作法则</p><p><br/></p>','1596437849','0','1','1','0','0','0','0',',seo,','0', NULL, NULL, NULL);
INSERT INTO `jz_article` (`id`,`title`,`tid`,`molds`,`htmlurl`,`keywords`,`description`,`seo_title`,`userid`,`litpic`,`body`,`addtime`,`orders`,`hits`,`isshow`,`comment_num`,`istop`,`ishot`,`istuijian`,`tags`,`member_id`,`target`,`ownurl`,`video`) VALUES ('12','谷歌、百度搜索引擎近几年算法大盘点','6','article','seo','百度','清风算法基于很多朋友需要了解全面的百度系列算法，为了方便大家，今天我盘点了一下从2013年起至今影响重大的百度算法系列，以下数据钧摘抄于百度官方网站。大多数朋友们...','谷歌、百度搜索引擎近几年算法大盘点','1','/static/upload/202008036087.png','<p>&nbsp; 清风算法&nbsp; &nbsp; 基于很多朋友需要了解全面的百度系列算法，为了方便大家，今天我盘点了一下从2013年起至今影响重大的百度算法系列，以下数据钧摘抄于百度官方网站。大多数朋友们可能会感受到百度对于规范化SEO的决心与态度，以及相比较之下，可能也会对SEO的前景多一点信心。而在今年的最后时间里，便想着整理一下百度历年所发布的相关算法，是总结也是温习。了解百度算法，优化自己的网站，可以让自己的网站在行业圈子中如鱼得水，让网站排名崭露头角。</p><p>&nbsp; &nbsp; 一、文本算法：</p><p>&nbsp; &nbsp; 发布时间：具体时间不详</p><p>&nbsp; &nbsp; 打击对象：针对网站文本内容为了与关键词对应而进行的内容恶意堆砌（应该算是百度打击关键词堆砌的雏形）</p><p><br/></p><p>&nbsp;</p><p>文本算法</p><p>&nbsp; &nbsp; 二、超链算法</p><p>&nbsp; &nbsp; 发布时间：2012年</p><p>&nbsp; &nbsp; 打击对象：在当时如果一个网站被多个网站引用，那么搜素引擎就会认为这个网站就是符合要求的网站，是好的网站。“内容为王，外链为皇”这句话现在还在广为流传。</p><p>&nbsp; &nbsp; （参考SEO百度百科定在了2012年，且在那一年，算是百度认真对SEO进行调整的开始，也算是绿萝的雏形）</p><p><br/></p><p>&nbsp;</p><p>超链算法</p><p>&nbsp; &nbsp; 三、绿箩算法</p><p>&nbsp; &nbsp; 百度绿箩算法1.0：</p><p>&nbsp; &nbsp; 发布时间：2013年2月19日</p><p>&nbsp; &nbsp; 打击对象：为了打击买卖外链、批量群发外链的行为、目的、避免站长不用心做用户体验、纯粹的利用搜索引擎漏洞投机取巧、影响搜索引擎自身用户体验、主要打击的网站类型有、超链中介、出售链接网站、购买链接的网站据说设计这个策略的是位小姑娘，所以命名的权利也给了这位小姑娘，她选择了绿萝这个名称，暗合反作弊的净化之意。</p><p>&nbsp; &nbsp; 整改建议：还不知死活、拼命买卖外链的小伙伴、赶紧收手吧、否则你的站点注定是要被拔毛的、不信你就试试、当然咯、如果你是惯用黑帽手法、那就没得说了、因为你追求的是短期利益、也干得过百度工程师、哥膜拜你（但想想、即便你搞黑帽、你是牛逼的工程师、但能干过100个牛逼的工程师吗、不见得呢、除非说他们都睡着了！）&nbsp; &nbsp;</p><p><br/></p><p>&nbsp;</p><p>绿萝算法</p><p>&nbsp; &nbsp; 百度绿箩算法2.0：</p><p>&nbsp; &nbsp; 发布时间：2013年7月1日</p><p>&nbsp; &nbsp; 打击对象：重点打击垃圾软件的站点和软文中带有不相关或大量的外链的站点。基于绿萝算法的基础上进一步升级、主要打击发布软文的新闻站、惩罚的主要对象有、软文交易平台、软文受益站、软文发布站、做过从事SEO时间超过3年的童鞋一定还记得当年的阿里薇薇？当时就直接被处理了、毛被拔得只剩下100多个页面、那么具体会如何惩罚呢？</p><p>&nbsp; &nbsp; 引用下之前保护黑熊的广告语：没有买卖、就没有杀戮、你不买也不卖就没事了、但你若是买方或者卖方、一律受处罚、只是处罚的程度不一样、卖方严重的、直接屏蔽、从此在百度的搜索结果里、你只是个传说、买方、即受益站点、如果发现软文发布站有大量指向你的链接！呵呵、钱白花了、这些链接不计入权重计算中、甚至会再监察你一段时间、如果再猖獗、不好意思了、连你一并处罚、降分处理！</p><p>&nbsp; &nbsp; 整改建议：如果你是新闻源要注意咯、立即停止出售软文发布业务、如果你是受益站点、立马与软文合作赶紧中止合作、让对方将过往合作的项目进行清理</p><p>&nbsp; &nbsp; 四、石榴算法</p><p>&nbsp; &nbsp; 发布时间：2013年5月17日</p><p>&nbsp; &nbsp; 打击对象：针对大量妨碍用户正常浏览的恶劣广告的页面、低质量内容页面。石榴算法针对的尤其以弹出大量低质弹窗广告、混淆页面主体内容的垃圾广告页面为代表。与之前百度绿萝算法相对应，这正是百度搜索引擎提高用户体验，提高搜索质量的有力手段。2013年5月17日下午，百度网页搜索反作弊团队在百度站长平台发布公告称：将于一星期后正式推出新的算法“石榴算法”。新算法前期将重点整顿含有大量妨碍用户正常浏览的恶劣广告的页面。百度称此举是为了尊重搜索的用户，净化互联网生态环境！</p><p>&nbsp; &nbsp; 整改建议：有弹窗广告？且在主体内容位置显示？赶紧撤掉吧、短期利益是获得了、长期就不讨好了、就如一次借钱忘了还、感觉像是赚到了、实则不然、你的信誉度在他人心中逐渐在减弱……这类型的页面评分也会被降分</p><p><br/></p><p>&nbsp;</p><p>石榴算法</p><p>&nbsp; &nbsp; 五、百度原创星火计划（起源算法）</p><p>&nbsp; &nbsp; 发布时间：2013年10月23日</p><p>&nbsp; &nbsp; 打击对象：打击抄袭复制等行为、鼓励原创优质内容、推出的首次与有优质原创能力的网站合作、如内容最新来自首发站点、首发站点优先获得排名、现该算法已升级、可直接让技术做好主动推送功能、如是原创内容、记得做标识。解决原创内容的搜索排名问题。设计一套较完善的原创识别算法，建设原创联盟，给予原创、优质站点更高的发展空间。2014年8月7号--百度搜索引擎网页质量白皮书，简单地从内容质量、网页浏览体验和可访问性三个角度阐述了百度对网页质量的评判标准。</p><p>&nbsp; &nbsp; 整改建议：有原创内容、经常被大站转载、排名无望？用主动推送功能（百度站长平台有说明具体操作）、做好原创标识、如此再发生被大站转载了、宝宝心里也不苦了！</p><p><br/></p><p>&nbsp;</p><p>原创星火计划</p><p>&nbsp; &nbsp; 六、冰桶算法</p><p>&nbsp; &nbsp; 百度冰桶算法1.0：</p><p>&nbsp; &nbsp; 发布时间：2014年8月22日</p><p>&nbsp; &nbsp; 打击对象：针对移动端影响用户体验的落地页。主要打击对象包括强行弹窗app下载、用户登录、大面积广告等影响用户正常浏览体验的页面，尤其以必须下载app才能正常使用的站点为代表。</p><p>&nbsp; &nbsp; 整改建议：1、去掉弹窗广告、去掉影响阅读内容主体的广告。2、页面不要出现强制下载APP的情况</p><p>&nbsp; &nbsp; 百度冰桶算法2.0：</p><p>&nbsp; &nbsp; 发布时间：2014年11月18日</p><p>&nbsp; &nbsp; 打击对象：针对全屏下载、在狭小的手机页面布设大面积广告遮挡主体内容、强制用户登录才可以使用等。</p><p>&nbsp; &nbsp; 百度冰桶算法3.0</p><p>&nbsp; &nbsp; 发布时间：2016年7月7日</p><p>&nbsp; &nbsp; 打击对象：秉承用户至上的原则，百度移动搜索不断更新系统、升级算法，一切都为了让用户拥有更顺畅的搜索体验。百度移动搜索冰桶算法近期将升级至3.0版本。3.0版本将严厉打击在百度移动搜索中，打断用户完整搜索路径的调起行为。</p><p>&nbsp; &nbsp; 百度冰桶算法4.0</p><p>&nbsp; &nbsp; 发布时间：2016年9月19日</p><p>&nbsp; &nbsp; 打击对象：为提升搜索用户体验、建设健康稳定的移动搜索生态，百度搜索将针对移动搜索结果页广告过多、影响用户体验的页面，进行策略调整。在此提醒各位站长：请尽快对广告过多页面进行整改，优化页面广告布局，控制每屏广告的占比率，以保障用户浏览体验，以免被策略命中影响网站流量。健康的移动搜索生态，是百度和各资源方长期稳定发展的基础，百度后续将进一步提升用户体验，升级策略，希望与各位站长协同合作，在移动领域携手共赢。</p><p>&nbsp; &nbsp; 百度冰桶算法4.5</p><p>&nbsp; &nbsp; 发布时间：2016年10月26日</p><p>&nbsp; &nbsp; 打击对象：重点打击色情类、赌博类等诱导类吸引眼球的非法广告页面，发力打击Landing Page恶劣广告行为。近期，经过技术挖掘，我们发现部分网页通过色情动图、露骨文本、赌博等等吸引眼球的形态诱导用户点击非法广告，为了改善用户体验以及引导行业生态向积极健康的方向发展，百度搜索再次升级冰桶算法，将针对发布恶劣诱导类广告的页面进行打击，降低其在百度搜索系统中的评价。在此提醒各位站长，请尽快下线恶劣的诱导类广告，以免被策略命中影响网站排序。同时，百度站长平台反馈中心已开辟恶劣广告举报入口。</p><p>&nbsp; &nbsp; 百度冰桶算法5.0</p><p>&nbsp; &nbsp; 发布时间：2018年11月12号公布，2018年11月下旬升级</p><p>&nbsp; &nbsp; 打击对象：提升搜索用户的浏览体验</p><p>&nbsp; &nbsp; 整改建议：</p><p>&nbsp; &nbsp; 1.百度坚决捍卫移动搜索用户体验</p><p>&nbsp; &nbsp; 2.名词解释</p><p>&nbsp; &nbsp; 3.百度移动搜索落地页体验标准</p><p>&nbsp; &nbsp; 3.1. 资源流畅性</p><p>&nbsp; &nbsp; 3.1.1页面加载速度</p><p>&nbsp; &nbsp; 3.1.2页面加载动效</p><p>&nbsp; &nbsp; 3.2.页面浏览体验</p><p>&nbsp; &nbsp; 3.2.1 排版布局</p><p>&nbsp; &nbsp; 3.2.2 移动端适配</p><p>&nbsp; &nbsp; 3.2.3 落地页广告规范</p><p>&nbsp; &nbsp; 3.3. 资源易用性</p><p>&nbsp; &nbsp; 3.3.1 通用页面标准</p><p>&nbsp; &nbsp; 3.3.2 禁止任何形式的APP自动调起</p><p>&nbsp; &nbsp; 3.3.3 音视频资源标准</p><p>&nbsp; &nbsp; 3.3.4 图片页资源标准</p><p>&nbsp; &nbsp; 本次冰桶算法基于百度移动搜索落地页体验白皮书4.0进行调整https://ziyuan.baidu.com/college/documentinfo?id=2492</p><p><br/></p><p>&nbsp;</p><p>冰桶算法</p><p>&nbsp; &nbsp; 七、白杨算法</p><p>&nbsp; &nbsp; 发布时间：2014年12月4日</p><p>&nbsp; &nbsp; 打击对象：针对移动站点有地域属性、加上地理位置标识、即有机会获得优先排名、如、酒店服务类型网站、会分不同城市、网站加上地理位置标识、用户在移动端搜索地域酒店、则会比没加标识的站点来得有利些。旨在实现网站移动化，为更好满足用户地域化需求，也更好扶持各种地方特色类站点。效果：(1) 排序优化：本地信息靠前；(2) 地域明确化： 城市信息前置。</p><p>&nbsp; &nbsp; 整改建议：在地域优化的的过程中、站长通过在META标签中添加地理位置信来完成、以下是白杨算法META地理位置信息的格式、添加方式和提交。Meta声明格式、Name属性的值是location、Content的值为province=北京；city=北京；coord=116.306522891,40.0555055968、Tips：province为省份简称、city为城市简称、coord是页面信息的经纬度坐标、采用的是bd09ll坐标。</p><p><br/></p><p>&nbsp;</p><p>白杨算法</p><p>&nbsp; &nbsp; 八、瑞丽算法</p><p>&nbsp; &nbsp; 发布时间：2015年1月1日</p><p>&nbsp; &nbsp; 算法内容：应该是一种误传，且百度官方发出了以下申明：由于网页搜索元旦期间出现相关系统故障，导致部分网站在百度搜索结果中的排序受到影响而出现相关波动情况，今日在加紧修复中，预计今日晚些会修复完成，请大家密切关注平台信息，不要到处传播及揣测相关信息，百度没有对.cn及.cc域名歧视，请这部分站点不要听信谣言。</p><p><br/></p><p>&nbsp;</p><p>瑞丽算法</p><p>&nbsp; &nbsp; 九、天网算法</p><p>&nbsp; &nbsp; 发布时间：2016年8月10日</p><p>&nbsp; &nbsp; 打击对象：盗取用户隐私的网站。盗取用户隐私主要表现为网页嵌恶意代码，用于盗取网民的QQ号、手机号等。被检测处罚的网站经过整改，达到标准，会解除处罚。近日，百度网页搜索发现部分站点存在盗取用户隐私的行为，主要表现为网页嵌恶意代码，用于盗取网民的QQ号、手机号。而许多网民却误认为这是百度所为。为此，百度网页搜索和百度安全联合研发天网算法，针对这种恶意行为进行打击。有过盗取用户隐私行为的站点请尽快整改，待策略复查达到标准可解除惩罚。</p><p><br/></p><p>&nbsp;</p><p>天网算法</p><p>&nbsp; &nbsp; 十、蓝天算法</p><p>&nbsp; &nbsp; 发布时间：2016年11月21日</p><p>&nbsp; &nbsp; 打击对象：百度持续打击新闻源售卖软文、目录行为，近日百度反作弊团队发现部分新闻源站点售卖目录，发布大量低质内容现象仍然存在，此举严重违反新闻源规则，并影响用户搜索体验。针对此情况，百度推出“蓝天算法”，旨在严厉打击新闻源售卖软文、目录行为，违规网站会受到降低权重排名，还用户一片搜索蓝天。触发“蓝天算法”问题站点将被清理出新闻源，同时降低其在百度搜索系统中的评价。</p><p><br/></p><p>&nbsp;</p><p>蓝天算法</p><p>&nbsp; &nbsp; 十一、烽火算法（烽火计划）</p><p>&nbsp; &nbsp; 发布时间：2017年2月23日</p><p>&nbsp; &nbsp; 打击对象：主要打击手机端网站域名劫持，当用移动设备访问网站时，再返回搜索结果页时，网页JS会强制跳转至虚假的百度搜索页，展现的都是第一次点击网站展现的信息。针对百度移动搜索页面劫持。所谓移动搜索页面劫持，在浏览完落地页返回搜索结果页时，会进入到虚假的百度移动搜索结果页，该页面模拟了百度搜索结果首页，但实际上是一个虚假的风险站点，用户访问存在极大的安全隐患，严重影响了用户的数据安全。</p><p><br/></p><p>&nbsp;</p><p>烽火算法</p><p>&nbsp; &nbsp; 十二、飓风算法</p><p>&nbsp; &nbsp; 百度飓风算法1.0</p><p>&nbsp; &nbsp; 发布时间：2017年7月4日</p><p>&nbsp; &nbsp; 打击对象：严厉打击以恶劣采集站点(站群、蜘蛛池、寄生虫、bc、劫持)为内容主要来源的网站，主要是判断网站的新闻源是否有采集。如果发现存在恶意采集内容，将会把关键词降低排名，同时还会清除恶意采集链接的行为，给认真做内容的网站更多上升排名的机会，净化搜索网络的环境。2017年8月30号--百度蜘蛛升级https抓取，升级了对HTTPS数据的抓取力度，HTTPS数据将更快被Spider抓取到。</p><p>&nbsp; &nbsp; 除了抓取，百度表示过，https页面在权重上也有加分，百度的原话是“网站评价高、落地页评价高、搜索展示等收益优待。”Google几年前就开始对https页面提权。</p><p><br/></p><p>&nbsp;</p><p>飓风算法</p><p>&nbsp; &nbsp; 百度飓风算法2.0</p><p>&nbsp; &nbsp; 发布时间：2018年09月13号公布，2018年09月下旬升级</p><p>&nbsp; &nbsp; 打击对象：恶劣采集行为</p><p>&nbsp; &nbsp; 整改建议：百度鼓励站点生产领域内的文章和内容，通过领域专注度获得更多的搜索青睐。不要尝试采集跨领域的内容来获得短期收益，这样会造成领域专注度的降低，从而影响站点在搜索中的表现。综上，飓风算法2.0旨在保障搜索用户的浏览体验，保护搜索生态的健康发展、对于违规网站，百度搜索会依据问题的恶劣程度有相应的限制搜索展现的处理。对于第一次违规的站点，改好后解除限制展现的周期为1个月;对于第二次违规的站点，百度将不予释放。</p><p>&nbsp; &nbsp; 十三、清风算法</p><p>&nbsp; &nbsp; 百度清风算法1.0</p><p>&nbsp; &nbsp; 发布时间：2017年9月14日</p><p>&nbsp; &nbsp; 打击对象：严惩网站通过title（首页、列表、内容）三大主要页面标题作弊，网站内容与标题，关键词，描述不符的站点。</p><p>&nbsp; &nbsp; 表现在网站标题堆砌，内容关键词堆砌，保证搜索用户的体验，保证网站内容与关键词相符。</p><p>&nbsp; &nbsp; 百度清风算法2.0（欺骗下载算法）</p><p>&nbsp; &nbsp; 发布时间：2018年04月19号公布，2018年5月中旬上线</p><p>&nbsp; &nbsp; 打击对象：实际下载的资源与需求不符;提供了下载链接、实际站点无下载资源;从搜索用户体验的及整个搜索生态的角度出发，下载站应当贯彻和遵守的原则如下：</p><p>&nbsp; &nbsp; 1. 站点自身能够直接通过搜索提供真实有效的资源，切实满足用户的需求。</p><p>&nbsp; &nbsp; 2. 避免下载资源和下载服务失效。</p><p>&nbsp; &nbsp; 3. 拒绝通过利用下载资源无关的内容，诱导用户下载。</p><p>&nbsp; &nbsp; 整改建议：这里需要明确的是：清风算法2.0中提到的文章标题、文章Title是指网页Html代码中的标签中的内容。站长需要注意Title内容和网页中内容的一致性。</p><p>&nbsp; &nbsp; 1. title中明确说明下载的资源是什么，页面中的下载内容应与页面当中的标题、描述相一致，避免出现不一致的情况。</p><p>&nbsp; &nbsp; 2. 如通过网盘、迅雷等形式下载，需要在标题中进行说明。</p><p>&nbsp; &nbsp; 3. 不应出现蹭知名网站行为，诱导用户下载。</p><p><br/></p><p>&nbsp;</p><p>清风算法</p><p>&nbsp; &nbsp; 十四、闪电算法</p><p>&nbsp; &nbsp; 发布时间：2017年9月14日</p><p>&nbsp; &nbsp; 打击对象：移动页面首屏加载时间将影响搜索排名，旨在严惩移动端打开首页速度超过3秒的站点。移动端首页访问速度如果超过3秒，将会对移动端的排名产生影响，算法的目的是更加考虑用户体验，让更多访问速度快的站点获取更多流量。</p><p>&nbsp; &nbsp; 整改建议：提高页面打开速度牵扯到很多东西，包括但不限于：服务器位置、带宽、性能，数据库优化，HTML代码、图片优化、压缩，减少请求次数，CDN和缓存使用等等。有时间再单独说。像我的博客这样备案困难的网站，想把服务器转移到国内而不可得，速度上就先吃亏了。我在国内的几个城市试过，大部分情况下3秒是打不开页面的，所以我的SEO每天一贴已经被处罚过了?</p><p><br/></p><p>&nbsp;</p><p>闪电算法</p><p>&nbsp; &nbsp; 十五、惊雷算法</p><p>&nbsp; &nbsp; 发布时间：2017年11月20日</p><p>&nbsp; &nbsp; 打击对象：严惩点击流量作弊行为，即通过刷点击提高百度排名的行为，也就是近两年颇为流行的百度快速排名，简称快排。惊雷算法会例行产出惩罚数据，对存在点击流量作弊的行为进行惩罚，另对有判罚纪录的网站加以严惩，严重者将长期封禁。当然既然是刷排名，有些朋友可能会想到给竞争对手刷，我本人页曾经想过并亲自拿了一个网站测试过，不过效果并不明显。想来为了防止别人陷害，惊雷算法会综合考虑网站质量、历史数据等多维度特征，不可能仅仅看点击数据，不然太容易陷害竞争对手了；而如果真是那样，一定会产生大量的史诗级的悲剧。且惊雷算法一出，不知道现在市面上盛行的7天、20天排名上首页还能不能持续下去。</p><p>&nbsp; &nbsp; 整改建议：惊雷算法会例行产出惩罚数据，对存在点击流量作弊的行为进行惩罚，另对有判罚纪录的网站加以严惩，严重者将长期封禁。既然是刷排名，就可以给竞争对手刷，为了防止别人陷害，惊雷算法会综合考虑网站质量、历史数据等多维度特征，不可能仅仅看点击数据，不然太容易陷害竞争对手了。有两个值得注意的对方。一是，即使有防范措施，有没有可能误伤无辜网站?应该是有可能，所以官方特意加了一句：在此期间如有流量异常，可以到反馈中心投诉。二是，从百度官方的语气看，惊雷算法是追溯既往的。</p><p><br/></p><p>&nbsp;</p><p>惊雷算法</p><p>&nbsp; &nbsp; 十六、季风算法(针对熊掌号)</p><p>&nbsp; &nbsp; 发布时间：2018年3月29号公布，2018年6月中旬上线</p><p>&nbsp; &nbsp; 打击对象：熊掌号为了获得更多搜索收益，严重违反了熊掌号的领域专注度要求，通过熊掌号发布了大量与号领域严重不匹配的内容，影响了百度搜索用户体验。</p><p>&nbsp; &nbsp; 整改建议：</p><p>&nbsp; &nbsp; 1. 删除不符合规范的熊掌号内容，同时在百度搜索资源平台进行死链提交;</p><p>&nbsp; &nbsp; 2. 若站点拥有相应医疗、财经资质，需重新注册熊掌号，领域切记要选择相应的医疗、财经领域，审核通过后可以发表专业的内容;</p><p><br/></p><p>&nbsp;</p><p>季风算法</p><p>&nbsp; &nbsp; 十七、细雨算法</p><p>&nbsp; &nbsp; 发布时间：2018年06月28号公布，2018年07月中旬上线</p><p>&nbsp; &nbsp; 打击对象：页面标题作弊及误导，页面title中堆砌相近关键词，页面title中穿插火星文字或者特殊符号，页面title中穿插受益方式，正文内容不完整，频繁穿插变形的受益方式，文章的配图图片中存在受益联系方式，正文中内容为乱采集、拼接而成、排版混乱、用户从页面中无法获得商品或者服务信息。</p><p>&nbsp; &nbsp; 整改建议：</p><p>&nbsp; &nbsp; 1、页面标题清晰合理表述页面主体内容</p><p>&nbsp; &nbsp; Ⅰ、页面标题简要清晰地围绕主体内容撰写，和页面内容相关，且能突出页面的核心价值。</p><p>&nbsp; &nbsp; Ⅱ、标题语意通顺，无乱码杂质，无分句截断以及关键词堆积。</p><p>&nbsp; &nbsp; Ⅲ、列出最为核心的业务、产品，而不是通过堆砌来吸引用户关注。</p><p>&nbsp; &nbsp; 2. 页面内容完整，联系方式规范化</p><p>&nbsp; &nbsp; Ⅰ、商品内容清晰完整，保证真实性，无诱导欺骗行为。</p><p>&nbsp; &nbsp; Ⅱ、商品页面联系方式符合用户体验，在固定区域展现。</p><p><br/></p><p>&nbsp;</p><p>细雨算法</p><p>&nbsp; &nbsp; 十八、信风算法</p><p>&nbsp; &nbsp; 发布时间：2019年5月23日</p><p>&nbsp; &nbsp; 打击对象：用户点击翻页键时，自动跳转至网站的其他频道页(如目录页、站外广告页等)。</p><p>&nbsp; &nbsp; 问题示例1： 移动端，用户点击“下一页”直接跳转至站内频道目录页</p><p>&nbsp; &nbsp; 问题示例2：PC端，用户点击“下一页”直接跳转至站内频道目录页</p><p>&nbsp; &nbsp; 整改建议：</p><p>&nbsp; &nbsp; 1、不要放置虚假翻页键。如果您希望能获得更多的用户浏览和点击，可以在正文结束后，为用户推荐相关的优质内容，吸引用户点击。</p><p>&nbsp; &nbsp; 2、尊重用户浏览体验，避免出现刻意拆分一篇简短文章为多个分页的行为</p><p><br/></p>','1596438378','0','2','1','0','0','0','0', NULL,'0', NULL, NULL, NULL);
INSERT INTO `jz_article` (`id`,`title`,`tid`,`molds`,`htmlurl`,`keywords`,`description`,`seo_title`,`userid`,`litpic`,`body`,`addtime`,`orders`,`hits`,`isshow`,`comment_num`,`istop`,`ishot`,`istuijian`,`tags`,`member_id`,`target`,`ownurl`,`video`) VALUES ('13','什么是链轮、SEO优化中轮链是怎么做到的','6','article','seo','seo优化','刚踏入SEO行业的时候，自己注册了很多的新浪博客去做各种各样的外链，到最后发现这是我做外链所收获的最大的财富。在SEO技术中，轮链一直是需要大量的站点去实现的，但是通...','什么是链轮、SEO优化中轮链是怎么做到的','1','/static/upload/202008038196.jpg','<p>&nbsp;刚踏入SEO行业的时候，自己注册了很多的新浪博客去做各种各样的外链，到最后发现这是我做外链所收获的最大的财富。在SEO技术中，轮链一直是需要大量的站点去实现的，但是通过博客我们可以轻松的达成这个目的。</p><p>&nbsp; &nbsp; 轮链技术是基于蜘蛛与外链基础之上的，首先需要至少3-5个站点进行串联，其次保证蜘蛛在这些站点中都能不停的访问到你所需要的目标站点。</p><p>&nbsp;<img src="/static/upload/202008038196.jpg"/></p><p>链轮</p><p>&nbsp; &nbsp; 一、知道轮链技术的操作手法之后，我们就来聊一聊轮链为网站带来的风险与收益。</p><p>&nbsp; &nbsp; 1、风险</p><p>&nbsp; &nbsp; 轮链毕竟属于作弊手法，所以大量做轮链存在K站、降权的风险，所以操作的时候一定要非常小心，并且尽量选择高权重的博客进行操作。</p><p>&nbsp; &nbsp; 2、收益</p><p>&nbsp; &nbsp; 因为外链的高权重性，不但能够为目标网站的收录带来不错的效果，而且锚文本能够很好的提升目标网站的关键词排名。</p><p>&nbsp; &nbsp; 以前的博客站点有很多，比如新浪、搜狐、网易等等，这些博客最好养活的还是新浪博客，成型后的新浪博客还可以挂上自己网站的友情链接。</p><p>&nbsp; &nbsp; 轮链操作宜少宜精，在百度搜索引擎发展的这个阶段，百度AI让质量的重要性远远高于了数量。</p><p>&nbsp; &nbsp; 二、链轮概念：SEO链轮(SEO Link Wheels)是从国外引入国内的，一种比较新颖的SEO策略。是一种比较先进的网络营销方式。</p><p>&nbsp;</p><p>链轮</p><p>&nbsp; &nbsp; 三、链轮工作原理：</p><p>&nbsp; &nbsp; seo链轮的工作原理是为要进行优化的网站建立高质量的单向导入链接，从而提高网页的排名。在搜索引擎眼里，单向链接比双向的链接具有更好的权重，能有效提高网页在搜索引擎中的权重,而seo链轮正是充分利用这点。除此之外，Linkwheel还可以通过网站建立的单向链接，有效传递网页权重，使PR值高的网页能把权重传给PR值较低的网页，linkwheel还加大了搜索引擎抓取网页的几率。</p><p>&nbsp; &nbsp; 四、链轮基本介绍：以ABCDE五个博客名，其中在A博客中发一个文章，关键词以你要优化的网站的关键字，在文章里面做指向你网站的锚文本。然后在文章结尾的时候，再做一个锚文本指向B博客，这个锚文本的名字可能是B博客的名字。同样的方法，B博客写的文章也是关键字指向你的网站，在文章的结尾做一个链接到C博客,以此类推。</p><p>&nbsp; &nbsp; 1. SEO链轮(SEO Link Wheels)</p><p>&nbsp; &nbsp; SEO链轮是指通过在互联网上建立大量的独立站点网站或是在各大门户网站上开设博客，这些独立站点网站或是博客群通过单向的、有策略、有计划的紧密的链接到一个要优化的目标主网站（或主关键词）；同时各站点或者各博客也依次互相紧密链接，形成一张紧密的蜘蛛链接网，将主目标网站（或者主关键词）团团围住，以达到快速增强目标主网站（或主关键词）在搜索引擎结果中的权重，进而获得非常好的排名的策略目的。举例以ABCDE 五个博客名，其中在A 博客中发一个文章，这个锚文本的名字可能是B 博客的名字。同样的方法，B 博客写的文章也是关键字指向你的网站，在文章的结尾做一个链接到C 博客，以此类推。</p><p>&nbsp; &nbsp; 2. 链接轮（LinkWheel）</p><p>&nbsp; &nbsp; 国外新提出的一种链接建设策略，或者叫链接建设模型。与传统链接相比，链接轮策略更注重链接的质量与群站的权重培养，更能发挥链接对提高网站排名的作用。 　junles认为SEO链轮是指通过在互联网上建立大量的独立站点或是在各大门户网站上开设博客，这些独立站点或是博客群通过单向的、有策略、有计划紧密的链接，并都指向要优化的目标网站，以达到提升目标网站在搜索引擎结果中的排名。</p><p>&nbsp;</p><p>链轮</p><p>&nbsp; &nbsp; 五、策略区别：</p><p>&nbsp; &nbsp; 1、统SEO策略</p><p>&nbsp; &nbsp; 都会用到各大门户网站的博客群策略，用博客群的方式来对目标网站进行投票，传递权重。增加目标网站的权重，让目标网站在搜索引擎结果中有较好的排名。但传统SEO策略可能都会忽略，每个独立博客之间的链接建设。每个博客都是独自为战，这样每个博客就被无形地弱化了投票力度，从而影响到目标网站的权重提升。</p><p>&nbsp; &nbsp; 2、eo链轮策略</p><p>&nbsp; &nbsp; SEO链轮策略是一个有组织、有策略、有计划的链接系统。</p><p>&nbsp;</p><p>链轮</p><p>&nbsp; &nbsp; 六、站群于链轮的对比：</p><p>&nbsp; &nbsp; 用站群或是博客群都可以达到SEO链轮的效果。他们的优劣比较。</p><p>&nbsp; &nbsp; 1、资金投入</p><p>&nbsp; &nbsp; 建立站群要比建立博客群投资大。因为，建立站群不但要买域名还要买空间，而且网站都要使用不同的IP地址，以防止很容易被搜索引擎看穿。虽然有些空间是免费的，但总会有诸多限制条件，用起来很不顺畅。建立博客群，不需要任何资金，各大门户网站都可以免费建立自己的博客。</p><p>&nbsp; &nbsp; 2、技术层次</p><p>&nbsp; &nbsp; 建立站群时每个网站都需要安装独立的建站程序，无疑增加了自己的劳动量和技术操作程度。虽然有很多开源的建站程序，但安装起总还是需要你懂点技术、程序的。而建立博客，只需要你会注册邮箱，再注册个ID，那么你的博客就开通了。</p><p>&nbsp; &nbsp; 3、维护上</p><p>&nbsp; &nbsp; 站群，每个站都需要你去定期地维护，有时会遇到空间问题，有时会遇到域名解析问题，有时会遇到备案问题，有时会遇到不和谐问题等等，而门户博客却没这类问题，发文章时有不和谐词语，你也发不了，更省去了备案的烦心事。</p><p>&nbsp; &nbsp; 4、损失程度</p><p>&nbsp; &nbsp; 虽然，用站群或是博客群进行SEO链轮策略时，操作不好都有可能会被搜索引擎K掉，先不考虑都被K后，目标网站影响程度如何。可以肯定的是K掉博客总比K掉群站的损失度要小得多。因为，投入的资本大小不同。</p><p>&nbsp; &nbsp; 综上所述，采用博客群的方式进行SEO链轮策略执行时，要比站群方式廉价、省心、放心。</p><p>&nbsp;</p><p>链轮</p><p>&nbsp; &nbsp; 七、链轮的优缺点：</p><p>&nbsp; &nbsp; 1、SEO链轮的优点：</p><p>&nbsp; &nbsp; SEO链轮的好处是，不仅可以传递网站权重，当蜘蛛爬进来的时候，可以在里面打转，增加页面爬行的广度和深度。SEO链轮策略是一个有组织、有策略、有计划的链接系统。他会使博客与博客之间也有紧密的链接，每个博客不再是一个个独立的个体，那么每个独立博客的权重也会得到相应的提升。每个博客权重提升后，自然对目标网站的投票能力度增强，目标网站的权重、排名将会有质的提升。</p><p>&nbsp; &nbsp; 2、SEO链轮的缺点：</p><p>&nbsp; &nbsp; Ⅰ、耗费时间</p><p>&nbsp; &nbsp; 不管是用站群还是用博客群进行SEO链轮策略时，都不是随便添加几篇文章就可以一劳永逸的，更多的时候是需要有策略、有计划地更新。需要投入精力细心去琢磨的，浮躁的人肯定是做不来的。</p><p>&nbsp; &nbsp; Ⅱ、让人无聊</p><p>&nbsp; &nbsp; 在进行链轮建设时除了脑力劳动外，更多的还是体力劳动。短时间还可以忍受，时间一长，如果你从中找不出乐趣的话，更多的就是无聊了。</p><p>&nbsp; &nbsp; Ⅲ、周期长</p><p>&nbsp; &nbsp; 建立这些链轮前期是需要你静下心来慢慢养的，等链轮中的站点或是博客的PR值、权重全都提升到一个乐观程度上时，目标网站的权重、排名将会有质的飞跃!</p><p>&nbsp; &nbsp; 八、注意事项：</p><p>&nbsp; &nbsp; 1、选择高质量的链轮；</p><p>&nbsp; &nbsp; 2、良好的更新习惯；</p><p>&nbsp; &nbsp; 3、不要将链轮围死；</p><p>&nbsp; &nbsp; 4、追求链轮多样化。</p><p>&nbsp;</p><p>seo优化</p><p>&nbsp; &nbsp; 九、应用场景：</p><p>&nbsp; &nbsp; 1、站群</p><p>&nbsp; &nbsp; 在SEO中“链轮&quot;适用于站群是黑帽SEO中一种操作方法，特别是我们在百度搜索某些词时可以看到部分用链轮做到首页的站群。</p><p>&nbsp; &nbsp; SEO中链轮的具体操作方法：首页必须要有大量的资源站点，将所有的资源站点分别用文章页互相链接（注意不是首页），链轮也是利用了SEO中锚文本操作方法。</p><p>&nbsp; &nbsp; 2、博客链轮</p><p>&nbsp; &nbsp; 博客链轮，又称BLOG-LinkWheeler，在SEO中通常用来培养自己关键词在SE（搜索引擎）中的排名。当然，在庞大的外部导入链接的支撑下，我们可以利用站内的合理锚文本分布来进行恰当的优化。</p><p>&nbsp; &nbsp; BLOG-LinkWheeler的链接形式：通常一个中小型的链轮由若干个BLOG组成，这些BLOG彼此之间相互窜联。</p><p>&nbsp; &nbsp; 如此，只要有一个BLOG成功的吸引SE的爬虫或蜘蛛前来，那么，其他的BLOG便会从那个BLOG的友链或文章锚文本中所到SE的光顾。</p><p>&nbsp; &nbsp; 最终，Seoer们想要的目的，不过是让SE通过最后一个BLOG引向自己的目标站——也就是自己正在优化的站，也可以称之为顶层站（在站群中可以这样来称呼）。</p><p>&nbsp; &nbsp; 同理，也有Seoer们将其延伸，成为另一个圈子更加庞大的LinkWheeler。</p><p><br/></p>','1596438476','0','44','1','0','0','0','0',',seo,','0', NULL, NULL, NULL);
INSERT INTO `jz_article` (`id`,`title`,`tid`,`molds`,`htmlurl`,`keywords`,`description`,`seo_title`,`userid`,`litpic`,`body`,`addtime`,`orders`,`hits`,`isshow`,`comment_num`,`istop`,`ishot`,`istuijian`,`tags`,`member_id`,`target`,`ownurl`,`video`) VALUES ('14','百度小程序','11','article','baiduminiapp','百度小程序','尊敬的开发者：为助力小程序开发者在百度移动生态中不断提升自身行业竞争力，于2020年7月16日起，百度智能小程序【权益中心】正式试运行啦！开发者可对小程序评级结果以及对...','百度小程序','1','/static/upload/202008038212.png','<p>尊敬的开发者：</p><p><br/></p><p>为助力小程序开发者在百度移动生态中不断提升自身行业竞争力，于2020年7月16日起，百度智能小程序【权益中心】正式试运行啦！</p><p><br/></p><p>开发者可对小程序评级结果以及对应的权益有明确感知，评级结果越高，开发者可享受的权益越多，助力开发者获得更高效的流量入口和更多样的品牌曝光！</p><p><br/></p><p>&nbsp;</p><p><br/></p><p>一、【权益中心】介绍</p><p><br/></p><p>目前权益主要有四大类：品牌类权益、流量类权益、审核类权益及功能类权益。</p><p><br/></p><p>已开放给开发者的权益项主要有：</p><p><br/></p><p>①品牌类：搜索-小程序单卡-中级卡、搜索-小程序品牌词/官方词</p><p><br/></p><p>②流量类：搜索-自然结果提交配额、搜索-小程序单卡推荐优待</p><p><br/></p><p>③审核类：发包-审核快审</p><p><br/></p><p>④功能类：百家号文章挂载、运营中心-内容管理</p><p><br/></p><p>后续即将开放的权益项有：搜索-小程序单卡-高级卡、核心页面关键词、搜索推荐词直达</p><p><br/></p><p>等，请敬请期待！</p><p><br/></p><p>1、权益中心首页入口</p><p><br/></p><p>开发者可以通过权益中心，查看等级情况以及各项权益获取的状态</p><p><br/></p><p>默认图片</p><p><br/></p><p>2、权益中心主页</p><p><br/></p><p>如图所示路径：登录百度智能小程序开发者后台 &gt; 点击首页入口的“权益中心”或等级结果区域，可跳转到权益中心主页。</p><p><br/></p><p>权益中心主页展现的内容包括：①评级状态：最新的评级结果数据及指导提示语；②权益详情：各项权益解锁状态、权益信息介绍及可获得条件；</p><p><br/></p><p>注意：权益中心评级结果于每周五中午12点更新，可享用的权益项会根据评级结果的变动而相应变化。</p><p><br/></p><p>默认图片</p><p><br/></p><p>3、权益功能详情页</p><p><br/></p><p>开发者点击权益中心主页的某个“权益卡片”，可跳转到具体的权益功能页，查看权益详情及相关操作。</p><p><br/></p><p>举例如下图：点击“搜索-自然结果提交配额”权益卡，可跳转到相应的“搜索接入-自然搜索-新资源提交”功能模块，查看权益功能解锁状态。点击功能详情页的“权益操作提示语”，还可跳转回权益中心主页，查看更多权益。</p><p><br/></p>','1596439292','0','2','1','0','0','0','0', NULL,'0', NULL, NULL, NULL);
INSERT INTO `jz_article` (`id`,`title`,`tid`,`molds`,`htmlurl`,`keywords`,`description`,`seo_title`,`userid`,`litpic`,`body`,`addtime`,`orders`,`hits`,`isshow`,`comment_num`,`istop`,`ishot`,`istuijian`,`tags`,`member_id`,`target`,`ownurl`,`video`) VALUES ('15','创意小程序 造星计划','11','article','baiduminiapp','小程序,造星计划','百度智能小程序造星计划旨在挖掘一批能够把握未来趋势、拥有更优质的内容或服务、在用户体验上实现跨越式进化、在运营玩法上拥有独特创意，在业务模式上实现颠覆式变革，且...','创意小程序 造星计划','1','/static/upload/202008034897.png','<p>百度智能小程序造星计划旨在挖掘一批能够把握未来趋势、拥有更优质的内容或服务、在用户体验上实现跨越式进化、在运营玩法上拥有独特创意，在业务模式上实现颠覆式变革，且契合百度场景的智能小程序。我们希望通过一系列的权益帮扶、玩法打造，帮助大家快速成长，获得收益。</p><p>面向对象</p><p>本次造星计划面向全网开发者发起招募，无论你是大企业还是小企业，无论你的诉求是扩大品牌影响力还是找到更多变现方法，我们都会结合你的创意思路，为你量身打造一套属于你的成长路径，助你成为行业内最闪亮的那颗星。</p><p><br/></p>','1596439511','0','5','1','0','0','0','0',',小程序,','0', NULL, NULL, NULL);
INSERT INTO `jz_article` (`id`,`title`,`tid`,`molds`,`htmlurl`,`keywords`,`description`,`seo_title`,`userid`,`litpic`,`body`,`addtime`,`orders`,`hits`,`isshow`,`comment_num`,`istop`,`ishot`,`istuijian`,`tags`,`member_id`,`target`,`ownurl`,`video`) VALUES ('16','智能小程序学院全新上线','11','article','baiduminiapp','智能小程序学院全新上线','主要介绍内容型智能小程序多元化的经营及变现模式，将针对内容宣发、版权内容付费、广告消费等经营模式及相关小程序能力进行详细解读，助力开发者加速获流分发建设、探索多...','智能小程序学院全新上线','1','/static/upload/202008039228.png','<p>主要介绍内容型智能小程序多元化的经营及变现模式，将针对内容宣发、版权内容付费、广告消费等经营模式及相关小程序能力进行详细解读，助力开发者加速获流分发建设、探索多元经营变现手段，打造智能小程序生态闭环体验。</p>','1596439666','0','5','1','0','0','0','0', NULL,'0', NULL, NULL, NULL);
INSERT INTO `jz_article` (`id`,`title`,`tid`,`molds`,`htmlurl`,`keywords`,`description`,`seo_title`,`userid`,`litpic`,`body`,`addtime`,`orders`,`hits`,`isshow`,`comment_num`,`istop`,`ishot`,`istuijian`,`tags`,`member_id`,`target`,`ownurl`,`video`) VALUES ('17','体验大PK：部分智能小程序自建VS一站式互动组件','11','article','baiduminiapp','小程序','duang,duang,duang！第一届互动组件体验大赛来啦！部分智能小程序自建VS百度提供的一站式互动组件谁将最终获胜？让我们拭目以待！01评论入口的设置某智能小程序：评论入口...','体验大PK：部分智能小程序自建VS一站式互动组件','1','/static/upload/202008037229.PNG','<p>duang,duang,duang！</p><p><br/></p><p>第一届互动组件体验大赛来啦！</p><p><br/></p><p>部分智能小程序自建VS百度提供的一站式互动组件</p><p><br/></p><p>谁将最终获胜？让我们拭目以待！</p><p><br/></p><p>01 评论入口的设置</p><p><br/></p><p>某智能小程序：评论入口在评论区里</p><p><br/></p><p>“我习惯看一篇文章的时候，在底栏评论。但是这个小程序里，我还得再找，刚才我就没看到这个最新评论，也没看见评论框。”</p><p><br/></p><p>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; ——李女士</p><p><br/></p><p><br/></p><p><br/></p><p>编辑搜图</p><p><br/></p><p><br/></p><p>请点击输入图片描述</p><p><br/></p><p>一站式互动组件：评论入口使用固定置底、不随页面滚动的底bar的评论框，方便用户随时触发评论。</p><p><br/></p><p><br/></p><p><br/></p><p>编辑搜图</p><p><br/></p><p><br/></p><p>请点击输入图片描述</p><p><br/></p><p>02&nbsp; 评论回复入口的设置</p><p><br/></p><p>某智能小程序：点击评论本身发起回复</p><p><br/></p><p>“你看没有回复两个字，这个我们也不知道能不能回复，算了，懒得回复了。”</p><p><br/></p><p>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;—— 蒋女士</p><p><br/></p><p><br/></p><p><br/></p><p>编辑搜图</p><p><br/></p><p><br/></p><p>请点击输入图片描述</p><p><br/></p><p>一站式互动组件：已有评论的回复入口使用明确的回复按钮，有效避免用户产生疑惑。</p><p><br/></p><p><br/></p><p><br/></p><p>编辑搜图</p><p><br/></p><p><br/></p><p>请点击输入图片描述</p><p><br/></p><p>03&nbsp; 评论成功后的反馈</p><p><br/></p><p>某智能小程序：评论后，新评论未显示</p><p><br/></p><p>“它回复之后看不到自己的回复，感觉就跟没回复一样，这是怎么回事。”</p><p><br/></p><p>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;——国先生</p><p><br/></p><p>一站式互动组件：评论成功后提供如下反馈</p><p><br/></p><p>1. 即时展现新评论</p><p><br/></p><p>2. 页面滑动定位至新评论</p><p><br/></p><p>3. TOAST 提示发表成功</p><p><br/></p><p><br/></p><p><br/></p><p>编辑搜图</p><p><br/></p><p><br/></p><p>请点击输入图片描述</p><p><br/></p><p>04&nbsp; 评论失败后的反馈</p><p><br/></p><p>某智能小程序：发布失败后无任何反馈</p><p><br/></p><p>“评论失败，我输入的内容直接消失了不见？这太bug了。”</p><p><br/></p><p>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;—— 张女士</p><p><br/></p><p><br/></p><p><br/></p><p>编辑搜图</p><p>图片模糊，建议替换或删除×</p><p><br/></p><p><br/></p><p>请点击输入图片描述</p><p><br/></p><p>1. 保存草稿&nbsp; &nbsp; 2. 停留在输入态&nbsp; &nbsp;3. TOAST 提示</p><p><br/></p><p><br/></p><p><br/></p><p>编辑搜图</p><p><br/></p><p><br/></p><p>请点击输入图片描述</p><p><br/></p><p>四轮比拼，“一站式互动组件”体验完胜！</p><p><br/></p><p><br/></p><p><br/></p><p>编辑搜图</p><p><br/></p><p><br/></p><p>请点击输入图片描述</p><p><br/></p><p>那么什么是一站式互动组件？如何接入？接入之后有什么好处呢？</p><p><br/></p><p>不要慌，智能小程序学院告诉你</p><p><br/></p>','1596439756','0','5','1','0','0','0','0',',小程序,','0', NULL, NULL, NULL);
INSERT INTO `jz_article` (`id`,`title`,`tid`,`molds`,`htmlurl`,`keywords`,`description`,`seo_title`,`userid`,`litpic`,`body`,`addtime`,`orders`,`hits`,`isshow`,`comment_num`,`istop`,`ishot`,`istuijian`,`tags`,`member_id`,`target`,`ownurl`,`video`) VALUES ('18','php极致CMS建站教学视频，基础建站演示，CMS建站教学视频','4','article','course','极致CMS,php,教学视频','php极致CMS建站教学视频，基础建站演示，CMS建站教学视频','php极致CMS建站教学视频，基础建站演示，CMS建站教学视频','1','/static/upload/202008032020.jpg','<p>基础建站演示，CMS建站教学视频</p>','1596440081','0','6','1','0','0','0','0', NULL,'0', NULL, NULL,'https://mini.jizhicms.cn/jizhi.mp4');
INSERT INTO `jz_article` (`id`,`title`,`tid`,`molds`,`htmlurl`,`keywords`,`description`,`seo_title`,`userid`,`litpic`,`body`,`addtime`,`orders`,`hits`,`isshow`,`comment_num`,`istop`,`ishot`,`istuijian`,`tags`,`member_id`,`target`,`ownurl`,`video`) VALUES ('19','极致CMS筛选功能详解','4','article','course','极致CMS,筛选功能','极致CMS筛选功能详解','极致CMS筛选功能详解','1','/static/upload/202008032020.jpg','<p>极致CMS筛选功能详解</p>','1596440672','0','4','1','0','0','0','0', NULL,'0', NULL, NULL,'https://mini.jizhicms.cn/jizhi.mp4');
INSERT INTO `jz_article` (`id`,`title`,`tid`,`molds`,`htmlurl`,`keywords`,`description`,`seo_title`,`userid`,`litpic`,`body`,`addtime`,`orders`,`hits`,`isshow`,`comment_num`,`istop`,`ishot`,`istuijian`,`tags`,`member_id`,`target`,`ownurl`,`video`) VALUES ('20','极致CMS-Skycaiji插件使用教程','4','article','course','极致CMS,Skycaiji插件','极致CMS,Skycaiji插件','极致CMS-Skycaiji插件使用教程','1','/static/upload/202008032020.jpg','<p>Skycaiji插件使用教程</p>','1596440796','0','1','1','0','0','0','0', NULL,'0', NULL, NULL,'https://mini.jizhicms.cn/jizhi.mp4');
INSERT INTO `jz_article` (`id`,`title`,`tid`,`molds`,`htmlurl`,`keywords`,`description`,`seo_title`,`userid`,`litpic`,`body`,`addtime`,`orders`,`hits`,`isshow`,`comment_num`,`istop`,`ishot`,`istuijian`,`tags`,`member_id`,`target`,`ownurl`,`video`) VALUES ('21','极致CMS插件-Excel导入导出插件使用教程','4','article','course','极致CMS,Excel','极致CMS插件-Excel导入导出插件使用教程','极致CMS插件-Excel导入导出插件使用教程','1','/static/upload/202008032020.jpg','<p>Excel导入导出插件使用教程</p>','1596441070','0','3','1','0','0','0','0', NULL,'0', NULL, NULL,'https://mini.jizhicms.cn/jizhi.mp4');
INSERT INTO `jz_article` (`id`,`title`,`tid`,`molds`,`htmlurl`,`keywords`,`description`,`seo_title`,`userid`,`litpic`,`body`,`addtime`,`orders`,`hits`,`isshow`,`comment_num`,`istop`,`ishot`,`istuijian`,`tags`,`member_id`,`target`,`ownurl`,`video`) VALUES ('22','极致CMS 多语言中英文站解决方案','4','article','course','极致CMS,多语言中英文站','极致CMS多语言中英文站解决方案','极致CMS 多语言中英文站解决方案','1','/static/upload/202008032020.jpg','<p>极致CMS多语言中英文站解决方案</p>','1596441262','0','2','1','0','0','0','0', NULL,'0', NULL, NULL,'https://mini.jizhicms.cn/jizhi.mp4');
INSERT INTO `jz_article` (`id`,`title`,`tid`,`molds`,`htmlurl`,`keywords`,`description`,`seo_title`,`userid`,`litpic`,`body`,`addtime`,`orders`,`hits`,`isshow`,`comment_num`,`istop`,`ishot`,`istuijian`,`tags`,`member_id`,`target`,`ownurl`,`video`) VALUES ('23','极致CMS零基础建站教程视频','4','article','course','极致CMS','从环境搭建，功能介绍，前后台使用，模板标签，二次开发，插件开发','极致CMS零基础建站教程视频','1','/static/upload/202008032020.jpg','<p>官网：<a href="https://www.jizhicms.cn">https://www.jizhicms.cn</a></p><p><br/></p><p>从环境搭建，功能介绍，前后台使用，模板标签，二次开发，插件开发<br/></p>','1596441347','0','35','1','0','0','0','0',',极致CMS,','0', NULL, NULL,'https://mini.jizhicms.cn/jizhi.mp4');
-- ----------------------------
-- Records of jz_buylog
-- ----------------------------
INSERT INTO `jz_buylog` (`id`,`aid`,`userid`,`orderno`,`type`,`buytype`,`msg`,`molds`,`amount`,`money`,`addtime`) VALUES ('1','0','1','No20200803164054','3','jifen','登录奖励', NULL,'1.00','1.00','1596444054');
INSERT INTO `jz_buylog` (`id`,`aid`,`userid`,`orderno`,`type`,`buytype`,`msg`,`molds`,`amount`,`money`,`addtime`) VALUES ('2','0','2','No20200803223231','3','jifen','登录奖励', NULL,'1.00','1.00','1596465151');
INSERT INTO `jz_buylog` (`id`,`aid`,`userid`,`orderno`,`type`,`buytype`,`msg`,`molds`,`amount`,`money`,`addtime`) VALUES ('3','0','3','No20200804123522','3','jifen','登录奖励', NULL,'1.00','1.00','1596515722');
-- ----------------------------
-- Records of jz_classtype
-- ----------------------------
INSERT INTO `jz_classtype` (`id`,`classname`,`seo_classname`,`molds`,`litpic`,`description`,`keywords`,`body`,`orders`,`orderstype`,`isshow`,`iscover`,`pid`,`gid`,`htmlurl`,`lists_html`,`details_html`,`lists_num`,`comment_num`,`gourl`,`ishome`,`isclose`) VALUES ('1','建站技术', NULL,'article','/static/upload/202008043926.jpg','建站的技巧，SEO等相关文章', NULL, NULL,'0','1','1','0','0','0','news','article-list','article-details','10','0', NULL,'0','0');
INSERT INTO `jz_classtype` (`id`,`classname`,`seo_classname`,`molds`,`litpic`,`description`,`keywords`,`body`,`orders`,`orderstype`,`isshow`,`iscover`,`pid`,`gid`,`htmlurl`,`lists_html`,`details_html`,`lists_num`,`comment_num`,`gourl`,`ishome`,`isclose`) VALUES ('2','主题模板', NULL,'article','/static/upload/202008042064.jpg','各种精美的模板都在这里啦~', NULL, NULL,'0','1','1','0','0','0','template','article-list','article-details','10','0', NULL,'0','0');
INSERT INTO `jz_classtype` (`id`,`classname`,`seo_classname`,`molds`,`litpic`,`description`,`keywords`,`body`,`orders`,`orderstype`,`isshow`,`iscover`,`pid`,`gid`,`htmlurl`,`lists_html`,`details_html`,`lists_num`,`comment_num`,`gourl`,`ishome`,`isclose`) VALUES ('3','小程序', NULL,'article','/static/upload/202008044525.jpeg','微信小程序，支付宝小程序，百度小程序', NULL, NULL,'0','1','1','0','0','0','miniapp','article-list','article-details','10','0', NULL,'0','0');
INSERT INTO `jz_classtype` (`id`,`classname`,`seo_classname`,`molds`,`litpic`,`description`,`keywords`,`body`,`orders`,`orderstype`,`isshow`,`iscover`,`pid`,`gid`,`htmlurl`,`lists_html`,`details_html`,`lists_num`,`comment_num`,`gourl`,`ishome`,`isclose`) VALUES ('4','视频教程', NULL,'article','/static/upload/202008043581.jpg','极致CMS零基础建站教学视频', NULL, NULL,'0','1','1','0','0','0','course','article-list','article-details','10','0', NULL,'0','0');
INSERT INTO `jz_classtype` (`id`,`classname`,`seo_classname`,`molds`,`litpic`,`description`,`keywords`,`body`,`orders`,`orderstype`,`isshow`,`iscover`,`pid`,`gid`,`htmlurl`,`lists_html`,`details_html`,`lists_num`,`comment_num`,`gourl`,`ishome`,`isclose`) VALUES ('5','关于我们','关于我们','page','/static/upload/202008043134.png', NULL, NULL,'<p>极致CMS是开源免费的PHPCMS网站内容管理系统，无商业授权，简单易用，提供丰富的插件，帮您实现零基础搭建不同类型网站（企业站，门户站，个人博客站等），是您建站的好帮手。极速建站，就选极致CMS。</p><p><br/></p>','0','1','1','0','0','0','about','page','details','10','0', NULL,'0','0');
INSERT INTO `jz_classtype` (`id`,`classname`,`seo_classname`,`molds`,`litpic`,`description`,`keywords`,`body`,`orders`,`orderstype`,`isshow`,`iscover`,`pid`,`gid`,`htmlurl`,`lists_html`,`details_html`,`lists_num`,`comment_num`,`gourl`,`ishome`,`isclose`) VALUES ('6','建站SEO', NULL,'article', NULL, NULL, NULL, NULL,'0','1','1','0','1','0','seo','article-list','article-details','10','0', NULL,'0','0');
INSERT INTO `jz_classtype` (`id`,`classname`,`seo_classname`,`molds`,`litpic`,`description`,`keywords`,`body`,`orders`,`orderstype`,`isshow`,`iscover`,`pid`,`gid`,`htmlurl`,`lists_html`,`details_html`,`lists_num`,`comment_num`,`gourl`,`ishome`,`isclose`) VALUES ('7','前端技术', NULL,'article', NULL, NULL, NULL, NULL,'0','1','1','0','1','0','webhtml','article-list','article-details','10','0', NULL,'0','0');
INSERT INTO `jz_classtype` (`id`,`classname`,`seo_classname`,`molds`,`litpic`,`description`,`keywords`,`body`,`orders`,`orderstype`,`isshow`,`iscover`,`pid`,`gid`,`htmlurl`,`lists_html`,`details_html`,`lists_num`,`comment_num`,`gourl`,`ishome`,`isclose`) VALUES ('8','响应式模板', NULL,'article', NULL, NULL, NULL, NULL,'0','1','1','0','2','0','responsive','article-list','article-details','10','0', NULL,'0','0');
INSERT INTO `jz_classtype` (`id`,`classname`,`seo_classname`,`molds`,`litpic`,`description`,`keywords`,`body`,`orders`,`orderstype`,`isshow`,`iscover`,`pid`,`gid`,`htmlurl`,`lists_html`,`details_html`,`lists_num`,`comment_num`,`gourl`,`ishome`,`isclose`) VALUES ('9','手机端模板', NULL,'article', NULL, NULL, NULL, NULL,'0','1','1','0','2','0','mobile','article-list','article-details','10','0', NULL,'0','0');
INSERT INTO `jz_classtype` (`id`,`classname`,`seo_classname`,`molds`,`litpic`,`description`,`keywords`,`body`,`orders`,`orderstype`,`isshow`,`iscover`,`pid`,`gid`,`htmlurl`,`lists_html`,`details_html`,`lists_num`,`comment_num`,`gourl`,`ishome`,`isclose`) VALUES ('10','微信小程序', NULL,'article', NULL, NULL, NULL, NULL,'0','1','1','0','3','0','wechatmini','article-list','article-details','10','0', NULL,'0','0');
INSERT INTO `jz_classtype` (`id`,`classname`,`seo_classname`,`molds`,`litpic`,`description`,`keywords`,`body`,`orders`,`orderstype`,`isshow`,`iscover`,`pid`,`gid`,`htmlurl`,`lists_html`,`details_html`,`lists_num`,`comment_num`,`gourl`,`ishome`,`isclose`) VALUES ('11','百度小程序', NULL,'article', NULL, NULL, NULL, NULL,'0','1','1','0','3','0','baiduminiapp','article-list','article-details','10','0', NULL,'0','0');
-- ----------------------------
-- Records of jz_collect
-- ----------------------------
INSERT INTO `jz_collect` (`id`,`title`,`description`,`tid`,`litpic`,`w`,`h`,`orders`,`addtime`,`isshow`,`url`) VALUES ('1','极致CMS 让天下没有难做的网站！', NULL,'1','/static/upload/202008036598.jpg','0','0','0','1596412541','1','https://www.jizhicms.cn');
INSERT INTO `jz_collect` (`id`,`title`,`description`,`tid`,`litpic`,`w`,`h`,`orders`,`addtime`,`isshow`,`url`) VALUES ('2','快速搭建网站，小程序，就选极致CMS！', NULL,'1','/static/upload/202008044102.jpg','0','0','0','1596513312','1','https://www.jizhicms.cn');
-- ----------------------------
-- Records of jz_collect_type
-- ----------------------------
INSERT INTO `jz_collect_type` (`id`,`name`,`addtime`) VALUES ('1','首页轮播图','1596412535');
-- ----------------------------
-- Records of jz_comment
-- ----------------------------
INSERT INTO `jz_comment` (`id`,`tid`,`aid`,`pid`,`zid`,`body`,`reply`,`addtime`,`userid`,`likes`,`isshow`,`isread`) VALUES ('1','8','7','0','0','不错！正是我想要的模板！感谢！', NULL,'1596446523','1','0.0','1','0');
INSERT INTO `jz_comment` (`id`,`tid`,`aid`,`pid`,`zid`,`body`,`reply`,`addtime`,`userid`,`likes`,`isshow`,`isread`) VALUES ('2','8','7','1','1','对啊，我也正在找', NULL,'1596450074','1','0.0','1','0');
-- ----------------------------
-- Records of jz_customurl
-- ----------------------------
-- ----------------------------
-- Records of jz_fields
-- ----------------------------
INSERT INTO `jz_fields` (`id`,`field`,`molds`,`fieldname`,`tips`,`fieldtype`,`tids`,`fieldlong`,`body`,`orders`,`ismust`,`isshow`,`isadmin`,`issearch`,`islist`,`format`,`vdata`,`isajax`) VALUES ('1','url','links','链接', NULL,'1', NULL,'255', NULL,'0','1','1','1','0','1', NULL, NULL,'1');
INSERT INTO `jz_fields` (`id`,`field`,`molds`,`fieldname`,`tips`,`fieldtype`,`tids`,`fieldlong`,`body`,`orders`,`ismust`,`isshow`,`isadmin`,`issearch`,`islist`,`format`,`vdata`,`isajax`) VALUES ('2','title','links','链接名称', NULL,'1', NULL,'255', NULL,'0','1','1','1','1','1', NULL, NULL,'1');
INSERT INTO `jz_fields` (`id`,`field`,`molds`,`fieldname`,`tips`,`fieldtype`,`tids`,`fieldlong`,`body`,`orders`,`ismust`,`isshow`,`isadmin`,`issearch`,`islist`,`format`,`vdata`,`isajax`) VALUES ('3','email','message','联系邮箱', NULL,'1', NULL,'255', NULL,'0','0','1','1','1','1', NULL, NULL,'1');
INSERT INTO `jz_fields` (`id`,`field`,`molds`,`fieldname`,`tips`,`fieldtype`,`tids`,`fieldlong`,`body`,`orders`,`ismust`,`isshow`,`isadmin`,`issearch`,`islist`,`format`,`vdata`,`isajax`) VALUES ('4','keywords','tags','关键词','尽量简短，但不能重复','1', NULL,'50', NULL,'0','0','1','1','1','1', NULL, NULL,'1');
INSERT INTO `jz_fields` (`id`,`field`,`molds`,`fieldname`,`tips`,`fieldtype`,`tids`,`fieldlong`,`body`,`orders`,`ismust`,`isshow`,`isadmin`,`issearch`,`islist`,`format`,`vdata`,`isajax`) VALUES ('5','newname','tags','替换词','尽量简短，但不能重复，20字以内，可不填。','1', NULL,'50', NULL,'0','0','1','1','1','1', NULL, NULL,'1');
INSERT INTO `jz_fields` (`id`,`field`,`molds`,`fieldname`,`tips`,`fieldtype`,`tids`,`fieldlong`,`body`,`orders`,`ismust`,`isshow`,`isadmin`,`issearch`,`islist`,`format`,`vdata`,`isajax`) VALUES ('6','url','tags','内链','填写详细链接，带http','1', NULL,'255', NULL,'0','0','1','1','1','1', NULL, NULL,'1');
INSERT INTO `jz_fields` (`id`,`field`,`molds`,`fieldname`,`tips`,`fieldtype`,`tids`,`fieldlong`,`body`,`orders`,`ismust`,`isshow`,`isadmin`,`issearch`,`islist`,`format`,`vdata`,`isajax`) VALUES ('7','num','tags','替换次数','一篇文章内替换的次数，默认-1，全部替换','4', NULL,'4', NULL,'0','0','1','1','0','1', NULL,'-1','1');
INSERT INTO `jz_fields` (`id`,`field`,`molds`,`fieldname`,`tips`,`fieldtype`,`tids`,`fieldlong`,`body`,`orders`,`ismust`,`isshow`,`isadmin`,`issearch`,`islist`,`format`,`vdata`,`isajax`) VALUES ('8','target','tags','打开方式', NULL,'7', NULL,'50','新窗口=_blank,本窗口=_self','0','0','1','1','0','1', NULL,'_blank','1');
INSERT INTO `jz_fields` (`id`,`field`,`molds`,`fieldname`,`tips`,`fieldtype`,`tids`,`fieldlong`,`body`,`orders`,`ismust`,`isshow`,`isadmin`,`issearch`,`islist`,`format`,`vdata`,`isajax`) VALUES ('9','number','tags','标签数','无需填写，程序自动处理','4', NULL,'11', NULL,'0','0','1','1','0','1', NULL,'0','1');
INSERT INTO `jz_fields` (`id`,`field`,`molds`,`fieldname`,`tips`,`fieldtype`,`tids`,`fieldlong`,`body`,`orders`,`ismust`,`isshow`,`isadmin`,`issearch`,`islist`,`format`,`vdata`,`isajax`) VALUES ('10','member_id','article','发布用户','前台会员，无需填写','13', NULL,'11','3,username','0','0','0','0','0','0', NULL,'0','1');
INSERT INTO `jz_fields` (`id`,`field`,`molds`,`fieldname`,`tips`,`fieldtype`,`tids`,`fieldlong`,`body`,`orders`,`ismust`,`isshow`,`isadmin`,`issearch`,`islist`,`format`,`vdata`,`isajax`) VALUES ('11','member_id','product','发布用户','前台会员，无需填写','13', NULL,'11','3,username','0','0','0','0','0','0', NULL,'0','1');
INSERT INTO `jz_fields` (`id`,`field`,`molds`,`fieldname`,`tips`,`fieldtype`,`tids`,`fieldlong`,`body`,`orders`,`ismust`,`isshow`,`isadmin`,`issearch`,`islist`,`format`,`vdata`,`isajax`) VALUES ('12','member_id','links','发布用户','前台会员，无需填写','13', NULL,'11','3,username','0','0','0','0','0','0', NULL,'0','1');
INSERT INTO `jz_fields` (`id`,`field`,`molds`,`fieldname`,`tips`,`fieldtype`,`tids`,`fieldlong`,`body`,`orders`,`ismust`,`isshow`,`isadmin`,`issearch`,`islist`,`format`,`vdata`,`isajax`) VALUES ('13','target','links','外链URL','默认为空，系统访问内容则直接跳转到此链接','1', NULL,'255', NULL,'0','0','0','0','0','0', NULL, NULL,'1');
INSERT INTO `jz_fields` (`id`,`field`,`molds`,`fieldname`,`tips`,`fieldtype`,`tids`,`fieldlong`,`body`,`orders`,`ismust`,`isshow`,`isadmin`,`issearch`,`islist`,`format`,`vdata`,`isajax`) VALUES ('14','ownurl','links','自定义URL','默认为空，自定义URL','1', NULL,'255', NULL,'0','0','0','0','0','0', NULL, NULL,'1');
INSERT INTO `jz_fields` (`id`,`field`,`molds`,`fieldname`,`tips`,`fieldtype`,`tids`,`fieldlong`,`body`,`orders`,`ismust`,`isshow`,`isadmin`,`issearch`,`islist`,`format`,`vdata`,`isajax`) VALUES ('15','ownurl','tags','自定义URL','默认为空，自定义URL','1', NULL,'255', NULL,'0','0','0','0','0','0', NULL, NULL,'1');
INSERT INTO `jz_fields` (`id`,`field`,`molds`,`fieldname`,`tips`,`fieldtype`,`tids`,`fieldlong`,`body`,`orders`,`ismust`,`isshow`,`isadmin`,`issearch`,`islist`,`format`,`vdata`,`isajax`) VALUES ('16','addtime','links','添加时间','系统自带','11', NULL,'11', NULL,'0','0','0','0','0','0','date_2','0','1');
INSERT INTO `jz_fields` (`id`,`field`,`molds`,`fieldname`,`tips`,`fieldtype`,`tids`,`fieldlong`,`body`,`orders`,`ismust`,`isshow`,`isadmin`,`issearch`,`islist`,`format`,`vdata`,`isajax`) VALUES ('17','addtime','tags','添加时间','系统自带','11', NULL,'11', NULL,'0','0','0','0','0','0','date_2','0','1');
INSERT INTO `jz_fields` (`id`,`field`,`molds`,`fieldname`,`tips`,`fieldtype`,`tids`,`fieldlong`,`body`,`orders`,`ismust`,`isshow`,`isadmin`,`issearch`,`islist`,`format`,`vdata`,`isajax`) VALUES ('18','video','article','视频地址', NULL,'1',',4,','255', NULL,'2','0','1','1','0','0', NULL, NULL,'1');
-- ----------------------------
-- Records of jz_hook
-- ----------------------------
INSERT INTO `jz_hook` (`id`,`module`,`namespace`,`controller`,`action`,`hook_namespace`,`hook_controller`,`hook_action`,`all_action`,`orders`,`isopen`,`plugins_name`,`addtime`) VALUES ('1','A','A','Common','uploads','A','Image','uploads','1','0','1','imagethumbnail','1596414480');
INSERT INTO `jz_hook` (`id`,`module`,`namespace`,`controller`,`action`,`hook_namespace`,`hook_controller`,`hook_action`,`all_action`,`orders`,`isopen`,`plugins_name`,`addtime`) VALUES ('2','A','A','Common','uploads','A','Image','uploads','1','0','1','imagethumbnail','1596414913');
-- ----------------------------
-- Records of jz_layout
-- ----------------------------
INSERT INTO `jz_layout` (`id`,`name`,`top_layout`,`left_layout`,`gid`,`ext`,`sys`,`isdefault`) VALUES ('1','CMS系统默认','[]','[{"name":"网站管理","icon":"&amp;#xe699;","nav":["42","9","95","83","147","22"]},{"name":"商品管理","icon":"&amp;#xe698;","nav":["105","129","2","118","123","16","177"]},{"name":"扩展管理","icon":"&amp;#xe6ce;","nav":["76","116","141","142","143","35","61","154","153"]},{"name":"系统设置","icon":"&amp;#xe6ae;","nav":["40","54","49","70","115","114","66"]}]','0','系统配置，不可删除！','1','1');
INSERT INTO `jz_layout` (`id`,`name`,`top_layout`,`left_layout`,`gid`,`ext`,`sys`,`isdefault`) VALUES ('2','CMS客户界面','[]','[{"name":"内容管理","icon":"&amp;#xe6fb;","nav":["9"]},{"name":"栏目管理","icon":"&amp;#xe699;","nav":["42"]},{"name":"商品管理","icon":"&amp;#xe6cb;","nav":["105"]},{"name":"订单管理","icon":"&amp;#xe722;","nav":["129"]},{"name":"会员管理","icon":"&amp;#xe6b8;","nav":["2"]},{"name":"网站留言","icon":"&amp;#xe69f;","nav":["22"]},{"name":"友情链接","icon":"&amp;#xe6f7;","nav":["95"]},{"name":"轮播图","icon":"&amp;#xe6a8;","nav":["83"]},{"name":"公众号","icon":"&amp;#xe60e;","nav":["141","142"]},{"name":"系统设置","icon":"&amp;#xe6ae;","nav":["40","35","114","116"]}]','2','网站管理员-客户端-按需配置','0','0');
INSERT INTO `jz_layout` (`id`,`name`,`top_layout`,`left_layout`,`gid`,`ext`,`sys`,`isdefault`) VALUES ('3','Blog界面','[]','[{"name":"栏目管理","icon":"&amp;#xe699;","nav":["42"]},{"name":"文章管理","icon":"&amp;#xe6fb;","nav":["9"]},{"name":"会员管理","icon":"&amp;#xe6b8;","nav":["2","118","123"]},{"name":"轮播图","icon":"&amp;#xe6a8;","nav":["83","89"]},{"name":"评论管理","icon":"&amp;#xe69b;","nav":["16"]},{"name":"留言管理","icon":"&amp;#xe69f;","nav":["22"]},{"name":"友情链接","icon":"&amp;#xe6f7;","nav":["95"]},{"name":"系统扩展","icon":"&amp;#xe6ce;","nav":["35","70","76","116"]},{"name":"系统设置","icon":"&amp;#xe6ae;","nav":["40","115","153","154","114"]}]','3','Blog用户界面，可以自定义修改，比较简洁一些','0','0');
INSERT INTO `jz_layout` (`id`,`name`,`top_layout`,`left_layout`,`gid`,`ext`,`sys`,`isdefault`) VALUES ('4','基础建站客户端','[]','[{"name":"栏目管理","icon":"&amp;#xe699;","nav":["42"]},{"name":"文章管理","icon":"&amp;#xe6fb;","nav":["9"]},{"name":"商品管理","icon":"&amp;#xe6cb;","nav":["105"]},{"name":"轮播图","icon":"&amp;#xe6a8;","nav":["83","89"]},{"name":"友情链接","icon":"&amp;#xe6f7;","nav":["95"]},{"name":"网站留言","icon":"&amp;#xe69f;","nav":["22"]},{"name":"系统设置","icon":"&amp;#xe6ae;","nav":["40","35","114"]}]','0','基础建站-没有会员-没有评论-系统设置里面高级配置需要建站人员自己隐藏！','0','0');
-- ----------------------------
-- Records of jz_level
-- ----------------------------
INSERT INTO `jz_level` (`id`,`name`,`pass`,`tel`,`gid`,`email`,`regtime`,`logintime`,`status`) VALUES ('1','admin','0acdd3e4a8a2a1f8aa3ac518313dab9d','13600136000','1','123456@qq.com','1596372189','1596589384','1');
-- ----------------------------
-- Records of jz_level_group
-- ----------------------------
INSERT INTO `jz_level_group` (`id`,`name`,`isadmin`,`classcontrol`,`paction`,`tids`,`isagree`,`description`) VALUES ('1','超级管理员','1','0',',Fields,', NULL,'1', NULL);
INSERT INTO `jz_level_group` (`id`,`name`,`isadmin`,`classcontrol`,`paction`,`tids`,`isagree`,`description`) VALUES ('2','网站管理员','0','0',',Member,Article,Comment,Message,Fields/get_fields,Index,Sys/index,Sys/loginlog,Sys/pictures,Sys/uploadcert,Sys/deletePic,Sys/deletePicAll,Sys/custom_del,Sys/email-order,Sys/payconfig,Sys/wechatbind,Classtype,Extmolds,Collect,Common,Product,Order,Wechat,', NULL,'1','网站管理员，客户使用分组，权限仅次于超级管理员。');
INSERT INTO `jz_level_group` (`id`,`name`,`isadmin`,`classcontrol`,`paction`,`tids`,`isagree`,`description`) VALUES ('3','Blog','0','0',',Member,Article,Comment,Message,Fields/get_fields,Index/index,Index/welcome,Index/beifen,Index/backup,Index/huanyuan,Index/shanchu,Index/details,Index/desktop,Index/desktop_edit,Index/unicode,Index/update_session_maxlifetime,Index/cleanCache,Index/showlabel,Index/sitemap,Index/tohtml,Index/html_classtype,Index/html_molds,Sys/index,Sys/loginlog,Sys/pictures,Sys/uploadcert,Sys/deletePic,Sys/deletePicAll,Sys/custom_del,Classtype,Molds,Plugins,Links/index,Links/addlinks,Links/editlinks,Links/copylinks,Links/deletelinks,Links/deleteAll,Links/editOrders,Links/changeType,Links/copyAll,Links/editOrders,Links/linktype,Links/linktypeadd,Links/linktypeedit,Links/linktypedelete,Collect,Common,Common/uploads,Product,', NULL,'1','Blog角色-主要用户blog用户使用，比较简洁');
INSERT INTO `jz_level_group` (`id`,`name`,`isadmin`,`classcontrol`,`paction`,`tids`,`isagree`,`description`) VALUES ('4','基础建站','0','0',',Article,Message,Fields/get_fields,Index/index,Index/welcome,Index/beifen,Index/backup,Index/huanyuan,Index/shanchu,Index/details,Index/update_session_maxlifetime,Index/cleanCache,Index/sitemap,Index/tohtml,Index/html_classtype,Index/html_molds,Sys/index,Sys/uploadcert,Classtype/index,Classtype/editclass,Classtype/editClassOrders,Classtype/change_status,Classtype/get_pinyin,Links/index,Links/addlinks,Links/editlinks,Links/copylinks,Links/deletelinks,Links/deleteAll,Links/editOrders,Links/changeType,Links/copyAll,Links/editOrders,Links/linktype,Links/linktypeadd,Links/linktypeedit,Links/linktypedelete,Collect,Common,Common/uploads,Product,', NULL,'1','基础建站，会员评论等功能模块去除');
-- ----------------------------
-- Records of jz_link_type
-- ----------------------------
INSERT INTO `jz_link_type` (`id`,`name`,`addtime`) VALUES ('1','首页链接','1596433106');
-- ----------------------------
-- Records of jz_links
-- ----------------------------
INSERT INTO `jz_links` (`id`,`title`,`molds`,`url`,`isshow`,`tid`,`userid`,`htmlurl`,`orders`,`member_id`,`target`,`ownurl`,`addtime`) VALUES ('1','快速建站，就选极致CMS！','links','https://www.jizhicms.cn','1','1','1','news','0','0', NULL, NULL,'0');
INSERT INTO `jz_links` (`id`,`title`,`molds`,`url`,`isshow`,`tid`,`userid`,`htmlurl`,`orders`,`member_id`,`target`,`ownurl`,`addtime`) VALUES ('2','极致应用市场','links','http://app.jizhicms.cn','1','1','1','news','0','0', NULL, NULL,'0');
-- ----------------------------
-- Records of jz_member
-- ----------------------------
INSERT INTO `jz_member` (`id`,`username`,`openid`,`pass`,`token`,`sex`,`gid`,`litpic`,`tel`,`jifen`,`likes`,`collection`,`money`,`email`,`address`,`province`,`city`,`regtime`,`logintime`,`isshow`,`signature`,`birthday`,`follow`,`fans`,`ismsg`,`iscomment`,`iscollect`,`islikes`,`isat`,`isrechange`,`pid`) VALUES ('1','极致CMS', NULL,'281ab141a12f67f5238719cd876ce96e', NULL,'0','1', NULL,'13600136000','1.00', NULL, NULL,'0.00','123456@qq.com', NULL, NULL, NULL,'1596444043','1596444054','1', NULL, NULL, NULL,'0','1','1','1','1','1','1','0');
INSERT INTO `jz_member` (`id`,`username`,`openid`,`pass`,`token`,`sex`,`gid`,`litpic`,`tel`,`jifen`,`likes`,`collection`,`money`,`email`,`address`,`province`,`city`,`regtime`,`logintime`,`isshow`,`signature`,`birthday`,`follow`,`fans`,`ismsg`,`iscomment`,`iscollect`,`islikes`,`isat`,`isrechange`,`pid`) VALUES ('2','0ch84m', NULL,'88f551ca010f52deb7752a3d03832bd2','cqnVqpSAu456LYH73UjQUUY3EAoREKsw','0','1', NULL,'18443124181','1.00','||||', NULL,'0.00','517445611@qq.com', NULL, NULL, NULL,'1596465142','1596465151','1', NULL, NULL, NULL,'0','1','1','1','1','1','1','0');
INSERT INTO `jz_member` (`id`,`username`,`openid`,`pass`,`token`,`sex`,`gid`,`litpic`,`tel`,`jifen`,`likes`,`collection`,`money`,`email`,`address`,`province`,`city`,`regtime`,`logintime`,`isshow`,`signature`,`birthday`,`follow`,`fans`,`ismsg`,`iscomment`,`iscollect`,`islikes`,`isat`,`isrechange`,`pid`) VALUES ('3','eiwDPO', NULL,'c4220e4e800ac24b69416f1b1654f730', NULL,'0','1', NULL,'15386622997','1.00','||8-7||', NULL,'0.00','179118262@qq.com', NULL, NULL, NULL,'1596515683','1596515722','1', NULL, NULL, NULL,'0','1','1','1','1','1','1','0');
-- ----------------------------
-- Records of jz_member_group
-- ----------------------------
INSERT INTO `jz_member_group` (`id`,`name`,`description`,`paction`,`pid`,`isagree`,`iscomment`,`ischeckmsg`,`addtime`,`orders`,`discount`,`discount_type`) VALUES ('1','注册会员','前台会员分组，最低等级分组',',Message,Comment,User,Order,Home,Common,','0','1','1','1','0','0','0.00','0');
-- ----------------------------
-- Records of jz_message
-- ----------------------------
-- ----------------------------
-- Records of jz_molds
-- ----------------------------
INSERT INTO `jz_molds` (`id`,`name`,`biaoshi`,`sys`,`isopen`,`iscontrol`,`ismust`,`isclasstype`,`isshowclass`,`list_html`,`details_html`) VALUES ('1','内容','article','1','1','1','1','1','1','article-list.html','article-details.html');
INSERT INTO `jz_molds` (`id`,`name`,`biaoshi`,`sys`,`isopen`,`iscontrol`,`ismust`,`isclasstype`,`isshowclass`,`list_html`,`details_html`) VALUES ('2','栏目','classtype','1','1','1','1','1','1','list.html','details.html');
INSERT INTO `jz_molds` (`id`,`name`,`biaoshi`,`sys`,`isopen`,`iscontrol`,`ismust`,`isclasstype`,`isshowclass`,`list_html`,`details_html`) VALUES ('3','会员','member','1','1','0','0','0','0','list.html','details.html');
INSERT INTO `jz_molds` (`id`,`name`,`biaoshi`,`sys`,`isopen`,`iscontrol`,`ismust`,`isclasstype`,`isshowclass`,`list_html`,`details_html`) VALUES ('4','订单','orders','1','1','0','0','0','0','list.html','details.html');
INSERT INTO `jz_molds` (`id`,`name`,`biaoshi`,`sys`,`isopen`,`iscontrol`,`ismust`,`isclasstype`,`isshowclass`,`list_html`,`details_html`) VALUES ('5','商品','product','1','1','1','1','1','1','list.html','details.html');
INSERT INTO `jz_molds` (`id`,`name`,`biaoshi`,`sys`,`isopen`,`iscontrol`,`ismust`,`isclasstype`,`isshowclass`,`list_html`,`details_html`) VALUES ('6','会员分组','member_group','1','1','0','0','1','0','list.html','details.html');
INSERT INTO `jz_molds` (`id`,`name`,`biaoshi`,`sys`,`isopen`,`iscontrol`,`ismust`,`isclasstype`,`isshowclass`,`list_html`,`details_html`) VALUES ('7','评论','comment','1','1','0','0','0','0','list.html','details.html');
INSERT INTO `jz_molds` (`id`,`name`,`biaoshi`,`sys`,`isopen`,`iscontrol`,`ismust`,`isclasstype`,`isshowclass`,`list_html`,`details_html`) VALUES ('8','留言','message','1','1','0','0','1','1','message.html','details.html');
INSERT INTO `jz_molds` (`id`,`name`,`biaoshi`,`sys`,`isopen`,`iscontrol`,`ismust`,`isclasstype`,`isshowclass`,`list_html`,`details_html`) VALUES ('9','轮播图','collect','1','1','0','0','0','0','list.html','details.html');
INSERT INTO `jz_molds` (`id`,`name`,`biaoshi`,`sys`,`isopen`,`iscontrol`,`ismust`,`isclasstype`,`isshowclass`,`list_html`,`details_html`) VALUES ('10','友情链接','links','1','1','0','0','0','0','list.html','details.html');
INSERT INTO `jz_molds` (`id`,`name`,`biaoshi`,`sys`,`isopen`,`iscontrol`,`ismust`,`isclasstype`,`isshowclass`,`list_html`,`details_html`) VALUES ('11','管理员','level','1','1','0','0','0','0','list.html','details.html');
INSERT INTO `jz_molds` (`id`,`name`,`biaoshi`,`sys`,`isopen`,`iscontrol`,`ismust`,`isclasstype`,`isshowclass`,`list_html`,`details_html`) VALUES ('12','TAG','tags','1','1','0','0','0','0','list.html','details.html');
INSERT INTO `jz_molds` (`id`,`name`,`biaoshi`,`sys`,`isopen`,`iscontrol`,`ismust`,`isclasstype`,`isshowclass`,`list_html`,`details_html`) VALUES ('13','单页','page','1','1','1','1','1','1','page.html','details.html');
-- ----------------------------
-- Records of jz_orders
-- ----------------------------
-- ----------------------------
-- Records of jz_page
-- ----------------------------
-- ----------------------------
-- Records of jz_pictures
-- ----------------------------
INSERT INTO `jz_pictures` (`id`,`tid`,`aid`,`molds`,`path`,`filetype`,`size`,`litpic`,`addtime`,`userid`) VALUES ('3','0','0','sysconfig','Admin','png','6.94','/static/upload/202008037166.png','1596410307','1');
INSERT INTO `jz_pictures` (`id`,`tid`,`aid`,`molds`,`path`,`filetype`,`size`,`litpic`,`addtime`,`userid`) VALUES ('2','0','0','sysconfig','Admin','png','138.42','/static/upload/202008032118.png','1596410189','1');
INSERT INTO `jz_pictures` (`id`,`tid`,`aid`,`molds`,`path`,`filetype`,`size`,`litpic`,`addtime`,`userid`) VALUES ('4','0','0','sysconfig','Admin','jpg','24.83','/static/upload/202008033594.jpg','1596411012','1');
INSERT INTO `jz_pictures` (`id`,`tid`,`aid`,`molds`,`path`,`filetype`,`size`,`litpic`,`addtime`,`userid`) VALUES ('6','0','0','sysconfig','Admin','jpg','41.97','/static/upload/202008039288.jpg','1596411871','1');
INSERT INTO `jz_pictures` (`id`,`tid`,`aid`,`molds`,`path`,`filetype`,`size`,`litpic`,`addtime`,`userid`) VALUES ('9','1','0','collect','Admin','jpg','67.35','/static/upload/202008036598.jpg','1596413460','1');
INSERT INTO `jz_pictures` (`id`,`tid`,`aid`,`molds`,`path`,`filetype`,`size`,`litpic`,`addtime`,`userid`) VALUES ('10','8','0','article','Admin','png','309.21','/static/upload/202008039248.png','1596435248','1');
INSERT INTO `jz_pictures` (`id`,`tid`,`aid`,`molds`,`path`,`filetype`,`size`,`litpic`,`addtime`,`userid`) VALUES ('11','8','0','article','Admin','png','612.09','/static/upload/202008037900.png','1596435432','1');
INSERT INTO `jz_pictures` (`id`,`tid`,`aid`,`molds`,`path`,`filetype`,`size`,`litpic`,`addtime`,`userid`) VALUES ('12','8','0','article','Admin','png','665.08','/static/upload/202008037072.png','1596435679','1');
INSERT INTO `jz_pictures` (`id`,`tid`,`aid`,`molds`,`path`,`filetype`,`size`,`litpic`,`addtime`,`userid`) VALUES ('13','8','0','article','Admin','png','488.03','/static/upload/202008036989.png','1596435759','1');
INSERT INTO `jz_pictures` (`id`,`tid`,`aid`,`molds`,`path`,`filetype`,`size`,`litpic`,`addtime`,`userid`) VALUES ('14','8','0','article','Admin','png','699.91','/static/upload/202008039444.png','1596435922','1');
INSERT INTO `jz_pictures` (`id`,`tid`,`aid`,`molds`,`path`,`filetype`,`size`,`litpic`,`addtime`,`userid`) VALUES ('15','8','0','article','Admin','png','192.2','/static/upload/202008034532.png','1596436142','1');
INSERT INTO `jz_pictures` (`id`,`tid`,`aid`,`molds`,`path`,`filetype`,`size`,`litpic`,`addtime`,`userid`) VALUES ('16','8','0','article','Admin','png','639.72','/static/upload/202008037661.png','1596436254','1');
INSERT INTO `jz_pictures` (`id`,`tid`,`aid`,`molds`,`path`,`filetype`,`size`,`litpic`,`addtime`,`userid`) VALUES ('17','10','0','article','Admin','png','160.59','/static/upload/202008038887.png','1596437410','1');
INSERT INTO `jz_pictures` (`id`,`tid`,`aid`,`molds`,`path`,`filetype`,`size`,`litpic`,`addtime`,`userid`) VALUES ('18','10','0','article','Admin','png','85.35','/static/upload/202008031709.png','1596437590','1');
INSERT INTO `jz_pictures` (`id`,`tid`,`aid`,`molds`,`path`,`filetype`,`size`,`litpic`,`addtime`,`userid`) VALUES ('19','6','0','article','Admin','jpg','42.59','/static/upload/202008036887.jpg','1596437783','1');
INSERT INTO `jz_pictures` (`id`,`tid`,`aid`,`molds`,`path`,`filetype`,`size`,`litpic`,`addtime`,`userid`) VALUES ('20','6','0','article','Admin','jpg','18.38','/static/upload/202008031872.jpg','1596438339','1');
INSERT INTO `jz_pictures` (`id`,`tid`,`aid`,`molds`,`path`,`filetype`,`size`,`litpic`,`addtime`,`userid`) VALUES ('21','6','0','article','Admin','png','191.08','/static/upload/202008036087.png','1596438437','1');
INSERT INTO `jz_pictures` (`id`,`tid`,`aid`,`molds`,`path`,`filetype`,`size`,`litpic`,`addtime`,`userid`) VALUES ('22','6','0','article','Admin','jpg','65.24','/static/upload/202008038196.jpg','1596438519','1');
INSERT INTO `jz_pictures` (`id`,`tid`,`aid`,`molds`,`path`,`filetype`,`size`,`litpic`,`addtime`,`userid`) VALUES ('23','11','0','article','Admin','png','60.09','/static/upload/202008038212.png','1596439474','1');
INSERT INTO `jz_pictures` (`id`,`tid`,`aid`,`molds`,`path`,`filetype`,`size`,`litpic`,`addtime`,`userid`) VALUES ('24','11','0','article','Admin','png','298.79','/static/upload/202008034897.png','1596439556','1');
INSERT INTO `jz_pictures` (`id`,`tid`,`aid`,`molds`,`path`,`filetype`,`size`,`litpic`,`addtime`,`userid`) VALUES ('25','11','0','article','Admin','png','30.88','/static/upload/202008039228.png','1596439692','1');
INSERT INTO `jz_pictures` (`id`,`tid`,`aid`,`molds`,`path`,`filetype`,`size`,`litpic`,`addtime`,`userid`) VALUES ('26','11','0','article','Admin','png','608.58','/static/upload/202008037229.PNG','1596439772','1');
INSERT INTO `jz_pictures` (`id`,`tid`,`aid`,`molds`,`path`,`filetype`,`size`,`litpic`,`addtime`,`userid`) VALUES ('27','4','0','article','Admin','jpg','99.53','/static/upload/202008032020.jpg','1596440174','1');
INSERT INTO `jz_pictures` (`id`,`tid`,`aid`,`molds`,`path`,`filetype`,`size`,`litpic`,`addtime`,`userid`) VALUES ('30','0','0', NULL,'Admin','jpg','37.56','/static/upload/202008043926.jpg','1596540403','1');
INSERT INTO `jz_pictures` (`id`,`tid`,`aid`,`molds`,`path`,`filetype`,`size`,`litpic`,`addtime`,`userid`) VALUES ('29','1','0','collect','Admin','jpg','116.04','/static/upload/202008044102.jpg','1596513564','1');
INSERT INTO `jz_pictures` (`id`,`tid`,`aid`,`molds`,`path`,`filetype`,`size`,`litpic`,`addtime`,`userid`) VALUES ('31','0','0', NULL,'Admin','jpg','47.82','/static/upload/202008042064.jpg','1596540434','1');
INSERT INTO `jz_pictures` (`id`,`tid`,`aid`,`molds`,`path`,`filetype`,`size`,`litpic`,`addtime`,`userid`) VALUES ('32','0','0', NULL,'Admin','jpeg','36.42','/static/upload/202008044525.jpeg','1596540616','1');
INSERT INTO `jz_pictures` (`id`,`tid`,`aid`,`molds`,`path`,`filetype`,`size`,`litpic`,`addtime`,`userid`) VALUES ('33','0','0', NULL,'Admin','png','30.88','/static/upload/202008043134.png','1596540682','1');
INSERT INTO `jz_pictures` (`id`,`tid`,`aid`,`molds`,`path`,`filetype`,`size`,`litpic`,`addtime`,`userid`) VALUES ('34','0','0', NULL,'Admin','jpg','67.35','/static/upload/202008043581.jpg','1596540866','1');
-- ----------------------------
-- Records of jz_plugins
-- ----------------------------
INSERT INTO `jz_plugins` (`id`,`name`,`filepath`,`description`,`version`,`author`,`update_time`,`module`,`isopen`,`addtime`,`config`) VALUES ('1','生成多种尺寸的缩略图','imagethumbnail','上传图片的同时生成大、中、小三种大小的图片','1.4','留恋风2581047041@qq.com','1596384000','Admin','1','1596414913','{"id":"1","default_rate_x":455,"default_rate_y":290,"default_value_x":"","default_value_y":"","default_open":1,"tids_1":",6,7,2,4,","small_rate_x":"","small_rate_y":"","small_value_x":"","small_value_y":"","small_open":0,"large_rate_x":"","large_rate_y":"","large_value_x":"","large_value_y":"","large_open":0,"gif_open":1,"tids_2":"","tids_3":""}');
INSERT INTO `jz_plugins` (`id`,`name`,`filepath`,`description`,`version`,`author`,`update_time`,`module`,`isopen`,`addtime`,`config`) VALUES ('2','系统API接口','apidata','实现API数据查询','1.3','留恋风2581047041@qq.com','1592928000','Home','1','1596589198','{"ischeckip":2,"iplist":"","key":"111222","tables":"article,product,sysconfig,classtype,collect"}');
-- ----------------------------
-- Records of jz_power
-- ----------------------------
INSERT INTO `jz_power` (`id`,`action`,`name`,`pid`,`isagree`) VALUES ('1','Common','公共权限','0','1');
INSERT INTO `jz_power` (`id`,`action`,`name`,`pid`,`isagree`) VALUES ('2','Home','前台网站','0','1');
INSERT INTO `jz_power` (`id`,`action`,`name`,`pid`,`isagree`) VALUES ('3','User','个人中心','0','1');
INSERT INTO `jz_power` (`id`,`action`,`name`,`pid`,`isagree`) VALUES ('4','Login','会员登录','0','1');
INSERT INTO `jz_power` (`id`,`action`,`name`,`pid`,`isagree`) VALUES ('5','Message','站内留言','0','1');
INSERT INTO `jz_power` (`id`,`action`,`name`,`pid`,`isagree`) VALUES ('6','Comment','会员评论','0','1');
INSERT INTO `jz_power` (`id`,`action`,`name`,`pid`,`isagree`) VALUES ('7','Screen','网站筛选','0','1');
INSERT INTO `jz_power` (`id`,`action`,`name`,`pid`,`isagree`) VALUES ('8','Order','会员下单','0','1');
INSERT INTO `jz_power` (`id`,`action`,`name`,`pid`,`isagree`) VALUES ('9','Mypay','网站支付','0','1');
INSERT INTO `jz_power` (`id`,`action`,`name`,`pid`,`isagree`) VALUES ('10','Jzpay','极致支付','0','1');
INSERT INTO `jz_power` (`id`,`action`,`name`,`pid`,`isagree`) VALUES ('11','Tags','TAG标签','0','1');
INSERT INTO `jz_power` (`id`,`action`,`name`,`pid`,`isagree`) VALUES ('12','Wechat','微信模块','0','1');
INSERT INTO `jz_power` (`id`,`action`,`name`,`pid`,`isagree`) VALUES ('13','Common/vercode','验证码生成','1','1');
INSERT INTO `jz_power` (`id`,`action`,`name`,`pid`,`isagree`) VALUES ('14','Common/checklogin','检查是否登录','1','1');
INSERT INTO `jz_power` (`id`,`action`,`name`,`pid`,`isagree`) VALUES ('15','Common/multiuploads','多附件上传','1','1');
INSERT INTO `jz_power` (`id`,`action`,`name`,`pid`,`isagree`) VALUES ('16','Common/uploads','单附件上传','1','1');
INSERT INTO `jz_power` (`id`,`action`,`name`,`pid`,`isagree`) VALUES ('17','Common/qrcode','二维码生成','1','1');
INSERT INTO `jz_power` (`id`,`action`,`name`,`pid`,`isagree`) VALUES ('18','Common/get_fields','获取扩展信息','1','1');
INSERT INTO `jz_power` (`id`,`action`,`name`,`pid`,`isagree`) VALUES ('19','Common/jizhi','链接错误提示','1','1');
INSERT INTO `jz_power` (`id`,`action`,`name`,`pid`,`isagree`) VALUES ('20','Common/error','报错提示','1','1');
INSERT INTO `jz_power` (`id`,`action`,`name`,`pid`,`isagree`) VALUES ('21','Home/index','网站首页','2','1');
INSERT INTO `jz_power` (`id`,`action`,`name`,`pid`,`isagree`) VALUES ('22','Home/jizhi','网站内容','2','1');
INSERT INTO `jz_power` (`id`,`action`,`name`,`pid`,`isagree`) VALUES ('23','Home/auto_url','自定义链接','2','1');
INSERT INTO `jz_power` (`id`,`action`,`name`,`pid`,`isagree`) VALUES ('24','Home/jizhi_details','详情内容','2','1');
INSERT INTO `jz_power` (`id`,`action`,`name`,`pid`,`isagree`) VALUES ('25','Home/search','网站搜索','2','1');
INSERT INTO `jz_power` (`id`,`action`,`name`,`pid`,`isagree`) VALUES ('26','Home/searchAll','网站多模块搜索','2','1');
INSERT INTO `jz_power` (`id`,`action`,`name`,`pid`,`isagree`) VALUES ('27','Home/start_cache','开启网站缓存','2','1');
INSERT INTO `jz_power` (`id`,`action`,`name`,`pid`,`isagree`) VALUES ('28','Home/end_cache','输出缓存','2','1');
INSERT INTO `jz_power` (`id`,`action`,`name`,`pid`,`isagree`) VALUES ('29','User/checklogin','检查是否登录','3','1');
INSERT INTO `jz_power` (`id`,`action`,`name`,`pid`,`isagree`) VALUES ('30','User/index','个人中心首页','3','1');
INSERT INTO `jz_power` (`id`,`action`,`name`,`pid`,`isagree`) VALUES ('31','User/userinfo','会员资料','3','1');
INSERT INTO `jz_power` (`id`,`action`,`name`,`pid`,`isagree`) VALUES ('32','User/orders','订单记录','3','1');
INSERT INTO `jz_power` (`id`,`action`,`name`,`pid`,`isagree`) VALUES ('33','User/orderdetails','订单详情','3','1');
INSERT INTO `jz_power` (`id`,`action`,`name`,`pid`,`isagree`) VALUES ('34','User/payment','订单支付','3','1');
INSERT INTO `jz_power` (`id`,`action`,`name`,`pid`,`isagree`) VALUES ('35','User/orderdel','删除订单','3','1');
INSERT INTO `jz_power` (`id`,`action`,`name`,`pid`,`isagree`) VALUES ('36','User/changeimg','上传头像','3','1');
INSERT INTO `jz_power` (`id`,`action`,`name`,`pid`,`isagree`) VALUES ('37','User/comment','评论列表','3','1');
INSERT INTO `jz_power` (`id`,`action`,`name`,`pid`,`isagree`) VALUES ('38','User/commentdel','删除评论','3','1');
INSERT INTO `jz_power` (`id`,`action`,`name`,`pid`,`isagree`) VALUES ('39','User/likesAction','点赞文章','3','1');
INSERT INTO `jz_power` (`id`,`action`,`name`,`pid`,`isagree`) VALUES ('40','User/likes','点赞列表','3','1');
INSERT INTO `jz_power` (`id`,`action`,`name`,`pid`,`isagree`) VALUES ('41','User/likesdel','取消点赞','3','1');
INSERT INTO `jz_power` (`id`,`action`,`name`,`pid`,`isagree`) VALUES ('42','User/collectAction','收藏文章','3','1');
INSERT INTO `jz_power` (`id`,`action`,`name`,`pid`,`isagree`) VALUES ('43','User/collect','收藏列表','3','1');
INSERT INTO `jz_power` (`id`,`action`,`name`,`pid`,`isagree`) VALUES ('44','User/collectdel','删除收藏','3','1');
INSERT INTO `jz_power` (`id`,`action`,`name`,`pid`,`isagree`) VALUES ('45','User/cart','购物车','3','1');
INSERT INTO `jz_power` (`id`,`action`,`name`,`pid`,`isagree`) VALUES ('46','User/addcart','添加购物车','3','1');
INSERT INTO `jz_power` (`id`,`action`,`name`,`pid`,`isagree`) VALUES ('47','User/delcart','删除购物车','3','1');
INSERT INTO `jz_power` (`id`,`action`,`name`,`pid`,`isagree`) VALUES ('48','User/posts','发布管理','3','1');
INSERT INTO `jz_power` (`id`,`action`,`name`,`pid`,`isagree`) VALUES ('49','User/release','会员发布','3','1');
INSERT INTO `jz_power` (`id`,`action`,`name`,`pid`,`isagree`) VALUES ('50','User/del','删除发布','3','1');
INSERT INTO `jz_power` (`id`,`action`,`name`,`pid`,`isagree`) VALUES ('51','User/uploads','会员上传附件','3','1');
INSERT INTO `jz_power` (`id`,`action`,`name`,`pid`,`isagree`) VALUES ('52','User/jizhi','404提示','3','1');
INSERT INTO `jz_power` (`id`,`action`,`name`,`pid`,`isagree`) VALUES ('53','User/follow','关注用户','3','1');
INSERT INTO `jz_power` (`id`,`action`,`name`,`pid`,`isagree`) VALUES ('54','User/nofollow','取消关注','3','1');
INSERT INTO `jz_power` (`id`,`action`,`name`,`pid`,`isagree`) VALUES ('55','User/fans','粉丝列表','3','1');
INSERT INTO `jz_power` (`id`,`action`,`name`,`pid`,`isagree`) VALUES ('56','User/notify','消息提醒','3','1');
INSERT INTO `jz_power` (`id`,`action`,`name`,`pid`,`isagree`) VALUES ('57','User/notifyto','查看消息','3','1');
INSERT INTO `jz_power` (`id`,`action`,`name`,`pid`,`isagree`) VALUES ('58','User/notifydel','删除消息','3','1');
INSERT INTO `jz_power` (`id`,`action`,`name`,`pid`,`isagree`) VALUES ('59','User/active','公共主页','3','1');
INSERT INTO `jz_power` (`id`,`action`,`name`,`pid`,`isagree`) VALUES ('60','User/setmsg','消息提醒设置','3','1');
INSERT INTO `jz_power` (`id`,`action`,`name`,`pid`,`isagree`) VALUES ('61','User/getclass','获取栏目列表','2','1');
INSERT INTO `jz_power` (`id`,`action`,`name`,`pid`,`isagree`) VALUES ('62','User/wallet','用户钱包','3','1');
INSERT INTO `jz_power` (`id`,`action`,`name`,`pid`,`isagree`) VALUES ('63','User/buy','会员充值','3','1');
INSERT INTO `jz_power` (`id`,`action`,`name`,`pid`,`isagree`) VALUES ('64','User/buylist','充值列表','3','1');
INSERT INTO `jz_power` (`id`,`action`,`name`,`pid`,`isagree`) VALUES ('65','User/buydetails','交易详情','3','1');
INSERT INTO `jz_power` (`id`,`action`,`name`,`pid`,`isagree`) VALUES ('66','Login/index','登录首页','4','1');
INSERT INTO `jz_power` (`id`,`action`,`name`,`pid`,`isagree`) VALUES ('67','Login/register','注册页面','4','1');
INSERT INTO `jz_power` (`id`,`action`,`name`,`pid`,`isagree`) VALUES ('68','Login/forget','忘记密码','4','1');
INSERT INTO `jz_power` (`id`,`action`,`name`,`pid`,`isagree`) VALUES ('69','Login/nologin','未登录页面','4','1');
INSERT INTO `jz_power` (`id`,`action`,`name`,`pid`,`isagree`) VALUES ('70','Login/loginout','退出登录','4','1');
INSERT INTO `jz_power` (`id`,`action`,`name`,`pid`,`isagree`) VALUES ('71','Message/index','发送留言','5','1');
INSERT INTO `jz_power` (`id`,`action`,`name`,`pid`,`isagree`) VALUES ('72','Comment/index','发表评论','6','1');
INSERT INTO `jz_power` (`id`,`action`,`name`,`pid`,`isagree`) VALUES ('73','Screen/index','筛选列表','7','1');
INSERT INTO `jz_power` (`id`,`action`,`name`,`pid`,`isagree`) VALUES ('74','Order/create','创建订单','8','1');
INSERT INTO `jz_power` (`id`,`action`,`name`,`pid`,`isagree`) VALUES ('75','Order/pay','订单支付','8','1');
INSERT INTO `jz_power` (`id`,`action`,`name`,`pid`,`isagree`) VALUES ('76','Tags/index','TAG标签列表','11','1');
-- ----------------------------
-- Records of jz_product
-- ----------------------------
-- ----------------------------
-- Records of jz_ruler
-- ----------------------------
INSERT INTO `jz_ruler` (`id`,`name`,`fc`,`pid`,`isdesktop`,`sys`) VALUES ('1','会员管理','Member','0','0','1');
INSERT INTO `jz_ruler` (`id`,`name`,`fc`,`pid`,`isdesktop`,`sys`) VALUES ('2','会员列表','Member/index','1','1','1');
INSERT INTO `jz_ruler` (`id`,`name`,`fc`,`pid`,`isdesktop`,`sys`) VALUES ('3','添加会员','Member/memberadd','1','0','1');
INSERT INTO `jz_ruler` (`id`,`name`,`fc`,`pid`,`isdesktop`,`sys`) VALUES ('4','修改会员','Member/memberedit','1','0','1');
INSERT INTO `jz_ruler` (`id`,`name`,`fc`,`pid`,`isdesktop`,`sys`) VALUES ('5','删除会员','Member/member_del','1','0','1');
INSERT INTO `jz_ruler` (`id`,`name`,`fc`,`pid`,`isdesktop`,`sys`) VALUES ('6','批量删除','Member/deleteAll','1','0','1');
INSERT INTO `jz_ruler` (`id`,`name`,`fc`,`pid`,`isdesktop`,`sys`) VALUES ('7','修改状态','Member/change_status','1','0','1');
INSERT INTO `jz_ruler` (`id`,`name`,`fc`,`pid`,`isdesktop`,`sys`) VALUES ('8','内容管理','Article','0','0','1');
INSERT INTO `jz_ruler` (`id`,`name`,`fc`,`pid`,`isdesktop`,`sys`) VALUES ('9','内容列表','Article/articlelist','8','1','1');
INSERT INTO `jz_ruler` (`id`,`name`,`fc`,`pid`,`isdesktop`,`sys`) VALUES ('10','添加内容','Article/addarticle','8','0','1');
INSERT INTO `jz_ruler` (`id`,`name`,`fc`,`pid`,`isdesktop`,`sys`) VALUES ('11','修改内容','Article/editarticle','8','0','1');
INSERT INTO `jz_ruler` (`id`,`name`,`fc`,`pid`,`isdesktop`,`sys`) VALUES ('12','删除内容','Article/deletearticle','8','0','1');
INSERT INTO `jz_ruler` (`id`,`name`,`fc`,`pid`,`isdesktop`,`sys`) VALUES ('13','批量删除','Article/deleteAll','8','0','1');
INSERT INTO `jz_ruler` (`id`,`name`,`fc`,`pid`,`isdesktop`,`sys`) VALUES ('14','复制内容','Article/copyarticle','8','0','1');
INSERT INTO `jz_ruler` (`id`,`name`,`fc`,`pid`,`isdesktop`,`sys`) VALUES ('15','评论管理','Comment','0','0','1');
INSERT INTO `jz_ruler` (`id`,`name`,`fc`,`pid`,`isdesktop`,`sys`) VALUES ('16','评论列表','Comment/commentlist','15','1','1');
INSERT INTO `jz_ruler` (`id`,`name`,`fc`,`pid`,`isdesktop`,`sys`) VALUES ('17','添加评论','Comment/addcomment','15','0','1');
INSERT INTO `jz_ruler` (`id`,`name`,`fc`,`pid`,`isdesktop`,`sys`) VALUES ('18','修改评论','Comment/editcomment','15','0','1');
INSERT INTO `jz_ruler` (`id`,`name`,`fc`,`pid`,`isdesktop`,`sys`) VALUES ('19','删除评论','Comment/deletecomment','15','0','1');
INSERT INTO `jz_ruler` (`id`,`name`,`fc`,`pid`,`isdesktop`,`sys`) VALUES ('20','批量删除','Comment/deleteAll','15','0','1');
INSERT INTO `jz_ruler` (`id`,`name`,`fc`,`pid`,`isdesktop`,`sys`) VALUES ('21','留言管理','Message','0','0','1');
INSERT INTO `jz_ruler` (`id`,`name`,`fc`,`pid`,`isdesktop`,`sys`) VALUES ('22','留言列表','Message/messagelist','21','1','1');
INSERT INTO `jz_ruler` (`id`,`name`,`fc`,`pid`,`isdesktop`,`sys`) VALUES ('23','修改留言','Message/editmessage','21','0','1');
INSERT INTO `jz_ruler` (`id`,`name`,`fc`,`pid`,`isdesktop`,`sys`) VALUES ('24','删除留言','Message/deletemessage','21','0','1');
INSERT INTO `jz_ruler` (`id`,`name`,`fc`,`pid`,`isdesktop`,`sys`) VALUES ('25','批量删除','Message/deleteAll','21','0','1');
INSERT INTO `jz_ruler` (`id`,`name`,`fc`,`pid`,`isdesktop`,`sys`) VALUES ('26','字段管理','Fields','0','0','1');
INSERT INTO `jz_ruler` (`id`,`name`,`fc`,`pid`,`isdesktop`,`sys`) VALUES ('27','字段列表','Fields/index','26','1','1');
INSERT INTO `jz_ruler` (`id`,`name`,`fc`,`pid`,`isdesktop`,`sys`) VALUES ('28','新增字段','Fields/addFields','26','0','1');
INSERT INTO `jz_ruler` (`id`,`name`,`fc`,`pid`,`isdesktop`,`sys`) VALUES ('29','修改字段','Fields/editFields','26','0','1');
INSERT INTO `jz_ruler` (`id`,`name`,`fc`,`pid`,`isdesktop`,`sys`) VALUES ('30','删除字段','Fields/deleteFields','26','0','1');
INSERT INTO `jz_ruler` (`id`,`name`,`fc`,`pid`,`isdesktop`,`sys`) VALUES ('31','获取字段列表','Fields/get_fields','26','0','1');
INSERT INTO `jz_ruler` (`id`,`name`,`fc`,`pid`,`isdesktop`,`sys`) VALUES ('32','基本功能','Index','0','0','1');
INSERT INTO `jz_ruler` (`id`,`name`,`fc`,`pid`,`isdesktop`,`sys`) VALUES ('33','系统界面','Index/index','32','0','1');
INSERT INTO `jz_ruler` (`id`,`name`,`fc`,`pid`,`isdesktop`,`sys`) VALUES ('34','后台首页','Index/welcome','32','1','1');
INSERT INTO `jz_ruler` (`id`,`name`,`fc`,`pid`,`isdesktop`,`sys`) VALUES ('35','数据库列表','Index/beifen','32','1','1');
INSERT INTO `jz_ruler` (`id`,`name`,`fc`,`pid`,`isdesktop`,`sys`) VALUES ('36','数据库备份','Index/backup','32','0','1');
INSERT INTO `jz_ruler` (`id`,`name`,`fc`,`pid`,`isdesktop`,`sys`) VALUES ('37','数据库还原','Index/huanyuan','32','0','1');
INSERT INTO `jz_ruler` (`id`,`name`,`fc`,`pid`,`isdesktop`,`sys`) VALUES ('38','数据库删除','Index/shanchu','32','0','1');
INSERT INTO `jz_ruler` (`id`,`name`,`fc`,`pid`,`isdesktop`,`sys`) VALUES ('39','系统设置','Sys','0','0','1');
INSERT INTO `jz_ruler` (`id`,`name`,`fc`,`pid`,`isdesktop`,`sys`) VALUES ('40','基本设置','Sys/index','39','1','1');
INSERT INTO `jz_ruler` (`id`,`name`,`fc`,`pid`,`isdesktop`,`sys`) VALUES ('41','栏目管理','Classtype','0','0','1');
INSERT INTO `jz_ruler` (`id`,`name`,`fc`,`pid`,`isdesktop`,`sys`) VALUES ('42','栏目列表','Classtype/index','41','1','1');
INSERT INTO `jz_ruler` (`id`,`name`,`fc`,`pid`,`isdesktop`,`sys`) VALUES ('43','新增栏目','Classtype/addclass','41','0','1');
INSERT INTO `jz_ruler` (`id`,`name`,`fc`,`pid`,`isdesktop`,`sys`) VALUES ('44','修改栏目','Classtype/editclass','41','0','1');
INSERT INTO `jz_ruler` (`id`,`name`,`fc`,`pid`,`isdesktop`,`sys`) VALUES ('45','删除栏目','Classtype/deleteclass','41','0','1');
INSERT INTO `jz_ruler` (`id`,`name`,`fc`,`pid`,`isdesktop`,`sys`) VALUES ('46','修改排序','Classtype/editClassOrders','41','0','1');
INSERT INTO `jz_ruler` (`id`,`name`,`fc`,`pid`,`isdesktop`,`sys`) VALUES ('47','栏目隐藏','Classtype/change_status','41','0','1');
INSERT INTO `jz_ruler` (`id`,`name`,`fc`,`pid`,`isdesktop`,`sys`) VALUES ('48','管理员管理','Admin','0','0','1');
INSERT INTO `jz_ruler` (`id`,`name`,`fc`,`pid`,`isdesktop`,`sys`) VALUES ('49','角色管理','Admin/group','48','1','1');
INSERT INTO `jz_ruler` (`id`,`name`,`fc`,`pid`,`isdesktop`,`sys`) VALUES ('50','新增角色','Admin/groupadd','48','0','1');
INSERT INTO `jz_ruler` (`id`,`name`,`fc`,`pid`,`isdesktop`,`sys`) VALUES ('51','修改角色','Admin/groupedit','48','0','1');
INSERT INTO `jz_ruler` (`id`,`name`,`fc`,`pid`,`isdesktop`,`sys`) VALUES ('52','删除角色','Admin/group_del','48','0','1');
INSERT INTO `jz_ruler` (`id`,`name`,`fc`,`pid`,`isdesktop`,`sys`) VALUES ('53','角色状态','Admin/change_group_status','48','0','1');
INSERT INTO `jz_ruler` (`id`,`name`,`fc`,`pid`,`isdesktop`,`sys`) VALUES ('54','管理员列表','Admin/adminlist','48','1','1');
INSERT INTO `jz_ruler` (`id`,`name`,`fc`,`pid`,`isdesktop`,`sys`) VALUES ('55','新增管理员','Admin/adminadd','48','0','1');
INSERT INTO `jz_ruler` (`id`,`name`,`fc`,`pid`,`isdesktop`,`sys`) VALUES ('56','修改管理员','Admin/adminedit','48','0','1');
INSERT INTO `jz_ruler` (`id`,`name`,`fc`,`pid`,`isdesktop`,`sys`) VALUES ('57','管理员状态','Admin/change_status','48','0','1');
INSERT INTO `jz_ruler` (`id`,`name`,`fc`,`pid`,`isdesktop`,`sys`) VALUES ('58','删除管理员','Admin/admindelete','48','0','1');
INSERT INTO `jz_ruler` (`id`,`name`,`fc`,`pid`,`isdesktop`,`sys`) VALUES ('59','个人信息','Index/details','32','1','1');
INSERT INTO `jz_ruler` (`id`,`name`,`fc`,`pid`,`isdesktop`,`sys`) VALUES ('60','模块管理','Molds','0','0','1');
INSERT INTO `jz_ruler` (`id`,`name`,`fc`,`pid`,`isdesktop`,`sys`) VALUES ('61','模块列表','Molds/index','60','1','1');
INSERT INTO `jz_ruler` (`id`,`name`,`fc`,`pid`,`isdesktop`,`sys`) VALUES ('62','新增模块','Molds/addMolds','60','0','1');
INSERT INTO `jz_ruler` (`id`,`name`,`fc`,`pid`,`isdesktop`,`sys`) VALUES ('63','修改模块','Molds/editMolds','60','0','1');
INSERT INTO `jz_ruler` (`id`,`name`,`fc`,`pid`,`isdesktop`,`sys`) VALUES ('64','删除模块','Molds/deleteMolds','60','0','1');
INSERT INTO `jz_ruler` (`id`,`name`,`fc`,`pid`,`isdesktop`,`sys`) VALUES ('65','权限管理','Rulers','0','0','1');
INSERT INTO `jz_ruler` (`id`,`name`,`fc`,`pid`,`isdesktop`,`sys`) VALUES ('66','权限列表','Rulers/index','65','1','1');
INSERT INTO `jz_ruler` (`id`,`name`,`fc`,`pid`,`isdesktop`,`sys`) VALUES ('67','新增权限','Rulers/addrulers','65','0','1');
INSERT INTO `jz_ruler` (`id`,`name`,`fc`,`pid`,`isdesktop`,`sys`) VALUES ('68','修改权限','Rulers/editrulers','65','0','1');
INSERT INTO `jz_ruler` (`id`,`name`,`fc`,`pid`,`isdesktop`,`sys`) VALUES ('69','删除权限','Rulers/deleterulers','65','0','1');
INSERT INTO `jz_ruler` (`id`,`name`,`fc`,`pid`,`isdesktop`,`sys`) VALUES ('70','桌面设置','Index/desktop','32','1','1');
INSERT INTO `jz_ruler` (`id`,`name`,`fc`,`pid`,`isdesktop`,`sys`) VALUES ('71','新增桌面','Index/desktop_add','32','0','1');
INSERT INTO `jz_ruler` (`id`,`name`,`fc`,`pid`,`isdesktop`,`sys`) VALUES ('72','修改桌面','Index/desktop_edit','32','0','1');
INSERT INTO `jz_ruler` (`id`,`name`,`fc`,`pid`,`isdesktop`,`sys`) VALUES ('73','删除桌面','Index/desktop_del','32','0','1');
INSERT INTO `jz_ruler` (`id`,`name`,`fc`,`pid`,`isdesktop`,`sys`) VALUES ('74','图标库','Index/unicode','32','1','1');
INSERT INTO `jz_ruler` (`id`,`name`,`fc`,`pid`,`isdesktop`,`sys`) VALUES ('75','插件管理','Plugins','0','0','1');
INSERT INTO `jz_ruler` (`id`,`name`,`fc`,`pid`,`isdesktop`,`sys`) VALUES ('76','插件列表','Plugins/index','75','1','1');
INSERT INTO `jz_ruler` (`id`,`name`,`fc`,`pid`,`isdesktop`,`sys`) VALUES ('77','模块扩展','Extmolds','0','0','1');
INSERT INTO `jz_ruler` (`id`,`name`,`fc`,`pid`,`isdesktop`,`sys`) VALUES ('82','轮播图','Collect','0','0','1');
INSERT INTO `jz_ruler` (`id`,`name`,`fc`,`pid`,`isdesktop`,`sys`) VALUES ('83','轮播图列表','Collect/index','82','1','1');
INSERT INTO `jz_ruler` (`id`,`name`,`fc`,`pid`,`isdesktop`,`sys`) VALUES ('84','新增轮播图','Collect/addcollect','82','0','1');
INSERT INTO `jz_ruler` (`id`,`name`,`fc`,`pid`,`isdesktop`,`sys`) VALUES ('85','修改轮播图','Collect/editcollect','82','0','1');
INSERT INTO `jz_ruler` (`id`,`name`,`fc`,`pid`,`isdesktop`,`sys`) VALUES ('86','删除轮播图','Collect/deletecollect','82','0','1');
INSERT INTO `jz_ruler` (`id`,`name`,`fc`,`pid`,`isdesktop`,`sys`) VALUES ('87','复制轮播图','Collect/copycollect','82','0','1');
INSERT INTO `jz_ruler` (`id`,`name`,`fc`,`pid`,`isdesktop`,`sys`) VALUES ('88','批量删除轮播图','Collect/deleteAll','82','0','1');
INSERT INTO `jz_ruler` (`id`,`name`,`fc`,`pid`,`isdesktop`,`sys`) VALUES ('89','轮播图分类列表','Collect/collectType','82','1','1');
INSERT INTO `jz_ruler` (`id`,`name`,`fc`,`pid`,`isdesktop`,`sys`) VALUES ('90','新增轮播图分类','Collect/collectTypeAdd','82','0','1');
INSERT INTO `jz_ruler` (`id`,`name`,`fc`,`pid`,`isdesktop`,`sys`) VALUES ('91','修改轮播图分类','Collect/collectTypeEdit','82','0','1');
INSERT INTO `jz_ruler` (`id`,`name`,`fc`,`pid`,`isdesktop`,`sys`) VALUES ('92','删除轮播图分类','Collect/collectTypeDelete','82','0','1');
INSERT INTO `jz_ruler` (`id`,`name`,`fc`,`pid`,`isdesktop`,`sys`) VALUES ('93','批量复制','Article/copyAll','8','0','1');
INSERT INTO `jz_ruler` (`id`,`name`,`fc`,`pid`,`isdesktop`,`sys`) VALUES ('94','批量修改栏目','Article/changeType','8','0','1');
INSERT INTO `jz_ruler` (`id`,`name`,`fc`,`pid`,`isdesktop`,`sys`) VALUES ('95','友情链接列表','Links/index','189','1','0');
INSERT INTO `jz_ruler` (`id`,`name`,`fc`,`pid`,`isdesktop`,`sys`) VALUES ('96','新增友情链接','Links/addlinks','189','0','0');
INSERT INTO `jz_ruler` (`id`,`name`,`fc`,`pid`,`isdesktop`,`sys`) VALUES ('97','修改友情链接','Links/editlinks','189','0','0');
INSERT INTO `jz_ruler` (`id`,`name`,`fc`,`pid`,`isdesktop`,`sys`) VALUES ('98','复制友情链接','Links/copylinks','189','0','0');
INSERT INTO `jz_ruler` (`id`,`name`,`fc`,`pid`,`isdesktop`,`sys`) VALUES ('99','删除友情链接','Links/deletelinks','189','0','0');
INSERT INTO `jz_ruler` (`id`,`name`,`fc`,`pid`,`isdesktop`,`sys`) VALUES ('100','批量删除友情链接','Links/deleteAll','189','0','0');
INSERT INTO `jz_ruler` (`id`,`name`,`fc`,`pid`,`isdesktop`,`sys`) VALUES ('101','通用模块','Common','0','0','1');
INSERT INTO `jz_ruler` (`id`,`name`,`fc`,`pid`,`isdesktop`,`sys`) VALUES ('102','上传文件','Common/uploads','101','0','1');
INSERT INTO `jz_ruler` (`id`,`name`,`fc`,`pid`,`isdesktop`,`sys`) VALUES ('103','更新cookie','Index/update_session_maxlifetime','32','0','1');
INSERT INTO `jz_ruler` (`id`,`name`,`fc`,`pid`,`isdesktop`,`sys`) VALUES ('104','商品管理','Product','0','0','1');
INSERT INTO `jz_ruler` (`id`,`name`,`fc`,`pid`,`isdesktop`,`sys`) VALUES ('105','商品列表','Product/productlist','104','1','1');
INSERT INTO `jz_ruler` (`id`,`name`,`fc`,`pid`,`isdesktop`,`sys`) VALUES ('106','新增商品','Product/addproduct','104','0','1');

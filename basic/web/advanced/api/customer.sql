

CREATE TABLE `site_customer` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '客户名称',
  `class` tinyint(1) NOT NULL DEFAULT 0 COMMENT '0未分类,1普通客户,2商机客户',
  `is_expire` tinyint(3) NOT NULL DEFAULT 0 COMMENT '是否过保',
  `is_share` tinyint(1) unsigned NOT NULL DEFAULT 0 COMMENT '是否共享(1是0否)',
  `branch_id` int(11) unsigned NOT NULL DEFAULT 0 COMMENT '坐落区ID',
  `user_id` int(10) unsigned NOT NULL COMMENT '建立人ID',
  `contact_user_id` int(10) unsigned NOT NULL COMMENT '业务联系人',
  `contact_user2_id` int(10) unsigned DEFAULT 0 COMMENT '业务合作人',
  `sale_user_id` int(10) NOT NULL COMMENT '售后联系人',
  `tracking_state` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '跟踪状态',
  `status` tinyint(1) NOT NULL DEFAULT 0 COMMENT '0审核中,1正常',
  `is_deleted` tinyint(1) NOT NULL DEFAULT 0 COMMENT '1删除,0启用',
  `protect_id` int(11) NOT NULL DEFAULT 0 COMMENT '商机申请ID',
  `expire_time` timestamp NULL DEFAULT NULL COMMENT '过保时间',
  `save_at` timestamp NULL DEFAULT NULL COMMENT '保护时间',
  `last_at` timestamp NULL DEFAULT NULL COMMENT '上次联系时间',
  `company` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT '' COMMENT '单位',
  `country` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '区域',
  `name` varchar(32) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '联系人',
  `mobile` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '联系电话',
  `province` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '省',
  `city` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '市',
  `area` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '区',
  `address` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '定位地址',
  `detailed_address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '' COMMENT '详细地址',
  `longitude` varchar(40) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '' COMMENT '经度',
  `latitude` varchar(40) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '' COMMENT '纬度',
  `type` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '商户类型',
  `labels` varchar(300) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '标签 多标签 , 隔开',
  `related_customer` int(11) DEFAULT NULL COMMENT '相关客户',
  `is_require_sign` tinyint(1) NOT NULL DEFAULT 0 COMMENT '是否需要签到(0不需要1需要)',
  `biz_area` smallint(6) NOT NULL DEFAULT 0 COMMENT '营业面积',
  `biz_have_chain` tinyint(1) NOT NULL DEFAULT 0 COMMENT '是否连锁',
  `biz_holder_num` tinyint(3) unsigned NOT NULL DEFAULT 1 COMMENT '股东人数',
  `biz_zoom_num` smallint(5) unsigned NOT NULL DEFAULT 0 COMMENT '包间数量',
  `biz_level` enum('LOW','MIDDLE','HIGH') COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT '茶楼等级',
  `biz_create_date` date DEFAULT NULL COMMENT '开业时间',
  `avatar` varchar(300) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '' COMMENT '客户头像',
  `image` text COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT '图片',
  `desc` text COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT '备注',
  `mjj_num` smallint(6) NOT NULL DEFAULT 0 COMMENT '麻将机数',
  `last_work_finish_at` date NOT NULL DEFAULT '1970-01-01' COMMENT '最后工单日',
  `last_baoyang_finish_at` date NOT NULL DEFAULT '1970-01-01' COMMENT '最后保养日',
  `vw_type` enum('NONE','V','V1','V2','W','W1') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'NONE' COMMENT '状态VW',
  `reassign` tinyint(1) DEFAULT 0,
  `create_at` timestamp NOT NULL DEFAULT current_timestamp() COMMENT '添加时间',
  PRIMARY KEY (`id`) USING BTREE,
  UNIQUE KEY `title` (`title`),
  KEY `name` (`name`),
  KEY `mobile` (`mobile`),
  KEY `contact_user_id` (`contact_user_id`),
  KEY `branch_id` (`branch_id`),
  KEY `expire_time_class` (`expire_time`,`class`),
  KEY `sale_user_vw_type_del` (`sale_user_id`,`vw_type`,`is_deleted`)
) ENGINE=InnoDB AUTO_INCREMENT=2789 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC COMMENT='客户';


CREATE TABLE `site_customer_address_requisition` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT 'ID',
  `username` varchar(8) NOT NULL COMMENT '申请人',
  `user_id` int(11) unsigned NOT NULL COMMENT '申请人ID',
  `customer_id` int(11) NOT NULL COMMENT '客户ID',
  `work_id` int(11) NOT NULL DEFAULT 0 COMMENT '工单ID',
  `latitude` decimal(8,6) NOT NULL COMMENT '纬度',
  `longitude` decimal(9,6) NOT NULL COMMENT '经度',
  `address` varchar(200) NOT NULL COMMENT '联系地址',
  `prev_latitude` decimal(8,6) DEFAULT NULL COMMENT '原纬度',
  `prev_longitude` decimal(9,6) DEFAULT NULL COMMENT '原经度',
  `prev_address` varchar(200) DEFAULT NULL COMMENT '原地址',
  `audit_status` enum('NONE','PASS','REFUSE') NOT NULL DEFAULT 'NONE' COMMENT '审核状态',
  `audit_username` varchar(8) DEFAULT NULL COMMENT '审核人',
  `audit_user_id` int(11) NOT NULL DEFAULT 0 COMMENT '审核人ID',
  `create_at` timestamp NOT NULL DEFAULT current_timestamp() COMMENT '添加时间',
  PRIMARY KEY (`id`),
  KEY `customer_id` (`customer_id`),
  KEY `user_id` (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COMMENT='客户地址变更申请';



CREATE TABLE `site_customer_biz` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT 'ID',
  `customer_id` int(10) unsigned NOT NULL COMMENT '客户ID',
  `vw_type` enum('V','V1','V2','W','W1') CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '状态',
  `vs_for` tinyint(3) unsigned NOT NULL DEFAULT 0 COMMENT 'VS值',
  `create_at` datetime NOT NULL DEFAULT current_timestamp() COMMENT '添加时间',
  PRIMARY KEY (`id`),
  UNIQUE KEY `customer_id` (`customer_id`),
  KEY `vw_type` (`vw_type`)
) ENGINE=InnoDB AUTO_INCREMENT=31 DEFAULT CHARSET=utf8mb4 COMMENT='商业客户';



CREATE TABLE `site_customer_branch` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT 'ID',
  `customer_id` int(10) unsigned NOT NULL COMMENT '客户ID',
  `branch_id` int(10) unsigned NOT NULL COMMENT '部门ID',
  `create_at` timestamp NOT NULL DEFAULT current_timestamp() COMMENT '添加时间',
  PRIMARY KEY (`id`),
  UNIQUE KEY `customer_branch_id` (`customer_id`,`branch_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2778 DEFAULT CHARSET=utf8mb4 COMMENT='部门客户汇总';


CREATE TABLE `site_customer_competition` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT 'ID',
  `customer_protect_id` int(10) unsigned NOT NULL COMMENT '商机客户ID',
  `customer_id` int(10) unsigned NOT NULL COMMENT '客户ID',
  `user_id` int(10) unsigned NOT NULL COMMENT '用户ID',
  `title` varchar(200) NOT NULL COMMENT '名称',
  `remark` text DEFAULT NULL COMMENT '备注',
  `create_at` datetime NOT NULL DEFAULT current_timestamp() COMMENT '添加时间',
  PRIMARY KEY (`id`),
  KEY `title` (`title`),
  KEY `customer_id` (`customer_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COMMENT='客户竞品';



CREATE TABLE `site_customer_contact` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT 'ID',
  `customer_id` int(10) NOT NULL COMMENT '客户ID',
  `mobile` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '接待人手机',
  `name` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '接待人称呼',
  `create_at` timestamp NULL DEFAULT current_timestamp() COMMENT '添加时间',
  PRIMARY KEY (`id`) USING BTREE,
  UNIQUE KEY `customer_id_mobile` (`customer_id`,`mobile`),
  KEY `mobile` (`mobile`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COMMENT='客户联系人';



CREATE TABLE `site_customer_demand` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT 'ID',
  `customer_protect_id` int(10) unsigned NOT NULL COMMENT '商机客户ID',
  `customer_id` int(10) unsigned NOT NULL COMMENT '客户ID',
  `user_id` int(10) unsigned NOT NULL COMMENT '用户ID',
  `title` varchar(200) NOT NULL COMMENT '标题',
  `product_type` enum('雀友','雷布','净化器','木框','椅子','茶几','底座','盖板','麻将牌','边框','附件','茶叶','其他') DEFAULT NULL COMMENT '产品类型',
  `number` varchar(9) DEFAULT NULL COMMENT '数量范围',
  `content` varchar(250) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT '说明',
  `create_at` datetime NOT NULL DEFAULT current_timestamp() COMMENT '添加时间',
  PRIMARY KEY (`id`),
  KEY `title` (`title`),
  KEY `customer_id` (`customer_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COMMENT='客户需求';



CREATE TABLE `site_customer_device` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(10) NOT NULL DEFAULT 0 COMMENT '员工id',
  `customer_id` int(10) NOT NULL DEFAULT 0 COMMENT '客户id',
  `warehouse_id` int(10) NOT NULL COMMENT '库房id',
  `product_id` int(10) NOT NULL COMMENT '产品id',
  `title` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '设备名称',
  `number` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '设备编号',
  `module` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '产品型号',
  `machine_number` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '设备机号',
  `num` int(10) NOT NULL COMMENT '产品个数',
  `price` decimal(10,2) NOT NULL COMMENT '销售价格',
  `cost_price` decimal(10,2) NOT NULL COMMENT '成本价格',
  `mode` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '产品状态',
  `status` tinyint(1) NOT NULL DEFAULT 1 COMMENT '0 拒绝 1 申请中 2正常 3维修中 （1 审核中 2正常）',
  `desc` varchar(500) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '' COMMENT '备注',
  `out_status` tinyint(1) NOT NULL DEFAULT 0 COMMENT '0未出库 1出库',
  `create_at` timestamp NOT NULL DEFAULT current_timestamp() COMMENT '添加时间',
  `yj_create_at` timestamp NULL DEFAULT NULL COMMENT '预警开机时间',
  `az_create_at` timestamp NULL DEFAULT NULL COMMENT '安装日期',
  `zb_create_at` timestamp NULL DEFAULT NULL COMMENT '质保到期',
  `deviceBand` varchar(30) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT '设备品牌',
  PRIMARY KEY (`id`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=46 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC COMMENT='客户设备';



CREATE TABLE `site_customer_file` (
  `file_id` int(11) NOT NULL AUTO_INCREMENT COMMENT '文件id',
  `customer_id` int(11) NOT NULL COMMENT '客户ID',
  `description` varchar(255) DEFAULT NULL COMMENT '描述',
  `file_path` varchar(255) DEFAULT NULL COMMENT '图片',
  `create_at` timestamp NOT NULL DEFAULT current_timestamp() COMMENT '添加时间',
  PRIMARY KEY (`file_id`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 ROW_FORMAT=DYNAMIC COMMENT='客户文件';



CREATE TABLE `site_customer_invitation` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT 'ID',
  `customer_protect_id` int(10) unsigned NOT NULL COMMENT '商机客户ID',
  `customer_id` int(10) unsigned NOT NULL COMMENT '客户ID',
  `user_id` int(10) unsigned NOT NULL COMMENT '用户ID',
  `appoint_at` datetime NOT NULL COMMENT '到访时间',
  `remark` varchar(200) DEFAULT NULL COMMENT '备注',
  `create_at` datetime NOT NULL DEFAULT current_timestamp() COMMENT '添加时间',
  PRIMARY KEY (`id`),
  KEY `customer_id` (`customer_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COMMENT='客户邀约';



CREATE TABLE `site_customer_offer` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT 'ID',
  `customer_protect_id` int(10) unsigned NOT NULL COMMENT '商机客户ID',
  `customer_id` int(10) unsigned NOT NULL COMMENT '客户ID',
  `user_id` int(10) unsigned NOT NULL COMMENT '报价人ID',
  `offer_price` int(11) NOT NULL COMMENT '报价金额',
  `offer_content` varchar(200) DEFAULT NULL COMMENT '报价说明',
  `remit_proportion` decimal(10,0) DEFAULT NULL COMMENT '优惠比例',
  `remit_price` int(11) NOT NULL DEFAULT 0 COMMENT '优惠金额',
  `remark` varchar(200) DEFAULT NULL COMMENT '备注',
  `offer_at` datetime NOT NULL COMMENT '发布时间',
  `create_at` datetime NOT NULL DEFAULT current_timestamp() COMMENT '添加时间',
  PRIMARY KEY (`id`),
  KEY `customer_id` (`customer_id`),
  KEY `user_id` (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COMMENT='客户报价';



CREATE TABLE `site_customer_offer_history` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT 'ID',
  `customer_protect_id` int(10) unsigned NOT NULL COMMENT '商机客户ID',
  `customer_id` int(10) unsigned NOT NULL COMMENT '客户ID',
  `customer_offer_id` int(11) NOT NULL COMMENT '报价ID',
  `user_id` int(10) unsigned NOT NULL COMMENT '用户ID',
  `username` varchar(20) DEFAULT NULL COMMENT '用户',
  `price` int(11) NOT NULL COMMENT '报价金额',
  `content` varchar(200) DEFAULT NULL COMMENT '说明',
  `type` enum('PRICE','ANSWER','RECOMMEND') NOT NULL COMMENT '类型',
  `create_at` datetime NOT NULL DEFAULT current_timestamp() COMMENT '添加时间',
  PRIMARY KEY (`id`),
  KEY `customer_id` (`customer_id`),
  KEY `user_id` (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COMMENT='客户报价历史';



CREATE TABLE `site_customer_own` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT 'ID',
  `customer_id` int(10) unsigned NOT NULL COMMENT '客户ID',
  `user_id` int(10) unsigned NOT NULL COMMENT '售后ID',
  `product_type` enum('麻将机','净化器') CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '机器类型',
  `product_model` enum('M54','M56','内循环','直排式') NOT NULL COMMENT '机器型号',
  `product_brand` enum('雀友','雷布','宣和','川驰','雀康','松乐','其他') NOT NULL COMMENT '机器品牌',
  `purchase_date` date NOT NULL COMMENT '购买日期',
  `num` smallint(5) unsigned NOT NULL COMMENT '数量',
  `create_at` datetime NOT NULL DEFAULT current_timestamp() COMMENT '添加时间',
  `update_at` datetime DEFAULT NULL COMMENT '更新时间',
  PRIMARY KEY (`id`),
  UNIQUE KEY `customer_id_product_type_model_brand_date` (`customer_id`,`product_type`,`product_model`,`product_brand`,`purchase_date`),
  KEY `user_id` (`user_id`),
  KEY `purchase_date_product_type` (`purchase_date`,`product_type`)
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=utf8mb4 COMMENT='客户现有机器';



CREATE TABLE `site_customer_protect` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT 'ID',
  `customer_id` int(10) unsigned NOT NULL DEFAULT 0 COMMENT '客户ID',
  `protect_id` int(10) unsigned NOT NULL COMMENT '申请ID',
  `level` enum('0','1','SSS','S1','S2','S3','N') NOT NULL DEFAULT '0' COMMENT '级别',
  `process` enum('CREATED','CONFIRM_KEY_PEOPLE','CONFIRM_NEEDS','CONTACTING','OVER') NOT NULL DEFAULT 'CREATED' COMMENT '阶段',
  `name` varchar(100) NOT NULL COMMENT '客户名称',
  `address` varchar(100) NOT NULL COMMENT '客户地址',
  `contact` varchar(16) NOT NULL COMMENT '联系人',
  `mobile` varchar(20) NOT NULL COMMENT '联系电话',
  `image` varchar(200) DEFAULT NULL COMMENT '客户图片',
  `remark` text DEFAULT NULL COMMENT '备注',
  `brief` varchar(100) DEFAULT NULL COMMENT '摘要',
  `region_id` int(10) unsigned NOT NULL COMMENT '大区ID',
  `branch_id` int(10) unsigned NOT NULL COMMENT '部门ID',
  `user_id` int(11) unsigned NOT NULL COMMENT '申请人ID',
  `username` varchar(20) NOT NULL COMMENT '申请人',
  `user2_id` int(11) unsigned NOT NULL DEFAULT 0 COMMENT '合作人/部长',
  `is_over` tinyint(1) NOT NULL DEFAULT 0 COMMENT '是否结束',
  `over_at` datetime DEFAULT NULL COMMENT '结束时间',
  `over_status` enum('TRADE','DISCARD','LOST','EXPIRED') DEFAULT NULL COMMENT '失效类型',
  `over_remark` varchar(200) DEFAULT NULL COMMENT '失效说明',
  `is_confirm` tinyint(1) NOT NULL DEFAULT 0 COMMENT '部长处理',
  `visit_at` datetime DEFAULT NULL COMMENT '访问时间',
  `expire_at` datetime DEFAULT NULL COMMENT '过保时间',
  `update_at` datetime DEFAULT NULL COMMENT '阶段更新时间',
  `create_at` datetime NOT NULL DEFAULT current_timestamp() COMMENT '添加时间',
  PRIMARY KEY (`id`),
  KEY `is_over` (`is_over`),
  KEY `customer_id` (`customer_id`),
  KEY `user_id_is_over` (`user_id`,`is_over`),
  KEY `level` (`level`),
  KEY `protect_id` (`protect_id`),
  KEY `process` (`process`)
) ENGINE=InnoDB AUTO_INCREMENT=1000 DEFAULT CHARSET=utf8mb4 COMMENT='商机客户';



CREATE TABLE `site_customer_protect_contact` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT 'ID',
  `customer_id` int(10) unsigned NOT NULL COMMENT '客户ID',
  `customer_protect_id` int(11) unsigned NOT NULL DEFAULT 0 COMMENT '商机客户ID',
  `user_id` int(10) unsigned NOT NULL COMMENT '用户ID',
  `is_critical` tinyint(1) NOT NULL DEFAULT 0 COMMENT '商机关键人',
  `mobile` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '联系人手机',
  `name` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '联系人称呼',
  `create_at` timestamp NULL DEFAULT current_timestamp() COMMENT '添加时间',
  PRIMARY KEY (`id`) USING BTREE,
  UNIQUE KEY `customer_id_mobile` (`customer_id`,`mobile`),
  KEY `mobile` (`mobile`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COMMENT='商机客户联系人';


CREATE TABLE `site_customer_protect_process` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `customer_id` int(10) unsigned NOT NULL COMMENT '客户ID',
  `customer_protect_id` int(10) unsigned NOT NULL COMMENT '商机客户ID',
  `process` enum('CREATED','CONFIRM_KEY_PEOPLE','CONFIRM_NEEDS','CONTACTING','OVER') CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '阶段',
  `create_at` timestamp NULL DEFAULT current_timestamp() COMMENT '添加时间',
  PRIMARY KEY (`id`) USING BTREE,
  KEY `customer_id` (`customer_id`),
  KEY `mobile` (`customer_protect_id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COMMENT='商机阶段历史';

CREATE TABLE `site_customer_record` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `customer_id` int(10) NOT NULL DEFAULT 0 COMMENT '客户id',
  `user_id` int(10) NOT NULL COMMENT '用户id',
  `type` tinyint(1) NOT NULL COMMENT '1 联系人 2售后',
  `class` tinyint(1) NOT NULL COMMENT '1 创建 2转交 3转派 4回访',
  `action_user_id` int(10) NOT NULL COMMENT '操作用户id',
  `action_type` tinyint(1) NOT NULL DEFAULT 1 COMMENT '1 平台 2员工',
  `create_at` timestamp NOT NULL DEFAULT current_timestamp() COMMENT '添加时间',
  PRIMARY KEY (`id`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=5570 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC COMMENT='客户跟单记录';


CREATE TABLE `site_customer_user` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `branch_id` int(10) unsigned NOT NULL COMMENT '部门id',
  `customer_id` int(10) NOT NULL COMMENT '客户id',
  `user_id` int(10) NOT NULL COMMENT '员工id',
  `type` tinyint(1) NOT NULL COMMENT '1 联系人 2售后',
  `class` tinyint(1) NOT NULL COMMENT '1 创建 2转交 3转派 4 回访',
  `action_user_id` int(10) NOT NULL COMMENT '操作用户id',
  `action_type` tinyint(1) NOT NULL DEFAULT 1 COMMENT ' 1 平台 2员工',
  `create_at` timestamp NOT NULL DEFAULT current_timestamp() COMMENT '添加时间',
  PRIMARY KEY (`id`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=5561 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC COMMENT='客户跟进';


CREATE TABLE `site_customer_visit_record` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT 'ID',
  `customer_id` int(10) unsigned NOT NULL COMMENT '客户ID',
  `user_id` int(10) unsigned NOT NULL COMMENT '操作人ID',
  `work_id` int(10) unsigned NOT NULL COMMENT '工单ID',
  `vw_type1` enum('V','V1','V2','W','W1') NOT NULL COMMENT '之前状态',
  `vw_type2` enum('V','V1','V2','W','W1') NOT NULL COMMENT '之后状态',
  `vs_for` tinyint(3) unsigned NOT NULL DEFAULT 0 COMMENT '类型转换所选VS值',
  `remark` varchar(250) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT '备注',
  `create_at` datetime NOT NULL DEFAULT current_timestamp() COMMENT '添加时间',
  PRIMARY KEY (`id`),
  KEY `is_open` (`vw_type1`),
  KEY `user_id` (`work_id`)
) ENGINE=InnoDB AUTO_INCREMENT=64 DEFAULT CHARSET=utf8mb4 COMMENT='客户状态转换';


CREATE TABLE `site_protect` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT 'ID',
  `name` varchar(100) NOT NULL COMMENT '客户名称',
  `address` varchar(100) NOT NULL COMMENT '客户地址',
  `contact` varchar(16) NOT NULL COMMENT '联系人',
  `mobile` varchar(20) NOT NULL COMMENT '联系电话',
  `image` varchar(200) DEFAULT NULL COMMENT '客户图片',
  `detail` text DEFAULT NULL COMMENT '详细信息',
  `customer_id` int(10) unsigned NOT NULL DEFAULT 0 COMMENT '客户ID',
  `branch_id` int(10) unsigned NOT NULL DEFAULT 0 COMMENT '部门ID',
  `user_id` int(11) unsigned NOT NULL COMMENT '申请人',
  `user2_id` int(11) NOT NULL DEFAULT 0 COMMENT '合作人/部长',
  `admin_id` int(11) unsigned DEFAULT 0 COMMENT '审核人',
  `audit_status` enum('NONE','PASS','REFUSE') NOT NULL DEFAULT 'NONE' COMMENT '审核状态',
  `audit_remark` varchar(200) DEFAULT NULL COMMENT '审核说明',
  `audit_at` timestamp NULL DEFAULT NULL COMMENT '审核时间',
  `is_over` tinyint(1) NOT NULL DEFAULT 0 COMMENT '是否结束',
  `over_at` timestamp NULL DEFAULT NULL COMMENT '结束时间',
  `over_status` enum('TRADE','DISCARD','LOST','EXPIRED') DEFAULT NULL COMMENT '失效类型',
  `over_remark` varchar(200) DEFAULT NULL COMMENT '失效说明',
  `level` enum('0','1','SSS','S1','S2','S3','N') NOT NULL DEFAULT '0' COMMENT '级别',
  `is_confirm` tinyint(1) NOT NULL DEFAULT 0 COMMENT '部长处理',
  `create_at` timestamp NOT NULL DEFAULT current_timestamp() COMMENT '添加时间',
  PRIMARY KEY (`id`),
  KEY `is_over` (`is_over`),
  KEY `customer_id` (`customer_id`),
  KEY `user_id_is_over` (`user_id`,`is_over`),
  KEY `level` (`level`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4 COMMENT='商机客户申请'


CREATE TABLE `site_protect_level_log` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT COMMENT 'ID',
  `protect_id` int(10) unsigned NOT NULL COMMENT '商机申请ID',
  `user_region_id` smallint(6) unsigned NOT NULL COMMENT '商机申请人区域ID',
  `user_branch_id` smallint(6) unsigned NOT NULL COMMENT '商机申请人部门ID',
  `user_id` int(10) unsigned NOT NULL COMMENT '商机申请人ID',
  `username` varchar(20) NOT NULL COMMENT '商机申请人',
  `operator_id` int(10) unsigned NOT NULL COMMENT '操作人ID',
  `operator` varchar(20) NOT NULL COMMENT '操作人',
  `level_src` enum('SSS','S1','S2','S3','N') NOT NULL COMMENT '原类别',
  `level_dst` enum('SSS','S1','S2','S3','N') NOT NULL COMMENT '新类别',
  `create_date` date NOT NULL COMMENT '变更日期',
  `remark` varchar(100) NOT NULL COMMENT '变更说明',
  `create_at` timestamp NOT NULL DEFAULT current_timestamp() COMMENT '添加时间',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COMMENT='商机级别变更历史'


CREATE TABLE `site_visit` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT COMMENT 'id',
  `customer_id` int(11) unsigned NOT NULL COMMENT '客户id',
  `user_id` int(11) unsigned NOT NULL COMMENT '拜访人id',
  `branch_id` int(10) unsigned NOT NULL DEFAULT 0 COMMENT '员工部门ID',
  `is_protect` tinyint(1) NOT NULL DEFAULT 0 COMMENT '是否商机拜访',
  `customer_protect_id` int(10) unsigned NOT NULL DEFAULT 0 COMMENT '商机客户ID',
  `protect_id` int(10) unsigned NOT NULL DEFAULT 0 COMMENT '商机申请ID',
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '拜访主题',
  `content` text COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '拜访内容',
  `type` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '拜访类型',
  `address` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '拜访地址',
  `province` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT '省',
  `city` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT '市',
  `area` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT '区',
  `longitude` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT '经度',
  `latitude` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT '纬度',
  `visit_time` datetime DEFAULT NULL COMMENT '预约时间',
  `status` tinyint(1) DEFAULT 0 COMMENT '类型:1新的拜访 2拜访中 3完成 \r\n0未签到 1已签到',
  `image` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT '图片',
  `appointment_date` timestamp NULL DEFAULT NULL COMMENT '预约下次拜访时间',
  `sign_time` timestamp NULL DEFAULT NULL COMMENT '签到时间',
  `desc` text COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT '签到说明',
  `create_at` timestamp NOT NULL DEFAULT current_timestamp() COMMENT '添加时间',
  PRIMARY KEY (`id`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=153 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC COMMENT='客户拜访'
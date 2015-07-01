<?php
return array(

    "LOAD_EXT_FILE"=>"fb",

    'LOAD_EXT_CONFIG'	=>'db,db_status,wechat',

    'TMPL_TEMPLATE_SUFFIX'=>'.php', //模板文件的后缀

    'APP_GROUP_LIST'=>'Home,Admin', //开启分组
    'MODULE_ALLOW_LIST'    =>    array('Home','Admin'),
    'DEFAULT_MODULE' => 'Home',    //默认模块

    //子域名部署
    'URL_CASE_INSENSITIVE'  =>  true,   //URL大小写
    'APP_SUB_DOMAIN_DEPLOY'   =>    1,   // 开启子域名配置
    'APP_SUB_DOMAIN_RULES'    =>    array(
        'tmp.taoth.com'  => 'Admin',      // admin.domain1.com域名指向Admin模块
    ),

    'ATTACH_DIR' => '/Public/Admin/Attachments/',
);
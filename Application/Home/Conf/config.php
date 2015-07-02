<?php
return array(

    'SHOW_ERROR_MSG'        =>  true,

    'DEFAULT_V_LAYER'       =>  'Tpl',



    'TMPL_PARSE_STRING'  =>array(
        '__PUBLIC__' => PROJECT_RELATIVE_PATH . '/Public/Wechat', // 更改默认的/Public 替换规则
        '__JS__'     => PROJECT_RELATIVE_PATH . '/Public/Wechat/js', // 增加新的JS类库路径替换规则
        '__CSS__' => PROJECT_RELATIVE_PATH . '/Public/Wechat/css', // 增加新的CSS类库路径替换规则
        '__IMAGE__' => PROJECT_RELATIVE_PATH . '/Public/Wechat/img', // 增加新的img类库路径替换规则
    ),

    'URL_ROUTER_ON'   => true,
    'URL_ROUTE_RULES'=>array(
        'content/:d\d' => '/index/content',
    ),
);
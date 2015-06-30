<?php

return array(

    'SHOW_ERROR_MSG'        =>  true,

    'DEFAULT_CONTROLLER' => 'public',    //默认控制器

    'DEFAULT_V_LAYER'       =>  'Tpl',

    'TMPL_PARSE_STRING'  =>array(
        '__PUBLIC__' => '/Public/Admin', // 更改默认的/Public 替换规则
        '__CKEDITOR__' => '/Public/Admin/CKeditor', // 富文本编辑器
        '__CKFINDER__' => '/Public/Admin/CKfinder', // 图片资源管理器
        '__JS__'     => '/Public/Admin/resource/js', // 增加新的JS类库路径替换规则
        '__CSS__' => '/Public/Admin/resource/css', // 增加新的CSS类库路径替换规则
        '__IMAGE__' => '/Public/Admin/resource/img', // 增加新的img类库路径替换规则
    ),

    'SALT_STR' => '|>.}HD:nt(TjkahB`2sj?,9xBg>20=lf',
    //模板布局
    //'LAYOUT_ON'=>true,
    //'LAYOUT_NAME'=>'layout',
    //'TMPL_LAYOUT_ITEM'      =>  '{__REPLACE__}',
    //'LAYOUT_NAME'=>'Layout/col',
);
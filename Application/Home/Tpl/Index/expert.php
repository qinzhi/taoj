<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
    <meta http-equiv="pragma" content="no-cache"/>
    <meta name="viewport" content="width=device-width, initial-scale=0.5 ,maximum-scale=0.5, minimum-scale=0.5, user-scalable=no">
    <title>伸手购旗下 - 桃江帮帮团</title>
    <link rel="stylesheet" href="__CSS__/style.css">
    <script src="__JS__/zepto.min.js"></script>
</head>
<body>
<div class="header">
    <div class="row">
        <div class="return pull-left">
            <a href="javascript:history.go(-1);">
                <i class="fa fa-return pull-left"></i>
                <span>返回</span>
            </a>
        </div>
        <div class="title pull-left">内容详情</div>
        <div class="help pull-right">
            <a href="<?php echo PROJECT_RELATIVE_PATH;?>/index/appeal"><img src="__IMAGE__/help.png">
                <span>我要求助</span></a>
        </div>
    </div>
</div>
<div class="top">
    <ul class="nav">
        <volist name="category" id="vo">
            <li><a href="<?php echo PROJECT_RELATIVE_PATH;?>/index/category?id={$vo.id}">{$vo.name}</a></li>
        </volist>
    </ul>
</div>
<div class="banner">
    <a href="{$banner.url}">
        <img src="<?php echo C('ATTACH_DIR') . $banner['image'];?>"/>
        <p class="title">{$banner.name}</p>
    </a>
</div>
<div class="content">
    <div class="container-fluid expert_detail bkg">
        {$expert.detail}
    </div>
    <div class="container-fluid broadcast">
        <div class="sos">
            <a class="btn btn-sos" href="<?php echo PROJECT_RELATIVE_PATH;?>/index/appeal">我要求助</a>
        </div>
        <div class="share">
            <a class="btn btn-share" href="javascript:;">关注·桃江帮帮团</a>
        </div>
    </div>
</div>

<div class="modal-qrcode">
    <div class="div-qrcode">
        <p>长按以下二维码识别并关注</p>
        <img src="__IMAGE__/qrcode.jpg" id="qrcode"/>
    </div>
</div>
<div class="modal"></div>

<div class="footer">
    <p><span class="p1">立足桃江</span><span class="p2">&</span><span class="p3">服务家乡</span></p>
    <p class="theme">桃江帮帮团</p>
</div>
<script>
    $(function(){
        $('.btn-confirm').click(function(){
            var params = {};
            params.content = $('#content').val();
            params.id = {$_GET.id};
        $.post('/index/reply',params,function(result){
            if(result)
                window.location.reload();
        });
    });
    $('.btn-share').click(function(){
        $('.modal-qrcode').show();
        $('.modal').show();
    });
    $('.modal-qrcode').click(function(){
        $('.modal-qrcode').hide();
        $('.modal').hide();
    });
    });
</script>
</body>
</html>
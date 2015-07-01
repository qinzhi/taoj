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
            <a href="/index/appeal"><img src="__IMAGE__/help.png">
                <span>我要求助</span></a>
        </div>
    </div>
</div>
<div class="top">
    <ul class="nav">
        <volist name="category" id="vo">
            <li><a href="/index/category?id={$vo.id}">{$vo.name}</a></li>
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
    <div class="container-fluid content-broadcast">
        <div class="row">
            <div class="col-md-6 content-broadcast-sos">
                <a class="btn btn-sos" href="/index/appeal">我要求助</a>
            </div>
            <div class="col-md-6 content-broadcast-share">
                <a class="btn btn-share" href="javascript:;">分享到朋友圈·大家一起解决</a>
            </div>
        </div>
    </div>
    <div class="container-fluid article">
        <article>
            <h3>
                <img src="__IMAGE__/logo.png">
                <span>{$appeal.title}</span>
            </h3>
            <p>{$appeal.content}</p>
        </article>
    </div>
    <div class="container-fluid rely">
        <ul>
            <volist name="reply" id="vo">
                <li class="rely-list">
                    <div class="good-soul">
                        <img src="__IMAGE__/logo.png">
                        <p>热心人</p>
                    </div>
                    <div class="viewpoint">
                        <p>{$vo.reply}</p>
                    </div>
                    <div class="clear"></div>
                </li>
            </volist>
        </ul>
    </div>
    <div class="container-fluid reply">
        <textarea placeholder="我可以为他提供帮助，点击输入。" name="content" id="content" autocomplete="off"></textarea>
        <div class="pull-right reply-submit">
            <a class="btn btn-confirm" href="javascript:;">确定</a>
        </div>
        <div class="clear"></div>
    </div>
    <div class="container-fluid broadcast">
        <div class="sos">
            <a class="btn btn-sos" href="/index/appeal">我要求助</a>
        </div>
        <div class="share">
            <a class="btn btn-share" href="javascript:;">分享到朋友圈·大家一起解决</a>
        </div>
    </div>
</div>
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
    });
</script>
</body>
</html>
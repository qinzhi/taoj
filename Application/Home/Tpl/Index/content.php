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
            <a href="appeal.html"><img src="__IMAGE__/help.png">
                <span>我要求助</span></a>
        </div>
    </div>
</div>
<div class="top">
    <ul class="nav">
        <li><a href="#">法律</a></li>
        <li><a href="#">健康</a></li>
        <li><a href="#">教育</a></li>
        <li><a href="#">心理</a></li>
        <li><a href="#">其他</a></li>
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
                <a class="btn btn-sos" href="#">我要求助</a>
            </div>
            <div class="col-md-6 content-broadcast-share">
                <a class="btn btn-share" href="#">分享到朋友圈·大家一起解决</a>
            </div>
        </div>
    </div>
    <div class="container-fluid article">
        <article>
            <h3>
                <img src="__IMAGE__/logo.png">
                <span>求助的标题，标题的标题，内容的内容</span>
            </h3>
            <p>也许文字不能表达的，音乐，可以表达。一首歌，也许是你的信仰，你的态度，你的心情，你的记忆……
                为了让这种表达和分享更加简单，公众号图文消息新增插入音乐的功能，面向所有公众号开放。公众号运营者可以通过该功能，
                跟用户分享音乐或歌单。1. 运营者可以在编辑图文消息时，在正文中插入音乐。
            </p>
        </article>
    </div>
    <div class="container-fluid rely">
        <ul>
            <li class="rely-list">
                <div class="good-soul">
                    <img src="__IMAGE__/logo.png">
                    <p>热心人</p>
                </div>
                <div class="viewpoint">
                    <p>也许文字不能表达的，音乐，可以表达。一首歌，也许是你的信仰，你的态度，你的心情，你的记忆……</p>
                </div>
                <div class="clear"></div>
            </li>
            <li class="rely-list">
                <div class="good-soul">
                    <img src="__IMAGE__/logo.png">
                    <p>热心人</p>
                </div>
                <div class="viewpoint">
                    <p>也许文字不能表达的，音乐，可以表达。一首歌，也许是你的信仰，你的态度，你的心情，你的记忆……</p>
                </div>
                <div class="clear"></div>
            </li>
        </ul>
    </div>
    <div class="container-fluid reply">
        <textarea placeholder="我可以为他提供帮助，点击输入。"></textarea>
        <div class="pull-right reply-submit">
            <a class="btn btn-confirm" href="#">确定</a>
        </div>
        <div class="clear"></div>
    </div>
    <div class="container-fluid broadcast">
        <div class="sos">
            <a class="btn btn-sos" href="appeal.html">我要求助</a>
        </div>
        <div class="share">
            <a class="btn btn-share" href="#">分享到朋友圈·大家一起解决</a>
        </div>
    </div>
</div>

<div class="footer">
    <p><span class="p1">立足桃江</span><span class="p2">&</span><span class="p3">服务家乡</span></p>
    <p class="theme">桃江帮帮团</p>
</div>
</body>
</html>
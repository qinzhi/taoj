<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
    <meta http-equiv="pragma" content="no-cache"/>
    <meta name="viewport" content="width=device-width, initial-scale=0.5 ,maximum-scale=0.5, minimum-scale=0.5, user-scalable=no">
    <title>伸手购旗下 - 桃江帮帮团</title>
    <link rel="stylesheet" href="__CSS__/style.css">
    <script src="__JS__/zepto.min.js"></script
</head>
<body>
<div class="header">
    <div class="logo pull-left">
        <img src="__IMAGE__/logo.png" />
        <span>桃江·房产</span>
    </div>
    <div class="help pull-right">
        <a href="appeal.html"><img src="__IMAGE__/help.png">
            <span>我要求助</span></a>
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
    <div class="container-fluid bkg search">
        <span><i class="fa fa-search"></i></span>
        <input type="text" placeholder="输入搜索内容"/>
        <a class="btn-search" href="#">搜索</a>
        <div class="AdPositionId">
            <p>文字广告位文字广告位文字广告位文字</p>
        </div>
    </div>
    <div class="container-fluid category">
        <div class="title">
            <i class="fa fa-list pull-left"></i>
            <h3>全部信息</h3>
            <div class="clear"></div>
        </div>
        <ul class="category-list">
            <li>
                <a href="content.html">
                    高薪普工焊工
                    <p>2015-06-21</p>
                </a>
            </li>
            <li>
                <a href="content.html">
                    益阳百事通上门为你解难：拼车，租车，开锁，疏通...
                    <p>2015-06-20</p>
                </a>
            </li>
            <li>
                <a href="content.html">
                    一夜情
                    <p>2015-06-20</p>
                </a>
            </li>
            <li>
                <a href="content.html">
                    一夜情
                    <p>2015-06-20</p>
                </a>
            </li>
            <li>
                <a href="content.html">
                    益阳--长沙沅江桃江的往返拼车和包车
                    <p>2015-06-15</p>
                </a>
            </li>
        </ul>
    </div>
    <div class="container-fluid">
        <div class="page">
            <div class="page-left">
                <a class="prev_page btn btn-page" href="#">上一页</a>
            </div>
            <div class="page-center">
                <ul class="page-list btn-group">
                    <li><a class="next_page btn btn-page" href="#">1</a></li>
                    <li><a class="next_page btn btn-page" href="#">2</a></li>
                    <li><a class="next_page btn btn-page" href="#">3</a></li>
                    <li><a class="next_page btn btn-page" href="#">4</a></li>
                    <li><a class="next_page btn btn-page" href="#">5</a></li>
                </ul>
                <div class="clear"></div>
            </div>
            <div class="page-right">
                <a class="next_page btn btn-page" href="#">下一页</a>
            </div>
        </div>
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
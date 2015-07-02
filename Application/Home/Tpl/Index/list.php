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
        <a href="/"><img src="__IMAGE__/logo.png" />
        <span>爱在桃江·互帮互助</span></a>
    </div>
    <div class="help pull-right">
        <a href="<?php echo PROJECT_RELATIVE_PATH;?>/index/appeal"><img src="__IMAGE__/help.png">
            <span>我要求助</span></a>
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
    <div class="container-fluid bkg search">
        <div class="search-center">
            <div class="center-box">
                <input type="text" id="keyword" placeholder="输入搜索内容" value="{$_GET.keyword}" autocomplete="off"/>
            </div>
        </div>
        <div class="search-left"><span><i class="fa fa-search"></i></span></div>
        <div class="search-right"><a class="btn-search" href="javascript:;">搜索</a></div>
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
            <volist name="appeal" id="vo">
                <li>
                    <a href="<?php echo PROJECT_RELATIVE_PATH;?>/index/content?id={$vo.id}">
                        {$vo.title}
                        <p>{$vo.post_time|date='Y-m-d',###}</p>
                    </a>
                </li>
            </volist>
        </ul>
    </div>
    <div class="container-fluid">
        <?php page('/index/category',$page,$page_num,$params);?>
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
<script>
    $(function(){
       $('.btn-search').click(function(){
           var keyword = $.trim($('#keyword').val());
           if(keyword){
               window.location.href = '/index/category?id={$_GET.id}&keyword=' + keyword;
           }else{
               window.location.href = '/index/category?id={$_GET.id}';
           }
       });
    });
</script>
</body>
</html>
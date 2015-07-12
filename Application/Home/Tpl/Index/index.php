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
    <div class="container-fluid tip">
        <div class="alerts row">
            <div class="alerts-content">
                <i class="fa fa-praise pull-left alerts-info"></i>
                <p class="info"><span class="info-user">{$username}</span>欢迎您加入我们！</p>
            </div>
        </div>
    </div>
    <div class="container-fluid">
        <ul class="expert-list">
            <volist name="expert" id="vo">
            <li>
                <a href="<?php echo PROJECT_RELATIVE_PATH;?>/index/expert?id={$vo.id}">
                    <table class="table">
                        <tr>
                            <th rowspan="3">
                                <img src="<?php echo C('ATTACH_DIR') . $vo['avator'];?>"/>
                            </th>
                            <td class="position">{$vo.organ}</td>
                        </tr>
                        <tr>
                            <td class="user-name">{$vo.name}</td>
                        </tr>
                        <tr>
                            <td class="user-intro">{$vo.intro}</td>
                        </tr>
                    </table>
                </a>
            </li>
            </volist>
        </ul>
    </div>
    <div class="container-fluid summon">
        <div class="alerts row">
            <div class="alerts-content">
                <p class="info"><span class="info-user">{$username}</span> 欢迎您加入桃江帮帮团</p>
                <p class="info">你帮我，我帮你，互帮互助</p>
                <p class="info">请和我们一起让桃江更有爱！</p>
            </div>
        </div>
        <div class="corner"></div>
    </div>
    <div class="container-fluid question">
        <div class="title">
            <i class="fa fa-help pull-left"></i>
            <h3>看看我能帮到他们什么？</h3>
            <span class="status status-gray pull-right">状态</span>
            <div class="clear"></div>
        </div>
        <ul class="question-list">
            <volist name="appeal" id="vo">
                <li>
                    <a href="<?php echo PROJECT_RELATIVE_PATH;?>/index/content?id={$vo.id}">
                        <p>{$vo.title}</p>
                        <span class="status status-green pull-right">解决中</span>
                    </a>
                </li>
            </volist>
        </ul>
    </div>
    <div class="container-fluid">
        <?php page('/index',$page,$page_num,'');?>
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
<!--<script src="http://res.wx.qq.com/open/js/jweixin-1.0.0.js"></script>
<script>
    var timestamp = {$wx_config.timestamp};
    $(function(){
        wx.config({
            debug: false,
            appId: '{$wx_config.appid}',
            timestamp: timestamp,
            nonceStr: '{$wx_config.noncestr}',
            signature: '{$wx_config.signature}',
            jsApiList: [
                'checkJsApi',
                'onMenuShareTimeline',
                'onMenuShareAppMessage',
                'onMenuShareQQ',
                'onMenuShareWeibo',
                'hideMenuItems',
                'showMenuItems',
                'hideAllNonBaseMenuItem',
                'showAllNonBaseMenuItem',
                'translateVoice',
                'startRecord',
                'stopRecord',
                'onRecordEnd',
                'playVoice',
                'pauseVoice',
                'stopVoice',
                'uploadVoice',
                'downloadVoice',
                'chooseImage',
                'previewImage',
                'uploadImage',
                'downloadImage',
                'getNetworkType',
                'openLocation',
                'getLocation',
                'hideOptionMenu',
                'showOptionMenu',
                'closeWindow',
                'scanQRCode',
                'chooseWXPay',
                'openProductSpecificView',
                'addCard',
                'chooseCard',
                'openCard'
            ]
        });
        $('.btn-share').click(function(){
            if (typeof WeixinJSBridge == "undefined") {
                alert("只能在微信浏览器分享");
            }else{
                WeixinJSBridge.invoke('shareTimeline', {
                    "appid": "{$wx_config.appid}",
                    "title": "36氪",
                    "link": "http://www.36kr.com",
                    "desc": "关注互联网创业",
                    "img_url": "http://www.36kr.com/assets/images/apple-touch-icon.png"
                },function(e){alert(e.err_msg);});
            }
        });
    });
</script>-->
</body>
</html>
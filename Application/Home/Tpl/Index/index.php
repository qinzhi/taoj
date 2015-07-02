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
                <p class="info"><span class="info-user">阿畅哥·烽火戏诸侯</span>欢迎您加入我们！</p>
            </div>
        </div>
    </div>
    <div class="container-fluid">
        <ul class="expert-list">
            <li>
                <a href="#">
                    <table class="table">
                        <tr>
                            <th rowspan="3">
                                <img src="__IMAGE__/avatar.jpg"/>
                            </th>
                            <td class="position">天剑律师事务所</td>
                        </tr>
                        <tr>
                            <td class="user-name">伍洋纯</td>
                        </tr>
                        <tr>
                            <td class="user-intro">我愿意为家乡人民提供全方位的法律咨询服务！</td>
                        </tr>
                    </table>
                </a>
                <!--<div class="pull-left user-img">
                    <img src="__IMAGE__/avatar.jpg"/>
                </div>
                <div class="pull-left user-detail">
                    <p class="position">天剑律师事务所</p>
                    <p class="user-name">伍洋纯</p>
                    <p class="user-intro">我愿意为家乡人民提供全方位的法律咨询服务！</p>
                </div>-->
            </li>
            <li>
                <a href="#">
                    <table class="table">
                        <tr>
                            <th rowspan="3">
                                <img src="__IMAGE__/avatar.jpg"/>
                            </th>
                            <td class="position">天剑律师事务所</td>
                        </tr>
                        <tr>
                            <td class="user-name">伍洋纯</td>
                        </tr>
                        <tr>
                            <td class="user-intro">我愿意为家乡人民提供全方位的法律咨询服务！</td>
                        </tr>
                    </table>
                </a>
            </li>
            <li>
                <a href="#">
                    <table class="table">
                        <tr>
                            <th rowspan="3">
                                <img src="__IMAGE__/avatar.jpg"/>
                            </th>
                            <td class="position">天剑律师事务所</td>
                        </tr>
                        <tr>
                            <td class="user-name">伍洋纯</td>
                        </tr>
                        <tr>
                            <td class="user-intro">我愿意为家乡人民提供全方位的法律咨询服务！</td>
                        </tr>
                    </table>
                </a>
            </li>
            <li>
                <a href="#">
                    <table class="table">
                        <tr>
                            <th rowspan="3">
                                <img src="__IMAGE__/avatar.jpg"/>
                            </th>
                            <td class="position">天剑律师事务所</td>
                        </tr>
                        <tr>
                            <td class="user-name">伍洋纯</td>
                        </tr>
                        <tr>
                            <td class="user-intro">我愿意为家乡人民提供全方位的法律咨询服务！</td>
                        </tr>
                    </table>
                </a>
            </li>
        </ul>
    </div>
    <div class="container-fluid summon">
        <div class="alerts row">
            <div class="alerts-content">
                <p class="info"><span class="info-user">阿畅哥·烽火戏诸侯</span> 欢迎您加入桃江帮帮团</p>
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
            <a class="btn btn-share" href="javascript:;">分享到朋友圈·大家一起解决</a>
        </div>
    </div>
</div>

<div class="footer">
    <p><span class="p1">立足桃江</span><span class="p2">&</span><span class="p3">服务家乡</span></p>
    <p class="theme">桃江帮帮团</p>
</div>
<script src="http://res.wx.qq.com/open/js/jweixin-1.0.0.js"></script>
<script>
    $(function(){
        wx.checkJsApi({
            jsApiList: ['menuShareTimeline'], // 需要检测的JS接口列表，所有JS接口列表见附录2,
            success: function(res) {
                //console.log(res);
            }
        });
        wx.config({
            debug: true, // 开启调试模式,调用的所有api的返回值会在客户端alert出来，若要查看传入的参数，可以在pc端打开，参数信息会通过log打出，仅在pc端时才会打印。
            appId: '', // 必填，企业号的唯一标识，此处填写企业号corpid
            timestamp: 1231231231, // 必填，生成签名的时间戳
            nonceStr: '', // 必填，生成签名的随机串
            signature: '',// 必填，签名，见附录1
            jsApiList: [] // 必填，需要使用的JS接口列表，所有JS接口列表见附录2
        });
        wx.error(function(res){
            //console.log(res);
            // config信息验证失败会执行error函数，如签名过期导致验证失败，具体错误信息可以打开config的debug模式查看，也可以在返回的res参数中查看，对于SPA可以在这里更新签名。

        });
        $('.btn-share').click(function(){
            wx.onMenuShareTimeline({
                title: '桃江帮帮团', // 分享标题
                link: location.href, // 分享链接
                imgUrl: '', // 分享图标
                success: function () {
                    // 用户确认分享后执行的回调函数
                },
                cancel: function () {
                    // 用户取消分享后执行的回调函数
                }
            });
        });
    });
</script>
</body>
</html>
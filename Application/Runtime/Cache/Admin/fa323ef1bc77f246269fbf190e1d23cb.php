<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">

<!-- Head -->
<head>
    <meta charset="utf-8" />
    <title>桃江帮帮团</title>

    <meta name="description" content="login" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <link rel="shortcut icon" href="/Public/Admin/resource/img/favicon.png" type="image/x-icon">
    <!--Basic Styles-->
    <link href="/Public/Admin/resource/css/bootstrap.min.css" rel="stylesheet" />
    <link href="/Public/Admin/resource/css/weather-icons.min.css" rel="stylesheet" />
    <link href="/Public/Admin/resource/css/font-awesome.min.css" rel="stylesheet" />

    <!--Beyond styles-->
    <link href="/Public/Admin/resource/css/login.css" rel="stylesheet" />
    <!--Skin Script: Place this script in head to load scripts for skins and rtl support-->
    <script src="/Public/Admin/resource/js/jquery-2.0.3.min.js"></script>
    <script src="/Public/Admin/resource/js/skins.min.js"></script>
</head>
<body>
<div class="login-screen">
    <div class="login">
        <div class="login-icon">
            <img alt="Welcome to 桃江帮帮团" src="/Public/Admin/resource/img/login/icon.png">
            <h3>
                Welcome to
                <small>桃江帮帮团</small>
            </h3>
        </div>
        <form class="login-form" action="/public/verify" onsubmit="verify()" method="post">
            <div class="form-group">
                <input name="username" id="username" class="form-control login-field input-large" type="text" placeholder="用户名" value="">
                <i class="login-field-icon menu-icon glyphicon glyphicon-user"></i>
            </div>
            <div class="form-group">
                <input name="password" id="password" class="form-control login-field input-large" type="password" placeholder="密码" value="">
                <i class="login-field-icon menu-icon glyphicon glyphicon-lock"></i>
            </div>
            <div class="form-group">
                <button class="btn btn-large btn-block btn-primary btn-login" type="submit">登陆</button>
                <a class="forget-psd" href="#">忘记密码</a>
            </div>
        </form>
    </div>
</div>
<script>
    function verify(){
        var username = $('#username').val();
        if(username == ''){
            alert('用户名不能为空');
            return false;
        }
        var password = $('#password').val();
        if(password == ''){
            alert('密码不能为空');
            return false;
        }
    }
</script>
</body>
</html>
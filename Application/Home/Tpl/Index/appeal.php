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
        <div class="title pull-left">我要求助</div>
        <div class="help pull-right">
            <a href="appeal.html"><img src="__IMAGE__/help.png">
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
    <form method="post" enctype="multipart/form-data" onsubmit="return verify();">
        <div class="container-fluid bkg ask-category">
            <div class="pull-right">
                <label>求助类型</label>
                <select name="category" id="category" style="width: 180px;">
                    <volist name="category" id="vo">
                        <option value="{$vo.id}">{$vo.name}</option>
                    </volist>
                </select>
            </div>
            <div class="clear"></div>
        </div>
        <div class="container-fluid bkg add-ask">
            <input type="text" placeholder="请输入标题" name="title" id="title" maxlength="30"/>
            <textarea placeholder="输入内容" name="content" id="content"></textarea>
        </div>
        <div class="container-fluid bkg appeal-broadcast">
            <div class="row appeal-attach">
                <span>添加附件：
                    <a href="javascript:;" id="file_name"></a>
                    <a id="del_file" href="javascript:;">删除</a>
                </span>
            </div>
            <div class="row">
                <div class="col-md-6 appeal-broadcast-sos">
                    <input type="file" class="hidden" name="file" id="file"/>
                    <a class="btn btn-share" id="attach" href="javascript:;">上传图片附件</a>
                </div>
                <div class="col-md-6 appeal-broadcast-share">
                    <button type="submit" class="hidden submit"></button>
                    <a class="btn btn-sos" id="submit" href="javascript:;">确定提交</a>
                </div>
            </div>
        </div>
        <div class="modal-img">
            <img id="preview" src="">
        </div>
    </form>
</div>
<div class="footer">
    <p><span class="p1">立足桃江</span><span class="p2">&</span><span class="p3">服务家乡</span></p>
    <p class="theme">桃江帮帮团</p>
</div>
<script>
    function verify(){
        var title = $.trim($('#title').val());
        if(title == ''){
            alert('标题不能为空');
            $('#title').focus();
            return false;
        }
        var content = $.trim($('#content').val());
        if(content == ''){
            alert('内容不能为空');
            $('#content').focus();
            return false;
        }
    }
    function is_photo(obj){
        var photoExt=obj.value.substr(obj.value.lastIndexOf(".")).toLowerCase();//获得文件后缀名

        if(photoExt == '.jpg' || photoExt == '.jpeg' || photoExt == '.bmp' || photoExt == '.png' || photoExt == '.gif');
        else{
            alert("图片格式不正确!");
            return false;
        }

        var fileSize = 0;
        var isIE = /msie/i.test(navigator.userAgent) && !window.opera;
        if (isIE && !obj.files) {
            var filePath = obj.value;
            var fileSystem = new ActiveXObject("Scripting.FileSystemObject");
            var file = fileSystem.GetFile (filePath);
            fileSize = file.Size;
        }else {
            fileSize = obj.files[0].size;
        }

        fileSize=Math.round(fileSize/1024*100)/100; //单位为KB
        if(fileSize >= 1024){
            alert("照片最大尺寸为1M，请重新上传!");
            return false;
        }
    }
    $(function(){
        $('#submit').click(function(){
            $(document).find('.submit').trigger('click');
        });
        $('#attach').click(function(){
            $('#file').trigger('click');
        });
        $(document).on('change','#file',function(){
            if(is_photo(this) === false){
                return false;
            }
            if($('.appeal-attach')[0].style.display == '' || $('.appeal-attach')[0].style.display == 'none'){
                $('.appeal-attach').show();
            }
            $('#file_name').text($(this).val());
        });
        $('#del_file').click(function(){
            if(confirm('是否删除？')){
                $(this).parents('.appeal-attach').hide();
                var file = $("#file");
                file.after(file.clone());
                file.remove();
            }
        });
        $('#file_name').click(function(){
            var file = document.getElementById('file');
            var url = window.URL.createObjectURL(file.files[0]);
            $('#preview').attr('src',url);
            $('.modal-img').show();
        });
        $('.modal-img').click(function(){
            $('.modal-img').hide();
        });
        document.getElementById('preview').onload = function(){
            var height = $(this).height();
            var width = $(this).width();
            var margin_top = - height / 2 + 'px';
            var margin_left = - width / 2 + 'px';
            $(this).css({'margin-top':margin_top,'margin-left':margin_left});
        }
    });
</script>
</body>
</html>
<layout name="Layout/col" />
<div class="row">
    <div class="col-lg-12 col-sm-12 col-xs-12">
        <div class="widget">
            <div class="widget-header bordered-bottom bordered-sky" style="padding: 15px 11px;">
                <div class="pull-right">
                    <button class="btn btn-success" type="button">保存</button>
                </div>
                <div class="clearfix"></div>
            </div><!--Widget Header-->
            <div class="widget-body plugins_banner-">
                <div id="horizontal-form">
                    <form role="form" class="form-horizontal" style="margin: 30px 0;" method="post">
                        <div class="form-group">
                            <label class="col-sm-2 control-label no-padding-right" for="name">姓名*</label>
                            <div class="col-sm-8">
                                <input type="text" id="name" name="name" class="form-control" value="{$expert.name}">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-2 control-label no-padding-right" for="avator">头像*</label>
                            <div class="col-sm-8">
                                <div class="input-group input-group-sm">
                                    <input type="text" name="avator" id="avator" class="form-control" value="{$expert.avator}" readonly>
                                    <span class="input-group-btn">
                                        <button type="button" class="btn btn-default" onclick="BrowseServer('avator');">选择图片</button>
                                    </span>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-2 control-label no-padding-right" for="wx_name">微信昵称*</label>
                            <div class="col-sm-8">
                                <input type="text" id="wx_name" name="wx_name" class="form-control" value="{$expert.wx_name}">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-2 control-label no-padding-right" for="wx_unionid">微信unionid*</label>
                            <div class="col-sm-8">
                                <input type="text" id="wx_unionid" name="wx_unionid" class="form-control" value="{$expert.wx_unionid}">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-2 control-label no-padding-right" for="organ">单位*</label>
                            <div class="col-sm-8">
                                <input type="text" id="organ" name="organ" class="form-control" value="{$expert.organ}">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-2 control-label no-padding-right" for="intro">简介*</label>
                            <div class="col-sm-8">
                                <input type="text" id="intro" name="intro" class="form-control" value="{$expert.intro}">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-2 control-label no-padding-right" for="sort">排序</label>
                            <div class="col-sm-8">
                                <input type="text" id="sort" name="sort" class="form-control" value="{$expert.sort}">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-sm-2 control-label no-padding-right" for="url">详情*</label>
                            <div class="col-sm-8">
                                <?php create_editor('detail',$expert['detail']);?>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="alert alert-warning fade in radius-bordered alert-shadowed">
                    <button data-dismiss="alert" class="close">
                        ×
                    </button>
                    <strong>注意：</strong> 头像图片尺寸120 * 120
                </div>
            </div><!--Widget Body-->
        </div><!--Widget-->
    </div>
</div>
<script>
    $(function(){
        $('.btn-success').click(function(){
            $(document).find('form').submit();
        });
    });
</script>
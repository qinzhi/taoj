<layout name="Layout/col" />
<div class="row">
    <div class="col-lg-12 col-sm-12 col-xs-12">
        <div class="widget">
            <div class="widget-header bordered-bottom bordered-sky" style="padding: 15px 11px;">
                <div class="pull-right">
                    <button class="btn btn-success" type="button">添加</button>
                </div>
                <div class="clearfix"></div>
            </div><!--Widget Header-->
            <div class="widget-body plugins_banner-">
                <div id="horizontal-form">
                    <form role="form" method="post" class="col-md-8 form-horizontal" autocomplete="off">
                        <div class="form-group">
                            <label class="col-sm-1 control-label no-padding-right" for="name">分类名称</label>
                            <div class="col-sm-11 row">
                                <div class="col-xs-12 col-md-6">
                                    <input type="text" id="name" name="name" class="form-control">
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-1 control-label no-padding-right" for="name">上级分类</label>
                            <div class="col-sm-11 row">
                                <div class="col-xs-12 col-md-6">
                                    <input type="text" id="p_name" name="p_name" class="form-control" value="根节点" disabled>
                                    <input type="hidden" id="p_id" name="p_id" class="form-control" value="0">
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-1 control-label no-padding-right" for="intro">分类简述</label>
                            <div class="col-sm-11 row">
                                <div class="col-xs-12 col-md-6">
                                    <input type="text" id="intro" name="intro" class="form-control">
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-1 control-label no-padding-right" for="sort">排序</label>
                            <div class="col-sm-11 row">
                                <div class="col-xs-12 col-md-6">
                                    <input type="text" id="sort" name="sort" class="form-control">
                                </div>
                            </div>
                        </div>
                    </form>
                    <div class="widget box-category">
                        <div class="widget-header bg-blue">
                            <span class="widget-caption">选择分类</span>
                            <div class="widget-buttons">
                                <a data-toggle="collapse" href="#">
                                    <i class="fa fa-minus"></i>
                                </a>
                            </div><!--Widget Buttons-->
                        </div><!--Widget Header-->
                        <div class="widget-body">
                            <ul id="tree" class="ztree"></ul>
                        </div><!--Widget Body-->
                    </div>
                    <div class="clear"></div>
                </div>
            </div><!--Widget Body-->
        </div><!--Widget-->
    </div>
</div>
<script>
    $(function(){
        $(function(){
            var zTreeObj,
                setting = {
                    view: {
                        selectedMulti: false
                    },
                    check: {
                        enable: true,
                        radioType: 'all',
                        chkStyle: "radio"
                    },
                    data: {
                        simpleData: {
                            enable: true
                        }
                    },
                    callback: {
                        onClick: function(e, treeId, treeNode){
                            zTreeObj.checkNode(treeNode, !treeNode.checked, null, true);
                            return false;
                        },
                        onCheck: function(e, treeId, treeNode){
                            var nodes = zTreeObj.getCheckedNodes(true);
                            if(nodes.length){
                                $('#p_name').val(nodes[0].name);
                                $('#p_id').val(nodes[0].id);
                            }
                        },
                        beforeAsync: function(e, treeId, treeNode){

                        }
                    }
                };
            var zNodes ={$categories|json_encode};
            zTreeObj = $.fn.zTree.init($("#tree"), setting, zNodes);

        });
        $('.btn-success').click(function(){
            $(document).find('form').submit();
        });
    });
</script>
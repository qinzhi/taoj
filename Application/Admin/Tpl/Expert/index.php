<layout name="Layout/col" />
<div class="row">
    <div class="col-lg-12 col-sm-12 col-xs-12">
        <div class="widget">
            <div class="widget-header bordered-bottom bordered-sky" style="padding: 15px 11px;">
                <div class="widget-caption">
                    <div class="form-inline" role="form" autocomplete="off">
                        <div class="form-group" style="margin-top: -4px;">
                            <a class="btn btn-success" id="import_member" href="/expert/add">添加专家</a>
                        </div>
                    </div>
                </div>
                <div class="pull-right">
                    <a class="btn btn-danger" id="del_member" href="javascript:void(0);">删除</a>
                </div>
                <div class="clearfix"></div>
            </div><!--Widget Header-->
            <div class="widget-body plugins_member-">
                <table class="table table-striped table-bordered table-hover">
                    <thead>
                    <tr>
                        <th style="width: 15%;">
                            姓名
                        </th>
                        <th style="width: 10%;">
                            微信昵称
                        </th>
                        <th style="width: 25%;">
                            简述
                        </th>
                        <th style="width: 20%;">
                            单位
                        </th>
                        <th style="width: 10%;">
                            排序
                        </th>
                        <th style="width: 20%;">
                            操作
                        </th>
                    </tr>
                    </thead>
                    <tbody>
                    <volist name="expert" id="vo">
                        <tr>
                            <td>
                                <img src="<?php echo C('ATTACH_DIR') . $vo['avator'];?>" style="height: 80px;width: 80px;float: left;border-radius: 50%;"/>
                                <p style="font-size: 16px;margin-left: 90px;">{$vo.name}</p>
                            </td>
                            <td>
                                {$vo.wx_name}
                            </td>
                            <td>
                                {$vo.intro}
                            </td>
                            <td>
                                {$vo.organ}
                            </td>
                            <td>
                                {$vo.sort}
                            </td>
                            <td>
                                <a class="btn btn-default btn-xs purple" href="/expert/edit?id={$vo.id}"><i class="fa fa-edit"></i> Edit</a>
                                <a class="btn btn-default btn-xs black btn-delete" href="javascript:;" data-node="{$vo.id}"><i class="fa fa-trash-o"></i> Delete</a>
                            </td>
                        </tr>
                    </volist>
                    </tbody>
                </table>
            </div><!--Widget Body-->
        </div><!--Widget-->
    </div>
</div>
<script>
    $(function(){
        $('.btn-delete').click(function(){
            var id = $(this).data('node');
            bootbox.confirm("是否删除?", function (result) {
                if (result) {
                    window.location.href = '/expert/delete?id=' + id;
                }
            });
        });
    });
</script>
<layout name="Layout/col" />
<div class="row">
    <div class="col-lg-12 col-sm-12 col-xs-12">
        <div class="widget">
            <div class="widget-header bordered-bottom bordered-sky" style="padding: 15px 11px;">
                <div class="widget-caption">
                    <div class="form-inline" role="form" autocomplete="off">
                        <div class="form-group" style="margin-top: -4px;">
                            <a class="btn btn-success" id="import_member" href="/banner/add">添加广告</a>
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
                            <th style="width: 20%;">
                                广告图
                            </th>
                            <th style="width: 30%;">
                                地址
                            </th>
                            <th style="width: 20%;">
                                简介
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
                        <volist name="banner" id="vo">
                            <tr>
                                <td>
                                    {$vo.name}
                                </td>
                                <td>
                                    {$vo.url}
                                </td>
                                <td>
                                    {$vo.intro}
                                </td>
                                <td>
                                    {$vo.sort}
                                </td>
                                <td>
                                    <a class="btn btn-default btn-xs purple" href="/banner/edit?id={$vo.id}"><i class="fa fa-edit"></i> Edit</a>
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
                    window.location.href = '/banner/delete?id=' + id;
                }
            });
        });
    });
</script>
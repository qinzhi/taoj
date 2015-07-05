<layout name="Layout/col" />
<div class="row">
    <div class="col-lg-12 col-sm-12 col-xs-12">
        <div class="widget">
            <div class="widget-header bordered-bottom bordered-sky" style="padding: 15px 11px;">
                <div class="widget-caption">
                    <div class="form-inline" role="form" autocomplete="off">
                        <div class="form-group" style="margin-top: -4px;">
                            <a class="btn btn-success" id="import_member" href="javascript:;">添加微信</a>
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
                        <th style="width: 80%;">
                            微信昵称
                        </th>
                        <th style="width: 20%;">
                            操作
                        </th>
                    </tr>
                    </thead>
                    <tbody>
                    <volist name="auth" id="vo">
                        <tr>
                            <td>
                                {$vo.wx_name}
                            </td>
                            <td>
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
                    window.location.href = '/auth/delete?id=' + id;
                }
            });
        });
        $("#import_member").on('click', function () {
            bootbox.prompt("添加微信昵称", function (result) {
                if (result !== null) {
                    var form = $('<form method="post"></form>');
                    form.append('<input name="wx_name" value="' + result + '"/>');
                    $('body').append(form);
                    form.submit();
                }
            });
        });
    });
</script>
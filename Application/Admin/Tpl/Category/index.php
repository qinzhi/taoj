<layout name="Layout/col" />
<div class="row">
    <div class="col-lg-12 col-sm-12 col-xs-12">
        <div class="widget">
            <div class="widget-header bordered-bottom bordered-sky" style="padding: 15px 11px;">
                <div class="widget-caption">
                    <div class="form-inline" role="form" autocomplete="off">
                        <div class="form-group" style="margin-top: -4px;">
                            <a class="btn btn-success" id="import_member" href="/category/add">添加分类</a>
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
                        <th style="width: 30%;">
                            分类名称
                        </th>
                        <th style="width: 40%;">
                            简述
                        </th>
                        <th style="width: 15%;">
                            排序
                        </th>
                        <th style="width: 15%;">
                            操作
                        </th>
                    </tr>
                    </thead>
                    <tbody>
                        <?php $show_category = function($category,$span,$count) use (&$show_category){
                            if(!empty($category) && is_array($category)):
                                $count++;
                                $symbol = $count > 2 ? "┗&nbsp;&nbsp;" : " ";
                                for($i=0,$len=count($category);$i<$len;$i++):
                                    $t_span = $span . '-'.$category[$i]['id'];
                                    if(!empty($category[$i]['child'])) $square = '<i class="fa fa-fw fa-minus-square-o switch"></i>';
                                    echo '<tr class="' . $t_span . '"> <td>' . $square . '<span class="tree-level' . ($count-1) . '">'. $symbol . '</span>'  . $category[$i]['name'] . '</td>
                                        <td>' . $category[$i]['intro'] . '</td>
                                        <td>' . $category[$i]['sort'] . '</td>
                                        <td class="caozuo">
                                            <a class="btn btn-default btn-xs purple" href="/category/edit?id=' . $category[$i]['id'] . '"><i class="fa fa-edit"></i> Edit</a>
                                            <a class="btn btn-default btn-xs black btn-delete" href="javascript:;" data-node="' . $category[$i]['id'] . '"><i class="fa fa-trash-o"></i> Delete</a>
                                        </td></tr>';
                                    if(!empty($category[$i]['child'])):
                                        $show_category($category[$i]['child'],$t_span,$count);
                                    endif;
                                    if($i==$len-1):
                                        echo '</ul>';
                                    endif;
                                endfor;
                            endif;
                        };$show_category($categories,'span',1);?>
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
                    window.location.href = '/category/delete?id=' + id;
                }
            });
        });
    });
</script>
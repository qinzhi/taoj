<layout name="Layout/col" />
<div class="row">
    <div class="col-lg-12 col-sm-12 col-xs-12">
        <div class="widget">
            <div class="widget-header bordered-bottom bordered-sky" style="padding: 15px 11px;">
                <div class="pull-right">
                    <a class="btn btn-danger" id="del_member" href="javascript:void(0);">删除</a>
                </div>
                <div class="clearfix"></div>
            </div><!--Widget Header-->
            <div class="widget-body plugins_member-">
                <select id="category" style="margin-bottom: 10px;" autocomplete="off">
                    <option value="">全部</option>
                    <volist name="categories" id="vo">
                        <option value="{$vo.id}" <?php if($_GET['cid'] == $vo['id'])echo 'selected'?>>{$vo.name}</option>
                    </volist>
                </select>
                <table class="table table-striped table-bordered table-hover">
                    <thead>
                        <tr>
                            <th style="width: 20%;">
                                标题
                            </th>
                            <th style="width: 30%;">
                                内容
                            </th>
                            <th style="width: 10%;">
                                分类
                            </th>
                            <th style="width: 10%;">
                                作者
                            </th>
                            <th style="width: 5%;">
                                阅读数
                            </th>
                            <th style="width: 10%;">
                                操作
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                    <volist name="appeal" id="vo">
                        <tr>
                            <td>
                                {$vo.title}
                            </td>
                            <td>
                                {$vo.content}
                            </td>
                            <td>
                                {$vo.c_name}
                            </td>
                            <td>
                                {$vo.author}
                            </td>
                            <td>
                                {$vo.read_num}
                            </td>
                            <td>
                                <!--<a class="btn btn-default btn-xs purple" href="/banner/edit?id={$vo.id}"><i class="fa fa-edit"></i> Edit</a>-->
                                <a class="btn btn-default btn-xs purple" href="/appeal/reply?id={$vo.id}" data-node="{$vo.id}"><i class="fa fa-eye"></i> 查看</a>
                                <a class="btn btn-default btn-xs black btn-delete" href="javascript:;" data-node="{$vo.id}"><i class="fa fa-trash-o"></i> 删除</a>
                            </td>
                        </tr>
                    </volist>
                    </tbody>
                </table>
                <?php if($page_num>1):?>
                    <div class="page">
                        <div class="dataTables_paginate paging_bootstrap" id="editabledatatable_paginate">
                            <ul class="pagination">
                                <li class="prev <?php if($page<=1)echo 'disabled';?>"><a href="<?php if($page>1)echo '/appeal?page=' . ($page - 1) . $params;else echo '#';?>">上一页</a></li>
                                <?php for($i=1;$i<=$page_num;$i++):?>
                                    <?php if($page == $i):?>
                                        <li class="active"><a href="#">{$i}</a></li>
                                    <?php else:?>
                                        <li><a href="/appeal?page={$i}{$params}">{$i}</a></li>
                                    <?php endif;?>
                                <?php endfor;?>
                                <li class="next <?php if($page>=$page_num)echo 'disabled';?>"><a href="<?php if($page<$page_num)echo '/appeal?page=' . ($page + 1) . $params;else echo '#';?>">下一页</a></li>
                            </ul>
                        </div>
                    </div>
                <?php endif;?>
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
                    window.location.href = '/appeal/delete?id=' + id;
                }
            });
        });
        $('#category').change(function(){
            var cid = $(this).val();
            if(cid){
                window.location.href = '/appeal?cid=' + cid;
            }else{
                window.location.href = '/appeal';
            }
        });
    });
</script>
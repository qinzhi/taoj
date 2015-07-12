<layout name="Layout/col" />
<div class="row">
    <div class="col-lg-12 col-sm-12 col-xs-12">
        <div class="widget">
            <div class="widget-header bordered-bottom bordered-sky" style="padding: 15px 11px;">
                <div class="pull-right">
                    <a class="btn btn-success" id="del_member" href="javascript:history.go(-1);">返回</a>
                </div>
                <div class="clearfix"></div>
            </div><!--Widget Header-->
            <div class="widget-body plugins_member-">
                <ul class="timeline">
                    <li class="timeline-node">
                        <a class="btn btn-palegreen"><?php echo date('m-d',$appeal['post_time']);?></a>
                    </li>
                    <li class="timeline-inverted">
                        <div class="timeline-datetime">
                                <span class="timeline-time">
                                    <?php echo date('Y-m-d H:i',$appeal['post_time']);?>
                                </span>
                        </div>
                        <div class="timeline-badge blue">
                            <i class="fa fa-tag"></i>
                        </div>
                        <div class="timeline-panel bordered-top-3 bordered-azure">
                            <div class="timeline-header bordered-bottom bordered-blue">
                                    <span class="timeline-title">
                                        {$appeal.title}
                                    </span>
                            </div>
                            <div class="timeline-body">
                                {$appeal.content}
                            </div>
                        </div>
                    </li>
                    <volist name="reply" id="vo">
                        <li>
                            <div class="timeline-datetime">
                                <span class="timeline-time">
                                    <?php echo date('Y-m-d H:i',$vo['post_time']);?>
                                </span>
                            </div>
                            <div class="timeline-badge red">
                                <i class="fa fa-map-marker"></i>
                            </div>
                            <div class="timeline-panel">
                                <div class="timeline-header bordered-bottom bordered-blue">
                                    <span class="timeline-title">
                                        {$vo.user}
                                    </span>
                                </div>
                                <div class="timeline-body">
                                    <p>{$vo.reply}</p>
                                </div>
                            </div>
                        </li>
                    </volist>
                </ul>
            </div><!--Widget Body-->
        </div><!--Widget-->
    </div>
</div>
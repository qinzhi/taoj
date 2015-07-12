<?php

// 显示分页
function page($url,$cur_page,$pageNums,$params = '',$cell = 3) {

    if($pageNums <= 1){
        return;
    }
    $start = ($cur_page > $cell) ? $cur_page - $cell : 1;
    $end = ($cur_page + $cell > $pageNums) ? $pageNums : $cur_page + $cell;

    $strData = "<div class='page'>";

    $strData .= "<div class='page-left'><a class='prev_page btn btn-page' href=" . $url . "?page=" .  ( $cur_page-1 ) . $params.">上一页</a></div>";

    // 2 步 打印页码
    $strData .= "<div class='page-center'><ul class='page-list btn-group'>";
    for($i = $start; $i <= $end; $i ++) {
        if ($i == $cur_page) {
            $strData .= "<li><a href=" .$url. "?page=" . $i . $params." class=\"current  btn btn-page\">" . $i . "</a></li>";
        } else {
            $strData .= "<li><a href=" .$url. "?page=" . $i . $params." class=\"btn btn-page\">" . $i . "</a></li>";
        }
    }
    $strData .= "</ul><div class='clear'></div></div>";

    $strData .= "<div class='page-right'><a class='next_page btn btn-page' href=" .$url. "?page=" . ( $cur_page+1 ) . $params.">下一页</a></div>";

    echo $strData.'</div>';
}
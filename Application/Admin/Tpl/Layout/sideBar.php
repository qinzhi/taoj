<ul class="nav sidebar-menu">
    <!--首页-->
    <li>
        <a href="index.html">
            <i class="menu-icon glyphicon glyphicon-home"></i>
            <span class="menu-text"> 首页 </span>
        </a>
    </li>

    <!--UI Elements-->
    <li <?php if($module==1)echo 'class="open active"';?>>
        <a href="#" class="menu-dropdown">
            <i class="menu-icon fa fa-desktop"></i>
            <span class="menu-text"> 广告管理 </span>
            <i class="menu-expand"></i>
        </a>
        <ul class="submenu">
            <li <?php if($module==2 && $method==1)echo 'class="active"';?>>
                <a href="/banner">
                    <span class="menu-text"> 广告列表 </span>
                </a>
            </li>
            <li <?php if($module==2 && $method==2)echo 'class="active"';?>>
                <a href="/banner/add">
                    <span class="menu-text"> 添加广告 </span>
                </a>
            </li>
        </ul>
    </li>

    <li <?php if($module==2)echo 'class="open active"';?>>
        <a href="#" class="menu-dropdown">
            <i class="menu-icon fa fa-desktop"></i>
            <span class="menu-text"> 分类管理 </span>
            <i class="menu-expand"></i>
        </a>
        <ul class="submenu">
            <li <?php if($module==2 && $method==1)echo 'class="active"';?>>
                <a href="/category">
                    <span class="menu-text"> 分类列表 </span>
                </a>
            </li>
            <li <?php if($module==2 && $method==2)echo 'class="active"';?>>
                <a href="/category/add">
                    <span class="menu-text"> 添加分类 </span>
                </a>
            </li>
        </ul>
    </li>

    <li <?php if($module==3)echo 'class="active"';?>>
        <a href="/auth">
            <i class="menu-icon fa fa-key"></i>
            <span class="menu-text">权限管理</span>
        </a>
    </li>

</ul>
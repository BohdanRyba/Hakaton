<?php
use components\Router;
use controllers\AppController;
$user = AppController::getCurrentUserInfo();
return '<aside class="main-sidebar">

    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">

        <!-- Sidebar user panel (optional) -->
        <div class="user-panel">
            <div class="pull-left image">
                <img src="' .  Router::$permalink . 'views/main/img/club_img/' .  $user['club_image'] . '" class="img-circle" alt="' .  $user['club_image'] . '">
            </div>
            <div class="pull-left info">
                <p>' . $user['club_shief'] . '</p>
                <!-- Status -->
            </div>
        </div>

        <!-- search form (Optional) -->
        <form action="#" method="get" class="sidebar-form">
            <div class="input-group">
                <input type="text" name="q" class="form-control" placeholder="Search...">
                <span class="input-group-btn">
                <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>
                </button>
              </span>
            </div>
        </form>
        <!-- /.search form -->

        <!-- Sidebar Menu -->
        <ul class="sidebar-menu">
            <li class="header">Menu</li>
            <!-- Optionally, you can add icons to the links -->
            <li class="active treeview">
                <a href="' .  Router::$permalink . 'admin/organizations/page/1">
                    <span>Организации</span>
                </a>
            </li>
            <li><a href="' .  Router::$permalink . 'admin/organizations/org_add">Добавить Организацию<span
                        class="pull-right-container"><i class="fa fa-plus"></i></span></a>
            </li>
            <li>
                <a href="' .  Router::$permalink . 'admin/dancing_groups/dance_list">
                    <span>Танцевальные группы</span>
                </a>
            </li>
            <li><a href="' .  Router::$permalink . 'admin/dancing_groups/add_dancing_groups">Добавить группу<span class="pull-right-container"><i class="fa fa-plus"></i></span></a>
            </li>
        </ul>
        <!-- /.sidebar-menu -->
    </section>
    <!-- /.sidebar -->
</aside>';
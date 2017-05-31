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
                <img src="' .  Router::$permalink . $user['club_image'] . '" class="img-circle" alt="' .  $user['club_image'] . '">
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
                <a href="' . Router::$permalink . 'admin/organizations/page/1">
                    <span>Организации</span>
                </a>
            </li>
            <li><a href="' . Router::$permalink . 'admin/organizations/org_add">Добавить Организацию<span
                        class="pull-right-container"><i class="fa fa-plus"></i></span></a>
            </li>
            <li>
                <a href="' . Router::$permalink . 'admin/dancing_groups/dance_list">
                    <span>Танцевальные группы</span>
                </a>
            </li>
            <li><a href="' . Router::$permalink . 'admin/dancing_groups/add_dancing_groups">Добавить группу<span class="pull-right-container"><i class="fa fa-plus"></i></span></a>
            </li>
            <li class="treeview">
                <a href="#"><i class="opt-eve ion ion-ios-gear-outline"></i> <span>Настройка Событий</span>
                    <span class="pull-right-container">
                            <i class="fa fa-angle-left pull-right"></i>
                        </span>
                </a>
                <ul class="treeview-menu">
                    <li class="treeview">
                        <a href="#"><i class="opt-eve ion ion-ios-people-outline"></i> <span>Заявки</span>
                            <span class="pull-right-container">
                                    <i class="fa fa-angle-left pull-right"></i>
                                </span>
                        </a>
                        <ul class="treeview-menu">
                            <li><a href="#">Хіп-Хоп</a></li>
                            <li><a href="#">Диско</a></li>
                            <li><a href="#">Данс-шоу</a></li>
                            <li><a href="#">Хаус</a></li>
                            <li><a href="#">Брейк Данс</a></li>
                        </ul>
                    </li>
                    <li><a href="' . Router::$permalink . 'admin/organizations/pick_categories_for_event/' . $_SESSION['event_id'] .'">Категории</a></li>
                    <li><a href="' . Router::$permalink . 'admin/organizations/picked_categories_for_event/' . $_SESSION['event_id'] .'">Выбранные категории</a></li>
                    <li><a href="' . Router::$permalink . 'admin/option_event/reg_part_for_event/' . $_SESSION['organization_id'] .'">Регистраця</a></li>
                    <li><a href="' . Router::$permalink . 'admin/organizations/create_dancing_departments/' . Router::$any_last_path_value . '">Отделения</a></li>
                    <li><a href="#">Програма</a></li>
                    <li><a href="#">Суддьи</a></li>
                </ul>
            </li>
        </ul>
        <!-- /.sidebar-menu -->
    </section>
    <!-- /.sidebar -->
</aside>';

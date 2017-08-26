<?php
use components\Router;
use controllers\AppController;

$user = AppController::getCurrentUserInfo();

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Выбор категорий для события</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.6 -->
    <link rel="stylesheet" href="<?= Router::$permalink ?>views/main/bootstrap/css/bootstrap.min.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="<?= Router::$permalink ?>views/main/css/AdminLTE.min.css">
    <!-- AdminLTE Skins. We have chosen the skin-blue for this starter
          page. However, you can choose any other skin. Make sure you
          apply the skin class to the body tag so the changes take effect.
    -->
    <link rel="stylesheet" href="<?= Router::$permalink ?>views/main/css/skins/skin-blue.min.css">
    <link rel="stylesheet" href="<?= Router::$permalink ?>views/main/plugins/pace/pace.min.css">
    <link rel="stylesheet" href="<?= Router::$permalink ?>views/main/css/fixis_admin_page.css">

    <?= AppController::getCustomStyles(Router::$uri)?>

    <script src="<?= Router::$permalink ?>views/main/js/less.min.js" type="text/javascript"></script>
</head>
<body class="hold-transition skin-blue sidebar-mini sidebar-collapse fixed">
<div class="wrapper">
    <!-- Main Header -->

    <header class="main-header">
        <!-- Logo -->
        <a href="<?= Router::$permalink . 'home'; ?>" class="logo">
            <!-- mini logo for sidebar mini 50x50 pixels -->
            <span class="logo-mini"><b>L</b>IV</span>
            <!-- logo for regular state and mobile devices -->
            <span class="logo-lg"><b>Liv</b>LEGEND</span>
        </a>

        <!-- Header Navbar -->
        <nav class="navbar navbar-static-top" role="navigation">
            <!-- Sidebar toggle button-->
            <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
                <span class="sr-only">Toggle navigation</span>
            </a>
            <!-- Navbar Right Menu -->
            <div class="navbar-custom-menu">
                <ul class="nav navbar-nav">
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">Меню <span class="caret"></span></a>
                        <ul class="dropdown-menu" role="menu">
                            <?= AppController::createNavContent(Router::$uri); ?>
                        </ul>
                    </li>
                    <!-- User Account Menu -->
                    <li class="dropdown user user-menu">
                        <!-- Menu Toggle Button -->
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                            <!-- The user image in the navbar-->
                            <img src="<?= Router::$permalink .  $user['club_image']?>" class="user-image" alt="User Image">
                            <!-- hidden-xs hides the username on small devices so only the image appears. -->
                            <span class="hidden-xs"><?=$user['club_shief']?></span>
                        </a>
                        <ul class="dropdown-menu">
                            <!-- The user image in the menu -->
                            <li class="user-header">
                                <img src="<?= Router::$permalink .  $user['club_image']?>" class="img-circle" alt="User Image">

                                <p>
                                    <?=$user['club_shief']?> - Глава клуба "<?=$user['club_name']?>"
                                    <small><?=$user['club_country']?>, <?=$user['club_city']?></small>
                                </p>
                            </li>
                            <!-- Menu Body -->
                            <li class="user-body">
                                <div class="row">
                                    <div class="col-xs-6 text-center">
                                        <a href="#"><?=$user['club_mail']?></a>
                                    </div>
                                    <div class="col-xs-6 text-center">
                                        <a href="#"><?=$user['club_number']?></a>
                                    </div>
                                </div>
                                <!-- /.row -->
                            </li>
                            <!-- Menu Footer-->
                            <li class="user-footer">
                                <div class="pull-left">
                                    <a href="<?= Router::$permalink . 'profile'; ?>" class="btn btn-default btn-flat">Профиль</a>
                                </div>
                                <div class="pull-right">
                                    <a href="<?= Router::$permalink . 'out'; ?>" class="btn btn-default btn-flat">Выход</a>
                                </div>
                            </li>
                        </ul>
                    </li>
                    <!-- Control Sidebar Toggle Button -->
                    <li>
                        <a href="#" data-toggle="control-sidebar"><i class="fa fa-gears"></i></a>
                    </li>
                </ul>
            </div>
        </nav>
    </header>
    <!-- Left side column. contains the logo and sidebar -->
    <aside class="main-sidebar">

        <!-- sidebar: style can be found in sidebar.less -->
        <section class="sidebar">

            <!-- Sidebar user panel (optional) -->
            <div class="user-panel">
                <div class="pull-left image">
                    <img src="<?= Router::$permalink .  $user['club_image']?>" class="img-circle" alt="User Image">
                </div>
                <div class="pull-left info">
                    <p><?=$user['club_shief']?></p>
                    <!-- Status -->
                </div>
            </div>

            <!-- Sidebar Menu -->
            <ul class="sidebar-menu">
                <li class="header">Меню</li>
                <!-- Optionally, you can add icons to the links -->
                <li>
                    <a href="<?= Router::$permalink; ?>admin/organizations/page/1">
                        <i class="fa fa-address-card" aria-hidden="true"></i>
                        <span>Организации</span>
                    </a>
                </li>
                <li>
                    <a href="<?= Router::$permalink; ?>admin/organizations/org_add">
                        <i class="fa fa-plus"></i>
                        <span>Добавить Организацию</span>
                    </a>
                </li>
                <li>
                    <a href="<?= Router::$permalink; ?>admin/dancing_groups/dance_list">
                        <i class="fa fa-users" aria-hidden="true"></i>
                        <span>Танцевальные групы</span>
                    </a>
                </li>
                <!--                <li>-->
                <!--                    <a href="#">-->
                <!--                        <i class="fa fa-pencil-square-o"></i>-->
                <!--                        <span>Редактировать группу</span>-->
                <!--                    </a>-->
                <!--                </li>-->
                <li>
                    <a href="<?= Router::$permalink; ?>admin/dancing_groups/add_dancing_groups">
                        <i class="fa fa-plus"></i>
                        <span>Добавить группу</span>
                    </a>
                </li>
                <li>
                <li class="treeview">
                    <a href="#"><i class="opt-eve ion ion-ios-gear-outline"></i> <span>Настройка Событий</span>
                        <span class="pull-right-container">
                            <i class="fa fa-angle-left pull-right"></i>
                        </span>
                    </a>
                    <ul class="treeview-menu">
                        <li class="treeview">
                            <a href="#">
                                <i class="opt-eve ion ion-ios-people-outline"></i>
                                <span>Заявки</span>
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

                        <li><a href="<?= Router::$permalink; ?>admin/organizations/pick_categories_for_event/<?= $_SESSION['event_id']; ?>">Категории</a></li>
                        <li><a href="<?= Router::$permalink; ?>admin/organizations/picked_categories_for_event/<?= $_SESSION['event_id']; ?>">Выбранные категории</a></li>
                        <li><a href="<?= Router::$permalink; ?>admin/option_event/reg_part_for_event/<?= $_SESSION['organization_id']; ?>">Регистраця</a></li>
                        <li><a href="<?= Router::$permalink; ?>admin/organizations/create_dancing_departments/<?= $_SESSION['event_id']; ?>">Отделения</a></li>
                        <li><a href="<?= Router::$permalink; ?>admin/organizations/event_program_print/<?= $_SESSION['event_id']; ?>">Программа для печати</a></li>
                        <li><a href="<?= Router::$permalink; ?>admin/organizations/event_program/<?= $_SESSION['event_id']; ?>">Программа и оценивание</a></li>
                        <li><a href="<?= Router::$permalink; ?>admin/organizations/judges/<?= $_SESSION['event_id']; ?>">Суддьи</a></li>
                    </ul>
                </li>
            </ul>
            <!-- /.sidebar-menu -->
        </section>
        <!-- /.sidebar -->
    </aside>
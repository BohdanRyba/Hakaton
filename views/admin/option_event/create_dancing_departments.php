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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="<?= Router::$permalink ?>views/main/css/AdminLTE.min.css">
    <!-- AdminLTE Skins. We have chosen the skin-blue for this starter
          page. However, you can choose any other skin. Make sure you
          apply the skin class to the body tag so the changes take effect.
    -->
    <link rel="stylesheet" href="<?= Router::$permalink ?>views/main/css/skins/skin-blue.min.css">
    <link rel="stylesheet" href="<?= Router::$permalink ?>views/main/css/fixis_admin_page.css">
    <link rel="stylesheet/less" type="text/less" href="<?= Router::$permalink ?>views/main/css/create_dancing_departments.less">
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <!--<script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>-->
    <!--<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>-->
    <![endif]-->
    <script src="<?= Router::$permalink ?>views/main/js/less.min.js" type="text/javascript"></script>
</head>
<body class="hold-transition skin-blue">
<div class="wrapper">
    <!-- Main Header -->


    <header class="main-header">
        <!-- Logo -->
        <a href="../index.php" class="logo">
            <!-- mini logo for sidebar mini 50x50 pixels -->
            <span class="logo-mini"><b>A</b>LT</span>
            <!-- logo for regular state and mobile devices -->
            <span class="logo-lg"><b>Admin</b>LTE</span>
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
                            <?php echo $nav_content; ?>
                        </ul>
                    </li>
                    <!-- User Account Menu -->
                    <li class="dropdown user user-menu">
                        <!-- Menu Toggle Button -->
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                            <!-- The user image in the navbar-->
                            <img src="dist/img/user2-160x160.jpg" class="user-image" alt="User Image">
                            <!-- hidden-xs hides the username on small devices so only the image appears. -->
                            <span class="hidden-xs">Alexander Pierce</span>
                        </a>
                        <ul class="dropdown-menu">
                            <!-- The user image in the menu -->
                            <li class="user-header">
                                <img src="dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">

                                <p>
                                    Alexander Pierce - Web Developer
                                    <small>Member since Nov. 2012</small>
                                </p>
                            </li>
                            <!-- Menu Body -->
                            <li class="user-body">
                                <div class="row">
                                    <div class="col-xs-4 text-center">
                                        <a href="#">Followers</a>
                                    </div>
                                    <div class="col-xs-4 text-center">
                                        <a href="#">Sales</a>
                                    </div>
                                    <div class="col-xs-4 text-center">
                                        <a href="#">Friends</a>
                                    </div>
                                </div>
                                <!-- /.row -->
                            </li>
                            <!-- Menu Footer-->
                            <li class="user-footer">
                                <div class="pull-left">
                                    <a href="#" class="btn btn-default btn-flat">Profile</a>
                                </div>
                                <div class="pull-right">
                                    <a href="#" class="btn btn-default btn-flat">Sign out</a>
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
                    <img src="dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">
                </div>
                <div class="pull-left info">
                    <p>Alexander Pierce</p>
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
                    <a href="#">
                        <span>Организации</span>
                    </a>
                    <ul class="treeview-menu">
                        <li><a href="<?= Router::$permalink ?>admin/organizations/page/1"> Список<span class="pull-right-container"><i
                                        class="fa fa-link"></i></span></a></li>
                        <li><a href="<?= Router::$permalink ?>admin/organizations/org_add">Добавить<span
                                    class="pull-right-container"><i class="fa fa-plus"></i></span></a>
                        </li>
                    </ul>

                </li>
                <li>
                    <a href="#">
                        <span>Танцевальные групы</span>
                    </a>
                    <ul class="treeview-menu">
                        <li><a href="<?= Router::$permalink ?>admin/dancing_groups/dance_list">Редактировать<span class="pull-right-container"><i class="fa fa-pencil-square-o"></i></span></a>
                        </li>
                        <li><a href="<?= Router::$permalink ?>admin/dancing_groups/add_dancing_groups">Добавить<span class="pull-right-container"><i class="fa fa-plus"></i></span></a>
                        </li>
                    </ul>
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
                        <li><a href="<?= Router::$permalink ?>admin/organizations/pick_categories_for_event/<?=Router::$any_last_path_value;?>">Категории</a></li>
                        <li><a href="<?= Router::$permalink ?>admin/option_event/reg_part_for_event/<?=$_SESSION['organization_id']?>">Регистраця</a></li>
                        <li><a href="<?= Router::$permalink ?>admin/organizations/create_dancing_departments/<?=Router::$any_last_path_value;?>">Отделения</a></li>
                        <li><a href="#">Програма</a></li>
                        <li><a href="#">Суддьи</a></li>
                    </ul>
                </li>
            </ul>
            <!-- /.sidebar-menu -->
        </section>
        <!-- /.sidebar -->
    </aside>


    <div class="content-wrapper">
        <section class="content-header"></section>
        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-xs-12 col-sm-10 col-sm-push-1">
                        <!-- Modals -->
                        <div id="confirmDepartmentDeletion" class="modal fade" role="dialog">
                            <div class="modal-dialog">
                                <!-- Modal content-->
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                                        <h4 class="modal-title">Подтверждение удаления</h4>
                                    </div>
                                    <form action="" method="POST">
                                        <div class="modal-body">
                                            <div class="form-group">
                                                <label for="pwd">Пароль подтверждения действия:</label>
                                                <input type="text" class="form-control" name="deletion-confirmation-password" id="pwd">
                                                <!--<input type="hidden" name="dancing-group-id" id="dancing-group-deletion-id">-->
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <input type="submit" class="btn btn-danger" name="deletion-confirmation-btn" value="Удалить!">
                                            <button type="button" class="btn btn-default" data-dismiss="modal">Отмена</button>
                                        </div>
                                    </form>
                                </div>

                            </div>
                        </div>
                        <div id="editDepartmentName" class="modal fade" role="dialog">
                            <div class="modal-dialog">
                                <!-- Modal content-->
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                                        <h4 class="modal-title">Изменение названия отделения</h4>
                                    </div>
                                    <form action="" method="POST">
                                        <div class="modal-body">
                                            <div class="form-group">
                                                <label for="newDepartmentName">Новое название:</label>
                                                <input type="text" class="form-control" name="new-Department-Name" id="newDepartmentName">
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <input type="submit" class="btn btn-success" name="new-department-name-confirmation-btn" value="Изменить">
                                            <button type="button" class="btn btn-default" data-dismiss="modal">Отмена</button>
                                        </div>
                                    </form>
                                </div>

                            </div>
                        </div>
                        <div id="createDepartment" class="modal fade" role="dialog">
                            <div class="modal-dialog">
                                <!-- Modal content-->
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                                        <h4 class="modal-title">Создание отделения</h4>
                                    </div>
                                    <form action="" method="POST">
                                        <div class="modal-body">
                                            <div class="form-group">
                                                <label for="newDepartment">Название отделения:</label>
                                                <input type="text" class="form-control" name="new-Department-Name" id="newDepartment">
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <input type="submit" class="btn btn-warning" name="new-department-name-confirmation-btn" value="Создать">
                                            <button type="button" class="btn btn-default" data-dismiss="modal">Отмена</button>
                                        </div>
                                    </form>
                                </div>

                            </div>
                        </div>
                        <div id="transferCategory" class="modal fade" role="dialog">
                            <div class="modal-dialog">
                                <!-- Modal content-->
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                                        <h4 class="modal-title">Перемещение категории</h4>
                                    </div>
                                    <form action="" method="POST">
                                        <div class="modal-body">
                                            <!--<div class="form-group">-->
                                            <!--<label for="newDepartment">Название отделения:</label>-->
                                            <!--<input type="text" class="form-control" name="new-Department-Name" id="newDepartment">-->
                                            <!--</div>-->
                                            <p>Переместить категорию из <span data-direction="from"></span> в <span data-direction="to"></span></p>
                                            <div class="dropdown">
                                                <button class="btn btn-primary dropdown-toggle text-bold flat" type="button" data-toggle="dropdown">Переместить в:
                                                    <span class="caret"></span></button>
                                                <ul class="dropdown-menu flat">
                                                    <li class="dropdown-menu-department prevent-text-emphasizing"><a href="#">department 1</a></li>
                                                    <li class="dropdown-menu-department prevent-text-emphasizing"><a href="#">department 2</a></li>
                                                    <li class="dropdown-menu-department prevent-text-emphasizing"><a href="#">department 3</a></li>
                                                </ul>
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <input type="submit" class="btn btn-success" name="transfer-category-btn" value="Переместить">
                                            <button type="button" class="btn btn-default" data-dismiss="modal">Отмена</button>
                                        </div>
                                    </form>
                                </div>

                            </div>
                        </div>

                        <div class="container box box-primary flat">
                            <!-- MENU-->
                            <div class="row dance-group-menu">
                                <div class="col-xs-12 col-sm-4">
                                    <div class="dance-group-menu-items">
                                        <a href="#departments_list" class="prevent-text-emphasizing text-center text-uppercase text-bold" id="menu-dance-programs">список</a>
                                    </div>
                                </div>
                                <div class="col-xs-12 col-sm-4">
                                    <div class="dance-group-menu-items">
                                        <a href="#departments_filling" class="prevent-text-emphasizing text-center text-uppercase text-bold" id="menu-age-categories">наполнение</a>
                                    </div>
                                </div>
                                <div class="col-xs-12 col-sm-4">
                                    <div class="dance-group-menu-items">
                                        <a href="#departments_content" class="prevent-text-emphasizing text-center text-uppercase text-bold" id="menu-nominations">содержание</a>
                                    </div>
                                </div>
                            </div>
                            <!--MAIN IFO BLOCK-->
                            <div class="row" id="main_info_wrapper">
                                <div id="departments_list">
                                    <div class="col-xs-12 col-lg-6">
                                        <div class="container box box-solid box-primary flat">
                                            <div class="row box-header">
                                                <h3 class="box-title text-uppercase">
                                                    <button type="button" id="create_new_department" data-toggle="modal" data-target="#createDepartment" class="btn btn-warning btn-flat"><i class="fa fa-plus"></i></button>
                                                    создать отделение
                                                </h3>
                                            </div>
                                            <div class="row">
                                                <div class="">
                                                    <ul class="dancing-department-list-wrapper">
                                                        <li data-id-dancing-group="6">
                                                            <div class="btn-group-xs button-wrapper">
                                                                <button type="button" class="show-info-about-dance-group btn btn-info btn-flat"><i class="fa fa-info"></i></button>
                                                                <button type="button" data-toggle="modal" data-target="#editDepartmentName" class="edit-info-about-department btn btn-success btn-flat"><i class="fa fa-edit"></i></button>
                                                                <button type="button" data-toggle="modal" data-target="#confirmDepartmentDeletion" class="delete-department btn btn-danger delete-button btn-flat"><i class="fa fa-trash"></i></button>
                                                            </div>
                                                            <p class="department-name">1 отделение</p>
                                                        </li>
                                                        <li data-id-dancing-group="6">
                                                            <div class="btn-group-xs button-wrapper">
                                                                <button type="button" class="show-info-about-dance-group btn btn-info btn-flat"><i class="fa fa-info"></i></button>
                                                                <button type="button" data-toggle="modal" data-target="#editDepartmentName" class="edit-info-about-department btn btn-success btn-flat"><i class="fa fa-edit"></i></button>
                                                                <button type="button" data-toggle="modal" data-target="#confirmDepartmentDeletion" class="delete-department btn btn-danger delete-button btn-flat"><i class="fa fa-trash"></i></button>
                                                            </div>
                                                            <p class="department-name">2 отделение</p>
                                                        </li>
                                                        <li data-id-dancing-group="6">
                                                            <div class="btn-group-xs button-wrapper">
                                                                <button type="button" class="show-info-about-dance-group btn btn-info btn-flat"><i class="fa fa-info"></i></button>
                                                                <button type="button" data-toggle="modal" data-target="#editDepartmentName" class="edit-info-about-department btn btn-success btn-flat"><i class="fa fa-edit"></i></button>
                                                                <button type="button" data-toggle="modal" data-target="#confirmDepartmentDeletion" class="delete-department btn btn-danger delete-button btn-flat"><i class="fa fa-trash"></i></button>
                                                            </div>
                                                            <p class="department-name">3 отделение</p>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div id="departments_filling">
                                    <div class="panel panel-primary flat">
                                        <div class="panel-heading flat">
                                            <div class="dropdown">
                                                <button class="btn btn-warning dropdown-toggle text-bold flat" type="button" data-toggle="dropdown">Отделение для наполнения
                                                    <span class="caret"></span></button>
                                                <ul class="dropdown-menu flat">
                                                    <li class="dropdown-menu-department prevent-text-emphasizing"><a href="#">department 1</a></li>
                                                    <li class="dropdown-menu-department prevent-text-emphasizing"><a href="#">department 2</a></li>
                                                    <li class="dropdown-menu-department prevent-text-emphasizing"><a href="#">department 3

                                                        </a></li>
                                                </ul>
                                            </div>
                                        </div>
                                        <div id="departments-filling-panel-body" class="panel-body">
                                            <div id="dance-group-info-wrapper">
                                                <div id="dance-group-parameters-list" class="col-xs-12 col-md-4 col-lg-3">
                                                    <div class="container-fluid">
                                                        <div class="row">
                                                            <div class="col-xs-12">
                                                                <div class="row pick-dancing-groups-parameters-wrapper">
                                                                    <p id="see-department-name" class="text-bold text-center"></p>
                                                                    <ul id="dance-program-to-pick-categories">
                                                                        <li class="prevent-text-emphasizing dance-program-name" data-name="111"><span class="numeration"></span>department 1</li>
                                                                        <li class="prevent-text-emphasizing dance-program-name" data-name="111"><span class="numeration"></span>department 2</li>
                                                                        <li class="prevent-text-emphasizing dance-program-name" data-name="111"><span class="numeration"></span>department 3</li>
                                                                    </ul>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div id="categories-list" class="col-xs-12 col-md-8 col-lg-9">
                                                    <div class="container-fluid">
                                                        <div class="row">
                                                            <div class="col-xs-12">
                                                                <div class="form-group prevent-text-emphasizing">
                                                                    <label for="departments-search-category">название категории:</label>
                                                                    <input type="text" class="form-control" id="departments-search-category">
                                                                </div>
                                                            </div>
                                                            <div class="col-xs-12">
                                                                <form id="pick-dancing-categories-for-department">
                                                                    <ul>
                                                                        <li id="check-all-dancing-categories" class="prevent-text-emphasizing"><label><input class="text-capitalize" type="checkbox">выбрать все</label></li>
                                                                        <li class="prevent-text-emphasizing pick-dancing-categories-for-department"><label><input type="checkbox" name="15">B&amp;B Дорослі Краща техніка виконання Профі</label></li>
                                                                        <li class="prevent-text-emphasizing pick-dancing-categories-for-department"><label><input type="checkbox" name="15">B&amp;B Дорослі Краща техніка виконання Профі</label></li>
                                                                        <li class="prevent-text-emphasizing pick-dancing-categories-for-department"><label><input type="checkbox" name="15">B&amp;B Дорослі Краща техніка виконання Профі</label></li>
                                                                        <li class="prevent-text-emphasizing pick-dancing-categories-for-department"><label><input type="checkbox" name="15">B&amp;B Дорослі Краща техніка виконання Профі</label></li>
                                                                    </ul>
                                                                </form>
                                                                <span id="update-dancing-department-info" class="prevent-text-emphasizing send-info">сохранить</span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div id="departments_content">
                                    <div class="panel panel-primary flat">
                                        <div class="panel-heading flat">
                                            <div class="dropdown">
                                                <button class="btn btn-warning dropdown-toggle text-bold flat" type="button" data-toggle="dropdown">Отделение для просмотра
                                                    <span class="caret"></span></button>
                                                <ul class="dropdown-menu flat">
                                                    <li class="dropdown-menu-department-content prevent-text-emphasizing"><a href="#">department 1</a></li>
                                                    <li class="dropdown-menu-department-content prevent-text-emphasizing"><a href="#">department 2</a></li>
                                                    <li class="dropdown-menu-department-content prevent-text-emphasizing"><a href="#">department 3</a></li>
                                                </ul>
                                            </div>
                                        </div>
                                        <div id="departments-edition-panel-body" class="panel-body">
                                            <div id="department-content" class="col-xs-12">
                                                <div class="container-fluid">
                                                    <div class="row">
                                                        <div class="col-xs-12">
                                                            <p id="see-department-content-name" class="text-bold text-center"></p>
                                                            <div class="form-group prevent-text-emphasizing">
                                                                <label for="search-category-in-department">название категории:</label>
                                                                <input type="text" class="form-control" id="search-category-in-department">
                                                            </div>
                                                        </div>
                                                        <div class="col-xs-12">
                                                            <form class="dance-group-show-info" id="department-categories-list">
                                                                <div class="dp-info-wrapper">
                                                                    <div class="prevent-text-emphasizing btn-group-sm flat" role="group">
                                                                        <button type="button" class="btn btn-success edit-created-category-info edit-button btn-flat"><i class="fa fa-exchange"></i></button>
                                                                        <button type="button" class="btn btn-danger delete-created-categories-info delete-button btn-flat"><i class="fa fa-trash"></i></button>
                                                                    </div>
                                                                    <p class="dance-category-name prevent-text-emphasizing text-bold">Хіп Дорослі Кращий виспут за думкою глядачів Початківці</p>
                                                                </div>
                                                                <div class="dp-info-wrapper">
                                                                    <div class="prevent-text-emphasizing btn-group-sm flat" role="group">
                                                                        <button type="button" class="btn btn-success edit-created-category-info edit-button btn-flat"><i class="fa fa-exchange"></i></button>
                                                                        <button type="button" class="btn btn-danger delete-created-categories-info delete-button btn-flat"><i class="fa fa-trash"></i></button>
                                                                    </div>
                                                                    <p class="dance-category-name prevent-text-emphasizing text-bold">Хіп Дорослі Кращий виспут за думкою глядачів Початківці</p>
                                                                </div>
                                                            </form>
                                                            <span id="update-dancing-department-categories-list" class="prevent-text-emphasizing send-info">сохранить</span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->


    <!-- Control Sidebar -->
    <aside class="control-sidebar control-sidebar-dark">
        <!-- Create the tabs -->
        <ul class="nav nav-tabs nav-justified control-sidebar-tabs">
            <li class="active"><a href="#control-sidebar-home-tab" data-toggle="tab"><i class="fa fa-home"></i></a></li>
            <li><a href="#control-sidebar-settings-tab" data-toggle="tab"><i class="fa fa-gears"></i></a></li>
        </ul>
        <!-- Tab panes -->
        <div class="tab-content">
            <!-- Home tab content -->
            <div class="tab-pane active" id="control-sidebar-home-tab">
                <h3 class="control-sidebar-heading">Recent Activity</h3>
                <ul class="control-sidebar-menu">
                    <li>
                        <a href="javascript:;">
                            <i class="menu-icon fa fa-birthday-cake bg-red"></i>

                            <div class="menu-info">
                                <h4 class="control-sidebar-subheading">Langdon's Birthday</h4>

                                <p>Will be 23 on April 24th</p>
                            </div>
                        </a>
                    </li>
                </ul>
                <!-- /.control-sidebar-menu -->

                <h3 class="control-sidebar-heading">Tasks Progress</h3>
                <ul class="control-sidebar-menu">
                    <li>
                        <a href="javascript:;">
                            <h4 class="control-sidebar-subheading">
                                Custom Template Design
                                <span class="pull-right-container">
                  <span class="label label-danger pull-right">70%</span>
                </span>
                            </h4>

                            <div class="progress progress-xxs">
                                <div class="progress-bar progress-bar-danger" style="width: 70%"></div>
                            </div>
                        </a>
                    </li>
                </ul>
                <!-- /.control-sidebar-menu -->

            </div>
            <!-- /.tab-pane -->
            <!-- Stats tab content -->
            <div class="tab-pane" id="control-sidebar-stats-tab">Stats Tab Content</div>
            <!-- /.tab-pane -->
            <!-- Settings tab content -->
            <div class="tab-pane" id="control-sidebar-settings-tab">
                <form method="post">
                    <h3 class="control-sidebar-heading">General Settings</h3>

                    <div class="form-group">
                        <label class="control-sidebar-subheading">
                            Report panel usage
                            <input type="checkbox" class="pull-right" checked>
                        </label>

                        <p>
                            Some information about this general settings option
                        </p>
                    </div>
                    <!-- /.form-group -->
                </form>
            </div>
            <!-- /.tab-pane -->
        </div>
    </aside>
    <!-- /.control-sidebar -->
    <!-- Add the sidebar's background. This div must be placed
         immediately after the control sidebar -->
    <div class="control-sidebar-bg"></div>
</div>
<!-- ./wrapper -->

<!-- REQUIRED JS SCRIPTS -->

<!-- jQuery 2.2.3 -->
<script src="<?= Router::$permalink ?>views/main/plugins/jQuery/jquery-2.2.3.min.js"></script>
<!-- Bootstrap 3.3.6 -->
<script src="<?= Router::$permalink ?>views/main/bootstrap/js/bootstrap.min.js"></script>
<!-- AdminLTE App -->
<script src="<?= Router::$permalink ?>views/main/js/app.min.js"></script>
<script src="<?= Router::$permalink ?>views/main/js/create_dancing_departments.js?<?php echo date("Y-m-d_H:i:s"); ?>"></script>
</body>
</html>
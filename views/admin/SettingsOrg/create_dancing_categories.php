<?php //self::showArray($category_parameters); ?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>MyAdminPg</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.6 -->
    <link rel="stylesheet" href="<?=Router::$permalink?>views/main/bootstrap/css/bootstrap.min.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="<?=Router::$permalink?>views/main/css/AdminLTE.min.css">
    <!-- AdminLTE Skins. We have chosen the skin-blue for this starter
          page. However, you can choose any other skin. Make sure you
          apply the skin class to the body tag so the changes take effect.
    -->
    <link rel="stylesheet" href="<?=Router::$permalink?>views/main/css/skins/skin-blue.min.css">
    <link rel="stylesheet" href="<?=Router::$permalink?>views/main/css/fixis_admin_page.css">
    <link rel="stylesheet/less" type="text/less" href="<?=Router::$permalink?>views/main/css/create_dancing_categories.less">
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <!--<script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>-->
    <!--<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>-->
    <!--[endif]-->
    <script src="<?=Router::$permalink?>views/main/js/less.min.js" type="text/javascript"></script>
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
                            <li><a href="#">Главная</a></li>
                            <li><a href="#">События</a></li>
                            <li><a href="#">Новости</a></li>
                            <li><a href="#">О нас</a></li>
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
                <li class="header">HEADER</li>
                <!-- Optionally, you can add icons to the links -->
                <li class="active treeview">
                    <a href="#">
                        <span>Организации</span>
                    </a>
                    <ul class="treeview-menu">
                        <li><a href="#">Добавить<span class="pull-right-container"><i class="fa fa-plus"></i></span></a></li>
                    </ul>

                </li>
                <li>
                    <a href="#">
                        <span>Танцевальные групы</span>
                    </a>
                    <ul class="treeview-menu">
                        <li><a href="#">Добавить<span class="pull-right-container"><i class="fa fa-plus"></i></span></a></li>
                    </ul>
                </li>
                <li class="treeview">
                    <a href="#">
                        <span>Multilevel</span>
                        <span class="pull-right-container"><i class="fa fa-angle-left pull-right"></i></span>
                    </a>
                    <ul class="treeview-menu">
                        <li><a href="#">Link in level 2</a></li>
                        <li><a href="#">Link in level 2</a></li>
                    </ul>
                </li>
            </ul>
            <!-- /.sidebar-menu -->
        </section>
        <!-- /.sidebar -->
    </aside>

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <section class="content-header"></section>
        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-xs-10">

                        <div class="container box box-solid box-primary flat">
                            <div class="row pick-dancing-groups-parameters-wrapper">
                                    <div class="col-xs-12 col-sm-6">
                                        <ul id="pick-dancing-group-to-use-wrapper">
                                            <?php foreach ($category_parameters as $value): ?>
                                            <li data-id-dancing-group="<?=$value['id_dance_group']?>" class="pick-dancing-group-to-use"><?=$value['dance_group_name']?></li>
                                            <?php endforeach; ?>
                                        </ul>
                                    </div>
                            </div>
                            <div id="total-wrapper-for-info">
                                <div class="row dance-group-menu">
                                    <div class="col-xs-6 col-sm-3">
                                        <div class="dance-group-menu-items">
                                            <a href="#dance-programs" class="text-center text-bold" id="menu-dance-programs">танцевальная<br>программа</a>
                                        </div>
                                    </div>
                                    <div class="col-xs-6 col-sm-3">
                                        <div class="dance-group-menu-items">
                                            <a href="#age-categories" class="text-center text-bold" id="menu-age-categories">возрастная<br>категория</a>
                                        </div>
                                    </div>
                                    <div class="col-xs-6 col-sm-3">
                                        <div class="dance-group-menu-items">
                                            <a href="#nominations" class="text-center text-bold" id="menu-nominations">номинация<br>выступления</a>
                                        </div>
                                    </div>
                                    <div class="col-xs-6 col-sm-3">
                                        <div class="dance-group-menu-items">
                                            <a href="#leagues" class="text-center text-bold" id="menu-leagues">лига<br>уровень выступления</a>
                                        </div>
                                    </div>
                                </div>

                                <div id="dance-group-info-wrapper">
                                    <div class="row">

                                        <div id="dance-group-parameters-list" class="col-xs-12 col-md-4 col-lg-3">
                                            <div class="container-fluid">
                                                <div class="row">
                                                    <div class="col-xs-12">
                                                        <div id="example1_filter" class="dataTables_filter">
                                                            <label>Искать по названию:<input type="search" class="form-control input-sm" placeholder="" aria-controls="example1"></label>
                                                        </div>
                                                    </div>
                                                    <div class="col-xs-12">
                                                        <div class="row pick-dancing-groups-parameters-wrapper">
                                                            <ul id="pick-dancing-group-parameter-to-see">
                                                                <li class="dancing-group-list-item picked-dancing-group" data-id-dancing-group=""><span class="numeration"></span>dancing group #1</li>
                                                                <li class="dancing-group-list-item"><span class="numeration"></span>dancing group #2</li>
                                                                <li class="dancing-group-list-item"><span class="numeration"></span>dancing group #3</li>
                                                                <li class="dancing-group-list-item"><span class="numeration"></span>dancing group #1</li>
                                                                <li class="dancing-group-list-item"><span class="numeration"></span>dancing group #2</li>
                                                                <li class="dancing-group-list-item"><span class="numeration"></span>dancing group #3</li>
                                                                <li class="dancing-group-list-item"><span class="numeration"></span>dancing group #1</li>
                                                                <li class="dancing-group-list-item"><span class="numeration"></span>dancing group #2</li>
                                                                <li class="dancing-group-list-item"><span class="numeration"></span>dancing group #3</li>
                                                                <li class="dancing-group-list-item"><span class="numeration"></span>dancing group #1</li>
                                                                <li class="dancing-group-list-item"><span class="numeration"></span>dancing group #2</li>
                                                                <li class="dancing-group-list-item"><span class="numeration"></span>dancing group #3</li>
                                                                <li class="dancing-group-list-item"><span class="numeration"></span>dancing group #1</li>
                                                                <li class="dancing-group-list-item"><span class="numeration"></span>dancing group #2</li>
                                                                <li class="dancing-group-list-item"><span class="numeration"></span>dancing group #3</li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div id="categories-list" class="col-xs-12 col-md-8 col-lg-9">
                                            <div class="container-fluid">
                                                <a id="update-dancing-categories-info" href="" class="send-info">сохранить</a>
                                                <form id="show-searched-dancing-groups" class="dance-group-show-info">
                                                    <div class="dp-info-wrapper">
                                                        <div class="btn-group-sm flat" role="group">
                                                            <button type="button" class="btn btn-success edit-button btn-flat"><i class="fa fa-edit"></i></button>
                                                            <button type="button" class="btn btn-danger delete-button btn-flat"><i class="fa fa-trash"></i></button>
                                                        </div>
                                                        <p class="dance-category-name">Название танц категории</p>
                                                        <label>Код:<input disabled type="text" name="dance-program-code" class="input-standard dancing-group-info-code"></label>
                                                    </div>
                                                    <div class="dp-info-wrapper">
                                                        <div class="btn-group-sm flat" role="group">
                                                            <button type="button" class="btn btn-success edit-button btn-flat"><i class="fa fa-edit"></i></button>
                                                            <button type="button" class="btn btn-danger delete-button btn-flat"><i class="fa fa-trash"></i></button>
                                                        </div>
                                                        <p class="dance-category-name">Название танц категории</p>
                                                        <label>Код:<input disabled type="text" name="dance-program-code" class="input-standard dancing-group-info-code"></label>
                                                    </div>
                                                    <div class="dp-info-wrapper">
                                                        <div class="btn-group-sm flat" role="group">
                                                            <button type="button" class="btn btn-success edit-button btn-flat"><i class="fa fa-edit"></i></button>
                                                            <button type="button" class="btn btn-danger delete-button btn-flat"><i class="fa fa-trash"></i></button>
                                                        </div>
                                                        <p class="dance-category-name">Название танц категории</p>
                                                        <label>Код:<input disabled type="text" name="dance-program-code" class="input-standard dancing-group-info-code"></label>
                                                    </div>
                                                    <div class="dp-info-wrapper">
                                                        <div class="btn-group-sm flat" role="group">
                                                            <button type="button" class="btn btn-success edit-button btn-flat edit-categories-info"><i class="fa fa-edit"></i></button>
                                                            <button type="button" class="btn btn-danger delete-button btn-flat delete-categories-info"><i class="fa fa-trash"></i></button>
                                                        </div>
                                                        <p class="dance-category-name">Название танц категории</p>
                                                        <label>Код:<input disabled type="text" name="dance-program-code" class="input-standard dancing-group-info-code"></label>
                                                    </div>
                                                    <div class="dp-info-wrapper">
                                                        <div class="btn-group-sm flat" role="group">
                                                            <button type="button" class="btn btn-success edit-button btn-flat"><i class="fa fa-edit"></i></button>
                                                            <button type="button" class="btn btn-danger delete-button btn-flat"><i class="fa fa-trash"></i></button>
                                                        </div>
                                                        <p class="dance-category-name">Название танц категории</p>
                                                        <label>Код:<input disabled type="text" name="dance-program-code" class="input-standard dancing-group-info-code"></label>
                                                    </div>
                                                    <div class="dp-info-wrapper">
                                                        <div class="btn-group-sm flat" role="group">
                                                            <button type="button" class="btn btn-success edit-button btn-flat"><i class="fa fa-edit"></i></button>
                                                            <button type="button" class="btn btn-danger delete-button btn-flat"><i class="fa fa-trash"></i></button>
                                                        </div>
                                                        <p class="dance-category-name">Название танц категории</p>
                                                        <label>Код:<input disabled type="text" name="dance-program-code" class="input-standard dancing-group-info-code"></label>
                                                    </div>
                                                    <div class="dp-info-wrapper">
                                                        <div class="btn-group-sm flat" role="group">
                                                            <button type="button" class="btn btn-success edit-button btn-flat"><i class="fa fa-edit"></i></button>
                                                            <button type="button" class="btn btn-danger delete-button btn-flat"><i class="fa fa-trash"></i></button>
                                                        </div>
                                                        <p class="dance-category-name">Название танц категории</p>
                                                        <label>Код:<input disabled type="text" name="dance-program-code" class="input-standard dancing-group-info-code"></label>
                                                    </div>
                                                    <div class="dp-info-wrapper">
                                                        <div class="btn-group-sm flat" role="group">
                                                            <button type="button" class="btn btn-success edit-button btn-flat"><i class="fa fa-edit"></i></button>
                                                            <button type="button" class="btn btn-danger delete-button btn-flat"><i class="fa fa-trash"></i></button>
                                                        </div>
                                                        <p class="dance-category-name">Название танц категории</p>
                                                        <label>Код:<input disabled type="text" name="dance-program-code" class="input-standard dancing-group-info-code"></label>
                                                    </div>
                                                    <div class="dp-info-wrapper">
                                                        <div class="btn-group-sm flat" role="group">
                                                            <button type="button" class="btn btn-success edit-button btn-flat"><i class="fa fa-edit"></i></button>
                                                            <button type="button" class="btn btn-danger delete-button btn-flat"><i class="fa fa-trash"></i></button>
                                                        </div>
                                                        <p class="dance-category-name">Название танц категории</p>
                                                        <label>Код:<input disabled type="text" name="dance-program-code" class="input-standard dancing-group-info-code"></label>
                                                    </div>
                                                </form>

                                            </div>
                                        </div>

                                    </div>
                                </div>

                                <div id="create-dance-categories" class="col-xs-12">
                                    <div class="row pick-dancing-group-parameters-wrapper">
                                        <div class="col-xs-12 col-sm-6 col-md-3">
                                            <form id="pick-dance-programs">
                                                <ul>
                                                    <li class="dancing-group-parameter-name text-capitalize text-bold text-center">программы</li>
                                                    <li class="pick-dance-program-for-category"><label><input type="checkbox" name="хіп-хоп">хіп-хоп</label></li>
                                                    <li class="pick-dance-program-for-category"><label><input type="checkbox" name="хаус">хаус</label></li>
                                                    <li class="pick-dance-program-for-category"><label><input type="checkbox" name="танец живота">танец живота</label></li>
                                                    <li class="pick-dance-program-for-category"><label><input type="checkbox" name="брейк">брейк</label></li>
                                                    <li class="pick-dance-program-for-category"><label><input type="checkbox" name="вальс">вальс</label></li>
                                                </ul>
                                            </form>
                                        </div>
                                        <div class="col-xs-12 col-sm-6 col-md-3">
                                            <form id="pick-age-categories">
                                                <ul>
                                                    <li class="dancing-group-parameter-name text-capitalize text-bold text-center">возрастные категории</li>
                                                    <li class="pick-age-category-for-category"><label><input type="checkbox" name="от 1 до 5">от 1 до 5</label></li>
                                                    <li class="pick-age-category-for-category"><label><input type="checkbox" name="от 5 до 10">от 5 до 10</label></li>
                                                    <li class="pick-age-category-for-category"><label><input type="checkbox" name="от 10 до 15">от 10 до 15</label></li>
                                                    <li class="pick-age-category-for-category"><label><input type="checkbox" name="от 15 до 20">от 15 до 20</label></li>
                                                    <li class="pick-age-category-for-category"><label><input type="checkbox" name="от 20 до 25">от 20 до 25</label></li>
                                                </ul>
                                            </form>
                                        </div>
                                        <div class="col-xs-12 col-sm-6 col-md-3">
                                            <form id="pick-nominations">
                                                <ul>
                                                    <li class="dancing-group-parameter-name text-capitalize text-bold text-center">номинации</li>
                                                    <li class="pick-nominations-for-category"><label><input type="checkbox" name="номинация 1">номинация 1</label></li>
                                                    <li class="pick-nominations-for-category"><label><input type="checkbox" name="номинация 2">номинация 2</label></li>
                                                    <li class="pick-nominations-for-category"><label><input type="checkbox" name="номинация 3">номинация 3</label></li>
                                                    <li class="pick-nominations-for-category"><label><input type="checkbox" name="номинация 4">номинация 4</label></li>
                                                    <li class="pick-nominations-for-category"><label><input type="checkbox" name="номинация 5">номинация 5</label></li>
                                                </ul>
                                            </form>
                                        </div>
                                        <div class="col-xs-12 col-sm-6 col-md-3">
                                            <form id="pick-leagues">
                                                <ul>
                                                    <li class="dancing-group-parameter-name text-capitalize text-bold text-center">лиги</li>
                                                    <li class="check-all-leagues"><label><input type="checkbox">выбрать всё</label></li>
                                                    <li class="pick-leagues-for-categories"><label><input type="checkbox" name="лига 1">лига 1</label></li>
                                                    <li class="pick-leagues-for-categories"><label><input type="checkbox" name="лига 2">лига 2</label></li>
                                                    <li class="pick-leagues-for-categories"><label><input type="checkbox" name="лига 3">лига 3</label></li>
                                                    <li class="pick-leagues-for-categories"><label><input type="checkbox" name="лига 4">лига 4</label></li>
                                                    <li class="pick-leagues-for-categories"><label><input type="checkbox" name="лига 5">лига 5</label></li>
                                                </ul>
                                            </form>
                                        </div>
                                        <div class="col-xs-12">
                                            <a href="#" id="btn-create-dance-categories" class="send-info">добавить</a>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-xs-12" id="show-created-dance-categories">

                                    <div class="row">
                                        <div class="col-xs-12">
                                            <form id="show-created-categories" class="dance-group-show-info margin-bot">

                                            </form>
                                        </div>
                                        <div class="col-xs-12">
                                            <a href="#" id="save-dance-categories" class="send-info">сохранить</a>
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
<script src="<?=Router::$permalink?>views/main/plugins/jQuery/jquery-2.2.3.min.js"></script>
<!--<script type="text/javascript" src="--><?//=Router::$permalink?><!--views/main/plugins/panescroll/jquery.mousewheel.js"></script>-->
<!--<script type="text/javascript" src="--><?//=Router::$permalink?><!--views/main/plugins/panescroll/jquery.jscrollpane.min.js"></script>-->
<!-- Bootstrap 3.3.6 -->
<script src="<?=Router::$permalink?>views/main/bootstrap/js/bootstrap.min.js"></script>
<!-- AdminLTE App -->
<script src="<?=Router::$permalink?>views/main/js/app.min.js"></script>

<script src="<?=Router::$permalink?>views/main/js/create_dancing_categories.js"></script>
</body>
</html>


<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Организация <?php echo $current_org_name['org_name']; ?></title>
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
    <link rel="stylesheet" type="text/css" href="<?= Router::$permalink ?>views/main/css/style.css">
    <link rel="stylesheet" href="<?= Router::$permalink ?>views/main/css/fixis_admin_page.css">
    <script src="<?= Router::$permalink ?>views/main/js/jquery.min.js"></script>

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
    <link rel="stylesheet/less" type="text/less"
          href="<?= Router::$permalink ?>views/main/css/add_dancing_categories.less?11">
    <link rel="stylesheet/less" type="text/less"
          href="<?= Router::$permalink ?>views/main/css/create_dancing_categories.less?34">
    <script src="<?= Router::$permalink ?>views/main/js/less.min.js?12" type="text/javascript"></script>
</head>
<!--
BODY TAG OPTIONS:
=================
Apply one or more of the following classes to get the
desired effect
|---------------------------------------------------------|
| SKINS         | skin-blue                               |
|               | skin-black                              |
|               | skin-purple                             |
|               | skin-yellow                             |
|               | skin-red                                |
|               | skin-green                              |
|---------------------------------------------------------|
|LAYOUT OPTIONS | fixed                                   |
|               | layout-boxed                            |
|               | layout-top-nav                          |
|               | sidebar-collapse                        |
|               | sidebar-mini                            |
|---------------------------------------------------------|
-->
<body class="hold-transition skin-blue sidebar-mini" >
<div class="wrapper">
    <!-- Main Header -->


    <header class="main-header">
        <!-- Logo -->
        <a href="index2.html" class="logo">
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
                          <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i
                                  class="fa fa-search"></i>
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
            </ul>
            <!-- /.sidebar-menu -->
        </section>
        <!-- /.sidebar -->
    </aside>

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <section class="content-header"></section>
        <section class="content">
            <div class="content_box col-md-10">
                <div class="box box-info">
                    <div class="box-header with-border">
                        <h2 class="box-title col-sm-4">организация <?php if (!empty($current_org_name['org_name'])) {
                                echo $current_org_name['org_name'];
                            } ?> </h2>
                        <li>
                            <span class="button-reg glyphicon glyphicon-pencil"></span>
                        </li>
                    </div>

                    <div class="cont-box clear">
                        <div class="button-box clr">
                            <ul class="button-org-add clr">
                                <li data-type="event" class="button-list event_data_list"><span>События</span></li>
                                <li class="btn-plus btn-plus-event"><span class="glyphicon glyphicon-plus"></span></li>
                            </ul>
                        </div>

                        <div class="button-box clr">
                            <ul class="button-org-add clr">
                                <li data-type="category" class="button-list category_data_list"><span>Категории</span>
                                </li>
                                <li class="btn-plus btn-plus-category"><span class="glyphicon glyphicon-plus">  </span>
                                </li>
                            </ul>
                        </div>

                        <div class="button-box clr">
                            <ul class="button-org-add clr">
                                <li data-type="club" class="button-list club_data_list"><span>Клубы</span></li>
                                <li class="btn-plus btn-plus-club"><span class="glyphicon glyphicon-plus"></span></li>
                            </ul>
                        </div>
                    </div>
                    <div class="search_wrap  search_wrap_event" data-type-search="event">
                        <div class="list-search event_search_box">
                            <form method="POST" action="" class="line-search">
                                <div class="input-group input-group-sm">
                                    <input id="search_event_input" data-type="event"
                                           class="form-control search_event active" type="search"
                                           placeholder="Поиск по событиям">
                                    <span class="btn-search input-group-btn">
                                        <button type="button" class=" btn btn-info btn-flat-event search_event_go">Go!</button>
                                    </span>
                                </div>
                            </form>
                        </div>
                        <div class="list_information col-xs-8">
                            <ul class="list_data">

                            </ul>
                        </div>
                    </div>
                    <div class="search_wrap search_wrap_category" data-type-search="category">
                        <div class="list-search event_search_box">
                            <form method="POST" action="" class="line-search">
                                <div class="input-group input-group-sm">
                                    <input id="search_event_inut" class="form-control search_event"
                                           data-type="option_category" type="search" placeholder="Поиск по категориям">
                                    <span class="btn-search input-group-btn">
                                        <button type="button" class="search_event_go btn btn-info btn-flat-event search_event_go">Go!</button>
                                    </span>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="search_wrap search_wrap_club" data-type-search="club">
                        <div class="list-search event_search_box">
                            <form method="POST" action="" class="line-search">
                                <div class="input-group input-group-sm">
                                    <input class="form-control search_event" data-type="club" type="search"
                                           placeholder="Поиск по клубам">
                                    <span class="btn-search input-group-btn">
                                        <button type="button" class="btn btn-info btn-flat-event search_event_go">Go!</button>
                                    </span>
                                </div>
                            </form>
                        </div>
                        <div class="list_information col-xs-8">
                            <ul class="list_data">

                            </ul>
                        </div>
                    </div>

                    <div class="list-group">
                        <ul class="list_data_page">
                            
                        </ul>
                    </div>

                    <div class="cont-box1 clear">

                    </div>
                    <div class="cont-box content-in" id="loading"></div>
                </div>
            </div>

        </section>
    </div>
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
                        <a href="javascript::;">
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
                        <a href="javascript::;">
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
    <footer class="main-footer">
        <!-- To the right -->
        <input type="hidden" name="action" value="start">
        <div class="pull-right hidden-xs">
            Anything you want
        </div>
        <!-- Default to the left -->
        <strong>Copyright &copy; 2016 <a href="#">Company</a>.</strong> All rights reserved.
    </footer>

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
                        <a href="javascript::;">
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
                        <a href="javascript::;">
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
                <?= setcookie("set", "") ?>
            </div>
            <!-- /.tab-pane -->
            <!-- Stats tab content -->,
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
    <div></div>
</div>
<!-- ./wrapper -->

<!-- REQUIRED JS SCRIPTS -->
<div class="bg-opacity"></div>
<div class="popup-control">
    <div class="edit">Редактировать</div>
    <div class="delete">Удалить</div>
</div>
<!-- jQuery 2.2.3 -->
<script src="<?= Router::$permalink ?>views/main/plugins/jQuery/jquery-2.2.3.min.js"></script>
<!-- Bootstrap 3.3.6 -->
<script src="<?= Router::$permalink ?>views/main/bootstrap/js/bootstrap.min.js"></script>
<script src="<?= Router::$permalink ?>views/main/plugins/select2/select2.full.min.js"></script>
<!-- InputMask -->
<script src="<?= Router::$permalink ?>views/main/plugins/input-mask/jquery.inputmask.js"></script>
<script src="<?= Router::$permalink ?>views/main/plugins/input-mask/jquery.inputmask.date.extensions.js"></script>
<script src="<?= Router::$permalink ?>views/main/plugins/input-mask/jquery.inputmask.extensions.js"></script>
<!-- bootstrap datepicker -->
<script src="<?= Router::$permalink ?>views/main/plugins/datepicker/bootstrap-datepicker.js"></script>
<!-- bootstrap time picker -->
<script src="<?= Router::$permalink ?>views/main/plugins/timepicker/bootstrap-timepicker.min.js"></script>
<!-- SlimScroll 1.3.0 -->
<script src="<?= Router::$permalink ?>views/main/plugins/slimScroll/jquery.slimscroll.min.js"></script>
<!-- iCheck 1.0.1 -->
<script src="<?= Router::$permalink ?>views/main/plugins/iCheck/icheck.min.js"></script>
<!-- FastClick -->
<script src="<?= Router::$permalink ?>views/main/plugins/fastclick/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="<?= Router::$permalink ?>views/main/js/jquery-ui.js"></script>
<script src="<?= Router::$permalink ?>views/main/js/app.min.js"></script>
<script src="<?= Router::$permalink ?>views/main/js/spin.min.js"></script>
<script src="<?= Router::$permalink ?>views/main/js/script.js?<?php echo date("Y-m-d_H:i:s"); ?>"></script>
<script src="<?= Router::$permalink ?>views/main/js/ajax.js?<?php echo date("Y-m-d_H:i:s"); ?>"></script>
<script>
    $(function () {
        $('body').on('mask_ajax', function () {
            $('.sorting_1').each(function (i) {
                $(this).text(i + 1);
            });

            //Initialize Select2 Elements
            $(".select2").select2();
            //Datemask dd/mm/yyyy
            $("#datemask").inputmask("dd/mm/yyyy", {"placeholder": "dd/mm/yyyy"});
            //Datemask2 mm/dd/yyyy
            $("#datemask2").inputmask("mm/dd/yyyy", {"placeholder": "mm/dd/yyyy"});
            //Money Euro
            $("[data-mask]").inputmask();
        });
    });

</script>
<script src="<?= Router::$permalink ?>views/main/js/add_dancing_categories.js?<?php echo date("Y-m-d_H:i:s"); ?>"></script>
<script src="<?= Router::$permalink ?>views/main/js/create_dancing_categories.js?<?php echo date("Y-m-d_H:i:s"); ?>"></script>
<script src="<?= Router::$permalink ?>views/main/js/ajax_search.js?<?php echo date("Y-m-d_H:i:s"); ?>"></script>
</body>
</html>

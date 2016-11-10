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
    <link rel="stylesheet/less" type="text/less" href="<?=Router::$permalink?>views/main/css/add_dancing_groups.less">
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <!--<script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>-->
    <!--<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>-->
    <![endif]-->
    <script src="<?=Router::$permalink?>views/main/js/less.min.js" type="text/javascript"></script>
</head>
<body class="hold-transition skin-blue sidebar-mini">
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
                    <a href="<?=Router::$permalink?>admin/organizations/page/1">
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
                    <div class="col-xs-12 col-lg-10 col-lg-push-1 pull-left">
                        <?php if (isset($this->message)) {
                            echo $this->message;
                        }
                        ?>
                        <div class="container box box-primary flat">
                            <div class="row box-header">
                                <!--DANCE GROUP NAME-->
                                <div class="col-xs-12 col-md-8">
                                    <div class="dance-group-name">
                                        <form action="">
                                            <label class="text-capitalize"><span class="big-letters">название танцевальной групы:</span><input type="text" class="input-standard" name="dance-group-name" id="dance-group-name"></label>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            <!--DANCE GROUP MENU-->
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
                            <!--DANCE GROUP INFO BLOCK-->
                            <div id="dance-group-info-wrapper">

                                <div class="row dance-group-info" id="dance-programs">
                                    <div class="container-fluid">
                                        <!--ADD INFO-->
                                        <div class="row separation-line add-info">
                                            <div class="col-xs-7">
                                                <div class="dance-group-add-info">
                                                    <p class="text-capitalize">танцевальная программа</p>
                                                    <form action="" id="form-add-dance-program">
                                                        <div>
                                                            <label>Название:
                                                                <input type="text" name="dance-program-name-new" class="input-standard">
                                                            </label>
                                                        </div>
                                                        <a href="#" class="add-dance-group-info">сохранить</a>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                        <!--SEE INFO-->
                                        <div class="row see-info">
                                            <form class="dance-group-show-info">
                                                <!--<div class="dp-info-wrapper">-->
                                                <!--<span class="text-bold count"></span>-->
                                                <!--<div class="btn-group-sm flat" role="group">-->
                                                <!--<button type="button" class="btn btn-success edit-button btn-flat"><i class="fa fa-edit"></i></button>-->
                                                <!--<button type="button" class="btn btn-danger delete-button btn-flat"><i class="fa fa-trash"></i></button>-->
                                                <!--</div>-->
                                                <!--<label>Название:-->
                                                <!--<input disabled type="text" name="dance-program-name" class="input-standard">-->
                                                <!--</label>-->
                                                <!--<label>Код:-->
                                                <!--<input disabled type="text" name="dance-program-code" class="input-standard dancing-group-info-code">-->
                                                <!--</label>-->
                                                <!--</div>-->
                                            </form>
                                            <form action="add_dance_program" method="POST">
                                                <input type="submit" name="submit" class="send-info" data-state="disabled" value="отправить">
                                                <input type="hidden" name="redirect" id="send-dg-to-server">
                                            </form>
                                        </div>
                                    </div>
                                </div>

                                <div class="row" id="age-categories">
                                    <div class="container-fluid">
                                        <!--ADD INFO-->
                                        <div class="row separation-thick-line add-info">
                                            <div class="col-xs-12 col-md-7">
                                                <div class="dance-group-add-info-extended">
                                                    <p class="text-capitalize">возрастная категория</p>
                                                    <form action="" id="form-add-age-categories">
                                                        <div>
                                                            <label>Название:
                                                                <input type="text" name="age-category-name-new" class="input-standard">
                                                            </label>
                                                            <!--<span class="text-bold"><a href=""><i class="fa fa-plus"></i></a></span>-->
                                                        </div>
                                                        <div class="age-restrictions">
                                                            <label>Год рождения от:
                                                                <input type="text" name="age-category-rule-age-min-new" class="input-standard">
                                                            </label>
                                                            <label>Год рождения до:
                                                                <input type="text" name="age-category-rule-age-max-new" class="input-standard">
                                                            </label>
                                                        </div>
                                                        <a href="#" class="add-dance-group-info">сохранить</a>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                        <!--SEE INFO-->
                                        <div class="row see-info">
                                            <form class="dance-group-show-info-extended">
                                                <!--<div class="ag-info-wrapper">-->
                                                <!--<span class="text-bold count"></span>-->
                                                <!--<div class="btn-group-sm flat" role="group">-->
                                                <!--<button type="button" class="btn btn-success edit-button btn-flat"><i class="fa fa-edit"></i></button>-->
                                                <!--<button type="button" class="btn btn-danger delete-button btn-flat"><i class="fa fa-trash"></i></button>-->
                                                <!--</div>-->
                                                <!--<label>Название:-->
                                                <!--<input disabled type="text" name="age-category-name" class="input-standard">-->
                                                <!--</label>-->
                                                <!--<label>Код:-->
                                                <!--<input disabled type="text" name="age-category-code" class="input-standard dancing-group-info-code">-->
                                                <!--</label>-->
                                                <!--<label>От:-->
                                                <!--<input disabled type="text" name="age-category-rule-age-min" class="input-standard dancing-group-info-code">-->
                                                <!--</label>-->
                                                <!--<label>До:-->
                                                <!--<input disabled type="text" name="age-category-rule-age-max" class="input-standard dancing-group-info-code">-->
                                                <!--</label>-->
                                                <!--</div>-->
                                            </form>
                                            <form action="add_dance_program" method="POST">
                                                <input type="submit" class="send-info" data-state="disabled" value="отправить">
                                                <input type="hidden" name="redirect">
                                            </form>
                                        </div>
                                    </div>
                                </div>

                                <div class="row" id="nominations">
                                    <div class="container-fluid">
                                        <!--ADD INFO-->
                                        <div class="row separation-thick-line add-info">
                                            <div class="col-xs-12 col-md-7">
                                                <div class="dance-group-add-info-extended">
                                                    <p class="text-capitalize">номинация выступления</p>
                                                    <form action="" id="form-add-nominations">
                                                        <div>
                                                            <label>Название:
                                                                <input type="text" name="nomination-name-new" class="input-standard">
                                                            </label>
                                                            <span class="text-bold"><a href=""><i class="fa fa-plus"></i></a></span>
                                                        </div>
                                                        <div class="nomination-rule">
                                                            <label>Количество учасников:
                                                                <input type="text" name="nomination-rule-participants-number-new" class="input-standard">
                                                            </label>
                                                        </div>
                                                        <a href="#" class="add-dance-group-info">сохранить</a>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                        <!--SEE INFO-->
                                        <div class="row see-info">
                                            <form class="dance-group-show-info-extended">
                                                <!--<div class="nm-info-wrapper">-->
                                                <!--<span class="text-bold count"></span>-->
                                                <!--<div class="btn-group-sm flat" role="group">-->
                                                <!--<button type="button" class="btn btn-success edit-button btn-flat"><i class="fa fa-edit"></i></button>-->
                                                <!--<button type="button" class="btn btn-danger delete-button btn-flat"><i class="fa fa-trash"></i></button>-->
                                                <!--</div>-->
                                                <!--<label>Название:-->
                                                <!--<input disabled type="text" name="nomination-name" class="input-standard" value="sakjdsafahkbjhabfsahb">-->
                                                <!--</label>-->
                                                <!--<label>Код:-->
                                                <!--<input disabled type="text" name="nomination-code" class="input-standard dancing-group-info-code" value="sakjdsafahkbjhabfsahb">-->
                                                <!--</label>-->
                                                <!--<label>Кол-во учасников:-->
                                                <!--<input disabled type="text" name="nomination-rule-participants-number-min" class="input-standard dancing-group-info-code" value="sakjdsafahkbjhabfsahb">-->
                                                <!--</label>-->
                                                <!--</div>-->
                                            </form>
                                            <form action="add_dance_program" method="POST">
                                                <input type="submit" class="send-info" data-state="disabled" value="отправить">
                                                <input type="hidden" name="redirect">
                                            </form>
                                        </div>
                                    </div>
                                </div>

                                <div class="row" id="leagues">
                                    <div class="container-fluid">
                                        <!--ADD INFO-->
                                        <div class="row separation-thick-line add-info">
                                            <div class="col-xs-12 col-md-7">
                                                <div class="dance-group-add-info-extended">
                                                    <p class="text-capitalize">лига</p>
                                                    <form action="" id="form-add-leagues">
                                                        <div>
                                                            <label>Название:
                                                                <input type="text" name="league-name-new" class="input-standard">
                                                            </label>
                                                            <span class="text-bold"><a href=""><i class="fa fa-plus"></i></a></span>
                                                        </div>
                                                        <div class="nomination-rule">
                                                            <label>Лет выступлений:
                                                                <input type="text" name="league-rule-participation-years-new" class="input-standard">
                                                            </label>
                                                        </div>
                                                        <a href="#" class="add-dance-group-info">сохранить</a>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                        <!--SEE INFO-->
                                        <div class="row see-info">
                                            <form class="dance-group-show-info-extended">
                                                <!--<div class="lg-info-wrapper">-->
                                                <!--<span class="text-bold count"></span>-->
                                                <!--<div class="btn-group-sm flat" role="group">-->
                                                <!--<button type="button" class="btn btn-success edit-button btn-flat"><i class="fa fa-edit"></i></button>-->
                                                <!--<button type="button" class="btn btn-danger delete-button btn-flat"><i class="fa fa-trash"></i></button>-->
                                                <!--</div>-->
                                                <!--<label>Название:-->
                                                <!--<input disabled type="text" name="league-name" class="input-standard" value="sakjdsafahkbjhabfsahb">-->
                                                <!--</label>-->
                                                <!--<label>Код:-->
                                                <!--<input disabled type="text" name="league-code" class="input-standard dancing-group-info-code" value="sakjdsafahkbjhabfsahb">-->
                                                <!--</label>-->
                                                <!--<label>Лет выступлений:-->
                                                <!--<input disabled type="text" name="league-rule-participation-years" class="input-standard dancing-group-info-code" value="sakjdsafahkbjhabfsahb">-->
                                                <!--</label>-->
                                                <!--</div>-->
                                            </form>
                                            <form action="add_dance_program" method="POST">
                                                <input type="submit" class="send-info" data-state="disabled" value="отправить">
                                                <input type="hidden" name="redirect">
                                            </form>
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
<!-- Bootstrap 3.3.6 -->
<script src="<?=Router::$permalink?>views/main/bootstrap/js/bootstrap.min.js"></script>
<!-- AdminLTE App -->
<script src="<?=Router::$permalink?>views/main/js/app.min.js"></script>
<script src="<?=Router::$permalink?>views/main/js/add_dancing_groups.js"></script>

<!-- Optionally, you can add Slimscroll and FastClick plugins.
     Both of these plugins are recommended to enhance the
     user experience. Slimscroll is required when using the
     fixed layout. -->
</body>
</html>
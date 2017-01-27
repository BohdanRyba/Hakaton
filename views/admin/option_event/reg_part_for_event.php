<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Регистрация участников</title>
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
    <!--     <link rel="stylesheet" href="../views/main/css/fixis.css"> -->
    <script src="<?= Router::$permalink ?>views/main/js/jquery.min.js"></script>

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
<!--     <link rel="stylesheet/less" type="text/less" href="../views/main/css/add_dancing_categories.less?11">
    <script src="../views/main/js/less.min.js?12" type="text/javascript"></script> -->
</head>
<body class="hold-transition skin-blue sidebar-mini">
    <div class="wrapper">
        <!-- Main Header -->


        <header class="main-header">
            <!-- Logo -->
            <a href="../../../index.php" class="logo">
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
                                <img src="#" class="user-image" alt="User Image">
                                <!-- hidden-xs hides the username on small devices so only the image appears. -->
                                <span class="hidden-xs">Alexander Pierce</span>
                            </a>
                            <ul class="dropdown-menu">
                                <!-- The user image in the menu -->
                                <li class="user-header">
                                    <img src="#" class="img-circle" alt="User Image">

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
                        <img src="#" class="img-circle" alt="User Image">
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
                <li class="active"><a href="../admin/organizations/page/1"><i class="fa fa-link"></i> <span>Организации</span></a></li>
                <li><a href="../admin/organizations/org_settings/create-event"><i class="fa fa-link"></i> <span>Танцевальные групы</span></a></li>

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
                        <li><a href="<?= Router::$permalink ?>admin/option_event/reg_part_for_event/<?= $_SESSION['organization_id']?>">Регистраця</a></li>
                        <li><a href="">Категории</a></li>
                        <li><a href="#">Програма</a></li>
                        <li><a href="#">Суддьи</a></li>
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
            <div class=" col-md-12">
                <div class="box box-info">
                    <div class="box-header with-border">
                        <h2 class="box-title col-sm-4">Регистрация участников на событие:</h2>
                    </div>


                    <div class="cont-box1 clear">
                        <div class="box-body">
                            <div class="col-sm-12">

                                <div class="box-header">
                                    <h3 class="box-title">Выберите клуб для регистрации участников</h3>
                                </div>
                                
                                <div class="row">
                                    <div class="block_list_club col-sm-4">
                                        <div class="search_wrap_event" data-type-search="event">
                                            <div class=" event_search_box">
                                                <form method="GET" action="" class="line-search">
                                                    <div class="dsb input-group input-group-sm">
                                                        <input id="search_event_input" data-type="club"
                                                        class="form-control search_event active" type="search"
                                                        placeholder="Поиск клубов">
                                                    </div>
                                                </form>
                                            </div>
                                            <div class="list_club col-xs-12">

                                                <!-- Resuly search -->
                                                <ul class="list_club_data list_data_page">
                                                    <?php foreach ($list as $club):?>
                                                    <li id="<?= $club['id']?>">
                                                        <div class="list-search clr" data-id="1">
                                                            <div>
                                                                <img class="bg_event_avatar" src="" alt="wtf"/>
                                                            </div>
                                                            <div>
                                                                <span>Название клуба:<?=$club['club_name']?></span>
                                                            </div>
                                                        </div>
                                                    </li>
                                                    <?php endforeach;?>

                                                </ul>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-sm-8">
                                        <div class="block_reg">
                                            <table id="table_part" class="table table-bordered table-striped dataTable" role="grid" aria-describedby="example1_info">
                                                <tbody class="part_list">

                                                </tbody>

                                            </table>
                                            <div class="list_table_part">
                                                <div class="take_btn">
                                                    <span>Принять</span>
                                                </div>
                                                <div class="new_part_btn">
                                                    <span>Новый участник</span>
                                                </div>
                                                <table id="table_part" class="table table-bordered table-striped dataTable" role="grid" aria-describedby="example1_info">
                                                    <tbody class="part_list">
                                                        <tr role="row" class="odd">
                                                            <td class="sorting_1"></td>
                                                            <td>first_name</td>
                                                            <td>second_name</td>
                                                            <td>third_name</td>
                                                            <td>birth_date</td>
                                                        </tr>
                                                        <tr role="row" class="odd">
                                                            <td class="sorting_1"></td>
                                                            <td>first_name</td>
                                                            <td>second_name</td>
                                                            <td>third_name</td>
                                                            <td>birth_date</td>
                                                        </tr>
                                                        <tr role="row" class="odd">
                                                            <td class="sorting_1"></td>
                                                            <td>first_name</td>
                                                            <td>second_name</td>
                                                            <td>third_name</td>
                                                            <td>birth_date</td>
                                                        </tr>
                                                        <tr role="row" class="odd">
                                                            <td class="sorting_1"></td>
                                                            <td>first_name</td>
                                                            <td>second_name</td>
                                                            <td>third_name</td>
                                                            <td>birth_date</td>
                                                        </tr>
                                                        <tr role="row" class="odd">
                                                            <td class="sorting_1"></td>
                                                            <td>first_name</td>
                                                            <td>second_name</td>
                                                            <td>third_name</td>
                                                            <td>birth_date</td>
                                                        </tr>
                                                        <tr role="row" class="odd">
                                                            <td class="sorting_1"></td>
                                                            <td>first_name</td>
                                                            <td>second_name</td>
                                                            <td>third_name</td>
                                                            <td>birth_date</td>
                                                        </tr>
                                                        <tr role="row" class="odd">
                                                            <td class="sorting_1"></td>
                                                            <td>first_name</td>
                                                            <td>second_name</td>
                                                            <td>third_name</td>
                                                            <td>birth_date</td>
                                                        </tr>

                                                        <tr role="row" class="odd">
                                                            <td class="sorting_1"></td>
                                                            <td>first_name</td>
                                                            <td>second_name</td>
                                                            <td>third_name</td>
                                                            <td>birth_date</td>
                                                        </tr>
                                                        <tr role="row" class="odd">
                                                            <td class="sorting_1"></td>
                                                            <td>first_name</td>
                                                            <td>second_name</td>
                                                            <td>third_name</td>
                                                            <td>birth_date</td>
                                                        </tr>
                                                        <tr role="row" class="odd">
                                                            <td class="sorting_1"></td>
                                                            <td>first_name</td>
                                                            <td>second_name</td>
                                                            <td>third_name</td>
                                                            <td>birth_date</td>
                                                        </tr>
                                                        <tr role="row" class="odd">
                                                            <td class="sorting_1"></td>
                                                            <td>first_name</td>
                                                            <td>second_name</td>
                                                            <td>third_name</td>
                                                            <td>birth_date</td>
                                                        </tr>
                                                        <tr role="row" class="odd">
                                                            <td class="sorting_1"></td>
                                                            <td>first_name</td>
                                                            <td>second_name</td>
                                                            <td>third_name</td>
                                                            <td>birth_date</td>
                                                        </tr>
                                                        <tr role="row" class="odd">
                                                            <td class="sorting_1"></td>
                                                            <td>first_name</td>
                                                            <td>second_name</td>
                                                            <td>third_name</td>
                                                            <td>birth_date</td>
                                                        </tr>

                                                        <tr role="row" class="odd">
                                                            <td class="sorting_1"></td>
                                                            <td>first_name</td>
                                                            <td>second_name</td>
                                                            <td>third_name</td>
                                                            <td>birth_date</td>
                                                        </tr>
                                                        <tr role="row" class="odd">
                                                            <td class="sorting_1"></td>
                                                            <td>first_name</td>
                                                            <td>second_name</td>
                                                            <td>third_name</td>
                                                            <td>birth_date</td>
                                                        </tr>
                                                        <tr role="row" class="odd">
                                                            <td class="sorting_1"></td>
                                                            <td>first_name</td>
                                                            <td>second_name</td>
                                                            <td>third_name</td>
                                                            <td>birth_date</td>
                                                        </tr>
                                                        <tr role="row" class="odd">
                                                            <td class="sorting_1"></td>
                                                            <td>first_name</td>
                                                            <td>second_name</td>
                                                            <td>third_name</td>
                                                            <td>birth_date</td>
                                                        </tr>

                                                        <tr role="row" class="odd">
                                                            <td class="sorting_1"></td>
                                                            <td>first_name</td>
                                                            <td>second_name</td>
                                                            <td>third_name</td>
                                                            <td>birth_date</td>
                                                        </tr>
                                                        <tr role="row" class="odd">
                                                            <td class="sorting_1"></td>
                                                            <td>first_name</td>
                                                            <td>second_name</td>
                                                            <td>third_name</td>
                                                            <td>birth_date</td>
                                                        </tr>
                                                        <tr role="row" class="odd">
                                                            <td class="sorting_1"></td>
                                                            <td>first_name</td>
                                                            <td>second_name</td>
                                                            <td>third_name</td>
                                                            <td>birth_date</td>
                                                        </tr>
                                                        <tr role="row" class="odd">
                                                            <td class="sorting_1"></td>
                                                            <td>first_name</td>
                                                            <td>second_name</td>
                                                            <td>third_name</td>
                                                            <td>birth_date</td>
                                                        </tr>

                                                        <tr role="row" class="odd">
                                                            <td class="sorting_1"></td>
                                                            <td>first_name</td>
                                                            <td>second_name</td>
                                                            <td>third_name</td>
                                                            <td>birth_date</td>
                                                        </tr>
                                                        <tr role="row" class="odd">
                                                            <td class="sorting_1"></td>
                                                            <td>first_name</td>
                                                            <td>second_name</td>
                                                            <td>third_name</td>
                                                            <td>birth_date</td>
                                                        </tr>
                                                        <tr role="row" class="odd">
                                                            <td class="sorting_1"></td>
                                                            <td>first_name</td>
                                                            <td>second_name</td>
                                                            <td>third_name</td>
                                                            <td>birth_date</td>
                                                        </tr>
                                                        <tr role="row" class="odd">
                                                            <td class="sorting_1"></td>
                                                            <td>first_name</td>
                                                            <td>second_name</td>
                                                            <td>third_name</td>
                                                            <td>birth_date</td>
                                                        </tr>
                                                        <tr role="row" class="odd">
                                                            <td class="sorting_1"></td>
                                                            <td>first_name</td>
                                                            <td>second_name</td>
                                                            <td>third_name</td>
                                                            <td>birth_date</td>
                                                        </tr>
                                                        <tr role="row" class="odd">
                                                            <td class="sorting_1"></td>
                                                            <td>first_name</td>
                                                            <td>second_name</td>
                                                            <td>third_name</td>
                                                            <td>birth_date</td>
                                                        </tr>
                                                        <tr role="row" class="odd">
                                                            <td class="sorting_1"></td>
                                                            <td>first_name</td>
                                                            <td>second_name</td>
                                                            <td>third_name</td>
                                                            <td>birth_date</td>
                                                        </tr>
                                                        <tr role="row" class="odd">
                                                            <td class="sorting_1"></td>
                                                            <td>first_name</td>
                                                            <td>second_name</td>
                                                            <td>third_name</td>
                                                            <td>birth_date</td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                            <div class="row">
                                                <div class="col-sm-6">
                                                    <ul class="accordeon_category">
                                                        <li>
                                                            <div class="dance_category"><span>Брей</span></div>
                                                        </li>
                                                        <ul class="list_category_down">
                                                            <li class="act_part">hello-hello-hello-hello</li>
                                                            <li>hello-hello-hello-hello</li>
                                                            <li>hello-hello-hello-hello</li>
                                                        </ul>
                                                        <li>
                                                            <div class="dance_category"><span>Пул денс</span></div>
                                                        </li>
                                                        <ul class="list_category_down">
                                                            <li>hello-hello-hello-hello</li>
                                                            <li>hello-hello-hello-hello</li>
                                                            <li>hello-hello-hello-hello</li>
                                                        </ul>
                                                        <li>
                                                            <div class="dance_category"><span>Хіп-Хоп</span></div>
                                                        </li>
                                                        <ul class="list_category_down">
                                                            <li>hello-hello-hello-hello</li>
                                                            <li>hello-hello-hello-hello</li>
                                                            <li>hello-hello-hello-hello</li>
                                                        </ul>
                                                        <li>
                                                            <div class="dance_category"><span>Вальс</span></div>
                                                        </li>
                                                        <ul class="list_category_down">
                                                            <li>hello-hello-hello-hello</li>
                                                            <li>hello-hello-hello-hello</li>
                                                            <li>hello-hello-hello-hello</li>
                                                        </ul>
                                                    </ul>
                                                </div>
                                                <div class="col-sm-6">
                                                    <div class="form_block_reg">
                                                        <form class="form-horizontal" enctype="multipart/form-data">
                                                            <div class="form-group">
                                                                <div class="col-sm-4">
                                                                    <input type="text" name="number" class="form-control" id="inputPassword3" placeholder="Номер">
                                                                </div>
                                                            </div>
                                                            <div class="form-group">
                                                                <div class="col-sm-12">
                                                                    <input type="text" name="name" class="form-control" id="inputPassword3" placeholder="Имя">
                                                                </div>
                                                            </div>
                                                            <div class="form-group">
                                                                <div class="col-sm-12">
                                                                    <input type="text" name="lastName" class="form-control" id="inputPassword3" placeholder="Фамилия">
                                                                </div>
                                                            </div>
                                                            <div class="form-group">
                                                                <div class="col-sm-12">
                                                                    <input type="text" name="patronymic" class="form-control"   id="inputPassword3" placeholder="Отчество">
                                                                </div>
                                                            </div>
                                                            <div class="add_train_box form-group">
                                                                <div class="add-train-form col-sm-12">
                                                                    <input type="text" class="form-control" name="couch" id="   inputPassword3" placeholder="ФИО Тренера">
                                                                    <span class="btn-search input-group-btn">
                                                                        <a type="button" id="add-trainer" class="btn btn-info btn-flat-event">+</a>
                                                                    </span>
                                                                </div>
                                                            </div>
                                                            <div class="form-group">
                                                                <div class="col-sm-12">
                                                                    <input type="text" name="composition" class="form-control"   id="inputPassword3" placeholder="Название композиции">
                                                                </div>
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="cont-box content-in" id="loading"></div>
                        </div>
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
            <?=setcookie("set","")?>
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
</div>


<!-- <div class="bg-opacity"></div>
<div class="popup-control">
    <div class="delete">delete</div>
    <div class="edit">edit</div>
</div> -->

<div class="bg_shadow"></div>
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
<script src="<?= Router::$permalink ?>views/main/js/script.js?2115255"></script>
<script src="<?= Router::$permalink ?>views/main/js/ajax.js?526"></script>
<script>
    $(function () {
        $('body').on('mask_ajax', function(){
            $('.sorting_1').each(function(i){
                $(this).text(i+1);
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
</body>
</html>

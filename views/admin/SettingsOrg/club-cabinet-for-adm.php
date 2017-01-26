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
    <link rel="stylesheet/less" type="text/less" href="<?= Router::$permalink ?>views/main/css/pick_categories_for_event.less">
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

    <?php $_SESSION['org_id']=$participant['id']?>
<div class="resize-remove">
    <div class="box-header with-border">
        <h2 class="box-title">Кабинет клуба <span><?=$participant['club_name']?>  </span></h2>
        <div class="box-tools pull-right click-remove">
            <a class="btn btn-box-tool remove-part"><i class="fa fa-times"></i></a>
        </div>
    </div>
    <div class="box-body">

        <div class="col-sm-4 box-avatar-cab">
            <img src="../../main/img/Button-power-icon.png">
            <p class="telef">Контактный телефон:<span><?=$participant['club_number']?> </span></p>
            <p class="e-mail">Адрес електроной почты: <span><?=$participant['club_mail']?> </span></p>
        </div>

        <div class="col-sm-8 cabinet-info">
            <p class="name">Название клуба: <span><?=$participant['club_name']?></span></p>
            <p>Страна: <span><?=$participant['club_country']?></span></p>
            <p>Город: <span><?=$participant['club_city']?></span></p>
                    <p>Cудья:<span><?=$participant['coach_name']?></span></p>
            <p class="name_help">Керівник:<span><?=$participant['club_shief']?></span></p>
        </div>
        <div class="col-sm-12">

            <div class="box-header">
                <h3 class="box-title">Список участников клуба</h3>
            </div>

            <div id="example1_wrapper" class="dataTables_wrapper form-inline dt-bootstrap">
                <div class="row">
                    <div class="col-sm-12">
                        <table id="example1" class="table table-bordered table-striped dataTable" role="grid" aria-describedby="example1_info">

                            <tbody class="part_list">
                            <?php if ( isset($participant['club_part']) ) {?>
                            <?php foreach ($participant['club_part'] as $part){?>

                                <tr role="row" class="odd">
                                    <td class="sorting_1">1</td>
                                    <td><?=$part['first_name']?></td>
                                    <td><?=$part['second_name']?></td>
                                    <td><?=$part['third_name']?></td>
                                    <td><?=$part['birth_date']?></td>
                                </tr>
                            <?php } }?>
                            </tbody>

                            <thead>
                                <tr role="row">
                                    <th class="sorting_asc" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" style="width: 181px;"
                                    aria-sort="ascending" aria-label="Rendering engine: activate to sort column descending">Номер№
                                </th>
                                <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" style="width: 224px;"
                                aria-label="Browser: activate to sort column ascending">Имя
                            </th>
                            <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" style="width: 198px;"
                            aria-label="Platform(s): activate to sort column ascending">Фамилия
                        </th>
                        <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" style="width: 155px;"
                        aria-label="Engine version: activate to sort column ascending">Отчество
                    </th>
                    <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" style="width: 110px;"
                    aria-label="CSS grade: activate to sort column ascending">Год рождения
                </th>
            </tr>
        </thead>
    </table>
</div>
</div>
</div>
</div>
</div>
<div class="box-footer">
    <div class="views_part">
    </div>
    <a type="submit" id="add_part" class="btn btn-info">Добавить участника</a>
</div>
</div>
                </div>
            </div>
        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->

    <footer class="main-footer">
    <!-- To the right -->
    <input type="hidden" name="action" value="start">
    <div class="pull-right hidden-xs">
            Anything you want
    </div>
    <!-- Default to the left -->
    <strong>Copyright &copy; 2016 <a href="#">Company</a>.</strong> All rights reserved.
</footer>
<!-- REQUIRED JS SCRIPTS -->

<!-- jQuery 2.2.3 -->
<script src="<?= Router::$permalink ?>views/main/plugins/jQuery/jquery-2.2.3.min.js"></script>
<!-- Bootstrap 3.3.6 -->
<script src="<?= Router::$permalink ?>views/main/bootstrap/js/bootstrap.min.js"></script>
<!-- AdminLTE App -->
<script src="<?= Router::$permalink ?>views/main/js/app.min.js"></script>
<script src="<?= Router::$permalink ?>views/main/js/pick_categories_for_event.js?<?php echo date("Y-m-d_H:i:s"); ?>"></script>
</body>
</html>
<?php
use components\Router;
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Выбранные категории для события</title>
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
    <link rel="stylesheet/less" type="text/less" href="<?=Router::$permalink?>views/main/css/pick_categories_for_event.less?11">
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <!--<script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>-->
    <!--<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>-->
    <![endif]-->
    <script src="<?=Router::$permalink?>views/main/js/less.min.js" type="text/javascript"></script>
</head>
<body class="hold-transition skin-blue">
<div class="wrapper">
    <!-- Main Header -->


    <?=$header?>
    <!-- Left side column. contains the logo and sidebar -->
    <?=$sidebar?>

    <div id="deletionModal" class="modal fade" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title text-uppercase">подтверждение</h4>
                </div>
                <div class="modal-body">
                    <p class="text-bold">Забрать выбранные категории из этого события?</p>
                </div>
                <div class="modal-footer">
                    <button type="button" id="deletionConfirmation" class="btn btn-danger text-capitalize">да!</button>
                    <button type="button" class="btn btn-default text-capitalize" data-dismiss="modal">отмена</button>
                </div>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->

    <div class="content-wrapper">
        <section class="content-header"></section>
        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div id="pickCategoriesForEventCallback" class="modal fade" role="dialog">
                        <div class="modal-dialog">
                            <!-- Modal content-->
                            <div class="modal-content">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                    <h4 class="modal-title">Оповещение об изменения</h4>
                                </div>
                                <form action="" method="POST">
                                    <div class="modal-body">
                                        <p>Изменения сохраненны успешно!</p>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-primary" data-dismiss="modal">ок</button>
                                    </div>
                                </form>
                            </div>

                        </div>
                    </div>




                    <div id="dance-group-info-wrapper">
                        <div class="col-xs-12">
                            <div class="container box box-primary flat">
                                <div class="row">
                                    <div id="dance-group-parameters-list" class="col-xs-12">
                                        <div class="container-fluid">
                                            <div class="row">
                                                <div class="row">
                                                    <div class="col-xs-12">
                                                        <p class="text-bold text-capitalize text-center title">выбранные категории</p>
                                                    </div>
                                                </div>
                                                <div class="col-xs-12">
                                                    <div id="example1_filter" class="dataTables_filter">
                                                        <label>Искать по названию:<input type="search" class="form-control input-sm" placeholder="" aria-controls="example1"></label>
                                                    </div>
                                                </div>
                                                <div class="col-xs-12">
                                                    <button id="delete_picked_categories" data-status="initial" type="button" class="btn btn-block flat btn-danger text-capitalize">забрать категории</button>
                                                    <button id="deny_deletion" type="button" class="displayNone btn btn-block flat btn-success text-capitalize">отмена</button>
                                                </div>
                                                <div class="col-xs-12">
                                                    <form id="picked_dancing_categories_for_event">
                                                        <ul>
                                                            <?php if(!empty($picked_categories)):?>
                                                                <?php foreach ($picked_categories as $category):?>
                                                                    <li class="pick_dancing_categories_for_event" data-checked="">
                                                                        <label>
                                                                            <input class="displayNone" type="checkbox" name="<?= $category['id']?>">
                                                                            <?= $category['d_c_program']?> <?= $category['d_c_age_category']?> <?= $category['d_c_nomination']?> <?= $category['d_c_league']?>
                                                                        </label>
                                                                    </li>
                                                                <?php endforeach;?>
                                                            <?php endif;?>
                                                        </ul>
                                                    </form>
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

    <!-- Main Footer -->
    <?=$footer?>

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

<script src="<?=Router::$permalink?>views/main/js/picked_categories_for_event.js?0"></script>
</body>
</html>
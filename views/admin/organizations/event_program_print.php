<?php
use components\Router;
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
    <link rel="stylesheet/less" type="text/less" href="<?= Router::$permalink ?>views/main/css/event_program_print.less?9">
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


    <?=$header?>
    <!-- Left side column. contains the logo and sidebar -->
    <?=$sidebar?>

    <div class="content-wrapper">
        <section class="content-header"></section>
        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-xs-12 print-header">
                        <h1>Бланк события</h1>
                        <p id="org-name">org long and strange name</p>
                        <p id="event-title">rating championship</p>
                        <p id="event-name">@dance legends 2017@</p>
                        <p id="event-info"><span id="date">17.17.2017</span> <span id="location">Khmelnitsky Ukraine</span></p>
                        <p id="event-department">dep 1</p>
                    </div>
                    <div class="col-xs-12">
                        <div class="flat callout callout-success event-menu clearfix">
                            <div class="dropdown">
                                <button class="btn flat btn-default dropdown-toggle" type="button" id="chooseDepartment" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                                    Выбор отделения
                                    <span class="caret"></span>
                                </button>
                                <ul id="pick-department" class="dropdown-menu flat" aria-labelledby="chooseDepartment">
                                    <?php if (!empty($departments) && $departments != false && $departments != 'DB connection error'): ?>
                                        <?php foreach ($departments as $department): ?>
                                            <li  class="department-item" data-id-department="<?= $department['id']; ?>">
                                                <a><?= $department['dep_name']?></a>
                                            </li>
                                        <?php endforeach; ?>
                                    <?php endif; ?>
                                    <li role="separator" class="divider"></li>
                                    <li><a href="<?=Router::$permalink?>admin/organizations/create_dancing_departments/<?=$_SESSION['event_id']?>">Создать новое</a></li>
                                </ul>
                            </div>
                            <span class="text-bold" id="department-name">Department 1</span>
                            <button type="button" id="print-event" class="btn btn-default"><i class="fa fa-print" aria-hidden="true"></i></button>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-xs-12 box box-success flat">
                        <ul class="category-main-holder">
                            <li class="draggable category" data-id="01" data-checkstatus='unchecked' data-category="01-00">
                                <div class="highlighter highlighterTop"></div>
                                <div class="category-settings clearfix">
                                    <span class="count-number" title="порядок">119.</span>
                                    <span class="count-number-print"></span>
                                    <div class="round-wrapper clearfix" title="выбор тура" data-checkstatus='unchecked'>
                                        <span class="round-selected">ТУР</span>
                                        <div class="dropdown round-dropdown">
                                            <button class="btn flat btn-default dropdown-toggle" type="button" id="chooseRound" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                                                <span class="caret"></span>
                                            </button>
                                            <ul class="dropdown-menu flat" aria-labelledby="chooseRound">
                                                <li class="round-variant"><a>1/32</a></li>
                                                <li class="round-variant"><a>1/16</a></li>
                                                <li class="round-variant"><a>1/8</a></li>
                                                <li class="round-variant"><a>1/4</a></li>
                                                <li class="round-variant"><a>1/2</a></li>
                                                <li class="round-variant"><a>1/1</a></li>
                                                <li role="separator" class="divider"></li>
                                                <li class="new-round"><a>создать новое...</a></li>
                                            </ul>
                                        </div>
                                    </div>
                                    <span class="participants-number" title="кол-во участников"><span class="the-participants-number">173</span>чел.</span>
                                    <p class="category-name main-content" title="название категории">Hip-hop dance pro style Cool&Brutal mix.</p>
                                </div>
                                <div class="highlighter highlighterBot"></div>
                            </li>
                            <li class="draggable category" data-id="02" data-checkstatus='unchecked' data-category="02-00">
                                <div class="highlighter highlighterTop"></div>
                                <div class="category-settings clearfix">
                                    <span class="count-number" title="порядок">11.</span>
                                    <span class="count-number-print"></span>
                                    <div class="round-wrapper clearfix" title="выбор тура" data-checkstatus='unchecked'>
                                        <span class="round-selected">ТУР</span>
                                        <div class="dropdown round-dropdown">
                                            <button class="btn flat btn-default dropdown-toggle" type="button" id="chooseRound" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                                                <span class="caret"></span>
                                            </button>
                                            <ul class="dropdown-menu flat" aria-labelledby="chooseRound">
                                                <li class="round-variant"><a>1/32</a></li>
                                                <li class="round-variant"><a>1/16</a></li>
                                                <li class="round-variant"><a>1/8</a></li>
                                                <li class="round-variant"><a>1/4</a></li>
                                                <li class="round-variant"><a>1/2</a></li>
                                                <li class="round-variant"><a>1/1</a></li>
                                                <li role="separator" class="divider"></li>
                                                <li class="new-round"><a>создать новое...</a></li>
                                            </ul>
                                        </div>
                                    </div>
                                    <span class="participants-number" title="кол-во участников"><span class="the-participants-number">888</span>чел.</span>
                                    <p class="category-name main-content" title="название категории">pro mix.</p>
                                </div>
                                <div class="highlighter highlighterBot"></div>
                            </li>
                            <li class="draggable category" data-id="03" data-checkstatus='unchecked' data-category="03-00">
                                <div class="highlighter highlighterTop"></div>
                                <div class="category-settings clearfix">
                                    <span class="count-number" title="порядок">1.</span>
                                    <span class="count-number-print"></span>
                                    <div class="round-wrapper clearfix" title="выбор тура" data-checkstatus='unchecked'>
                                        <span class="round-selected">ТУР</span>
                                        <div class="dropdown round-dropdown">
                                            <button class="btn flat btn-default dropdown-toggle" type="button" id="chooseRound" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                                                <span class="caret"></span>
                                            </button>
                                            <ul class="dropdown-menu flat" aria-labelledby="chooseRound">
                                                <li class="round-variant"><a>1/32</a></li>
                                                <li class="round-variant"><a>1/16</a></li>
                                                <li class="round-variant"><a>1/8</a></li>
                                                <li class="round-variant"><a>1/4</a></li>
                                                <li class="round-variant"><a>1/2</a></li>
                                                <li class="round-variant"><a>1/1</a></li>
                                                <li role="separator" class="divider"></li>
                                                <li class="new-round"><a>создать новое...</a></li>
                                            </ul>
                                        </div>
                                    </div>
                                    <span class="participants-number" title="кол-во участников"><span class="the-participants-number">1</span>чел.</span>
                                    <p class="category-name main-content" title="название категории">Cool&Brutal mix.</p>
                                </div>
                                <div class="highlighter highlighterBot"></div>
                            </li>
                            <li class="draggable category" data-id="05" data-checkstatus='unchecked' data-category="05-00">
                                <div class="highlighter highlighterTop"></div>
                                <div class="category-settings clearfix">
                                    <span class="count-number" title="порядок">1.</span>
                                    <span class="count-number-print"></span>
                                    <div class="round-wrapper clearfix" title="выбор тура" data-checkstatus='unchecked'>
                                        <span class="round-selected">ТУР</span>
                                        <div class="dropdown round-dropdown">
                                            <button class="btn flat btn-default dropdown-toggle" type="button" id="chooseRound" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                                                <span class="caret"></span>
                                            </button>
                                            <ul class="dropdown-menu flat" aria-labelledby="chooseRound">
                                                <li class="round-variant"><a>1/32</a></li>
                                                <li class="round-variant"><a>1/16</a></li>
                                                <li class="round-variant"><a>1/8</a></li>
                                                <li class="round-variant"><a>1/4</a></li>
                                                <li class="round-variant"><a>1/2</a></li>
                                                <li class="round-variant"><a>1/1</a></li>
                                                <li role="separator" class="divider"></li>
                                                <li class="new-round"><a>создать новое...</a></li>
                                            </ul>
                                        </div>
                                    </div>
                                    <span class="participants-number" title="кол-во участников"><span class="the-participants-number">17</span>чел.</span>
                                    <p class="category-name main-content" title="название категории">dance pro</p>
                                </div>
                                <div class="highlighter highlighterBot"></div>
                            </li>
                            <li class="draggable category" data-id="07" data-checkstatus='unchecked' data-category="07-00">
                                <div class="highlighter highlighterTop"></div>
                                <div class="category-settings clearfix">
                                    <span class="count-number" title="порядок">1.</span>
                                    <span class="count-number-print"></span>
                                    <div class="round-wrapper clearfix" title="выбор тура" data-checkstatus='unchecked'>
                                        <span class="round-selected">ТУР</span>
                                        <div class="dropdown round-dropdown">
                                            <button class="btn flat btn-default dropdown-toggle" type="button" id="chooseRound" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                                                <span class="caret"></span>
                                            </button>
                                            <ul class="dropdown-menu flat" aria-labelledby="chooseRound">
                                                <li class="round-variant"><a>1/32</a></li>
                                                <li class="round-variant"><a>1/16</a></li>
                                                <li class="round-variant"><a>1/8</a></li>
                                                <li class="round-variant"><a>1/4</a></li>
                                                <li class="round-variant"><a>1/2</a></li>
                                                <li class="round-variant"><a>1/1</a></li>
                                                <li role="separator" class="divider"></li>
                                                <li class="new-round"><a>создать новое...</a></li>
                                            </ul>
                                        </div>
                                    </div>
                                    <span class="participants-number" title="кол-во участников"><span class="the-participants-number">13</span>чел.</span>
                                    <p class="category-name main-content" title="название категории">Hip-hop mix.</p>
                                </div>
                                <div class="highlighter highlighterBot"></div>
                            </li>

                        </ul>
                    </div>
                </div>
            </div>
        </section>
    </div>

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
<script src="<?= Router::$permalink ?>views/main/plugins/jQuery/jquery-2.2.3.min.js"></script>
<!-- Bootstrap 3.3.6 -->
<script src="<?= Router::$permalink ?>views/main/bootstrap/js/bootstrap.min.js"></script>
<!-- AdminLTE App -->
<script src="<?= Router::$permalink ?>views/main/js/app.min.js"></script>
<script src="<?= Router::$permalink ?>views/main/js/dragFrame.js?7"></script>
<script src="<?= Router::$permalink ?>views/main/js/eventProgramPrintDragInit.js?8"></script>
</body>
</html>
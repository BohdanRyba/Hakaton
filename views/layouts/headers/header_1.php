<?php
use controllers\AppController;
use components\Router;
$user = AppController::getCurrentUserInfo();

return '<header class="main-header">
        <!-- Logo -->
        <a href="' .  Router::$permalink . 'home" title="На главную" class="logo">
            <!-- mini logo for sidebar mini 50x50 pixels -->
            <span class="logo-mini"><b>L</b>IV</span>
            <!-- logo for regular state and mobile devices -->
            <span class="logo-lg"><b>Liv</b>LEGEND</span>
        </a>

        <!-- Header Navbar -->
        <nav class="navbar navbar-static-top" role="navigation">
            <!-- Sidebar toggle button-->
            <a href="' .  Router::$permalink . 'home" class="sidebar-toggle" data-toggle="offcanvas" role="button">
                <span class="sr-only">Toggle navigation</span>
            </a>
            <!-- Navbar Right Menu -->
            <div class="navbar-custom-menu">
                <ul class="nav navbar-nav">
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">Меню <span class="caret"></span></a>
                        <ul class="dropdown-menu" role="menu">
                            ' . AppController::createNavContent(Router::$uri) . '
                        </ul>
                    </li>
                    <!-- User Account Menu -->
                    <li class="dropdown user user-menu">
                        <!-- Menu Toggle Button -->
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                            <!-- The user image in the navbar-->
                            <img src="' .  Router::$permalink .  $user['club_image'] . '" class="user-image" alt="' . $user['club_shief'] . '">
                            <!-- hidden-xs hides the username on small devices so only the image appears. -->
                            <span class="hidden-xs">' . $user['club_shief'] . '</span>
                        </a>
                        <ul class="dropdown-menu">
                            <!-- The user image in the menu -->
                            <li class="user-header">
                                <img src="' .  Router::$permalink .  $user['club_image'] . '" class="img-circle" alt="' . $user['club_shief'] . '">

                                <p>
                                    ' . $user['club_shief'] . ' - Глава клуба "' . $user['club_name'] . '"
                                    <small>' . $user['club_country'] . ', ' . $user['club_city'] . '</small>
                                </p>
                            </li>
                            <!-- Menu Body -->
                            <li class="user-body">
                                <div class="row">
                                    <div class="col-xs-6 text-center">
                                        <a href="#">' . $user['club_mail'] . '</a>
                                    </div>
                                    <div class="col-xs-6 text-center">
                                        <a href="#">' . $user['club_number'] . '</a>
                                    </div>
                                </div>
                                <!-- /.row -->
                            </li>
                            <!-- Menu Footer-->
                            <li class="user-footer">
                                <div class="pull-left">
                                    <a href="' .  Router::$permalink . 'profile" class="btn btn-default btn-flat">Профиль</a>
                                </div>
                                <div class="pull-right">
                                    <a href="' .  Router::$permalink . 'out" class="btn btn-default btn-flat">Выход</a>
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
    </header>';

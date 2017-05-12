<?php
use controllers\AppController;
use components\Router;
$user = AppController::getCurrentUserInfo();
return '<header class="main-header">

        <!-- Logo -->


        <!-- Header Navbar -->
        <nav class="navbar navbar-inverse">
            <div class="container-fluid">
                <div class="navbar-header">
                    <button type="button" class="collapsed navbar-toggle" data-toggle="collapse"
                            data-target="#bs-example-navbar-collapse-9" aria-expanded="false">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar "></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a href="' .  Router::$permalink . 'admin/organizations/page/1" title="Админ панель" class="navbar-brand">LivLegend</a>
                </div>
                <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-9">
                    <ul class="nav navbar-nav pull-right">
                        ' . AppController::createNavContent(Router::$uri) . '
                    </ul>
                </div>
            </div>
        </nav>
    </header>';

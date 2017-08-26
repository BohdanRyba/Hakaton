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
                                        <div class="club_search_box">
                                            <form method="POST" action="" class="line-search list-search">
                                                <div class="dsb input-group input-group-sm">
                                                    <input id="search_event_input" data-type="club"
                                                           class="form-control search_event active" type="search"
                                                           placeholder="Поиск клубов">
                                                </div>
                                            </form>
                                        </div>
                                        <div class="list_club col-xs-12">

                                            <!-- Resuly search -->
                                            <ul class="list_club_data">
                                                <?php foreach ($list as $club): ?>
                                                    <li id="" data-club-id="<?= $club['id'] ?>">
                                                        <div class="list-search clr">
                                                            <div>
                                                                <img class="bg_event_avatar" src="" alt="wtf"/>
                                                            </div>
                                                            <div>
                                                                <span>Название клуба:<?= $club['club_name'] ?></span>
                                                            </div>
                                                        </div>
                                                    </li>
                                                <?php endforeach; ?>

                                            </ul>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-sm-8">
                                    <div class="block_reg">
                                        <table id="table_part"
                                               class="table_reg table table-bordered table-striped dataTable"
                                               role="grid" aria-describedby="example1_info">
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
                                            <table id="table_part" class="table table-bordered table-striped dataTable"
                                                   role="grid" aria-describedby="example1_info">
                                                <tbody class="part_list">

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
                                                                <input type="text" name="number" class="form-control"
                                                                       id="inputPassword3" placeholder="Номер">
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <div class="col-sm-12">
                                                                <input type="text" name="name" class="form-control"
                                                                       id="inputPassword3" placeholder="Имя">
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <div class="col-sm-12">
                                                                <input type="text" name="lastName" class="form-control"
                                                                       id="inputPassword3" placeholder="Фамилия">
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <div class="col-sm-12">
                                                                <input type="text" name="patronymic"
                                                                       class="form-control" id="inputPassword3"
                                                                       placeholder="Отчество">
                                                            </div>
                                                        </div>
                                                        <div class="add_train_box form-group">
                                                            <div class="add-train-form col-sm-12">
                                                                <input type="text" class="form-control" name="couch"
                                                                       id="   inputPassword3" placeholder="ФИО Тренера">
                                                                <span class="btn-search input-group-btn">
                                                                        <a type="button" id="add-trainer"
                                                                           class="btn btn-info btn-flat-event">+</a>
                                                                    </span>
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <div class="col-sm-12">
                                                                <input type="text" name="composition"
                                                                       class="form-control" id="inputPassword3"
                                                                       placeholder="Название композиции">
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
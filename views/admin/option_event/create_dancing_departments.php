<?php

if (!empty($_COOKIE['lastOpenedTab'])) {
    $is_active_tab_1 = ($_COOKIE['lastOpenedTab'] === '#departments_list') ? 'active' : '';
    $is_active_tab_2 = ($_COOKIE['lastOpenedTab'] === '#departments_filling') ? 'active' : '';
    $is_active_tab_3 = ($_COOKIE['lastOpenedTab'] === '#departments_content') ? 'active' : '';
    $style_is_block_tab_1 = ($_COOKIE['lastOpenedTab'] === '#departments_list') ? 'display: block' : 'display: none';
    $style_is_block_tab_2 = ($_COOKIE['lastOpenedTab'] === '#departments_filling') ? 'display: block' : 'display: none';
    $style_is_block_tab_3 = ($_COOKIE['lastOpenedTab'] === '#departments_content') ? 'display: block' : 'display: none';
} elseif (empty($_COOKIE['lastOpenedTab'])) {
    $is_active_tab_1 = 'active';
    $is_active_tab_2 = '';
    $is_active_tab_3 = '';
    $style_is_block_tab_1 = 'display: block';
    $style_is_block_tab_2 = 'display: none';
    $style_is_block_tab_3 = 'display: none';
}

?>
<div class="content-wrapper">
    <section class="content-header"></section>
    <!-- Main content -->
    <section class="content">
        <?php if (isset($this->message)) {
            echo $this->message;
        }
        ?>
        <div class="container-fluid">
            <div class="row">
                <div class="col-xs-12 col-sm-10 col-sm-push-1">
                    <!-- Modals -->
                    <div id="confirmDepartmentDeletion" class="modal fade" role="dialog">
                        <div class="modal-dialog">
                            <!-- Modal content-->
                            <div class="modal-content">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                    <h4 class="modal-title">Подтверждение удаления</h4>
                                </div>
                                <form action="" method="POST">
                                    <div class="modal-body">
                                        <div class="form-group">
                                            <label for="pwd">Пароль подтверждения действия:</label>
                                            <input type="password" class="form-control"
                                                   name="deletion-confirmation-password" id="pwd">
                                            <input type="hidden" name="department-id">
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <input type="submit" class="btn btn-danger" name="deletion-confirmation-btn"
                                               value="Удалить!">
                                        <button type="button" class="btn btn-default" data-dismiss="modal">Отмена
                                        </button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <div id="editDepartmentName" class="modal fade" role="dialog">
                        <div class="modal-dialog">
                            <!-- Modal content-->
                            <div class="modal-content">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                    <h4 class="modal-title">Изменение названия отделения</h4>
                                </div>
                                <form action="" method="POST">
                                    <div class="modal-body">
                                        <div class="form-group">
                                            <label for="newDepartmentName">Новое название:</label>
                                            <input type="text" class="form-control" name="new-Department-Name"
                                                   id="newDepartmentName">
                                            <input type="hidden" name="department-id">
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <input type="submit" class="btn btn-success"
                                               name="new-department-name-confirmation-btn" value="Изменить">
                                        <button type="button" class="btn btn-default" data-dismiss="modal">Отмена
                                        </button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <div id="createDepartment" class="modal fade" role="dialog">
                        <div class="modal-dialog">
                            <!-- Modal content-->
                            <div class="modal-content">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                    <h4 class="modal-title">Создание отделения</h4>
                                </div>
                                <form action="" method="POST">
                                    <div class="modal-body">
                                        <div class="form-group">
                                            <label for="newDepartment">Название отделения:</label>
                                            <input type="text" class="form-control" name="new-Department-Name"
                                                   id="newDepartment">
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <input type="submit" id="send-created-department" class="btn btn-warning"
                                               name="new-department-name-confirmation-btn" value="Создать">
                                        <button type="button" class="btn btn-default" data-dismiss="modal">Отмена
                                        </button>
                                    </div>
                                </form>
                            </div>

                        </div>
                    </div>
                    <div id="transferCategory" class="modal fade" role="dialog">
                        <div class="modal-dialog">
                            <!-- Modal content-->
                            <div class="modal-content">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                    <h4 class="modal-title">Перемещение категории</h4>
                                </div>
                                <div class="modal-body">
                                    <!--<div class="form-group">-->
                                    <!--<label for="newDepartment">Название отделения:</label>-->
                                    <!--<input type="text" class="form-control" name="new-Department-Name" id="newDepartment">-->
                                    <!--</div>-->

                                    <p>Переместить категорию из
                                        <ins><span class="text-bold" data-direction="from"></span></ins>
                                        в
                                        <ins><span class="text-bold" data-direction="to"></span></ins>
                                    </p>
                                    <div class="dropdown">
                                        <button class="btn btn-primary dropdown-toggle text-bold flat"
                                                type="button" data-toggle="dropdown">Переместить в:
                                            <span class="caret"></span></button>
                                        <ul class="dropdown-menu flat"></ul>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button id="confirmTransfer" class="btn btn-success">Переместить</button>
                                    <button type="button" class="btn btn-default" data-dismiss="modal">Отмена</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div id="confirmCategoryDeletion" class="modal fade" tabindex="-1" role="dialog">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                                                aria-hidden="true">&times;</span></button>
                                    <h4 class="modal-title">Подтвердите удаление</h4>
                                </div>
                                <div class="modal-body">
                                    <p>Вы действительно хотите удалить <span class="text-bold"></span> ?</p>
                                </div>
                                <div class="modal-footer">
                                    <button id="deleteCategory" type="button" class="btn btn-danger">Удалить!</button>
                                    <button type="button" class="btn btn-default" data-dismiss="modal">Отмена</button>
                                </div>
                            </div><!-- /.modal-content -->
                        </div><!-- /.modal-dialog -->
                    </div><!-- /.modal -->

                    <div class="container box box-primary flat">
                        <!-- MENU-->
                        <div class="row dance-group-menu">
                            <div class="col-xs-12 col-sm-4">
                                <div class="dance-group-menu-items">
                                    <a href="#departments_list"
                                       class="<?php echo $is_active_tab_1 ?> prevent-text-emphasizing text-center text-uppercase text-bold"
                                       id="menu-dance-programs">список</a>
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-4">
                                <div class="dance-group-menu-items">
                                    <a href="#departments_filling"
                                       class="<?php echo $is_active_tab_2 ?> prevent-text-emphasizing text-center text-uppercase text-bold"
                                       id="menu-age-categories">наполнение</a>
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-4">
                                <div class="dance-group-menu-items">
                                    <a href="#departments_content"
                                       class="<?php echo $is_active_tab_3 ?> prevent-text-emphasizing text-center text-uppercase text-bold"
                                       id="menu-nominations">содержание</a>
                                </div>
                            </div>
                        </div>
                        <!--MAIN IFO BLOCK-->
                        <div class="row" id="main_info_wrapper">
                            <div id="departments_list" style="<?php echo $style_is_block_tab_1 ?>">
                                <div class="col-xs-12 col-lg-6">
                                    <div class="container box box-solid box-primary flat">
                                        <div class="row box-header">
                                            <h3 class="box-title text-uppercase">
                                                <button type="submit" id="create_new_department" data-toggle="modal"
                                                        data-target="#createDepartment"
                                                        class="btn btn-warning btn-flat"><i class="fa fa-plus"></i>
                                                </button>
                                                создать отделение
                                            </h3>
                                        </div>
                                        <div class="row">
                                            <div class="">
                                                <ul class="dancing-department-list-wrapper">
                                                    <?php if (!empty($departments) && $departments != false && $departments != 'DB connection error'): ?>
                                                        <?php foreach ($departments as $department): ?>
                                                            <li data-id-department="<?= $department['id']; ?>">
                                                                <p class="department-name"><?= $department['dep_name']; ?></p>
                                                                <div class="btn-group-xs button-wrapper">
                                                                    <button type="button" data-toggle="modal"
                                                                            data-target="#editDepartmentName"
                                                                            class="edit-info-about-department btn btn-success btn-flat">
                                                                        <i class="fa fa-edit"></i></button>
                                                                    <button type="button" data-toggle="modal"
                                                                            data-target="#confirmDepartmentDeletion"
                                                                            class="delete-department btn btn-danger delete-button btn-flat">
                                                                        <i class="fa fa-trash"></i></button>
                                                                </div>
                                                            </li>
                                                        <?php endforeach; ?>
                                                    <?php endif; ?>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div id="departments_filling" style="<?php echo $style_is_block_tab_2 ?>">
                                <div class="panel panel-primary flat">
                                    <div class="panel-heading flat">
                                        <div class="dropdown" id="departments-to-fill-dropdown">
                                            <button class="btn btn-warning dropdown-toggle text-bold flat"
                                                    type="button" data-toggle="dropdown">Отделение для наполнения
                                                <span class="caret"></span></button>
                                            <ul id="departments-to-fill" class="dropdown-menu flat">
                                                <?php if (!empty($departments) && $departments != false && $departments != 'DB connection error'): ?>
                                                    <?php foreach ($departments as $department): ?>
                                                        <li data-department-id="<?= $department['id']; ?>"
                                                            class="dropdown-menu-department prevent-text-emphasizing">
                                                            <a href="#"><?= $department['dep_name']; ?></a></li>
                                                    <?php endforeach; ?>
                                                <?php endif; ?>
                                            </ul>
                                        </div>
                                    </div>
                                    <div id="departments-filling-panel-body" class="panel-body">
                                        <div id="dance-group-info-wrapper">
                                            <div id="dance-group-parameters-list"
                                                 class="col-xs-12 col-md-4 col-lg-3">
                                                <div class="container-fluid">
                                                    <div class="row">
                                                        <div class="col-xs-12">
                                                            <div class="row pick-dancing-groups-parameters-wrapper">
                                                                <p id="see-department-name"
                                                                   class="text-bold text-center"></p>
                                                                <ul id="dance-program-to-pick-categories">
                                                                    <?php if (!empty($d_c_program_names)): ?>
                                                                        <?php foreach ($d_c_program_names as $name): ?>
                                                                            <li class="prevent-text-emphasizing dance-program-name"
                                                                                data-name="<?= $name; ?>">
                                                                                <?= $name; ?>
                                                                            </li>
                                                                        <?php endforeach; ?>
                                                                    <?php endif; ?>
                                                                </ul>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div id="categories-list" class="col-xs-12 col-md-8 col-lg-9">
                                                <div class="container-fluid">
                                                    <div class="row">
                                                        <div class="col-xs-12">
                                                            <div class="form-group prevent-text-emphasizing">
                                                                <label for="departments-search-category">название
                                                                    категории:</label>
                                                                <input type="text" class="form-control"
                                                                       id="departments-search-category">
                                                            </div>
                                                        </div>
                                                        <div class="col-xs-12">
                                                            <form id="pick-dancing-categories-for-department">
                                                                <ul>
                                                                    <li id="check-all-dancing-categories"
                                                                        class="prevent-text-emphasizing">
                                                                        <label><input class="text-capitalize"
                                                                                      type="checkbox">выбрать
                                                                            все</label></li>
                                                                    <li class="prevent-text-emphasizing pick-dancing-categories-for-department">
                                                                        <label><input type="checkbox" name="15">B&amp;B
                                                                            Дорослі Краща техніка виконання
                                                                            Профі</label></li>
                                                                    <li class="prevent-text-emphasizing pick-dancing-categories-for-department">
                                                                        <label><input type="checkbox" name="15">B&amp;B
                                                                            Дорослі Краща техніка виконання
                                                                            Профі</label></li>
                                                                    <li class="prevent-text-emphasizing pick-dancing-categories-for-department">
                                                                        <label><input type="checkbox" name="15">B&amp;B
                                                                            Дорослі Краща техніка виконання
                                                                            Профі</label></li>
                                                                    <li class="prevent-text-emphasizing pick-dancing-categories-for-department">
                                                                        <label><input type="checkbox" name="15">B&amp;B
                                                                            Дорослі Краща техніка виконання
                                                                            Профі</label></li>
                                                                </ul>
                                                            </form>
                                                            <span id="update-dancing-department-info"
                                                                  class="prevent-text-emphasizing send-info">сохранить</span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div id="departments_content" style="<?php echo $style_is_block_tab_3 ?>">
                                <div class="panel panel-primary flat">
                                    <div class="panel-heading flat">
                                        <div class="dropdown">
                                            <button class="btn btn-warning dropdown-toggle text-bold flat"
                                                    type="button" data-toggle="dropdown">Отделение для просмотра
                                                <span class="caret"></span></button>
                                            <ul id="dropdownMenuContent" class="dropdown-menu flat">
                                                <?php if (!empty($departments) && $departments != false && $departments != 'DB connection error'): ?>
                                                    <?php foreach ($departments as $department): ?>
                                                        <li data-department-id="<?= $department['id']; ?>"
                                                            class="dropdown-menu-department-content prevent-text-emphasizing">
                                                            <a href="#"><?= $department['dep_name']; ?></a></li>
                                                    <?php endforeach; ?>
                                                <?php endif; ?>
                                            </ul>
                                        </div>
                                    </div>
                                    <div id="departments-edition-panel-body" class="panel-body">
                                        <div id="department-content" class="col-xs-12">
                                            <div class="container-fluid">
                                                <div class="row">
                                                    <div class="col-xs-12">
                                                        <p id="see-department-content-name"
                                                           class="text-bold text-center"></p>
                                                        <div class="form-group prevent-text-emphasizing">
                                                            <label for="search-category-in-department">название
                                                                категории:</label>
                                                            <input type="text" class="form-control"
                                                                   id="search-category-in-department">
                                                        </div>
                                                    </div>
                                                    <div class="col-xs-12">
                                                        <form class="dance-group-show-info"
                                                              id="department-categories-list">
                                                            <div class="dp-info-wrapper">
                                                                <p class="dance-category-name prevent-text-emphasizing text-bold">
                                                                    Хіп Дорослі Кращий виспут за думкою глядачів
                                                                    Початківці</p>
                                                                <div class="prevent-text-emphasizing btn-group-sm flat"
                                                                     role="group">
                                                                    <button type="button"
                                                                            class="btn btn-success edit-created-category-info edit-button btn-flat">
                                                                        <i class="fa fa-exchange"></i></button>
                                                                    <button type="button"
                                                                            class="btn btn-danger delete-created-categories-info delete-button btn-flat">
                                                                        <i class="fa fa-trash"></i></button>
                                                                </div>
                                                            </div>
                                                            <div class="dp-info-wrapper">
                                                                <p class="dance-category-name prevent-text-emphasizing text-bold">
                                                                    Хіп Дорослі Кращий виспут за думкою глядачів
                                                                    Початківці</p>
                                                                <div class="prevent-text-emphasizing btn-group-sm flat"
                                                                     role="group">
                                                                    <button type="button"
                                                                            class="btn btn-success edit-created-category-info edit-button btn-flat">
                                                                        <i class="fa fa-exchange"></i></button>
                                                                    <button type="button"
                                                                            class="btn btn-danger delete-created-categories-info delete-button btn-flat">
                                                                        <i class="fa fa-trash"></i></button>
                                                                </div>
                                                            </div>
                                                        </form>
                                                        <span id="update-dancing-department-categories-list"
                                                              class="prevent-text-emphasizing send-info">сохранить</span>
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
            </div>
        </div>
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->

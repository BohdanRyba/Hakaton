<?php
use components\Router;

?>
<div class="content-wrapper">
    <section class="content-header"></section>
    <!-- Main content -->
    <section class="content">
        <div class="content_box col-md-10">
            <div class="box box-info">

                <div class="resize-remove">
                    <input type="hidden" value="<?= $participant['id'] ?>">
                    <?php $_SESSION['club_id'] = $participant['id'] ?>
                    <div class="box-header with-border">
                        <h2 class="box-title">Кабинет клуба <span>"<?= $participant['club_name'] ?>", состоит в организации <a
                                        href="<?= Router::$permalink . 'admin/organizations/org_settings/' . $organization['id'] ?>">"<?= $organization['org_name'] ?>
                                    "</a></span></h2>
                    </div>
                    <div class="box-body">

                        <div class="col-sm-4 box-avatar-cab">
                            <img src="<?= Router::$permalink . $participant['club_image'] ?>">
                            <p class="telef">Контактный телефон: <span><?= $participant['club_number'] ?> </span>
                            </p>
                            <p class="e-mail">Адрес електроной почты: <span><?= $participant['club_mail'] ?> </span>
                            </p>
                        </div>

                        <div class="col-sm-8 cabinet-info">
                            <p class="name">Название клуба: <span><?= $participant['club_name'] ?></span></p>
                            <p>Страна: <span><?= $participant['club_country'] ?></span></p>
                            <p>Город: <span><?= $participant['club_city'] ?></span></p>
                            <p>Cудья: <span><?= $participant['coach_name'] ?></span></p>
                            <p class="name_help">Руководитель: <span><?= $participant['club_shief'] ?></span></p>
                        </div>
                        <div class="col-sm-12">

                            <div class="box-header">
                                <h3 class="box-title">Список участников клуба</h3>
                            </div>

                            <div id="example1_wrapper" class="dataTables_wrapper form-inline dt-bootstrap">
                                <div class="row">
                                    <div class="col-sm-12">
                                        <table id="example1" class="table table-bordered table-striped dataTable"
                                               role="grid" aria-describedby="example1_info">

                                            <thead>
                                            <tr role="row">
                                                <th class="sorting_asc" tabindex="0" aria-controls="example1"
                                                    rowspan="1" colspan="1" style="width: 181px;"
                                                    aria-sort="ascending"
                                                    aria-label="Rendering engine: activate to sort column descending">№
                                                </th>
                                                <th class="sorting" tabindex="0" aria-controls="example1"
                                                    rowspan="1" colspan="1" style="width: 224px;"
                                                    aria-label="Browser: activate to sort column ascending">Имя
                                                </th>
                                                <th class="sorting" tabindex="0" aria-controls="example1"
                                                    rowspan="1" colspan="1" style="width: 198px;"
                                                    aria-label="Platform(s): activate to sort column ascending">
                                                    Фамилия
                                                </th>
                                                <th class="sorting" tabindex="0" aria-controls="example1"
                                                    rowspan="1" colspan="1" style="width: 155px;"
                                                    aria-label="Engine version: activate to sort column ascending">
                                                    Отчество
                                                </th>
                                                <th class="sorting" tabindex="0" aria-controls="example1"
                                                    rowspan="1" colspan="1" style="width: 110px;"
                                                    aria-label="CSS grade: activate to sort column ascending">Год
                                                    рождения
                                                </th>
                                                <th class="sorting" tabindex="0" aria-controls="example1"
                                                    rowspan="1" colspan="1" style="width: 110px;"
                                                    aria-label="CSS grade: activate to sort column ascending">Тренер
                                                </th>
                                            </tr>
                                            </thead>

                                            <tbody class="part_list">
                                            <?php if (isset($participant['club_part'])): ?>
                                                <?php foreach ($participant['club_part'] as $part): ?>
                                                    <tr role="row" class="odd">
                                                        <th class="sorting_1">1</th>
                                                        <td><?= $part['first_name'] ?></td>
                                                        <td><?= $part['second_name'] ?></td>
                                                        <td><?= $part['third_name'] ?></td>
                                                        <td><?= $part['birth_date'] ?></td>
                                                        <td><?= $part['coach'] ?></td>
                                                    </tr>
                                                <?php endforeach; ?>
                                            <?php endif; ?>
                                            </tbody>

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

<div class="bg-opacity"></div>
<div class="popup-control">
    <div class="edit">Редактировать</div>
    <div class="delete">Удалить</div>
</div>

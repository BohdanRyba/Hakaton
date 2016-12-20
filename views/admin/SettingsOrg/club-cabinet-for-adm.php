<div class="resize-remove">
    <div class="box-header with-border">
        <h2 class="box-title">Кабинет клуба <span><?=$_SESSION['club_name']?>  </span></h2>
        <div class="box-tools pull-right click-remove">
            <a class="btn btn-box-tool remove-part"><i class="fa fa-times"></i></a>
        </div>
    </div>
    <div class="box-body">

        <div class="col-sm-4 box-avatar-cab">
            <img src="../../main/img/Button-power-icon.png">
            <p class="telef">Контактный телефон:<span><?=$_SESSION['club_number']?> </span></p>
            <p class="e-mail">Адрес електроной почты: <span><?=$_SESSION['club_mail']?> </span></p>
        </div>

        <div class="col-sm-8 cabinet-info">
            <p class="name">Название клуба: <span><?=$_SESSION['club_name']?></span></p>
            <p>Страна: <span><?=$_SESSION['club_country']?></span></p>
            <p>Город: <span><?=$_SESSION['club_city']?></span></p>
            <p class="name_help"> Тренер: <span><?=$_SESSION['club_shief']?></span></p>
        </div>
        <div class="col-sm-12">

            <div class="box-header">
                <h3 class="box-title">Список участников клуба</h3>
            </div>

            <div id="example1_wrapper" class="dataTables_wrapper form-inline dt-bootstrap">
                <div class="row">
                    <div class="col-sm-12">
                        <table id="example1" class="table table-bordered table-striped dataTable" role="grid" aria-describedby="example1_info">

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
                            <tbody class="part_list">

                            <?php foreach ($participant as $value):?>
                                <tr role="row" class="odd">
                                    <td class="sorting_1"></td>
                                    <td><?= $value['first_name']?></td>
                                    <td><?= $value['second_name']?></td>
                                    <td><?= $value['third_name']?></td>
                                    <td><?= $value['birth_date']?></td>
                                </tr>
                            <?php endforeach;?>
                            </tbody>
                            <tfoot>
                            <tr>
                                <th rowspan="1" colspan="1">Номер№</th>
                                <th rowspan="1" colspan="1">Имя</th>
                                <th rowspan="1" colspan="1">Фамилия</th>
                                <th rowspan="1" colspan="1">Отчество</th>
                                <th rowspan="1" colspan="1">Год рождения</th>
                            </tr>
                            </tfoot>
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
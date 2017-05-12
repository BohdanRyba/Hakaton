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
        <link rel="stylesheet" type="text/css" href="<?= Router::$permalink ?>views/main/css/style.css">
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


    <?=$header?>
    <!-- Left side column. contains the logo and sidebar -->
    <?=$sidebar?>

    <div class="content-wrapper">
        <section class="content-header"></section>
        <!-- Main content -->
        <section class="content">
          <div class="content_box col-md-10">
                <div class="box box-info">

<div class="resize-remove">
    <input type="hidden" value="<?=$participant['id']?>">
    <?php $_SESSION['club_id'] = $participant['id']?>
    <div class="box-header with-border">
        <h2 class="box-title">Кабинет клуба <span><?=$participant['club_name']?>  </span></h2>
    </div>
    <div class="box-body">

        <div class="col-sm-4 box-avatar-cab">
            <img src="<?=$participant['club_image']?>">
            <p class="telef">Контактный телефон: <span><?=$participant['club_number']?> </span></p>
            <p class="e-mail">Адрес електроной почты: <span><?=$participant['club_mail']?> </span></p>
        </div>

        <div class="col-sm-8 cabinet-info">
            <p class="name">Название клуба: <span><?=$participant['club_name']?></span></p>
            <p>Страна: <span><?=$participant['club_country']?></span></p>
            <p>Город: <span><?=$participant['club_city']?></span></p>
            <p>Cудья: <span><?=$participant['coach_name']?></span></p>
            <p class="name_help">Руководитель: <span><?=$participant['club_shief']?></span></p>
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
                                <?php if (isset($participant['club_part'])):?>
                                    <?php foreach ($participant['club_part'] as $part):?>
                                        <tr role="row" class="odd">
                                            <td class="sorting_1">1</td>
                                            <td><?=$part['first_name']?></td>
                                            <td><?=$part['second_name']?></td>
                                            <td><?=$part['third_name']?></td>
                                            <td><?=$part['birth_date']?></td>
                                            <td><?=$part['coach']?></td>
                                        </tr>
                                    <?php endforeach;?>
                                <?php endif;?>
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

    <?=$footer?>

<div class="bg-opacity"></div>
<div class="popup-control">
    <div class="edit">Редактировать</div>
    <div class="delete">Удалить</div>
</div>
<!-- REQUIRED JS SCRIPTS -->

<!-- jQuery 2.2.3 -->
<script src="<?= Router::$permalink ?>views/main/plugins/jQuery/jquery-2.2.3.min.js"></script>
<!-- Bootstrap 3.3.6 -->
<script src="<?= Router::$permalink ?>views/main/bootstrap/js/bootstrap.min.js"></script>
<!-- AdminLTE App -->

<script src="<?= Router::$permalink ?>views/main/js/app.min.js"></script>
<script src="<?= Router::$permalink ?>views/main/js/script.js?<?php echo date("Y-m-d_H:i:s"); ?>"></script>
<script src="<?= Router::$permalink ?>views/main/js/ajax.js?<?php echo date("Y-m-d_H:i:s"); ?>"></script>
<script>
    $(function () {
        $('body').on('mask_ajax', function () {
            $('.sorting_1').each(function (i) {
                $(this).text(i + 1);
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
<script src="<?= Router::$permalink ?>views/main/js/pick_categories_for_event.js?<?php echo date("Y-m-d_H:i:s"); ?>"></script>
</body>
</html>

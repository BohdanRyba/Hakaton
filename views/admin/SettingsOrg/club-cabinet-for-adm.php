<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Организация <?php echo $current_org_name['org_name']; ?></title>
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
    <script src="<?= Router::$permalink ?>views/main/js/jquery.min.js"></script>

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
    <link rel="stylesheet/less" type="text/less"
          href="<?= Router::$permalink ?>views/main/css/add_dancing_categories.less?11">
    <link rel="stylesheet/less" type="text/less"
          href="<?= Router::$permalink ?>views/main/css/create_dancing_categories.less?31">
    <script src="<?= Router::$permalink ?>views/main/js/less.min.js?12" type="text/javascript"></script>
</head>
<?php $_SESSION['club_id']=$participant['id']?>
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
<footer class="main-footer">
    <!-- To the right -->
    <input type="hidden" name="action" value="start">
    <div class="pull-right hidden-xs">
        Anything you want
    </div>
    <!-- Default to the left -->
    <strong>Copyright &copy; 2016 <a href="#">Company</a>.</strong> All rights reserved.
</footer>
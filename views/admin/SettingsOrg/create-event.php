<?php
sleep(1);
?>
<div class="resize-remove">
    <div class="box-header with-border">
        <h2 class="box-title">Создание события</h2>
        <div class="box-tools pull-right click-remove">
            <a class="btn btn-box-tool remove-part"><i class="fa fa-times"></i></a>
        </div>
    </div>
    <!-- /.box-header -->
    <!-- form start -->
    <form class="form-horizontal" method="post" enctype="multipart/form-data">
        <div class="box-body">
            <div class="form-group">
                <label for="event_name" class="col-sm-2 control-label">Название события</label>
                <div class="col-sm-10">
                    <input type="hidden" name="action" value="event">
                    <input type="hidden" id="org_id" name="org_id" value="<?=$_COOKIE['get_id']?>" />
                    <input type="text" class="form-control" name="event_name" placeholder="Введите информацию">
                </div>
            </div>
            <div class="file_dw form-group">
                <label for="event_pic">Добавить афишу события</label>
                <input id="event_pic" name="event_image" type="file">
            </div>
            <div class="form-group">
                <label for="event_status" class="col-sm-2 control-label">Статус</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" name="event_status"
                           placeholder="Вид соревнований конкурса/мероприятия">
                </div>
            </div>
            <div class="form-group">
                <label for="event_begin" class="col-sm-2 control-label">Дата начала</label>
                <div class="col-sm-10 create-input">
                  <div class="icon-input input-group-addon">
                    <i class="fa fa-calendar"></i>
                  </div>
                  <input type="text" class="form-control" name="data-start" data-inputmask="'alias': 'dd/mm/yyyy'" data-mask="" placeholder="начало">
                </div>
            </div>
            <div class="form-group">
                <label for="event_begin" class="col-sm-2 control-label">Дата окончания</label>
                <div class="col-sm-10 create-input">
                  <div class="icon-input input-group-addon">
                    <i class="fa fa-calendar"></i>
                  </div>
                  <input type="text" class="form-control" name="data-finish" data-inputmask="'alias': 'dd/mm/yyyy'" data-mask="" placeholder="конец">
                </div>
            </div>
            <div class="form-group">
                <label for="event_city" class="col-sm-2 control-label">Выбирите город</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" name="event_city" placeholder="Введите город">
                </div>
            </div>
            <div class="form-group">
                <label for="event_country" class="col-sm-2 control-label">Выбирите страну</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" name="event_country" placeholder="Введите страну">
                </div>
            </div>
            <div class="form-group">
                <label for="event_sud" class="col-sm-2 control-label">Главный судья</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" name="event_referee" placeholder="Введите информацию">
                </div>
            </div>
            <div class="form-group">
                <label for="event_skyt" class="col-sm-2 control-label">Скутинер</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" name="event_skutiner" placeholder="Введите данные">
                </div>
            </div>
            <div class="form_in">
                <label class="" for=""><input name="reg_participant" type="submit" value="Принять"></label>
            </div>
        </div>
        <script>
            document.getElementById("txt").value
        </script>
    </form>
</div>
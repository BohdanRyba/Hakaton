<?php
sleep(1);
?>
<div class="resize-remove">
    <div class="box-header with-border">
        <h2 class="box-title">Заполните онформацию о клубе</h2>
        <div class="box-tools pull-right click-remove">
            <a class="btn btn-box-tool remove-part"><i class="fa fa-times"></i></a>
        </div>
    </div>
    <!-- /.box-header -->
    <!-- form start -->
    <form class="form-horizontal" method="post" enctype="multipart/form-data">
        <div class="box-body">
            <div class="form-group">
                <label for="inputEmail3" class="col-sm-2 control-label">Название клуба</label>
                <div class="col-sm-10">
                    <input type="hidden" name="action" value="club">
                    <input type="text" class="form-control" id="inputEmail3" name="club_name"
                    placeholder="Название клуба">
                </div>
            </div>
            <div class="file_dw form-group">
                <label for="exampleInputFile">Загрузите логотип клуба</label>
                <input id="exampleInputFile" name="club_image" type="file">
            </div>
            <div class="form-group">
                <label class="col-sm-2 control-label">Страна</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" name="club_country" id="inputPassword3"
                    placeholder="Страна">
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-2 control-label">Город</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" name="club_city" id="inputPassword3" placeholder="Город">
                </div>
            </div>
            <div class="form-group">
                <label for="inputPassword3" class="col-sm-2 control-label">Руководитель клуба</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" name="club_shief" id="inputPassword3"
                    placeholder="Руководитель клуба">
                </div>
            </div>
            <div class="add_train_box form-group">
                <label for="inputPassword3" class="col-sm-2 control-label">Тренер</label>
                <div class="add-train-form col-sm-10">
                    <input type="text" class="form-control" name="club_first_trener" id="inputPassword3"
                    placeholder="ФИО Тренера">
                    <span class="btn-search input-group-btn">
                    <a type="button" id="add-trainer" class="btn btn-info btn-flat-event">+</a>
                    </span>
                </div>
            </div>
            <div class="form-group">
                <label for="inputPassword3" class="col-sm-2 control-label">Номер телефона</label>
                <div class="col-sm-10">
                    <input type="tel" class="form-control" name="club_number" id="inputPassword3"
                    placeholder="Номер телефона">
                </div>
            </div>
            <div class="form-group">
                <label for="inputPassword3" class="col-sm-2 control-label">Електроная почта</label>
                <div class="col-sm-10">
                    <input type="e-mail" class="form-control" name="club_mail" id="inputPassword3" placeholder="e-mail">
                </div>
            </div>
            <div class="form_in">
                <label class="" for=""><input name="reg_participant" type="submit" value="Принять"></label>
            </div>
        </div>
    </form>
</div>

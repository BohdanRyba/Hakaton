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
  <form class="form-horizontal" action="">
    <div class="box-body">
      <div class="form-group">
        <label for="inputEmail3" class="col-sm-2 control-label">Название клуба</label>
        <div class="col-sm-10">
          <input name="club_name" type="text" class="form-control" id="inputEmail3" placeholder="Название клуба">
        </div>
      </div>
      <div class="file_dw form-group">
        <label for="exampleInputFile">Загрузите логотип клуба</label>
        <input name="club_logo" id="exampleInputFile" type="file">
      </div>
      <div class="form-group">
        <label class="col-sm-2 control-label">Страна</label>
        <div class="col-sm-10">
          <input name="club_country" type="text" class="form-control" id="inputPassword3" placeholder="Страна">
        </div>
      </div>
      <div class="form-group">
        <label class="col-sm-2 control-label">Город</label>
        <div class="col-sm-10">
          <input name="club_city" type="text" class="form-control" id="inputPassword3" placeholder="Город">
        </div>
      </div>
      <div class="form-group">
        <label for="inputPassword3" class="col-sm-2 control-label">Руководитель клуба</label>
        <div class="col-sm-10">
          <input name="club_head" type="text" class="form-control" id="inputPassword3" placeholder="Руководитель клуба">
        </div>
      </div>
      <div class="form-group">
        <label for="inputPassword3" class="col-sm-2 control-label">Тренер №1</label>
        <div class="col-sm-10">
          <input name="club_traine" type="text" class="form-control" id="inputPassword3" placeholder="Тренер №1">
        </div>
      </div>
      <div class="form-group">
        <label for="inputPassword3" class="col-sm-2 control-label">Тренер №2</label>
        <div class="col-sm-10">
          <input type="text" class="form-control" id="inputPassword3" placeholder="Тренер №2">
        </div>
      </div>
      <div class="form-group">
        <label for="inputPassword3" class="col-sm-2 control-label">Тренер №3</label>
        <div class="col-sm-10">
          <input type="text" class="form-control" id="inputPassword3" placeholder="Тренер №3">
        </div>
      </div>
      <div class="form-group">
        <label for="inputPassword3" class="col-sm-2 control-label">Номер телефона</label>
        <div class="col-sm-10">
          <input name="club_phone" type="tel" class="form-control" id="inputPassword3" placeholder="Номер телефона">
        </div>
      </div>
      <div class="form-group">
        <label for="inputPassword3" class="col-sm-2 control-label">Електроная почта</label>
        <div class="col-sm-10">
          <input name="club_email" type="e-mail" class="form-control" id="inputPassword3" placeholder="e-mail">
        </div>
      </div>
      <div class="form_in">
        <label class="" for=""><input name="reg_participant" type="submit" value="Принять"></label>
      </div>
    </div>
  </form>
</div>

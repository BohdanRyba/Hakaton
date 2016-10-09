<?php
    sleep(2);
?>
<div class="box-header with-border">
  <h2 class="box-title">Заполните онформацию о клубе</h2>
</div>
<!-- /.box-header -->
<!-- form start -->
<form class="form-horizontal">
  <div class="box-body">
    <div class="form-group">
      <label for="inputEmail3" class="col-sm-2 control-label">Название клуба</label>
      <div class="col-sm-10">
        <input type="text" class="form-control" id="inputEmail3" placeholder="Название клуба">
      </div>
    </div>
    <div class="file_dw form-group">
        <label for="exampleInputFile">Загрузите логотип клуба</label>
        <input id="exampleInputFile" type="file">
    </div>
      <div class="form-group">
        <label class="col-sm-2 control-label">Страна</label>
        <div class="col-sm-10">
            <select class="form-control select2" style="width: 100%;">
              <option selected="selected">Украина</option>
              <option>Россия</option>
              <option>США</option>
              <option>Польша</option>
              <option>Германия</option>
              <option>Франция</option>
              <option>Китай</option>
            </select>
          </div>
        </div>
        <div class="form-group">
          <label class="col-sm-2 control-label">Город</label>
          <div class="col-sm-10">
              <select class="form-control select2" style="width: 100%;">
                <option selected="selected">Хмельницкий</option>
                <option>Киев</option>
                <option>Харковь</option>
                <option>Днепропетровск</option>
                <option>Донецк</option>
                <option>Львов</option>
                <option>Житомер</option>
              </select>
            </div>
          </div>
    <div class="form-group">
      <label for="inputPassword3" class="col-sm-2 control-label">Руководитель клуба</label>
      <div class="col-sm-10">
        <input type="text" class="form-control" id="inputPassword3" placeholder="Руководитель клуба">
      </div>
    </div>
    <div class="form-group">
      <label for="inputPassword3" class="col-sm-2 control-label">Тренер №1</label>
      <div class="col-sm-10">
        <input type="text" class="form-control" id="inputPassword3" placeholder="Тренер №1">
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
        <input type="tel" class="form-control" id="inputPassword3" placeholder="Номер телефона">
      </div>
    </div>
    <div class="form-group">
      <label for="inputPassword3" class="col-sm-2 control-label">Електроная почта</label>
      <div class="col-sm-10">
        <input type="e-mail" class="form-control" id="inputPassword3" placeholder="e-mail">
      </div>
    </div>
  </div>
</form>
<form action="" class="form_in">
    <label class="" for=""><input name="reg_participant" type="submit" value="Заповнити заявку на участь"></label>
</form>

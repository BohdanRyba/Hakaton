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
  <form class="form-horizontal">
    <div class="box-body">
      <div class="form-group">
        <label for="event_name" class="col-sm-2 control-label">Название события</label>
        <div class="col-sm-10">
          <input type="text" class="form-control" id="event_name" placeholder="Введите информацию">
        </div>
      </div>
      <div class="file_dw form-group">
        <label for="event_pic">Добавить афишу события</label>
        <input id="event_pic" type="file">
      </div>
      <div class="form-group">
        <label for="event_status" class="col-sm-2 control-label">Статус</label>
        <div class="col-sm-10">
          <input type="text" class="form-control" id="event_status" placeholder="Вид соревнований конкурса/мероприятия">
        </div>
      </div>
      <div class="form-group">
        <label for="event_begin" class="col-sm-2 control-label">Дата начала</label>
        <div class="col-sm-10">
          <input type="text" class="form-control" id="event_begin" placeholder="Выберите дату">
        </div>
      </div>
      <div class="form-group">
        <label for="event_end" class="col-sm-2 control-label">Дата окончания</label>
        <div class="col-sm-10">
          <input type="text" class="form-control" id="event_end" placeholder="Выберите дату">
        </div>
      </div>
      <div class="form-group">
        <label for="event_city" class="col-sm-2 control-label">Выбирите город</label>
        <div class="col-sm-10">
          <input type="text" class="form-control" id="event_city" placeholder="Введите город">
        </div>
      </div>
      <div class="form-group">
        <label for="event_country" class="col-sm-2 control-label">Выбирите страну</label>
        <div class="col-sm-10">
          <input type="text" class="form-control" id="event_country" placeholder="Введите страну">
        </div>
      </div>

      <div class="form-group">
        <label for="event_sud" class="col-sm-2 control-label">Главный судья</label>
        <div class="col-sm-10">
          <input type="text" class="form-control" id="event_sud" placeholder="Введите информацию">
        </div>
      </div>
      <div class="form-group">
        <label for="event_skyt" class="col-sm-2 control-label">Скутинер</label>
        <div class="col-sm-10">
          <input type="text" class="form-control" id="event_skyt" placeholder="Введите данные">
        </div>
      </div>
      <div class="form_in">
        <label class="" for=""><input name="reg_participant" type="submit" value="Принять"></label>
      </div>
    </div>
  </div>
</form>
</div>
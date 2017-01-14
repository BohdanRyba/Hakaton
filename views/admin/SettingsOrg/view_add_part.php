<?php $id = $_SESSION['id']?>
<form class="form-horizontal" enctype="multipart/form-data">
  <div class="part box-body">
    <label for="" class="lb_part">Добавить нового участник</label>
    <div class="box-tools pull-right">
      <a class="btn btn-box-tool remove-part"><i class="fa fa-times"></i></a>
    </div>
    <div class="form-group">
      <label for="inputPassword3" class="col-sm-2 control-label">Имя</label>
      <div class="col-sm-10">
        <input type="text" name="name" class="form-control" id="inputPassword3" placeholder="Имя">
      </div>
    </div>

    <div class="form-group">
      <label for="inputPassword3" class="col-sm-2 control-label">Фамилия</label>
      <div class="col-sm-10">
        <input type="text" name="lastName" class="form-control" id="inputPassword3" placeholder="Фамилия">
      </div>
    </div>
    <div class="form-group">
      <label for="inputPassword3" class="col-sm-2 control-label">Отчество</label>
      <div class="col-sm-10">
        <input type="text" name="patronymic" class="form-control" id="inputPassword3" placeholder="Отчество">
      </div>
    </div>
    <div class="form-group">
      <label for="event_begin" class="col-sm-2 control-label">Дата рождения</label>
      <div class="col-sm-10 create-input">
        <div class="icon-input input-group-addon">
          <i class="fa fa-calendar"></i>
        </div>
        <input type="text" id="datemask" class="form-control" name="date" data-inputmask="'alias': 'yyyy-mm-dd'" data-mask="" placeholder="Дата рождения">
        <input type="hidden" name="id_club" value="<?=$id?>">
      </div>
    </div>
    <div class="form_in">
      <label class="" for=""><input name="reg_participant" type="submit" value="Принять" id="save_part_club"></label>
    </div>
  </div>

  </div>
  </form>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">


    </section>

    <!-- Main content -->
    <section class="content">
        <!-- Your Page Content Here -->
        <div class="content_box col-md-4">
            <div class="box box-info">
                <?php if (isset($this->message)) {
                    echo $this->message;
                }
                ?>
                <div class="box-header with-border">
                    <h2 class="box-title">Заполните онформацию об организации</h2>
                </div>
                <!-- /.box-header -->
                <!-- form start -->
                <form class="form-horizontal" method="post" action="org_reg" enctype="multipart/form-data">
                    <div class="box-body">
                        <div class="form-group">
                            <label for="inputEmail3" class="col-sm-2 control-label">Название организации</label>
                            <div class="col-sm-10">
                                <input name="org_name" type="text" class="form-control" id="inputEmail3"
                                       placeholder="Название организации">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="inputPassword3" class="col-sm-2 control-label">Краткое название
                                организации</label>
                            <div class="col-sm-10">
                                <input name="org_abbreviation" type="text" class="form-control" id="inputPassword3"
                                       placeholder="Краткое название организации">
                            </div>
                        </div>
                        <div class="file_dw form-group">
                            <label for="exampleInputFile">Загрузите логотип организации</label>
                            <input name="org_image" id="exampleInputFile" type="file">
                        </div>
                        <div class="form-group">
                            <label for="inputPassword3" class="col-sm-2 control-label">ФИО</label>
                            <div class="col-sm-10">
                                <input name="org_head_fio" type="text" class="form-control" id="inputPassword3"
                                       placeholder="ФИО руководителя">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="inputPassword3" class="col-sm-2 control-label">Город</label>
                            <div class="col-sm-10">
                                <input name="org_city" type="text" class="form-control" id="inputPassword3"
                                       placeholder="Город организации">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="inputPassword3" class="col-sm-2 control-label">Страна</label>
                            <div class="col-sm-10">
                                <input name="org_country" type="text" class="form-control" id="inputPassword3"
                                       placeholder="Страна организации">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="inputPassword3" class="col-sm-2 control-label">Номер телефона</label>
                            <div class="col-sm-10">
                                <input name="org_phone" type="tel" class="form-control" id="inputPassword3"
                                       placeholder="Номер телефона">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="inputPassword3" class="col-sm-2 control-label">Адрес електроной почты</label>
                            <div class="col-sm-10">
                                <input name="org_email" type="e-mail" class="form-control" id="inputPassword3"
                                       placeholder="e-mail">
                            </div>
                        </div>
                        <div class="form_in">
                            <label class="" for=""><input type="submit" value="Добавить организацию"></label>
                        </div>
                        <input name="redirect" type="hidden" value="admin/organizations/org_add">
                    </div>
                </form>
            </div>
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->

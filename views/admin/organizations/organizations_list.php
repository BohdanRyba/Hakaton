<?php
use components\Router;

?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">


    </section>

    <!-- Main content -->
    <section class="content">

        <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
             aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title text-uppercase" id="myModalLabel">удаление организации</h4>
                    </div>
                    <div class="modal-body">
                        <p></p>
                    </div>
                    <div class="modal-footer">
                        <form method="post" action="delOrg">
                            <label for="confirmation_pass_id" class="form-control">Введите пароль для подтверждения
                                удаления огранизации:</label>
                            <input id="confirmation_pass_id" name="deletion-confirmation-password" type="password"
                                   class="form-control">
                            <input type="submit" name="delete_org"
                                   class="btn btn-primary text-capitalize deletion-submit" value="удалить!">
                            <input type="hidden" name="delete_org_id">
                            <input type="hidden" name="redirect" value="<?php echo Router::$uri; ?>">
                            <button type="button" class="btn btn-secondary text-capitalize deletion-cancel"
                                    data-dismiss="modal">отмена
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <div class="container-fluid">
            <div class="row">
                <?php if (isset($this->message)) {
                    echo $this->message;
                }
                ?>

                <?php for ($i = $start; $i < $end; $i++): ?>
                    <?php $organization = $organizationsList[$i]; ?>
                    <div class="col-xs-12 col-md-6 pull-left">

                        <div data-id="<?php echo $organization['id']; ?>"
                             class="container box flat box-solid box-primary organization-list">
                            <div class="row box-header">
                                <h3 class="box-title text-uppercase">
                                    <?php echo $organization['org_abbreviation']; ?>
                                </h3>
                                <button type="button" class="btn btn-primary pull-right org-del-btn"
                                        data-toggle="modal"
                                        data-target="#myModal"><i class="fa fa-times"></i></button>
                            </div>
                            <div class="row box-body">
                                <div class="col-md-4 col-xs-12">
                                    <!--                                        <div class="org-img">-->
                                    <!--                                        </div>-->
                                    <img class="org-img"
                                         src="<?php echo Router::$permalink . $organization['org_pic_path'] ?>">
                                </div>
                                <div class="col-md-8 col-xs-12 pull-left">
                                    <div class="org-info-wrapper">
                                        <dl>
                                            <dt class="organization-title-president-name">Президент организации:
                                            </dt>
                                            <dd class="organization-info-president-name"><?php echo $organization['org_head_fio']; ?></dd>
                                            <dt class="organization-title-president-phone">Мобильный номер:</dt>
                                            <dd class="organization-info-president-phone"><a
                                                        href="tel:+380685557777"><?php echo $organization['org_phone']; ?></a>
                                            </dd>
                                            <dt class="organization-title-president-email">Электронный адрес:</dt>
                                            <dd class="organization-info-president-email"><a
                                                        href="mailto:example@gmail.com"
                                                        target="_blank"><?php echo $organization['org_email']; ?></a>
                                            </dd>
                                        </dl>
                                        <div class="btn-group-xs specialX">
                                            <button type="button" class="btn btn-info btn-flat"><i
                                                        class="fa fa-info"></i></button>
                                            <button type="button" class="btn btn-success btn-flat"><i
                                                        class="fa fa-edit"></i></button>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xs-12">
                                    <?php $_SESSION['org_id'] = $organization['id'] ?>
                                    <form method="post" action="../org_settings/<?php echo $organization['id']; ?>">
                                        <input name="submitik" type="submit" class="form-control text-center gogogo"
                                               value="Настройка организации"><a></a></input>
                                    </form>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-xs-12 full-info-container">

                                </div>
                            </div>
                        </div>
                    </div>
                <?php endfor; ?>

            </div>
        </div>
    </section>
    <!-- /.content -->
    <div class="row text-center">
        <?php echo $pagination; ?>
    </div>
</div>
<!-- /.content-wrapper -->

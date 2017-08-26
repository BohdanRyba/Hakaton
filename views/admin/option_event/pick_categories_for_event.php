<?php
use components\Router;
?>
<div class="content-wrapper">
    <section class="content-header"></section>
    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div id="pickCategoriesForEventCallback" class="modal fade" role="dialog">
                    <div class="modal-dialog">
                        <!-- Modal content-->
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                <h4 class="modal-title">Оповещение об изменения</h4>
                            </div>
                            <form action="" method="POST">
                                <div class="modal-body">
                                    <p>Изменения сохраненны успешно!</p>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-primary" data-dismiss="modal">ок</button>
                                </div>
                            </form>
                        </div>

                    </div>
                </div>


                <div id="dance-group-info-wrapper">
                    <div class="col-xs-12">
                        <div class="container box box-primary flat">
                            <h2 style="color:blue;">
                                Выбор категорий для события "<?php echo $event['event_name'] ?>" в организации <a
                                        href="<?php echo Router::$permalink . 'admin/organizations/org_settings/' . $organization['id'] ?>">
                                    "<?php echo $organization['org_name'] ?>"
                                </a>
                            </h2>
                            <div class="row">
                                <div id="dance-group-parameters-list" class="col-xs-12 col-md-4 col-lg-3">
                                    <div class="container-fluid">
                                        <div class="row">
                                            <div class="col-xs-12">
                                                <div id="example1_filter" class="dataTables_filter">
                                                    <label>Искать по названию:<input type="search" id="serachForm"
                                                                                     class="form-control input-sm"
                                                                                     placeholder=""
                                                                                     aria-controls="example1"></label>
                                                </div>
                                            </div>
                                            <div class="col-xs-12">
                                                <div class="row pick-dancing-groups-parameters-wrapper">
                                                    <ul id="pick-dancing-group-parameter-to-see">
                                                        <?php foreach ($dancing_programs as $program): ?>
                                                            <li class="dancing-group-list-item-to-see true_var"
                                                                data-name="<?= $program; ?>"><?= $program; ?></li>
                                                        <?php endforeach; ?>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div id="categories-list" class="col-xs-12 col-md-8 col-lg-9">
                                    <div class="container-fluid">
                                        <span id="update-dancing-categories-info" class="send-info">сохранить</span>
                                        <form id="pick_dancing_categories_for_event">
                                            <ul></ul>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->
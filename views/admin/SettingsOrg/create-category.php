<?php
sleep(1);
?>
<div class="resize-remove">
    <div class="box-header with-border">
        <div class="container-fluid">
            <div class="row pick-dancing-groups-wrapper">
                <div class="box-tools pull-right click-remove">
                    <a class="btn btn-box-tool remove-part"><i class="fa fa-times"></i></a>
                </div>
                <ul id="pick-dancing-groups">
                    <?php foreach ($dance_programs_list as $value): ?>
                        <li class="dancing-group-list-item" data-id-dancing-group="<?php echo $value['id']; ?>"><span
                            class="numeration"></span><?php echo $value['dance_group_name']; ?>
                        </li>
                    <?php endforeach; ?>
                </ul>
            </div>
            <input type="hidden" name="action" value="category">
            <div class="row pick-dancing-group-parameters-wrapper">
                <div class="col-xs-12 col-sm-6 col-md-3">
                    <form id="pick-dance-programs" action="">
                        <ul>
                            <li class="dancing-group-parameter-name text-capitalize text-bold text-center">
                                программы
                            </li>
                        </ul>
                    </form>
                </div>
                <div class="col-xs-12 col-sm-6 col-md-3">
                    <form id="pick-age-categories" action="">
                        <ul>
                            <li class="dancing-group-parameter-name text-capitalize text-bold text-center">
                                возрастные категории
                            </li>
                        </ul>
                    </form>
                </div>
                <div class="col-xs-12 col-sm-6 col-md-3">
                    <form id="pick-nominations" action="">
                        <ul>
                            <li class="dancing-group-parameter-name text-capitalize text-bold text-center">
                                номинации
                            </li>
                        </ul>
                    </form>
                </div>
                <div class="col-xs-12 col-sm-6 col-md-3">
                    <form id="pick-leagues" action="">
                        <ul>
                            <li class="dancing-group-parameter-name text-capitalize text-bold text-center">лиги</li>
                        </ul>
                    </form>
                </div>
            </div>
            <div class="row">
                <a href="#" id="add-dance-categories-parameters" class="send-info">сохранить</a>
            </div>
        </div>
        <div class="box-tools pull-right click-remove">
            <a class="btn btn-box-tool remove-part"><i class="fa fa-times"></i></a>
        </div>
    </div>
    <!-- /.box-header -->
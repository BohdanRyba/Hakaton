<?php
sleep(1);
?>
<div class="resize-remove">
    <div class="box-header with-border">
        <div class="container-fluid">
            <div class="row pick-dancing-groups-wrapper">
                <ul id="pick-dancing-groups">
                    <?php foreach ($dance_programs_list as $value): ?>
                        <li data-id-dancing-group="<?php echo $value['id']; ?>"><span
                                class="numeration"></span><?php echo $value['dance_group_name']; ?>
                        </li>
                    <?php endforeach; ?>
                </ul>
            </div>
            <div class="row">
                <a href="#" class="send-info">сохранить</a>
            </div>
            <div class="row pick-dancing-group-parameters-wrapper">
                <div class="col-xs-12 col-sm-6 col-md-3">
                    <form id="pick-dance-programs" action="">
                        <ul>
                            <li class="dancing-group-parameter-name text-capitalize text-bold text-center">
                                программы
                            </li>
                            <li><label><input type="checkbox">lalalalalndsfjbsd kfbshlkdfb lhdsfb lhj sdvfjhlsdvfd
                                    ml</label></li>
                            <li><label><input type="checkbox">lalalalalndsfjbsd</label></li>
                            <li><label><input type="checkbox">lalalalalndsfjbsd</label></li>
                            <li><label><input type="checkbox">lalalalalndsfjbsd</label></li>
                            <li><label><input type="checkbox">lalalalalndsfjbsd</label></li>
                        </ul>
                    </form>
                </div>
                <div class="col-xs-12 col-sm-6 col-md-3">
                    <form id="pick-age-categories" action="">
                        <ul>
                            <li class="dancing-group-parameter-name text-capitalize text-bold text-center">
                                возрастные категории
                            </li>
                            <li><label><input type="checkbox">lalalalalndsfjbsd kfbshlkdfb lhdsfb lhj sdvfjhlsdvfd
                                    ml</label></li>
                            <li><label><input type="checkbox">lalalalalndsfjbsd</label></li>
                            <li><label><input type="checkbox">lalalalalndsfjbsd</label></li>
                            <li><label><input type="checkbox">lalalalalndsfjbsd</label></li>
                            <li><label><input type="checkbox">lalalalalndsfjbsd</label></li>
                        </ul>
                    </form>
                </div>
                <div class="col-xs-12 col-sm-6 col-md-3">
                    <form id="pick-nominations" action="">
                        <ul>
                            <li class="dancing-group-parameter-name text-capitalize text-bold text-center">
                                номинации
                            </li>
                            <li><label><input type="checkbox">lalalalalndsfjbsd kfbshlkdfb lhdsfb lhj sdvfjhlsdvfd
                                    ml</label></li>
                            <li><label><input type="checkbox">lalalalalndsfjbsd</label></li>
                            <li><label><input type="checkbox">lalalalalndsfjbsd</label></li>
                            <li><label><input type="checkbox">lalalalalndsfjbsd</label></li>
                            <li><label><input type="checkbox">lalalalalndsfjbsd</label></li>
                        </ul>
                    </form>
                </div>
                <div class="col-xs-12 col-sm-6 col-md-3">
                    <form id="pick-leagues" action="">
                        <ul>
                            <li class="dancing-group-parameter-name text-capitalize text-bold text-center">лиги</li>
                            <li><label><input type="checkbox">lalalalalndsfjbsd kfbshlkdfb lhdsfb lhj sdvfjhlsdvfd
                                    ml</label></li>
                            <li><label><input type="checkbox">lalalalalndsfjbsd</label></li>
                            <li><label><input type="checkbox">lalalalalndsfjbsd</label></li>
                            <li><label><input type="checkbox">lalalalalndsfjbsd</label></li>
                            <li><label><input type="checkbox">lalalalalndsfjbsd</label></li>
                        </ul>
                    </form>
                </div>
            </div>
        </div>
        <div class="box-tools pull-right click-remove">
            <a class="btn btn-box-tool remove-part"><i class="fa fa-times"></i></a>
        </div>
    </div>
    <!-- /.box-header -->
  
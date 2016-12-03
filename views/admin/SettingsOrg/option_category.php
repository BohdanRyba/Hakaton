<?php
sleep(1);
?>
<div class="container box box-solid box-primary flat">
    <div class="box-tools pull-right click-remove">
        <a class="btn btn-box-tool remove-part"><i class="fa fa-times"></i></a>
    </div>
    <div class="row pick-dancing-groups-parameters-wrapper">
        <div class="col-xs-12 col-sm-6">
            <ul id="pick-dancing-group-to-use-wrapper">
                <?php foreach ($category_parameters as $value): ?>
                    <li data-id-dancing-group="<?=$value['id_dance_group']?>" class="pick-dancing-group-to-use"><?=$value['dance_group_name']?></li>
                <?php endforeach; ?>
            </ul>
        </div>
    </div>
    <div id="total-wrapper-for-info">
        <div class="row dance-group-menu">
            <div class="col-xs-6 col-sm-3">
                <div class="dance-group-menu-items">
                    <a href="#dance-programs" class="text-center text-bold" id="menu-dance-programs">танцевальная<br>программа</a>
                </div>
            </div>
            <div class="col-xs-6 col-sm-3">
                <div class="dance-group-menu-items">
                    <a href="#age-categories" class="text-center text-bold" id="menu-age-categories">возрастная<br>категория</a>
                </div>
            </div>
            <div class="col-xs-6 col-sm-3">
                <div class="dance-group-menu-items">
                    <a href="#nominations" class="text-center text-bold" id="menu-nominations">номинация<br>выступления</a>
                </div>
            </div>
            <div class="col-xs-6 col-sm-3">
                <div class="dance-group-menu-items">
                    <a href="#leagues" class="text-center text-bold" id="menu-leagues">лига<br>уровень выступления</a>
                </div>
            </div>
        </div>

        <div id="dance-group-info-wrapper">
            <div class="row">

                <div id="dance-group-parameters-list" class="col-xs-12 col-md-4 col-lg-3">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-xs-12">
                                <div id="example1_filter" class="dataTables_filter">
                                    <label>Искать по названию:<input type="search" class="form-control input-sm" placeholder="" aria-controls="example1"></label>
                                </div>
                            </div>
                            <div class="col-xs-12">
                                <div class="row pick-dancing-groups-parameters-wrapper">
                                    <ul id="pick-dancing-group-parameter">
                                        <li class="dancing-group-list-item picked-dancing-group" data-id-dancing-group=""><span class="numeration"></span>dancing group #1</li>
                                        <li class="dancing-group-list-item"><span class="numeration"></span>dancing group #2</li>
                                        <li class="dancing-group-list-item"><span class="numeration"></span>dancing group #3</li>
                                        <li class="dancing-group-list-item"><span class="numeration"></span>dancing group #1</li>
                                        <li class="dancing-group-list-item"><span class="numeration"></span>dancing group #2</li>
                                        <li class="dancing-group-list-item"><span class="numeration"></span>dancing group #3</li>
                                        <li class="dancing-group-list-item"><span class="numeration"></span>dancing group #1</li>
                                        <li class="dancing-group-list-item"><span class="numeration"></span>dancing group #2</li>
                                        <li class="dancing-group-list-item"><span class="numeration"></span>dancing group #3</li>
                                        <li class="dancing-group-list-item"><span class="numeration"></span>dancing group #1</li>
                                        <li class="dancing-group-list-item"><span class="numeration"></span>dancing group #2</li>
                                        <li class="dancing-group-list-item"><span class="numeration"></span>dancing group #3</li>
                                        <li class="dancing-group-list-item"><span class="numeration"></span>dancing group #1</li>
                                        <li class="dancing-group-list-item"><span class="numeration"></span>dancing group #2</li>
                                        <li class="dancing-group-list-item"><span class="numeration"></span>dancing group #3</li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div id="categories-list" class="col-xs-12 col-md-8 col-lg-9">
                    <div class="container-fluid">
                        <a id="update-dancing-categories-info" href="" class="send-info">сохранить</a>
                        <form id="show-searched-dancing-groups" class="dance-group-show-info">
                            <div class="dp-info-wrapper">
                                <div class="btn-group-sm flat" role="group">
                                    <button type="button" class="btn btn-success edit-button btn-flat"><i class="fa fa-edit"></i></button>
                                    <button type="button" class="btn btn-danger delete-button btn-flat"><i class="fa fa-trash"></i></button>
                                </div>
                                <p class="dance-category-name">Название танц категории</p>
                                <label>Код:<input disabled type="text" name="dance-program-code" class="input-standard dancing-group-info-code"></label>
                            </div>
                            <div class="dp-info-wrapper">
                                <div class="btn-group-sm flat" role="group">
                                    <button type="button" class="btn btn-success edit-button btn-flat"><i class="fa fa-edit"></i></button>
                                    <button type="button" class="btn btn-danger delete-button btn-flat"><i class="fa fa-trash"></i></button>
                                </div>
                                <p class="dance-category-name">Название танц категории</p>
                                <label>Код:<input disabled type="text" name="dance-program-code" class="input-standard dancing-group-info-code"></label>
                            </div>
                            <div class="dp-info-wrapper">
                                <div class="btn-group-sm flat" role="group">
                                    <button type="button" class="btn btn-success edit-button btn-flat"><i class="fa fa-edit"></i></button>
                                    <button type="button" class="btn btn-danger delete-button btn-flat"><i class="fa fa-trash"></i></button>
                                </div>
                                <p class="dance-category-name">Название танц категории</p>
                                <label>Код:<input disabled type="text" name="dance-program-code" class="input-standard dancing-group-info-code"></label>
                            </div>
                            <div class="dp-info-wrapper">
                                <div class="btn-group-sm flat" role="group">
                                    <button type="button" class="btn btn-success edit-button btn-flat edit-categories-info"><i class="fa fa-edit"></i></button>
                                    <button type="button" class="btn btn-danger delete-button btn-flat delete-categories-info"><i class="fa fa-trash"></i></button>
                                </div>
                                <p class="dance-category-name">Название танц категории</p>
                                <label>Код:<input disabled type="text" name="dance-program-code" class="input-standard dancing-group-info-code"></label>
                            </div>
                            <div class="dp-info-wrapper">
                                <div class="btn-group-sm flat" role="group">
                                    <button type="button" class="btn btn-success edit-button btn-flat"><i class="fa fa-edit"></i></button>
                                    <button type="button" class="btn btn-danger delete-button btn-flat"><i class="fa fa-trash"></i></button>
                                </div>
                                <p class="dance-category-name">Название танц категории</p>
                                <label>Код:<input disabled type="text" name="dance-program-code" class="input-standard dancing-group-info-code"></label>
                            </div>
                            <div class="dp-info-wrapper">
                                <div class="btn-group-sm flat" role="group">
                                    <button type="button" class="btn btn-success edit-button btn-flat"><i class="fa fa-edit"></i></button>
                                    <button type="button" class="btn btn-danger delete-button btn-flat"><i class="fa fa-trash"></i></button>
                                </div>
                                <p class="dance-category-name">Название танц категории</p>
                                <label>Код:<input disabled type="text" name="dance-program-code" class="input-standard dancing-group-info-code"></label>
                            </div>
                            <div class="dp-info-wrapper">
                                <div class="btn-group-sm flat" role="group">
                                    <button type="button" class="btn btn-success edit-button btn-flat"><i class="fa fa-edit"></i></button>
                                    <button type="button" class="btn btn-danger delete-button btn-flat"><i class="fa fa-trash"></i></button>
                                </div>
                                <p class="dance-category-name">Название танц категории</p>
                                <label>Код:<input disabled type="text" name="dance-program-code" class="input-standard dancing-group-info-code"></label>
                            </div>
                            <div class="dp-info-wrapper">
                                <div class="btn-group-sm flat" role="group">
                                    <button type="button" class="btn btn-success edit-button btn-flat"><i class="fa fa-edit"></i></button>
                                    <button type="button" class="btn btn-danger delete-button btn-flat"><i class="fa fa-trash"></i></button>
                                </div>
                                <p class="dance-category-name">Название танц категории</p>
                                <label>Код:<input disabled type="text" name="dance-program-code" class="input-standard dancing-group-info-code"></label>
                            </div>
                            <div class="dp-info-wrapper">
                                <div class="btn-group-sm flat" role="group">
                                    <button type="button" class="btn btn-success edit-button btn-flat"><i class="fa fa-edit"></i></button>
                                    <button type="button" class="btn btn-danger delete-button btn-flat"><i class="fa fa-trash"></i></button>
                                </div>
                                <p class="dance-category-name">Название танц категории</p>
                                <label>Код:<input disabled type="text" name="dance-program-code" class="input-standard dancing-group-info-code"></label>
                            </div>
                        </form>

                    </div>
                </div>

            </div>
        </div>

        <div id="create-dance-categories" class="col-xs-12">
            <div class="row pick-dancing-group-parameters-wrapper">
                <div class="col-xs-12 col-sm-6 col-md-3">
                    <form id="pick-dance-programs">
                        <ul>
                            <li class="dancing-group-parameter-name text-capitalize text-bold text-center">программы</li>
                            <li class="pick-dance-program-for-category"><label><input type="checkbox" name="хіп-хоп">хіп-хоп</label></li>
                            <li class="pick-dance-program-for-category"><label><input type="checkbox" name="хаус">хаус</label></li>
                            <li class="pick-dance-program-for-category"><label><input type="checkbox" name="танец живота">танец живота</label></li>
                            <li class="pick-dance-program-for-category"><label><input type="checkbox" name="брейк">брейк</label></li>
                            <li class="pick-dance-program-for-category"><label><input type="checkbox" name="вальс">вальс</label></li>
                        </ul>
                    </form>
                </div>
                <div class="col-xs-12 col-sm-6 col-md-3">
                    <form id="pick-age-categories">
                        <ul>
                            <li class="dancing-group-parameter-name text-capitalize text-bold text-center">возрастные категории</li>
                            <li class="pick-age-category-for-category"><label><input type="checkbox" name="от 1 до 5">от 1 до 5</label></li>
                            <li class="pick-age-category-for-category"><label><input type="checkbox" name="от 5 до 10">от 5 до 10</label></li>
                            <li class="pick-age-category-for-category"><label><input type="checkbox" name="от 10 до 15">от 10 до 15</label></li>
                            <li class="pick-age-category-for-category"><label><input type="checkbox" name="от 15 до 20">от 15 до 20</label></li>
                            <li class="pick-age-category-for-category"><label><input type="checkbox" name="от 20 до 25">от 20 до 25</label></li>
                        </ul>
                    </form>
                </div>
                <div class="col-xs-12 col-sm-6 col-md-3">
                    <form id="pick-nominations">
                        <ul>
                            <li class="dancing-group-parameter-name text-capitalize text-bold text-center">номинации</li>
                            <li class="pick-nominations-for-category"><label><input type="checkbox" name="номинация 1">номинация 1</label></li>
                            <li class="pick-nominations-for-category"><label><input type="checkbox" name="номинация 2">номинация 2</label></li>
                            <li class="pick-nominations-for-category"><label><input type="checkbox" name="номинация 3">номинация 3</label></li>
                            <li class="pick-nominations-for-category"><label><input type="checkbox" name="номинация 4">номинация 4</label></li>
                            <li class="pick-nominations-for-category"><label><input type="checkbox" name="номинация 5">номинация 5</label></li>
                        </ul>
                    </form>
                </div>
                <div class="col-xs-12 col-sm-6 col-md-3">
                    <form id="pick-leagues">
                        <ul>
                            <li class="dancing-group-parameter-name text-capitalize text-bold text-center">лиги</li>
                            <li class="check-all-leagues"><label><input type="checkbox">выбрать всё</label></li>
                            <li class="pick-leagues-for-categories"><label><input type="checkbox" name="лига 1">лига 1</label></li>
                            <li class="pick-leagues-for-categories"><label><input type="checkbox" name="лига 2">лига 2</label></li>
                            <li class="pick-leagues-for-categories"><label><input type="checkbox" name="лига 3">лига 3</label></li>
                            <li class="pick-leagues-for-categories"><label><input type="checkbox" name="лига 4">лига 4</label></li>
                            <li class="pick-leagues-for-categories"><label><input type="checkbox" name="лига 5">лига 5</label></li>
                        </ul>
                    </form>
                </div>
                <div class="col-xs-12">
                    <a href="#" id="btn-create-dance-categories" class="send-info">добавить</a>
                </div>
            </div>
        </div>

        <div class="col-xs-12" id="show-created-dance-categories">

            <div class="row">
                <div class="col-xs-12">
                    <form id="show-created-categories" class="dance-group-show-info margin-bot">

                    </form>
                </div>
                <div class="col-xs-12">
                    <a href="#" id="save-dance-categories" class="send-info">сохранить</a>
                </div>
            </div>


        </div>
    </div>  
</div>
<script src="<?=Router::$permalink?>views/main/js/create_dancing_categories.js"></script>

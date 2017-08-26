<div class="content-wrapper">
    <section class="content-header">
        <?php if (isset($this->message)) {
            echo $this->message;
        }
        ?>
    </section>
    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">

                <div id="total-dance-group-info-wrapper" data-visibility="none">
                    <div class="col-xs-12 col-sm-9 my-float-left">
                        <div class="container box box-primary flat">

                            <div class="row box-header">
                                <!--DANCE GROUP NAME-->
                                <div class="col-xs-12 col-md-8">
                                    <div class="dance-group-name">
                                        <form action="">
                                            <label class="text-capitalize"><span class="big-letters">название танцевальной группы:</span><input
                                                        type="text" class="input-standard" name="dance-group-name"
                                                        id="dance-group-name"></label>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            <!--DANCE GROUP MENU-->
                            <div class="row dance-group-menu">
                                <div class="col-xs-6 col-sm-3">
                                    <div class="dance-group-menu-items">
                                        <a href="#dance-programs" class="text-center text-bold"
                                           id="menu-dance-programs">танцевальная<br>программа</a>
                                    </div>
                                </div>
                                <div class="col-xs-6 col-sm-3">
                                    <div class="dance-group-menu-items">
                                        <a href="#age-categories" class="text-center text-bold"
                                           id="menu-age-categories">возрастная<br>категория</a>
                                    </div>
                                </div>
                                <div class="col-xs-6 col-sm-3">
                                    <div class="dance-group-menu-items">
                                        <a href="#nominations" class="text-center text-bold" id="menu-nominations">номинация<br>выступления</a>
                                    </div>
                                </div>
                                <div class="col-xs-6 col-sm-3">
                                    <div class="dance-group-menu-items">
                                        <a href="#leagues" class="text-center text-bold" id="menu-leagues">лига<br>уровень
                                            выступления</a>
                                    </div>
                                </div>
                            </div>
                            <!--DANCE GROUP INFO BLOCK-->
                            <div id="dance-group-info-wrapper">

                                <div class="row dance-group-info" id="dance-programs">
                                    <div class="container-fluid">
                                        <!--ADD INFO-->
                                        <div class="row separation-line add-info">
                                            <div class="col-xs-7">
                                                <div class="dance-group-add-info">
                                                    <p class="text-capitalize">танцевальная программа</p>
                                                    <form action="" id="form-add-dance-program">
                                                        <div>
                                                            <label>Название:
                                                                <input type="text" name="dance-program-name-new"
                                                                       class="input-standard">
                                                            </label>
                                                        </div>
                                                        <a href="#" class="add-dance-group-info">сохранить</a>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                        <!--SEE INFO-->
                                        <div class="row see-info">
                                            <form class="dance-group-show-info">
                                                <!--<div class="dp-info-wrapper">-->
                                                <!--<span class="text-bold count"></span>-->
                                                <!--<div class="btn-group-sm flat" role="group">-->
                                                <!--<button type="button" class="btn btn-success edit-button btn-flat"><i class="fa fa-edit"></i></button>-->
                                                <!--<button type="button" class="btn btn-danger delete-button btn-flat"><i class="fa fa-trash"></i></button>-->
                                                <!--</div>-->
                                                <!--<label>Название:-->
                                                <!--<input disabled type="text" name="dance-program-name" class="input-standard">-->
                                                <!--</label>-->
                                                <!--<label>Код:-->
                                                <!--<input disabled type="text" name="dance-program-code" class="input-standard dancing-group-info-code">-->
                                                <!--</label>-->
                                                <!--</div>-->
                                            </form>
                                            <form action="" method="POST">
                                                <input type="submit" class="send-info" data-state="disabled"
                                                       value="отправить">
                                                <input type="hidden" name="redirect">
                                            </form>
                                        </div>
                                    </div>
                                </div>

                                <div class="row" id="age-categories">
                                    <div class="container-fluid">
                                        <!--ADD INFO-->
                                        <div class="row separation-thick-line add-info">
                                            <div class="col-xs-12 col-md-7">
                                                <div class="dance-group-add-info-extended">
                                                    <p class="text-capitalize">возрастная категория</p>
                                                    <form action="" id="form-add-age-categories">
                                                        <div>
                                                            <label>Название:
                                                                <input type="text" name="age-category-name-new"
                                                                       class="input-standard">
                                                            </label>
                                                            <!--<span class="text-bold"><a href=""><i class="fa fa-plus"></i></a></span>-->
                                                        </div>
                                                        <div class="age-restrictions">
                                                            <label>Год рождения от:
                                                                <input type="text" name="age-category-rule-age-min-new"
                                                                       class="input-standard">
                                                            </label>
                                                            <label>Год рождения до:
                                                                <input type="text" name="age-category-rule-age-max-new"
                                                                       class="input-standard">
                                                            </label>
                                                        </div>
                                                        <a href="#" class="add-dance-group-info">сохранить</a>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                        <!--SEE INFO-->
                                        <div class="row see-info">
                                            <form class="dance-group-show-info-extended">
                                                <!--<div class="ag-info-wrapper">-->
                                                <!--<span class="text-bold count"></span>-->
                                                <!--<div class="btn-group-sm flat" role="group">-->
                                                <!--<button type="button" class="btn btn-success edit-button btn-flat"><i class="fa fa-edit"></i></button>-->
                                                <!--<button type="button" class="btn btn-danger delete-button btn-flat"><i class="fa fa-trash"></i></button>-->
                                                <!--</div>-->
                                                <!--<label>Название:-->
                                                <!--<input disabled type="text" name="age-category-name" class="input-standard">-->
                                                <!--</label>-->
                                                <!--<label>Код:-->
                                                <!--<input disabled type="text" name="age-category-code" class="input-standard dancing-group-info-code">-->
                                                <!--</label>-->
                                                <!--<label>От:-->
                                                <!--<input disabled type="text" name="age-category-rule-age-min" class="input-standard dancing-group-info-code">-->
                                                <!--</label>-->
                                                <!--<label>До:-->
                                                <!--<input disabled type="text" name="age-category-rule-age-max" class="input-standard dancing-group-info-code">-->
                                                <!--</label>-->
                                                <!--</div>-->
                                            </form>
                                            <form action="" method="POST">
                                                <input type="submit" class="send-info" data-state="disabled"
                                                       value="отправить">
                                                <input type="hidden" name="redirect">
                                            </form>
                                        </div>
                                    </div>
                                </div>

                                <div class="row" id="nominations">
                                    <div class="container-fluid">
                                        <!--ADD INFO-->
                                        <div class="row separation-thick-line add-info">
                                            <div class="col-xs-12 col-md-7">
                                                <div class="dance-group-add-info-extended">
                                                    <p class="text-capitalize">номинация выступления</p>
                                                    <form action="" id="form-add-nominations">
                                                        <div>
                                                            <label>Название:
                                                                <input type="text" name="nomination-name-new"
                                                                       class="input-standard">
                                                            </label>
                                                        </div>
                                                        <div class="nomination-rule">
                                                            <label>Количество учасников:
                                                                <input type="text"
                                                                       name="nomination-rule-participants-number-new"
                                                                       class="input-standard">
                                                            </label>
                                                        </div>
                                                        <a href="#" class="add-dance-group-info">сохранить</a>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                        <!--SEE INFO-->
                                        <div class="row see-info">
                                            <form class="dance-group-show-info-extended">
                                                <!--<div class="nm-info-wrapper">-->
                                                <!--<span class="text-bold count"></span>-->
                                                <!--<div class="btn-group-sm flat" role="group">-->
                                                <!--<button type="button" class="btn btn-success edit-button btn-flat"><i class="fa fa-edit"></i></button>-->
                                                <!--<button type="button" class="btn btn-danger delete-button btn-flat"><i class="fa fa-trash"></i></button>-->
                                                <!--</div>-->
                                                <!--<label>Название:-->
                                                <!--<input disabled type="text" name="nomination-name" class="input-standard" value="sakjdsafahkbjhabfsahb">-->
                                                <!--</label>-->
                                                <!--<label>Код:-->
                                                <!--<input disabled type="text" name="nomination-code" class="input-standard dancing-group-info-code" value="sakjdsafahkbjhabfsahb">-->
                                                <!--</label>-->
                                                <!--<label>Кол-во учасников:-->
                                                <!--<input disabled type="text" name="nomination-rule-participants-number-min" class="input-standard dancing-group-info-code" value="sakjdsafahkbjhabfsahb">-->
                                                <!--</label>-->
                                                <!--</div>-->
                                            </form>
                                            <form action="" method="POST">
                                                <input type="submit" class="send-info" data-state="disabled"
                                                       value="отправить">
                                                <input type="hidden" name="redirect">
                                            </form>
                                        </div>
                                    </div>
                                </div>

                                <div class="row" id="leagues">
                                    <div class="container-fluid">
                                        <!--ADD INFO-->
                                        <div class="row separation-thick-line add-info">
                                            <div class="col-xs-12 col-md-7">
                                                <div class="dance-group-add-info-extended">
                                                    <p class="text-capitalize">лига</p>
                                                    <form action="" id="form-add-leagues">
                                                        <div>
                                                            <label>Название:
                                                                <input type="text" name="league-name-new"
                                                                       class="input-standard">
                                                            </label>
                                                        </div>
                                                        <div class="nomination-rule">
                                                            <label>Лет выступлений:
                                                                <input type="text"
                                                                       name="league-rule-participation-years-new"
                                                                       class="input-standard">
                                                            </label>
                                                        </div>
                                                        <a href="#" class="add-dance-group-info">сохранить</a>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                        <!--SEE INFO-->
                                        <div class="row see-info">
                                            <form class="dance-group-show-info-extended">
                                                <!--<div class="lg-info-wrapper">-->
                                                <!--<span class="text-bold count"></span>-->
                                                <!--<div class="btn-group-sm flat" role="group">-->
                                                <!--<button type="button" class="btn btn-success edit-button btn-flat"><i class="fa fa-edit"></i></button>-->
                                                <!--<button type="button" class="btn btn-danger delete-button btn-flat"><i class="fa fa-trash"></i></button>-->
                                                <!--</div>-->
                                                <!--<label>Название:-->
                                                <!--<input disabled type="text" name="league-name" class="input-standard" value="sakjdsafahkbjhabfsahb">-->
                                                <!--</label>-->
                                                <!--<label>Код:-->
                                                <!--<input disabled type="text" name="league-code" class="input-standard dancing-group-info-code" value="sakjdsafahkbjhabfsahb">-->
                                                <!--</label>-->
                                                <!--<label>Лет выступлений:-->
                                                <!--<input disabled type="text" name="league-rule-participation-years" class="input-standard dancing-group-info-code" value="sakjdsafahkbjhabfsahb">-->
                                                <!--</label>-->
                                                <!--</div>-->
                                            </form>
                                            <form action="" method="POST">
                                                <input type="submit" name="submit" class="send-info"
                                                       data-state="disabled" value="отправить">
                                                <input type="hidden" name="redirect" id="send-dg-to-server">
                                            </form>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>

                <!-- Modal -->
                <div id="confirmDanceGroupDeletion" class="modal fade" role="dialog">
                    <div class="modal-dialog">

                        <!-- Modal content-->
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                <h4 class="modal-title">Подтверждение удаления</h4>
                            </div>
                            <form action="" method="POST">
                                <div class="modal-body">
                                    <div class="form-group">
                                        <label for="pwd">Пароль подтверждения действия:</label>
                                        <input type="password" class="form-control"
                                               name="deletion-confirmation-password" id="pwd">
                                        <input type="hidden" name="dancing-group-id" id="dancing-group-deletion-id">
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <input type="submit" class="btn btn-danger" name="deletion-confirmation-btn"
                                           value="Удалить!">
                                    <button type="button" class="btn btn-default" data-dismiss="modal">Отмена</button>
                                </div>
                            </form>
                        </div>

                    </div>
                </div>

                <div class="col-xs-12 col-sm-3 my-float-right">
                    <div class="container box box-solid box-primary flat">
                        <div class="row box-header">
                            <h3 class="box-title text-uppercase">
                                Танцевальные группы
                            </h3>
                        </div>
                        <div class="row">
                            <div class="">
                                <ul class="dancing-group-list-wrapper">
                                    <?php foreach ($list as $value): ?>
                                        <li class="pseudo-click dance-group"
                                            data-id-dancing-group="<?= $value['id']; ?>">
                                            <p class="pseudo-click dance-group-name"><?= $value['dance_group_name']; ?></p>
                                            <div class="pseudo-click btn-group-xs button-wrapper">
                                                <button type="button"
                                                        class="displayNone show-info-about-dance-group btn btn-info btn-flat">
                                                    <i class="fa fa-info"></i></button>
                                                <button type="button"
                                                        class="edit-info-about-dance-group btn btn-success btn-flat"><i
                                                            class="fa fa-edit"></i></button>
                                                <button type="button" data-toggle="modal"
                                                        data-target="#confirmDanceGroupDeletion"
                                                        class="delete-dance-group btn btn-danger delete-button btn-flat">
                                                    <i class="fa fa-trash"></i></button>
                                            </div>
                                        </li>
                                    <?php endforeach; ?>
                                </ul>
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


<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <section class="content-header"></section>
    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-xs-12 col-lg-10 col-lg-push-1 pull-left">
                    <?php if (isset($this->message)) {
                        echo $this->message;
                    }
                    ?>
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
                                        <form action="add_dance_program" method="POST">
                                            <input type="submit" name="submit" class="send-info" data-state="disabled"
                                                   value="отправить">
                                            <input type="hidden" name="redirect" id="send-dg-to-server">
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
                                        <form action="add_dance_program" method="POST">
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
                                        <form action="add_dance_program" method="POST">
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
                                        <form action="add_dance_program" method="POST">
                                            <input type="submit" class="send-info" data-state="disabled"
                                                   value="отправить">
                                            <input type="hidden" name="redirect">
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

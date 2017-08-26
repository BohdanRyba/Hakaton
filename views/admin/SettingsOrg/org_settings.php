<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <section class="content-header"></section>
    <section class="content">
        <div class="content_box col-md-10">
            <div class="box box-info">
                <div class="box-header with-border">
                    <h2 class="box-title col-sm-4">
                        организация <?php if (!empty($current_org_name['org_abbreviation'])) {
                            echo $current_org_name['org_abbreviation'];
                        } ?> </h2>
                    <li>
                        <span class="button-reg glyphicon glyphicon-pencil"></span>
                    </li>
                </div>
                <?php if (isset($this->message)) {
                    echo $this->message;
                }
                ?>
                <div class="cont-box clear">
                    <div class="button-box clr">
                        <ul class="button-org-add clr">
                            <li data-type="event" class="button-list event_data_list"><span>События</span></li>
                            <li class="btn-plus btn-plus-event"><span class="glyphicon glyphicon-plus"></span></li>
                        </ul>
                    </div>

                    <div class="button-box clr">
                        <ul class="button-org-add clr">
                            <li data-type="category" class="button-list category_data_list"><span>Категории</span>
                            </li>
                            <li class="btn-plus btn-plus-category"><span class="glyphicon glyphicon-plus">  </span>
                            </li>
                        </ul>
                    </div>

                    <div class="button-box clr">
                        <ul class="button-org-add clr">
                            <li data-type="club" class="button-list club_data_list"><span>Клубы</span></li>
                            <li class="btn-plus btn-plus-club"><span class="glyphicon glyphicon-plus"></span></li>
                        </ul>
                    </div>
                </div>
                <div class="search_wrap  search_wrap_event" data-type-search="event">
                    <div class="list-search event_search_box">
                        <form method="POST" action="" class="line-search">
                            <div class="input-group input-group-sm">
                                <input id="search_event_input" data-type="event"
                                       class="form-control search_event active" type="search"
                                       placeholder="Поиск по событиям">
                                <span class="btn-search input-group-btn">
                                        <button type="button"
                                                class=" btn btn-info btn-flat-event search_event_go">Go!</button>
                                    </span>
                            </div>
                        </form>
                    </div>
                    <div class="list_information col-xs-8">
                        <ul class="list_data">

                        </ul>
                    </div>
                </div>
                <!--                    <div class="search_wrap search_wrap_category" data-type-search="category">-->
                <!--                        <div class="list-search event_search_box">-->
                <!--                            <form method="POST" action="" class="line-search">-->
                <!--                                <div class="input-group input-group-sm">-->
                <!--                                    <input id="search_event_inut" class="form-control search_event"-->
                <!--                                           data-type="option_category" type="search" placeholder="Поиск по категориям">-->
                <!--                                    <span class="btn-search input-group-btn">-->
                <!--                                        <button type="button" class="search_event_go btn btn-info btn-flat-event search_event_go">Go!</button>-->
                <!--                                    </span>-->
                <!--                                </div>-->
                <!--                            </form>-->
                <!--                        </div>-->
                <!--                    </div>-->
                <div class="search_wrap search_wrap_club" data-type-search="club">
                    <div class="list-search event_search_box">
                        <form method="POST" action="" class="line-search">
                            <div class="input-group input-group-sm">
                                <input class="form-control search_event" data-type="club" type="search"
                                       placeholder="Поиск по клубам">
                                <span class="btn-search input-group-btn">
                                        <button type="button"
                                                class="btn btn-info btn-flat-event search_event_go">Go!</button>
                                    </span>
                            </div>
                        </form>
                    </div>
                    <div class="list_information col-xs-8">
                        <ul class="list_data">

                        </ul>
                    </div>
                </div>

                <div class="list-group">
                    <ul class="list_data_page">

                    </ul>
                </div>

                <div class="cont-box1 clear">

                </div>
                <div class="cont-box content-in" id="loading"></div>
            </div>
        </div>

    </section>
</div>

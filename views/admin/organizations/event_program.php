<?php
use components\Router;

?>
<div class="content-wrapper">
    <section class="content-header"></section>
    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-xs-12">
                    <div class="flat select-none callout callout-success event-menu clearfix">
                        <div class="dropdown">
                            <button class="btn flat btn-default dropdown-toggle" type="button" id="chooseDepartment"
                                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                                Выбор отделения
                                <span class="caret"></span>
                            </button>
                            <ul id="pick-department" class="dropdown-menu flat" aria-labelledby="chooseDepartment">
                                <?php if (!empty($departments) && $departments != false && $departments != 'DB connection error'): ?>
                                    <?php foreach ($departments as $department): ?>
                                        <li class="department-item" data-id-department="<?= $department['id']; ?>">
                                            <a><?= $department['dep_name'] ?></a>
                                        </li>
                                    <?php endforeach; ?>
                                <?php endif; ?>
                                <li role="separator" class="divider"></li>
                                <li>
                                    <a href="<?= Router::$permalink ?>admin/organizations/create_dancing_departments/<?= $_SESSION['event_id'] ?>">Создать
                                        новое</a></li>
                            </ul>
                        </div>
                        <span class="text-bold" id="department-name"></span>
                        <span class="event-menu-item text-bold"
                              data-content="finished-categories">Завершенные туры</span>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 box box-success flat">
                    <ul class="category-main-holder select-none">
                        <li class="draggable category" data-id="01" data-checkstatus='unchecked'>
                            <div class="highlighter highlighterTop"></div>
                            <div class="category-settings clearfix">
                                <span class="count-number">1.</span>
                                <div class="count-system-wrapper clearfix" data-checkstatus='unchecked'>
                                    <span class="count-system">СПР</span>
                                    <div class="dropdown count-system-dropdown">
                                        <button class="btn flat btn-default dropdown-toggle" type="button"
                                                id="chooseCountSystem" data-toggle="dropdown" aria-haspopup="true"
                                                aria-expanded="true">
                                            <span class="caret"></span>
                                        </button>
                                        <ul class="dropdown-menu flat" aria-labelledby="chooseCountSystem">
                                            <li class="count-system-variant"><a>SPR 1</a></li>
                                            <li class="count-system-variant"><a>SPR 2</a></li>
                                            <li class="count-system-variant"><a>SPR 3</a></li>
                                        </ul>
                                    </div>
                                </div>
                                <p class="category-name main-content">Hip-hop dance pro style Cool&Brutal mix.</p>
                                <span class="participants-number"><span
                                            class="the-participants-number">173</span>чел.</span>
                                <div class="round-wrapper clearfix" data-checkstatus='unchecked'>
                                    <span class="round-selected">ТУР</span>
                                    <div class="dropdown round-dropdown">
                                        <button class="btn flat btn-default dropdown-toggle" type="button"
                                                id="chooseRound" data-toggle="dropdown" aria-haspopup="true"
                                                aria-expanded="true">
                                            <span class="caret"></span>
                                        </button>
                                        <ul class="dropdown-menu flat" aria-labelledby="chooseRound">
                                            <li class="round-variant"><a>1/16</a></li>
                                            <li class="round-variant"><a>1/8</a></li>
                                            <li class="round-variant"><a>1/4</a></li>
                                            <li class="round-variant"><a>1/2</a></li>
                                            <li role="separator" class="divider"></li>
                                            <li class="new-round"><a>создать новое...</a></li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="input-wrapper">
                                    <label class="participants-in-round">К-во <input class="participants-in-round-input"
                                                                                     data-checkstatus='unchecked'
                                                                                     type="text"></label>
                                    <label class="entrance-number">Заходы <input class="entrance-number-input"
                                                                                 data-checkstatus='unchecked'
                                                                                 type="text"></label>
                                </div>
                                <div class="show-dancers">
                                    <button type="button" title="показать участников"
                                            class="btn show-dancers-btn flat btn-default" aria-label="Left Align">
                                        <i class="fa fa-chevron-down" aria-hidden="true"></i>
                                    </button>
                                </div>
                            </div>
                            <div class="highlighter highlighterBot"></div>
                            <ul class="participants-holder level-2" data-searchClass="draggable2">
                                <li class="draggable2 level-2-draggable participant" data-id="01">
                                    <div class="highlighter highlighterTop"></div>
                                    <div class="main-content">
                                        <span class="participant-number" title="номер участника">1.</span>
                                        <span class="participant-name" title="имя участника">Эмгыр вар Эмрейс</span>
                                        <span class="participant-club" title="клуб участника">Нильфгаард</span>
                                        <span class="participant-city" title="город участника">Sodden</span>
                                        <span class="participant-coach" title="тренер участника">Sam Sebe Coach</span>
                                        <div class="btn-group btn-group-sm" role="group">
                                            <button type="button" title="оценить участника" class="btn flat btn-primary"
                                                    aria-label="Left Align">
                                                <i class="fa fa-star"></i>
                                            </button>
                                            <button type="button" title="убрать участника" class="btn flat btn-danger"
                                                    aria-label="Left Align">
                                                <i class="fa fa-trash"></i>
                                            </button>
                                        </div>

                                    </div>
                                    <div class="highlighter highlighterBot"></div>
                                </li>
                                <li class="draggable2 level-2-draggable participant" data-id="02">
                                    <div class="highlighter highlighterTop"></div>
                                    <div class="main-content">
                                        <span class="participant-number" title="номер участника">12.</span>
                                        <span class="participant-name" title="имя участника">Риенс</span>
                                        <span class="participant-club" title="клуб участника">Нильфгаард</span>
                                        <span class="participant-city" title="город участника">Хер знает</span>
                                        <span class="participant-coach" title="тренер участника">Вильгефорц</span>
                                        <div class="btn-group btn-group-sm" role="group">
                                            <button type="button" title="оценить участника" class="btn flat btn-primary"
                                                    aria-label="Left Align">
                                                <i class="fa fa-star"></i>
                                            </button>
                                            <button type="button" title="убрать участника" class="btn flat btn-danger"
                                                    aria-label="Left Align">
                                                <i class="fa fa-trash"></i>
                                            </button>
                                        </div>
                                    </div>
                                    <div class="highlighter highlighterBot"></div>
                                </li>
                                <li class="draggable2 level-2-draggable participant" data-id="03">
                                    <div class="highlighter highlighterTop"></div>
                                    <div class="main-content">
                                        <span class="participant-number" title="номер участника">1.</span>
                                        <span class="participant-name" title="имя участника">Кагыр Маффин Дыфин аэп Каелах</span>
                                        <span class="participant-club" title="клуб участника">Нильфгаард</span>
                                        <span class="participant-city" title="город участника">Хер знает</span>
                                        <span class="participant-coach" title="тренер участника">Эмгыр</span>
                                        <div class="btn-group btn-group-sm" role="group">
                                            <button type="button" title="оценить участника" class="btn flat btn-primary"
                                                    aria-label="Left Align">
                                                <i class="fa fa-star"></i>
                                            </button>
                                            <button type="button" title="убрать участника" class="btn flat btn-danger"
                                                    aria-label="Left Align">
                                                <i class="fa fa-trash"></i>
                                            </button>
                                        </div>
                                    </div>
                                    <div class="highlighter highlighterBot"></div>
                                </li>
                            </ul>
                        </li>
                        <li class="draggable category" data-id="02" data-checkstatus='unchecked'>
                            <div class="highlighter highlighterTop"></div>
                            <div class="category-settings clearfix">
                                <span class="count-number">1.</span>
                                <div class="count-system-wrapper clearfix" data-checkstatus='unchecked'>
                                    <span class="count-system">СПР</span>
                                    <div class="dropdown count-system-dropdown">
                                        <button class="btn flat btn-default dropdown-toggle" type="button"
                                                id="chooseCountSystem" data-toggle="dropdown" aria-haspopup="true"
                                                aria-expanded="true">
                                            <span class="caret"></span>
                                        </button>
                                        <ul class="dropdown-menu flat" aria-labelledby="chooseCountSystem">
                                            <li class="count-system-variant"><a>SPR 1</a></li>
                                            <li class="count-system-variant"><a>SPR 2</a></li>
                                            <li class="count-system-variant"><a>SPR 3</a></li>
                                        </ul>
                                    </div>
                                </div>
                                <p class="category-name main-content">Hip-hop dance pro style Cool&Brutal mix.</p>
                                <span class="participants-number"><span
                                            class="the-participants-number">173</span>чел.</span>
                                <div class="round-wrapper clearfix" data-checkstatus='unchecked'>
                                    <span class="round-selected">ТУР</span>
                                    <div class="dropdown round-dropdown">
                                        <button class="btn flat btn-default dropdown-toggle" type="button"
                                                id="chooseRound" data-toggle="dropdown" aria-haspopup="true"
                                                aria-expanded="true">
                                            <span class="caret"></span>
                                        </button>
                                        <ul class="dropdown-menu flat" aria-labelledby="chooseRound">
                                            <li class="round-variant"><a>1/16</a></li>
                                            <li class="round-variant"><a>1/8</a></li>
                                            <li class="round-variant"><a>1/4</a></li>
                                            <li class="round-variant"><a>1/2</a></li>
                                            <li role="separator" class="divider"></li>
                                            <li class="new-round"><a>создать новое...</a></li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="input-wrapper">
                                    <label class="participants-in-round">К-во <input class="participants-in-round-input"
                                                                                     data-checkstatus='unchecked'
                                                                                     type="text"></label>
                                    <label class="entrance-number">Заходы <input class="entrance-number-input"
                                                                                 data-checkstatus='unchecked'
                                                                                 type="text"></label>
                                </div>
                                <div class="show-dancers">
                                    <button type="button" title="показать участников"
                                            class="btn show-dancers-btn flat btn-default" aria-label="Left Align">
                                        <i class="fa fa-chevron-down" aria-hidden="true"></i>
                                    </button>
                                </div>
                            </div>
                            <div class="highlighter highlighterBot"></div>
                            <ul class="participants-holder level-2" data-searchClass="draggable3">
                                <li class="draggable3 level-2-draggable participant" data-id="03">
                                    <div class="highlighter highlighterTop"></div>
                                    <div class="main-content">
                                        <span class="participant-number" title="номер участника">1.</span>
                                        <span class="participant-name" title="имя участника">Эмгыр вар Эмрейс</span>
                                        <span class="participant-club" title="клуб участника">Нильфгаард</span>
                                        <span class="participant-city" title="город участника">Sodden</span>
                                        <span class="participant-coach" title="тренер участника">Sam Sebe Coach</span>
                                        <div class="btn-group btn-group-sm" role="group">
                                            <button type="button" title="оценить участника" class="btn flat btn-primary"
                                                    aria-label="Left Align">
                                                <i class="fa fa-star"></i>
                                            </button>
                                            <button type="button" title="убрать участника" class="btn flat btn-danger"
                                                    aria-label="Left Align">
                                                <i class="fa fa-trash"></i>
                                            </button>
                                        </div>

                                    </div>
                                    <div class="highlighter highlighterBot"></div>
                                </li>
                                <li class="draggable3 level-2-draggable participant" data-id="02">
                                    <div class="highlighter highlighterTop"></div>
                                    <div class="main-content">
                                        <span class="participant-number" title="номер участника">12.</span>
                                        <span class="participant-name" title="имя участника">Риенс</span>
                                        <span class="participant-club" title="клуб участника">Нильфгаард</span>
                                        <span class="participant-city" title="город участника">Хер знает</span>
                                        <span class="participant-coach" title="тренер участника">Вильгефорц</span>
                                        <div class="btn-group btn-group-sm" role="group">
                                            <button type="button" title="оценить участника" class="btn flat btn-primary"
                                                    aria-label="Left Align">
                                                <i class="fa fa-star"></i>
                                            </button>
                                            <button type="button" title="убрать участника" class="btn flat btn-danger"
                                                    aria-label="Left Align">
                                                <i class="fa fa-trash"></i>
                                            </button>
                                        </div>
                                    </div>
                                    <div class="highlighter highlighterBot"></div>
                                </li>
                                <li class="draggable3 level-2-draggable participant" data-id="03">
                                    <div class="highlighter highlighterTop"></div>
                                    <div class="main-content">
                                        <span class="participant-number" title="номер участника">1.</span>
                                        <span class="participant-name" title="имя участника">Кагыр Маффин Дыфин аэп Каелах</span>
                                        <span class="participant-club" title="клуб участника">Нильфгаард</span>
                                        <span class="participant-city" title="город участника">Хер знает</span>
                                        <span class="participant-coach" title="тренер участника">Эмгыр</span>
                                        <div class="btn-group btn-group-sm" role="group">
                                            <button type="button" title="оценить участника" class="btn flat btn-primary"
                                                    aria-label="Left Align">
                                                <i class="fa fa-star"></i>
                                            </button>
                                            <button type="button" title="убрать участника" class="btn flat btn-danger"
                                                    aria-label="Left Align">
                                                <i class="fa fa-trash"></i>
                                            </button>
                                        </div>
                                    </div>
                                    <div class="highlighter highlighterBot"></div>
                                </li>
                            </ul>
                        </li>
                        <li class="draggable category" data-id="03" data-checkstatus='unchecked'>
                            <div class="highlighter highlighterTop"></div>
                            <div class="category-settings clearfix">
                                <span class="count-number">1.</span>
                                <div class="count-system-wrapper clearfix" data-checkstatus='unchecked'>
                                    <span class="count-system">СПР</span>
                                    <div class="dropdown count-system-dropdown">
                                        <button class="btn flat btn-default dropdown-toggle" type="button"
                                                id="chooseCountSystem" data-toggle="dropdown" aria-haspopup="true"
                                                aria-expanded="true">
                                            <span class="caret"></span>
                                        </button>
                                        <ul class="dropdown-menu flat" aria-labelledby="chooseCountSystem">
                                            <li class="count-system-variant"><a>SPR 1</a></li>
                                            <li class="count-system-variant"><a>SPR 2</a></li>
                                            <li class="count-system-variant"><a>SPR 3</a></li>
                                        </ul>
                                    </div>
                                </div>
                                <p class="category-name main-content">Hip-hop dance pro style Cool&Brutal mix.</p>
                                <span class="participants-number"><span
                                            class="the-participants-number">173</span>чел.</span>
                                <div class="round-wrapper clearfix" data-checkstatus='unchecked'>
                                    <span class="round-selected">ТУР</span>
                                    <div class="dropdown round-dropdown">
                                        <button class="btn flat btn-default dropdown-toggle" type="button"
                                                id="chooseRound" data-toggle="dropdown" aria-haspopup="true"
                                                aria-expanded="true">
                                            <span class="caret"></span>
                                        </button>
                                        <ul class="dropdown-menu flat" aria-labelledby="chooseRound">
                                            <li class="round-variant"><a>1/16</a></li>
                                            <li class="round-variant"><a>1/8</a></li>
                                            <li class="round-variant"><a>1/4</a></li>
                                            <li class="round-variant"><a>1/2</a></li>
                                            <li role="separator" class="divider"></li>
                                            <li class="new-round"><a>создать новое...</a></li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="input-wrapper">
                                    <label class="participants-in-round">К-во <input class="participants-in-round-input"
                                                                                     data-checkstatus='unchecked'
                                                                                     type="text"></label>
                                    <label class="entrance-number">Заходы <input class="entrance-number-input"
                                                                                 data-checkstatus='unchecked'
                                                                                 type="text"></label>
                                </div>
                                <div class="show-dancers">
                                    <button type="button" title="показать участников"
                                            class="btn show-dancers-btn flat btn-default" aria-label="Left Align">
                                        <i class="fa fa-chevron-down" aria-hidden="true"></i>
                                    </button>
                                </div>
                            </div>
                            <div class="highlighter highlighterBot"></div>
                            <ul class="participants-holder level-2" data-searchClass="draggable4">
                                <li class="draggable4 level-2-draggable participant" data-id="01">
                                    <div class="highlighter highlighterTop"></div>
                                    <div class="main-content">
                                        <span class="participant-number" title="номер участника">1.</span>
                                        <span class="participant-name" title="имя участника">Эмгыр вар Эмрейс</span>
                                        <span class="participant-club" title="клуб участника">Нильфгаард</span>
                                        <span class="participant-city" title="город участника">Sodden</span>
                                        <span class="participant-coach" title="тренер участника">Sam Sebe Coach</span>
                                        <div class="btn-group btn-group-sm" role="group">
                                            <button type="button" title="оценить участника" class="btn flat btn-primary"
                                                    aria-label="Left Align">
                                                <i class="fa fa-star"></i>
                                            </button>
                                            <button type="button" title="убрать участника" class="btn flat btn-danger"
                                                    aria-label="Left Align">
                                                <i class="fa fa-trash"></i>
                                            </button>
                                        </div>

                                    </div>
                                    <div class="highlighter highlighterBot"></div>
                                </li>
                                <li class="draggable4 level-2-draggable participant" data-id="02">
                                    <div class="highlighter highlighterTop"></div>
                                    <div class="main-content">
                                        <span class="participant-number" title="номер участника">12.</span>
                                        <span class="participant-name" title="имя участника">Риенс</span>
                                        <span class="participant-club" title="клуб участника">Нильфгаард</span>
                                        <span class="participant-city" title="город участника">Хер знает</span>
                                        <span class="participant-coach" title="тренер участника">Вильгефорц</span>
                                        <div class="btn-group btn-group-sm" role="group">
                                            <button type="button" title="оценить участника" class="btn flat btn-primary"
                                                    aria-label="Left Align">
                                                <i class="fa fa-star"></i>
                                            </button>
                                            <button type="button" title="убрать участника" class="btn flat btn-danger"
                                                    aria-label="Left Align">
                                                <i class="fa fa-trash"></i>
                                            </button>
                                        </div>
                                    </div>
                                    <div class="highlighter highlighterBot"></div>
                                </li>
                                <li class="draggable4 level-2-draggable participant" data-id="03">
                                    <div class="highlighter highlighterTop"></div>
                                    <div class="main-content">
                                        <span class="participant-number" title="номер участника">1.</span>
                                        <span class="participant-name" title="имя участника">Кагыр Маффин Дыфин аэп Каелах</span>
                                        <span class="participant-club" title="клуб участника">Нильфгаард</span>
                                        <span class="participant-city" title="город участника">Хер знает</span>
                                        <span class="participant-coach" title="тренер участника">Эмгыр</span>
                                        <div class="btn-group btn-group-sm" role="group">
                                            <button type="button" title="оценить участника" class="btn flat btn-primary"
                                                    aria-label="Left Align">
                                                <i class="fa fa-star"></i>
                                            </button>
                                            <button type="button" title="убрать участника" class="btn flat btn-danger"
                                                    aria-label="Left Align">
                                                <i class="fa fa-trash"></i>
                                            </button>
                                        </div>
                                    </div>
                                    <div class="highlighter highlighterBot"></div>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->
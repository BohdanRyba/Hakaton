<?php
use components\Router;

?>
<div class="content-wrapper">
    <section class="content-header"></section>
    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-xs-12 print-header">
                    <h1>Бланк события</h1>
                    <?php if (!empty($current_event) && !empty($organization)): ?>
                        <p id="org-name"><?= $organization['org_name'] ?></p>
                        <p id="event-title"><?= $current_event['event_status'] ?></p>
                        <p id="event-name"><?= $current_event['event_name'] ?></p>
                        <p id="event-info">
                            <span id="date"><?= $current_event['event_start'] ?> - <?= $current_event['event_end'] ?>
                                , </span>
                            <span id="location"><?= $current_event['event_country'] ?>
                                , <?= $current_event['event_city'] ?></span></p>
                        <p id="event-department"></p>
                    <?php endif; ?>
                </div>
                <div class="col-xs-12">
                    <div class="flat callout callout-success event-menu clearfix">
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
                        <button type="button" id="print-event" class="btn btn-default"><i class="fa fa-print"
                                                                                          aria-hidden="true"></i>
                        </button>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 box box-success flat">
                    <ul class="category-main-holder">
                    </ul>
                </div>
            </div>
        </div>
    </section>
</div>

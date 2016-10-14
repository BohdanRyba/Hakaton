<?php

return array(
    'index.php' => 'home/index',
    'news/page/([0-9]+)' => 'news/index/$1',
    'news/single/([0-9]+)' => 'news/view/$1',
    'home' => 'home/index',
    'login' => 'login/index',
    'registration' => 'login/registration',
    'out' => 'login/out',
    'addnews' => 'addnews/index',
    'record' => 'addnews/record',
    'events' => 'events/index',
    'addevent' => 'addevent/index',
    'create_event' => 'addevent/create',
    '' => 'home/index',
);
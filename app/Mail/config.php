<?php

return [
    'driver' => env('MAIL_DRIVER', 'smtp'),
    'host' => env('MAIL_HOST', 'smtp.gmail.org'),
    'port' => env('MAIL_PORT', 465),
    'from' => [
        'address' => env('farzamamjad0@gmail.com', 'farzamamjad0@gmail.com'),
        'name' => env('Farzam', 'Farzam'),
    ],
    'encryption' => env('ssl', 'ssl'),
    'username' => env('farzamamjad0Gmail.com'),
    'password' => env('Fa03200489980'),
    'sendmail' => '/usr/sbin/sendmail -bs',
    'markdown' => [
        'theme' => 'default',

        'paths' => [
            resource_path('views/mail'),
        ],
    ],

];

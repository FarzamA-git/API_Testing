<?php

return [
    'driver' => env('MAIL_DRIVER', 'smtp'),
    'host' => env('MAIL_HOST', 'smtp.gmail.org'),
    'port' => env('MAIL_PORT', 465),
    'from' => [
        'address' => env('sample@gmail.com', 'sample@gmail.com'),
        'name' => env('Farzam', 'Farzam'),
    ],
    'encryption' => env('ssl', 'ssl'),
    'username' => env('Enter your name'),
    'password' => env('Enter your password'),
    'sendmail' => '/usr/sbin/sendmail -bs',
    'markdown' => [
        'theme' => 'default',

        'paths' => [
            resource_path('views/mail'),
        ],
    ],

];

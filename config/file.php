<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Default disk
    |--------------------------------------------------------------------------
    |
    | Here you may specify the default disk.
    |
    */

    'default' => 'local',

    /*
    |--------------------------------------------------------------------------
    | Disks mounts
    |--------------------------------------------------------------------------
    |
    | Here you may specify all disks mounting points you may require for your
    | application. 2 drivers are available: file and cloud which uses AWS S3.
    */
    
    'disks' => [
        'storage' => [
            'driver'    => Zefire\FileSystem\FileAdapter::class,
            'config'    => [
                'path' => \App::storagePath() . DIRECTORY_SEPARATOR
            ]
        ],
        'logs' => [
            'driver'    => Zefire\FileSystem\FileAdapter::class,
            'config'    => [
                'path' => \App::logPath() . DIRECTORY_SEPARATOR
            ]
        ],
        'templates' => [
            'driver'    => Zefire\FileSystem\FileAdapter::class,
            'config'    => [
                'path' => \App::templatePath() . DIRECTORY_SEPARATOR
            ]
        ],
        'compiled' => [
            'driver'    => Zefire\FileSystem\FileAdapter::class,
            'config'    => [
                'path' => \App::compiledPath() . DIRECTORY_SEPARATOR
            ]
        ],
        'sessions' => [
            'driver'    => Zefire\FileSystem\FileAdapter::class,
            'config'    => [
                'path' => \App::sessionPath() . DIRECTORY_SEPARATOR
            ]
        ],
        'local' => [
            'driver'    => Zefire\FileSystem\FileAdapter::class,
            'config'    => [
                'path' => \App::storagePath() . DIRECTORY_SEPARATOR . 'app' . DIRECTORY_SEPARATOR
            ]
        ],
        // 's3' => [
        //     'driver'    => Zefire\FileSystem\S3Adapter::class,
        //     'config'    => [
        //         'key'       => getenv('AWS_ACCESS_KEY_ID'),
        //         'secret'    => getenv('AWS_SECRET_ACCESS_KEY'),
        //         'region'    => getenv('AWS_REGION'),
        //         'version'   => 'latest',
        //         'bucket'    => ''
        //     ],
        // ],
    ],
];
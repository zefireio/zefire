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
            'driver'    => 'file',
            'root'      => \App::storagePath() . DIRECTORY_SEPARATOR,
        ],
        'logs' => [
            'driver'    => 'file',
            'root'      => \App::logPath() . DIRECTORY_SEPARATOR,
        ],
        'templates' => [
            'driver'    => 'file',
            'root'      => \App::templatePath() . DIRECTORY_SEPARATOR,
        ],
        'compiled' => [
            'driver'    => 'file',
            'root'      => \App::compiledPath() . DIRECTORY_SEPARATOR,
        ],
        'sessions' => [
            'driver'    => 'file',
            'root'      => \App::sessionPath() . DIRECTORY_SEPARATOR,
        ],
        'local' => [
            'driver'    => 'file',
            'root'      => \App::storagePath() . DIRECTORY_SEPARATOR . 'app' . DIRECTORY_SEPARATOR,
        ],
        // 's3' => [
        //     'driver'    => 'cloud',
        //     'key'       => getenv('AWS_KEY'),
        //     'secret'    => getenv('AWS_SECRET'),
        //     'region'    => getenv('AWS_REGION'),
        //     'version'   => 'latest',
        //     'bucket'    => '',
        // ],
	],
];
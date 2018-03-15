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
		'local' => [
            'driver'    => 'file',
            'root'      => \App::storagePath() . 'app' . DIRECTORY_SEPARATOR,
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
<?php

return new \Phalcon\Config(array(
	'database' => array(
		'adapter'  => 'Mysql',
		'host'     => 'localhost',
		'username' => 'admin',
		'password' => '',
		'name'     => 'test',
	),

    'application' => array(
        'controllersDir'    => __DIR__.'/../controllers/',
        'modelsDir'         => __DIR__.'/../models/',
        'viewsDir'          => __DIR__.'/../views/',
        'cacheDir'          => __DIR__.'/../../../cache/',

    )
));

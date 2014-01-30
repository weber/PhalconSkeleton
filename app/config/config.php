<?php

return new \Phalcon\Config(array(
    'tyres_db' => array(
        'adapter'     => 'Mysql',
        'host'        => 'localhost',
        'username'    => 'admin',
        'password'    => '',
        'dbname'      => 'tyres_db',
    ),
    'wheels_db' => array(
        'adapter'     => 'Mysql',
        'host'        => 'localhost',
        'username'    => 'admin',
        'password'    => '',
        'dbname'      => 'wheels_db',
    ),
    'vehicle_db' => array(
        'adapter'     => 'Mysql',
        'host'        => 'localhost',
        'username'    => 'admin',
        'password'    => '',
        'dbname'      => 'vehicle_db',
    ),

    'application' => array(
        'controllersDir'    => DIR_APP . 'controllers/',
        'viewsDir'          => DIR_APP . 'views/',
        'pluginsDir'        => DIR_APP . 'plugins/',
        'libraryDir'        => DIR_APP . 'library/',
        'cacheDir'          => DIR_APP . 'cache/',
        'baseUri'           => '/',
    ),
    'class'=>array(
        'Components\ModelBase'          => DIR_APP . "components/ModelBase.php",
        'Components\ModuleBase'         => DIR_APP . "components/ModuleBase.php",
        'Components\ControllerBase'     => DIR_APP . "components/ControllerBase.php",
    ),

));

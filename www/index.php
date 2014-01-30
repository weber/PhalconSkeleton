<?php

error_reporting(E_ALL | E_NOTICE | E_STRICT);
(new Phalcon\Debug)->listen();

try
{
    define('DIR_APP',dirname(dirname(__FILE__)).DIRECTORY_SEPARATOR.'app'.DIRECTORY_SEPARATOR);
    define('DIR_CONFIG',DIR_APP.'config'.DIRECTORY_SEPARATOR);
    define('DIR_MODULES',DIR_APP.'modules'.DIRECTORY_SEPARATOR);

    /**
     * Read the configuration
     */
    //Главный конфиг
    $config = require_once DIR_CONFIG . "config.php";

    //Регистрация модулей
    $modules = require_once DIR_CONFIG . "modules.php";

    /**
     * Read auto-loader
     */
    require_once DIR_CONFIG . "loader.php";

    /**
     * Read services
     */
    require_once DIR_CONFIG . "services.php";

    /**
     * Handle the request
     */
    $application = new \Phalcon\Mvc\Application($di);

    // Регистрация установленных модулей
    $application->registerModules($modules);

    //$fff = new Components\ModuleBase();
    echo $application->handle()->getContent();
}
catch (\Exception $e)
{
    echo $e->getMessage();
}

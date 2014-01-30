<?php

use Phalcon\DI\FactoryDefault;
use Phalcon\Mvc\View;
use Phalcon\Mvc\Url as UrlResolver;
use Phalcon\Db\Adapter\Pdo\Mysql as DbAdapter;
use Phalcon\Mvc\View\Engine\Volt as VoltEngine;
use Phalcon\Mvc\Model\Metadata\Memory as MetaDataAdapter;


/**
 * The FactoryDefault Dependency Injector automatically register the right services providing a full stack framework
 */
$di = new FactoryDefault();

/**
 * The URL component is used to generate all kind of urls in the application
 */
$di->set('url', function () use ($config) {
    $url = new UrlResolver();
    $url->setBaseUri($config->application->baseUri);

    return $url;
}, true);

/**
 * Setting up the view component
 */
$di->set('view', function () use ($config) {

        $view = new View();

        $view->setViewsDir($config->application->viewsDir);

        $view->registerEngines(array(
                                    '.volt' => function ($view, $di) use ($config) {

                                            $volt = new VoltEngine($view, $di);

                                            $volt->setOptions(array(
                                                                   'compiledPath' => $config->application->cacheDir,
                                                                   'compiledSeparator' => '_'
                                                              ));

                                            return $volt;
                                        },
                                    '.phtml' => 'Phalcon\Mvc\View\Engine\Php'
                               ));

        return $view;
    }, true);


/**
 * Database connection is created based in the parameters defined in the configuration file
 */
$di->setShared('dbtyres', function () use ($config) {
    return new DbAdapter(array(
        'host' => $config->tyres_db->host,
        'username' => $config->tyres_db->username,
        'password' => $config->tyres_db->password,
        'dbname' => $config->tyres_db->dbname
    ));
});

$di->setShared('dbwheels', function () use ($config) {
        return new DbAdapter(array(
            'host' => $config->wheels_db->host,
            'username' => $config->wheels_db->username,
            'password' => $config->wheels_db->password,
            'dbname' => $config->wheels_db->dbname
        ));
    });

$di->setShared('dbvehicle', function () use ($config) {
        return new DbAdapter(array(
            'host' => $config->vehicle_db->host,
            'username' => $config->vehicle_db->username,
            'password' => $config->vehicle_db->password,
            'dbname' => $config->vehicle_db->dbname
        ));
    });

/**
 * Routes file
 */
$di->set('router', function(){
    $router = new \Phalcon\Mvc\Router();
    require_once dirname(__FILE__).'/routes.php';
    return $router;
});

/**
 * Dispatcher
 */
use \Phalcon\Mvc\Dispatcher as PhDispatcher;

$di->set('dispatcher',function() use ($di)
    {
        $evManager = $di->getShared('eventsManager');

        $evManager->attach(
            "dispatch:beforeException",
            function($event, $dispatcher, $exception)
            {
                switch ($exception->getCode()) {
                    case PhDispatcher::EXCEPTION_HANDLER_NOT_FOUND:
                    case PhDispatcher::EXCEPTION_ACTION_NOT_FOUND:
                        $dispatcher->forward(
                            array(
                                'controller' => 'error',
                                'action'     => 'show404',
                            )
                        );
                        return false;
                }
            }
        );
        $dispatcher = new PhDispatcher();
        $dispatcher->setEventsManager($evManager);
        return $dispatcher;
    },
    true
);

/**
 * If the configuration specify the use of metadata adapter use it or use memory otherwise
 */
$di->set('modelsMetadata', function () {
    return new MetaDataAdapter();
});

/**
 * Start the session the first time some component request the session service
 */
$di->setShared('session', function () {
    $session = new Phalcon\Session\Adapter\Files();
    $session->start();
    return $session;
});
$di->set('assets', function () {
        $assets= new Phalcon\Assets\Manager();
        require_once dirname(__FILE__).'/assets.php';
        return $assets;
}, true);



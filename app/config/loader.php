<?php
/**
 * Автозагрузчик
 */

$loader = new \Phalcon\Loader();

$loader->registerClasses((array)$config->class)->register();

//Регистрация подключенных моделий модулей.(Для доступа к модели выбранного модуля из других мест)
$array_modules=[];
foreach($modules as  $module_name =>$module)
{
    $module_name_namespace=ucfirst($module_name);
    $array_modules["Modules\\{$module_name_namespace}\\Models"]=DIR_APP . "modules/{$module_name}/models/";
}
$loader->registerNamespaces($array_modules)->register();

/**
 * We're a registering a set of directories taken from the configuration file
 */
$loader->registerDirs(
    array(
        $config->application->controllersDir,
        $config->application->modelsDir,
    )
)->register();


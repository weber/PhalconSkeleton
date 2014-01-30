<?php
/**
 * User: webs
 * Date: 16.01.14
 * Time: 18:17
 * Базовый класс модуля.
 * Авто подгрузкой контроллеров, моделей и представлений.
 * Если нужно расширить возможнось модуля (своё подключение к бд,.. и т.д.)
 */

namespace Components;
use Phalcon\Loader,
    Phalcon\Mvc\Dispatcher,
    Phalcon\Mvc\View,
    Phalcon\Mvc\View\Engine\Volt as VoltEngine,
    Phalcon\Mvc\ModuleDefinitionInterface;

class ModuleBase implements ModuleDefinitionInterface
{
    //имя модуля
    private   $_module_name;

    /**
     * Устанавливаем имя модуля
     * @param string $name_module имя модуля
     *
     * @throws Exception
     */
    public function seNametModule($name_module=null)
    {
        try
        {
            if(is_null($name_module))
                throw new Exception(__METHOD__." Не задана имя модуля");

            $this->_module_name=$name_module;
        }
        catch (\Exception $e)
        {
            print "Error!: " . $e->getMessage() . "<br/>";
            die();
        }
    }

    public function getNameModule()
    {
        return $this->_module_name;
    }

    /**
     * Регистрация автозагрузчика, специфичного для  модулей
     */
    public function registerAutoloaders($di)
    {
        $loader = new Loader();
        //Регистрация модулей
        $dir_module_name = mb_strtolower($this->_module_name);

        $array_modules=array(
            "Modules\\{$this->_module_name}\\Controllers" => DIR_MODULES . $dir_module_name . DIRECTORY_SEPARATOR . 'controllers/',
            "Modules\\{$this->_module_name}\\Models" => DIR_MODULES . $dir_module_name . DIRECTORY_SEPARATOR . 'models/',
        );
        $loader->registerNamespaces($array_modules)->register();

    }

    /**
     * Регистрация специфичных сервисов для модуля
     */
    public function registerServices($di)
    {
        $dir_module_name = mb_strtolower($this->_module_name);
        $config = require_once DIR_MODULES . $dir_module_name . "/config/config.php";

        // Регистрация диспетчера
        $di->setShared('dispatcher', function() {
                $dispatcher =  new Dispatcher();
                $dispatcher->setDefaultNamespace("Modules\\{$this->_module_name}\\Controllers");
                return $dispatcher;
            });

        // Регистрация компонента представлений
        $di->set('view', function() use ($config)
        {
            $view = new View();

            $view->setViewsDir($config->application->viewsDir);
            //установка глобального Main-layout'a для модуля /views/layouts/index.volt
            $view->setLayoutsDir( "../../../views/layouts/");

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
        });

    }
} 
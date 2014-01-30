<?php
/**
 * User: webs
 * Date: 15.01.14
 * Time: 17:25
 * Подключение модулей.
 * Модули находятся в папке app/modules
 */
return array(
    'manager' => array(
        'className' => 'Modules\Manager\Module',
        'path'      => DIR_MODULES.'manager'.DIRECTORY_SEPARATOR.'Module.php',
    ),
    'catalog' => array(
        'className' => 'Modules\Catalog\Module',
        'path'      => DIR_MODULES.'catalog'.DIRECTORY_SEPARATOR.'Module.php',
    ),

);
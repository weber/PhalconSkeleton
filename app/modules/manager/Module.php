<?php
/**
 * User: webs
 * Date: 14.01.14
 * Time: 0:08
 * Модуль с наследуюмыми методов
 */
namespace Modules\Manager;

use \Components\ModuleBase;

class Module extends ModuleBase
{
    public function __construct()
    {
        $this->seNametModule('Manager');
    }
}


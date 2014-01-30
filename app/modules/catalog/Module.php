<?php
/**
 * User: webs
 * Date: 14.01.14
 * Time: 0:08
 * Модуль со своим определением методов
 */
namespace Modules\Catalog;

use \Components\ModuleBase;

class Module extends ModuleBase
{
    public function __construct()
    {
        $this->seNametModule('Catalog');
    }
}
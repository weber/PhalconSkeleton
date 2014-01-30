<?php
namespace Components;

class ControllerBase extends \Phalcon\Mvc\Controller
{
    public function initialize()
    {
        //Установка Main-layout'a для контроллера /views/layouts/index.volt
        $this->view->setLayout("index");
    }
}

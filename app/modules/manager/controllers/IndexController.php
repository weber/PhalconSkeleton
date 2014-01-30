<?php
namespace Modules\Manager\Controllers;

class IndexController extends \Components\ControllerBase
{

    public  function initialize($className=__CLASS__)
    {
        parent::initialize($className);
        //Установка Main-layout'a для текущего контроллера
        //$this->view->setLayout("main");
    }

    public function indexAction()
    {
        $some= new \Modules\Catalog\Models\Tyres();
        foreach($some->my() as $robot){
            var_dump($robot);
        }
    }

}


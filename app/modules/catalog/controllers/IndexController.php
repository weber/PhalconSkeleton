<?php
namespace Modules\Catalog\Controllers;


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

       // $this->view->posts='sdsdsd';

        $name = $this->session->get("user-name");
        echo "<h1>Это модуль </h1>";



        $some= new \Modules\Catalog\Models\Tyres();

        foreach($some->my() as $robot){
            var_dump($robot);
        }

        //$this->view->render('index/index',array('posts' =>'sdsdsd'));
    }

}


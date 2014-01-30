<?php


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
        echo"<pre>";

        $this->session->set("user-name", "Michael");
        $name = $this->session->get("user-name");
       // var_dump($name);



        echo "<h1>This is text action</h1>";

        $some= new \Modules\Catalog\Models\Tyres();
        foreach($some->my() as $robot){
            var_dump($robot);
        }

        echo"</pre>";
    }

    public function aboutAction()
    {

    }

}


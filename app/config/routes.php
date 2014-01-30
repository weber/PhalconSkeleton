<?
//$router->setDefaultModule("manager");
//:TODO: webs 18.01.14 —  не работает
/*$router->notFound( array(
                        'controller' => 'error',
                        'action' => 'show404',
                   ));*/
$router->add("/manager/", array(
                            'module'     => 'manager',
                            'controller' => 'index',
                            'action'     => 'index',
                       ));
$router->add("/catalog/", array(
                               'module'     => 'catalog',
                               'controller' => 'index',
                               'action'     => 'index',
                          ));
$router->add("/", array(
                        'controller' => 'index',
                        'action' => 'index',
                    ));

$router->add("/about/", array(
                       'controller' => 'index',
                       'action' => 'about',
                    ));





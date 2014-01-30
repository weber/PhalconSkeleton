<?php

/**
 * ErrorController
 */
class ErrorController extends \Components\ControllerBase
{
    public function show404Action()
    {
        $this->response->setHeader(404, 'Not Found');
        $this->view->classBody="error";
        $this->view->partial('error/404');
    }
}
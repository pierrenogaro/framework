<?php

namespace Core\Controller;

use Core\Http\Response;

abstract class Controller
{
    private Response $response;
    public function __construct()
    {
        $this->response = new Response();
    }

    public function render($templateName, $datas): Response
    {
        return $this->response->render($templateName, $datas);
    }
}
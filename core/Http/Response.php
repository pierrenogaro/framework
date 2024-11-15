<?php

namespace Core\Http;

use Core\View\View;

class Response
{
    public function render($templateName, $datas)
    {
        View::render($templateName, $datas);
        return $this;
    }
}
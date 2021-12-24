<?php

namespace App\Controllers;

class ErrorController extends BaseController
{
    public function __construct()
    {
        parent::__construct();
        $this->init();
    }

    public function notFoundError()
    {
        return $this->render('errors/404');
    }
}

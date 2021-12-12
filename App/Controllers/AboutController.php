<?php
namespace App\Controllers;

class AboutController extends BaseController
{
    public function index()
    {
        return $this->render('about/index');
    }
}
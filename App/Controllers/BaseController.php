<?php

namespace App\Controllers;

use App\Http\Request;
use App\Http\Response;
use League\Plates\Engine;
use Illuminate\Pagination\Paginator;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\RedirectResponse;
use App\Traits\PaginatorTrait;

class BaseController
{
    use PaginatorTrait;

    /**
     * URL mặc định để chuyển hướng khi không hợp lệ
     * 
     * @var string
     */
    public $redirect = '/';

    /**
        * View Engine
        *
        * @var \League\Plates\Engine;
        */
    public $view;

    /**
     * Http Request
     * 
     * @var \App\Http\Request
     */
    public $request;

    /**
     * Http Response
     * 
     * @var \App\Http\Response
     */
    public $response;

    /**
     * Sessions
     * 
     * @var \App\Http\Session\Session
     */
    public $session;

    public function __construct()
    {
        $this->init();

        //Nếu không có quyền truy xuất controller sẽ chuyển đến $redirect
        if (! $this->authorize()) {
            redirect($this->redirect);
        }
    }

    /**
     * Phương thức dùng để kiểm tra mỗi khi Controller được gọi
     * 
     * @return void
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Hàm khởi tạo Controller
     * 
     * @return void
     */
    public function init()
    {
        $this->request = request();
        $this->session = session();
        $this->request->setSession($this->session);
        $this->response = new Response();
        $this->view = new Engine(config('view.path'));

        Paginator::currentPageResolver(function ($pageName = 'page') {
            return $this->getCurrentPage();
        });
    }

    public function render($view, $data = [])
    {
        $this->response->headers->set('Content-Type', 'text/html');
        $this->response->setStatusCode(Response::HTTP_OK);
        $html = $this->view->render($view, $data);
        $this->response->setContent($html);
        $this->response->prepare($this->request);

        return $this->response->send();
    }

    public function redirect($route, $starusCode = 302, $headers = [])
    {
        $response = new RedirectResponse($route, $starusCode, $headers);

        return $response->send();
    }

    public function json($data = [], $status = 200, $headers = [])
    {
        $response = new JsonResponse($data, $status, $headers);

        return $response->send();
    }
}
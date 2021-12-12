<?php
namespace App\Controllers\Auth;

use App\Controllers\BaseController;
use App\Traits\UserAuthenticateTrait;


class RegisterController extends BaseController
{
    use UserAuthenticateTrait;

    public function showRegisterForm()
    {
        if (check_login()) {
            $this->redirect("/");
        }
        else {
            $errors = [];
            return $this->render('auth/register');
        }
        
    }

    public function register()
    {
        $params = $this->getParams();
        $this->sign_up($params);
    }

    public function getParams()
    {
        return [
            'username'          =>  $this->request->post('username'),
            'email'          =>  $this->request->post('email'),
            'password'          =>  $this->request->post('password'),
            'confirm_password'  =>  $this->request->post('confirm_password'),
        ];
    }
}
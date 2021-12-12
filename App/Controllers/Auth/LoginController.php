<?php

namespace App\Controllers\Auth;

use App\Controllers\BaseController;
use App\Traits\UserAuthenticateTrait;

class LoginController extends BaseController
{
    use UserAuthenticateTrait;

    public function showLoginForm()
    {
        if (check_login()) {
            $this->redirect("/");
        }
        else {
            return $this->render('auth/login');
        }
    }

    public function login()
    {
        $credentials = $this->getCredentials();
        $user = $this->authenticate($credentials);

        if($user) {
            $user->password = null;

            session()->set('user', serialize($user));
            $user->remember_me = $this->request->post('remember_me');
            if ($user->remember_me) {
                $str = serialize($user);
                $encrypted = encrypt($str, ENCRYPTION_KEY);

                $this->response->setCookie('credentials', $encrypted, time() + 3600);
            }
            session()->setFlash(\FLASH::SUCCESS, 'Hello '.auth()->username.'!');
            $this->redirect("/");
        }

        $errors[] = 'Username or Password is invalid';

        return $this->render('auth/login', ['errors' => $errors]);
    }

    public function getCredentials()
    {
        return [
            'username'  =>  $this->request->post('username'),
            'password'  =>  $this->request->post('password')
        ];
    }

    public function logout()
    {
        $this->sign_out();
        session()->setFlash(\FLASH::INFO, 'Bye!');
        $this->redirect("/");
    }
}
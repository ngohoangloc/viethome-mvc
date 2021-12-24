<?php
namespace App\Traits;

use App\Models\User;

trait UserAuthenticateTrait
{
    public function authenticate($credentials)
    {
        $user = User::where(['username' => $credentials['username']])->first();
        if ($user) {
            if (password_check($credentials['password'], $user->password)) {
                return $user;
            }
            return null;
        }
        return null;
    }

    public function sign_out()
    {
        session()->remove('user');
        if($this->request->cookie('credentials')) {
            $this->response->deleteCookie('credentials');
        }
    }

    public function sign_up($params)
    {
        $isSuccess = false;
        $errors = [];

        $pattern = '/^[a-zA-Z0-9_]{6,20}$/';
        if(!preg_match($pattern, $params['username'])) {
            $errors['username'] = 'Only letters, number, undercore and at least 6 characters long allowed!';
        }
        if(!filter_var($params['email'], FILTER_VALIDATE_EMAIL)){
            $errors['email'] = "Invalid email format";
        }
        $pattern = '/^(?=.*?[A-Z])(?=.*?[a-z^\w\s])(?=.*?[0-9]).{6,}$/';
        if(!preg_match($pattern, $params['password'])){
            $errors['password'] = 'Password must contains at least one capitalize letter and number !';
        }
        if($params['password'] !== $params['confirm_password']){
            $errors['confirm_password'] = 'Password does not match!';
        }

        $user = User::where(['username' => $params['username']])->first();
        if ($user) {
            $errors['username'] = 'This username is already taken. Please choose another one.';
        }

        if (empty($errors)){

            $params['password'] = password_encrypt($params['password']);
            $params['created_at'] = date("Y-m-d H:i:s");

            $newUser = new User();
            $newUser->username = $params['username'];
            $newUser->email = $params['email'];
            $newUser->password = $params['password'];
            $newUser->save();

            if ($newUser){
                $isSuccess = true;
            }
            else{
                $errors['failed'] = 'Registration failes. Something went wrong, please try again.';
            }
        }
        $view = 'auth/register';
        $data = [
            'errors'    => $errors,
            'params'    => $params,
        ];

        if ($isSuccess)
        {
            session()->setFlash(\FLASH::SUCCESS, 'Register success, login now!');
            $this->redirect("/register");
        } 
        else
        {
            echo $this->render($view, $data);
        }
    }

    public function updatePassword($params){
        $params['new_password'] = password_encrypt($params['new_password']);

        $updatePass = User::find($params['id']);
        $updatePass->password = $params['new_password'];
        $updatePass->save();

        return $updatePass;
    }
}
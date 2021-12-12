<?php
namespace App\Controllers\Auth;

use App\Controllers\BaseController;
use App\Traits\UserAuthenticateTrait;

class ChangePasswordController extends BaseController
{
    use UserAuthenticateTrait;

    public function showChangePasswordForm()
    {
        if (!check_login()) {
            $this->redirect("/login");
        }
        else {
            return $this->render('auth/change_password');
        }
    }

    public function changePassword(){
        $params = $this->getParams();

        $credentials['username'] = $params['username'];
        $credentials['password'] = $params['old_password'];

        $isSuccess = false;
        $errors = [];

        $pattern = '/^(?=.*?[A-Z])(?=.*?[a-z])(?=.*?[0-9]).{6,}$/';
        if(!preg_match($pattern, $params['new_password'])){
            $errors['new_password'] = 'Password must contains at least one capitalize letter, number and at least 6 characters long allowed!';
        }
        if($params['new_password'] !== $params['confirm_new_password']){
            $errors['confirm_new_password'] = 'New password does not match!';
        }

        if (empty($errors)){
            $user = $this->authenticate($credentials);
            if ($user){
                $changePassword = $this->updatePassword($params);
                if($changePassword){
                    $isSuccess = true;
                }
                else{
                    $errors['failed'] = 'Change password failes. Something went wrong, please try again.';
                }
            }
            else{
                $errors['old_password'] = 'You have entered the wrong old password!';
            }

        }
        $view = 'auth/change_password';
        $data = [
            'errors'    => $errors,
            'params'    => $params,
        ];

        if ($isSuccess)
        {
            session()->setFlash(\FLASH::SUCCESS, 'Change password success!');
            $this->redirect("/profile");
        } 
        else
        {
            echo $this->render($view, $data);
        }
    }

    public function getParams(){
        return [
            'id'            =>   auth()->id,
            'username'      =>   auth()->username,
            'old_password'  =>   $this->request->post('old_password'),
            'new_password'  =>   $this->request->post('new_password'),
            'confirm_new_password'  =>  $this->request->post('confirm_new_password'),
        ];        
    }
}
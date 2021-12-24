<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Http\Response;
use App\Http\Request;
use App\Models\Profile;
use App\Models\User;

class UserController extends BaseController
{
    public function showProfile()
    {
        if (!check_login()) {
            $this->redirect("/login");
        } else {
            $this->getProfile();
        }
    }

    public function getProfile()
    {
        $user_id = auth()->id;
        $profile = Profile::where(['user_id' => $user_id])->first();

        if ($profile) {
            return $this->render('user/profile', [
                'profile' => $profile,
                'user_mail'  =>  auth()->email
            ]);
        } else {
            $empty_profile = new Profile;
            return $this->render('user/profile', [
                'profile' => $empty_profile,
                'user_mail'  =>  auth()->email
            ]);
        }
    }

    public function showUpdateProfile()
    {
        if (!check_login()) {
            $this->redirect("/login");
        } else {
            $profile = Profile::where(['user_id' => auth()->id])->first();
            $profile->email = auth()->email;
            $this->render("user/update-profile", ['params' => $profile]);
        }
    }


    public function updateProfile()
    {
        $isSuccess = false;
        $errors = [];

        $params = $this->getParams();

        $pattern = '/^(?=.*?[0-9]).{10,10}$/';
        if (!preg_match($pattern, $params['phone'])) {
            $errors['phone'] = 'Invalid phone format!';
        }

        if (empty($errors)) {
            $update_profile = Profile::where(['user_id' => $params['user_id']])->first();

            if ($update_profile) {
                $update_profile->firstname = $params['firstname'];
                $update_profile->lastname = $params['lastname'];
                $update_profile->location = $params['location'];
                $update_profile->phone = $params['phone'];

                $update_profile->save();
            } 
            else {
                $update_profile = new Profile;
                $update_profile->user_id = $params['user_id'];
                $update_profile->firstname = $params['firstname'];
                $update_profile->lastname = $params['lastname'];
                $update_profile->location = $params['location'];
                $update_profile->phone = $params['phone'];

                $update_profile->save();
            }

            if ($update_profile){
                $isSuccess = true;
            }
            else{
                $errors['failed'] = 'Update failes. Something went wrong, please try again.';
            }
        }
        $view = 'user/update-profile';
        $data = [
            'errors'    => $errors,
            'params'    => $params,
        ];

        if ($isSuccess)
        {
            session()->setFlash(\FLASH::SUCCESS, 'Update success!');
            $this->redirect("/profile");
        } 
        else
        {
            echo $this->render($view, $data);
        }
        
    }

    public function getParams()
    {
        return [
            'user_id'       =>  auth()->id,
            'firstname'     =>  $this->request->post('firstname'),
            'lastname'      =>  $this->request->post('lastname'),
            'email'         =>  $this->request->post('email'),
            'location'      =>  $this->request->post('location'),
            'phone'         =>  $this->request->post('phone'),
        ];
    }
}

<?php
namespace App\Controllers;

use App\Controllers\BaseController;
use App\Http\Response;
use App\Http\Request;
use App\Models\Profile;
use App\Models\User;

class UserController extends BaseController
{
    public function showProfile() {
        if (!check_login()) {
            $this->redirect("/login");
        }
        else {
            $this->getProfile();
        }
    }

    public function getProfile() {
        $user_id = auth()->id;
        $profile = Profile::where(['user_id'=> $user_id])->first();

        if($profile){
            return $this->render('user/profile', [
                'profile' => $profile,
                'user_mail'  =>  auth()->email
            ]);
        }
        else {
            $empty_profile = new Profile;
            return $this->render('user/profile', [
                'profile' => $empty_profile,
                'user_mail'  =>  auth()->email
            ]);
        }
    }

    public function showUpdateProfile() {
        if (!check_login()) {
            $this->redirect("/login");
        }
        else {
            $params = [];
            $params['id']           = $this->request->post('id');
            $params['firstname']    = $this->request->post('firstname');
            $params['lastname']     = $this->request->post('lastname');
            $params['location']     = $this->request->post('location');
            $params['email']        = $this->request->post('email');
            $params['phone']        = $this->request->post('phone');
            
            $this->render("user/update-profile", [
                'params'    =>  $params
            ]);
        }
    }


    public function updateProfile() {
        $params = $this->getParams();

        $update_profile = Profile::where(['user_id' => $params['user_id']])->first();
        if(!$update_profile) {
            $update_profile = new Profile;
            $update_profile->user_id = $params['user_id'];
        }
        $update_profile->firstname = $params['firstname'];
        $update_profile->lastname = $params['lastname'];
        $update_profile->location = $params['location'];
        $update_profile->phone = $params['phone'];

        $updateEmail = User::find($params['user_id']);
        $updateEmail->email = $params['email'];
        $update_profile->save();
        $updateEmail->save();
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
<?php
namespace App\Controllers;

use App\Controllers\BaseController;
use App\Http\Response;
use App\Http\Request;
use App\Models\Profile;

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
}
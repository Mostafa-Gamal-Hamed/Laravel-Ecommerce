<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Laravel\Socialite\Facades\Socialite;

class LoginController extends Controller
{
    // Google
    public function redirectGoogle(){
        return Socialite::driver('google')->redirect();
    }
    public function redirectGoogleCallback(){
        $user = Socialite::driver('google')->user();
        $this->_registerOrLoginUser($user);
        return redirect(url('home'));
    }
    protected function _registerOrLoginUser($data) {
        $user = User::where("email",'=',$data->email)->first();
        if(! $user) {
            $user = new User();
            $user->name = $data->name;
            $user->email = $data->email;
            $user->provider_id = $data->id;
            $user->save();
        }
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SocialController extends Controller
{
    public function redirect($service){
 
        return Socialite::driver($service)->redirect();
    }
}
<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\UserProfile;

class ProfileIdController extends Controller
{
    protected function getProfileId() {
        return UserProfile::where('user_id', session('users')['id'])->first()->id;
    }
}

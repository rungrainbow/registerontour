<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\UserProfile;
use App\UserEducation;
use App\UserLocation;
use App\UserParent;
use App\Question;
use App\UserAnswer;

class HomeController extends ProfileIdController
{
    public function index (Request $request) {
        $id = $request->session()->get('users')['id'];
        $profile_id = $this->getProfileId();
        $numOfQuestion = Question::get()->count();
        $numOfAnswer = UserAnswer::where('user_id', session('users')['id'])->get()->count();
        $statusArr = [
            'profile' => (UserProfile::where('user_id', $id)->first() != null),
            'education' => (UserEducation::where('profile_id', $profile_id)->first() != null),
            'location' => (UserLocation::where('profile_id', $profile_id)->first() != null),
            'parent' => (UserParent::where('profile_id', $profile_id)->first() != null),
            'camp' => false,
            'question' => $numOfQuestion == $numOfAnswer
        ];
        return view('home', [
            'status' => $statusArr
        ]);
    }
}

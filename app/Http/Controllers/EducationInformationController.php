<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\UserEducation;
use App\UserProfile;


class EducationInformationController extends ProfileIdController
{
    public function index () {
        $eduData = UserEducation::where('profile_id', $this->getProfileId())->first();
        return view('forms.education', [
            'currentData' => ($eduData != null) ? $eduData->toArray() : $eduData
        ]);
    }

    public function submit (Request $request) {
        $this->validate($request, [
            'level' => 'required|numeric|min:1|max:4',
            'plan' => 'required|string',
            'school' => 'required|string',
            'province' => 'required|string'
        ]);
        $input = $request->all();
        $userUpdate = UserEducation::updateOrCreate([
            'profile_id' => $this->getProfileId()
        ],[
            'level' => $input['level'],
            'plan' => $input['plan'],
            'grade' => 0, // For fixing not null
            'school' => $input['school'],
            'province' => $input['province']
        ]);
        return redirect('/home');
    }
}

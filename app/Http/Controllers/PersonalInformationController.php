<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\UserProfile;
use App\UserFile;

class PersonalInformationController extends ProfileIdController
{
    public function index () {
        $currentData = UserProfile::where('user_id', session('users')['id'])->first();
        if($currentData != null) {
            $userFile = UserFile::where('profile_id', $this->getProfileId())->where('directory', 'pictures')->first();
            return view('forms.personal', [
                'currentData' => $currentData->toArray(),
                'file' => ($userFile == null) ? null : $userFile->file_name
            ]); 
        }
        else {
            return view('forms.personal', [
                'currentData' => []
            ]);
        }
    }

    public function submit (Request $request) {
        $this->validate($request, [
            'name' => 'required|string',
            'lastname' => 'required|string',
            'nickname' => 'required|string',
            'dob' => 'required|date',
            'gender' => 'required|numeric|min:1|max:2',
            'religion' => 'required|string',
            'telephone' => 'required|digits_between:9,10',
            'facebook' => 'string|nullable',
            'disase' => 'string|nullable',
            'allergies' => 'string|nullable',
            'drug' => 'string|nullable',
            'picture' => 'file|max:2048'
        ]);
        $input = $request->all();
        UserProfile::updateOrCreate(
            [
                'user_id' => $request->session()->get('users')['id']
            ],
            [
                'name' => $input['name'],
                'lastname' => $input['lastname'],
                'nickname' => $input['nickname'],
                'dob' => $input['dob'],
                'gender' => $input['gender'],
                'religion' => $input['religion'],
                'telephone' => $input['telephone'],
                'disase' => $input['disase'],
                'allergies' => $input['allergies'],
                'drug' => $input['drug'],
                'facebook' => $input['facebook'],
            ]);
        if(isset($input['picture'])) {
            $file = $input['picture'];
            $fileName = session('users')['username'] . '-picture.' . $file->extension();
            $file = $file->move(storage_path('app/uploads/pictures'), $fileName);
            $file = UserFile::updateOrCreate([
                'profile_id' => $this->getProfileId(),
                'directory' => 'pictures'
            ],[
                'file_name' => $fileName
            ]);
        }
        return redirect('/home');
    }
}

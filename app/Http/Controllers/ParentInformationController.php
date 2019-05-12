<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\UserParent;
use App\UserFile;
use App\UserProfile;

class ParentInformationController extends ProfileIdController
{
    public function index () {
        $userFile = UserFile::where('profile_id', $this->getProfileId())->where('directory', 'approve-file')->first();
        $userParent = UserParent::where('profile_id', $this->getProfileId())->get()->toArray();
        $userParentArray = [];
        foreach($userParent as $value) {
            $userParentArray[$value['relation']] = $value;
        }
        return view('forms.parent',[
            'file' => (($userFile != null) ? $userFile->file_name : null),
            'currentData' => $userParentArray
        ]);
    }

    public function submit (Request $request) {
        $this->validate($request, [
            'parentname' => 'required|string',
            'parentlastname' => 'required|string',
            'parenttel' => 'required|digits_between:9,10',
            'dadname' => 'string|nullable',
            'dadlastname' => 'string|nullable',
            'dadtel' => 'digits_between:9,10|nullable',
            'momname' => 'string|nullable',
            'momlastname' => 'string|nullable',
            'momtel' => 'digits_between:9,10|nullable',
            'approvefile' => 'file|max:2048'
        ]);
        $input = $request->all();
        if(isset($input['dadname'])) {
            $dad = UserParent::updateOrCreate([
                'profile_id' => $this->getProfileId(),
                'relation' => 'dad'
            ],[
                'name' => $input['dadname'],
                'lastname' => $input['dadlastname'],
                'telephone' => $input['dadtel']
            ]);
        }
        if(isset($input['momname'])) {
            $mom = UserParent::updateOrCreate([
                'profile_id' => $this->getProfileId(),
                'relation' => 'mom'
            ],[
                'name' => $input['dadname'],
                'lastname' => $input['dadlastname'],
                'telephone' => $input['dadtel']
            ]);
        }
        $parent = UserParent::updateOrCreate([
            'profile_id' => $this->getProfileId(),
            'relation' => 'parent'
        ],[
            'name' => $input['parentname'],
            'lastname' => $input['parentlastname'],
            'telephone' => $input['parenttel']
        ]);
        if(isset($input['approvefile'])) {
            $file = $input['approvefile'];
            $fileName = session('users')['username'] . '-approve-file.' . $file->extension();
            $file = $file->move(storage_path('app/uploads/approve-file'), $fileName);
            $file = UserFile::updateOrCreate([
                'profile_id' => $this->getProfileId(),
                'directory' => 'approve-file'
            ],[
                'file_name' => $fileName
            ]);
        }
        return redirect('/home');
    }
}

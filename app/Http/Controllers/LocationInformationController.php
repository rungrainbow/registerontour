<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\UserLocation;

class LocationInformationController extends ProfileIdController
{
    public function index () {
        $locationData = UserLocation::where('profile_id', $this->getProfileId())->first();
        return view('forms.location', [
            'currentData' => ($locationData != null) ? $locationData->toArray() : $locationData
        ]);
    }

    public function submit (Request $request) {
        $this->validate($request, [
            'address' => 'required|string',
            'moo' => 'string|nullable',
            'soi' => 'string|nullable',
            'street' => 'string|nullable',
            'district' => 'required|string',
            'area' => 'required|string',
            'province' => 'required|string',
            'postcode' => 'required|digits:5'
        ]);
        $input = $request->all();
        $database = UserLocation::updateOrCreate(
            [
                'profile_id' => $this->getProfileId()
            ],
            [
                'address' => $input['address'],
                'moo' => $input['moo'],
                'soi' => $input['soi'],
                'street' => $input['street'],
                'district' => $input['district'],
                'area' => $input['area'],
                'province' => $input['province'],
                'postcode' => $input['postcode']
            ]
        );
        return redirect('/home');
    }
}

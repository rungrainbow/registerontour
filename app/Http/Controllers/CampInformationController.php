<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CampInformationController extends Controller
{
    public function index () {
        return view('forms.camp');
    }
}

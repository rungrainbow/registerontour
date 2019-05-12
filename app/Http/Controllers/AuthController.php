<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\User;

class AuthController extends Controller
{
    public function logout (Request $request)
    {
      $request->session()->forget('users');
      return redirect('/login');
    }

    public function login (Request $request) {
      if(session('users') != null) {
        return redirect('/home');
      }
      return view('auth.login');
    }

    public function processLogin (Request $request) {
      $this->validate($request, [
        'username' => 'required|alpha_num',
        'password' => 'required|min:6',
      ]);
      $input = $request->all();
      $account = User::where('username', $input['username'])->first();
      if($account != null && Hash::check($input['password'], $account->password)) {
        $request->session()->put('users', [
          'id' => $account->id,
          'email' => $account->email,
          'username' => $account->username
        ]);
        return redirect('/home');
      } else {
        return view('auth.login', [
          'loginError' => true
        ]);
      }
    }
}

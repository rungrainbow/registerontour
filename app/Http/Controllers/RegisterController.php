<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\User;

class RegisterController extends Controller
{
    public function messages()
    {
        return [
            'username.required' => 'กรุณากรอกชื่อผู้ใช้งาน',
            'username.alpha_num' => 'ชื่อผู้ใช้งานต้องเป็นตัวอักษร a-z, A-Z, 0-9',
            'password.required'  => 'กรุณากรอกรหัสผ่าน',
            'password.confirmed'  => 'รหัสผ่านไม่เหมือนกัน',
            'password.min'  => 'รหัสผ่านต้องมากกว่า 6 ตัวขึ้นไป',
        ];
    }
    public function index() {
        if(session('users') != null) {
            return redirect('/home');
        } else {
            return view('auth.register');
        }
    }

    public function submit(Request $request) {
        if(session('users') != null) {
            return redirect('/home');
        } else {
            $this->validate($request, [
                'email' => 'required|email|unique:users,email',
                'username' => 'required|alpha_num|unique:users,username',
                'password' => 'required|confirmed|min:6',
            ]);
            $input = $request->all();
            $user = User::create([
                'username' => $input['username'],
                'email' => $input['email'],
                'password' => Hash::make($input['password']),
            ]);
            session(['users' => [
                'id' => $user->id,
                'email' => $user->email,
                'username' => $user->username
            ]]);
            return redirect('/home');
        }
    }
}

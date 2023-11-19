<?php

namespace App\Http\Controllers\Account;

use App\Http\Controllers\Controller;
use App\Http\Requests\RegisterRequets;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class RegisterController extends Controller
{
    public function register(RegisterRequets $request){
        if($request->isMethod("POST")){
            $newUser = User::create([
                'full_name' => $request->fullName,
                'email' => $request->email,
                'password' => Hash::make($request->password)
            ]);

            if($newUser){
                echo "<script>sessionStorage.setItem('success', 'Đăng kí tài khoản thành công')</script>";
            }
        }
        return view('content.account.register');
    }
    //
}

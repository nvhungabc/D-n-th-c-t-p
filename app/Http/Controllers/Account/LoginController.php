<?php

namespace App\Http\Controllers\Account;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class LoginController extends Controller
{
    public function login(Request $request){
        if($request->isMethod("POST")){
            if(Auth::attempt(["email"=>$request->email,"password"=>$request->password])){
                if(Auth::user()->status == 1){
                    if(Auth::user()->role == 1){
                        Session::put('admin', 'admin');
                    }
                    return redirect()->route('index')->with('success','Đăng nhập thành công!');
                }else{
                    echo "<script>alert('Tài khoản hiện bị khóa, liên hệ Admin để được hỗ trợ')</script>";
                }
            }else{
                echo "<script>alert('Tài khoản hoặc mật khẩu không chính xác!')</script>";
            }
            // dd(1);
        }
        return view('content.account.login');
    }
    //
}

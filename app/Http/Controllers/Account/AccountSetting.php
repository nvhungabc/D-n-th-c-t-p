<?php

namespace App\Http\Controllers\Account;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;

class AccountSetting extends Controller
{

    public function profileSetting(){
        return view('content.account.profile');
    }
    public function changePassword(Request $request){
        if($request->isMethod("POST")){
            $newPassword = $request->password == $request->confirm_password ? Hash::make($request->password) : false;
            if($newPassword){
                User::where('id', Auth::user()->id)->update([
                    'password' => $newPassword
                ]);
                return redirect()->route('profileSetting')->with('success','Đổi mật khẩu thành công');
            }
        }
        return view('content.account.profile');
    }

    public function updateProfile(Request $request){
        if($request->isMethod('POST')){
            $params = $request->except('_token');
            if($request->hasFile('avatar')){
                Storage::delete('/public/'.Auth::user()->avatar);
                $params['avatar'] = uploadFile('images', $request->file('avatar'));
            }
            $result = User::where('id', Auth::user()->id)->update($params);
            if($result){
                return redirect()->route('profileSetting')->with('success','Cập nhật thông tin thành công');
            }
        }
    }
    //
}

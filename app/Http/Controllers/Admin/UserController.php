<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function listUser(){
        $users = User::all();
        return view('content.admin.user.listUser', compact('users'));
    }

    public function updateUser(Request $request){
        $user = User::find($request->id);
        if($user->status == 0){
            User::where('id', $request->id)->update(['status'=> 1]);
            return response()->json(['status'=> 200,'msg'=> 'Đã mở khóa tài khoản']);
        }else{
            User::where('id', $request->id)->update(['status'=> 0]);
            return response()->json(['status'=> 200,'msg'=> 'Đã khóa tài khoản']);
        }
        // return back()->with('success','Cập nhật thành công');
    }

    public function updateRole(Request $request){
        $user = User::find($request->id);
        if($user->role == 0){
            User::where('id', $request->id)->update(['role'=> 1]);
            return response()->json(['status'=> 200,'msg'=> 'Cấp quyền Admin cho tài khoản thành công']);
        }else{
            User::where('id', $request->id)->update(['role'=> 0]);
            return response()->json(['status'=> 200,'msg'=> 'Đã xóa quyền Admin của tài khoản']);
        }
        // return back()->with('success','Cập nhật thành công');
    }
    //
}

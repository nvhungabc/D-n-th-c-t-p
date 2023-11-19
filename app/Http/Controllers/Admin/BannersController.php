<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Banners;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;

class BannersController extends Controller
{
    public function banners(){
        $banners = Banners::all();
        return view('content.admin.banners.banner', compact('banners'));
    }

    public function add(Request $request){
        if($request->isMethod('POST')){
            // dd($request->file('images'));
            if($request->hasFile('images')){
                foreach($request->file('images') as $image){
                    $imageName = 'images/'.time().'_'.$image->getClientOriginalName();
                    $image->move(public_path('storage/images'), $imageName);
                    $newBanner = Banners::create([
                        'images' => $imageName
                    ]);
                }
                // dd($images);

                if($newBanner){
                    Session::flash('success', 'Thêm mới thành công!');
                    return redirect()->route('adminBanners');
                }
            }
        }
        return view('content.admin.banners.add');
    }

    public function remove($id){
        $banner = Banners::find($id);
        if($banner->id){
            Storage::delete('public/'.$banner->images);
            Banners::where('id', $id)->delete();
            Session::flash('success', 'Xóa thành công!');
            return redirect()->route('adminBanners');
        }
    }
    //
}

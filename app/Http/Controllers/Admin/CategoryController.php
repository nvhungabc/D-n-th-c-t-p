<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\CategoryRequests;
use App\Models\Admin\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class CategoryController extends Controller
{
    public function category(){
        $categories = Category::all();
        // dd($categories);
        return view('content.admin.category.category', compact('categories'));
    }

    public function add(CategoryRequests $request){
        // dd($request);

        if($request->isMethod('POST')){

            $params = $request->except('_token');
            // dd($params);

            $category = Category::create($params);
            if($category->id){
                Session::flash('success', 'Thêm thành công!');
                return redirect()->route('adminCategory');
            }
        }
        return view('content.admin.category.addCategory');
    }

    public function remove($id){
        Category::where('id', $id)->delete();
        Session::flash("success","Xóa thành công!");
        return redirect()->route('adminCategory');
    }

    public function edit(CategoryRequests $request, $id){
        $category = Category::find($id);
        if($request->isMethod("POST")){
            $params = $request->except('_token');
            Category::where('id', $id)->update($params);
            Session::flash("success","Sửa thành công!");
            return redirect()->route('adminCategory');
        }
        return view('content.admin.category.editCategory', compact('category'));
    }
    //
}

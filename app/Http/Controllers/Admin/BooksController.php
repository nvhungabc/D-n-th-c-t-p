<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\BookRequests;
use App\Models\Admin\Authors;
use App\Models\Admin\Category;
use App\Models\Admin\Books;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;

class BooksController extends Controller
{
    public function books(){
        $books = DB::table('books')
        ->join('categories', 'categories.id', '=','books.category_id')
        ->join('authors', 'authors.id','=','books.author_id')
        ->whereNull('books.deleted_at')
        ->select('books.*','authors.name as authorName','categories.name as categoryName')
        ->get();
        // dd($books);
        return view('content.admin.books.books', compact('books'));
    }

    public function add(BookRequests $request){
        $categories = Category::all();
        $authors = Authors::all();
        if($request->isMethod('POST')){
            $params = $request->except('_token');


            if($request->hasFile('image')){
                $params['image'] = uploadFile('images', $request->file('image'));
            }
            $newBook = Books::create($params);
            // dd($newBook->id);

            if($newBook->id){
                Session::flash('success', 'Thêm sách thành công!');
                return redirect()->route('adminBooks');
            }
        }
        return view('content.admin.books.add', compact('authors','categories'));
    }

    public function remove($id){
        $book = Books::find($id);
        // dd($book);
        if($book){
            Storage::delete('/public/'.$book->image);
            Books::where('id', $id)->delete();
            Session::flash('success', 'Xóa thành công!');
            return redirect()->route('adminBooks');
        }
    }

    public function edit(BookRequests $request, $id){
        $book = DB::table('books')
        ->join('categories', 'categories.id' ,'=','books.category_id')
        ->join('authors', 'authors.id','=','books.author_id')
        ->where('books.id','=',$id)
        ->select('books.*', 'categories.name as cate_name', 'authors.name as author_name')
        ->first();

        $categories = Category::all();
        $authors = Authors::all();

        // dd($book);

        if($request->isMethod('POST')){
            $params = $request->except('_token');
            if($request->hasFile('image')){
                Storage::delete('/public/'.$book->image);
                $params['image'] = uploadFile('images',$request->file('image'));
            }
            $result = Books::where('id', $id)->update($params);
            Session::flash('success', 'Sửa thành công!');
            return redirect()->route('adminBooks');
        }

        return view('content.admin.books.edit', compact('categories', 'authors', 'book'));
    }
    //
}

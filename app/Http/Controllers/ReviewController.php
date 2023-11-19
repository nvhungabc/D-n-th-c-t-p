<?php

namespace App\Http\Controllers;

use App\Models\Reviews;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class ReviewController extends Controller
{
    public function pushComment(Request $request){
        $comment = Reviews::create([
            'user_id' => Auth::user()->id,
            'book_id' => $request->book_id,
            'comment' => $request->textComment
        ]);
        if($comment){
            $reviews = DB::table('reviews')->join('users','users.id','=','reviews.user_id')
            ->join('books','books.id','=','reviews.book_id')
            ->where('reviews.book_id','=', $request->book_id)
            ->where('reviews.status','=', 1)
            ->orderBy('reviews.created_at','desc')
            ->limit(5)
            ->get();
            return view('content.list-comment', compact('reviews'));
        }
    }

    public function index(){
        $comments = DB::table('reviews')
        ->join('users','users.id','=','reviews.user_id')
        ->join('books','books.id','=','reviews.book_id')
        ->select('reviews.*','books.bookName','users.full_name')
        ->orderBy('reviews.created_at','desc')
        ->get();
        // dd($comments);
        return view('content.admin.comments.comments', compact('comments'));
    }

    public function actionComment($id){
        $comment = Reviews::find($id);
        if($comment->status === 0){
            Reviews::where('id', $id)->update(['status'=> 1]);
        }else{
            Reviews::where('id', $id)->update(['status'=> 0]);
        }
        return redirect()->route('Admin.comments')->with('success','Cập nhật trạng thái thành công!');
    }
    //
}

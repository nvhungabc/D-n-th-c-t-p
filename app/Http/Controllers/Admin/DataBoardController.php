<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin\Books;
use App\Models\Orders;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DataBoardController extends Controller
{
    public function databoard(){
        $countUser = User::count();
        $countBook = Books::count();
        $countOrder = Orders::count();
        $Sum_sale = DB::table("orders")->sum('total_price');

        $orderInfo = DB::table('orders')
        ->join('users', 'users.id', '=','orders.user_id')
        ->get();
        // dd($orderInfo);
        return view('content.admin.databoard', compact('countUser', 'countBook', 'countOrder', 'Sum_sale', 'orderInfo'));
    }
    //
}

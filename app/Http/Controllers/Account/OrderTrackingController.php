<?php

namespace App\Http\Controllers\Account;

use App\Http\Controllers\Controller;
use App\Models\Orders;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class OrderTrackingController extends Controller
{
    public function index(){
        $orders = DB::table("orders")
        ->where('user_id', '=', Auth::user()->id)
        ->orderBy('created_at','DESC')
        ->get();
        // dd($orders);
        return response()->json($orders);
    }
    //
}

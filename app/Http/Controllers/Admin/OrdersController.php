<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Orders;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class OrdersController extends Controller
{
    public function index(){
        // $orders = Orders::all();
        $orders = DB::table("orders")
        ->orderBy("created_at","desc")
        ->get();
        $info = [];
        if($orders){
            $order_info = [];
            foreach( $orders as $order ){
                $info = json_decode($order->customer_info);
                $detail = json_decode($order->order_detail);
                array_push($order_info, $detail);
            }
        }
        // dd($order_info);
        return view('content.admin.orders.orders', compact('orders', 'info', 'order_info'));
    }

    public function updateStatus($id){
        $order = Orders::find( $id );
        $newStatus = $order->status === 0 ? 1 : 2; //0 Chờ xác nhận, 1 Đã xác nhận, 2 Hoàn thành đơn hàng
        Orders::where("id", $id)->update(["status"=> $newStatus]);
        return redirect()->route('Admin.orders')->with('success','Cập nhật trạng thái đơn hàng thành công');
    }
    //
}

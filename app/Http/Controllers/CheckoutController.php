<?php

namespace App\Http\Controllers;

use App\Helpers\Cart;
use App\Models\Orders;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class CheckoutController extends Controller
{
   public function checkout(Request $request, Cart $cart){
    // dd($request->all());
    if($request->payment == "vnpay"){
        error_reporting(E_ALL & ~E_NOTICE & ~E_DEPRECATED);
        date_default_timezone_set('Asia/Ho_Chi_Minh');
        /**
         * Description of vnpay_ajax
         *
         * @author xonv
         */
        /*
         * To change this license header, choose License Headers in Project Properties.
         * To change this template file, choose Tools | Templates
         * and open the template in the editor.
         */

//        dd($request);
        $vnp_TmnCode = "DL0EA7AJ"; //Website ID in VNPAY System
        $vnp_HashSecret = "GOGAQDDKQGSHOENQIKCHZBMXCIZBQVXJ"; //Secret key
        $vnp_Url = "https://sandbox.vnpayment.vn/paymentv2/vpcpay.html";
        $vnp_Returnurl = route('handlePayment')
            ."?fname=$request->fname"
            ."&phone=$request->phone"
            ."&address=$request->address";
        $startTime = date("YmdHis");
        $expire = date('YmdHis', strtotime('+15 minutes', strtotime($startTime)));

        $vnp_TxnRef = rand(1000,9999); //Mã đơn hàng. Trong thực tế Merchant cần insert đơn hàng vào DB và gửi mã này sang VNPAY
        $vnp_OrderInfo = "Thanh-toan-don-hang"; //mô tả đơn hàng
        $vnp_OrderType = "billpayment";
        $vnp_Amount = $cart->getTotalPrice() * 100;
        $vnp_Locale = "vn";
        $vnp_BankCode = "NCB";
        $vnp_IpAddr = $_SERVER['REMOTE_ADDR'];

        $vnp_ExpireDate = $expire;

        $inputData = array(
            "vnp_Version" => "2.1.0",
            "vnp_TmnCode" => $vnp_TmnCode,
            "vnp_Amount" => $vnp_Amount,
            "vnp_Command" => "pay",
            "vnp_CreateDate" => date('YmdHis'),
            "vnp_CurrCode" => "VND",
            "vnp_IpAddr" => $vnp_IpAddr,
            "vnp_Locale" => $vnp_Locale,
            "vnp_OrderInfo" => $vnp_OrderInfo,
            "vnp_OrderType" => $vnp_OrderType,
            "vnp_ReturnUrl" => $vnp_Returnurl,
            "vnp_TxnRef" => $vnp_TxnRef,
            "vnp_ExpireDate" => $vnp_ExpireDate,
        );

        if (isset($vnp_BankCode) && $vnp_BankCode != "") {
            $inputData['vnp_BankCode'] = $vnp_BankCode;
        }
        // if (isset($vnp_Bill_State) && $vnp_Bill_State != "") {
        //     $inputData['vnp_Bill_State'] = $vnp_Bill_State;
        // }

//var_dump($inputData);
        ksort($inputData);
        $query = "";
        $i = 0;
        $hashdata = "";
        foreach ($inputData as $key => $value) {
            if ($i == 1) {
                $hashdata .= '&' . urlencode($key) . "=" . urlencode($value);
            } else {
                $hashdata .= urlencode($key) . "=" . urlencode($value);
                $i = 1;
            }
            $query .= urlencode($key) . "=" . urlencode($value) . '&';
        }

        $vnp_Url = $vnp_Url . "?" . $query;
        if (isset($vnp_HashSecret)) {
            $vnpSecureHash = hash_hmac('sha512', $hashdata, $vnp_HashSecret);//
            $vnp_Url .= 'vnp_SecureHash=' . $vnpSecureHash;
        }
        $returnData = array('code' => '00'
        , 'message' => 'success'
        , 'data' => $vnp_Url);
//        dd($vnp_Url);
        if ($cart->getTotalPrice() > 0) {
//            dd(123);
//            dd($vnp_Url);
            return redirect($vnp_Url);
//            return redirect()->getTargetUrl($vnp_Url);
        } else {
            echo json_encode($returnData);
        }
    }else{
        $order_id = '0123456789QWERTYUIOPASDFGHJKLZXCVBNM';
        $customer_info = [
            'fname' => $request->fname,
            'phone' => $request->phone,
            'address'=> $request->address
        ];

        $result = Orders::create([
            'user_id' => Auth::user()->id,
            'order_id' => substr(str_shuffle($order_id), 0, 10),
            'customer_info' => json_encode($customer_info),
            'order_detail' => json_encode($cart->getItems()),
            'payment' => 0, // 0 COD
            'total_price' => $cart->getTotalPrice()
        ]);
        if($result){
            // dd(Session::get('cart'));
            $cart = Session::get('cart');
            foreach($cart as $key => $item){
                unset($cart[$key]);
            }
            // dd($cart);
            Session::put('cart', $cart);
        }
        // dd($cart);
        return redirect()->route('Cart.index')->with('success','Đặt hàng thành công!');
    }

        // vui lòng tham khảo thêm tại code demo
    }

    public function handlePayment(Cart $cart){
        // dd($_GET['fname'], $_GET['phone'], $_GET['address']);
        if($_GET['vnp_ResponseCode'] == 00){
            $order_id = '0123456789QWERTYUIOPASDFGHJKLZXCVBNM';
            $customer_info = [
                'fname' => $_GET['fname'],
                'phone' => $_GET['phone'],
                'address'=> $_GET['address'],
            ];



            $result = Orders::create([
                'user_id' => Auth::user()->id,
                'order_id' => substr(str_shuffle($order_id), 0, 10),
                'customer_info' => json_encode($customer_info),
                'order_detail' => json_encode($cart->getItems()),
                'payment' => 1, //1 đã thanh toán
                'total_price' => $cart->getTotalPrice()
            ]);
            if($result){
                // dd(Session::get('cart'));
                $cart = Session::get('cart');
                foreach($cart as $key => $item){
                    unset($cart[$key]);
                }
                // dd($cart);
                Session::put('cart', $cart);
            }
            // dd($cart);
            return redirect()->route('Cart.index')->with('success','Đặt hàng thành công!');
        }else{
            return redirect()->route('Cart.index');
        }
    }
    //
}

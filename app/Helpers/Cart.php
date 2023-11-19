<?php
namespace App\Helpers;

use Illuminate\Support\Facades\Session;

class Cart{
    public $items = [];
    public $totalPrice = 0;
    public $totalQuantity = 0;

    public function __construct(){
        $this->items = Session::get("cart") ? Session::get("cart") : [];
    }

    public function getItems(){
        return $this->items;
    }

    public function getTotalPrice(){
        $totalPrice = 0;
        foreach($this->items as $item){
            $totalPrice += $item['price'] * $item['quantity'];
        }
        return $totalPrice;
    }

    public function getTotalQuantity(){
        $totalQuantity = 0;
        foreach($this->items as $item){
            $totalQuantity += $item['quantity'];
        }
        return $totalQuantity;
    }
}


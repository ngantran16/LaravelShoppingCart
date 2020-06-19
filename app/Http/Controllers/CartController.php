<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CartController extends Controller
{
    function index(){
        $cart = DB::table('carts')
                    ->join('products','carts.id_pro','=','products.id')
                    ->select('products.id','products.image','products.name','products.price', 'carts.quantity')
                    ->get();
        // echo json_encode($cart);
        return view('cart',['carts'=>$cart]);
    }
    function addToCart($id_pro){
        $date = now();
        $cart = DB::table('carts')->where('id_pro','=',$id_pro)->first();
        if (!$cart){
            DB::table('carts')->insert(
                ['id_pro'=>$id_pro, 'quantity' => 1, 'date_order'=>$date]
            );
        }
        else
        {
            $quantity = $cart->quantity +1;
            DB::table('carts')
            ->where('id_pro','=',$id_pro)
            ->update(
                ['quantity' => $quantity, 'date_order'=>$date]
            );
        }

        return redirect ('cart');
    }

    function destroyCartPro($id_pro){
        DB::table('carts')->where ('id_pro','=',$id_pro)->delete();
        return redirect('cart');
    }

    function updateQuantity($id_pro, Request $request){
        $quantity = $request->quantity;
        $date = now();
        DB::table('carts')
            ->where('id_pro','=',$id_pro)
            ->update(
                ['quantity' => $quantity, 'date_order'=>$date]
            );
            return redirect ('cart');
    }
}

<?php

namespace App\Http\Controllers;
use Gloudemans\Shoppingcart\Facades\Cart;

use Illuminate\Http\Request;
use DB;
use Session;
use Illuminate\Support\Facades\Redirect;//trả về
session_start();
class CartController extends Controller
{
    public function delete_product_ajax($session_id)
    {
            $cart=Session::get('cart');
            if($cart==true)
            {
                foreach($cart as $key =>$val)
                {
                    if($cart['session_id']==$session_id)
                    {
                        unset($cart[$key]); //unset mang vị trí $key
                    }
                }
                Session::put('cart',$cart);
                return redirect()->back()->with('message','xoá sản phẩm thành công');
            }
            else
            {
                return redirect()->back()->with('message','xoá sản phẩm thất bại');

            }
    }
    public function show_cart_ajax(Request $request)
    {
        $cate_product=DB::table('tbl_category_product')->where('category_status','0')->orderby('category_id','desc')->get();
        $brand_product=DB::table('tbl_brand_product')->where('brand_status','0')->orderby('brand_id','desc')->get();

        return view('pages.cart.show_cart_ajax')->with('category',$cate_product)->with('brand',$brand_product);
    }
    public function add_cart_ajax( Request $request)
    {
        $data=$request->all();
        $session_id=substr(md5(microtime()),rand(0,26),5);
        $cart=Session::get('cart');
        if($cart==true)
        {
            $is_avaiable=0;
            foreach($cart as $key =>$val)
            {
                if($val['product_id']==$data['cart_product_id'])
                {
                    $is_avaiable++;
                }
            }
            if($is_avaiable==0)
            {
                $cart[]=array(
                    'session_id'=>$session_id,
                    'product_name'=>$data['cart_product_name'],
                    'product_id'=>$data['cart_product_id'],
                    'product_image'=>$data['cart_product_img'],
                    'product_qty'=>$data['cart_product_qty'],
                    'product_price'=>$data['cart_product_price'],
                );
                Session::put('cart',$cart);

            }
        }
        else
        {
            $cart[]=array(
                'session_id'=>$session_id,
                'product_name'=>$data['cart_product_name'],
                'product_id'=>$data['cart_product_id'],
                'product_image'=>$data['cart_product_img'],
                'product_qty'=>$data['cart_product_qty'],
                'product_price'=>$data['cart_product_price'],
            );
        }
        Session::put('cart',$cart);
        Session::save();
    }
    public function save_cart(Request $request)
    {
        
        $productId=$request->productid_hidden;
        $quantity=$request->qty;

        $product_info=DB::table('tbl_product')->where('product_id',$productId)->get()->first();

        $data['id']=$product_info->product_id;
        $data['qty']=$quantity;
        $data['name']=$product_info->product_name;
        $data['price']=$product_info->product_price;
        $data['weight']=$product_info->product_price;
        $data['options']['image']=$product_info->product_image;
        Cart::add($data);
        return redirect('/show-cart');
        
    }
    public function show_cart()
    {
        $cate_product=DB::table('tbl_category_product')->where('category_status','0')->orderby('category_id','desc')->get();
        $brand_product=DB::table('tbl_brand_product')->where('brand_status','0')->orderby('brand_id','desc')->get();

        return view('pages.cart.show_cart')->with('category',$cate_product)->with('brand',$brand_product);
    }
    public function delete_to_cart($rowId)
    {
        Cart::update($rowId,0);
         return redirect('/show-cart');
    }
    public function update_quantity_cart(Request $request)
    {
            $rowid=$request->rowId_cart_quantity;
            $qty=$request->quantity_cart;
            Cart::update($rowid,$qty);
            return redirect('/show-cart');
    }
}

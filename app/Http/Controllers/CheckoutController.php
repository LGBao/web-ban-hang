<?php

namespace App\Http\Controllers;
use Cart;
use Illuminate\Http\Request;
use DB;
use Session;
use Illuminate\Support\Facades\Redirect;//trả về
session_start();
class CheckoutController extends Controller
{
    public function login_checkout()
    {
        $cate_product=DB::table('tbl_category_product')->where('category_status','0')->orderby('category_id','desc')->get();
        $brand_product=DB::table('tbl_brand_product')->where('brand_status','0')->orderby('brand_id','desc')->get();
        return view('pages.checkout.login_checkout')->with('category',$cate_product)->with('brand',$brand_product);
    }
    public function add_customer( Request $request)
    {
        $data=array();
        $data['customer_name']=$request->customer_name;
        $data['customer_email']=$request->customer_email;
        $data['customer_password']=md5($request->customer_password);
        $data['customer_phone']=$request->customer_phone;

        $customer_id=DB::table('tbl_customer')->insertGetId($data);
        $request->session()->put('customer_id',$customer_id);
        $request->session()->put('customer_name',$request->customer_name);
        return redirect('/checkout');
    }
    public function checkout()
    {
      
        $cate_product=DB::table('tbl_category_product')->where('category_status','0')->orderby('category_id','desc')->get();
        $brand_product=DB::table('tbl_brand_product')->where('brand_status','0')->orderby('brand_id','desc')->get();
        return view('pages.checkout.checkout')->with('category',$cate_product)->with('brand',$brand_product);
    }
    public function save_checkout_customer(Request $request)
    {
        $data=array();
        $data['shipping_name']=$request->shipping_name;
        $data['shipping_email']=$request->shipping_email;
        $data['shipping_note']=$request->shipping_note;
        $data['shipping_phone']=$request->shipping_phone;
        $data['shipping_address']=$request->shipping_address;

        $shipping_id=DB::table('tbl_shipping')->insertGetId($data);
        $request->session()->put('shipping_id',$shipping_id);
        return redirect('/payment');
    }
    public function payment()
    {

        $cate_product=DB::table('tbl_category_product')->where('category_status','0')->orderby('category_id','desc')->get();
        $brand_product=DB::table('tbl_brand_product')->where('brand_status','0')->orderby('brand_id','desc')->get();

        return view('pages.checkout.payment')->with('category',$cate_product)->with('brand',$brand_product);
    }
    public function logout_checkout()
    {
        Session::flush();
        return redirect('/login-check-out');
    }
    public function login_customer(Request $request)
    {
        $email=$request->account_email;
        $password=md5($request->account_password);

       $result=DB::table('tbl_customer')->where('customer_email',$email)->where('customer_password',$password)->first();

       if($result)
       {
        Session::put('customer_id',$result->customer_id);

        return Redirect::to('/checkout');
       }
       else{
        return Redirect::to('/login-check-out');
       }

       
    }
    public function order_place(Request $request)
    {
        $cate_product=DB::table('tbl_category_product')->where('category_status','0')->orderby('category_id','desc')->get();
        $brand_product=DB::table('tbl_brand_product')->where('brand_status','0')->orderby('brand_id','desc')->get();
        //get payment method
        $data=array();
        $data['payment_method']=$request->payment_option;
        $data['payment_status']='đang chờ xử lý';
        $payment_id=DB::table('tbl_payment')->insertGetId($data);
        //insert order
        $order_data=array();
        $order_data['customer_id']=Session::get('customer_id');
        $order_data['shipping_id']=Session::get('shipping_id');
        $order_data['payment_id']=$payment_id;
        $order_data['order_total']=Cart::total();
        $order_data['order_status']='đang chờ xử lý';
        $order_id=DB::table('tbl_order')->insertGetId($order_data);

        //insert order detail
        $content=Cart::content();
        foreach($content as $v_content)
        {
            $order_detail_data['order_id']=$order_id;
            $order_detail_data['product_id']=$v_content->id;
            $order_detail_data['product_name']=$v_content->name;
            $order_detail_data['product_price']=$v_content->price;
            $order_detail_data['product_sale_quantity']=$v_content->qty;
            DB::table('tbl_order_detail')->insert($order_detail_data);
        }
        if(  $data['payment_method']==1)
        {
            echo'thanh toán thẻ ATM';
        }
        elseif(  $data['payment_method']==2)
        {
            Cart::destroy();
            $cate_product=DB::table('tbl_category_product')->where('category_status','0')->orderby('category_id','desc')->get();
            $brand_product=DB::table('tbl_brand_product')->where('brand_status','0')->orderby('brand_id','desc')->get();
           return view('pages.checkout.handcash')->with('category',$cate_product)->with('brand',$brand_product);
        }
        else{
            echo'thẻ ghi nợ';
        }
       
     //   $order_detail_id=DB::table('tbl_order_detail')->insertGetId($data);


        // $request->session()->put('shipping_id',$shipping_id);
        // return redirect('/payment');
    }

    //admin page
    public function AuthLogin()
    {
        $admin_id=Session::get('admin_id');
        if($admin_id)
        {
            return redirect('admin.dashboard');
        }
        else
        {
            return redirect('admin')->send();
        }
    }
    public function manage_order()
    {
        $this->AuthLogin(); 
        $all_order =DB::table('tbl_order')
        ->join('tbl_customer','tbl_customer.customer_id','=','tbl_order.customer_id')
        ->select('tbl_order.*','tbl_customer.customer_name')
        ->orderby('tbl_order.order_id','desc')->get();
        $manager_order=view('admin.manage_order')->with('all_order',$all_order);

        return view('admin_layout')->with('admin.manage_order',$manager_order);
    }
    public function view_order($order_id)
    {
        $this->AuthLogin(); 
        $orderbyID =DB::table('tbl_order')
        ->join('tbl_customer','tbl_customer.customer_id','=','tbl_order.customer_id')
        ->join('tbl_shipping','tbl_shipping.shipping_id','=','tbl_order.shipping_id')
        ->join('tbl_order_detail','tbl_order_detail.order_id','=','tbl_order.order_id')
        ->select('tbl_order.*','tbl_customer.*','tbl_shipping.*','tbl_order_detail.*')->first();
        $manager_order_byID=view('admin.view_order')->with('order_by_id',$orderbyID);

        return view('admin_layout')->with('admin.view_order',$manager_order_byID);
        
    }
    public function delete_order($order_id)
    {

    }
}

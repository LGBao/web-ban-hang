<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Mail;
use Session;
use Illuminate\Support\Facades\Redirect;//trả về
session_start();

class HomeController extends Controller
{
    public function index(Request $request)
    {
        // $meta_desc='Chuyên bán các thiết bị điện tử thông minh như điện thoại, laptop,...';
        // $meta_keyword='USb,điện thoại, laptop,PS4';
        // $meta_title='Trang bán các thiết bị điện tử số 1 Việt Nam';
        // $url=$request->url();
        $cate_product=DB::table('tbl_category_product')->where('category_status',0)->orderby('category_id','desc')->get();
        $brand_product=DB::table('tbl_brand_product')->where('brand_status',0)->orderby('brand_id','desc')->get();
        
        $all_product=DB::table('tbl_product')->where('product_status',0)->orderby('product_id','desc')->limit(6)->get();
        $lap_product=DB::table('tbl_product')->where('product_status',0)->where('category_id',7)->orderby('product_id','desc')->limit(4)->get();
        $usb_product=DB::table('tbl_product')->where('product_status',0)->where('category_id',5)->orderby('product_id','desc')->limit(4)->get();
        $ps4_product=DB::table('tbl_product')->where('product_status',0)->where('category_id',4)->orderby('product_id','desc')->limit(4)->get();
        // $all_product =DB::table('tbl_product')
        // ->join('tbl_category_product','tbl_category_product.category_id','=','tbl_product.category_id')
        // ->join('tbl_brand_product','tbl_brand_product.brand_id','=','tbl_product.brand_id')
        // ->orderby('tbl_product.product_id','desc')->get();
        return view('pages.home')
        ->with('category',$cate_product)
        ->with('brand',$brand_product)
        ->with('product',$all_product)
        ->with('lap_product',$lap_product)
        ->with('usb_product',$usb_product)
        ->with('ps4_product',$ps4_product);
        // ->with('desc',$meta_desc)
        // ->with('keyword',$meta_keyword)
        // ->with('title',$meta_title)
        // ->with('url',$url);
    }


    public function search(Request $request)
    {
        $keyword=$request->keyword_submit;
        $cate_product=DB::table('tbl_category_product')->where('category_status',0)->orderby('category_id','desc')->get();
        $brand_product=DB::table('tbl_brand_product')->where('brand_status',0)->orderby('brand_id','desc')->get();

        $search_product=DB::table('tbl_product')->where('product_name','like','%'.$keyword.'%')->orderby('product_id','desc')->limit(4)->get();

        return view('sanpham.search')
        ->with('category',$cate_product)
        ->with('brand',$brand_product)
        ->with('search_product',$search_product);
    }
    public function send_mail()
    {
        $to_name="lgbao";
        $to_email="thichcakhia2607@gmail.com";
        $data=array("name"=>"Mail từ tài khoản khách hàng","body"=>"Mail gửi về vấn đề hàng hoá");
        Mail::send('pages.send_mail', $data, function ($message) use($to_name,$to_email){
            $message->from($to_email, $to_name);
            $message->to($to_email);
            $message->subject('Test gửi mail');
      
        });
       // return redirect('/trang_chu')->with('message','');
    }
}

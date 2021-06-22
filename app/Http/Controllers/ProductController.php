<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Session;
use Illuminate\Support\Facades\Redirect;//trả về
session_start();
class ProductController extends Controller
{
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
    public function all_product()
    {
        $this->AuthLogin(); 
        $all_product =DB::table('tbl_product')
        ->join('tbl_category_product','tbl_category_product.category_id','=','tbl_product.category_id')
        ->join('tbl_brand_product','tbl_brand_product.brand_id','=','tbl_product.brand_id')
        ->orderby('tbl_product.product_id','desc')->get();
        $manager_product=view('admin.all_product')->with('all_product',$all_product);

            return view('admin_layout')->with('admin.all_product',$manager_product);
    }
    public function add_product()
    {
        $this->AuthLogin(); 
        $cate_product=DB::table('tbl_category_product')->orderby('category_id','desc')->get();
        $brand_product=DB::table('tbl_brand_product')->orderby('brand_id','desc')->get();

        return view('admin.add_product')->with('cate_product',$cate_product)->with('brand_product',$brand_product);

    }
    public function save_product(Request $request)
    {
        $this->AuthLogin(); 
        $data=array();
        $data['product_name']=$request->product_name;
        $data['product_price']=$request->product_price;
        $data['product_desc']=$request->product_desc;
        $data['product_content']=$request->product_content;
        $data['category_id']=$request->cate_product;
        $data['brand_id']=$request->brand_product;
        $data['product_status']=$request->product_status;
        $get_image=$request->file('product_image');
        if($get_image)
        {
            $get_name_image=$get_image->getClientOriginalName();
            $name_image=current(explode('.',$get_name_image));
            $new_image=$name_image.rand(0,99).'.'.$get_image->getClientOriginalExtension();
            $get_image->move('public/upload/product',$new_image);
            $data['product_image']=$new_image;
            DB::table('tbl_product')->insert($data);
            $request->session()->put('message', 'Thêm sản phẩm thành công');
            return redirect('add_product');
        }
        // echo'<pre>';
        // print_r ($data);
        // echo'</pre>';
        $data['product_image']='';
        DB::table('tbl_product')->insert($data);
        $request->session()->put('message', 'Thêm sản phẩm thành công');
        return redirect('add_product');
    }
    public function active_product($id)
    {
        $this->AuthLogin(); 
        DB::table('tbl_product')->where('product_id',$id)->update(['product_status'=>0]);
        Session()->put('message','kích hoạt sản phẩm');
        return redirect('all_product');
    }
    public function onactive_product($id)
    {
        $this->AuthLogin(); 
        DB::table('tbl_product')->where('product_id',$id)->update(['product_status'=>1]);
        Session()->put('message','không kích hoạt sản phẩm');
        return redirect('all_product');
    }

    public function edit_product($id)
    {
        $this->AuthLogin(); 
        $cate_product=DB::table('tbl_category_product')->orderby('category_id','desc')->get();
        $brand_product=DB::table('tbl_brand_product')->orderby('brand_id','desc')->get();

        $edit_product =DB::table('tbl_product')->where('product_id',$id)->get();
        $manager_product=view('admin.edit_product')
        ->with('edit_product',$edit_product)
        ->with('cate_product',$cate_product)
        ->with('brand_product',$brand_product);

            return view('admin_layout')->with('admin.edit_product',$manager_product);
    }
    public function update_product(Request $request,$id)
    {
        $this->AuthLogin(); 
        $data=array();
        $data['product_name']=$request->product_name;
        $data['product_price']=$request->product_price;
        $data['product_desc']=$request->product_desc;
        $data['product_content']=$request->product_content;
        $data['category_id']=$request->cate_product;
        $data['brand_id']=$request->brand_product;
        $data['product_status']=$request->product_status;
        $get_image=$request->file('product_image');
        if($get_image)
        {
            $get_name_image=$get_image->getClientOriginalName();
            $name_image=current(explode('.',$get_name_image));
            $new_image=$name_image.rand(0,99).'.'.$get_image->getClientOriginalExtension();
            $get_image->move('public/upload/product',$new_image);
            $data['product_image']=$new_image;
            DB::table('tbl_product')->where('product_id',$id)->update($data);
            $request->session()->put('message', 'Cập nhật sản phẩm thành công');
            return redirect('all_product');
        }
        $data['product_image']='';
        DB::table('tbl_product')->where('product_id',$id)->update($data);
        $request->session()->put('message', 'Cập nhật sản phẩm thành công');
        return redirect('all_product');
    }
    public function delete_product($id)
    {
         
        $admin_id=Session::get('admin_id');
        if($admin_id)
        {
            DB::table('tbl_product')->where('product_id',$id)->delete();
            Session()->put('message', 'Xoá sản phẩm thành công');
                    return redirect('all_product');
        }
        else
        {
            return redirect('admin')->send();
        }
        
    }
    //end admin pages


    //chi tiết sản phẩm
    public function detail_product($pro_id)
    {
        $cate_product=DB::table('tbl_category_product')->orderby('category_id','desc')->get();
        $brand_product=DB::table('tbl_brand_product')->orderby('brand_id','desc')->get();
        $detail_product=DB::table('tbl_product')
        ->join('tbl_category_product','tbl_category_product.category_id','=','tbl_product.category_id')
        ->join('tbl_brand_product','tbl_brand_product.brand_id','=','tbl_product.brand_id')
        ->where('tbl_product.product_id',$pro_id)->get();

        foreach($detail_product as $key=>$value)
        $category_id=$value->category_id;
        $related_product=DB::table('tbl_product')
        ->join('tbl_category_product','tbl_category_product.category_id','=','tbl_product.category_id')
        ->join('tbl_brand_product','tbl_brand_product.brand_id','=','tbl_product.brand_id')
        ->where('tbl_category_product.category_id',$category_id)->whereNotIn('tbl_product.product_id',[$pro_id])->get();
        return view('sanpham.show_detail')
        ->with('category',$cate_product)
        ->with('brand',$brand_product)
        ->with('detail_product',$detail_product)
        ->with('related_product',$related_product);
    }

    
}


<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Models\Brand; //sử dụng model
use Session;
use Illuminate\Support\Facades\Redirect;//trả về
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
session_start();
class BrandProduct extends Controller
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
    public function all_brand()
    {
        $this->AuthLogin(); 
       // $all_brand_product =DB::table('tbl_brand_product')->get();// static của mô hình hướng đối tượng
      
        // $all_brand_product=Brand::take(1)->get(); //lấy 1 $all_brand_product=Brand::orderBy('brand_id','DESC')->get();
        //$all_brand_product=Brand::paginate(5); lấy 5 trên 1 trang
        $all_brand_product=Brand::all();
        $manager_brand_product=view('admin.all_brand_product')->with('all_brand_product',$all_brand_product);

            return view('admin_layout')->with('admin.all_brand_product',$manager_brand_product);
    }
    public function add_brand()
    {
        $this->AuthLogin(); 

        return view('admin.add_brand_product');

    }
    public function save_brand_product(Request $request)
    {
        $this->AuthLogin();
        //cách 1 
        // $data=array();
        // $data['brand_name']=$request->brand_product_name;
        // $data['brand_desc']=$request->brand_product_desc;
        // $data['brand_status']=$request->brand_product_status;
        // DB::table('tbl_brand_product')->insert($data);
        $data=$request->all();
        $brand=new Brand();
        $brand->brand_name=$data['brand_product_name'];
        $brand->brand_desc=$data['brand_product_desc'];
        $brand->brand_status=$data['brand_product_status'];
        $brand->save();
        $request->session()->put('message', 'Thêm thương hiệu thành công');
        return redirect('add_brand');
    }
    public function active_brand_product($brand_id)
    {
        $this->AuthLogin(); 
        DB::table('tbl_brand_product')->where('brand_id',$brand_id)->update(['brand_status'=>0]);
        Session()->put('message','không kích hoạt thương hiệu sản phẩm');
        return redirect('all_brand');
    }
    public function onactive_brand_product($brand_id)
    {
        $this->AuthLogin(); 
        DB::table('tbl_brand_product')->where('brand_id',$brand_id)->update(['brand_status'=>1]);
        Session()->put('message','kích hoạt thương hiệu sản phẩm');
        return redirect('all_brand');
    }

    public function edit_brand_product($brand_id)
    {
        $this->AuthLogin(); 

     //   $edit_brand_product =DB::table('tbl_brand_product')->where('brand_id',$brand_id)->get();
    // $edit_brand_product=Brand::where('brand_id',$brand_id)->get();
        $edit_brand_product=Brand::find($brand_id);
        $manager_brand_product=view('admin.edit_brand_product')->with('edit_brand_product',$edit_brand_product);

            return view('admin_layout')->with('admin.edit_brand_product',$manager_brand_product);
    }
    public function update_brand_product(Request $request,$brand_id)
    {
        $this->AuthLogin(); 
        // $data=array();
        // $data['brand_name']=$request->brand_product_name;
        // $data['brand_desc']=$request->brand_product_desc;
       
        // DB::table('tbl_brand_product')->where('brand_id',$brand_id)->update($data);
        $data=$request->all();
        $brand=Brand::find($brand_id);
        $brand->brand_name=$data['brand_product_name'];
        $brand->brand_desc=$data['brand_product_desc'];
        $brand->brand_status=$data['brand_product_status'];
        $brand->save();

        $request->session()->put('message', 'Cập nhật thương hiệu thành công');
        return redirect('all_brand');
    }
    public function delete_brand_product($brand_id)
    {
        $admin_id=Session::get('admin_id');
        if($admin_id)
        {
            DB::table('tbl_brand_product')->where('brand_id',$brand_id)->delete();
            Session()->put('message', 'Xoá thương hiệu thành công');
            return redirect('all_brand');
        }
        else
        {
            return redirect('admin')->send();
        }
        
        
    }
//end function admin

    public function show_brand_home($id)
    {
        $cate_product=DB::table('tbl_category_product')->where('category_status',0)->orderby('category_id','desc')->get();
        $brand_product=DB::table('tbl_brand_product')->where('brand_status',0)->orderby('brand_id','desc')->get();
        $brand_name=DB::table('tbl_brand_product')->where('tbl_brand_product.brand_id',$id)->limit(1)->get();
        $brand_by_id=DB::table('tbl_product')
        ->join('tbl_brand_product','tbl_product.brand_id','=','tbl_brand_product.brand_id')->where('tbl_product.brand_id',$id)
        ->get();
        return view('pages.brand.show_brand') 
        ->with('category',$cate_product)
        ->with('brand',$brand_product)
        ->with('brand_by_id',$brand_by_id)
        ->with('brand_name',$brand_name);
    }   
}



<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Session;
use App\Models\Category;
use Illuminate\Support\Facades\Redirect;//trả về
session_start();
class CategoryProduct extends Controller
{

    //start function admin page
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
  
    public function all_category()
    {
        $this->AuthLogin(); 
       // $all_category_product =DB::table('tbl_category_product')->get();
       $all_category_product=Category::all();
        $manager_category_product=view('admin.all_category_product')->with('all_category_product',$all_category_product);

            return view('admin_layout')->with('admin.all_category_product',$manager_category_product);
    }
    public function add_category()
    {
        $this->AuthLogin(); 
        return view('admin.add_category_product');

    }
    public function save_category_product(Request $request)
    {
        $this->AuthLogin(); 
        // $data=array();
        // $data['category_name']=$request->category_product_name;
        // $data['meta_keyword']=$request->category_product_keyword;
        // $data['category_desc']=$request->category_product_desc;
        // $data['category_status']=$request->category_product_status;
        $category=new Category();
        $data=$request->all();
        $category->category_name=$data['category_product_name'];
        $category->category_desc=$data['category_product_desc'];
        $category->category_status=$data['category_product_status'];
        $category->save();
        DB::table('tbl_category_product')->insert($data);
        $request->session()->put('message', 'Thêm danh mục thành công');
        return redirect('add_category');
    }
    public function active_category_product($category_id)
    {
        DB::table('tbl_category_product')->where('category_id',$category_id)->update(['category_status'=>0]);
        Session()->put('message',' kích hoạt danh mục sản phẩm');
        return redirect('all_category');
    }
    public function onactive_category_product($category_id)
    {
        DB::table('tbl_category_product')->where('category_id',$category_id)->update(['category_status'=>1]);
        Session()->put('message','không kích hoạt danh mục sản phẩm');
        return redirect('all_category');
    }

    public function edit_category_product($category_id)
    {
        $this->AuthLogin(); 
        // $edit_category_product =DB::table('tbl_category_product')->where('category_id',$category_id)->get();
        $edit_category_product=Category::find($category_id);
        $manager_category_product=view('admin.edit_category_product')->with('edit_category_product',$edit_category_product);

            return view('admin_layout')->with('admin.edit_category_product',$manager_category_product);
    }
    public function update_category_product(Request $request,$category_id)
    {
        $this->AuthLogin(); 
        // $data=array();
        // $data['category_name']=$request->category_product_name;
        // $data['category_desc']=$request->category_product_desc;
        // $data['meta_keyword']=$request->category_product_keyword;
        $category=Category::find($category_id);
        $data=$request->all();
        $category->category_name=$data['category_product_name'];
        $category->category_desc=$data['category_product_desc'];
        $category->category_status=$data['category_product_status'];
        $category->save();
       
        DB::table('tbl_category_product')->where('category_id',$category_id)->update($data);
        $request->session()->put('message', 'Cập nhật danh mục thành công');
        return redirect('all_category');
    }
    public function delete_category_product($category_id)
    {
        $admin_id=Session::get('admin_id');
        if($admin_id)
        {
            DB::table('tbl_category_product')->where('category_id',$category_id)->delete();
            Session()->put('message', 'Xoá danh mục thành công');
            return redirect('all_category');
        }
        else
        {
            return redirect('admin')->send();
        }
        
        
    }
    //end function admin page

    public function show_category_home(Request $request,$id)
    {


        $cate_product=DB::table('tbl_category_product')->where('category_status',0)->orderby('category_id','desc')->get();
        $brand_product=DB::table('tbl_brand_product')->where('brand_status',0)->orderby('brand_id','desc')->get();
        $category_by_id=DB::table('tbl_product')
        ->join('tbl_category_product','tbl_product.category_id','=','tbl_category_product.category_id')
        ->where('tbl_product.category_id',$id)
        ->get();
        // foreach($category_by_id as $val)
        // {

        //     $meta_desc=$val->category_desc;
        //     $meta_keyword=$val->meta_keyword;
        //     $meta_title=$val->category_name;
        //     $url=$request->url();      
        // }
        $category_name=DB::table('tbl_category_product')->where('tbl_category_product.category_id',$id)->limit(1)->get();
      
        
        return view('pages.category.show_category') 
        ->with('category',$cate_product)
        ->with('brand',$brand_product)
        ->with('category_by_id',$category_by_id)
        ->with('category_name',$category_name);
        // ->with('desc',$meta_desc)
        // ->with('keyword',$meta_keyword)
        // ->with('title',$meta_title)
        // ->with('url',$url);
        
    }   
  

}

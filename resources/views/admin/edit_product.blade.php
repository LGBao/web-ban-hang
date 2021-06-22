@extends('admin_layout')
@section('admin_content')

<div class="row">
    <div class="col-lg-12">
        <section class="panel">
            <header class="panel-heading">
                Cập nhật sản phẩm
            </header>
             <div class="panel-body">
             <?php
    $message=Session::get('message');
    if($message)
    {
        echo '<span class="arler-text" style="color:red;font-size: 17px;width: 100%;text-align: center;">'.$message.'</span>';
       Session::put('message',null);
    }
    ?>
                <div class="position-center">
                @foreach($edit_product as $key=> $pro)
                    <form role="form" action="{{URL::to('/update-product/'.$pro->product_id)}}" method="POST" enctype="multipart/form-data">
                    {{csrf_field()}}
                        <div class="form-group">
                                    <label for="exampleInputEmail1">name product</label>
                                    <input type="text" name="product_name"class="form-control" id="exampleInputEmail1" value="{{$pro->product_name}}">
                        </div>
                        <div class="form-group">
                                    <label for="exampleInputEmail1">price product</label>
                                    <input type="text" name="product_price"class="form-control" id="exampleInputEmail1" value="{{$pro->product_price}}">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">description</label>
                         
                                <textarea style="resize:none;" name="product_desc"
                                 cols="30" rows="10" class="form-control" id="" value="{{$pro->product_desc}}"></textarea>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Content</label>
                         
                                <textarea style="resize:none;" name="product_content" 
                                 cols="30" rows="10" class="form-control" id="" value="{{$pro->product_content}}"></textarea>
                       
                        <div class="form-group">
                            <label for="exampleInputPassword1">Image</label>
                         
                                <input type="file" style="resize:none;" name="product_image" id="" cols="30" rows="10" class="form-control" id="exampleInputPassword1" >
                                <img src="{{URL::to('public/upload/product/'.$pro->product_image)}}" style="width:70px;height:70px;" alt="">
                       </div>
                        </div>
                        <div class="form-group">
                        <label for="exampleInputPassword1">Category</label>

                            <select name="cate_product" class="form-control input-sm m-bot15">
                                @foreach($cate_product as $key=>$cate)
                                    @if($cate->category_id==$pro->category_id)
                                    <option selected value="{{$cate->category_id}}">{{$cate->category_name}}</option>
                                    @else
                                    <option  value="{{$cate->category_id}}">{{$cate->category_name}}</option>
                                    @endif      
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                        <label for="exampleInputPassword1">Brand</label>

                            <select name="brand_product" class="form-control input-sm m-bot15">
                            @foreach($brand_product as $key=>$brand)
                                @if($brand->brand_id==$pro->brand_id)
                                    <option selected value="{{$brand->brand_id}}">{{$brand->brand_name}}</option>
                                @else
                                     <option  value="{{$brand->brand_id}}">{{$brand->brand_name}}</option>
                                @endif
                            @endforeach
                                
                               
                            </select>
                        </div>

                        <div class="form-group">
                        <label for="exampleInputPassword1">Visible</label>

                            <select name="product_status" class="form-control input-sm m-bot15">
                                <option  value="0">Hiển thị</option>
                                <option value="1">Ẩn</option>
                            </select>
                        </div>
                      
                                <button type="submit" name="update_product" class="btn btn-info">Cập nhật sản phẩm</button>
                        </form>
                        @endforeach
</div>
@endsection
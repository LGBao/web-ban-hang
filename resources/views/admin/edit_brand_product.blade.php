@extends('admin_layout')
@section('admin_content')

<div class="row">
    <div class="col-lg-12">
        <section class="panel">
            <header class="panel-heading">
                Cập nhật thương hiệu sản phẩm
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
                    <form role="form" action="{{URL::to('/update-brand-product/'.$edit_brand_product->brand_id)}}" method="POST">
                    {{csrf_field()}}
                        <div class="form-group">
                                    <label for="exampleInputEmail1">name Brand</label>
                                    <input type="text"
                                    value="{{$edit_brand_product->brand_name}}" name="brand_product_name"class="form-control"  placeholder="name product">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">description</label>
                         
                                <textarea style="resize:none;" name="brand_product_desc"  cols="30" rows="10" 
                                class="form-control" id="" placeholder="description">{{$edit_brand_product->brand_desc}}</textarea>
                        </div>
                        <div class="form-group">
                        <label for="exampleInputPassword1">Hiển thị</label>

                            <select name="brand_product_status" class="form-control input-sm m-bot15">
                                <option  value="0">Hiển thị</option>
                                <option value="1">Ẩn</option>
                            </select>
                        </div>
                      
                                <button type="submit" name="add_brand_product" class="btn btn-info"> Cập nhật thương hiệu sản phẩm</button>
                        </form>
</div>
@endsection
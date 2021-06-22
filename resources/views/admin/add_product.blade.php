@extends('admin_layout')
@section('admin_content')

<div class="row">
    <div class="col-lg-12">
        <section class="panel">
            <header class="panel-heading">
                Thêm sản phẩm
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
                    <form role="form" id="form_product" action="{{URL::to('/save-product')}}" method="POST" enctype="multipart/form-data">
                    {{csrf_field()}}
                        <div class="form-group">
                                    <label for="exampleInputEmail1">Tên sản phẩm</label>
                                    <input type="text" name="product_name"class="form-control"
                                    required minlength="4"
                                    data-msg-minlength="Điền ít nhất 4 kí tự"
                                    data-rule-maxlength="100" data-msg-maxlength="vượt quá kí tự cho phép"
                                     id="exampleInputEmail1" placeholder="name product">
                        </div>
                        <div class="form-group">
                                    <label for="exampleInputEmail1">Giá sản phẩm</label>
                                    <input type="number" 
                                    
                                    name="product_price"class="form-control" require id="exampleInputEmail1" placeholder="price product">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Mô tả</label>
                                <textarea 
                                style="resize:none;" name="product_desc"
                                required minlength="4"
                                    data-msg-minlength="Điền ít nhất 4 kí tự"
                                    data-rule-maxlength="100" data-msg-maxlength="vượt quá kí tự cho phép"
                                 cols="30" rows="10" class="form-control" id=""  placeholder="description">
                                </textarea>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Content</label>
                           
                                <textarea style="resize:none;" name="product_content"
                                required minlength="4"
                                    data-msg-minlength="Điền ít nhất 4 kí tự"
                                    data-rule-maxlength="100" data-msg-maxlength="vượt quá kí tự cho phép"
                                 id="" cols="30" rows="10" class="form-control"></textarea>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Hình ảnh</label>
                         
                                <input type="file" style="resize:none;" name="product_image"
                                 id="" cols="30" rows="10" class="form-control" id="exampleInputPassword1" >
                        </div>
                        <div class="form-group">
                        <label for="exampleInputPassword1">Danh mục</label>

                            <select name="cate_product" class="form-control input-sm m-bot15">
                                @foreach($cate_product as $key=>$cate)
                                <option value="{{$cate->category_id}}">{{$cate->category_name}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                        <label for="exampleInputPassword1">Thương hiệu</label>

                            <select name="brand_product" class="form-control input-sm m-bot15">

                            @foreach($brand_product as $key=>$brand)
                                <option value="{{$brand->brand_id}}">{{$brand->brand_name}}</option>
                                @endforeach
                               
                            </select>
                        </div>

                        <div class="form-group">
                        <label for="exampleInputPassword1">Hiển thị</label>

                            <select name="product_status" class="form-control input-sm m-bot15">
                                <option  value="0">Hiển thị</option>
                                <option value="1">Ẩn</option>
                            </select>
                        </div>
                      
                                <button type="submit" name="add_product" class="btn btn-info">Thêm  sản phẩm</button>
                        </form>
</div>
@endsection
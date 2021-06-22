@extends('admin_layout')
@section('admin_content')

<div class="row">
    <div class="col-lg-12">
        <section class="panel">
            <header class="panel-heading">
                Thêm thương hiệu sản phẩm
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
                    <form role="form" id="form_brand" action="{{URL::to('/save-brand-product')}}" method="POST">
                    {{csrf_field()}}
                        <div class="form-group">
                                    <label for="exampleInputEmail1">Tên thương hiệu</label>
                                    <input type="text" name="brand_product_name"
                                    required minlength="4"
                                    data-msg-minlength="Điền ít nhất 4 kí tự"
                                    data-rule-maxlength="100" data-msg-maxlength="vượt quá kí tự cho phép"
                                    class="form-control" id="exampleInputEmail1" placeholder="name product">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Mô tả</label>
                         
                                <textarea sstyle="resize:none;" name="brand_product_desc" 
                                 cols="30" rows="10" class="form-control" id="" 
                                 required minlength="4"
                                    data-msg-minlength="Điền ít nhất 4 kí tự"
                                    data-rule-maxlength="100" data-msg-maxlength="vượt quá kí tự cho phép"
                                 placeholder="description"></textarea>
                        </div>
                        <div class="form-group">
                        <label for="exampleInputPassword1">Hiển thị</label>

                            <select name="brand_product_status" class="form-control input-sm m-bot15">
                                <option  value="0">Hiển thị</option>
                                <option value="1">Ẩn</option>
                            </select>
                        </div>
                      
                                <button type="submit" name="add_brand_product" class="btn btn-info">Thêm thương hiệu sản phẩm</button>
                        </form>
</div>
@endsection
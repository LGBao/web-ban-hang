@extends('admin_layout')
@section('admin_content')

<div class="row">
    <div class="col-lg-12">
        <section class="panel">
            <header class="panel-heading">
                Cập nhật danh mục sản phẩm
            </header>
            <?php
                $message=Session::get('message');
                if($message)
                {
                    echo '<span class="arler-text" style="color:red;font-size: 17px;width: 100%;text-align: center;">'.$message.'</span>';
                Session::put('message',null);
                }
            ?>
    <div class="panel-body">
                <div class="position-center">
                    <form role="form" action="{{URL::to('/update-category-product/'.$edit_category_product->category_id)}}" method="POST">
                    {{csrf_field()}}
                        <div class="form-group">
                                    <label for="exampleInputEmail1">Tên danh mục</label>
                                    <input type="text" value="{{$edit_category_product->category_name}}" name="category_product_name"class="form-control" id="exampleInputEmail1" placeholder="name product">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Mô tả</label>
                         
                                <textarea style="resize:none;" name="category_product_desc"
                                 cols="30" rows="10" class="form-control" id="" value="">{{$edit_category_product->category_desc}}</textarea>
                        </div>
                        <!-- <div class="form-group">
                            <label for="exampleInputPassword1">Từ khoá dan mục</label>
                         
                                <textarea style="resize:none;" name="category_product_keyword"
                                 cols="30" rows="10" class="form-control" id="" value="">{{$edit_category_product->meta_keyword}}</textarea>
                        </div> -->
                        
                      
                            <button type="submit" name="update_category_product" class="btn btn-info">Cập nhật Danh mục sản phẩm</button>
                        </form>
                </div>
        </section>
    
    </div>
</div>
@endsection
@extends('layout')
@section('content')

<section id="cart_items">
		<div class="container">
        <div class="breadcrumbs">
				<ol class="breadcrumb">
				  <li><a href="{{URL::to('/')}}"> Trang chủ</a></li>
				  <li class="active">Thanh toán giỏ hàng</li>
				</ol>
			</div>

		
			<div class="review-payment">
				<h2>Xem lại giỏ hàng</h2>
			</div>
            <div class="table-responsive cart_info">

<?php
$content=Cart::content();
?>
    <table class="table table-condensed">
        <thead>
            <tr class="cart_menu">
                <td class="image">Hình ảnh</td>
                <td class="description">mô tả</td>
                <td class="price">Giá</td>
                <td class="quantity">số lượng</td>
                <td class="total">Tổng tiền</td>
                <td></td>
            </tr>
        </thead>
        <tbody>
            @foreach($content as $v_content)
            <tr>
                <td class="cart_product">
                    <a href=""><img src="{{URL::to('public/upload/product/'.$v_content->options->image)}}" style="width:50px;" alt=""></a>
                </td>
                <td class="cart_description">
                    <h5><a href="">{{$v_content->name}}</a></h5>
                    <p>Web ID: {{$v_content->id}}</p>
                </td>
                <td class="cart_price">
                    <p>{{number_format($v_content->price).' '.'VNĐ'}}</p>
                </td>
                <td class="cart_quantity">
                    <div class="cart_quantity_button">
                        <!-- <a class="cart_quantity_up" href="">	+ </a> -->
                        <form action="{{URL::to('/update-quantity-cart')}}" method="POST">
                        {{csrf_field()}}
                        <input style="width:35px;" class="cart_quantity_input" type="text" name="quantity_cart" value="{{$v_content->qty}}">
                        <input type="hidden" value="{{$v_content->rowId}}" name="rowId_cart_quantity" class="form-control">
                        <input type="submit" value="Cập nhật" name="update_qty" class="btn btn-default btn-sm">
                        <!-- <a class="cart_quantity_down" href=""> - </a> -->
                        </form>
                    </div>
                </td>
                <td class="cart_total">
                    <p class="cart_total_price"><?php $subtotal=$v_content->qty*$v_content->price; echo number_format($subtotal).'  '.'VNĐ'; ?></p>
                </td>
                <td class="cart_delete">
                    <a class="cart_quantity_delete" href="{{URL::to('delete-to-cart/'.$v_content->rowId)}}"><i class="fa fa-times"></i></a>
                </td>
            </tr>
            @endforeach 
        </tbody>
    </table>
</div>
			<h4 style="margin:40px 0; font-size:20px;">Chọn hình thức thanh toán</h4>
            <form action="{{URL::to('order-place')}}" method="POST">
            {{csrf_field()}}
			    <div class="payment-options">
					<span>
						<label><input value="1" name="payment_option" type="checkbox"> Trả bằng thẻ ATM</label>
					</span>
					<span>
						<label><input value="2" name="payment_option" type="checkbox"> Nhận tền mặt</label>
					</span>
                    <span>
						<label><input value="3" name="payment_option" type="checkbox"> Thẻ ghi nợ</label>
					</span>
					<!-- <span>
						<label><input type="checkbox"> Paypal</label>
					</span> -->
                    <input type="submit" value="Đặt hàng" name="send_order" class="btn btn-primary btn-sm">
				</div>
            </form>
		</div>
	</section> <!--/#cart_items-->
@endsection
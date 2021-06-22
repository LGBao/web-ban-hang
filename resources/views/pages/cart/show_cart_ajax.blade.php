
@extends('layout')
@section('content')
<section id="cart_items">
	<div class="container">
			<div class="breadcrumbs">
				<ol class="breadcrumb">
				  <li><a href="{{URL::to('/')}}"> Trang chủ</a></li>
				  <li class="active">Giỏ hàng của bạn</li>
				</ol>
			</div>
		<div class="table-responsive cart_info">

				<table class="table table-condensed">
					<thead>
						<tr class="cart_menu">
							<td class="image">Hình ảnh</td>
							<td class="description">Tên sản phẩm</td>
							<td class="price">Giá sản phẩm</td>
							<td class="quantity">số lượng</td>
							<td class="total">Thành tiền</td>
							<td></td>
						</tr>
					</thead>
					<tbody>
					<?php
						 $total=0;
					  ?>
                      @foreach(Session::get('cart') as $key =>$cart)
					  <?php
						 $subtotal=$cart['product_price']*$cart['product_qty'];
						 $total+=$subtotal;
					  ?>
						<tr>
							<td class="cart_product">
								<a href=""><img src="{{asset('public/upload/product/'.$cart['product_image'])}}" 
								style="width:50px;" alt="{{$cart['product_name']}}"></a>
							</td>
							<td class="cart_description">
								<h5><a href=""></a></h5>
								<p>{{$cart['product_name']}}</p>
							</td>
							<td class="cart_price">
								<p>{{number_format($cart['product_price'],0,',','.')}} vnđ</p>
							</td>
							<td class="cart_quantity">
								<div class="cart_quantity_button">
									<!-- <a class="cart_quantity_up" href="">	+ </a> -->
									<form action="" method="POST">
								
									<!-- <input style="width:35px;" class="cart_quantity_input" type="number" min="1"
                                    name="quantity_cart" value=""> -->
									<input style="width:35px;" class="cart_quantity_" type="number" min="1"
                                    name="quantity_cart" value="{{$cart['product_qty']}}">
									<!-- <input type="hidden" value="" name="rowId_cart_quantity" class="form-control"> -->
									<input type="submit" value="Cập nhật" name="update_qty" class="btn btn-default btn-sm">
									<!-- <a class="cart_quantity_down" href=""> - </a> -->
									</form>
								</div>
							</td>
							<td class="cart_total">
								<p class="cart_total_price">{{number_format($subtotal,0,',','.')}} vnđ</p>
							</td>
							<td class="cart_delete">
								<a class="cart_quantity_delete" href=""><i class="fa fa-times"></i></a>
							</td>
						</tr>
                    @endforeach
					</tbody>
				</table>
		</div>
	</div>
</section> <!--/#cart_items-->


	<section id="do_action">
		<div class="container">
			
			<div class="row">
			
				<div class="col-sm-6">
					<div class="total_area">
						<ul>
							<li>Tổng tiền <span>{{number_format($total,0,',','.')}} vnđ</span></li>
							<li>Thuế <span></span></li>
							<li>Phí vận chuyển <span>Free</span></li>
							<li>Thành tiền sau giảm <span></span></li>
						</ul>
							<!-- <a class="btn btn-default update" href="">Update</a> -->
							
								<a class="btn btn-default check_out" href="{{URL::to('/checkout')}}"></i> Checkout</a>
								
								<a class="btn btn-default check_out" href="{{URL::to('/payment')}}">Checkout</a>

								<a class="btn btn-default check_out" href="{{URL::to('/login-check-out')}}"></i> Checkout</a>
								
						
					</div>
				</div>
			</div>
		</div>
	</section><!--/#do_action-->

@endsection
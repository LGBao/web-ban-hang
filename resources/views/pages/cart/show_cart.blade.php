
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
	</div>
</section> <!--/#cart_items-->


	<section id="do_action">
		<div class="container">
			<!-- <div class="heading">
				<h3>What would you like to do next?</h3>
				<p>Choose if you have a discount code or reward points you want to use or would like to estimate your delivery cost.</p>
			</div> -->
			<div class="row">
				<!-- <div class="col-sm-6">
					<div class="chose_area">
						<ul class="user_option">
							<li>
								<input type="checkbox">
								<label>Use Coupon Code</label>
							</li>
							<li>
								<input type="checkbox">
								<label>Use Gift Voucher</label>
							</li>
							<li>
								<input type="checkbox">
								<label>Estimate Shipping & Taxes</label>
							</li>
						</ul>
						<ul class="user_info">
							<li class="single_field">
								<label>Country:</label>
								<select>
									<option>United States</option>
									<option>Bangladesh</option>
									<option>UK</option>
									<option>India</option>
									<option>Pakistan</option>
									<option>Ucrane</option>
									<option>Canada</option>
									<option>Dubai</option>
								</select>
								
							</li>
							<li class="single_field">
								<label>Region / State:</label>
								<select>
									<option>Select</option>
									<option>Dhaka</option>
									<option>London</option>
									<option>Dillih</option>
									<option>Lahore</option>
									<option>Alaska</option>
									<option>Canada</option>
									<option>Dubai</option>
								</select>
							
							</li>
							<li class="single_field zip-field">
								<label>Zip Code:</label>
								<input type="text">
							</li>
						</ul>
						<a class="btn btn-default update" href="">Get Quotes</a>
						<a class="btn btn-default check_out" href="">Continue</a>
					</div>
				</div> -->
				<div class="col-sm-6">
					<div class="total_area">
						<ul>
							<li>Tổng <span>{{Cart::total().' '.'VNĐ'}}</span></li>
							<li>Thuế <span>{{Cart::tax().' '.'VNĐ'}}</span></li>
							<li>Phí vận chuyển <span>Free</span></li>
							<li>Thành tiền <span>{{Cart::total().' '.'VNĐ'}}</span></li>
						</ul>
							<!-- <a class="btn btn-default update" href="">Update</a> -->
							<?php
								$shipping_id=Session::get('shipping_id');

								$customer_id=Session::get('customer_id');
								if($customer_id!=NULL&& $shipping_id==NULL)
								{
								?>
								<a class="btn btn-default check_out" href="{{URL::to('/checkout')}}"></i> Checkout</a>
								<?php
								} elseif($customer_id!=NULL && $shipping_id!=NULL){
								?>
								<a class="btn btn-default check_out" href="{{URL::to('/payment')}}">Checkout</a>

							<?php
								}else{ ?>
								<a class="btn btn-default check_out" href="{{URL::to('/login-check-out')}}"></i> Checkout</a>
								<?php
								}
								?>
							<!-- <a class="btn btn-default check_out" href="{{URL::to('/login-check-out')}}">Thanh toán</a> -->
					</div>
				</div>
			</div>
		</div>
	</section><!--/#do_action-->

@endsection
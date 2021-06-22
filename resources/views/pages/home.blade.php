
@extends('layout')
@section('content')
<!--features_items-->
	<div class="features_items">
						<h2 class="title text-center">Sản phẩm mới nhất</h2>
							@foreach($product as $key =>$pro)						
							<div class="col-sm-4" style="height:450px; ">
							<div class="product-image-wrapper">
								<div class="single-products">
									<div class="productinfo text-center">

									<form action="" method="">
									{{csrf_field()}};
									<input type="hidden" name="" class="cart_product_id_{{$pro->product_id}}" value="{{$pro->product_id}}">
									<input type="hidden" name="" class="cart_product_name_{{$pro->product_id}}" value="{{$pro->product_name}}">
									<input type="hidden" name="" class="cart_product_img_{{$pro->product_id}}" value="{{$pro->product_image}}">
									<input type="hidden" name="" class="cart_product_price_{{$pro->product_id}}" value="{{$pro->product_price}}">
									<input type="hidden" name="" class="cart_product_qty_{{$pro->product_id}}" value="1">


										<a href="{{URL::to('chi-tiet-san-pham/'.$pro->product_id)}}" >	
											<img style="height:190px;width:210px;" src="{{URL::to('public/upload/product/'.$pro->product_image)}}" alt="" />
											<h2>{{number_format($pro->product_price).' '.'VNĐ'}}</h2>
											<p style="height:70px;width:250px;">{{$pro->product_name}}</p>
											
											<!-- <?php
												
												$customer_id=Session::get('customer_id');
												if($customer_id==NULL)
												{
												?>
											<form action="{{URL::to('/login-check-out')}}" method="">

												{{csrf_field()}}
												<span>
												<input name ="qty"type="hidden" min="1" value="1" />
												<input name ="productid_hidden"type="hidden" value="{{$pro->product_id}}" />
												<button type="submit" class="btn btn-fefault cart">
														<i class="fa fa-shopping-cart"></i>
														Thêm giỏ hàng
													</button>
												</span>

											</form>
											<?php
											}else{ ?>
												<form action="{{URL::to('/save-cart')}}" method="post">

													{{csrf_field()}}
													<span>
													<input name ="qty"type="hidden" min="1" value="1" />
													<input name ="productid_hidden"type="hidden" value="{{$pro->product_id}}" />
													<button type="submit" class="btn btn-fefault cart">
															<i class="fa fa-shopping-cart"></i>
															Thêm giỏ hàng
														</button>
													</span>

												</form>
											<?php
											}
											?> -->

										</a>
										<!-- <a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Thêm giỏ hàng</a> -->
										
										<button type="button" class="btn btn-default add-to-cart" data-product_id="{{$pro->product_id}}" name="add-to-cart">Thêm giỏ hàng</button>
										</form>
									</div>	
								</div>
								<div class="choose">
									<ul class="nav nav-pills nav-justified">
										<li><a href="#"><i class="fa fa-plus-square"></i>Add to wishlist</a></li>
										<li><a href="#"><i class="fa fa-plus-square"></i>Add to compare</a></li>
									</ul>
								</div>
							</div>
						</div>
						@endforeach
						
	</div>
<!--features_items-->
<!--category-tab-->
	<div class="category-tab">
						<div class="col-sm-12">
							<ul class="nav nav-tabs">
								<li class="active"><a href="#laptop" data-toggle="tab">laptop</a></li>
								<li><a href="#ps4" data-toggle="tab">PS4</a></li>
								<li><a href="#usb" data-toggle="tab">USB</a></li>
							</ul>
						</div>
						<div class="tab-content">
							<div class="tab-pane fade active in" id="laptop" >
							@foreach($lap_product as $lap)
								<div class="col-sm-3">
									<a href="{{URL::to('chi-tiet-san-pham/'.$lap->product_id)}}">
										<div class="productinfo text-center">
											<img style="height:190px;width:210px;" src="{{URL::to('public/upload/product/'.$lap->product_image)}}" alt="" />
											<h2>{{number_format($lap->product_price).' '.'VNĐ'}}</h2>
											<p>{{$lap->product_name}}</p>
									
											<?php
											$customer_id=Session::get('customer_id');
											if($customer_id==NULL)
											{
											?>
												<form action="{{URL::to('/login-check-out')}}" method="">
													{{csrf_field()}}
													<span>
													<input name ="qty"type="hidden" min="1" value="1" />
													<input name ="productid_hidden"type="hidden" value="{{$lap->product_id}}" />
													<button type="submit" class="btn btn-fefault cart">
															<i class="fa fa-shopping-cart"></i>
															Thêm giỏ hàng
														</button>
													</span>
												</form>
											<?php
											}else{ ?>
												<form action="{{URL::to('/save-cart')}}" method="post">
													{{csrf_field()}}
													<span>
													<input name ="qty"type="hidden" min="1" value="1" />
													<input name ="productid_hidden"type="hidden" value="{{$lap->product_id}}" />
													<button type="submit" class="btn btn-fefault cart">
															<i class="fa fa-shopping-cart"></i>
															Thêm giỏ hàng
														</button>
													</span>
												</form>
											<?php
											}
											?>
														
											<!-- <a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Thêm giỏ hàng</a> -->
										</div>	
									</a>
								</div>
							@endforeach
							</div>
							
							<div class="tab-pane fade" id="ps4" >
								@foreach($ps4_product as $ps4)
								<div class="col-sm-3">
									<a href="{{URL::to('chi-tiet-san-pham/'.$ps4->product_id)}}">
										<div class="productinfo text-center">
											<img style="height:190px;width:210px;" src="{{URL::to('public/upload/product/'.$ps4->product_image)}}" alt="" />
											<h2>{{number_format($ps4->product_price).' '.'VNĐ'}}</h2>
											<p>{{$ps4->product_name}}</p>
											<?php
											$customer_id=Session::get('customer_id');
											if($customer_id==NULL)
											{
											?>
												<form action="{{URL::to('/login-check-out')}}" method="">

													{{csrf_field()}}
													<span>
													<input name ="qty"type="hidden" min="1" value="1" />
													<input name ="productid_hidden"type="hidden" value="{{$ps4->product_id}}" />
													<button type="submit" class="btn btn-fefault cart">
															<i class="fa fa-shopping-cart"></i>
															Thêm giỏ hàng
														</button>
													</span>

												</form>
											<?php
											}else{ ?>
												<form action="{{URL::to('/save-cart')}}" method="post">

													{{csrf_field()}}
													<span>
													<input name ="qty"type="hidden" min="1" value="1" />
													<input name ="productid_hidden"type="hidden" value="{{$ps4->product_id}}" />
													<button type="submit" class="btn btn-fefault cart">
															<i class="fa fa-shopping-cart"></i>
															Thêm giỏ hàng
														</button>
													</span>

												</form>
											<?php
											}
											?>
											<!-- <a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Thêm giỏ hàng</a> -->
										</div>	
									</a>
								</div>
							@endforeach
								
							</div>
							
							<div class="tab-pane fade" id="usb" >
								@foreach($usb_product as $usb)
								<div class="col-sm-3">
									<a href="{{URL::to('chi-tiet-san-pham/'.$usb->product_id)}}">
										<div class="productinfo text-center">
											<img style="height:190px;width:210px;" src="{{URL::to('public/upload/product/'.$usb->product_image)}}" alt="" />
											<h2>{{number_format($usb->product_price).' '.'VNĐ'}}</h2>
											<p>{{$usb->product_name}}</p>
											<?php
											$customer_id=Session::get('customer_id');
											if($customer_id==NULL)
											{
											?>
												<form action="{{URL::to('/login-check-out')}}" method="">

													{{csrf_field()}}
													<span>
													<input name ="qty"type="hidden" min="1" value="1" />
													<input name ="productid_hidden"type="hidden" value="{{$usb->product_id}}" />
													<button type="submit" class="btn btn-fefault cart">
															<i class="fa fa-shopping-cart"></i>
															Thêm giỏ hàng
														</button>
													</span>

												</form>
											<?php
											}else{ ?>
												<form action="{{URL::to('/save-cart')}}" method="post">

													{{csrf_field()}}
													<span>
													<input name ="qty"type="hidden" min="1" value="1" />
													<input name ="productid_hidden"type="hidden" value="{{$usb->product_id}}" />
													<button type="submit" class="btn btn-fefault cart">
															<i class="fa fa-shopping-cart"></i>
															Thêm giỏ hàng
														</button>
													</span>

												</form>
											<?php
											}
											?>
											<!-- <a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Thêm giỏ hàng</a> -->
										</div>	
									</a>
								</div>
							@endforeach
								
							</div>
					
						</div>
	</div>
<!--/category-tab-->
<br> <br>
<!--recommended_items-->
	<!-- <div class="recommended_items">
						<h2 class="title text-center">recommended items</h2>
						
						<div id="recommended-item-carousel" class="carousel slide" data-ride="carousel">
							<div class="carousel-inner">
								<div class="item active">	
									<div class="col-sm-4">
										<div class="product-image-wrapper">
											<div class="single-products">
												<div class="productinfo text-center">
													<img src="{{('public/frontend/images/home/recommend1.jpg')}}" alt="" />
													<h2>$56</h2>
													<p>Easy Polo Black Edition</p>
													<a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
												</div>
												
											</div>
										</div>
									</div>
									<div class="col-sm-4">
										<div class="product-image-wrapper">
											<div class="single-products">
												<div class="productinfo text-center">
													<img src="{{('public/frontend/images/home/recommend2.jpg')}}" alt="" />
													<h2>$56</h2>
													<p>Easy Polo Black Edition</p>
													<a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
												</div>
												
											</div>
										</div>
									</div>
									<div class="col-sm-4">
										<div class="product-image-wrapper">
											<div class="single-products">
												<div class="productinfo text-center">
													<img src="{{('public/frontend/images/home/recommend3.jpg')}}" alt="" />
													<h2>$56</h2>
													<p>Easy Polo Black Edition</p>
													<a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
												</div>
												
											</div>
										</div>
									</div>
								</div>
								<div class="item">	
									<div class="col-sm-4">
										<div class="product-image-wrapper">
											<div class="single-products">
												<div class="productinfo text-center">
													<img src="{{('public/frontend/images/home/recommend1.jpg')}}" alt="" />
													<h2>$56</h2>
													<p>Easy Polo Black Edition</p>
													<a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
												</div>
												
											</div>
										</div>
									</div>
									
								</div>
							</div>
							 <a class="left recommended-item-control" href="#recommended-item-carousel" data-slide="prev">
								<i class="fa fa-angle-left"></i>
							  </a>
							  <a class="right recommended-item-control" href="#recommended-item-carousel" data-slide="next">
								<i class="fa fa-angle-right"></i>
							  </a>			
						</div>
	</div> -->
<!--/recommended_items-->
@endsection
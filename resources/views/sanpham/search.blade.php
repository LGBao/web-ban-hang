
@extends('layout')
@section('content')

					<div class="features_items"><!--features_items-->
						<h2 class="title text-center">Kêt quả tìm kiếm</h2>
							@foreach($search_product  as $key =>$pro)						
                            <div class="col-sm-4">
							<div class="product-image-wrapper">
							<a href="{{URL::to('chi-tiet-san-pham/'.$pro->product_id)}}" >	

								<div class="single-products">
									<div class="productinfo text-center">
										<img  style="height:190px;width:210px;" src="{{URL::to('public/upload/product/'.$pro->product_image)}}" alt="" />
										<h2>{{number_format($pro->product_price).' '.'VNĐ'}}</h2>
										<p style="height:70px;width:250px;">{{$pro->product_name}}</p>
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
										<!-- <a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Thêm giỏ hàng</a> -->
									</div>
									<!-- <div class="product-overlay">
										<a href="{{URL::to('chi-tiet-san-pham/'.$pro->product_id)}}" >	
											<div class="overlay-content">
												<h2>{{number_format($pro->product_price).' '.'VNĐ'}}</h2>
												<p>{{$pro->product_name}}</p>
												
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
											</div>
										</a>
									</div> -->
									
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
						
					</div><!--features_items-->
@endsection
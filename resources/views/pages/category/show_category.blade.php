
@extends('layout')
@section('content')


<!-- <div style="" class="fb-share-button" data-href="http://localhost/blog/trang_chu" data-layout="button_count" data-size="small"><a target="_blank" href="https://www.facebook.com/sharer/sharer.php?u=http%3A%2F%2Flocalhost%2Fblog%2Ftrang_chu&amp;src=sdkpreparse" class="fb-xfbml-parse-ignore">Chia sẻ</a></div> 
<div style="" class="fb-like" data-href="http://localhost/blog/trang_chu" data-width="" data-layout="button_count" data-action="like" data-size="small" data-share="false"></div>	 -->
					<div class="features_items"><!--features_items-->
                    @foreach($category_name as $key =>$cate_name)	
						<h2 class="title text-center">{{$cate_name->category_name}}</h2>
                    @endforeach
                        @foreach($category_by_id as $key =>$pro)
						<a href="{{URL::to('chi-tiet-san-pham/'.$pro->product_id)}}" >							
                            <div class="col-sm-4">
							<div class="product-image-wrapper">
								<div class="single-products">
									<div class="productinfo text-center">
										<img style="height:190px;width:210px;" src="{{URL::to('public/upload/product/'.$pro->product_image)}}" alt="" />
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
										<!-- <a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a> -->
									</div>
								</a>
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
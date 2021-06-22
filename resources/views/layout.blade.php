
<!DOCTYPE html>
<html lang="en">
<head>
	<!-- seo meta -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- <meta name="description" content="$desc">
    <meta name="author" content="">
	<meta name="keywords" content="$keyword"/>
 
    <link  rel="canonical" href="" />
    <meta name="author" content=""> -->
    <!-- end seo meta -->

    <!-- <title>$title</title> -->
    <link href="{{asset('public/frontend/css/bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{asset('public/frontend/css/font-awesome.min.css')}}" rel="stylesheet">
    <link href="{{asset('public/frontend/css/prettyPhoto.css')}}" rel="stylesheet">
    <link href="{{asset('public/frontend/css/price-range.css')}}" rel="stylesheet">
    <link href="{{asset('public/frontend/css/animate.css')}}" rel="stylesheet">
	<link href="{{asset('public/frontend/css/main.css')}}" rel="stylesheet">
	<link href="{{asset('public/frontend/css/responsive.css')}}" rel="stylesheet">
	<link rel="stylesheet" href="{{asset('public/frontend/dist/sweetalert.css')}}">
    <!--[if lt IE 9]>
    <script src="js/html5shiv.js"></script>
    <script src="js/respond.min.js"></script>
    <![endif]-->       
    <link rel="shortcut icon" href="{{asset('public/frontend/images/ico/favicon.ico')}}">
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="{{asset('public/frontend/images/ico/apple-touch-icon-144-precomposed.png')}}">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="{{asset('public/frontend/images/ico/apple-touch-icon-114-precomposed.png')}}">
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="{{asset('public/frontend/images/ico/apple-touch-icon-72-precomposed.png')}}">
    <link rel="apple-touch-icon-precomposed" href="{{('public/frontend/images/ico/apple-touch-icon-57-precomposed.png')}}">
</head><!--/head-->

<body>

<?php

// echo Session::get('customer_id');
// echo Session::get('shipping_id');


?>
	<header id="header"><!--header-->
		<div class="header_top"><!--header_top-->
			<div class="container">
				<div class="row">
					<div class="col-sm-6">
						<div class="contactinfo">
							<ul class="nav nav-pills">
								<li><a href="#"><i class="fa fa-phone"></i> +84 93 10 79 901</a></li>
								<li><a href="#"><i class="fa fa-envelope"></i> giabao26072000@gmail.com</a></li>
							</ul>
						</div>
					</div>
					<div class="col-sm-6">
						<div class="social-icons pull-right">
							<ul class="nav navbar-nav">
								<li><a href="#"><i class="fa fa-facebook"></i></a></li>
								<li><a href="#"><i class="fa fa-twitter"></i></a></li>
								<li><a href="#"><i class="fa fa-linkedin"></i></a></li>
								<li><a href="#"><i class="fa fa-dribbble"></i></a></li>
								<li><a href="#"><i class="fa fa-google-plus"></i></a></li>
							</ul>
						</div>
					</div>
				</div>
			</div>
		</div><!--/header_top-->
		
		<div class="header-middle"><!--header-middle-->
			<div class="container">
				<div class="row">
					<div class="col-sm-4">
						<div class="logo pull-left">
							<a href="{{URL::to('/trang_chu')}}"><img src="{{asset('public/frontend/images/home/logo.png')}}" alt="" /></a>
						</div>
						
					</div>
					<div class="col-sm-8">
						<div class="shop-menu pull-right">
							<ul class="nav navbar-nav">
							<li><a href="{{URL::to('/trang_chu')}}"><i class="fa fa-home"></i>Trang chủ</a></li>
								<!-- <li><a href="{{URL::to('/login-check-out')}}"><i class="fa fa-user"></i> Account</a></li> -->
								<li><a href="#"><i class="fa fa-star"></i> Yêu thích</a></li>
								<?php
								$shipping_id=Session::get('shipping_id');
								$customer_id=Session::get('customer_id');
								if($customer_id!=NULL&& $shipping_id==NULL)
								{
								?>
								<li><a href="{{URL::to('/checkout')}}"><i class="fa fa-crosshairs"></i> Thanh toán</a></li>

								<?php
								} elseif($customer_id!=NULL && $shipping_id!=NULL){
								?>
								<li><a href="{{URL::to('/payment')}}"><i class="fa fa-lock"></i> thanh toán</a></li>
							<?php
								}else{ ?>
								<li><a href="{{URL::to('/login-check-out')}}"><i class="fa fa-lock"></i> Thanh toán</a></li>
								<?php
								}
								?>
								<!-- //giỏ hàng -->
								<?php
								$customer_id=Session::get('customer_id');
								if($customer_id==NULL)
								{
								?>
								<li><a href="{{URL::to('/login-check-out')}}"><i class="fa fa-shopping-cart"></i> Giỏ hàng</a></li>
							<?php
								}else{ ?>
								<li><a href="{{URL::to('/show-cart-ajax')}}"><i class="fa fa-shopping-cart"></i> Giỏ hàng</a></li>
								<?php
								}
								?>
								
								<?php

								//$customer_id=Session::get('customer_id');
								if($customer_id==NULL)
								{
								?>
								<li><a href="{{URL::to('/login-check-out')}}"><i class="fa fa-lock"></i> Đăng nhập</a></li>

							<?php
								}else{ ?>
								<li><a href="{{URL::to('/logout-check-out')}}"><i class="fa fa-lock"></i> Đăng xuất</a></li>
								<?php
								}
								?>
							</ul>
						</div>
					</div>
				</div>
			</div>
		</div><!--/header-middle-->
	
		<div class="header-bottom"><!--header-bottom-->
			<div class="container">
				<div class="row">
					<div class="col-sm-8">
						<div class="navbar-header">
							<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
								<span class="sr-only">Toggle navigation</span>
								<span class="icon-bar"></span>
								<span class="icon-bar"></span>
								<span class="icon-bar"></span>
							</button>
						</div>
					
					</div>
					<div class="col-sm-4">
					<form action="tim-kiem" method="POST">
					{{csrf_field()}}
					<div>
						<div class="pull-right">
							<input style="font-size: 14px;margin-left: 1px;padding:6px 15px;" type="submit" name="search_item" class="btn btn-info btn-sm" value="Tìm kiếm"/>
						</div>
						<div class="search_box pull-right">
							<input type="text" name="keyword_submit" placeholder="Search"/>
						</div>
						
						
					</div>
						
						
						
					</form>
					</div>
				</div>
			</div>
		</div><!--/header-bottom-->
	</header><!--/header-->
	
	<section id="slider"><!--slider-->
		<div class="container">
			<div class="row">
				<div class="col-sm-12">
					<div id="slider-carousel" class="carousel slide" data-ride="carousel">
						<ol class="carousel-indicators">
							<li data-target="#slider-carousel" data-slide-to="0" class="active"></li>
							<li data-target="#slider-carousel" data-slide-to="1"></li>
							<li data-target="#slider-carousel" data-slide-to="2"></li>
						</ol>
						
						<div class="carousel-inner">
							<div class="item active">
								<div class="col-sm-6">
									<h1><span>E</span>-SHOPPER</h1>
									<h2>Máy PS4 Slim 1TB</h2>
									<p>Gọn hơn, mỏng hơn, các cạnh bo tròn, toàn bộ thân máy nhựa nhám matte chống bám vân tay, các nút và cổng kết nối bố trí hợp lý hơn, loại bỏ cổng quang optical, có nắp mở thay ổ cứng. </p>
									<button type="button" class="btn btn-default get">Get it now</button>
								</div>
								<div class="col-sm-6">
									<img src="{{asset('public/upload/product/ps4_153.jfif')}}" class="girl img-responsive" alt="" />
									<!-- <img src="{{asset('public/frontend/images/home/pricing.png')}}"  class="pricing" alt="" /> -->
								</div>
							</div>
							<div class="item">
								<div class="col-sm-6">
									<h1><span>E</span>-SHOPPER</h1>
									<h2>Laptop Asus VivoBook X515MA N4020/4GB/256GB/Win10 (BR111T)</h2>
									<p>là một mẫu laptop học tập - văn phòng có thiết kế gọn nhẹ, hiệu năng ổn định phù hợp với các bạn thường xuyên sử dụng các ứng dụng văn phòng nhẹ nhàng. </p>
									<button type="button" class="btn btn-default get">Get it now</button>
								</div>
								<div class="col-sm-6">
									<img src="{{asset('public/upload/product/t-600x4006.jpg')}}" class="girl img-responsive" alt="" />
								</div>
							</div>
							
							<div class="item">
								<div class="col-sm-6">
									<h1><span>E</span>-SHOPPER</h1>
									<h2>Máy PS4 Slim</h2>
									<p>Việc chuyển 2 nút nguồn và lấy đĩa từ phím cảm ứng thành phím cứng ở cạnh trước máy giúp thao tác bấm đơn giản và thân thiện hơn. Nút nguồn khi máy chạy sẽ sáng lên bằng một dải đèn LED mini nhìn khá đẹp mắt. </p>
									<button type="button" class="btn btn-default get">Get it now</button>
								</div>
								<div class="col-sm-6">
									<img src="{{asset('public/upload/product/ps4_255.jfif')}}" class="girl img-responsive" alt="" />
									<!-- <img src="{{asset('public/frontend/images/home/new.png')}}" class="pricing" alt="" /> -->
								</div>
							</div>
							
						</div>
						
						<a href="#slider-carousel" class="left control-carousel hidden-xs" data-slide="prev">
							<i class="fa fa-angle-left"></i>
						</a>
						<a href="#slider-carousel" class="right control-carousel hidden-xs" data-slide="next">
							<i class="fa fa-angle-right"></i>
						</a>
					</div>
					
				</div>
			</div>
		</div>
	</section><!--/slider-->
	
	<section>
		<div class="container">
		<!-- Danh mục sản phẩm -->
			<div class="row">
				<div class="col-sm-3">
					<div class="left-sidebar">
						<h2>Danh mục sản phẩm</h2>
						<div class="panel-group category-products" id="">

						
							@foreach($category as $key =>$cate)
							<div class="panel panel-default">
								<div class="panel-heading">
									<h4 class="panel-title">
							
										<a href="{{URL::to('/danh-muc-san-pham/'.$cate->category_id)}}">
											
											{{$cate->category_name}}
										</a>
										
									</h4>
								</div>
							</div>
							@endforeach
							
						</div><!--/category-products-->
					
						<div class="brands_products"><!--brands_products-->
							<h2>Thương hiệu sản phẩm</h2>
							@foreach($brand as $key =>$brand)
							<div class="brands-name">
								<ul class="nav nav-pills nav-stacked">
									<li><a href="{{URL::to('/thuong-hieu-san-pham/'.$brand->brand_id)}}"> 
									<span class="pull-right"></span>{{$brand->brand_name}}</a></li>
									
								</ul>
							</div>
							@endforeach
						</div><!--/brands_products-->
						<!--price-range-->
						<!-- <div class="price-range">
							<h2>Price Range</h2>
							<div class="well text-center">
								 <input type="text" class="span2" value="" data-slider-min="0" data-slider-max="600" data-slider-step="5" data-slider-value="[250,450]" id="sl2" ><br />
								 <b class="pull-left">$ 0</b> <b class="pull-right">$ 600</b>
							</div>
						</div> -->
						<!--/price-range-->
						
						<div class="shipping text-center"><!--shipping-->
							<img src="images/home/shipping.jpg" alt="" />
						</div><!--/shipping-->
					
					</div>
				</div>
				
				<div class="col-sm-9 padding-right">
					<!--features_items-->
					
					<!--features_items-->
					
					<!--/recommended_items-->
					@yield('content')
				</div>
			</div>
		</div>
	</section>
	
	<footer id="footer"><!--Footer-->
		<div class="footer-top">
			<div class="container">
				<div class="row">
					<div class="col-sm-4">
						<div class="companyinfo">
							<h2><span>e</span>-shopper</h2>
							<p>Trang mua bán các thiết bị điện tử số 1 Việt Nam</p>
						</div>
					</div>
					<div class="col-sm-8">
					@foreach($category as $key =>$cate)
						
							<div class="col-sm-3">
								<div class="video-gallery text-center">
									<a href="{{URL::to('/danh-muc-san-pham/'.$cate->category_id)}}">
									{{$cate->category_name}}
									</a>
									
								</div>
							</div>
						
					@endforeach
					
				</div>
			</div>
		</div>
		
		<!-- <div class="footer-widget">
			<div class="container">
				<div class="row">
					<div class="col-sm-2">
						<div class="single-widget">
							<h2>Service</h2>
							<ul class="nav nav-pills nav-stacked">
								<li><a href="#">Online Help</a></li>
								<li><a href="#">Contact Us</a></li>
								<li><a href="#">Order Status</a></li>
								<li><a href="#">Change Location</a></li>
								<li><a href="#">FAQ’s</a></li>
							</ul>
						</div>
					</div>
					<div class="col-sm-2">
						<div class="single-widget">
							<h2>Quock Shop</h2>
							<ul class="nav nav-pills nav-stacked">
								<li><a href="#">T-Shirt</a></li>
								<li><a href="#">Mens</a></li>
								<li><a href="#">Womens</a></li>
								<li><a href="#">Gift Cards</a></li>
								<li><a href="#">Shoes</a></li>
							</ul>
						</div>
					</div>
					<div class="col-sm-2">
						<div class="single-widget">
							<h2>Policies</h2>
							<ul class="nav nav-pills nav-stacked">
								<li><a href="#">Terms of Use</a></li>
								<li><a href="#">Privecy Policy</a></li>
								<li><a href="#">Refund Policy</a></li>
								<li><a href="#">Billing System</a></li>
								<li><a href="#">Ticket System</a></li>
							</ul>
						</div>
					</div>
					<div class="col-sm-2">
						<div class="single-widget">
							<h2>About Shopper</h2>
							<ul class="nav nav-pills nav-stacked">
								<li><a href="#">Company Information</a></li>
								<li><a href="#">Careers</a></li>
								<li><a href="#">Store Location</a></li>
								<li><a href="#">Affillate Program</a></li>
								<li><a href="#">Copyright</a></li>
							</ul>
						</div>
					</div>
					<div class="col-sm-3 col-sm-offset-1">
						<div class="single-widget">
							<h2>About Shopper</h2>
							<form action="#" class="searchform">
								<input type="text" placeholder="Your email address" />
								<button type="submit" class="btn btn-default"><i class="fa fa-arrow-circle-o-right"></i></button>
								<p>Get the most recent updates from <br />our site and be updated your self...</p>
							</form>
						</div>
					</div>
					
				</div>
			</div>
		</div>
		 -->
		<div class="footer-bottom">
			<div class="container">
				<div class="row">
					<p class="pull-left">Copyright © 2021 E-SHOPPER Inc. All rights reserved.</p>
					<p class="pull-right">Designed by <span><a target="_blank" href="#">Lâm Bảo</a></span></p>
				</div>
			</div>
		</div>
		
	</footer><!--/Footer-->
	

  
    <script src="{{asset('public/frontend/js/jquery.js')}}"></script>
	<script src="{{asset('public/frontend/js/bootstrap.min.js')}}"></script>
	<!-- scrollUp kéo -->
	<script src="{{asset('public/frontend/js/jquery.scrollUp.min.js')}}"></script>

	<script src="{{asset('public/frontend/js/price-range.js')}}"></script>
	<script src="{{asset('/public/frontend/dist/sweetalert.js')}}"></script>

    <script src="{{asset('public/frontend/js/jquery.prettyPhoto.js')}}"></script>
    <script src="{{asset('public/frontend/js/main.js')}}"></script>

	<div id="fb-root"></div>
<script async defer crossorigin="anonymous" 
src="https://connect.facebook.net/vi_VN/sdk.js#xfbml=1&version=v10.0" 
nonce="mz4ufdan">
</script>
<div id="fb-root"></div>
<script async defer crossorigin="anonymous" src="https://connect.facebook.net/vi_VN/sdk.js#xfbml=1&version=v10.0" nonce="jBzPJ1H5"></script>
<script>
$(document).ready(function()
{
	// 	
	$('.add-to-cart').click(function()
	{
		var id=$(this).data('product_id');
		var cart_product_id=$('.cart_product_id_'+ id).val();
		var cart_product_name=$('.cart_product_name_'+ id).val();
		var cart_product_img=$('.cart_product_img_'+ id).val();
		var cart_product_price=$('.cart_product_price_'+ id).val();
		var cart_product_qty=$('.cart_product_qty_'+ id).val();
		var _token=$('input[name="_token"]').val();
		$.ajax({
			url:'{{URL::to("/add-cart-ajax")}}',
			method:'POST',
			data:{cart_product_id:cart_product_id,
			cart_product_name:cart_product_name,
			cart_product_img:cart_product_img,
			cart_product_price:cart_product_price,
			cart_product_qty:cart_product_qty,
			_token:_token
			},
				success:function()
				{
					swal({
                                title: "Đã thêm sản phẩm vào giỏ hàng",
                                text: "Bạn có thể mua hàng tiếp hoặc tới giỏ hàng để tiến hành thanh toán",
                                showCancelButton: true,
                                cancelButtonText: "Xem tiếp",
                                confirmButtonClass: "btn-success",
                                confirmButtonText: "Đi đến giỏ hàng",
                                closeOnConfirm: false
                            },
                            function() {
                                window.location.href = "{{URL::to('/show-cart-ajax')}}";
                            });

				}
		});
	});
});
</script>
</body>
</html>
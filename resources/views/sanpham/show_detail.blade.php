

@extends('layout')
@section('content')
@foreach($detail_product as $key => $detail_product)
<div class="product-details">
    <!--product-details-->
    <div class="col-sm-5">
                            <div class="view-product">
                                <img src="{{URL::to('/public/upload/product/'.$detail_product->product_image)}}" alt="" />
                               
                            </div>
                            <div id="similar-product" class="carousel slide" data-ride="carousel">

                                <!-- Wrapper for slides -->
                                <div class="carousel-inner">
                                    <div class="item active">
                                        <a href=""><img src="" alt=""></a>
                                        <a href=""><img src="" alt=""></a>
                                        <a href=""><img src="" alt=""></a>
                                    </div>
                                    
                                </div>

                                <!-- Controls -->
                                <!-- <a class="left item-control" href="#similar-product" data-slide="prev">
                                    <i class="fa fa-angle-left"></i>
                                </a>
                                <a class="right item-control" href="#similar-product" data-slide="next">
                                    <i class="fa fa-angle-right"></i>
                                </a> -->
                            </div>

    </div>
    <div class="col-sm-7">
                            <div class="product-information">
                                <!--/product-information-->
                                <img src="images/product-details/new.jpg" class="newarrival" alt="" />
                                <h2>{{$detail_product->product_name}}</h2>
                                <p>ID: {{$detail_product->product_id}}</p>
                                <img src="images/product-details/rating.png" alt="" />
                                <form action="{{URL::to('/save-cart')}}" method="post">

                                {{csrf_field()}}
                                <span>
									<span>{{number_format($detail_product->product_price).' '.'VN??'}}</span>
                                <label>S??? l?????ng:</label>
                                <input name ="qty"type="number" min="1" value="1" />
                                <input name ="productid_hidden"type="hidden" value="{{$detail_product->product_id}}" />
                                <button type="submit" class="btn btn-fefault cart">
										<i class="fa fa-shopping-cart"></i>
										Th??m gi??? h??ng
									</button>
                                </span>

                                </form>
                                
                                <p><b>T??nh tr???ng:</b> C??n h??ng</p>
                                <p><b>??i???u ki???n:</b> {{$detail_product->product_desc}}</p>
                                <p><b>Th????ng hi???u:</b> {{$detail_product->brand_name}}</p>
                                <p><b>Danh m???c:</b> {{$detail_product->category_name}}</p>
                                <a href=""><img src="images/product-details/share.png" class="share img-responsive" alt="" /></a>
                            </div>
                            <!--/product-information-->
    </div>
</div>

    <!--/product-details-->


<div class="category-tab shop-details-tab">
    <!--category-tab-->
    <div class="col-sm-12">
                            <ul class="nav nav-tabs">
                                <li class="active"><a href="#details" data-toggle="tab">Chi ti???t</a></li>
                                <li><a href="#reviews" data-toggle="tab">????nh gi??</a></li>
                            </ul>
    </div>
    <div class="tab-content">
                            <div class="tab-pane fade active in" id="details">
                            <p>{!!$detail_product->product_content!!}</p>
                            </div>

                           

                            <div class="tab-pane fade" id="reviews">
                                <div class="col-sm-12">
                                    
                                    <p>H??y ??i???n ????nh gi?? c???a c??c b???n v??? s???n ph???m c???a ch??ng t??i, ch??ng t??i s??? h??? tr??? kh???c ph???c khi c?? l???i x???y ra.</p>
                                    <p><b>Vi???t ????nh gi??</b></p>

                                    <form action="#">
                                        <span>
											<input type="text" placeholder="H??? v?? t??n"/>
											<input type="email" placeholder="Email"/>
										</span>
                                        <textarea name=""></textarea>
                                        <b>????nh gi??: </b> <img src="images/product-details/rating.png" alt="" />
                                        <button type="button" class="btn btn-default pull-right">
											G???i
										</button>
                                    </form>
                                </div>
                            </div>

    </div>
</div>
    <!--/category-tab-->
    @endforeach
<div class="recommended_items">
    <!--recommended_items-->
    <h2 class="title text-center">S???n ph???m li??n quan</h2>

    <div id="recommended-item-carousel" class="carousel slide" data-ride="carousel">
                            <div class="carousel-inner">
                                <div class="item active">
                                @foreach($related_product as $key =>$related_product)
                                    <div class="col-sm-4">
                                        <div class="product-image-wrapper">
                                            <div class="single-products">
                                                <div class="productinfo text-center">
                                                    <img src="{{URL::to('/public/upload/product/'.$related_product->product_image)}}" alt="" />
                                                    <h2>{{number_format($related_product->product_price)}}</h2>
                                                    <p>{{$related_product->product_name}}</p>
                                                    <button type="button" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Th??m gi??? h??ng</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                   @endforeach
                                </div>
                            </div>
                            <a class="left recommended-item-control" href="#recommended-item-carousel" data-slide="prev">
                                <i class="fa fa-angle-left"></i>
                            </a>
                            <a class="right recommended-item-control" href="#recommended-item-carousel" data-slide="next">
                                <i class="fa fa-angle-right"></i>
                            </a>
    </div>
</div>
    <!--/recommended_items-->

    @endsection
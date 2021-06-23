<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers;
use App\Http\Controllers\BrandProduct;
use App\Http\Controllers\CategoryProduct;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

//Login facebook
Route::get('/login-facebook','AdminController@login_facebook');
Route::get('/admin/callback','AdminController@callback_facebook');

//Login  google
Route::get('/login-google','AdminController@login_google');
Route::get('/google/callback','AdminController@callback_google');

//send mail
Route::get('/send-mail','HomeController@send_mail');

//frontend

Route::get('/','HomeController@index');
Route::get('/trang_chu','HomeController@index');
Route::post('/tim-kiem','HomeController@search');



//danh mục sản phẩm
Route::get('/danh-muc-san-pham/{category_id}','CategoryProduct@show_category_home');
//thương hiệu sản phẩm
Route::get('/thuong-hieu-san-pham/{brand_id}','BrandProduct@show_brand_home');

//chi tiết sản phẩm

Route::get('/chi-tiet-san-pham/{product_id}','ProductController@detail_product');




//backend
Route::get('/admin','AdminController@index');
Route::get('/dashboard','AdminController@showdashboard');
Route::get('/logout','AdminController@log_out');
Route::post('/admin-dashboard','AdminController@dashboard');


//Category
Route::get('/all_category','CategoryProduct@all_category');

Route::get('/add_category','CategoryProduct@add_category');

Route::get('/onactive-category-product/{category_id}','CategoryProduct@onactive_category_product');
Route::get('/active-category-product/{category_id}','CategoryProduct@active_category_product');

Route::post('/save-category-product','CategoryProduct@save_category_product');
Route::post('/update-category-product/{category_id}','CategoryProduct@update_category_product');



Route::get('/edit-category-product/{category_id}','CategoryProduct@edit_category_product');
Route::get('/delete-category-product/{category_id}','CategoryProduct@delete_category_product');



//brand
Route::get('/all_brand','BrandProduct@all_brand');

Route::get('/add_brand','BrandProduct@add_brand');

Route::get('/onactive-brand-product/{brand_id}','BrandProduct@onactive_brand_product');
Route::get('/active-brand-product/{brand_id}','BrandProduct@active_brand_product');

Route::post('/save-brand-product','BrandProduct@save_brand_product');
Route::post('/update-brand-product/{brand_id}','BrandProduct@update_brand_product');



Route::get('/edit-brand-product/{brand_id}','BrandProduct@edit_brand_product');
Route::get('/delete-brand-product/{brand_id}','BrandProduct@delete_brand_product');


//product
Route::get('/all_product','ProductController@all_product');

Route::get('/add_product','ProductController@add_product');

Route::get('/onactive-product/{id}','ProductController@onactive_product');
Route::get('/active-product/{id}','ProductController@active_product');

Route::post('/save-product','ProductController@save_product');
Route::post('/update-product/{id}','ProductController@update_product');



Route::get('/edit-product/{id}','ProductController@edit_product');
Route::get('/delete-product/{id}','ProductController@delete_product');


//cart
Route::post('/update-quantity-cart','CartController@update_quantity_cart');

Route::post('/save-cart','CartController@save_cart');
Route::get('/show-cart','CartController@show_cart');
Route::get('/delete-to-cart/{rowId}','CartController@delete_to_cart');

//cart ajax
Route::post('/add-cart-ajax','CartController@add_cart_ajax');
Route::get('/show-cart-ajax','CartController@show_cart_ajax');
Route::get('/delete-product-ajax/{session_id}','CartController@delete_product_ajax');

//check out
Route::get('/login-check-out','CheckoutController@login_checkout');
Route::get('/logout-check-out','CheckoutController@logout_checkout');

Route::post('/add-customer','CheckoutController@add_customer');
Route::get('/checkout','CheckoutController@checkout');

Route::post('/save-checkout-customer','CheckoutController@save_checkout_customer');
Route::post('/login-customer','CheckoutController@login_customer');
Route::post('/order-place','CheckoutController@order_place');

Route::get('/payment','CheckoutController@payment');
//order
Route::get('/manage-order','CheckoutController@manage_order');
Route::get('/view-order/{order_id}','CheckoutController@view_order');
Route::get('/delete-order/{order_id}','CheckoutController@delete_order');
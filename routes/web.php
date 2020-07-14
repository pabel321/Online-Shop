<?php

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
//content site...........
Route::get('/','HomeController@index');

//****************Frontend rout**********************//
Route::get('/product_by_category/{category_id}','HomeController@show_product_by_category');
Route::get('/product_by_manufacture/{manufacture_id}','HomeController@show_product_by_manufacture');
Route::get('/view_product/{product_id}','HomeController@product_details_by_id');

//user account Route
Route::get('/user-account','CheckoutController@user_profile');
Route::post('/edit-user','CheckoutController@edit_user');

// wishlist Route
Route::get('/add-wishlist/{product_id}','CartController@add_wishlist');
Route::get('/all-wishlist','CartController@all_wishlist');
Route::get('/delete-wishlist/{wishlist_id}','CartController@delete_wishlist');

//checkout Routes
Route::get('/login-check','CheckoutController@login_check');
Route::post('/customer-registration','CheckoutController@customer_registration');
Route::get('/checkout','CheckoutController@checkout');
Route::get('/show-shipping','CheckoutController@show_shipping');
Route::post('/edit-shipping','CheckoutController@edit_shipping');
Route::post('/save-shipping-details','CheckoutController@save_shipping_details');
Route::get('/user-order','CheckoutController@user_order');
Route::get('/received-order/{order_id}','CheckoutController@received_order');


Route::get('/payment-create-order','CheckoutController@payment_create_order');
//Cart Route
Route::post('/add-to-cart/','CartController@add_to_cart');
Route::get('/show-cart/','CartController@show_cart');
Route::get('/delete-to-cart/{id}','CartController@delete_to_cart');
Route::post('/update-cart/','CartController@update_cart');

//Customer login & logout
Route::post('/customer-login','CheckoutController@customer_login');
Route::get('/customer-logout','CheckoutController@customer_logout');

// Search route
Route::post('/search','HomeController@searching');

Route::get('/autocompletee', 'HomeController@iindex');
Route::post('/autocomplete/fetch', 'HomeController@fetch')->name('autocomplete.fetch');
Route::get('/autosearch','HomeController@autosearch');
Route::get('autocompletesearch', 'HomeController@autocompletesearch')->name('autocompletesearch');

//Shop Route
Route::get('/shopping','HomeController@shopping_home');

//Contact with admin
Route::get('/contact','HomeController@contact');
Route::post('/send-comment','HomeController@send_comment');

//payment Route
Route::get('/payment','CheckoutController@payment');
Route::post('/order-place','CheckoutController@order_place');
Route::post('/give-payment','CheckoutController@give_payment');


//*******Backend routes..........********////////

//Admin Login
Route::get('/logout','SuperAdminController@logout');
Route::get('/admin','AdminController@index');

Route::get('/dashboard','SuperAdminController@index');

Route::post('/admin-dashboard','AdminController@dashboard');

// view user
Route::get('/view-user','AdminController@view_user');
Route::get('/view-message','AdminController@view_message');
Route::get('/view-message-detail/{contact_id}','AdminController@view_message_detail');

//Manager add Routes
Route::get('/add-manager','AdminController@add_manager');
Route::post('/save-manager','AdminController@save_manager');
Route::get('/view-manager','AdminController@view_manager');

// Manager Login
Route::get('/manager','ManagerController@index');
Route::post('/manager-dashboard','ManagerController@m_dashboard');
Route::get('/manager-page','SuperAdminController@manager');
Route::get('/manager-logout','SuperAdminController@manager_logout');

//Category related routes

Route::get('/add-category','CategoryController@index');
Route::get('/all-category','CategoryController@all_category');
Route::post('/save-category','CategoryController@save_category');
Route::get('/unactive_category/{category_id}','CategoryController@unactive_category');
Route::get('/active_category/{category_id}','CategoryController@active_category');
Route::get('/edit_category/{category_id}','CategoryController@edit_category');
Route::post('/update-category/{category_id}','CategoryController@update_category');
Route::get('/delete-category/{category_id}','CategoryController@delete_category');


//manufacture or brand  routes
Route::get('/add-manufacture','ManufactureController@index');
Route::post('/save-manufacture','ManufactureController@save_manufacture');
Route::get('/all-manufacture','ManufactureController@all_manufacture');
Route::get('/delete-manufacture/{manufacture_id}','ManufactureController@delete_manufacture');
Route::get('/unactive_manufacture/{manufacture_id}','ManufactureController@unactive_manufacture');
Route::get('/active_manufacture/{manufacture_id}','ManufactureController@active_manufacture');
Route::get('/edit_manufacture/{manufacture_id}','ManufactureController@edit_manufacture');
Route::post('/update-manufacture/{manufacture_id}','ManufactureController@update_manufacture');


//products  routes
Route::get('/add-product','ProductController@index');
Route::post('/save-product','ProductController@save_product');
Route::get('/all-product','ProductController@all_product');
Route::get('/unactive_product/{product_id}','ProductController@unactive_product');
Route::get('/active_product/{product_id}','ProductController@active_product');
Route::get('/delete-product/{product_id}','ProductController@delete_product');

//Slider  routes
Route::get('/add-slider','SliderController@index');
Route::post('/save-slider','SliderController@save_slider');
Route::get('/all-slider','SliderController@all_slider');
Route::get('/unactive_slider/{slider_id}','SliderController@unactive_slider');
Route::get('/active_slider/{slider_id}','SliderController@active_slider');
Route::get('/delete-slider/{slider_id}','SliderController@delete_slider');

// Order Routes
Route::get('/manage-order','AdminController@manage_order');
Route::get('/manager-manage-order','ManagerController@manager_manage_order');
Route::get('/view-order/{order_id}','AdminController@view_order');
Route::get('/m_view-order/{order_id}','ManagerController@m_view_order');
Route::get('/confirm-payment/{order_id}','ManagerController@confirm_payment');
Route::get('/reject-payment/{order_id}','ManagerController@reject_payment');
Route::get('/bkash-payment','ManagerController@bkash_payment');


//Review Route or subscriber route
Route::post('/save-review','HomeController@save_review');
Route::post('/save-subscriber','HomeController@save_subscribe');
Route::get('/all-subscriber','ManagerController@all_subscribe');
Route::get('/all-review','ManagerController@all_review');




Route::get('datatables', function () {
    return view('datatables');
});






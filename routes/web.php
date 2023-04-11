<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
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


Route::get('/', 'HomeController@index')->name('homepage');
Route::get('/test','HomeController@test');
#Customer
// Route::get('/test', 'RoleController@index');

Route::get('/login','Auth\LoginController@showLoginHomePage')->name('login');
Route::post('/login','Auth\LoginController@loginHomePage');
Route::get('/logout','Auth\LoginController@logout')->name('logout');
Route::get('/register','Auth\RegisterController@showSignUpHomePage')->name('register');
Route::post('/register','Auth\RegisterController@register');
Route::get('/checkout','Api\CartController@getCheckout')->name('show-cart');
Route::get('/cart-empty','Api\CartController@getCartEmpty')->name('show-cart-empty');
// Route::post('/checkout','Api\CartController@postCheckout')->name('checkout');

Route::get('/product/{id}/details','ProductController@show')->name('product-details');
Route::get('/products/sale','ProductController@listProductsSale')->name('products-sale');
Route::get('/contact-us', 'HomeController@showFormContact')->name('form-contact');
Route::post('/contact-us', 'HomeController@contact')->name('contact-us');
Route::get('/categories/{id}/products','CategoryController@listProductByCate')->name('listProductByCate');
Route::get('/news/{id}','NewsController@show')->name('show-news');
Route::get('/brand/{id}/products','BrandController@showProductsByBrand')->name('products-by-brand');

// Route::get('/search', 'HomeController@search');
// Route::post('/search', 'HomeController@searchFullText')->name('search');

//Customer
Route::get('/account','CustomerController@showAccountCustomer')->name('account-customer');
Route::get('/account/{id}/edit','CustomerController@edit')->name('account-edit');
Route::put('/account/{id}','CustomerController@update')->name('account-update');

Route::post('/feebacks','FeedbackController@store')->name('feedbacks');

Route::get('order/done/{id}', 'OrderController@doneOrder')->name('orders-done');
Route::get('order/cancel/{id}', 'OrderController@cancelOrder')->name('orders-cancel');
Route::get('order/delete/{id}', 'OrderController@deleteOrder')->name('orders-delete');

//Search
Route::get('/search/product', 'ProductController@searchByName');
Route::post('/search/product', 'ProductController@searchList')->name('search');
Route::get('/search/product/list', 'ProductController@searchList')->name('search-get');
// Route::get('/cart', function () {
//     return view('cart.cart');
// })->name('show-cart');

Route::post('ajax/product-viewed','HomeController@productViewed')->name('product-viewed');

Route::get('/products', 'ProductController@index')->name('show-products');
Route::get('/product/{id}/details', 'ProductController@show')->name('product-details');
Route::get('/products/{proID}/feedback/{id}/edit','ProductController@editFeedback')->name('feedback-edit');
Route::put('/products/{proID}/feedback/{id}','ProductController@updateFeedback')->name('feedback-update');
Route::delete('/product/{proID}/details/feedback/{id}/delete', 'ProductController@deleteFeedback')->name('feedback-delete');
Route::get('/contact-us', 'HomeController@showFormContact')->name('form-contact');
Route::post('/contact-us', 'HomeController@contact')->name('contact-us');
Auth::routes();

Route::group(['prefix' => 'laravel-filemanager', 'middleware' => ['web', 'auth']], function () {
    \UniSharp\LaravelFilemanager\Lfm::routes();
});

#Admin
Route::group(
    [
        'as' => 'admin.',
        'prefix' => 'admin',
        'namespace' => 'Admin'
    ],
    function () {

        Route::get('/', 'LoginController@show')->name('main');
        // Login
        Route::get('/login', 'LoginController@show')->name('form-login');

        Route::post('/login', 'LoginController@login')->name('login');
        // logout 
        Route::get('/logout', 'LoginController@logout')->name('logout');
        
        Route::post('/logout', 'LoginController@logout')->name('logout');

        // main
        Route::get('/main', 'LoginController@show')->name('main');
        // Categories
        Route::get('/categories', 'CategoryController@index')->name('categories.list');
        // Form create cate
        Route::get('/categories/create', 'CategoryController@create')->name('categories.create');
        // Store cate
        Route::post('/categories', 'CategoryController@store')->name('categories.store');
        // Form edit cate 
        Route::get('/categories/{id}/edit', 'CategoryController@edit')->name('categories.edit')->middleware('role:admin');

        Route::put('/categories/{id}/update', 'CategoryController@update')->name('categories.update');

        Route::get('/categories/{id}/products', 'CategoryController@listProductByCategoryID')
            ->name('categories.list-product');

        Route::delete('/categories/{id}', 'CategoryController@destroy')->name('categories.delete');

        
        // products 

        Route::get('/products', 'ProductController@index')->name('products.list');

        Route::get('/products/{id}/edit', 'ProductController@edit')->name('products.edit');

        Route::put('/products/{id}/update', 'ProductController@update')->name('products.update');

        Route::get('/products/create', 'ProductController@create')->name('products.create');

        Route::post('/products', 'ProductController@store')->name('products.store');

        Route::delete('/products/{id}', 'ProductController@destroy')->name('products.delete');

        Route::get('/products/{id}', 'ProductController@productDetail')->name('products.detail');

        Route::post('/products/upload', 'ProductController@upload')->name('products.upload');
        
        //User

        Route::get('/users', 'UserController@index')->name('users.list');

        Route::get('/users/{id}/edit', 'UserController@edit')->name('users.edit');

        Route::put('/users/{id}/update', 'UserController@update')->name('users.update');

        Route::get('/users/create', 'UserController@create')->name('users.create');

        Route::post('/users', 'UserController@store')->name('users.store');

        Route::delete('/users/{id}', 'UserController@destroy')->name('users.delete');

        // Search-users
        Route::get('/users/{id}', 'UserController@show');

        Route::get('/search/users/name', 'UserController@searchByName');

        Route::get('/search/users/email', 'UserController@searchByEmail');

        Route::post('/searchAllUsers','UserController@searchAll')->name('users.search');

        Route::get('/searchAllUsers','UserController@searchAll')->name('users.search1');
        
        Route::get('/search/products/name', 'ProductController@searchByName');

        Route::post('/searchAllProducts','ProductController@searchAll')->name('products.search');

        // Roles
        Route::get('roles','RoleController@showListRole')
        ->name('roles.list');

        Route::get('roles/create','RoleController@createRole')
        ->name('roles.create');

        Route::post('roles','RoleController@storeRole')
        ->name('roles.store');
        
        Route::get('/roles/{id}/edit', 'RoleController@editRole')->name('roles.edit');

        Route::put('/roles/{id}/update', 'RoleController@updateRole')->name('roles.update');

        Route::delete('/roles/{id}', 'RoleController@deleteRole')->name('roles.delete');

        Route::get('/role/{id}/showAssign', 'RoleController@showAssign')->name('roles.assign.list');

        Route::post('/role/{id}/assignPermission', 'RoleController@assignPermission')->name('roles.assign');
        Route::get('role/viewDetail/{id}', 'RoleController@viewDetail')->name('roles.view');

        // Permission
        Route::get('permissions','PermissionController@showListPermission')
        ->name('permissions.list');

        Route::get('permissions/create','PermissionController@createPermission')
        ->name('permissions.create');

        Route::post('permissions','PermissionController@storePermission')
        ->name('permissions.store');
        
        Route::get('/permissions/{id}/edit', 'PermissionController@editPermission')->name('permissions.edit');

        Route::put('/permissions/{id}/update', 'PermissionController@updatePermission')->name('permissions.update');

        Route::delete('/permissions/{id}', 'PermissionController@deletePermission')->name('permissions.delete');

        // Order 
        Route::get('order', 'OrderController@showOrder')->name('orders.list');
        Route::get('order/view', 'OrderController@viewOrder')->name('orders.view');
        Route::get('order/active/{id}', 'OrderController@actionOrder')->name('orders.active');
        Route::delete('order/{id}', 'OrderController@deleteOrder')->name('orders.delete');
        Route::get('/order/{id}/edit', 'OrderController@editOrder')->name('orders.edit');

        Route::put('/order/{id}/update', 'OrderController@updateOrder')->name('orders.update');
        //Brand 
         Route::get('/brands', 'BrandController@index')->name('brands.list');

        Route::get('/brands/{id}/edit', 'BrandController@edit')->name('brands.edit');

        Route::put('/brands/{id}/update', 'BrandController@update')->name('brands.update');

        Route::get('/brands/create', 'BrandController@create')->name('brands.create');

        Route::post('/brands', 'BrandController@store')->name('brands.store');

        Route::delete('/brands/{id}', 'BrandController@destroy')->name('brands.delete');

        //Sale 
        Route::get('/sales', 'SaleController@index')->name('sales.list');

        Route::get('/sales/{id}/edit', 'SaleController@edit')->name('sales.edit');

        Route::put('/sales/{id}/update', 'SaleController@update')->name('sales.update');

        Route::get('/sales/create', 'SaleController@create')->name('sales.create');

        Route::post('/sales', 'SaleController@store')->name('sales.store');

        Route::delete('/sales/{id}', 'SaleController@destroy')->name('sales.delete');

        // Gallery 
        Route::get('gallery_image',function(){
            return view('admin.gallery_image.gallery');
        })->name('gallery_image');
        // Route::post('gallery', function ($id) {
            
        // });


        // TESSSSSSSSSSSSSSSSSSSST
        Route::get('/testNha','RoleController@test');
     
    }
);

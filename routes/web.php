<?php

use Illuminate\Routing\Route as RoutingRoute;
use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/login','usercontroller@login')->name('auth.login');
Route::post('/handellogin','usercontroller@HandelLogin')->name('auth.handleLogin');
Route::get('/home','HomeController@index')->name('home.index');
//login
Route::get('/forgotpassword','forgotPasswordController@getMail')->name('auth.getMail');
Route::post('/forgotpassword','forgotPasswordController@postMail')->name('auth.postMail');
Route::get('/passwordRest/{token}','passwordRestsController@getPassword')->name('auth.getpassword');
Route::post('/passwordRest','passwordRestsController@updatePassword')->name('auth.updatepassword');

//register
Route::get('/register','usercontroller@register')->name('auth.register');
Route::post('/handelregister','usercontroller@Handelregister')->name('auth.handelregister');

//Home  
Route::get('/dept_products/{id}','HomeController@getDept_Products')->name('home.getProducts');
Route::get('/searchResult','HomeController@search')->name('home.search');

//products
Route::get('/products','productController@index')->name('Shop_products.index');

//departments
Route::get('/departments','departController@index')->name('departments.index');

//contact us
Route::get('/contacUs','ContactUsController@index')->name('contact.index');
Route::post('/contacUs','ContactUsController@create')->name('contact.create');



Route::middleware('isLoginUser')->group(function(){
    
    //Profile
    Route::get('/showProfile',function (){
        return view('auth.profile');
    })->name('auth.profile');
    Route::get('/editProfile/{id}','usercontroller@edit')->name('auth.editprofile');
    Route::post('/updateProfile/{id}','usercontroller@update')->name('auth.updateprofile');
    Route::get('/deleteProfile/{id}','usercontroller@destroy')->name('auth.deleteprofile');

    // card
    Route::post('/addToCard/{product_id}/{user_id}','HomeController@addToCard')->name('home.addtocard');
    Route::get('/Card','OrderTempController@index')->name('shopingcard');
    Route::get('/delete/{product_id}','OrderTempController@delete')->name('deleteFromCard');
    Route::post('/incQuantity/{product_id}','OrderTempController@IncQuantity')->name('IncQuantity');
    Route::post('/decQuantity/{product_id}','OrderTempController@decQuantity')->name('decQuantity');

    //order
    Route::get('/checkout','OrderController@index')->name('orders');


    //Logout
    Route::get('/logout','usercontroller@logout')->name('auth.logout');

});

Route::middleware('isLoginAdmin')->group(function(){
    //Admin Home
    Route::get('/adminHome','Admin\dashboardController@index')->name('admin.index'); 

    //Admin Profile
    Route::get('/adminProfile','Admin\AdminController@showProfile')->name('admin.profile'); 
    Route::get('/adminEditProfile/{id}','Admin\AdminController@editProfile')->name('admin.editprofile'); 
    Route::post('/adminUpdateProfile/{id}','Admin\AdminController@updateProfile')->name('admin.updateprofile'); 
    Route::get('/adminDestroyProfile/{id}','Admin\AdminController@destroyProfile')->name('admin.destroyprofile'); 

    //Users
    Route::get('/users','Admin\usersController@index')->name('users.index');
    Route::get('/CreateUser','Admin\usersController@create')->name('users.create'); 
    Route::post('/storeUser','Admin\usersController@store')->name('users.store');
    Route::get('/EditUser/{id}','Admin\usersController@edit')->name('users.edit'); 
    Route::post('/UpdateUser/{id}','Admin\usersController@update')->name('users.update'); 
    Route::get('/destroyUser/{id}','Admin\usersController@destroy')->name('users.destroy'); 

     //products
     Route::get('/allProducts','Admin\productsController@index')->name('products.index');
     Route::get('/CreateProduct','Admin\productsController@create')->name('products.create'); 
     Route::post('/storeProduct','Admin\productsController@store')->name('products.store');
     Route::get('/EditProduct/{id}','Admin\productsController@edit')->name('products.edit'); 
     Route::post('/UpdateProduct/{id}','Admin\productsController@update')->name('products.update'); 
     Route::get('/destroyProduct/{id}','Admin\productsController@destroy')->name('products.destroy'); 
 
     //Orders
     Route::get('/allorders','Admin\orderController@index')->name('orders.index');
     Route::get('/Editorder/{id}','Admin\orderController@edit')->name('orders.edit'); 
     Route::post('/Updateorder/{id}','Admin\orderController@update')->name('orders.update'); 
     Route::get('/destroyorder/{id}','Admin\orderController@destroy')->name('orders.destroy'); 
 

    //Logout
    Route::get('/Adminlogout','Admin\AdminController@logout')->name('admin.logout');

});

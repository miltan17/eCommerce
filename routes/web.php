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


// Regular..........................................
Route::get('/', 'HomeController@Index');





// Admin............................................
Route::get('/admin','AdminController@Index');
Route::get('/dashboard','AdminController@GetDashboard');
Route::post('/admin_check','AdminController@checkAdmin');
Route::get('/logout', 'SuperAdminController@logout');

// Category ........................................
Route::get('/add-category', 'CategoryController@index');
Route::post('/save-category', 'CategoryController@SaveCategory');
Route::get('/all-category', 'CategoryController@AllCategory');
Route::get('/publish/{category_id}', 'CategoryController@PublishCategory');
Route::get('/unpublish/{category_id}', 'CategoryController@UnPublishCategory');
Route::get('/edit-category/{category_id}', 'CategoryController@EditCategory');
Route::post('/update-category/{category_id}', 'CategoryController@UpdateCategory');
Route::get('/delete-category/{category_id}', 'CategoryController@RemoveCategory');


// Mnaufactures ....................................
Route::get('/add-manufacture', 'ManufactureController@index');
Route::post('/save-manufacture', 'ManufactureController@SaveManufacture');
Route::get('/all-manufacture', 'ManufactureController@AllManufacture');
Route::get('/publish_manufacture/{manufacture_id}', 'ManufactureController@PublishManufacture');
Route::get('/unpublish_manufacture/{manufacture_id}', 'ManufactureController@UnPublishManufacture');
Route::get('/edit-manufacture/{manufacture_id}', 'ManufactureController@EditManufacture');
Route::post('/update-manufacture/{manufacture_id}', 'ManufactureController@UpdateManufacture');
Route::get('/delete-manufacture/{manufacture_id}', 'ManufactureController@RemoveManufacture');



// Products ........................................
Route::get('/add-product', 'ProductController@AddProduct');
Route::post('save-product', 'ProductController@SaveProduct');
























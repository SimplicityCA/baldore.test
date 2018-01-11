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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

//ADMIN
Route::get('admin/home', 'HomeController@index')->name('admin.home');

//ADMIN USERS
Route::get('admin/users', 'UserController@index')->name('admin.users.index');
Route::any('admin/users/create/{one?}/{two?}/{three?}/{four?}/{five?}',[
'as'=>'users/create',
'uses'=>'UserController@create'
]);

//CONSUMERS
Route::get('admin/consumers', 'ConsumerController@index')->name('admin.consumers.index');
Route::any('admin/consumers/create/{one?}/{two?}/{three?}/{four?}/{five?}',[
'as'=>'consumers/create',
'uses'=>'ConsumerController@create'
]);

//CONTACTS
Route::get('admin/contacts', 'ContactController@index')->name('admin.contacts.index');
Route::any('admin/contacts/create/{one?}/{two?}/{three?}/{four?}/{five?}',[
'as'=>'contacts/create',
'uses'=>'ContactController@create'
]);

//CONTENTS
Route::get('admin/contents', 'ContentController@index')->name('admin.contents.index');
Route::any('admin/contents/create/{one?}/{two?}/{three?}/{four?}/{five?}',[
'as'=>'contents/create',
'uses'=>'ContentController@create'
]);

//DRAWS
Route::get('admin/draws', 'DrawController@index')->name('admin.draws.index');
Route::any('admin/draws/create/{one?}/{two?}/{three?}/{four?}/{five?}',[
'as'=>'draws/create',
'uses'=>'DrawController@create'
]);

//PACKAGES
Route::get('admin/packages', 'PackageController@index')->name('admin.packages.index');
Route::any('admin/packages/create/{one?}/{two?}/{three?}/{four?}/{five?}',[
'as'=>'packages/create',
'uses'=>'PackageController@create'
]);

//PICTURES
Route::get('admin/pictures', 'PictureController@index')->name('admin.pictures.index');
Route::any('admin/pictures/create/{one?}/{two?}/{three?}/{four?}/{five?}',[
'as'=>'pictures/create',
'uses'=>'PictureController@create'
]);

//POSTS
Route::get('admin/posts', 'PostController@index')->name('admin.posts.index');
Route::any('admin/posts/create/{one?}/{two?}/{three?}/{four?}/{five?}',[
'as'=>'posts/create',
'uses'=>'PostController@create'
]);

//POSTS
Route::get('admin/posts', 'PostController@index')->name('admin.posts.index');
Route::any('admin/posts/create/{one?}/{two?}/{three?}/{four?}/{five?}',[
'as'=>'posts/create',
'uses'=>'PostController@create'
]);

//PROMOTIONS
Route::get('admin/promotions', 'PromotionController@index')->name('admin.promotions.index');
Route::any('admin/promotions/create/{one?}/{two?}/{three?}/{four?}/{five?}',[
'as'=>'promotions/create',
'uses'=>'PromotionController@create'
]);

//RECIPES
Route::get('admin/recipes', 'RecipeController@index')->name('admin.recipes.index');
Route::any('admin/recipes/create/{one?}/{two?}/{three?}/{four?}/{five?}',[
'as'=>'recipes/create',
'uses'=>'RecipeController@create'
]);

//TYPES
Route::get('admin/types', 'TypeController@index')->name('admin.types.index');
Route::any('admin/types/create/{one?}/{two?}/{three?}/{four?}/{five?}',[
'as'=>'types/create',
'uses'=>'TypeController@create'
]);


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


/*
- Route client
*/
Route::get('/', 'client\IndexController@viewHome')->name('index.page');
Route::get('document/{unsignedName}/{id}.html', 'client\DocumentDetailController@viewDocumentDetail')->name('client.document.detail');
Route::get('{unsignedName}/{id}.html', 'client\CategoryController@viewCategory')->name('client.category');

/*
- Login and Signup
*/
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

/*
- Route admin
*/
Route::group(['prefix' => 'admin'], function(){
    Route::get('index', 'admin\AdminController@getLayoutIndex')->name('admin.index');
    Route::group(['prefix' => 'category'], function(){
        Route::get('add', 'admin\CategoryController@getAddCategoryForm')->name('category.add');
        Route::post('add', 'admin\CategoryController@postAddCategory');

        Route::get('list', 'admin\CategoryController@getListCategoryForm')->name('category.list');
        Route::get('delete/{id}', 'admin\CategoryController@deleteCategory')->name('category.delete');

        Route::get('edit/{id}', 'admin\CategoryController@getEditCategory')->name('category.edit');
        Route::post('edit/{id}', 'admin\CategoryController@postEditCategory');
    });

    Route::group(['prefix' => 'document'], function(){
        Route::get('add', 'admin\DocumentController@getAddDocument')->name('document.add');
        Route::post('add', 'admin\DocumentController@postAddDocument')->name('document.add');
        Route::get('list', 'admin\DocumentController@getListDocument')->name('document.list');
        Route::get('edit/{id}', 'admin\DocumentController@getEditDocument')->name('document.edit');
        Route::post('edit/{id}', 'admin\DocumentController@postEditDocument');
    });

    Route::group(['prefix' => 'post'], function(){
        Route::get('edit/{id}', 'admin\PostController@getEditPost')->name('post.edit');
        Route::get('add', 'admin\PostController@getAddPost')->name('post.add');
        Route::post('add', 'admin\PostController@postAddPost')->name('post.add');

        Route::get('list', 'admin\PostController@getListPost')->name('post.list');
        Route::get('delete/{id}', 'admin\PostController@deletePost')->name('post.delete');
        Route::post('edit/{id}', 'admin\PostController@postEditPost');
    });
});

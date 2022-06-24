<?php

use Illuminate\Support\Facades\Route;
use App\Models\User;
use App\Http\Controllers\CategoriesController;
use App\Http\Controllers\Admin\ProductsController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UsersController;
use Illuminate\Http\Response;


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

Route::get('/', [HomeController::class, 'index'])->name('home');

// Client Routes

Route::middleware('auth.admin')->prefix('/categories')->group(function(){

    //Danh sách chuyên mục
    Route::get('/', [CategoriesController::class, 'index'])->name('categories.list');

    //Lấy chi tiết một chuyên mục
    Route::get('/edit/{id}', [CategoriesController::class, 'getCategory'])->name('categories.edit');

    //Xử lý update chuyên mục
    Route::post('/edit/{id}', [CategoriesController::class, 'updateCategory']);

    //Hiển thị form add dữ liệu
    Route::get('/add', [CategoriesController::class, 'addCategory'])->name('categories.add');

    //Xử lý form thêm chuyên mục
    Route::post('/add', [CategoriesController::class, 'handleAddCategory']);

    //Xóa chuyên mục
    Route::delete('/delete/{id}', [CategoriesController::class, 'deleteCategory'])->name('categories.delete');

    //Hiển thị form upload
    Route::get('upload', [CategoriesController::class, 'getFile']);

    //Upload file
    Route::post('/upload', [CategoriesController::class, 'handleFile'])->name('categories.upload');
});

// Route::get('san-pham/{id}', [HomeController::class, 'getProductDetail']);

Route::get('san-pham', [HomeController::class, 'products'])->name('product');

Route::get('them-san-pham', [HomeController::class, 'getAdd']);

Route::post('them-san-pham', [HomeController::class, 'postAdd'])->name('post-add');

// Client Admin

Route::middleware('auth.admin')->prefix('admin')->group(function(){
    Route::get('/', [DashboardController::class, 'index']);
    Route::resource('products', ProductsController::class)->middleware('auth.admin.product');
});

// Response
Route::get('demo-response', function (){
    // $response = new Response();
    // dùng helper
    $response = response();
    dd($response);
});

// Download file
Route::get('download-image', [HomeController::class, 'downloadImage'])->name('download-image');

// User
Route::prefix('users')->name('users.')->group(function (){
    Route::get('/', [UsersController::class, 'index'])->name('index');
    Route::get('/add', [UsersController::class, 'add'])->name('add');
    Route::post('/add', [UsersController::class, 'postAdd'])->name('post-add');
    Route::get('/edit/{id}', [UsersController::class, 'getEdit'])->name('edit');
    Route::post('/update', [UsersController::class, 'postEdit'])->name('post-edit');
    Route::get('/delete/{id}', [UsersController::class, 'delete'])->name('delete');
});
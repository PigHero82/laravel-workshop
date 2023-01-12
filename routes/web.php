<?php

use App\Http\Controllers\Front\BlogController as FrontBlogController;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Panel\{
    BlogController,
    CategoryController
};
use App\Models\Blog;

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
    return view('index', [
        'data' => Blog::all()->take(3)
    ]);
});

// Blog
Route::prefix('/blog')->controller(FrontBlogController::class)->name('blog.')->group(function (){
    Route::get('/', 'index')->name('index');
    Route::get('/{blog:slug}', 'show')->name('show');
});

// Admin Panel
Route::prefix('/admin')->name('admin.')->group(function (){
    Route::get('/', function () {
        return redirect()->route('admin.blog.index');
    })->name('index');

    Route::resource('category', CategoryController::class);
    Route::resource('blog', BlogController::class);
});
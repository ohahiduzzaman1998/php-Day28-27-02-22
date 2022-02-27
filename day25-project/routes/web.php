<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\ProductController;
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

Route::get('/', [StudentController::class, 'index'])->name('home');
Route::post('/new-student', [StudentController::class, 'create'])->name('new-student');

Route::get('/manage-student', [StudentController::class, 'manage'])->name('manage-student');

Route::get('/edit-student/{id}', [StudentController::class, 'edit'])->name('edit-student');

Route::post('/update-student/{id}', [StudentController::class, 'update'])->name('update-student');
Route::post('/delete-student/{id}', [StudentController::class, 'delete'])->name('delete-student');


Route::get('/manage-blog', [BlogController::class, 'manageBlog'])->name('manage-blog');

Route::get('/edit-blog/{id}', [BlogController::class, 'editBlog'])->name('edit-blog');
Route::post('/update-blog/{id}', [BlogController::class, 'updateBlog'])->name('update-blog');
Route::post('/delete-blog/{id}', [BlogController::class, 'delete'])->name('delete-blog');


Route::get('/add-blog', [BlogController::class, 'index'])->name('add-blog');
Route::post('/new-blog', [BlogController::class, 'blogCreate'])->name('new-blog');

//27.02.22

Route::get('/add-product', [ProductController::class, 'index'])->name('add-product');
Route::post('/new-product', [ProductController::class, 'createProduct'])->name('new-product');
Route::get('/manage-product', [ProductController::class, 'manageProduct'])->name('manage-product');
Route::get('/edit-product/{id}', [ProductController::class, 'editProduct'])->name('edit-product');
Route::post('/delete-product/{id}', [ProductController::class, 'deleteProduct'])->name('delete-product');
Route::post('/update-product/{id}', [ProductController::class, 'updateProduct'])->name('update-product');

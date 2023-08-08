<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\TeacherController;
use Illuminate\Support\Facades\Route;




Route::get('/',[ProductController::class,'products'])->name('products');
Route::post('/add-product',[ProductController::class,'add_product'])->name('add.product');
Route::post('/update-product',[ProductController::class,'update_product'])->name('update.product');
Route::post('/delete-product',[ProductController::class,'delete_product'])->name('delete.product');
Route::get('/pagination/paginate-data',[ProductController::class,'pagination']);
Route::get('/search-product',[ProductController::class,'search_product'])->name('search.product');


// Teacher
Route::get('/teacher',[TeacherController::class,'teacher_index'])->name('teacher.index');
Route::post('/add-teacher',[TeacherController::class,'add_teacher'])->name('add.teacher');
Route::post('/update-teacher',[TeacherController::class,'update_teacher'])->name('update.teacher');
Route::post('/delete-teacher',[TeacherController::class,'delete_teacher'])->name('delete.teacher');
Route::get('/pagination/paginate-data',[TeacherController::class,'pagination']);


// Category
Route::get('/category',[CategoryController::class,'categories'])->name('categories');
Route::post('/add-category',[CategoryController::class,'add_category'])->name('add.category');



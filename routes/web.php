<?php

use App\Http\Controllers\Attack;
use App\Http\Controllers\Dashboard\CategoriesController;
use App\Http\Controllers\Dashboard\StoresController;
use App\Http\Controllers\Website\HomeController;
use App\Models\Category;
use App\Models\Store;
use Illuminate\Support\Facades\Auth;
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
Auth::routes();
Route::get('/', function () {return view('welcome');})->name('welcome');
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::group(['middleware'=>'auth'],function (){

    Route::get('/admin/categories/show',[CategoriesController::class,'show'])->name('category.show');
    Route::post('/admin/categories/update',[CategoriesController::class,'update'])->name('category.update');
    Route::post('/admin/categories/delete',[CategoriesController::class,'destroy'])->name('category.delete');
    Route::post('/admin/categories/store',[CategoriesController::class,'store'])->name('category.store');
    Route::get('/admin/categories/search',[CategoriesController::class,'search'])->name('category.search');

    Route::get('/admin/stores/show',[StoresController::class,'show'])->name('store.show');
    Route::post('/admin/store/update',[StoresController::class,'update'])->name('store.update');
    Route::get('/admin/store/edit/{id}',[StoresController::class,'edit'])->name('store.edit');
    Route::post('/admin/store/delete/{id}',[StoresController::class,'destroy'])->name('store.delete');
    Route::post('/admin/store/store',[StoresController::class,'store'])->name('store.store');
    Route::get('/admin/stores/search',[StoresController::class,'search'])->name('store.search');
    Route::get('/admin/add/store',[StoresController::class,'addStore'])->name('add.store');
    Route::get('/admin/profile',function (){return view('dashboard.dsh_profile');})->name('admin.profile');


    Route::get('/admin/dashboard', function () {
        $categories_count = Category::count();
        $stores_count = Store::count();
        $data=['categories_count'=>$categories_count,'stores_count'=>$stores_count,];
        return view('dashboard.dsh_dashboard')->with('data',$data);})->name('admin.dashboard');

});



Route::get('/view/home',[HomeController::class,'index'])->name('ws.home');
Route::get('/view/categories/filter',[HomeController::class,'show'])->name('ws.categories.filter');
Route::get('/view/details/{id}',[HomeController::class,'details'])->name('ws.details');
Route::get('/view/search',[HomeController::class,'search'])->name('ws.search');
Route::post('/add/rating',[HomeController::class,'rating'])->name('ws.rating');


Route::get('/view/error',function (){return view('exceptions.error');})->name('error');
Route::get('/view/unauthenticated',function (){return view('exceptions.unauthenticated');})->name('unauthenticated');
Route::get('/attack',[Attack::class,'run'])->name('attack');
//Route::get('/attack/result',f)->name('attack');

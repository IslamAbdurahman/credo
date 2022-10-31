<?php

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

//Route::get('/', function () {
//    return view('welcome');
//});






Route::middleware(['auth'])->group(function () {

    Route::get('index', function (){
        return view('index');
    })->name('home.index');

    ///// Super admin routes /////
    Route::group(['prefix'=>'admin','middleware'=>'super_admin'], function (){

        Route::resources([
            'admin'=>\App\Http\Controllers\AdminController::class]);

    });

    ///// Admin routes /////
    Route::group(['prefix'=>'admin','middleware'=>'admin'], function (){

        Route::resource('admin', \App\Http\Controllers\AdminController::class)->only([
            'index', 'show','edit','update'
        ]);

    });

    ///// Manager routes /////
    Route::group(['prefix'=>'admin','middleware'=>'manager'], function (){

        Route::resource('admin', \App\Http\Controllers\AdminController::class)->only([
            'show','edit','index'
        ]);

        Route::resource('buyer', \App\Http\Controllers\BuyerController::class)->only([
            'index'
        ]);
    });

    Route::resource('travel', \App\Http\Controllers\TravelController::class);
    Route::resource('carousel', \App\Http\Controllers\CarouselController::class);
    Route::resource('about', \App\Http\Controllers\AboutController::class);

});


//Auth::routes([
//    'register' => false, // Registration Routes...
//    'reset' => false, // Password Reset Routes...
//    'verify' => false, // Email Verification Routes...
//]);

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');





Route::post('message', function (\Illuminate\Http\Request $request){

    \Illuminate\Support\Facades\Http::post('https://api.telegram.org/bot5666785517:AAEB2gQEaLig1LZwojCkaZDUKvcZ_0m42-8/sendMessage', [
//        'chat_id'=>531110501,
        'chat_id'=>507405877,
        'text'=>'Name: '.$request->name.' '.' Email: '.$request->email. ' '.
            ' Phone: '.$request->phone. ' '
            .' Message: '.$request->message. ' ',
//        'parse_mode'=>'html'
    ]);

    return redirect()->route('main');


})->name('message');



Route::get('news',function (){

    $carousel = \Illuminate\Support\Facades\DB::select('select * from carousel');
    $trips = \Illuminate\Support\Facades\DB::select('select * from trips');
    $about = \Illuminate\Support\Facades\DB::select('select * from about');


    return view('turist-uz.news',compact('carousel','trips','about'));
})->name('news');


Route::get('',function (){

    $carousel = \Illuminate\Support\Facades\DB::select('select * from carousel');
    $trips = \Illuminate\Support\Facades\DB::select('select * from trips limit 4');
    $about = \Illuminate\Support\Facades\DB::select('select * from about');



    return view('turist-uz.index', compact('carousel','trips','about'));
})->name('main');

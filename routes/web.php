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

Route::get('/donations', function () {
    if (Auth::guest()) {
      return redirect('login');

    }
    else {
      return view('donations');
    }
});

Route::get('/transactions', function () {
    if (Auth::guest()) {
      return redirect('login');

    }
    else {

      $transactions = App\Transaction::paginate(10);

      return view('transactions',compact('transactions'));
    }
});


Route::group(['middleware' => 'auth'], function () {

    Route::get('/home', function () {
      if(auth()->user()->rol_id == 1)
        return view('transactions');
      if(auth()->user()->rol_id == 2)
        return view('donations');
    });
    //    Route::get('/link1', function ()    {
//        // Uses Auth Middleware
//    });

    //Please do not remove this if you want adminlte:route and adminlte:link commands to works correctly.
    #adminlte_routes
});

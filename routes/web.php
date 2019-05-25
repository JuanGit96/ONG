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

        $roleLoged = auth()->user()->rol_id;

        $userLoged = auth()->user()->usr_id;

        if($roleLoged == 2)
        {
            $transactions = App\Transaction::where('usr_id','=',$userLoged)->paginate(10);

        }
        else
        {
            $transactions = App\Transaction::paginate(10);
        }

      return view('transactions',compact('transactions'));
    }
})->name('get_transactions');

Route::get('/galery', function () {

    return view('galery');

})->name('get_galery');

Route::group(['middleware' => 'auth'], function () {

    Route::get('/home', function () {

      if(auth()->user()->rol_id == 1)
        return redirect()->route('get_transactions');
      if(auth()->user()->rol_id == 2)
        return view('donations');
    });

    Route::get('/integrantes', 'IntegranteController@index')->name('integrantes.index');


    /* Definiendo ruta para crear usuarios*/
    Route::get('/integrantes/nuevo','IntegranteController@new')->name('integrantes.new');
    Route::post('/integrantes', 'IntegranteController@store');

    /*detalle de usuarios */
    Route::get('/integrantes/{integrante}', 'IntegranteController@detail')
        ->where('Integrante','[0-9]+')
        ->name('integrantes.detail');

    /*Rutas para edición de usuario */
    Route::get('/integrantes/{integrante}/editar', 'IntegranteController@edit')
        ->where('Integrante','[0-9]+')
        ->name('integrantes.edit');

    Route::put('/integrantes/{integrante}','IntegranteController@update')->where('Integrante','[0-9]+');

    /*Rutas para eliminarusuario */
    Route::delete('/integrantes/eliminar/{integrante}', 'IntegranteController@delete')
        ->where('Integrante','[0-9]+')
        ->name('integrantes.delete');


    //    Route::get('/link1', function ()    {
//        // Uses Auth Middleware
//    });

    //Please do not remove this if you want adminlte:route and adminlte:link commands to works correctly.
    #adminlte_routes
});

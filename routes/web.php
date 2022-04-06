<?php

use App\Http\Controllers\capitulosController;
use App\Http\Controllers\dcapController;
use App\Http\Controllers\dserieController;
use App\Http\Controllers\seriesController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

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

Route::resource('Capitulo', capitulosController::class);

Route::get('dashboard/serie', [dserieController::class, 'index'])->middleware('auth');
Route::post('dashboard/serie/store', [dserieController::class, 'store'])->middleware('auth');
Route::get('dashboard/serie/destroy/{id}', [dcapController::class, 'destroy'])->middleware('auth');

Route::get('/', [seriesController::class, 'index']);

Route::get('serie/{id}', [seriesController::class, 'show']);


Route::get('catalogo', [seriesController::class, 'catalogo']);

Route::get('dashboard/capitulos/{id}', [dcapController::class, 'show']);

Route::get('login', function () {

    if (!Auth::user()) {
        return view('Dashboard.login');
    } else {
        return redirect('dashboard/serie');
    }
});

Route::post('login', function () {

    $credenciales = request()->only('email', 'password');

    if (Auth::attempt($credenciales)) {
        request()->session()->regenerate();
        return redirect('dashboard/serie');
    }

    return view('login');
});

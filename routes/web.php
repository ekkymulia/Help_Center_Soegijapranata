<?php

use App\Http\Controllers\AkunCsController;
use App\Http\Controllers\AkunMahasiswaController;
use App\Http\Controllers\DetailAkunController;
use App\Http\Controllers\KonfigurasiAiController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RoutingController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application.
| These routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

//Route::get('/home', function () {
//    return view('index');
//})->middleware('auth')->name('home');

//Route::get('/test', function () {
//    return view('test');
//});

require __DIR__ . '/auth.php';

Route::group(['prefix' => '/', 'middleware'=>'auth'], function () {
    Route::resource("akun-cs", AkunCsController::class);
    Route::resource("akun-mahasiswa", AkunMahasiswaController::class);
    Route::resource("detail-akun", DetailAkunController::class);
    Route::resource("konfigurasi-ai", KonfigurasiAiController::class);

    Route::get('', [RoutingController::class, 'index'])->name('root');
    Route::get('/home', fn()=>view('index'))->name('home');
    Route::get('{first}/{second}/{third}', [RoutingController::class, 'thirdLevel'])->name('third');
    Route::get('{first}/{second}', [RoutingController::class, 'secondLevel'])->name('second');
    Route::get('{any}', [RoutingController::class, 'root'])->name('any');
});

?>

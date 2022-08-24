<?php

use App\Http\Controllers\RegisterController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LobbyController;
use App\Http\Controllers\LogoutController;

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

Route::get('/',[HomeController::class,'index'])->name('home.index');

Route::post('login', [LoginController::class,'login'])->name('login.login');
Route::get('register', function (){
    return view('auth.register');
});
Route::post('register',[RegisterController::class,'store'])->name('register.store');

Route::group(['middleware' => 'CheckToken'], function () {
    Route::get('usuarios', [UserController::class,'listado']);
    Route::get('logout',[LogoutController::class,'logout'])->name('logout.logout');
    Route::get('lobby',[LobbyController::class,'index'])->name('lobby.index');
});
/*
Route::post('/login',[LoginController::class,'login'])->name('login.login');
Route::get('/lobby',[LobbyController::class,'index'])->name('lobby.index');
Route::get('/logout',[LogoutController::class,'logout'])->name('logout.logout');

Route::get('prueba1',function(){
    return view('prueba1');
});

*/
/*
Route::get('/', function () {
    return view('welcome');
});

Route::get('/register', function (){
    return view('auth.register');
});

Route::post('/register',[RegisterController::class,'store'])->name('register.store');

Route::get('/login', function(){
    return view('auth.login');
});

Route::post('/login',[LoginController::class,'login'])->name('login.login');

Route::get('/home',[HomeController::class,'index'])->name('home.index');

Route::get('/logout',[LogoutController::class,'logout'])->name('logout.logout');
*/
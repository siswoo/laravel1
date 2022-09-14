<?php

use App\Http\Controllers\RegisterController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LobbyController;
use App\Http\Controllers\LogoutController;
use App\Http\Controllers\ModelosController;
use App\Http\Controllers\ModulosController;
use App\Http\Controllers\PasantesController;
use App\Http\Controllers\PasantiasController;
use App\Http\Controllers\PruebasController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\RolesController;
use App\Http\Controllers\SedesController;
use App\Http\Controllers\UsersRolesController;

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

Route::get('doublelogin', function(){
    return view('home.doublelogin');
})->name('login.doublelogin');

Route::get('logout2',[LogoutController::class,'logout2'])->name('logout.logout2');

Route::group(['middleware' => 'CheckToken'], function () {
    Route::get('usuarios', [UserController::class,'listado']);
    Route::get('logout',[LogoutController::class,'logout'])->name('logout.logout');
    Route::get('lobby',[LobbyController::class,'index'])->name('lobby.index');
    Route::put('lobby/primer_login',[LobbyController::class,'primer_login'])->name('lobby.primer_login');
    
    Route::get('usuarios_admin', [UserController::class,'index'])->name('usuarios.index');
    Route::get('usuarios_create', [UserController::class,'create'])->name('usuarios.create');
    Route::post('usuarios_store', [UserController::class,'store'])->name('usuarios.store');
    Route::get('usuarios/{id}', [UserController::class,'show'])->name('usuarios.show');
    Route::put('usuarios', [UserController::class,'update'])->name('usuarios.update');
    Route::post('usuarios/destroy', [UserController::class,'destroy'])->name('usuarios.destroy');
    Route::get('usuarios/createRol/{id}', [UserController::class,'createRol'])->name('usuarios.createRol');
    //Route::get('table1', [UserController::class,'table1'])->name('table1');

    Route::get('modulos_admin', [ModulosController::class,'index'])->name('modulos.index');
    Route::get('modulos_create', [ModulosController::class,'create'])->name('modulos.create');
    Route::get('modulos/{id}', [ModulosController::class,'show'])->name('modulos.show');
    Route::put('modulos', [ModulosController::class,'update'])->name('modulos.update');
    Route::post('modulos_store', [ModulosController::class,'store'])->name('modulos.store');
    Route::post('modulos/destroy', [ModulosController::class,'destroy'])->name('modulos.destroy');

    Route::get('roles_create',[RolesController::class,'create'])->name('roles.create');
    Route::post('roles_store',[RolesController::class,'store'])->name('roles.store');
    Route::get('roles/{id}',[RolesController::class,'show']);
    Route::put('roles',[RolesController::class,'update'])->name('roles.update');
    Route::post('roles/destroy', [RolesController::class,'destroy'])->name('roles.destroy');

    Route::post('UsersRoles',[UsersRolesController::class,'store'])->name('UsersRoles.store');
    Route::post('UsersRoles/destroy',[UsersRolesController::class,'destroy'])->name('UsersRoles.destroy');
    
    Route::get('pasantias/pasantiaVip',[PasantiasController::class,'pasantiaVipCreate'])->name('pasantiaVip.create');
    Route::get('pasantias/pasantiaNorte',[PasantiasController::class,'pasantiaNorteCreate'])->name('pasantiaNorte.create');
    Route::get('pasantias/pasantiaTunal',[PasantiasController::class,'pasantiaTunalCreate'])->name('pasantiaTunal.create');
    Route::get('pasantias/pasantiaVipSuba',[PasantiasController::class,'pasantiaVipSubaCreate'])->name('pasantiaVipSuba.create');
    Route::get('pasantias/pasantiaSoacha',[PasantiasController::class,'pasantiaSoachaCreate'])->name('pasantiaSoacha.create');
    Route::get('pasantias/pasantiaBucaramanga',[PasantiasController::class,'pasantiaBucaramangaCreate'])->name('pasantiaBucaramanga.create');
    Route::get('pasantias/pasantiaCali',[PasantiasController::class,'pasantiaCaliCreate'])->name('pasantiaCali.create');
    Route::get('pasantias/pasantiaSatelite',[PasantiasController::class,'pasantiaSateliteCreate'])->name('pasantiaSatelite.create');
    Route::post('pasantias',[PasantiasController::class,'store'])->name('pasantias.store');
    
    Route::get('sedes',[SedesController::class,'index'])->name('sedes.index');
    Route::get('sedes/create',[SedesController::class,'create'])->name('sedes.create');
    Route::post('sedes_store',[SedesController::class,'store'])->name('sedes.store');
    Route::get('sedes/{id}',[SedesController::class,'show']);
    Route::put('sedes',[SedesController::class,'update'])->name('sedes.update');
    Route::post('sedes/destroy',[SedesController::class,'destroy'])->name('sedes.destroy');

    Route::get('pasantes/info',[PasantesController::class,'info'])->name('pasantes.info');
    Route::get('pasantes/indexVip',[PasantesController::class,'indexVip'])->name('pasantesVip.index');
    Route::get('pasantes/{sede}/{id}',[PasantesController::class,'show'])->name('pasantes.show');
    Route::put('pasantes',[PasantesController::class,'update'])->name('pasantes.update');
    Route::post('pasantes/aceptar1',[PasantesController::class,'aceptar1'])->name('pasantes.aceptar1');
    Route::post('pasantes/rechazar1',[PasantesController::class,'rechazar1'])->name('pasantes.rechazar1');

    Route::get('modelos/indexVip',[ModelosController::class,'indexVip'])->name('modelosVip.index');
    Route::get('modelos/{sede}/{id}',[ModelosController::class,'show'])->name('modelos.show');
    Route::put('modelos',[ModelosController::class,'update'])->name('modelos.update');
    Route::get('modelos/personal',[ModelosController::class,'personal'])->name('modelosPersonal.index');
    Route::get('modelos/bancarios',[ModelosController::class,'bancarios'])->name('modelosBancarios.index');
    Route::get('modelos/corporales',[ModelosController::class,'corporales'])->name('modelosCorporales.index');
    Route::get('modelos/documentos',[ModelosController::class,'documentos'])->name('modelosDocumentos.index');
    Route::get('modelos/contrato',[ModelosController::class,'contrato'])->name('modelosContrato.index');
    Route::get('modelos/cuentas',[ModelosController::class,'cuentas'])->name('modelosCuentas.index');
    Route::get('modelos/fotos',[ModelosController::class,'fotos'])->name('modelosFotos.index');
    Route::get('modelos/pagos',[ModelosController::class,'pagos'])->name('modelosPagos.index');
    Route::get('modelos/documentos/{sede}/{id}',[ModelosController::class,'documentos_index'])->name('modelos.documentos');
});

Route::get('roles_admin',[RolesController::class,'index'])->name('roles.index')->middleware('CheckToken', 'CheckRoles');

Route::get('pruebas1',[PruebasController::class,'pruebas1'])->name('pruebas.index');

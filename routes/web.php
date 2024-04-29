<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RecetasController;
use App\Http\Controllers\RecetasMedicamentosController;

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
Route::resource("recetas", RecetasController::class)->parameters(["recetas"=>"receta"]); //recetas.index, recetas.create, recetas.edit, etc.

Route::resource("recetasmedicamentos", RecetasMedicamentosController::class)->parameters(["recetamedicamentos"=>"recetamedicamento"]); //recetas.index, recetas.create, recetas.edit, etc.
Route::get('recetas/{receta}/medicamentos',[RecetasController::class, 'ver_medicamentos'])->name('recetas.medicamentos');
Route::post('recetas/reporte',[RecetasController::class, 'reportes'])->name('recetas.reportes');
Route::get('/establecimientos',[RecetasController::class, 'establecimientosList']);

<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Restaurante;
use App\Detalles;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('restaurantes', 'RestauranteController@getAll')->name('getAllRestaurants');

Route::post('agregar', 'RestauranteController@add')->name('agregarRestaurante');

Route::patch('actualizar/{id}', function ($id, Request $request) {
    $datos = request()->except((['_method']));
    Restaurante::where('id', '=', $id)->update($datos);
    return back();
})->name('actualizarRestaurante');

Route::delete('eliminar/{id}', function ($id) {
    Restaurante::destroy($id);
    return back();
})->name('eliminarRestaurante');

Route::patch('reservar/{id}', function ($id) {
    $datos['estado'] = 0;
    Detalles::where('id', '=', $id)->update($datos);
    return back();
})->name('reservarMesa');
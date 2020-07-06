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

Route::post('filtrar', 'RestauranteController@filtrar')->name('filtrar');

Route::patch('actualizar/{id}', function ($id, Request $request) {
    $datos = request()->except((['_method']));
    Restaurante::where('id', '=', $id)->update($datos);
    return back();
})->name('actualizarRestaurante');

Route::delete('eliminar/{id}', function ($id) {
    Restaurante::destroy($id);
    return back();
})->name('eliminarRestaurante');

Route::patch('reservar/{id}', function ($id, Request $request) {
    $datos['estado'] = 0;
    $datos['fechaReserva'] = $request['fecha'];
    Detalles::where('id', '=', $id)->update($datos);
    return redirect('/reservas');
})->name('reservarMesa');

Route::post('buscar/{id}', function ($id, Request $request) {
    $data['detalle'] = Detalles::where('idRestaurante', $id)->get();
    $data['restaurante'] = Restaurante::findorfail($id);
    $data['id'] = $id;
    $data['fecha'] = $request["fecha"];
    $data['fechaMin'] = date("Y-m-d");
    return view('detalle', $data);
})->name('Buscar');
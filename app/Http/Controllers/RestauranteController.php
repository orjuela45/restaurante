<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Restaurante;
use App\Detalles;

class RestauranteController extends Controller
{
    public function getAll(){
        $restaurantes = Restaurante::all();
        return $restaurantes;
    }

    public function add(Request $request) {
        $idRestaurant = Restaurante::insertGetId($request->all());
        for($i=1;$i<=15;$i++){
            $data['idRestaurante'] = $idRestaurant;
            $data['numero'] = $i;
            $data['fechaReserva'] = null;
            $data['estado'] = true;
            Detalles::insert($data);
        }
        return back();
    }

    public function index(){
        $data['restaurants'] = restaurante::paginate(5);
        return view('menu', $data);
    }

    public function filtrar(Request $request){
        if($request["filtro"] == null)
            return redirect("/");   
        $data['restaurants'] = restaurante::where($request['tipo'], $request['filtro'])->paginate(5);
        return view('menu', $data);
    }
}

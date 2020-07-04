<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Detalles;
use App\Restaurante;

class DetallesController extends Controller
{
    public function ver($id){
        $data['detalle'] = Detalles::where('idRestaurante', $id)->get();
        $data['restaurante'] = Restaurante::findorfail($id);
        return view('detalle', $data);
    }

    public function reservar(){
        
    }
}

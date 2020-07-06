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
        $data['id'] = $id;
        $data['fecha'] = date("Y-m-d");
        $data['fechaMin'] = date("Y-m-d");
        return view('detalle', $data);
    }

    public function reservas(){
        $data['reservas'] = Detalles::join('restaurante', 'restaurante.id', '=', 'detalles.idRestaurante')->whereNotNull('detalles.fechaReserva')->orderBy('detalles.fechaReserva')->get();
        return view('reserva', $data);
    }
}

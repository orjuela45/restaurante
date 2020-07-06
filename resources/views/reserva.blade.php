@extends('layouts.base')
<div class="container mt-5">
    <div class="d-flex justify-content-center m-5">
        <h1> lista de reservas por restaurante</h1>
    </div>
    <div class="d-flex">
        <table class="table table-bordered table-striped text-center">
            <thead>
                <tr>
                    <th>Nombre</th>
                    <th>Direccion</th>
                    <th>fecha de reserva</th>
                    <th>Numero de mesa</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($reservas as $reserva)
                    <tr>
                        <td>{{$reserva->Nombre}}</td>
                        <td>{{$reserva->Direccion}}</td>    
                        <td>{{$reserva->fechaReserva}}</td>
                        <td>{{$reserva->numero}}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <a href="{{url('/')}}" class="btn btn-primary form-control">Volver</a>
</div>
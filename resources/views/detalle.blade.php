@extends('layouts.base')
<div class="container mt-5">
    <div class="row">
        <div class="col-sm-12 col-xl-8">
            <div class="d-flex flex-wrap">
                @for ($i = 1; $i <=15 ; $i++)
                    <div class="m-2 justify-content-center rounded border border-secondary p-5">
                        @if ($detalle[$i-1]['fechaReserva'] != $fecha)
                            <div class="alert alert-success" role="alert">
                                Disponible
                            </div>
                        @else
                            <div class="alert alert-danger" role="alert">
                                reservada
                            </div>
                        @endif
                        <img src="{{asset('img/mesa.png')}}" width="100px">
                        <h4>Mesa N° {{$i}}</h4>
                        @if ($detalle[$i-1]['fechaReserva'] != $fecha)
                            <form action="{{route('reservarMesa',  $detalle[$i-1]['id'])}}" method="POST">
                                @method('PATCH')
                                <input type="date" id="start" name="fecha" value="{{$fecha}}" hidden>
                                <button type="submit" class="btn btn-success">Reservar</button>
                            </form>
                        @endif
                    </div>
                @endfor
            </div>
        </div>
        <div class="col-sm-12 col-xl-4">
            <div class="card">
                <div class="card-header text-center"> Fecha a reservar </div>
                <div class="card-body">
                    <form action="{{route('Buscar', $id)}}" method="post" >
                        <div class="form-group m-2">
                            <input type="date" id="start" name="fecha" value="{{$fecha}}" min="{{$fechaMin}}">
                            <button class="btn btn-primary ml-2" type="submit">Buscar</button>
                        </div>
                    </form>
                </div>
            </div>
            <div class="card" id="informacion">
                <div class="card-header text-center"> Informacion Restaurante </div>
                <div class="card-body">
                    <div class="row form-group">
                        <label for="nombre">Nombre</label>
                        <input type="text" name="nombre" id="nombreA" class="form-control" disabled value="{{$restaurante['Nombre']}}">
                    </div>
                    <div class="row form-group">
                        <label for="descripcion">Descripción</label>
                        <textarea name="descripcion" id="descripcionA" class="form-control " disabled>{{$restaurante['Descripcion']}}</textarea>
                    </div>
                    <div class="row form-group">
                        <label for="direccion">Dirección</label>
                        <input type="text" name="direccion" id="direccionA" class="form-control " disabled value="{{$restaurante['Direccion']}}">
                    </div>
                    <div class="row form-group">
                        <label for="ciudad">Ciudad</label>
                        <input type="text" name="ciudad" id="ciudadA" class="form-control " disabled value="{{$restaurante['Ciudad']}}">
                    </div>
                    <div class="row form-group">
                        <label for="foto">URL de foto</label>
                        <input type="text" name="foto" id="fotoA" class="form-control" disabled value="{{$restaurante['Foto']}}">
                    </div>
                    <div class="row form-group">
                        <img src="{{$restaurante['Foto']}}" alt="" width="100%">
                    </div>
                    <div class="row form-group">
                        <a href="{{url('/')}}" class="btn btn-primary form-control">Volver</a>
                    </div>
                </div>
            </div>
        </div> 
    </div>
</div>
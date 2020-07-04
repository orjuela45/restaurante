@extends('layouts.base')
<script src="{{ asset('js/menu.js') }}"></script>
<div class="container mt-5">
    <div class="row">
        <div class="col-sm-12 col-xl-4">
            <div class="card" id="cardInsertar">
                <form action="{{route('agregarRestaurante')}}" method="post" id="form1">
                    <div class="card-header text-center"> Agregar Restaurante </div>
                    <div class="card-body">
                        <div class="row form-group">
                            <label for="nombre">Nombre</label>
                            <input type="text" name="nombre" id="nombreI" class="form-control obligatorio1">
                        </div>
                        <div class="row form-group">
                            <label for="descripcion">Descripción</label>
                            <textarea name="descripcion" id="descripcionI"class="form-control obligatorio1"></textarea>
                        </div>
                        <div class="row form-group">
                            <label for="direccion">Dirección</label>
                            <input type="text" name="direccion" id="direccionI" class="form-control obligatorio1">
                        </div>
                        <div class="row form-group">
                            <label for="ciudad">Ciudad</label>
                            <input type="text" name="ciudad" id="ciudadI" class="form-control obligatorio1">
                        </div>
                        <div class="row form-group">
                            <label for="foto">URL de foto</label>
                            <input type="text" name="foto" id="fotoI" class="form-control obligatorio1">
                        </div>
                    </div>
                </form>
                <div class="row justify-content-center mb-5">
                    <button onclick="validarCampos1()" class="btn btn-primary">Guardar</button>
                </div>
            </div>
            <div class="card" id="cardActualizar" hidden>
                <form action="{{route('actualizarRestaurante', -1)}}" method="post" id="form2">
                    @method('PATCH')
                    <div class="card-header text-center"> Actualizar Restaurante </div>
                    <div class="card-body">
                        <div class="row form-group">
                            <label for="nombre">Nombre</label>
                            <input type="text" name="nombre" id="nombreA" class="form-control obligatorio2">
                        </div>
                        <div class="row form-group">
                            <label for="descripcion">Descripción</label>
                            <textarea name="descripcion" id="descripcionA" class="form-control obligatorio2"></textarea>
                        </div>
                        <div class="row form-group">
                            <label for="direccion">Dirección</label>
                            <input type="text" name="direccion" id="direccionA" class="form-control obligatorio2">
                        </div>
                        <div class="row form-group">
                            <label for="ciudad">Ciudad</label>
                            <input type="text" name="ciudad" id="ciudadA" class="form-control obligatorio2">
                        </div>
                        <div class="row form-group">
                            <label for="foto">URL de foto</label>
                            <input type="text" name="foto" id="fotoA" class="form-control obligatorio2">
                        </div>
                    </div>
                </form>
                <div class="row justify-content-center mb-5">
                    <button onclick="validarCampos2()" class="btn btn-primary ">Actualizar</button>
                    <button onclick="registrar()" class="btn btn-primary ml-2">No Actualizar</button>
                </div>
            </div>
        </div>
        <div class="col-sm-12 col-xl-8">
            <table class="table table-bordered table-striped text-center">
                <thead>
                    <tr>
                        <th>Nombre</th>
                        <th>Direccion</th>
                        <th>Ciudad</th>
                        <th>Accion</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($restaurants as $restaurant)
                        <tr>
                            <td>{{$restaurant->Nombre}}</td>
                            <td>{{$restaurant->Direccion}}</td>
                            <td>{{$restaurant->Ciudad}}</td>
                            <td>
                                <form action="{{route('eliminarRestaurante', $restaurant->id)}}" method="POST">
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-warning">Eliminar</button>
                                </form>
                                <button class="btn btn-danger" onclick="actualizar({{json_encode($restaurant)}})">Actualizar</button>
                                <a href="{{url('/ver', $restaurant->id)}}" class="btn btn-success">Ver</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            {{ $restaurants->links()}}
        </div>
    </div>
</div>

<script>
    function actualizar(restaurant){
        $("#cardInsertar").attr("hidden", true);
        $("#cardActualizar").attr("hidden", false);
        $(".obligatorio1").each(function () {
            $("[name='" + $(this).attr("name") + "']").css("border-color", "");
        });
        $(".obligatorio2").each(function () {
            $("[name='" + $(this).attr("name") + "']").css("border-color", "");
        });	
        $("#nombreA").val(restaurant.Nombre);
        document.getElementById("nombreA").value = "dwad";
        $("#descripcionA").val(restaurant.Descripcion);
        $("#direccionA").val(restaurant.Direccion);
        $("#ciudadA").val(restaurant.Ciudad);
        $("#fotoA").val(restaurant.Foto);
        $("#form2").attr("action", "http://localhost:8000/api/actualizar/" + restaurant.id)
    }
</script>
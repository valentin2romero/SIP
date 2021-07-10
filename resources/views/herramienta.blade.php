@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row margin-home-content">
        <div class="col-md-10">
            <div class="titulo-home">
                <a href="{{route('home')}}">INICIO</a> > HERRAMIENTA
            </div>

            <div class="row">
                <div class="col-md-12">
                    <div class="card" style="height: 100%;">
                        <div class="card-body">
                            <div class="encabezado-2">
                                Texto Sentencia
                            </div>
                            <div class="cuerpo-2">
                                Crear, modificar y eliminar los textos de las sentencias.<br />
                                Estos textos de las sentencias tienen variables que hacen referencia a las que figuran en el Modelo, una vez que una sentencia es descargada se remplaza el valor de estas variables por el valor de la descripcion.<br />
                            </div>
                            <div class="row" style="margin-top: 25px;">
                                <div class="col-md-4 offset-4">
                                    <a href="{{route('texto-sentencia.index')}}" class="btn btn-md btn-block login-boton">Ingresar</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <br />
        </div>
    </div>
</div>
@endsection
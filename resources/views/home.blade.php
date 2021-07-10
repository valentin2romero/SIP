@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row margin-home-content">
        <div class="col-md-12">
            <div class="titulo-home">
                INICIO
            </div>
            <div class="card">
                <div class="card-body">
                    <div class="encabezado-2">
                        Generar Sentencia
                    </div>
                    <div class="cuerpo-2">
                        Utiliza el nuevo Sistema Inteligente Previsional para generar una sentencia modelo completando la información relevante
                    </div>
                    <div class="row">
                        <div class=" col-md-4 justify-content-center text-center">
                            <a href="{{route('sentencia.create')}}" class="btn btn-secondary btn-block generate-sentencia" style="align-items: center !important; padding-left: 1rem; padding-right: 1rem;" data-position="top" data-delay="50" data-tooltip="Editar">Generar Sentencia<i class="material-icons"></i></a>
                        </div>
                    </div>
                </div>
            </div>

            <br class="mt-4" />
            <div class="card al-fondo">
                <div class="card-body">
                    <div class="encabezado-2">
                        Sentencias generadas recientemente
                    </div>
                    <br class="mt-4" />
                    <div class="cuerpo-2">
                        <div class="row">
                            <div class="col-md-10">
                                {{$table}}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
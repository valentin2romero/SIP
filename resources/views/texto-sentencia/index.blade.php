@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row margin-home-content">
        <div class="col-md-10">
            <div class="titulo-home">
                <a href="{{route('home')}}">INICIO</a> > <a href="{{route('home.herramienta')}}">HERRAMIENTA</a> > TEXTO SENTENCIA
            </div>

            <div class="row">
                <div class="col-md-12">
                    <div class="card" style="height: 100%;">
                        <div class="card-body">
                            <div class="encabezado-2">
                                Informacion
                            </div>
                            <div class="cuerpo-2">
                                En este apartado, se encuentra la informacion de cada variable con su respectiva vigencia.<br/>
                                Estas variables hacen referencia a las que figuran en el Modelo, una vez que una sentencia es descargada se remplaza el valor de estas variables por el valor de la descripcion.<br/> 
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <br/>

            {{ $table }}
            <br/>
        </div>
    </div>
</div>
@endsection
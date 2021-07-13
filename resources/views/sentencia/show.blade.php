@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row margin-home-content">
        <div class="col-md-10">
            <div class="titulo-home">
                <a href="{{route('home')}}">INICIO</a> > <a href="{{route('sentencia.index')}}">SENTENCIA</a> > VER
            </div>
            <div class="card">
                <div class="card-body">
                    <div class="encabezado-2">
                        Informacion
                    </div>
                    <div class="cuerpo-2">
                        Utiliza el nuevo Sistema Inteligente Previsional para editar o descargar la Sentencia
                    </div>
                </div>
            </div>
            <br />
            <div class="card">
                <div class="card-body">
                    <div class="encabezado-2">
                        Herramientas
                    </div>
                    <div class="row">
                        <div class=" col-md-4">
                            <a href="{{route('sentencia.edit', $sentencia)}}" class="btn btn-secondary btn-block generate-sentencia" style="padding-left: 1rem; padding-right: 1rem;">Editar<i class="material-icons"></i></a>
                        </div>
                        <div class=" col-md-4">
                            <a href="{{route('sentencia.download', $sentencia)}}" class="btn btn-secondary btn-block generate-sentencia" style="padding-left: 1rem; padding-right: 1rem;">Descargar<i class="material-icons"></i></a>
                        </div>
                        <div class=" col-md-4">
                            <form method="POST" action="{{route('sentencia.destroy', $sentencia->id)}}">
                                @csrf
                                @method('DELETE')
                                <button type="submit" onclick="return  confirm('¿Esta seguro en eliminar la sentencia?')" class="btn btn-secondary btn-block delete-sentencia" style="padding-left: 1rem; padding-right: 1rem;">Eliminar</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <br />
            <livewire:sentencia.mostrar :sentencia="$sentencia" :valores="NULL" />
        </div>
    </div>
</div>
@endsection
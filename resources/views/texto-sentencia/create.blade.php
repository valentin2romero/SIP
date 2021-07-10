@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row margin-home-content">
        <div class="col-md-10">

            <div class="titulo-home">
                <a href="{{route('home')}}">INICIO</a> > <a href="{{route('home.herramienta')}}">HERRAMIENTA</a> > <a href="{{route('texto-sentencia.index')}}">TEXTO SENTENCIA</a> > CREAR
            </div>

            <form action=" {{ route('texto-sentencia.store') }} " method="POST" autocomplete="off">
                @method('POST')
                @csrf

                <div class="row text-center" style="margin-bottom: 25px;">
                    <div class="col-md-4 offset-4">
                        <button type="submit" class="btn btn-md btn-block login-boton">Guardar</button>
                    </div>
                </div>

                @include('texto-sentencia.partials.form')

                <div class="row text-center" style="margin-top: 25px;">
                    <div class="col-md-4 offset-4">
                        <button type="submit" class="btn btn-md btn-block login-boton">Guardar</button>
                    </div>
                </div>

            </form>

        </div>
    </div>
</div>
@endsection
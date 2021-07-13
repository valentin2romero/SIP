@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row margin-home-content">
        <div class="col-md-10">
            <div class="titulo-home">
                <a href="{{route('home')}}">INICIO</a> > <a href="{{route('sentencia.index')}}">SENTENCIA</a> > NUEVA
            </div>
            <livewire:sentencia.formulario :sentencia="null" />
        </div>
    </div>
</div>
@endsection
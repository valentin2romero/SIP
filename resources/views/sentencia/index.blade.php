@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row margin-home-content">
        <div class="col-md-10">
            <div class="titulo-home">
                <a href="{{route('home')}}">INICIO</a> > SENTENCIA
            </div>
            {{ $table }}
        </div>
    </div>
</div>
@endsection
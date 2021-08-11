@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <div class="row margin-home-content">
            <div class="col-md-10">

                <div class="titulo-home">
                    <a href="{{ route('home') }}">INICIO</a> > <a href="{{ route('home.herramienta') }}">HERRAMIENTA</a>
                    >
                    <a href="{{ route('texto-sentencia.index') }}">TEXTO SENTENCIA</a> > VER
                </div>

                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class=" col-md-4">
                                <a href="{{ route('texto-sentencia.index') }}"
                                    class="btn btn-secondary btn-block generate-sentencia"
                                    style="padding-left: 1rem; padding-right: 1rem;">Volver<i
                                        class="material-icons"></i></a>
                            </div>
                            <div class=" col-md-4">
                                <a href="{{ route('texto-sentencia.edit', $texto_sentencia) }}"
                                    class="btn btn-secondary btn-block generate-sentencia"
                                    style="padding-left: 1rem; padding-right: 1rem;">Editar<i
                                        class="material-icons"></i></a>
                            </div>
                            <div class=" col-md-4">
                                <form method="POST" action="{{ route('texto-sentencia.destroy', $texto_sentencia->id) }}">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit"
                                        onclick="return  confirm('¿Esta seguro en eliminar la sentencia?')"
                                        class="btn btn-secondary btn-block delete-sentencia"
                                        style="padding-left: 1rem; padding-right: 1rem;">Eliminar</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <br />

                <div class="row">
                    <div class="col-md-12">
                        <table class="table table-striped border border-secondary">
                            <thead class="thead-dark">
                                <tr class="text-center">
                                    <th scope="col">Numero de ID</th>
                                    <th scope="col">Variable Representada</th>
                                    <th scope="col">Opcion</th>
                                    <th scope="col">Fecha Inicio</th>
                                    <th scope="col">Fecha Finalizacion</th>
                                    <th scope="col">Dependencia</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr class="text-center">
                                    <td>{{ $texto_sentencia->id }}</td>
                                    <td>{{ $texto_sentencia->variable }}</td>
                                    <td>{{ $texto_sentencia->opcion }}</td>
                                    <td>{{ $texto_sentencia->fecha_inicio }}</td>
                                    <td>{{ $texto_sentencia->fecha_final }}</td>
                                    <td>{{((isset($dependencia)) and (!is_null($dependencia->id))) ? $dependencia->descripcion : 'Todas las dependencias'}}</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
                <br />

                <div class="row">
                    <div class="col-md-12">
                        <table class="table table-striped border border-secondary">
                            <thead class="thead-dark">
                                <tr>
                                    <th scope="col">Descripcion</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>{{ $texto_sentencia->descripcion }}</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
                <br />

                <div class="row">
                    <div class="col-md-12">
                        <table class="table table-striped border border-secondary">
                            <thead class="thead-dark">
                                <tr class="text-center">
                                    <th scope="col">Fecha de creacion</th>
                                    <th scope="col">Fecha de ultima actualizacion</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr class="text-center">
                                    <td>{{ $texto_sentencia->created_at }}</td>
                                    <td>{{ $texto_sentencia->updated_at }}</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>


            </div>
        </div>
    </div>
@endsection

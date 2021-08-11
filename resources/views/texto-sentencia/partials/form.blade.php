<input type="hidden" name="id" value="{{ isset($texto_sentencia->id) ? $texto_sentencia->id : '' }}">

<div class="row">

    <div class="col-md-6">
        <div class="card" style="height: 100%;">
            <div class="card-body">
                <div class="encabezado-2">
                    Variable Representada
                </div>
                <div class="cuerpo-2">
                    Ingrese el nombre de variable correspondiente. Esta variable es la que figura en el
                    <strong>"Modelo"</strong>.<br />
                    <strong> Ejemplo:</strong> $Variable<br />
                    <br />
                    <div class="form-group">
                        <div class="form-group">
                            <input type="text" class="form-control" name="variable"
                                value="{{ isset($texto_sentencia->variable) ? $texto_sentencia->variable : '' }}"
                                required autofocus>
                            @error('variable')
                                <small class="form-text text-danger">
                                    {{ $message }}
                                </small>
                            @enderror
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-md-6">
        <div class="card" style="height: 100%;">
            <div class="card-body">
                <div class="encabezado-2">
                    Opcion
                </div>
                <div class="cuerpo-2">
                    <div class="row">
                        <div class="col-md-6">
                            Ingrese el <u>valor</u> correspondiente a la <u>referencia</u>.<br />
                            <strong> Ejemplo:</strong> 1<br />
                            <br />
                            <div class="form-group">
                                <div class="form-group">
                                    <input type="text" class="form-control" name="opcion"
                                        value="{{ isset($texto_sentencia->opcion) ? $texto_sentencia->opcion : '' }}"
                                        required autofocus>
                                    @error('opcion')
                                        <small class="form-text text-danger">
                                            {{ $message }}
                                        </small>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <table class="table table-striped table-sm border border-secondary">
                                <thead class="thead-dark">
                                    <tr class="text-center">
                                        <th scope="col">Valor</th>
                                        <th scope="col">Referencia</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr class="text-center">
                                        <td>0</td>
                                        <td>Falso</td>
                                    </tr>
                                    <tr class="text-center">
                                        <td>0</td>
                                        <td>No</td>
                                    </tr>
                                    <tr class="text-center">
                                        <td>1</td>
                                        <td>Verdadero</td>
                                    </tr>
                                    <tr class="text-center">
                                        <td>1</td>
                                        <td>Si</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>

</div>

<br />

<div class="row">

    <div class="col-md-6">
        <div class="card" style="height: 100%;">
            <div class="card-body">
                <div class="encabezado-2">
                    Fecha de Inicio
                </div>
                <div class="cuerpo-2">
                    Es la fecha en la cual comienza a estar vigente la <u>descripcion.</u><br />
                    <br />
                    <div class="form-group">
                        <input type="date" class="form-control" name="fecha_inicio"
                            value="{{ isset($texto_sentencia->fecha_inicio) ? $texto_sentencia->fecha_inicio : '' }}"
                            required autofocus>
                        @error('fecha_inicio')
                            <small class="form-text text-danger">
                                {{ $message }}
                            </small>
                        @enderror
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-md-6">
        <div class="card" style="height: 100%;">
            <div class="card-body">
                <div class="encabezado-2">
                    Fecha de Finalizacion
                </div>
                <div class="cuerpo-2">
                    Es la fecha en la cual termina de estar vigente la <u>descripcion.</u><br />
                    Recuerde que se considera este ultimo dia como vigente.<br />
                    <br />
                    <div class="form-group">
                        <input type="date" class="form-control" name="fecha_final"
                            value="{{ isset($texto_sentencia->fecha_final) ? $texto_sentencia->fecha_final : '' }}"
                            required autofocus>
                        @error('fecha_final')
                            <small class="form-text text-danger">
                                {{ $message }}
                            </small>
                        @enderror
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>

<br />

<div class="card">
    <div class="card-body">
        <div class="encabezado-2">
            Descripcion
        </div>
        <div class="cuerpo-2">
            Ingrese la descripcion correspondiente. Este valor sera por el cual se remplaze la variable anteriormente
            mencionada.<br />
            <br />
            <div class="form-group">
                <div class="form-group">
                    <textarea class="form-control" name="descripcion" required
                        autofocus>{{ isset($texto_sentencia->descripcion) ? $texto_sentencia->descripcion : '' }}</textarea>
                    @error('descripcion')
                        <small class="form-text text-danger">
                            {{ $message }}
                        </small>
                    @enderror
                </div>
            </div>
        </div>
    </div>
</div>

<br />

<div class="card">
    <div class="card-body">
        <div class="encabezado-2">
            Dependencia
        </div>
        <div class="cuerpo-2">
            Elija la dependencia a cual pertenece este texto sentencia.<br />
            En caso de utilizar este texto sentencia para todas las dependencias, elegir dicha opcion. En dicho caso,
            este texto sentencia se utilizara en todas las dependencias, en los cuales no se haya asignado esta misma
            variable y opcion (para dicha dependencia) o esten fuera del rango de fechas.<br />
            <br />
            <div class="form-group">
                <div class="form-group">
                    <select class="form-control" name="dependencia_id" autofocus>
                        <option value=""
                            {{ (isset($texto_sentencia->dependencia_id) and is_null($texto_sentencia->dependencia_id)) ? 'selected' : '' }}>
                            Todas las dependencias</option>
                        @foreach ($dependencias as $dependencia)
                            <option value="{{ $dependencia->id }}"
                                {{ (isset($texto_sentencia->dependencia_id) and $texto_sentencia->dependencia_id == $dependencia->id) ? 'selected' : '' }}>
                                {{ $dependencia->descripcion }}</option>
                        @endforeach
                    </select>
                    @error('dependencia_id')
                        <small class="form-text text-danger">
                            {{ $message }}
                        </small>
                    @enderror

                </div>
            </div>
        </div>
    </div>
</div>

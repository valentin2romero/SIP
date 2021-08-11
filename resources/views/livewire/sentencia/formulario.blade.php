<form wire:submit.prevent="submit">
    @if ($step > 0 && $step <= 11)
        Paso {{ $step }} de 11
    @endif
    <div class="card mt-3">
        <div class="card-body">

            @if ($step == 0)
                @if (!empty($sentencia_id))
                    <div class="encabezado-2">
                        Editar Sentencia
                    </div>
                    <div class="cuerpo-2">
                        Utiliza el nuevo Sistema Inteligente Previsional para modificar la sentencia.
                    </div>
                @else
                    <div class="encabezado-2">
                        Generar Sentencia
                    </div>
                    <div class="cuerpo-2">
                        Utiliza el nuevo Sistema Inteligente Previsional para generar una sentencia modelo completando
                        la información relevante
                    </div>
                @endif
            @endif

            @if ($step == 1)
                <div class="encabezado-2">
                    Número de Expediente
                </div>
                <div class="cuerpo-2">
                    Ingrese el Número de Expediente correspondiente a esta sentencia.
                </div>
                <br />
                <div class="col-md-6">
                    <div class="form-group">
                        <input type="text" class="form-control" name="NroExp" wire:model.lazy="NroExp" required
                            autofocus>
                        @error('NroExp')
                            <small class="form-text text-danger">
                                {{ $message }}
                            </small>
                        @enderror
                    </div>
                </div>

                <div class="encabezado-2">
                    Carátula
                </div>
                <div class="cuerpo-2">
                    Complete los campos con la informacion requerida.
                </div>
                <br />
                <div class="col-md-8">
                    <div class="form-group">
                        <textarea class="form-control" name="Caratula" wire:model.lazy="Caratula" required
                            autofocus></textarea>
                        @error('Caratula')
                            <small class="form-text text-danger">
                                {{ $message }}
                            </small>
                        @enderror
                    </div>
                </div>
            @endif

            @if ($step == 2)
                <div class="encabezado-2">
                    Dependencia
                </div>
                <div class="cuerpo-2">
                    Seleccione la dependencia. Esta configuración será utilizada para seleccionar el modelo de
                    sentencia a utilizar.
                </div>
                <br />
                <div class="col-md-4">
                    <div class="form-group">
                        <select class="form-control" name="dependencia_id" wire:model.lazy="dependencia_id" required
                            autofocus>
                            <option value="">Dependencia</option>
                            @foreach ($dependencias as $dependencia)
                                <option value="{{ $dependencia->id }}">{{ $dependencia->descripcion }}</option>
                            @endforeach
                        </select>
                        @error('dependencia_id')
                            <small class="form-text text-danger">
                                {{ $message }}
                            </small>
                        @enderror
                    </div>
                </div>
            @endif

            @if ($step == 3)
                <div class="encabezado-2">
                    Informacion
                </div>
                <div class="cuerpo-2">
                    Complete los campos con la informacion requerida.
                </div>
                <br />
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="NomActor">Nombre del Actor</label>
                        <input type="text" class="form-control" name="NomActor" wire:model.lazy="NomActor" required
                            autofocus>
                        @error('NomActor')
                            <small class="form-text text-danger">
                                {{ $message }}
                            </small>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="DniActor">DNI del Actor</label>
                        <input type="text" class="form-control" name="DniActor" wire:model.lazy="DniActor" required
                            autofocus>
                        @error('DniActor')
                            <small class="form-text text-danger">
                                {{ $message }}
                            </small>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="NomAbogado">Nombre del abogado interviniente</label>
                        <input type="text" class="form-control" name="NomAbogado" wire:model.lazy="NomAbogado" required
                            autofocus>
                        @error('NomAbogado')
                            <small class="form-text text-danger">
                                {{ $message }}
                            </small>
                        @enderror
                    </div>
                </div>
            @endif

            @if ($step == 4)
                <div class="encabezado-2">
                    Error Material
                </div>
                <div class="cuerpo-2">
                    Complete los campos con la informacion requerida.
                </div>
                <br />
                <div class="col-md-4">
                    <div class="form-group">
                        <select class="form-control" name="aux_PideError" wire:model.lazy="aux_PideError" required
                            autofocus>
                            <option value="">¿Pide error material?</option>
                            <option value="0">No</option>
                            <option value="1">Si</option>
                        </select>
                        @error('aux_PideError')
                            <small class="form-text text-danger">
                                {{ $message }}
                            </small>
                        @enderror
                    </div>
                </div>
                @if ($aux_PideError == 1)
                    <div class="col-md-8">
                        <div class="form-group">
                            <label for="PideError">Transcribir lo que pide en el escrito</label>
                            <textarea class="form-control" name="PideError" wire:model.lazy="PideError" required
                                autofocus></textarea>
                            @error('PideError')
                                <small class="form-text text-danger">
                                    {{ $message }}
                                </small>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-8">
                        <div class="form-group">
                            <label for="PlanteaError">Resolución planteo Error material</label>
                            <textarea class="form-control" name="PlanteaError" wire:model.lazy="PlanteaError" required
                                autofocus></textarea>
                            @error('PlanteaError')
                                <small class="form-text text-danger">
                                    {{ $message }}
                                </small>
                            @enderror
                        </div>
                    </div>
                @endif
            @endif

            @if ($step == 5)
                <div class="encabezado-2">
                    Informacion
                </div>
                <div class="cuerpo-2">
                    Complete los campos con la informacion requerida.
                </div>
                <br />
                <div class="col-md-4">
                    <div class="form-group">
                        <select class="form-control" name="PideExim" wire:model.lazy="PideExim" autofocus>
                            <option value="">¿Pide eximición de ganancias?</option>
                            <option value="0">No</option>
                            <option value="1">Si</option>
                        </select>
                        @error('PideExim')
                            <small class="form-text text-danger">
                                {{ $message }}
                            </small>
                        @enderror
                    </div>
                    @if ($this->dependencia_id != 2)
                        <div class="form-group">
                            <select class="form-control" name="ContestaExc" wire:model.lazy="ContestaExc" required
                                autofocus>
                                <option value="">¿Contesta excepciones?</option>
                                <option value="0">No</option>
                                <option value="1">Si</option>
                            </select>
                            @error('ContestaExc')
                                <small class="form-text text-danger">
                                    {{ $message }}
                                </small>
                            @enderror
                        </div>
                    @endif
                </div>
            @endif

            @if ($step == 6)
                <div class="encabezado-2">
                    Número de beneficio
                </div>
                <div class="cuerpo-2">
                    Complete los campos con la informacion requerida.
                </div>
                <br />
                <div class="col-md-6">
                    <div class="form-group">
                        <input type="text" class="form-control" name="NroJP" wire:model.lazy="NroJP" required autofocus>
                        @error('NroJP')
                            <small class="form-text text-danger">
                                {{ $message }}
                            </small>
                        @enderror
                    </div>
                </div>
                <div class="encabezado-2">
                    Jubilación / Pensión
                </div>
                <div class="cuerpo-2">
                    Seleccione la opcion correspondiente.
                </div>
                <br />
                <div class="col-md-4">
                    <div class="form-group">
                        <select class="form-control" name="JubPen" wire:model.lazy="JubPen" required autofocus>
                            <option value="">Elegir...</option>
                            @foreach ($tipo_previsiones as $prevision)
                                <option value="{{ $prevision->id }}">{{ $prevision->descripcion }}</option>
                            @endforeach
                        </select>
                        @error('JubPen')
                            <small class="form-text text-danger">
                                {{ $message }}
                            </small>
                        @enderror
                    </div>
                </div>
            @endif

            @if ($step == 7)
                <div class="encabezado-2">
                    Fecha de adquisición del derecho
                </div>
                <div class="cuerpo-2">
                    Complete los campos con la informacion requerida.
                </div>
                <br />
                <div class="col-md-4">
                    <div class="form-group">
                        <input type="date" class="form-control" name="FecAdq" wire:model.lazy="FecAdq" required
                            autofocus>
                        @error('FecAdq')
                            <small class="form-text text-danger">
                                {{ $message }}
                            </small>
                        @enderror
                    </div>
                    @if ($sentencia_id)
                        <div class="alert alert-warning" role="alert">
                            Anteriormente fue registrado con la fecha:<br />
                            <strong class="text-center">
                                {{ $old_FecAdq }}
                            </strong>
                        </div>
                    @endif
                </div>
                <br />
                <div class="encabezado-2">
                    Haber Inicial
                </div>
                <div class="cuerpo-2">
                    Complete los campos con la informacion requerida.
                </div>
                <br />
                <div class="row">
                    <div class="col-md-6 border text-center">
                        <div class="cuerpo-2 mt-2 mb-2">
                            ¿Fecha de adquisición entre el 01.07.1994 y el 31.07.2016?
                        </div>
                        <div class="form-group">
                            <div class="form-check form-check-inline">
                                <input type="radio" class="form-check-input" name="FecAdq1" wire:model.lazy="FecAdq1"
                                    value='1' required autofocus>
                                <label class="form-check-label" for="FecAdq1">Si</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input type="radio" class="form-check-input" name="FecAdq1" wire:model.lazy="FecAdq1"
                                    value='0' required autofocus>
                                <label class="form-check-label" for="FecAdq1">No</label>
                            </div>
                            @error('FecAdq1')
                                <small class="form-text text-danger">
                                    {{ $message }}
                                </small>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-6 border text-center">
                        <div class="cuerpo-2 mt-2 mb-2">
                            ¿Fecha de adquisición posterior a agosto de 2016?
                        </div>
                        <div class="form-group">
                            <div class="form-check form-check-inline">
                                <input type="radio" class="form-check-input" name="FecAdq2" wire:model.lazy="FecAdq2"
                                    value='1' required autofocus>
                                <label class="form-check-label" for="FecAdq2">Si</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input type="radio" class="form-check-input" name="FecAdq2" wire:model.lazy="FecAdq2"
                                    value='0' required autofocus>
                                <label class="form-check-label" for="FecAdq2">No</label>
                            </div>
                            @error('FecAdq2')
                                <small class="form-text text-danger">
                                    {{ $message }}
                                </small>
                            @enderror
                        </div>
                    </div>
                </div>
            @endif

            @if ($step == 8)
                <div class="encabezado-2">
                    Movilidad
                </div>
                <div class="cuerpo-2">
                    Complete los campos con la informacion requerida.
                </div>
                <br />

                <div class="row mt-2">
                    <div class="col-md-6 border text-center">
                        <div class="cuerpo-2 mt-2 mb-2">
                            ¿Fecha de adquisición del derecho entre el 01.07.1994 y el 31.12.2001?
                        </div>
                        <div class="form-group">
                            <div class="form-check form-check-inline">
                                <input type="radio" class="form-check-input" name="FecAdq3" wire:model.lazy="FecAdq3"
                                    value='1' required autofocus>
                                <label class="form-check-label" for="FecAdq3">Si</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input type="radio" class="form-check-input" name="FecAdq3" wire:model.lazy="FecAdq3"
                                    value='0' required autofocus>
                                <label class="form-check-label" for="FecAdq3">No</label>
                            </div>
                            @error('FecAdq3')
                                <small class="form-text text-danger">
                                    {{ $message }}
                                </small>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-6 border text-center">
                        <div class="cuerpo-2 mt-2 mb-2">
                            ¿Fecha de adquisición del derecho entre el 01.02.2002 y el 31.12.2006?
                        </div>
                        <div class="form-group">
                            <div class="form-check form-check-inline">
                                <input type="radio" class="form-check-input" name="FecAdq4" wire:model.lazy="FecAdq4"
                                    value='1' required autofocus>
                                <label class="form-check-label" for="FecAdq4">Si</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input type="radio" class="form-check-input" name="FecAdq4" wire:model.lazy="FecAdq4"
                                    value='0' required autofocus>
                                <label class="form-check-label" for="FecAdq4">No</label>
                            </div>
                            @error('FecAdq4')
                                <small class="form-text text-danger">
                                    {{ $message }}
                                </small>
                            @enderror
                        </div>
                    </div>
                </div>

                <div class="row justify-content-center mt-2">
                    <div class="col-md-6 border text-center">
                        <div class="cuerpo-2 mt-2 mb-2">
                            ¿Fecha de adquisición del derecho a partir del 1.01.2007?
                        </div>
                        <div class="form-group">
                            <div class="form-check form-check-inline">
                                <input type="radio" class="form-check-input" name="FecAdq5" wire:model.lazy="FecAdq5"
                                    value='1' required autofocus>
                                <label class="form-check-label" for="FecAdq5">Si</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input type="radio" class="form-check-input" name="FecAdq5" wire:model.lazy="FecAdq5"
                                    value='0' required autofocus>
                                <label class="form-check-label" for="FecAdq5">No</label>
                            </div>
                            @error('FecAdq5')
                                <small class="form-text text-danger">
                                    {{ $message }}
                                </small>
                            @enderror
                        </div>
                    </div>
                </div>
            @endif

            @if ($step == 9)
                <div class="encabezado-2">
                    Importante
                </div>
                <div class="cuerpo-2">
                    Complete los campos con la informacion requerida.
                </div>
                <br />
                <div class="row">
                    <div class="col-md-6 border text-center">
                        <div class="cuerpo-2 mt-2 mb-2">
                            ¿Tiene PAP?
                        </div>
                        <div class="form-group">
                            <div class="form-check form-check-inline">
                                <input type="radio" class="form-check-input" name="TienePAP" wire:model.lazy="TienePAP"
                                    value='1' required autofocus>
                                <label class="form-check-label" for="TienePAP">Si</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input type="radio" class="form-check-input" name="TienePAP" wire:model.lazy="TienePAP"
                                    value='0' required autofocus>
                                <label class="form-check-label" for="TienePAP">No</label>
                            </div>
                            @error('TienePAP')
                                <small class="form-text text-danger">
                                    {{ $message }}
                                </small>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-6 border text-center">
                        <div class="cuerpo-2 mt-2 mb-2">
                            ¿Pide tasa de sustitución o Fallo Betancur?
                        </div>
                        <div class="form-group">
                            <div class="form-check form-check-inline">
                                <input type="radio" class="form-check-input" name="TasaFallo"
                                    wire:model.lazy="TasaFallo" value='1' required autofocus>
                                <label class="form-check-label" for="TasaFallo">Si</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input type="radio" class="form-check-input" name="TasaFallo"
                                    wire:model.lazy="TasaFallo" value='0' required autofocus>
                                <label class="form-check-label" for="TasaFallo">No</label>
                            </div>
                            @error('TasaFallo')
                                <small class="form-text text-danger">
                                    {{ $message }}
                                </small>
                            @enderror
                        </div>
                    </div>
                </div>
                <div class="row mt-2">
                    <div class="col-md-6 border text-center">
                        <div class="cuerpo-2 mt-2 mb-2">
                            ¿Juicio iniciado antes del 22/12/2017?
                        </div>
                        <div class="form-group">
                            <div class="form-check form-check-inline">
                                <input type="radio" class="form-check-input" name="FecIni" wire:model.lazy="FecIni"
                                    value='1' required autofocus>
                                <label class="form-check-label" for="FecIni">Si</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input type="radio" class="form-check-input" name="FecIni" wire:model.lazy="FecIni"
                                    value='0' required autofocus>
                                <label class="form-check-label" for="FecIni">No</label>
                            </div>
                            @error('FecIni')
                                <small class="form-text text-danger">
                                    {{ $message }}
                                </small>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-6 border text-center">
                        <div class="cuerpo-2 mt-2 mb-2">
                            ¿Pasaron menos de dos años entre la notificación de la concesión del beneficio y el
                            pedido de reajuste?
                        </div>
                        <div class="form-group">
                            <div class="form-check form-check-inline">
                                <input type="radio" class="form-check-input" name="Tiempo" wire:model.lazy="Tiempo"
                                    value='1' required autofocus>
                                <label class="form-check-label" for="Tiempo">Si</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input type="radio" class="form-check-input" name="Tiempo" wire:model.lazy="Tiempo"
                                    value='0' required autofocus>
                                <label class="form-check-label" for="Tiempo">No</label>
                            </div>
                            @error('Tiempo')
                                <small class="form-text text-danger">
                                    {{ $message }}
                                </small>
                            @enderror
                        </div>
                    </div>
                </div>
                <div class="row justify-content-center text-center mt-2">
                    <div class="col-md-6 border">
                        <div class="cuerpo-2 mt-2 mb-2">
                            Fecha de presentación de reajuste:
                        </div>
                        <div class="form-group">
                            <input type="date" class="form-control" name="FecPedido" wire:model.lazy="FecPedido"
                                required autofocus>
                            @error('FecPedido')
                                <small class="form-text text-danger">
                                    {{ $message }}
                                </small>
                            @enderror
                        </div>
                        @if ($sentencia_id && $old_FecPedido)
                            <div class="alert alert-warning" role="alert">
                                Anteriormente fue registrado con la fecha:<br />
                                <strong class="text-center">{{ $old_FecPedido }}</strong>
                            </div>
                        @endif
                    </div>
                </div>
            @endif

            @if ($step == 10)
                <div class="encabezado-2">
                    Mes y año de la sentencia
                </div>
                <div class="cuerpo-2">
                    Complete los campos con la informacion requerida.
                </div>
                <br />
                <div class="col-md-6">
                    <div class="form-group">
                        <input type="text" class="form-control" name="MesAnio" wire:model.lazy="MesAnio" required
                            autofocus>
                        @error('MesAnio')
                            <small class="form-text text-danger">
                                {{ $message }}
                            </small>
                        @enderror
                    </div>
                </div>
            @endif

            @if ($step == 11)
                <div class="encabezado-2">
                    Confirmar
                </div>
                <div class="cuerpo-2">
                    ¿Esta seguro en generar la sentencia?, una vez generada esta no podra ser eliminada.
                </div>
                <br />
            @endif


            @if ($step >= 12)
                @if ($estado == false)
                    @if (!empty($sentencia_id))
                        <div class="encabezado-2" style="color: red !important;">
                            Hemos tenido problemas al modificar la Sentencia
                        </div>
                        <div class="cuerpo-2">
                            Intentelo de nuevo, o intentelo mas tarde!
                        </div>
                    @else
                        <div class="encabezado-2" style="color: red !important;">
                            Hemos tenido problemas al crear la Sentencia
                        </div>
                        <div class="cuerpo-2">
                            Intentelo de nuevo, o intentelo mas tarde!
                        </div>
                    @endif
                @elseif($estado == True)
                    @if (!empty($sentencia_id))
                        <div class="encabezado-2" style="color: cornflowerblue !important;">
                            La Sentencia ha sido modificada correctamente.
                        </div>
                    @else
                        <div class="encabezado-2" style="color: cornflowerblue !important;">
                            La Sentencia ha sido creada correctamente.
                        </div>
                    @endif
                @endif
            @endif

            @if ($step < 12)
                <div class="row mt-4">
                    @if ($step > 1 && $step <= 11)
                        <div class="col-md-4">
                            <button type="button" wire:click="decreaseStep"
                                class="btn btn-secondary btn-block step-boton"
                                style="padding-left: 1rem; padding-right: 1rem;">
                                << Anterior</button>
                        </div>
                    @endif
                    @if ($step >= 1 && $step <= 11)
                        <div class="col-md-4 ml-auto">
                            <button type="submit" class="btn btn-secondary btn-block step-boton"
                                style="padding-left: 1rem; padding-right: 1rem;">Siguiente >></button>
                        </div>
                    @endif
                    @if ($step == 0)
                        <div class="col-md-4 offset-md-4">
                            <button type="submit" class="btn btn-secondary btn-block step-boton"
                                style="padding-left: 1rem; padding-right: 1rem;">Comenzar</button>
                        </div>
                    @endif
                </div>
            @endif
        </div>
    </div>
    @if ($step >= 1 && $step <= 11) @if ($open_preview) <div class="card mt-3">
        <div class="card-body">
        <div class="encabezado-2">
        Vista Previa
        </div>
        <div class="cuerpo-2">
        <a type="button" wire:click="viewPreview">Ver menos</a>
        </div>
        </div>
        </div>
        <livewire:sentencia.mostrar :sentencia="NULL" :valores="$valores" />
    @else
        <div class="card mt-3">
        <div class="card-body">
        <div class="encabezado-2">
        Vista Previa
        </div>
        <div class="cuerpo-2">
        <a type="button" wire:click="viewPreview">Ver mas</a>
        </div>
        </div>
        </div> @endif
    @endif
    @if ($step >= 12 && $estado == true)
        <br />
        <div class="card">
            <div class="card-body">
                <div class="encabezado-2">
                    Herramientas
                </div>
                <div class="row">
                    <div class=" col-md-4">
                        <a href="{{ route('sentencia.edit', $aux_sentencia) }}"
                            class="btn btn-secondary btn-block generate-sentencia"
                            style="padding-left: 1rem; padding-right: 1rem;">Editar<i class="material-icons"></i></a>
                    </div>
                    <div class=" col-md-4">
                        <a href="{{ route('sentencia.download', $aux_sentencia) }}"
                            class="btn btn-secondary btn-block generate-sentencia"
                            style="padding-left: 1rem; padding-right: 1rem;">Descargar<i class="material-icons"></i></a>
                    </div>
                    <div class=" col-md-4">
                        <a href="{{ route('home') }}" class="btn btn-secondary btn-block generate-sentencia"
                            style="padding-left: 1rem; padding-right: 1rem;">Inicio<i class="material-icons"></i></a>
                    </div>
                </div>
            </div>
        </div>
        <br />
        <livewire:sentencia.mostrar :sentencia="$aux_sentencia" :valores="NULL" />
    @endif
</form>

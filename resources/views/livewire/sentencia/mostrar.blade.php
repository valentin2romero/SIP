<div class="row">
    <div class="col-md-12">
        <table class="table table-striped border border-secondary">
            <thead class="thead-dark">
                <tr>
                    <th scope="col">Caratula</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>{{ $Caratula }}</td>
                </tr>
            </tbody>
        </table>
    </div>
    <div class="col-md-6">
        <table class="table table-striped border border-secondary">
            <thead class="thead-dark">
                <tr>
                    <th scope="col">Pregunta</th>
                    <th scope="col">Respuesta</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>Número de expediente</td>
                    <td>{{ $NroExp }}</td>
                </tr>
                <tr>
                    <td>Dependencia</td>
                    <td>{{ $dependencia_name }}</td>
                </tr>
                <tr>
                    <td>Nombre del Actor</td>
                    <td>{{ $NomActor }}</td>
                </tr>
                <tr>
                    <td>DNI del Actor</td>
                    <td>{{ $DniActor }}</td>
                </tr>
                <tr>
                    <td>Nombre del abogado interviniente</td>
                    <td>{{ $NomAbogado }}</td>
                </tr>
                <tr>
                    <td>¿Pide tasa de sustitución?</td>
                    <td>{{ $PideTasa }}</td>
                </tr>
                <tr>
                    <td>¿Pide eximición de ganancias?</td>
                    <td>{{ $PideExim }}</td>
                </tr>
                @if ($this->dependencia_id != 2)
                    <tr>
                        <td>¿Contesta excepciones?</td>
                        <td>{{ $ContestaExc }}</td>
                    </tr>
                @endif
                <tr>
                    <td>Mes y año de la sentencia</td>
                    <td>{{ $MesAnio }}</td>
                </tr>
                <tr>
                    <td>Número de beneficio</td>
                    <td>{{ $NroJP }}</td>
                </tr>
                <tr>
                    <td>Fecha de adquisición del derecho</td>
                    <td>{{ $FecAdq }}</td>
                </tr>
                <tr>
                    <td>¿Fecha de Adquisición del derecho entre 01/07/94 y 31/07/2016?</td>
                    <td>{{ $FecAdq1 }}</td>
                </tr>
            </tbody>
        </table>
    </div>
    <div class="col-md-6">
        <table class="table table-striped border border-secondary">
            <thead class="thead-dark">
                <tr>
                    <th scope="col">Pregunta</th>
                    <th scope="col">Respuesta</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>¿Fecha de Adquisición del derecho posterior a agosto 2016?</td>
                    <td>{{ $FecAdq2 }}</td>
                </tr>
                <tr>
                    <td>¿Fecha de Adquisición del derecho entre 01/07/1994 y el 31/12/2001?</td>
                    <td>{{ $FecAdq3 }}</td>
                </tr>
                <tr>
                    <td>¿Fecha de Adquisición del derecho entre 01/01/2002 y 31/12/2006?</td>
                    <td>{{ $FecAdq4 }}</td>
                </tr>
                <tr>
                    <td>¿Fecha de Adquisición del derecho a partir del 01/01/2007?</td>
                    <td>{{ $FecAdq5 }}</td>
                </tr>
                <tr>
                    <td>¿Tiene PAP?</td>
                    <td>{{ $TienePAP }}</td>
                </tr>
                <tr>
                    <td>¿Pide tasa de sustitución o Fallo Betancur?</td>
                    <td>{{ $TasaFallo }}</td>
                </tr>
                <tr>
                    <td>¿Juicio iniciado antes del 22/12/2017?</td>
                    <td>{{ $FecIni }}</td>
                </tr>
                <tr>
                    <td>¿Pasaron menos de dos años entre la notificación de la concesión del beneficio y el pedido de
                        reajuste?</td>
                    <td>{{ $Tiempo }}</td>
                </tr>
                <tr>
                    <td>¿Fecha de presentación de reajuste?</td>
                    <td>{{ $FecPedido }}</td>
                </tr>
                <tr>
                    <td>Jubilación / Pensión</td>
                    <td>{{ $prevision_name }}</td>
                </tr>
            </tbody>
        </table>
    </div>
</div>
<br />
@if ($PideError)
    <div class="row">
        <div class="col-md-6">
            <table class="table table-striped border border-secondary">
                <thead class="thead-dark">
                    <tr>
                        <th scope="col">Transcribir lo que pide en el escrito</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>{{ $PideError }}</td>
                    </tr>
                </tbody>
            </table>
        </div>
        <div class="col-md-6">
            <table class="table table-striped border border-secondary">
                <thead class="thead-dark">
                    <tr>
                        <th scope="col">Resolución planteo Error material</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>{{ $PlanteaError }}</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
@endif

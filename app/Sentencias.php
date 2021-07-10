<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Sentencias extends Model
{
    protected $fillable = [
                            'MesAnio','NroExp','Caratula','NomActor','DniActor','NomAbogado',
                            'PideError','PideTasa','PideExim','ContestaExc','NroJP',
                            'FecAdq','TienePAP','PlanteaError','FecAdq1','FecAdq2','FecAdq3',
                            'FecAdq4','FecAdq5','TasaFallo','PideEximG','FecIni','Tiempo',
                            'FecPedido','Honorarios','JubPen','dependencia_id','user_id'
                        ];
}
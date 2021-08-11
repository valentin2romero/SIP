<?php

namespace App\Http\Livewire\Sentencia;

use App\Dependencias;
use App\Tipoprevisiones;
use Livewire\Component;

class Mostrar extends Component
{
    public
        $NroExp,
        $dependencia_id,
        $NomActor, $DniActor, $NomAbogado,
        $PideError, $PlanteaError,
        $PideTasa, $PideExim, $ContestaExc, $PideEximG,
        $MesAnio,
        $Caratula,
        $NroJP,
        $FecAdq,
        $FecAdq1, $FecAdq2, $FecAdq3, $FecAdq4, $FecAdq5,
        $TienePAP, $TasaFallo, $FecIni, $Tiempo, $FecPedido, $Honorarios,
        $JubPen;
    public $dependencia_name;
    public $prevision_name;

    public function mount($sentencia, $valores)
    {
        if ($sentencia != null) 
        {
            $this->NroExp = $sentencia->NroExp;
            $this->dependencia_id = $sentencia->dependencia_id;
            $this->NomActor = $sentencia->NomActor;
            $this->DniActor = $sentencia->DniActor;
            $this->NomAbogado = $sentencia->NomAbogado;
            $this->PideError = $sentencia->PideError;
            $this->PlanteaError = $sentencia->PlanteaError;
            $this->PideTasa = $sentencia->PideTasa;
            $this->PideExim = $sentencia->PideExim;
            $this->ContestaExc = $sentencia->ContestaExc;
            $this->PideEximG = $sentencia->PideEximG;
            $this->MesAnio = $sentencia->MesAnio;
            $this->Caratula = $sentencia->Caratula;
            $this->NroJP = $sentencia->NroJP;
            $this->FecAdq1 = $sentencia->FecAdq1;
            $this->FecAdq2 = $sentencia->FecAdq2;
            $this->FecAdq3 = $sentencia->FecAdq3;
            $this->FecAdq4 = $sentencia->FecAdq4;
            $this->FecAdq5 = $sentencia->FecAdq5;
            $this->TienePAP = $sentencia->TienePAP;
            $this->TasaFallo = $sentencia->TasaFallo;
            $this->FecIni = $sentencia->FecIni;
            $this->Tiempo = $sentencia->Tiempo;
            $this->Honorarios = $sentencia->Honorarios;
            $this->JubPen = $sentencia->JubPen;
            $this->FecAdq = date_format((date_create($sentencia->FecAdq)), 'd/m/Y');
            $this->FecPedido = date_format((date_create($sentencia->FecPedido)), 'd/m/Y');
            $this->convert_to_respuesta();
        }
        else if($valores)
        {
            if((isset($valores['NroExp'])) && (!empty($valores['NroExp'])))
            {
                $this->NroExp=$valores['NroExp'];
            }
            if(isset($valores['dependencia_id']))
            {
                $this->dependencia_id=$valores['dependencia_id'];
                $this->dependencia_name = $this->get_name_dependencia();
            }
            if((isset($valores['NomActor'])) && (!empty($valores['NomActor'])))
            {
                $this->NomActor=$valores['NomActor'];
            }
            if((isset($valores['DniActor'])) && (!empty($valores['DniActor'])))
            {
                $this->DniActor=$valores['DniActor'];
            }
            if((isset($valores['NomAbogado'])) && (!empty($valores['NomAbogado'])))
            {
                $this->NomAbogado=$valores['NomAbogado'];
            }
            if((isset($valores['PideError'])) && (!empty($valores['PideError'])))
            {
                $this->PideError=$valores['PideError'];
            }
            if((isset($valores['PlanteaError'])) && (!empty($valores['PlanteaError'])))
            {
                $this->PlanteaError=$valores['PlanteaError'];
            }
            if(isset($valores['PideTasa']))
            {
                $this->PideTasa=$valores['PideTasa'];
                $this->PideTasa = $this->get_resp_type_1($this->PideTasa);
            }
            if(isset($valores['PideExim']))
            {
                $this->PideExim=$valores['PideExim'];
                $this->PideExim = $this->get_resp_type_1($this->PideExim);
            }
            if (isset($valores['ContestaExc']))
            {
                $this->ContestaExc=$valores['ContestaExc'];
                $this->ContestaExc = $this->get_resp_type_1($this->ContestaExc);
            }
            if(isset($valores['PideEximG']))
            {
                $this->PideEximG=$valores['PideEximG'];
                $this->PideEximG = $this->get_resp_type_1($this->PideEximG);
            }
            if((isset($valores['MesAnio'])) && (!empty($valores['MesAnio'])))
            {
                $this->MesAnio=$valores['MesAnio'];
            }
            if((isset($valores['Caratula'])) && (!empty($valores['Caratula'])))
            {
                $this->Caratula=$valores['Caratula'];
            }
            if((isset($valores['NroJP'])) && (!empty($valores['NroJP'])))
            {
                $this->NroJP=$valores['NroJP'];
            }
            if(isset($valores['FecAdq1']))
            {
                $this->FecAdq1=$valores['FecAdq1'];
                $this->FecAdq1 = $this->get_resp_type_1($this->FecAdq1);
            }
            if(isset($valores['FecAdq2']))
            {
                $this->FecAdq2=$valores['FecAdq2'];
                $this->FecAdq2 = $this->get_resp_type_1($this->FecAdq2);
            }
            if(isset($valores['FecAdq3']))
            {
                $this->FecAdq3=$valores['FecAdq3'];
                $this->FecAdq3 = $this->get_resp_type_1($this->FecAdq3);
            }
            if(isset($valores['FecAdq4']))
            {
                $this->FecAdq4=$valores['FecAdq4'];
                $this->FecAdq4 = $this->get_resp_type_1($this->FecAdq4);
            }
            if(isset($valores['FecAdq5']))
            {
                $this->FecAdq5=$valores['FecAdq5'];
                $this->FecAdq5 = $this->get_resp_type_1($this->FecAdq5);
            }
            if(isset($valores['TienePAP']))
            {
                $this->TienePAP=$valores['TienePAP'];
                $this->TienePAP = $this->get_resp_type_1($this->TienePAP);
            }
            if(isset($valores['TasaFallo']))
            {
                $this->TasaFallo=$valores['TasaFallo'];
                $this->TasaFallo = $this->get_resp_type_1($this->TasaFallo);
            }
            if(isset($valores['FecIni']))
            {
                $this->FecIni=$valores['FecIni'];
                $this->FecIni = $this->get_resp_type_1($this->FecIni);
            }
            if(isset($valores['Tiempo']))
            {
                $this->Tiempo=$valores['Tiempo'];
                $this->Tiempo = $this->get_resp_type_1($this->Tiempo);
            }
            if((isset($valores['Honorarios'])) && (!empty($valores['Honorarios'])))
            {
                $this->Honorarios=$valores['Honorarios'];
            }
            if(isset($valores['JubPen']))
            {
                $this->JubPen=$valores['JubPen'];
                $this->prevision_name = $this->get_name_previsiones();
            }
            if((isset($valores['FecAdq'])) && (!empty($valores['FecAdq'])))
            {
                $this->FecAdq=$valores['FecAdq'];
                $this->FecAdq = date_format((date_create($this->FecAdq)), 'd/m/Y');
            }
            if((isset($valores['FecPedido'])) && (!empty($valores['FecPedido'])))
            {
                $this->FecPedido=$valores['FecPedido'];
                $this->FecPedido = date_format((date_create($this->FecPedido)), 'd/m/Y');
            }
        }
    }
    public function convert_to_respuesta()
    {
        $this->dependencia_name = $this->get_name_dependencia();
        $this->PideTasa = $this->get_resp_type_1($this->PideTasa);
        $this->PideExim = $this->get_resp_type_1($this->PideExim);
        $this->ContestaExc = $this->get_resp_type_1($this->ContestaExc);
        $this->PideEximG = $this->get_resp_type_1($this->PideEximG);
        $this->FecAdq1 = $this->get_resp_type_1($this->FecAdq1);
        $this->FecAdq2 = $this->get_resp_type_1($this->FecAdq2);
        $this->FecAdq3 = $this->get_resp_type_1($this->FecAdq3);
        $this->FecAdq4 = $this->get_resp_type_1($this->FecAdq4);
        $this->FecAdq5 = $this->get_resp_type_1($this->FecAdq5);
        $this->TienePAP = $this->get_resp_type_1($this->TienePAP);
        $this->TasaFallo = $this->get_resp_type_1($this->TasaFallo);
        $this->FecIni = $this->get_resp_type_1($this->FecIni);
        $this->Tiempo = $this->get_resp_type_1($this->Tiempo);
        $this->prevision_name = $this->get_name_previsiones();
    }
    public function get_resp_type_1($value)
    {
        if ($value == 0) {
            return 'No';
        } else if ($value == 1) {
            return 'Si';
        }
        return null;
    }
    private function get_name_dependencia()
    {
            return Dependencias::find($this->dependencia_id)->descripcion;
    }
    private function get_name_previsiones()
    {
            return Tipoprevisiones::find($this->JubPen)->descripcion;
    }
    public function render()
    {
        return view('livewire.sentencia.mostrar');
    }

}
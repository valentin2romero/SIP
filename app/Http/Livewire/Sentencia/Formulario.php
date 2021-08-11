<?php

namespace App\Http\Livewire\Sentencia;

use Livewire\Component;
use App\Sentencias;
use App\Dependencias;
use Illuminate\Support\Facades\Auth;
use App\Tipoprevisiones;

class Formulario extends Component
{
    public $sentencia_id;
    public $valores;
    public $dependencias;
    public $tipo_previsiones;
    public $estado;
    public $old_FecAdq;
    public $old_FecPedido;
    public $step;
    public $stepActions = [
        'submit0',
        'submit1',
        'submit2',
        'submit3',
        'submit4',
        'submit5',
        'submit6',
        'submit7',
        'submit8',
        'submit9',
        'submit10',
        'submit11',
        'submit12'
    ];
    public
        $NroExp,
        $dependencia_id,
        $NomActor, $DniActor, $NomAbogado,
        $aux_PideError, $PideError, $PlanteaError,
        $PideTasa, $PideExim, $ContestaExc, $PideEximG,
        $MesAnio,
        $Caratula,
        $NroJP,
        $FecAdq,
        $FecAdq1, $FecAdq2, $FecAdq3, $FecAdq4, $FecAdq5,
        $TienePAP, $TasaFallo, $FecIni, $Tiempo,
        $FecPedido, $Honorarios, $JubPen;
    //Vista Previa
    public $open_preview;
    //Vista Final
    public $aux_sentencia;

    public function render()
    {
        return view('livewire.sentencia.formulario');
    }

    public function mount($sentencia)
    {
        $this->sentencia = NULL;
        $this->Tiempo = 9;
        $this->old_FecPedido = NULL;
        $this->ContestaExc = NULL;
        if ($sentencia) {
            $this->sentencia_id = $sentencia->id;
            $this->cargar_valores($sentencia);
            $this->prepare_preview($sentencia);
        } else {
            $this->MesAnio = $this->obtener_fecha();
        }
        $this->dependencias = Dependencias::all();
        $this->tipo_previsiones = Tipoprevisiones::all();
        $this->estado = False;
        $this->step = 0;
        $this->open_preview = False;
    }
    public function submit()
    {
        $action = $this->stepActions[$this->step];
        $this->$action();
        if ($this->open_preview) {
            $this->open_preview = False;
        }
    }

    public function decreaseStep()
    {
        if ($this->step > 1 && $this->step < 12) {
            $this->step--;
        }
    }

    public function submit0()
    {
        $this->step++;
    }

    public function submit1()
    {
        $this->validate([
            'NroExp' => 'required|string|max:25',
            'Caratula' => 'required|string',
        ]);
        $this->valores['Caratula'] = $this->Caratula;
        $this->valores['NroExp'] = $this->NroExp;
        $this->step++;
    }

    public function submit2()
    {
        $this->validate([
            'dependencia_id' => 'required|numeric',
        ]);
        $this->valores['dependencia_id'] = $this->dependencia_id;
        $this->step++;
    }

    public function submit3()
    {
        $this->validate([
            'NomActor' => 'required|string|max:100',
            'DniActor' => 'required|string|max:20',
            'NomAbogado' => 'required|string|max:100',
        ]);
        $this->valores['NomActor'] = $this->NomActor;
        $this->valores['DniActor'] = $this->DniActor;
        $this->valores['NomAbogado'] = $this->NomAbogado;
        $this->step++;
    }

    public function submit4()
    {
        $this->validate([
            'aux_PideError' => 'required|numeric'
        ]);
        if ($this->aux_PideError == 0) {
            $this->PideError = NULL;
            $this->PlanteaError = NULL;
        } else {
            $this->validate(['PideError' => 'required|string']);
            $this->validate(['PlanteaError' => 'required|string']);
        }
        $this->valores['PideError'] = $this->PideError;
        $this->valores['PlanteaError'] = $this->PlanteaError;
        $this->step++;
    }
    
    public function submit5()
    {
        $this->validate(['PideExim' => 'required|numeric']);
        
        if($this->dependencia_id == 2){
            $this->ContestaExc = -1;     
        }
        $this->validate(['ContestaExc' => 'required|numeric']);
        
        $this->PideEximG = $this->PideExim;
        $this->valores['PideExim'] = $this->PideExim;
        $this->valores['ContestaExc'] = $this->ContestaExc;
        $this->valores['PideEximG'] = $this->PideEximG;
        $this->step++;
    }

    public function submit6()
    {
        $this->validate([
            'NroJP' => 'required|string',
            'JubPen' => 'required|numeric',
        ]);
        $this->valores['NroJP'] = $this->NroJP;
        $this->valores['JubPen'] = $this->JubPen;
        $this->step++;
    }

    public function submit7()
    {
        $this->validate([
            'FecAdq' => 'required|date',
            'FecAdq1' => 'required|numeric',
            'FecAdq2' => 'required|numeric',
        ]);
        $this->valores['FecAdq'] = $this->FecAdq;
        $this->valores['FecAdq1'] = $this->FecAdq1;
        $this->valores['FecAdq2'] = $this->FecAdq2;
        $this->step++;
    }

    public function submit8()
    {
        $this->validate([
            'FecAdq3' => 'required|numeric',
            'FecAdq4' => 'required|numeric',
            'FecAdq5' => 'required|numeric',
        ]);
        $this->valores['FecAdq3'] = $this->FecAdq3;
        $this->valores['FecAdq4'] = $this->FecAdq4;
        $this->valores['FecAdq5'] = $this->FecAdq5;
        $this->step++;
    }

    public function submit9()
    {
        $this->validate([
            'TienePAP' => 'required|numeric',
            'TasaFallo' => 'required|numeric',
            'FecIni' => 'required|numeric',
            'Tiempo' => 'required|numeric|max:1',
            'FecPedido' => 'required|date'
        ]);
        $this->Honorarios = $this->FecIni;
        $this->PideTasa = $this->TasaFallo;
        $this->valores['TienePAP'] = $this->TienePAP;
        $this->valores['TasaFallo'] = $this->TasaFallo;
        $this->valores['FecIni'] = $this->FecIni;
        $this->valores['Tiempo'] = $this->Tiempo;
        $this->valores['FecPedido'] = $this->FecPedido;
        $this->valores['Honorarios'] = $this->Honorarios;
        $this->valores['PideTasa'] = $this->PideTasa;
        $this->step++;
    }

    public function submit10()
    {
        $this->validate([
            'MesAnio' => 'required|string|max:50',
        ]);
        $this->valores['MesAnio'] = $this->MesAnio;
        $this->step++;
    }

    public function submit11()
    {
        if ($this->sentencia_id) {
            if (Sentencias::find($this->sentencia_id)->update($this->valores)) {
                $this->aux_sentencia = Sentencias::find($this->sentencia_id);
                $this->estado = True;
            }
        } else {
            $this->valores['user_id'] = Auth::id();
            if (Sentencias::create($this->valores)) {
                $this->aux_sentencia = Sentencias::latest('id')->first();
                $this->estado = True;
            }
        }
        $this->step++;
    }

    public function submit12()
    {
        return redirect('sentencia');
    }

    private function obtener_fecha()
    {
        $mes = date('m');
        $nombre = '';
        switch ($mes) {
            case 1:
                $nombre = 'Enero';
                break;
            case 2:
                $nombre = 'Febrero';
                break;
            case 3:
                $nombre = 'Marzo';
                break;
            case 4:
                $nombre = 'Abril';
                break;
            case 5:
                $nombre = 'Mayo';
                break;
            case 6:
                $nombre = 'Junio';
                break;
            case 7:
                $nombre = 'Julio';
                break;
            case 8:
                $nombre = 'Agosto';
                break;
            case 9:
                $nombre = 'Septiembre';
                break;
            case 10:
                $nombre = 'Octubre';
                break;
            case 11:
                $nombre = 'Noviembre';
                break;
            case 12:
                $nombre = 'Diciembre';
                break;
        }
        return ( (strtolower($nombre)) . ' de ' . date('Y') );
    }

    private function cargar_valores($sentencia)
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
        $this->FecAdq = $sentencia->FecAdq;
        $this->FecAdq1 = $sentencia->FecAdq1;
        $this->FecAdq2 = $sentencia->FecAdq2;
        $this->FecAdq3 = $sentencia->FecAdq3;
        $this->FecAdq4 = $sentencia->FecAdq4;
        $this->FecAdq5 = $sentencia->FecAdq5;
        $this->TienePAP = $sentencia->TienePAP;
        $this->TasaFallo = $sentencia->TasaFallo;
        $this->FecIni = $sentencia->FecIni;
        $this->Tiempo = $sentencia->Tiempo;
        $this->FecPedido = $sentencia->FecPedido;
        $this->Honorarios = $sentencia->Honorarios;
        $this->JubPen = $sentencia->JubPen;
        //Auxiliares
        if ($this->PideError != NULL) {
            $this->aux_PideError = 1;
        } else {
            $this->aux_PideError = 0;
        }
        $aux_date = date_create($this->FecAdq);
        $this->old_FecAdq = date_format($aux_date, 'd/m/Y');
        if ($this->FecPedido) {
            $aux_date = date_create($this->FecPedido);
            $this->old_FecPedido = date_format($aux_date, 'd/m/Y');
        }
    }

    public function prepare_preview($sentencia)
    {
        $this->valores['NroExp'] = $sentencia->NroExp;
        $this->valores['dependencia_id'] = $sentencia->dependencia_id;
        $this->valores['NomActor'] = $sentencia->NomActor;
        $this->valores['DniActor'] = $sentencia->DniActor;
        $this->valores['NomAbogado'] = $sentencia->NomAbogado;
        $this->valores['PideError'] = $sentencia->PideError;
        $this->valores['PlanteaError'] = $sentencia->PlanteaError;
        $this->valores['PideTasa'] = $sentencia->PideTasa;
        $this->valores['PideExim'] = $sentencia->PideExim;
        $this->valores['ContestaExc'] = $sentencia->ContestaExc;
        $this->valores['PideEximG'] = $sentencia->PideEximG;
        $this->valores['MesAnio'] = $sentencia->MesAnio;
        $this->valores['Caratula'] = $sentencia->Caratula;
        $this->valores['NroJP'] = $sentencia->NroJP;
        $this->valores['FecAdq'] = $sentencia->FecAdq;
        $this->valores['FecAdq1'] = $sentencia->FecAdq1;
        $this->valores['FecAdq2'] = $sentencia->FecAdq2;
        $this->valores['FecAdq3'] = $sentencia->FecAdq3;
        $this->valores['FecAdq4'] = $sentencia->FecAdq4;
        $this->valores['FecAdq5'] = $sentencia->FecAdq5;
        $this->valores['TienePAP'] = $sentencia->TienePAP;
        $this->valores['TasaFallo'] = $sentencia->TasaFallo;
        $this->valores['FecIni'] = $sentencia->FecIni;
        $this->valores['Tiempo'] = $sentencia->Tiempo;
        $this->valores['FecPedido'] = $sentencia->FecPedido;
        $this->valores['Honorarios'] = $sentencia->Honorarios;
        $this->valores['JubPen'] = $sentencia->JubPen;
    }

    public function viewPreview()
    {
        if ($this->open_preview) {
            $this->open_preview = False;
        } else {
            $this->open_preview = True;
        }
    }
}

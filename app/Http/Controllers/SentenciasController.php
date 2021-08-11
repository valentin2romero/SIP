<?php

namespace App\Http\Controllers;

use App\Dependencias;
use App\Sentencias;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use \Illuminate\View\View;
use \App\Tables\SentenciasTable;
use App\Textosentencias;
use App\Tipoprevisiones;

class SentenciasController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $table = (new SentenciasTable())->setup();
        return view('sentencia.index', ['table' => $table]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('sentencia.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Sentencias  $sentencias
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $sentencia = Sentencias::find($id);
        return view('sentencia.show', ['sentencia' => $sentencia]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Sentencias  $sentencias
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $sentencia = Sentencias::find($id);
        return view('sentencia.edit', ['sentencia' => $sentencia], ['tipo' => 'edit']);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Sentencias  $sentencias
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Sentencias $sentencias)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Sentencias  $sentencias
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Sentencias::destroy($id);
        return redirect('sentencia');
    }
    /**
     * Display the specified resource.
     *
     * @param  \App\Sentencias  $sentencias
     * @return \Illuminate\Http\Response
     */
    public function download($id)
    {
        try {
            $sentencia = Sentencias::find($id);
            //V7 - Buscamos el name_model de dicha dependencia
            $name_model = Dependencias::find($sentencia->dependencia_id)->name_model;
            $template = new \PhpOffice\PhpWord\TemplateProcessor('word/'.$name_model.'.docx');
            //V7 - Fin
            $this->process_values($template, $sentencia);
            $tempFile = tempnam(sys_get_temp_dir(), 'PHPWord');
            $template->saveAs($tempFile);
            $archivo_name = $this->get_special_value($sentencia->NroExp, '/', '-') . '_SENTENCIA.docx';
            return response()->download($tempFile, $archivo_name)->deleteFileAfterSend(true);
        } catch (\PhpOffice\PhpWord\Exception\Exception $e) {
            return back($e->getCode());
        }
    }
    private function process_values($template, $sentencia)
    {
        // Asignacion Directa
        $template->setValue('MesAnio', $sentencia->MesAnio);
        $template->setValue('NroExp', $sentencia->NroExp);
        $template->setValue('Caratula', $sentencia->Caratula);
        $template->setValue('NomActor', $sentencia->NomActor);
        $template->setValue('DniActor', $sentencia->DniActor);
        $template->setValue('NomAbogado', $sentencia->NomAbogado);
        $template->setValue('NroJP', $sentencia->NroJP);
        $template->setValue('PideError', $sentencia->PideError);
        $template->setValue('PlanteaError', $sentencia->PlanteaError);
        $template->setValue('JubPen', Tipoprevisiones::find($sentencia->JubPen)->descripcion);
        
        $cadena_aux = NULL;
        $resultado_aux = NULL;
        
        // Asignacion en base a TextoSentencias
        $cadena_aux = ($this->get_value('$Honorarios', $sentencia->Honorarios, $sentencia->created_at, $sentencia->dependencia_id));
        $resultado_aux = $this->get_special_value($cadena_aux, '6$NomAbogado', $sentencia->NomAbogado);
        $template->setValue('Honorarios', $resultado_aux);
        $template->setValue('PideTasa', $this->get_value('$PideTasa', $sentencia->PideTasa, $sentencia->created_at, $sentencia->dependencia_id));
        $template->setValue('PideExim', $this->get_value('$PideExim', $sentencia->PideExim, $sentencia->created_at, $sentencia->dependencia_id));
        $template->setValue('ContestaExc', $this->get_value('$ContestaExc', $sentencia->ContestaExc, $sentencia->created_at, $sentencia->dependencia_id));
        $template->setValue('TienePAP', $this->get_value('$TienePAP', $sentencia->TienePAP, $sentencia->created_at, $sentencia->dependencia_id));
        $template->setValue('TasaFallo', $this->get_value('$TasaFallo', $sentencia->TasaFallo, $sentencia->created_at, $sentencia->dependencia_id));
        $template->setValue('PideEximG', $this->get_value('$PideEximG', $sentencia->PideEximG, $sentencia->created_at, $sentencia->dependencia_id));
        $template->setValue('FecIni', $this->get_value('$FecIni', $sentencia->FecIni, $sentencia->created_at, $sentencia->dependencia_id));
        $template->setValue('FecAdq_1_2', $this->mng_fec_adq([
            $this->get_value('$FecAdq1', $sentencia->FecAdq1, $sentencia->created_at, $sentencia->dependencia_id),
            $this->get_value('$FecAdq2', $sentencia->FecAdq2, $sentencia->created_at, $sentencia->dependencia_id)
        ]));
        $template->setValue('FecAdq_3_4_5', $this->mng_fec_adq([
            $this->get_value('$FecAdq3', $sentencia->FecAdq3, $sentencia->created_at, $sentencia->dependencia_id),
            $this->get_value('$FecAdq4', $sentencia->FecAdq4, $sentencia->created_at, $sentencia->dependencia_id),
            $this->get_value('$FecAdq5', $sentencia->FecAdq5, $sentencia->created_at, $sentencia->dependencia_id)
        ]));
        
        // Nuevos cambios v6 up-2
        // Creamos las variables y asignamos la fecha sin formato
        // Esta fecha no tendra formato, hasta que no se aplique en el setValue().
        $FecAdq_aux = date_create($sentencia->FecAdq);
        $FecPedido_aux = date_create($sentencia->FecPedido);
        // Seteamos el valor de la fecha con el respectivo formato
        $template->setValue('FecAdq', date_format($FecAdq_aux, 'd/m/Y'));
        // En este caso, si debemos utilizar la fecha de Pedido, recordar que debemos restarle 2 años.
        $cadena_aux = NULL;
        $resultado_aux = NULL;    
        $FecPedido_aux_with_2year_less = $FecPedido_aux;
        date_add($FecPedido_aux_with_2year_less, date_interval_create_from_date_string('-2 years'));
        $cadena_aux = ($this->get_value('$Tiempo', $sentencia->Tiempo, $sentencia->created_at, $sentencia->dependencia_id));
        $resultado_aux = $this->get_special_value($cadena_aux, '13$FecAdq', date_format($FecAdq_aux, 'd/m/Y'));
        $resultado_aux = $this->get_special_value($resultado_aux, '$FecPedido', date_format($FecPedido_aux_with_2year_less, 'd/m/Y'));
        $template->setValue('Tiempo', $resultado_aux);
        // Fin nuevos cambios v6 up-2
        
        // Nuevos cambios v6 up-3
        // En basea la condicion, seteamos el valor de la fecha con el respectivo formato
        if($sentencia->Tiempo == 1){
            $template->setValue('FecPedido_or_FecAdq', date_format($FecAdq_aux, 'd/m/Y'));
        }else if ($sentencia->Tiempo == 0) {
            $template->setValue('FecPedido_or_FecAdq', date_format($FecPedido_aux_with_2year_less, 'd/m/Y'));    
        }
        // Fin Nuevos cambios v6 up-3
    }
    private function get_value($variable, $opcion, $create_at, $dependencia_id)
    {
        if ($aux = Textosentencias::where([['variable', '=', $variable], ['opcion', '=', $opcion], ['fecha_inicio', '<=', $create_at], ['fecha_final', '>=', $create_at], ['dependencia_id', '=', $dependencia_id]])->first()) {
            return $aux->descripcion;
        }else if ($aux = Textosentencias::where([['variable', '=', $variable], ['opcion', '=', $opcion], ['fecha_inicio', '<=', $create_at], ['fecha_final', '>=', $create_at], ['dependencia_id', '=', NULL]])->first()) {
            return $aux->descripcion;
        }
        return NULL;
    }
    private function get_special_value($cadena, $remplazar, $remplazar_por)
    {
        return str_replace($remplazar, $remplazar_por, $cadena);
    }
    private function mng_fec_adq($vector_strings)
    {
        $cadena = '';
        if (sizeof($vector_strings) > 1) {
            for ($i = 0; $i < (sizeof($vector_strings) - 1); $i++) {
                if (!is_null($vector_strings[$i])) {
                    $cadena = $cadena . $vector_strings[$i];
                }
                if(!is_null($vector_strings[$i+1]) && $cadena != ''){
                    $cadena = $cadena . ' o ';
                }
            }
        }
        if (!is_null(end($vector_strings))) {
            $cadena = $cadena . end($vector_strings);
        }
        return $cadena;
    }
}

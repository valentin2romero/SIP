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
            $template = new \PhpOffice\PhpWord\TemplateProcessor('word/modelo.docx');
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
        $template->setValue('MesAnio', $sentencia->MesAnio);
        $template->setValue('NroExp', $sentencia->NroExp);
        $template->setValue('Caratula', $sentencia->Caratula);
        $template->setValue('NomActor', $sentencia->NomActor);
        $template->setValue('DniActor', $sentencia->DniActor);
        $template->setValue('NomAbogado', $sentencia->NomAbogado);
        $template->setValue('NroJP', $sentencia->NroJP);

        $template->setValue('PideError', $sentencia->PideError);
        $template->setValue('PlanteaError', $sentencia->PlanteaError);

        $FecAdq_aux = date_format((date_create($sentencia->FecAdq)), 'd/m/Y');
        $template->setValue('FecAdq', $FecAdq_aux);
        $FecPedido_aux = date_format((date_create($sentencia->FecPedido)), 'd/m/Y');
        $template->setValue('FecPedido', $FecPedido_aux);

        $template->setValue('PideTasa', $this->get_value('$PideTasa', $sentencia->PideTasa, $sentencia->created_at));
        $template->setValue('PideExim', $this->get_value('$PideExim', $sentencia->PideExim, $sentencia->created_at));
        $template->setValue('ContestaExc', $this->get_value('$ContestaExc', $sentencia->ContestaExc, $sentencia->created_at));
        $template->setValue('TienePAP', $this->get_value('$TienePAP', $sentencia->TienePAP, $sentencia->created_at));

        $template->setValue('FecAdq_1_2', $this->mng_fec_adq([
            $this->get_value('$FecAdq1', $sentencia->FecAdq1, $sentencia->created_at),
            $this->get_value('$FecAdq2', $sentencia->FecAdq2, $sentencia->created_at)
        ]));
        $template->setValue('FecAdq_3_4_5', $this->mng_fec_adq([
            $this->get_value('$FecAdq3', $sentencia->FecAdq3, $sentencia->created_at),
            $this->get_value('$FecAdq4', $sentencia->FecAdq4, $sentencia->created_at),
            $this->get_value('$FecAdq5', $sentencia->FecAdq5, $sentencia->created_at)
        ]));

        $template->setValue('TasaFallo', $this->get_value('$TasaFallo', $sentencia->TasaFallo, $sentencia->created_at));
        $template->setValue('PideEximG', $this->get_value('$PideEximG', $sentencia->PideEximG, $sentencia->created_at));
        $template->setValue('FecIni', $this->get_value('$FecIni', $sentencia->FecIni, $sentencia->created_at));

        $template->setValue('JubPen', Tipoprevisiones::find($sentencia->JubPen)->descripcion);

        $cadena_aux = NULL;
        $resultado_aux = NULL;

        $cadena_aux = ($this->get_value('$Tiempo', $sentencia->Tiempo, $sentencia->created_at));
        $resultado_aux = $this->get_special_value($cadena_aux, '13$FecAdq', $FecAdq_aux);
        $resultado_aux = $this->get_special_value($resultado_aux, '$FecPedido', $FecPedido_aux);
        $template->setValue('Tiempo', $resultado_aux);

        $cadena_aux = ($this->get_value('$Honorarios', $sentencia->Honorarios, $sentencia->created_at));
        $resultado_aux = $this->get_special_value($cadena_aux, '6$NomAbogado', $sentencia->NomAbogado);
        $template->setValue('Honorarios', $resultado_aux);
    }
    private function get_value($variable, $opcion, $create_at)
    {
        if ($aux = Textosentencias::where([['variable', '=', $variable], ['opcion', '=', $opcion], ['fecha_inicio', '<=', $create_at], ['fecha_final', '>=', $create_at]])->first()) {
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
                    $cadena = $cadena . $vector_strings[$i] . ' o ';
                }
            }
        }
        if (!is_null(end($vector_strings))) {
            $cadena = $cadena . end($vector_strings);
        }
        return $cadena;
    }
}

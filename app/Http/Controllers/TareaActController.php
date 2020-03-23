<?php

namespace App\Http\Controllers;

use App\ComCampCon;
use App\Conces;
use App\Campania;
use App\Repositories\CampaniaRepository;
use App\Repositories\ConcesRepository;
use App\Repositories\MarcaRepository;
use App\Repositories\ProyectoRepository;
use App\Repositories\TareaActRepository;
use App\TareaAct;
use App\User;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;

class TareaActController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    private $concesRepository, $tareaActRepository, $marcaRepository, $campaniaRepository, $proyectoRepository;

    public function __construct(ConcesRepository $concesRepository, TareaActRepository $tareaActRepository,
                                MarcaRepository $marcaRepository, CampaniaRepository $campaniaRepository,
                                ProyectoRepository $proyectoRepository)
    {
        $this->concesRepository = $concesRepository;
        $this->tareaActRepository = $tareaActRepository;
        $this->marcaRepository = $marcaRepository;
        $this->campaniaRepository = $campaniaRepository;
        $this->proyectoRepository = $proyectoRepository;
    }

    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $valor = $request->json()->all();

        $version = $valor['cts_version'];

        //si se usa la misma vesion se cambia el id con un valor que le paso
        //si se cambia la vesion se resetea la version y vuelve a uno

        $tareaactualizar = TareaAct::where('cts_version', '=', $version)->get();

        $max = $this->tareaActRepository->getSigCod($version);

        //dump($max);
        //dd();

        if ($tareaactualizar->count() == 0) {

            $taract = New TareaAct();
            $taract->cts_id = $max;
            $taract->cts_version = $version;
            $taract->cts_script = $valor['cts_script'];
            $taract->cts_tarea = $valor['cts_tarea'];
            $taract->cts_alcance = $valor['cts_alcance'];
            $taract->cts_tipotardgc = $valor['cts_tipotardgc'];
            $taract->save();

            return ['created' => true];

        } else {

            $taract = New TareaAct();
            $taract->cts_id = $max;
            $taract->cts_version = $version;
            $taract->cts_script = $valor['cts_script'];
            $taract->cts_tarea = $valor['cts_tarea'];
            $taract->cts_alcance = $valor['cts_alcance'];
            $taract->cts_tipotardgc = $valor['cts_tipotardgc'];
            $taract->save();

            return ['created' => true];
        }

    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function getTareaSarec($desde, $hasta)
    {

        $tarea_sarec = $this->tareaActRepository->getTareaSarec($desde, $hasta);


        if (empty($tarea_sarec)) {

            return Response()->json(['status' => 'error', 'data' => null]);

        } else {

            return Response()->json(['status' => 'success', 'data' => $tarea_sarec]);
        }

    }

        public function ExisteActualizaciones(Request $request)
    {

        $valor = $request->json()->all();

        /*        dump($valor);
                dd();*/

        $conce = $valor['conce'];
        $sistema_max = $valor['campsis_sistema_max'];
        $version_max = $valor['campsis_version_max'];
        $siac = $valor['campsis_sistema_siac'];
        $siac_ver = $valor['campsis_version_siac'];
        $contable = $valor['campsis_sistema_contable'];
        $contable_ver = $valor['campsis_version_contable'];
        $posventa = $valor['campsis_sistema_posventa'];
        $posventa_ver = $valor['campsis_version_posventa'];
        $posvta2 = $valor['campsis_sistema_posvta2'];
        $posvta2_ver = $valor['campsis_version_posvta2'];
        $labcomer = $valor['campsis_sistema_labcomer'];
        $labcomer_ver = $valor['campsis_version_labcomer'];
        $touch = $valor['campsis_sistema_touch'];
        $touch_ver = $valor['campsis_version_touch'];


        /* ------- Iniciar el proceso de cambio de estado de la empresa en la campania ------- */


        $actualiza_cambio_estado = ComCampCon::where('conces.con_codigo', '=', $conce)
            ->where('campsis_version', '<=', $version_max)
            /*            ->select('ComCampania.cam_codigo as cod_campania', 'ComCampania.cam_nombre as nom_campania',
            'conces.con_codigo as cod_empresa', 'conces.con_nombre as nom_empresa',
            'campsis_sistema as sistema', 'campsis_version as version')*/
            ->select('ComCampania.cam_codigo as cod_campania')
            ->Join('ComCampania', 'ComCampania.cam_codigo', '=', 'ComCampCon.campcon_campania')
            ->Join('conces', 'conces.con_codigo', '=', 'ComCampCon.campcon_conces')
            ->Join('Campsis', 'Campsis.campsis_campania', '=', 'ComCampania.cam_codigo')
            ->Join('sistema', 'sistema.sis_codigo', '=', 'Campsis.campsis_sistema')
            ->groupBy('ComCampania.cam_codigo')
            ->get();



        if ($actualiza_cambio_estado->isNotEmpty()) {

            foreach ($actualiza_cambio_estado as $item){

                if ($item->campcon_estado != 0){

                    echo ('Se cambio el estado de la empresa en la campania '.  $item->cod_campania .'</br>');

                    $set_estado = ComCampCon::where('campcon_campania','=',$item->cod_campania)
                        ->where('campcon_conces','=',$conce)
                        ->first();

                    $set_estado->campcon_estado = 0;
                    $set_estado->save();

                }

            }

        }


        /* ------- Finaliza el proceso de cambio de estado de la empresa en la campania ------- */


        $actualiza = ComCampCon::where('conces.con_codigo', '=', $conce)
            ->where('campsis_version', '>', $version_max)
            /*            ->select('ComCampania.cam_codigo as cod_campania', 'ComCampania.cam_nombre as nom_campania',
            'conces.con_codigo as cod_empresa', 'conces.con_nombre as nom_empresa',
            'campsis_sistema as sistema', 'campsis_version as version')*/
            ->select('ComCampania.cam_codigo as cod_campania', 'ComCampania.cam_nombre as nom_campania')
            ->Join('ComCampania', 'ComCampania.cam_codigo', '=', 'ComCampCon.campcon_campania')
            ->Join('conces', 'conces.con_codigo', '=', 'ComCampCon.campcon_conces')
            ->Join('Campsis', 'Campsis.campsis_campania', '=', 'ComCampania.cam_codigo')
            ->Join('sistema', 'sistema.sis_codigo', '=', 'Campsis.campsis_sistema')
            ->groupBy('ComCampania.cam_codigo', 'ComCampania.cam_nombre')
            ->get();

        if ($actualiza->count() == 0) {

            return Response()->json(['status' => 'info','message' => 'No Existen Campanias Pendientes de Actualizacion.', 'data' => null]);

        } else {

            return Response()->json(['status' => 'success','data' => $actualiza]);

        }

    }

}

<?php

namespace App\Http\Controllers;

use App\Csi;
use App\Repositories\CsiRepository;
use Illuminate\Http\Request;
use Carbon\Carbon;

class CsiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    private $csiRepository;

    public function __construct(CsiRepository $csiRepository)
    {
        $this->csiRepository=$csiRepository;
    }
    
    public function index()
    {

        $fecha = Carbon::parse('last sunday')->toDateString();

        $now_index = 1;
        
        $tipo = 'csi';

        $csi = $this->csiRepository->getCsi($fecha);

        return view('listado_csi',compact('csi','now_index','tipo'));
    }


    public function getFecha($fecha)
    {
        $csi = $this->csiRepository->getCsi($fecha);

        $now_index = 2;

        $tipo = 'csi';

        return view('listado_csi',compact('csi','now_index','fecha','tipo'));
    }

    public function getrecibo($conce,$tipo,$fechainicio,$version)
    {

        $fecha_actual = Carbon::now('America/Argentina/Buenos_Aires')->toDateString();
        $hora_actual = Carbon::now('America/Argentina/Buenos_Aires')->toTimeString();


        $csi_toyota = Csi::where('csi_idconces', '=' , $conce)
            ->where('csi_fecha', '=', $fechainicio)->get();


            if ($csi_toyota->count() == 0){
                $csi = new Csi();
                $csi->csi_idconces = $conce;
                $csi->csi_iniexec = 1;
                $csi->csi_finexec = 0;
                $csi->csi_fecha = $fechainicio;
                $csi->csi_horaini = $hora_actual;
                $csi->csi_version = $version;
                $csi->save();
            } else {

                if ($conce == 6){

                    $csi = new Csi();
                    $csi->csi_idconces = 4;
                    $csi->csi_iniexec = 1;
                    $csi->csi_finexec = 0;
                    $csi->csi_fecha = $fechainicio;
                    $csi->csi_horaini = $hora_actual;
                    $csi->csi_version = $version;
                    $csi->save();
                }

            }
        



    }

}

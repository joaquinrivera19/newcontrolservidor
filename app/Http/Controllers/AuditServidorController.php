<?php

namespace App\Http\Controllers;

use App\AuditServidor;
use App\Repositories\AuditServidorRepository;
use Illuminate\Http\Request;
use Carbon\Carbon;

class AuditServidorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    private $auditServidorRepository;

    public function __construct(AuditServidorRepository $auditServidorRepository)
    {
        $this->auditServidorRepository= $auditServidorRepository;
    }

    public function index()
    {

        //$now_date = Carbon::now()->format('d-m-Y');

        $fecha = Carbon::parse('last sunday')->toDateString();

        //$fecha = Carbon::parse('first sunday of now')->toDateString();

        $now_index = 1;

        $tipo = 'auditservidor';

        $auditservidor = $this->auditServidorRepository->getAuditServidor($fecha);

        return view('listado_auditservidor',compact('auditservidor','now_index','tipo'));


    }

    /**
     * @param $fecha
     * @return mixed
     */
    public function getFecha($fecha)
    {
        $auditservidor = $this->auditServidorRepository->getAuditServidor($fecha);

        $now_index = 2;

        $tipo = 'auditservidor';

        return view('listado_auditservidor',compact('auditservidor','now_index','fecha','tipo'));
    }

    public function getrecibo($conce,$tipo,$fechainicio)
    {

        $fecha_actual = Carbon::now('America/Argentina/Buenos_Aires')->toDateString();
        $hora_actual = Carbon::now('America/Argentina/Buenos_Aires')->toTimeString();


        $auditservidor = AuditServidor::where('auser_idconces', '=' , $conce)
            ->where('auser_fecha', '=', $fechainicio)->get();

        //dump($auditservidor);
        //dd();

        if ($tipo == 0){
            if ($auditservidor->count() == 0){
                $aud = new AuditServidor();
                $aud->auser_idconces = $conce;
                $aud->auser_iniexec = 1;
                $aud->auser_finexec = 0;
                $aud->auser_fecha = $fechainicio;
                $aud->auser_horaini = $hora_actual;
                $aud->save();
            }
        }

        if ($tipo == 1){
            if ($auditservidor->count() != 0){
                $aud = AuditServidor::where('auser_idconces', '=', $conce)
                    ->where('auser_iniexec', '=',1)
                    ->where('auser_fecha', '=',$fechainicio)
                    ->first();
                $aud->auser_finexec = 1;
                $aud->auser_fechafin = $fecha_actual;
                $aud->auser_horafin = $hora_actual;
                $aud->save();
            }
        }


    }

}

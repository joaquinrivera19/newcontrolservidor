<?php

namespace App\Http\Controllers;

use App\ConceConexion;
use App\Dbbackup;
use App\Repositories\ConceConexionRepository;
use App\Repositories\DbbackupRepository;
use Illuminate\Http\Request;
use Carbon\Carbon;

class DbbackupController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    private $dbbackupRepository,$conceConexionRepository;

    public function __construct(DbbackupRepository $dbbackupRepository, ConceConexionRepository $conceConexionRepository)
    {
        $this->dbbackupRepository = $dbbackupRepository;
        $this->conceConexionRepository = $conceConexionRepository;
    }

    public function index()
    {

        $fecha = Carbon::parse('last sunday')->toDateString();

        $now_index = 1;

        $tipo = 'dbbackups';

        $dbbackup = $this->dbbackupRepository->getDbbackup($fecha);
        
        return view('listado_dbbackup',compact('dbbackup','now_index','tipo'));
    }

    public function getFecha($fecha)
    {
        $dbbackup = $this->dbbackupRepository->getDbbackup($fecha);

        $now_index = 2;

        $tipo = 'dbbackups';

        return view('listado_dbbackup',compact('dbbackup','now_index','fecha','tipo'));
    }

    public function getrecibo($conce,$tipo,$fechainicio,$version)
    {

        $fecha_actual = Carbon::now('America/Argentina/Buenos_Aires')->toDateString();
        $hora_actual = Carbon::now('America/Argentina/Buenos_Aires')->toTimeString();


        $dbbackup = Dbbackup::where('db_idconces', '=' , $conce)
            ->where('db_fecha', '=', $fechainicio)->get();

        //dump($auditservidor);
        //dd();

        //if ($tipo == 0){
            if ($dbbackup->count() == 0){
                $db = new Dbbackup();
                $db->db_idconces = $conce;
                $db->db_iniexec = 1;
                $db->db_finexec = 0;
                $db->db_fecha = $fechainicio;
                $db->db_horaini = $hora_actual;
                $db->db_version = $version;
                $db->save();
            }
        //}

/*        if ($tipo == 1){
            if ($dbbackup->count() != 0){
                $db = Dbbackup::where('db_idconces', '=', $conce)
                    ->where('db_iniexec', '=',1)
                    ->where('db_fecha', '=',$fechainicio)
                    ->first();
                $db->db_finexec = 1;
                $db->db_fechafin = $fecha_actual;
                $db->db_horafin = $hora_actual;
                $db->db_version = $version;
                $db->save();
            }
        }*/


    }
    
}

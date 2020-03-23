<?php
/**
 * Created by PhpStorm.
 * User: jrivera
 * Date: 31/05/2017
 * Time: 12:50 PM
 */

namespace App\Repositories;

use App\Campania;
use App\Conces;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class CampaniaRepository
{
    public function getCampaniaActiva()
    {
        //$now = Carbon::now()->format('d-m-Y');

        //return Campania::where('cam_eliminado','=', 0)->where('cam_limite','>=',$now)->orderBy('cam_creacion', 'desc')->get();
    }
    
    public function getCampania()
    {
        //return Campania::where('cam_eliminado','=', 0)->orderBy('cam_creacion', 'desc')->get();
    }

    public function getCampSis($codigo)
    {
        return DB::select('exec campsis_versiones ? ', array($codigo));
    }

    public function getCampaniaId($codigo,$proy_campania,$marca_campania)
    {
        return DB::select('exec campaniaid_table_primera ?,?,? ', array($codigo,$proy_campania,$marca_campania));
    }

    public function getCampaniaId_sm($codigo,$proy_campania)
    {
        return DB::select('exec campaniaid_table_primera_sm ?,? ', array($codigo,$proy_campania));
    }

    public function getCampaniaId_table_secundaria($codigo,$proy_campania,$marca_campania)
    {
        return DB::select('exec campaniaid_table_segunda ?,?,? ', array($codigo,$proy_campania,$marca_campania));
    }

    public function getCampaniaId_table_secundaria_sm($codigo,$proy_campania)
    {
        return DB::select('exec campaniaid_table_segunda_sm ?,? ', array($codigo,$proy_campania));
    }


    public function getcampania_info_activas()
    {
        $date = Carbon::now()->format('d-m-Y');

        return DB::select('exec campania_info_activas ?', array($date));
    }

    public function getcampania_info_desactivas(){

        $date = Carbon::now()->format('d-m-Y');

        return DB::select('exec campania_info_desactivas ?', array($date));
    }
    
    public function getMax_Campania()
    {
        $max = DB::table('comcampania')
            ->select(DB::raw('MAX(cam_codigo) as maximo'))
            ->first();

        if ($max == null) {
            return $max = 1;
        } else {
            return $sig = $max->maximo;
        }

    }



}
<?php
/**
 * Created by PhpStorm.
 * User: jrivera
 * Date: 03/03/2017
 * Time: 12:26 PM
 */

namespace App\Repositories;
use Illuminate\Support\Facades\DB;
use App\Conces;
use App\ComCampCon;

class ConcesRepository
{
    public function getConcesAll(){
        //return Conces::where('con_auditserv','=',1)->get();
        return Conces::all();
    }
    
    public function getConces(){
//        return Conces::where('con_id','<',10)->
//            where('con_eliminar','=',null )->get();
    }

    public function getConcesHab(){
        return Conces::where('con_eliminar','=',null )
            //->where('con_codigo','<',10 )
            ->get();
    }

    public function getConcesUlt1(){
        return DB::select('exec campaniaid_ult1 ');
    }

    public function getConcesUlt2(){
        return DB::select('exec campaniaid_ult2 ');
    }
    
    public function getCampaniaUlt(){
        return ComCampCon::selectRaw('MAX(comcampcon.campcon_campania) as camp_codigo_max, comcampania.cam_nombre as camp_nombre_max ')
            ->leftJoin('comcampania','comcampcon.campcon_campania','=','comcampania.cam_codigo')
            ->groupBy('comcampcon.campcon_campania','comcampania.cam_nombre')
            ->orderBy('comcampcon.campcon_campania','desc')
            ->first();
    }

}
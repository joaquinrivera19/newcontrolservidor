<?php

namespace App\Http\Controllers;

use App\ConceConexion;
use App\Repositories\ConceConexionRepository;
use Illuminate\Http\Request;
use Carbon\Carbon;

class ConceConexionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    private $conceConexionRepository;
    
    public function __construct(ConceConexionRepository $conceConexionRepository)
    {
        $this->conceConexionRepository = $conceConexionRepository;
    }

    public function index()
    {
        //
    }


    public function store(Request $request)
    {

        $fecha = Carbon::now('America/Argentina/Buenos_Aires')->toDateString();

        $conces = new ConceConexion();
        $conces->cone_conces = $request->input('cone_conces');
        $conces->cone_proceso = $request->input('cone_proceso');
        $conces->cone_observa = $request->input('cone_observa');
        $conces->cone_fechacarga = $fecha;

        $conces->save();

        return back();
    }
    
    public function getConceConexion($id)
    {

        $conce_conexion = $this->conceConexionRepository->getConceConexion($id);

        if ($conce_conexion->count() == 0) {

            return Response()->json(['status' => 'info','message' => 'No existe informacion de conexion de la empresa.', 'data' => null]);

        } else {

            return Response()->json(['status' => 'success','data' => $conce_conexion]);

        }
        
    }

}

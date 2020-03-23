<?php

namespace App\Http\Controllers;

use App\Conces;
use App\Novedad;
use App\Repositories\ConcesRepository;
use App\Repositories\MarcaRepository;
use App\Repositories\NovedadRepository;
use Illuminate\Http\Request;

class NovedadController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    
    private $novedadRepository,$concesRepository,$marcaRepository;
    
    public function __construct(NovedadRepository $novedadRepository, ConcesRepository $concesRepository,
                                MarcaRepository $marcaRepository){
        
        $this->novedadRepository = $novedadRepository;
        $this->concesRepository = $concesRepository;
        $this->marcaRepository = $marcaRepository;
        
    }
    
    public function index()
    {
        
        $novedad = $this->novedadRepository->getNovedadJson();
        
        if (empty($novedad)) {

            return Response()->json(['status' => 'error','data' => 0]);

        } else {

            return Response()->json(['status' => 'success','data' => $novedad]);
        }
        
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
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $valor = $request->json()->all();

        $novedad= New Novedad();
        $novedad->nov_version = $valor['nov_version'];
        $novedad->nov_titulo = $valor['nov_titulo'];
        $novedad->nov_descripcion = $valor['nov_descripcion'];
        $novedad->nov_conces = $valor['nov_conces'];
        $novedad->nov_tarea = $valor['nov_tarea'];
        $novedad->nov_marca = $valor['nov_marca'];
        $novedad->nov_alcance = $valor['nov_alcance'];
        $novedad->nov_sistema = $valor['nov_sistema'];
        $novedad->nov_tiporeq = $valor['nov_tiporeq'];
        $novedad->nov_estado = $valor['nov_estado'];
        $novedad->save();

        return ['created' => true];
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}

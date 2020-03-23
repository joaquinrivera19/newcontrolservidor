<?php

namespace App\Http\Controllers;

use App\HisVer;
use App\Repositories\CampaniaRepository;
use App\Repositories\HisVerRepository;
use App\Repositories\SistemaRepository;
use Illuminate\Http\Request;

class HisVerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    
    private $sistemaRepository,$campaniaRepository, $hisVerRepository;
    
    public function __construct(SistemaRepository $sistemaRepository, CampaniaRepository $campaniaRepository, 
                                HisVerRepository $hisVerRepository)
    {
        $this->sistemaRepository = $sistemaRepository;
        $this->campaniaRepository = $campaniaRepository;
        $this->hisVerRepository = $hisVerRepository;
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
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $valor = $request->json()->all();

        //dump($request->input());
        //dd();

        $version = $valor['hv_version'];

        $hisver = HisVer::where('hv_version','=',$version)
            ->get();

        if ($hisver->count() == 0)
        {
            $hisversion = new HisVer();
            $hisversion->hv_sistema = $valor['hv_sistema'];
            $hisversion->hv_version = $valor['hv_version'];
            $hisversion->hv_ubicacion = $valor['hv_ubicacion'];
            $hisversion->hv_fecha = $valor['hv_fecha'];
            $hisversion->hv_estado = 1;
            $hisversion->save();

            return ['created' => true];

        }else{

            return ['created' => false];

        }
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
    
    public function getHisVer()
    {
        $hisver = $this->hisVerRepository->getUltimosExes();

        if (empty($hisver)) {

            return Response()->json(['status' => 'error', 'data' => null]);

        } else {

            return Response()->json(['status' => 'success', 'data' => $hisver]);
        }
    }
}

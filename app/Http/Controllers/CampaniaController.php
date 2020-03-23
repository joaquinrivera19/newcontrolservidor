<?php

namespace App\Http\Controllers;

use App\Campania;
use App\CampSis;
use App\Repositories\CampaniaRepository;
use App\Repositories\ConcesRepository;
use App\Repositories\MarcaRepository;
use App\Repositories\ProyectoRepository;
use App\Repositories\SistemaRepository;
use App\Repositories\TareaActRepository;
use Hamcrest\Core\IsNull;
use Illuminate\Http\Request;
use phpDocumentor\Reflection\Types\Null_;

class CampaniaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    private $campaniaRepository, $concesRepository, $tareaActRepository, $marcaRepository, $proyectoRepository, $sistemaRepository;

    public function __construct(CampaniaRepository $campaniaRepository, ConcesRepository $concesRepository, TareaActRepository $tareaActRepository,
                                MarcaRepository $marcaRepository, ProyectoRepository $proyectoRepository, SistemaRepository $sistemaRepository)
    {
        $this->campaniaRepository = $campaniaRepository;
        $this->concesRepository = $concesRepository;
        $this->tareaActRepository = $tareaActRepository;
        $this->marcaRepository = $marcaRepository;
        $this->proyectoRepository = $proyectoRepository;
        $this->sistemaRepository = $sistemaRepository;
    }

    public function index()
    {

        //$conces = $this->concesRepository->getConcesHab();

        $conces1 = $this->concesRepository->getConcesUlt1();

        $codi_campa = $conces1[0]->codi_campa;

        $proy_campania = Campania::find($codi_campa)->cam_proyecto;

        $marca_campania = Campania::find($codi_campa)->cam_marca;


        if ($marca_campania == 98) {
            $conces2 = $this->campaniaRepository->getCampaniaId_sm($codi_campa, $proy_campania);
        } else {
            $conces2 = $this->campaniaRepository->getCampaniaId_table_secundaria($codi_campa, $proy_campania, $marca_campania);
        }


        $campania = $this->campaniaRepository->getcampania_info_activas();


        /*dump($campania);
        dd();
        */
        
        $proyecto = $this->proyectoRepository->getProyecto();
        $sistemas = $this->sistemaRepository->getSistema();
        $marca = $this->marcaRepository->getMarca();


        // trae la ultima campaña creada
        //$maxcampania = $this->campaniaRepository->getMax_Campania();

        //$camp_maximo = $this->concesRepository->getCampaniaUlt();


        return view('actualiza_empresa', compact('conces1', 'conces2', 'campania', 'marca', 'proyecto', 'sistemas'));

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


        $campania = New Campania();
        $campania->cam_nombre = $request->input('cam_nombre');
        $campania->cam_creacion = $request->input('cam_creacion');
        $campania->cam_limite = $request->input('cam_limite');
        $campania->cam_marca = $request->input('cam_marca');
        $campania->cam_proyecto = $request->input('cam_proyecto');
        $campania->cam_eliminado = 0;
        $campania->save();



        $campania_seleccionada = $campania->cam_codigo;

        foreach ($request->campsis as $key => $v) {

            $detalle = new CampSis();
            $detalle->campsis_campania = $campania_seleccionada;
            $detalle->campsis_sistema = $key;
            $detalle->campsis_version = 1;
            $detalle->campsis_estado = 1;
            $detalle->save();

        }



        return redirect('/actualiza_empresa')->with('success', 'Se ha creado una nueva campania correctamente');
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

    public function getcampania($codigo)
    {

        $nom_campania = Campania::find($codigo)->cam_nombre;
        $cod_campania = Campania::find($codigo)->cam_codigo;

        $proy_campania = Campania::find($codigo)->cam_proyecto;

        $marca_campania = Campania::find($codigo)->cam_marca;

/*                dump($codigo,$proy_campania,$marca_campania);
                dd();*/
        
        if ($marca_campania == 98) {
            $campania = $this->campaniaRepository->getCampaniaId_sm($codigo, $proy_campania);
        } else {
            $campania = $this->campaniaRepository->getCampaniaId($codigo, $proy_campania, $marca_campania);
        }
        

        if (empty($campania)) {

            return Response()->json(['cod_campania' => $cod_campania, 'nom_campania' => $nom_campania, 'status' => 'danger', 'data' => 0]);

        } else {

            return Response()->json(['cod_campania' => $cod_campania, 'nom_campania' => $nom_campania, 'data' => $campania]);
        }

    }

    public function getcampania_segunda_table($codigo)
    {

        $nom_campania = Campania::find($codigo)->cam_nombre;
        $cod_campania = Campania::find($codigo)->cam_codigo;

        $proy_campania = Campania::find($codigo)->cam_proyecto;

        $marca_campania = Campania::find($codigo)->cam_marca;
        

        
        if ($marca_campania == 98) {
            $campania = $this->campaniaRepository->getCampaniaId_table_secundaria_sm($codigo, $proy_campania);
        } else {
            $campania = $this->campaniaRepository->getCampaniaId_table_secundaria($codigo, $proy_campania, $marca_campania);
        }
        

        if (empty($campania)) {

            return Response()->json(['cod_campania' => $cod_campania, 'nom_campania' => $nom_campania, 'status' => 'danger', 'data' => 0]);

        } else {

            return Response()->json(['cod_campania' => $cod_campania, 'nom_campania' => $nom_campania, 'data' => $campania]);
        }

    }

    public function getcampanialist($cod)
    {
        if ($cod == 0) {
            $campania_list = $this->campaniaRepository->getcampania_info_desactivas();
        } else {
            $campania_list = $this->campaniaRepository->getcampania_info_activas();
        }


        if (empty($campania_list)) {

            return Response()->json(['status' => 'danger', 'data' => null]);

        } else {

            return Response()->json(['data' => $campania_list]);
        }

    }

    public function getcampania_info()
    {

        $campania_info = $this->campaniaRepository->getcampania_info();

        if (empty($campania_info)) {

            return Response()->json(['status' => 'danger', 'data' => null]);

        } else {

            return Response()->json(['data' => $campania_info]);
        }

    }
    
    public function getcampsis($codigo)
    {
        $campsis = $this->campaniaRepository->getCampSis($codigo);

        if (empty($campsis)) {

            return Response()->json(['status' => 'danger', 'data' => null]);

        } else {

            return Response()->json(['data' => $campsis]);
        }
    }
}

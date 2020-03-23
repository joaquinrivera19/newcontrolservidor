<?php

namespace App\Http\Controllers;

use App\Campania;
use App\ComCampCon;
use App\Conces;
use App\Repositories\CampaniaRepository;
use App\Repositories\ConcesRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;

class CampConController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    private $concesRepository, $campaniaRepository;

    public function __construct(ConcesRepository $concesRepository, CampaniaRepository $campaniaRepository)
    {

        $this->concesRepository = $concesRepository;
        $this->campaniaRepository = $campaniaRepository;

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

        /*       dump($request->all());
                dd();*/

        $campania = $request->input('campcon_campania');

        $tipo_envio = $request->input('tipo_envio');

        if ($tipo_envio == 1) {

            foreach ($request->campcon_conces as $key => $v) {

                if ($request->campcon_conces[$key] == 1) {

                    $detalle = ComCampCon::where('campcon_campania', '=', $campania)->where('campcon_conces', '=', $key)->first();
                    $detalle->delete();

                }

            }

        } else {

            foreach ($request->campcon_conces as $key => $v) {

                $comcamp = ComCampCon::where('campcon_campania', '=', $campania)
                    ->where('campcon_conces', '=', $key)->get();

                if ($comcamp->count() == 0) {

                    if ($request->campcon_conces[$key] == 1) {

                        $detalle = new ComCampCon();
                        $detalle->campcon_campania = $campania;
                        $detalle->campcon_conces = $key;
                        $detalle->campcon_estado = 1;

                        $detalle->save();

                    }
                }
            }

        }


        return redirect('actualiza_empresa');

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

}

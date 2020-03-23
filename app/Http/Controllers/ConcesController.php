<?php

namespace App\Http\Controllers;

use App\Conces;
use App\Repositories\ConcesRepository;
use Illuminate\Http\Request;

class ConcesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    private $concesRepository;

    public function __construct(ConcesRepository $concesRepository)
    {
        $this->concesRepository= $concesRepository;
    }
    
    public function index()
    {
        $conces = $this->concesRepository->getConcesHab();
        
        return view('listado_conces',compact('conces'));
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
        
        if ($request->input('con_id')){

            $con_id = $request->input('con_id');

            $conces = Conces::where('con_id', '=', $con_id)->first();
            $conces->con_nombre = $request->input('con_nombre');
            $conces->con_auditserv = $request->input('con_auditserv');
            $conces->con_dbbackupsc = $request->input('con_dbbackupsc');
            $conces->con_spoolercsi = $request->input('con_spoolercsi');

            $conces->save();

        }else{

            $conces = new Conces();
            $conces->con_codigo = $request->input('con_codigo');
            $conces->con_nombre = $request->input('con_nombre');
            $conces->con_auditserv = $request->input('con_auditserv');
            $conces->con_dbbackupsc = $request->input('con_dbbackupsc');
            $conces->con_spoolercsi = $request->input('con_spoolercsi');

            $conces->save();

        }



        return redirect('/conces')->with('success', 'Se ha modifico los datos del prospecto correctamente');
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

        $conces = Conces::find($request->input('con_id'));

        $conces->con_eliminar = 1;
        $conces->save();
        return redirect('/conces')->with('success', 'Se ha Eliminado los datos del prospecto correctamente');
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

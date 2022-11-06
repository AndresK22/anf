<?php

namespace App\Http\Controllers;

use App\Models\Empresa;
use App\Models\Sector;
use Illuminate\Http\Request;

class EmpresaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        try{
            $empresas = Empresa::all();
            return view('empresa.index', compact('empresas'));

        } catch(\Exception $e){
            $e->getMessage();
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        try{
            $sectores = Sector::all();
            return view('empresa.create', compact('sectores'));

        } catch(\Exception $e){
            $e->getMessage();
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        try{
            $empresa = new Empresa();
            $empresa->sector_id = $request->sector_id;
            $empresa->nombreEmpresa = $request->nombreEmpresa;
            $empresa->save();

            return redirect()->route('empresa.index');
        } catch(\Exception $e){
            $e->getMessage();
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
    public function edit(Empresa $empresa)
    {
        try{
            $sectores = Sector::all();

            return view('empresa.edit', compact('empresa', 'sectores'));

        } catch(\Exception $e){
            $e->getMessage();
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Empresa $empresa)
    {
        try{
            $empresa->sector_id = $request->sector_id;
            $empresa->nombreEmpresa = $request->nombreEmpresa;
            $empresa->save();

            return redirect()->route('empresa.index');
        } catch(\Exception $e){
            $e->getMessage();
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Empresa $empresa)
    {
        try{
            $empresa->delete();
            return redirect()->route('empresa.index');
            
        } catch(\Exception $e){
            $e->getMessage();
        }
    }
}

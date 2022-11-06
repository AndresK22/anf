<?php

namespace App\Http\Controllers;

use App\Models\Empresa;
use App\Models\TipoCuenta;
use Illuminate\Http\Request;

class CuentaController extends Controller
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
            return view('cuenta.index', compact('empresas'));

        }catch(\Exception $e){
            return $e->getMessage();
        }

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {

        try{
            $tipoEmpresas = TipoCuenta::all();
            return view('cuenta.create', compact('tipoEmpresas'));

        }catch(\Exception $e){
            return $e->getMessage();
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
        //
        return redirect()->route('cuenta.create',$request);

    }

 
}

<?php

namespace App\Http\Controllers;

use App\Models\Cuenta;
use App\Models\CuentaEquivalente;
use App\Models\Empresa;
use App\Models\TipoCuenta;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

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
    public function create(Empresa $empresa)
    {

        try{
            $id = $empresa->id;
            $e = Cuenta::where('empresa_id',$id)->get();
            $activo=Cuenta::where('tipo_cuenta_id',1)->where('empresa_id',$id)->get() ;
            $pasivo=Cuenta::where('tipo_cuenta_id',2)->where('empresa_id',$id)->get();
            $patrimonio=Cuenta::where('tipo_cuenta_id',3)->where('empresa_id',$id)->get();
            $cuentaDeu=Cuenta::where('tipo_cuenta_id',4)->where('empresa_id',$id)->get();
            $cuentaAcre=Cuenta::where('tipo_cuenta_id',5)->where('empresa_id',$id)->get();

            $tipoEmpresas = TipoCuenta::all();
            $cuentaEqui = CuentaEquivalente::all();
            return view('cuenta.create', compact('tipoEmpresas' , 'cuentaEqui', 'id','activo','pasivo','patrimonio','cuentaDeu','cuentaAcre'));


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
        
        try{
        $cuenta= new Cuenta();
        $cuenta->idCuenta = $request->idCuenta;
        $cuenta->empresa_id = $request->empresa_id;
        $cuenta->tipo_cuenta_id= $request->tipo_cuenta_id;
        $cuenta->cuenta_equivalente_id= $request->cuenta_equivalente_id;
        $cuenta->nombreCuenta= $request->nombreCuenta;

        $cuenta->save();
        return redirect()->route('cuenta.create',$request->empresa_id);
    }catch(\Exception $e){
        return $e->getMessage();
    }

    }

 
}

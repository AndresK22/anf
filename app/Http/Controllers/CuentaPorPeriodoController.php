<?php

namespace App\Http\Controllers;

use App\Models\Empresa;
use App\Models\Cuenta;
use App\Models\CuentaPorPeriodo;
use App\Models\PeriodoContable;
use Illuminate\Http\Request;

class CuentaPorPeriodoController extends Controller
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
            $periodos = PeriodoContable::all();
            $cuentasPeriodo = CuentaPorPeriodo::all();
            return view('cuentaPeriodo.index', compact('cuentasPeriodo', 'empresas', 'periodos'));

        } catch(\Exception $e){
            $e->getMessage();
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
            $idEmp = $request->empresa_id;
            $empresa = Empresa::where('id',$idEmp)->orderBy('id')->get();

            $idPer = $request->periodo_contable_id;
            $periodo = PeriodoContable::where('id',$idPer)->orderBy('id')->get();

            $cuentas = Cuenta::where('empresa_id',$idEmp)->orderBy('idCuenta')->get();
            return view('cuentaPeriodo.create', compact('empresa','periodo','cuentas'));

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
    public function store(Request $request, Empresa $empresa, PeriodoContable $periodo)
    {
        try{
            $cuentas = Cuenta::where('empresa_id',$empresa->id)->orderBy('idCuenta')->get();

            foreach($cuentas as $cuent){
                $cuentaPer = new CuentaPorPeriodo();
                $cuentaPer->periodo_contable_id = $periodo->id;
                $cuentaPer->cuenta_id = $cuent->id;
                $cuentaPer->saldo = $request->input(str_replace(' ', '', $cuent->nombreCuenta));
                $cuentaPer->save();
            }

            return redirect()->route('cuentaPeriodo.index');
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
    public function show(Empresa $empresa)
    {
        $cuentas = Cuenta::where('empresa_id',$empresa->id)->orderBy('idCuenta')->get();
        
        $ids = array();
        foreach($cuentas as $item){
            array_push($ids, $item->id);
        }
        $cuenPer = CuentaPorPeriodo::where('cuenta_id', $ids)->orderBy('id')->get();
        return view('cuentaPeriodo.show', compact('cuentas', 'cuenPer'));
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
            return view('cuentaPeriodo.edit', compact('empresa'));

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

            return redirect()->route('cuentaPeriodo.index');
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
            return redirect()->route('cuentaPeriodo.index');
            
        } catch(\Exception $e){
            $e->getMessage();
        }
    }
}
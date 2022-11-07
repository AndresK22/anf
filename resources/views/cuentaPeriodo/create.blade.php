@extends('admin.index')
@section('tittle','Ingresar saldos')
@section('content')
<div class="container">
    <div class="row py-lg-2">
        <div class="col-md-6"><h2>Ingresar saldos</h2></div>
    </div>


    <div class="row">
        <div class="col-12">
            <div class="card card-post" id="post_card">
                <div class="card-header">
                    <div style="display: flex; justify-content: space-between; align-items: center;">
                        <div class="pull-right">
                            <a href="{{ url()->previous() }}" class="btn btn-outline-secondary btn-sm float-right" data-toggle="tooltip" data-placement="left" title data-original-title="Regresar a lista de empresas">Regresar</a>
                        </div>
                    </div>
                </div>
                <form action="{{ route('cuentaPeriodo.store', ['empresa'=>$empresa[0]->id, 'periodo'=>$periodo[0]->id]) }}" method="POST">
                @csrf
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-8">
                                @foreach ($cuentas as $cuent)
                                    <div class="form-group has-feedback row">
                                        <label for="{{ str_replace(' ', '', $cuent->nombreCuenta) }}" class="col-12 control-label">{{ $cuent->nombreCuenta }}:</label>
                                        <div class="col-12">
                                            <input name="{{ str_replace(' ', '', $cuent->nombreCuenta) }}" class="form-control" type="number" min="0.01" max="9999999999" step="0.01" value="{{ old($cuent->nombreCuenta) }}" ></input>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                    <div class="card-footer">
                        <div class="row">
                            <div class="col-md-6">
                                <span data-toggle="tooltip" title data-original-title="Guardar empresa">
                                    <button type="submit" class="btn btn-success btn-lg btn-block" value="Guardar" name="action">
                                        <i class="fa fa-save fa-fw">
                                            <span class="sr-only">
                                                Guardar Icono
                                            </span>
                                        </i>
                                        Guardar catalogo
                                    </button>
                                </span>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
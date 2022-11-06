@extends('admin.index')
@section('title','Abonos')
@section('content')

<div class="container">
    <div class="row py-lg-2">
        <div class="col-md-6">
        <h2>Ingresar cuentas</h2>
        </div>
    </div>


    <div class="row">
        <div class="col-12">
            <div class="card card-post" id="post_card">
                <div class="card-header">
                    <div style="display: flex; justify-content: space-between; align-items: center;">
                        Cuenta empresa_id	tipo_cuenta_id	cuenta_equivalente_id	nombreCuenta
                        <div class="pull-right">
                            <a href="{{ url()->previous() }}" class="btn btn-outline-secondary btn-sm float-right" data-toggle="tooltip" data-placement="left" title data-original-title="Regresar a lista de expedientes">Regresar</a>
                        </div>
                    </div>
                </div>
                <form action="{{route('cuenta.store')}}" method="POST">
                @csrf
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-8">
                                <div class="form-group has-feedback row">
                                    <div class="col-12">
                                        <input type="hidden" name="empresa_id" class="form-control"  id="empresa_id"></input>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label class="col-sm col-form-label">Tipo de cuenta</label>
                                    <div class="col-sm-8">
                                      <select class="form-select" name="profesionAso" id="profesionAso" required>
                                        <option selected='true' disabled='disabled'>Seleccionar Empresa</option>
                                        @foreach($tipoEmpresas as $item)
                                        <option value="{{ $item->id }}">{{ $item->nombreTipoCuenta }}</option>
                                        @endforeach
                                    </select>
                                    </div>
                                  </div>

                                  <div class="form-group row">
                                    <label class="col-sm col-form-label">Cuenta equivalente</label>
                                    <div class="col-sm-8">
                                      <select class="form-select" name="profesionAso" id="profesionAso" required>
                                        <option selected='true' disabled='disabled'>Seleccionar Cuenta</option>
                                        @foreach($tipoEmpresas as $item)
                                        <option value="{{ $item->id }}">{{ $item->nombreTipoCuenta }}</option>
                                        @endforeach
                                    </select>
                                    </div>
                                  </div>



                                <div class="form-group has-feedback row">
                                    <label for="cantidadAbonada" class="col-12 control-label">Cantidad Abonada:</label>
                                    <div class="col-12">
                                        <input name="cantidadAbonada" class="form-control" type="number" min="0.00"  step="0.01"  id="cantidadAbonada"></input>
                                    </div>
                                </div>
                                </div>
                            </div>
                        </div>
                    </div>
                 <div class="card-footer">
                        <div class="row">
                            <div class="col-md-6">
                                <span data-toggle="tooltip" title data-original-title="Guardar cambios realizados">
                                <button type="submit" class="btn btn-success btn-lg btn-block" value="Guardar" name="action">
                                    <i class="fa fa-save fa-fw">
                                        <span class="sr-only">
                                            Guardar Icono
                                        </span>
                                    </i>
                                    Guardar abono
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
<div>

@endsection
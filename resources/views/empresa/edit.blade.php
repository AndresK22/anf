@extends('admin.index')
@section('tittle','Actualizar empresa')
@section('content')
<div class="container">
    <div class="row py-lg-2">
        <div class="col-md-6"><h2>Actualizar empresa</h2></div>
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
                <form action="{{ route('empresa.update', $empresa) }}" method="POST">
                @csrf
                @method('put')
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-8">
                                <div class="form-group has-feedback row">
                                    <label for="proveedor_id" class="col-12 control-label">Sector:</label>
                                    <div class="col-12">
                                        <select class="form-control" name="sector_id" value="{{ old('sector_id') }}">
                                            <option selected='true' disabled='disabled'>Seleccionar sector</option>
                                                @foreach( $sectores as $item )
                                                    <option value="{{ $item->id }}" @if($empresa->sector_id == $item->id) {{ 'selected' }} @endif>{{ $item->nombreSector }}</option>
                                                @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group has-feedback row">
                                    <label for="nombreEmpresa" class="col-12 control-label">Nombre:</label>
                                    <div class="col-12">
                                        <input name="nombreEmpresa" class="form-control" type="text" max="70" value="{{ old('nombreEmpresa', $empresa->nombreEmpresa) }}" ></input>
                                    </div>
                                </div>
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
                                        Guardar cambios
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
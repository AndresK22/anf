@extends('admin.index')
@section('tittle','Empresa')
@section('content')

<div class="row py-lg-2">
    <div class="col-md-6"><h2>Llenar cuentas</h2></div>
</div>

<form action="{{ route('cuentaPeriodo.create') }}" method="POST">
@csrf
    <div class="row">
        <div class="col-md-4">
            <div class="form-group has-feedback row">
                <label for="empresa_id" class="col-12 control-label">Empresa:</label>
                <div class="col-12">
                    <select class="form-control" name="empresa_id" value="{{ old('empresa_id') }}">
                        <option selected='true' disabled='disabled'>Seleccionar empresa</option>
                            @foreach( $empresas as $item )
                                <option value="{{ $item->id }}">{{ $item->nombreEmpresa }}</option>
                            @endforeach
                    </select>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="form-group has-feedback row">
                <label for="periodo_contable_id" class="col-12 control-label">Periodo:</label>
                <div class="col-12">
                    <select class="form-control" name="periodo_contable_id" value="{{ old('periodo_contable_id') }}">
                        <option selected='true' disabled='disabled'>Seleccionar periodo</option>
                            @foreach( $periodos as $item )
                                <option value="{{ $item->id }}">{{ $item->anio }}</option>
                            @endforeach
                    </select>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="form-group has-feedback row">
                <span data-toggle="tooltip" title data-original-title="Llenar cuentas">
                    <button type="submit" class="btn btn-primary btn-lg btn-block" name="action">
                        Llenar cuentas
                    </button>
                </span>
            </div>
        </div>    
    </div>
</form>

@section('js_user_page')
<script>
    $(document).ready(function() {
        $('#dataTable21').DataTable({
            "language": {
                "url": "//cdn.datatables.net/plug-ins/1.10.15/i18n/Spanish.json"
            }
        });
    });
</script>
@endsection

@endsection
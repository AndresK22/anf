@extends('admin.index')
@section('title', 'Cuentas')
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
                            Cuentas para catalogo:
                            <div class="pull-right">
                                <a href="{{ url()->previous() }}" class="btn btn-outline-secondary btn-sm float-right"
                                    data-toggle="tooltip" data-placement="left" title
                                    data-original-title="Regresar a lista de expedientes">Regresar</a>
                            </div>
                        </div>
                    </div>
                    <form action="{{ route('cuenta.store') }}" method="POST">
                        @csrf
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group has-feedback row">
                                        <label for="nombre" class="col-sm col-form-label">Codigo Cuenta</label>
                                        <div class="col-sm-8">
                                            <input id="idCuenta" type="text" class="form-control" name="idCuenta"
                                                placeholder="Código de la cuenta">
                                        </div>
                                    </div>

                                    <div class="form-group has-feedback row">
                                        <label for="nombreCuenta" class="col-sm col-form-label">Nombre de cuenta:</label>
                                        <div class="col-sm-8">
                                            <input id="nombreCuenta" type="text" class="form-control" name="nombreCuenta"
                                                placeholder="Nombre de la cuenta">
                                        </div>
                                    </div>

                                    <div class="form-group has-feedback row">
                                        <div class="col-12">
                                            <input type="hidden" name="empresa_id" class="form-control"
                                                value="{{ $id }}" id="empresa_id"></input>
                                        </div>
                                    </div>

                                </div>


                                <div class="col-md-6">
                                    <div class="form-group row">
                                        <label class="col-sm col-form-label">Tipo de cuenta</label>
                                        <div class="col-sm-8">
                                            <select class="form-control" name="tipo_cuenta_id" id="tipo_cuenta_id" required>
                                                <option selected='true' disabled='disabled'>Seleccionar tipo de cuenta
                                                </option>
                                                @foreach ($tipoEmpresas as $item)
                                                    <option value="{{ $item->id }}">{{ $item->nombreTipoCuenta }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label class="col-sm col-form-label">Cuenta equivalente</label>
                                        <div class="col-sm-8">
                                            <select class="form-control" name="cuenta_equivalente_id"
                                                id="cuenta_equivalente_id" required>
                                                <option selected='true' disabled='disabled'>Seleccionar Cuenta</option>
                                                @foreach ($cuentaEqui as $item)
                                                    <option value="{{ $item->idCuentaEquivalente }}">
                                                        {{ $item->nombreCuentaEq }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-footer">
                            <div class="row">
                                <div class="col-md-10"></div>
                                <div class="col-md-2">
                                    <span data-toggle="tooltip" title data-original-title="Guardar cambios realizados">
                                        <button type="submit" class="btn btn-success" value="Guardar" name="action">
                                            <i class="fa fa-save fa-fw">
                                                <span class="sr-only">Guardar Icono</span>
                                            </i>Agregar cuenta</button>
                                    </span>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <div class="card bg-dark">
            <div class="card-body">
                <div class="alert alert-dark col-12" role="alert">
                    <h3><b>Catalogo de cuentas de la empresa</b></h3>
                </div>            </div>
          </div>

        <!-- -----------Activos ------------->
        <div class="row">
            <div class="card col-12">
                <div class="card-header">
                    <h3 class="card-title"><b>Activos</b></h3>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered dataTables_wrapper dt-bootstrap4" id="dataTable1" width="100%"
                            cellspacing="0">
                            <thead>
                                <tr>
                                    <th scope="col">Codigo</th>
                                    <th scope="col">Nombre Cuenta</th>
                                    {{-- <th scope="col">Opciones</th> --}}

                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($activo as $item)
                                    <tr>
                                        <th scope="row">{{ $item->idCuenta }}</th>
                                        <td>{{ $item->nombreCuenta }}</td>
                                        {{-- <td>
                                        <a href="{{ route('cuenta.create', $item->id) }}">--</a>
                                    </td> --}}
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

        <!-- ----------- Pasivos ------------->
        <div class="row">
            <div class="card col-12">
                <div class="card-header">
                    <h3 class="card-title"><b>Pasivos</b></h3>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered dataTables_wrapper dt-bootstrap4" id="dataTable2" width="100%"
                            cellspacing="0">
                            <thead>
                                <tr>
                                    <th scope="col">Codigo</th>
                                    <th scope="col">Nombre Cuenta</th>
                                    {{-- <th scope="col">Opciones</th> --}}

                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($pasivo as $item)
                                    <tr>
                                        <th scope="row">{{ $item->idCuenta }}</th>
                                        <td>{{ $item->nombreCuenta }}</td>
                                        {{-- <td>
                                        <a href="{{ route('cuenta.create', $item->id) }}">--</a>
                                    </td> --}}
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

    </div>

@section('js_user_page')

    <script>
        $(document).ready(function() {
            $('#dataTable1').DataTable({
                "paging": false,
                "lengthChange": false,
                "searching": false,
                "ordering": true,
                "info": false,
                "autoWidth": false,
                "responsive": true,
                "language": {
                    "url": "//cdn.datatables.net/plug-ins/1.10.15/i18n/Spanish.json"
                }
            });
        });

        $(document).ready(function() {
            $('#dataTable2').DataTable({
                "paging": false,
                "lengthChange": false,
                "searching": false,
                "ordering": true,
                "info": false,
                "autoWidth": false,
                "responsive": true,
                "language": {
                    "url": "//cdn.datatables.net/plug-ins/1.10.15/i18n/Spanish.json"
                }
            });
        });

        $(document).ready(function() {
            $('#dataTable3').DataTable({
                "paging": false,
                "lengthChange": false,
                "searching": false,
                "ordering": true,
                "info": false,
                "autoWidth": false,
                "responsive": true,
                "language": {
                    "url": "//cdn.datatables.net/plug-ins/1.10.15/i18n/Spanish.json"
                }
            });
        });
    </script>
@endsection

@endsection

@extends('admin.index')
@section('title','Cuentas')
@section('content')

<div class="card mb-3">
    <div class="card-header">
        <i class="fas fa-table"></i>
        Lista de Empresas</div>
    <div class="card-body">
        <div class="table-responsive">
        <table class="table table-bordered" id="dataTable21" width="100%" cellspacing="0">
            <thead>
            <tr>
                <th scope="col">id</th>
                <th scope="col">Nombre Empresa</th>
                <th scope="col">Opciones</th>

          </tr>
        </thead>
        <tfoot>
        <tr>
            <th scope="col">id</th>
            <th scope="col">Nombre Empresa</th>
            <th scope="col">Opciones</th>

          </tr>
        </tfoot>
        <tbody>
            @foreach($empresas as $item)
                <tr>
                    <th scope="row">{{ $item->id }}</th>
                    <td>{{ $item->nombreEmpresa}}</td>
                    <td>
                        <a href="{{ route('cuenta.create', $item->id) }}">Agregar cuentas a catalogo</a>
                    </td>
                </tr>
          @endforeach
        </tbody>
      </table>
</div>


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




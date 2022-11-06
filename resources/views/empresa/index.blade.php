@extends('admin.index')
@section('tittle','Empresa')
@section('content')

<div class="row py-lg-2">
    <div class="col-md-6"><h2>Empresas</h2></div>
    <div class="col-md-6">
        <a href="{{route('empresa.create')}}" class="btn btn-primary btn-lg float-md-right" role="button" aria-pressed="true">Ingresar empresa</a>
    </div>
</div>

<div class="card mb-3">
    <div class="card-header">
        <i class="fas fa-table"></i>
        Lista de empresas
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable21" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th scope="col">id</th>
                        <th scope="col">Nombre</th>
                        <th scope="col">Sector</th>
                        <th scope="col">Opciones</th>
                </tr>
                </thead>
                <tfoot>
                    <tr>
                        <th scope="col">id</th>
                        <th scope="col">Nombre</th>
                        <th scope="col">Sector</th>
                        <th scope="col">Opciones</th>
                    </tr>
                </tfoot>
                <tbody>
                    @foreach($empresas as $item)
                        <tr>
                            <th scope="row">{{ $item->id }}</th>
                            <td>{{ $item->nombreEmpresa }}</td>
                            <td>{{ $item->sector->nombreSector }}</td>
                            <td>
                                <a href="{{ route('empresa.edit', $item->id) }}"><i class="fa fa fa-edit"></i></a>
                                <a href="{{ route('empresa.destroy', $item) }}" data-toggle="modal" data-target="#deleteModal" data-empresaid="{{ $item->id }}"><i class="fas fa-trash-alt"></i></a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

<!-- delete Modal-->
<div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">¿Estás seguro que quieres eliminar esto?</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">Seleccione "Borrar" Si realmente desea eliminar esta empresa</div>
            <div class="modal-footer">
                <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancelar</button>
                <form method="POST" action="">
                    @method('GET')
                    @csrf
                    <a class="btn btn-primary" onclick="$(this).closest('form').submit();">Borrar</a>
                </form>
            </div>
        </div>
    </div>
</div>
<div class="card-footer small text-muted"></div>


@section('js_user_page')
<script>
    $('#deleteModal').on('show.bs.modal', function (event) {
        var button = $(event.relatedTarget) 
        var empresa_id = button.data('empresaid') 
            
        var modal = $(this)
        modal.find('form').attr('action','/empresa/destroy/' + empresa_id);
    })
</script>

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
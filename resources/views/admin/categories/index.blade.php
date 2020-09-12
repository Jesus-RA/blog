@extends('adminlte::page')

@section('title', 'CRUD Categorías')

@section('content_header')
<h1>
    Categorías
    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal-create-category">
        Crear
    </button>
</h1>
@stop

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Listado de categorías</h3>
                </div>
            <!-- /.card-header -->
            <div class="card-body">
                <table id="categories" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>Id</th>
                            <th>Name</th>
                        </tr>
                    </thead>
                    <tbody>
                    </tbody>
                    <tfoot>
                        <tr>
                            <th>Id</th>
                            <th>Name</th>
                        </tr>
                    </tfoot>
                </table>
            </div>
            <!-- /.card-body -->
            </div>
            <!-- /.card -->
        </div>
        <!-- /.col -->
    </div>
    <!-- /.row -->
</div>

<!-- modal -->
<div class="modal fade" id="modal-create-category">
    <div class="modal-dialog">
        <div class="modal-content bg-default">
            <div class="modal-header">
                <h4 class="modal-title">Crear Categoría</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
                </div>
            <div class="modal-body">
                
                <form action="{{ route('admin.categories.store') }}" id="createCategory" method="POST">
                    @csrf

                    <div class="form-group">
                        <label for="name">Categoria:</label>
                        <input type="text" name="name" id="name" placeholder="Nombre categoría" class="form-control mb-3">
                    </div>
                </form>

            </div>
            <div class="modal-footer justify-content-between">
                <button type="button" class="btn btn-outline-primary" data-dismiss="modal">Cancel</button>
                <button type="submit" class="btn btn-outline-primary " form="createCategory">Create Category</button>
            </div>
        </div>
      <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- /.modal -->
@stop

@section('js')
    <script>
        $(document).ready(function() {
            $('#categories').DataTable( {
                ajax : "/categories",
                columns : [
                    { data : 'id' },
                    { data : 'name' },
                ],
                // "order": [[ 3, "desc" ]]
            } );
        } );
    </script>
@stop
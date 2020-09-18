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

@section('plugins.Datatables', true)

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
                <edit-category></edit-category>
                <table id="categories" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>Id</th>
                            <th>Name</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                    </tbody>
                    <tfoot>
                        <tr>
                            <th>Id</th>
                            <th>Name</th>
                            <th>Actions</th>
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

<!-- modal Create Category -->
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
                <button type="button" class="btn btn-outline-danger" data-dismiss="modal">Cancel</button>
                <button type="submit" class="btn btn-outline-primary" form="createCategory">Create Category</button>
            </div>
        </div>
      <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- /.modal -->

<!-- modal Edit Category -->
<div class="modal fade" id="modal-edit-category">
    <div class="modal-dialog">
        <div class="modal-content bg-default">
            <div class="modal-header">
                <h4 class="modal-title">Editar Categoría</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
                </div>
            <div class="modal-body">
                
                <form id="editCategory">
                    <div class="form-group">
                        <label for="nameEdit">Categoria:</label>
                        <input type="text" name="name" id="nameEdit" placeholder="Nombre categoría" class="form-control mb-3">
                        <input type="hidden" name="id" id="id">
                    </div>
                </form>

            </div>
            <div class="modal-footer justify-content-between">
                <button type="button" class="btn btn-outline-danger" data-dismiss="modal">Cancel</button>
                <button type="submit" class="btn btn-outline-warning" onclick="updateCategory()" id="updateButton" onsubmit="updateCategory()" form="editCategory">Save changes</button>
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
            let table = $('#categories').DataTable( {
                ajax : "/categories",
                deferRender : true,
                columns : [
                    { data : 'id' },
                    { data : 'name' },
                    {
                        "defaultContent" : `
                                <div>
                                    <button data-toggle="modal" data-target="#modal-edit-category" type="button" class="btn btn-warning" onclick="editCategory()">Edit</button>
                                    <button type="submit" class="btn btn-danger" onclick="deleteCategory()">Delete</button>
                                </div>
                            `,
                    },
                ],
            } );

        } );

        function editCategory(){
            
            event.preventDefault();

            const category = event.target.parentNode.parentNode.parentNode.childNodes[1].textContent;
            const id = event.target.parentNode.parentNode.parentNode.childNodes[0].textContent;
            $('#nameEdit').val(category);

            $('#id').val(id);
            
            
        }

        function updateCategory(){

            event.preventDefault();

            const category = $('#nameEdit').val();
            const id = $('#id').val()

            $.ajax({
                url: '/categories/'+id,
                method: 'PUT',
                data: { 
                    '_token' : '{{ csrf_token() }}',
                    name : category,
                }
            })
            .done(function(response){
                document.querySelector('#modal-edit-category').classList.remove('show')

                const Toast = Swal.mixin({
                    toast: true,
                    position: 'top-end',
                    showConfirmButton: false,
                    timer: 1000,
                    timerProgressBar: true,
                })

                Toast.fire({
                    icon: 'success',
                    title: 'Signed in successfully'
                })
                                
            })
            .fail(error => {
                console.log(error)
            })
        }

        function deleteCategory(){
            
            const id = event.target.parentNode.parentNode.parentNode.childNodes[0].textContent;
            const category = event.target.parentNode.parentNode.parentNode.childNodes[1].textContent;
            console.log(id)
            event.preventDefault();

            Swal.fire({

                title: 'Are you sure you want to delete '+ category +'?',
                text: "You won't be able to revert this!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, delete it!'

            }).then((result) => {

                if (result.isConfirmed) {

                    $.ajax({

                        url : '/categories/'+id,
                        method : 'DELETE',
                        data: {
                            '_token' : '{{ csrf_token() }}',
                        }

                    })
                    .done(function(response){
                        console.log(response)
                        Swal.fire({
                            title : 'Deleted!',
                            text : 'Your category '+ response +' has been deleted.',
                            icon : 'success',
                            allowOutsideClick : false,
                            allowEnterKey : true,
                        }).then( (result)=>{
                            if(result.isConfirmed){
                                location.reload()
                            }
                        })
                    })
                    .fail( error => {
                        console.log(error)
                    } )
                    
                }

            })

        }

    </script>
@stop
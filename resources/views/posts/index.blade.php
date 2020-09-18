@extends('layouts.app')

@section('content')
    
    <!-- Contenido -->
    <section class="container-fluid content">
        <!-- Categorías -->
        <div class="row justify-content-center">
            <div class="col-10 col-md-12">
                <nav class="text-center my-5">
                    <h3 class="text-center mt-5">Categorías</h3>
                    <a href="#" class="mx-3 pb-3 link-category d-block d-md-inline selected-category" >Todas</a>
                    <a href="#" class="mx-3 pb-3 link-category d-block d-md-inline" >Programación</a>
                    <a href="#" class="mx-3 pb-3 link-category d-block d-md-inline" >Desarrollo web</a>
                </nav>
            </div>
        </div>

        <!-- Posts -->
        <div class="row justify-content-center">
            <div class="col-10">
                <div class="row">
                    @foreach ($posts as $post)
                        @include('components.post')
                    @endforeach
                </div>
            </div>

            <div class="col-12">
                <!-- Paginador -->

            </div>
        </div>
    </section>
    
@endsection
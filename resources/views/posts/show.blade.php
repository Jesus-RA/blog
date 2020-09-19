@extends('layouts.app')

@section('content')
    <!-- Contenido -->
    <section class="container-fluid content py-5">
        <div class="row justify-content-center">
            <!-- Post -->
            <div class="col-12 col-md-7 text-center">
                <h1>{{ $post->title }}</h1>
                <hr>

                <img src="{{ asset($post->image) }}" alt="Post Javascript" class="img-fluid">

                <p class="text-left mt-3 post-txt">
                    <span>Autor: {{ $post->author->name }}</span>
                    <span class="float-right">Publicado: {{ $post->created_at->diffForHumans() }}</span>
                </p>
                <p class="text-left">
                    {{ $post->content }}
                </p>
                <p class="text-left post-txt"><i>Categoría: {{ $post->category->name }}</i></p>
            </div>

            <!-- Entradas recientes -->
            <div class="col-md-3 offset-md-1">
                <p>Últimas entradas</p>
                @foreach ($latestPosts as $post)
                    <div class="row mb-4">
                        <div class="col-4 p-0">
                            <a href="{{ route('posts.show', $post) }}">
                                <img src="{{ asset($post->image) }}" class="img-fluid rounded" width="100" alt="">
                            </a>
                        </div>
                        <div class="col-7 pl-0">
                            <a href="{{ route('posts.show', $post) }}" class="link-post">{{ $post->title }}</a>
                        </div>
                    </div>
                @endforeach
            </div>

        </div>
    </section>
    
    <!-- Posts relacionados -->
    @if ( count($relatedPosts) > 0 )
        <section class="container-fluid content py-5">
            <div class="row justify-content-center">
                <!-- Post -->
                <div class="col-12 text-center">
                    <h2>Entradas relacionadas</h2>
                    <hr class="post-hr">
                </div>

                @foreach ($relatedPosts as $post)
                    @include('components.post')
                @endforeach

            </div>
        </section>
    @endif
   
  <!-- agrega aquí el footer -->
@endsection
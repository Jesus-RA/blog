@extends('adminlte::page')

@section('title', 'Admin - Blog')

@section('content_header')
    <h1>Admin Blog</h1>
@endsection

@section('content')
    <p>Welcome to our manage panel</p>
    <a href="{{route('categorias.index')}}" class="btn btn-dark btn-block">Categorias</a>
@endsection
@extends('adminlte::page')

@section('title', 'Cadastrar novo perfil')

@section('content_header')
    <h1>Cadastrar novo perfil </h1>
@stop

@section('content')

   <div class="card">
        <div class="card-body">
                <form action=" {{ route('profiles.store') }} " class="form" method="POST">
                   @csrf 
                    @method('POST')

                    @include('admin.pages.profiles._partials.form')
                </form>
        </div>
   </div>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop
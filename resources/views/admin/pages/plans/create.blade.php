@extends('adminlte::page')

@section('title', 'Cadastrar novo plano')

@section('content_header')
    <h1>Cadastrar novo plano </h1>
@stop

@section('content')
   <div class="card">
        <div class="card-body">
                <form action=" {{ route('plans.store') }} " class="form" method="POST">
                   @csrf 
                    @method('POST')

                   <div class="form-group">
                        <label>Nome:</label>
                        <input type="text" name="name" class="form-control" placeholder="Nome:  ">
                   </div>

                   <div class="form-group">
                        <label>Preço:</label>
                        <input type="text" name="price" class="form-control" placeholder="Preço:  ">
                   </div>

                   <div class="form-group">
                        <label>Descrição:</label>
                        <input type="text" name="description" class="form-control" placeholder="Descrição:  ">
                   </div>

                   <div class="form-group">
                        <button class="btn btn-dark" type="submit"> Enviar </button>
                    </div>
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
@extends('adminlte::page')

@section('title', 'Detalhes do perfil')

@section('content_header')
    <h1>Detalhes do perfil {{ $profile->name }}</h1>
@stop

@section('content')

    <div class="card">
        <div class="card-body">

            @include('admin.includes.alerts')

                <ul>
                    <li>
                        <strong>Nome: </strong> {{ $profile->name }}
                    </li>

                    <li>
                        <strong>Descrição: </strong> {{ $profile->description }}
                    </li>
                </ul>

                <form action="{{ route('profiles.destroy', $profile->id) }}" method="post" >
                    @csrf
                    @method('DELETE')
                  
                    <button type="submit" class="btn btn-danger"> DELETAR O PLANO  <i class="ml-1 fa-solid fa-trash"></i> </button>

                </form>
        </div>
    </div>


@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css"  />
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop
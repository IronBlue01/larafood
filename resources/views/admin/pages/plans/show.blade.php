@extends('adminlte::page')

@section('title', 'Detalhes do plano')

@section('content_header')
    <h1>Detalhes do plano {{ $plan->name }}</h1>
@stop

@section('content')

    <div class="card">
        <div class="card-body">
                <ul>
                    <li>
                        <strong>Nome: </strong> {{ $plan->name }}
                    </li>

                    <li>
                        <strong>URL: </strong> {{ $plan->url }}
                    </li>

                    <li>
                        <strong>Preço: </strong> R$ {{ number_format($plan->price, 2, ',', '.') }}
                    </li>

                    <li>
                        <strong>Descrição: </strong> {{ $plan->description }}
                    </li>
                </ul>

                <form action="{{ route('plans.delete', $plan->url) }}" method="post" >
                    @csrf
                    @method('DELETE')
                  
                    <button type="submit" class="btn btn-danger"> DELETAR O PLANO </button>

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
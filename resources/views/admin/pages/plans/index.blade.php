@extends('adminlte::page')

@section('title', 'Planos')

@section('content_header')
    <h1>Planos <a href=" {{ route('plans.create') }} " class="btn btn-dark">ADD</a> </h1>
@stop

@section('content')
    <div class="card">
        <div class="card-header">
            <form action=" {{ route('plans.search') }} " method="post" class="form form-inline">
                    @csrf
                    <div class="form-group mr-1">
                        <input type="text" name="filter" placeholder="Nome" class="form-control">
                    </div>
                
                    <button type="submit" class="btn btn-dark">Filtrar</button>
            </form>
        </div>
        <div class="card-body">
   
                <table class="table table-condensed">
                    <thead>
                        <tr>
                            <th>Nome</th>
                            <th>Preço</th>
                            <th style="width: 50px;">Ações</th>
                        </tr>
                    </thead>

                    <tbody>
                @foreach ($plans as $plan)
                        <tr>
                            <td>
                                {{$plan->name}}
                            </td>
                            <td>
                                R$ {{ number_format($plan->price, 2, ',', '.') }}
                            </td>
                            <td>
                                <a href=" {{ route('plans.show', $plan->url) }} " class="btn btn-warning">Ver</a>
                            </td>
                        </tr>
                @endforeach
                    </tbody>
                </table>
        </div>
        <div class="card-footer">

            <nav aria-label="Page navigation example">
                <ul class="pagination">
            @if (isset($filters))
                    <li class="page-item"><a class="page-link" href=" {{ $plans->appends($filters)->previousPageUrl()}} ">Voltar</a></li>
                        @for ($i = 1; $i <= $plans->lastPage(); $i++)
                            <li class="page-item {{ $plans->currentPage() == $i ? 'active' : '' }} ">
                                    <a class="page-link" href=" {{ $plans->url($i) }} "> {{$i}} </a>
                            </li>
                        @endfor
                    <li class="page-item"><a class="page-link" href=" {{ $plans->appends($filters)->nextPageUrl()}} ">Avançar</a></li>
            @else
                    <li class="page-item"><a class="page-link" href=" {{ $plans->previousPageUrl()}} ">Voltar</a></li>
                            @for ($i = 1; $i <= $plans->lastPage(); $i++)
                                <li class="page-item {{ $plans->currentPage() == $i ? 'active' : '' }} ">
                                        <a class="page-link" href=" {{ $plans->url($i) }} "> {{$i}} </a>
                                </li>
                            @endfor
                    <li class="page-item"><a class="page-link" href=" {{ $plans->nextPageUrl()}} ">Avançar</a></li>
             @endif

            </ul>
        </nav>
        </div>
    </div>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop
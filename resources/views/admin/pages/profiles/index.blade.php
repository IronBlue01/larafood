@extends('adminlte::page')

@section('title', 'Perfis')

@section('content_header')

     <nav class="mb-1" style="--bs-breadcrumb-divider: url(&#34;data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='8' height='8'%3E%3Cpath d='M2.5 0L1 1.5 3.5 4 1 6.5 2.5 8l4-4-4-4z' fill='currentColor'/%3E%3C/svg%3E&#34;);" aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href=" {{route('admin.index')}} ">Dashboard</a></li>
            <li class="breadcrumb-item "><a class="active" href=" {{route('profiles.index')}} " >Perfis</a></li>
        </ol>
      </nav>

    <h1>Perfis <a href=" {{ route('profiles.create') }} " class="btn btn-dark">ADD <i class="fa-solid fa-plus"></i></a> </h1>
@stop

@section('content')
    <div class="card">
        <div class="card-header">
            <form action=" {{ route('plans.search') }} " method="post" class="form form-inline">
                    @csrf
                    <div class="form-group mr-1">
                        <input type="text" name="filter" placeholder="Nome" value="{{ $filters['filter'] ?? '' }}" class="form-control">
                    </div>
                
                    <button type="submit" class="btn btn-dark">Filtrar <i class="fa-solid fa-magnifying-glass"></i></button>
            </form>
        </div>
        <div class="card-body">
                <table class="table table-condensed">
                    <thead>
                        <tr>
                            <th>Nome</th>
                            <th style="width: 220px;">Ações</th>
                        </tr>
                    </thead>

                    <tbody>
                @foreach ($profiles as $profile)
                        <tr>
                            <td>
                                {{$profile->name}}
                            </td>
                    
                            <td>
                                {{-- <a href=" {{route('details.profile.index', $profile->url )}} " class="btn btn-dark">Detail</a> --}}
                                <a href=" {{route('profiles.edit', $profile->id )}} " class="btn btn-info">Edit</a>
                                <a href=" {{ route('profiles.show', $profile->id) }} " class="btn btn-warning">Ver</a>
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
                    <li class="page-item"><a class="page-link" href=" {{ $profiles->appends($filters)->previousPageUrl()}} ">Voltar</a></li>
                        @for ($i = 1; $i <= $profiles->lastPage(); $i++)
                            <li class="page-item {{ $profiles->currentPage() == $i ? 'active' : '' }} ">
                                    <a class="page-link" href=" {{ $profiles->url($i) }} "> {{$i}} </a>
                            </li>
                        @endfor
                    <li class="page-item"><a class="page-link" href=" {{ $profiles->appends($filters)->nextPageUrl()}} ">Avançar</a></li>
            @else
                    <li class="page-item"><a class="page-link" href=" {{ $profiles->previousPageUrl()}} ">Voltar</a></li>
                            @for ($i = 1; $i <= $profiles->lastPage(); $i++)
                                <li class="page-item {{ $profiles->currentPage() == $i ? 'active' : '' }} ">
                                        <a class="page-link" href=" {{ $profiles->url($i) }} "> {{$i}} </a>
                                </li>
                            @endfor
                    <li class="page-item"><a class="page-link" href=" {{ $profiles->nextPageUrl()}} ">Avançar</a></li>
             @endif

            </ul>
        </nav>
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
@extends('adminlte::page')

@section('title', "Adicionar novo detalhe ao plano")

@section('content_header')
 
    <nav class="mb-1" style="--bs-breadcrumb-divider: url(&#34;data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='8' height='8'%3E%3Cpath d='M2.5 0L1 1.5 3.5 4 1 6.5 2.5 8l4-4-4-4z' fill='currentColor'/%3E%3C/svg%3E&#34;);" aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href=" {{route('admin.index')}} ">Dashboard</a></li>
            <li class="breadcrumb-item "><a  href=" {{route('plans.index')}} " >Planos</a></li>
            <li class="breadcrumb-item "><a  href=" {{route('plans.show', $plan->url)}} " > {{ $plan->name }} </a></li>
            <li class="breadcrumb-item "><a  href=" {{route('details.plan.index', $plan->url)}}" > Detalhes </a></li>
            <li class="breadcrumb-item "><a  href=" {{route('details.plan.create', $plan->url)}}" > Novo </a></li>
        </ol>
    </nav>

      <h1>Adicionar novo detalhe ao plano - {{ $plan->name }} </h1>
@stop

@section('content')

   <div class="card">
        <div class="card-body">
               <form action=" {{ route('details.plan.store', $plan->url) }} " method="post">
                
                @method('POST')

                @include('admin.pages.plans.details._partials.form')


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
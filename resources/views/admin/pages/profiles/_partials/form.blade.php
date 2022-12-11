@include('admin.includes.alerts')

<div class="form-group">
    <label>Nome:</label>
    <input type="text" name="name"  value=" {{$profile->name ?? old('name')}} " class="form-control" placeholder="Nome:  ">
</div>

<div class="form-group">
    <label>Descrição:</label>
    <input type="text" name="description" value=" {{$profile->description ?? old('description') }} " class="form-control" placeholder="Descrição:  ">
</div>

<div class="form-group">
    <button class="btn btn-dark" type="submit"> Enviar </button>
</div>
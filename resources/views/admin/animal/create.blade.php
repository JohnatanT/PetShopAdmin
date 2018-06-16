@extends('adminlte::page')

@section('title', 'PetShop')

@section('content_header')
    <h1>Gestão de Animais</h1>
    @include('includes')
@stop

@section('content')
@if(isset($animal))
    <form action="{{ route('animal-update',$animal->id) }}" method="post" class="form" enctype="multipart/form-data">
    {!! method_field('PUT') !!}
@else
    <form action="{{ route('animal-store') }}" method="post" class="form" enctype="multipart/form-data">
@endif
    {!! csrf_field() !!}
    <label for="nome">Nome da Raça</label>
    <input type="text" class="form-control" id="raca" name="raca" value="{{$animal->raca or old('raca') }}" required>
    <label for=descricao"">Descrição do Animal</label>
    <textarea name="descricao" id="descricao" cols="30" rows="10" required class="form-control">{{$animal->descricao or old('descricao') }}</textarea>
    <label for="preco">Preço do Animal</label>
    <input type="number" name="preco" id="preco" value="{{$animal->preco or old('preco') }}" class="form-control" required>
    <label for="image">Foto do Animal</label>
    @if(isset($animal))
        <img src="{{url("storage/animais")."/".$animal->image}}" alt="{{$animal->nome}}" style="width: 100px;">
    @endif
    <input type="file" name="image" id="image" class="money form-control">
    <button type="submit" class="btn btn-danger">Cadastrar</button>
</form>
@stop
